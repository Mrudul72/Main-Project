<?php
include "../config/connect.php";
session_start();
extract($_POST);
//add chat to database
$user_id = $_SESSION['userId'];
$senderName = $_SESSION['userName'];
//insert file
// $img = $_FILES['image']['name'];
// $tmp = $_FILES['image']['tmp_name'];
// $path = '../assets/charImages/';
// $final_image = rand(1000, 1000000) . $img;
// $path = $path . strtolower($final_image);
// $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
// $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// if (in_array($ext, $valid_extensions)) {
//     if (move_uploaded_file($tmp, $path)) {
//         $sql2 = "INSERT INTO `tbl_chats`(`sender_id`, `sender_name`, `chat_image`) VALUES ('$user_id','$senderName','$path')";
//         $result2 = mysqli_query($connect, $sql2);
//         $chat = mysqli_insert_id($connect);
//         $_SESSION['chatId'] = $chat;
//         if ($result2) {
//             $sql3 = "SELECT chat_image,date_time FROM `tbl_chats` WHERE chat_id = '$chat'";
//             $result3 = mysqli_query($connect, $sql3);
//             $row3 = mysqli_fetch_assoc($result3);
//             $chatImage = $row3['chat_image'];
//             $dateTime = $row3['date_time'];
//             echo '
//                         <div class="media w-50 ml-auto mb-3">
//                             <div class="media-body">
//                                 <div class="reciever-msg">
//                                 <img class="img-fluid img-thumbnail" src="' . $chatImage . '" height="270" width="400" alt="">
//                                 </div>
//                                 <p class="small text-muted">' . $dateTime . '</p>
//                             </div>
//                         </div>
//                         ';
//         }
//     }
// }
// $fileToUpload = $_FILES["imageUpload"]["name"];
// move_uploaded_file($_FILES["imageUpload"]["tmp_name"], "../assets/chatImages/" . $_FILES["imageUpload"]["name"]);
// $file = '../assets/chatImages/' . $fileToUpload;
// $sql2 = "INSERT INTO `tbl_chats`(`sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `chat_image`) VALUES ('$user_id','$senderName','$chatUserId','$chatUserName','$file')";
// $result2 = mysqli_query($connect, $sql2);
// $chat = mysqli_insert_id($connect);
// $sql3 = "SELECT chat_image,date_time FROM `tbl_chats` WHERE chat_id = '$chat'";
// $result3 = mysqli_query($connect, $sql3);
// $row3 = mysqli_fetch_assoc($result3);
// $chatImage = $row3['chat_image'];
// $dateTime = $row3['date_time'];

// echo '
//                     <div class="media w-50 ml-auto mb-3">
//                         <div class="media-body">
//                             <div class="reciever-msg">
//                             <img src="' . $chatImage . '" alt="">
//                             </div>
//                             <p class="small text-muted">' . $dateTime . '</p>
//                         </div>
//                     </div>
//                     ';

?>


<?php

if (isset($_FILES['file']['name'])) {

    /* Getting file name */
    $img = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];

    $path = '../assets/chatImages/'; // upload directory

    /* Valid extensions */
    $valid_extensions = array("jpg", "jpeg", "png");

    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = rand(1000, 1000000) . $img;


    // check's valid format
    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($final_image);
        if (move_uploaded_file($tmp, $path)) {
            $_SESSION['uploadedImage'] = $final_image;
        }
    }
}
if (isset($_POST['chatUserId'])) {
    extract($_POST);
    $image =  $_SESSION['uploadedImage'];
    $sql = "INSERT INTO `tbl_chats`(`sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `chat_image`) VALUES ('$user_id','$senderName','$chatUserId','$chatUserName','$image')";
    $result = mysqli_query($connect, $sql);
    $chat = mysqli_insert_id($connect);
    $sql2 = "SELECT chat_image,date_time FROM `tbl_chats` WHERE chat_id = '$chat'";
    $result2 = mysqli_query($connect, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $chatImage = $row2['chat_image'];
    $dateTime = $row2['date_time'];
    echo '
        <div class="media w-50 ml-auto mb-3">
            <div class="media-body">
                <div class="reciever-msg">
                <img class="img-fluid img-thumbnail" src="./assets/chatImages/' . $chatImage . '" height="270" width="400" alt="">
                </div>
                <p class="small text-muted">' . $dateTime . '</p>
            </div>
        </div>
        ';
}
