<?php
error_reporting(0);
ini_set('display_errors', 0);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="./stylesheets/css/style.css" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./stylesheets/css/bootstrap.min.css" />
  <link rel="icon" href="./assets/images/logo2.png" type="image/icon type" />
  <link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
  <script src="./assets/fullcalendar/lib/jquery.min.js"></script>
  <script src="./assets/fullcalendar/lib/moment.min.js"></script>
  <script src="./assets/fullcalendar/fullcalendar.min.js"></script>
  <script>
    $(document).ready(function() {
      var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "fetch-event.php",
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
              url: 'add-event.php',
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
          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
          $.ajax({
            url: 'edit-event.php',
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
              url: "delete-event.php",
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
      $(".response").html("<div class='success'>" + message + "</div>");
      setInterval(function() {
        $(".success").fadeOut();
      }, 1000);
    }
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
    <?php include("./layouts/sidebar.php"); ?>
    <!--sidebar end-->

    <!--header starts-->
    <?php include("./layouts/header.php"); ?>
    <!--header ends-->

    <!--Dashboard contents-->
    <div class="dashboard-contents">
      <div class="row">
        <!--col 1 start-->
        <div class="col-8">
          <div class="container bg-white p-3 mx-n2" style="width: 100%; border-radius: 12px">
            <div class="response"></div>
            <div id='calendar'></div>
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