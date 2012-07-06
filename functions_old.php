 <?php
 /*
 Plugin Name: Meta Box Example
 Plugin URI: http://wp.tutsplus.com/
 Description: Adds an example meta box to wordpress.
 Version: None
 Author: Christopher Davis
 Author URI: http://wp.tutsplus.com/
 License: Public Domain
 */
 
 add_action( 'add_meta_boxes', 'cd_meta_box_add' );
 function cd_meta_box_add()
 {
 	add_meta_box( 'my-meta-box-id', 'Portfolio Company Website', 'cd_meta_box_cb', 'port_company', 'normal', 'high' );
 }
 
 function cd_meta_box_cb( $post )
 {
 	$values = get_post_custom( $post->ID );
 	$text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
 	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
 	?>
 	<p>
 		<label for="my_meta_box_text">Website URL</label>
 		<input type="text" name="my_meta_box_text" id="my_meta_box_text" value="<?php echo $text; ?>" />
 	</p>
 	<?php	
 }
 
 
 add_action( 'save_post', 'cd_meta_box_save' );
 function cd_meta_box_save( $post_id )
 {
 	// Bail if we're doing an auto save
 	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
 	
 	// if our nonce isn't there, or we can't verify it, bail
 	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
 	
 	// if our current user can't edit this post, bail
 	if( !current_user_can( 'edit_post' ) ) return;
 	
 	// now we can actually save the data
 	$allowed = array( 
 		'a' => array( // on allow a tags
 			'href' => array() // and those anchords can only have href attribute
 		)
 	);
 	
 	// Probably a good idea to make sure your data is set
 	if( isset( $_POST['my_meta_box_text'] ) )
 		update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );
 }
 ?>
 <?php
 
 register_sidebar(array(
 'name' => 'main sidebar',
 'before_widget' => '<li id="%1$s" class="widget %2$s">',
 'after_widget' => '</li>',
 'before_title' => '<h3 class="widgettitle">',
 'after_title' => '</h3>',
 ));
 
 
   register_nav_menu( 'main_nav', __( 'Main navigation menu', 'mytheme' ) );
   
   
   if ( function_exists( 'add_theme_support' ) ) { 
     add_theme_support( 'post-thumbnails' ); 
   }
   
  ?>
 <?php
 
 add_action( 'init', 'create_my_post_types' );
 
 function create_my_post_types() {
 	register_post_type( 'port_company',
 		array(
 			'labels' => array(
 				'name' => __( 'Portfolio Companies' ),
 				'singular_name' => __( 'Portfolio Company' )
 			),
 			'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail' ),
 			'public' => true,
 			
 		)
 		
 	);
 }
 
 
  