<?php
    require 'procit.ictmu.in/hit_rtCamp_xkcd/php_controllers/connection_db.php';
    $random_number = rand(1,2450);
    $url_from_xkcd = "https://xkcd.com/".$random_number."/info.0.json";
    $json_data_from_url = file_get_contents($url_from_xkcd);
    $json_data_decoded = json_decode($json_data_from_url, true);

    $url_of_image= $json_data_decoded['img']; 
    $img_path = 'procit.ictmu.in/hit_rtCamp_xkcd/xkcd_images.png'; 

    // Function to write image into file
    file_put_contents($img_path, file_get_contents($url_of_image));

    echo "File has Been downloaded and being stored into directory";
    // Recipient 
    // Sender 
    $fromName = 'XKCD-Challenge'; 
     
    // Email subject 
    $subject = 'New XKCD Image';  
    echo $url_of_image;
     
    // Attachment file 
    $image_file = "procit.ictmu.in/hit_rtCamp_xkcd/xkcd_images.png"; 
    
    $send_email_query = "SELECT * FROM `visitors_email` WHERE is_subscribed='1' and is_verified='1' ";

    $query_result = mysqli_query($con,$send_email_query);
    while($rows =  mysqli_fetch_array($query_result)){
    
        $to = $rows['email'];
     
    // Email body content 
        $htmlContent = " <html><head></head><body>
            <h3>Enjoy the Comics Images of the XKCD!!</h3>
            <img src=".$url_of_image.">
            <a href='https://procit.ictmu.in/hit_rtCamp_xkcd/php_controllers/unsubscribe.php?email=".$to."'><h5>Unsubscribe From XKCD</h5></a>
            </body></html>
        "; 
         
        // Header for sender info 
        $headers = "From: ".$fromName; 
         
        // Boundary  
        $semi_rand = md5(time());  
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
         
        // Headers for attachment  
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
         
        // Multipart boundary  
        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
        "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
         
        // Preparing attachment 
        if(!empty($image_file) > 0){ 
            if(file_exists($image_file)){ 
                $message .= "--{$mime_boundary}\n"; 
                $fp =    @fopen($image_file,"rb"); 
                $data =  @fread($fp,filesize($image_file)); 
         
                @fclose($fp); 
                $data = chunk_split(base64_encode($data)); 
                $message .= "Content-Type: application/octet-stream; name=\"".basename($image_file)."\"\n" .  
                "Content-Description: ".basename($image_file)."\n" . 
                "Content-Disposition: attachment;\n" . " filename=\"".basename($image_file)."\"; size=".filesize($image_file).";\n" .  
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
            }else{
                echo "Error ";
            } 
        }else{
            echo "Error";
        } 
        $message .= "--{$mime_boundary}--"; 
        //$returnpath = "-f" . $from; 
         
        // Send email 
        $mail_send = @mail($to, $subject, $message, $headers);  
         
        // Email sending status 
        if($mail_send){
            echo "<h1>sended SuccesFully<br>".$to."</h1>";
        }
        else{
            echo "<h1>Error In sending</h1>";
        }
    }
?>