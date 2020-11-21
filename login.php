<?php
ob_start();
session_start();
require_once 'db_connect.php';

if(isset($_SESSION['user'])!=""){
 header("Location: home.php");
 exit;
}

$error = false;

if(isset($_POST['btn-login'])){
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST[ 'pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    if(empty($email)){
        $error = true;
        $emailError = "Please enter your email address.";
        }else if ( !filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error = true;
            $emailError = "Please enter valid email address.";
        }
    if(empty($pass)){
        $error = true;
        $passError = "Please enter your password.";
    }
    if(!$error){
    $password = hash('sha256', $pass);

    $res=mysqli_query($conn, "SELECT * FROM user WHERE userEmail='$email'");
    $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = mysqli_num_rows($res);
 
    if( $count == 1 && $row['userPass']==$password){
        if($row["status"] == 'superAdmin'){
            $_SESSION["superAdmin"] = $row["id"];
            header("Location: superAdmin.php");
        }elseif($row["status"] == 'admin'){
            $_SESSION["admin"] = $row["id"];
            header("Location: admin.php");
        }else{
            $_SESSION['user'] = $row['id'];
            header( "Location: home.php");
        }
    }else{
        $errMSG = "Incorrect Credentials, Try again..." ;
        $errTyp = "danger";
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand ml-5 text-white font-weight-bold d-flex align-items-center" href="login.php"><img src="image/paw.png" style="width:35px;" class="mr-2"> Animal</a>
    </nav>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
        <?php
            if(isset($errMSG)){
                ?>
                <div class="alert alert-<?php echo $errTyp ?>">
                    <?php echo $errMSG; ?>
                </div>
                <?php
                    }
                ?>
            <div class="container d-flex justify-content-center">
                <div class="card mt-5 bg-light" style="width: 20rem;">
                    <div class="card-body">
                        <h2 class="card-title mb-3 text-center">Login</h2>                        
                        <p class="mb-1 ml-2">E-mail:</p>
                        <input type="email" name="email" class="form-control" placeholder="Your Email" maxlength="40" value="<?php echo $email; ?>">
                        <span class="text-danger ml-2"><?php  echo $emailError; ?></span>
                        <p class="mb-1 ml-2">Password:</p>
                        <input type="password" name="pass"  class="form-control" placeholder="Your Password" maxlength="15">
                        <span class="text-danger ml-2"><?php  echo $passError; ?></span>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info mr-3 mt-4" name="btn-login" style="width: 10rem;">Sign In</button>
                        </div>
                        <p class="mt-5 mb-0 text-center" style="font-size:13px;">Don't have an account <a href="registration.php" style="color:black;">Sign Up Here...</a></p>
                    </div>
                </div>
            </div>
    </form>
</body>
</html>
<?php ob_end_flush(); ?>