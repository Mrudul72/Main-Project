<?php 
session_start();
include('../config/connect.php');
$searchKey = $_POST['search'];
$user_id = $_SESSION['userId'];
$team_id = $_SESSION['currentUserTeamId'];
$type_id = $_SESSION['currentUserTypeId'];

if($type_id == 2){
    $sql6 = "SELECT * FROM tbl_user WHERE username LIKE '$searchKey' AND user_id IN (SELECT DISTINCT user_id FROM tbl_team_members WHERE team_id IN(SELECT DISTINCT team_id from tbl_team_allocation WHERE project_manager = '$user_id '));";
    $result6 = mysqli_query($connect, $sql6);

    //select team name from tbl_teams where manager_id = user_id
    $sql7 = "SELECT * FROM tbl_teams WHERE team_title LIKE '$searchKey' AND manager_id = '$user_id'";
    $result7 = mysqli_query($connect, $sql7);
    if(mysqli_num_rows($result6) > 0) {
        while ($row6 = mysqli_fetch_assoc($result6)) {
            $uid = $row6['user_id'];
            $username = $row6['username'];
            $type_id = $row6['type_id'];
             //select user role from tbl_user_role
        $sql2 = "SELECT * FROM tbl_user_role WHERE role_id = '$type_id'";
        $result2 = mysqli_query($connect, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $user_role = $row2['role_name'];
        echo '<a class="list-group-item list-group-item-action" href="./teams.php" id="' . $uid . '">' . $username . ' (' . $user_role . ')</a>';
        }
    }else if(mysqli_num_rows($result7) > 0){
        while ($row7 = mysqli_fetch_assoc($result7)) {
            $team_id = $row7['team_id'];
            $team_name = $row7['team_title'];
            echo '<a class="list-group-item list-group-item-action" href="./manageteam.php?id=' . $team_id . '" id="' . $team_id . '">' . $team_name . '</a>';
        }
    }
    else{
        echo '<a class="list-group-item list-group-item-action" >No result found</a>';
    }
}
else{
//search for username having the search key and team id of the current user
$sql6 = "SELECT * FROM tbl_user WHERE username LIKE '$searchKey' AND team_id = '$team_id' AND user_id != '$user_id' AND team_id != '-1'";
$result6 = mysqli_query($connect, $sql6);
//search for team name having the search key
$sql3 = "SELECT * FROM tbl_teams WHERE team_title LIKE '$searchKey' AND team_id = '$team_id' or manager_id = '$user_id'";
$result3 = mysqli_query($connect, $sql3);
//search for event title having the search key
// $sql4 = "SELECT * FROM tbl_events WHERE title LIKE '%$searchKey%'";
// $result4 = mysqli_query($connect, $sql4);

//search for project title having the search key
$sql5 = "SELECT tbl_project.project_name as project_name, tbl_project.project_id as project_id FROM tbl_project JOIN tbl_team_allocation on tbl_project.project_id = tbl_team_allocation.project_id WHERE project_name LIKE '$searchKey' AND (tbl_team_allocation.team_id = '$team_id' OR tbl_team_allocation.project_manager = '$user_id')";
$result5 = mysqli_query($connect, $sql5);

if (mysqli_num_rows($result6) > 0) {
    while ($row6 = mysqli_fetch_assoc($result6)) {
        $uid = $row6['user_id'];
        $username = $row6['username'];
        $type_id = $row6['type_id'];
        //select user role from tbl_user_role
        $sql2 = "SELECT * FROM tbl_user_role WHERE role_id = '$type_id'";
        $result2 = mysqli_query($connect, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $user_role = $row2['role_name'];
        echo '<a class="list-group-item list-group-item-action" href="./teams.php" id="' . $uid . '">' . $username . ' (' . $user_role . ')</a>';
    }
} else if (mysqli_num_rows($result3) > 0) {
    while ($row3 = mysqli_fetch_assoc($result3)) {
        $team_id = $row3['team_id'];
        $team_title = $row3['team_title'];
        echo '<a class="list-group-item list-group-item-action" href="./teamMemberDetails.php?id=' . $team_id . '" id="' . $team_id . '">' . $team_title . '</a>';
    }
}
// else if (mysqli_num_rows($result4) > 0) {
//     while ($row4 = mysqli_fetch_assoc($result4)) {
//         $event_id = $row4['id'];
//         $event_title = $row4['title'];
//         $event_start = $row4['start'];
//         $event_end = $row4['end'];
//         echo '<a class="list-group-item list-group-item-action" href="./schedule.php" id="' . $event_id . '">' . $event_title . '</a>';
//     }
// }
else if (mysqli_num_rows($result5) > 0) {
    while ($row5 = mysqli_fetch_assoc($result5)) {
        $project_id = $row5['project_id'];
        $project_name = $row5['project_name'];
        echo '<a class="list-group-item list-group-item-action" href="./project.php" id="' . $project_id . '">' . $project_name . '</a>';
    }
}

else {
    echo '<a class="list-group-item list-group-item-action">No results found</a>';
}

}
?>
