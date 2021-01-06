@extends('home')
@section('content')


{{ $email= Auth()->user()->email }}
<!-- {{ $carts=DB::table('cart')
    ->whereIn('user', [$email])
        -> get() }} -->
    <table class="table table-bordered">
        <tr>
            <th>cartid</th>
            <th>productid</th>
            <th>product name</th>
            <th>product price</th>
            <!-- <th>totel</th>
            <th>grant totel</th> -->
          <?php   $sum= array(); ?>   
         @foreach ($carts as $cart)
        <?php   $quote_id=  json_encode($cart->quote_id ) ?>
 <tr>
           <td>{{ json_encode($cart->id ) }}</td>
            <td>{{ json_encode($cart->product_id ) }}</td>
            <td>{{ json_decode($cart->product_name) }}</td>
            <td>{{ json_decode($cart->product_price )}}</td>
            <?php $sum[]=  json_decode($cart->product_price );?>
                      <!-- <?php echo array_sum($sum); ?> -->
            <!--  <td><?php echo array_sum($sum); ?></td> --> 
    
          
          
  </tr>   

  
 @endforeach   

    <div style="text-align:right;">
	<td></td>
	<td></td>
	<td> total: <br> <b>grant total: </b> </td><br>
	<td ><?php echo array_sum($sum); ?> <br>
     <b><?php echo array_sum($sum); ?></b>
	 </td>

     
</div>
<?php $count = DB::table('cart')
                    ->whereIn('user', [$email])
                    -> count() ?>
 <?php $total=array_sum($sum); ?>
         
</table>  


    
 
<form action="/insert" method="post">
  {{ csrf_field() }}
    <input type="hidden" name="quote_id" value="{{$quote_id}}">
    <input type="hidden" name="total" value="{{$total}}"> 
    <input type="hidden" name="email" value="{{$email}}"> 
    <input type="hidden" name="count" value="{{$count}}"> 
   <p align="right"><input type="submit" name="" value="Checkout" class="btn btn-primary" ></p> 
</form>

     
 
  







@endsection	

