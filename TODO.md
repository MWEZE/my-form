# TODO List for Fixing Contact Form 404 Error

- [x] Add PHP logic at the top of index.php to handle form submission when $\_POST["send"] is set
- [x] Include PHPMailer requires (Exception.php, PHPMailer.php, SMTP.php) in index.php
- [x] Set up PHPMailer instance with SMTP settings (Gmail SMTP)
- [x] Change form button name from "submit" to "send" in index.php
- [x] Collect form data (firstName, lastName, email, tel, date, city, address, status) and format into dynamic HTML email body
- [x] Set email recipients, subject, and body using form data
- [x] Execute mail->send() and set $success or $failed variables based on result
- [x] Test the form submission to ensure email sends and no 404 error occurs
