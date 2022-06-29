<?php 
// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('epic_acf_custom_button') ) :

    class epic_acf_custom_button {
    	
    	// vars
    	var $settings;
    	
    	
    	/*
    	*  __construct
    	*
    	*  This function will setup the class functionality
    	*
    	*  @type	function
    	*  @date	17/02/2016
    	*  @since	1.0.0
    	*
    	*  @param	void
    	*  @return	void
    	*/
    	
    	function __construct() {
    		
    		// settings
    		// - these will be passed into the field class.
    		$this->settings = array(
    			'version'	=> '1.0.0',
    			'url'		=> get_template_directory_uri(),
    			// 'path'		=> _dir_path( __FILE__ )
    		);
    		
    		
    		// include field
    		add_action('acf/include_field_types', 	array($this, 'include_field')); // v5
            
            include_once('epic-custom-button-settings.php');
    	}
        
        
    	
    	
    	/*
    	*  include_field
    	*
    	*  This function will include the field type class
    	*
    	*  @type	function
    	*  @date	17/02/2016
    	*  @since	1.0.0
    	*
    	*  @param	$version (int) major ACF version. Defaults to false
    	*  @return	void
    	*/
    	
    	function include_field( $version = false ) {
    		
    		// support empty $version
    		if( !$version ) $version = 4;   		 
    		
    		
    		// include
    		include_once('class-epic-custom-button-v' . $version . '.php');
    	}
    	
    }


    // initialize
    new epic_acf_custom_button();


// class_exists check
endif;


 ?>