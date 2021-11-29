<?php
$taskId = $_POST['task_id'];
$_SESSION['taskId'] = $taskId;
include('../config/connect.php');
$sql = "SELECT * FROM tbl_tasks WHERE task_id= $taskId";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$taskTitle = $row['task_title'];
$taskDescription = $row['task_description'];
$taskTeam = $row['task_team'];
$createdBy = $row['task_added_by'];
$taskStatus = $row['task_status'];

echo '

<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="task-title">Task title</label>
                <textarea name="task-detail-title" id="task-detail-title" class="form-control" placeholder="task title"
                    autocomplete="off">' . $taskTitle . '</textarea>
            </div>
            <div class=" form-group">
                <label for="task-description" class="col-form-label">Task description:</label>
                <textarea rows="8" id="task-detail-description" row="auto" name="task-detail-description"
                    placeholder="A breif description about task"
                    class="form-control">' . $taskDescription . '</textarea>
            </div>
        </div>

        <div class="col-4 ml-auto">
            <div class="form-group">
                <label for="task-title">Add to card</label>
                <button type="button" class="secondary-modal-btn">Attachment</button>
            </div>
            <div class="form-group">
                <label for="task-actions">Actions</label>
                <button id="deleteTaskBtn" type="button" class="secondary-modal-btn">Delete</button>
            </div>
        </div>

    </div>
</div>

    ';
?>

<script>
    //delete task
    $('#deleteTaskBtn').on('click', function() {
       alert('hi');
        
    //     // var task_id = <?php //echo $_SESSION['taskId'] ?>
    //     
    //             // $('#confirmationModal').modal('show');
    //             // task_id = $(this).attr('id');
    //             // var task_status = 0;
    //             // $("#taskDeleteBtn").on('click', function() {
    //             //     $.ajax({
    //             //         url: "./server/deleteTask.php",
    //             //         method: "POST",
    //             //         data: {
    //             //             task_id: task_id,
    //             //             task_status: task_status
    //             //         },
    //             //         success: function(data) {
    //             //             location.reload();
    //             //         }
    //             //     });
    //             // });

            });
            //delete task ends
</script>


