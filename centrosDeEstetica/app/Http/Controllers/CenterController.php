<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CenterController extends Controller
{
    //


    public function index()
    {
        // $this->authorize('viewAny',Client::class);


        if((session('admin'))){
            
            $centro = Center::all();
            $color= ['bg-success','bg-info'];
      

 
            return view('center.index',['centro'=>$centro ,'color'=>$color]);
        }else{
            return  redirect()->route('denied');
        }
       
       
    }
}
