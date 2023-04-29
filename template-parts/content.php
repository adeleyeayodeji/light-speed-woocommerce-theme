<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Light_Speed
 */

?>
<div <?php post_class("col-lg-3 col-md-3 col-sm-12 post-card"); ?> id="post-<?php the_ID(); ?>">
	<div class="card">
		<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top" alt="...">
		<div class="card-body">
			<h5 class="card-title"><?php echo get_the_title(); ?></h5>
			<h6 class="card-subtitle mb-2 text-muted ">Date: <?php echo get_the_date(); ?></h6>
			<p>
				By: <?php
					//get the author link
					$author_link = get_author_posts_url(get_the_author_meta('ID'));
					//if author link is not empty
					if (!empty($author_link)) {
						//display author link
						echo "<a href='$author_link' target='_blank'> " . get_the_author() . "</a>";
					}
					?>
			</p>
			<a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary text-white">Read More</a>
		</div>
	</div>
</div>