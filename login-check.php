<?php

// This section enables or connects the login.php to database;

error_reporting(0);
session_start();

$host = "localhost";
$username = "root";
$password = "";
$db = "school_project";


$data = mysqli_connect($host, $username, $password, $db);

if($data==false){
    die("connection error");
    // echo 'Connection error';
}

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM user1 WHERE username = '".$username."' AND password='".$password."' ";
    
    
    $result = mysqli_query($data, $sql);

    $row = mysqli_fetch_array($result);


    if($row['usertype']=="students"){

        
        $_SESSION['username']=$username;

        $_SESSION['usertype']="students";


        header("location:studentshome.php");
    }

    elseif($row['usertype']=="admin"){

        $_SESSION['username']=$username;

        $_SESSION['usertype']="admin";

        header("location:adminhome.php");
    }

    else{

        // session_start();

        $message= "username or password do not match";

        $_SESSION['loginMessage']=$message;

        header("location:login.php");
    }
}
?> 
