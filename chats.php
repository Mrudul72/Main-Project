<?php
include('./config/connect.php');
session_start();
$user_id = $_SESSION['userId'];
if (isset($_SESSION["pmsSession"]) != session_id()) {
    header("Location: ./index.php");
    die();
} else {
    $team_id = $_SESSION["currentUserTeamId"];
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title></title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="./stylesheets/css/style.css" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./stylesheets/css/bootstrap.min.css" />
        <link rel="icon" href="./assets/images/logo2.png" type="image/icon type" />
    </head>

    <body class="dashboard-body">
        <div class="dashboard-container">
            <!--sidebar goes here-->
            <?php include("./layouts/sidebar.php"); ?>
            <!--sidebar end-->

            <!--header starts-->
            <?php include("./layouts/header.php"); ?>
            <!--header ends-->

            <!--Dashboard contents-->
            <div class="dashboard-contents">
                <div class="row">
                    <!--col 1 start-->
                    <!-- Users box-->
                    <div class="col-5 ">
                        <div class="chats-card-1">

                            <div class="d-flex justify-content-between align-items-center">
                                <h1 class="content-heading">Recent Chats</h1>
                                <button data-toggle='modal' data-target='#newChatModal' class="add-task-btn">New Chat +</button>
                            </div>

                            <div class="messages-box mt-2" id="chatList">
                                
                            </div>
                        </div>
                    </div>
                    <!--col 1 end-->

                    <!--col 2 start-->
                    <!-- Chat Box-->
                    <div class="col-7 px-0" id="chatScreen">
                        

                    </div>
                    <!--col 2 end-->
                </div>
            </div>
        </div>


        <script src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>
        <script src="./js/app.js"></script>

        <script>
            $(document).ready(function(){
                $("#chatList").load("./server/chatList.php");

               

                $("#chatList").on("click", "a", function(){
                    $(this).addClass("rounded-card-active");
                    $("#chatList a").not(this).removeClass("rounded-card-active");
                    var chatId = $(this).attr("id");
                    var currentItem = $(this);
                    var uname = currentItem.find("#uname").text();
                    $.post("./server/chatScreen.php", {
                        chatId: chatId,
                        uname: uname
                    }, function(data){
                        $("#chatScreen").html(data);
                    });
                    
                });
            });
        </script>
    </body>

    </html>
<?php
}
?>