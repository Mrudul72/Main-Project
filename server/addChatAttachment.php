<?php
include "../config/connect.php";
session_start();
extract($_POST);
//add chat to database
$user_id = $_SESSION['userId'];
$senderName = $_SESSION['userName'];


$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
$path = '../assets/charImages/'; // upload directory

if (!empty($_POST['name']) || $_FILES['image']) {
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

    // can upload same image using rand function
    $final_image = rand(1000, 1000000) . $img;

    // check's valid format
    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($final_image);

        if (move_uploaded_file($tmp, $path)) {

            //insert form data in the database
            $sql2 = "INSERT INTO `tbl_chats`(`sender_id`, `sender_name`, `chat_image`) VALUES ('$user_id','$senderName','$path')";
            $result2 = mysqli_query($connect, $sql2);
            $chat = mysqli_insert_id($connect);
            $_SESSION['chatId'] = $chat;
            if ($result2) {
                $sql3 = "SELECT chat_image,date_time FROM `tbl_chats` WHERE chat_id = '$chat'";
                $result3 = mysqli_query($connect, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $chatImage = $row3['chat_image'];
                $dateTime = $row3['date_time'];

                echo '
                        <div class="media w-50 ml-auto mb-3">
                            <div class="media-body">
                                <div class="reciever-msg">
                                <img class="img-fluid img-thumbnail" src="' . $chatImage . '" height="270" width="400" alt="">
                                </div>
                                <p class="small text-muted">' . $dateTime . '</p>
                            </div>
                        </div>
                        ';
            }
            //echo $insert?'ok':'err';
        }
    } else {
        echo 'invalid';
    }
}


if (isset($_POST['chatUserId']) || isset($_POST['chatUserName'])) {
    echo "dfsf";
    $chatId = $_SESSION['chatId'];
//update tbl_chats with chatUserId and chatUserName
    $chatUserId = $_POST['chatUserId'];
    $chatUserName = $_POST['chatUserName'];
    $sql = "UPDATE `tbl_chats` SET `receiver_id`='$chatUserId',`receiver_name`='$chatUserName' WHERE chat_id = '$chatId'";
    $result = mysqli_query($connect, $sql);
}
?>
