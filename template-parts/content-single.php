<div class="lightspeed-content-area">
    <div class="header-image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
        <div class="header-image-bg">
            <h3>
                <?php echo get_the_title(); ?>
            </h3>
            <ul class="breadcrum">
                <li>
                    <a href="<?php echo site_url('/'); ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo site_url('blog'); ?>">Blog</a>
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
    <div class="body-content-area my-3 mb-4">
        <?php echo get_the_content(); ?>
    </div>
</div>