<?php
    use PHPMailer\PHPMailer\PHPMailer;
    
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->CharSet="UTF-8";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPDebug = 0;
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '465';
	$mail->isHTML();
	$mail->Username = 'smileychat3@gmail.com';
	$mail->Password = 'udmnxpduchat';
	$mail->SetFrom('smileychat3@gmail.com','Smiley Chat');
	$mail->Subject = 'Royal Smiley';
	$mail->Body = 'Rajkumar From 000webhost';
	$mail->AddAddress('rajkumarsr1903@gmail.com');
	
	if($mail->send())
		echo "Success";
	else
		echo "Failed";
?>