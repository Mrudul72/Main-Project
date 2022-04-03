<?php
include('./config/connect.php');
session_start();
if (isset($_SESSION["pmsSession"]) != session_id()) {
    header("Location: ./index.php");
    die();
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./stylesheets/css/style.css" />
        <link rel="stylesheet" href="./stylesheets/css/bootstrap.min.css" />
        <link rel="icon" href="./assets/images/logo2.png" type="image/icon type" />

        <!-- full calendar -->
        <link rel="stylesheet" href="./assets/fullcalendar/fullcalendar.min.css" />
        <script src="./assets/fullcalendar/lib/jquery.min.js"></script>
        <script src="./assets/fullcalendar/lib/moment.min.js"></script>
        <script src="./assets/fullcalendar/fullcalendar.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#calendar').empty();
                var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    events: "./server/fetch-event.php",
                    displayEventTime: false,
                    eventRender: function(event, element, view) {
                        if (event.allDay === 'true') {
                            event.allDay = true;
                        } else {
                            event.allDay = false;
                        }
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay) {
                        var title = prompt('Event Title:');

                        if (title) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                            $.ajax({
                                url: './server/add-event.php',
                                data: 'title=' + title + '&start=' + start + '&end=' + end,
                                type: "POST",
                                success: function(data) {
                                    displayMessage("Added Successfully");
                                }
                            });
                            calendar.fullCalendar('renderEvent', {
                                    title: title,
                                    start: start,
                                    end: end,
                                    allDay: allDay
                                },
                                true
                            );
                        }
                        calendar.fullCalendar('unselect');
                    },

                    editable: true,
                    eventDrop: function(event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                        $.ajax({
                            url: './server/edit-event.php',
                            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                            type: "POST",
                            success: function(response) {
                                displayMessage("Updated Successfully");
                            }
                        });
                    },
                    eventClick: function(event) {
                        var deleteMsg = confirm("Do you really want to delete?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                url: "./server/delete-event.php",
                                data: "&id=" + event.id,
                                success: function(response) {
                                    if (parseInt(response) > 0) {
                                        $('#calendar').fullCalendar('removeEvents', event.id);
                                        displayMessage("Deleted Successfully");
                                    }
                                }
                            });
                        }
                    }

                });
            });

            function displayMessage(message) {
                $(".response").show();
                $(".response").html("<div class='alert alert-primary' role='alert'>" + message + "</div>");

                setInterval(function() {
                    $(".success").fadeOut();
                    $(".response").fadeOut();
                    location.reload();
                }, 1000);
            }
        </script>

        <style>
            #calendar {
                width: 100%;
                position: relative;
            }

            #calendar ::-webkit-scrollbar {
                width: 12px;
            }

            #calendar ::-webkit-scrollbar-track {
                background-color: #e0eaff;
                border-radius: 100px;
                margin: 0.5vw 0;
            }

            #calendar ::-webkit-scrollbar-thumb {
                background-color: #011e56;
                border-radius: 100px;
            }

            .response {
                height: 60px;
                display: none;
            }

            .success {
                background: #cdf3cd;
                padding: 10px 60px;
                border: #c3e6c3 1px solid;
                display: inline-block;
            }
        </style>
    </head>

    <body class="dashboard-body">

        <div class="dashboard-container">
            <!--sidebar goes here-->
            <?php include_once("./layouts/sidebar.php"); ?>
            <!--sidebar end-->

            <!--header starts-->
            <?php include_once("./layouts/header.php"); ?>
            <!--header ends-->

            <!--Dashboard contents-->
            <div class="dashboard-contents">
                <div class="row">
                    <!--col 1 start-->
                    <div class="col-7">
                        <div class="response"></div>
                        <div class="container bg-white p-3 ml-3" style="width: 95%; border-radius: 12px">
                            <div id='calendar'></div>
                        </div>
                    </div>
                    <!--col 1 end-->

                    <!--col 2 start-->
                    <div class="col-5">
                        <div class="d-flex flex-column">
                            <div class="dashboard-card">
                                <h1 class="content-heading">Upcoming Events</h1>
                                <h3 class="sub-title">Today</h3>
                                <ul class="activity-container">
                                    <?php
                                    //select all event for today
                                    $today = date("Y-m-d");
                                    $tomorrow = date("Y-m-d", strtotime("+1 day"));
                                    $sql = "SELECT * FROM tbl_events WHERE start = '$today'";
                                    $result = mysqli_query($connect, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $event_id = $row['id'];
                                            $event_title = $row['title'];
                                            $event_start = $row['start'];
                                            $event_end = $row['end'];
                                            echo '
                                                <li class="items">
                                                    <img src="./assets/icons/schedule-round-ico.svg" alt="" />
                                                    <div class="card-text">
                                                        <p>' . $event_title . '</p>
                                                         <div class="time-stamp">' . $event_start . '</div>
                                                    </div>
                                                </li>
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
                                <h3 class="sub-title">Tomorrow</h3>
                                <ul class="activity-container">

                                    <?php
                                    //select all event for today
                                    $today = date("Y-m-d");
                                    $tomorrow = date("Y-m-d", strtotime("+1 day"));
                                    $sql = "SELECT * FROM tbl_events WHERE start = '$tomorrow'";
                                    $result = mysqli_query($connect, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $event_id = $row['id'];
                                            $event_title = $row['title'];
                                            $event_start = $row['start'];
                                            $event_end = $row['end'];
                                            echo '
                            <li class="items">
                        <img src="./assets/icons/schedule-round-ico.svg" alt="" />
                        <div class="card-text">
                          <p>' . $event_title . '</p>
                          <div class="time-stamp">' . $event_start . '</div>
                        </div>
                      </li>
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
                    </div>
                    <!--col 2 end-->
                </div>
            </div>
            <script src="./js/app.js"></script>
    </body>


    </html>
<?php
}
?>