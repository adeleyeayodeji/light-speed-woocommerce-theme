<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Light_Speed
 */

get_header();
?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-12">
		<main id="primary" class="site-main">

			<?php
			while (have_posts()) :
				the_post();

				get_template_part('template-parts/content-single', get_post_type());

			?>
				<div class="card mb-3">
					<div class="card-body">
						<?php
						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'light-speed') . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'light-speed') . '</span> <span class="nav-title">%title</span>',
							)
						);
						?>
					</div>
				</div>
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
