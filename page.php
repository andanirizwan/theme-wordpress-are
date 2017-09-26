
<?php 

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
?>

<div class="container">
	<!-- content -->

		<h2> <?php the_title(); ?></h2>	<br>
		<p><?php 	the_content(); ?></p>



	
<?php 
	} // end while
} // end if
else {
	echo "tidak ada post";
}
?>



</div>
<?php 
get_footer();

?>
	



