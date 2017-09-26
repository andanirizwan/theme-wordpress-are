<div class="col-md-3">

		<?php the_post_thumbnail('medium'); ?>

</div>
<div class="col-md-9">

		<div class="card">

			<h4 class="card-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h4>
			<?php echo get_the_excerpt(); ?>
			 <p class="card-text"><small class="text-muted">Author : <a href="<?php echo get_author_posts_url(get_the_author_meta('id')); ?>"><?php the_author(); ?></a></small></p>
			<p class="card-text"><small class="text-muted">Category : <?php the_category(); ?></small></p>
			<p class="text-right text-muted"><?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
			<a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary">read more</a>

		</div>

</div>	