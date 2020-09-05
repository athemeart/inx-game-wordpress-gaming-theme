<?php

/**
 * Example widget using class
 * 
 * DEMO: Include this file in your theme functions.php file or plugin
 */
class Inx_Game_Latest_Posts {
    
    /**
     * Unique widget id used for custom inline css
     * @var string
     */
    private $widget_id;
    
	/**
	 * Constructor
	 */
    public function __construct() {

        /**
         * Add widget via builder
         */
        $this->map_and_init();
    }
    
    /**
     * Render widget frontend view
     * 
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance The settings for the particular instance of the widget.
     * @param array $form_fields Widget admin form fields configuration array
     * @param string $this->id Widget generated unique id by instance number. 
     *                        Can be used to target this widget instance only
	 * @param string $widget_id Widget generated unique id by instance number. 
	 *                        Can be used to target this widget instance only
     */
    public function render_view( $args, $instance, $form_fields, $widget_id ) {
		
		/**
		 * Please note: 
		 * $instance will hold all admin form fields values
		 */
		
		// Unique widget id used for custom inline css
        $this->widget_id 	 = $widget_id;
		
		
        
		// Set widget title
        $widget_title		 = isset( $instance['title'] ) ? $instance['title'] : '';
	
		
        $posts_args 		 = array(
								 'numberposts' 		=> isset( $instance['number_of_posts'] ) ? absint( $instance['number_of_posts'] ) : 5,
								 'category'         => isset( $instance['posts_categories'] ) ? absint( $instance['posts_categories'] ) : 0,
								 'post_status' 		=> 'publish' 
								);
		
        // before and after widget arguments are defined by themes
        echo wp_kses( $args['before_widget'], $this->alowed_tags() );
        
        if ( ! empty( $widget_title ) ) {
            echo wp_kses( $args['before_title'], $this->alowed_tags() ) . esc_html( $widget_title ) . wp_kses( $args['after_title'], $this->alowed_tags() );
        }
	
		
		/**
		 * Widget html output start
		 */
		
		$recent_posts 	= wp_get_recent_posts( $posts_args );
		if( !empty( $recent_posts ) ){
			echo '<ul class="inx-recent-posts">';
			foreach($recent_posts as $post) : ?>
                <li>
                    <a href="<?php echo esc_url( get_permalink( absint( $post['ID'] ) ) ); ?>">
                    
                        <?php 
							if( has_post_thumbnail( absint( $post['ID'] ) ) ):
								echo get_the_post_thumbnail( absint( $post['ID'] ) , 'thumbnail');
							endif;
						 ?>
                        <div class="inx-recent-text"><?php echo esc_html( $post['post_title'] ) ?></div>
                        <div class="clearfix"></div>
                    </a>
                </li>
    		<?php endforeach;
			echo '</ul>';
			
		}
		 wp_reset_postdata();

		
		// Some widget output
			
			//var_dump( $this->inx_get_categories());
		/**
		 * Widget html output start
		 */

		// before and after widget arguments are defined by themes
        echo wp_kses( $args['after_widget'], $this->alowed_tags() );
        
     
        
    }
    
    private function inx_get_categories (){
		
		$get_categories = get_categories( );
		$array 			= array();
		$array[0]		= esc_html__('All Categories', 'inx-game');
		
		
		if( !empty( $get_categories ) ):
			foreach ( $get_categories  as $row ):
				
				$array[ absint( $row->term_id ) ]   = esc_html( $row->name );
				
			endforeach;
		endif;
		
		return $array;
		
	}
    /**
     * Map and init blog posts widget widget
     */
    public function map_and_init() {

        $config = array(

            // Core configuration
			
			/**
             * Unique widget id
             * @var string (required)
             */
            'base_id' => 'inx_recent_posts',
			
			/**
             * Widget name
             * @var string (required)
             */
            'name' => esc_html__('+ INX Recent Posts', 'inx-game'),
			
			/**
             * Widger callback function to render frontend html
             * 
             * If use class callback, the class instance must be used
             * If you use array('MyClassName', 'method') than __autoload will not fire properly when
             * a not-yet-loaded class was invoked through a PHP command
			 * 
             * @var string|array String if function name is passed, if using class method than it will be array (required)
             */
            'callback' => array( $this, 'render_view' ),
			
			/**
             * Widget Options
             * Option array passed to wp_register_sidebar_widget() using $options.
             * @see https://codex.wordpress.org/Function_Reference/wp_register_sidebar_widget
             * @var array|string (optional)
             */
            'widget_ops' => array(
                'classname' => 'inx-recent-posts',
                'description' => esc_html__( 'most recent Posts. Suitable for sidebar or footer  ', 'inx-game' ),
                'customize_selective_refresh' => false,
            ),
			
			/**
             * Width and height of the widget
             * Option array passed to wp_register_widget_control() using $options.
             * @see https://codex.wordpress.org/Function_Reference/wp_register_widget_control
             * @var array|string (optional)
             */
            'control_ops' => array( 
                'width' => 400, 
                'height' => 350 
            ),

			/**
             * Admin widget form section html element.
             * Example: <p>, ,<section>, <p> 
             * Can not have value of <div>
             * @var string (optional)
             */
            'section_opening_tag' => '<p>',
            /**
             * Admin widget form section html element.
             * Example: <p>, ,<section>, <p> 
             * Can not have value of <div>
             * @var string (optional)
             */
            'section_closing_tag' => '</p>',
			
			/**
             * Field arguments
             * @see field reference for supported field types
             */
            'form_fields' => array(
				
				/**
				 * Please note:
				 * 
				 * array key is required. It should be unique string for widget admin form. 
				 * String may contain only lowercase letters and underlines
				 * It will be used as name and id.
				 * Also you will get values on frontend using this key
				 */
				
				'title' => array(
					'type' => 'text', // Required  // Input type: text, password, search, tel, button
					'label' => esc_attr__( 'Title:', 'inx-game' ), // Optional
					'placeholder' => esc_html__( 'Enter widget title here', 'inx-game' ), // Optional
					
				),
				'test' => array(
					'type' => 'color', // Required  // Input type: text, password, search, tel, button
					'label' => esc_attr__( 'Title:', 'inx-game' ), // Optional
					'placeholder' => esc_html__( 'Enter widget title here', 'inx-game' ), // Optional
					
				),
				
				'number_of_posts' => array(
					'type' => 'number', // Required  // Input type: text, password, search, tel, button
					'label' => esc_attr__( 'Number of posts to show:', 'inx-game' ), // Optional
					'default' => '5' // Optional
					
				),
				
				
				'posts_categories' => array(
					'type' => 'select', // Required
					'label' => esc_attr__( 'Posts Categories :', 'inx-game' ), // Optional
					'options' => $this->inx_get_categories(),
					'class' => 'inx-game-select2', // Required
				),
				
				
				
            )

        );
        
		// Init widget
        if ( function_exists( 'predic_widget' ) ) {
            predic_widget()->add_widget( $config );
        }
		
    }
	private function alowed_tags(){
		
		if( function_exists('inx_game_alowed_tags') ){ 
			return inx_game_alowed_tags(); 
		}else{
			return array();	
		}
		
	}
}
new Inx_Game_Latest_Posts();


