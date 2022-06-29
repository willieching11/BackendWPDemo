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