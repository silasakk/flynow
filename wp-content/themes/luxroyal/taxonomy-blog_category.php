<?php include('header.inc.php') ?>
<div class="content">

    <div class="content-nav">
        <div class="container">
            <div class="content-nav-title text-title">BLOG</div>
            <div class="content-nav-menu pull-right">
                <ul>
                    <li><a href="<? site_url() ?>">Home</li>
                    <li><a href="blogs">Blog</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="cat-blog"><i class="fa fa-bars" style="color:red"></i> CATEGORIES</div>
        <ul class="cat-list">
            <?php   
                    $currentterm = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
                    echo $currentterm->slug;
            ?>
            <li class="<?php echo ($segments[1]=='blogs' && !$segments[2])? 'active':'' ?>"><a href="/blogs">ALL</a></li>
            <?php 
                $args = array('hide_empty' => 0) ;

                $terms = get_terms( 'blog_category',$args);
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                    foreach ( $terms as $term ) {
                        $term_list = '<a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a>';
                        $class_active = ($currentterm->slug==$term->slug)? 'active':'';
                        echo '<li class="'.$class_active.'">'.$term_list.'</li>';
                    }
                }
            ?>
        </ul>
        <div class="clearfix"></div>

         <?php 
            $args = array(
                    "post_type"         => 'blog',
                    "posts_per_page"    => '-1',
                    "orderby"           => "id",
                    "order"             => "DESC",
                    'meta_query' => array(
                                            array(
                                                'key'     => '_cmb_feature',
                                                'value'   => 'on'
                                            ),
                                        ),
                    
                    );
                
            $the_query = new WP_Query( $args );
        
            if($the_query->have_posts() && is_taxonomy()): 
        ?>
        <div class="blog-list-feature">
        <?
            while($the_query->have_posts()):
                $the_query->the_post();
 
         ?>
            
                <div class="col-6">
                    <div class="image-feature">
                        <?php echo get_the_post_thumbnail(get_the_ID() ) ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="content-feature">
                        <h1><?php the_title() ?></h1>
                        <p class="exc"><?php echo get_the_excerpt() ?></p>
                        <div class="bar">
                            <div class="bar_left">
                                 <?php
                                    $terms = get_the_terms( get_the_ID(), 'blog_category' );
                                                            
                                    if ( $terms && ! is_wp_error( $terms ) ) : 

                                        $name = array();

                                        foreach ( $terms as $term ) {
                                            $name[] = '<a target="_blank" href="'.get_term_link($term).'">'.$term->name.'</a>';
                                        }
                                                            
                                        echo '<i class="fa fa-bars"></i> '.$name[0];
                                    endif;
                                 ?>
                            </div>
                            <div class="bar_right">
                                <?php the_date('dS M Y') ?>
                            </div>
                        </div>
                    </div>
                </div>
      
            <?php endwhile;?>
        </div>
        <? endif;  ?>        
        <div class="blog-relate3">
            <ul>
                <?php 


                    if(have_posts()): 
                        while(have_posts()):
                            the_post();

                            
                         
                ?>
                <li class="col-6">
                   
                        <div class="blog-relate3-item">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail' ) ?>
                            <div class="caption">
                                <div class="pull-left" style="width:60%"><?php the_title() ?></div>
                                <div class="pull-right right" style="width:40%"><?php echo get_the_date('d - m - Y') ?></div>
                            </div>
                            <div class="div-hover">
                                <a href="<? the_permalink() ?>" class="content-hover">
                                    <h1><?php the_title() ?></h1>
                                    <p class="date"><?php the_date('dS M Y') ?></p>
                                    <p class="con"><?php the_excerpt(); ?></p>
                                </a>
                                <div class="caption caption-bar">
                                    <?php
                                        $terms = get_the_terms( get_the_ID(), 'blog_category' );
                                                                
                                        if ( $terms && ! is_wp_error( $terms ) ) : 

                                            $name = array();

                                            foreach ( $terms as $term ) {
                                                $name[] = '<a target="_blank" href="'.get_term_link($term).'">'.$term->name.'</a>';
                                            }
                                                                
                                            $name = join( " , ", $name );
                                     ?>
                                    <span><i class="fa fa-bars"></i> <?php echo $name ?></span>
                                    <? endif; ?>

                                    <a class="readmore" href="<? the_permalink() ?>">READ MORE</a>

                                </div>
                            </div>
                        </div>
          
                </li>
                <?php endwhile;endif ?>
            </ul>
        </div>
    </div>
</div>
<?php include('footer.inc.php') ?>