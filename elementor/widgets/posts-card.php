<?php
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
        return 'posts-card';
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
        return ['general'];
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
