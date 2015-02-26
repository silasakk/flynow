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
                    <li><a href="<?php echo site_url(); ?>">Home</li>
                    <li><a href="<? echo get_post_type_archive_link('blog') ?>">Blog</a></li>
                    <li class="hide-mobile"><a href="<? echo the_permalink(); ?>"><?php the_titlesmall('', '...', true, '30') ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="blog-top">
            <div class="col-9 col-sm-12">
                <div class="con-warp">
                    <?
                    if ( has_post_thumbnail() )
                        echo get_the_post_thumbnail(get_the_ID(),'full');
                    else
                        echo '<img src="http://placehold.it/800x600&text=Image" alt="title" title="title" />';
                    ?>

                    <div class="caption">
                        <h1><?php the_title(); ?></h1>
                        <p> <?php
                            $terms = get_the_terms( $post->ID, 'blog_category' );
                                                    
                            if ( $terms && ! is_wp_error( $terms ) ) :

                                $name = array();

                                foreach ( $terms as $term ) {
                                    $name[] = '<a target="_blank" href="'.get_term_link($term).'">'.$term->name.'</a>';
                                    $tax_query[] = $term->term_id;
                                }
                                                    
                                $name = join( " , ", $name );

                             ?>

                            <span><i class="fa fa-bars"></i> <?php echo $name; ?></span>

                            <?php endif; ?>

                            DATE / <?php the_date('dS F Y') ?>
                        </p>
                            <div id="usocial"></div>
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="blog-con">
                    <h1 class="text-title"><strong><?php the_title(); ?></strong></h1>
                    <p><?php if(has_excerpt(get_the_ID())) the_excerpt(); ?></p>
                    <hr>
                    <p><?php the_content(); ?></p>
                </div>

                <div class="interest hide-mobile">
                    <p class="blog-relate-title text-title center"><strong>Might Be Interesting</strong></p>
                
                <div class="blog-relate2">
                    <ul>
                    <?php 
                    $args = array(

                            'post_type' => 'blog',
                        'posts_per_page' => '2',
                        'orderby' => 'id',
                        'order' => 'random',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'blog_category',
                                'field'    => 'slug',
                                'terms'    => 'it-news',
                            ),
                        ),
                    );

                    // The Query
                    $the_query = new WP_Query( $args );

                        if($the_query->have_posts()): 
                        while($the_query->have_posts()):
                            $the_query->the_post();

                    ?>
                        <li class="col-6">
                                
                                <div class="blog-relate3-item">
                                    <a href="<? echo the_permalink() ?>" >
                                        <?php 
                                        if ( has_post_thumbnail() )
                                            echo get_the_post_thumbnail(get_the_ID(),'full');
                                        else
                                            echo '<img  src="http://placehold.it/345x220&text=Image" alt="title" title="title" />';

                                        ?>
                                    </a>
                                    <div class="caption">
                                        <div class="pull-left" style="width:60%"><?php the_title() ?></div>
                                        <div class="pull-right center" style="width:40%"><?php the_date('d m Y') ?></div>
                                    </div>
                                    <div class="div-hover">
                                        <a href="<? echo the_permalink() ?>" >
                                        <div class="content-hover">
                                            <h1><?php the_title() ?></h1>
                                            
                                        </div>
                                        </a>
                                        <div class="caption caption-bar">
                                            
                                                <?php
                                                $terms = get_the_terms( $post->ID, 'blog_category' );
                                                                        
                                                if ( $terms && ! is_wp_error( $terms ) ) : 

                                                    $name = array();

                                                    foreach ( $terms as $term ) {
                                                        $name[] = '<a target="_blank" href="'.get_term_link($term).'">'.$term->name.'</a>';
                                                        $tax_query[] = $term->term_id;
                                                    }
                                                                        
                                                    $name = join( " , ", $name );

                                                 ?>

                                                <span><i class="fa fa-bars"></i> <?php echo $name; ?></span>
                                                <?php endif; ?>
                                           
                                                <a href="<? the_permalink() ?>" class="readmore">READ MORE</a>

                                          

                                        </div>
                                    </div>
                                </div>
                            
                        </li>
                    <?php endwhile;endif ?>
                       
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-3 col-sm-12">
                <div class="blog-recent">
                    <h1><strong>RECENT</strong> BLOG</h1>
                    <ul>
                    <?php 
                    $args = array(
                            "post_type"     => 'blog',
                            "posts_per_page"         => '4',
                            'orderby'       => 'id',
                            'order'         => 'DESC',
                            );

                    $the_query = new WP_Query( $args );

                        if($the_query->have_posts()): 
                        while($the_query->have_posts()):
                            $the_query->the_post();
                    ?>
                        <li class="col-sm-6 col-xs-12">
                            <a href="<? the_permalink() ?>">
                                <?
                                    if ( has_post_thumbnail() )
                                        echo get_the_post_thumbnail(get_the_ID(),array( 70, 70));
                                    else
                                        echo '<img src="http://placehold.it/70&text=Image" alt="title" title="title" />';
                                    ?>
                                    <p class="title"><?php the_titlesmall('', '...', true, '40') ?><p>
                                    <p class="date"><?php echo get_the_date('d - F - Y') ?></p>
                                    <?php
                                        $terms = get_the_terms( get_the_ID(), 'blog_category' );
                                                                
                                        if ( $terms && ! is_wp_error( $terms ) ) : 

                                            $name = array();

                                            foreach ( $terms as $term ) {
                                                $name[] = '<a target="_blank" href="'.get_term_link($term).'">'.$term->name.'</a>';
                                            }
                                                                
                                            $name = join( " , ", $name );
                                     ?>
                                    <p><i class="fa fa-bars"></i> <?php echo $name ?></p>
                                     <?php endif; ?>        
                            </a>
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