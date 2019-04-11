<?php
/**
 * Displays footer site info
 *
 * @package Zara
 */

?>

<div class="site-info">
	<?php $copyright_text = zara_get_option( 'copyright_text' ); 
    
        if ( ! empty( $copyright_text ) ) : ?>
    
            <p><?php echo wp_kses_data( $copyright_text ); ?></p> 
    
    <?php endif; ?>
        <a href="<?php echo esc_url( __( 'http://www.abileweb.com/', 'zara' ) ); ?>"><?php printf( __( 'Designed by %s', 'zara' ), 'Abileweb' ); ?></a>
</div><!-- .site-info -->
