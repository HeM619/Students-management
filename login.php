<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        body{
            background-image: url(Images/helena-lopes-UZe35tk5UoA-unsplash.jpg);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <!-- <h1>Login Form</h1> -->
    <center>
        <div class="form-design">
            <center class="login">
                Login Form

                <h4>
                    <?php

                    error_reporting(0);
                    session_start();
                    session_destroy();

                    echo $_SESSION['loginMessage'];


                    ?>
                </h4>




            </center>
            <form action="login-check.php" method="post" class="forms" >
                <div class="">
                    <label for="" class="label2">Username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label for="" class="label2">Password</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <!-- <label for="">Username</label> -->
                    <input class="btn btn-primary"  type="submit" name="submit" value="login">
                </div>
            </form>
        </div>

    </center>
 
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>