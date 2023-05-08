<?php

namespace LightSpeed\Elementor\Widgets;

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
        return 'light-speed-posts-slider';
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
        return esc_html__('Lightspeed Posts Slider', 'light-speed');
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
        return ['lightspeed'];
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
            'post' => esc_html__('Post', 'light-speed'),
            'page' => esc_html__('Page', 'light-speed'),
            'product' => esc_html__('Product', 'light-speed'),
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
                'label' => esc_html__('Posts Slider', 'light-speed'),
            ]
        );

        //posts type
        $this->add_control(
            'posts_type',
            [
                'label' => esc_html__('Posts Type', 'light-speed'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'post',
                'options' => $this->get_posts_types(),
            ]
        );

        //posts count
        $this->add_control(
            'posts_count',
            [
                'label' => esc_html__('Posts Count', 'light-speed'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
            ]
        );

        //posts order by
        $this->add_control(
            'posts_orderby',
            [
                'label' => esc_html__('Posts Order By', 'light-speed'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => esc_html__('Date', 'light-speed'),
                    'title' => esc_html__('Title', 'light-speed'),
                    'rand' => esc_html__('Random', 'light-speed'),
                ],
            ]
        );

        //posts order
        $this->add_control(
            'posts_order',
            [
                'label' => esc_html__('Posts Order', 'light-speed'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'DESC' => esc_html__('Descending', 'light-speed'),
                    'ASC' => esc_html__('Ascending', 'light-speed'),
                ],
            ]
        );

        //posts category
        $this->add_control(
            'posts_category',
            [
                'label' => esc_html__('Posts Category', 'light-speed'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->get_posts_categories(),
            ]
        );

        //show post_excerpt or not
        $this->add_control(
            'show_post_excerpt',
            [
                'label' => esc_html__('Show Post Excerpt', 'light-speed'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'light-speed'),
                'label_off' => esc_html__('Hide', 'light-speed'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //HEADING BUTTON
        $this->add_control(
            'heading_button',
            [
                'label' => esc_html__('Button', 'light-speed'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        //show or hide button
        $this->add_control(
            'show_button',
            [
                'label' => esc_html__('Show Button', 'light-speed'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'light-speed'),
                'label_off' => esc_html__('Hide', 'light-speed'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //button text
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'light-speed'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'light-speed'),
            ]
        );

        //button style
        $this->add_control(
            'button_style',
            [
                'label' => esc_html__('Button Style', 'light-speed'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'btn btn-sm border border-white text-white',
                'options' => [
                    'btn btn-sm border border-white text-white' => esc_html__('Default Style', 'light-speed'),
                    'btn btn-sm btn-primary' => esc_html__('Primary', 'light-speed'),
                    'btn btn-sm btn-secondary' => esc_html__('Secondary', 'light-speed'),
                    'btn btn-sm btn-success' => esc_html__('Success', 'light-speed'),
                    'btn btn-sm btn-danger' => esc_html__('Danger', 'light-speed'),
                    'btn btn-sm btn-warning' => esc_html__('Warning', 'light-speed'),
                    'btn btn-sm btn-info' => esc_html__('Info', 'light-speed'),
                    'btn btn-sm btn-light' => esc_html__('Light', 'light-speed'),
                    'btn btn-sm btn-dark' => esc_html__('Dark', 'light-speed'),
                ],
            ]
        );

        //button color
        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Button Text Color', 'light-speed'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .carousel-inner .carousel-item .btn' => 'color: {{VALUE}}',
                ],
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
