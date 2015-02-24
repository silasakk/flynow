<? include('header.inc.php') ?>
<div class="faq-banner"></div>
<div class="cus-menu">
    <div class="container">
        <ul>
            <li class="col-3 active"><a href="http://localhost/flynow/faqs">FAQ <i class="fa fa-angle-down"></i></a></li>
            <li class="col-3"><a href="http://localhost/flynow/manuals">MANUAL <i class="fa fa-angle-down"></i></a></li>
            <li class="col-3"><a href="http://localhost/flynow/howtos">HOW TO <i class="fa fa-angle-down"></i></a></li>
            <li class="col-3"><a href="http://localhost/flynow/requestfrom">REQUEST FORM <i class="fa fa-angle-down"></i></a></li>
        </ul>
    </div>
</div>
<div class="clearfix"></div>
<div class="content">
    <div class="content-nav">
        <div class="container">
            <div class="content-nav-title text-title">Frequently asked questions</div>
            <div class="content-nav-menu pull-right">
                <ul>
                    <li>HOME</li>
                    <li>CUSTOMERSERVICE</li>
                    <li>FAQ</li>
                </ul>
            </div>
        </div>
    </div>
<div class="container">
    <ul class="faq-list">
        <?php 
        $args = array(
                "post_type"     => 'faq',
                // "taxonomy"      => 'category',
                "term"          => '',
                // "posts_per_page"         => '2',
                'orderby'       => 'id',
                'order'         => 'ASC',
                );
            // var_dump($args);
        // The Query
        $the_query = new WP_Query( $args );

            if($the_query->have_posts()): 
                $i = 1;
            while($the_query->have_posts()):
                $the_query->the_post();

        ?>
        <li>
            <p><a href="javascript:;"><span class="num-list active"><?php echo $i ?></span> <strong><span class="q">Q.</span> <?php the_title(); ?></strong></a></p>
            <p class="list-well active"><?php the_content(); ?></p>
        </li>
        <?php $i++;endwhile;endif ?>
    </ul>
</div>
</div>

