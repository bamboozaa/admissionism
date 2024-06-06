<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Insert Enquiry</title>
  </head>
  <body>
    <?php
    require './inc/connect.inc.php';
    require './inc/function.inc.php';
    require './PHPMailer/PHPMailerAutoload.php';

    foreach($_POST as $key => $val) {
      ${$key}=$val;
    }

    $created_at = date("Y-m-d H:i:s");

    $data = array(
      "name" => "$name",
      "nationality" => "$nationality",
      "program_interested" => "$program_interested",
      "entry_semester" => "$entry_semester",
      "current_education" => "$current_education",
      "school_name" => "$school_name",
      "email" => "$email",
      "phone" => "$full_number",
      "direct_message" => "$direct_message",
      "where_did_you_hear" => "$where_did_you_hear",
      "created_at" => "$created_at",
    );
    insert(TBL_ENQ, $data);

    $message = loadTemplate("enquiry_email.phtml", $data);

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
//'echo' Output plain-text as-is, appropriate for CLI
//'html' Output escaped, line breaks converted to <br>, appropriate for browser output
//'error_log' Output to error log as configured in php.ini
$mail->Debugoutput = 'error_log';
//Set the hostname of the mail server
$mail->Host = "smtp.office365.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = SMTP_USER;
//Password to use for SMTP authentication
$mail->Password = SMTP_PASS;
//Set who the message is to be sent from
$mail->setFrom(SMTP_USER, SMTP_NAME);
//Set an alternative reply-to address
$mail->addReplyTo('komsan_aia@utcc.ac.th', 'Komsan Aiamthanang');
//Set who the message is to be sent to
$mail->addAddress('ism@utcc.ac.th', 'International School of Management');
//Set the subject line
$mail->Subject = 'UTCC INTERNATIONAL ENQUIRY FORM';
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
    //echo "Message sent!";
}
    ?>
    <script>
    swal({
      title: "Thank you!",
      text: "We will get back to you soon!",
      icon: "success",
    }).then(function() {
      window.location = "http://admissionism.utcc.ac.th/enquiry.html";
    });
    </script>
  </body>
</html>
