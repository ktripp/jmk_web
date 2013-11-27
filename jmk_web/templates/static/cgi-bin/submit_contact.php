<?php
	
	require 'geekMail-1.0.php';
	
	$fname = "";
	$lname = "";
	$phone = "";
	$email = "";
	$comments = "";
	
	
	$error = "";
	$subject = "";
	
	if (isset($_POST['submitted']) && $_POST['submitted'] == 1)
	{
		$fname = check_input($_POST['fname'], "first name");
		$lname = check_input($_POST['lname'], "last name");
		$phone = check_input($_POST['phone'], "phone number");
		$email = check_input($_POST['email'], "email address");
		$comments = check_input($_POST['comments']);
		
		$error = ltrim($error, " ,");
		$error = rtrim($error, " ,");
		
		
		// display error for missing input values
		if ($error) 
		{
			$error = "Please enter the following: " . $error . ". ";
		}
		
		
		// validate email address
		if ($email)
		{
			validate_email();
		}
		
		
		
		// send mail!
		if (!$error)
		{
			
			$message = 	'<html style="font-family:\'Verdana\'"> <p style="font-size:18px">Someone has submitted an online request to JMK Builders! </p>
						<div style="font-size:14px">
						<b>Name:</b> ' . $fname . ' ' . $lname . '<br/>' .
						'<b>Email:</b> ' . $email . '<br/>' .
						'<b>Phone:</b> ' . $phone . '<br/>' .
						'<b>Comments: </b>' . $comments . '<br/>' .
						'</div> </html>';

			
			
			// ensure there is mail to send to applicant
			$issue = TRUE;
			if(!$subject)
			{
				$subject = "JMK Builders Information Request";
				$issue = FALSE;
			}
			
			
		 
			// send submission to JMK
			$submissionEmail = new geekMail();
		 
			$submissionEmail->setMailType('html');
			$submissionEmail->from('kelsey_tripp@brown.edu', 'JMK Builders');
			$submissionEmail->to('kelsey_tripp@brown.edu');
			$submissionEmail->bcc('kelsey.a.tripp@gmail.com');
			$submissionEmail->subject($subject);
			$submissionEmail->message($message);
			$submissionEmail->send();

			
			// send confirmation to applicant
			if (!$issue)
			{
				$message = '<html style="font-family:\'Verdana\'"> <p>Dear ' . $fname . ', </p>
						<p>Thank you for contacting JMK Builders!  We have received your inquiry
						and will be in touch soon.</p><br>
						<p>Sincerely,<br/>
						JMK Builders<br/>
						John Kilduff, President<br/>
						www.jmkbuilders.com</p>' .
						'</html>';
				
				$applicantEmail = new geekMail();
				
				$applicantEmail->setMailType('html');
				$applicantEmail->from('kelsey_tripp@brown.edu', 'JMK Builders');
				$applicantEmail->to($email);
				$applicantEmail->bcc('kelsey.a.tripp@gmail.com');
				$applicantEmail->subject($subject);
				$applicantEmail->message($message);
				$applicantEmail->send();
			}
			
			// notify javascript
			$error = "submitted";
		}	
		
	}
	
	
	
	function check_input($data, $problem='')
	{
		global $error;
		
		if($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
		}
		else
		{
			$error = $error . ', ' . $problem;
		}
	
    	return $data;
	}
	
	function validate_email() 
	{
		global $error, $email;
		
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
		{
			$error = $error . ' Invalid e-mail address. ';
			$email = "";
		}
	}
	
	echo $error;
?>