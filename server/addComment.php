<?php 
include '../config/connect.php';
//add comment

    session_start();
    $projectId = $_SESSION['projectID'];
    $comment = $_POST['comment'];
    $taskId = $_POST['taskId'];
    $userId = $_SESSION['userId'];
    $sql = "INSERT INTO tbl_comments (comment, task_id, user_id, project_id) VALUES ('$comment', '$taskId', '$userId', '$projectId')";
    $result = mysqli_query($connect, $sql);
    $commentId = mysqli_insert_id($connect);
    if($result){
        $sql2 = "SELECT * FROM tbl_comments WHERE comment_id = '$commentId'";
        $result2 = mysqli_query($connect, $sql2);
        $row = mysqli_fetch_assoc($result2);
        $comment = $row['comment'];
        $commentId = $row['comment_id'];
        $userId = $row['user_id'];
        $taskId = $row['task_id'];
        $dateTime = $row['comment_time'];
        $sql3 = "SELECT username FROM tbl_user WHERE user_id = '$userId'";
        $result3 = mysqli_query($connect, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $userName = $row3['username'];
        echo '
        <div class="comment-section">
                    <img src="./assets/icons/comment-ico.svg" alt="comment" class="comment-icon">
                    <div>
                        <h6>'.$userName.'</h6>
                        <p>'.$comment.'</p>
                        <p class="time-stamp">'.$dateTime.'</p>
                    </div>
                </div>
        
        ';
        $taskTitle = $_POST['taskTitle'];
        $activity_desc = "{$userName} commented \'{$comment}\' on the task \'{$taskTitle}\'";
        //insert to activity table
        $sql5 = "INSERT INTO tbl_activity (activity_type, activity_by, activity_desc,project_id) VALUES ('comment', '$userId', '$activity_desc', '$projectId')";
        $result5 = mysqli_query($connect, $sql5);

    }
