<?php
    require 'connection_db.php';

    if(isset($_POST['register'])){
        $is_veri = 0;
        $is_sub = 0;
        $query_register  = "INSERT INTO `visitors_email` (email,is_verified,is_subscribed) VALUES ('".$_POST['email']."','".$is_veri."','".$is_sub."')";

        if($email_registerd = mysqli_query($con,$query_register))
        {
            $email = $_POST['email'];
            $msg = "<html><head></head><body>";
            $msg .= "<a href='https://procit.ictmu.in/hit_rtCamp_xkcd/php_controllers/verify_email.php?email=".$email."'><h1>Verify Email</h1></a>";
            $msg.= "</body></html>";
            $subject_mail = "Verify Email - XKCD Images";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $to = $email;
            // More headers
            $headers .= 'From: <noreply@XKCD.in>' . "\r\n";
            if(!mail($to,$subject_mail,$msg,$headers)){
                echo "<script>alert('Email Failed')</script>";
            }
            echo "<script type='text/javascript'>
                        window.location.replace(\"../html_page/verification_page.php\");
                    </script>
                ";
            
        }
        else{
            echo "Email Already Registerd";
        }
    }
?>