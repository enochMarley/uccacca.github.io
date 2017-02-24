<?php
    include "dbConfig.php";
    $searchTerm = $_POST['searchTerm'];
    $query = "UPDATE search SET searchTerm = '$searchTerm' WHERE searchId = 1";
    $result = $mydb->query($query);
?>
