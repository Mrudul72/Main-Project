<?php
include('../config/connect.php');
session_start();
$taskId = $_SESSION['curTaskId'];
$userName = $_SESSION['userName'];

//featch task details
$query1 = "SELECT * FROM tbl_tasks WHERE task_id = '$taskId'";
$res1 = mysqli_query($connect, $query1);
$row = mysqli_fetch_assoc($res1);
$task_title = $row['task_title'];
$task_description = $row['task_description'];


// echo $taskId;
$desc = $_POST['task-detail-description'];
$title = $_POST['task-detail-title'];
$uid = $_SESSION['userId'];
$teamId = $_SESSION['currentUserTeamId'];
$proID = $_SESSION['projectID'];
// $sql = "UPDATE `tbl_tasks` SET `task_status`='$taskStatus', WHERE `task_id`='$taskId'";
$sql = "UPDATE `tbl_tasks` SET `task_title`='$title',`task_description`='$desc' WHERE `task_id`='$taskId'";
$result = mysqli_query($connect, $sql);

if ($task_title != $title) {
    $activity_desc = "{$userName} changed title of task \'{$task_title}\' to {$title} ";
    //insert to activity table
    $query2 = "INSERT INTO tbl_activity (activity_type, activity_by, activity_desc,project_id) VALUES ('task', '$userId', '$activity_desc', '$proID')";
    $res2 = mysqli_query($connect, $query2);
}
if ($task_description != $desc) {
    $activity_desc = "{$userName} changed description of task \'{$title}\'";
    //insert to activity table
    $query3 = "INSERT INTO tbl_activity (activity_type, activity_by, activity_desc,project_id) VALUES ('task', '$userId', '$activity_desc', '$proID')";
    $res3 = mysqli_query($connect, $query3);
}






//insert file
if (!isset($_FILES['attachment']) || $_FILES['attachment']['error'] == UPLOAD_ERR_NO_FILE) {
    // echo "<script>alert('File Not selected');</script>";
} else {
    $fileToUpload = $_FILES["attachment"]["name"];
    move_uploaded_file($_FILES["attachment"]["tmp_name"], "../assets/uploads/" . $_FILES["attachment"]["name"]);
    $file = '../assets/uploads/' . $fileToUpload;
    $filesize =  formatSizeUnits(filesize($file));
    echo $filesize;
    $sql2 = "INSERT INTO `tbl_files`(`file_name`, `file_size`, `uploaded_by_id`, `team_id`, `project_id`) VALUES ('$fileToUpload', '$filesize', '$uid', '$teamId','$proID')";
    $result2 = mysqli_query($connect, $sql2);


    $activity_desc = "{$userName} add an attachment to task \'{$title}\'";
    //insert to activity table
    $query4 = "INSERT INTO tbl_activity (activity_type, activity_by, activity_desc,project_id) VALUES ('file', '$userId', '$activity_desc', '$proID')";
    $res4 = mysqli_query($connect, $query4);
    header('location:../tasks.php');
}





function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}

header("Location: ../tasks.php");
