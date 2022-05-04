<?php
//load chat
include '../config/connect.php';
session_start();
extract($_POST);
$user_id = $_SESSION['userId'];
$team_id = $_SESSION['currentUserTeamId'];
$sql = "SELECT DATE(date_time) AS date, TIME_FORMAT(date_time, '%h:%i %p') AS time,chat_id,sender_id,sender_name,receiver_id,receiver_name,chat_text FROM `tbl_chats` WHERE (sender_id='$chatId' OR receiver_id='$chatId') AND (sender_id='$user_id' OR receiver_id='$user_id') ORDER BY date_time";
$result = mysqli_query($connect, $sql);
echo '
<div class="chats-card-1" style="padding-bottom:0vw !important ;">
        <div class="chat-card-header">
            <h1 class="content-heading" id="chatUserName">' . $uname . '</h1>
            <div>
                <label for="imageUpload" class="add-task-btn"><img src="./assets/icons/image-ico.svg" alt=""></label>
                <input type="file" name="file" id="imageUpload" accept="image/*" style="display:none; margin:0;">

                <label for="attachmentUpload" class="add-task-btn"><img src="./assets/icons/paper-clip.svg" alt=""></label>
                <input type="file" name="attachmentUpload" id="attachmentUpload" style="display:none; margin:0;">
            </div>
        </div>
        <div class="chat-card-body" id="cardBody">

';


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $chat_image = $row['chat_image'];
        $chat_attachment = $row['chat_attachment'];
        $chat_id = $row['chat_id'];
        $sender_id = $row['sender_id'];
        $sender_name = $row['sender_name'];
        $receiver_id = $row['receiver_id'];
        $receiver_name = $row['receiver_name'];
        $date = $row['date'];
        $time = $row['time'];
        $chat_text = $row['chat_text'];

        if ($user_id != $sender_id) {
            echo '

                        <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                            <div class="media-body ml-3">
                                <div class="sender-msg">
                                    ' . $chat_text . '
                                </div>
                                <p class="small text-muted">' . $date . ', ' . $time . '</p>
                            </div>
                        </div>
                        
                        ';
        } else {
            echo '
                        <div class="media w-50 ml-auto mb-3">
                            <div class="media-body">
                                <div class="reciever-msg">
                                ' . $chat_text . '
                                </div>
                                <p class="small text-muted">' . $date . ', ' . $time . '</p>
                            </div>
                        </div>
                        
                        ';
        }
    }
}

echo '
        </div>
            <form action="#" class="bg-white">
                <div class="chat-input">
                <input type="hidden" id="chatUserId" value="' . $chatId . '">
                    <input type="text" name="chatInput" id="chatInput" class="form-control" placeholder="Type here..." autocomplete="off">
                    <button id="addChatBtn" name="addChatBtn" type="button" class="btn btn-primary saveBtn">></button>
                </div>
            </form>
        </div>
        
        ';


?>


<div class="modal" tabindex="-1" id="fileShareModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Do you want to send this item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <img id="uploadPreview" class="img-fluid" height="200px" width="200px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary secondary-outline-btn" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary saveBtn" id="sendImage">Send</button>
            </div>
        </div>
    </div>
</div>




<script>
    $("#imageUpload").change(function() {
        var file_data;
        if ($("#imageUpload").val() != "") {
            file_data = $("#imageUpload").val();
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("imageUpload").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };

            $("#fileShareModal").modal("show");
            //send files
            $("#sendImage").click(function() {
                var chatUserName = $("#chatUserName").text();
                var chatUserId = $("#chatUserId").val();
                var fd = new FormData();
                var files = $('#imageUpload')[0].files;
                fd.append('file', files[0]);
                $.ajax({
                    url: "./server/uploadChatImage.php",
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $.ajax({
                            url: "./server/uploadChatImage.php",
                            type: "POST",
                            data: {
                                chatUserId: chatUserId,
                                chatUserName: chatUserName
                            },

                            success: function(response) {
                                $("#chatInput").val("");
                                $("#cardBody").append(response);
                            }
                        });
                    }
                });
            });
        } else {
            alert("empty");
        }
    });


    //send message
    $("#addChatBtn").click(function() {
        var chatInput = $("#chatInput").val();
        var chatUserId = $("#chatUserId").val();
        var chatUserName = $("#chatUserName").text();
        if (chatInput != "") {
            $.ajax({
                url: "./server/addChat.php",
                type: "POST",
                data: {
                    chatInput: chatInput,
                    chatUserId: chatUserId,
                    chatUserName: chatUserName
                },
                success: function(data) {
                    $("#chatInput").val("");
                    $("#cardBody").append(data);
                    $("#chatList").load("./server/chatList.php");
                }
            });
        } else {
            alert("empty");
        }
    });
</script>