<?php get_header(); ?>

<?php
	if(isset($_GET['author_name'])) :
		$curauth = get_userdatabylogin($author_name);
	else :
		$curauth = get_userdata(intval($author));
	endif;
	$author = get_user_by('slug', get_query_var('author_name'));
	$author = $author->ID;
?>

<div class="page-wrapper flatpage author-page">
	<div class="left-column">	
		<h1><?php echo $curauth->display_name; ?></h1>
		<div class="avatar">
			<?php foreach( get_coauthors() as $coauthor ) : ?>
 				<a href="<?php echo $coauthor->user_url; ?>"><?php echo get_avatar($coauthor->user_email, '250'); ?></a>
 			<?php endforeach; ?>
		</div>
		<p class="bio"><?php the_author_description(); ?></p>
		<a href="<?php the_field('twitter', 'user_'. $author); ?>" target="_blank">
			<i class="fa fa-twitter"></i>
		</a>
		<a href="<?php the_field('linkedin', 'user_'. $author); ?>" target="_blank" class="social-icon">
			<i class="fa fa-linkedin"></i>
		</a>

		<h3>Stories by <?php echo $curauth->display_name; ?>:</h3>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    <div class="by-author">    
		       	<span class="story">
		            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
		            <?php the_title(); ?></a>,
		        </span>
		        <span class="date"><?php the_time('d M Y'); ?></span>
	        </div>

	    <?php endwhile; else: ?>
	        <p><?php _e('No posts by this author.'); ?></p>

	    <?php endif; ?>
	</div>

	<div class="right-column">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>