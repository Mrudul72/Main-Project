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
$sql = "UPDATE `tbl_tasks` SET `task_title`='$title',`task_description`='$desc' WHERE `task_id`='$taskId'";
$result = mysqli_query($connect, $sql);


//insert file
if(!isset($_FILES['attachment']) || $_FILES['attachment']['error'] == UPLOAD_ERR_NO_FILE) {
    // echo "<script>alert('File Not selected');</script>";
} 
else{
    $fileToUpload = $_FILES["attachment"]["name"];
    move_uploaded_file($_FILES["attachment"]["tmp_name"], "../assets/uploads/" . $_FILES["attachment"]["name"]);
    $file = '../assets/uploads/'.$fileToUpload;
    $filesize =  formatSizeUnits(filesize($file));
    echo $filesize;
    $sql2 = "INSERT INTO `tbl_files`(`file_name`, `file_size`, `uploaded_by_id`, `team_id`, `project_id`) VALUES ('$fileToUpload', '$filesize', '$uid', '$teamId','$proID')";
    $result2 = mysqli_query($connect, $sql2);
    header('location:../tasks.php');
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

header("Location: ../tasks.php");

?>