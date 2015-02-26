<?php include('header.inc.php') ?>

		    	
<div id="homeslider">
    <img src="<?php echo get_template_directory_uri() ?>/assets/images/LUX-Homepage-banner.jpg" style="width:100%;height:auto">
</div>
<br/>
<div class="container">
    <ul style="margin : 0 -15px">
        <li class="col-4 col-sm-12">
            <div class="thumb-recomend">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/recoend1.png" />
                
            </div>
            <div class="detail-recomend">
                <p class="detail-recomend-title">NEWS & EVENTS</p>
                <p class="detail-recomend-dtl hi">OUR NEWS AND EVENTS</p>
                <a class="detail-recomend-more"><img src="<?php echo get_template_directory_uri() ?>/assets/images/btn-more.png"></a>
            </div>
        </li>
        <li class="col-4 col-sm-12">
            <div class="thumb-recomend">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/recomend2.png" />

            </div>
            <div class="detail-recomend">
                <p class="detail-recomend-title">PRODUCT</p>
                <p class="detail-recomend-dtl hi">LUX FOR LIFE</p>
                <a class="detail-recomend-more"><img src="images/btn-more.png"></a>
            </div>
        </li>
        <li class="col-4 col-sm-12">
            <div class="thumb-recomend">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/recomend3.png" />

            </div>
            <div class="detail-recomend">
                <p class="detail-recomend-title">CUSTOMER SERVICES</p>
                <p class="detail-recomend-dtl hi">FAQ ,MANUAL, HOW TO, REQUEST</p>
                <a class="detail-recomend-more"><img src="images/btn-more.png"></a>
            </div>
        </li>
    </ul>
    
    <hr>
  
    <div class="home-news">
        <div class="home-news-top">
            <h2>WHAT NEWS</h2>
        </div>
        <ul class="listnews">
            <?php 
            $args = array(
                    "post_type"     => 'event',
                    "posts_per_page"         => '4',
                    'orderby'       => 'id',
                    'order'         => 'DESC',
                    );
                // var_dump($args);
            // The Query
            $the_query = new WP_Query( $args );

                if($the_query->have_posts()):
                $i = 1;
                while($the_query->have_posts()):
                    $the_query->the_post();
            ?>
            <li class="col-<?php echo ($i==1 || $i==3)? '8':'4' ?> col-sm-12">
                <div class="thumb-news">
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail' ) ?>
                    <div class="over-title">
                        <div class="thumb-news-title"><?php the_title(); ?></div>
                        <div class="thumb-news-dtl"><?php the_excerpt(); ?></div>
                        
                    </div>
                    <div class="bg-<?php echo ($i==1 || $i==3)? 'bl':'rd' ?>"></div>
                    
                </div>
            </li>
            <?php $i++;endwhile;endif ?>
            <!-- <li class="col-4 col-sm-12">
                <div class="thumb-news">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/news2.png">
                    <div class="over-title">
                        <div class="thumb-news-title">Lux Asia Pacific Meeting</div>
                        <div class="thumb-news-dtl">In Thailand, right in the historical</div>

                    </div>
                    <div class="bg-rd"></div>

                </div>
            </li>
            
            <li class="col-4 col-sm-12">
                <div class="thumb-news">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/news4.png">
                    <div class="over-title">
                        <div class="thumb-news-title">Lux Asia Pacific Meeting</div>
                        <div class="thumb-news-dtl">In Thailand, right in the historical</div>

                    </div>
                    <div class="bg-rd"></div>

                </div>
            </li>
            <li class="col-8 col-sm-12">
                <div class="thumb-news">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/news5.png">
                    <div class="over-title">
                        <div class="thumb-news-title">Lux AWARDS 2014</div>
                        <div class="thumb-news-dtl">In Thailand, right in the historical</div>

                    </div>
                    <div class="bg-bl"></div>

                </div>
            </li> -->
            
        </ul>
    </div>
</div>
<br/>
<br/>
<?php include('footer.inc.php') ?>

