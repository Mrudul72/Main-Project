<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
if (isset($_POST['dwnldReport'])) {
    $projectId = $_POST['dwnldReport'];
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->shrink_tables_to_fit = 1;
    // Buffer the following html with PHP so we can store it to a variable later
    ob_start();

    // This is where your script would normally output the HTML using echo or print
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
    if ($project_priority == '1') {
        $project_priority = 'Low';
    } else if ($project_priority == '2') {
        $project_priority = 'Medium';
    } else if ($project_priority == '3') {
        $project_priority = 'High';
    }


    echo '
<style>

   .invoice-company {
      font-size: 20px
   }

   .invoice-header {
      margin: 0 -20px;
      background: #f0f3f4;
      padding: 20px
      display : flex;
        justify-content: space-evenly;
        align-items: center;
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
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <div class="invoice-company text-inverse f-w-600">
            Project Report
         </div>
         <div class="invoice-header">
            <div class="invoice-from">
               <small>Project Details</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">' . $project_name . '</strong><br>
                  Start date: ' . $project_start_date . '<br>
                  End date: ' . $project_end_date . '<br>
                  Priority: ' . $project_priority . '
               </address>
            </div>

            <div class="invoice-date">
               <small>Project Manager</small>
               <div class="date text-inverse m-t-5">' . $manager_name . '</div>
               <div class="invoice-detail">
               ' . $manager_email . '<br>
               ' . $manager_mob . '
               </div>
            </div>
         </div>
         <div class="invoice-content">
            <h5>Task Allocated</h5>
            <div class="table-responsive">
               <table class="table table-invoice" autosize="1">
                  <thead>
                     <tr>
                        <th>TASK DESCRIPTION</th>
                        <th class="text-center" width="10%">Status</th>
                        <th class="text-center" width="20%">Team</th>
                        <th class="text-right" width="10%">Checklist Progress</th>
                     </tr>
                  </thead>
                  <tbody>
';
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
        if ($row2['progress'] == -1) {
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
                        <td class="text-center">'.$team_title.'</td>
                        <td class="text-right">' . $progres . '</td>
                     </tr>
                     ';
    }
echo '
    </tbody>
    </table>
    </div>
';


    echo '
         <div class="invoice-footer">
            
            <center>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> easeit.com</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> easeitinfo@gmail.com</span>
            </center>
         </div>
      </div>
   </div>
</div>
    
    ';

    // Now collect the output buffer into a variable
    $tableMinSizePriority = true;
    $html = ob_get_contents();
    ob_end_clean();
    // send the captured HTML from the output buffer to the mPDF class for processing
    $mpdf->WriteHTML($html);
    $mpdf->Output('projectReport.pdf','D');
}
