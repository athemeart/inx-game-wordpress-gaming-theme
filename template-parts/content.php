<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package inx_game
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('inx-single-post') ); ?>>

 	 <?php
    /**
    * Hook - inx-game_posts_blog_media.
    *
    * @hooked inx-game_posts_formats_thumbnail - 10
    */
    do_action( 'inx_game_posts_blog_media' );
    ?>
    <div class="post">
               
		<?php
        /**
        * Hook - diet_shop_site_content_type.
        *
		* @hooked site_loop_heading - 10
        * @hooked render_meta_list	- 20
		* @hooked site_content_type - 30
        */
		
		$meta = array();
		
		if ( is_singular() ) :
			
			if( inx_game_get_option('signle_meta_hide') != true ){
				
				$meta = array( 'avatar', 'author', 'date', 'category', 'comments' );
			}
			$meta  	 = apply_filters( 'inx_game_single_post_meta', $meta );
			
		else :
			if( inx_game_get_option('blog_meta_hide') != true ){
				
				$meta = array( 'avatar', 'author', 'date', 'category', 'comments' );
			}
			$meta  	 = apply_filters( 'inx_game_blog_meta', $meta );
		 endif;
	
		
		 do_action( 'inx_game_site_content_type', $meta  );
        ?>
      
       
    </div>
    
</article><!-- #post-<?php the_ID(); ?> -->
