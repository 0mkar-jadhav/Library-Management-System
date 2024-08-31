<?PHP
    include('conn.php');

  $sql1 = "SELECT * FROM `achivment`";
  $result = $conn->query($sql1);
  if (!$conn -> query("SELECT * FROM `books`")) {
    echo("Error description: " . $conn -> error);
    die;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Achivment Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<nav class="navbar  shadow-lg p-3  bg-body rounded">
    <div class="container-fluid bg-secondary text-white rounded">
    <a class="navbar-brand" href="achivDashboard.php"><h1>Achivment</h1></a>  
    <a href="web.php" class="btn btn-dark ms-1">Back</a>  
  </div>
</nav>
<div class=" container my-5">
    <table class="table table-secondary table-striped table-hover mt-2">
    <thead>
      <tr>
        <th scope="col">SrNo</th>
        <th scope="col">Name</th>
        <th scope="col">Year</th>
        <th scope="col">Email</th>
        <th scope="col">Achivment</th>
        <th scope="col">Name of Competition</th>
        <th scope="col">Certificate</th>
      </tr>
    </thead>
    <tbody>
      
        <?php
        if ($result->num_rows > 0) {
        //output data of each row
          while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['srno'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['achiv'] . "</td>";
            echo "<td>" . $row['noc'] . "</td>";
            echo "<td><a href='". $row['certi']."' target='_blank'>" . $row['certi'] . "</a></td>";
          }
        }
        ?>
    </tbody>
</table>
</div>
</body>
</html>