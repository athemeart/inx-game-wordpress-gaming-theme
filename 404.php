<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package inx_game
 */

get_header();
?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main row">

			<section class="error-404 not-found8">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'inx-game' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'inx-game' ); ?></p>

					<?php
					get_search_form();

					
					?>
                    <a href="<?php echo esc_url( home_url( '/' ) );?>" class="btn"> <?php esc_html_e( 'Back to Home', 'inx-game' ); ?></a>
					<div class="clearfix"></div>
					<!-- .widget -->


				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
