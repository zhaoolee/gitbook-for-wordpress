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

        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>
                    </header>

                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; else: ?>
            <p>
                <?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'your_theme_text_domain'); ?>
            </p>
        <?php endif; ?>
        <?php require 'footer-container.php' ?>
    </main>


</div>


<?php get_footer(); ?>