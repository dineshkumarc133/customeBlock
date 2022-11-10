<?php
/**
 * Plugin Name: Learn Heading Gallary Block
 * Plugin URI: http://example.com
 * Description: A learning plugin for gutenberg,
 * Author: Md Rabiul islam
 * Author URI: http://authoruri.com
 * Version: 1.0.0
 * Text-Domain: learn-heading-gallary-block
 */

if( ! defined( 'ABSPATH' ) ) : exit(); endif; // No direct access allowed

/**
 * Register Gutenber Scripts
 */
add_action( 'enqueue_block_editor_assets', function() {
    wp_enqueue_script(
        'learn-gutenberg-block-editor-script',
        plugins_url( 'build/index.js', __FILE__ ),
        [
            'wp-plugins',
            'wp-blocks',
            'wp-editor',
            'wp-edit-post',
            'wp-i18n',
            'wp-element',
            'wp-components',
            'wp-data'
        ]
    );
     wp_enqueue_script(
        'learn-gutenberg-block-custom-script',
        plugins_url( 'build/custom.js', __FILE__ ),
    );
} );

/**
 * Enqueue Styles
 */
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'learn-gutenberg-block-style', plugins_url( 'assets/css/style.css', __FILE__ ), [], false, 'all' );
    wp_enqueue_style( 'learn-gutenberg-block-style-custom', plugins_url( 'assets/css/custom.css', __FILE__ ), [], false, 'all' );
      wp_enqueue_style( 'learn-gutenberg-block-custom-style', plugins_url( 'assets/css/custom.scss', __FILE__ ), [], false, 'all' );
wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
 wp_enqueue_script(
        'learn-gutenberg-block-custom-script',plugins_url( 'build/custom.js', __FILE__ ),
    );
  wp_enqueue_script('learn-gutenberg-block-custom-script-jq','https://code.jquery.com/jquery-3.6.1.min.js',array('jquery'),'1.43','true');
   wp_enqueue_script(
        'learn-gutenberg-block-custom-script-block',plugins_url( 'build/index.js', __FILE__ ),
    );

    
} );
add_action( 'admin_enqueue_scripts', function() {
    wp_enqueue_style( 'learn-gutenberg-block-editor-style', plugins_url( 'assets/css/editor.css', __FILE__ ), [], false, 'all' );
    
});

add_action( 'admin_enqueue_custom_style', function() {
    wp_enqueue_style( 'learn-gutenberg-block-editor-style-custom', plugins_url( 'assets/css/custom.scss', __FILE__ ), [], false, 'all' );
});

/**
 * Register A Block
 */
add_action( 'init', function() {
    register_block_type(
        'learn-gutenber-block/call-to-action',
        [
            'style' => 'learn-gutenberg-block-style',
            'editor_style' => 'learn-gutenberg-block-editor-style',
            'editor_scripts' => 'learn-gutenberg-block-editor-script',
        ]
    );
} );


function themeslug_enqueue_style() {
// wp_enqueue_style( 'custom1-scss', . 'assets/css/custom.scss',array());
    
    
     //  wp_enqueue_style( 'fonts-new', 'https://use.typekit.net/keq0cof.css');
     // wp_enqueue_style( 'fontawesome','https://pro.fontawesome.com/releases/v5.10.0/css/all.css' , array());
     // wp_enqueue_style( 'leaf-owl_css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array());
}
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );

