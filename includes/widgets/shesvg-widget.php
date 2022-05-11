<?php

class Shesvg_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'shesvg_card_widget';
    }

    public function get_title() {
        return esc_html__( 'SheSVG Card', 'shesvg' );
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    public function get_keywords() {
        return [ 'shesvg', 'pixelaar' ];
    }

    protected function register_controls() {

        // Content Tab Start

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__( 'Card Title', 'shesvg' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'card_title',
            [
                'label' => esc_html__( 'Title', 'shesvg' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Popular', 'shesvg' ),
            ]
        );

        $this->end_controls_section();

        // Content Tab End


        // Style Tab Start

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__( 'Card Title', 'shesvg' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Card title color', 'shesvg' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Tab End

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $card_title = isset( $settings['card_title'] ) ? $settings['card_title'] : '';
        ?>

        <p class="card-title"><?php echo $card_title; ?></p>

        <?php
    }

}
