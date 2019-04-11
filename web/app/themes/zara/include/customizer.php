<?php
/**
 * Zara: Customizer
 *
 * @package Zara
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 

function zara_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_image'  )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'zara_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'zara_customize_partial_blogdescription',
	) );
	
	
	/**
	 * Theme options.
	 */
	 $default = zara_default_theme_options();
	 
	 $wp_customize->add_panel( 'theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'zara' ),
			'priority'   => 200,
			'capability' => 'edit_theme_options',
		)
	);
	
	// Header Section.
	$wp_customize->add_section( 'section_header',
		array(
			'title'      => esc_html__( 'Header Options', 'zara' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting show_top_header.
	$wp_customize->add_setting( 'show_top_header',
		array(
			'default'           => $default['show_top_header'],
			'sanitize_callback' => 'zara_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'show_top_header',
		array(
			'label'    			=> esc_html__( 'Show Header - Top', 'zara' ),
			'section'  			=> 'section_header',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	// Setting top left header.
	$wp_customize->add_setting( 'left_section',
		array(
			'default'           => $default['left_section'],
			'sanitize_callback' => 'zara_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'left_section',
		array(
			'label'    			=> esc_html__( 'Top Header Left Section', 'zara' ),
			'section'  			=> 'section_header',
			'type'     			=> 'radio',
			'priority' 			=> 100,
			'choices'  			=> array(
									'contact'  => esc_html__( 'Contact Details', 'zara' ),
									'top-social' => esc_html__( 'Social Links', 'zara' ),
								),
			'active_callback' 	=> 'zara_is_top_header_active',
		)
	);
	
	// Setting top right header.
	$wp_customize->add_setting( 'right_section',
		array(
			'default'           => $default['right_section'],
			'sanitize_callback' => 'zara_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'right_section',
		array(
			'label'    			=> esc_html__( 'Top Header Right Section', 'zara' ),
			'section'  			=> 'section_header',
			'type'     			=> 'radio',
			'priority' 			=> 100,
			'choices'  			=> array(
									'contact'  => esc_html__( 'Contact Details', 'zara' ),
									'top-social' => esc_html__( 'Social Links', 'zara' ),
								),
			'active_callback' 	=> 'zara_is_top_header_active',
		)
	);
	
	// Setting facebook.
	$wp_customize->add_setting( 'facebook_link',
		array(
		
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'facebook_link',
		array(
			'label'    		=> esc_html__( 'facebook', 'zara' ),
			'description'      =>  __( 'e.g: http://example.com', 'zara' ),
			'section'  		  => 'section_header',
			'type'     		 => 'url',
			'priority' 		 => 100,
			'active_callback'  => 'zara_is_top_header_active',
		)
	);
	
	// Setting twitter.
	$wp_customize->add_setting( 'twitter_link',
		array(
		
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'twitter_link',
		array(
			'label'    		=> esc_html__( 'Twitter', 'zara' ),
			'description'      =>  __( 'e.g: http://example.com', 'zara' ),
			'section'  		  => 'section_header',
			'type'     		 => 'url',
			'priority' 		 => 100,
			'active_callback'  => 'zara_is_top_header_active',
		)
	);
	
	// Setting instagram.
	$wp_customize->add_setting( 'instagram_link',
		array(
		
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'instagram_link',
		array(
			'label'    		=> esc_html__( 'Instagram', 'zara' ),
			'description'      =>  __( 'e.g: http://example.com', 'zara' ),
			'section'  		  => 'section_header',
			'type'     		 => 'url',
			'priority' 		 => 100,
			'active_callback'  => 'zara_is_top_header_active',
		)
	);
	
	// Setting google_plus.
	$wp_customize->add_setting( 'google_link',
		array(
		
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control( 'google_link',
		array(
			'label'    		=> esc_html__( 'Google Plus', 'zara' ),
			'description'      =>  __( 'e.g: http://example.com', 'zara' ),
			'section'  		  => 'section_header',
			'type'     		 => 'url',
			'priority' 		 => 100,
			'active_callback'  => 'zara_is_top_header_active',
		)
	);
	
	// Setting Address.
	$wp_customize->add_setting( 'top_address',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'top_address',
		array(
			'label'    			=> esc_html__( 'Address/Location', 'zara' ),
			'section'  			=> 'section_header',
			'type'     			=> 'text',
			'priority' 			=> 100,
			'active_callback' 	=> 'zara_is_top_header_active',
		)
	);
	
	// Setting Phone.
	$wp_customize->add_setting( 'top_phone',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'top_phone',
		array(
			'label'    		  => esc_html__( 'Phone Number', 'zara' ),
			'section'  			=> 'section_header',
			'type'     		   => 'text',
			'priority' 		   => 100,
			'active_callback' 	=> 'zara_is_top_header_active',
		)
	);
	
	// Setting Email.
	$wp_customize->add_setting( 'top_email',
		array(
			'sanitize_callback' => 'sanitize_email',
		)
	);
	
	$wp_customize->add_control( 'top_email',
		array(
			'label'    		=> esc_html__( 'Email', 'zara' ),
			'section'  		  => 'section_header',
			'type'     		 => 'email',
			'priority' 		 => 100,
			'active_callback'  => 'zara_is_top_header_active',
		)
	);
	

	// Breadcrumb Section.
	$wp_customize->add_section( 'section_breadcrumb',
		array(
			'title'      => esc_html__( 'Breadcrumb Options', 'zara' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting breadcrumb_type.
	$wp_customize->add_setting( 'breadcrumb_type',
		array(
			'default'           => $default['breadcrumb_type'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'zara_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'breadcrumb_type',
		array(
			'label'       => esc_html__( 'Breadcrumb Type', 'zara' ),
			'section'     => 'section_breadcrumb',
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'disable' => esc_html__( 'Disable', 'zara' ),
				'normal'  => esc_html__( 'Normal', 'zara' ),
			),
		)
	);

	
	// Footer Section.
	$wp_customize->add_section( 'section_footer',
		array(
			'title'      => esc_html__( 'Footer Options', 'zara' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting copyright_text.
	$wp_customize->add_setting( 'copyright_text',
		array(
			'default'           => $default['copyright_text'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'copyright_text',
		array(
			'label'    => esc_html__( 'Copyright Text', 'zara' ),
			'section'  => 'section_footer',
			'type'     => 'text',
			'priority' => 100,
		)
	);
	
	
	// Footer Section.
	$wp_customize->add_section( 'section_font',
		array(
			'title'      => esc_html__( 'Typography Options', 'zara' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting copyright_text.
	$wp_customize->add_setting( 'font_text',
		array(
			'default'           => 'Rubik:300,400,500&subset=latin,latin-ext',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'font_text',
		array(
			'label'    => esc_html__( 'Font', 'zara' ),
			'section'  => 'section_font',
			'type'     => 'textarea',
			'priority' => 100,
		)
	);
	
	// Back To Top Section.
	$wp_customize->add_section( 'section_back_to_top',
		array(
			'title'      => esc_html__( 'Back To Top Options', 'zara' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting breadcrumb_type.
	$wp_customize->add_setting( 'back_to_top_type',
		array(
			'default'           => $default['back_to_top'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'zara_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'back_to_top_type',
		array(
			'label'       => esc_html__( 'Active?', 'zara' ),
			'section'     => 'section_back_to_top',
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'disable' => esc_html__( 'Disable', 'zara' ),
				'enable'  => esc_html__( 'Enable', 'zara' ),
			),
		)
	);
	
	// Slider Section.
	$wp_customize->add_section( 'featured_slider',
		array(
			'title'      => esc_html__( 'Slider Option', 'zara' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting slider.
	$wp_customize->add_setting( 'slider_status',
		array(
			'default'           => $default['slider_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'zara_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'slider_status',
		array(
			'label'       => esc_html__( 'Post Slider', 'zara' ),
			'description' => esc_html__('Note: Hide Header Image If you Want Post Slider.', 'zara' ),
			'section'     => 'featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	
	
	//post count
	$wp_customize->add_setting( 'slider_count',
		array(
			'default'           => absint( $default['slider_count'] ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'zara_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'slider_count',
		array(
			'label'       => esc_html__( 'Number Of Slider', 'zara' ),
			'section'     => 'featured_slider',
			'type'        => 'select',
			'priority'    => 100,
			'choices'     => array(
				'2' => esc_html__( '2', 'zara' ),
				'3'  => esc_html__( '3', 'zara' ),
				'4'  => esc_html__( '4', 'zara' ),
				'5'  => esc_html__( '5', 'zara' )
			),
		)
	);
	
	
	//post navigation
	$wp_customize->add_setting( 'slider_navigation',
		array(
			'default'           => $default['slider_navigation'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'zara_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'slider_navigation',
		array(
			'label'       => esc_html__( 'Post Navigation', 'zara' ),
			'section'     => 'featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//post pagination
	$wp_customize->add_setting( 'slider_pagination',
		array(
			'default'           => $default['slider_pagination'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'zara_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'slider_pagination',
		array(
			'label'       => esc_html__( 'Post Pagination', 'zara' ),
			'section'     => 'featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//post navigation
	$wp_customize->add_setting( 'slider_content',
		array(
			'default'           => $default['slider_content'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'zara_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'slider_content',
		array(
			'label'       => esc_html__( 'Post Content', 'zara' ),
			'section'     => 'featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//post time
	$wp_customize->add_setting( 'slider_time',
		array(
			'default'           => $default['slider_time'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'zara_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'slider_time',
		array(
			'label'       => esc_html__( 'Post Time', 'zara' ),
			'section'     => 'featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	// Setting post_excerpt.
	$wp_customize->add_setting( 'slider_post_excerpt',
		array(
			'default'           => absint( $default['slider_post_excerpt'] ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'slider_post_excerpt',
		array(
			'label'    => esc_html__( 'Post Excerpt', 'zara' ),
			'section'  => 'featured_slider',
			'type'     => 'text',
			'priority' => 100,
		)
	);
	
	
}
add_action( 'customize_register', 'zara_customize_register' );


/**
 * Sanitize the colorscheme.
 *
 * @param string $input Color scheme.
 */
function zara_sanitize_colorscheme( $input ) {
	$valid = array( 'light', 'dark', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Zara 1.0
 * @see zara_customize_register()
 *
 * @return void
 */
function zara_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Zara 1.0
 * @see zara_customize_register()
 *
 * @return void
 */
function zara_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function zara_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function zara_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

if ( ! function_exists( 'zara_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function zara_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;

if ( ! function_exists( 'zara_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function zara_sanitize_select( $input, $setting ) {

		// Ensure input is clean.
		$input = sanitize_text_field( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;


if ( ! function_exists( 'zara_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function zara_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['show_top_header'] 	= false;
		$defaults['left_section'] 		= 'contact';
		$defaults['right_section'] 		= 'top-social';

		//Back To Top
		$defaults['back_to_top']  	= 'disable';

		// Footer.
		$defaults['copyright_text'] 	= esc_html__( 'Copyright &copy; All rights reserved.', 'zara' );

		// Breadcrumb.
		$defaults['breadcrumb_type'] 	= 'disable';
		
		//slider active
		$defaults['slider_status'] = false;
		
		//slider count
		$defaults['slider_count'] = 2 ;
		
		//featured slider navigation
		$defaults['slider_navigation'] = true;
		
		//featured slider pagination
		$defaults['slider_pagination'] = true;
		
		//slider content
		$defaults['slider_content'] = false;
		
		//slider date
		$defaults['slider_time'] = false;
		
		//featured slider excerpt
		$defaults['slider_post_excerpt'] = 25;
		
		return $defaults;
	}

endif;

if ( ! function_exists( 'zara_is_top_header_active' ) ) :

	/**
	 * Check if featured slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function zara_is_top_header_active( $control ) {

		if ( true == $control->manager->get_setting( 'show_top_header' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'zara_get_option' ) ) :

	/**
	 * Get theme option.
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function zara_get_option( $key ) {

		if ( empty( $key ) ) {

			return;

		}

		$value 			= '';

		$default 		= zara_default_theme_options();

		$default_value 	= null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {

			$default_value = $default[ $key ];

		}

		if ( null !== $default_value ) {

			$value = get_theme_mod( $key, $default_value );

		}else {

			$value = get_theme_mod( $key );

		}

		return $value;

	}

endif;
if ( ! function_exists( 'twentyseventeen_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see zara_custom_header_setup().
 */
function zara_header_style() { 

$header_text_color = get_header_textcolor();
	if( !empty( $header_text_color ) ): ?>
		<style type="text/css">
			   .site-header a,
			   .site-header p{
					color: #<?php echo esc_attr( $header_text_color ); ?>;
			   }
		</style>
			
		<?php
	endif;
}

endif;

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function zara_customize_preview_js() {
	wp_enqueue_script( 'zara-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'zara_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function zara_panels_js() {
	wp_enqueue_script( 'zara-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'zara_panels_js' );
