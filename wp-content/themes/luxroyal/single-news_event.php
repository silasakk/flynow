<?php include('header.inc.php') ?>

<?php if(have_posts()): 
	while(have_posts()):
		the_post();
?>

<div class="content">

    <div class="content-nav">
        <div class="container">
            <div class="content-nav-title text-title">NEWS & EVENTS</div>
            <div class="content-nav-menu pull-right">
                <ul>
                    <li>HOME</li>
                    <li>NEWS & EVENTS</li>
                    <li><?php the_title(); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="content-news">
            <div class="col-4">
                <div class="content-news-left">
                    <ul>
                        <li>
                            <img src="images/ico-calendar.png" width="25" height="25">
                            <div class="text-title"><strong>DATE</strong></div>
                            <span><?php the_date('d - F - Y') ?></span>
                        </li>
                        <li>
                            <img src="images/ico-time.png" width="25" height="25">
                            <div class="text-title"><strong>TIME</strong></div>
                            <span><?php the_time('g,i a') ?></span>
                        </li>
                        <li>
                            <img src="images/ico-pen.png" width="25" height="25">
                            <div class="text-title"><strong>PUBLIC BY</strong></div>
                            <span><?php the_author(); ?></span>
                        </li>
                        <li>
                            <div class="text-title">SHARE</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-8">
                <div class="content-news-right">
                    <h1 class="text-title"><strong><?php the_title(); ?></strong></h1>
                    <p><?php the_excerpt(); ?></p>
                    <hr>
                    <p><?php the_content(); ?></p>
                </div>
            </div>
        </div>
    </div>


</div>

<?php endwhile;
else: ?>
<?php endif ?>

<div class="footer-end">
    Copyright  ¬© 2015  Lux Royal(Thailand) Co.,Ltd. All Rights Reserved.
</div>

<?php include('footer.inc.php') ?>
