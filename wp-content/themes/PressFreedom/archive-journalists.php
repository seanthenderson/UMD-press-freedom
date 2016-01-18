<?php get_header(); ?>

<div class="page-wrapper imprisoned-journalist-hub-page">

	<div class="left-column">
		 <h1><?php post_type_archive_title(); ?></h1>

		<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d58611209.15268798!2d-1.580684672484896!3d26.282936006626777!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1450904696809" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>

		<div class="journalist-cards">
			<?php 
			 	$args = array(
			 		'post_type' => 'journalists'
			 	);
			 	$category = new WP_Query($args);
			 	if ($category->have_posts()) {
			 		while ($category->have_posts()) {
			 			$category->the_post(); ?>
						<a href="<?php the_permalink(); ?>" class="journalist-card">	
							<h2 class="name"><?php the_title(); ?></h2>
							<h3 class="country"><?php the_field("country"); ?></h3>
					 		<?php if (has_post_thumbnail()) { ?>
					 			<div class="headshot">
					 				<?php the_post_thumbnail(); ?>
					 			</div>
						 	<?php } ?>
							<div class="days-jailed">
								<?php the_title(); ?> has been in prison for
								<span><?php days_in_jail(); ?></span>
								in <?php the_field("country"); ?> for the crime of being a journalist
							</div>
							<div class="social-media">	
								<i class="fa fa-facebook"></i>
								<i class="fa fa-twitter"></i>
							</div>
						</a>
			 		<?php } 
			 	} 
			?>
		</div>
	</div>

	<?php get_sidebar(); ?>

</div>	

<?php get_footer(); ?>