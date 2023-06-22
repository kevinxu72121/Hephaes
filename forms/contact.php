<?php
  $name =$_POST["name"];
  $email =$_POST["email"];
  $subject =$_POST["subject"];
  $message =$_POST["message"];

  use PHPMailer\PHPMailer\src\PHPMailer;
  use PHPMailer\PHPMailer\src\SMTP;
  use PHPMailer\PHPMailer\src\Exception;

  require 'vendor/autoload.php';

  $mail = new PHPMailer(true);

  try{
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "Info@hephaes.ca";
    $mail->Password = "Ricco03032004!";

    $mail->setFrom($email,$name);
    $mail->addAddress("Info@hephaes.ca");
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();
    echo "Email sent";
  }
  catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
?>
