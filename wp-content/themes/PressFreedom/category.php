<?php get_header(); ?>
<div class="page-wrapper category-page">

	<div class="left-column">
		<h1 class="underlined"><?php single_cat_title(); ?></h1>
		<?php 
		 	$args = array(
		 		'posts_per_page' => '40',
		 	);
		 	$args['cat'] = get_query_var('cat');
		 	$category = new WP_Query($args);
		 	if ($category->have_posts()) {
		 		while ($category->have_posts()) {
		 			$category->the_post(); ?>
 					 <div class="category">
		 		 		<?php if ( has_post_thumbnail() ) { ?>
		 		 			<div class="category-image">
		 		 				<?php the_post_thumbnail(); ?>
		 		 			</div>
		 			 	<?php } ?>
 					 	<div class="article-text">
 					 	 	<h2>
 					 	 		<a href="<?php the_permalink(); ?>">
 					 	 			<?php the_title(); ?>
 					 	 		</a>
 					 	 	</h2>
 					 	 	<h4><?php the_field("subtitle"); ?></h3>
 					 	 	<div class="byline">
 					 	 		<?php if(function_exists('coauthors_posts_links')) { ?>
	     			 				By <?php coauthors_posts_links(); 
	     			 			} else { ?>
	     			 				By <?php get_the_author();
	     			 			} ?>
 					 			<?php include('includes/social-shares.php'); ?>
 					 	 	</div>
 					 	 	<p><?php the_excerpt(); ?></p>
 					 	</div>
 					 </div>
		 		<?php } 
		 	} 
		?>
	</div>	

	<div class="right-column">
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>