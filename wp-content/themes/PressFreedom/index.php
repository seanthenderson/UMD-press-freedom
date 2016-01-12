<?php get_header(); ?>

<div class="page-wrapper homepage">

	<div class="left-column">
		<?php 
			if (have_posts()) {
				while (have_posts()) {
					the_post(); 
					 if (has_post_thumbnail() ) { ?>
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
		 </div>

		 <section class="press-uncuffed">
		 	<h2>Feature Box for Press Uncuffed Campaign</h2>
		 </section>
	</div>	

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
