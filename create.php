<?php 
ob_start();
session_start();
require_once 'db_connect.php';
if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
   }
if(isset($_SESSION['user'])){
    header("Location: home.php");
    exit;
}
   $res=mysqli_query($conn, "SELECT * FROM user WHERE id=".$_SESSION['admin']);
   $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light bg-info d-flex justify-content-between">
        <div>
            <a class="navbar-brand ml-5 text-white font-weight-bold d-flex align-items-center" href="admin.php"><img src="image/paw.png" style="width:35px;" class="mr-2"> Animal</a>
        </div>
        <div class="text-white d-flex align-items-center">
            Hallo <?php echo $userRow['userName'];?>
            <a href="logout.php?logout" class="btn btn-outline-light btn-sm mr-5 ml-3">Sign Out</a>
        </div>
    </nav>
    <form  action="actions/a_create.php" method= "post">
        <div class="container d-flex justify-content-center">
            <div class="card mt-5 bg-light" style="width: 40rem;">
                <div class="card-body">
                    <h2 class="card-title mb-3 text-center">Add new Animal</h2>
                    <p class="mb-1 ml-2">Image:</p>
                    <input type ="text"  name="animal_img"  class="form-control mb-2"  placeholder="Enter URL Image">
                    
                    <p class="mb-1 ml-2">Name:</p>
                    <input type="text" name="animal_name" class="form-control mb-2" placeholder="Enter Name">
                    
                    <p class="mb-1 ml-2">Breed:</p>
                    <input type="text" name="breed" class="form-control mb-2" placeholder="Enter Breed">

                    <p class="mb-1 ml-2">Age:</p>
                    <input type="text" name="age" class="form-control mb-2" placeholder="Enter Age">

                    <p class="mb-1 ml-2">Description:</p>
                    <input type="text" name="description" class="form-control mb-2" placeholder="Enter Description">

                    <p class="mb-1 ml-2">Hobbies:</p>
                    <input type="text" name="hobbies" class="form-control mb-2" placeholder="Enter Hobbies">

                    <p class="mb-1 ml-2">Location:</p>
                    <input type="text" name="location" class="form-control mb-2" placeholder="Enter Location">

                    <p class="mb-1 ml-2">Size:</p>
                    <select class="custom-select mb-2" name="size" class="w-100 border-0">
                        <option value=""></option>
                        <option value="small">small</option>
                        <option value="medium">medium</option>
                        <option value="big">big</option>
                    </select>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info mr-3 mt-5 mb-4" name="btn-creat" style="width: 10rem;">Insert animal</button>
                        <a href="admin.php" class="btn btn-info mt-5 mb-4" style="width: 10rem;">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
<?php ob_end_flush(); ?>