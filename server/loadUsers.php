<?php
$memberCount = $_POST['memberCount'];
include('../config/connect.php');
session_start(); 
$sql = "SELECT * FROM tbl_user WHERE type_id!=1 LIMIT $memberCount";
$result = mysqli_query($connect, $sql);


while ($row = mysqli_fetch_assoc($result)) {
    $userID = $row['user_id'];
    $userName = $row['username'];
    $userEmail = $row['email'];
    $userRoleId = $row['type_id'];
    $userTeam = $row['team_id'];
    $mob = $row['mob'];

    $userRoleId = "SELECT role_name FROM tbl_user_role WHERE role_id = '$userRoleId'";
    $result2 = mysqli_query($connect, $userRoleId);
    $role_name = mysqli_fetch_assoc($result2);
    echo '
           <tr>
                <td>' . $userName . '</td>
                <td>' . $userEmail . '</td>
                <td>' . $mob . '</td>
                <td>' . $role_name['role_name'] . '</td>
                
                <td>
                    <button
                          class="dropdown-toggle action-btn"
                          id="dropdownMenuOffset"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                          data-offset="5,10"
                    >
                          Action
                    </button>
                        <div
                          class="dropdown-menu"
                          aria-labelledby="dropdownMenuOffset"
                        >
                          <a class="dropdown-item" href="./server/removeMember.php?fid=' . $userID . '">Remove</a>
                        </div>
                        <!--<img class="dwnld-ico" src="./assets/icons/download-ico.svg" alt="download-ico">-->
                      </td>
                      </tr>
                      ';
}
?>