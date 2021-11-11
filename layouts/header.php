<?php 
include('./config/connect.php');
session_start();
$activePage = basename($_SERVER['PHP_SELF'], ".php");
$userName = $_SESSION['userName'];
?>
<header class="header">
    <h1 class="header-txt"><?= ($activePage == 'dashboard') ? 'Hi,' .ucwords($userName) : ucwords($activePage); ?></h1>
    <div class="header-util">
        <div class="search-box">
            <input type="text" placeholder="Search" />
            <div class="header-box">
                <img class="header-ico" src="./assets/icons/search-ico.svg" alt="search" />
            </div>
        </div>
        <div class="header-box" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <img class="header-ico" src="./assets/icons/bell-ico.svg" alt="notification" />
            <div class="dropdown-menu" id="dropdownMenuButton" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>

        <div class="header-box" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <img class="header-ico" src="./assets/icons/settings-ico.svg" alt="settings" />
            <div class="dropdown-menu " id="dropdownMenuButton2" aria-labelledby="dropdownMenuButton2">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something</a>
            </div>
        </div>

    </div>
</header>