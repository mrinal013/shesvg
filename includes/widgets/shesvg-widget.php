<?php
include_once 'shesvg-render.php';
include_once 'shesvg-control.php';

class Shesvg_Widget extends \Elementor\Widget_Base {

    use Shesvg_render, Shesvg_Control;

    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);

        wp_register_style( 'shesvg-widget-normalize', plugins_url( 'assets/shesvg/css/normalize.css', dirname(__DIR__) ) );
        wp_register_style( 'shesvg-widget-component', plugins_url('assets/shesvg/css/component.css', dirname(__DIR__) ) );

        wp_register_script( 'shesvg-widget-mina', plugins_url( 'assets/shesvg/js/mina.js', dirname(__DIR__) ), [], null, true  );
        wp_register_script( 'shesvg-widget-hover', plugins_url( 'assets/shesvg/js/hovers.js', dirname(__DIR__) ), [ 'shesvg-widget-mina' ], null, true  );
        wp_register_script( 'shesvg-widget-snapsvg', plugins_url( 'assets/shesvg/js/snap.svg-min.js', dirname(__DIR__) ), [], null, true );
    }

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

        return [
            'shesvg-widget-normalize',
            'shesvg-widget-component',
        ];

    }

    public function get_script_depends() {

        return [
            'shesvg-widget-snapsvg',
            'shesvg-widget-mina',
            'shesvg-widget-hover',
        ];

    }

}
