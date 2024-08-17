<?php get_header(); ?>

<div class="site-left-right-container">
    <div class='left-sidebar-container'>
        <?php require 'left-sidebar-pc.php'; ?>
        <?php require 'left-sidebar-mobile.php'; ?>
    </div>
    <main id="main" class="site-main right-content">
        <header class="page-header">
            <h1 class="page-title">
                <?php printf(__('Search Results for: %s', 'your_theme_text_domain'), '<span>' . get_search_query() . '</span>'); ?>
            </h1>
        </header>
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $posts_per_page = 10; // 每页显示的文章数量
        $args = array(
            's' => get_search_query(),
            'posts_per_page' => $posts_per_page,
            'paged' => $paged,
            'no_found_rows' => false, // 确保计算总行数
            'update_post_meta_cache' => false, // 优化查询性能
            'update_post_term_cache' => false, // 优化查询性能
        );
        $search_query = new WP_Query($args);

        if ($search_query->have_posts()):
            while ($search_query->have_posts()):
                $search_query->the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    </header>

                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile;

            // 计算实际的总页数
            $total_posts = $search_query->found_posts;
            $max_pages = ceil($total_posts / $posts_per_page);

            // Pagination
            global $wp_rewrite;
            $search_query_string = get_search_query();
            $pagination_base = $wp_rewrite->search_base . '/' . urlencode($search_query_string) . '/page/';
            
            echo '<div class="pagination">';
            echo paginate_links(array(
                'base' => home_url($pagination_base . '%#%'),
                'format' => '%#%',
                'current' => $paged,
                'total' => $max_pages,
                'prev_text' => __('&laquo; Previous'),
                'next_text' => __('Next &raquo;'),
            ));
            echo '</div>';

            // 显示实际的搜索结果统计
            echo '<div class="search-stats">';
            printf(__('Found %1$s results. Showing page %2$s of %3$s.', 'your_theme_text_domain'), 
                   $total_posts, $paged, $max_pages);
            echo '</div>';

            wp_reset_postdata();
        else: ?>
            <p>
                <?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'your_theme_text_domain'); ?>
            </p>
        <?php endif; ?>

        <?php require 'footer-container.php' ?>
    </main>
</div>

<?php get_footer(); ?>