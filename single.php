
<?php 

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
?>

<div class="container">
	<!-- content -->
<div class="row">
<div class="col-md-9">
	<h2> <?php the_title(); ?></h2>	<br>

	<div class="row">	
		<div class="col-md-4">	
			<?php the_post_thumbnail('medium'); ?>
		</div>
		<div class="col-md-8">	
			<p><?php 	the_content(); ?></p>
		</div>
			<br><br>
			
	</div>

	<!-- comment -->
<?php comments_template(); ?>

</div>

	
<?php 
	} // end while
} // end if
else {
	echo "tidak ada post";
}

?>

<div class="col-md-3">
		<div class="card">
			<?php dynamic_sidebar('sidebar1'); ?>  
		</div>
</div>



</div> 



</div>
<?php 
get_footer();

?>




