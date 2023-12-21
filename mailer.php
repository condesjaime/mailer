<?php 
use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

function mailer($message,$emails,$subject){


			$developmentMode = false;
			
			$mail = new PHPMailer($developmentMode);
			try {
			 
			$mail->isSMTP();                            // Set mailer to use SMTP
			$mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'sample@gmail.com'; // Your Gmail email address
            $mail->Password   = ''; // Your app Gmail password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption
            $mail->Port       = 587; // TCP port to connect to                  // TCP port to connect to
					
			$mail->setFrom('sample@gmail.com','sample');
			foreach ($emails as $recipient) {
				$mail->addAddress($recipient);
			}
			
			$mail->isHTML(true);  // Set email format to HTML
			
			
			$bodyContent ="<!DOCTYPE html>";
			$bodyContent .="<html>";
			$bodyContent .="<head>";
			$bodyContent .="<meta charset='utf-8'>";
			$bodyContent .="</head>";
			$bodyContent .="<body>";
			$bodyContent .="<p>".$messages."</p>";
			$mail->Subject = $subject;
			$bodyContent .="</body>";
			$bodyContent .="</html>";
			$mail->Body    = $bodyContent;

				if(!$mail->send()) 
					{
						return "Error Sending Email!";

					} 
					else 
					{
						return true;
						
					}
					
				} catch (Exception $e) {
					return $e;
		
				}
}
?>
