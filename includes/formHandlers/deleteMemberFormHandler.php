<?php
    include "../dbConfig.php";
    $memberId = $_POST['memberId'];

    $query = "DELETE FROM members WHERE memberId = $memberId";
    $result = $mydb->query($query);
    if ($result) {
        header("Location: ../../adminPage.php");
    }else{
        echo "<script>alert('Sorry, an error occured')</script>";
    }
?>
