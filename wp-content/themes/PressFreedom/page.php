<?php get_header(); ?>

<div class="page-wrapper flatpage">
	<div class="left-column">	
		<?php 
			if (have_posts()) : while (have_posts()) : the_post();
			if (has_post_thumbnail()) {the_post_thumbnail();} ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); 
			endwhile; endif; 
		?>
	</div>

	<div class="right-column">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>