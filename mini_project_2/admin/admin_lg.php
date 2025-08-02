<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <style>
    .login-box {
      background: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      width: 100%;
      border: solid 2px brown;
      background-color: yellow;
      max-width: 400px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="navbar">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="admin_lg.php">Dashboard</a></li>
      <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="add_user.php">Add New Users</a></li>
            <li><a href="view_user.php">View All Users</a></li>
        </ul> 
        </li>
         <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <span class="caret"></span></a>
            <ul class="dropdown-menu">

            <li><a href="add_produt.php">Add New Products</a></li>
            <li><a href="view_product.php">View All Products</a></li>
        </ul> 
        </li>
        <li><a href="order.php">orders</a></li>
        <li><a href="">Logout</a></li>
      </ul>
    </div>

  </div>
</nav>
  <div class="login-box">
    <h2>Admin Login</h2>
    <form method="POST">
        <label>Username:</label>
      <input type="text" name="username" placeholder="Username"><br><br>
      <label>Password:</label>
      <input type="password" name="password" placeholder="Password"><br><br>
      <button type="submit">Login</button>
    </form>
  </div>
  </div>
</body>
</html>