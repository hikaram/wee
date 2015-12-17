<!-- Home slider-->
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 slider-left"></div>
            <div class="col-sm-9 header-top-right">
                <div class="homeslider">
                    <?php if( have_rows('slides', 11) ): ?>
                    <div class="content-slide">
                        <ul id="contenhomeslider">
                        <?php while ( have_rows('slides', 11) ) : the_row();
                            $slide_thumb  = get_sub_field('slide_thumb');
                            $slide_params = array( 'width' => 900, 'height' => 450, 'crop' => true );
                            $slide_params_2 = array( 'width' => 234, 'height' => 450, 'crop' => true );
                        ?>
                          <li><img alt="" src="<?php echo bfi_thumb( $slide_thumb, $slide_params ); ?>" title="" /></li>
                        <?php endwhile; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Home slideder-->