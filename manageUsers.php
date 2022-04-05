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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./stylesheets/css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./stylesheets/css/bootstrap.min.css" />
    <link rel="icon" href="./assets/images/logo2.png" type="image/icon type" />


  </head>

  <body class="dashboard-body">
    <div class="dashboard-container">
      <!--sidebar goes here-->
      <?php include("./layouts/adminSidebar.php"); ?>
      <!--sidebar end-->

      <!--header starts-->
      <?php include("./layouts/adminHeader.php"); ?>
      <!--header ends-->

      <!--Dashboard contents-->
      <div class="dashboard-contents">

        <div class="row">
          <!--col 2 start-->
          <div class="col-12">
            <div class="d-flex flex-column">
              <div class="files-card">
                <div class="d-flex justify-content-between">
                  <h1 class="content-heading">Team Members</h1>
                  <button data-toggle='modal' data-target='#addMemberModal' class="add-task-btn">Add Members +</button>
                </div>
                <!---table start-->
                <table class="table files-table">
                  <thead>
                    <tr class="t-head">
                      <th>Name</th>
                      <th>Email ID</th>
                      <th>Mobile No</th>
                      <th>Role</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody id="filesContainer">



                  </tbody>
                </table>

                <!---table end-->
                <h3 class="view-more-btn">View More >></h3>
              </div>
            </div>
          </div>
          <!--col 2 end-->
        </div>
      </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./js/app.js"></script>
    <script>
      $(document).ready(function() {
        let memberCount = 4;
        $("#filesContainer").load("./server/loadUsers.php", {
          memberCount: memberCount
        });
        $(".view-more-btn").click(function() {
          memberCount += 4;
          $("#filesContainer").load("./server/loadUsers.php", {
            memberCount: memberCount
          });
        });
      });
    </script>
  </body>

  </html>
<?php
}
?>