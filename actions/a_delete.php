<?php 
require_once '../db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Animal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light bg-info d-flex justify-content-between">
        <div>
            <a class="navbar-brand ml-5 text-white font-weight-bold d-flex align-items-center" href="../admin.php"><img src="../image/paw.png" style="width:35px;" class="mr-2"> Animal</a>
        </div>
    </nav>
    <?php
        if ($_POST){
        $id = $_POST['animal_id'];

        $sql = "DELETE FROM animal WHERE animal_id = {$id}";
            if($conn->query($sql) === TRUE) {
            echo  "<div class='container'><div class='jumbotron text-center mt-5'>
                    <h3 class='display-5 text-info'>Successfully deleted!</h3>
                    </div></div>";
            header("Refresh:1; url='../admin.php'");
        } else {
            echo "Error updating record : " . $conn->error;
        }

        $conn->close();
        }
    ?>
</body>
</html>