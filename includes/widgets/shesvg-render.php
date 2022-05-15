<?php

trait Shesvg_render {

    protected function render() {
        $settings = $this->get_settings_for_display();
        $shesvg_contents = $settings['shesvg'];
        $svg_style = isset( $settings['shesvg_svg_style'] ) ? $settings['shesvg_svg_style'] : '';

        switch ( $svg_style ) {
            case 'svg-1':
                $data_path = 'M 180,160 0,218 0,0 180,0 z';
                $data_path_to = 'm 180,34.57627 -180,0 L 0,0 180,0 z';
            break;
            case 'svg-2':
                $data_path = 'm 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z';
                $data_path_to = 'm 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z';
            break;
            case 'svg-3':
                $data_path = 'M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z';
                $data_path_to = 'M 0,0 0,38 90,58 180.5,38 180,0 z';
            break;
            default:
                $data_path = 'M 180,160 0,218 0,0 180,0 z';
                $data_path_to = 'm 180,34.57627 -180,0 L 0,0 180,0 z';
        }

        $button_alignment = isset( $settings['shesvg_button_align'] ) ? $settings['shesvg_button_align'] : '';

        $default_post_id = get_option( 'elementor_active_kit' );
        $global_data = get_post_meta( $default_post_id, '_elementor_page_settings', true );

        $mobile_breakpoint = isset( $global_data['container_width_mobile']['size'] ) && ! empty( $global_data['container_width_mobile']['size'] )? $global_data['container_width_mobile']['size'] : 768;
        $tablet_breakpoint = isset( $global_data['container_width_tablet']['size'] ) && ! empty( $global_data['container_width_tablet']['size'] )? $global_data['container_width_tablet']['size'] : 1024;
        $desktop_breakpoint = isset( $global_data['container_width_tablet']['size'] ) && ! empty( $global_data['container_width_tablet']['size'] )? $global_data['container_width_tablet']['size'] : 1024;

        $desktop_responsive_item = isset( $settings['shesvg_responsive_item'] ) && ! empty( $settings['shesvg_responsive_item'] ) ? $settings['shesvg_responsive_item'] : 4;
        $tablet_responsive_item = isset( $settings['shesvg_responsive_item_tablet'] ) && ! empty( $settings['shesvg_responsive_item_tablet'] ) ? $settings['shesvg_responsive_item_tablet'] : 2;

        $desktop_responsive_width = ( 100 / $desktop_responsive_item ) . '%';
        $tablet_responsive_width = ( 100 / $tablet_responsive_item ) . '%';

        if ( !empty( $shesvg_contents ) ) :
        ?>
        <style>
            .grid a {
                width: 100% !important;
            }
            @media only screen and (min-width: <?php echo $mobile_breakpoint; ?>px) {
                .grid a {
                    width: <?php echo $tablet_responsive_width; ?> !important;
                }
            }
            @media only screen and (min-width: <?php echo $tablet_breakpoint; ?>px) {
                .grid a {
                    width: <?php echo $desktop_responsive_width; ?> !important;
                }
            }

        </style>
        <div>
        <section id="grid" class="grid clearfix">
            <?php
            foreach ( $shesvg_contents as $content ) :
                $url = isset( $content['shesvg_grid_link']['url'] ) ? $content['shesvg_grid_link']['url'] : '#';
                $image = isset( $content['shesvg_grid_image']['url'] ) ? $content['shesvg_grid_image']['url'] : '';
                $title = isset( $content['shesvg_grid_title'] ) ? $content['shesvg_grid_title'] : '';
                $subtitle = isset( $content['shesvg_grid_subtitle'] ) ? $content['shesvg_grid_subtitle'] : '';
                $button = isset( $content['shesvg_grid_button'] ) ? $content['shesvg_grid_button'] : '';
            ?>
            <a href="<?php echo $url; ?>" data-path-to="<?php echo $data_path_to; ?>" style="padding: 15px;">
                <figure style="height: <?php echo $settings['shesvg_image_height'] . 'px'; ?>">
                    <img src="<?php echo $image; ?>"/>
                    <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="<?php echo $data_path; ?>"/></svg>
                    <figcaption>
                        <h2><?php echo $title; ?></h2>
                        <p><?php echo $subtitle; ?></p>
                        <div class="button-wrapper" style="text-align: <?php echo $button_alignment; ?>">
                            <button><?php echo $button; ?></button>
                        </div>
                    </figcaption>
                </figure>
            </a>
                <?php
            endforeach;
                ?>
        </section>
        </div>
<?php
endif;
    }
}
