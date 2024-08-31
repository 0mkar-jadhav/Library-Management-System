<?php
  include('conn.php');
?>
<?php 
  if(isset($_POST['submit'])){
  $bname=$_POST['bname'];
  $aname=$_POST['aname'];
  $price=$_POST['price'];
  $quantity=$_POST['quantity'];

  if(isset($_FILES['image'])){
    $filename = $_FILES['image']['name'];
    $filetmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($filetmp,"book_img/".$filename);
  }

  $sql="INSERT INTO `books`(`bname`, `aname`, `price`, `file`, `quantity`) VALUES ('$bname','$aname','$price','$filename','$quantity')";
  if ($conn->query($sql) === TRUE) {
      header('location:dashboard.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
 
}
elseif(isset($_POST['update'])){
  
  $id=$_POST['user_id'];
  $bname=$_POST['bname'];
  $aname=$_POST['aname'];
  $price=$_POST['price'];
  $quantity=$_POST['quantity'];
  $oldpath=("book_img" ."/".$_POST['upload']);
  if(!empty($_FILES['image']['name'])){
    $filename = $_FILES['image']['name'];
    $filetmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($filetmp,"book_img/".$filename);
    unlink($oldpath);
  }else{
    $filename = $_POST['upload'];
  }
   $query="UPDATE `books` SET `bname`='$bname',`aname`='$aname',`price`='$price',`file`='$filename',`quantity`='$quantity' WHERE id=$id";  
  if ($conn->query($query) === TRUE) {
          header("Location: dashboard.php");
      }
      
  }


else{

  $id=$_GET['id'];
 $query="DELETE FROM `books` WHERE id=$id";
 if ($conn->query($query) === TRUE) {
     
  header("Location: dashboard.php");
}
}
?>