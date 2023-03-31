jQuery(document).ready(function() {
    // 遍历每个 .left-sidebar-post-list 容器
    jQuery('.left-sidebar-post-list').each(function() {
        const container = jQuery(this);

        // 在当前容器中查找带有 'gitbook-active' 类的 a 元素
        const activeItem = container.find('a.gitbook-active');

        // 如果找到了携带 'gitbook-active' 类的 a 元素
        if (activeItem.length) {
            // 计算携带 'gitbook-active' 类的 a 元素距离当前容器顶部的偏移量
            const offsetTop = activeItem.position().top;

            // 将当前容器滚动到携带 'gitbook-active' 类的 a 元素位置
            container.animate({ scrollTop: offsetTop - 180}, 500); // 500 毫秒动画时长，可根据需要调整
        }
    });
});