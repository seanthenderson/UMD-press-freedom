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
					    	<div class="corner-ribbon top-left sticky red shadow">New</div>
					     	<?php the_post_thumbnail('large'); ?>	    		
							<div class="headline">
								<?php the_title() ?>
							</div>
				    	</div>
				    </a>
				<?php } 
			} 
		?>

		<!-- Featured stories -->
		<?php 
			$exclude = get_cat_ID('News');
			$q = 'cat=-'.$exclude;
			query_posts($q);
			$args = array(
				'category_name' => 'homepage-featured',
				'category__not_in' => '6',
				'posts_per_page' => '8'
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
				     		 		<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
				     			</div>
				     		<?php } ?>
			     		</div>
					<?php }
				} 
			} 
		?>

		 <section class="press-uncuffed">
		 <?php $pressUncuffed = new WP_Query('pagename=press-uncuffed');
		 		while ($pressUncuffed->have_posts()) :
		 			$pressUncuffed->the_post(); ?>
		 			<h2><?php the_title(); ?></h2>
		 		    <p><?php the_content(); ?></p>
		 		<?php endwhile;
		 	wp_reset_postdata(); ?>
		 </section>
	</div>	

	<div class="center-column">
		<!-- Research -->
		<h2><a href="/category/research">RESEARCH</a></h2>

		<?php 
			$args = array(
				'category_name' => 'research',
				'posts_per_page' => '5'
			);
			$research = new WP_Query($args);
			if ($research->have_posts()) {
				while ($research->have_posts()) {
					$research->the_post(); ?>
				    
					<h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
					<p><?php the_excerpt() ?></p>		
				<?php } 
			} 
		?>
	</div>

	<div class="right-column">
		<?php get_sidebar(); ?>
	</div>

</div>

<?php get_footer(); ?>
