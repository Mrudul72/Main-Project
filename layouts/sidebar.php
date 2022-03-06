<?php 
include('./config/connect.php');
$activePage = basename($_SERVER['PHP_SELF'], ".php");
$userName = $_SESSION['userName'];
$userType = $_SESSION['currentUserTypeId'];
$proPic = $_SESSION['proPic'];
$selectRole= "SELECT `role_name` FROM tbl_user_role WHERE `role_id` = '$userType '";
$result3 = mysqli_query($connect, $selectRole);
$roleName = mysqli_fetch_assoc($result3);
?>

<!--sidebar starts-->
<div class="sidebar-container">
    <nav class="nav-container">
        <div class="logo-container">
            <img src="./assets/images/logo.svg" alt="ease-it-logo" class="logo" />
        </div>
        <ul class="nav">
            <a href="./dashboard.php">
                <li class="nav-items <?= ($activePage == 'dashboard') ? 'active-nav':''; ?>">
                    <span class="ico">
                        <object class="svgClass" type="image/svg+xml" data="./assets/icons/dashboard-ico.svg"></object>
                    </span><span>Dashboard</span>
                </li>
            </a>
            <a href="./project.php">
                <li class="nav-items <?= ($activePage == 'project') || ($activePage == 'activity') || ($activePage == 'tasks') || ($activePage == 'files') || ($activePage == 'manageProject') ? 'active-nav':''; ?>">
                    <span class="ico">
                        <object class="svgClass" type="image/svg+xml" data="./assets/icons/project-ico.svg"></object>
                    </span>
                    <span>Projects</span>
                </li>
            </a>
            <a href="./schedule.php">
            <li class="nav-items <?= ($activePage == 'schedule') ? 'active-nav':''; ?>">
                <span class="ico">
                    <object class="svgClass" type="image/svg+xml" data="./assets/icons/schedule-ico.svg"></object>
                </span><span>Schedule</span>
            </li>
            </a>
            <!-- <li class="nav-items">
              <span class="ico"
                ><img src="./assets/icons/files-ico.svg" alt="" /></span
              ><span>Files</span>
            </li> -->
            <a href="./teams.php">
            <li class="nav-items <?= ($activePage == 'teams') || ($activePage == 'manageteam') || ($activePage == 'teamMemberDetails') ? 'active-nav':''; ?> ">
                <span class="ico"><object class="svgClass" type="image/svg+xml"
                        data="./assets/icons/team-ico.svg"></object></span><span>Teams</span>
            </li>
            </a>
            <!-- <li class="nav-items">
              <span class="ico"
                ><img src="./assets/icons/chat-ico.svg" alt="" /></span
              ><span>Chats</span>
            </li> -->
        </ul>
    </nav>
    <div class="s-profile-container">
    <?php echo '<img class="pro-pic-ico" src="./assets/uploads/' . $proPic . '" alt="" />';?>
        <div class="pro-details-container">
            <p class="pro-name"><?php echo ucwords($userName); ?></p>
            <p class="pro-role"><?php echo ucwords($roleName['role_name']);?></p>
        </div>
        <a href="./auth/logoutController.php"><img class="log-out-btn" src="./assets/icons/power-off-ico.svg" alt="" /></a>
    </div>
</div>
<!--sidebar ends-->