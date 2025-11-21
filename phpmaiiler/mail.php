<?php
//Import PHPMailer classes into the global namespace 
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php'; 
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create an instance; passing 'true enables exceptions
if (isset($_POST["send" ])) {

    $mail = new PHPMailer (true);
    //Server settings
    $mail ->isSMTP(); //Send using SMTP
    $mail ->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail ->SMTPAuth = true; //Enable SMTP authentication
    $mail ->Username = 'mwezelie29@gmail.com'; //SMTP write your email
    $mail ->Password = 'acuxyxffdhnlbcxo'; //SMTP password
    $mail ->SMTPSecure = 'ssl'; //Enable implicit SSL encryption
    $mail ->Port = 465; //TCP port to connect to

    //Recipients
    $mail ->setFrom('your email address', 'Mailer'); //Sender's email and name
    $mail ->addAddress('recipient email address', 'Recipient Name'); //Add a recipient
    $mail ->addReplyTo('your email address', 'Information'); //Reply to email
    //Content
    $mail ->isHTML(true); //Set email format to HTML
    $mail ->Subject = 'Here is the subject'; //Email subject
    $mail ->Body = 'This is the HTML message body <b>in bold!</b>'; //HTML message body
   
    //success sent mesaage alert
    $mail ->send();
    echo
"
    <script>
        alert('Message has been sent');
        document.location.href = 'index.php';
        </script>
    ";
}