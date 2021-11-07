<div class="tab">
    <a href="./tasks.php" id="tab1" class="tablinks <?= ($activePage == 'tasks') ? 'active-tab':''; ?>">Tasks</a>
    <div class="divider <?= ($activePage == 'files') || ($activePage == 'tasks') ? 'active-divider':''; ?>"></div>
    <a href="./files.php" id="tab2" class="tablinks <?= ($activePage == 'files') ? 'active-tab':''; ?>">Files</a>
    <div class="divider <?= ($activePage == 'files') || ($activePage == 'activity') ? 'active-divider':''; ?> "></div>
    <a href="./activity.php" id="tab3" class="tablinks <?= ($activePage == 'activity') ? 'active-tab':''; ?>">Activity</a>
</div>
