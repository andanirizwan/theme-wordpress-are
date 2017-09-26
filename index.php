<?php 

get_header();

?>


<div class="container">	

		<div class="row">
			

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 

	//template
	get_template_part('content');

	} // end while

	 ?>	

		</div>

	
<?php 
} // end if	
else {
	echo "tidak ada post";
}

?>

	
</div>

<?php
get_footer();

?>

