<?php
//promobox widget
class Zara_Promobox_Widget extends WP_Widget{
	function __construct() {
            parent::__construct(
                'promobox_widget',
                __('Promo Box Widget', 'zara'),
                array( 'description' => __( 'Promo Box', 'zara' ), )
            );
        }
		
	
	public function widget( $args, $instance ) {
		
            echo $args['before_widget'];
			
			
			$promobox_column = array( $instance['promo_box_1'],
									  $instance['promo_box_2'],
									  $instance['promo_box_3'],
									  $instance['promo_box_4']
								);
			
			
			$count = array_count_values($promobox_column);
			
			$column_staus = $count['1'];
			
			if( $column_staus =='4' ){
				$size = 'col-lg-3 col-md-6' ;
			}
			elseif( $column_staus == '3' ){
				$size = 'col-lg-4 col-md-12';
			}
			elseif( $column_staus == '2' ){
				$size = 'col-lg-6 col-md-6';
			}
			else{
				$size = 'col-lg-12 col-md-12';
			}
			
			$box_1_status = $instance['promo_box_1'];
			$box_1_img	= $instance['box_one_image'];
			$box_1_title  = $instance['box_one_title'];
			$box_1_title_url  = $instance['box_one_title_url'];
			
			if( $box_1_status == 1 ): ?>
				
				<div class="promobox-section <?php echo esc_attr( $size ); ?>">
                	<div class="promobox-wrap">
                        <img src="<?php echo esc_url( $box_1_img ); ?>" alt="<?php esc_attr_e('Promobox','zara'); ?>" class="img-responsive"/>
                        <div class="promobox-title">
                            <a href="<?php echo esc_url( $box_1_title_url );?>" class="promobox-link">
                                <h6 class="title"><?php echo esc_html( $box_1_title ); ?></h6>
                            </a>
                        </div>
					</div>
                </div>
			
			<?php endif; ?>
            
            <?php
			//promobox two
			$box_2_status = $instance['promo_box_2'];
			$box_2_img	= $instance['box_two_image'];
			$box_2_title  = $instance['box_two_title'];
			$box_2_title_url  = $instance['box_two_title_url'];
            
			if( $box_2_status == 1 ): ?>
            
            	<div class="promobox-section <?php echo esc_attr( $size ); ?>">
                	<div class="promobox-wrap">
                        <img src="<?php echo esc_url( $box_2_img ); ?>" alt="<?php esc_attr_e('Promobox','zara'); ?>" class="img-responsive"/>
                        <div class="promobox-title">
                            <a href="<?php echo esc_url( $box_2_title_url );?>" class="promobox-link">
                                <h6 class="title"><?php echo esc_html( $box_2_title ); ?></h6>
                            </a>
                        </div>
					</div>
                </div>
            
            <?php endif; ?>
            
            <?php
			//promobox three
			$box_3_status = $instance['promo_box_3'];
			$box_3_img	= $instance['box_three_image'];
			$box_3_title  = $instance['box_three_title'];
			$box_3_title_url  = $instance['box_three_title_url'];
            
			if( $box_3_status == 1 ): ?>
            
            	<div class="promobox-section <?php echo esc_attr( $size ); ?>">
                	<div class="promobox-wrap">
                        <img src="<?php echo esc_url( $box_3_img ); ?>" alt="<?php esc_attr_e('Promobox','zara'); ?>" class="img-responsive"/>
                        <div class="promobox-title">
                            <a href="<?php echo esc_url( $box_3_title_url );?>" class="promobox-link">
                                <h6 class="title"><?php echo esc_html( $box_3_title ); ?></h6>
                            </a>
                        </div>
					</div>
                </div>
            
            <?php endif; ?>
            
            <?php
			//promobox four
			$box_4_status = $instance['promo_box_4'];
			$box_4_img	= $instance['box_four_image'];
			$box_4_title  = $instance['box_four_title'];
			$box_4_title_url  = $instance['box_four_title_url'];
            
			if( $box_4_status == 1 ): ?>
            
            	<div class="promobox-section <?php echo esc_attr( $size ); ?>">
                	<div class="promobox-wrap">
                        <img src="<?php echo esc_url( $box_4_img ); ?>" alt="<?php esc_attr_e('Promobox','zara'); ?>" class="img-responsive"/>
                        <div class="promobox-title">
                            <a href="<?php echo esc_url( $box_4_title_url );?>" class="promobox-link">
                                <h6 class="title"><?php echo esc_html( $box_4_title ) ; ?></h6>
                            </a>
                        </div>
					</div>
                </div>
            
            <?php endif; ?>
            
			<?php echo $args['after_widget'];
        }

    // Widget Backend
        public function form( $instance ) {
            
			//box one
			$defaults = array( 'promo_box_1' => 0, 
								'promo_box_2' => 0, 
								'promo_box_3' => 0, 
								'promo_box_4' => 0,
								'box_one_title' => '',
								'box_one_title_url' => '',
								'box_two_title' => '',
								'box_two_title_url' => '',
								'box_three_title' => '',
								'box_three_title_url' => '',
								'box_four_title' => '',
								'box_four_title_url' => '',
			);
			$instance = wp_parse_args( (array) $instance, $defaults );
			
			$image_one = '';
			
			if(isset($instance['box_one_image']))
			{
				$image_one = $instance['box_one_image'];
			}
			
			//box two
			
			$image_two = '';
			
			if(isset($instance['box_two_image']))
			{
				$image_two = $instance['box_two_image'];
			}
			
			//box three
			
			$image_three = '';
			
			if(isset($instance['box_three_image']))
			{
				$image_three = $instance['box_three_image'];
			}
			
			//box four
			
			$image_four = '';
			
			if(isset($instance['box_four_image']))
			{
				$image_four = $instance['box_four_image'];
			}
			
            // Widget admin form
            ?>
            
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'promo_box_1' ) ); ?>"><?php _e( 'Promo Box 1:', 'zara' ); ?></label>
                <input class="checkbox" type="checkbox" <?php checked( $instance['promo_box_1'] ); ?>  id="<?php echo esc_attr( $this->get_field_id( 'promo_box_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'promo_box_1' ) ); ?>" />
            </p>
            
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'box_one_title' ) ); ?>"><?php _e( 'Title:', 'zara' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'box_one_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'box_one_title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['box_one_title'] ); ?>" />
            </p>

             <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'box_one_title_url' ) ); ?>"><?php _e( 'Title Url:', 'zara' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'box_one_title_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'box_one_title_url' ) ); ?>" type="text" value="<?php echo esc_url( $instance['box_one_title_url'] ); ?>" />
            </p>
            
            <div class="cover-image">
                <label for="<?php echo esc_attr( $this->get_field_id( 'box_one_image' ) ); ?>"><?php _e( 'Box 1 Image:', 'zara' ); ?></label>
                <input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'box_one_image' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'box_one_image' ) ); ?>" value="<?php echo esc_url( $image_one ); ?>" />
               
                <input type="button" class="select-img button button-primary promobox-upload-btn" value="<?php esc_attr_e( 'Upload', 'zara' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'zara' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'zara' ); ?>" />
                <input type="button" value="<?php esc_attr_e( 'Remove', 'zara' ); ?>" class="button button-secondary btn-image-remove promobox-remove-btn"/>
            </div>
            
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'promo_box_2' ) ); ?>"><?php _e( 'Promo Box 2:', 'zara' ); ?></label>
                <input class="checkbox" type="checkbox" <?php checked( $instance['promo_box_2'] ); ?>  id="<?php echo esc_attr( $this->get_field_id( 'promo_box_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'promo_box_2' ) ); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'box_two_title' ) ); ?>"><?php _e( 'Title:', 'zara'); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'box_two_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'box_two_title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['box_two_title'] ); ?>" />
            </p>

             <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'box_two_title_url' ) ); ?>"><?php _e( 'Title Url:', 'zara' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'box_two_title_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'box_two_title_url' ) ); ?>" type="text" value="<?php echo esc_url( $instance['box_two_title_url'] ); ?>" />
            </p>
            
			<div class="cover-image">
                <label for="<?php echo esc_attr( $this->get_field_id( 'box_two_image' ) ); ?>"><?php _e( 'Box 2 Image:', 'zara' ); ?></label>
                <input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'box_two_image' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'box_two_image' ) ); ?>" value="<?php echo esc_url( $image_two ); ?>" />
                <input type="button" class="select-img button button-primary promobox-upload-btn" value="<?php esc_attr_e( 'Upload', 'zara' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'zara' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'zara' ); ?>" />
                <input type="button" value="<?php esc_attr_e( 'Remove', 'zara' ); ?>" class="button button-secondary btn-image-remove promobox-remove-btn"/>
            </div>
            
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'promo_box_3' ) ); ?>"><?php _e( 'Promo Box 3:', 'zara' ); ?></label>
                <input class="checkbox" type="checkbox" <?php checked( $instance['promo_box_3'] ); ?>  id="<?php echo esc_attr( $this->get_field_id( 'promo_box_3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'promo_box_3' ) ); ?>" />
            </p>
            
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'box_three_title' ) ); ?>"><?php _e( 'Title:', 'zara' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'box_three_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'box_three_title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['box_three_title'] ); ?>" />
            </p>

             <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'box_three_title_url' ) ); ?>"><?php _e( 'Title Url:', 'zara' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'box_three_title_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'box_three_title_url' ) ); ?>" type="text" value="<?php echo esc_url( $instance['box_three_title_url'] ); ?>" />
            </p>
            
            <div class="cover-image">
                <label for="<?php echo esc_attr( $this->get_field_id( 'box_three_image' ) ); ?>"><?php _e( 'Box 3 Image:', 'zara' ); ?></label>
                <input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'box_three_image' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'box_three_image' ) ); ?>" value="<?php echo esc_url( $image_three ); ?>" />

                <input type="button" class="select-img button button-primary promobox-upload-btn" value="<?php esc_attr_e( 'Upload', 'zara' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'zara' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'zara' ); ?>" />
                <input type="button" value="<?php esc_attr_e( 'Remove', 'zara' ); ?>" class="button button-secondary btn-image-remove promobox-remove-btn" />
            </div>
            
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'promo_box_4' ) ); ?>"><?php _e( 'Promo Box 4:', 'zara' ); ?></label>
                <input class="checkbox" type="checkbox" <?php checked( $instance['promo_box_4'] ); ?>  id="<?php echo esc_attr( $this->get_field_id( 'promo_box_4' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'promo_box_4' ) ); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'box_four_title' ) ); ?>"><?php _e( 'Title:', 'zara' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'box_four_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'box_four_title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['box_four_title'] ); ?>" />
            </p>

             <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'box_four_title_url' ) ); ?>"><?php _e( 'Title Url:', 'zara' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'box_four_title_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'box_four_title_url' ) ); ?>" type="text" value="<?php echo esc_url( $instance['box_four_title_url'] ); ?>" />
            </p>
            
			<div class="cover-image">
                <label for="<?php echo esc_attr( $this->get_field_id( 'box_four_image' ) ); ?>"><?php _e( 'Box 4 Image:', 'zara' )?></label>
                <input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'box_four_image' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'box_four_image' ) ); ?>" value="<?php echo esc_url( $image_four ); ?>" />
                <input type="button" class="select-img button button-primary promobox-upload-btn" value="<?php esc_attr_e( 'Upload', 'zara' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'zara' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'zara' ); ?>" />
                <input type="button" value="<?php esc_attr_e( 'Remove', 'zara' ); ?>" class="button button-secondary btn-image-remove promobox-remove-btn"/>
            </div>
            
        <?php
        }

    	// Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
        
		$instance = array();
		
		$instance['promo_box_1'] = (bool) $new_instance['promo_box_1'] ? 1 : 0;
        
		$instance['box_one_title'] = sanitize_text_field( $new_instance['box_one_title'] );

		$instance['box_one_title_url'] = esc_url_raw( $new_instance['box_one_title_url'] );
		
		$instance['box_one_image']	= esc_url_raw( $new_instance['box_one_image'] );
		
		$instance['promo_box_2'] = (bool) $new_instance['promo_box_2'] ? 1 : 0;
        
		$instance['box_two_title'] = sanitize_text_field( $new_instance['box_two_title'] );

		$instance['box_two_title_url'] = esc_url_raw( $new_instance['box_two_title_url'] );
		
		$instance['box_two_image']	= esc_url_raw( $new_instance['box_two_image'] );

		$instance['promo_box_3'] = (bool) $new_instance['promo_box_3'] ? 1 : 0;
        
		$instance['box_three_title'] = sanitize_text_field( $new_instance['box_three_title'] );

		$instance['box_three_title_url'] = esc_url_raw( $new_instance['box_three_title_url'] );
		
		$instance['box_three_image']	= esc_url_raw( $new_instance['box_three_image'] );
		
		$instance['promo_box_4'] = (bool) $new_instance['promo_box_4'] ? 1 : 0;
        
		$instance['box_four_title'] = sanitize_text_field( $new_instance['box_four_title'] );

		$instance['box_four_title_url'] = esc_url_raw( $new_instance['box_four_title_url'] );
		
		$instance['box_four_image']	= esc_url_raw( $new_instance['box_four_image'] );
		
        return $instance;
    }
}