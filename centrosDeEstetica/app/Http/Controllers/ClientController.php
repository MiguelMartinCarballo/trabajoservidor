<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreclientRequest;
use App\Http\Requests\UpdateclientRequest;
use App\Models\Center;
use App\Models\Client;
use App\Models\ClientTreatment;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


//Nuestro trabajo utuliza sessiones para detectar que tipo de administrador eres es decir segun la session que tengas
// ya sea gerente la cual tendras acceso total a todas las opciones o recepcionista la cual nopodras dar de baja a los socios
// Cada socio pertenece a un centro por lo cual se accedra primero al centro que se quiere gestionar
// Una vez dentro si se crea un socio gracias a la session que se crea al entrar en el toda la info, relacionada con el
// es decir saldran todos los socios que pertenezcan a ese centro. Por lo tanto si dentro de un centro creas un socio
// Sera añadido automaticamente a ese centro.


class ClientController extends Controller
{


    public function index()
    {
        // $this->authorize('viewAny',Client::class);


        if ((session('admin'))) {
            $clienteList = DB::table('clients')
            ->where('center_id', '=', (session('center')))
            ->get();

            $centro =  DB::table('centers')
                ->where('id', '=', (session('center')))
                ->get();
                // dd($centro);

                $peluqueria = (DB::table('hairsalon')
                ->where('center_id', '=', $centro[0]->id)
                ->get());


            $estetica = (DB::table('aesthetic')
                ->where('center_id', '=', $centro[0]->id)
                ->get());
    

            return view('client.index', ['clienteList' => $clienteList,'centro'=>$centro,'peluqueria' => $peluqueria, 'estetica' => $estetica]);
        } else {
            return  redirect()->route('denied');
        }
    }


    //metodos que crean la session y devuelven una vista en la que va ser utilizada esa session
    public function session($admin)
    {
        session(['admin' => $admin]);
        return redirect()->action([CenterController::class, 'index'])->with('exito', "has accedido en calidad de $admin");
    }

    public function session2($centro)
    {

        session(['center' => $centro]);


        return redirect()->action([ClientController::class, 'index'])->with('exito', "Has accedido al centro numero: $centro");
    }

    //Este metodo borra la session al pulsar el boton salir

    public function salir()
    {

        session()->forget('admin');

        return  redirect()->route('welcome');
    }
    public function create()


    {

        if ((session('admin'))) {



            
            $centerList = Center::all();


            $centro =  DB::table('centers')
            ->where('id', '=', (session('center')))
            ->get();
            $peluqueria = (DB::table('hairsalon')
            ->where('center_id', '=', $centro[0]->id)
            ->get());


           
            if(!empty($peluqueria[0])){

                $tratamientoList= DB::table('treatments')
                ->where('Tipo', '=', 0)
               
                ->get();
            }else{

                $tratamientoList= DB::table('treatments')
                ->where('Tipo', '=', 1)
               
                ->get();
            }
            // $this->authorize("create",Client::class);
            return view('client.create', ['tratamientoList' => $tratamientoList], ['centerList' => $centerList]);
        } else {
            return  redirect()->route('denied');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'nombre' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            
        ], [
            'nombre.required' => 'Debes rellenar el nombre',
            'nombre.max' => 'El nombre no puede exceder de 100 caracteres',
            'apellido.required' => 'Debes rellenar el apellido',
            'direccion.required' => 'Debes rellenar la direccion',
            'email.required' => 'Debes rellenar el campo email',
            

        ]);

        $p = new Client;



        $p->nombre = $request->input("nombre");
        $p->apellidos = $request->input("apellidos");
        $p->direccion = $request->input("direccion");
        $p->email = $request->input("email");
        $p->center_id = (session('center'));
        $p->save();

        if ($request->input("treatment_id") != "ninguno") {
            $id = $p->id;
            $t = new ClientTreatment;
            $t->client_id = $id;
            $t->treatment_id = $request->input("treatment_id");
            $t->save();
        }

        // $p->save();//save es un metodo eloquent



        // $id = Client::select('id')->where('email', $p->email)->first();




        // $this->authorize("update",$client);
        return redirect()->action([ClientController::class, 'index'])->with('exito', 'Cliente añadido correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if ((session('admin'))) {

            $cliente = Client::find($id);



            $suma = $cliente->treatments->sum('Precio');

            $centro = $cliente->center;

            //    dd($centro);


            // $peluqeria=$centro->hairsalon; 
            // $estetica=$centro->aesthetic;


            $peluqueria = (DB::table('hairsalon')
                ->where('center_id', '=', $centro->id)
                ->get());


            $estetica = (DB::table('aesthetic')
                ->where('center_id', '=', $centro->id)
                ->get());




            // dd($tipo);

            //  dd($centro->hairsalon);
            // $centro->hairsalon->toArray()->capacidadMaxima;

            //dd($centro);
            //dd($tipo);


            // dd($cliente->center->hairsalon);

            return view('client.show', ['cliente' => $cliente, 'suma' => $suma, 'centro' => $centro, 'peluqueria' => $peluqueria, 'estetica' => $estetica]);
        } else {
            return  redirect()->route('denied');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if ((session('admin'))) {
            $client = Client::find($id);
            // $this->authorize("update",$client);
            $tratamientoList = Treatment::all();
            $centerList = Center::all();

            return view('client.edit', ['cliente' => $client, 'tratamientoList' => $tratamientoList, 'centerList' => $centerList]);
        } else {
            return  redirect()->route('denied');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'nombre' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

        ], [
            'nombre.required' => 'Debes rellenar el nombre',
            'nombre.max' => 'El nombre no puede exceder de 100 caracteres',
            'apellido.required' => 'Debes rellenar el apellido',
            'direccion.required' => 'Debes rellenar la direccion',
            'email.required' => 'Debes rellenar el campo email',
        

        ]);


        $p = Client::find($id);
        // $this->authorize("update",$p);
        $p->nombre = $request->input("nombre");
        $p->apellidos = $request->input("apellidos");
        $p->direccion = $request->input("direccion");
        $p->email = $request->input("email");
        $p->center_id = (session('center'));
        $p->save(); //save es un metodo eloquent




        // if($request->input("treatment_id")!="ninguno"){
        //     $id=$p->id;
        //     $t= new ClientTreatment;
        //     $t->client_id=$id;
        //     $t->treatment_id=$request->input("treatment_id");
        //     $t->save();
        // }



        return redirect()->action([ClientController::class, 'index'])->with('exito', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $p = Client::find($id);
        $p->delete();
        return redirect()->action([ClientController::class, 'index'])->with('exito', 'Client borrado correctamente');
    }
}
