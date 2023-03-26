## GitBook For WordPress


![GitBook For WordPress](./screenshot.jpg)

李姐万岁! 这是一个模拟GitBook布局，锤子便签风格的WordPress主题。zhaoolee已用于[方圆小站](https://fangyuanxiaozhan.com)的WordPress

## 示例网站

[方圆小站 https://fangyuanxiaozhan.com](https://fangyuanxiaozhan.com)



## 为什么要开发这个主题

zhaoolee很喜欢GitBook的布局，左侧目录，右侧文章，这种布局非常适合阅读，另外锤子便签的配色也很好看，所以zhaoolee便写了这个GitBook布局融合锤子便签配色的主题。

另外配合我以前的开源项目: 用Hexo的方式管理WordPress https://github.com/zhaoolee/WordPressXMLRPCTools (使用Github Actions自动更新文章到WordPress), 可以将整个WordPress网站用Markdown直接进行管理, 还能顺便白嫖GitHub Actions的使用时长, 一举两得 ~



## 主要功能

- 侧边栏按时间倒序显示已发布文章
- 侧边栏自动将当前文章滚动到侧边栏顶部
- 移动端与PC端自适应
- 支持评论
- 支持搜索
- 底部预留备案号位置



## 开发小技巧:将开发的主题,软连接到WordPress Theme目录

```shell
ln -s ~/github/gitbook-for-wordpress /Applications/MAMP/htdocs/fangyuanxiaozhan/wp-content/themes/
```