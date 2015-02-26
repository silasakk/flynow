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
            <?php  $currentterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  ?>
            <li class="<?php echo (!$currentterm->slug)? 'active':'' ?>"><a href="<? echo get_post_type_archive_link('blog') ?>">ALL</a></li>
            <?php 
                $args = array('hide_empty' => 0) ;
                $terms = get_terms( 'event_category',$args);
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                    foreach ( $terms as $term ) {
                        $term_list = '<a href="' . get_term_link( $term ) . '" >' . $term->name . '</a>';
                        $class_active = ($currentterm->slug==$term->slug)? 'active':'';
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
					"offset"			=> (@!$segments[3])? '0':''.(($segments[3]-1)*1).'',
					"posts_per_page" 	=> '10',
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
	                    <?php echo get_the_post_thumbnail(get_the_ID(), 'full' ) ?>
	                    <div class="caption">
	                        <h2><?php the_title(); ?></h2>
	                        <p class="dtl"><?php echo get_the_excerpt(); ?></p>
	                        <p>
                                <?php
                                        $terms = get_the_terms( get_the_ID(), 'event_category' );
                                                                
                                        if ( $terms && ! is_wp_error( $terms ) ) : 

                                            $name = array();

                                            foreach ( $terms as $term ) {
                                                $name[] = '<a target="_blank" href="'.get_term_link($term).'">'.$term->name.'</a>';
                                            }
                                                                
                                            $name = join( " , ", $name );
                                     ?>
                                        <span><?php echo $name ?> | </span>
                                    <? endif; ?>

                            <?php the_date('d M Y') ?> <span class="pull-right">- more -</span></p>
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
