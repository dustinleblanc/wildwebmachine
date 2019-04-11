<?php
/**
 * The template for displaying all single posts
 * @package Zara
 */

get_header(); ?>
<div class="row">
	<div class="col-md-8">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
    
                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
    
                    get_template_part( 'template-parts/post/single');
					
					the_post_navigation( array(
                        'prev_text' => '<span class="previous-label">' . __( 'Previous', 'zara' ) . '</span>
						<div class="nav-post">
							<span class="nav-title-icon"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
							<span class="nav-title">%title</span>
						</div>',
                        'next_text' => '<span class="next-label">' . __( 'Next', 'zara' ) . '</span>
						<div class="nav-post">
							<span class="nav-title">%title</span>
							<span class="nav-title-icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
						</div>',
                    ) );
    
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
    
    
                endwhile; // End of the loop.
                ?>
    
            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
    <div class="col-md-4">
		<?php get_sidebar(); ?>
   	</div>
</div>
<?php get_footer();
