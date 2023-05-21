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
<div class="row">
    <div class="col-12" style="margin-bottom: <?php echo esc_attr($settings['space_heading_posts']); ?>px;">
        <div class="d-flex justify-content-between">
            <div>
                <h2 style="    font-size: 20px;"><?php echo esc_html($settings['title']) ?></h2>
            </div>
            <div>
                <a href="<?php echo esc_url($settings['link_url']['url']) ?>"><?php echo esc_html($settings['link_title']) ?></a>
            </div>
        </div>
    </div>
    <?php
    //check if posts exist
    if ($loopposts) :
        //loop through posts
        foreach ($loopposts as $key => $spost) :
            //post thumbnail full
            $thumb = get_the_post_thumbnail_url($spost->ID, 'full');
    ?>
            <div <?php post_class($settings['card_columns'] . " mb-3 ls-posts-card post-card"); ?> id="post-<?php echo $spost->ID; ?>">
                <div class="card p-1">
                    <img src="<?php echo esc_url($thumb); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo get_the_title($spost->ID); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted ">Date: <?php echo get_the_date("", $spost->ID); ?></h6>
                        <p>
                            By: <?php
                                //get author
                                $author = get_post_field('post_author', $spost->ID);
                                //author name
                                $author_name = get_the_author_meta('display_name', $author);
                                //get the author link
                                $author_link = get_author_posts_url($author);
                                //if author link is not empty
                                if (!empty($author_link)) {
                                    //display author link
                                    echo "<a href='$author_link' target='_blank'> " . $author_name . "</a>";
                                }
                                ?>
                        </p>
                        <a href="<?php echo get_the_permalink($spost->ID); ?>" class="btn ls-posts-card__btn text-white <?php echo esc_attr($settings['btn_width_class']); ?>"><?php echo esc_html($settings['button_text']) ?></a>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    else :
        ?>
        <div class="col-12">
            <h3>No posts found</h3>
        </div>
    <?php
    endif;
    ?>
</div>