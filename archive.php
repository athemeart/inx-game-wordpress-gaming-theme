<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inx_game
 */

get_header();
$layout = inx_game_get_option('blog_layout');
/**
* Hook - container_wrap_start 		- 5
*
* @hooked inx_game_container_wrap_start
*/
 do_action( 'inx_game_container_wrap_start',esc_attr( $layout ));
?>
	
		<?php if ( have_posts() ) : ?>

			<header class="page-header inx-header-block">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	
	

<?php
/**
* Hook - container_wrap_end 		- 999
*
* @hooked inx_game_container_wrap_end
*/
 do_action( 'inx_game_container_wrap_end',esc_attr( $layout ));
get_footer();
