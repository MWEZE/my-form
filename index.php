<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Initialize success and failed messages
$success = '';
$failed = '';

//Create an instance; passing 'true enables exceptions
if (isset($_POST["send"])) {
  $mail = new PHPMailer(true);
  //Server settings
  $mail->isSMTP(); //Send using SMTP
  $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
  $mail->SMTPAuth = true; //Enable SMTP authentication
  $mail->Username = 'mwezelie29@gmail.com'; //SMTP write your email
  $mail->Password = 'acuxyxffdhnlbcxo'; //SMTP password
  $mail->SMTPSecure = 'ssl'; //Enable implicit SSL encryption
  $mail->Port = 465; //TCP port to connect to

  //Recipients
  $mail->setFrom('mwezelie29@gmail.com', 'Belge Websites'); //Sender's email and name
  $mail->addAddress('mwezelie29@gmail.com', 'Recipient Name'); //Add a recipient
  $mail->addReplyTo('mwezelie29@gmail.com', 'Information'); //Reply to email

  // Collect form data
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $date = $_POST['date'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $status = $_POST['status'];

  //Content
  $mail->isHTML(true); //Set email format to HTML
  $mail->Subject = 'New Contact Form Submission'; //Email subject
  $mail->Body = "
      <div style='background:rgb(171, 236, 225,.5); border-radius:20px; padding-top:0px;'>
        <h3 style=' color:rgba(255, 255, 255); padding:10px; background-color:rgba(19, 87, 64, 0.5); text-align:center; border-top-left-radius:20px; border-top-right-radius:20px; '>Contact Form Details</h3>

        <p style=' padding:20px; '> Hello You have received a message from <strong style='color:rgb(1, 66, 41);'>$firstName</strong><strong style='color:rgb(1, 66, 41);'>$lastName</strong> who is <strong style='color:rgb(1, 66, 41);'>$status</strong> and whose email is <strong>$email</strong>,
        Telephone number is <strong style='color:rgb(1, 66, 41);' >$tel</strong>  who lives on <strong style='color:rgb(1, 66, 41);'>$address</strong>,<strong style='color:rgb(1, 66, 41);'>$city</strong>.
        </p>

        <p style='text-align:center; color:rgb(136, 136, 136.7); padding:20px;'>This message was sent on <strong style='color:rgba(14, 151, 71, 1);'>$date</strong>.</p>
      </div>
    "; //HTML message body

  try {
    //success sent message alert
    $mail->send();
    $success = 'Message has been sent successfully!';
  } catch (Exception $e) {
    $failed = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <form id="contact" action="" method="post">
      <h3>Contact Details</h3>
      <h4>Contact us today, and get reply with in 24 hours!</h4>
      <div class="row">

        <div class="col">
          <fieldset>
            <input placeholder="First Name" name="firstName" type="text" tabindex="1" required autofocus>
          </fieldset>
          <fieldset>
            <input placeholder="Your Email Address" name="email" type="email" tabindex="2" required>
          </fieldset>
          <fieldset>
            <input placeholder="Your Phone Number" name="tel" type="tel" tabindex="3" required>
          </fieldset>
          <fieldset>
            <input placeholder="Date of birth" type="text" onfocus="(this.type='date')" name="date" tabindex="4" required>
          </fieldset>
          <fieldset>
            <input type="text" name="city" placeholder="City/State Name" tabindex="5" required>
          </fieldset>
        </div>

        <div class="col">
          <fieldset>
            <input type="text" placeholder="Last Name" name="lastName" tabindex="1" required autofocus>
          </fieldset>
          <fieldset>
            <input type="text" name="address" placeholder="Home Address" tabindex="5" required>
          </fieldset>
          <fieldset>
            <p>What is your employment status?</p>
            <div class="radio">
              <input type="radio" id="job" name="status" value="Employed">
              <label for="job">Employed</label>
            </div>
            <div class="radio">
              <input type="radio" id="business" name="status" value="business">
              <label for="business">Business</label>
            </div>
            <div class="radio">
              <input type="radio" id="student" name="status" value="student">
              <label for="student">Student</label>
            </div>
          </fieldset>

          <!--  <fieldset>
            <label for="file">Upload</label>
            <input type="file" id="file" name="file">
          </fieldset> -->
        </div>
      </div>

      <!-- Error display -->
      <div>
        <p class="success"> <?php echo $success;  ?> </p>
        <p class="failed"> <?php echo $failed;  ?> </p>
      </div>

      <fieldset>
        <button type="submit" name="send" id="contact-submit" data-submit="...Sending">Submit Now</button>
      </fieldset>
    </form>
  </div>
</body>


</html>