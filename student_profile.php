<?php

session_start();

if(!isset($_SESSION['username'])){

    header("location:login.php");
}

elseif($_SESSION['usertype']=='admin'){

    header("location:login.php");
}

$host = "localhost";
$username = "root";
$password = "";
$db = "school_project";


$data = mysqli_connect($host, $username, $password, $db);

$name=$_SESSION['username'];

$sql="SELECT * FROM user1 WHERE username='$name'";

$result=mysqli_query($data, $sql);

$info=mysqli_fetch_assoc($result);


if(isset($_POST['update_profile'])){

    $s_email=$_POST['email'];
    $s_phone=$_POST['phone'];
    $s_password=$_POST['password'];

    $sql="UPDATE user1 SET email='$s_email', phone='$s_phone', password='$s_password' WHERE username='$name'";

    $result=mysqli_query($data, $sql);

    if($result){

        // echo "update success";
        header('location:student_profile.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- <link rel="stylesheet" href="admin.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->

    <?php 

    include 'student_css.php'
    
    
    
    ?>

    <style>
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg{
            background-color: skyblue;
            width: 500px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>


</head>
<body>
    
    <?php 

    include 'student_sidebar.php'


    ?>


    <div class="content">
    <center>
     <form action="#" method="POST">

    <div class="div_deg">

        <h1>Update Profile</h1> <br>

        <!-- <div>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo "{$info['username']}"?>">
        </div> -->
        <div>
            <label>Email</label>
            <input type="email" name="email" value="<?php echo "{$info['email']}"?>">
        </div>
        <div>
            <label>Phone</label>
            <input type="number" name="phone" value="<?php echo "{$info['phone']}"?>">
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="password" value="<?php echo "{$info['password']}"?>">
        </div>
        <div>
            <!-- <labe>Name</labe> -->
            <input type="submit" class="btn btn-primary"  name="update_profile" value="Update">
        </div>
    </div>
    </form>
    </center>

    </div>

</body>
</html>