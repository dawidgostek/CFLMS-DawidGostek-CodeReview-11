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

   if ($_GET['id']){
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
    <title>Admin Home</title>
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
    <form  action="actions/a_update_user.php" method= "post">
        <div class="container d-flex justify-content-center">
            <div class="card mt-5 bg-light" style="width: 25rem;">
                <div class="card-body">
                    <h2 class="card-title mb-3">Sign Up</h2>
                    <p class="mb-1 ml-2">Name:</p>
                    <input type ="text"  name="userName"  class="form-control"  placeholder="Enter Your Name" maxlength="50" value="<?php echo $data['userName']?>">
                    <p class="mb-1 ml-2">E-mail:</p>
                    <input type="email" name="userEmail" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $data['userEmail']?>">
                    <p class="mb-1 ml-2">Password:</p>
                    <input type="password" name="userPass" class="form-control" placeholder="Enter Password" maxlength="15" value="<?php echo $data['userPass']?>">
                    <p class="mb-1 ml-2">Status:</p>
                    <select class="custom-select mb-2" name="status" class="w-100 border-0">
                        <option value="<?php echo $data['status']?>"><?php echo $data['status']?></option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                        <option value="superAdmin">super admin</option>
                    </select>
                    <div class="text-center">
                        <input type= "hidden" name= "id" value= "<?php echo $data['id']?>">
                        <button type="submit" class="btn btn-info mr-3 mt-2 mb-4" name="btn-signup" style="width: 10rem;">Sign Up</button>
                        <a href="superAdmin.php" class="btn btn-info mt-2 mb-4" style="width: 10rem;">Sign in Here</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
<?php 
}
ob_end_flush(); ?>