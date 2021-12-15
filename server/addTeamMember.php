<?php
include('../config/connect.php');
extract($_POST);
session_start();
$manager_id = $_SESSION['userId'];
$postStatus = 0;


if (sizeof($teamMemberArr) > 0 && $teamMemberArr[0] != null) {
    foreach ($teamMemberArr as $memberID) {
        //insert into team_members table
        $sql2 = "INSERT INTO `tbl_team_members`(`team_id`, `user_id`) VALUES ('$team_id','$memberID')"; //not needed, but just in case
        $result2 = mysqli_query($connect, $sql2);
        if(!$result2){
            echo "Error: " . $sql2 . "<br>" . mysqli_error($connect);
        }
        else{
            $postStatus = 1;
        }

        $sql3 = "UPDATE `tbl_user` SET `team_id`='$team_id' WHERE `user_id`='$memberID'";
        $result3 = mysqli_query($connect, $sql3);
        if(!$result3){
            echo "Error2: " . $sql3 . "<br>" . mysqli_error($connect);
        }
        else{
            $postStatus = 1;
        }
    }
}
if($postStatus == 1){
    echo "success";
}
else{
    echo "fail";
}


