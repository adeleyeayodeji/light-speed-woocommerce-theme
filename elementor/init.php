<?php

namespace LightSpeed\Elementor\Widgets;

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
        //register elementor category
        add_action('elementor/elements/categories_registered', [$this, 'register_elementor_widget_categories']);
        //widget register_posts_slider_widget
        add_action('elementor/widgets/register', [$this, 'register_posts_slider_widget']);
        //add widget posts card
        add_action('elementor/widgets/register', [$this, 'register_posts_card_widget']);
        //widget banner
        add_action('elementor/widgets/register', [$this, 'register_banner_widget']);
    }

    /**
     * Register elementor widget categories
     * --------------------------------
     * @param $elements_manager
     */
    public function register_elementor_widget_categories($elements_manager)
    {
        $elements_manager->add_category(
            'lightspeed',
            [
                'title' => __('Light Speed', 'lightspeed'),
                'icon' => 'fa fa-plug',
            ]
        );
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

        $widgets_manager->register(new Elementor_postsSlider_Widget());
    }

    /**
     * Register posts card Widget.
     *
     * Include widget file and register widget class.
     *
     * @since 1.0.0
     * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
     * @return void
     */
    function register_posts_card_widget($widgets_manager)
    {

        require_once(__DIR__ . '/widgets/posts-card.php');

        $widgets_manager->register(new Elementor_postsCard_Widget());
    }

    /**
     * Register banner Widget.
     *
     * Include widget file and register widget class.
     *
     * @since 1.0.0
     * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
     * @return void
     */
    function register_banner_widget($widgets_manager)
    {

        require_once(__DIR__ . '/widgets/banner.php');

        $widgets_manager->register(new Elementor_banner_Widget());
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
