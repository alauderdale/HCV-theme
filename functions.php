<?php  
add_action( 'add_meta_boxes', 'cd_add_opengraph_meta' );  
function cd_add_opengraph_meta()  
{  
    add_meta_box( 'opengraph-meta', 'Opengraph', 'cd_opengraph_meta_cb', 'port_company', 'normal', 'high' );  
}  
  
function cd_opengraph_meta_cb( $post )  
{  
    // Grab our data to fill out the meta boxes (if it's there)  
    $desc = get_post_meta( $post->ID, '_cd_opengraph_desc', true ); 
    $image = get_post_meta( $post->ID, '_cd_opengraph_image', true ); 
 
    // Add a nonce field 
    wp_nonce_field( 'save_opengraph_meta', 'opengraph_nonce' ); 
    ?> 
    <p> 
        <label for="og-desc">Slider Background Color</label> 
        <textarea id="og-desc" class="widefat" name="_cd_opengraph_desc"><?php echo esc_attr( $desc ); ?></textarea> 
    </p> 
    <p> 
        <label for="og-image">Homepage Slider Image</label><br /> 
        <input type="text" id="og-image" style="width:300px" name="_cd_opengraph_image" value="<?php echo esc_url( $image ); ?>" /> 
        <input type="button" id="cdog-thickbox" value="Upload Image" /><br/> 
    </p> 
    <?php 
} 
 
add_action( 'save_post', 'cd_opengraph_save' ); 
function cd_opengraph_save( $id ) 
{ 
    // No auto saves 
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;  
 
    // Check our nonce 
    if( !isset( $_POST['opengraph_nonce'] ) || !wp_verify_nonce( $_POST['opengraph_nonce'], 'save_opengraph_meta' ) ) return; 
 
    // make sure the current user can edit the post 
    if( !current_user_can( 'edit_post' ) ) return; 
 
 
    // same as above 
    if( isset( $_POST['_cd_opengraph_desc'] ) ) 
        update_post_meta( $id, '_cd_opengraph_desc', esc_attr( strip_tags( $_POST['_cd_opengraph_desc'] ) ) ); 
 
    // make sure we get a clean url here with esc_url 
    if( isset( $_POST['_cd_opengraph_image'] ) ) 
        update_post_meta( $id, '_cd_opengraph_image', esc_url( $_POST['_cd_opengraph_image'], array( 'http' ) ) );  
}  
  
add_action( 'admin_print_scripts-post.php', 'cd_opengraph_enqueue' );  
add_action( 'admin_print_scripts-post-new.php', 'cd_opengraph_enqueue' );  
function cd_opengraph_enqueue()  
{  
    wp_enqueue_script( 'cdog-thickbox', get_bloginfo( 'template_url' ) . '/thickbox-hijack.js', array(), NULL );  
}  
?>
<?php

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