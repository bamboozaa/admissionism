<?php
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Asia/Bangkok');

require '../PHPMailerAutoload.php';

function loadTemplate($template, array $properties = array()){
    $output = "";

    if (file_exists($template)) {
        extract($properties);

        ob_start();

        require($template);

        $output = ob_get_contents();

        ob_end_clean();
    }

    return $output;
}

$data = [
    "email" => "komsan_aia@utcc.ac.th"
];

$message = loadTemplate("contents.phtml", $data);

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.office365.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "komsan_aia@utcc.ac.th";
//Password to use for SMTP authentication
$mail->Password = "423244055";
//Set who the message is to be sent from
$mail->setFrom('komsan_aia@utcc.ac.th', 'Komsan Aiamthanang');
//Set an alternative reply-to address
//$mail->addReplyTo('komsan_aia@utcc.ac.th', 'Komsan Aiamthanang');
//Set who the message is to be sent to
$mail->addAddress('komsan_aia@utcc.ac.th', 'Komsan Aiamthanang');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
