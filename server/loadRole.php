<?php
$memberCount = $_POST['memberCount'];
include('../config/connect.php');
session_start(); 
$sql = "SELECT * FROM tbl_user_role LIMIT $memberCount";
$result = mysqli_query($connect, $sql);


while ($row = mysqli_fetch_assoc($result)) {
    $userRoleId = $row['role_id'];
    $userRoleName = $row['role_name'];
    echo '
           <tr>
                <td>' . $userRoleId . '</td>
                <td>' . $userRoleName . '</td>
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
                          <a class="dropdown-item" href="./server/deleteUserRole.php?uid=' . $userRoleId . '">Delete</a>
                        </div>
                        <!--<img class="dwnld-ico" src="./assets/icons/download-ico.svg" alt="download-ico">-->
                      </td>
                      </tr>
                      ';
}

?>