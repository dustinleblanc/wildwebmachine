<?php
/**
 * Displays header site branding
 *
 * @package Zara
 */

?>
<?php
$header_status = zara_get_option( 'show_top_header' );
	if ( 1 == $header_status ) {
		
			$top_address    = zara_get_option( 'top_address' );
			$top_phone      = zara_get_option( 'top_phone' );
			$top_email      = zara_get_option( 'top_email' );
			$facebook_link  = zara_get_option( 'facebook_link' );
			$twitter_link  = zara_get_option( 'twitter_link' );
			$instagram_link  = zara_get_option( 'instagram_link' );
			$google_link  = zara_get_option( 'google_link' );

			$left_section  	= zara_get_option( 'left_section' );
			$right_section  = zara_get_option( 'right_section' );

			?>
            
            <div class="col-md-6">
                <div class="header-left">
    
                    <?php 
                    if( 'contact' == $left_section && ( !empty( $top_address ) || !empty( $top_phone ) || !empty( $top_email ) ) ){ ?>
    
                        <ul class="contact-info list-inline">
                            <?php if( !empty( $top_address ) ){ ?>
                                <li class="address list-inline-item">
                                	<i class="fa fa-map-marker" aria-hidden="true"></i> 
									<p><?php echo esc_html( $top_address ); ?></p>
                                </li>
                            <?php } ?>
    
                            <?php if( !empty( $top_phone ) ){ ?>
                                <li class="phone list-inline-item">
                                	<i class="fa fa-phone" aria-hidden="true"></i>
                                    <p><?php echo esc_html( $top_phone ); ?></p>
                                </li>
                            <?php } ?>
    
                            <?php if( !empty( $top_email ) ){ ?>
                                <li class="email list-inline-item">
                                	<i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <a href="mailto:<?php echo sanitize_email( $top_email ); ?>">
                                            <?php echo sanitize_email( $top_email ); ?>
                                        </a>
                                </li>
                            <?php } ?>
                            
                        </ul>
                        <?php
                    } elseif( 'top-social' == $left_section &&  ( !empty( $facebook_link ) || !empty( $twitter_link ) || !empty( $instagram_link ) || !empty( $google_link ) )){ ?>
    
                        <ul class="social-info list-inline">
                            <?php if( !empty( $facebook_link ) ){ ?>
                                <li class="facebook list-inline-item">
                                	<a href="<?php echo esc_url( $facebook_link ); ?>">
                                    	<i class="fa fa-facebook aria-hidden="true""></i>
                                   	</a>
                                </li>
                            <?php } ?>
    
                            <?php if( !empty( $twitter_link ) ){ ?>
                                <li class="twitter list-inline-item">
                                	<a href="<?php echo esc_url( $twitter_link ); ?>">
                                    	<i class="fa fa-twitter aria-hidden="true""></i>
                                   	</a>
                                </li>
                            <?php } ?>
    
                            <?php if( !empty( $instagram_link ) ){ ?>
                                <li class="instagram list-inline-item">
                                	<a href="<?php echo esc_url( $instagram_link ); ?>">
                                    	<i class="fa fa-instagram aria-hidden="true""></i>
                                   	</a>
                                </li>
                            <?php } ?>
                            <?php if( !empty( $google_link ) ){ ?>
                                <li class="google list-inline-item">
                                	<a href="<?php echo esc_url( $google_link ); ?>">
                                    	<i class="fa fa-google-plus" aria-hidden="true"></i> 
                                   	</a>
                                </li>
                            <?php } ?>
                            
                        </ul>
                        <?php
                    } ?>
                </div><!-- .header-left -->
            </div>
            <div class="col-md-6">
                <div class="header-right">
    
                    <?php 
                    if( 'contact' == $right_section && ( !empty( $top_address ) || !empty( $top_phone ) || !empty( $top_email ) ) ){ ?>
    
                        <ul class="contact-info list-inline">
                            <?php if( !empty( $top_address ) ){ ?>
                                <li class="address list-inline-item">
                                	<i class="fa fa-map-marker" aria-hidden="true"></i>
									<p><?php echo esc_html( $top_address ); ?></p>
                                 </li>
                            <?php } ?>
    
                            <?php if( !empty( $top_phone ) ){ ?>
                                <li class="phone list-inline-item">
                                	<i class="fa fa-phone" aria-hidden="true"></i> 
									<p><?php echo esc_html( $top_phone ); ?></p>
                                </li>
                            <?php } ?>
    
                            <?php if( !empty( $top_email ) ){ ?>
                                <li class="email list-inline-item"><i class="fa fa-envelope-o" aria-hidden="true"></i>
									<a href="mailto:<?php echo sanitize_email( $top_email ); ?>">
										<?php echo sanitize_email( $top_email ); ?>
                                    </a>
								</li>
                            <?php } ?>
                            
                        </ul>
                        <?php
                    }  elseif('top-social' == $right_section &&  ( !empty( $facebook_link ) || !empty( $twitter_link ) || !empty( $instagram_link ) || !empty( $google_link ) )){ ?>
    
                        <ul class="social-info list-inline">
                            <?php if( !empty( $facebook_link ) ){ ?>
                                <li class="facebook list-inline-item">
                                	<a href="<?php echo esc_url( $facebook_link ); ?>">
                                    	<i class="fa fa-facebook aria-hidden="true""></i>
                                   	</a>
                                </li>
                            <?php } ?>
    
                            <?php if( !empty( $twitter_link ) ){ ?>
                                <li class="twitter list-inline-item">
                                	<a href="<?php echo esc_url( $twitter_link ); ?>">
                                    	<i class="fa fa-twitter aria-hidden="true""></i>
                                   	</a>
                                </li>
                            <?php } ?>
    
                            <?php if( !empty( $instagram_link ) ){ ?>
                                <li class="instagram list-inline-item">
                                	<a href="<?php echo esc_url( $instagram_link ); ?>">
                                    	<i class="fa fa-instagram aria-hidden="true""></i>
                                   	</a>
                                </li>
                            <?php } ?>
                            <?php if( !empty( $google_link ) ){ ?>
                                <li class="google list-inline-item">
                                	<a href="<?php echo esc_url( $google_link ); ?>">
                                    	<i class="fa fa-google-plus" aria-hidden="true"></i> 
                                   	</a>
                                </li>
                            <?php } ?>
                            
                        </ul>
					<?php } ?>
                </div><!-- .header-right -->
            </div>

<?php } ?>
