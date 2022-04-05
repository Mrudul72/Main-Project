<?php
include('./config/connect.php');
session_start();
$projectId = $_SESSION['projectID'];
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
                                <?php 
                                // $sql = "SELECT date_format(activity_date,'%d/%m/%Y') as date FROM `tbl_activity` Date(activity_date) = C;";
                                $sql = "SELECT DATE(activity_date) AS date, TIME_FORMAT(activity_date, '%h:%i %p') AS time, activity_desc, activity_type FROM `tbl_activity` WHERE DATE(activity_date) = CURRENT_DATE and project_id = '$projectId' ORDER BY activity_date DESC";
                                $result = mysqli_query($connect, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                if($resultCheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $date = $row['date'];
                                        $time = $row['time'];
                                        $activity_desc = $row['activity_desc'];
                                        $activity_type = $row['activity_type'];
                                        if($activity_type == "task"){
                                            $img = "task-ico.svg";
                                        }else if($activity_type == "attachment"){
                                            $img = "paper-clip.svg";
                                        }else if($activity_type == "comment"){
                                            $img = "comment-ico.svg";
                                        }else if($activity_type == "checklist"){
                                            $img = "checklist-ico.svg";
                                        }

                                        echo '
                                        
                                        
                                    <li class="items">
                                        <img class="activity-ico" src="./assets/icons/'.$img.'" alt="" />
                                        <div class="card-text">
                                            <p>'.$activity_desc.'</p>
                                        </div>
                                        <div class="time-stamp">'.$time.'</div>
                                    </li>
                                
                                        
                                        ';
                                    }
                                }else{
                                    echo '
                                    <ul class="activity-container">
                                    <li class="items">
                                        
                                        <div class="card-text">
                                            <p>No activity today</p>
                                        </div>
                                    </li>
                                </ul>
                                    ';
                                }

                                
                                ?>
                                </ul>
                                <h3 class="sub-title">Yesterday</h3>
                                <ul class="activity-container">
                                <?php 
                                // $sql = "SELECT date_format(activity_date,'%d/%m/%Y') as date FROM `tbl_activity` Date(activity_date) = C;";
                                $sql = "SELECT DATE(activity_date) AS date, TIME_FORMAT(activity_date, '%h:%i %p') AS time, activity_desc, activity_type FROM `tbl_activity` WHERE DATE(activity_date) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) and project_id = '$projectId' ORDER BY activity_date DESC";
                                $result = mysqli_query($connect, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                if($resultCheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $date = $row['date'];
                                        $time = $row['time'];
                                        $activity_desc = $row['activity_desc'];
                                        $activity_type = $row['activity_type'];
                                        
                                        if($activity_type == "task"){
                                            $img = "task-ico.svg";
                                        }else if($activity_type == "attachment"){
                                            $img = "paper-clip.svg";
                                        }else if($activity_type == "comment"){
                                            $img = "comment-ico.svg";
                                        }else if($activity_type == "checklist"){
                                            $img = "checklist-ico.svg";
                                        }

                                        echo '
                                        
                                        
                                    <li class="items">
                                        <img class="activity-ico" src="./assets/icons/'.$img.'" alt="" />
                                        <div class="card-text">
                                            <p>'.$activity_desc.'</p>
                                        </div>
                                        <div class="time-stamp">'.$time.'</div>
                                    </li>
                                
                                        
                                        ';
                                    }
                                }else{
                                    echo '
                                    <ul class="activity-container">
                                    <li class="items">
                                        
                                        <div class="card-text">
                                            <p>No activity yesterday</p>
                                        </div>
                                    </li>
                                
                                    ';
                                }
                                ?>
                            
                                </ul>

                                <?php
                                //date older than yesterday
                                $query = "SELECT DATE(activity_date) AS date FROM `tbl_activity` WHERE DATE(activity_date) < DATE_SUB(CURDATE(), INTERVAL 1 DAY) and project_id = '$projectId' GROUP BY DATE(activity_date) ORDER BY DATE(activity_date) DESC";
                                $res = mysqli_query($connect, $query);
                                $resCheck = mysqli_num_rows($res);
                                if($resCheck > 0){
                                    while($row = mysqli_fetch_assoc($res)){
                                        $date = $row['date'];
                                        echo '
                                        <h3 class="sub-title">'.$date.'</h3>
                                        <ul class="activity-container">
                                        ';
                                        $sql = "SELECT DATE(activity_date) AS date, TIME_FORMAT(activity_date, '%h:%i %p') AS time, activity_desc, activity_type FROM `tbl_activity` WHERE DATE(activity_date) = '$date' and project_id = '$projectId' ORDER BY activity_date DESC";
                                        $result = mysqli_query($connect, $sql);
                                        $resultCheck = mysqli_num_rows($result);
                                        if($resultCheck > 0){
                                            while($row = mysqli_fetch_assoc($result)){
                                                $date = $row['date'];
                                                $time = $row['time'];
                                                $activity_desc = $row['activity_desc'];
                                                $activity_type = $row['activity_type'];
                                                
                                                if($activity_type == "task"){
                                                    $img = "task-ico.svg";
                                                }else if($activity_type == "attachment"){
                                                    $img = "paper-clip.svg";
                                                }else if($activity_type == "comment"){
                                                    $img = "comment-ico.svg";
                                                }else if($activity_type == "checklist"){
                                                    $img = "checklist-ico.svg";
                                                }

                                                echo '
                                                
                                                
                                            <li class="items">
                                                <img class="activity-ico" src="./assets/icons/'.$img.'" alt="" />
                                                <div class="card-text">
                                                    <p>'.$activity_desc.'</p>
                                                </div>
                                                <div class="time-stamp">'.$time.'</div>
                                            </li>
                                        
                                                
                                                ';
                                            }
                                        }
                                        echo '</ul>';
                                    }
                                }
                                ?>
                                <!-- <h3 class="view-more-btn">View More >></h3> -->
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