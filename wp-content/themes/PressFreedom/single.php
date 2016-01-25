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

		<div class="byline-box">
			<?php foreach( get_coauthors() as $coauthor ) : ?>
				<h3>
					<?php if(function_exists('coauthors_posts_links')) { ?>
						<?php coauthors_posts_links(); 
					} else { ?>
						By <?php get_the_author();
					} ?>
				</h3>
				<div class="headshot">
					<a href="<?php echo $coauthor->user_url; ?>"><?php echo get_avatar('small'); ?></a>
					<i class="fa fa-twitter"></i>
					<i class="fa fa-linkedin"></i>
				</div>
				<p>
					<?php echo $coauthor->description; ?>
				</p>
			<?php endforeach; ?>
		</div>

		<div class="social-share">
			<i class="fa fa-facebook"></i>
			<i class="fa fa-twitter"></i>
			<i class="fa fa-envelope"></i>
		</div>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>	

	<div class="right-column">
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>