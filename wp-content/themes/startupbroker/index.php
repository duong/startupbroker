<?php get_header(); ?>
<article id="dnn_ContentPane">
    <?php while ( have_posts() ) : 
        the_post(); 
        the_content();
    ?>
    <?php endwhile; // end of the loop. ?>
</article>
<?php get_footer(); ?>