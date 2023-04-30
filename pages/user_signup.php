<?php
    session_start();
    include('../config/dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Signup Form</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
<?php

include("../config/dbconn.php");
if(isset($_POST['submit']))
{   
    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $pass1=md5($password);
    $salt="a1Bz20ydqelm8m1wql";
    $pass1=$salt.$pass1;

    if(empty($firstname) || empty($middlename) || empty($lastname) || empty($address) || empty($email) || empty($contact) || empty($username) || empty($password)) {    
            
        if(empty($firstname)) {
            echo "<font color='red'>Firstname field is empty!</font><br/>";
        }

        if(empty($middlename)) {
            echo "<font color='red'>Middlename field is empty!</font><br/>";
        }
        
        if(empty($lastname)) {
            echo "<font color='red'>Lastname field is empty!</font><br/>";
        }

        if(empty($address)) {
            echo "<font color='red'>Address field is empty!</font><br/>";
        }

        if(empty($email)) {
            echo "<font color='red'>Email field is empty!</font><br/>";
        }

        if(empty($contact)) {
            echo "<font color='red'>Contact field is empty!</font><br/>";
        }
        
        if(empty($username)) {
            echo "<font color='red'>Username field is empty!</font><br/>";
        }    

        if(empty($password)) {
            echo "<font color='red'>Password field is empty!</font><br/>";
        }    
    } else {    
        $query = "INSERT INTO users (firstname, middlename, lastname, address, email, contact, username, password) 
                VALUES ('$firstname','$middlename','$lastname','$address','$email','$contact','$username','$pass1')";

        $result = mysqli_query($dbconn,$query);
        
        if($result){
        header("Location: ../index.php");
        }
        
    }
}
?>

    <div class="page-header" filter-color="orange">
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form class="form" method="post" action="">
                        <div class="header header-primary text-center">
                            <div class="logo-container">
                               
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-group form-group input-lg">
                                <span class="input-group-addon">
                                </span>
                                <input type="text" name="firstname" class="form-control" placeholder="First name" required>
                            </div>
                            <div class="input-group form-group input-lg">
                                <span class="input-group-addon">
                                </span>
                                <input type="text" name="middlename" class="form-control" placeholder="Middle name" required>
                            </div>
                            <div class="input-group form-group input-lg">
                                <span class="input-group-addon">
                                </span>
                                <input type="text" name="lastname" class="form-control" placeholder="Last name" required>
                            </div>
                            <div class="input-group form-group input-lg">
                                <span class="input-group-addon">
                                </span>
                                <input type="text" name="email" class="form-control" placeholder="Email Address" required>
                            </div>
                            <div class="input-group form-group input-lg">
                                <span class="input-group-addon">
                                </span>
                                <input type="text" name="address" class="form-control" placeholder="Home address" required>
                            </div>
                            <div class="input-group form-group input-lg">
                                <span class="input-group-addon">
                                </span>
                                <input type="text" name="contact" class="form-control" placeholder="Contact Number" required>
                            </div>
                            <div class="input-group form-group input-lg">
                                <span class="input-group-addon">
                                </span>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="input-group form-group input-lg">
                                <span class="input-group-addon">
                                    
                                </span>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control"  required>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="bbtn btn-primary btn-lg btn-block" id="submit" name="submit">
                                 Create Emart account
                            <span class="glyphicon glyphicon-floppy-save"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
</html>