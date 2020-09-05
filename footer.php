<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package inx_game
 */

?>

	</div><!-- #content -->

	<?php
	/**
	* Hook - inx_game_site_footer
	*
	* @hooked inx_game_container_wrap_start
	*/
	do_action( 'inx_game_site_footer');
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
