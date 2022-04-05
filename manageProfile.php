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
            <?php include("./layouts/sidebar.php"); ?>
            <!--sidebar end-->

            <!--header starts-->
            <?php include("./layouts/header.php"); ?>
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
                                                    <img src="./assets/uploads/' . $proPic . '" alt="">
                                                    <input type="file" name="uploadPic" id="uploadPic" style="display:none;" accept="image/*"/>
                                                    <label class="pro-pic-btn" for="uploadPic">Change</label>
                                                </div>    
                                            </div>
                                                <div class="form-group">
                                                <label for="uname">Name</label>
                                                <input type="text" name="uname" id="uname" value="' . $name . '" class="form-control" autocomplete="off">
                                                <small id="errMsgUname" class="errMsg"></small>
                                                </div>
                                                <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" value="' . $email . '" class="form-control" autocomplete="off">
                                                <small id="errMsgEmail" class="errMsg"></small>
                                                </div>
                                                <div class="form-group">
                                                <label for="mobile">Mobile</label>
                                                <input type="text" name="mobile" id="mob" value="' . $mobile . '" class="form-control" autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">
                                                <small id="errMsgMob" class="errMsg"></small>
                                                </div>
                                                <div class="form-group">
                                                <label for="role">Role</label>
                                                <input type="text" disabled name="role" id="role" value="' . $roleName  . '" class="form-control" autocomplete="off">
                                                </div>
                                                ';
                                    if ($teamId != 0) {
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
                                    } else {
                                        $sql3 = "SELECT * FROM tbl_teams WHERE manager_id = '$_SESSION[userId]'";
                                        $result3 = mysqli_query($connect, $sql3);
                                        echo '<div class="form-group">
                                            <label for="team">Team</label>
                                            <div>
                                            ';

                                        while ($row3 = mysqli_fetch_assoc($result3)) {
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
                                                <button id="deleteProject" name="deleteProject" type="button" class="secondary-modal-btn">Delete</button>
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
                        <form id="changePassForm" class="modal-form-container" method="post" action="./server/changePassword.php">
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
                                    <small id="errMsgPassword" class="errMsg"></small>
                                </div>
                                <div class="form-group">
                                    <label for="confirmPass">Confirm Password</label>
                                    <input type="password" name="confirmPass" id="confirmPass" class="form-control" autocomplete="off">
                                    <small id="errMsgCpassword" class="errMsg"></small>
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

            <!--Confirmation Modal start-->

            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Disable Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to disable your account?
                        </div>
                        <form action="./server/disableUserAccount.php" method="POST">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" <?php $uid = $_SESSION['userId'];
                                                        echo 'value="' . $uid . '"'; ?> id="disableBtn" name="disableBtn" class="btn btn-danger">Disable</button>
                            </div>
                        </form>
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

                    $('#confirmationModal').modal('show');

                });
                //delete team ends

                $('#changePass').click(function() {
                    $('#changePassModal').modal('show');

                });
            });


            //validation for edit profile
            const errMsgEmail = document.querySelector("#errMsgEmail");
            const errMsgUname = document.querySelector("#errMsgUname");
            const errMsgMob = document.querySelector("#errMsgMob");
            const errMsgPassword = document.querySelector("#errMsgPassword");
            const errMsgCpassword = document.querySelector("#errMsgCpassword");

            const txtEmail = document.querySelector("#email");
            const username = document.querySelector('#uname');
            const mobile = document.querySelector('#mob');
            const editProfileForm = document.querySelector('#editProfileForm');
            const changePassForm = document.querySelector('#changePassForm');
            const txtPassword = document.querySelector("#newPass");
            const txtConfirmPassword = document.querySelector("#confirmPass");




            txtEmail.addEventListener("blur", () => {
                let email = txtEmail.value;
                if (txtEmail.value.length < 1) {
                    errMsgEmail.classList.add("showMsg");
                    errMsgEmail.innerHTML = "Email is required";
                } else if (!emailValidate(email)) {
                    errMsgEmail.classList.add("showMsg");
                    errMsgEmail.innerHTML = "Email is not valid";
                } else if (whiteSpaceValidate(email)) {
                    errMsgEmail.classList.add("showMsg");
                    errMsgEmail.innerHTML = "Email is required";
                } else {
                    errMsgEmail.classList.remove("showMsg");
                }
            });

            username.addEventListener("blur", () => {
                if (username.value.length < 1) {
                    errMsgUname.classList.add("showMsg");
                    errMsgUname.innerHTML = "Username is required";
                } else if (whiteSpaceValidate(username.value)) {
                    errMsgUname.classList.add("showMsg");
                    errMsgUname.innerHTML = "Username is required";
                } else {
                    errMsgUname.classList.remove("showMsg");
                }
            });

            mobile.addEventListener("blur", () => {
                if (mobile.value.length < 1) {
                    errMsgMob.classList.add("showMsg");
                    errMsgMob.innerHTML = "Mobile Number is required";
                } else if (!mobileValidate(mobile.value)) {
                    errMsgMob.classList.add("showMsg");
                    errMsgMob.innerHTML = "Mobile Number is not valid";
                } else {
                    errMsgMob.classList.remove("showMsg");
                }
            });

            txtPassword.addEventListener("blur", () => {
                if (txtPassword.value.length < 1) {
                    errMsgPassword.classList.add("showMsg");
                    errMsgPassword.innerHTML = "Password is required";
                } else if (!passwordValidate(txtPassword.value)) {
                    errMsgPassword.classList.add("showMsg");
                    errMsgPassword.innerHTML = "Password is not valid";
                } else {
                    errMsgPassword.classList.remove("showMsg");
                }
            });

            txtConfirmPassword.addEventListener("blur", () => {
                if (txtConfirmPassword.value.length < 1) {
                    errMsgCpassword.classList.add("showMsg");
                    errMsgCpassword.innerHTML = "Confirm Password is required";
                } else if (txtConfirmPassword.value !== txtPassword.value) {
                    errMsgCpassword.classList.add("showMsg");
                    errMsgCpassword.innerHTML = "Password does not match";
                } else {
                    errMsgCpassword.classList.remove("showMsg");
                }
            });


            const passwordValidate = (password) => {
                let regex =
                    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                return regex.test(password);
            };

            const emailValidate = (email) => {
                const re = /^([a-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,6})$/;
                return re.test(email);
            };

            const whiteSpaceValidate = (str) => {
                return str.trim() === "";
            };

            const mobileValidate = (mobile) => {
                const re = /^[6-9]\d{9}$/;
                return re.test(mobile);
            };

            editProfileForm.addEventListener("submit", (e) => {
                if (
                    errMsgEmail.classList.contains("showMsg") ||
                    errMsgUname.classList.contains("showMsg") ||
                    errMsgMob.classList.contains("showMsg")
                ) {
                    e.preventDefault();
                }
            });
            changePassForm.addEventListener("submit", (e) => {
                if (
                    errMsgPassword.classList.contains("showMsg") ||
                    errMsgCpassword.classList.contains("showMsg")
                ) {
                    e.preventDefault();
                }
            });
        </script>


    </body>

    </html>
<?php
}
?>