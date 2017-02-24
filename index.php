<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACCA UCC</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/animate.css">
  </head>
  <body>
    <div class="container-fluid navbar-fixed-bottom">
        <div class="row">
            <p style="text-align:center;margin-right:2%;color:#fff">
                Developer: Enoch Marley &copy; <?php echo date('Y'); ?>.<b>|</b><span class="glyphicon glyphicon-phone"></span> +233 27 172 8188 <b>|</b>
                <span class="glyphicon glyphicon-envelope"></span> enoch.sowah16@gmail.com.
            </p>
        </div>
    </div>
    <div class="container-fluid loginDiv">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form class="loginForm" action="" method="post">
                    <h4 class="wow bounceInDown" data-wow-duration="1.3s" data-wow-delay="0.2s">ACCA UCC ADMIN LOGIN</h4><br>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label wow slideInLeft" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <input class="mdl-textfield__input" type="text" name="username" value="" required>
                        <label class="mdl-textfield__label"><span class="glyphicon glyphicon-user"></span> USERNAME</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label wow slideInRight" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <input class="mdl-textfield__input" type="password" name="password" value="" required>
                        <label class="mdl-textfield__label"><span class="glyphicon glyphicon-lock"></span> PASSWORD</label>
                    </div><br>
                    <button type="submit" class="btn btn-danger wow bounceIn loginSubmitBtn" data-wow-duration="1.3s" data-wow-delay="0.2s">LOGIN</button><br><br>
                    <p class="errMsg"></p>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script src="js/jquery2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script type="text/javascript">
        new WOW().init();
    </script>
  </body>
</html>
<?php
    error_reporting(E_ALL ^ E_NOTICE);
    include "includes/dbConfig.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE adminUsername = '$username' AND adminPassword = '$password'";

    if (isset($username) && isset($password) && !empty($username) &&  !empty($password)) {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $result = $mydb->query($query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if ($row['adminUsername'] == "$username" && $row['adminPassword'] == "$password") {
                    session_start();
                    $_SESSION['username'] = $username;
                    header('Location: adminPage.php');
                }
            }else{ ?>
                <script type="text/javascript">
                    var errMg = $("<span><span class='glyphicon glyphicon-warning-sign'></span> Wrong Username Or Password</span>");
                    $('.loginForm h4, .loginForm div, .loginSubmitBtn').removeClass('wow');
                    $('.errMsg').html(errMg).effect('pulsate', 'slow');
                </script>
<?php
            }
        }
    }

?>
