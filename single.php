<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package inx_game
 */

get_header();

$layout = inx_game_get_option('single_post_layout');

/**
* Hook - container_wrap_start 		- 5
*
* @hooked inx_game_container_wrap_start
*/
 do_action( 'inx_game_container_wrap_start', esc_attr( $layout ));
?>
	

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			/**
			* Hook - inx_game_site_footer
			*
			* @hooked inx_game_container_wrap_start
			*/
			do_action( 'inx_game_single_post_navigation');
			

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

<?php
/**
* Hook - container_wrap_end 		- 999
*
* @hooked inx_game_container_wrap_end
*/
do_action( 'inx_game_container_wrap_end', esc_attr( $layout ));
get_footer();