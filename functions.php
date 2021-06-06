<?php
function my_scripts()
{
    wp_register_style('reset_css', get_template_directory_uri() . '/css/destyle.css', array(), '1.0.0', 'all');
    wp_enqueue_style('main_css', get_template_directory_uri() . '/css/style.css', array('reset_css'), '1.0.0', 'all');
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_scripts');