<?php
/**
 * The template for displaying 404 pages (not found)
 * @package Zara
 */

get_header(); ?>

<div class="row">
	<div class="col-md-12">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <section class="error-404 not-found text-center">
                    <div class="page-content">
                        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'zara' ); ?></p>
    
                        <?php get_search_form(); ?>
    
                    </div><!-- .page-content -->
                </section><!-- .error-404 -->
            </main><!-- #main -->
        </div><!-- #primary -->
	</div>
</div><!-- .row -->

<?php get_footer();
