<?php
include "../config/connect.php";
session_start();
extract($_POST);
//add chat to database
$user_id = $_SESSION['userId'];
$senderName = $_SESSION['userName'];

if (isset($_FILES['file']['name'])) {
    echo "file is set";
    /* Getting file name */
    $img = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];

    $path = '../assets/chatAttachment/'; // upload directory

    /* Valid extensions */
    $valid_extensions = array('pdf' , 'docx' , 'pptx' , 'doc' , 'ppt' , 'xlsx' , 'xls' , 'txt' , 'csv'); // valid extensions

    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = rand(1000, 1000000) . $img;


    // check's valid format
    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($final_image);
        if (move_uploaded_file($tmp, $path)) {
            $_SESSION['chatAttachment'] = $final_image;
        }
    }
}
if (isset($_POST['chatUserId'])) {
    extract($_POST);
    $chatAttachment =  $_SESSION['chatAttachment'];
    $sql = "INSERT INTO `tbl_chats`(`sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `chat_attachment`) VALUES ('$user_id','$senderName','$chatUserId','$chatUserName','$chatAttachment')";
    $result = mysqli_query($connect, $sql);
    $chat = mysqli_insert_id($connect);
    $sql2 = "SELECT chat_attachment,DATE_FORMAT(date_time,'%d %M  %Y') AS date, TIME_FORMAT(date_time, '%h:%i %p') AS time FROM `tbl_chats` WHERE chat_id = '$chat'";
    $result2 = mysqli_query($connect, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $chat_attachment = $row2['chat_attachment'];
    $date = $row2['date'];
    $time = $row2['time'];
    echo '
    <div class="media w-50 ml-auto mb-3">
        <div class="media-body">
            <div class="reciever-msg">
                <a href="./assets/chatAttachments/' . $chat_attachment . '" download>' . $chat_attachment . '</a>
            </div>
            <p class="small text-muted">' . $date . ', ' . $time . '</p>
        </div>
    </div>
    ';
}
