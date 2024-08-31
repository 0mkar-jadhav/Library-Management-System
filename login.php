<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body class=" p-5" style="background-image : linear-gradient(90deg, rgba(80,108,218,1) 0%, rgba(35,203,210,1) 0%, rgba(35,85,176,1) 48%, rgba(46,3,84,1) 100%);">
  <div class="h-100 d-flex align-items-center justify-content-center">
    <div class=" border border-dark rounded  p-5 mt-5 col-md-6 " style="background-image: url('web_img/b2.jpg');
            background-size: cover;">
        <div class="container-fluid text-warning rounded p-1 mb-3">
            <h1>New Book Entry</h1>
        </div>
        <form  method="POST" class="row" action="log.php">

          <div class=" mb-3 ps-2 text-warning" >
          <label for="uname"><h5> &ensp; Username :</h5></label>
            <input type="text" class="form-control" name="uname" id="uname" placeholder="Enter first name or email" required>
            
          </div>

          <div class="mb-3 mt-3  ps-2 text-warning">
            <label for="pass"><h5>&ensp;  Password :</h5></label>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter Password" required>
            
          </div>
          
          <div class=" d-flex justify-content-between">  
          <a href="form.php" class="text-warning">Register/SingIn</a>
          <div>
            <button type="submit" value="login" name="login" class=" btn btn-dark">LOGIN</button>
            <a href="<?php if(isset($_GET['link'])){$link=$_GET['link']; if($link == 'books')echo "books.php";}else echo "web.php"; ?>" class=" btn btn-dark ms-3" onclick="this.form.reset();">CANCEL</a>
        </div>
        </div>
        </form>
    </div>
    </div>
    <?php
    if(isset($_GET['reg'])){
      $alt=$_GET['reg'];
      if($alt == 'success'){?>
        <script class="text-success">alert("Register Succesfully");</script>
      <?php 
      } 
    }
    elseif(isset($_GET['log'])){
      $alt=$_GET['log'];
      if($alt == 'not'){?>
        <script class="text-warning">alert("You have to Login First");</script>
      <?php 
    }
  }?>
  </body>
</html>