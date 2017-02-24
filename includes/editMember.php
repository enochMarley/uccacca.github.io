<?php

    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }
    include "dbConfig.php";
    $memberId = $_GET['id'];
    $fullName = $_GET['fullName'];
    $birthDay = $_GET['birthDay'];
    $emailAddress = $_GET['emailAddress'];
    $phoneNumber = $_GET['phoneNumber'];
    $program = $_GET['program'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACCA UCC</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/material.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/animate.css">
    <style media="screen">
        body{
            background:;
        }
    </style>
  </head>
  <body>
      <div class="container-fluid navbar-fixed-bottom">
          <div class="row">
              <p style="text-align:center;margin-right:2%;color:#111">
                  Developer: Enoch Marley &copy; <?php echo date('Y'); ?>.<b>|</b><span class="glyphicon glyphicon-phone"></span> +233 27 172 8188 <b>|</b>
                  <span class="glyphicon glyphicon-envelope"></span> enoch.sowah16@gmail.com.
              </p>
          </div>
      </div>
      <div class="container-fluid mainDiv">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div style="padding:10px;" class="well wow bounceIn" data-toggle="modal" data-target="#myModal" data-wow-duration="1.3s" data-wow-delay="0.2s">
                    <h6 style="text-align:center">EDIT MEMBER DETIALS</h6>
                    <form class="editMemberForm"  method="post" action="formHandlers\editMemberFormHandler.php" id="editForm">
                        <input type="hidden" name="memberId" value="<?php echo $memberId; ?>">
                        <label><span class="glyphicon glyphicon-user"></span> Name</label><br>
                        <input type="text" name="fullName" value="<?php echo $fullName; ?>"><br><br>
                        <label><span class="glyphicon glyphicon-phone"></span> Phone Number</label><br>
                        <input type="text" name="phoneNumber" value="<?php echo $phoneNumber; ?>"><br><br>
                        <label><span class="glyphicon glyphicon-envelope"></span> Email Address</label><br>
                        <input type="text" name="emailAddress" value="<?php echo $emailAddress; ?>"><br><br>
                        <label><span class="glyphicon glyphicon-calendar"></span> Birth Date</label><br>
                        <input type="text" name="birthDay" value="<?php echo $birthDay; ?>"><br><br>
                        <label><span class="glyphicon glyphicon-education"></span> Program of Study</label><br>
                        <input type="text" name="program" value="<?php echo $program; ?>"><br><br>
                        <button type="submit" class="btn btn-success" for="editForm">UPDATE</button>
                        <a href="../adminPage.php"><button type="button" class="btn btn-danger" >CANCEL</button></a>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
      </div>


      <script src="../js/jquery2.2.4.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/material.min.js"></script>
      <script src="../js/wow.min.js"></script>
      <script src="../js/jquery-ui.min.js"></script>
      <script type="text/javascript">
          new WOW().init();
      </script>
  </body>
</html>
