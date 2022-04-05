<?php
$action = $_POST['status'];
$checklistId = $_POST['checklist_id'];
$taskTitle = $_POST['taskTitle'];
if($action == 'completed'){
    changeChecklistStatus(0, $checklistId, $taskTitle,'checked' );
}else{
    changeChecklistStatus(1, $checklistId, $taskTitle,'' );
}

function changeChecklistStatus($stat, $id, $taskTitle, $checkedStat){
    include '../config/connect.php';
    session_start();
    
    $projectId = $_SESSION['projectID'];
    $userId = $_SESSION['userId'];
    
    //update checklist status
    $sql = "UPDATE tbl_checklist SET status = '$stat' WHERE checklist_id = '$id'";
    $result = mysqli_query($connect, $sql);
    if($result){
        $sql2 = "SELECT checklist_id,checklist_title FROM tbl_checklist WHERE checklist_id = '$id'";
        $result2 = mysqli_query($connect, $sql2);
        $row = mysqli_fetch_assoc($result2);
        $checklistId = $row['checklist_id'];
        $checklistTitle = $row['checklist_title'];

        echo '
            <li class="checklist-items">
                <div id="checkParent">
                    <input class="styled-checkbox" type="checkbox" '.$checkedStat.' value="'.$checklistId.'"/>
                    <label for="styled-checkbox"></label>
                </div>
                <div id="checkSibling" class="checklist-item-title">'.$checklistTitle.'</div>
            </li>
            ';


        $activity_desc = "{$_SESSION['userName']} changed the status of the checklist item \'{$checklistTitle}\' in the task \'{$taskTitle}\'";
        //insert to activity table
        $sql5 = "INSERT INTO tbl_activity (activity_type, activity_by, activity_desc,project_id) VALUES ('task', '$userId', '$activity_desc', '$projectId')";
    }

}

?>