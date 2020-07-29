<?php get_header(); ?>

<?php if( have_posts() ) : ?>
    <div class="container">             
        <?php while ( have_posts() ) : the_post();?>    
        <?php endwhile; ?>
    </div>
    <?php else: ?>
    <?php endif; ?>
    <?php wp_reset_query()?>
       

<?php get_footer();?>