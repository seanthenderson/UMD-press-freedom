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
			<?php $author_id = get_the_author_meta('ID'); ?>
			<a href="<?php echo $coauthor->user_url; ?>"><?php echo get_avatar('small'); ?></a>
			<div class="social-icon"> 	
				<a href="<?php the_field('twitter', 'user_'. $author_id); ?>" target="_blank">
					<i class="fa fa-twitter"></i>
				</a>
			</div>
			<div class="social-icon">
				<a href="<?php the_field('linkedin', 'user_'. $author_id); ?>" target="_blank" class="social-icon">
					<i class="fa fa-linkedin"></i>
				</a>
			</div>
		</div>
		<p>
			<?php echo $coauthor->description; ?>
		</p>
	<?php endforeach; ?>
</div>