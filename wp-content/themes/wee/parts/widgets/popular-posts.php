<!-- Popular Posts -->
<div class="block left-module">
    <p class="title_block">Популярное</p>
    <div class="block_content" style="padding-top: 0;">
        <!-- layered -->
        <div class="layered">
            <div class="layered-content" style="padding-top: 0;">
                <ul class="blog-list-sidebar clearfix">
                    <li>
                      <!--  <div class="post-thumb">
                            <a href="#"><img src="<?php //echo get_stylesheet_directory_uri() ?>/assets/data/blog-thumb1.jpg" alt="Blog"></a>
                        </div>
                        <div class="post-info">
                            <h5 class="entry_title"><a href="#">Lorem ipsum dolor sit amet</a></h5>
                        </div>-->
                        <?php wee_popular_posts(4); ?>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./layered -->
    </div>
</div>
<!-- ./Popular Posts -->