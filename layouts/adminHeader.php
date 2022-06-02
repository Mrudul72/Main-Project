<?php
include('./config/connect.php');
$activePage = basename($_SERVER['PHP_SELF'], ".php");
$userName = $_SESSION['userName'];
?>
<header class="header">
    <h1 class="header-txt"><?php if ($activePage == 'dashboard') {
                                echo 'Hi,' . ucwords($userName);
                            } 
                            else if(($activePage == 'manageteam')){
                                echo 'Manage Team';
                            }
                            else {
                                echo ucwords($activePage);
                            }  ?></h1>
    <div class="header-util d-flex justify-content-end">
        <!-- <div class="search-box">
            <input type="text" placeholder="Search" />
            <div class="header-box">
                <img class="header-ico" src="./assets/icons/search-ico.svg" alt="search" />
            </div>
        </div>
        <div>
            <div class="header-box" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="5,10">
                <img class="header-ico" src="./assets/icons/bell-ico.svg" alt="notification" />
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                <a class="dropdown-item" href="#">Notification</a>

            </div>
        </div> -->

        <div>
            <div class="header-box" id="dropdownMenuOffset2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="5,10">
                <img class="header-ico" src="./assets/icons/settings-ico.svg" alt="settings" />
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset2">
                <a class="dropdown-item" href="./adminManageProfile.php">Manage Profile</a>

            </div>
        </div>

    </div>
</header>