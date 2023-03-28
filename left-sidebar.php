<?php
// 获取提交的分类ID
$category_id = isset($_GET['post_category']) ? intval($_GET['post_category']) : '';

// 构建查询参数
$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
);

// 如果指定了分类ID，则添加分类过滤条件
if ($category_id) {
    $query_args['cat'] = $category_id;
}

$post_query = new WP_Query($query_args);
?>

<!-- Select组件和表单 -->
<form method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <select name="post_category" id="post_category" class="form-select custom-select-margin" onchange="this.form.submit()" >
        <option value="">所有分类</option>
        <?php
        $categories = get_categories(array('orderby' => 'name', 'order' => 'ASC'));
        foreach ($categories as $category) {
            $selected = ($category_id == $category->term_id) ? 'selected' : '';
            echo '<option value="' . $category->term_id . '" ' . $selected . '>' . $category->name . '</option>';
        }
        ?>
    </select>
</form>

<!-- 文章列表 -->
<?php if ($post_query->have_posts()): ?>
    <ul class="left-sidebar-post-list list-group">
        <?php while ($post_query->have_posts()):
            $post_query->the_post();
            $current_post_id = get_the_ID();
            $is_active = is_single() && $current_post_id == get_queried_object_id();
            $font_weight = $is_active ? 'font-weight-bold' : 'font-weight-normal';
            $active_class = $is_active ? 'gitbook-active' : ''; ?>
            <a href="<?php the_permalink(); ?>" class="text-decoration-none <?php echo $active_class; ?> list-group-item <?php echo $font_weight; ?>">
                <li>
                    <?php the_title(); ?>
                </li>
            </a>
        <?php endwhile; ?>
    </ul>
<?php endif;
wp_reset_postdata(); ?>
