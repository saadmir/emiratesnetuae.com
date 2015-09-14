<html>
<head><title>PHP Mail Sender</title></head>
<body>
<?php

/* All form fields are automatically passed to the PHP script through the array $HTTP_POST_VARS. */
$email = 'info@emiratesnetuae.com ';
$subject = "EmiratesNet Inquiry from Website!";
$message = $HTTP_POST_VARS['message'];
//$headers = $HTTP_POST_VARS['email'];
$personemail = $HTTP_POST_VARS['email'];
$person = $HTTP_POST_VARS['person'];
$headers = "From: info@emiratesnetuae.com \r\n" .
   "Reply-To: $sender\r\n" .
   'X-Mailer: PHP/' . phpversion();
ini_set ( sendmail_from, "info@emiratesnetuae.com ");
ini_set ( smtp, 'localhost' );

$message = "Contact Person : $person \nEmail : $personemail \n\nMessage :\n$message";

if (!preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $email)) {
  echo "<h4>Invalid email address</h4>";
  echo "<a href='javascript:history.back(1);'>Back</a>";
} elseif ($subject == "") {
  echo "<h4>No subject</h4>";
  echo "<a href='javascript:history.back(1);'>Back</a>";
}

//elseif (mail($email,$subject,$message,$headers,$person)) {
elseif (mail ( $email, $subject, $message, $headers)) {
  echo "<h4>Your request has submitted successfuly! Our person will contact you soon thanks and regards EmiratesNet's Team</h4>";
} else {
  echo "<h5>Can't send email to $email</h5>";
}
?>
</body>
</html> 
