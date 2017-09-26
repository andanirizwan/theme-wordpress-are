<?php 

function are_theme_scripts()
   {

   	//css dan js
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_style('are-theme-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');

    wp_enqueue_script('are-theme-custom', get_template_directory_uri() . '/js/jquery-3.2.1.slim.min.js');
    wp_enqueue_script('are-theme-custom', get_template_directory_uri() . '/js/bootstrap.min.js');

    wp_enqueue_script('are-theme-custom', get_template_directory_uri() . '/js/popper.min.js');
 
   }
   
add_action('wp_enqueue_scripts', 'are_theme_scripts');


//menu
register_nav_menus( array(
	'main_menu' => 'Menu Utama',
	'footer_menu' => 'Menu footer',
	) ); 
	
//read_more
function get_excerpt_length()
{
	return 20;
}
function return_excerpt_text()
{
	return '';
}
add_filter( 'excerpt_more', 'return_excerpt_text' );
add_filter( 'excerpt_length', 'get_excerpt_length' );

//feature image
add_theme_support( 'post-thumbnails' );
add_image_size( 'are', 348, 348 );

//post format
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

//sidebar
function widget_setup()
{
  register_sidebar( array(

  'name'          => 'siebar pertama',
  'id'            => 'sidebar1',

  ) );

}

add_action('widgets_init', 'widget_setup');


//style bootstrap Comment

function bootstrap4_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
            <label for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
    $args['class_submit'] = 'btn btn-sm btn-outline-primary'; // since WP 4.1
    
    return $args;
}
add_filter( 'comment_form_defaults', 'bootstrap4_comment_form' );

function bootstrap4_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();
    
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    
    $fields   =  array(
        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>'       
    );
    
    return $fields;
}
add_filter( 'comment_form_default_fields', 'bootstrap4_comment_form_fields' );



 ?>
 