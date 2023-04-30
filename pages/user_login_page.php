<?php
    session_start();
    include('../config/dbconn.php');
    
    if (isset($_SESSION['id'])){
        header('Location:user_index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login Page</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
    <div class="page-header" filter-color="black">
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form class="form" method="POST" action="user_login.php">
                        <div class="header header-primary text-center">
                            Login Panel
                        </div><br>
                        <div class="content">
                            <div class="input-group form-group input-lg">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group form-group input-lg">
                                <input type="password" name="password" placeholder="Password" class="form-control" />
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="bbtn btn-primary btn-lg btn-block" name="submit">Login</button>
                        </div>
                        <div class="pull-left">
                            <h6>
                                <a href="user_signup.php" class="link">New User?</a>
                            </h6>
                        </div>
                        <div class="pull-right">
                            <h6>
                                <a href="" class="link">Forgot Password?</a>
                            </h6>
                        </div>
                    </form>
                    <br>
                    <?php

                                    if (
                                        isset($_SESSION['msg'])){
                                        echo $_SESSION['msg'];
                                        unset($_SESSION['msg']);

                                    }
                                    ?>
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