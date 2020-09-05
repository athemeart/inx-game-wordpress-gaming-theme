<?php
/**
 * The Site Theme Header Class 
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package inx_game
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class Inx_Game_Body_Layout{
	/**
	 * Function that is run after instantiation.
	 *
	 * @return void
	 */
	public function __construct() {
		
		add_action('inx_game_container_wrap_start', array( $this, 'container_wrap_start' ), 5 );
		add_action('inx_game_container_wrap_start', array( $this, 'container_wrap_column_start' ), 10 );
		
		add_action('inx_game_container_wrap_end', array( $this, 'container_wrap_column_end' ), 5 );
		add_action('inx_game_container_wrap_end', array( $this, 'get_sidebar' ), 10 );
		add_action('inx_game_container_wrap_end', array( $this, 'container_wrap_end' ), 999 );
		
	}
	/**
	* Container before
	*
	* @return $html
	*/
	function container_wrap_start(){
		
		$html  = '<div id="primary" class="content-area container">
        				<div class="row">';
						
   		$html  = apply_filters( 'inx_game_container_wrap_start_filter', $html );	
		
		echo wp_kses( $html, $this->alowed_tags() );
    	
	}
	
	/**
	* Main Content Column before
	*
	* return $html
	*/
	function container_wrap_column_start ( $layout = '' ){
		
		switch ( $layout ) {
			case 'sidebar-content':
				$layout = 'col-xl-9 col-md-8 col-12 order-2';
				break;
			case 'no-sidebar':
				$layout = 'col-md-10 offset-md-1 bcf-main-content';
				break;
			default:
				$layout = 'col-xl-9 col-md-8 col-12 order-1';
		} 
	
	   $html 	 = '<div class="'.esc_attr( $layout ).'">
	   					<main id="main" class="site-main">';
	   
	   $html  	 = apply_filters( 'inx_game_container_wrap_column_start_filter', $html );	
		
		echo wp_kses( $html, $this->alowed_tags() );
		
   	
	}
	
	/**
	* Main Content Column before
	*
	* return $html
	*/
	function container_wrap_column_end ( $layout = '' ){
	
	   $html 	 = '</main>
	   			</div>';
	   
	   $html  	 = apply_filters( 'inx_game_container_wrap_column_end_filter', $html );	
		
		echo wp_kses( $html, $this->alowed_tags() );
		
   	
	}
	
	/**
	* Main Content Column after
	*
	* return $html
	*/
	function get_sidebar( $layout = '' ){
		
	switch ( $layout ) {
	case 'sidebar-content':
		$layout = 'col-xl-3 col-md-4 col-12 order-1 inx-sidebar';
		break;
	case 'no-sidebar':
		return false;
		break;
	default:
		$layout = 'col-xl-3 col-md-4 col-12 order-2 inx-sidebar';
	} 	
	?>
	<div class="<?php echo esc_attr( $layout );?>">
		<?php get_sidebar();?>
	</div>
	<?php
   	
	}
	
	/**
	* Container before
	*
	* @return $html
	*/
	function container_wrap_end(){
		
		$html  = '</div></div>';
						
   		$html  = apply_filters( 'inx_game_container_wrap_end_filter', $html );	
		
		echo wp_kses( $html, $this->alowed_tags() );
    	
	}
	
	
	private function alowed_tags(){
		
		if( function_exists('inx_game_alowed_tags') ){ 
			return inx_game_alowed_tags(); 
		}else{
			return array();	
		}
		
	}
}

new Inx_Game_Body_Layout();