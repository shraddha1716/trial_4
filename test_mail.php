<?php 
 	
		
			include_once "class.phpmailer.php";
			$email_arr = array();
			$email_arr = array('vishnukhatale98@gmail.com');
			$add_attachment = "Y";  
			$subject = date('d-m-Y')." : Test Mail";
			$msg = "Hiii.... Test Mail";
			
			$mail = new PHPMailer();
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->SMTPDebug  = 2; // enables SMTP debug information (for testing)

			$mail->Mailer = "smtp";             
			$mail->SMTPSecure = "ssl"; //ssl - 465 and tls - 587
			$mail->Host = "freedom.herosite.pro"; //Domain name		
			$mail->Port = 465;	//465 587			
			$mail->SMTPAuth = true;				
			$mail->Username = "contact_info@innovationshub.in";
			$mail->Password = "InnovationsHub@1234";         		
			$mail->SetFrom("contact_info@innovationshub.in"," TEST TEAM");
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true,					
				)
			);	
			//	set required mail properties
			$mail->IsHTML(true);
			$mail->Subject = "Test";
			$mail->AltBody = ""; // optional, comment out and test
			$mail->MsgHTML("Test Mail");
			
			/* if($add_attachment == 'Y'){ // sending attachment 
				$mail->AddAttachment($fileName1);
			} */
			
			foreach($email_arr as $email_id){
				$name1="User";
				$mail->addAddress($email_id,$name1);     // Add a recipient
			}
			
			if(!$mail->Send()){
				//return false;
				$error = 'Mail error: '.$mail->ErrorInfo; 
                echo 'send_mail_failed';
				echo '</br>';
                print_r($error);
			}else{
				?>
				<script type="text/javascript"> alert("Mail sent!"); </script>
				<?php
			}
			
			
			/* try {
			  $mail->send();
			} catch (Exception $ex) {
			  echo $msg = $ex->getMessage();
			} */
?>