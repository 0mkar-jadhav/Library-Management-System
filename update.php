<?php
 include('conn.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class=" container border border-dark rounded p-5 mt-5 col-md-6 h-75  ">
        <div class="container-fluid bg-secondary text-white rounded p-1 mb-3">
            <h1>Update Book</h1>
        </div>
        <?php
                $id = $_GET['id'];
                $query = "SELECT * FROM books WHERE  id='$id'";
                $query_run = mysqli_query($conn, $query);
                if(mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $user) {  
                    }
        ?>
        <form  method="POST" class="row" action="data.php" enctype="multipart/form-data" >

          <div class="form-floating mb-3 ps-2" >
            <input type="text" class="form-control" name="bname" id="bname" placeholder="First Name" value="<?= $user['bname']; ?>"required>
            <input type="hidden" id="user_id" name="user_id" value="<?= $_REQUEST['id']; ?>">
            <label for="fname">Title of Book</label>
          </div>

          <div class="form-floating mb-3 mt-3  ps-2">
            <input type="text" class="form-control" name="aname" id="aname" placeholder="Last Name" value="<?= $user['aname']; ?>" required>
            <label for="lname">Author Name</label>
          </div>


          <div class="form-floating mb-3 mt-3 col-md-6 ps-2">
                <input type="number" class="form-control " id="price" name="price" placeholder="Enter email" value="<?= $user['price']; ?>" required >
                <label for="email">Price of Book</label>
          </div>


          <div class="form-floating mb-3 mt-3 col-md-6 ps-2">
                <input type="number" class="form-control " id="quantity" name="quantity" placeholder="Enter" value="<?= $user['quantity']; ?>" required >
                <label for="email">Quntity</label>
          </div>

          <div class="mb-3 p-2">
          <img  src="book_img/<?= $user['file']; ?>" height="150" width="150">
            <input type="file" class="form-control" name="image" id="image">
            <input type="hidden" name="upload" id="upload"  value="<?= $user['file']; ?>" >
          </div>


        <div class=" d-flex justify-content-center">  
            <button type="submit" value="update" name="update" class=" btn btn-dark">UPDATE</button>
            <a href="dashboard.php" class=" btn btn-secondary ms-3" onclick="this.form.reset();">CANCEL</a>
        </div>
      </form>
      <?php
    }
      ?>
      </div>
  </body>
</html>