<? include('header.inc.php'); ?>
<div class="howto-banner"></div>
<div class="cus-menu">
    <div class="container">
        <ul>
            <li class="col-3"><a href="http://localhost/flynow/faqs">FAQ <i class="fa fa-angle-down"></i></a></li>
            <li class="col-3"><a href="http://localhost/flynow/manuals">MANUAL <i class="fa fa-angle-down"></i></a></li>
            <li class="col-3 active"><a href="http://localhost/flynow/howtos">HOW TO <i class="fa fa-angle-down"></i></a></li>
            <li class="col-3"><a href="http://localhost/flynow/requestfrom">REQUEST FORM <i class="fa fa-angle-down"></i></a></li>
        </ul>
    </div>
</div>
<div class="content-manual content ">
    <div class="content-nav">
        <div class="container">
            <div class="content-nav-title text-title">HOW TO</div>
            <div class="content-nav-menu pull-right">
                <ul>
                    <li>HOME</li>
                    <li>CUSTOMER SERVICE</li>
                    <li>HOWTO</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <ul>
        <?php 
        $args = array(
                "post_type"         => 'howto',
                "offset"            => (@!$segments[4])? '0':''.(($segments[4]-1)*1).'',
                "posts_per_page"    => '1',
                );
            // var_dump($args);
        // The Query
        $the_query = new WP_Query( $args );

            if($the_query->have_posts()): 
            $i = 1;
            while($the_query->have_posts()):
                $the_query->the_post();
        ?>
        <li class="col-6">
            <div class="h-content">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail' ) ?>
                <p class="text-title"><strong><?php the_title(); ?></strong></p>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php echo get_the_permalink(); ?>" class="btn-view">VIEW</a>
            </div>
        </li>
        <?php endwhile;endif; ?>
    </ul>
</div>
<? include('footer.inc.php') ?>