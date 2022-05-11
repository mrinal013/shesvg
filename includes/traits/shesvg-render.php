<?php

trait Shesvg_render {

    protected function render() {
        $settings = $this->get_settings_for_display();
        $card_title = isset( $settings['card_title'] ) ? $settings['card_title'] : '';
        ?>

        <section id="grid" class="grid clearfix">
            <a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                <figure>
                    <img src="img/1.png" />
                    <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                    <figcaption>
                        <h2>Crystalline</h2>
                        <p>Soko radicchio bunya nuts gram dulse.</p>
                        <button>View</button>
                    </figcaption>
                </figure>
            </a>
        </section>
        <script>
            (function() {

                function init() {
                    var speed = 250,
                        easing = mina.easeinout;

                    [].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
                        var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
                            pathConfig = {
                                from : path.attr( 'd' ),
                                to : el.getAttribute( 'data-path-hover' )
                            };

                        el.addEventListener( 'mouseenter', function() {
                            path.animate( { 'path' : pathConfig.to }, speed, easing );
                        } );

                        el.addEventListener( 'mouseleave', function() {
                            path.animate( { 'path' : pathConfig.from }, speed, easing );
                        } );
                    } );
                }

                init();

            })();
        </script>
        <?php
    }

}
