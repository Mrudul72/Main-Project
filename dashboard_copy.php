<?php
include('./config/connect.php');
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
        <?php include("./layouts/sidebar.php"); ?>
        <!--sidebar end-->

        <!--header starts-->
        <?php include("./layouts/header.php"); ?>
        <!--header ends-->

        <!--Dashboard contents-->
        <div class="dashboard-contents">
            <div class="row">
                <!--col 1 start-->
                <div class="col-8">
                    <div class="d-flex">
                        <div class="col">
                            <div class="completed-task">
                                <div class="d-flex flex-column">
                                    <h1 class="content-heading">Completed Tasks</h1>
                                    <h2 class="stats">372</h2>
                                </div>
                                <img class="chart-img" src="./assets/images/Chart.svg" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-6">
                            <div class="ring-chart-container">
                                <h1 class="content-heading">Working Rate</h1>
                                <div class="single-chart">
                                    <svg viewBox="0 0 36 36" class="circular-chart blue">
                                        <path class="circle-bg" d="M18 2.0845
                          a 15.9155 15.9155 0 0 1 0 31.831
                          a 15.9155 15.9155 0 0 1 0 -31.831" />
                                        <path class="circle" stroke-dasharray="82, 100" d="M18 2.0845
                          a 15.9155 15.9155 0 0 1 0 31.831
                          a 15.9155 15.9155 0 0 1 0 -31.831" />
                                        <text x="18" y="20.35" class="percentage">82%</text>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="ring-chart-container">
                                <h1 class="content-heading">Performance</h1>
                                <div class="single-chart">
                                    <svg viewBox="0 0 36 36" class="circular-chart blue">
                                        <path class="circle-bg" d="M18 2.0845
                          a 15.9155 15.9155 0 0 1 0 31.831
                          a 15.9155 15.9155 0 0 1 0 -31.831" />
                                        <path class="circle" stroke-dasharray="62, 100" d="M18 2.0845
                          a 15.9155 15.9155 0 0 1 0 31.831
                          a 15.9155 15.9155 0 0 1 0 -31.831" />
                                        <text x="18" y="20.35" class="percentage">62%</text>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col">
                            <div class="today-task-container">
                                <div class="
                      d-flex
                      justify-content-between
                      align-items-center
                      my-2">
                                    <h1 class="content-heading">Today's Tasks</h1>
                                    <button class="add-task-btn">Add Task +</button>
                                </div>
                                <div class="today-tasks">
                                    <div>
                                        <input class="styled-checkbox" id="styled-checkbox" type="checkbox"
                                            value="value2" />
                                        <label for="styled-checkbox"></label>
                                    </div>
                                    <div class="task-details">
                                        <p class="task-title">
                                            E-mail after registration so that I can confirm my
                                            address
                                        </p>
                                        <p class="task-sub-title">Development</p>
                                    </div>
                                </div>
                                <div class="today-tasks">
                                    <div>
                                        <input class="styled-checkbox" id="styled-checkbox2" type="checkbox"
                                            value="value2" />
                                        <label for="styled-checkbox2"></label>
                                    </div>
                                    <div class="task-details">
                                        <p class="task-title">
                                            Find top 5 customers and get reviews from them
                                        </p>
                                        <p class="task-sub-title">Marketing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--col 1 end-->

                <!--col 2 start-->
                <div class="col-4">
                    <div class="d-flex flex-column">
                        <div class="dashboard-card">
                            <h1 class="content-heading">Activity</h1>
                            <h3 class="sub-title">Today</h3>
                            <ul class="activity-container">
                                <li class="items">
                                    <img src="./assets/icons/tick-dark-ico.svg" alt="" />
                                    <div class="card-text">
                                        <p>Darika Samak mark as done Listing on Product Hunt</p>
                                        <div class="time-stamp">8:40pm</div>
                                    </div>
                                </li>
                                <li class="items">
                                    <img src="./assets/icons/comment-ico.svg" alt="" />
                                    <div class="card-text">
                                        <p>Darika Samak mark as done Listing on Product Hunt</p>
                                        <div class="time-stamp">8:40pm</div>
                                    </div>
                                </li>
                                <li class="items">
                                    <img src="./assets/icons/upload-ico.svg" alt="" />
                                    <div class="card-text">
                                        <p>Darika Samak mark as done Listing on Product Hunt</p>
                                        <div class="time-stamp">8:40pm</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="dashboard-card">
                            <h1 class="content-heading">Upcoming Events</h1>
                            <h3 class="sub-title">Today</h3>
                            <ul class="activity-container">
                                <li class="items">
                                    <img src="./assets/icons/tick-dark-ico.svg" alt="" />
                                    <div class="card-text">
                                        <p>Darika Samak mark as done Listing on Product Hunt</p>
                                        <div class="time-stamp">8:40pm</div>
                                    </div>
                                </li>
                                <li class="items">
                                    <img src="./assets/icons/client-ico.svg" alt="" />
                                    <div class="card-text">
                                        <p>Client Meeting</p>
                                        <div class="time-stamp">8:40pm</div>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="sub-title">Tomorrow</h3>
                            <ul class="activity-container">
                                <li class="items">
                                    <img src="./assets/icons/comment-ico.svg" alt="" />
                                    <div class="card-text">
                                        <p>Review Meeting</p>
                                        <div class="time-stamp">8:40pm</div>
                                    </div>
                                </li>
                                <li class="items">
                                    <img src="./assets/icons/tick-dark-ico.svg" alt="" />
                                    <div class="card-text">
                                        <p>Darika Samak mark as done Listing on Product Hunt</p>
                                        <div class="time-stamp">8:40pm</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--col 2 end-->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="./js/app.js"></script>

</body>

</html>
<?php
}
?>