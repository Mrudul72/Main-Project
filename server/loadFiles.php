<?php
$filesCount = $_POST['filesCount'];
include('../config/connect.php');
session_start();
$pId = $_SESSION['projectID'];
$userType = $_SESSION['currentUserTypeId'];
$sql = "SELECT * FROM tbl_files WHERE project_id=$pId LIMIT $filesCount";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {

while ($row = mysqli_fetch_assoc($result)) {
    $file_id = $row['file_id'];
    $file_name = $row['file_name'];
    $file_size = $row['file_size'];
    $file_uploaded_by = $row['uploaded_by_id'];
    $file_tag = $row['team_id'];
    $file_date = $row['uploaded_date'];
    $selectUname = "SELECT `username` FROM tbl_user WHERE `user_id` = '$file_uploaded_by'";
    $result2 = mysqli_query($connect, $selectUname);
    $uname = mysqli_fetch_assoc($result2);
    $selectTeam = "SELECT `team_title` FROM tbl_teams WHERE `team_id` = '$file_tag'";
    $result3 = mysqli_query($connect, $selectTeam);
    $teamName = mysqli_fetch_assoc($result3);
    if($userType == '2'){
      $team_title = "Manager";
    }else{
      $team_title = $teamName['team_title'];
    }
    echo '
           <tr>
                <td>' . $file_name . '</td>
                <td>' . $file_size . '</td>
                <td>' . $uname['username'] . '</td>
                <td>' . $team_title . '</td>
                <td>' . $file_date . '</td>
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
                          <a class="dropdown-item" href="./server/deleteFile.php?fid=' . $file_id . '">Delete</a>
                        </div>
                        <!--<img class="dwnld-ico" src="./assets/icons/download-ico.svg" alt="download-ico">-->
                      </td>
                      </tr>
                      ';
}
}
else{
  echo '<p class="task-title">
  No files uploaded yet
  </p>';
}
?>
