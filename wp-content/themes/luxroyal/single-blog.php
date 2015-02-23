<?php include('header.inc.php') ?>

<?php if(have_posts()): 
    while(have_posts()):
        the_post();
?>

<div class="content">

    <div class="content-nav">
        <div class="container">
            <div class="content-nav-title text-title">BLOG</div>
            <div class="content-nav-menu pull-right">
                <ul>
                    <li>HOME</li>
                    <li>BLOG</li>
                    <li><?php the_title(); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="blog-top">
            <div class="col-9">
                <div class="con-warp">
                    <!-- <img src="images/demo-blog-1.png" /> -->
                    <?php echo get_the_post_thumbnail(get_the_ID() ) ?>
                    <div class="caption">
                        <h1><?php the_title(); ?></h1>
                        <p>DATE / <?php the_date('dS F Y') ?></p>
                        <p>
                            <span><i class="fa fa-bars"></i> <?php echo get_the_category()[0]->cat_name ?></span>
                            <span>SHARE</span>
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="blog-con">
                    <h1 class="text-title"><strong><?php the_title(); ?></strong></h1>
                    <p><?php the_excerpt(); ?></p>
                    <hr>
                    <p><?php the_content(); ?></p>
                </div>

                <p class="blog-relate-title text-title center"><strong>Might Be Interesting</strong></p>
                
                <div class="blog-relate2">
                    <ul>
                    <?php 
                    $args = array(
                            "post_type"     => 'blog',
                            "taxonomy"      => 'category',
                            "term"          => '',
                            "limit"         => '2',
                            'orderby'       => 'id',
                            'order'         => 'DESC',
                            );
                        // var_dump($args);
                    // The Query
                    $the_query = new WP_Query( $args );

                        if($the_query->have_posts()): 
                        while($the_query->have_posts()):
                            $the_query->the_post();

                    ?>
                        <li class="col-6">
                            <div class="blog-relate2-item">
                                <?php echo get_the_post_thumbnail(get_the_ID() ,'thumbnail') ?>
                                <div class="caption">
                                    <div class="pull-left" style="width:60%"><strong><?php the_title() ?></strong></div>
                                    <div class="pull-right center" style="width:40%"><?php echo get_the_date('d M Y') ?></div>
                                </div>
                                <div class="caption caption-bar">
                                    <span class="sc">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-google-plus"></i>
                                    </span>
                                    
                                    <span>
                                        <i class="fa fa-bars"></i> <?php echo get_the_category()[0]->cat_name ?>
                                    </span>
                                    <span class="readmore">
                                        <a href="#">READ MORE</a>
                                    </span>
                                    
                                </div>
                            </div>
                        </li>
                    <?php endwhile;endif ?>
                       <!--  <li class="col-6">
                            <div class="blog-relate2-item">
                                <img src="images/demo-relate2.png.png">
                                <div class="caption">
                                    <div class="pull-left" style="width:60%"><strong>LUX LUNCH NEW WEBSITE GRAND</strong></div>
                                    <div class="pull-right center" style="width:40%">19 NOV 2014</div>
                                </div>
                                <div class="caption caption-bar">
                                    <span class="sc">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-google-plus"></i>
                                    </span>
                                    
                                    <span>
                                        <i class="fa fa-bars"></i> ENVIRONMENT
                                    </span>
                                    <span class="readmore">
                                        <a href="#">READ MORE</a>
                                    </span>
                                    
                                </div>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="col-3">
                <div class="blog-recent">
                    <h1><strong>RECENT</strong> BLOG</h1>
                    <ul>
                    <?php 
                    $args = array(
                            "post_type"     => 'blog',
                            "limit"         => '4',
                            'orderby'       => 'id',
                            'order'         => 'DESC',
                            );
                        // var_dump($args);
                    // The Query
                    $the_query = new WP_Query( $args );

                        if($the_query->have_posts()): 
                        while($the_query->have_posts()):
                            $the_query->the_post();
                    ?>
                        <li>
                            <?php echo get_the_post_thumbnail(get_the_ID() ,'thumbnail') ?>
                            <p class="title"><?php the_title() ?><p>
                            <p class="date"><?php echo get_the_date('d - F - Y') ?></p>
                            <p><i class="fa fa-bars"></i> <?php echo get_the_category()[0]->cat_name ?></p>
                        </li>
                    <?php endwhile;endif ?>
                    </ul>
                </div>
            </div>
            
        </div>
        
    </div>
</div>

<?php endwhile;endif; ?>

<?php include('footer.inc.php') ?>