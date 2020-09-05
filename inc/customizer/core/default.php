<?php
/**
 * Default theme options.
 *
 * @package inx-game
 */

if ( ! function_exists( 'inx_game_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function inx_game_get_default_theme_options() {

		$defaults = array();
		
		
		/*Posts Layout*/
		$defaults['blog_layout']     				= 'content-sidebar';
		$defaults['single_post_layout']     		= 'no-sidebar';
		
		$defaults['blog_loop_content_type']     	= 'excerpt';
		
		$defaults['blog_meta_hide']     			= false;
		$defaults['signle_meta_hide']     			= false;
		
		/*Posts Layout*/
		$defaults['page_layout']     				= 'content-sidebar';
		
		/*layout*/
		$defaults['copyright_text']					= esc_html__( 'Copyright All right reserved', 'inx-game' );
		$defaults['read_more_text']					= esc_html__( 'Continue Reading', 'inx-game' );
		$defaults['index_hide_thumb']     			= false;
		
		
		/*Posts Layout*/
		$defaults['__fb_pro_link']     				= '';
		$defaults['__tw_pro_link']     				= '';
		$defaults['__you_pro_link']     		    = '';
		$defaults['__pr_pro_link']     				= '';
		
		$defaults['primary_color']     				= '#f65002';
		$defaults['__secondary_color']     			= '#000';
	

		// Pass through filter.
		$defaults = apply_filters( 'inx_game_filter_default_theme_options', $defaults );

		return $defaults;

	}

endif;
