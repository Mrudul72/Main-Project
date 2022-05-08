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
            <?php include("./layouts/sidebar.php");
            ?>
            <!--sidebar end-->

            <!--header starts-->
            <?php include("./layouts/header.php");
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
                            echo "<div class='projects' id = 'createTeam' data-toggle='modal'></div>";
                        }
                    } else {
                        //not manager
                        $query = "SELECT * FROM tbl_teams WHERE team_id = '" .$_SESSION['currentUserTeamId']. "'";
                        $result = mysqli_query($connect, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $teamID = $row['team_id'];
                                $teamName = $row['team_title'];
                                echo "<a href='./teamMemberDetails.php?id=$teamID' class='projects pro' id='$teamID'>$teamName</a>";
                            }
                        } else {
                            echo '
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">You are not added in a team yet!</h4>
                                <p>Please contact your manager for any queries.</p>
                                <hr>
                                <p class="mb-0">For any technical assistance contact system administrator.</p>
                            </div>
                            ';
                        }
                    }


                    ?>

                </div>
                <!-- add team Modal starts-->
                <div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="createTeamForm" class="modal-form-container" method="post">
                                <input type="hidden" name="member-count" value="1" id="member-count">
                                <!-- <input type="hidden" name="invite-count" value="1" id="invite-count"> -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTeamModalLabel">Create team</h5>
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
                                        <label for="team-name">Team name</label>
                                        <input type="text" name="team-name" id="team-name" class="form-control" placeholder="Team name" required autocomplete="off" />
                                    </div>
                                    <div id="team-member-select" class="form-group">
                                        <label for="team-member">Team members</label>
                                        <div id="duplicater1" class="input-group mb-3">
                                            <select class="custom-select" name="team-member" id="team-member1" aria-label="Example select with button addon">
                                                <option disabled selected>Select members</option>
                                                <?php
                                                $sql = "SELECT * FROM tbl_user WHERE team_id = 0 AND type_id != 2 AND type_id != 1";
                                                $result = mysqli_query($connect, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $member_id = $row['user_id'];
                                                    $memberName = $row['username'];
                                                    echo '<option value="' . $member_id . '">' . $memberName . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="input-group-append">
                                                <button id="addBtn1" class="btn btn-outline-secondary modal-btn" type="button">Add
                                                    More</button>
                                            </div>
                                            <div class="input-group-append">
                                                <button style="display:none;" id="delBtn1" class="btn btn-outline-secondary modal-btn" type="button">Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="invite-email">Invite new member</label>
                                        <div id="duplicater2" class="input-group mb-3">
                                            <input class="form-control" type="text" name="invite-member" placeholder="Email id" id="invite-member1">
                                            <div class="input-group-append">
                                                <button id="addBtn2" class="btn btn-outline-secondary modal-btn" type="button">Add
                                                    More</button>
                                            </div>
                                            <div class="input-group-append">
                                                <button style="display:none;" id="delBtn2" class="btn btn-outline-secondary modal-btn" type="button">Delete
                                                </button>
                                            </div>
                                        </div>
                                        <small class="statMsg"></small>
                                    </div> -->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary modal-btn" data-dismiss="modal">Close</button>
                                    <button id="createTeamBtn" type="submit" class="btn btn-primary modal-btn-submit">Create</button>
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

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>
        <script src="./js/search.js"></script>
        <script src="./js/app.js"></script>

        <script>
            //add new team
            $(document).ready(function() {
                $('#createTeam').click(function() {
                    $('#addTeamModal').modal('show');
                });
                $('#createTeamBtn').click(function() {
                    let teamName = $('#team-name').val();
                    let teamMember = $('#team-member').val();
                    let inviteMember = $('#invite-member').val();
                    let teamMemberArr = [];
                    let teamMemberCount = document.querySelector("#member-count").value;
                    console.log(teamMemberCount);

                    if (teamMemberCount > 0) {
                        for (let i = 1; i <= teamMemberCount; i++) {
                            teamMemberArr.push($('#team-member' + i).val());
                        }
                    }
                    console.log(teamMemberArr);
                   
                    if(teamName == '' ){
                        alert('Team name is required');
                    }
                    else{
                        $.ajax({
                        url: './server/addTeam.php',
                        type: 'POST',
                        data: {
                            teamName: teamName,
                            teamMemberArr: teamMemberArr,
                            
                        },
                        success: function(response) {
                            if (response == 'success') {
                                $('#addTeamModal').modal('hide');
                                location.reload();
                            } else {
                                alert(response);
                            }
                        }
                    });
                    }
                    

                });


               

            });
        </script>

    </body>

    </html>
<?php
}
?>