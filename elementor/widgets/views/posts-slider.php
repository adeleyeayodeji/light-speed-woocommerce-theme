<?php
//security
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
//get posts
$loopposts = get_posts(
    array(
        'post_type' => $settings['posts_type'],
        'posts_per_page' => $settings['posts_count'],
        'orderby' => $settings['posts_orderby'],
        'order' => $settings['posts_order'],
        'category__in' => $settings['posts_category'],
    )
);
?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
        //check if posts exist
        if ($loopposts) :
            //loop through posts
            foreach ($loopposts as $key => $spost) :
                //post thumbnail full
                $thumb = get_the_post_thumbnail_url($spost->ID, 'full');
        ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo esc_html($key); ?>" class="<?php echo $key == 0 ? 'active' : ''; ?>" aria-current="true" aria-label="<?php echo esc_html($spost->post_title); ?>"></button>
        <?php
            endforeach;
        endif;
        ?>
    </div>
    <div class="carousel-inner">
        <?php
        //check if posts exist
        if ($loopposts) : //loop through posts
            foreach ($loopposts as $key => $spost) :
                //post thumbnail full
                $thumb = get_the_post_thumbnail_url($spost->ID, 'full');
        ?>
                <div class="carousel-item <?php echo $key == 0 ? 'active' : ''; ?>">
                    <img src="<?php echo esc_url($thumb); ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h5>
                            <?php echo esc_html($spost->post_title); ?>
                        </h5>
                        <p>
                            <?php echo esc_html($spost->post_excerpt); ?>
                        </p>
                    </div>
                </div>
        <?php
            endforeach;
        else :
            echo 'No posts found';
        endif;
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>