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

<div id="footer">
    <div class="container">
        <ul>
            <li class="col-2">
                <span><strong>ABOUT US</strong></span>
                <ul>
                    <li><a href="#">BRAND OVERVIEW</a></li>
                    <li><a href="#">HISTORY</a></li>
                    <li><a href="#">VISION</a></li>
                    <li><a href="#">MISSION</a></li>
                    <li><a href="#">CAREER</a></li>
                    
                </ul>
            </li>
            <li class="col-2">
                <span><strong>ABOUT US</strong></span>
                <ul>
                    <li><a href="#">BRAND OVERVIEW</a></li>
                    <li><a href="#">HISTORY</a></li>
                    <li><a href="#">VISION</a></li>
                    <li><a href="#">MISSION</a></li>
                    <li><a href="#">CAREER</a></li>

                </ul>
            </li>
            <li class="col-2">
                <span><strong>ABOUT US</strong></span>
                <ul>
                    <li><a href="#">BRAND OVERVIEW</a></li>
                    <li><a href="#">HISTORY</a></li>
                    <li><a href="#">VISION</a></li>
                    <li><a href="#">MISSION</a></li>
                    <li><a href="#">CAREER</a></li>

                </ul>
            </li>
            <li class="col-2">
                <span><strong>ABOUT US</strong></span>
                <ul>
                    <li><a href="#">BRAND OVERVIEW</a></li>
                    <li><a href="#">HISTORY</a></li>
                    <li><a href="#">VISION</a></li>
                    <li><a href="#">MISSION</a></li>
                    <li><a href="#">CAREER</a></li>

                </ul>
            </li>
            <li class="col-2">
                <span><strong>ABOUT US</strong></span>
                <ul>
                    <li><a href="#">BRAND OVERVIEW</a></li>
                    <li><a href="#">HISTORY</a></li>
                    <li><a href="#">VISION</a></li>
                    <li><a href="#">MISSION</a></li>
                    <li><a href="#">CAREER</a></li>

                </ul>
            </li>
            <li class="col-2 col-sm-12">
                <span><strong>CONTACT US</strong></span>
                <div class="foot-contact-us">
                    <span>Lux Royal(Thailand) Co.,Ltd.</span>

                    <span>
                        523-525 , Sukhumvit 71 Rd., 
                        Prakanong-Nue, Watana  
                        10110 Bangkok
                    </span>
                    
                    <div class="fol">
                        <span ><img width="12px;" src="<?php echo get_template_directory_uri() ?>/assets/images/phone.png" /> Call Center :</span>
                        <span style="text-align:center">(02) 381-5115</span>
                        <hr>
                        <span ><img width="12px;" src="<?php echo get_template_directory_uri() ?>/assets/images/email.png" /> EMAIL :</span>
                        <hr>
                        <span style="text-align:center">customercare@lux.co.th</span>
                    </div>
                    
                </div>
            </li>
        </ul>
        <div class="foot2 col-10 col-sm-12">
            <a class="foot-sitemap" href="#">
                SITEMAP
            </a>
            <br/>
            <p>Privacy policy and Teams and Condition</p>
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/footlogos.png" />
        </div>
    </div>
</div>
<div id="footer">
    <div class="container">
<?php
    /* The footer widget area is triggered if any of the areas
     * have widgets. So let's check that first.
     *
     * If none of the sidebars have widgets, then let's bail early.
     */
    if (   ! is_active_sidebar( 'first-footer-widget-area'  )
        && ! is_active_sidebar( 'second-footer-widget-area' )
        && ! is_active_sidebar( 'third-footer-widget-area'  )
        && ! is_active_sidebar( 'fourth-footer-widget-area' )
        && ! is_active_sidebar( 'five-footer-widget-area' )
        && ! is_active_sidebar( 'six-footer-widget-area' )
    ): return;
    else:
        if (   is_active_sidebar( 'first-footer-widget-area'  )
            && is_active_sidebar( 'second-footer-widget-area' )
            && is_active_sidebar( 'third-footer-widget-area'  )
            && is_active_sidebar( 'fourth-footer-widget-area' )
            && is_active_sidebar( 'five-footer-widget-area' )
            && is_active_sidebar( 'six-footer-widget-area' )
        ) : ?>
         
        <ul class="" role="complementary">
            <li class="col-2 first quarter left widget-area">
                <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
            </li><!-- .first .widget-area -->
         
            <li class="col-2 second quarter widget-area">
                <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
            </li><!-- .second .widget-area -->
         
            <li class="col-2 third quarter widget-area">
                <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
            </li><!-- .third .widget-area -->
         
            <li class="col-2 fourth quarter widget-area">
                <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
            </li><!-- .fourth .widget-area -->

            <li class="col-2 five quarter widget-area">
                <?php dynamic_sidebar( 'five-footer-widget-area' ); ?>
            </li><!-- .fourth .widget-area -->

            <li class="col-2 six quarter widget-area">
                <?php dynamic_sidebar( 'six-footer-widget-area' ); ?>
                <div class="fol">
                    <span ><img width="12px;" src="<?php echo get_template_directory_uri() ?>/assets/images/phone.png" /> Call Center :</span>
                    <span style="text-align:center">(02) 381-5115</span>
                    <hr>
                    <span ><img width="12px;" src="<?php echo get_template_directory_uri() ?>/assets/images/email.png" /> EMAIL :</span>
                    <hr>
                    <span style="text-align:center">customercare@lux.co.th</span>
                </div>
            </li><!-- .fourth .widget-area -->
            <div class="foot2 col-10 col-sm-12">
                <a class="foot-sitemap" href="#">
                    SITEMAP
                </a>
                <br/>
                <p>Privacy policy and Teams and Condition</p>
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/footlogos.png" />
            </div>
        </ul><!-- #fatfooter -->
        <?php 
        elseif (   is_active_sidebar( 'first-footer-widget-area'  )
            && is_active_sidebar( 'second-footer-widget-area' )
            && is_active_sidebar( 'third-footer-widget-area'  )
            && is_active_sidebar( 'fourth-footer-widget-area' )
            && is_active_sidebar( 'five-footer-widget-area' )
            && ! is_active_sidebar( 'six-footer-widget-area' )
        ) : ?>
         
        <ul class="" role="complementary">
            <li class="col-2 first quarter left widget-area">
                <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
            </li><!-- .first .widget-area -->
         
            <li class="col-2 second quarter widget-area">
                <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
            </li><!-- .second .widget-area -->
         
            <li class="col-2 third quarter widget-area">
                <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
            </li><!-- .third .widget-area -->
         
            <li class="col-2 fourth quarter right widget-area">
                <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
            </li><!-- .fourth .widget-area -->

            <li class="col-2 five quarter right widget-area">
                <?php dynamic_sidebar( 'five-footer-widget-area' ); ?>
            </li><!-- .fourth .widget-area -->
        </ul><!-- #fatfooter -->
        <?php 
        elseif (   is_active_sidebar( 'first-footer-widget-area'  )
            && is_active_sidebar( 'second-footer-widget-area' )
            && is_active_sidebar( 'third-footer-widget-area'  )
            && is_active_sidebar( 'fourth-footer-widget-area' )
            && ! is_active_sidebar( 'five-footer-widget-area' )
            && ! is_active_sidebar( 'six-footer-widget-area' )
        ) : ?>
         
        <ul class="" role="complementary">
            <li class="col-2 first quarter left widget-area">
                <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
            </li><!-- .first .widget-area -->
         
            <li class="col-2 second quarter widget-area">
                <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
            </li><!-- .second .widget-area -->
         
            <li class="col-2 third quarter widget-area">
                <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
            </li><!-- .third .widget-area -->
         
            <li class="col-2 fourth quarter right widget-area">
                <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
            </li><!-- .fourth .widget-area -->
        </ul><!-- #fatfooter -->
        <?php 
        elseif ( is_active_sidebar( 'first-footer-widget-area'  )
            && is_active_sidebar( 'second-footer-widget-area' )
            && is_active_sidebar( 'third-footer-widget-area'  )
            && ! is_active_sidebar( 'fourth-footer-widget-area' )
            && ! is_active_sidebar( 'five-footer-widget-area' )
            && ! is_active_sidebar( 'six-footer-widget-area' )
        ) : ?>
        <ul class="" role="complementary">
            <li class="col-2 first one-third left widget-area">
                <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
            </li><!-- .first .widget-area -->
         
            <li class="col-2 second one-third widget-area">
                <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
            </li><!-- .second .widget-area -->
         
            <li class="col-2 third one-third right widget-area">
                <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
            </li><!-- .third .widget-area -->
         
        </ul><!-- #fatfooter -->
        <?php
        elseif ( is_active_sidebar( 'first-footer-widget-area'  )
            && is_active_sidebar( 'second-footer-widget-area' )
            && ! is_active_sidebar( 'third-footer-widget-area'  )
            && ! is_active_sidebar( 'fourth-footer-widget-area' )
            && ! is_active_sidebar( 'five-footer-widget-area' )
            && ! is_active_sidebar( 'six-footer-widget-area' )
        ) : ?>
        <ul class="" role="complementary">
            <li class="col-2 first half left widget-area">
                <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
            </li><!-- .first .widget-area -->
         
            <li class="col-2 second half right widget-area">
                <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
            </li><!-- .second .widget-area -->
         
        </ul><!-- #fatfooter -->
        <?php
        elseif ( is_active_sidebar( 'first-footer-widget-area'  )
            && ! is_active_sidebar( 'second-footer-widget-area' )
            && ! is_active_sidebar( 'third-footer-widget-area'  )
            && ! is_active_sidebar( 'fourth-footer-widget-area' )
            && ! is_active_sidebar( 'five-footer-widget-area' )
            && ! is_active_sidebar( 'six-footer-widget-area' )
        ) :
        ?>
        <ul class="" role="complementary">
            <li class="col-2 first full-width widget-area">
                <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
            </li><!-- .first .widget-area -->
         
        </ul><!-- #fatfooter -->
    <?php //end of all sidebar checks.
    endif;endif;?>      
    </div>
</div>
<div class="footer-end">
    Copyright  ¬© 2015  Lux Royal(Thailand) Co.,Ltd. All Rights Reserved.
</div>

<?php include('footer.inc.php') ?>