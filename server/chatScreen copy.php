<?php
//load chat list
include '../config/connect.php';
session_start();
$user_id = $_SESSION['userId'];
$team_id = $_SESSION['currentUserTeamId'];
$sql = "SELECT chat_id,sender_id,sender_name,receiver_id,date_time,chat_text FROM `tbl_chats` WHERE ORDER BY date_time DESC";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $chat_id = $row['chat_id'];
        $sender_id = $row['sender_id'];
        $sender_name = $row['sender_name'];
        $receiver_id = $row['receiver_id'];
        $date_time = $row['date_time'];
        $chat_text = $row['chat_text'];
        if ($user_id == $sender_id) {
            $chat_text = "<div class='chat-bubble-right'>$chat_text</div>";
        } else {
            $chat_text = "<div class='chat-bubble-left'>$chat_text</div>";
        }
    }
}
?>


<div class="col-7 px-0">
    <div class="chats-card-1" style="padding-bottom:0vw !important ;">
        <div class="chat-card-header">
            <h1 class="content-heading">Jason Doe</h1>
            <div>
                <button data-toggle='modal' data-target='#newChatModal' class="add-task-btn"><img src="./assets/icons/paper-clip.svg" alt=""></button>
                <button data-toggle='modal' data-target='#newChatModal' class="add-task-btn"><img src="./assets/icons/image-ico.svg" alt=""></button>
            </div>
        </div>
        <div class="chat-card-body">
            <!-- Sender Message-->
            <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                <div class="media-body ml-3">
                    <div class="sender-msg">
                        Test which is a new approach all solutions
                    </div>
                    <p class="small text-muted">12:00 PM | Aug 13</p>
                </div>
            </div>

            <!-- Reciever Message-->
            <div class="media w-50 ml-auto mb-3">
                <div class="media-body">
                    <div class="reciever-msg">
                        Test which is a new approach to have all solutions
                    </div>
                    <p class="small text-muted">12:00 PM | Aug 13</p>
                </div>
            </div>

            <!-- Sender Message-->
            <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                <div class="media-body ml-3">
                    <div class="sender-msg">
                        Test which is a new approach all solutions
                    </div>
                    <p class="small text-muted">12:00 PM | Aug 13</p>
                </div>
            </div>

            <!-- Reciever Message-->
            <div class="media w-50 ml-auto mb-3">
                <div class="media-body">
                    <div class="reciever-msg">
                        Test which is a new approach to have all solutions
                    </div>
                    <p class="small text-muted">12:00 PM | Aug 13</p>
                </div>
            </div>
        </div>


        <!-- Typing area -->
        <form action="#" class="bg-white">
            <div class="chat-input">
                <input type="text" name="comments" id="comments" class="form-control" placeholder="Enter your comments" autocomplete="off">
                <button id="addCommentBtn" type="submit" class="btn btn-primary modal-btn-submit">></button>
            </div>
        </form>

    </div>



</div>