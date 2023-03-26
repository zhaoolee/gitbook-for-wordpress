<div class='footer-container'>
    <footer class="site-footer">
        <div class="footer-widgets">
            <?php if (is_active_sidebar('footer-widgets')): // 检查是否有激活的页脚小工具 ?>
                <?php dynamic_sidebar('footer-widgets'); // 显示页脚中的小工具区域 ?>
            <?php endif; ?>
        </div>
        <div class="footer-info">
            <p>&copy;
                <?php echo date('Y'); ?>
                <?php bloginfo('name'); ?>. All rights reserved.
            </p>
        </div>
        <h2 class="widget-title subheading heading-size-3">备案信息</h2>
        <div class="textwidget custom-html-widget">
            <a href="https://beian.miit.gov.cn/" target="_blank" rel="noopener noreferrer">琼ICP备18002320号-2</a>
        </div>
    </footer>
    <?php wp_footer(); // WordPress页脚钩子，用于加载JavaScript和其他元素 ?>
</div>