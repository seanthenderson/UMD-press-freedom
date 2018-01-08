<div class="byline-box">
	<?php $x = 1; 
	foreach( get_coauthors() as $coauthor ) : 
		if ($x == 1) { ?>
			<h3>
				<?php if(function_exists('coauthors_posts_links')) { ?>
					<?php coauthors_posts_links(); 
				} else { ?>
					By <?php get_the_author();
				} ?>
			</h3>
		<?php } ?>
		<div class="headshot">
			<?php $author_id = get_the_author_meta('ID'); ?>
			<?php echo get_avatar($coauthor->user_email, 'small'); ?>
		</div>
		<p>
			<?php echo $coauthor->description; ?>
		</p>
		<?php $x++; 
	endforeach; ?>
</div>