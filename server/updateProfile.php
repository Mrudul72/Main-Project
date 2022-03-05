<?php
include('../config/connect.php');
session_start();
$taskId = $_SESSION['curTaskId'];
// echo $taskId;
$desc = $_POST['task-detail-description'];
$title = $_POST['task-detail-title'];
$uid = $_SESSION['userId'];
$teamId = $_SESSION['currentUserTeamId'];
$proID = $_SESSION['projectID'];
// $sql = "UPDATE `tbl_tasks` SET `task_status`='$taskStatus', WHERE `task_id`='$taskId'";
extract($_POST);
if(isset($updateProfileBtn)){
    if(!empty($_FILES['uploadPic']) && $_FILES['uploadPic']['error'] != UPLOAD_ERR_NO_FILE) {
        $fileToUpload = $_FILES["uploadPic"]["name"];
        move_uploaded_file($_FILES["uploadPic"]["tmp_name"], "../assets/uploads/" . $_FILES["uploadPic"]["name"]);
        $file = '../assets/uploads/'.$fileToUpload;
        $filesize =  formatSizeUnits(filesize($file));
        echo $filesize;
        $sql2 = "UPDATE `tbl_user` SET `profile_pic`='$fileToUpload' WHERE `user_id`='$uid'";
        $result2 = mysqli_query($connect, $sql2);
        header('location:../manageProfile.php');
    }
    if (empty($_FILES['uploadPic']['name'])) {
        $query = "UPDATE `tbl_user` SET `username`='$uname',`mob`='$mobile',`email`='$email' WHERE `user_id`='$uid'";
        $result = mysqli_query($connect, $query);
        header('location:../manageProfile.php');
    }


}






function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }

    return $bytes;
}

header("Location: ../manageProfile.php");

?>