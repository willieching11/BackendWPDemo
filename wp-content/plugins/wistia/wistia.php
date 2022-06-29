<?php
 
/*
 
Plugin Name: Wistia
 
Plugin URI: https://wistia.com/
 
Description: Plugin that uses Wistia to display a video on the homepage
 
Version: 1.0
 
Author: Willie Ching
 
Author URI: https://willieching.com/
 
License: GPLv2 or later
 
Text Domain: willieching
 
*/

function add_wistia_video(){
    echo '<script src="//fast.wistia.com/assets/external/E-v1.js" async></script>
    <div class="wistia_embed wistia_async_sajsbs1vl5" style="width:640px;height:360px;"></div>';
}

function ajax_login(){
    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();

    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }

    die();
}
add_action('wp_ajax_ajax_login', 'ajax_login');
add_action('wp_ajax_nopriv_ajax_login', 'ajax_login');

function ajax_check_user_logged_in() {
    
    echo json_encode(array('loggedin'=>is_user_logged_in()));
    
    die();
}
add_action('wp_ajax_is_user_logged_in', 'ajax_check_user_logged_in');
add_action('wp_ajax_nopriv_is_user_logged_in', 'ajax_check_user_logged_in');