<?php
session_start();
?>
<?php
if (!isset($_GET['pid'])) {
  header("location:index.php");
} else {
  $pid = $_GET['pid'];
  include('dbconfig.php');
  $con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
  $qry = "select * from products where product_id=$pid";
  $result = mysqli_query($con, $qry);
  $row = mysqli_fetch_array($result);
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
    .navbar {
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
      height: 75px;
      width: 150px;
      border-radius: 8px;
    }
    .center-nav {
      float: none;
      display: table;
      margin: auto;
    }
    .navbar-nav > li {
      font-size: 20px;
      margin-left: 25px;
      margin-right: 25px;
      margin-top: 10px;
    }
    .foot {
      margin-top: 10px;
      font-size: 25px;
      text-decoration: solid;
      text-align: center;
      height: 100px;
      width: 100%;
      background-color: rgb(38, 38, 199);
    }
    .vcenter {
      display: table;
      height: 100%;
      width: 100%;
    }
    .vcenter-content {
      display: table-cell;
      vertical-align: middle;
    }
    img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Flower<br><br>Goddess</a>
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
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-5" style="padding:40px;">
        <img class="img-rounded" src="<?php echo $row[4]; ?>" />
      </div>
      <div class="col-sm-5" style="padding:40px;">
        <div class="vcenter">
          <div class="vcenter-content">
            <h3><?php echo $row[1]; ?></h3>
            <h3><?php echo $row[2]; ?></h3>
            <h4>Description</h4>
            <p><?php echo $row[3]; ?></p>
            <a href="cart.php?pid=<?php echo $row[0]; ?>" class="btn btn-warning">Add To Cart</a>
          </div>
        </div>
      </div>
      <div class="col-sm-1"></div>
    </div>
  </div>
  <footer class="foot">
    <p>&copy; 2025 Flower goddes. All right reserved.</p>
  </footer>
</body>
</html>
