<?php
	
	session_start();
	
	$email_to = 'cookkycok@gmail.com';
	
	if($_POST) {
		
		// include validation helper
		include_once('helper.validation.php');
		
		$val = Validation::forge('my_validation');
		
		$val->add_rule(
			array(
				'captcha' => array('captcha:captcha'),
			)
		);
		
		if($val->run()) {
			unset($_SESSION['captcha']);
			
			// send email
			$subject = 'Обратная связь | ' . $_SERVER['SERVER_NAME'];

			$message = '<!DOCTYPE html>
                <html lang="en">
                  <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Обратная связь</title>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
                    </head>
                    <body>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Panel title</h3>
                      </div>
                      <div class="panel-body">
                        Panel content
                      </div>
                    </div>
                  </body>
                </html>';


            $headers = "From: " . $_SERVER['SERVER_NAME'] . "\r\n";
            $headers .= "Reply-To: ". strip_tags($email_to) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

			if(mail($email_to, $subject, $message, $headers))
                echo json_encode(array('success' => true));
            else
                echo json_encode(array('success' => false));
			
		}else{
			$errors = array();
			foreach($val->get_errors() as $field => $error) {
				$errors[] = $field;
			}
			echo json_encode($errors);
		}
    }
	
?>