<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once '../PHPMailer/Exception.php';
require_once '../PHPMailer/PHPMailer.php';
require_once '../PHPMailer/SMTP.php';

 $mail = new PHPMailer(true);

$alert = '';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $subject = $_POST['subject'];
  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'congdoan27121999@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'djkqdlyokiaqfnvi'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('congdoan27121999@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('congdoan27121999@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Subject: '.$subject;
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";

    $mail->send();
    // $alert = '<div id="sendmessage">
    //              <span>Cảm ơn bạn đã gửi thư cho chúng tôi!</span>
    //             </div>';
  } catch (Exception $e){
    // $alert = '<div class="alert-error">
    //             <span>'.$e->getMessage().'</span>
    //           </div>';
  }
?>
