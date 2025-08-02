<?php
$msg = "";
if(isset($_POST['Add_Product'])){
  $name = $_POST['name'];
  $price = $_POST['price'];
  $des = $_POST['des'];
  $Type = $_POST['Type'];

  $img_name = $_FILES['img']['name'];
  $tmp_name = $_FILES['img']['tmp_name'];
  $img_path = "uploads/" . basename($img_name);
  move_uploaded_file($tmp_name, $img_path);

  $conn = mysqli_connect("localhost", "root", "", "flower_goddess");

  if(!$conn){
    $msg = "<h2><font color='red'>Connection failed !!!!</font></h2>";
  }
  else{
    $qry = "INSERT INTO products (product_name, product_price, product_description, product_image, product_type) 
            VALUES ('$name', '$price', '$des', '$img_path', '$Type')";
    mysqli_query($conn, $qry);
    if(mysqli_affected_rows($conn) > 0){
      $msg = "<h4><font color='green'>Submitted successfully!</font></h4>";
    } else {
      $msg = "<h4><font color='red'>Error in submitting! Try again.</font></h4>";
    }
    mysqli_close($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add_product</title>
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
    .product {
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

            <li><a href="addprodut.php">Add New Products</a></li>
            <li><a href="view_product.php">View All Products</a></li>
        </ul> 
        </li>
        <li><a href="order.php">orders</a></li>
        <li><a href="">Logout</a></li>
      </ul>
    </div>

  </div>
</nav>
    <div class="product">
    <h2>Add New Product</h2>
    <form method="POST" enctype="multipart/form-data">
      <label>Product Name:</label>
      <input type="text" name="name" placeholder="Product name"><br><br>
      <label>Product Type:</label>
<select name="Type">
  <option value="Birthday">Birthday</option>
  <option value="Anniversary">Anniversary</option>
</select><br><br>

      <label>Product Price:</label>
      <input type="text" name="price" placeholder="Enter Price"><br><br>
      <label>Product Description:</label>
      <textarea name="des"></textarea><br><br>
      <label>Product image:</label>
      <input type="file" name="img" placeholder=""><br><br>
      <button type="submit" name="Add_Product">Add Product</button>
    </form>
  </div>
   </div>
</body>
</html>