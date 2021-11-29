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
                                        <h1 class="content-heading">Backlog Tasks</h1>
                                        <button data-toggle='modal' data-target='#addTasksModal' class="add-task-btn">Add Task +</button>
                                    </div>
                                    <?php
                                    $sql = "SELECT * FROM tbl_tasks WHERE task_status=1 ";
                                    $result = mysqli_query($connect, $sql);
                                    $i = 0;
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $i++;
                                            $task_id = $row['task_id'];
                                            // echo "<script>alert('$task_id');</script>";
                                            $task_title = $row['task_title'];
                                            $task_description = $row['task_description'];
                                            $task_team = $row['task_team'];
                                            $task_added_by = $row['task_added_by'];
                                            $task_status = $row['task_status'];
                                            $sql2 = "SELECT * FROM tbl_teams WHERE team_id = $task_team";
                                            $result2 = mysqli_query($connect, $sql2);
                                            $val = mysqli_fetch_assoc($result2);
                                            $team_name = $val['team_title'];
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


        <!-- add task Modal starts-->
        <div class="modal fade" id="addTasksModal" tabindex="-1" aria-labelledby="addTasksModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="addTaskForm" class="modal-form-container" method="post">
                        <input type="hidden" name="assign-count" value="0" id="assign-count">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addtaskjectModalLabel">Add Tasks</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="task-title">Task title</label>
                                <input type="text" name="task-title" id="task-title" class="form-control" placeholder="task title" required autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="task-description" class="col-form-label">Task description:</label>
                                <textarea id="task-description" name="task-description" placeholder="A breif description about task" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="task-team">Assign team</label>
                                <select name="task-team" id="task-team" class="form-control">
                                    <option disabled selected>Select Team</option>
                                    <?php
                                    $sql = "SELECT * FROM tbl_teams";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $team_id = $row['team_id'];
                                        $team_title = $row['team_title'];
                                        echo '<option value="' . $team_id . '">' . $team_title . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary modal-btn" data-dismiss="modal">Close</button>
                            <button id="addTaskBtn" type="submit" class="btn btn-primary modal-btn-submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--add task  Modal ends-->

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

                $('#addTaskBtn').on('click', function() {
                    var task_title = $('#task-title').val();
                    var task_description = $('#task-description').val();
                    var task_team = $('#task-team').val();
                    task_added_by = <?php echo $_SESSION['userId']; ?>;
                    var task_status = 1;

                    if (task_title != '' && task_description != '' && task_team != '') {
                        console.log(task_title);
                        $("#addTaskBtn").attr("disabled", "disabled");
                        $.ajax({
                            url: "./server/addTasks.php",
                            method: "POST",
                            data: {
                                task_title: task_title,
                                task_description: task_description,
                                task_team: task_team,
                                task_added_by: task_added_by,
                                task_status: task_status
                            },
                            success: function(data) {
                                $("#addTaskBtn").removeAttr("disabled");
                                $('#addTasksModal').modal('hide');
                                $('#addTasksModal').on('hidden.bs.modal', function() {
                                    location.reload();
                                });
                            }
                        });
                    } else {
                        alert('Please fill all the field !');
                    }
                });

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