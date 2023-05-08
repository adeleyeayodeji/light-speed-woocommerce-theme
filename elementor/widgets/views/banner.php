<?php
//security 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<div class="lightspeed-banner">
    <div class="lightspeed-banner-content">
        <h3><?php echo esc_html($settings['title']); ?></h3>
        <p>
            <?php echo esc_html($settings['description']); ?>
        </p>
        <a href="<?php echo esc_url($settings['button_link']); ?>" class="btn"><?php echo esc_html($settings['button_text']); ?></a>
    </div>
</div>