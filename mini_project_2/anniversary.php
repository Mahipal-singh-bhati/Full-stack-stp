<?php
session_start();
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
  .foot{
      margin-top:10px;
    font-size: 25px;
    text-decoration: solid;
    text-align: center;
    min-hieght: 550px;
    width: 100%;

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
    <div class="container-fluid">
        <?php
        include ("dbconfig.php");
$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
$qry = "select * from products where product_type='anniversary'";
$resultset = mysqli_query($conn, $qry);
if(mysqli_num_rows($resultset) > 0){
    $count = 0;
    while($row = mysqli_fetch_assoc($resultset)){
        if($count == 0)
            echo "<div class='row' style='margin-bottom:15px'>";

        echo "<div class='col-sm-3'>";
        echo "<a href='desc.php?pid=$row[product_id]'>";
        echo "<div class='box'>";
        echo "<div class='row'><div class='col-sm-12'>";
        echo "<img src='$row[product_image]' style='border-radius:10px'/>";
        echo "</div></div>";
        echo "<div class='row'><div class='col-sm-12'>";
        echo "<h4 style='padding-left:10px'>$row[product_name]</h4>";
        echo "</div></div>";
        echo "<div class='row'><div class='col-sm-12'>";
        echo "<h4 style='padding-left:10px'>&#8377; $row[product_price]</h4>";
        echo "</div></div>";
        echo "</div>";
        echo "</div>";

        $count++;

        if($count == 4){
            echo "</div>";
            $count = 0;
        }
    }
}
?>

  </div>
</nav>
    </div>
    </div>
    <footer class="foot">
      <p>
        &copy; 2025 Flower goddes. All right reserved.
      </p>
    </footer>
</body>
</html>