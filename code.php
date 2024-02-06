<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();

if (isset($_POST['contactBtn'])) {
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $services = $_POST['services'];
    $message = $_POST['message'];
    
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dilsher.dahri10@gmail.com';
        $mail->Password   = 'qxmfyzsklzqmwzmk';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('maximizeinsights@gmail.com', 'Maximize Insights');
        $mail->addAddress("$email", "$fname $lname");
        
        $ccEmail = 'haroon20@gmail.com';
        $ccName = 'Haroon';
        $mail->addCC($ccEmail, $ccName);

        $mail->isHTML(true);
        $mail->Subject = 'Contact Form';
        $mail->Body = "
        <table class='table' style='text-align:left;'>
  <tbody>
    <tr>
      <th scope='row' style='padding:10px 60px 10px 0;'>First Name:</th>
      <td>" . $fname . "</td>
    </tr>
    <tr>
      <th scope='row' style='padding:10px 60px 10px 0;'>Last Name:</th>
      <td>" . $lname . "</td>
    </tr>
    <tr>
      <th scope='row' style='padding:10px 60px 10px 0;'>Email:</th>
      <td>" . $email . "</td>
    </tr>
    <tr>
      <th scope='row' style='padding:10px 60px 10px 0;'>Phone:</th>
      <td>" . $phone . "</td>
    </tr>
    <tr>
      <th scope='row' style='padding:10px 60px 10px 0;'>Service:</th>
      <td>" . $services . "</td>
    </tr>
    <tr>
      <th scope='row' style='padding:10px 60px 10px 0;'>Message:</th>
      <td>" . $message . "</td>
    </tr>
  </tbody>
        </table>
        ";
        $mail->IsHTML(true);
       
        $mail->send();
        $_SESSION['status'] = 'Email sent successfully!';
        header('location:index.php');
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
}

?>
