<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientTreatment;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientTreatmentController extends Controller
{
    //


    public function edit($id)
    {

        if((session('admin'))){


            
      
            $day=date("Y-m-d",strtotime(today()));
            $tratamientos = DB::table('client_treatment')
                ->where('client_id', '=', $id)
                ->where( 'created_at','LIKE',"%".$day."%")
                ->get();
                
    
                
  
                if(!isset($tratamientos[0])){

                    $tratamientoParaCliente= Client::find($id);
                    // $this->authorize("update",$client);
                    $tratamientoList = Treatment::all();
                   
                    
                    return view('tratamientoParaClientes.edit',['tratamientoParaCliente'=>$tratamientoParaCliente, 'tratamientoList'=>$tratamientoList]);
                }else{

                    return redirect()->action([ClientController::class, 'index'])->with('error',"El Cliente tiene un tratamiento ya asignado para la fecha $day");

                }



    }else{
        return  redirect()->route('denied'); 
    }
    }


    public function update(Request $request, $id)
    {
       


        $p= Client::find($id);
        $id=$p->id;
        $t= new ClientTreatment();
        $t->client_id=$id;
        $t->treatment_id=$request->input("treatment_id");
        $t->save();
        return redirect()->action([ClientController::class, 'index'])->with('exito','Cliente tratamiento añadido correctamente');

      
    }
}
