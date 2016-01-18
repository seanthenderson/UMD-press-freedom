<div class="right-column">
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
					    <h4><?php the_title(); ?></h4>
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
		<h3>Links to Related Sites</h3>
		<div class="editors-pick"><a href="ifex.org">IFEX.org</a></div>
		<div class="editors-pick"><a href="">Link to related site goes here</a></div>
		<div class="editors-pick"><a href="">Link to related site goes here</a></div>
		<div class="editors-pick"><a href="">Link to related site goes here</a></div>
		<div class="editors-pick"><a href="">Link to related site goes here</a></div>
		<div class="editors-pick"><a href="">Link to related site goes here</a></div>		
		<div class="editors-pick"><a href="">Link to related site goes here</a></div>
		<div class="editors-pick"><a href="">Link to related site goes here</a></div>
		<div class="editors-pick"><a href="">Link to related site goes here</a></div>						
	</div>
</div>
