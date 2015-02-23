<?php include('header.inc.php') ?>
<?php if(have_posts()): 
		the_post();
?>
overview : <?php the_content(); ?><br>
history : <?php echo get_post_meta( get_the_ID(), '_cmb_history', true ) ?><br>
vision : <?php echo get_post_meta( get_the_ID(), '_cmb_vision', true ) ?><br>
mission : <?php echo get_post_meta( get_the_ID(), '_cmb_mission', true ) ?><br>
<?php endif ?>