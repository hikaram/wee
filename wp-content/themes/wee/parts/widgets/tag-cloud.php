<?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
    <!-- tags -->
    <div class="block left-module">
        <p class="title_block">Тэги</p>
        <div class="block_content">
            <div class="tags">
                <?php wp_tag_cloud( 'smallest=8&largest=22' ); ?>
            </div>
        </div>
    </div>
    <!-- ./tags -->
<?php endif; ?>