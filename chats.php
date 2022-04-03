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
            <?php include_once("./layouts/sidebar.php"); ?>
            <!--sidebar end-->

            <!--header starts-->
            <?php include_once("./layouts/header.php"); ?>
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

                            <div class="messages-box mt-2">
                                <div class="list-group rounded-2">
                                    <a class="rounded-card rounded-card-active">
                                        <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                            <div class="media-body ml-4">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small>
                                                </div>
                                                <p class="mb-0 msg-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="rounded-card">
                                        <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                            <div class="media-body ml-4">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small>
                                                </div>
                                                <p class="mb-0 msg-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="rounded-card">
                                        <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                            <div class="media-body ml-4">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small>
                                                </div>
                                                <p class="mb-0 msg-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="rounded-card">
                                        <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                            <div class="media-body ml-4">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small>
                                                </div>
                                                <p class="mb-0 msg-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="rounded-card">
                                        <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                            <div class="media-body ml-4">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small>
                                                </div>
                                                <p class="mb-0 msg-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="rounded-card">
                                        <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                            <div class="media-body ml-4">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small>
                                                </div>
                                                <p class="mb-0 msg-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="rounded-card">
                                        <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                            <div class="media-body ml-4">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">25 Dec</small>
                                                </div>
                                                <p class="mb-0 msg-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                            </div>
                                        </div>
                                    </a>



                                </div>
                            </div>
                        </div>
                    </div>
                    <!--col 1 end-->

                    <!--col 2 start-->
                    <!-- Chat Box-->
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
                    <!--col 2 end-->
                </div>
            </div>
        </div>


        <script src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>

        <script>
            // const checkboxs = document.querySelectorAll('.styled-checkbox');
            // for (let i = 0; i < checkboxs.length; i++) {
            //     checkboxs[i].addEventListener('change', (event) => {
            //         if (event.currentTarget.checked) {
            //             var checkbox_id = $(this).attr('id');
            //             alert(checkbox_id);
            //         } else {
            //             alert('not checked');
            //         }
            //     })
            // }

            $(document).ready(function() {
                const nav = document.querySelectorAll(".nav");
                const nav_icons = document.querySelector(".svgClass");
                const navItems = document.querySelectorAll(".nav-items");
                const active_nav = document.querySelector(".active-nav");

                window.addEventListener("load", () => {
                    active_nav.querySelector(".svgClass").contentDocument.getElementById("svgInternalID").style.fill = "#fff";
                });
            });
        </script>
    </body>

    </html>
<?php
}
?>