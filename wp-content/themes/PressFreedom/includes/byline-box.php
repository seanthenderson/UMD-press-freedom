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