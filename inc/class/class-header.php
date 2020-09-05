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
class Inx_Game_Header_Layout{
	/**
	 * Function that is run after instantiation.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action('inx_game_site_header', array( $this, 'site_skip_to_content' ), 5 );
		add_action('inx_game_site_header', array( $this, 'site_header_wrap_before' ), 10 );
		add_action('inx_game_site_header', array( $this, 'site_header_layout' ), 20 );
		add_action('inx_game_site_header', array( $this, 'get_site_navigation' ), 30 );
		add_action('inx_game_site_header', array( $this, 'get_site_breadcrumb' ), 40 );
		add_action('inx_game_site_header', array( $this, 'site_header_wrap_after' ), 999 );
		
	}
	/**
	* @return $html
	*/
	function site_header_wrap_before(){
		
		$html = '<header id="masthead" class="site-header">';	
		
		echo wp_kses( $html , $this->alowed_tags() );
		
	}
	/**
	* @return $html
	*/
	function site_header_wrap_after(){
		
		$html = '</header>';	
		
		echo wp_kses( $html , $this->alowed_tags() );
		
	}
	/**
	* Container before
	*
	* @return $html
	*/
	function site_skip_to_content(){
		
		echo '<a class="skip-link screen-reader-text" href="#content">'. esc_html__( 'Skip to content', 'inx-game' ) .'</a>';
	}
	/**
	* Container before
	*
	* @return $html
	*/
	function site_header_layout(){
		?>
		 <div class="container header-middle">
					<div class="row">
						<?php echo wp_kses( $this->get_site_branding(), $this->alowed_tags() );?>
                        <?php echo wp_kses( $this->get_logo_sidebar(), $this->alowed_tags() );?>
					</div>
				</div>
		<?php		
	}
	
	/**
	* Get the Site logo sidebar
	*
	* @return HTML
	*/
	public function get_logo_sidebar (){
		if ( is_active_sidebar( 'logo_sidebar' ) ) { 
		?><div class="col-xl-7 col-lg-7 col-md-7 col-12">
       		 <?php dynamic_sidebar( 'logo_sidebar' );?>
        </div>
        <?php
		}
	}
	/**
	* Get the Site logo
	*
	* @return HTML
	*/
	public function get_site_branding (){
		
		$html = '<div class="col-xl-5 col-lg-5 col-md-5 col-12 logo-wrap">';
		
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$html .= get_custom_logo();
			
		}
		if (display_header_text()==true){
			
			$html .= '<h4><a href="'.esc_url( home_url( '/' ) ).'" rel="home" class="site-title">';
			$html .= get_bloginfo( 'name' );
			$html .= '</a></h4>';
			$description = get_bloginfo( 'description', 'display' );
		
			if ( $description ) :
			    $html .=  '<div class="site-description">'.esc_html($description).'</div>';
			endif;
		}
		$html .= '<button class="inx-rd-navbar-toggle" tabindex="0" autofocus="true"><i class="icofont-navigation-menu"></i></button>';
		
		$html .= '</div>';
		
		$html = apply_filters( 'get_site_branding_filter', $html );
		
		return wp_kses( $html, $this->alowed_tags() );
		
	}
	
	/**
	* Get the Site logo
	*
	* @return HTML
	*/
	public function get_site_navigation (){
		
		?>
        <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-layout-5 rd-navbar-submenu-layout-1" data-rd-navbar-lg="rd-navbar-static">
                
                <div class="rd-navbar-outer">
                    <div class="rd-navbar-inner" >
                    
                        <div class="rd-navbar-subpanel" >
                         
                         <div class="rd-navbar-nav-wrap">
                         	<button class="rd-navbar-toggle toggle-original" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><i class="icofont-ui-close"></i></button>
                            <?php
                                wp_nav_menu( array(
                                    'theme_location'    => 'menu-1',
                                    'depth'             => 3,
                                    'menu_class'  		=> 'inx-main-menu rd-navbar-nav',
                                    'container'			=> 'ul',
                                    'walker' 			=> new inx_game_navwalker(),
                                    'fallback_cb'       => 'inx_game_navwalker::fallback',
                                ) );
                            ?>
                            </div>
                            
                            <div class="rd-navbar-social-icon">
                                <ul class="social-list">
                                <?php if( inx_game_get_option('__fb_pro_link') != "" ): ?>
                                <li class="social-item-facebook"><a href="<?php echo esc_url( inx_game_get_option('__fb_pro_link') );?>" target="_blank" rel="nofollow"><i class="icofont-facebook"></i></a></li>						
								<?php endif;?>
                                
                                <?php if( inx_game_get_option('__tw_pro_link') != "" ): ?>
								<li class="social-item-twitter"><a href="<?php echo esc_url( inx_game_get_option('__tw_pro_link') );?>" target="_blank" rel="nofollow"><i class="icofont-twitter"></i></a></li>
                        		<?php endif;?>
                        		<?php if( inx_game_get_option('__you_pro_link') != "" ): ?>
								<li class="social-item-youtube"><a href="<?php echo esc_url( inx_game_get_option('__you_pro_link') );?>" target="_blank" rel="nofollow"><i class="icofont-youtube"></i></a></li>
                       			<?php endif;?>
						
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
      
        <?php	
		
	}
	
	public function get_site_breadcrumb (){
		if( function_exists('bcn_display') && ( !is_home() || !is_front_page())  ):?>
        	<div class="inx-breadcrumbs-wrap"><div class="container"><div class="row"><div class="col-md-12">
            <div class="inx-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php bcn_display_list();?>
           </div></div></div></div>
            </div>
        <?php
		endif; 
	}
	private function alowed_tags(){
		
		if( function_exists('inx_game_alowed_tags') ){ 
			return inx_game_alowed_tags(); 
		}else{
			return array();	
		}
		
	}
}

new Inx_Game_Header_Layout();