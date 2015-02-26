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
	    	    	
    </body>
</html>



	<? wp_footer();?>
	    	
    </body>
</html>


