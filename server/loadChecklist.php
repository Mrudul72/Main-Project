<?php
function loadChecklist($stat,$checkedStat){
    include '../config/connect.php';
    $taskId = $_SESSION['curTaskId'];
    $checkBoxVisibility = ($_SESSION['currentUserTypeId'] == '2') ? 'display:none;' : '';
    $sql = "SELECT checklist_id,checklist_title FROM tbl_checklist WHERE task_id = '$taskId' AND status = '$stat'";
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result)>0){
        $i=1;
        while($row = mysqli_fetch_assoc($result)){
            $checklistId = $row['checklist_id'];
            $checklistTitle = $row['checklist_title'];
            
            echo '
            <li id="checklist-item'.$i.'" class="checklist-items">
                <div id="checkParent">
                    <input class="styled-checkbox" type="checkbox" '.$checkedStat.' value="'.$checklistId.'"/>
                    <label for="styled-checkbox" style="'.$checkBoxVisibility.'"></label>
                </div>
                <div id="checkSibling" class="checklist-item-title">'.$checklistTitle.'</div>
            </li>
            ';
            $i++;
        }
    }else{
        echo '<p id="noItem" class="no-comment ml-3">No items</p>';
    }
}

?>