<?php 
    error_reporting(0);
    session_start();

    $host="localhost";
    $username = "root";
    $password = "";
    $db = "school_project";

    $data=mysqli_connect($host, $username, $password, $db);

    if($_GET['student_id']){

        $user_id=$_GET['student_id'];

        $sql="DELETE FROM user1 WHERE id='$user_id'";

        $result=mysqli_query($data, $sql);

        if($result){

            $_SESSION['message'] ='Delete student is successful';

            header("location:view_students.php");
        }
    }






?>