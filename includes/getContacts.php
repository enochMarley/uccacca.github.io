<?php
    include "dbConfig.php";
    $query = "SELECT * FROM members ORDER BY memberName DESC;";
    $result = $mydb->query($query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $memberId = $row['memberId'];
            $memberName = $row['memberName'];
            $memberGender = $row['memberGender'];
            $memberPhone = $row['memberPhone'];
            $memberEmail = $row['memberEmail'];
            $memberProgram = $row['memberProgram'];
            $memberBirthday = $row['memberBirthday'];

            echo "<div class='col-md-3'>".
                    "<div class='square-card mdl-card md-shadow--2dp'>".
                        "<div class='mdl-card__title'><p class='mdl-card__title-text'></p></div>".
                        "<div class='mdl-card__supporting-text'>".
                        "<ul class='contDetails'>".
                            "<li><span class='glyphicon glyphicon-user'> $memberName</li>".
                            "<li><span class='glyphicon glyphicon-question-sign'> $memberGender</li>".
                            "<li><span class='glyphicon glyphicon-calendar'> $memberBirthday</li>".
                            "<li><span class='glyphicon glyphicon-phone'> $memberPhone</li>".
                            "<li><span class='glyphicon glyphicon-envelope'> $memberEmail</li>".
                            "<li><span class='glyphicon glyphicon-education'> $memberProgram</li>".
                        "</ul>".
                        "</div>".
                        "<div class='mdl-card__menu'>".
                        //"<a href='#' class='acts'><span class='glyphicon glyphicon-eye-open'></span></a> ".
                        "<a href='includes/editMember.php?id=$memberId&fullName=$memberName&birthDay=$memberBirthday&emailAddress=$memberEmail&phoneNumber=$memberPhone&program=$memberProgram' class='acts' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span></a> ".
                        "<a href='includes/deleteMember.php?id=$memberId&fullName=$memberName' class='acts'><span class='glyphicon glyphicon-trash'></span></a></div>".
                    "</div>".
                "</div>";
            }
    }else {
        echo "<div class='well'>".
            "<h6 style='text-align:center'>No members are added into the database</h6>".
            "</div>";
    }
?>
