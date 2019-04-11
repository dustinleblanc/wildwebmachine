<?php
/**
 * Template part for displaying posts
 * @package Zara
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
		<?php endif; ?>

        <header class="entry-header">
            
            <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
        
        	<ul class="entry-meta list-inline">
                
				<?php zara_posted_on(); ?>
                
				<?php if( has_category()):
                        echo '<li class="meta-categories list-inline-item"><i class="fa fa-circle" aria-hidden="true"></i>';
                            the_category( ',' );
                        echo '</li>';
				endif; ?>
                
				<li class="meta-comment list-inline-item">
                    <?php $cmt_link = get_comments_link(); 
						  $num_comments = get_comments_number();
							if ( $num_comments == 0 ) {
								$comments = __( 'No Comments', 'zara' );
							} elseif ( $num_comments > 1 ) {
								$comments = $num_comments . __( ' Comments', 'zara' );
							} else {
								$comments = __('1 Comment', 'zara' );
							}
					?>	
					<i class="fa fa-circle" aria-hidden="true"></i>
                    <a href="<?php echo esc_url( $cmt_link ); ?>"><?php echo esc_html( $comments );?></a>
                </li>
                
			</ul>
        
        </header><!-- .entry-header -->
        
        <div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

	</div>
</article><!-- #post-## -->
