<video controls="controls" width="300" height="175" name="Video Name" src="http://pressuncuffed.org/wp-content/uploads/2017/03/PressUncuffed_ClassVideo-Small.mov"></video>

<div class="sidebar-info" style="display: none">	
	<h2>Imprisoned Journalists</h2>
	<p>Minim vivendo deterruisset no eam, at vis oratio vulputate consequuntur, vim oblique habemus eu <a href="<?php echo site_url(); ?>/journalists">Read More</a></p>
</div>
<?php 
	$current_post = get_queried_object();
	$args = array(
		'post_type' => 'journalists',
        'post__not_in' => [$current_post->ID],
		'posts_per_page' => '2',
		'orderby'       => 'rand',
		'meta_query' => array(
			array(
				'key' => 'released',
				'value' => '0',
				'compare' => '=='
			)
		)
	);
	$sidebar = new WP_Query($args);
	if ($sidebar->have_posts()) {
		while ($sidebar->have_posts()) {
			$sidebar->the_post(); ?>
		    <a href="<?php the_permalink(); ?>">
		    	<div class="imprisoned-journalists-box" style="display: none">
	    	 		<?php 
	    				if (has_post_thumbnail()) { 
	        				$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'optional-size' );
	        				$url = $image_array[0]; ?>
						    <div class="headshot" style="background: url('<?php echo $url; ?>') no-repeat center center; background-size: cover;">
				    		 	<h3>
				    		 		<?php the_title(); ?>
				    		 		<p><?php echo get_excerpt(250); ?></p>
				    		 		<div class="days-jailed">
				    		 			<span><?php echo days_in_jail(); ?> DAYS IN JAIL</span>
				    		 		</div>
				    		 	</h3>
						    </div>	    					
	    				<?php }
	    			?>
				</div>
		    </a>
		<?php } 
	} 
?>
<div class="ad sidebar-ad">300 x 250 AD</div>
<div class="categories-list">
	<?php wp_list_categories(); ?>					
</div>
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
<div class="about-site">
	<?php $about = new WP_Query('pagename=about-this-site');
		while ($about->have_posts()) :
			$about->the_post(); ?>
			<h2><?php the_title(); ?></h2>
		    <p><?php the_content(); ?></p>
		<?php endwhile;
	wp_reset_postdata(); ?>
</div>
