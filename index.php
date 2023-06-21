<?php
 error_reporting(0);
 session_start();
 session_destroy();

 if($_SESSION['message']){

    $message= $_SESSION['message'];

    echo "<script type= 'text/javascript'>

    alert('$message')
     
    
    </script>";

    // include 'connect.php';

 }

    $host="localhost";
    $username = "root";
    $password = "";
    $db = "school_project";

    $data=mysqli_connect($host, $username, $password, $db);

    $sql="SELECT * FROM teacher";

    $result=mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <label class="logo" for="">W-School</label>

        <ul>
            <li>
                <a href="">Home</a>
            </li>
            <li>
                <a href="">Contacts</a>
            </li>
            <li>
                <a href="">Admission</a>
            </li>
            <li>
                <a href="login.php" class="btn btn-success">Login</a>
            </li>
        </ul>
    </nav>
    <div class="section1">
        <label class="text"  for="">We Teach Students With Care</label>
        <img  class="main"  src="Images/Classroom pic.jpg" alt="">

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcomeimage"  src="Images/centre-for-ageing-better-Qk5kmiXJjYE-unsplash.jpg" alt="">

            </div>
            <div class="col-md-8">
                <h1>Welcome to W-School</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse inventore dicta voluptatibus ipsa aperiam culpa, iure necessitatibus rem cupiditate sapiente in nesciunt at non magnam recusandae ab perspiciatis iusto illo?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos cumque minima expedita iste repudiandae nostrum ab. Unde, reprehenderit dicta laboriosam aperiam fugiat ut aliquid nostrum sit fuga voluptas in aliquam!</p>

            </div>

            <center>
                <h1>Our Teachers</h1>
            </center>
            <div class="container">
                <!-- Teachers Image Section -->
                <div class="row">

                    <?php 

                    while($info=$result->fetch_assoc()){
  
                    
                    ?>
                    <div class="col-md-4">
                        <img  class="teacher"  src="<?php echo "{$info['image']}" ?>" alt="">
                        <!-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam praesentium doloribus beatae natus vero illo, maiores, similique, repellendus deserunt impedit nam. Autem cumque nisi tenetur dolores ea iste praesentium ab?</p> -->
                        <h3><?php echo "{$info['name']}" ?></h3> 
                        <h5><?php echo "{$info['description']}" ?></h5>

                    </div>
                    
                    <?php 


                    } 
                      
                    ?>

                    <!-- <div class="col-md-4">
                        <img  class="teacher" src="Images/donald-wu-APsC3KJzwVw-unsplash.jpg" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id perferendis debitis, illo rerum dicta ex sapiente doloremque architecto dolore dolores, nesciunt quidem, sed aperiam obcaecati modi quae. Ex, animi beatae!</p>

                    </div>
                    <div class="col-md-4">
                        <img  class="teacher" src="Images/helena-lopes-UZe35tk5UoA-unsplash.jpg" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam laudantium neque molestias alias tempore, commodi officia adipisci modi nostrum rerum asperiores veritatis accusamus ducimus sunt voluptas ut cum beatae reprehenderit.</p>

                    </div> -->

                </div>
                <center>
                    <h1>Our Courses</h1>
                </center>
                <div class="container">
                    <!-- Teachers Image Section -->
                    <div class="row">
                        <div class="col-md-4">
                            <img  class="teacher"  src="Images/david-shoykhet-y5mFzOGOR58-unsplash.jpg" alt="">
                            <h3>Web Design</h3>
    
                        </div>
                        <div class="col-md-4">
                            <img  class="teacher" src="Images/donald-wu-APsC3KJzwVw-unsplash.jpg" alt="">
                            <h3>Digital Marketing</h3>
    
                        </div>
                        <div class="col-md-4">
                            <img  class="teacher" src="Images/helena-lopes-UZe35tk5UoA-unsplash.jpg" alt="">
                            <h3>Graphics Design</h3>
    
                        </div>
                        
                    </div>
                    <center>
                            <h1 class="admform">Admission Form</h1>
                        </center>
                        <div  align="center"  >
                            <form action="data_check.php" method="POST">
                                <div class="adm_area">
                                    <label class="label" for="">Name</label>
                                    <input  class="input" type="text" name="name">
                                </div>
                                <div class="adm_area">
                                    <label  class="label" for="">Email</label>
                                    <input  class="input"  type="text" name="email">
                                </div>
                                <div class="adm_area">
                                    <label  class="label" for="">Phone</label>
                                    <input  class="input" type="text" name="phone">
                                </div>
                                <div class="adm_area">
                                    <label class="label" for="">Message</label>
                                    <textarea class="Tarea" name="message"></textarea>
                                </div>
                                <div class="adm_area">
                                    <input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply">
                                </div>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>   
    <div class="mt-5">
    <footer>
        <h3 class="footertext" >All @copyright reserved by Hempstone Technologies</h3>
    </footer>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>   
</body>
</html>