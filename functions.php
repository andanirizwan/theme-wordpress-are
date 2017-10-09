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

//markup
//  add_theme_support('html5', array(
//              'search-form',
//              'comment-form',
//              'comment-list',
//              'gallery',
//              'caption',
// ));

//customize
// add_theme_support('custom-background', apply_filters('onphpid_theme_custom_background_args', array(
//              'default-color' => 'ffffff',
//              'default-image' => '',
// )));

// ------------------------semi toko online----------------------- //
require get_template_directory() . '/products/post-type.php';
require get_template_directory() . '/products/taxonomy.php';
require get_template_directory() . '/products/metaboxes.php';

function are_post_type()
{
     // add post-type
     register_post_type(
         'are_products',
         array(
             'labels' => array(
               'name' => __('Products', 'semi-toko-online'),
               'singular_name' => __('Product', 'semi-toko-online'),
               'add_new'            => _x( 'Add New', 'product', 'semi-toko-online' ),
               'add_new_item'       => __( 'Add New Product', 'semi-toko-online' ),
               'new_item'           => __( 'New Product', 'twentytwelve' ),
               'edit_item'          => __( 'Edit Product', 'semi-toko-online' ),
               'view_item'          => __( 'View Product', 'semi-toko-online' ),
               'all_items'          => __( 'All Products', 'semi-toko-online' ),
             ),
             'public' => true,
             'supports' => array('title', 'editor', 'thumbnail'),
             'has_archive' => true,
             'rewrite' => array('slug'=>'product'),
             'menu_position' => 5,
             'menu_icon' => 'dashicons-cart'
         )
   );
}
 
 add_action('init', 'are_post_type');


 // mendapatkan category product
function stOnline_category($id)
{
  $category = get_the_terms( $id , 'product_category'); // return array|false|wp_error

  if ($category) {
    $list = '';
    foreach ($category as $cat) {
      $url = 'product-category/' . $cat->slug;
      $list .= '<a href="'. home_url($url) .'">'. $cat->name .'</a>';
      $list .= ', ';
    }

    return rtrim($list, ', ');
  }

  return ;
}

// mendapatkan tags product
function stOnline_tags($id)
{
  $tags = get_the_terms( $id , 'product_tags'); // return array|false|wp_error

  if ($tags) {
    $list = '';
    foreach ($tags as $tag) {
      $url = 'product-tags/' . $tag->slug;
      $list .= '<a href="'. home_url($url) .'">'. $tag->name .'</a>';
      $list .= ', ';
    }

    return rtrim($list, ', ');
  }

  return ;
}

 ?>
 