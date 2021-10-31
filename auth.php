<?php
    include "./include/dbconnect.php";
    //user login
    //default user id
    //admin status 2
    //user status 1
    //deactivated 0
    //subadmin status 3-7
    if(isset($_POST['submitButon']))
    {
        extract($_POST);
        $selectUser="SELECT * FROM `tbl_user` WHERE email='$email' and user_status!=0";
        $userFetchResult=mysqli_query($connect,$selectUser);
        if(mysqli_num_rows($userFetchResult)>0)
        {
            $userRow=mysqli_fetch_assoc($userFetchResult);
            if($userRow['password']==$password)
            {
                if($userRow['user_status']==2)
                {
                    echo "Admin Login";
                }
                else
                {
                    echo "User Logined";
                }
               
            }
            else
            {
                echo "password incorrect";
            }
         
        }
        else
        {
            echo "user not found";
        }
        
        
    }
    //user register
    if(isset($_POST['userregister']))
    {
        extract($_POST);
        $full_name=$name;
        $today = date('d-m-y'); 
        if($cpassword==$password)
        {
            $insertUser="INSERT INTO `tbl_user`(`username`, `mob`, `email`, `password`, `user_created_at`) VALUES ('$name','$mob','$email',$password,'$today')";
            if(mysqli_query($connect,$insertUser))
            {
                echo "user inserted";
            }
            else{
                echo "some error occured";
            }

        }
        else{
            echo "password mismatch";
        }
        
    }
   