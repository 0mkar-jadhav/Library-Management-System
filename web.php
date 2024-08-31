<!DOCTYPE html>
<?php include('conn.php');
  $sql1 = "SELECT * FROM `books`";
  $result = $conn->query($sql1);
  if (!$conn -> query("SELECT * FROM `books`")) {
    echo("Error description: " . $conn -> error);
    die;
  }
?>
<html lang="en">
<head>
  <title>Book Zone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
</head>
<body style="background-image: url('web_img/bk.jpg'); background-position: center; background-size: 1450px 1080px; background-repeat: no-repeat;">

<nav class="navbar navbar-expand-sm navbar-dark bg-dark bg-gradient m-2 rounded">
  <div class="container-fluid">
    <a class="navbar-brand" href="web.php">
        <img src="web_img/bookZone.png" alt="" class="rounded me-1" width="30" height="30">
        Book Zone</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="books.php">Books</a>
        </li>
        <li class="nav-item dropdown">
            <li><a class="nav-link" href="achivDashboard.php">Achievements</a></li>
        </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="event.php">Event</a>
        </li>
      </ul>
      <?php if(!empty($_SESSION['uname'])){
      echo "<button type='button' class='btn btn-info me-3' data-bs-toggle='modal' data-bs-target='#userModel'>". strtoupper($_SESSION['uname']) ."</button>";
  
    }else{
      echo "<a href='login.php?link=web' class='btn btn-outline-info me-3 '>Login</a>";
      }
    ?>
      <button type="button" class=" btn btn-outline-danger me-4" data-bs-toggle="modal" data-bs-target="#adminModel">ADMIN</button>
      
<div class="modal fade" id="adminModel" tabindex="-1" aria-labelledby="adminModel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark bg-gradient text-white">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="adminModel">Admin Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST" class="row" action="log.php">
        <div class=" mb-3 ps-2" >
            <label for="uname"><h5> &ensp; Username :</h5></label>
            <input type="text" class="form-control" name="uname" id="uname" placeholder="Enter first name or email" required>
        </div>
        <div class="mb-3 mt-3  ps-2">
            <label for="pass"><h5>&ensp;  Password :</h5></label>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter Password" required>
        </div>
        <div class=" d-flex justify-content-end">  
                <button type="submit" value="admin" name="admin" class=" btn btn-dark me-2">LOGIN</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="userModel" tabindex="-1" aria-labelledby="userModel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="userModel">User Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">Name : <?= ucfirst($_SESSION['uname']); ?> </div>
        </div>
        <div class="row">
          <div class="col-md-6">Email : <?= $_SESSION['email'] ?> </div>
        </div>
        <div class="row">
          <div class="col-md-6">Mobile Number : <?= $_SESSION['mobile'] ?> </div>
        </div>
        <div class="row">
          <div class="col-md-6">Book issued : <?php if(!empty($_SESSION['issue'])) echo $_SESSION['issue']; else echo "None";?> </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="u_edit.php?link=web" class="btn btn-warning">Edit</a>
        <a href="log.php?logout=1" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>

 </div>
  </div>
</nav>

<div class=" d-flex justify-content-center">
  <h1><b>Department Of Computer Engineering</b></h1>
</div>
<div class='container my-5 border border-dark rounded'>
  <div class="container d-flex justify-content-between">
    <h3 class="text-white text-bg-dark mt-1">&nbsp Books &nbsp</h3>
    <a href='books.php' class=" text-info ">See more</a>
  </div>
<?php
    if ($result->num_rows > 0) {
        echo "<div class='row '>";
        $i=0;
        while($row = $result->fetch_assoc()) {
         if($i<6){ 
    ?>
    <div class=" col-sm-1 mx-5 mb-3">
  <div class="card text-bg-dark" style="width: 11rem;">
  <img src="book_img/<?= $row['file']?>" class="card-img-top" style="width: 11rem; height: 5rem; " alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $row['bname']?></h5>
  </div>
  <ul class="list-group list-group-flush ">
    <li class="list-group-item text-bg-secondary">Author : <?= $row['aname']?></li>
    <li class="list-group-item text-bg-secondary">Price : <strong><?= $row['price']?></strong></li>
    <li class="list-group-item text-bg-secondary">Quantity : <?= $row['quantity']?></li>
  </ul>
</div>
</div>
<?php
        }
    $i++;
  }
    echo "
    </div>";
}
?>
</div>

<?php
    if(isset($_GET['error'])){
    $error=$_GET['error'];
    if($error == '1'){?>
      <script>alert("Incorrect Username and Password");</script>
<?php } }?>

</body>
</html>


