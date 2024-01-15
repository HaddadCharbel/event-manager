<?php
/*
Plugin Name: Events demo
Description: Event Listing.
Version: 1.0
Author: Charbel Haddad
*/

// Include other files
include_once(plugin_dir_path(__FILE__) . 'events.php');

function enqueue_custom_styles() {
    wp_enqueue_style('events-styles', plugins_url('css/events-styles.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
