<?php
//security

use LightSpeed\Elementor\Widgets\LightSpeedElemento;

if (!defined('ABSPATH')) {
    exit;
}

//lightspeed_widget_content_loader
//check if function exists
if (!function_exists('lightspeed_widget_content_loader')) {
    function lightspeed_widget_content_loader($widget, $settings)
    {
        $init = new LightSpeedElemento();
        return $init->widget_content_loader($widget, $settings);
    }
}
