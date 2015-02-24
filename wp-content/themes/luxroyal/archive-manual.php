<? include('header.inc.php'); ?>
<div class="manual-banner"></div>
<div class="cus-menu">
    <div class="container">
        <ul>
            <li class="col-3"><a href="http://localhost/flynow/faqs">FAQ <i class="fa fa-angle-down"></i></a></li>
            <li class="col-3 active"><a href="http://localhost/flynow/manuals">MANUAL <i class="fa fa-angle-down"></i></a></li>
            <li class="col-3"><a href="http://localhost/flynow/howtos">HOW TO <i class="fa fa-angle-down"></i></a></li>
            <li class="col-3"><a href="http://localhost/flynow/requestfrom">REQUEST FORM <i class="fa fa-angle-down"></i></a></li>
        </ul>
    </div>
</div>
<div class="content-manual content ">
    <div class="content-nav">
        <div class="container">
            <div class="content-nav-title text-title">MANUAL</div>
            <div class="content-nav-menu pull-right">
                <ul>
                    <li>HOME</li>
                    <li>CUSTOMERSERVICE</li>
                    <li>MANUAL</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="manual-list">
          <?php 
              $args = array(
              "post_type"     => 'manual',
              "offset"      => (@!$segments[4])? '0':''.(($segments[4]-1)*1).'',
              "posts_per_page"  => '1',
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
                <div class="well-content">
                    <div class="well-left">
                        <p class="text-title"><strong><?php the_title() ?></strong></p>
                        <p class="text-detail"><?php the_content() ?></p>
                    </div>
                    <div class="well-right">
                        <div>
                          <?php $image = wp_get_attachment_image( get_post_meta( get_the_ID(), 'test_image_id', 1 ), 'medium' ); ?>
                            <?php echo $image; ?>
                            <p><span class="info">PDF</span> FORMAT</p>
                            <p><span class="filesize">FILE SIZE 10 MB.</span></p>
                            <a href="#" class="btn-download">DOWNLOAD</a>
                        </div>
                    </div>
                </div>
            </li>
          <?php endwhile;endif ?>
        </ul>
    </div>
</div>
<? include('footer.inc.php') ?>