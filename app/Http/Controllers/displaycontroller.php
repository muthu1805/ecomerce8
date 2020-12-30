<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
class displaycontroller extends Controller
{
     public function index()
    {
    	//return (product::all()); 
       $products['products']=product::all();
        return view ('shopping',$products);
    }
}
