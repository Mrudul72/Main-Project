<?php
include('./config/connect.php');
session_start();
if (isset($_SESSION["pmsSession"]) != session_id()) {
    header("Location: ./index.php");
    die();
} else {
    $tId = $_SESSION['projectID'];
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
        <?php include_once("./layouts/sidebar.php"); ?>
        <!--sidebar end-->

        <!--header starts-->
        <?php include_once("./layouts/header.php"); ?>
        <!--header ends-->

        <!--Dashboard contents-->
        <div class="dashboard-contents">
            <div class="row">
                <!--tab start-->
                <?php include_once("./layouts/tab.php"); ?>
                <!--tab end-->
                
            </div>
            <div class="row">
          <!--col 2 start-->
          <div class="col-12">
            <div class="d-flex flex-column">
              <div class="files-card">
                <h1 class="content-heading">Project Details</h1>
                <form method="post" action="./server/updateProjectDetails.php">
                  <?php
                  // echo "<script>alert('$taskId');</script>";
                  $sql = "SELECT * FROM tbl_project WHERE project_id= $tId";
                  $result = mysqli_query($connect, $sql);
                  $row = mysqli_fetch_assoc($result);
                  $_SESSION['project_name'] = $row['project_name'];
                  $project_name = $_SESSION['project_name'];
                    $project_description = $row['project_description'];
                    $project_start_date = $row['project_start_date'];
                    $project_end_date = $row['project_end_date'];
                    $project_status = $row['project_status'];
                    $project_priority = $row['project_priority'];


                  echo '
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-8">
                        <div class="form-group">
                          <label for="teamTitle">Team title</label>
                          <textarea name="teamTitle" id="teamTitle" class="form-control" placeholder="task title" autocomplete="off">' . $project_name . '</textarea>
                        </div>
                        <div class="form-group">
                          <label for="teamTitle">Team title</label>
                          <textarea name="teamDescription" id="teamDescription" class="form-control" placeholder="task title" autocomplete="off">' . $project_description . '</textarea>
                        </div>
                      </div>

                      <div class="col-4 ml-auto">
                      <div class="form-group">
                        <label for="task-actions">Add team member</label>
                        <button id="addMember" name="addMember" value="' . $tId . '" type="button" class="secondary-modal-btn">Add</button>
                      </div>
                      <div class="form-group">
                        <label for="task-actions">Invite team member</label>
                        <button id="inviteMember" name="addMember" value="' . $tId . '" type="button" class="secondary-modal-btn">Invite</button>
                      </div>
                        <div class="form-group">
                          <label for="task-actions">Actions</label>
                          <button id="deleteTeam" name="deleteTeam" value="' . $tId . '" type="button" class="secondary-modal-btn">Delete</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  ';
                  ?>
                  <div class="m-2">
                    <button id="updateTeamBtn" type="submit" class="btn btn-primary saveBtn">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!--col 2 end-->
        </div>
      </div>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"
    ></script>
    <script src="./js/app.js"></script>
    <script>
      $(document).ready(function() {
        let filesCount = 4;
        $("#filesContainer").load("./server/loadFiles.php",{
            filesCount: filesCount
          });
        $(".view-more-btn").click(function() {
          filesCount += 4;
          $("#filesContainer").load("./server/loadFiles.php",{
            filesCount: filesCount
          });
        });
      });
    </script>
  </body>
</html>
<?php
}
?>