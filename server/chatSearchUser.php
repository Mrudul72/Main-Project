<?php
session_start();
include('../config/connect.php');
$searchKey = $_POST['search'];
$user_id = $_SESSION['userId'];
$team_id = $_SESSION['currentUserTeamId'];

//search for username having the search key and not the current user
$sql6 = "SELECT * FROM tbl_user WHERE username LIKE '$searchKey%' AND user_id != '$user_id'";
$result6 = mysqli_query($connect, $sql6);
if(mysqli_num_rows($result6) > 0) {
    while ($row6 = mysqli_fetch_assoc($result6)) {
        $uid = $row6['user_id'];
        $username = $row6['username'];
        $type_id = $row6['type_id'];
        $profile_pic = $row6['profile_pic'];
        //select user role from tbl_user_role
        $sql2N = "SELECT * FROM tbl_user_role WHERE role_id = '$type_id'";
        $result2N = mysqli_query($connect, $sql2N);
        $row2N = mysqli_fetch_assoc($result2N);
        $user_role = $row2N['role_name'];
        

        echo '
                <a class="rounded-card" id="' . $uid . '">
                    <div class="media"><img src="./assets/uploads/' . $profile_pic . '" alt="user" width="50" height="50" class="rounded-circle">
                        <div class="media-body ml-4">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <h6 class="mb-0" id="uname">' . $username . '</h6>
                            </div>
                            <p class="mb-0 msg-preview">' . $user_role . '</p>
                        </div>
                    </div>
                </a>
                
                ';
    }
}else{
    echo '
                <a class="rounded-card" >
                    <div class="media">
                        <div class="media-body ml-4">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <h6 class="mb-0" >No user found</h6>
                            </div>
                        </div>
                    </div>
                </a>
                
                ';
}

?>