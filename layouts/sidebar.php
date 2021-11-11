<?php 
$activePage = basename($_SERVER['PHP_SELF'], ".php");
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
                <li class="nav-items <?= ($activePage == 'project') || ($activePage == 'activity') || ($activePage == 'tasks') || ($activePage == 'files') ? 'active-nav':''; ?>">
                    <span class="ico">
                        <object class="svgClass" type="image/svg+xml" data="./assets/icons/project-ico.svg"></object>
                    </span>
                    <span>Projects</span>
                </li>
            </a>
            <li class="nav-items">
                <span class="ico">
                    <object class="svgClass" type="image/svg+xml" data="./assets/icons/schedule-ico.svg"></object>
                </span><span>Schedule</span>
            </li>
            <!-- <li class="nav-items">
              <span class="ico"
                ><img src="./assets/icons/files-ico.svg" alt="" /></span
              ><span>Files</span>
            </li> -->
            <li class="nav-items">
                <span class="ico"><object class="svgClass" type="image/svg+xml"
                        data="./assets/icons/team-ico.svg"></object></span><span>Teams</span>
            </li>
            <!-- <li class="nav-items">
              <span class="ico"
                ><img src="./assets/icons/chat-ico.svg" alt="" /></span
              ><span>Chats</span>
            </li> -->
        </ul>
    </nav>
    <div class="s-profile-container">
        <img class="pro-pic-ico" src="./assets/images/pro-pic.jpg" alt="" />
        <div class="pro-details-container">
            <p class="pro-name">John Wick</p>
            <p class="pro-role">Web Developer</p>
        </div>
        <a href="./auth/logoutController.php"><img class="log-out-btn" src="./assets/icons/power-off-ico.svg" alt="" /></a>
    </div>
</div>
<!--sidebar ends-->