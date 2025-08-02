<?php
session_start();
$msg = "";
if(isset($_POST['btnlogin'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  include("dbconfig.php");
  $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
  $qry = "select * from users where email='$username' and password='$password' and role='client'";
  $resultset = mysqli_query($conn, $qry);
  if(mysqli_num_rows($resultset)>0){
    $row= mysqli_fetch_array($resultset);
    $_SESSION['uid'] = $row[0];
    $_SESSION['name'] = $row[1];
    header("location:index.php");
  }
  else{
    $msg = "Invalid Username & Password!!!!";
  }
  mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
    margin-top: 30px;
    height: 75px;
  }
  
   .navbar-brand {
    font-size: 25px;
    padding: 5px;  
    font-weight: bold;
    color: #ff69b4 !important;
    background-color: white;
    font-family: 'Great Vibes', cursive;
    height:75px;
    width:150px;
    border-radius: 8px;
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
    .login-box {
      margin-top: 45px;
      text-align:center;
      background: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      width: 100%;
      border: solid 2px black;
      background-color: rgb(71, 71, 214);
      max-width: 400px;
      text-align: center;
    }
    .foot{
      margin-top:10px;
    font-size: 25px;
    text-decoration: solid;
    text-align: center;
    height: 100px;
    width: 100%;
    background-color: rgb(38, 38, 199);
  }
 </style>
</head>
<body>
  <div class="navbar">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"> Flower <br><br> Goddess</a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav center-nav">
        <li><a href="index.php">HOME</a></li>
      <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Occasion<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="anniversary.php">Anniversary</a></li>
            <li><a href="birthday.php">Birthday</a></li>
        </ul>
      </li>
        <li><a href="">Contact</a></li> 
      <li class="dropdown">
           <a class="dropdown-toggle" data-toggle="dropdown" href="#" ><?php 
            if(isset($_SESSION['name']))
              echo $_SESSION['name'];
            else
              echo "My Account";
            ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="vieworde.php">View order</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul> 
        </li>
        <li><a href="mycart.php">My Cart</a></li>
      </ul>
    </div>

  </div>
</nav>
    </div>
    </div>
    <div class="login-box">
    <h2>User Login</h2>
    <form method="POST">
        <label>Username:</label>
      <input type="text" name="username" placeholder="Username"><br><br>
      <label>Password:</label>
      <input type="password" name="password" placeholder="Password"><br><br>
      <label><input type="checkbox" name="remember">Remember Me</label><br><br>
      <button type="submit" name="btnlogin" class="btn btn-primary btn-block">Login</button>
    </form>
  </div>
  <h3 class="text-center text-danger"><?php echo $msg; ?></h3>
<footer class="foot">
      <p>
        &copy; 2025 Flower goddes. All right reserved.
      </p>
    </footer>
</body>
</html>