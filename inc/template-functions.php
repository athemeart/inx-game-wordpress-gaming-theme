<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package inx_game
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function inx_game_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'inx_game_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function inx_game_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'inx_game_pingback_header' );

if ( ! function_exists( 'inx_game_alowed_tags' ) ) :
	/**
	 * @see diet_shop_alowed_tags().
	 */
function inx_game_alowed_tags() {
	
	
	$wp_post_allow_tag = wp_kses_allowed_html( 'post' );
	
	$allowed_tags = array(
		'a' => array(
			'class' => array(),
			'href'  => array(),
			'rel'   => array(),
			'title' => array(),
			'id'	=> array(),
			'target'=> array(),
		),
		'abbr' => array(
			'title' => array(),
		),
		'b' => array(),
		'blockquote' => array(
			'cite'  => array(),
		),
		'cite' => array(
			'title' => array(),
		),
		'code' => array(),
		'del' => array(
			'datetime' => array(),
			'title' => array(),
		),
		'dd' => array(),
		'div' => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
			'id' => array(),
		),
		'dl' => array( 
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'dt' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'em' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'h1' => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
			'id' => array(),
		
		),
		'h2' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		
		),
		'h3' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'h4' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'h5' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'h6' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'i' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'img' => array(
			'alt'    => array(),
			'class'  => array(),
			'height' => array(),
			'src'    => array(),
			'width'  => array(),
		),
		'li' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'i' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'ol' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'p' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'q' => array(
			'cite' => array(),
			'title' => array(),
		),
		'span' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'strike' => array(),
		'strong' => array(),
		'ul' => array(
			'class' => array(),
			'style' => array(),
			'id' => array(),
		),
		'iframe' => array(
			'src'             => array(),
			'height'          => array(),
			'width'           => array(),
			'frameborder'     => array(),
			'allowfullscreen' => array(),
		),
		'time' => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
			'datetime' => array(),
			'content' => array(),
		),
		'main' => array(
			'class' => array(),
			'id' => array(),
			'style' => array(),
			
		),
	);

	
	$tags = array_merge( $wp_post_allow_tag, $allowed_tags );

	return apply_filters( 'inx_game_alowed_tags', $tags );
	
}
endif;



if ( ! function_exists( 'inx_game_walker_comment' ) ) : 
	/**
	 * Implement Custom Comment template.
	 *
	 * @since 1.0.0
	 *
	 * @param $comment, $args, $depth
	 * @return $html
	 */
	  
	function inx_game_walker_comment($comment, $args, $depth) {
		if ( 'div' === $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<li <?php comment_class( empty( $args['has_children'] ) ? 'comment shift' : 'comment' ) ?> id="comment-<?php comment_ID() ?>">
           <div class="single-comment clearfix">
				 <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, 80,'','', array('class' => 'float-left') ); ?>
                <div class="comment float-left">
                    <h6><?php echo get_comment_author_link();?></h6>
                    <div class="date"> 
                        <?php
                            /* translators: 1: date, 2: time */
                            printf( esc_html__('%1$s at %2$s', 'inx-game' ), esc_html( get_comment_date() ),  esc_html( get_comment_time()) ); 
                        ?>
                    </div>
                    
                    <div class="reply"> <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
                            
                   
                    <div class="comment-text"><?php comment_text(); ?></div>
                </div>
            </div>
			<div class="clearfix"></div>
	   </li>
       <?php
	}
	
	
endif;



class inx_game_navwalker extends Walker_Nav_Menu {
		/**
		 * Start Level.
		 *
		 * @see Walker::start_lvl()
		 * @since 3.0.0
		 *
		 * @access public
		 * @param mixed $output Passed by reference. Used to append additional content.
		 * @param int   $depth (default: 0) Depth of page. Used for padding.
		 * @param array $args (default: array()) Arguments.
		 * @return void
		 */
		function start_lvl(&$output, $depth = 0, $args = array()) {
			$output .= "\n<ul class=\"sub-menu rd-navbar-dropdown\">\n";
		}
		
		/**
		 * Menu Fallback
		 * =============
		 * If this function is assigned to the wp_nav_menu's fallback_cb variable
		 * and a menu has not been assigned to the theme location in the WordPress
		 * menu manager the function with display nothing to a non-logged in user,
		 * and will add a link to the WordPress menu manager if logged in as an admin.
		 *
		 * @param array $args passed from the wp_nav_menu function.
		 */
		public static function fallback( $args ) {
			
			wp_nav_menu( array(
				'depth'             => 1,
				'menu_class'  		=> 'menu rd-navbar-nav',
				'container'			=>'ul',
				'theme_location'    => 'fallback_menu'
			) );
			
		}
	
}

if( !function_exists('inx_game_elementor_editor_simplify') ){
	
	function inx_game_elementor_editor_simplify(){
		
		add_action( 'wp_head', function () {
				echo '<style type="text/css">
				#elementor-panel-category-pro-elements,
				#elementor-panel-category-theme-elements,
				#elementor-panel-category-woocommerce-elements,
				#elementor-panel-get-pro-elements{
					display:none!important;	
				}
				</style>';
			}  );
		
	}
	add_action( 'elementor/editor/init', 'inx_game_elementor_editor_simplify');

}