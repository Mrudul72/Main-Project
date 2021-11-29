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
    <link href="./assets/fullcalendar/lib/main.min.css" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css"
      rel="stylesheet"
    />
    <script src="./assets/fullcalendar/lib/main.min.js"></script>
    <link rel="stylesheet" href="./stylesheets/css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./stylesheets/css/bootstrap.min.css" />
    <link rel="icon" href="./assets/images/logo2.png" type="image/icon type" />
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var calendarEl = document.getElementById("calendar");
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, "0");
        var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + "-" + mm + "-" + dd;

        var calendar = new FullCalendar.Calendar(calendarEl, {
          themeSystem: "bootstrap",
          headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay",
          },
          initialDate: today,
          navLinks: true, // can click day/week names to navigate views
          selectable: true,
          selectMirror: true,
          select: function (arg) {
            var title = prompt("Event Title:");
            if (title) {
              calendar.addEvent({
                title: title,
                start: arg.start,
                end: arg.end,
                allDay: arg.allDay,
              });
            }
            calendar.unselect();
          },
          eventClick: function (arg) {
            if (confirm("Are you sure you want to delete this event?")) {
              arg.event.remove();
            }
          },
          editable: true,
          dayMaxEvents: true, // allow "more" link when too many events
          events: [
            {
              title: "All Day Event",
              start: "2021-11-26",
            },
            {
              title: "Long Event",
              start: "2020-09-07",
              end: "2020-09-10",
            },
            {
              groupId: 999,
              title: "Repeating Event",
              start: "2020-09-09T16:00:00",
            },
            {
              groupId: 999,
              title: "Repeating Event",
              start: "2020-09-16T16:00:00",
            },
            {
              title: "Conference",
              start: "2021-11-20",
              end: "2020-09-13",
            },
            {
              title: "Meeting",
              start: "2020-09-12T10:30:00",
              end: "2020-09-12T12:30:00",
            },
            {
              title: "Lunch",
              start: "2020-09-12T12:00:00",
            },
            {
              title: "Meeting",
              start: "2021-11-25T14:30:00",
            },
            {
              title: "Happy Hour",
              start: "2020-09-12T17:30:00",
            },
            {
              title: "Dinner",
              start: "2020-09-12T20:00:00",
            },
            {
              title: "Birthday Party",
              start: "2020-09-13T07:00:00",
            },
            {
              title: "Click for Google",
              url: "http://google.com/",
              start: "2020-09-28",
            },
          ],
        });

        calendar.render();
      });
    </script>
    <style>
      #calendar {
        max-width: 100%;
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
          <div class="col-8">
            <div
              class="container bg-white p-3 mx-n2"
              style="width: 100%; border-radius: 12px"
            >
              <div id="calendar"></div>
            </div>
          </div>
          <!--col 1 end-->

          <!--col 2 start-->
          <div class="col-4">
            <div class="d-flex flex-column">
              <div class="dashboard-card">
                <h1 class="content-heading">Upcoming Events</h1>
                <h3 class="sub-title">Today</h3>
                <ul class="activity-container">
                  <li class="items">
                    <img src="./assets/icons/tick-dark-ico.svg" alt="" />
                    <div class="card-text">
                      <p>Darika Samak mark as done Listing on Product Hunt</p>
                      <div class="time-stamp">8:40pm</div>
                    </div>
                  </li>
                  <li class="items">
                    <img src="./assets/icons/client-ico.svg" alt="" />
                    <div class="card-text">
                      <p>Client Meeting</p>
                      <div class="time-stamp">8:40pm</div>
                    </div>
                  </li>
                </ul>
                <h3 class="sub-title">Tomorrow</h3>
                <ul class="activity-container">
                  <li class="items">
                    <img src="./assets/icons/comment-ico.svg" alt="" />
                    <div class="card-text">
                      <p>Review Meeting</p>
                      <div class="time-stamp">8:40pm</div>
                    </div>
                  </li>
                  <li class="items">
                    <img src="./assets/icons/tick-dark-ico.svg" alt="" />
                    <div class="card-text">
                      <p>Darika Samak mark as done Listing on Product Hunt</p>
                      <div class="time-stamp">8:40pm</div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!--col 2 end-->
        </div>
      </div>
    </div>

    <script src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="./js/app.js"></script>
  </body>
</html>
<?php
}
?>
