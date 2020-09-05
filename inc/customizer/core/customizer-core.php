<?php 
/**
 * Core functions.
 *
 * @package inx-game
 */

if ( ! function_exists( 'inx_game_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function inx_game_get_option( $key ) {

		if ( empty( $key ) ) {
			return;
		}

		$value = '';

		$default = inx_game_get_default_theme_options();
		$default_value = null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {
			$default_value = $default[ $key ];
		}

		if ( null !== $default_value ) {
			$value = get_theme_mod( $key, $default_value );
		}
		else {
			$value = get_theme_mod( $key );
		}

		return $value;
	}

endif;