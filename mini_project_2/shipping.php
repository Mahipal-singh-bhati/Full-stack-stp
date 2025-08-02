<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('location:login.php');
    exit;
}
?>
<?php
$msg ="";
if (isset($_POST['btnorder'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $no = $_POST['phone'];
    $add = $_POST['address'];
    $address ="$name,$add,$email,$no";
    $paymethod = $_POST['payment_method'];
    include("dbconfig.php");
    $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
     $qry ="insert into orders(user_id,product_id,Adress ,order_amount,payment_mode,order_status)values($_SESSION[uid],'$_COOKIE[cart]','$address',$_SESSION[total],'$paymethod','pending')";
     mysqli_query($conn,$qry);
     if(mysqli_affected_rows($conn)>0){
        $msg ="<h3 class='color:green;'>Order place successfully</h3>";
     }
     else{
         $msg ="<h3 class='color:red;'>Order not place</h3>";
     }
     mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shipping Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
    }
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
    .shipping-form {
      max-width: 600px;
      background: white;
      margin: 40px auto;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .shipping-form h2 {
      margin-bottom: 20px;
      text-align: center;
      color: #333;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
      color: #555;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }
    .radio-group {
      display: flex;
      gap: 15px;
      padding-top: 6px;
    }
    button {
      background: #28a745;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
    }
    button:hover {
      background: #218838;
    }
  </style>
</head>
<body>
  
    <?php
    echo $msg;
    ?>
     
  <form class="shipping-form" method="POST">
    <h2>Shipping Details</h2>

    <div class="form-group">
      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name="name" required>
    </div>

    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" required>
    </div>

    <div class="form-group">
      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}">
    </div>

    <div class="form-group">
      <label for="address">Street Address</label>
      <textarea id="address" name="address" rows="3" required></textarea>
    </div>

    <div class="form-group">
      <label>Payment Method</label>
      <div class="radio-group">
        <label><input type="radio" name="payment_method" value="Cash on Delivery" required> Cash</label>
        <label><input type="radio" name="payment_method" value="UPI" required> UPI</label>
        <label><input type="radio" name="payment_method" value="Card" required> Card</label>
      </div>
    </div>

    <button type="submit" name="btnorder">Submit Shipping Info</button>
  </form>
<footer class="foot">
      <p>
        &copy; 2025 Flower goddes. All right reserved.
      </p>
    </footer>
</body>
</html>