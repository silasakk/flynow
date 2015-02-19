
<h1>This is Taxonomy page for showing posts under the each Term</h1>

<?php

if (have_posts()) :
    
    /* Start the Loop */
    while (have_posts()) : the_post(); ?>

	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <?php endwhile;

endif; ?>

