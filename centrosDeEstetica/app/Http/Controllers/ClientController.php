<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreclientRequest;
use App\Http\Requests\UpdateclientRequest;
use App\Models\Client;

use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        // $this->authorize('viewAny',Client::class);
        $clienteList = Client::all();
        
        return view('client.index',['clienteList'=>$clienteList]);
    }

    
  
    public function create()
    {
        // $this->authorize("create",Client::class);
        return view('client.create');
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

            'nombre'=>'required',
            'apellidos'=>'required',
            'direccion'=>'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ],[
                'nombre.required'=> 'Debes rellenar el nombre',
                'nombre.max'=> 'El nombre no puede exceder de 100 caracteres',
                'apellido.required'=>'Debes rellenar el apellido',
                'direccion.required'=> 'Debes rellenar la direccion',
                'email.required' => 'Debes rellenar el campo email'
    
            ]);
        // $p = new Client;
 
        // $p->nombre=$request->input("nombre");
        // $p->descripcion=$request->input("descripcion");
        // $p->precio=$request->input("precio");
        // $p->save();//save es un metodo eloquent
  
        Client::create($request->all());

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
        return view('client.edit',['cliente'=>$client]);
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ],[
                'nombre.required'=> 'Debes rellenar el nombre',
                'nombre.max'=> 'El nombre no puede exceder de 100 caracteres',
                'apellido.required'=>'Debes rellenar el apellido',
                'direccion.required'=> 'Debes rellenar la direccion',
                'email.required' => 'Debes rellenar el campo email'
    
            ]);


        $p= Client::find($id);
        // $this->authorize("update",$p);
        $p->nombre=$request->input("nombre");
        $p->apellidos=$request->input("apellidos");
        $p->direccion=$request->input("direccion");
        $p->email=$request->input("email");
        $p->save();//save es un metodo eloquent
      
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
        return redirect()->action([ClientController::class, 'index'])->with('exito','Cliento borrado correctamente');
    }
}
