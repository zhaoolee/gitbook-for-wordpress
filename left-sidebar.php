<?php
// 获取提交的分类slug
$category_slug = isset($_GET['post_category']) ? sanitize_title($_GET['post_category']) : '';

// 构建查询参数
$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
);

// 如果指定了分类slug，则添加分类过滤条件
if ($category_slug) {
    $query_args['category_name'] = $category_slug;
}

$post_query = new WP_Query($query_args);
?>

<!-- Select组件和表单 -->
<form method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <select name="post_category" class="post_category form-select custom-select-margin">
        <option value="">所有分类</option>
        <?php
        $categories = get_categories(array('orderby' => 'name', 'order' => 'ASC'));
        foreach ($categories as $category) {
            $selected = ($category_slug == $category->slug) ? 'selected' : '';
            echo '<option value="' . $category->slug . '" ' . $selected . '>' . $category->name . '</option>';
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
            <?php
            // 检查文章URL是否包含查询参数
            $post_permalink = get_permalink();
            $separator = (false === strpos($post_permalink, '?')) ? '?' : '&';
            $category_param = $category_slug ? $separator . 'post_category=' . $category_slug : '';
            ?>
            <a href="<?php echo $post_permalink . $category_param; ?>" class="text-decoration-none <?php echo $active_class; ?> list-group-item <?php echo $font_weight; ?>">
                <li>
                    <?php the_title(); ?>
                </li>
            </a>
        <?php endwhile; ?>
    </ul>
<?php endif;
wp_reset_postdata(); ?>

<!-- 添加JavaScript代码，实现页面加载时设置选择器值并自动提交表单 -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var postCategorySelects = document.querySelectorAll('.post_category');

        // 为每个匹配的<select>元素添加事件监听器
        postCategorySelects.forEach(function (postCategorySelect) {
            postCategorySelect.addEventListener('change', function () {
                this.form.submit();
            });

            // 获取当前URL中的查询参数
            var searchParams = new URLSearchParams(window.location.search);

            // 如果URL中包含'category_name'查询参数，设置选择器的值
            if (searchParams.has('category_name')) {
                postCategorySelect.value = searchParams.get('category_name');
            }
        });
    });
</script>
