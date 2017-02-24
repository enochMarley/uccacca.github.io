<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }
?>
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
    <style media="screen">
        body{
            background:;
        }
    </style>
  </head>
  <body>
      <nav class="navbar navbar-default navbar-fixed-top">
       <div class="container-fluid">
           <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand" href="#">ACCA UCC</a>
           </div>
           <div class="collapse navbar-collapse" id="myNavbar">
             <ul class="nav navbar-nav navbar-right">
               <li class=""><a href="#/"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
               <li><a href="includes/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
             </ul>
           </div>
         </div>
      </nav>
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
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row">
                  <div class="col-md-12">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label wow slideInLeft" data-wow-duration="1.3s" data-wow-delay="0.2s">
                          <input class="mdl-textfield__input search" type="text" name="search" value="">
                          <label class="mdl-textfield__label"><span class="glyphicon glyphicon-search"></span> SEARCH</label>
                      </div>
                  </div>
                    <button type="button" class="btn btn-primary wow bounceInDown addBtn" data-toggle="modal" data-target="#myModal" data-wow-duration="1.3s" data-wow-delay="0.2s"><span class="glyphicon glyphicon-plus"></span></button>
                </div><br>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row contactDiv"></div>
            </div>
            <div class="col-md-1"></div>
        </div>
      </div>


      <script src="js/jquery2.2.4.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/material.min.js"></script>
      <script src="js/wow.min.js"></script>
      <script src="js/jquery-ui.min.js"></script>
      <script type="text/javascript">
          new WOW().init();
        function getAllContacts(){
            $.ajax({
                method: 'GET',
                url: 'includes/getContacts.php',
                success: function(data){
                    $('.contactDiv').html(data);
                },
                error: function(error){
                    console.log("Error " +error);
                }
            });
        }

        function getSearchResults(){
            $.ajax({
                method: 'GET',
                url: 'includes/getSearch.php',
                success: function(data){
                    $('.contactDiv').html(data);
                },
                error: function(error){
                    console.log("Error " +error);
                }
            });
        }

        $('.search').on('input',function(){
            var value = $('.search').val();
            var searchData = {'searchTerm':value};
            $.ajax({
                method: 'POST',
                data:searchData,
                url: 'includes/sendSearch.php',
                success: function(data){
                    getSearchResults();
                },
                error: function(error){
                    console.log("Error " +error);
                }
            });
        });

        getAllContacts();
      </script>
  </body>
</html>
<?php
    error_reporting(E_ALL ^ E_NOTICE);
    include "includes/dbConfig.php";

    $fullName = $_POST['fullName'];
    $birthDay = $_POST['birthDay'];
    $gender = $_POST['gender'];
    $emailAddress = $_POST['emailAddress'];
    $phoneNumber = $_POST['phoneNumber'];
    $program = $_POST['program'];


    if (isset($fullName) && isset($birthDay) && isset($gender) && isset($emailAddress) && isset($phoneNumber) && isset($program) ) {
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $query = "SELECT * FROM members WHERE memberPhone = '$phoneNumber' OR memberEmail = '$emailAddress'";
            $result = $mydb->query($query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if ($row['memberPhone'] == "$phoneNumber") {
                    echo "<script>alert('Member With Phone Number $phoneNumber Already Exists')</script>";
                }
                if ($row['memberEmail'] == "$emailAddress") {
                    echo "<script>alert('Member With Email Address $emailAddress Already Exists')</script>";
                }
                if ($row['memberEmail'] == "$emailAddress" && $row['memberPhone'] == "$phoneNumber") {
                    echo "<script>alert('Member With Email Address $emailAddress and Phone Number  $phoneNumber".
                        "Already Exists')</script>";
                }
            }else {
                $query1 = "INSERT INTO  members(memberName,memberPhone,memberEmail,memberGender,memberProgram,memberBirthday)".
                " VALUES('$fullName','$phoneNumber','$emailAddress','$gender','$program','$birthDay');";
                $result1 = $mydb->query($query1);
                if ($result1) {
                    echo "<script>alert('Member Added Successfully')</script>";
                }else {
                    echo "<script>alert('Please Check Your Server Connection And Try Again')</script>";
                }
            }

        }
    }

?>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" aria-hidden="true">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="color:red">ACCA UCC MEMBER REGISTRATION</h4>
          </div>
          <div class="modal-body">
            <form class="addStockForm" method="post" action="">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" name="fullName" value="" required>
                  <label class="mdl-textfield__label"><span class="glyphicon glyphicon-user"></span> FULL NAME</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="date" name="birthDay" required>
                  <label class="mdl-textfield__label"><span class="glyphicon glyphicon-calendar"></span> BIRTH DATE</label>
              </div>
              <p style="color:#d50000;font-weight:bold"><span class="glyphicon glyphicon-question-sign"></span> GENDER
              <select class="gender" name="gender" required>
                  <option selected disabled>CHOOSE GENDER</option>
                  <option value="male">MALE</option>
                  <option value="female">FEMALE</option>
                  <option value="others">OTHERS</option>
              </select></p>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="number" name="phoneNumber" value="" required>
                  <label class="mdl-textfield__label"><span class="glyphicon glyphicon-phone"></span> PHONE NUMBER</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" name="emailAddress" value="" required>
                  <label class="mdl-textfield__label"><span class="glyphicon glyphicon-envelope"></span> EMAIL ADDRESS</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" name="program" value="" required>
                  <label class="mdl-textfield__label"><span class="glyphicon glyphicon-education"></span> PROGRAM OF STUDY</label>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" >ADD</button>
            <button type="clear" class="btn btn-primary" >CLEAR</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
            </form>
          </div>
        </div>

      </div>
  </div>
