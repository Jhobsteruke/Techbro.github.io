<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="AMA Computer College Capstone Students">
    <link rel="stylesheet" href="CSS/styles.css">
    <meta name="description" content="IT Capstone Research and Project">
    <title>Techbro Computer Trading</title>
    <link rel="icon" type="image/png" href="Images/Techbro-Logo-3.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <nav id="navbar-main" class="navbar navbar-expand-lg bg-primary">
      <div class="container-fluid">
        <img src="Images/Techbro-Logo-1.png" style="width: 100px; height: 100;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Brands.html">Brands</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Pre-order.html">Pre-Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="About-us.html">About us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Products
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Laptop</a></li>
                <li><a class="dropdown-item" href="#">CCTV</a></li>
                <li><hr class="dropdown-divider">Computer Parts</li>
                <li><a class="dropdown-item" href="Products.html">Bundles</a></li>
              </ul>
            </li>
          <div id="Cart-Login"></div>
            <li id="cart-logo" class="nav-item" >
              <a class="nav-link" href="Carts.html">Your Cart</a>
            </li>
            <li id="Log-in" class="nav-item">
              <a class="nav-link" href="Login.html">Log in</a>
            </li>
          </div> 
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <div class="form-container">
        <div class="form-floating mb-3 mt-3">
             <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
             <label for="email">Email</label>
        </div>

        <div class="form-floating mt-3 mb-3">
            <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
             <label for="pwd">Password</label>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
  <footer class="p-3 mb-2 bg-dark text-white">
    <div class="Techbro-footer-logo">
    <img src="Images/Techbro-Logo-1.png" style="text-align: left; width: 150px; height: 150px;">
      <div class="Contact-f">
        <h3><b>Contact us</b></h3>
        <p>Phone: 0965-7626-600</p>
        <p>Tel: (045) 409-9557</p>
        <p>107 Doña Ponciana Building, Rizal St., San Nicolas, Angeles City</p>
        <p>Store Hours: Monday - Saturday, 8:00AM-6:00PM</p>
     </div>
    </div>

  
  
    <div class="copyright">
      <p>&#169;<b>AMACC Students 2023 @ Techbro Computer Trading</b>. All Rights Reserve</p>
    </div>
  </footer>

 
</html>