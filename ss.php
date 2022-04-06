<?php
                        include './config/connect.php';
                        session_start();
                        $user_id = $_SESSION['userId'];
                        //get all users except current user
                        $sqlNew = "SELECT user_id,username,profile_pic FROM tbl_user WHERE user_id != $user_id";
                        echo $sqlNew;
                        $resultNew = mysqli_query($connect, $sqlNew);
                        if (mysqli_num_rows($resultNew) > 0) {
                            while ($row = mysqli_fetch_assoc($resultNew)) {
                                $user_id = $row['user_id'];
                                $username = $row['username'];
                                $profile_pic = $row['profile_pic'];
                                echo '

                                <a class="rounded-card" id="'.$user_id.'">
                                    <div class="media"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                                        <div class="media-body ml-4">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="mb-0" id="uname">'.$username.'</h6>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </a>
                                
                                ';
                            }
                        }

                        ?>