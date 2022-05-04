<?php
include '../config/connect.php';
//add checklist
session_start();
$projectId = $_SESSION['projectID'];
$taskId = $_POST['taskId'];
$userId = $_SESSION['userId'];
$userName = $_SESSION['userName'];
$checklistinput = $_POST['checklistinput'];
$checkBoxVisibility = ($_SESSION['currentUserTypeId'] == '2') ? 'display:none;' : '';
$sql = "INSERT INTO tbl_checklist (checklist_title, task_id, user_id, project_id, status) VALUES ('$checklistinput', '$taskId', '$userId', '$projectId', '1')";
$result = mysqli_query($connect, $sql);
$checklistId = mysqli_insert_id($connect);
if($result){
    $sql2 = "SELECT checklist_id,checklist_title FROM tbl_checklist WHERE checklist_id = '$checklistId'";
    $result2 = mysqli_query($connect, $sql2);
    $row = mysqli_fetch_assoc($result2);
    $checklistTitle = $row['checklist_title'];
    $checklistId = $row['checklist_id'];
    
    echo '
    <li class="checklist-items">
        <div id="checkParent">
            <input class="styled-checkbox" type="checkbox" value="'.$checklistId.'"/>
            <label style="'.$checkBoxVisibility.'" for="styled-checkbox"></label>
        </div>
        <div id="checkSibling" class="checklist-item-title">'.$checklistTitle.'</div>
    </li>
    ';

    $taskTitle = $_POST['taskTitle'];
    $activity_desc = "{$userName} added a checklist item \'{$checklistTitle}\' to the task \'{$taskTitle}\'";
    //insert to activity table
    $sql5 = "INSERT INTO tbl_activity (activity_type, activity_by, activity_desc,project_id) VALUES ('checklist', '$userId', '$activity_desc', '$projectId')";
    $res = mysqli_query($connect, $sql5);

}
?>