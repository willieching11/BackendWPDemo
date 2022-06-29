<?php 
//Button Options Settings Page Under Custom Fields menu
add_action("admin_menu", "epic_custom_button_options_submenu");
function epic_custom_button_options_submenu() {
  add_submenu_page(
        'edit.php?post_type=acf-field-group',
        'Button Options',
        'Button Options',
        'administrator',
        'acf-custom-button-options',
        'acf_custom_button_content' );
}

function acf_custom_button_content() { 
    echo '<div class="wrap">
    	<h1>ACF Custom Button Field Settings</h1>
    	<form method="post" action="options.php">
            ';
         
    		settings_fields( 'acf_button_settings' ); // settings group name
    		do_settings_sections( 'acf-custom-button-slug' ); // just a page slug
            echo '<div>Remember to add these as btn classes in your css</div>
            <div style="margin-left:20px">Example:</div>
            <div style="margin-left:40px">.btn-blue{ background-color: blue; ... }</div>';
            submit_button();

    	echo '</form>';
        echo '</div>';
}

add_action( 'admin_init',  'acf_button_register_setting' );
 
function acf_button_register_setting(){
 
	register_setting(
		'acf_button_settings', // settings group name
		'button_colors', // option name
		'sanitize_text_field' // sanitization function
	);
 
	add_settings_section(
		'button-section-id', // section ID
		'', // title (if needed)
		'', // callback function (if needed)
		'acf-custom-button-slug' // page slug
	);
 
	add_settings_field(
		'button_colors',
		'Button Colors
            <div style="font-weight: 400;">Seperate options with a comma</div>',
		'acf_button_text_field_html', // function which prints the field
		'acf-custom-button-slug', // page slug
		'button-section-id', // section ID
		array( 
			'label_for' => 'button_colors',
			'class' => 'acf-button-colors', // for <tr> element
		)
	);
    
 
}
 
function acf_button_text_field_html(){ 
	$text = get_option( 'button_colors' ) ?: 'blue';

	printf(
		'<input type="text" id="button_colors" name="button_colors" value="%s" placeholder="blue, red-outline" />',
		esc_attr( $text )
	); 
}






/**************************************************************
 * Print Button
 * params
 ** Button - array returned by ACF Button Type 
 ** Additional Class(optional) - additional class to add to outer wrap of button
 **************************************************************/
function print_button($button, $additional_class = ''){
     // echo "<pre>Debug: ".print_r($button,1)."</pre>";
     if(!empty($button['button_text'])){  
         $button_type = $button['button_type'];
         $button_link = $button_type == 'internal_link' ? $button['internal_link'] : $button['external_link'];
         $button_link = is_numeric($button_link) ? get_permalink($button_link) : $button_link;
         $external_link= $button['open_in_a_new_window'] == true ? 'target="_blank"' : '';
         $modal_id = $button['modal_id'];
         $button_style = $button['button_style'] != 'plain-text-link' ? 'btn btn-'.$button['button_style'] : 'text-link';
         $button_text = $button['button_text']; 
         
         echo '<div class="btn-wrap ' . $additional_class . '">';
             if($button_type == 'open_modal' && !empty($modal_id)){    //open modal
                echo '<a class="' . $button_style . '" data-toggle="modal" data-target="#' . $modal_id . '">' .
                     $button_text .
                 '</a>';
             } else{ 
                echo '<a class="' . $button_style . '" href="' . $button_link . '" ' . $external_link . ' aria-label="' . $button_text . '">' . 
                     $button_text . 
                 '</a>';
             } 
        echo '</div>';
     } 
 }
 ?>