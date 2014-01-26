<?php
/**
 * fighter Theme Customizer
 *
 * @package fighter
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fighter_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
    $wp_customize->add_section(
        'custom_section',
        array(
            'title' => 'Theme Settings',
            'description' => 'Custom Theme Settings',
            'priority' => 35,
        )
    );



	$wp_customize->add_setting(
    'sidebar_position',
    array(
        'default' => 'right',
    )
);
 
$wp_customize->add_control(
    'sidebar_position',
    array(
        'type' => 'radio',
        'label' => 'Sidebar Position',
        'section' => 'custom_section',
        'choices' => array(
            'left' => 'Left',
            'right' => 'Right',
        ),
    )
);
}
add_action( 'customize_register', 'fighter_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fighter_customize_preview_js() {
	wp_enqueue_script( 'fighter_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'fighter_customize_preview_js' );