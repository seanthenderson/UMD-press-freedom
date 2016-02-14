<?php get_header(); ?>

<div class="page-wrapper search-page">
	<div class="left-column">
			<?php if ( have_posts() ) : ?>

                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>"' . get_search_query() . '"</span>' ); ?></h1>

                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="category">
				     	<?php if (has_post_thumbnail()) { ?>
			     		 	<div class="category-image">
			     		 		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small'); ?></a>
			     			</div>
			     		<?php } ?>
		     			<div class="article-text">
		     			 	<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
		     			 	<h4><?php the_field("subtitle"); ?></h3>
		     			 	<div class="byline">
		     			 		<div class="featured-text-byline">
		     			 			<?php if(function_exists('coauthors_posts_links')) { ?>
		     			 				By <?php coauthors_posts_links('display_name'); 
		     			 			} else { ?>
		     			 				By <?php get_the_author();
		     			 			} ?>
		     			 		</div>
		     					<i class="fa fa-facebook-official"></i>
		     					<i class="fa fa-twitter-square"></i>
		     			 	</div>
		     			 	<p><?php the_excerpt(); ?></p>
		     			</div>
		     		</div>
                <?php endwhile; ?>
            <?php else : ?>
                <h1 class="page-title re-search"><?php printf( __( 'No results found for: %s', 'shape' ), '<span>"' . get_search_query() . '"</span>' ); ?></h1>
                <h2>Search again:</h2>
                <div class="search"><?php get_search_form(); ?></div>
            <?php endif; ?>
	</div>

	<div class="right-column">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>