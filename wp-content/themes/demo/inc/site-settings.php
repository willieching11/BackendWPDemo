<?php 
/*********************************************************************
 * Adds "Site General Settings" to admin bar via Advanced Custom Fields
 **********************************************************************/
if( function_exists('acf_add_options_page') ) {

    $parent_option = acf_add_options_page(array(
        'page_title'    => 'Site General Settings',
        'menu_title'    => 'Site General Settings',
        'menu_slug'     => 'site-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Footer Settings',
    //     'menu_title'    => 'Footer Settings',
    //     'parent_slug'   => $parent_option['menu_slug']
    // ));
}
add_filter('wpcf7_autop_or_not', '__return_false');
remove_filter ('acf_the_content', 'wpautop');

/*********************************************************************
 * Register Nav Menus
 **********************************************************************/
register_nav_menus(
	array(
		'Main' => __( 'Main Menu', 'epicpress' ),
		//'footer' => __( 'Footer Menu', 'epicpress' ),
	)
);

/***********************************************************************
 * Async load option in enqueue-scripts (allows a user to put "#asyncload" to async a JS file)
 **********************************************************************/
function custom_async_scripts($url){
    $options = ['#asyncload', '#deferload'];
    if ( strpos( $url, '#asyncload') == false && strpos( $url, '#deferload') == false ){
    }elseif ( is_admin() ){
        $url = str_replace( $options, '', $url );
    }elseif ( strpos( $url, '#asyncload') == true ){
        $url = str_replace( '#asyncload', '', $url )."' async='async";
    }elseif ( strpos( $url, '#deferload') == true ){
        $url = str_replace( '#deferload', '', $url )."' defer='defer";
    }
    return $url;
}
add_filter( 'clean_url', 'custom_async_scripts', 11, 1 );



/*********************************************************************
 * Start session if needed
 **********************************************************************/
function register_my_session(){
  if( !session_id() || session_status() == PHP_SESSION_NONE ){
    session_start();
  }
}
add_action('init', 'register_my_session');


/***********************************************************************
 * Disable Gutenberg
 **********************************************************************/
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

 /***********************************************************************
 * Image Quality adjustment so that resized images aren't crappy crap
 * (needed for high qualithy responsive images)
 **********************************************************************/
add_filter('jpeg_quality', function($arg){return 100;});


/**************************************************************
 * Style Wp-admin sign in page and reset password page
 *
 * https://codex.wordpress.org/Customizing_the_Login_Form
 **************************************************************/
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Wordpress Login';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );

function my_login_logo() {
    //TODO: Replace me with Site Logo
    //$logo = get_field('site_logo', 'option');
?>
    <style type="text/css">
        body.login{
           background-color: #fff;
        }
        #login h1 a, .login h1 a {
            /* background-image: url('<?php //echo $logo['sizes']['large']; ?>'); */
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/WordPress_blue_logo.svg/1024px-WordPress_blue_logo.svg.png');
            padding-bottom: 10px;
            width: 300px;
            height: 100px;
        }    
        #login .submit .button-primary{
            background-color: #aaa;
            border: none;
            color: #fff;
            border-radius: 0;
        }
        #login #nav a, #login #backtoblog a{
            color: #000;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

//Add other Site Settings here

//Change appearance->customize menu in CMS to hide un-used elements
function epicpress_remove_sections( $wp_customize ) {

	// $wp_customize->remove_section('header_image');
	// $wp_customize->remove_panel('nav_menus');
	//$wp_customize->remove_panel('widgets');
	//$wp_customize->remove_section('custom_css');	
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');
	//$wp_customize->remove_section('static_front_page');	 
	// $wp_customize->remove_section('title_tagline');	
    $wp_customize->remove_control('custom_logo');
}

add_action( 'customize_register', 'epicpress_remove_sections');
?>