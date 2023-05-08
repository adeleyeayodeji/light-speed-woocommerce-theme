<?php

namespace LightSpeed\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor PostsCard Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_postsCard_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve PostsCard widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'light-speed-posts-card';
    }

    /**
     * Get widget title.
     *
     * Retrieve PostsCard widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Lightspeed Posts Card', 'lightspeed');
    }

    /**
     * Get widget icon.
     *
     * Retrieve PostsCard widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-post-list';
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
     * Retrieve the list of categories the PostsCard widget belongs to.
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
     * Retrieve the list of keywords the PostsCard widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['postscard', 'posts', 'post', 'card', 'carousel'];
    }

    //get post types
    public function get_posts_types()
    {
        return [
            'post' => esc_html__('Post', 'lightspeed'),
            'page' => esc_html__('Page', 'lightspeed'),
            'product' => esc_html__('Product', 'lightspeed'),
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
     * Register PostsCard widget controls.
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
                'label' => esc_html__('Posts Card', 'lightspeed'),
            ]
        );

        //title
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Recent Posts', 'lightspeed'),
            ]
        );

        //link_title
        $this->add_control(
            'link_title',
            [
                'label' => esc_html__('Link Title', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All', 'lightspeed'),
            ]
        );

        //link_url
        $this->add_control(
            'link_url',
            [
                'label' => esc_html__('Link URL', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'lightspeed'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        //space between heading and posts
        $this->add_control(
            'space_heading_posts',
            [
                'label' => esc_html__('Space Between Posts', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 10,
            ]
        );

        //heading POST QUERY
        $this->add_control(
            'heading_post_query',
            [
                'label' => esc_html__('Post Query', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        //posts type
        $this->add_control(
            'posts_type',
            [
                'label' => esc_html__('Posts Type', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'post',
                'options' => $this->get_posts_types(),
            ]
        );

        //posts count
        $this->add_control(
            'posts_count',
            [
                'label' => esc_html__('Posts Count', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
            ]
        );

        //posts order by
        $this->add_control(
            'posts_orderby',
            [
                'label' => esc_html__('Posts Order By', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => esc_html__('Date', 'lightspeed'),
                    'title' => esc_html__('Title', 'lightspeed'),
                    'rand' => esc_html__('Random', 'lightspeed'),
                ],
            ]
        );

        //posts order
        $this->add_control(
            'posts_order',
            [
                'label' => esc_html__('Posts Order', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'DESC' => esc_html__('Descending', 'lightspeed'),
                    'ASC' => esc_html__('Ascending', 'lightspeed'),
                ],
            ]
        );

        //posts category
        $this->add_control(
            'posts_category',
            [
                'label' => esc_html__('Posts Category', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->get_posts_categories(),
            ]
        );

        //heading CARDS STYLE
        $this->add_control(
            'heading_cards',
            [
                'label' => esc_html__('Cards Style', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        //card columns on multiple devices
        $this->add_responsive_control(
            'card_columns',
            [
                'label' => esc_html__('Columns', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-lg-3 col-md-6 col-sm-12',
                'options' => [
                    'col-lg-3 col-md-6 col-sm-12' => esc_html__('4 Columns', 'lightspeed'),
                    'col-lg-4 col-md-6 col-sm-12' => esc_html__('3 Columns', 'lightspeed'),
                    'col-lg-6 col-md-6 col-sm-12' => esc_html__('2 Columns', 'lightspeed'),
                    'col-lg-12 col-md-6 col-sm-12' => esc_html__('1 Column', 'lightspeed'),
                ],
            ]
        );

        //heading BUTTON
        $this->add_control(
            'heading_button',
            [
                'label' => esc_html__('Button', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        //button text
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'lightspeed'),
            ]
        );

        //btn_background
        $this->add_control(
            'btn_background',
            [
                'label' => esc_html__('Button Background', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .ls-posts-card .ls-posts-card__btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //btn width class
        $this->add_control(
            'btn_width_class',
            [
                'label' => esc_html__('Button Width', 'lightspeed'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'w-50',
                'options' => [
                    'w-25' => esc_html__('25%', 'lightspeed'),
                    'w-50' => esc_html__('50%', 'lightspeed'),
                    'w-75' => esc_html__('75%', 'lightspeed'),
                    'w-100' => esc_html__('100%', 'lightspeed'),
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render PostsCard widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        echo lightspeed_widget_content_loader("posts-card", $settings);
    }
}
