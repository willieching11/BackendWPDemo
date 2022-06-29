<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('epic_acf_field_custom_button') ) :


class epic_acf_field_custom_button extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct( $settings ) {
		
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/
		
		$this->name = 'custom_button';
		
		
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		
		$this->label = __('Custom Button', 'acf-custom-button-field');
		
		
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		
		$this->category = 'choice';
		
		
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		
		$this->defaults = array(
			//'button_colors'	=> '',			
		);
		
		
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('custom_button', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> __('Error! Please enter a higher value', 'acf-custom-button-field'),
		);
		
		
		/*
		*  settings (array) Store plugin settings (url, path, version) as a reference for later use with assets
		*/
		
		$this->settings = $settings;
		
		
		// do not delete!
    	parent::__construct();
    	
	}
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*
		*  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
		*  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
		*
		*  More than one setting can be added by copy/paste the above code.
		*  Please note that you must also have a matching $defaults value for the field name (font_size)
		*/
		
		acf_render_field_setting( $field, array(
			'label'			=> __('Button Colors','acf-custom-button-field'),
			'type'			=> 'message',
			'name'			=> 'button_colors',
			'message'		=> 'Button Colors are set on the Custom Fields -> Button Options page',
		));

	}
	
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field, displays in CMS
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field( $field ) {
		$field_value = $field['value']?>		        
        
        <div class="acf-fields">
	        <?php // Button Type ?>
	        <div class="acf-field acf-field-button-type is-required" style="width: 50%; min-height: 85px;"  data-width="50" data-name="button_type" data-type="button_group" data-key="button_type" data-require="1">
	            <div class="acf-label">
	                <label for="acf-<?php echo $field['name'] ?>">Button Type <span class="acf-required">*</span></label>
	            </div>
	            <div class="acf-input">
	                <div class="acf-button-group">                    
	                    <label class="<?php echo (!empty($field_value) && ($field_value['button_type'] == 'internal_link')  || empty($field_value['button_type']) ) ? 'selected' : '' ?>">
	                        <input type="radio" name="<?php echo $field['name'].'[button_type]' ?>" value="internal_link" <?php echo (!empty($field_value) && $field_value['button_type'] == 'internal_link' || empty($field_value['button-type'])  ? 'checked' : '') ?>> Internal Link
	                    </label>
	                    <label class="<?php echo (!empty($field_value) && $field_value['button_type'] == 'external_link' ? 'selected' : '') ?>">
	                        <input type="radio" name="<?php echo $field['name'].'[button_type]' ?>" value="external_link" <?php echo (!empty($field_value) && $field_value['button_type'] == 'external_link' ? 'checked' : '') ?>> External Link
	                    </label>
	                    <label class="<?php echo (!empty($field_value) && $field_value['button_type'] == 'open_modal' ? 'selected' : '') ?>">
	                        <input type="radio" name="<?php echo $field['name'].'[button_type]' ?>" value="open_modal" <?php echo (!empty($field_value) && $field_value['button_type'] == 'open_modal' ? 'checked' : '') ?>> Open Modal
	                    </label>
	                </div>
	            </div>
	        </div>
			
			<?php // Button Open in New Window ?>
			<div class="acf-field acf-field-true-false show-external-link show-internal-link conditional acf-<?php echo str_replace('_', '-', $field['key']); echo ($field_value['button_type'] == 'open_modal' ? ' acf-hidden' : ''); ?> -r0" style="width: 50%; min-height: 85px;"  data-width="50" data-name="open_in_a_new_window" data-type="true_false" data-key="open_in_a_new_window">
				<div class="acf-label">
					<label for="acf-<?php echo $field['name'] ?>">Open in a New Window?</label>
				</div>
				<div class="acf-input">
					<div class="acf-true-false">
						<input type="hidden" name="<?php echo $field['name'].'[open_in_a_new_window]' ?>" value="0">	
						<label>
							<input type="checkbox" id="<?php echo $field['name'].'[open_in_a_new_window]' ?>" name="<?php echo $field['name'].'[open_in_a_new_window]' ?>" class="" autocomplete="off"
							<?php echo esc_attr(( !empty($field_value) && !empty($field_value['open_in_a_new_window']) ? 'checked' : '' )) ?>>
						</label>
					</div>
				</div>				
			</div>
			
			
	        <?php // Button Style
	        $button_colors = get_option( 'button_colors' ) ?? '';
	        $button_colors = str_replace(' ', '', $button_colors); 
	        $button_colors_array = explode(',', $button_colors); ?>
	        <div class="acf-field acf-field-radio acf-<?php echo str_replace('_', '-', $field['key']) ?> is-required -c0" style="width: 33%; min-height: 134px;" data-name="button_style" data-type="radio" data-key="button_style" data-width="33">
	            <div class="acf-label">
	                <label for="acf-<?php echo $field['name'].'[button-color]' ?>">Button Style <span class="acf-required">*</span> </label>
	            </div>
	            <div class="acf-input">
	                <input type="hidden" name="<?php echo $field['name'].'[button_style]' ?>">
	                <ul class="acf-radio-list acf-bl" data-allow_null="0" data-other_choice="0">
	                    <?php if(!empty($button_colors_array)): foreach($button_colors_array as $key=>$button_color):
	                        $button_color_title = ucwords(str_replace("-"," ",$button_color));
							$select_default = $key == 0 && empty($field_value['button_style']);
							?>
	                        <li>
	                            <label class="<?php echo (!empty($field_value) && $field_value['button_style'] == $button_color || $select_default ? 'selected' : '') ?>">
	                                <input type="radio" id="<?php echo $field['id'] . '-' . $button_color ?>" name="<?php echo $field['name'] .'[button_style]' ?>" value="<?php echo $button_color ?>" 
	                                    <?php echo (!empty($field_value) && $field_value['button_style'] == $button_color || $select_default ? 'checked' : '') ?>>
	                                <?php echo $button_color_title ?> 
	                            </label>
	                        </li>
	                    <?php endforeach; endif; ?>    
						<li>
							<label class="<?php echo (!empty($field_value) && $field_value['button_style'] == 'plain-text-link' ? 'selected' : '') ?>">
								<input type="radio" id="<?php echo $field['id'] . '-plain-text-link' ?>" name="<?php echo $field['name'] .'[button_style]' ?>" value="plain-text-link" 
									<?php echo (!empty($field_value) && $field_value['button_style'] == 'plain-text-link' || $select_default ? 'checked' : '') ?>>
								Plain Text Link
							</label>
						</li>                
	                </ul>
	            </div>
	        </div>
	        
	        
			
	        <?php // Button Text ?>    
	        <div class="acf-field acf-field-text acf-<?php echo str_replace('_', '-', $field['key']) ?>" style="width: 33%; min-height: 134px;" data-name="button_text" data-type="text" data-key="button_text" data-width="33">
	            <div class="acf-label">
	                <label for="<?php echo $field['id'].'-button-text' ?>">Button Text</label>
	            </div>
	            <div class="acf-input">
	                <div class="acf-input-wrap">
	                    <input type="text" id="<?php echo $field['id'].'-button-text' ?>" name="<?php echo $field['name'] .'[button_text]' ?>"
						value="<?php echo esc_attr( $field_value['button_text'] ?? $field['button_text'] ?? '' ) ?>" >
	                </div>
	            </div>
	        </div>
	        
	                
	        <?php // Button Internal Link ?>
			<div class="acf-field conditional show-internal-link acf-field-page-link acf-<?php echo str_replace('_', '-', $field['key']); echo ($field_value['button_type'] !== 'internal_link' ? ' acf-hidden' : ''); ?>" style="width: 33%; min-height: 134px;" data-name="internal_link" data-type="page_link" data-key="<?php echo $field['key'] ?>" data-width="33" >
	            <div class="acf-label">
	            <label for="<?php echo $field['id'].'-internal-link' ?>">Internal Link</label></div>
	            <div class="acf-input">
	                <input type="hidden" id="<?php echo $field['id'].'-button-link' ?>" name="<?php echo $field['name'] .'[internal_link]' ?>">
	                <select id="<?php echo $field['id'].'-internal-link' ?>" class="select2-hidden-accessible" name="<?php echo $field['name'] .'[internal_link]' ?>" data-ui="1" data-multiple="0" data-placeholder="Select" data-allow_null="0" tabindex="-1" aria-hidden="true" data-ajax="1">
						<?php if(!empty($field_value) && !empty($field_value['internal_link'])): ?>
							<option value="<?php echo $field_value['internal_link'] ?? ''?>" selected="selected" data-i="0"><?php echo get_the_title($field_value['internal_link']) ?></option>
						<?php endif; ?>
	                </select>				
	            </div>
	        </div> 
	        
			<?php // Button External Link ?>
	        <div class="acf-field conditional show-external-link acf-field-page-link acf-<?php echo str_replace('_', '-', $field['key']); echo ($field_value['button_type'] !== 'external_link' ? ' acf-hidden' : ''); ?>" style="width: 33%; min-height: 134px;" data-name="external_link" data-type="url" data-key="external_link" data-width="33" >
	            <div class="acf-label">
	            <label for="<?php echo $field['id'].'-external-link' ?>">External Link</label></div>    
				<div class="acf-input">
					<div class="acf-input-wrap acf-url">
						<i class="acf-icon -globe -small"></i>
						<input type="url" id="<?php echo $field['id'].'-external-link' ?>" name="<?php echo $field['name'] .'[external_link]' ?>"
						value="<?php echo esc_attr(( $field_value['external_link'] ?? $field['external_link'] ?? '')) ?>" >
					</div>
				</div>
	        </div>
			
			<?php // Button Open Modal Link ?>
	        <div class="acf-field conditional show-open-modal acf-field-page-link acf-<?php echo str_replace('_', '-', $field['key']); echo ($field_value['button_type'] !== 'open_modal' ? ' acf-hidden' : ''); ?>" style="width: 33%; min-height: 134px;" data-name="modal_id" data-type="text" data-key="modal_id" data-width="33" >
	            <div class="acf-label">
	            <label for="<?php echo $field['id'].'-modal-id' ?>">Modal ID</label></div>
				<div class="acf-input">
					<div class="acf-input-prepend">#</div>
					<div class="acf-input-wrap">
						<input type="text" id="<?php echo $field['id'].'-modal-id' ?>" name="<?php echo $field['name'] .'[modal_id]' ?>"
						value="<?php echo esc_attr(( $field_value['modal_id'] ?? $field['modal_id'] ?? '' )) ?>" >
					</div>
				</div>
	        </div>
        
        </div>
		<?php
	}
	
		
	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/


	
	function input_admin_enqueue_scripts() {
		
		// vars
		$url = $this->settings['url'];
		$version = $this->settings['version'];
		
		// register & include JS
		wp_register_script('acf-custom-button-field', "{$url}/inc/acf-field-button/input.js", array('acf-input'), $version);
		wp_enqueue_script('acf-custom-button-field');
		
		
		// register & include CSS
		// wp_register_style('acf-custom-button-field', "{$url}assets/css/input.css", array('acf-input'), $version);
		// wp_enqueue_style('acf-custom-button-field');
		
	}
	

	
	
	/*
	*  input_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
		
	function input_admin_head() {
	
		
		
	}
	
	*/
	
	
	/*
   	*  input_form_data()
   	*
   	*  This function is called once on the 'input' page between the head and footer
   	*  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and 
   	*  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
   	*  seen on comments / user edit forms on the front end. This function will always be called, and includes
   	*  $args that related to the current screen such as $args['post_id']
   	*
   	*  @type	function
   	*  @date	6/03/2014
   	*  @since	5.0.0
   	*
   	*  @param	$args (array)
   	*  @return	n/a
   	*/
   	
   	/*
   	
   	function input_form_data( $args ) {
	   	
		
	
   	}
   	
   	*/
	
	
	/*
	*  input_admin_footer()
	*
	*  This action is called in the admin_footer action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_footer)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
		
	function input_admin_footer() {
	
		
		
	}
	
	*/
	
	
	/*
	*  field_group_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
	*  Use this action to add CSS + JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function field_group_admin_enqueue_scripts() {
		
	}
	
	*/

	
	/*
	*  field_group_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is edited.
	*  Use this action to add CSS and JavaScript to assist your render_field_options() action.
	*
	*  @type	action (admin_head)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/

	/*
	
	function field_group_admin_head() {
	
	}
	
	*/


	/*
	*  load_value()
	*
	*  This filter is applied to the $value after it is loaded from the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	/*
	
	function load_value( $value, $post_id, $field ) {
		
		return $value;
		
	}
	
	*/
	
	
	/*
	*  update_value()
	*
	*  This filter is applied to the $value before it is saved in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value found in the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*  @return	$value
	*/
	
	/*
	
	function update_value( $value, $post_id, $field ) {
		
		return $value;
		
	}
	
	*/
	
	
	/*
	*  format_value()
	*
	*  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value (mixed) the value which was loaded from the database
	*  @param	$post_id (mixed) the $post_id from which the value was loaded
	*  @param	$field (array) the field array holding all the field options
	*
	*  @return	$value (mixed) the modified value
	*/
		
	/*
	
	function format_value( $value, $post_id, $field ) {
		
		// bail early if no value
		if( empty($value) ) {
		
			return $value;
			
		}
		
		
		// apply setting
		if( $field['font_size'] > 12 ) { 
			
			// format the value
			// $value = 'something';
		
		}
		
		
		// return
		return $value;
	}
	
	*/
	
	
	/*
	*  validate_value()
	*
	*  This filter is used to perform validation on the value prior to saving.
	*  All values are validated regardless of the field's required setting. This allows you to validate and return
	*  messages to the user if the value is not correct
	*
	*  @type	filter
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$valid (boolean) validation status based on the value and the field's required setting
	*  @param	$value (mixed) the $_POST value
	*  @param	$field (array) the field array holding all the field options
	*  @param	$input (string) the corresponding input name for $_POST value
	*  @return	$valid
	*/
	
	/*
	
	function validate_value( $valid, $value, $field, $input ){
		
		// Basic usage
		if( $value < $field['custom_minimum_setting'] )
		{
			$valid = false;
		}
		
		
		// Advanced usage
		if( $value < $field['custom_minimum_setting'] )
		{
			$valid = __('The value is too little!','acf-custom-button-field'),
		}
		
		
		// return
		return $valid;
		
	}
	
	*/
	
	
	/*
	*  delete_value()
	*
	*  This action is fired after a value has been deleted from the db.
	*  Please note that saving a blank value is treated as an update, not a delete
	*
	*  @type	action
	*  @date	6/03/2014
	*  @since	5.0.0
	*
	*  @param	$post_id (mixed) the $post_id from which the value was deleted
	*  @param	$key (string) the $meta_key which the value was deleted
	*  @return	n/a
	*/
	
	/*
	
	function delete_value( $post_id, $key ) {
		
		
		
	}
	
	*/
	
	
	/*
	*  load_field()
	*
	*  This filter is applied to the $field after it is loaded from the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0	
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	/*
	
	function load_field( $field ) {
		
		return $field;
		
	}	
	
	*/
	
	
	/*
	*  update_field()
	*
	*  This filter is applied to the $field before it is saved to the database
	*
	*  @type	filter
	*  @date	23/01/2013
	*  @since	3.6.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	$field
	*/
	
	/*
	
	function update_field( $field ) {
		
		return $field;
		
	}	
	
	*/
	
	
	/*
	*  delete_field()
	*
	*  This action is fired after a field is deleted from the database
	*
	*  @type	action
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	n/a
	*/
	
	/*
	
	function delete_field( $field ) {
		
		
		
	}	
	
	*/
	
	
}


// initialize
new epic_acf_field_custom_button( $this->settings );


// class_exists check
endif;

?>