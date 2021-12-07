<?php
include('./config/connect.php');
session_start();
if (isset($_SESSION["pmsSession"]) != session_id()) {
    header("Location: ./index.php");
    die();
} else {
    if(!empty($_GET['id'])){
        $_SESSION['projectID'] = $_GET['id'];
    }
    $tId = $_SESSION['projectID'];

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
                            <div class="task-items-container" id="1">
                                <div class="task-container-header">
                                    <h1 class="content-heading">Backlog</h1>
                                    <button data-toggle='modal' data-target='#addTasksModal' class="add-task-item-btn">Add Task +</button>
                                </div>
                                <div id="tasks-placeholder" class="pt-4">
                                    <?php
                                    $sql = "SELECT * FROM tbl_tasks WHERE task_status=1 AND project_id=$tId";
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
                                    <div id="' . $task_id . '" class="task-items" draggable="true">
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
                                    $sql = "SELECT * FROM tbl_tasks WHERE task_status=2 AND project_id=$tId";
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
                                    <div id="' . $task_id . '" class="task-items" draggable="true">
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
                                    <input type='hidden' value='' id='txt_id'>
                                    <?php
                                    $sql = "SELECT * FROM tbl_tasks WHERE task_status=3 AND project_id=$tId";
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
                                    <div id="' . $task_id . '" class="task-items" draggable="true">
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
                                    $sql = "SELECT * FROM tbl_tasks WHERE task_status=4 AND project_id=$tId";
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
                                    <div id="' . $task_id . '" class="task-items" draggable="true">
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
    <!-- add task Modal starts-->
    <div class="modal fade" id="addTasksModal" tabindex="-1" aria-labelledby="addTasksModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addTaskForm" class="modal-form-container" method="post" action="./server/addTasks.php">
                <input type="hidden" name="getUserID" value='<?php echo $_SESSION['userId'];?>' id="getUserID">
                    <input type="hidden" name="getProID" value="<?php echo $tId?>" id="getProID">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addtaskjectModalLabel">Add Tasks</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="task-title">Task title</label>
                            <textarea name="task-title" id="task-detail-title" class="form-control" placeholder="task title" autocomplete="off"></textarea>
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

    <!-- task details Modal starts-->
    <div class="modal fade" id="taskDetailsModal" tabindex="-1" aria-labelledby="taskDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="taskDetailsForm" class="modal-form-container" action="./server/updateTaskDetails.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="assign-count" value="0" id="assign-count">
                    <div class="modal-header">
                        <h5 class="modal-title" id="taskDetailsModalLabel">Task Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- content display from taskDetails -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary modal-btn" data-dismiss="modal">Close</button>
                        <button id="updateTaskBtn" type="submit" class="btn btn-primary modal-btn-submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--task details  Modal ends-->

    <!--Confirmation Modal start-->

    <div class="modal fade" id="confirmationModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this task?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="taskDeleteBtn" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!--Confirmation Modal ends-->



    <script src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="./js/app.js"></script>


    <script>
        $(document).ready(function() {
            var task_id;

            $('#confirmationModal').modal({
                show: false
            });

            //add new task

            // $('#addTaskBtn').on('click', function() {
            //     var task_title = $('#task-title').val();
            //     var task_description = $('#task-description').val();
            //     var task_team = $('#task-team').val();
            //     var task_added_by = $('#getUserID').val();
            //     var proID = $('#getProID').val();
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
            //                 task_status: task_status,
            //                 proID : proID,
            //                 task_added_by : task_added_by
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


            //task details modal
            $('.task-items').on('click', function() {
                task_id = $(this).attr('id');


                $.ajax({
                    url: "./server/taskDetails.php",
                    method: "POST",
                    data: {
                        task_id: task_id
                    },
                    success: function(data) {
                        $('#taskDetailsModal').modal('show');
                        $('#taskDetailsModal').on('shown.bs.modal', function() {
                            $('#taskDetailsModal .modal-body').html(data);
                        });
                    }
                });
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
<?php
}
?>