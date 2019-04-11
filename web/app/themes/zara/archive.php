<?php
/**
 * The template for displaying archive pages
 * @package Zara
 */

get_header(); ?>

<div class="row">
	<div class="col-md-8">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
    
            <?php
            if ( have_posts() ) : ?>
                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
    
                    get_template_part( 'template-parts/post/content');
    
                endwhile;
    
                the_posts_pagination();
    
            else :
    
                get_template_part( 'template-parts/post/content', 'none' );
    
            endif; ?>
    
            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
    <div class="col-md-4">
		<?php get_sidebar(); ?>
    </div>
</div><!-- .row -->

<?php get_footer();
