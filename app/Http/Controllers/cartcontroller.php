<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\cart;
use App\product;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;


class cartcontroller extends Controller
{
    public function cart(Request $request,$id) 
  {

     if(Auth::user())
   {
           
        $email= Auth::user()->email;
        //echo $email;  
       $product = DB::table('products')
                    ->whereIn('id', [$id])
                    ->get();
      //echo $product;
       foreach ($product as $key => $value)
        {
           $productId = json_encode($value->id);
           $productName =    json_encode($value->name);
           $productdetail =   json_encode($value->detail);
        }

      $count = \DB::table('cart')->count();
     // echo $count;
      if($count == 0)
     {
        $quote_id = "00001";
         DB::table('cart')->insert(array ('user' => $email,'quote_id' => $quote_id,'product_id' => $productId,'product_name' => $productName,
             'product_price' => $productdetail));
              return redirect("/addtocart");
           // echo "insert";
      }
           else
   {
         
         $cart = DB::table('cart')
                ->whereIn('user', [$email])
                   ->get();
                   $cartCount = $cart->count();
                   //echo $cartCount;
            if($cartCount !=0)
      {

          foreach ($cart as $key => $cartvalue)
         {
           $quote_id2 =   json_encode($cartvalue->quote_id);
            echo $quote_id2 ;
         }
       DB::table('cart')->insert(array ('user' => $email,'quote_id' => $quote_id2,'product_id' => $productId,'product_name' => $productName,
            'product_price' => $productdetail));
            return redirect("/addtocart");
            
      }
         else
      {
        echo "string";
        $quote_id = "00001";
        //  $quote_id3 = $quote_id  + 1;
        //  echo $quote_id3 ;
        // DB::table('cart')->insert(array ('user' => $email,'quote_id' => $quote_id3,'product_id' => $productId,'product_name' => $productName,
        //     'product_price' => $productdetail));
        //  echo "Record inserted successfully.<br/>";
        //  echo "You are new user";
           $last = DB::table('cart')->get()->last()->quote_id;
           echo $last;
           $quote_id3 = ($last+ 1);
           echo $quote_id3;
             DB::table('cart')->insert(array ('user' => $email,'quote_id' => $quote_id3,'product_id' => $productId,'product_name' => $productName,
                   'product_price' => $productdetail));
          return redirect("/addtocart");
        
      }
   }
  
 }
}
public function insert(Request $request)
{
  
    $quote = $request->quote_id;
    $total=  $request->total;
    $email=  $request->email;
    $count=  $request->count;
    echo $quote;
             DB::table('quote_order')->insert(array ('quote_id' => $quote,'total' => $total,'item_count' => $count,'user' => $email));
          echo "insert successfully";
          //return Redirect::route('checkout',['id'=>$quote]);
         // return redirect()->route('checkout', ('id' =>$quote));
         //  return redirect('checkout', compact($quote));
         //return view('checkout', compact($quote));

    }

}

