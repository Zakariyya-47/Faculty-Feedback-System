<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'vendor/autoload.php';

  $mailDesign =
  // coding for style and design for the email content
 "<!DOCTYPE html>
 <html>
 <head> 
 <style>
 body {background-color: powderblue;}

 .tab {
 font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; 
 border-collapse: collapse;
 width: 80%;
 }

 .tab td,.tab th {
 border: 1px solid #ddd; 
 padding: 8px;
 }

 .tab tr:nth-child(even){background-color: #f2f2f2;}

 .tab tr:hover {background-color: #ddd;}

 .tab th {
 padding-top: 12px; padding-bottom:12px;text-align: left;
 background-color: #4CAF50; color: white;
 }

 </style>
 </head>
 
 <body>
 <table class='tab'>
   <thead>
       <th>Email</th> <th>Article title</th> <th>Article type</th>
   </thead>
 <tbody>
  <tr>    
     <td>$email</td>
     <td>$article_title</td>  
     <td>$article_type</td> 
  </tr>
</tbody>
</table>

</body>
</html>
";

    
  $mail = new PHPMailer(true);
  try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'ssmtp.gmail.com';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'zakariya.zaks47@gmail.com';                 
    $mail->Password   = 'zakariyya12';                        
    $mail->SMTPSecure = 'tls';                              
    $mail->Port       = 587;  
  
    $mail->setFrom('zakariya.zaks47@gmail.com', 'FacultyFeed');           
    $mail->addAddress($staffemail);

    $mail->isHTML(true);                                  
    $mail->Subject = 'New Idea Added';
    $mail->Body    =  $mailDesign;
    $mail->send();

    echo '<script>alert("Your contribution has been uploaded succesfully")</script>';
    // header("Location:../pages/dashboard.php");
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
         

?>