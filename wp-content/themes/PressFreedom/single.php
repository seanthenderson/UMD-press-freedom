<?php get_header(); ?>

<div class="page-wrapper article-page">

	<div class="left-column">
		 <div class="article-header">
		 	<h1 class="title">
		 		<?php the_title() ?> 
		 	</h1>
		 	<div class="image">
		 		<?php if ( has_post_thumbnail() ) { 
		 			the_post_thumbnail();
			 	} ?>
			</div> 
			<div class="caption">
				<?php the_post_thumbnail_caption(); ?>
			</div>
		 </div>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php include('includes/byline-box.php'); ?>

				<div class="social-share">
					<i class="fa fa-facebook"></i>
					<i class="fa fa-twitter"></i>
					<i class="fa fa-envelope"></i>
				</div>

				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>	

	<div class="right-column">
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>