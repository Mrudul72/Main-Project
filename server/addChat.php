<?php
include "../config/connect.php";
session_start();
extract($_POST);
//add chat to database
$user_id = $_SESSION['userId'];
$senderName = $_SESSION['userName'];
$sql = "INSERT INTO `tbl_chats`(`sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `chat_text`) VALUES ('$user_id','$senderName','$chatUserId','$chatUserName','$chatInput')";
$result = mysqli_query($connect, $sql);
$chat = mysqli_insert_id($connect);
$sql2 = "SELECT DATE_FORMAT(date_time,'%d %M  %Y') AS date, TIME_FORMAT(date_time, '%h:%i %p') AS time FROM `tbl_chats` WHERE chat_id = '$chat'";
$result2 = mysqli_query($connect, $sql2);
$row = mysqli_fetch_assoc($result2);
$date = $row['date'];
$time = $row['time'];
if($result){
    echo '
                        <div class="media w-50 ml-auto mb-3">
                            <div class="media-body">
                                <div class="reciever-msg">
                                ' . $chatInput . '
                                </div>
                                <p class="small text-muted">' . $date . ', ' . $time . '</p>
                            </div>
                        </div>
                        ';
}else{
    echo "failed";
}
?>