<?php /**
 * Enqueue scripts and styles.
 */
function epicpress_scripts() {
	$css_path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, get_template_directory() . '/dist/css/app.css' );
	$js_path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, get_template_directory() . '/dist/js/app.js' );
	$css_version = file_exists($css_path) ? filemtime( $css_path ) : '1';
	$js_version = file_exists($js_path) ? filemtime( $js_path ) : '1';

	/**** Owl Carousel Style ****/
	// wp_enqueue_style( 'owlCarousel2', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), '2.3.4', 'all' );

	/*------Site Styles ----*/
	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/dist/css/app.css' , array(), $css_version );
	wp_style_add_data( 'main-style', 'rtl', 'replace' );
	
	
	/*------JQuery ----*/
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false );
	wp_deregister_script( 'jquery-migrate' );
	wp_register_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', false );	
	
	
	/*------Site Scripts ----*/
	wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/dist/js/app.js', array(), $js_version, true );
	
	
	/**** Global PHP and JS variables ****/
	global $post;
	$post_name = $post!=null ? $post->post_name : '';
	define( 'BP_MEDIUM', '768');
	define( 'BP_LARGE', '1440');
	
	wp_localize_script('main-scripts', 'site', array( 	//i.e. <script> ajaxurl=site.ajax_url </script>
		'theme_url' => get_template_directory_uri(),
		'post_name' => $post_name,
		'ajax_url' => admin_url("admin-ajax.php"),
		'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...'),
		'bp_md'	=> BP_MEDIUM,
		'bp_lg'	=> BP_LARGE,
	));
	
	
	/**** Owl Carousel Script ****/
	// wp_enqueue_script( 'owl-carousel-2', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array(), '2.3.4', false );

}
add_action( 'wp_enqueue_scripts', 'epicpress_scripts' );

 ?>