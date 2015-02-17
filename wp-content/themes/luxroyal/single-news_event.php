<?php include('header.inc.php') ?>

<?php if(have_posts()): 
	while(have_posts()):
		the_post();
?>

<h2>TITLE : <?php the_title(); ?></h2>
<span>SUBTITLE : <?php the_excerpt(); ?></span>
<p>CONTENT : <?php the_content(); ?></p>
<p>TIME : <?php the_time('g,i a') ?></p>
<p>DATE : <?php the_date('d-F-Y') ?></p>
<p>This post was written by : <?php the_author(); ?></p>

<?php endwhile;
else: ?>
<?php endif ?>

<div class="footer-end">
    Copyright  ¬© 2015  Lux Royal(Thailand) Co.,Ltd. All Rights Reserved.
</div>

<?php include('footer.inc.php') ?>
