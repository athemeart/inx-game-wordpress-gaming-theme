<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package inx_game
 */


get_header();
/**
* Hook - inx_game_container_wrap_start 	
*
* @hooked inx_game_container_wrap_start	- 5
*/
 do_action( 'inx_game_container_wrap_start');
 
 
		if ( have_posts() ) : ?>

			<header class="page-header inx-header-block">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'inx-game' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		
/**
* Hook - inx_game_container_wrap_end	
*
* @hooked container_wrap_end - 999
*/
do_action( 'inx_game_container_wrap_end');
get_footer();
?>
