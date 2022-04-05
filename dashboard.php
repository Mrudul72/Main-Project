<?php
include('./config/connect.php');
session_start();
$user_id = $_SESSION['userId'];
if (isset($_SESSION["pmsSession"]) != session_id()) {
    header("Location: ./index.php");
    die();
} else {
    $team_id=$_SESSION["currentUserTeamId"];
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
                                        <h1 class="content-heading">Ongoing projects</h1>
                                        <?php
                                        $userid = $_SESSION['userId'];
                                        //select from tbl_team_allocation table
                                        $sqlQuery = "SELECT count(DISTINCT project_id) AS proCount FROM tbl_team_allocation WHERE team_id='$team_id' OR project_manager='$userid '";
                                        $result2 = mysqli_query($connect, $sqlQuery);
                                        $count2 = mysqli_num_rows($result2);
                                        if($count2>0){
                                            $row2 = mysqli_fetch_assoc($result2);
                                            $project_count=$row2['proCount'];
                                            echo '<h2 class="stats">'.$project_count.'</h2>';
                                        }
                                        else{
                                            echo '<h2 class="stats">0</h2>';
                                        }
                                        ?>
                                        
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
                                        <h1 class="content-heading">Backlog Tasks</h1>
                                        <!-- <button data-toggle='modal' data-target='#addTasksModal' class="add-task-btn">Add Task +</button> -->
                                    </div>
                                    <?php
                                    $sql = "SELECT distinct tbl_tasks.task_id,tbl_tasks.task_title,tbl_tasks.team_id FROM tbl_tasks JOIN tbl_user ON tbl_tasks.team_id=tbl_user.team_id WHERE tbl_tasks.task_status=1  AND tbl_tasks.team_id=$team_id";
                                    $result = mysqli_query($connect, $sql);
                                    if($result){
                                        $i = 0;
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $i++;
                                            $task_id = $row['task_id'];
                                            // echo "<script>alert('$task_id');</script>";
                                            $task_title = $row['task_title'];
                                            // $task_description = $row['task_description'];
                                            $team_id = $row['team_id'];
                                            // $task_added_by = $row['task_added_by'];
                                            // $task_status = $row['task_status'];
                                            $sql2 = "SELECT * FROM tbl_teams WHERE team_id = $team_id";
                                            $result2 = mysqli_query($connect, $sql2);

                                            $sql5 = "SELECT * FROM tbl_teams WHERE team_id in (SELECT team_id FROM tbl_team_allocation WHERE project_manager = $user_id)";
                                            $res5 = mysqli_query($connect, $sql5);

                                            if(mysqli_num_rows($result2)>0){
                                                $row2 = mysqli_fetch_assoc($result2);
                                                $team_name = $row2['team_title'];
                                            }
                                            else if($_SESSION['currentUserTypeId'] == 2){
                                                $row5 = mysqli_fetch_assoc($res5);
                                                $team_name = $row5['team_title'];
                                            }
                                            else{
                                                $team_name = "Manager";
                                            }
                                            
                                            echo '<div class="today-tasks">
                                        <div id="checkParent">
                                            <input class="styled-checkbox" id="' . $task_id . '" type="checkbox"
                                                value="value2" />
                                            <label id="styled-checkbox-label' . $i . '" for="styled-checkbox"></label>
                                        </div>
                                        <div id="checkSibling" class="task-details">
                                            <p class="task-title">
                                            ' . $task_title . '
                                            </p>
                                            <p class="task-sub-title">' . $team_name . '</p>
                                        </div>
                                    </div>';
                                        }
                                    } else {
                                        echo '<div class="today-tasks">
                                        
                                        <div id="checkSibling" class="task-details">
                                            <p class="task-title">
                                            No tasks in backlog
                                            </p>
                                            
                                        </div>
                                    </div>';
                                    }
                                    }
                                    else {
                                        echo '<div class="today-tasks">
                                        
                                        <div id="checkSibling" class="task-details">
                                            <p class="task-title">
                                            No tasks in backlog
                                            </p>
                                            
                                        </div>.
                                    </div>';
                                    }
                                    
                                    ?>
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

                                <?php 
                                // $sql = "SELECT date_format(activity_date,'%d/%m/%Y') as date FROM `tbl_activity` Date(activity_date) = C;";
                                $sql = "SELECT DATE(activity_date) AS date, TIME_FORMAT(activity_date, '%h:%i %p') AS time, activity_desc, activity_type FROM `tbl_activity` WHERE DATE(activity_date) = CURRENT_DATE and project_id in (SELECT project_id FROM tbl_team_allocation WHERE team_id = $team_id or project_manager = $user_id) limit 3";
                                $result = mysqli_query($connect, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                if($resultCheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $date = $row['date'];
                                        $time = $row['time'];
                                        $activity_desc = $row['activity_desc'];
                                        $activity_type = $row['activity_type'];
                                        $img = ($activity_type == "task") ? "tick-dark-ico.svg" : "upload-ico.svg";

                                        echo '
                                        
                                        <ul class="activity-container">
                                            <li class="items">
                                                <img src="./assets/icons/'.$img.'" alt="" />
                                                <div class="card-text">
                                                    <p>'.$activity_desc.'</p>
                                                    <div class="time-stamp">'.$time.'</div>
                                                </div>
                                            </li>
                                        </ul>
                                        
                                        ';
                                    }
                                }

                                
                                ?>
                                
                                <a href="./project.php" class="view-more">View More >></a>
                            </div>
                            <div class="dashboard-card">
                                <h1 class="content-heading">Upcoming Events</h1>
                                <h3 class="sub-title">Today</h3>
                                <ul class="activity-container">
                                    <?php
                                    //select all event for today
                                    $today = date("Y-m-d");
                                    $tomorrow = date("Y-m-d", strtotime("+1 day"));
                                    $sql = "SELECT * FROM tbl_events WHERE start = '$today' limit 3";
                                    $result = mysqli_query($connect, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $event_id = $row['id'];
                                            $event_title = $row['title'];
                                            $event_start = $row['start'];
                                            $event_end = $row['end'];
                                            echo '
                                                <li class="items">
                                                    <img src="./assets/icons/schedule-round-ico.svg" alt="" />
                                                    <div class="card-text">
                                                        <p>' . $event_title . '</p>
                                                         <div class="time-stamp">' . $event_start . '</div>
                                                    </div>
                                                </li>
                                                ';
                                        }
                                    } else {
                                        echo '
                                                <li class="items">
                        
                                                    <div class="card-text">
                                                        <p>No events</p>
                          
                                                    </div>
                                                </li>
                                            ';
                                    }

                                    ?>


                                </ul>
                                <h3 class="sub-title">Tomorrow</h3>
                                <ul class="activity-container">
                                    <?php
                                    //select all event for today
                                    $today = date("Y-m-d");
                                    $tomorrow = date("Y-m-d", strtotime("+1 day"));
                                    $sql = "SELECT * FROM tbl_events WHERE start = '$tomorrow' limit 3";
                                    $result = mysqli_query($connect, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $event_id = $row['id'];
                                            $event_title = $row['title'];
                                            $event_start = $row['start'];
                                            $event_end = $row['end'];
                                            echo '
                                                <li class="items">
                                                    <img src="./assets/icons/schedule-round-ico.svg" alt="" />
                                                    <div class="card-text">
                                                        <p>' . $event_title . '</p>
                                                         <div class="time-stamp">' . $event_start . '</div>
                                                    </div>
                                                </li>
                                                ';
                                        }
                                    } else {
                                        echo '
                                                <li class="items">
                        
                                                    <div class="card-text">
                                                        <p>No events</p>
                          
                                                    </div>
                                                </li>
                                            ';
                                    }

                                    ?>


                                </ul>
                                <a href="./schedule.php" class="view-more">View More >></a>
                            </div>
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
        <script src="./js/app.js"></script>
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
                //add new task

                // $('#addTaskBtn').on('click', function() {
                //     var task_title = $('#task-title').val();
                //     var task_description = $('#task-description').val();
                //     var task_team = $('#team_id').val();
                //     task_added_by = <?php //echo $_SESSION['userId']; ?>;
                //     var task_status = 1;

                //     if (task_title != '' && task_description != '' && task_team != '') {
                //         console.log(task_title);
                //         $("#addTaskBtn").attr("disabled", "disabled");
                //         $.ajax({
                //             url: "./server/addTasks.php",
                //             method: "POST",
                //             data: {
                //                 task_title: task_title,
                //                 task_description: task_description,
                //                 task_team: task_team,
                //                 task_added_by: task_added_by,
                //                 task_status: task_status
                //             },
                //             success: function(data) {
                //                 $("#addTaskBtn").removeAttr("disabled");
                //                 $('#addTasksModal').modal('hide');
                //                 $('#addTasksModal').on('hidden.bs.modal', function() {
                //                     location.reload();
                //                 });
                //             }
                //         });
                //     } else {
                //         alert('Please fill all the field !');
                //     }
                // });

                //checklist task
                $(".styled-checkbox").change(function() {
                    var $this = $(this);
                    let taskStatus = 4;
                    let checkParent = $this.parent();
                    let checkSibling = checkParent.next();
                    let title = checkSibling.find('.task-title');
                    if ($this.is(":checked")) {
                        let taskId = $this.attr("id");
                        $.ajax({
                            url: './server/updateTask.php',
                            type: 'POST',
                            data: {
                                taskId: taskId,
                                taskStatus: taskStatus
                            },
                            success: function(data) {
                                title.addClass('strike');
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            }
                        });
                    } else {
                        alert($this.attr("id") + " is unchecked");
                    }
                });
            });
        </script>
    </body>

    </html>
<?php
}
?>