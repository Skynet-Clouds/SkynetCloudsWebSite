<?php
if(!isset($_POST['submit'])){
	echo "Direct access not allowed!";
	exit;
}
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$messagetxt = $_POST['message'];


$message = "
<html>
<head>
<title>Contact US</title>
</head>
<body>
<p>Contact US</p>
<table>
<tr>
<th style='border: 1px solid #ccc;background-color: #999;'>Name</th><td style='border: 1px solid #ccc;'>$name</td>
</tr>
<tr>
<th style='border: 1px solid #ccc;background-color: #999;'>Email</th><td style='border: 1px solid #ccc;'>$email</td>
</tr>
<tr>
<th style='border: 1px solid #ccc;background-color: #999;'>Message</th><td style='border: 1px solid #ccc;'>$messagetxt</td>
</tr>

</table>
</body>
</html>
";
try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'devops@skynetclouds.com';                     // SMTP username
    $mail->Password   = 'MoonSun@Ocean@2020';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('noreply@skynetclouds.com', 'Enquiry - Website');
    $mail->addAddress('shivin@skynetclouds.com', 'Shivin');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contact Us';
    $mail->Body    = $message ;

    $mail->send();
    echo 'Message has been sent';
	header("Location:/");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
