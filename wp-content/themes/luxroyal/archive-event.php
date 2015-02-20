<?php include('header.inc.php') ?>

<div class="news-banner"></div>
<div class="content">

    <div class="content-nav">
        <div class="container">
            <div class="content-nav-title text-title">NEWS & EVENTS</div>
            <div class="content-nav-menu pull-right">
                <ul>
                    <li>HOME</li>
                    <li>NEWS & EVENTS</li>
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="tag-list">
        	<?php 	$_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
					$segments = explode('/', $_SERVER['REQUEST_URI_PATH']); 
			?>
            <li class="<?php echo ($segments[2]=='events' && !$segments[3])? 'active':'' ?>"><a href="/flynow/events">ALL</a></li>
			<?php 
				$args = array('hide_empty' => 0) ;

                $terms = get_terms( 'event_category',$args);
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                    foreach ( $terms as $term ) {
                        $term_list = '<a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a>';
						$class_active = ($segments[2]=='event_category' && $segments[3]==$term->name)? 'active':'';
                    	echo '<li class="'.$class_active.'">'.$term_list.'</li>';
                    }
                }
			?>
        </ul>
        <div class="clearfix"></div>
        <ul class="news-list">
        	<?php 
        	$args = array(
					"post_type" 		=> 'event',
					"offset"			=> (@!$segments[4])? '0':''.(($segments[4]-1)*1).'',
					"posts_per_page" 	=> '1',
					);
				// var_dump($args);
			// The Query
			$the_query = new WP_Query( $args );

        		if($the_query->have_posts()): 
				$i = 1;
				while($the_query->have_posts()):
					$the_query->the_post();
			?>
            <li class="col-<?php echo ($i==2 || $i==3 || $i==6)? '4':'8' ?> col-sm-12 <?php echo ($i==2 || $i==3 || $i==6)? 'xxx':'' ?>">
            	<a href="<?php echo get_the_permalink(); ?>">
	                <div class="con-warp">
	                    <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail' ) ?>
	                    <div class="caption">
	                        <h2><?php the_title(); ?></h2>
	                        <p class="dtl"><?php the_excerpt(); ?></p>
	                        <p><?php echo get_the_category()[0]->cat_name ?> , <?php the_date('d M Y') ?> <span class="pull-right">- more -</span></p>
	                    </div>

	                </div>
                </a>
            </li>
			<?php $i++;endwhile;endif; ?>
        </ul>
        <div class="clearfix"></div>
        <ul class="tag-list">
        	<?php 
	    
	        $total = $the_query->found_posts;
		    $big = 999999999;
		    echo paginate_links(array(
	                'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	                'format'        => '/page/%#%',
	                'current'       => max( 0, get_query_var('paged') ),
	                'total'         => $total,
	                'mid_size'      => 1,
	                'type'          => 'plain',
	                'prev_text'     => null,
	                'next_text'     => null,
	                'prev_next'     => FALSE,
	             ) );

		    ?>
            <!-- <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">25</a></li> -->
        </ul>
        <div class="clearfix"></div>
    </div>


</div>
<div class="footer-end">
    Copyright  ¬© 2015  Lux Royal(Thailand) Co.,Ltd. All Rights Reserved.
</div>

<?php include('footer.inc.php') ?>
