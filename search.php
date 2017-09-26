
<?php 

get_header();

?>

<div class="container">	

<!-- arcive -->
<div class="alert alert-primary"" role="alert">
 Halaman <span class="badge badge-secondary">Search</span>
</div>

<h3>Kata yang anda cari : " <?php echo $_GET['s']; ?> "</h3><br>

	<div class="row">

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 

		if ($post->post_type == 'page') {
			continue;
		}

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




