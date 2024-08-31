<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>

    <title>Registration</title>
  </head>
  <body style="background-image: url('logo/logo_w.jpg');
                 background-size: cover;">
  <div  >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container col-md-6 p-3 mt-5 rounded-3">   
    <nav class="navbar  shadow-lg my-3 rounded bg-dark border border-dark-subtle text-white">
        <div class="container-fluid ">
             <h3>Registration Form</h3>
        </div>
    </nav> 
    
        <form action="log.php" class="row px-3" method="POST">
            <div class="form-floating mb-3 mt-3 col-md-6 ps-1 ">
              <input type="text" class="form-control" id="fname" placeholder="enter" name="fname" required>
              <label for="fname">First Name</label>
            </div>
            <div class="form-floating mb-3 mt-3 col-md-6 ps-1">
              <input type="text" class="form-control" id="lname" placeholder="enter" name="lname" >
              <label for="lname">Last Name</label>
            </div>
              <div class="form-floating mb-3 mt-3 ps-1">
                <input type="email" class="form-control " id="email" placeholder="Enter email" name="email" required>
                <label for="email">Email</label>
              </div>
              <div class="form-floating mb-3 mt-3 ps-1">
                <input type="number" class="form-control " id="mobile" placeholder="Enter" name="mobile">
                <label for="mobile">Mobile No.</label>
              </div>
              <div class="form-floating mb-3 mt-3 ps-1">
                <input type="password" class="form-control " id="pass" placeholder="Enter" name="pass" required>
                <label for="pass">Password</label>
              </div>
              <div class=" d-flex justify-content-end mb-3 mt-3">
                 <button type="submit" class="btn btn-dark shadow-lg border rounded-3 me-3" id=signup name="signup">SIGN UP</button>
                 <a href="login.php" class=" btn btn-secondary " onclick="this.form.reset();">CANCEL</a>
              </div>
        </form>
        </div>

    </div>


  </body>