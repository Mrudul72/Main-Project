<?php
include('./config/connect.php');
session_start();
if (isset($_SESSION["pmsSession"]) != session_id()) {
  header("Location: ./index.php");
  die();
} else {
  if (!empty($_GET['id'])) {
    $_SESSION['teamID'] = $_GET['id'];
  }
  $tId = $_SESSION['teamID'];
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
                <!--col 2 start-->
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <div class="files-card">
                            <div class="d-flex justify-content-between">
                                <h1 class="content-heading">Team Details</h1>

                            </div>
                            <form>
                                <?php
                                // echo "<script>alert('$taskId');</script>";
                                $sql = "SELECT * FROM tbl_teams WHERE team_id= $tId";
                                $result = mysqli_query($connect, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $teamTitle = $row['team_title'];
                                $sql2 = "SELECT count(*) FROM tbl_team_members WHERE team_id= $tId";
                                $result2 = mysqli_query($connect, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                                $memberCount = $row2['count(*)'];


echo '
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-8">
                        <div class="form-group">
                          <label for="task-title">Team title</label>
                          <textarea name="task-detail-title" id="task-detail-title" class="form-control" placeholder="task title" autocomplete="off">' . $teamTitle . '</textarea>
                        </div>
                        <div class="form-group">
                          <label for="team-stength">Team Stength</label>
                          <input type="text" disabled name="task-detail-title" id="team-stength" class="form-control" value="'.$memberCount.'" autocomplete="off">
                        </div>
                      </div>

                      <div class="col-4 ml-auto">
                      <div class="form-group">
                        <label for="task-actions">Add team member</label>
                        <button id="addMember" name="addMember" value="' . $tId . '" type="button" class="secondary-modal-btn">Add</button>
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
                  <div class="container">
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


    <!--Confirmation Modal start-->

    <div class="modal fade" id="confirmationModal2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Team</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this team?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="teamDeleteBtn" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Confirmation Modal ends-->

        <script src="./js/app.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>    
    <script>
    //delete team
    // $.ajax({
    //     url: './tasks_copy.php',
    //     type: 'GET',
    //     success: function(data) {}
    // });
    $('#deleteTeam').on('click', function() {
        var team_id = $('#deleteTeam').val();
        // alert(task_id);
        $('#confirmationModal2').modal('show');

        var task_status = 0;
        $("#teamDeleteBtn").on('click', function() {
            $.ajax({
                url: "./server/deleteTeam.php",
                method: "POST",
                data: {
                    team_id: team_id,
                },
                success: function(data) {
                    window.location.href = "./teams.php";
                }
            });
        });

    });
    //delete team ends
</script>
  </body>

  </html>
<?php
}
?>