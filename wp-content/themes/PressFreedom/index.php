<?php get_header(); ?>

<div class="page-wrapper homepage">

	<div class="left-column">
		<!-- Hero story -->
		<?php 
			$args = array(
				'cat' => '2',
				'posts_per_page' => '1'
			);
			$hero = new WP_Query($args);
			if ($hero->have_posts()) {
				while ($hero->have_posts()) {
					$hero->the_post(); 
				 	if (in_category('homepage-featured', $post->ID)) { ?>
					    <a href="<?php the_permalink(); ?>">
						    <div class="homepage-hero">
						     	<?php the_post_thumbnail('large'); ?>	    		
								<div class="headline">
									<?php the_title() ?>
									<div class="subtitle"><?php the_field("subtitle"); ?></div>
								</div>
					    	</div>
					    </a>
				 	<?php }
				} 
			} 
		?>

		<!-- Featured stories -->
		<?php 
			$args = array(
				'posts_per_page' => '4'
			);
			$featured = new WP_Query($args);
			if ($featured->have_posts()) {
				while ($featured->have_posts()) {
					$featured->the_post(); ?>
					<?php if (!in_category(2)) { ?>
					     <div class="category">
			     		 	<div class="category-image">
			     		 		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small'); ?></a>
			     			</div>
			     			<div class="article-text">
			     			 	<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
			     			 	<h4><?php the_field("subtitle"); ?></h3>
			     			 	<div class="byline">
			     			 		<div class="featured-text-byline">
			     			 			<?php if(function_exists('coauthors_posts_links')) { ?>
			     			 				By <?php coauthors_posts_links(); 
			     			 			} else { ?>
			     			 				By <?php get_the_author();
			     			 			} ?>
			     			 			</div>
			     					<i class="fa fa-facebook-official"></i>
			     					<i class="fa fa-twitter-square"></i>
			     			 	</div>
			     			 	<p><?php the_excerpt(); ?></p>
			     			</div>
			     		</div>
					<?php }
				} 
			} 
		?>

		 <section class="press-uncuffed">
		 	<h2>Feature Box for Press Uncuffed Campaign</h2>
		 </section>
	</div>	

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
