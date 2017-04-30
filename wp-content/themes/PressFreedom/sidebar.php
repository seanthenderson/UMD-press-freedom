<!-- Video -->
<?php $related = new WP_Query('pagename=sidebar-video');
	while ($related->have_posts()) :
		$related->the_post(); ?>
	    <div class="editors-pick">
	    	<a href="<?php the_permalink(); ?>" target="_blank">
	    		<?php the_content(); ?>
	    	</a>
	    </div>
	<?php endwhile;
wp_reset_postdata(); ?>

<!-- Campaign -->
<?php $related = new WP_Query('pagename=sidebar-campaign');
	while ($related->have_posts()) :
		$related->the_post(); ?>
	    <h2><?php the_title(); ?></h2>
	    <div class="editors-pick">
	    	<a href="<?php the_permalink(); ?>" target="_blank">
	    		<?php the_content(); ?>
	    	</a>
	    </div>
	<?php endwhile;
wp_reset_postdata(); ?>

<!-- Related Links -->
<div class="related-links">
	<?php $related = new WP_Query('pagename=related-links');
		while ($related->have_posts()) :
			$related->the_post(); ?>
		    <h2><?php the_title(); ?></h2>
		    <div class="editors-pick">
		    	<a href="<?php the_permalink(); ?>" target="_blank">
		    		<?php the_content(); ?>
		    	</a>
		    </div>
		<?php endwhile;
	wp_reset_postdata(); ?>
</div>

<!-- Teaching Resources -->
<div class="related-links">
	<?php $related = new WP_Query('pagename=teaching-resources-sidebar');
		while ($related->have_posts()) :
			$related->the_post(); ?>
		    <h2>Teaching Resources</h2>
		    <div class="editors-pick">
		    	<a href="<?php the_permalink(); ?>" target="_blank">
		    		<?php the_content(); ?>
		    	</a>
		    </div>
		<?php endwhile;
	wp_reset_postdata(); ?>
</div>

<!-- About Press Uncuffed -->
<div class="about-site">
	<?php $about = new WP_Query('pagename=about-this-site');
		while ($about->have_posts()) :
			$about->the_post(); ?>
			<h2><?php the_title(); ?></h2>
		    <p><?php the_content(); ?></p>
		<?php endwhile;
	wp_reset_postdata(); ?>
</div>
