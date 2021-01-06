<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-success ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/home">BOOTSGRIDS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/dashboard">user</a></li>
      <li><a href="/admin">ADMIN</a></li>
        <li><a href="/shopping">Shopy</a></li>

     <!--  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li> -->

    </ul>

   <!--  <div class="">
        <input type="text" class="" placeholder="Search">
        <button type="submit" class="btn btn-default">Submit</button>
      </div> -->
      
    <ul class="nav navbar-nav navbar-right">
     
      @if(Auth()->user())
       <!-- {{ $email= Auth()->user()->email }}
       -->

      <!-- Check session using if condition -->
       
       
      <li><a href="/addtocart"><span class="glyphicon glyphicon-shopping-cart"></span> cart
      ({{ DB::table('cart')
                    ->whereIn('user', [$email])
                    -> count() }}  )</a>
        <!-- <span> Shopping cart product count </span> -->
      </li>
      @else
 <li><a href="/addtocart"><span class="glyphicon glyphicon-shopping-cart"></span> cart</a></li> 
 @endif
      <li><a href="/registration"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  @yield('content') 
</div>
</body>
</html>
