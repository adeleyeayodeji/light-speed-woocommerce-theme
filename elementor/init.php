<?php

/**
 * Light Speed Elementor Widget.
 *  @package Light Speed
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Load widget class file.
class LightSpeedElemento
{
    public function init()
    {
        add_action('elementor/widgets/register', [$this, 'register_posts_slider_widget']);
    }

    /**
     * Register posts slider Widget.
     *
     * Include widget file and register widget class.
     *
     * @since 1.0.0
     * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
     * @return void
     */
    function register_posts_slider_widget($widgets_manager)
    {

        require_once(__DIR__ . '/widgets/posts-slider.php');

        $widgets_manager->register(new \Elementor_postsSlider_Widget());
    }

    /**
     * Widget Content Loader
     * --------------------------------
     * @param $widget
     */
    public function widget_content_loader($widget, $settings)
    {
        ob_start();
        require_once(__DIR__ . '/widgets/views/' . $widget . '.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}

// Instantiate LightSpeedElemento.
$LightSpeedElemento = new LightSpeedElemento();
$LightSpeedElemento->init();

//include helpers
require_once(__DIR__ . '/helpers/helpers.php');