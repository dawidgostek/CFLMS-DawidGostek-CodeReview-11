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
    <div class="container mt-5">
        <div class="row mt-4 ">
            <div class="col-4"></div>
            <h2 class="text-center text-white col-4">List of user</h2>
        </div>
        <table class="table table-striped text-center text-white mt-5">
            <thead>
                <tr>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">User E-Mail</th>
                <th scope="col">User Password</th>
                <th scope="col">Status</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM user";
                $result = $conn->query($sql);

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo  "<tr>
                            <td>" .$row['id']."</td>
                            <td>" .$row['userName']."</td>
                            <td>" .$row['userEmail']."</td>
                            <td>" .$row['userPass']."</td>
                            <td>" .$row['status']."</td>
                            <td>
                                <a href='update_user.php?id=" .$row['id']."'><button class='w-100 btn btn-sm btn-outline-info mb-1' type='button'>Edit</button></a>
                                <a href='delete_user.php?id=" .$row['id']."'><button class='w-100 btn btn-sm btn-outline-info' type='button'>Delete</button></a>
                            </td>
                        </tr>" ;
                    }
                } else  {
                    echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
                }
                    ?>
            </tbody>
        </table>     
    </div>
</body>
</html>
<?php ob_end_flush(); ?>