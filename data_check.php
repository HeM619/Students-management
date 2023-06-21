<?php

session_start();



$host = "localhost";
$username = "root";
$password = "";
$db = "school_project";

$data= mysqli_connect($host, $username, $password, $db);

if($data===false){

    die('connection error');
}

if(isset($_POST['apply'])){

    $dataname = $_POST['name'];
    $dataemail = $_POST['email'];
    $dataphone = $_POST['phone'];
    $datamessage = $_POST['message'];
    
    
    $sql= "INSERT INTO admission (name, email, phone, message) VALUES ('$dataname', '$dataemail', '$dataphone', '$datamessage')";

    $results = mysqli_query($data, $sql);


    if($results){

        $_SESSION['message']= 'your application was sent successfully';

        header("location:index.php");

        // echo "Apply Success";
    }

    else{
        echo "Apply Failed";
    }
}








?>
