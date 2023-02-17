<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreclientRequest;
use App\Http\Requests\UpdateclientRequest;
use App\Models\Center;
use App\Models\Client;
use App\Models\ClientTreatment;
use App\Models\Treatment;
use Illuminate\Http\Request;

class ClientController extends Controller
{

   
    public function index()
    {
        // $this->authorize('viewAny',Client::class);

       
        $clienteList = Client::all();
        
        return view('client.index',['clienteList'=>$clienteList]);
    }

    public function session($admin){
        session(['admin'=>$admin]);
        return redirect()->action([ClientController::class, 'index'])->with('exito',"has accedido en calidad de $admin");

    }
  

    public function salir(){

        session()->forget('admin');

        return  redirect()->route('welcome');

    }
    public function create()


    {
        $tratamientoList = Treatment::all();
        $centerList = Center::all();
        // $this->authorize("create",Client::class);
        return view('client.create',['tratamientoList'=>$tratamientoList],['centerList'=>$centerList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

        $request->validate([

            'nombre'=>'required',
            'apellidos'=>'required',
            'direccion'=>'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'center_id'=>'required'
            ],[
                'nombre.required'=> 'Debes rellenar el nombre',
                'nombre.max'=> 'El nombre no puede exceder de 100 caracteres',
                'apellido.required'=>'Debes rellenar el apellido',
                'direccion.required'=> 'Debes rellenar la direccion',
                'email.required' => 'Debes rellenar el campo email',
                'center_id.required' => 'Debes rellenar el campo id del centro'
    
            ]);

         $p = new Client;
         
   
    
        $p->nombre=$request->input("nombre");
        $p->apellidos=$request->input("apellidos");
        $p->direccion=$request->input("direccion");
        $p->email=$request->input("email");
        $p->center_id=$request->input("center_id");
        $p->save();

        if($request->input("treatment_id")!="ninguno"){
            $id=$p->id;
            $t= new ClientTreatment;
            $t->client_id=$id;
            $t->treatment_id=$request->input("treatment_id");
            $t->save();
        }
       
        // $p->save();//save es un metodo eloquent
  
       

        // $id = Client::select('id')->where('email', $p->email)->first();

       
  

        // $this->authorize("update",$client);
        return redirect()->action([ClientController::class, 'index'])->with('exito','Cliente añadido correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

 
        $cliente= Client::find($id);

        
       
        return view('client.show',['cliente'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client= Client::find($id);
        // $this->authorize("update",$client);
        $tratamientoList = Treatment::all();
        $centerList = Center::all();
        
        return view('client.edit',['cliente'=>$client, 'tratamientoList'=>$tratamientoList,'centerList'=>$centerList]);
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

            'nombre'=>'required',
            'apellidos'=>'required',
            'direccion'=>'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'center_id'=>'required'
            ],[
                'nombre.required'=> 'Debes rellenar el nombre',
                'nombre.max'=> 'El nombre no puede exceder de 100 caracteres',
                'apellido.required'=>'Debes rellenar el apellido',
                'direccion.required'=> 'Debes rellenar la direccion',
                'email.required' => 'Debes rellenar el campo email',
                'center_id.required' => 'Debes rellenar el campo id del centro'
    
            ]);


        $p= Client::find($id);
        // $this->authorize("update",$p);
        $p->nombre=$request->input("nombre");
        $p->apellidos=$request->input("apellidos");
        $p->direccion=$request->input("direccion");
        $p->email=$request->input("email");
        $p->center_id=$request->input("center_id");
        $p->save();//save es un metodo eloquent
      
        if($request->input("treatment_id")!="ninguno"){
            $id=$p->id;
            $t= new ClientTreatment;
            $t->client_id=$id;
            $t->treatment_id=$request->input("treatment_id");
            $t->save();
        }
       
        

        return redirect()->action([ClientController::class, 'index'])->with('exito','Cliente actualizado correctamente');

      
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
        $p= Client::find($id);
        $p->delete();
        return redirect()->action([ClientController::class, 'index'])->with('exito','Client borrado correctamente');
    }
}
