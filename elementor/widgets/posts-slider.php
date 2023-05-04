<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor PostsSlider Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_postsSlider_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve PostsSlider widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'posts-slider';
    }

    /**
     * Get widget title.
     *
     * Retrieve PostsSlider widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Posts Slider', 'elementor-postsslider-widget');
    }

    /**
     * Get widget icon.
     *
     * Retrieve PostsSlider widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-slider-push';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url()
    {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the PostsSlider widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['general'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the PostsSlider widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['postsslider', 'posts', 'post', 'slider', 'carousel'];
    }

    //get post types
    public function get_posts_types()
    {
        return [
            'post' => esc_html__('Post', 'elementor-postsslider-widget'),
            'page' => esc_html__('Page', 'elementor-postsslider-widget'),
            'product' => esc_html__('Product', 'elementor-postsslider-widget'),
        ];
    }

    //get_posts_categories
    public function get_posts_categories()
    {
        $categories = get_categories();
        $categories_options = [];
        foreach ($categories as $category) {
            $categories_options[$category->term_id] = $category->name;
        }
        return $categories_options;
    }

    /**
     * Register PostsSlider widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Posts Slider', 'elementor-postsslider-widget'),
            ]
        );

        //posts type
        $this->add_control(
            'posts_type',
            [
                'label' => esc_html__('Posts Type', 'elementor-postsslider-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'post',
                'options' => $this->get_posts_types(),
            ]
        );

        //posts count
        $this->add_control(
            'posts_count',
            [
                'label' => esc_html__('Posts Count', 'elementor-postsslider-widget'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
            ]
        );

        //posts order by
        $this->add_control(
            'posts_orderby',
            [
                'label' => esc_html__('Posts Order By', 'elementor-postsslider-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => esc_html__('Date', 'elementor-postsslider-widget'),
                    'title' => esc_html__('Title', 'elementor-postsslider-widget'),
                    'rand' => esc_html__('Random', 'elementor-postsslider-widget'),
                ],
            ]
        );

        //posts order
        $this->add_control(
            'posts_order',
            [
                'label' => esc_html__('Posts Order', 'elementor-postsslider-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'DESC' => esc_html__('Descending', 'elementor-postsslider-widget'),
                    'ASC' => esc_html__('Ascending', 'elementor-postsslider-widget'),
                ],
            ]
        );

        //posts category
        $this->add_control(
            'posts_category',
            [
                'label' => esc_html__('Posts Category', 'elementor-postsslider-widget'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->get_posts_categories(),
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render PostsSlider widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        echo lightspeed_widget_content_loader("posts-slider", $settings);
    }
}