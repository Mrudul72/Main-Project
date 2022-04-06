<?php
//load chat list
include '../config/connect.php';
session_start();
$user_id = $_SESSION['userId'];
$team_id = $_SESSION['currentUserTeamId'];
$sql = "SELECT chat_id,sender_id,sender_name,receiver_id,receiver_name,date_time,chat_text FROM `tbl_chats` WHERE sender_id='$user_id' OR receiver_id='$user_id' GROUP BY if(sender_id='$user_id', receiver_id,sender_id) ORDER BY date_time DESC";
// echo $sql;
$result = mysqli_query($connect, $sql);


?>


<div class="list-group rounded-2">
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $chat_id = $row['chat_id'];
            $sender_id = $row['sender_id'];
            $sender_name = $row['sender_name'];
            $receiver_id = $row['receiver_id'];
            $receiver_name = $row['receiver_name'];
            $date_time = $row['date_time'];
            $chat_text = $row['chat_text'];
            if($user_id == $sender_id){
                $username = $receiver_name;
                $uid = $receiver_id;
            }
            else{
                $username = $sender_name;
                $uid = $sender_id;
            }
                
            
            echo '
            <a class="rounded-card" id="'.$uid.'">
                <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                    <div class="media-body ml-4">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <h6 class="mb-0" id="uname">'.$username.'</h6><small class="small font-weight-bold">'.$date_time.'</small>
                        </div>
                        <p class="mb-0 msg-preview">'.$chat_text.'</p>
                    </div>
                </div>
            </a>
            
            ';
        }
    }
    ?>
    
</div>