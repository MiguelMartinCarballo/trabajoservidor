<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    //


    public function index()
    {
        // $this->authorize('viewAny',Client::class);


        if((session('admin'))){
            
            $centro = Center::all();
 
            return view('center.index',['centro'=>$centro]);
        }else{
            return  redirect()->route('denied');
        }
       
       
    }
}
