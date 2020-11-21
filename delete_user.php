<?php 
ob_start();
session_start();
require_once 'db_connect.php';
if(!isset($_SESSION['admin']) && !isset($_SESSION['user']) && !isset($_SESSION['superAdmin'])){
    header("Location: login.php");
    exit;
   }
if(isset($_SESSION['admin'])){
    header("Location: admin.php");
    exit;
}
if(isset($_SESSION['user'])){
    header("Location: home.php");
    exit;
}
   $res=mysqli_query($conn, "SELECT * FROM user WHERE id=".$_SESSION['superAdmin']);
   $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

   if ($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM user WHERE id = {$id}" ;
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
 
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light bg-info d-flex justify-content-between">
        <div>
            <a class="navbar-brand ml-5 text-white font-weight-bold d-flex align-items-center" href="superAdmin.php"><img src="image/paw.png" style="width:35px;" class="mr-2"> Animal</a>
        </div>
        <div class="text-white d-flex align-items-center">
            Hallo <?php echo $userRow['userName'];?>
            <a href="logout.php?logout" class="btn btn-outline-light btn-sm mr-5 ml-3">Sign Out</a>
        </div>
    </nav>
    <div class="container">
        <div class="jumbotron mt-5">
            <h3 class="display-5 text-center text-info">Do you really want to delete this user?</h3>
            <p class="lead">
                <form action ="actions/a_delete_user.php" method="post" class="d-flex justify-content-center mt-5">
                    <input type="hidden" name= "id" value="<?php echo $data['id'] ?>" />
                    <button type="submit" class="btn btn-outline-info mr-5">Yes, delete it!</button>
                    <a href="superAdmin.php"><button class="btn btn-outline-info" type="button">No, go back!</button></a>
                </form>
            </p>
        </div>
    </div>
</body>
</html>
<?php
}
ob_end_flush(); 
?>