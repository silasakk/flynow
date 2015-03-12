<?php
/*
Template Name: rosekay code
*/
?>

<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {
	//Check to make sure that the name field is not empty
	if(trim($_POST['code']) === '') {
 		$codeError = 'You forgot to enter your code.';
 		$hasError = true;
	} else {
		// check from database
		$mylink = $wpdb->get_row("SELECT * FROM test WHERE random = '".$_POST['code']."'");
		if($mylink == null){
			$codeError = 'This code is invalid.';
 			$hasError = true;
		}
		elseif($mylink->use == 1){
			$codeError = 'This code already.';
 			$hasError = true;
		}
		else{
			$wpdb->update( 
				'test', 
				array( 
					'use' => '1',	// string
				), 
				array( 'random' => $_POST['code'] )
			);

 			$code = trim($_POST['code']);
 		}
	}
 
 	//If there is no error, send the email
	if(!isset($hasError)) {
		session_start();
		$_SESSION['myCode'] = $_POST['code'];
		wp_redirect(site_url('rosekay'));
		exit;
	}
} ?>
 

 
<?php 
//If the email was sent, show a thank you message
//Otherwise show form
if (have_posts()) : ?>
 
	<?php while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>

   	<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
 		<ol class="forms">
 			<li>
   				<label for="code">Code</label>
  				<input type="text" name="code" id="code" value="<?php if(isset($_POST['code'])) echo $_POST['code'];?>" class="requiredField" />
  				<?php if($codeError != '') { ?>
   					<span class="error"><?=$codeError;?></span> 
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
