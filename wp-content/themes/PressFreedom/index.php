<?php get_header(); ?>

<div class="page-wrapper homepage">

	<div class="left-column">
		<!-- Hero story -->
		<?php 
			$args = array(
				'category_name' => 'homepage-hero',
				'posts_per_page' => '1'
			);
			$hero = new WP_Query($args);
			if ($hero->have_posts()) {
				while ($hero->have_posts()) {
					$hero->the_post(); ?>
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
		?>

		<!-- Featured stories -->
		<?php 
			$args = array(
				'category_name' => 'homepage-featured',
				'category__not_in' => '5',
				'posts_per_page' => '4'
			);
			$featured = new WP_Query($args);
			if ($featured->have_posts()) {
				while ($featured->have_posts()) {
					$featured->the_post(); ?>
					<?php if (!in_category(2)) { ?>
					     <div class="category">
					     	<?php if (has_post_thumbnail()) { ?>
				     		 	<div class="category-image">
				     		 		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small'); ?></a>
				     			</div>
				     		<?php } ?>
			     			<div class="article-text">
			     			 	<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
			     			 	<h4><?php the_field("subtitle"); ?></h3>
			     			 	<div class="byline">
			     			 		<div class="featured-text-byline">
			     			 			<?php if(function_exists('coauthors_posts_links')) { ?>
			     			 				By <?php coauthors_posts_links('display_name'); 
			     			 			} else { ?>
			     			 				By <?php get_the_author();
			     			 			} ?>
			     			 		</div>
			     					<a href=""><i class="fa fa-facebook-official"></i></a>
			     					<a href="https://twitter.com/share?text=<?php the_title(); ?>" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
			     						<i class="fa fa-twitter-square"></i>
			     					</a>
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

	<div class="right-column">
		<?php get_sidebar(); ?>
	</div>

</div>

<?php get_footer(); ?>
