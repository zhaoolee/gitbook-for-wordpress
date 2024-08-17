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
        $posts_per_page = 5; // 每页显示的文章数量
        $args = array(
            's' => get_search_query(),
            'posts_per_page' => $posts_per_page,
            'paged' => $paged
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
            echo '<div class="pagination">';
            echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => 'page/%#%',
                'current' => $paged,
                'total' => $max_pages,
                'prev_text' => __('&laquo; Previous'),
                'next_text' => __('Next &raquo;'),
            ));
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