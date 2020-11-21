<?php
    ob_start();
    session_start();
    if(isset($_SESSION['user'])!=""){
        header("Location: home.php");
    }
    include_once 'db_connect.php';
    $error =false;
    if(isset($_POST['btn-signup'])){
        $name = trim($_POST['name']);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);

        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        $pass = trim($_POST['pass']);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);

        if(empty($name)){
            $error = true;
            $nameError = "Please enter your name.";
        }elseif(strlen($name)<2){
            $error = true;
            $nameError = "Name must have minimum 6 letters";
        }elseif(!preg_match("/^[a-zA-Z ]+$/",$name)){
            $error = true;
            $nameError = "Name must contain alphabets and space";
        }
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error = true;
            $emailError = "Please enter email address.";
        }else{
            $query = "SELECT userEmail FROM user WHERE userEmail ='$email'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            if($count!=0){
                $error = true;
                $emailError = "Provided email is already in use.";
            }
        }
        if(empty($pass)){
            $error = true;
            $passError = "Please enter password.";
        }elseif (strlen($pass)<6){
            $error = true;
            $passError = "Password must have minimum 6 characters.";
        }
        $password = hash('sha256', $pass);
        if(!$error){
            $query = "INSERT INTO user(userName, userEmail, userPass) 
                        VALUES('$name','$email','$password')";
            $res = mysqli_query($conn, $query);

            if($res){
                $errTyp = "success";
                $errMSG = "Successfully registered, you can login now";
                unset($name);
                unset($email);
                unset($pass);    
            }else{
                $errTyp = "danger";
                $errMSG = "Something is wrong, try again leter...";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand ml-5 text-white font-weight-bold d-flex align-items-center" href="login.php"><img src="image/paw.png" style="width:35px;" class="mr-2"> Animal</a>
    </nav>
    <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off">
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
                <div class="card mt-5 bg-light" style="width: 25rem;">
                    <div class="card-body">
                        <h2 class="card-title mb-3">Sign Up</h2>
                        <p class="mb-1 ml-2">Name:</p>
                        <input type ="text"  name="name"  class="form-control"  placeholder="Enter Your Name" maxlength="50" value="<?php echo $name ?>">
                        <span class="text-danger ml-2"><?php echo $nameError; ?></span>
                        <p class="mb-1 ml-2">E-mail:</p>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value ="<?php echo $email ?>">
                        <span  class="text-danger ml-2"> <?php echo $emailError; ?></span>
                        <p class="mb-1 ml-2">Password:</p>
                        <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15">
                        <span class="text-danger ml-2"> <?php echo $passError; ?></span>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info mr-3 mt-2 mb-4" name="btn-signup" style="width: 10rem;">Sign Up</button>
                            <a href="login.php" class="btn btn-info mt-2 mb-4" style="width: 10rem;">Sign in Here</a>
                        </div>
                    </div>
                </div>
            </div>
   </form>
</body>
</html>
<?php ob_end_flush(); ?>