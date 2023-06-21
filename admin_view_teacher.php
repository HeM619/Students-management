<?php

session_start();
error_reporting(0);

if(!isset($_SESSION['username'])){

    header("location:login.php");
}   

elseif($_SESSION['usertype']=='student'){

        header("location:login.php");
    }

    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "school_project";

    $data=mysqli_connect($host, $username, $password, $db);

    $sql="SELECT * FROM teacher";

    $result=mysqli_query($data, $sql);

    if($_GET['teacher_id']){

        $teacher_id=$_GET['teacher_id'];

        $sql2="DELETE FROM teacher WHERE id=$teacher_id";

        $result2=mysqli_query($data, $sql2);

        if($result2){

            header ('location:admin_view_teacher.php');

            // echo "delete success";
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
        .table_th{
            padding: 20px;
            font-size: 20px;

        }
        .table_td{
            padding: 20px;
            background-color: skyblue;
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

        <h1>View All Teachers Data</h1>

        <table border=1px>
            <tr>
                <th class="table_th">Teacher Name</th>
                <th class="table_th">About Teacher</th>
                <th class="table_th">Image</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>
            <?php 

            while($info=$result->fetch_assoc()){

            
            
            ?>

            <tr>
                <td class="table_td">
                    
                <?php echo "{$info['name']}" ?>
            
                </td>
                <td class="table_td">
                <?php echo "{$info['description']}" ?>
                </td>
                <td class="table_td">

                <img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>">

                </td>

                <td class="table_td">
                    
                <?php
                    echo "<a onClick=\"javascript:return confirm('Are You Sure to Delete This');\" class='btn btn-danger' href='admin_view_teacher.php? teacher_id={$info['id']}'>Delete</a>"  

                    ?>
                </td>
                <td class="table_td">

                <?php 

                 echo "<a class='btn btn-primary'  href='admin_update_teacher.php? teacher_id={$info['id']}' >update</a>"    
                    
                    ?>
                </td>
            
            </tr>

            <?php 

            }

            ?>


        </table>
    </center>        
    </div>


</body>
</html>