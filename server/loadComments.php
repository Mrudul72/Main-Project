<?php
include '../config/connect.php';
$taskId = $_SESSION['curTaskId'];
$sql2 = "SELECT DATE(comment_time) AS date, TIME_FORMAT(comment_time, '%h:%i %p') AS time,comment,user_id,task_id FROM tbl_comments WHERE task_id= $taskId";
$result2 = mysqli_query($connect, $sql2);
if(mysqli_num_rows($result2)>0){
    while($row = mysqli_fetch_assoc($result2)){
        $comment = $row['comment'];
        $userId = $row['user_id'];
        $taskId = $row['task_id'];
        $time = $row['time'];
        $date = $row['date'];
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
                        <p class="time-stamp"><span>'.$date.'</span><span>'.$time.'</span></p>
                    </div>
                </div>
        
        ';
    }
}else{
    echo '<p class="no-comment">No comments yet</p>';
}
              
?>