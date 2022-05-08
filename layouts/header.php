<?php
include('./config/connect.php');
$activePage = basename($_SERVER['PHP_SELF'], ".php");
$userName = $_SESSION['userName'];
?>
<header class="header">
    <h1 class="header-txt"><?php if ($activePage == 'dashboard') {
                                echo 'Hi,' . ucwords($userName);
                            } else if (($activePage == 'manageteam')) {
                                echo 'Manage Team';
                            } else {
                                echo ucwords($activePage);
                            }  ?></h1>
    <div class="header-util">
        <div>
            <div class="search-box">
                <input type="text" placeholder="Search" id="searchInput" />
                <div class="header-box">
                    <img class="header-ico" src="./assets/icons/search-ico.svg" id="searchBtn" alt="search" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
                </div>
            </div>
            <div class="dropdown-menu notification-container dropdown-menu-lg-right mr-5 mt-2" id="searchResult" aria-labelledby="dropdownMenuLink">
            <a class="list-group-item list-group-item-action">No results found</a>
            </div>
        </div>
        <div>
            <?php
            //select all event for today
            $today = date("Y-m-d");
            $sql = "SELECT * FROM tbl_events WHERE start = '$today'";
            $result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($result) > 0) {
                $icon = './assets/icons/bell-ico-active.svg';
            } else {
                $icon = './assets/icons/bell-ico.svg';
            }
            ?>
            <div class="header-box" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="5,10">
                <img class="header-ico" src="<?php echo $icon; ?>" alt="notification" />
            </div>
            <div class="dropdown-menu notification-container" aria-labelledby="dropdownMenuOffset">

                <ul class="py-1 px-3">

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $event_id = $row['id'];
                            $event_title = $row['title'];
                            $event_start = $row['start'];
                            $event_end = $row['end'];
                            echo '
                            <a href="./schedule.php">
                            <li class="d-flex align-items-start justify-content-between my-3" style="margin-top:1vw; dropdown-item">
                                <img src="./assets/icons/schedule-round-ico.svg" alt="" />
                                <div class="card-text" style="width:90%;">
                                    <p>' . $event_title . '</p>
                                </div>
                            </li>
                            </a>
                            ';
                        }
                    } else {
                        echo '
                            <li class="items">

                            <div class="card-text">
                            <p>No events</p>

                            </div>
                            </li>
                            ';
                    }

                    ?>
                </ul>


            </div>
        </div>

        <div>
            <div class="header-box" id="dropdownMenuOffset2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="5,10">
                <img class="header-ico" src="./assets/icons/settings-ico.svg" alt="settings" />
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset2">
                <a class="dropdown-item" href="./manageProfile.php">Manage Profile</a>

            </div>
        </div>

    </div>
</header>