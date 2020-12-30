<!DOCTYPE html>
<html>
<head>
    <title>show</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<form action="products" method="post">
	{{ csrf_field() }}
	<div class="container" >

	</div>	

</form>
<div class="container">
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>name</th>
				<th>price</th>
				<th>image</th>
				<th>action</th>
				

			</tr>
		</thead>
		<tbody>
			@foreach ($products as $product)
 <tr>
    <td>{{$product->name}}</td>
    <td>{{$product->detail}}</td>
    <td><img src="{{ URL::to('/images/' . $product->image) }}" alt="{{ $product->Title }} " style="height: 150px; width: 180px ;"/> </td>
    <td> <a href="/cart/ {{ $product->id }}" class="btn btn-primary" >add to cart</a></td>
</tr>
@endforeach 
			
		</tbody>
		
	</table>
</div>

</body>
</html>