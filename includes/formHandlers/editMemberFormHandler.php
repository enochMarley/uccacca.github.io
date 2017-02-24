<?php
    include "../dbConfig.php";
    $memberId = $_POST['memberId'];
    $fullName = $_POST['fullName'];
    $birthDay = $_POST['birthDay'];
    $emailAddress = $_POST['emailAddress'];
    $phoneNumber = $_POST['phoneNumber'];
    $program = $_POST['program'];



    $query = "UPDATE members SET memberName = '$fullName', memberBirthday = '$birthDay',memberEmail = '$emailAddress', memberPhone = '$phoneNumber', memberProgram = '$program' WHERE memberId = $memberId";
    $result = $mydb->query($query);
    if ($result) {
        header("Location: ../../adminPage.php");
    }else{
        echo "<script>alert('Sorry, an error occured')</script>";
    }

?>
