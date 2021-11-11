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
                <div class="col-12 task-page-container">
                <div class="d-flex mx-n3">
                        <div class="col-4">
                            <div class="task-items-container">
                                <div class="d-flex justify-content-between align-items-center my-2">
                                    <h1 class="content-heading">Backlog</h1>
                                    <button class="add-task-item-btn">Add Task +</button>
                                </div>
                                <div class="task-items" draggable="true">
                                    <div class="task-item-details">
                                        <p class="task-item-title">
                                            E-mail after registration so that I can confirm my
                                            address
                                        </p>
                                        <p class="task-item-sub-title">Development</p>
                                    </div>
                                </div>
                                <div class="task-items" draggable="true">
                                    <div class="task-item-details">
                                        <p class="task-item-title">
                                            Find top 5 customers and get reviews from them
                                        </p>
                                        <p class="task-item-sub-title">Marketing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="task-items-container">
                                <div class="d-flex justify-content-between align-items-center my-2">
                                    <h1 class="content-heading">To Do</h1>
                                    <button class="add-task-item-btn">Add Task +</button>
                                </div>
                                <div class="task-items" draggable="true">
                                    <div class="task-item-details">
                                        <p class="task-item-title">
                                            E-mail after registration so that I can confirm my
                                            address
                                        </p>
                                        <p class="task-item-sub-title">Development</p>
                                    </div>
                                </div>
                                <div class="task-items" draggable="true">
                                    <div class="task-item-details">
                                        <p class="task-item-title">
                                            Find top 5 customers and get reviews from them
                                        </p>
                                        <p class="task-item-sub-title">Marketing</p>
                                        <div class="task-attachment-container">
                                            <img class="task-uploads-thumbnail" src="./assets/uploads/img1.png" alt="" />
                                            <img class="task-uploads-thumbnail" src="./assets/uploads/img2.png" alt="" />
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="task-items" draggable="true">
                                    <div class="task-item-details">
                                        <p class="task-item-title">
                                            Find top 5 customers and get reviews from them
                                        </p>
                                        <p class="task-item-sub-title">Marketing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="task-items-container">
                                <div class="d-flex justify-content-between align-items-center my-2">
                                    <h1 class="content-heading">Done</h1>
                                    <button class="add-task-item-btn">Add Task +</button>
                                </div>
                                <div class="task-items">
                                    <div class="task-item-details">
                                        <p class="task-item-title">
                                            E-mail after registration so that I can confirm my
                                            address
                                        </p>
                                        <p class="task-item-sub-title">Development</p>
                                    </div>
                                </div>
                                <div class="task-items">
                                    <div class="task-item-details">
                                        <p class="task-item-title">
                                            Find top 5 customers and get reviews from them
                                        </p>
                                        <p class="task-item-sub-title">Marketing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="task-items-container">
                                <div class="d-flex justify-content-between align-items-center my-2">
                                    <h1 class="content-heading">Testing</h1>
                                    <button class="add-task-item-btn">Add Task +</button>
                                </div>
                                <div class="task-items">
                                    <div class="task-item-details">
                                        <p class="task-item-title">
                                            E-mail after registration so that I can confirm my
                                            address
                                        </p>
                                        <p class="task-item-sub-title">Development</p>
                                    </div>
                                </div>
                                <div class="task-items">
                                    <div class="task-item-details">
                                        <p class="task-item-title">
                                            Find top 5 customers and get reviews from them
                                        </p>
                                        <p class="task-item-sub-title">Marketing</p>
                                    </div>
                                </div>
                            </div>
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