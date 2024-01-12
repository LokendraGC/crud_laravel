<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request; 

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        $customer = new Customer();
         $fileName = time(). "-ws.". $request->file('image')->getClientOriginalName();
         echo $request->file('image')->storeAs('public/uploads',$fileName);
         $customer->image = $request['image'];        
         $customer->save();

    }
}
