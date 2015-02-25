<!DOCTYPE html>
<html ng-app="app">
    <head> 
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">        
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '343418495864118',
              xfbml      : true,
              version    : 'v2.2'
            });
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
        </script>

        <?php wp_head(); ?>

    </head>
    <body>
    	<div id="header">
	    	<div class="header-bar">
                <div class="container">
                    <div class="sw-lang">
                        <a class="btn-lang">TH</a>
                        <a class="active btn-lang">EN</a>
                    </div>
                    <div class="head-tools">
                        <input type="text" class="search-field" placeholder="SEARCH..." />
                        <button class="btn-s"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="head-con">
                    <div id="logo"></div>
                    <div class="information">
                        <p class="time-info hide-mobile">เวลาทำการวันจันทร์ - ศุกร์ เวลา 09.00 น. - 18.00 น.</p>
                        <p>
                            <img width="15" class="hide-mobile" src="<?php echo get_template_directory_uri() ?>/assets/images/phone.png" />
                            <strong class="hi">CALL CENTER</strong>
                            <span>(02) 381-5115</span>
                        </p>
                        <p>
                            <img width="15" class="hide-mobile" src="<?php echo get_template_directory_uri() ?>/assets/images/followus.png" />
                            <strong class="hi">FOLLOW US</strong>
                            <span>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/fb-icon.png" />
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/tw-icon.png" />
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/yt-icon.png" />
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/gg-icon.png" />
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div id="nav">
                <div class="container">
                    <div class="menu-mobile" ><i class="fa fa-bars"></i> MENU</div>
                    <?php
                    wp_nav_menu( array('theme_location' => 'header-menu','container' => '') );
                    ?>
                    
                </div>
            </div>
    	</div>
