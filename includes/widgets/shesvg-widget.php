<?php
include_once 'shesvg-render.php';
include_once 'shesvg-control.php';

class Shesvg_Widget extends \Elementor\Widget_Base {

    use Shesvg_render, Shesvg_Control;

    public function get_name() {
        return 'shesvg_card_widget';
    }

    public function get_title() {
        return esc_html__( 'Shape Hover Effect Card', 'shesvg' );
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    public function get_keywords() {
        return [ 'shape', 'hover' ];
    }

    public function get_style_depends() {

        wp_register_style( 'shesvg-widget-normalize', plugin_dir_url( 'assets/shesvg/css/normalize.css' ) );
        wp_register_style( 'shesvg-widget-demo', plugin_dir_url( 'assets/shesvg/css/demo.css' ) );
        wp_register_style( 'shesvg-widget-component', plugin_dir_url( 'assets/shesvg/css/component.css' ) );

        return [
            'shesvg-widget-normalize',
            'shesvg-widget-demo',
            'shesvg-widget-component',
        ];

    }

    public function get_script_depends() {
        wp_register_script( 'shesvg-widget', plugins_url( 'shesvg-elementor/assets/shesvg/js/snap.svg-min.js' ), [ 'jquery' ], null, false );

        return [
            'shesvg-widget',
        ];

    }

}
