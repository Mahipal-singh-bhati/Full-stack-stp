<?php
session_start();
?>
<?php
$msg = "";
if(isset($_POST['registerbutton'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];
  $phone = $_POST['phone'];
  $conn = @mysqli_connect("localhost","root","","flower_goddess");
  if($conn==null){
    $msg = "<h2><font color='red';>connection Failure !!!!!</font><h2>";
  }
  else{
    $qry="insert into users(name, email, password, phone, role) values('$name', '$email', '$pwd', $phone, 'client')";
    mysqli_query($conn, $qry);
    if(mysqli_affected_rows($conn)>0){
      $msg = "<h4><font color='green'>Account created succesfully !!!</font></h4>";
    
    }
    else{
      $msg = "<h4><font color='red'>Error in creating the account (try again) !!!</font></h4>";
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
    <title>Register</title>
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
    .regi {
      margin-top: 45px;
      text-align:center;
      background: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      width: 100%;
      border: solid 2px black;
      background-color: yellow;
      max-width: 400px;
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
    <div class="regi">
    <h2>Create New Account</h2>
    <form method="POST">
      <label>Username:</label>
      <input type="text" name="name" placeholder="name"><br><br>
      <label>Email:</label>
      <input type="email" name="email" placeholder="mail"><br><br>
      <label>Password:</label>
      <input type="password" name="pwd" placeholder="password"><br><br>
      <label>Confirm Password:</label>
      <input type="password" name="pwd" placeholder="Con. Password"><br><br>
      <label>Mobile Number:</label>
      <input type="tel" name="phone" placeholder="Number"><br><br>
      <button type="submit" name="registerbutton">Register</button>
    </form>
  </div>
  <footer class="foot">
      <p>
        &copy; 2025 Flower goddes. All right reserved.
      </p>
    </footer>
</body>
</html>