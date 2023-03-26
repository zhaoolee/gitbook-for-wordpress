<?php
$post_query = new WP_Query(
    array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        // 显示所有文章
        'orderby' => 'date',
        'order' => 'DESC'
    )
);

if ($post_query->have_posts()): ?>
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
