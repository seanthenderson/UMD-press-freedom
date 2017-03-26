<?php 
/**
* Template Name: Imprisoned Journalist
**/
get_header(); ?>

<div class="page-wrapper imprisoned-journalist-page">

	<div class="left-column">
		<h1 class="title">
			<?php the_title() ?><span class="country-name"> &#8212; <?php the_field("country"); ?></span>
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
			 	<?php if ('yes' == get_field('released')) { ?>
					Days in jail: <span><?php echo get_field('days_spent_in_jail'); ?></span>
			 	<?php } else { ?>
			 		Days in jail: <span><?php echo days_in_jail(); ?></span>
			 	<?php } ?>
			</div>
			<div class="map-header">
				<?php if ('yes' == get_field('released')) { ?>
					<?php the_title(); ?> was imprisoned in <?php the_field("country_where_imprisoned"); ?>
				<? } else if ('no' == get_field('released')) { ?>
					<?php the_title(); ?> is currently imprisoned in <?php the_field("country_where_imprisoned"); ?>
				<?php } ?>
			</div>
			
			<?php
				$location = get_field("link_to_map");

				if( ! empty($location) ):?>
					<div id="map"></div>

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
			<a href="https://twitter.com/share?text=<?php the_title(); ?>" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
				<i class="fa fa-twitter"></i>
			</a>
			<a href="mailto:?Subject=<?php the_title(); ?>" target="_top">
				<i class="fa fa-envelope"></i>
			</a>
		</div>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>

		<?php include('includes/byline-box.php'); ?>

		<section class="support-box">
			<?php $support = new WP_Query('pagename=support-links');
				while ( $support->have_posts() ) :
					$support->the_post(); ?>
				    <h2><?php the_title(); ?></h2>
				    <?php the_content();
				endwhile;
			wp_reset_postdata(); ?>
		</section>

		<div class="other-journalists">
			<h2>Other Imprisoned Journalists</h2>
			<?php $args = array(
				'post_type' => 'journalists',
				'posts_per_page' => '5',
				'orderby' => 'rand',
			);
			$other_journalists = new WP_Query($args);
			if ($other_journalists->have_posts()) {
				while ($other_journalists->have_posts()) {
					$other_journalists->the_post(); ?>
				    <a href="<?php the_permalink(); ?>">
				    	<div class="other-journalist">
			    			<?php 
			    				if (has_post_thumbnail()) { 
			        				$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'optional-size' );
			        				$url = $image_array[0]; ?>
			    					<div class="headshot" style="background: url('<?php echo $url; ?>') no-repeat center center; background-size: cover;">
										<div class="name"><?php the_title(); ?></div>
			    					</div> 
			    				<?php }
			    			?>
						</div>
				    </a>
				<?php } 
			} ?>
		</div>

		<section class="sharelines">
			<h2>Twitter Sharelines</h2>
		</section> 
	</div>	

	<div class="right-column">
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>