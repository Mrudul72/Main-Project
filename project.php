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
            <div class="project-container">
                <?php
//select all items from tbl_project
$query = "SELECT * FROM tbl_project";
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($result))
{
	$proId=$row['project_id'];
    $proName=$row['project_name'];

                echo"<a href='./tasks.php' class='projects'>$proName</a>";
            }
            ?>
                <div class='projects' data-toggle='modal' data-target='#addProjectModal'></div>

            </div>
            <!-- Modal starts-->
            <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="modal-form-container" method="post" action="">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addProjectModalLabel">Create project</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="pro-name">Project name</label>
                                    <input type="text" name="pro-name" id="pro-name" class="form-control"
                                        placeholder="Project name" required autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label for="pro-description" class="col-form-label">Project description:</label>
                                    <textarea id="pro-description" name="pro-description"
                                        placeholder="A breif description about project" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="pro-due-date">Start date</label>
                                    <input type="date" name="pro-start-date" id="pro-start-date" class="form-control"
                                        placeholder="Project name" required autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label for="pro-end-date">End date</label>
                                    <input type="date" name="pro-end-date" id="pro-end-date" class="form-control"
                                        placeholder="Project name" required autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label for="pro-priority">Project priority</label>
                                    <select class="custom-select" name="pro-priority" id="pro-priority"
                                            aria-label="Example select with button addon">
                                            <option disabled selected>Choose priority</option>
                                            <option value="1">Top level</option>
                                            <option value="2">Medium level</option>
                                            <option value="3">Low level</option>
                                        </select>
                                </div>
                                <div id="team-select" class="form-group">
                                    <label for="pro-due-date">Assign teams</label>
                                    <div id="duplicater" class="input-group mb-3">
                                        <select class="custom-select" name="pro-team" id="pro-team"
                                            aria-label="Example select with button addon">
                                            <option disabled selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button id="addBtn" class="btn btn-outline-secondary modal-btn"
                                                type="button">Add
                                                More</button>
                                        </div>
                                        <div class="input-group-append">
                                            <button style="display:none;" id="delBtn"
                                                class="btn btn-outline-secondary modal-btn" type="button">Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modal-btn"
                                    data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary modal-btn-submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal starts-->
        </div>
    </div>

    <script src="./js/app.js"></script>
    <script>
    //duplicate div
    
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>