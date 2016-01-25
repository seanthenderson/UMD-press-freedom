
<?php 
	$args = array(
		'post_type' => 'journalists',
		'posts_per_page' => '2'
	);
	$sidebar = new WP_Query($args);
	if ($sidebar->have_posts()) {
		while ($sidebar->have_posts()) {
			$sidebar->the_post(); ?>
		    <a href="<?php the_permalink(); ?>">
		    	<div class="imprisoned-journalists-box">
				    <h3><?php the_title(); ?></h3>
				    <div class="headshot">
		    	 		<?php if ( has_post_thumbnail() ) { 
		    	 			the_post_thumbnail();
		    		 	} ?>
				    </div>
				    <p><?php the_excerpt(); ?></p>
				    <div class="days-jailed">
				    	Days in jail: <span><?php echo days_in_jail(); ?></span>
				    </div>
				</div>
		    </a>
		<?php } 
	} 
?>
<div class="ad sidebar-ad">300 x 250 AD</div>
<div class="categories-list">
	<h3>Key Categories</h3>
	<?php wp_list_categories(); ?>					
</div>
<div class="related-links">
	<?php $related = new WP_Query('pagename=related-links');
		while ($related->have_posts()) :
			$related->the_post(); ?>
		    <h3><?php the_title(); ?></h3>
		    <div class="editors-pick">
		    	<a href="<?php the_permalink(); ?>" target="_blank">
		    		<?php the_content(); ?>
		    	</a>
		    </div>
		<?php endwhile;
	wp_reset_postdata(); ?>
</div>
