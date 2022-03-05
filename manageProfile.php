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
                    <!--col 2 start-->
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <div class="files-card">
                                <h1 class="content-heading">Edit Profile</h1>
                                <form id="editProfileForm" class="modal-form-container" action="./server/updateProfile.php" method="post" enctype="multipart/form-data">
                                    <?php
                                    // echo "<script>alert('$taskId');</script>";
                                    $sql = "SELECT * FROM tbl_user WHERE user_id = '$_SESSION[userId]'";
                                    $result = mysqli_query($connect, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $name = $row['username'];
                                    $email = $row['email'];
                                    $mobile = $row['mob'];
                                    $teamId = $row['team_id'];
                                    $typeId = $row['type_id'];
                                    $proPic = $row['profile_pic'];
                                    $sql2 = "SELECT * FROM tbl_user_role WHERE role_id = '$typeId'";
                                    $result2 = mysqli_query($connect, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $roleName = $row2['role_name'];
                                    

                                    echo '
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-8">
                      <div class="form-group">
                        <div class="pro-pic">
                            <img src="./assets/uploads/'.$proPic.'" alt="">
                            <input type="file" name="uploadPic" id="uploadPic" />
                            <label class="pro-pic-btn" for="uploadPic">Change</label>
                        </div>    
                      </div>
                        <div class="form-group">
                          <label for="uname">Name</label>
                          <input type="text" name="uname" id="uname" value="' . $name . '" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" id="email" value="' . $email . '" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label for="mobile">Mobile</label>
                          <input type="text" name="mobile" id="mobile" value="' . $mobile . '" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label for="role">Role</label>
                          <input type="text" disabled name="role" id="role" value="' . $roleName  . '" class="form-control" autocomplete="off">
                        </div>
                        ';
                        if($teamId != 0){
                            $sql3 = "SELECT * FROM tbl_teams WHERE team_id = '$teamId'";
                        $result3 = mysqli_query($connect, $sql3);
                        $row3 = mysqli_fetch_assoc($result3);
                        $teamName = $row3['team_title'];
                        echo '
                        <div class="form-group">
                          <label for="team">Team</label>
                          <input type="text" name="team" id="team" value="' . $teamName . '" class="form-control" autocomplete="off">
                        </div>
                        ';
                        }
                        else{
                            $sql3 = "SELECT * FROM tbl_teams WHERE manager_id = '$_SESSION[userId]'";
                        $result3 = mysqli_query($connect, $sql3);
                        echo '<div class="form-group">
                        <label for="team">Team</label>
                        <div>
                        ';
                        
                        while($row3 = mysqli_fetch_assoc($result3)){
                            $teamName = $row3['team_title'];
                            $team_id = $row3['team_id'];
                            echo '
                            <span class="team-pill">' . $teamName . '</span>
                            ';
                        }
                        echo '
                        </div>
                        </div>
                        ';
                        }
                        echo '
       
                      </div>

                      <div class="col-4 ml-auto">
                      <div class="form-group">
                        <label for="changePass">Change password</label>
                        <button id="changePass" name="changePass" value="" type="button" class="secondary-modal-btn">Change</button>
                      </div>
                      
                        <div class="form-group">
                          <label for="task-actions">Actions</label>
                          <button id="deleteProject" name="deleteProject" value="' . $tId . '" type="button" class="secondary-modal-btn">Delete</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  ';
                                    ?>
                                    <div class="m-2">
                                        <button name="updateProfileBtn" type="submit" class="btn btn-primary saveBtn">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--col 2 end-->
                </div>
            </div>

            <!--change password Modal starts-->
            <div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="changePassModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="addTeamForm" class="modal-form-container" method="post">
                            <input type="hidden" name="assign-count" value="1" id="assign-count">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changePassModalLabel">Change Password</h5>
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
                                    <label for="oldPass">Old Password</label>
                                    <input type="password" name="oldPass" id="oldPass" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="newPass">New Password</label>
                                    <input type="password" name="newPass" id="newPass" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="confirmPass">Confirm Password</label>
                                    <input type="password" name="confirmPass" id="confirmPass" class="form-control" autocomplete="off">
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
            <!--change password Modal ends-->

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


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="./js/app.js"></script>
        <script>
            $(document).ready(function() {
                $('#deleteProject').on('click', function() {
                    var pro_id = $('#deleteProject').val();
                    // alert(task_id);
                    $('#confirmationModal').modal('show');

                    var task_status = 0;
                    $("#deleteProBtn").on('click', function() {
                        $.ajax({
                            url: "./server/deleteProject.php",
                            method: "POST",
                            data: {
                                pro_id: pro_id,
                            },
                            success: function(data) {
                                window.location.href = "./project.php";
                            }
                        });
                    });

                });
                //delete team ends

                $('#changePass').click(function() {
                    $('#changePassModal').modal('show');
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

           
        </script>
    </body>

    </html>
<?php
}
?>