<?php
include('./config/connect.php');
session_start();
if (isset($_SESSION["pmsSessionAdmin"]) != session_id()) {
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
            <?php include("./layouts/adminSidebar.php"); ?>
            <!--sidebar end-->

            <!--header starts-->
            <?php include("./layouts/adminHeader.php"); ?>
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
                                        <h1 class="content-heading">Total Project</h1>
                                        <?php
                                        $userid = $_SESSION['userId'];
                                        //select from tbl_team_allocation table
                                        $sqlQuery = "SELECT count(DISTINCT project_id) AS proCount FROM tbl_team_allocation";
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
                            <div class="completed-task mt-3">
                                <div class="d-flex flex-column">
                                        <h1 class="content-heading">Total Teams</h1>
                                        <?php
                                        $userid = $_SESSION['userId'];
                                        //select from tbl_team table
                                        $sqlQuery3 = "SELECT count(DISTINCT team_id) AS teamCount FROM tbl_teams";
                                        $result3 = mysqli_query($connect, $sqlQuery3);
                                        $count3 = mysqli_num_rows($result3);
                                        if($count3>0){
                                            $row3 = mysqli_fetch_assoc($result3);
                                            $teamCount=$row3['teamCount'];
                                            echo '<h2 class="stats">'.$teamCount.'</h2>';
                                        }
                                        else{
                                            echo '<h2 class="stats">0</h2>';
                                        }
                                        ?>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-6">
                            <div class="completed-task mt-3">
                                <div class="d-flex flex-column">
                                        <h1 class="content-heading">Total users</h1>
                                        <?php
                                        $userid = $_SESSION['userId'];
                                        //select from tbl_user table
                                        $sqlQuery4 = "SELECT count(DISTINCT user_id) AS userCount FROM tbl_user";
                                        $result4 = mysqli_query($connect, $sqlQuery4);
                                        $count4 = mysqli_num_rows($result4);
                                        if($count2>0){
                                            $row4 = mysqli_fetch_assoc($result4);
                                            $userCount=$row4['userCount'];
                                            echo '<h2 class="stats">'.$userCount.'</h2>';
                                        }
                                        else{
                                            echo '<h2 class="stats">0</h2>';
                                        }
                                        ?>
                                        
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