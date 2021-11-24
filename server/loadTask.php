<?php

include('../config/connect.php');
$sql = "SELECT * FROM tbl_tasks";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $task_id = $row['task_id'];
    $task_title = $row['task_title'];
    $task_description = $row['task_description'];
    $task_allocation = $row['task_allocation'];
    $task_added_by = $row['task_added_by'];
    $task_status = $row['task_status'];
    echo '
    <div class="task-items" draggable="true">
    <div class="task-item-details">
        <p class="task-item-title">
            '.$task_title.'
        </p>
        <p class="task-item-sub-title">'.$task_allocation.'</p>
    </div>
</div>
    ';
}
?>