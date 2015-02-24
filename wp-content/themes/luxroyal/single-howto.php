<? include('header.inc.php'); ?>

<?php if(have_posts()): 
    while(have_posts()):
        the_post();
?>

<div class="content">
    <div class="content-nav">
        <div class="container">
            <div class="content-nav-title text-title">HOWTO</div>
            <div class="content-nav-menu pull-right">
                <ul>
                    <li>HOME</li>
                    <li>CUSTOMERSERVICE</li>
                    <li>HOWTO</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="blog-top">
            <div class="col-9">
                <div class="con-warp">
                    <?php $vdo = wp_get_attachment_image( get_post_meta( get_the_ID(), 'test_image_id', 1 )/*, 'medium' */);
                        echo $vdo; ?>
                    <!-- <iframe width="100%" height="380" src="https://www.youtube.com/embed/U-xLf05Yox8" frameborder="0" allowfullscreen></iframe> -->
                    <div class="caption">
                        <!--<?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail' ) ?>-->
                        <h1 class="title-howto"> <?php the_title(); ?></h1>
                       
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="how-con">
                    <?php $repeat = get_post_meta( get_the_ID(), '_lux_repeat_group', true ); 
                        foreach ($repeat as $key => $value) :
                            if($key%2 == 0):
                    ?>
                    <div class="how-warp">
                        <div class="col-6">
                            <div class="how-img">
                                <img src="<?php echo $value['image'] ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="how-content">
                                <p class="text-title"><?php echo $value['title'] ?></p>
                                <p><?php echo $value['description'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="how-warp">
                        <div class="col-6">
                            <div class="how-content">
                                <p class="text-title"><?php echo $value['title'] ?></p>
                                <p><?php echo $value['description'] ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="how-img">
                                <img src="<?php echo $value['image'] ?>" />
                            </div>
                        </div>
                    </div>
                    <?php endif;endforeach ?>
                </div>
            </div>
            <div class="col-3">
                <div class="blog-recent">
                    <h1>HOW TO</h1>
                    <ul>
                        <?php 
                        $args = array(
                                "post_type"     => 'howto',
                                // "taxonomy"      => 'category',
                                // "term"          => '',
                                "posts_per_page"=> '4',
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
                            <p><?php the_title() ?><p>
                        </li>
                        <?php endwhile;endif ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<?php endwhile;endif; ?>

<? include('footer.inc.php'); ?>