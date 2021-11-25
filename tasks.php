<?php
include('./config/connect.php');
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

<body class="dashboard-body" style="overflow-y: hidden;">
    <div class="dashboard-container" >
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
                            <div class="task-items-container" id="1">
                                <div class="task-container-header">
                                    <h1 class="content-heading">Backlog</h1>
                                    <button data-toggle='modal' data-target='#addTasksModal' class="add-task-item-btn">Add Task +</button>
                                </div>
                                <div id="tasks-placeholder" class="pt-4">
                                <?php
                                    $sql = "SELECT * FROM tbl_tasks WHERE task_status=1 ";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
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
                                    echo '
                                    <div id="'.$task_id.'" class="task-items" draggable="true">
                                        <div class="task-item-details">
                                            <p class="task-item-title">
                                                ' . $task_title . '
                                            </p>
                                            <p class="task-item-sub-title">' . $team_name . '</p>
                                        </div>
                                    </div>
                                    ';
                                    }
                                    ?>
                                    </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="task-items-container" id="2">
                                <div class="task-container-header">
                                    <h1 class="content-heading">Development</h1>
                                    <!-- <button class="add-task-item-btn">Add Task +</button> -->
                                </div>
                                <div class="pt-4">
                                <?php
                                    $sql = "SELECT * FROM tbl_tasks WHERE task_status=2";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    $task_id = $row['task_id'];
                                    $task_title = $row['task_title'];
                                    $task_description = $row['task_description'];
                                    $task_team = $row['task_team'];
                                    $task_added_by = $row['task_added_by'];
                                    $task_status = $row['task_status'];
                                    $sql2 = "SELECT * FROM tbl_teams WHERE team_id = $task_team";
                                    $result2 = mysqli_query($connect, $sql2);
                                    $val = mysqli_fetch_assoc($result2);
                                    $team_name = $val['team_title'];
                                    echo '
                                    <div id="'.$task_id.'" class="task-items" draggable="true">
                                        <div class="task-item-details">
                                            <p class="task-item-title">
                                                ' . $task_title . '
                                            </p>
                                            <p class="task-item-sub-title">' . $team_name . '</p>
                                        </div>
                                    </div>
                                    ';
                                    }
                                    ?>
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
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="task-items-container" id="3">
                                <div class="task-container-header">
                                    <h1 class="content-heading">Testing</h1>
                                    <!-- <button class="add-task-item-btn">Add Task +</button> -->
                                </div>
                                <div class="pt-4">
                                <?php
                                    $sql = "SELECT * FROM tbl_tasks WHERE task_status=3";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    $task_id = $row['task_id'];
                                    $task_title = $row['task_title'];
                                    $task_description = $row['task_description'];
                                    $task_team = $row['task_team'];
                                    $task_added_by = $row['task_added_by'];
                                    $task_status = $row['task_status'];
                                    $sql2 = "SELECT * FROM tbl_teams WHERE team_id = $task_team";
                                    $result2 = mysqli_query($connect, $sql2);
                                    $val = mysqli_fetch_assoc($result2);
                                    $team_name = $val['team_title'];
                                    echo '
                                    <div id="'.$task_id.'" class="task-items" draggable="true">
                                        <div class="task-item-details">
                                            <p class="task-item-title">
                                                ' . $task_title . '
                                            </p>
                                            <p class="task-item-sub-title">' . $team_name . '</p>
                                        </div>
                                    </div>
                                    ';
                                    }
                                    ?>
                                    </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="task-items-container" id="4">
                                <div class="task-container-header">
                                    <h1 class="content-heading">Done</h1>
                                    <!-- <button class="add-task-item-btn">Add Task +</button> -->
                                </div>
                                
                                <div class="pt-4">
                                <?php
                                    $sql = "SELECT * FROM tbl_tasks WHERE task_status=4";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    $task_id = $row['task_id'];
                                    
                                    $task_title = $row['task_title'];
                                    $task_description = $row['task_description'];
                                    $task_team = $row['task_team'];
                                    $task_added_by = $row['task_added_by'];
                                    $task_status = $row['task_status'];
                                    $sql2 = "SELECT * FROM tbl_teams WHERE team_id = $task_team";
                                    $result2 = mysqli_query($connect, $sql2);
                                    $val = mysqli_fetch_assoc($result2);
                                    $team_name = $val['team_title'];
                                    echo '
                                    <div id="'.$task_id.'" class="task-items" draggable="true">
                                        <div class="task-item-details">
                                            <p class="task-item-title">
                                                ' . $task_title . '
                                            </p>
                                            <p class="task-item-sub-title">' . $team_name . '</p>
                                        </div>
                                    </div>
                                    ';
                                    }
                                    ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--col 2 end-->
            </div>
        </div>
    </div>
    <!-- Modal starts-->
    <div class="modal fade" id="addTasksModal" tabindex="-1" aria-labelledby="addTasksModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="createProForm" class="modal-form-container" method="post">
                    <input type="hidden" name="assign-count" value="0" id="assign-count">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProjectModalLabel">Create project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="pro-name">Project name</label>
                            <input type="text" name="pro-name" id="pro-name" class="form-control" placeholder="Project name" required autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label for="pro-description" class="col-form-label">Project description:</label>
                            <textarea id="pro-description" name="pro-description" placeholder="A breif description about project" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pro-start-date">Start date</label>
                            <input type="date" name="pro-start-date" id="pro-start-date" class="form-control" placeholder="Project name" required autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label for="pro-end-date">End date</label>
                            <input type="date" name="pro-end-date" id="pro-end-date" class="form-control" placeholder="Project name" required autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label for="pro-priority">Project priority</label>
                            <select class="custom-select" name="pro-priority" id="pro-priority" aria-label="Example select with button addon">
                                <option disabled selected>Choose priority</option>
                                <option value="1">Top level</option>
                                <option value="2">Medium level</option>
                                <option value="3">Low level</option>
                            </select>
                        </div>
                        <div id="team-select" class="form-group">
                            <label for="pro-teams">Assign teams</label>
                            <div id="duplicater" class="input-group mb-3">
                                <select class="custom-select" name="pro-team" id="pro-team1" aria-label="Example select with button addon">
                                    <option disabled selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <div class="input-group-append">
                                    <button id="addBtn" class="btn btn-outline-secondary modal-btn" type="button">Add
                                        More</button>
                                </div>
                                <div class="input-group-append">
                                    <button style="display:none;" id="delBtn" class="btn btn-outline-secondary modal-btn" type="button">Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary modal-btn" data-dismiss="modal">Close</button>
                        <button id="createProBtn" type="button" class="btn btn-primary modal-btn-submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal starts-->


    <script src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="./js/app.js"></script>

    <script>
        //add new project
        $(document).ready(function() {
            //load tasks
        

        //add new task

            $('#createProBtn').on('click', function() {
                var proName = $('#pro-name').val();
                var proDescription = $('#pro-description').val();
                var proStartDate = $('#pro-start-date').val();
                var proEndDate = $('#pro-end-date').val();
                var proPriority = $('#pro-priority').val();
                var proTeam = $('#pro-team').val();
                var proTeamCount = $('#assign-count').val();
                var proTeamArray = [];
                for (var i = 1; i <= proTeamCount; i++) {
                    proTeamArray.push($('#pro-team' + i).val());
                }
                if (proName != '' && proDescription != '' && proStartDate != '' && proEndDate != '' &&
                    proPriority != '' && proTeam != '') {
                    $("#createProBtn").attr("disabled", "disabled");
                    $.ajax({
                        url: './server/createProject.php',
                        type: 'POST',
                        data: {
                            proName: proName,
                            proDescription: proDescription,
                            proStartDate: proStartDate,
                            proEndDate: proEndDate,
                            proPriority: proPriority,
                            // proTeam: proTeam,
                            // proTeamArray: proTeamArray,
                            proStatus: 1
                        },
                        success: function(data) {
                            $("#createProBtn").removeAttr("disabled");
                            $('#createProForm').find('input:text').val('');
                            $('#success').show();
                            $('#message').html('Project created successfully !');
                            $('#addProjectModal').modal('hide');
                        }
                    });
                } else {
                    alert('Please fill all the field !');
                }
            });
        });


        //dragrable
        const todos = document.querySelectorAll(".task-items");
        const all_status = document.querySelectorAll(".task-items-container");
        let draggableTodo = null;

        todos.forEach((todo) => {
            todo.addEventListener("dragstart", dragStart);
            todo.addEventListener("dragend", dragEnd);
        });

        function dragStart() {
            draggableTodo = this;
            setTimeout(() => {
                this.style.display = "none";
            }, 0);
            // console.log("dragStart");
        }

        function dragEnd() {
            draggableTodo = null;
            setTimeout(() => {
                this.style.display = "block";
            }, 0);
            // console.log("dragEnd");
        }

        all_status.forEach((status) => {
            status.addEventListener("dragover", dragOver);
            status.addEventListener("dragenter", dragEnter);
            status.addEventListener("dragleave", dragLeave);
            status.addEventListener("drop", dragDrop);
        });

        function dragOver(e) {
            e.preventDefault();
            //   console.log("dragOver");
        }

        function dragEnter() {
            this.style.border = "1px dashed #ccc";
            // console.log("dragEnter");
        }

        function dragLeave() {
            this.style.border = "none";
            // console.log("dragLeave");
        }

        function dragDrop() {
            this.style.border = "none";
            
            this.appendChild(draggableTodo);
            console.log("dropped");
            //update task
            let taskId = draggableTodo.id;
            let taskStatus = this.id;
            console.log(taskStatus)
            $.ajax({
                url: './server/updateTask.php',
                type: 'POST',
                data: {
                    taskId: taskId,
                    taskStatus: taskStatus
                },
                success: function(data) {
                    console.log(data);
                }
            });

            
        }
    </script>
</body>

</html>