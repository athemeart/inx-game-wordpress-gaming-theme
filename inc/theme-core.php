<?php
/**
 * inX game functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package inx_game
 */


if ( ! function_exists( 'inx_game_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function inx_game_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on inx game, use a find and replace
		 * to change 'inx-game' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'inx-game', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'inx-game' ),
		) );

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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'inx_game_custom_background_args', array(
			'default-color' => 'f6f7f9',
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
		/*
		* Enable support for Post Formats.
		* See https://developer.wordpress.org/themes/functionality/post-formats/
		*/
		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio',
			'quote'
		) );


	}
endif;
add_action( 'after_setup_theme', 'inx_game_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function inx_game_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'inx_game_content_width', 640 );
}
add_action( 'after_setup_theme', 'inx_game_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function inx_game_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'inx-game' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'inx-game' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'inx-game' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'inx-game' ),
		'before_widget' => '<div id="%1$s" class="col-12 col-sm-6 col-md-4 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Header Sidebar ( Ads )', 'inx-game' ),
		'id'            => 'logo_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'inx-game' ),
		'before_widget' => '<div id="%1$s" class="col-12 col-sm-6 col-md-4 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	
}
add_action( 'widgets_init', 'inx_game_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function inx_game_scripts() {
	
	
	wp_enqueue_style( 'inx-google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,500,700|Poppins:400,500,700|Righteous&display=swap' );
	/* PLUGIN CSS */
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/vendors/bootstrap/css/bootstrap.css' ), array(), '4.0.0' );
	
	wp_enqueue_style( 'rd-navbar', get_theme_file_uri( '/vendors/rd-navbar/css/rd-navbar.css' ), array(), '2.2.5' );
	
	wp_enqueue_style( 'icofont', get_theme_file_uri( '/vendors/icofont/icofont.css' ), array(), '1.0.1' );
	wp_enqueue_style( 'owl-carousel', get_theme_file_uri( '/vendors/owl-carousel/assets/owl.carousel.css' ), array(), '2.3.4' );
	
	wp_enqueue_style( 'inxgame-common', get_theme_file_uri( '/assets/css/inxgame-common.css' ), array(), '1.0.0' );
	
	wp_enqueue_style( 'inxgame-style', get_stylesheet_uri() );

	
	$custom_css = ':root {--primary-color:'.esc_attr( get_theme_mod('primary_color','#f65002') ).'; --secondary-color: '.esc_attr( get_theme_mod('__secondary_color','#000') ).'; }';
		
	wp_add_inline_style( 'inxgame-style', $custom_css );
	
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/vendors/bootstrap/js/bootstrap.js' ), 0, '3.3.7', true );
	
	
	wp_enqueue_script( 'rd-navbar-js', get_theme_file_uri( '/vendors/rd-navbar/js/jquery.rd-navbar.js' ), 0, '', true );
	wp_enqueue_script( 'customselect', get_theme_file_uri( '/vendors/customselect.js' ), 0, '', true );
	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/vendors/owl-carousel/owl.carousel.js' ), 0, '', true );
	wp_enqueue_script( 'sticky-sidebar', get_theme_file_uri( '/vendors/sticky-sidebar/jquery.sticky-sidebar.js' ), 0, '', true );
	
	wp_enqueue_script( 'inxgame-js', get_theme_file_uri( '/assets/js/inxgame.js'), array('jquery' ), '1.0.0', true);
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'inx_game_scripts' );

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses inx_game_header_style()
 */
function inx_game_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'inx_game_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'inx_game_header_style',
	) ) );



	
}
add_action( 'after_setup_theme', 'inx_game_custom_header_setup' );

if ( ! function_exists( 'inx_game_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see inx_game_custom_header_setup().
	 */
	function inx_game_header_style() {
		$header_text_color = get_header_textcolor();
		$header_image	   = get_header_image();
		
		if( !empty( $header_image ) ){
		?>
			<style type="text/css">
				#masthead .container.header-middle{
					background: url( <?php echo esc_url( $header_image );?> ) center center no-repeat;
					background-size: cover;
				}
			</style>
		<?php
		}
		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			a.site-title,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;



// Include custom style editor (TinyMCE visual editor)
    function inx_game_add_editor_styles() {
        add_editor_style( 'assets/css/editor-style.css' );
    }
    add_action( 'admin_init', 'inx_game_add_editor_styles' );