<?php

session_start();
// error_reporting(0);

if(!isset($_SESSION['username'])){

    header("location:login.php");
}   

elseif($_SESSION['usertype']=='student'){

        header("location:login.php");
}


    $host="localhost";
    $username = "root";
    $password = "";
    $db = "school_project";

    $data=mysqli_connect($host, $username, $password, $db);

    $id=$_GET['id'];

    $sql="SELECT * FROM user1 WHERE id=$id";

    $result=mysqli_query($data, $sql);

    $info=$result->fetch_assoc();

    if(isset($_POST['update'])){

       $username=$_POST['name'];
       $email=$_POST['email'];
       $phone=$_POST['phone'];
       $password=$_POST['password'];

       $query="UPDATE user1 SET username='$username', email='$email', phone='$phone', password='$password',  WHERE id='$id' ";
       
       $result2=mysqli_query($data, $query);

       if($result2){
        echo "update success";
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
    

    <?php

        include 'admin_css.php';


        ?>

</head>
<style>
    label{
      display: inline-block;
      width:100px;
      text-align: 10px;
      padding-bottom: 10px;

    }
    .div-deg{
        background-color: skyblue;
        width: 400px;
        padding-top: 70px;
        padding-bottom: 70px;

    }
</style>
<body>

    <?php
    // include 'admin_sidebar.php';

    ?>
    
    <div class="content" >
        <center>
        <h1>Update Students</h1>

        <div class="div-deg">
            <form action="" method="POST">
                <div>
                    <label>ID</label>
                    <input type="number name="name" value="<?php echo "{$info['id']}"; ?>">
                </div>
                <div>
                    <label>Username</label>
                    <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo "{$info['phone']}"; ?>">
                </div>
                <div>
                    <label>Password</label>
                    <input type="number" name="password" value="<?php echo "{$info['password']}"; ?>">
                </div>
                <div>
                    <input class="btn btn-success" type="submit" name="update" value="update">
                </div>
            </form>
        </div>
        </center>       
    </div>


</body>
</html>