<?php
/*
Template Name: rosekay
*/
session_start();
?>
<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {
	//Check to make sure that the name field is not empty
	if(trim($_POST['contactName']) === '') {
 		$nameError = 'You forgot to enter your name.';
 		$hasError = true;
	} else {
 		$name = trim($_POST['contactName']);
	}
 
	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) === '')  {
 		$emailError = 'You forgot to enter your email address.';
 		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+.[A-Z]{2,4}$", trim($_POST['email']))) {
 		$emailError = 'You entered an invalid email address.';
 		$hasError = true;
	} else {
 		$email = trim($_POST['email']);
	}

	//Check to make sure sure that a valid phone is submitted
	if(trim($_POST['phone']) === '')  {
 		$phoneError = 'You forgot to enter your phone.';
 		$hasError = true;
	} else {
 		$phone = trim($_POST['email']);
	}
 
	//Check to make sure address were entered 
	if(trim($_POST['address']) === '') {
 		$addressError = 'You forgot to enter your address.';
 		$hasError = true;
	} else {
 		if(function_exists('stripslashes')) {
  			$address = stripslashes(trim($_POST['address']));
 		} else {
  			$address = trim($_POST['address']);
 		}
	}

 	//If there is no error, send the email
	if(!isset($hasError)) {
		// send mail to user
		$emailTo = '<strong>jeerapa.nista@gmail.com</strong>';
		$subject = 'Campaign from Rosekay';
		$body = "ขอบคุณที่ร่วมสนุกกับ Rosekay ค่ะ";
		$headers = 'From: My Site <jeerapa.nista@gmail.com>' . "\r\n";
		// $headers = 'From: My Site <'.$emailTo.'>' . "rn" . 'Reply-To: ' . $email;

		wp_mail( $email, $subject, $body, $headers);
		// mail($emailTo, $subject, $body, $headers);

		$emailSent = true;

		// save data to database
		$wpdb->insert( 
			'test_user', 
			array( 
				'name' => $_POST['contactName'], 
				'email' => $_POST['email'],
				'phone' => $_POST['phone'],
				'address' => $_POST['address'],
				'code' => $_SESSION['myCode']
			)
		);
	}
} ?>
 

 
<?php 
//If the email was sent, show a thank you message
//Otherwise show form
if(isset($emailSent) && $emailSent == true) {
?>
 	<div class="thanks">
	  	<h1>Thanks, <?=$name;?></h1>
	  	<p>Your email was successfully sent.</p>
 	</div>
<?php } else { ?>
 	<?php if (have_posts()) : ?>
 
  		<?php while (have_posts()) : the_post(); ?>
   			<h1><?php the_title(); ?></h1>
   			<?php the_content(); ?>
  
   			<?php if(isset($hasError) || isset($captchaError)) { ?>
    			<p class="error">There was an error submitting the form.<p>
   			<?php } ?>
 
		   	<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
		 		<ol class="forms">
		 			<li>
		  				<label for="contactName">Name</label>
		  				<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
		  				<?php if($nameError != '') { ?>
		   					<span class="error"><?=$nameError;?></span> 
		  				<?php } ?>
		 			</li>
		 			<li>
					  	<label for="email">Email</label>
					  	<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
		  				<?php if($emailError != '') { ?>
		   					<span class="error"><?=$emailError;?></span>
		  				<?php } ?>
		 			</li>
		 			<li>
					  	<label for="phone">Phone</label>
					  	<input type="text" name="phone" id="phone" value="<?php if(isset($_POST['phone']))  echo $_POST['phone'];?>" class="requiredField phone" />
		  				<?php if($phoneError != '') { ?>
		   					<span class="error"><?=$phoneError;?></span>
		  				<?php } ?>
		 			</li>
		 			<li class="textarea">
		  				<label for="commentsText">Address</label>
		  				<textarea name="address" id="commentsText" rows="2" cols="" class="requiredField">
		 				<?php if(isset($_POST['address'])) { 
		   						if(function_exists('stripslashes')) { 
		    						echo stripslashes($_POST['address']); 
		   						} else { 
		    						echo $_POST['address']; 
		   						}
		   				} ?>
		   				</textarea>
		  				<?php if($addressError != '') { ?>
		   					<span class="error"><?=$addressError;?></span> 
		  				<?php } ?>
		 			</li>
		 			<li class="buttons">
		  				<input type="hidden" name="submitted" id="submitted" value="true" />
		  				<button type="submit">SUBMIT</button>
		 			</li>
				</ol>
		   	</form>
 
  		<?php endwhile; ?>
 	<?php endif; ?>
<?php } ?>
