<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }
    include "dbConfig.php";
    $memberId = $_GET['id'];
    $fullName = $_GET['fullName'];
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
                <div class="well wow bounceIn" data-toggle="modal" data-target="#myModal" data-wow-duration="1.3s" data-wow-delay="0.2s">
                    <h6 style="text-align:center">DELETE MEMBER</h6>
                    <p style="text-align:center">Are You Sure You Want To Delete <?php echo $fullName; ?> From The Database</p>
                    <form class="editMemberForm"  method="post" action="formHandlers\deleteMemberFormHandler.php" id="editForm">
                        <input type="hidden" name="memberId" value="<?php echo $memberId; ?>">
                        <button type="submit" class="btn btn-success" for="editForm">YES</button>
                        <a href="../adminPage.php"><button type="button" class="btn btn-danger" >NO</button></a>
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
