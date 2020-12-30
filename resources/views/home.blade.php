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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">king cobura</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="registration">register</a></li>
      <li><a href="login">login</a></li>
      <li><a href="admin">admin</a></li>
      <li><a href="shopping">shopy</a></li>
    </ul>
    <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group" align="right">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <button type="submit" class="btn btn-default" al>Submit</button>
    </form>
  </div>
</nav>

<div class="container">

</div>
@yield('content')
</body>
</html>
