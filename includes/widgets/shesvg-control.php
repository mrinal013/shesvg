<?php

trait Shesvg_Control {

    protected function register_controls() {

        $this->start_controls_section(
            'shesvg_content_section',
            [
                'label' => esc_html__( 'Content', 'shesvg' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'shesvg_grid_image',
            [
                'label'     => esc_html__( 'Choose Image', 'shesvg' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'shesvg_grid_title', [
                'label'         => esc_html__( 'Title', 'plugin-name' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'default'       => esc_html__( 'Item' , 'shesvg' ),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'shesvg_grid_subtitle', [
                'label'         => esc_html__( 'Sub-title', 'plugin-name' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'default'       => esc_html__( 'Soko radicchio bunya nuts gram dulse.' , 'shesvg' ),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'shesvg_grid_button', [
                'label'         => esc_html__( 'Button', 'shesvg' ),
                'type'          => \Elementor\Controls_Manager::TEXT,
                'default'       => esc_html__( 'View' , 'shesvg' ),
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'shesvg_grid_link',
            [
                'label'         => esc_html__( 'Link', 'plugin-name' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => esc_html__( 'https://your-link.com', 'shesvg' ),
                'default'       => [
                    'url'               => '',
                    'is_external'       => true,
                    'nofollow'          => true,
                    'custom_attributes' => '',
                ],
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'shesvg',
            [
                'label'     => esc_html__( 'Grid Items', 'shesvg' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'shesvg_grid_title'    => esc_html__( 'Grid Item #1', 'shesvg' ),
                        'shesvg_grid_subtitle' => esc_html__( 'Soko radicchio bunya nuts gram dulse.', 'shesvg' ),
                    ],
                    [
                        'shesvg_grid_title'    => esc_html__( 'Grid Item #2', 'shesvg' ),
                        'shesvg_grid_subtitle' => esc_html__( 'Item content. Click the edit button to change this text.', 'shesvg' ),
                    ],
                ],
                'title_field' => '{{{ shesvg_grid_title }}}',
            ]
        );

        $this->end_controls_section();


        // Style Tab Start

        $this->start_controls_section(
            'shesvg_grid_styles',
            [
                'label' => esc_html__( 'Styles', 'shesvg' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'shesvg_svg_style',
            [
                'label'     => esc_html__( 'SVG style', 'shesvg' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'options'   => [
                    'svg-1' => esc_html__( 'Curve', 'shesvg' ),
                    'svg-2' => esc_html__( 'Wave', 'shesvg' ),
                    'svg-3' => esc_html__( 'Polygon', 'shesvg' ),
                ],
                'default'   => 'svg-1',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'shesvg_grid_button_styles',
            [
                'label' => esc_html__( 'Button Style', 'shesvg' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'shesvg_button_align',
            [
                'label' => esc_html__( 'Button alignment', 'shesvg' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'shesvg' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'shesvg' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'shesvg' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'shesvg_button_border',
                'label'     => esc_html__( 'Button border radius', 'shesvg' ),
                'selector'  => '{{WRAPPER}} .grid figure button',
            ]
        );

        $this->add_control(
            'shesvg_button_width',
            [
                'label'         => esc_html__( 'Button width', 'shesvg' ),
                'type'          => \Elementor\Controls_Manager::SLIDER,
                'size_units'    => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 5,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .grid figure button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'shesvg_button_border_radius',
            [
                'label'         => esc_html__( 'Button border radius', 'shesvg' ),
                'type'          => \Elementor\Controls_Manager::SLIDER,
                'size_units'    => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min'   => 0,
                        'max'   => 100,
                        'step'  => 5,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .grid figure button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'shesvg_button_margin',
            [
                'label' => esc_html__( 'Button margin', 'shesvg' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .grid figure button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'shesvg_button_padding',
            [
                'label' => esc_html__( 'Button padding', 'shesvg' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .grid figure button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'shesvg_grid_title_style',
            [
                'label' => esc_html__( 'Colors', 'shesvg' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'shesvg_title_color',
            [
                'label'     => esc_html__( 'Card title color', 'shesvg' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .grid h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'shesvg_subtitle_color',
            [
                'label'     => esc_html__( 'Card subtitle color', 'shesvg' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .grid p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'shesvg_color',
            [
                'label'     => esc_html__( 'Card SVG color', 'shesvg' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .grid svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'shesvg_button_color',
            [
                'label'     => esc_html__( 'Button color', 'shesvg' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .grid button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'shesvg_button_bg_color',
            [
                'label'     => esc_html__( 'Button background color', 'shesvg' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .grid button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'shesvg_typography',
            [
                'label' => esc_html__( 'Trypography', 'shesvg' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label'     => esc_html__( 'Title typography', 'shesvg' ),
                'name'      => 'shesvg_title_typography',
                'selector'  => '{{WRAPPER}} .grid h2',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label'     => esc_html__( 'Subtitle typography', 'shesvg' ),
                'name'      => 'shesvg_subtitle_typography',
                'selector'  => '{{WRAPPER}} .grid p',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label'     => esc_html__( 'Button typography', 'shesvg' ),
                'name'      => 'shesvg_button_typography',
                'selector'  => '{{WRAPPER}} .grid button',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'shesvg_responsive_item_control',
            [
                'label' => esc_html__( 'Responsiveness', 'shesvg' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'shesvg_responsive_item',
            [
                'type'              => \Elementor\Controls_Manager::NUMBER,
                'label'             => esc_html__( 'Item', 'shesvg' ),
                'devices'           => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default'   => 4,
                'tablet_default'    => 2,
                'mobile_default'    => 1,
            ]
        );

        $this->end_controls_section();
        // Style Tab End

    }

}