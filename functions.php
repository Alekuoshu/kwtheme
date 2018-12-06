<?php
/**
* Koshucas Theme functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package Koshucas_Theme
*/

if ( ! function_exists( 'kwtheme_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*/
	function kwtheme_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Koshucas Theme, use a find and replace
		* to change 'kwtheme' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'kwtheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'main-menu', 'kwtheme' ),
			'menu-2' => esc_html__( 'footer-menu', 'kwtheme' ),
		));

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		* Enable support for Post Formats.
		* See http://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'kwtheme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'kwtheme_setup' );

/**
* Set the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width
*/
function kwtheme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'kwtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'kwtheme_content_width', 0 );

/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function kwtheme_widgets_init() {
	// Default sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kwtheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kwtheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Header Address
	register_sidebar(array(
		'name' => esc_html__('Header Address', 'haddress'),
		'description' => __('Muestra info sobre la direccion en el header', 'haddress'),
		'id' => 'widget-haddress',
		'before_widget' => '<div id="%1$s" class="header-address %2$s">',
		'after_widget' => '</div>'
	));
	// Logo
	register_sidebar(array(
		'name' => esc_html__('Logo', 'logo'),
		'description' => __('Muestra uno o varios logos alternativos', 'logo'),
		'id' => 'widget-logo',
		'before_widget' => '<div id="%1$s" class="logo-alt %2$s">',
		'after_widget' => '</div>'
	));
	// Contact Header
	register_sidebar(array(
		'name' => esc_html__('Contact Header', 'cheader'),
		'description' => __('Muestra info de contacto en el header', 'cheader'),
		'id' => 'widget-cheader',
		'before_widget' => '<div id="%1$s" class="cheader %2$s">',
		'after_widget' => '</div>'
	));
	// Medios
	register_sidebar(array(
		'name' => esc_html__('Medios', 'medios'),
		'description' => __('Muestra info de los medios', 'medios'),
		'id' => 'widget-medios',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	));
	// cometolima
	register_sidebar(array(
		'name' => esc_html__('Come To Lima', 'cometolima'),
		'description' => __('Muestra info de los medios', 'cometolima'),
		'id' => 'widget-cometolima',
		'before_widget' => '<div id="%1$s" class="cometolima %2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	));
}
add_action( 'widgets_init', 'kwtheme_widgets_init' );

/***** Cadenas a traducir con polylang *****/
pll_register_string("Menu Toggle", "Menú");
pll_register_string("Header Address", "No ha configurado el widget!");
pll_register_string("Copyright", "Todos los derechos reservados");
pll_register_string("privacidad", "privacidad");
pll_register_string("Privacidad", "Privacidad");
pll_register_string("Diseñado y Desarrollado por", "Diseñado y Desarrollado por");
pll_register_string("Lo siento, esta página no existe.", "Lo siento, esta página no existe.");
pll_register_string("Leer Más", "Leer Más");
pll_register_string("No se encontró nada", "No se encontró nada");
pll_register_string("Procedimientos", "Procedimientos");
pll_register_string("Cirugía 1", "Cirugía 1");
pll_register_string("Cirugía 2", "Cirugía 2");
pll_register_string("Cirugía 3", "Cirugía 3");
pll_register_string("Cirugía 4", "Cirugía 4");
pll_register_string("Celular:", "Celular:");
pll_register_string("Fijo:", "Fijo:");
pll_register_string("Ver Todos", "Ver Todos");
pll_register_string("Promedio: ", "Promedio: ");
pll_register_string("Total de ", "Total de ");
pll_register_string("Reseñas", "Reseñas");
pll_register_string("Testimonios", "Testimonios");

///////////////////////////////////////////////////


/**
* Enable ACF 5 early access
* Requires at least version ACF 4.4.12 to work
*/
define('ACF_EARLY_ACCESS', '5');
// TODO: Create a plugin from this code /Alekuoshu

////////// Custom Contact Widget for ACF 5 //////////////
class Contact_Widget extends WP_Widget
{
	function __construct() {
		parent::__construct(
			// widget ID
			'contact_widget',
			// widget name
			__('Contact Widget', 'contact_widget_domain'),
			// widget description
			array( 'description' => __( 'Widget para mostrar contact info with ACF5', 'contact_widget_domain' ), )
		);
	}

	function ACF5_Widget()
	{
		parent::WP_Widget(false, "Contact Widget");
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}	else {
			$title = __('Contact Header', 'contact_widget_domain' );
		}
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	public function widget( $args, $instance )
	{
		$widget_id = "widget_" . $args["widget_id"];
		// if ( isset( $instance[ 'title' ] ) ) {
		// 	$title = $instance[ 'title' ];
		// }	else {
		// 	$title = __( 'Contact Header', 'acf5_widget_domain' );
		// }
		echo $args['before_widget'];
		//if title is present
		// if ( ! empty( $title ) )
		// echo $args['before_title'] . $title . $args['after_title'];
		//output
		// I like to put the HTML output for the actual widget in a seperate file
		include(realpath(dirname(__FILE__)) . "/inc/custom-widgets/contact_widget.php");

		echo $args['after_widget'];

	}

}
register_widget("Contact_Widget");
///////////////////////////////////////////////////////////////

////////// Custom Seals Widget for ACF 5 //////////////
class Seals_Widget extends WP_Widget
{
	function __construct() {
		parent::__construct(
			// widget ID
			'seals_widget',
			// widget name
			__('Seals Widget', 'seals_widget_domain'),
			// widget description
			array( 'description' => __( 'Widget para mostrar seals logo with ACF5', 'seals_widget_domain' ), )
		);
	}

	function ACF5_Widget()
	{
		parent::WP_Widget(false, "Seals Widget");
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}	else {
			$title = __('Seal Logos', 'seals_widget_domain' );
		}
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	public function widget( $args, $instance )
	{
		$widget_id = "widget_" . $args["widget_id"];
		echo $args['before_widget'];
		//output
		// I like to put the HTML output for the actual widget in a seperate file
		include(realpath(dirname(__FILE__)) . "/inc/custom-widgets/seals_widget.php");

		echo $args['after_widget'];

	}

}
register_widget("Seals_Widget");
/////////////////////////////////////////////

////////// Custom Medios Widget for ACF 5 //////////////
class Medios_Widget extends WP_Widget
{
	function __construct() {
		parent::__construct(
			// widget ID
			'medios_widget',
			// widget name
			__('Medios Widget', 'medios_widget_domain'),
			// widget description
			array( 'description' => __( 'Widget para mostrar medios info with ACF5', 'medios_widget_domain' ), )
		);
	}

	function ACF5_Widget()
	{
		parent::WP_Widget(false, "Medios Widget");
	}
	// Widget Backend
	public function form( $instance ) {
		// if ( isset( $instance[ 'title' ] ) ) {
		// 	$title = $instance[ 'title' ];
		// }	else {
		// 	$title = __('Medios', 'medios_widget_domain' );
		// }
		// Widget admin form
		?>
		<!-- <p>
		<label for="<?php //echo $this->get_field_id( 'title' ); ?>"><?php //_e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php //echo $this->get_field_id( 'title' ); ?>" name="<?php //echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php //echo esc_attr( $title ); ?>" />
	</p> -->
	<?php
}

function update($new_instance, $old_instance)
{
	return $new_instance;
}

// Creating widget front-end
public function widget( $args, $instance )
{
	$widget_id = "widget_" . $args["widget_id"];
	// if ( isset( $instance[ 'title' ] ) ) {
	// 	$title = $instance[ 'title' ];
	// }	else {
	// 	$title = __( 'Medios', 'medios_widget_domain' );
	// }
	echo $args['before_widget'];
	// if title is present
	// if ( ! empty( $title ) )
	// echo $args['before_title'] . $title . $args['after_title'];
	//output
	// I like to put the HTML output for the actual widget in a seperate file
	include(realpath(dirname(__FILE__)) . "/inc/custom-widgets/medios_widget.php");

	echo $args['after_widget'];

}

}
register_widget("Medios_Widget");
///////////////////////////////////////////////////////////////

////////// Custom cometolima Widget for ACF 5 //////////////
class Cometolima_Widget extends WP_Widget
{
	function __construct() {
		parent::__construct(
			// widget ID
			'cometolima_widget',
			// widget name
			__('Come to Lima Widget', 'cometolima_widget_domain'),
			// widget description
			array( 'description' => __( 'Widget para mostrar info variada with ACF5', 'cometolima_widget_domain' ), )
		);
	}

	function ACF5_Widget()
	{
		parent::WP_Widget(false, "Come to Lima Widget");
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}	else {
			$title = __('Come to Lima', 'cometolima_widget_domain' );
		}
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	public function widget( $args, $instance )
	{
		$widget_id = "widget_" . $args["widget_id"];
		echo $args['before_widget'];
		//output
		// I like to put the HTML output for the actual widget in a seperate file
		include(realpath(dirname(__FILE__)) . "/inc/custom-widgets/cometolima_widget.php");

		echo $args['after_widget'];

	}

}
register_widget("Cometolima_Widget");
/////////////////////////////////////////////

//function to loging/logout menu IntlDateFormatteradd_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
// function add_login_logout_link($items, $args) {
// 	ob_start();
// 	wp_loginout('index.php');
// 	$loginoutlink = ob_get_contents();
// 	ob_end_clean();
// 	$items .= '<li>'. $loginoutlink .'</li>';
// 	return $items;
// }
// add_filter( 'wp_nav_menu_secondary_items','wpdocs_loginout_menu_link' );

/**
* Append Login In/Out link to menu with a redirect to this page
*/
// function wpdocs_loginout_menu_link( $menu ) {
// 	$loginout = '<li class="nav-menu" class="menu-item">'
// 	. wp_loginout( $_SERVER['REQUEST_URI'], false )
// 	. '</li>';
// 	$menu .= $loginout;
// 	return $menu;
// }


/**
* Implement the Custom Header feature.
*/
require get_template_directory() . '/inc/custom-header.php';

/**
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Functions which enhance the theme by hooking into WordPress.
*/
require get_template_directory() . '/inc/template-functions.php';

/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';

/**
* Custom Sanitizer additions.
*/
require get_template_directory() . '/inc/kwtheme-sanitizer.php';

/**
* Custom Control Type additions.
*/
require get_template_directory() . '/inc/controls/custom-switch.php';
require get_template_directory() . '/inc/controls/custom-chooseimage.php';
require get_template_directory() . '/inc/controls/category-dropdown.php';

/**
* Load Jetpack compatibility file.
*/
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
