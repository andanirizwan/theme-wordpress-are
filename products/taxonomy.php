<?php
/**
 * Registrasi Taxonomy
 */

function are_taxonomy() {
	// registrasi category product
	register_taxonomy(
		'product_category',
		'are_products', // post-type name
		array(
			'label' => __( 'Product Category' ),
			'rewrite' => array( 'slug' => 'product-category' ),
			'hierarchical' => true, // true agar menjadi Category
		)
	);

	// registrasi tags product
	register_taxonomy(
		'product_tags',
		'are_products', // post-type name
		array(
			'label' => __( 'Product Tags' ),
			'rewrite' => array( 'slug' => 'product-tags' ),
			'hierarchical' => false, // false agar menjadi tags
		)
	);
}

add_action( 'init', 'are_taxonomy' , 0 );

?>