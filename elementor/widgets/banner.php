<?php

namespace LightSpeed\Elementor\Widgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Banner Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Banner_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Banner widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'light-speed-banner';
    }

    /**
     * Get widget title.
     *
     * Retrieve Banner widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Lightspeed Banner', 'light-speed');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Banner widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-image';
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
     * Retrieve the list of categories the Banner widget belongs to.
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
     * Register Banner widget controls.
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
                'label' => esc_html__('Image Banner', 'light-speed'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'light-speed'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'selectors' => [
                    '{{WRAPPER}} .lightspeed-banner' => 'background-image: url({{URL}})',
                ],
            ]
        );

        //image style
        $this->add_control(
            'image_style',
            [
                'label' => esc_html__('Image Style', 'light-speed'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'auto' => esc_html__('Auto', 'light-speed'),
                    'cover' => esc_html__('Cover', 'light-speed'),
                    'contain' => esc_html__('Contain', 'light-speed'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .lightspeed-banner' => 'background-size: {{VALUE}}',
                ],
            ]
        );

        //lightspeed-banner-content padding
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__('Banner Padding', 'light-speed'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'default' => [
                    'top' => '100',
                    'right' => '20',
                    'bottom' => '100',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .lightspeed-banner-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        //image position
        $this->add_control(
            'image_position',
            [
                'label' => esc_html__('Image Position', 'light-speed'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'center center',
                'options' => [
                    'center center' => esc_html__('Center Center', 'light-speed'),
                    'center top' => esc_html__('Center Top', 'light-speed'),
                    'center bottom' => esc_html__('Center Bottom', 'light-speed'),
                    'left top' => esc_html__('Left Top', 'light-speed'),
                    'left center' => esc_html__('Left Center', 'light-speed'),
                    'left bottom' => esc_html__('Left Bottom', 'light-speed'),
                    'right top' => esc_html__('Right Top', 'light-speed'),
                    'right center' => esc_html__('Right Center', 'light-speed'),
                    'right bottom' => esc_html__('Right Bottom', 'light-speed'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .lightspeed-banner' => 'background-position: {{VALUE}}',
                ],
            ]
        );

        //title
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'light-speed'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Title', 'light-speed'),
                'placeholder' => esc_html__('Enter your title', 'light-speed'),
            ]
        );

        //description
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'light-speed'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Description', 'light-speed'),
                'placeholder' => esc_html__('Enter your description', 'light-speed'),
            ]
        );

        //button text
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'light-speed'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Button Text', 'light-speed'),
                'placeholder' => esc_html__('Enter your button text', 'light-speed'),
            ]
        );

        //button link
        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'light-speed'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('#', 'light-speed'),
                'placeholder' => esc_html__('Enter your button link', 'light-speed'),
            ]
        );

        //button background
        $this->add_control(
            'button_background',
            [
                'label' => esc_html__('Button Background', 'light-speed'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => esc_html__('#000', 'light-speed'),
                'placeholder' => esc_html__('Enter your button background', 'light-speed'),
                'selectors' => [
                    '{{WRAPPER}} .lightspeed-banner lightspeed-banner-content .btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //button hover background
        $this->add_control(
            'button_hover_background',
            [
                'label' => esc_html__('Button Hover Background', 'light-speed'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => esc_html__('#000', 'light-speed'),
                'placeholder' => esc_html__('Enter your button hover background', 'light-speed'),
                'selectors' => [
                    '{{WRAPPER}} .lightspeed-banner lightspeed-banner-content .btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //button color
        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Button Color', 'light-speed'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => esc_html__('#fff', 'light-speed'),
                'placeholder' => esc_html__('Enter your button color', 'light-speed'),
                'selectors' => [
                    '{{WRAPPER}} .lightspeed-banner lightspeed-banner-content .btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        //button hover color
        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__('Button Hover Color', 'light-speed'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => esc_html__('#fff', 'light-speed'),
                'placeholder' => esc_html__('Enter your button hover color', 'light-speed'),
                'selectors' => [
                    '{{WRAPPER}} .lightspeed-banner lightspeed-banner-content .btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Banner widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();
        //get the unique id for the banner
        $banner_id = $this->get_id();
        //pass to settings
        $settings['banner_id'] = $banner_id;
        echo lightspeed_widget_content_loader("banner", $settings);
    }
}
