<?php
 require_once "mail2.php";
 
 $from = "donotreply@hostalign.com";
 $to = "shivin@skynetclouds.com";
 $subject = "Contact Us";
# $body = $_POST['message'];

$message = "
<html>
<head>
<title>Contact US</title>
</head>
<body>
<p>Contact US</p>
<table>
<tr>
<th>Name</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

 
 $host = "ssl://hostalign.com";
 $port = "465";
 $username = "donotreply@hostalign.com";
 $password = "Pfg~cN%}^$$~";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
 ?>
