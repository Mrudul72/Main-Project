<?php
$status = $_POST['status'];
include('../config/connect.php');
$sql = "SELECT * FROM tbl_tasks WHERE task_status= $status ";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $task_id = $row['task_id'];
    $task_title = $row['task_title'];
    $task_description = $row['task_description'];
    $task_team = $row['task_team'];
    $task_added_by = $row['task_added_by'];
    $task_status = $row['task_status'];
    $sql2 = "SELECT * FROM tbl_teams WHERE team_id = $task_team";
    $result2 = mysqli_query($connect, $sql2);
    $val = mysqli_fetch_assoc($result2);
    $team_name = $val['team_title'];
    echo '
        <div id="'.$task_id.'" class="task-items" draggable="true" >
            <div class="task-item-details">
                <p class="task-item-title">
                    ' . $task_title . '
                </p>
                <p class="task-item-sub-title">' . $team_name . '</p>
            </div>
        </div>
        ';
}
?>