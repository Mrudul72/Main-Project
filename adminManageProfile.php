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
            <?php include_once("./layouts/adminSidebar.php"); ?>
            <!--sidebar end-->

            <!--header starts-->
            <?php include_once("./layouts/adminHeader.php"); ?>
            <!--header ends-->

            <!--Dashboard contents-->
            <div class="dashboard-contents">

                <div class="row">
                    <!--col 2 start-->
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <div class="files-card">
                                <h1 class="content-heading">Edit Profile</h1>
                                <!-- Alert msg -->
                                <?php
                                if (isset($_SESSION['profileUpdateMsg']) && isset($_SESSION['profileUpdateMsgHeading'])) {
                                    echo '
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="success" >
                                                <h4>' . $_SESSION['profileUpdateMsgHeading'] . '</h4>
                                                <div id="message">' . $_SESSION['profileUpdateMsg'] . '</div>
                                                <button id="alertClose" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        ';
                                    unset($_SESSION['profileUpdateMsg']);
                                    unset($_SESSION['profileUpdateMsgHeading']);
                                }


                                ?>
                                <form id="editProfileForm" class="modal-form-container" action="./server/adminUpdateProfile.php" method="post" enctype="multipart/form-data">
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
                            <img src="./assets/uploads/' . $proPic . '" alt="">
                            <input type="file" name="uploadPic" id="uploadPic" style="display:none;"/>
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
                        
                                   
       
                      </div>

                      <div class="col-4 ml-auto">
                      <div class="form-group">
                        <label for="changePass">Change password</label>
                        <button id="changePass" name="changePass" value="" type="button" class="secondary-modal-btn">Change</button>
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
                        <form id="changePassForm" class="modal-form-container" method="post" action="./server/adminChangePassword.php">
                            <input type="hidden" name="assign-count" value="1" id="assign-count">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changePassModalLabel">Change Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

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
                                <button id="changePassBtn" name="changePassBtn" type="submit" class="btn btn-primary modal-btn-submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--change password Modal ends-->

            
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="./js/app.js"></script>
        <script>
            $(document).ready(function() {
                $('#deleteProject').on('click', function() {

                    $('#confirmationModal').modal('show');

                });
                //delete team ends

                $('#changePass').click(function() {
                    $('#changePassModal').modal('show');

                });
            });
        </script>
    </body>

    </html>
<?php
}
?>