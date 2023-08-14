<div class='footer-container'>
    <footer class="site-footer">
        <div class="footer-widgets">
            <?php if (is_active_sidebar('footer-widgets')): // 检查是否有激活的页脚小工具 ?>
                <?php dynamic_sidebar('footer-widgets'); // 显示页脚中的小工具区域 ?>
            <?php endif; ?>
        </div>
        <?php
        $beian_info = get_theme_mod('beian_info', '');
        if (strlen($beian_info) > 0):
            ?>
            <div>
                <h2 class="widget-title subheading heading-size-3">备案信息</h2>
                <div class="textwidget custom-html-widget">
                    <a href="https://beian.miit.gov.cn/" target="_blank" rel="noopener noreferrer">
                        <?php echo $beian_info; ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <div class="footer-info">
            <p>&copy;
                <?php echo date('Y'); ?>
                <?php bloginfo('name'); ?>. 版权所有.
            </p>
        </div>
    </footer>
    <?php wp_footer(); // WordPress页脚钩子，用于加载JavaScript和其他元素 ?>
</div>