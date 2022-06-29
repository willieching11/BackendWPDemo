<?php

/** Basic theme setup and support. **/
require get_template_directory() . '/inc/theme-setup.php';

/** Script and Stylesheets **/
require get_template_directory() . '/inc/enqueue.php';

/** Adds Custom Button ACF Field Type **/
require get_template_directory() . '/inc/acf-field-button/epic-custom-button.php';

/** Coverts Wordpress menu to Bootstrap menu. **/
require get_template_directory() . '/inc/class-wp-bootstrap-walker.php';

/** Site General Function. Add your functions here **/
require get_template_directory() . '/inc/site-functions.php';

/** Site General Settings. Add various php code here **/
require get_template_directory() . '/inc/site-settings.php';

/** Custom Post Type declarations. **/
require get_template_directory() . '/inc/site-cpt.php';



