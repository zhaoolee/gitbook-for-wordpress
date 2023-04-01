<div class="right-content">
    <?php if (have_posts()): ?>
        <?php while (have_posts()):
            the_post(); ?>
            <div class="post-content"><h2><?php the_title(); ?></h2> <!-- 在此处添加标题 -->
            <?php the_content(); ?></div>
            <?php comments_template(); ?>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php require 'footer-container.php' ?>
</div>