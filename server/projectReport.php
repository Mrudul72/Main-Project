<?php
session_start();
?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
   body {
      margin-top: 20px;
      background: #eee;
   }

   .invoice {
      background: #fff;
      padding: 20px
   }

   .invoice-company {
      font-size: 20px
   }

   .invoice-header {
      margin: 0 -20px;
      background: #f0f3f4;
      padding: 20px
   }

   .invoice-date,
   .invoice-from,
   .invoice-to {
      display: table-cell;
      width: 1%
   }

   .invoice-from,
   .invoice-to {
      padding-right: 20px
   }

   .invoice-date .date,
   .invoice-from strong,
   .invoice-to strong {
      font-size: 16px;
      font-weight: 600
   }

   .invoice-date {
      text-align: right;
      padding-left: 20px
   }

   .invoice-price {
      background: #f0f3f4;
      display: table;
      width: 100%
   }

   .invoice-price .invoice-price-left,
   .invoice-price .invoice-price-right {
      display: table-cell;
      padding: 20px;
      font-size: 20px;
      font-weight: 600;
      width: 75%;
      position: relative;
      vertical-align: middle
   }

   .invoice-price .invoice-price-left .sub-price {
      display: table-cell;
      vertical-align: middle;
      padding: 0 20px
   }

   .invoice-price small {
      font-size: 12px;
      font-weight: 400;
      display: block
   }

   .invoice-price .invoice-price-row {
      display: table;
      float: left
   }

   .invoice-price .invoice-price-right {
      width: 25%;
      background: #2d353c;
      color: #fff;
      font-size: 28px;
      text-align: right;
      vertical-align: bottom;
      font-weight: 300
   }

   .invoice-price .invoice-price-right small {
      display: block;
      opacity: .6;
      position: absolute;
      top: 10px;
      left: 10px;
      font-size: 12px
   }

   .invoice-footer {
      border-top: 1px solid #ddd;
      padding-top: 10px;
      font-size: 10px
   }

   .invoice-note {
      color: #999;
      margin-top: 80px;
      font-size: 85%
   }

   .invoice>div:not(.invoice-footer) {
      margin-bottom: 20px
   }

   .btn.btn-white,
   .btn.btn-white.disabled,
   .btn.btn-white.disabled:focus,
   .btn.btn-white.disabled:hover,
   .btn.btn-white[disabled],
   .btn.btn-white[disabled]:focus,
   .btn.btn-white[disabled]:hover {
      color: #2d353c;
      background: #fff;
      border-color: #d9dfe3;
   }
</style>
<?php
include('../config/connect.php');
//select project details
$project_id = $_SESSION['projectID'];
$currentUserId = $_SESSION['userId'];
//select user details
$user_query = "SELECT username,email,mob FROM tbl_user WHERE user_id = '$currentUserId'";
$user_result = mysqli_query($connect, $user_query);
$user_row = mysqli_fetch_array($user_result);
$manager_name = $user_row['username'];
$manager_email = $user_row['email'];
$manager_mob = $user_row['mob'];
//select project details
$sql = "SELECT * FROM tbl_project WHERE project_id= $project_id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['project_name'] = $row['project_name'];
$project_name = $_SESSION['project_name'];
$project_description = $row['project_description'];
$project_start_date = $row['project_start_date'];
$project_end_date = $row['project_end_date'];
$project_status = $row['project_status'];
$projectStatText = ($project_status == '1') ? 'Close Project' : 'Reopen Project';
$project_priority = $row['project_priority'];
if($project_priority == '1'){
   $project_priority = 'Low';
}else if($project_priority == '2'){
   $project_priority = 'Medium';
}else if($project_priority == '3'){
   $project_priority = 'High';
}




?>
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <!-- <span class="pull-right hidden-print">
            <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span> -->
            Project Report
         </div>
         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="invoice-from">
               <small>Project Details</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse"><?php echo $project_name;?></strong><br>
                  Start date: <?php echo $project_start_date;?><br>
                  End date: <?php echo $project_end_date;?><br>
                  Priority: <?php echo $project_priority;?>
               </address>
            </div>

            <div class="invoice-date">
               <small>Project Manager</small>
               <div class="date text-inverse m-t-5"><?php echo $manager_name;?></div>
               <div class="invoice-detail">
               <?php echo $manager_email;?><br>
               <?php echo $manager_mob;?>
               </div>
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <h5>Task Allocated</h5>
            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>TASK DESCRIPTION</th>
                        <th class="text-center" width="10%">Status</th>
                        <th class="text-center" width="20%">Team</th>
                        <th class="text-right" width="10%">Checklist Progress</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     //select task details
                     $sql2 = "SELECT `task_title`, `task_description`, `team_id`, `task_status`, `project_id`, `progress`  FROM tbl_tasks WHERE project_id= $project_id";
                     $result2 = mysqli_query($connect, $sql2);
                     while ($row2 = mysqli_fetch_assoc($result2)) {
                        $team_id = $row2['team_id'];
                        $sql3 = "SELECT `team_title` FROM tbl_teams WHERE team_id= $team_id";
                        $result3 = mysqli_query($connect, $sql3);
                        $row3 = mysqli_fetch_assoc($result3);
                        $team_title = $row3['team_title'];
                        $task_name = $row2['task_title'];
                        $task_description = $row2['task_description'];
                        $task_status = $row2['task_status'];
                        $progres = $row2['progress'] . "%";
                        if($row2['progress'] == -1){
                           $progres = "No Checklist";
                        }
                        if ($task_status == '1') {
                           $task_status_text = "Backlog";
                        } else if ($task_status == '2') {
                           $task_status_text = "In Progress";
                        } else if ($task_status == '3') {
                           $task_status_text = "Testing";
                        } else if ($task_status == '4') {
                           $task_status_text = "Completed";
                        }
                        echo '
                     <tr>
                        <td>
                           <span class="text-inverse">' . $task_name . '</span><br>
                           <small>' . $task_description . '</small>
                        </td>
                        <td class="text-center">' . $task_status_text . '</td>
                        <td class="text-center">50</td>
                        <td class="text-right">' . $progres . '</td>
                     </tr>
                     ';
                     }
                     ?>
                  </tbody>
               </table>
            </div>
            <?php
            $selectTeam = "SELECT `team_id`, `team_title` FROM `tbl_teams` WHERE `team_id` IN (SELECT team_id FROM tbl_team_allocation WHERE project_id= $project_id);";
            $resultTeam = mysqli_query($connect, $selectTeam);
            while($rowTeam = mysqli_fetch_assoc($resultTeam)){
               $team_title = $rowTeam['team_title'];
               $team_id = $rowTeam['team_id'];
               echo '<h5>'.$team_title.'</h4>';
            $sql4 ="SELECT * from tbl_user where user_id in(SELECT user_id from tbl_team_members WHERE team_id = $team_id)";
            $result4 = mysqli_query($connect, $sql4);
            while($row4 = mysqli_fetch_assoc($result4)){
               $user_id = $row4['user_id'];
               $user_name = $row4['username'];
               $user_email = $row4['email'];
               $user_phone = $row4['mob'];
               $user_role = $row4['type_id'];
               //select user role
               $sql5 = "SELECT `role_name` FROM tbl_user_role WHERE role_id= $user_role";
               $result5 = mysqli_query($connect, $sql5);
               $row5 = mysqli_fetch_assoc($result5);
               $user_role_name = $row5['role_name'];
               echo '
               <div class="invoice-content">
                  <div class="table-responsive">
                     <table class="table table-invoice">
                        <thead>
                           <tr>
                              <th>Team Member</th>
                              <th class="text-center" width="20%">Email ID</th>
                              <th class="text-right" width="20%">Mobile</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <span class="text-inverse">' . $user_name . '</span><br>
                                 <small>' . $user_role_name . '</small>
                              </td>
                              <td class="text-center">' . $user_email . '</td>
                              <td class="text-center">' . $user_phone . '</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               ';
            }
         }
            
            ?>
         <!-- end invoice-note -->
         <!-- begin invoice-footer -->
         <div class="invoice-footer">

            <p class="text-center">
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> easeit.com</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> easeitinfo@gmail.com</span>
            </p>
         </div>
         <!-- end invoice-footer -->
      </div>
   </div>
</div>