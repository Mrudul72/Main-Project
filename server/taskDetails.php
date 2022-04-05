<?php
$taskId = $_POST['task_id'];
session_start();
$_SESSION['curTaskId'] = $taskId;
// echo "<script>alert('$taskId');</script>";
include('../config/connect.php');
$sql = "SELECT * FROM tbl_tasks WHERE task_id= $taskId";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$taskTitle = $row['task_title'];
$taskDescription = $row['task_description'];
$taskTeam = $row['team_id'];
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
            <div  class="form-group">
                <label for="comments">Comments</label>
                <div class="border mb-3"></div>
                ';
include './loadComments.php';
echo '
                <div id="comment-container">
                </div>

                <form>
                    <textarea name="comment" id="comment" class="form-control" placeholder="Add comment"></textarea>
                    <input type="hidden" id="taskId" name="taskId" value="' . $taskId . '">
                    <input type="hidden" id="taskTitle" name="taskTitle" value="' . $taskTitle . '">
                    <small id="errMsgComment" class="errMsg"></small>
                    <input id="addCommentBtn" type="button" name="addComment" class="btn btn-primary modal-btn-submit my-3" value="Add comment">
                </form>
                
            </div>
            <div class="form-group" id="checklistContainer">
                <label for="checklist">Checklist</label>
                <div class="commentBox">
                    <input type="text" name="checklistinput" id="checklistinput" class="form-control" placeholder="Type here.." autocomplete="off">
                    <button id="addChecklistBtn" type="button" class="btn btn-primary modal-btn-submit">></button>
                </div>
                <small id="errMsgChecklist" class="errMsg"></small>
                <ul id="notCompleted" class="checklist-container">
                    <h6 class="checklist-title">Not completed</h6>
                    ';
include './loadChecklist.php';
loadChecklist(1, "");
echo '
                </ul>
                <ul id="completed" class="checklist-container">
                    <h6 class="checklist-title">Completed</h6>
                        ';

loadChecklist(0, "checked");
echo '
                </ul>
                
            </div>
            
        </div>

        <div class="col-4 ml-auto">
            <div class="form-group">
                <label for="task-title">Add to card</label>
                <div class="mt-1">
                    <label for="attachmentUpload" class="secondary-modal-btn text-center">Attachment</label>
                    <input type="file" class="dropdown-item" name="attachment" id="attachmentUpload" style="display:none; margin:0;">
                </div>
                <div class="mb-3 mt-2">
                    <button id="checklistShow" name="checklistShow" value="' . $taskId . '" type="button" class="secondary-modal-btn">Checklist</button>
                </div>';
// <div class="my-3">
//     <button id="datesBtn" name="datesBtn" value="' . $taskId . '" type="button" class="secondary-modal-btn">Dates</button>
// </div>
// <div class="my-3">
//     <button id="labels" name="labels" value="' . $taskId . '" type="button" class="secondary-modal-btn">labels</button>
// </div>
echo '
            </div>

            <div class="form-group">
                <label for="task-actions">Actions</label>
                <button id="deleteTask" name="deleteTask" value="' . $taskId . '" type="button" class="secondary-modal-btn">Delete</button>
            </div>
        </div>

    </div>
</div>

    ';
?>


<script>


    
    $("#checklistShow").click(function() {
        $("#checklistContainer").toggle();
    });


    //delete task

    $('#deleteTask').on('click', function() {

        var task_id = $('#deleteTask').val();
        // alert(task_id);
        $('#confirmationModal').modal('show');

        var task_status = 0;
        $("#taskDeleteBtn").on('click', function() {
            $.ajax({
                url: "./server/deleteTask.php",
                method: "POST",
                data: {
                    task_id: task_id,
                    task_status: task_status
                },
                success: function(data) {
                    window.location.reload();
                }
            });
        });

    });
    //delete task ends

    //add comment
    $('#addCommentBtn').on('click', function() {
        var task_id = $('#taskId').val();
        var taskTitle = $('#taskTitle').val();
        var comment = $('#comment').val();
        var err = document.querySelector('#errMsgComment');
        err.classList.remove("showMsg");
        if (comment != '') {
            $.ajax({
                url: "./server/addComment.php",
                method: "POST",
                data: {
                    taskId: task_id,
                    comment: comment,
                    taskTitle: taskTitle
                },
                success: function(data) {
                    // window.location.reload();
                    //alert(data);
                    $('#comment-container').append(data);
                    $('#comment').val('');
                }
            });
        } else {

            err.classList.add("showMsg");
            err.innerHTML = 'Please enter comment';
        }
    });
    //add comment ends

    //add checklist
    $('#addChecklistBtn').on('click', function() {
        var task_id = $('#taskId').val();
        var taskTitle = $('#taskTitle').val();
        var checklistinput = $('#checklistinput').val();
        var err = document.querySelector('#errMsgChecklist');
        err.classList.remove("showMsg");
        if (checklistinput != '') {
            $.ajax({
                url: "./server/addChecklist.php",
                method: "POST",
                data: {
                    taskId: task_id,
                    checklistinput: checklistinput,
                    taskTitle: taskTitle
                },
                success: function(data) {
                    // window.location.reload();
                    // alert(data);
                    $('#notCompleted').append(data);
                    $('#checklistinput').val('');
                    if ($("#notCompleted").children().length > 1) {
                        $("#noItem").remove();
                    }
                }
            });
        } else {

            err.classList.add("showMsg");
            err.innerHTML = 'Please enter checklist item';
        }
    });

    //change checklist status
    $(document).on('change', '.styled-checkbox', function() {
        var checklist_id = $(this).val();
        var task_id = $('#taskId').val();
        var taskTitle = $('#taskTitle').val();
        var status = $(this).prop('checked');
        var currentItem = $(this).parent().parent();
        var currentItemTitle = $(this).parent().parent().find('.checklist-item-title');
        var err = document.querySelector('#errMsgChecklist');
        err.classList.remove("showMsg");
        if (status == true) {
            var action = "completed";
            $.ajax({
                url: "./server/updateChecklistStatus.php",
                method: "POST",
                data: {
                    checklist_id: checklist_id,
                    task_id: task_id,
                    taskTitle: taskTitle,
                    status: action
                },
                success: function(data) {
                    if ($("#completed").children().length > 1) {
                        $("#noItem").remove();
                    }

                    currentItemTitle.addClass('strike');

                    currentItem.appendTo($('#completed'));
                    var notCompleteChildNo = $("#notCompleted").children().length;
                    if (notCompleteChildNo == 1) {
                        $('#notCompleted').append('<p id="noItem" class="no-comment ml-3">No items</p>');
                    }
                }
            });

        } else {
            var action = "not completed";
            $.ajax({
                url: "./server/updateChecklistStatus.php",
                method: "POST",
                data: {
                    checklist_id: checklist_id,
                    task_id: task_id,
                    taskTitle: taskTitle,
                    status: action
                },
                success: function(data) {
                    if ($("#notCompleted").children().length > 1) {
                        $("#noItem").remove();
                    }

                    currentItemTitle.removeClass('strike');

                    currentItem.appendTo($('#notCompleted'));
                    var completeChildNo = $("#completed").children().length;
                    if (completeChildNo == 1) {
                        $('#completed').append('<p id="noItem" class="no-comment ml-3">No items</p>');
                    }
                }
            });
        }
    });
</script>