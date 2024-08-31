<!doctype html>
<?php
  require_once('conn.php');
  if(!empty($_GET['sbook']))
  {
    $bname = $_GET['sbook'];
    $sql1 = "SELECT * FROM `books` WHERE lower(bname) = lower('$bname')";
  }
  else{
    $sql1 = "SELECT * FROM `books`";
  }
  $result = $conn->query($sql1);
  if (!$conn -> query("SELECT * FROM `books`")) {
    echo("Error description: " . $conn -> error);
    die;
  }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Entry</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  
  <nav class="navbar  shadow-lg p-3  bg-body rounded">
    <div class="container-fluid bg-secondary text-white rounded">
      <a class="navbar-brand" href="books.php"><h1>Book Center</h1></a>
      <form class="d-flex" action="" method="get">
        <input type="text" class="form-control" id="sbook" name="sbook" placeholder="Search">
        <button class="btn btn-outline-light ms-1 me-3" type="submit" id="search" name="search">Search</button>
        <?php if(!empty($_SESSION['uname'])){
          echo "<button type='button' class='btn btn-info me-1' data-bs-toggle='modal' data-bs-target='#user'>". strtoupper($_SESSION['uname']) ."</button>";
        }else{
          echo "<a href='login.php?link=books' class='btn btn-outline-info me-1 '>Login</a>";
        }
        ?>
        <a href="web.php" class="btn btn-dark ms-1">Back</a>
      </form>    
    </div>
  </nav>

  <div class="modal fade" id="user" tabindex="-1" aria-labelledby="user" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="user">User Details</h1>
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
        <a href="u_edit.php?link=books" class="btn btn-warning">Edit</a>
        <a href="log.php?logout=1&link=books" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>

  <?php
    if ($result->num_rows > 0) {
        
        echo "<div class='row '>";
        while($row = $result->fetch_assoc()) {
    ?>
    <div class=" col-sm-2">
  <div class="card m-4 text-bg-dark" style="width: 11rem;">
  <img src="book_img/<?= $row['file']?>" class="card-img-top" style="width: 11rem; height: 5rem; " alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $row['bname']?></h5>
  </div>
  <ul class="list-group list-group-flush ">
    <li class="list-group-item text-bg-secondary">Author : <?= $row['aname']?></li>
    <li class="list-group-item text-bg-secondary">Price : <strong><?= $row['price']?></strong></li>
    <li class="list-group-item text-bg-secondary">Quantity : <?= $row['quantity']?></li>
  </ul>
  <div class="card-body d-flex">
  <a href="log.php?book=<?= $row['bname']?>" class="btn btn-danger me-1 <?php  if(isset($_SESSION['issue']) ) echo 'disabled'; elseif($row['quantity']==0) echo 'disabled'; else echo ' ';?>">Issue</a>
  <a href="log.php?r=none&book=<?= $row['bname']?> " class="btn btn-success <?php if(isset($_SESSION['issue'])){if($_SESSION['issue'] != $row['bname']) echo 'disabled';}else echo 'disabled'; ?>">Return</a>
  </div>
</div>
</div>
<?php
    }
    echo "</div>";
    }
?>

<?php  if(!empty($_SESSION['issue']) ){ echo 'disabled';}?>
</body>
</html>