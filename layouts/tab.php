<div class="tab">
    <a href="./tasks.php" id="tab1" class="tablinks <?= ($activePage == 'tasks') ? 'active-tab' : ''; ?>">Tasks</a>
    <div class="divider <?= ($activePage == 'files') || ($activePage == 'tasks') ? 'active-divider' : ''; ?>"></div>
    <a href="./files.php" id="tab2" class="tablinks <?= ($activePage == 'files') ? 'active-tab' : ''; ?>">Files</a>
    <div class="divider <?= ($activePage == 'files') || ($activePage == 'activity') ? 'active-divider' : ''; ?> "></div>
    <a href="./activity.php" id="tab3" class="tablinks <?= ($activePage == 'activity') ? 'active-tab' : ''; ?>">Activity</a>
    <?php
    include_once('./config/connect.php');
    if ($_SESSION['currentUserTypeId'] == '2') {
        $manageProjectDivider = ($activePage == 'manageProject') || ($activePage == 'activity') ? 'active-divider' : '';
        $manageProject = ($activePage == 'manageProject') ? 'active-tab' : '';
        echo '<div class="divider' . $manageProjectDivider . ' "></div>
        <a href="./manageProject.php" id="tab4" class="tablinks ' . $manageProject . '">Manage Project</a>';
    }
    else{
        $projectDetailsDivider = ($activePage == 'projectDetails') || ($activePage == 'activity') ? 'active-divider' : '';
        $projectDetails = ($activePage == 'projectDetails') ? 'active-tab' : '';
        echo '<div class="divider' . $projectDetailsDivider . ' "></div>
        <a href="./projectDetails.php" id="tab4" class="tablinks ' . $projectDetails . '">Project Details</a>';
    }

    ?>
</div>