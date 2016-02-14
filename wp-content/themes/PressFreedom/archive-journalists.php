<?php get_header(); ?>

<div class="page-wrapper imprisoned-journalist-hub-page">

	<div class="left-column">
		 <h1><?php post_type_archive_title(); ?></h1>

		<?php
		  	$args = array(
			  'post_type'		=> 'journalists',
			  'posts_per_page'	=> -1
		  	);
			$wp_query = new WP_Query($args);
			$NUM = 0;
		?>

		<script src='http://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>
		<div id="full-map"></div>
		
		<script type="text/javascript">
		    var locations = [<?php while( $wp_query->have_posts() ){
				$wp_query->the_post();
		    	$location = get_field('link_to_map'); 
			?>

			['<?php the_title(); ?>', <?php echo $location['lat']; ?>, <?php echo $location['lng'];?>, <?php $NUM++ ?>],
		   	<?php } ?> ];

		    var map = new google.maps.Map(document.getElementById('full-map'), {
		      zoom: 2,
		      center: new google.maps.LatLng(33, 10),
		      mapTypeId: google.maps.MapTypeId.ROADMAP
		    });

		    var infowindow = new google.maps.InfoWindow();

		    var marker, i;

		    for (i = 0; i < locations.length; i++) {
		      marker = new google.maps.Marker({
		        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		        map: map
		      });

		      google.maps.event.addListener(marker, 'click', (function(marker, i) {
		        return function() {
		          infowindow.setContent(locations[i][0]);
		          infowindow.open(map, marker);
		        }
		      })(marker, i));
		    }
		 </script>

		<div class="journalist-cards">
			<?php 
			 	$args = array(
			 		'post_type' => 'journalists'
			 	);
			 	$category = new WP_Query($args);
			 	if ($category->have_posts()) {
			 		while ($category->have_posts()) {
			 			$category->the_post(); ?>
						<a href="<?php the_permalink(); ?>" class="journalist-card">	
							
					 		<?php if (has_post_thumbnail()) { 
			    				$image_array = wp_get_attachment_image_src(\get_post_thumbnail_id( $page_id ), 'optional-size' );
			    				$url = $image_array[0]; ?>
								<div class="headshot" style="background: url('<?php echo $url; ?>') no-repeat center center; background-size: cover;"></div> 
							<?php } ?>
							<div class="corner-days"><?php days_in_jail(); ?></div>
							<div class="info">	
								<h2 class="name"><?php the_title(); ?></h2>
								<h3 class="country"><?php the_field("country"); ?></h3>
								<div class="days-jailed">
									<?php the_title(); ?> has been in prison for
									<span><?php days_in_jail(); ?></span> days
									in <?php the_field("country_where_imprisoned"); ?> for the crime of being a journalist
								</div>
								<div class="social-media">	
									<i class="fa fa-facebook"></i>
									<i class="fa fa-twitter"></i>
								</div>
							</div>
						</a>
			 		<?php } 
			 	} 
			?>
		</div>
	</div>

	<div class="right-column">
		<?php get_sidebar(); ?>
	</div>

</div>	

<?php get_footer(); ?>