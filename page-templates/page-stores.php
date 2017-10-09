<?php
/**
 * Template Name: are-toko
 */
get_header();
// wordpress wp query : https://codex.wordpress.org/Class_Reference/WP_Query
$args = array(
	'posts_per_page' => 4,
	'post_type' => 'are_products'
);
$posts = new WP_Query($args);
?>

<div class="container">	

	<div class="row">
		<div class="col-md-3">

<?php 
if ($posts->have_posts()) {
	while ($posts->have_posts()) {
		$posts->the_post();
		// metabox SKU
		$sku   = get_post_meta(get_the_ID(), 'meta-box-sku', true);
		// metabox price
		$price = get_post_meta(get_the_ID(), 'meta-box-price', true);
		// metabox Best
		$bestSeller = get_post_meta(get_the_ID(), 'meta-box-best', true);
		// membuat nama class best-product melalui
		// check apakah best seller atau bukan 
		// dengan if else inline
		$isBest = $bestSeller && $bestSeller == 'best-seller' ? 'best-product' : ''; 
		?>

		<div class="product-item <?php echo $isBest;?>">


			<div class="card">

			 <center> <?php the_post_thumbnail('thumbnail'); ?> </center>

			  <div class="card-body">
			    <h4 class="card-title"><?php the_title();?></h4>
			    <p class="card-text">Harga : <?php echo $price;?></p>
			    <a href="<?php the_permalink();?>" class="btn btn-sm btn-outline-primary">View More</a>
			  </div>
			</div>

		</div>

	</div>


		<?php
	}
} else {
   ?>
    <div class="product-no-item">
      <h4>Oops!! No Product Exists</h4>
    </div>
  <?php
}
echo '</div>'; // end .produc-wrap
?>
	</div>	
</div>

<?php get_footer();?>