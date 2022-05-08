<?php
include('./config/connect.php');
session_start();
if (isset($_SESSION["pmsSession"]) != session_id()) {
    header("Location: ./index.php");
    die();
} else {
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
                    <!--tab start-->
                    <!-- <div class="tab">
                        <a href="./tasks.php" id="tab1" class="tablinks <?= ($activePage == 'tasks') ? 'active-tab' : ''; ?>">Tasks</a>
                        <div class="divider <?= ($activePage == 'files') || ($activePage == 'tasks') ? 'active-divider' : ''; ?>"></div>
                        <a href="./files.php" id="tab2" class="tablinks <?= ($activePage == 'files') ? 'active-tab' : ''; ?>">Files</a>
                        <div class="divider <?= ($activePage == 'files') || ($activePage == 'activity') ? 'active-divider' : ''; ?> "></div>
                        <a href="./activity.php" id="tab3" class="tablinks <?= ($activePage == 'activity') ? 'active-tab' : ''; ?>">Activity</a>
                        <div class="divider <?= ($activePage == 'manageProject') || ($activePage == 'activity') ? 'active-divider' : ''; ?> "></div>
                        <a href="./manageProject.php" id="tab3" class="tablinks <?= ($activePage == 'manageProject') ? 'active-tab' : ''; ?>">Manage Project</a>
                    </div> -->
                    <?php include("./layouts/tab.php"); ?>
                    
                    <!--tab end-->

                </div>
                <div class="row">
                    <!--col 2 start-->
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <div class="files-card">
                                
                                <form method="post" action="./server/updateProjectDetails.php">
                                    <?php
                                    // echo "<script>alert('$taskId');</script>";
                                    $sql = "SELECT * FROM tbl_project WHERE project_id= $tId";
                                    $result = mysqli_query($connect, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $_SESSION['project_name'] = $row['project_name'];
                                    $project_name = $_SESSION['project_name'];
                                    $project_description = $row['project_description'];
                                    $project_start_date = $row['project_start_date'];
                                    $project_end_date = $row['project_end_date'];
                                    $project_status = ($row['project_status']==1) ? 'Active' : 'Inactive';
                                    if($row['project_priority'] == 1){
                                        $project_priority = "Top Level";
                                    }else if($row['project_priority'] == 2){
                                        $project_priority = "Medium Level";
                                    }else if($row['project_priority'] == 3){
                                        $project_priority = "Low Level";
                                    }

                                    //select manager_id from tbl_team_allocation where project_id = $tId
                                    $sql2 = "SELECT project_manager FROM tbl_team_allocation WHERE project_id = $tId";
                                    $result2 = mysqli_query($connect, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $manager_id = $row2['project_manager'];
                                    //select manager_name from tbl_user where user_id = $manager_id
                                    $sql3 = "SELECT username,email FROM tbl_user WHERE user_id = $manager_id";
                                    $result3 = mysqli_query($connect, $sql3);
                                    $row3 = mysqli_fetch_assoc($result3);
                                    $manager_name = $row3['username'];
                                    $manager_email = $row3['email'];


                                    echo '
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-7">
                      <h1 class="content-heading">Project Details</h1>
                       <div class="row mb-3">
                            <div class="col-4 font-weight-bold">Project title</div>
                            <div class="col-1">:</div>
                            <div class="col">' . $project_name . ' </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 font-weight-bold">Project description</div>
                            <div class="col-1">:</div>
                            <div class="col">' . $project_description . ' </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 font-weight-bold">Project start date</div>
                            <div class="col-1">:</div>
                            <div class="col">' . $project_start_date . ' </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 font-weight-bold">Project end date</div>
                            <div class="col-1">:</div>
                            <div class="col">' . $project_end_date . ' </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 font-weight-bold">Project status</div>
                            <div class="col-1">:</div>
                            <div class="col">' . $project_status . ' </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 font-weight-bold">Project priority</div>
                            <div class="col-1">:</div>
                            <div class="col">' . $project_priority . ' </div>
                        </div>
                      </div>

                      <div class="col-5">
                      <h1 class="content-heading">Team Details</h1>
                      <div class="row mb-3">
                            <div class="col-4 font-weight-bold">Project manager</div>
                            <div class="col-1">:</div>
                            <div class="col">' . $manager_name . ' </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 font-weight-bold">Project manager email</div>
                            <div class="col-1">:</div>
                            <div class="col">' . $manager_email . ' </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 font-weight-bold">Teams</div>
                            <div class="col-1">:</div>
                            <div class="col">';
                            //select team_id from tbl_team_allocation where project_id = $tId
                            $sql4 = "SELECT team_id FROM tbl_team_allocation WHERE project_id = $tId";
                            $result4 = mysqli_query($connect, $sql4);
                            while($row4 = mysqli_fetch_assoc($result4)){
                                $team_id = $row4['team_id'];
                                //select team_name from tbl_team where team_id = $team_id
                                $sql5 = "SELECT team_title FROM tbl_teams WHERE team_id = $team_id";
                                $result5 = mysqli_query($connect, $sql5);
                                $row5 = mysqli_fetch_assoc($result5);
                                $team_name = $row5['team_title'];
                                echo $team_name . '<br>';
                            }echo'
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  ';
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--col 2 end-->
                </div>
            </div>

            <!-- Modal starts-->
            <div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="addTeamForm" class="modal-form-container" method="post">
                            <input type="hidden" name="assign-count" value="1" id="assign-count">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTeamModalLabel">Add teams</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success" style="display:none;">
                                    <div id="message"></div>
                                    <button id="alertClose" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>


                                <div id="team-select" class="form-group">
                                    <label for="pro-teams">Assign teams</label>
                                    <div id="duplicater" class="input-group mb-3">
                                        <select class="custom-select" name="pro-team" id="pro-team1" aria-label="Example select with button addon">
                                            <option disabled selected>Select teams</option>
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
                                        <div class="input-group-append">
                                            <button id="addBtnNew" class="btn btn-outline-secondary modal-btn" type="button">Add
                                                More</button>
                                        </div>
                                        <div class="input-group-append">
                                            <button style="display:none;" id="delBtnNew" class="btn btn-outline-secondary modal-btn" type="button">Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modal-btn" data-dismiss="modal">Close</button>
                                <button id="addTeamBtn" type="button" class="btn btn-primary modal-btn-submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal ends-->

            <!--Confirmation Modal start-->

            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this project?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="deleteProBtn" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Confirmation Modal ends-->
        </div>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="./js/search.js"></script>
        <script src="./js/app.js"></script>
        <script>
            $(document).ready(function() {
                $('#deleteProject').on('click', function() {
                    var pro_id = $('#deleteProject').val();
                    // alert(task_id);

                    var task_status = 0;
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Press confirm to delete the project",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Confirm'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            $.ajax({
                            url: "./server/deleteProject.php",
                            method: "POST",
                            data: {
                                pro_id: pro_id,
                            },
                            success: function(data) {
                                Swal.fire(
                                        'Project Deleted!',
                                        'The project has been deleted.',
                                        'success'
                                    )
                                    window.setTimeout(function(){window.location.href = "./project.php";}, 2000);
                            }
                        });

                        }
                    })
                });
                //delete project ends 


                //close project
                $('#closeProject').on('click', function() {
                    var pro_id = $('#closeProject').val();
                    //alert(pro_id);
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Press confirm to close the project",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Confirm'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            $.ajax({
                                url: "./server/closeProject.php",
                                method: "POST",
                                data: {
                                    pro_id: pro_id,
                                },
                                success: function(data) {
                                    //alert(data);
                                    Swal.fire(
                                        'Project Closed!',
                                        'Your project has been closed.',
                                        'success'
                                    )
                                    window.location.href = "./project.php";
                                }
                            });


                        }
                    })
                });

                $('#addTeam').click(function() {
                    $('#addTeamModal').modal('show');
                    var pro_id = $('#addTeam').val();

                    //add new team
                    $('#addTeamMemberBtn').click(function() {
                        var proTeam = $('#pro-team').val();
                        var proTeamCount = $('#assign-count').val();
                        var proTeamArray = [];


                        if (proTeamCount > 0) {
                            for (var i = 1; i <= proTeamCount; i++) {
                                proTeamArray.push($('#pro-team' + i).val());
                            }
                        }
                        console.log(proTeamArray);
                        if (proTeamArray[0] == null) {
                            alert('Please fill all the fields');
                        } else {
                            $.ajax({
                                url: './server/assignTeam.php',
                                type: 'POST',
                                data: {
                                    pro_id: pro_id,
                                    proTeamArray: proTeamArray,
                                },
                                success: function(response) {
                                    if (response == 'success') {
                                        $('#addTeamMemberModal').modal('hide');
                                        location.reload();
                                    } else {
                                        alert(response);
                                    }
                                }
                            });
                        }

                    });

                });
            });

            //duplicate div in modal box

            const addTeamBtn = document.getElementById("addBtnNew");
            let a = 1;
            let b = 1;
            let originalEle = document.getElementById("duplicater");
            addTeamBtn.addEventListener("click", function() {
                let newClone = originalEle.cloneNode(true); // "deep" clone
                newClone.id = "duplicater" + ++a;
                newClone.querySelector("#pro-team1").id = "pro-team" + ++b;
                // or clone.id = ""; if the divs don't need an ID
                originalEle.parentNode.appendChild(newClone);
                newClone.querySelector("#addBtnNew").style.display = "none";
                newClone.querySelector("#delBtnNew").style.display = "block";
                newClone.querySelector("#delBtnNew").addEventListener("click", function() {
                    a--;
                    b--;
                    originalEle.parentNode.removeChild(newClone);
                });
                document.querySelector("#assign-count").value = b;
            });
        </script>
    </body>

    </html>
<?php
}
?>