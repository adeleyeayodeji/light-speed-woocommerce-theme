<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Light_Speed
 */
//check if the post support elementor
if (get_post_meta(get_the_ID(), '_elementor_edit_mode', true)) {
	//if the post support elementor, then load the elementor template
	echo '<div class="lightspeed-content-area">';
	the_content();
	echo '</div>';
	return;
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="lightspeed-content-area">
		<div class="header-image bg-white">
			<div class="header-image-bg py-5">
				<h3>
					<?php echo get_the_title(); ?>
				</h3>
				<ul class="breadcrum">
					<li>
						<a href="<?php echo site_url('/'); ?>">Home</a>
					</li>
					<li>
						<a href="<?php echo site_url('/'); ?>">Page</a>
					</li>
					<li>
						<a href="<?php echo the_permalink(); ?>">
							<?php echo get_the_title(); ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="content-meta my-3 text-center">
			<p>
				Posted By: <?php the_author_posts_link(); ?> | Posted On: <?php echo get_the_date(); ?> | Posted In: <?php echo get_the_category_list(', '); ?>
			</p>
		</div>
		<div class="body-content-area my-3 mb-4 px-4">
			<?php echo get_the_content(); ?>
		</div>
	</div>
</div>