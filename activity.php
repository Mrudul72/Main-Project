<?php
include('./config/connect.php');
session_start();
if (isset($_SESSION["pmsSession"]) != session_id()) {
    header("Location: ./index.php");
    die();
} else {
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
                    <!--tab start-->
                    <?php include_once("./layouts/tab.php"); ?>
                    <!--tab end-->

                </div>
                <div class="row">
                    <!--col 2 start-->
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <div class="activity-card">
                                <h1 class="content-heading">Activity</h1>
                                <h3 class="sub-title">Today</h3>
                                <ul class="activity-container">
                                    <li class="items">
                                        <img class="activity-ico" src="./assets/icons/tick-dark-ico.svg" alt="" />
                                        <div class="card-text">
                                            <p>Darika Samak mark as done Listing on Product Hunt</p>
                                        </div>
                                        <div class="time-stamp">11:20pm</div>
                                    </li>
                                    <li class="items">
                                        <img class="activity-ico" src="./assets/icons/comment-ico.svg" alt="" />
                                        <div class="card-text">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing
                                                elit. Fugit praesentium impedit quisquam fugiat veniam
                                                nesciunt vel autem nemo deserunt modi quia commodi sint
                                                aliquid minus ipsa unde, dicta nulla soluta.
                                            </p>
                                        </div>
                                        <div class="time-stamp">5:30pm</div>
                                    </li>
                                    <li class="items">
                                        <img class="activity-ico" src="./assets/icons/upload-ico.svg" alt="" />
                                        <div class="card-text">
                                            <p>
                                                Lorem ipsum dolor sit, amet consectetur adipisicing
                                                elit. Enim nobis dolor repellat iste aliquid iusto,
                                                atque culpa cupiditate laboriosam, magni reiciendis.
                                                Sit, sed explicabo quidem reprehenderit amet facilis
                                                eligendi possimus.
                                            </p>
                                            <div class="attachment-container">
                                                <img class="uploads-thumbnail" src="./assets/uploads/img1.png" alt="" />
                                                <img class="uploads-thumbnail" src="./assets/uploads/img2.png" alt="" />
                                            </div>
                                        </div>
                                        <div class="time-stamp">4:00pm</div>
                                    </li>
                                </ul>
                                <h3 class="sub-title">Yesterday</h3>
                                <ul class="activity-container">
                                    <li class="items">
                                        <img class="activity-ico" src="./assets/icons/tick-dark-ico.svg" alt="" />
                                        <div class="card-text">
                                            <p>Darika Samak mark as done Listing on Product Hunt</p>
                                        </div>
                                        <div class="time-stamp">12:40pm</div>
                                    </li>
                                    <li class="items">
                                        <img class="activity-ico" src="./assets/icons/comment-ico.svg" alt="" />
                                        <div class="card-text">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing
                                                elit. Fugit praesentium impedit quisquam fugiat veniam
                                                nesciunt vel autem nemo deserunt modi quia commodi sint
                                                aliquid minus ipsa unde, dicta nulla soluta.
                                            </p>
                                            <div class="attachment-container">
                                                <img class="uploads-thumbnail" src="./assets/uploads/img3.png" alt="" />
                                                <img class="uploads-thumbnail" src="./assets/uploads/img4.png" alt="" />
                                                <img class="uploads-thumbnail" src="./assets/uploads/img5.png" alt="" />
                                            </div>
                                        </div>
                                        <div class="time-stamp">1:50pm</div>
                                    </li>
                                    <li class="items">
                                        <img class="activity-ico" src="./assets/icons/upload-ico.svg" alt="" />
                                        <div class="card-text">
                                            <p>
                                                Lorem ipsum dolor sit, amet consectetur adipisicing
                                                elit. Enim nobis dolor repellat iste aliquid iusto,
                                                atque culpa cupiditate laboriosam, magni reiciendis.
                                                Sit, sed explicabo quidem reprehenderit amet facilis
                                                eligendi possimus.
                                            </p>
                                        </div>
                                        <div class="time-stamp">9:40pm</div>
                                    </li>
                                </ul>
                                <h3 class="view-more-btn">View More >></h3>
                            </div>
                        </div>
                    </div>
                    <!--col 2 end-->
                </div>
            </div>
        </div>

        <script src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script src="./js/app.js"></script>
    </body>

    </html>
<?php
}
?>