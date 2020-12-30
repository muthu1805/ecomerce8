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
    public function cart(Request $request,$id) {

     if(Auth::user())
     {
           
        $email= Auth::user()->email;
        echo $email;  
        $product = DB::table('products')
                    ->whereIn('id', [$id])
                    ->get();
      //   foreach ($product as $key => $value) {
      //     $productId = json_encode($value->id);
      //     $productName =    json_encode($value->name);
      //     $productdetail =   json_encode($value->detail);
      //   }
      //  $count = \DB::table('cart')->count();
      //  if($count == 0) {
      //   $quote_id = "00001";
      //   DB::table('cart')->insert(array ('user' => $email,'quote_id' => $quote_id,'product_id' => $productId,'product_name' => $productName,
      //       'product_detail' => $productdetail));
      //       return redirect("/addtocart");
      // }
 }
}
}

  //     else
  //     {
  //       $cart = DB::table('cart')
  //                   ->whereIn('user', [$email])
  //                   ->get();
  //       $cartCount = $cart->count();
  //       echo $cartCount;
  //      if($cartCount !=0){
  //       foreach ($cart as $key => $cartvalue) {
  //          $quote_id2 =   json_encode($cartvalue->quote_id);
  //       }
  //       DB::table('cart')->insert(array ('user' => $email,'quote_id' => $quote_id2,'product_id' => $productId,'product_name' => $productName,
  //           'product_detail' => $productdetail));
  //             return redirect("/addtocart");
  //      }
  //     else{
  //               //  Take a last row id (example id = 4)of "cart" table  and  get the "quote_id" by cart table last row id ---> Finally you get a last row quote id
  //     //  $quote_id3 = quote id + 1;
  //     //   DB::table('cart')->insert(array ('user' => $email,'quote_id' => $quote_id3,'product_id' => $productId,'product_name' => $productName,
  //    //       'product_detail' => $productdetail));
  //    //         echo "Record inserted successfully.<br/>";
  //     //echo "You are new user";
  //          $last = DB::table('addtocart')->get()->last()->quote_id;
  //          //echo $last;
  //          $quote_id3 = ($last+ 1);
  //          echo $quote_id3;
  //             DB::table('cart')->insert(array ('user' => $email,'quote_id' => $quote_id3,'product_id' => $productId,'product_name' => $productName,
  //                 'product_detail' => $productdetail));
  //          return redirect("/addtocart");
  //     }
  //   }  
  // }
     
  //    else{

  //        echo 'WELCOME OUR GUEST';
  //     }
  //  }
   


  //     public function storeSessionData(Request $request) {
  //     $request->session()->put('cart_session', Auth::user()->email);
  //     //$currentuserid = Auth::user()->email;
  //     echo  Auth::user()->email;
  //     echo "Data has been added to session";
  //  }

//}