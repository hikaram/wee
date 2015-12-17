<?php
    $current_category_obj = get_queried_object();
    $current_category_id = $current_category_obj->cat_ID;
    $categories = get_categories('child_of=6&hide_empty=0');
?>
<?php if ($categories) : ?>
    <!-- Blog category -->
    <div class="block left-module">
        <p class="title_block">Категории</p>
        <div class="block_content">
            <!-- layered -->
            <div class="layered layered-category">
                <div class="layered-content">
                    <ul class="tree-menu">
                        <?php foreach ($categories as $category) : ?>
                            <li<?=$category->cat_ID == $current_category_id ? ' class="active"' : ''; ?>><span></span><a title="<?php echo $category->cat_name; ?>" href="<?php echo get_category_link( $category->cat_ID ); ?>"><?php echo $category->cat_name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- ./layered -->
        </div>
    </div>
    <!-- ./blog category  -->
<?php endif; ?>