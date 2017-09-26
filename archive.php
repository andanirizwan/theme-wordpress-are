
<?php 

get_header();

?>

<div class="container">	



<!-- arcive -->
<div class="alert alert-primary"" role="alert">
  <?php 
  	if (is_category()) {
  		echo "Halaman <span class='badge badge-secondary'>Category</span>"; echo "  "; single_cat_title();
  	}elseif (is_author()) {
  		echo "Halaman <span class='badge badge-secondary'>Author</span>"."  ".get_the_author();
  	}else {
  		echo "Halaman <span class='badge badge-secondary'>Arsip</span>";
  	}


   ?>
</div>
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
</div>

	
<?php 
} // end if	
else {
	echo "tidak ada post";
}


get_footer();

?>




