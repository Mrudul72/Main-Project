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
        <title>Teams</title>
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
            <?php include_once("./layouts/sidebar.php");
            ?>
            <!--sidebar end-->

            <!--header starts-->
            <?php include_once("./layouts/header.php");
            ?>
            <!--header ends-->

            <!--Dashboard contents-->
            <div class="dashboard-contents">


                <div class="project-container">
                    <?php
                    //select items from tbl_project if type_id is Manager in tbl_user
                    if ($_SESSION['currentUserTypeId'] == '2') {
                        $query = "SELECT * FROM tbl_teams WHERE manager_id  = '" . $_SESSION['userId'] . "'";
                        $result = mysqli_query($connect, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $teamID = $row['team_id'];
                                $teamName = $row['team_title'];
                                echo "<a href='./manageteam.php?id=$teamID' class='projects pro' id='$teamID'>$teamName</a>";
                            }
                            echo "<div class='projects' id = 'createTeam' data-toggle='modal'></div>";
                        } else {
                            echo "<h3>No Teams created</h3>";
                        }
                    } else {
                        //not manager
                        $query = "SELECT * FROM tbl_project WHERE project_id IN (SELECT distinct project_id FROM tbl_team_allocation aloc JOIN tbl_user u ON aloc.team_id = u.team_id WHERE u.team_id = '" . $_SESSION['currentUserTeamId'] . "')";
                        $result = mysqli_query($connect, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $proId = $row['project_id'];
                                $proName = $row['project_name'];

                                echo "<a href='./tasks.php?id=$proId' class='projects pro' id='$proId'>$proName</a>";
                            }
                        } else {
                            echo '
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">You are not added in a team!</h4>
                                <p>Please contact your manager for any queries.</p>
                                <hr>
                                <p class="mb-0">For any technical assistance contact system administrator.</p>
                            </div>
                            ';
                        }
                    }


                    ?>

                </div>
                <!-- Modal starts-->
                <div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="createTeamForm" class="modal-form-container" method="post">
                                <input type="hidden" name="assign-count" value="0" id="assign-count">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTeamModalLabel">Create a new team</h5>
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

                                    <div class="form-group">
                                        <label for="pro-name">Team name</label>
                                        <input type="text" name="pro-name" id="pro-name" class="form-control" placeholder="Team name" required autocomplete="off" />
                                    </div>
                                    <div id="team-select" class="form-group">
                                        <label for="pro-teams">Team Members</label>
                                        <div id="duplicater" class="input-group mb-3">
                                            <select class="custom-select" name="pro-team" id="pro-team1" aria-label="Example select with button addon">
                                                <option disabled selected>Select team members</option>
                                                <?php
                                                $sql = "SELECT * FROM tbl_users WHERE user_id = 0";
                                                $result = mysqli_query($connect, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $member_id = $row['user_id'];
                                                    $memberName = $row['username'];
                                                    echo '<option value="' . $member_id . '">' . $memberName . '</option>';
                                                }
                                                ?>
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
                                <button type="button" id="projectDeleteBtn" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Confirmation Modal ends-->
            </div>
        </div>

        <script src="./js/app.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>

        <script>
            //add new project
            // $(document).ready(function() {
            //     $('#createTeam').click(function() {
            //         alert("hello");
            //         $('#addTeamModal').modal('show');
            //     });
                // $('#createTeamBtn').on('click', function() {
                //     var proName = $('#team-name').val();
                //     var teamDescription = $('#team-description').val();
                //     var teamStartDate = $('#team-start-date').val();
                //     var teamEndDate = $('#team-end-date').val();
                //     var teamPriority = $('#team-priority').val();
                //     var teamTeam = $('#team-team').val();
                //     var teamMemberCount = $('#assign-count').val();
                //     var teamMemberArray = [];
                //     for (var i = 1; i <= teamTeamCount; i++) {
                //         teamTeamArray.push($('#team-team' + i).val());
                //     }
                //     if (teamName != '' && teamDescription != '' && teamStartDate != '' && teamEndDate != '' &&
                //         teamPriority != '' && teamTeam != '') {
                //         $("#createteamBtn").attr("disabled", "disabled");
                //         $.ajax({
                //             url: './server/createteamject.php',
                //             type: 'POST',
                //             data: {
                //                 teamName: teamName,
                //                 teamDescription: teamDescription,
                //                 teamStartDate: teamStartDate,
                //                 teamEndDate: teamEndDate,
                //                 teamPriority: teamPriority,
                //                 // teamTeam: teamTeam,
                //                 teamTeamArray: teamTeamArray,
                //                 teamStatus: 1
                //             },
                //             success: function(data) {
                //                 $("#createteamBtn").removeAttr("disabled");
                //                 $('#createteamForm').find('input:text').val('');
                //                 $('#success').show();
                //                 $('#message').html('teamject created successfully !');
                //                 $('#addTeamModal').modal('hide');
                //                 setTimeout(function() {
                //                     $('#success').hide();
                //                     window.location.reload();

                //                 }, 3000);

                //             }
                //         });
                //     } else {
                //         alert('Please fill all the field !');
                //     }
                // });


            // });
            const createTeams = document.querySelector('#createTeam');
            createTeams.addEventListener('click', function() {
                $('#addTeamModal').modal('show');
            });
        </script>

    </body>

    </html>
<?php
}
?>