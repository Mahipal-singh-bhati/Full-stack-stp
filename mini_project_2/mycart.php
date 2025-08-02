<?php
session_start();
if(!isset($_SESSION['name'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping</title>
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
    .shipping {
      margin-top: 45px;
      text-align:center;
      background: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      width: 100%;
      border: solid 2px black;
      background-color: red;
      max-width: 550px;
      align-items: center;
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
    <?php
        if (isset($_COOKIE['cart'])) {
          $id = $_COOKIE['cart']; // e.g., "1,2,3"
          include("dbconfig.php");
          $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);

          $qry = "SELECT * FROM products WHERE product_id IN ($id)";
          $resultset = mysqli_query($conn, $qry);
          
          $total = 0;
          echo "<table class='table table-bordered'>";
          echo "<tr>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Action</th>
                </tr>";

          while ($row = mysqli_fetch_array($resultset)) {
            echo "<tr>";
            echo "<td><img src='$row[4]' width='100'></td>";
            echo "<td>$row[1]</td>";
            echo "<td>₹$row[2]</td>";
            echo "<td><a href='remove.php?pid=$row[0]' style='color:red;'><span class='glyphicon glyphicon-trash'></span></a></td>";
            echo "</tr>";
            $total += $row[2];
          }

          echo "<tr>
                  <td colspan='2'><strong>Total Amount</strong></td>
                  <td><strong>₹$total</strong></td>
                  <td></td>
                </tr>";
          echo "</table>";
          echo"<a href='shipping.php' class='btn btn-primary'>Place Order</a>";
          $_SESSION['total']=$total;
        } else {
          echo "<h2 class='text-center'>Cart is empty</h2>";
        }
        ?>
        
      </div>
      <div class="col-sm-2"></div>
    </div>
   
  </div>
    <footer class="foot">
      <p>
        &copy; 2025 Flower goddes. All right reserved.
      </p>
    </footer>
</body>
</html>