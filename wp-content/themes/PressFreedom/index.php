<?php get_header(); ?>

<div class="page-wrapper homepage">

	<div class="left-column">
		<!-- Hero story -->
		<?php 
			$args = array(
				'cat' => '2',
				'posts_per_page' => '1'
			);
			$hero = new WP_Query($args);
			if ($hero->have_posts()) {
				while ($hero->have_posts()) {
					$hero->the_post(); 
				 	if (in_category('homepage-featured', $post->ID)) { ?>
					    <div class="homepage-hero">
					     	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>	    		
							<div class="headline">
								<?php the_title() ?>
								<div class="subtitle"><?php the_field("subtitle"); ?></div>
							</div>
					    </div>
				 	<?php }
				} 
			} 
		?>

		<!-- Featured stories -->
		<?php 
			$args = array(
				'posts_per_page' => '4'
			);
			$featured = new WP_Query($args);
			if ($featured->have_posts()) {
				while ($featured->have_posts()) {
					$featured->the_post(); ?>
					<?php if (!in_category(2)) { ?>
					     <div class="category">
			     		 	<div class="category-image">
			     		 		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small'); ?></a>
			     			</div>
			     			<div class="article-text">
			     			 	<h2><?php the_title() ?></h2>
			     			 	<h4><?php the_field("subtitle"); ?></h3>
			     			 	<div class="byline">
			     			 		Byline goes here
			     					<i class="fa fa-facebook-official"></i>
			     					<i class="fa fa-twitter-square"></i>
			     			 	</div>
			     			 	<p>Vim euripidis reformidans ut. Ut has prompta temporibus ullamcorper, ne his rebum novum iisque, stet zril facilis mei ex. Primis vidisse tractatos an usu, pro et mundi aperiri malorum.</p>
			     			</div>
			     		</div>
					<?php }
				} 
			} 
		?>

		

		<!-- <div class="category">
		 	<div class="category-image">thumbnail</div>
			<div class="article-text">
			 	<h2>Headline goes here</h2>
			 	<h4>Subhead goes here</h3>
			 	<div class="byline">
			 		Byline goes here
					<i class="fa fa-facebook-official"></i>
					<i class="fa fa-twitter-square"></i>
			 	</div>
			 	<p>Vim euripidis reformidans ut. Ut has prompta temporibus ullamcorper, ne his rebum novum iisque, stet zril facilis mei ex. Primis vidisse tractatos an usu, pro et mundi aperiri malorum.</p>
			</div>
		</div>
		<div class="category">
		 	<div class="category-image">thumbnail</div>
			<div class="article-text">
			 	<h2>Headline goes here</h2>
			 	<h4>Subhead goes here</h3>
			 	<div class="byline">
			 		Byline goes here
					<i class="fa fa-facebook-official"></i>
					<i class="fa fa-twitter-square"></i>
			 	</div>
			 	<p>Vim euripidis reformidans ut. Ut has prompta temporibus ullamcorper, ne his rebum novum iisque, stet zril facilis mei ex. Primis vidisse tractatos an usu, pro et mundi aperiri malorum. Vim euripidis reformidans ut. Ut has prompta temporibus ullamcorper, ne his rebum novum iisque, stet zril facilis mei ex. Primis vidisse tractatos an usu, pro et mundi aperiri malorum.</p>
			</div>
		 </div>
		 <div class="category">
		 	<div class="category-image">thumbnail</div>
			<div class="article-text">
			 	<h2>Headline goes here</h2>
			 	<h4>Subhead goes here</h3>
			 	<div class="byline">
			 		Byline goes here
					<i class="fa fa-facebook-official"></i>
					<i class="fa fa-twitter-square"></i>
			 	</div>
			 	<p>Vim euripidis reformidans ut. Ut has prompta temporibus ullamcorper, ne his rebum novum iisque, stet zril facilis mei ex. Primis vidisse tractatos an usu, pro et mundi aperiri malorum. Vim euripidis reformidans ut. Ut has prompta temporibus ullamcorper, ne his rebum novum iisque, stet zril facilis mei ex. Primis vidisse tractatos an usu, pro et mundi aperiri malorum. Primis vidisse tractatos an usu, pro et mundi aperiri malorum.</p>
			</div>
		 </div>
		 <div class="category">
		 	<div class="category-image">thumbnail</div>
			<div class="article-text">
			 	<h2>Headline goes here</h2>
			 	<h4>Subhead goes here</h3>
			 	<div class="byline">
			 		Byline goes here
					<i class="fa fa-facebook-official"></i>
					<i class="fa fa-twitter-square"></i>
			 	</div>
			 	<p>Vim euripidis reformidans ut. Ut has prompta temporibus ullamcorper, ne his rebum novum iisque, stet zril facilis mei ex. Primis vidisse tractatos an usu, pro et mundi aperiri malorum. Vim euripidis reformidans ut. Ut has prompta temporibus ullamcorper, ne his rebum novum iisque, stet zril facilis mei ex.</p>
			</div>
		 </div> -->

		 <section class="press-uncuffed">
		 	<h2>Feature Box for Press Uncuffed Campaign</h2>
		 </section>
	</div>	

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
