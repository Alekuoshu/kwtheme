<?php
/**
* Koshucas Theme Theme Customizer
*
* @package Koshucas_Theme
*/

/**
* Add postMessage support for site title and description for the Theme Customizer.
*
* @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/
function kwtheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'kwtheme_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'kwtheme_customize_partial_blogdescription',
		) );
	}

	//////////Add New Panel for Homepage Sections///////////////
	$wp_customize->add_panel('homepage_sections',array(
		'priority' => '20',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => pll__( 'KWTheme Config', 'kwtheme' ),
		'description' => pll__( 'Configurar algunos valores de la pagina de inicio, algunas secciones provienen atraves de widgets, configuraciones para Koshucas Theme', 'kwtheme' ),
	));

	//Slider Baisc setup sections
	$wp_customize->add_section('kw_slider',array(
		'priority'        =>      '10',
		'title' => pll__( 'Configurar Slider', 'kwtheme' ),
		'description' => pll__( 'Configurar el slider del home', 'kwtheme' ),
		'panel' => 'homepage_sections'
	));

	// display_slider
	$wp_customize->add_setting('display_slider',array(
		'default' => '1',
		'sanitize_callback' => 'kwtheme_sanitize_integer'
	));
	$wp_customize->add_control(new Kwtheme_WP_Customize_Switch_Control($wp_customize,'display_slider',array(
		'type' => 'switch_yesno',
		'label' => pll__('Mostrar slider en la pagina de inicio', 'kwtheme'),
		'section' => 'kw_slider',
		'output' => array(pll__('Si'), pll__('No'))
	)));

	//select category for slider
	$wp_customize->add_setting('slider_setting_category',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'kwtheme_sanitize_integer'
	));
	$wp_customize->add_control( new Kwtheme_WP_Customize_Category_Control( $wp_customize,'slider_setting_category', array(
		'label' => pll__('Seleccione categoria para mostrar','kwtheme'),
		'section' => 'kw_slider',
	)));

	// select ratio for slider items
	$wp_customize->add_setting('data_ratio', array(
		'default' => 'cinema',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'kwtheme_sanitize_data_ratio'
	));

	$wp_customize->add_control('data_ratio', array(
		'type' => 'select',
		'label' => pll__('Radio de Aspecto', 'kwtheme'),
		'section' => 'kw_slider',
		'choices' => array(
			'cinema' => __('Cinema', 'kwtheme'),
			'wide' => __('Wide', 'kwtheme'),
			'tv' => __('TV', 'kwtheme'),
			'box' => __('Box', 'kwtheme'),
		)
	));

	// display controls
	$wp_customize->add_setting('display_controls',array(
		'default' => '1',
		'sanitize_callback' => 'kwtheme_sanitize_integer'
	));
	$wp_customize->add_control(new Kwtheme_WP_Customize_Switch_Control($wp_customize,'display_controls',array(
		'type' => 'switch_yesno',
		'label' => pll__('Mostrar controles del slider', 'kwtheme'),
		'section' => 'kw_slider',
		'output' => array(pll__('Si'), pll__('No'))
	)));

	// display indicators
	$wp_customize->add_setting('display_indicators',array(
		'default' => '1',
		'sanitize_callback' => 'kwtheme_sanitize_integer'
	));
	$wp_customize->add_control(new Kwtheme_WP_Customize_Switch_Control($wp_customize,'display_indicators',array(
		'type' => 'switch_yesno',
		'label' => pll__('Mostrar indicadores del slider', 'kwtheme'),
		'section' => 'kw_slider',
		'output' => array(pll__('Si'), pll__('No'))
	)));

	//transition type
	$wp_customize->add_setting('transition_type', array(
		'default' => 'false',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'kwtheme_sanitize_transition_type'
	));

	$wp_customize->add_control('transition_type', array(
		'type' => 'select',
		'label' => pll__('Tipo de Transicion(Slide/Fade)', 'kwtheme'),
		'section' => 'kw_slider',
		'choices' => array(
			'true' => __('Fade', 'kwtheme'),
			'false' => __('Slide', 'kwtheme'),
		)
	));

	// transition_speed
	$wp_customize->add_setting('transition_speed',array(
		'default'       =>      '8000',
		'sanitize_callback' => 'kwtheme_sanitize_text'
	));
	$wp_customize->add_control('transition_speed',array(
		'type' => 'text',
		'label' => pll__('Velocidad de Transicion', 'kwtheme'),
		'section' => 'kw_slider',
	));

}
add_action( 'customize_register', 'kwtheme_customize_register' );

/**
* Render the site title for the selective refresh partial.
*
* @return void
*/
function kwtheme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
* Render the site tagline for the selective refresh partial.
*
* @return void
*/
function kwtheme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
* Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/
function kwtheme_customize_preview_js() {
	wp_enqueue_script( 'kwtheme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'kwtheme_customize_preview_js' );
