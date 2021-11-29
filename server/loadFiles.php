<?php
$filesCount = $_POST['filesCount'];
include('../config/connect.php');
$sql = "SELECT * FROM tbl_files LIMIT $filesCount";
$result = mysqli_query($connect, $sql);

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
    echo '
           <tr>
                <td><a href="files.php?file_id=' . $file_id . '">' . $file_name . '</a></td>
                <td>' . $file_size . '</td>
                <td>' . $uname['username'] . '</td>
                <td>' . $teamName['team_title'] . '</td>
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
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#" >Something 1</a>
                        </div>
                        <img class="dwnld-ico" src="./assets/icons/download-ico.svg" alt="download-ico">
                      </td>
                      </tr>
                      ';
}
?>