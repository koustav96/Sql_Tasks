<?php

// Import PHPMailer classes into the global namespace.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

/**
 * This function is used to send email to given recipient with given subject
 *  and message.
 *
 * @param  string $recipientEmail
 *  Recipient's email address.
 * @param  string $recipientName
 *  Recipient's name.
 * @param  string $subject
 *  Email subject.
 * @param  string $message
 *  Main message to send in email.
 *
 * @return void
 */
function send_email (string $recipientEmail, string $token_hash): void {
  require "cred.php";
  $mail = new PHPMailer(true);
  try {
    // Setting up server settings.
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = $senderEmail;
    $mail->Password = $senderPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($senderEmail);
    $mail->addAddress($recipientEmail);

    $mail->isHTML(true);
    $mail->Subject = 'Reset Password';

    $mail->Body =  "Click <a href='http://example.com/SQL/Php-Sql/new_password.php?token=$token_hash'>here</a> to reset your password.";

    $mail->send();
    ?>
    <script type='text/javascript'> alert ('Reset link is sent to your mailid !!')</script>
    <?php
  } 
  catch (Exception $e) {
    ?>
    <script type='text/javascript'> alert ('Mail could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>
    <?php
  }
}

function send_otp (string $recipientEmail, string $otp): void {
  require "cred.php";
  $mail = new PHPMailer(true);
  try {
    // Setting up server settings.
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = $senderEmail;
    $mail->Password = $senderPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($senderEmail);
    $mail->addAddress($recipientEmail);

    $mail->isHTML(true);
    $mail->Subject = 'Validate OTP';

    $mail->Body =  "Your OTP is $otp.";

    $mail->send();
  } 
  catch (Exception $e) {
    ?>
    <script type='text/javascript'> alert ('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>
    <?php
  }
}