<?php
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");
function email($ubody){
	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->isSMTP();
	$mail->CharSet="UTF-8";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPDebug = 1;
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '465';
	$mail->isHTML();
	$mail->Username = 'udmnxpdu.tk@gmail.com';
	$mail->Password = 'Udmnxpdu@tk9';
	$mail->SetFrom('udmnxpdu.tk@gmail.com');
	$mail->Subject = 'Farmer Gateway';
	$mail->Body = $ubody;
	$mail->AddAddress('saravana311ktk@gmail.com');
	
	if($mail->send())
		return true;
	else
		return false;
}

?>
