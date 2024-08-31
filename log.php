<?php
    include('conn.php');
?>

<?php
    if(isset($_POST['login'])){
        $uname=$_POST['uname'];
        $pass=$_POST['pass'];
        $query = "SELECT * FROM users WHERE ( fname='$uname' or email='$uname' )and pass='$pass'";
            $query_run = mysqli_query($conn, $query);
                if(mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $user) {  
                    
                $_SESSION['id']=$user['id'];
                $_SESSION['uname']=$user['fname'];
                $_SESSION['pass']=$user['pass'];
                $_SESSION['mobile']=$user['mobile'];
                $_SESSION['email']=$user['email'];
                $_SESSION['issue']=$user['issue'];
                header('location:web.php');
        }  }
        else
            header('location:web.php?error=1');
    }

    if(isset($_GET['logout'])){
         if($_GET['logout']==1) {
            session_unset(); 
            header('location:web.php');
        }
    }

    if(isset($_POST['admin'])){
        $uname=strtolower($_POST['uname']);
        $pass=$_POST['pass'];
        if($uname == 'admin' and $pass == 'admin')
        {
            header('location:dashboard.php');
        }else{
            header('location:web.php?error=1');
        }
    }
    
    if(isset($_POST['signup'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $pass=$_POST['pass'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $sql="INSERT INTO `users`( `fname`, `lname`, `email`, `mobile`, `pass`) VALUES ('$fname','$lname','$email','$mobile','$pass')";
        if ($conn->query($sql) === TRUE) {
            header('location:login.php?reg-success');
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if(isset($_POST['uEdit'])){
        $id=$_POST['id'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $sql="UPDATE `users` SET `fname`='$fname',`lname`='$lname',`email`='$email',`mobile`='$mobile' WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            header('location:web.php');
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if(isset($_SESSION['id']) and isset($_GET['book'])){
        $return=$_GET['r'];
        $bname=$_GET['book'];
        if($return=='none'){
            $_SESSION['issue']=NULL;
            $id=$_SESSION['id'];
            $sqlb="UPDATE `books` SET `quantity`= quantity+1 WHERE bname = '$bname'";
            $sql="UPDATE `users` SET `issue`=NULL WHERE id='$id'";
            if ($conn->query($sql) === TRUE) {
                header('location:books.php');
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
            if ($conn->query($sqlb) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
                die;
            }
        }else{
        $_SESSION['issue']=$bname;
        $id=$_SESSION['id'];
        $t=time();
        $date=(date("Y-m-d",$t));
        $sqlb="UPDATE `books` SET `quantity`= quantity-1 WHERE bname = '$bname'";
        $sql="UPDATE `users` SET `issue`='$bname',`time`='$date'  WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header('location:books.php');
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        if ($conn->query($sqlb) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
            die;
        } 
        }
    }elseif(isset($_GET['book'])){
        header('location:login.php?log=not&link=books');
    }
?>