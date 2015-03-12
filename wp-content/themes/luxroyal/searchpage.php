<?php 
/*
Template Name: Searchpage
*/
?>
<?php

$search_query = array();
$search_query['post_title_like'] = $_GET['q'];
$search_query['post_type'] = array('page','event','product','blog','howto','faq','manual','contact');

$search = new WP_Query($search_query);
if($search->have_posts()):
	echo '<ul>';
	while($search->have_posts()):
		$search->the_post();
?>
		<li>
			<a href="<?php echo get_the_permalink(); ?>">
				<?php echo get_the_post_thumbnail(get_the_ID() ) ?><br>
				title : <?php the_title() ?><br>
				description : <?php the_excerpt() ?><br>
				date : <?php the_date() ?><br>
				post type : <?php echo get_post_type() ?>
			</a>
		</li>
<?php endwhile;
	echo '</ul>';
endif;	
// echo $search->request;
// echo $search->found_posts;
?>