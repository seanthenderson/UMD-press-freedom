<?php get_header(); ?>

<div class="page-wrapper imprisoned-journalist-page">

	<div class="left-column">
		<h1 class="title">
			<?php the_title() ?> &#8211; <?php the_field("country"); ?>
		</h1>
		<div class="article-header">
			<?php 
				if (has_post_thumbnail()) { 
    				$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'optional-size' );
    				$url = $image_array[0]; ?>
					<div class="image" style="background: url('<?php echo $url; ?>') no-repeat center center; background-size: cover;"></div> 
				<?php }
			?>
		</div>
	
		<div class="counter-map">
			<div class="counter">
			 	Days in jail: <span><?php echo days_in_jail(); ?></span>
			</div>
			<div class="map-header"><?php the_title(); ?> is currently imprisoned in <?php the_field("country"); ?></div>
			
			<?php
				$location = get_field("link_to_map");

				if( ! empty($location) ):?>
					<div id="map"></div>
					<script src='http://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>

					<script type="text/javascript">
						function load() {
						var lat = <?php echo $location['lat']; ?>;
						var lng = <?php echo $location['lng']; ?>;
					// coordinates to latLng
						var latlng = new google.maps.LatLng(lat, lng);
					// map Options
						var myOptions = {
						zoom: 5,
						center: latlng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					   };
					//draw map
						var map = new google.maps.Map(document.getElementById("map"), myOptions);
						var marker = new google.maps.Marker({
							position: map.getCenter(),
							map: map
					    });
					}
					// call the function
					   load();
					</script>
				<?php endif; ?>
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

		<section class="support-box">
			<?php $support = new WP_Query('page_id=30');
				while ( $support->have_posts() ) :
					$support->the_post(); ?>
				    <h2><?php the_title(); ?></h2>
				    <?php the_content();
				endwhile;
			wp_reset_postdata(); ?>
		</section>

		<section class="other-journalists">
			<h2>Other Imprisoned Journalists</h2>
			<?php $args = array(
				'post_type' => 'journalists',
				'posts_per_page' => '5'
			);
			$other_journalists = new WP_Query($args);
			if ($other_journalists->have_posts()) {
				while ($other_journalists->have_posts()) {
					$other_journalists->the_post(); ?>
				    <a href="<?php the_permalink(); ?>">
				    	<div class="other-journalist">
						    <div class="headshot">
				    	 		<?php if ( has_post_thumbnail() ) { 
				    	 			the_post_thumbnail();
				    		 	} ?>
				    		 	<div class="name"><?php the_title(); ?></div>
						    </div>
						</div>
				    </a>
				<?php } 
			} ?>
		</section>

		<section class="sharelines">
			<h2>Twitter Sharelines</h2>
		</section> 
	</div>	

	<div class="right-column">
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>