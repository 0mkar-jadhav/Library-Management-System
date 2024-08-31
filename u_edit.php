<?php include('conn.php');?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>

    <title>Registration</title>
  </head>
  <body style="background-image: linear-gradient(to right, rgba(0, 192, 211, 0.9), rgb(238, 130, 238));">
  <div  >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container col-md-6 p-3 mt-5 bg-dark-subtle rounded-3"style="background-image: linear-gradient(to right, rgba(0, 192, 211, 0.9), rgb(238, 130, 238));">   
    <nav class="navbar  shadow-lg my-3 rounded bg-dark border border-dark-subtle text-white">
        <div class="container-fluid ">
             <h3>Registration Form</h3>
        </div>
    </nav> 
    <?php
                if(isset($_SESSION['id'])){
                $id = $_SESSION['id'];
                
                $query = "SELECT * FROM users WHERE  id='$id'";
                $query_run = mysqli_query($conn, $query);
                if(mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $user) {  
                    }
        ?>
        <form action="log.php" class="row px-3" method="POST">
            <div class="form-floating mb-3 mt-3 col-md-6 ps-1 ">
                <input type="hidden" class="form-control" id="id"  name="id" value="<?= $user['id']?>" >
              <input type="text" class="form-control" id="fname" placeholder="enter" name="fname" value="<?= $user['fname']?>" required>
              <label for="fname">First Name</label>
            </div>
            <div class="form-floating mb-3 mt-3 col-md-6 ps-1">
              <input type="text" class="form-control" id="lname" placeholder="enter" name="lname" value="<?= $user['lname']?>" >
              <label for="lname">Last Name</label>
            </div>
              <div class="form-floating mb-3 mt-3 ps-1">
                <input type="email" class="form-control " id="email" placeholder="Enter email" name="email" value="<?= $user['email']?>" required>
                <label for="email">Email</label>
              </div>
              <div class="form-floating mb-3 mt-3 ps-1">
                <input type="number" class="form-control " id="mobile" placeholder="Enter mobile" name="mobile" value="<?= $user['mobile']?>">
                <label for="mobile">Mobile No.</label>
              </div>
              <div class=" d-flex justify-content-end mb-3 mt-3">
                 <button type="submit" class="btn btn-dark shadow-lg border rounded-3 me-3" id=uEdit name="uEdit">Update</button>
                 <a href="<?php $link=$_GET['link']; if($link == 'books')echo "books.php"; elseif($link == 'web')echo "web.php"; ?>" class=" btn btn-secondary " onclick="this.form.reset();">CANCEL</a>
              </div>
        </form>
        <?php
                }
                }
        ?>
        </div>

    </div>


  </body>