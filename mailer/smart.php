<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'aleksandrin-aleksandrin@mail.ru';                 // Наш логин
$mail->Password = 'ZPppftZuA22&';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('akazimirov@tut.by', 'Оборудование для производства пеллет');   // От кого письмо 
$mail->addAddress('akazimirov@tut.by');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Данные пользователя';
$mail->Body    = '
		Пользователь сделал запрос на обратный звонок <br> 
	Имя: ' . $name . ' <br>
	Номер телефона: ' . $phone . ' <br>
	E-mail: ' . $mail . ' <br>
	Комментарий к заказу: ' . $descr;
	
header("Location: http://aleksandrin");
	
	
if(!$mail->send()) {
    return false;
} else {
    return true;
    
};

// header('Location: https://mpservice.by/']);
// header(" Location: http://mpservice.by//index.html ");

?>