<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'lib/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$email = $_POST['email'];
$select = $pdo->query("SELECT email,senha from cadastro_cliente WHERE email = '$email'");
$sel = $select->fetch();
if ($sel != null) {
    $senha = $sel['senha'];
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->CharSet = 'UTF-8';                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sistemadegereciamentos@gmail.com';                     //SMTP username
        $mail->Password   = 'sistemasge2022';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 597;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('sistemadegereciamentos@gmail.com', 'Suporte');
        $mail->addAddress($email);

        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Recupera senha';
        $mail->Body    = "<p>Olá essa mensagem é automatica do sistema, para recuperação de sua senha.</p> <p>A sua senha é <b>$senha</b>, recomendamos que altere a senha, em alterar perfil.</p>";
        $mail->AltBody = "Olá essa mensagem é automatica do sistema, para recuperação de sua senha. \n A sua senha é '$senha', recomendamos que altere a senha, em alterar perfil.";

        $mail->send();
        echo "<script>alert('Email enviado!')</script>";
        echo "<script>window.location.href='../login.php'</script>";
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "<script>alert('O email não pode ser enviado!')</script>";
        echo "<script>window.location.href='../login.php'</script>";
    }
} else {
    echo "<script>alert('Email não cadastrado!')</script>";
    echo "<script>window.location.href='../esquece.php'</script>";
}
