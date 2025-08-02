<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add_user.php</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <style>
    .navbar-nav > li {
  position: relative;
}

.navbar-nav > li::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0%;
  height: 3px;
  border-radius: 50px;
  background: red;
  transition: width 0.4s ease;
}

.navbar-nav > li:hover::after {
  width: 100%;
}
  .navbar{
    height: 75px;
  }
  .center-nav{
    float: none;
    display: table;
    margin: auto;
  }
  .navbar-nav > li {
    font-size: 20px;
    margin-left:25px ;
    margin-right:25px ;
    margin-top: 10px;
  }
    .add_user{
      background: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      width: 100%;
      border: solid 2px black;
      background-color: rgb(71, 71, 214);
      max-width: 400px;
      align-items: center;
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
    <div class="add_user">
    <h2>Add New USer</h2>
    <form method="POST">
      <label>Username:</label>
      <input type="text" name="username" placeholder="Username"><br><br>
      <label>Email:</label>
      <input type="email" name="mail" placeholder="mail"><br><br>
      <label>Password:</label>
      <input type="password" name="password" placeholder="Password"><br><br>
      <label>Confirm Password:</label>
      <input type="password" name="password" placeholder="Con. Password"><br><br>
      <label>Mobile Number:</label>
      <input type="tel" name="number" placeholder="number"><br><br>
      <label>Role:</label>
      <select name="role">
      <option>Cet.</option>
      <option>Clint</option>
      <option>Admin</option><br><br>
      <button type="submit">Register</button>
    </form>
  </div>
   </div>
</body>
</html>