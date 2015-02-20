<?php include('header.inc.php') ?>
<div class="content">

    <div class="content-nav">
        <div class="container">
            <div class="content-nav-title text-title">BLOG</div>
            <div class="content-nav-menu pull-right">
                <ul>
                    <li>HOME</li>
                    <li>BLOG</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="cat-blog"><i class="fa fa-bars" style="color:red"></i> CATEGORIES</div>
        <ul class="cat-list">
            <?php   $_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                    $segments = explode('/', $_SERVER['REQUEST_URI_PATH']); 
            ?>
            <li class="<?php echo ($segments[2]=='blogs' && !$segments[3])? 'active':'' ?>"><a href="/flynow/blogs">ALL</a></li>
            <?php 
                $args = array('hide_empty' => 0) ;

                $terms = get_terms( 'blog_category',$args);
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                    foreach ( $terms as $term ) {
                        $term_list = '<a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a>';
                        $class_active = ($segments[2]=='blog_category' && $segments[3]==$term->name)? 'active':'';
                        echo '<li class="'.$class_active.'">'.$term_list.'</li>';
                    }
                }
            ?>
        </ul>
        <div class="clearfix"></div>
        <div class="blog-list-feature">
            <?php 
            // $args = array(
            //         "post_type"         => 'blog',
            //         "posts_per_page"    => '-1',
            //         );
            //     // var_dump($args);
            // // The Query
            // $the_query = new WP_Query( $args );
                if(have_posts()): 
                    $i = 0;
                    while(have_posts()):
                        the_post();

                        $key_1_value = get_post_meta( get_the_ID(), '_cmb_feature', true );
                        // check if the custom field has a value
                        if( ! empty( $key_1_value) && $i == 0) :
                            $i = 1;
                     
            ?>
            <a href="<?php echo get_the_permalink(); ?>">
                <div class="col-6">
                    <div class="image-feature">
                        <?php echo get_the_post_thumbnail(get_the_ID() ) ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="content-feature">
                        <h1><?php the_title() ?></h1>
                        <p><?php the_excerpt() ?></p>
                        <div class="bar">
                            <div class="bar_left">
                                <?php echo get_the_category()[0]->cat_name ?>
                            </div>
                            <div class="bar_right">
                                <?php the_date('dS M Y') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <?php $i++;endif;endwhile;endif ?>
        </div>
        
        <div class="blog-relate3">
            <ul>
                <?php 
                // $args = array(
                //         "post_type"         => 'blog',
                //         "posts_per_page"    => '-1',
                //         );
                //     // var_dump($args);
                // // The Query
                // $the_query = new WP_Query( $args );

                    if(have_posts()): 
                        while(have_posts()):
                            the_post();

                            $key_1_value = get_post_meta( get_the_ID(), '_cmb_feature', true );
                            // check if the custom field has a value
                            if( $key_1_value != 'on') :
                         
                ?>
                <li class="col-6">
                    <a href="<?php echo get_the_permalink(); ?>">
                        <div class="blog-relate3-item">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail' ) ?>
                            <div class="caption">
                                <div class="pull-left" style="width:60%"><strong><?php the_title() ?></strong></div>
                                <div class="pull-right center" style="width:40%"><?php the_date('d m Y') ?></div>
                            </div>
                            <div class="div-hover">
                                <div class="content-hover">
                                    <h1><?php the_title() ?></h1>
                                    <p class="date"><?php the_date('dS M Y') ?></p>
                                    <p class="con"><?php the_excerpt(); ?></p>
                                </div>
                                <div class="caption caption-bar">
                                    <span class="col-3 sc">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-google-plus"></i>
                                    </span>

                                    <span class="col-5">
                                        <i class="fa fa-bars"></i> <?php echo get_the_category()[0]->cat_name ?>
                                    </span>
                                    <span class="col-4 readmore">
                                        <a href="#">READ MORE</a>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <?php endif;endwhile;endif ?>
            </ul>
        </div>
    </div>
</div>
<?php include('footer.inc.php') ?>