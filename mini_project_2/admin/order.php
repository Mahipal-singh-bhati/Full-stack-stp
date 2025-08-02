<?php
session_start();
if(!isset($_SESSION['name'])){
    header("location:login.php");
}

include ("../dbconfig.php");
$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);

if(isset($_GET['remove'])) {
    $oid = intval($_GET['remove']);
    $qry = "DELETE FROM orders WHERE order_id = $oid";
    mysqli_query($conn, $qry);
    header("Location: orders.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        .navbar-nav > li { position: relative; }
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
        .navbar-nav > li:hover::after { width: 100%; }
        .navbar { height: 75px; }
        .center-nav { float: none; display: table; margin: auto; }
        .navbar-nav > li {
            font-size: 20px;
            margin-left: 25px;
            margin-right: 25px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<h1>Admin Panel</h1>
<div class="navbar">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Admin Panel</a>
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
        <li><a href="orders.php">Orders</a></li>
        <li><a href="">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
<?php
$qry = "SELECT * FROM orders";
$resultset = mysqli_query($conn, $qry);
if(mysqli_num_rows($resultset) > 0) {
    echo "<table class='table'>";
    echo "<tr>";
    echo "<th>order_id</th>";
    echo "<th>user_id</th>";
    echo "<th>product_id</th>";
    echo "<th>Address</th>";
    echo "<th>order_amount</th>";
    echo "<th>payment_mode</th>";
    echo "<th>order_status</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    while($row = mysqli_fetch_array($resultset)) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "<td>$row[5]</td>";
        echo "<td>$row[6]</td>";
        echo "<td><a href='order.php?remove=$row[0]' style='color:red;' onclick='return confirm(\"Are you sure?\")'><span class='glyphicon glyphicon-trash'></span></a></td>";
    }
    echo "</table>";
} else {
    echo "<h3 class='text-center text-warning'>No Record Found !!!</h3>";
}
mysqli_close($conn);
?>
</body>
</html>
