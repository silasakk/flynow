<?php include('header.inc.php') ?>



<?php if(have_posts()): 
	while(have_posts()):
		the_post();
?>
<a class="col-md-3" href="<?php echo get_the_permalink(); ?>"> 
	<div class="thumbnal" style="line-height: 260px;"><?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail' ) ?></div>
	<h4><?php the_title(); ?></h4>
	<p><?php the_excerpt(); ?></p>
	<?php the_date('d M Y') ?>
</a>
<?php endwhile;endif; ?>

<div class="footer-end">
    Copyright  ¬© 2015  Lux Royal(Thailand) Co.,Ltd. All Rights Reserved.
</div>

<?php include('footer.inc.php') ?>
