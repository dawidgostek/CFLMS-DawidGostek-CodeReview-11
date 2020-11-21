<?php 
ob_start();
session_start();
require_once 'db_connect.php';
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
   }
   $res=mysqli_query($conn, "SELECT * FROM user WHERE id=".$_SESSION['user']);
   $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light bg-info d-flex justify-content-between pb-0">
        <div>
            <a class="navbar-brand ml-5 text-white font-weight-bold d-flex align-items-center" href="home.php"><img src="image/paw.png" style="width:35px;" class="mr-2"> Animal</a>
        </div>
        <div class="text-white d-flex align-items-center">
            Hallo <?php echo $userRow['userName'];?>
            <a href="logout.php?logout" class="btn btn-outline-light btn-sm mr-5 ml-3">Sign Out</a>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-info pt-0">
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="small.php">Small</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="general.php">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="senior.php">Senior</a>
                </li>
            </ul>
        </div>
    </nav>
    <h3 class="text-center text-white mt-5">Our senior Dogs</h3>
    <div class="container mt-5">
        <div class="row">
            <?php
                $sql = "SELECT * FROM animal WHERE age > 8";
                $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo"
                        <div class='col-12 col-md-6 col-lg-4 mb-5'>
                            <div class='card p-2 h-100 rounded' style='background-color: rgb(255, 255, 255, 0.7);'>
                                <img src=".$row['animal_img']." class='card-img-top' style='max-height: 12rem'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$row['animal_name']."</h5>
                                    <p class='card-text'>".$row['breed']."</p>
                                    <p class='card-text mb-2'>Age: ".$row['age']." years old</p>
                                    <p class='card-text mb-2'>".$row['description']."</p>
                                    <p class='card-text mb-2'>Hobbies: ".$row['hobbies']."</p>                                    
                                    <p class='card-text'>Location: ".$row['location']."</p>
                                    <button class='w-100 btn btn-sm btn-outline-info mb-1' type='button'>Adopt me</button>
                                </div>
                            </div>
                        </div>";
                        }
                    }else{
                        echo "No Data Avaliable";
                    }
                    ?>
        </div>
    </div> 
</body>
</html>
<?php ob_end_flush(); ?>