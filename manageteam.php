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
    <title>Manage Team</title>
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
      <?php include("./layouts/sidebar.php"); ?>
      <!--sidebar end-->

      <!--header starts-->
      <?php include("./layouts/header.php"); ?>
      <!--header ends-->

      <!--Dashboard contents-->
      <div class="dashboard-contents">

        <div class="row">
          <!--col 2 start-->
          <div class="col-12">
            <div class="d-flex flex-column">
              <?php
              if (isset($_SESSION['emailSendStatus'])) {
                echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>' . $_SESSION['emailSendStatus'] . '</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
                unset($_SESSION['emailSendStatus']);
              }

              ?>
              <div class="files-card">
                <div class="d-flex justify-content-between">
                  <h1 class="content-heading">Team Details</h1>

                </div>
                <form method="post" action="./server/updateTeamDetails.php">
                  <?php
                  // echo "<script>alert('$taskId');</script>";
                  $sql = "SELECT * FROM tbl_teams WHERE team_id= $tId";
                  $result = mysqli_query($connect, $sql);
                  $row = mysqli_fetch_assoc($result);
                  $_SESSION['teamTitleSelected'] = $row['team_title'];
                  $teamTitle = $_SESSION['teamTitleSelected'];
                  $sql2 = "SELECT count(*) FROM tbl_team_members WHERE team_id= $tId";
                  $result2 = mysqli_query($connect, $sql2);
                  $row2 = mysqli_fetch_assoc($result2);
                  $memberCount = $row2['count(*)'];


                  echo '
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-8">
                        <div class="form-group">
                          <label for="teamTitle">Team title</label>
                          <textarea name="teamTitle" id="teamTitle" class="form-control" placeholder="task title" autocomplete="off">' . $teamTitle . '</textarea>
                        </div>
                        <div class="form-group">
                          <label for="team-stength">Team Strength</label>
                          <input type="text" disabled name="team-stength" id="team-stength" class="form-control" value="' . $memberCount . '" autocomplete="off">
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
              <div class="files-card mt-4 mb-2 p-0">
                <div class="row">
                  <div class="col-12">
                    <div class="d-flex flex-column">
                      <div class="files-card">
                        <div class="d-flex justify-content-between">
                          <h1 class="content-heading">Team Members Invitation</h1>
                          <!-- <button data-toggle='modal' data-target='#addMemberModal' class="add-task-btn">Add Members +</button> -->
                        </div>
                        <!---table start-->
                        <table class="table files-table">
                          <thead>
                            <tr class="t-head">
                              <th>Email ID</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <form method="post" action="./server/revokeInvitation.php">

                              <?php
                              $sql = "SELECT `invitation_id`,`email`,`referral_id`,`invite_status` FROM `tbl_invitation` WHERE `team_id`= '$tId'";
                              $result = mysqli_query($connect, $sql);
                              if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                  $inviteID = $row['invitation_id'];
                                  $invitationId = $row['invitation_id'];
                                  $email = $row['email'];
                                  $referralId = $row['referral_id'];
                                  $status = ($row['invite_status'] == 1) ? 'Accepted' : 'Pending';
                                  $btnStatus = ($row['invite_status'] == 1) ? 'disabled' : '';
                                  echo '
                                <tr>
                                  <td>' . $email . '</td>
                                  <td>' . $status . '</td>
                                  <input type="hidden" name="toEmailID" value="'.$email.'">
                                  <td><button id="revokeInvite" name="revokeInvite" '.$btnStatus.' type="submit" value="' . $tId . '" class="btn btn-primary saveBtn">Revoke Invititation</button></td>
                                </tr>
                                ';
                                }
                              } else {
                                echo '<tr><td colspan="3">No Invitation</td></tr>';
                              }
                              ?>
                            </form>
                          </tbody>
                        </table>

                        <!---table end-->
                      </div>
                    </div>
                  </div>
                  <!--col 2 end-->
                </div>
              </div>
              <div class="files-card mt-4 mb-2 p-0">
                <div class="row">
                  <div class="col-12">
                    <div class="d-flex flex-column">
                      <div class="files-card">
                        <div class="d-flex justify-content-between">
                          <h1 class="content-heading">Team Members</h1>
                          <!-- <button data-toggle='modal' data-target='#addMemberModal' class="add-task-btn">Add Members +</button> -->
                        </div>
                        <!---table start-->
                        <table class="table files-table">
                          <thead>
                            <tr class="t-head">
                              <th>Name</th>
                              <th>Email ID</th>
                              <th>Mobile No</th>
                              <th>Role</th>
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
                </div>
              </div>
            </div>
          </div>
          <!--col 2 end-->
        </div>
      </div>
    </div>

    <!-- invite team member Modal starts-->
    <div class="modal fade" id="inviteTeamMemberModal" tabindex="-1" aria-labelledby="inviteTeamMemberModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="createTeamForm" class="modal-form-container" method="post" action="./server/inviteTeamMember.php">
            <div class="modal-header">
              <h5 class="modal-title" id="inviteTeamMemberModalLabel">Invite team member</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="alert alert-success alert-dismissible fade show" role="alert" id="success" style="display:none;">
                <div id="message"></div>
                <button id="alertClose" type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="form-group">
                <label for="invite-email">Invite new member</label>
                <div class="input-group mb-3">
                  <input class="form-control" name="emailID" type="text" name="invite-member" placeholder="Email id" id="invite-member1">
                </div>
                <small class="statMsg"></small>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary modal-btn" data-dismiss="modal">Close</button>
              <button id="inviteBtn" name="inviteBtn" value="<?php $tId ?>" type="submit" class="btn btn-primary modal-btn-submit">Invite</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--invite team member Modal ends-->

    <!-- add team member Modal starts-->
    <div class="modal fade" id="addTeamMemberModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="createTeamForm" class="modal-form-container" method="post">
            <input type="hidden" name="member-count" value="1" id="member-count">
            <!-- <input type="hidden" name="invite-count" value="1" id="invite-count"> -->
            <div class="modal-header">
              <h5 class="modal-title" id="addTeamModalLabel">Add team members</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="alert alert-success alert-dismissible fade show" role="alert" id="success" style="display:none;">
                <div id="message"></div>
                <button id="alertClose" type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="form-group">
                <label for="team-name">Team name</label>
                <input type="text" disabled value="<?php echo $teamTitle; ?>" name="team-name" id="team-name" class="form-control" placeholder="Team name" required autocomplete="off" />
              </div>
              <div id="team-member-select" class="form-group">
                <label for="team-member">Team members</label>
                <div id="duplicater1" class="input-group mb-3">
                  <select class="custom-select" name="team-member" id="team-member1" aria-label="Example select with button addon">
                    <option disabled selected>Select members</option>
                    <?php
                    $sql = "SELECT * FROM tbl_user WHERE team_id = 0 AND type_id != 2";
                    $result = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      $member_id = $row['user_id'];
                      $memberName = $row['username'];
                      $memberTypeId = $row['type_id'];
                      //selecting the type of user tbl_user_role
                      $selectUserRole = "SELECT role_name FROM tbl_user_role WHERE role_id = $memberTypeId";
                      $selectUserRoleResult = mysqli_query($connect, $selectUserRole);
                      $userRole = mysqli_fetch_assoc($selectUserRoleResult);
                      $userType = $userRole['role_name'];

                      echo '<option value="' . $member_id . '">' . $memberName . ' ( '.$userType.' )</option>';
                    }
                    ?>
                  </select>
                  <div class="input-group-append">
                    <button id="addBtn1" class="btn btn-outline-secondary modal-btn" type="button">Add
                      More</button>
                  </div>
                  <div class="input-group-append">
                    <button style="display:none;" id="delBtn1" class="btn btn-outline-secondary modal-btn" type="button">Delete
                    </button>
                  </div>
                </div>
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary modal-btn" data-dismiss="modal">Close</button>
              <button id="addTeamMemberBtn" type="button" class="btn btn-primary modal-btn-submit">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- add team member Modal ends-->

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
      $(document).ready(function() {
        let memberCount = 4;
        let teamId = $('#deleteTeam').val();
        $("#filesContainer").load("./server/loadTeamMembers.php", {
          memberCount: memberCount,
          teamId: teamId
        });
        $(".view-more-btn").click(function() {
          memberCount += 4;
          $("#filesContainer").load("./server/loadTeamMembers.php", {
            memberCount: memberCount,
            teamId: teamId
          });
        });
      });
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

      $(document).ready(function() {
        $('#inviteMember').click(function() {
          $('#inviteTeamMemberModal').modal('show');
          var teamId = $('#inviteMember').val();

          //invite team member
          $('#inviteBtn').click(function() {
            let inviteMember = $('#invite-member').val();
            let inviteMemberArr = [];
            let inviteMemberCount = document.querySelector('#invite-count').value;
            if (inviteMemberCount > 0) {
              for (let j = 1; j <= inviteMemberCount; j++) {
                inviteMemberArr.push($('#invite-member' + j).val());
              }
            }
            if (teamName == '') {
              alert('Please fill all the fields');
            } else {
              $.ajax({
                url: './server/inviteTeamMember.php',
                type: 'POST',
                data: {
                  inviteMemberArr: inviteMemberArr
                },
                success: function(response) {
                  if (response == 'success') {
                    $('#inviteTeamMemberModal').modal('hide');
                    location.reload();
                  } else {
                    alert(response);
                  }
                }
              });
            }
          });

        });
        $('#addMember').click(function() {
          $('#addTeamMemberModal').modal('show');
          var teamId = $('#inviteMember').val();

          //add new team member
          $('#addTeamMemberBtn').click(function() {
            let teamMember = $('#team-member').val();
            let teamMemberArr = [];
            let teamMemberCount = document.querySelector("#member-count").value;
            console.log(teamMemberCount);

            if (teamMemberCount > 0) {
              for (let i = 1; i <= teamMemberCount; i++) {
                teamMemberArr.push($('#team-member' + i).val());
              }
            }
            console.log(teamMemberArr);
            if (teamMemberArr[0] == null) {
              alert('Please fill all the fields');
            } else {
              $.ajax({
                url: './server/addTeamMember.php',
                type: 'POST',
                data: {
                  team_id: teamId,
                  teamMemberArr: teamMemberArr,
                },
                success: function(response) {
                  if (response == 'success') {
                    $('#addTeamMemberModal').modal('hide');
                    location.reload();
                  } else {
                    alert(response);
                  }
                }
              });
            }

          });

        });


        const addBtn2 = document.getElementById("addBtn2");
        let k = 1;
        let l = 1;
        let original2 = document.getElementById("duplicater2");
        addBtn2.addEventListener("click", function() {
          let clone2 = original2.cloneNode(true); // "deep" clone
          clone2.id = "duplicater2" + ++k;
          clone2.querySelector("#invite-member1").id = "invite-member" + ++l;
          // or clone.id = ""; if the divs don't need an ID
          original2.parentNode.appendChild(clone2);
          clone2.querySelector("#addBtn2").style.display = "none";
          clone2.querySelector("#delBtn2").style.display = "block";
          clone2.querySelector("#delBtn2").addEventListener("click", function() {
            k--;
            l--;
            original2.parentNode.removeChild(clone2);
          });
          document.querySelector("#invite-count").value = l;
        });

      });
    </script>
  </body>

  </html>
<?php
}
?>