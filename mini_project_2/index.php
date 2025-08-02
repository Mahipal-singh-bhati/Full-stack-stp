<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Goddess</title>
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
    .bg_im {
  width: 100%;
  height: 300px;
  margin-top:33px;
}
  .card{
      padding: 3px;
      margin:2%;
      background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(15px);
      border-radius:10px;
      border-style: groove;
      height: 350px;
      width: 385px;
      margin-right: 30px;
      transition: box-shadow 0.5s ease;
  }
  .card:hover{
    transform:scale(1.1);
    box-shadow: -3px -3px 3px red , 3px 3px 3px blue;

  }
  h2 {
    text-align: center;
  }
  .img{
    height:260px;
      width:300px;
      border-radius:10px;
      justify-content: center;
      margin-left: 25px;
  }
  .bg_img{
    height: 400px;
    width: 100%;
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
        <li><a href="">HOME</a></li>
      <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Occasion <span class="caret"></span></a>
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
    <div class="container-fluid">
    <div class="bg_im" style="background-image: url('image/flower.jpg');">
    </div>
    </div>
     <div class="bg_img" style="background-image: url('image/back.jpg');">
    <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
      <div class="card">
  <h2>Anniversary</h2>
  <img class="img" src="image/anni.webp" alt="Anniversary">
  </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
  <h2>Birthday</h2>
  <img class="img" src="image/bdy.jpg" alt="Birthday">
  </div>
    </div>
    </div>
    </div>
     </div>
    <footer class="foot">
      <p>
        &copy; 2025 Flower goddes. All right reserved.
      </p>
    </footer>
    
  
 </body>
 </html>
