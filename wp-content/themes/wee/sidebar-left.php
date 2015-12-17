<!-- Left colunm -->
<div class="column col-xs-12 col-sm-3" id="left_column">
    <!-- block category -->
    <div class="block left-module">
        <p class="title_block">Информация</p>
        <div class="block_content">
            <!-- layered -->
            <div class="layered layered-category">
                <div class="layered-content">
                    <?php
                        wp_nav_menu( array(
                                'menu' => 'Left Static Menu',
                                'theme_location' => 'leftstatic',
                                'link_before' => '',
                                'link_after' => '',
                                'container' => '',
                                'menu_id' => '',
                                'menu_class' => 'tree-menu',
                                'container_class' => ''
                        ));
                    ?>
                </div>
            </div>
            <!-- ./layered -->
        </div>
    </div>
    <!-- ./block category  -->
    <!-- Banner silebar -->
    <div class="block left-module">
        <div class="banner-opacity">
            <a href="#"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/data/slide-left.jpg" alt="ads-banner"></a>
        </div>
    </div>
    <!-- ./Banner silebar -->
</div>
<!-- ./left colunm -->