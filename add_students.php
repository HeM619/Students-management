<?php
@include('connect.php');

session_start();

if(!isset($_SESSION['username'])){

    header("location:login.php");
}   

elseif($_SESSION['usertype']=='student'){

        header("location:login.php");
    }
    

        if(isset($_POST['Add_student'])){
        $username=$_POST['name'];
        $user_email=$_POST['email'];
        $user_phone=$_POST['phone'];
        $user_password=$_POST['password'];
        $usertype ="students";

        // This section avoids the repeat of same login details, ie, usernames;

        //$check = "SELECT * FROM user1 WHERE username='$username'";

        //$check_username= mysqli_query($data, $check);

        //$row_count=mysqli_num_rows($check_username);

        $select = "SELECT * FROM user1 WHERE email = '$user_email' && username = '$username'";
        $result = mysqli_query($data,$select);

        //check for redundancy in the table user1

        if(mysqli_num_rows($result)>0){

            echo "<script type='text/javascript'>

            alert ('Username Already Exist. Try Another One');

            </script>";

            // echo "Username Already Exist. Try Another One";
        }

            else{

        

        $sql="INSERT INTO user1(username, email, phone,usertype, password) VALUES('$username', '$user_email', '$user_phone', '$usertype', '$user_password')";

        $result= mysqli_query($data, $sql);

        if($result){

                // this is the first variable;

            // echo "Data Uploaded Succesfully";

            // alternatively we can use js called java script alert;

            echo "<script type='text/javascript'>

            alert ('Data Upload Succesfully');

            </script>";
        }
        else{
            echo "Upload Failed";
        }
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
    <style>
        label{
           display:inline-block;
           text-align: right;
           width: 100px;
           padding-top: 10px;
           padding-bottom: 10px;
        }
        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
    

    <?php

        include 'admin_css.php';


        ?>

</head>
<body>

    <?php
    // include 'admin_sidebar.php';

    ?>
    
    <div class="content" >
        <center>
        <h1>Add Student</h1>
        <div class="div_deg">
            <form action="" method="post">
                <div>
                    <label>Username</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone">
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password">
                </div>
                <div>
                    
                    <input class="btn btn-primary" type="submit" name="Add_student" value="Add student">
                </div>
            </form>
        </div>
    </div> 
    </center>          
    </div>


</body>
</html>

