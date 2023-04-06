## 《求和!李姐万岁! GitBook For WordPress》


![GitBook For WordPress](https://raw.githubusercontent.com/zhaoolee/gitbook-for-wordpress/main/screenshot.jpg)

求和! 李姐万岁! 这是一个**GitBook布局，锤子便签风格**的WordPress主题~

![image](https://user-images.githubusercontent.com/15868458/227762523-c753be6e-82d2-478f-9ace-35bb4f65a824.png)

## 示例网站

[方圆小站 https://fangyuanxiaozhan.com](https://fangyuanxiaozhan.com)

[V2方圆 https://v2fy.com](https://v2fy.com)

如果你向zhaoolee一样不想写富文本，只想用Markdown，可以使用zhaoolee的另一个开源项目 用Hexo的方式管理WordPress(使用Github Actions自动更新文章到WordPress)：https://github.com/zhaoolee/WordPressXMLRPCTools



## 为什么要开发这个主题？

zhaoolee喜欢用锤子便签分享内容, 但在**社交平台经常分享不出去**, 于是zhaoolee建立了方圆小站, 为了让读者有**类似锤子便签的良好阅读体验**，这个主题便诞生了。

zhaoolee很喜欢GitBook的布局，**左侧目录，右侧文章内容**，非常适合阅读!



## 主要功能

### 无需像GitBook一样定制目录, 侧边栏按时间倒序显示已发布文章

![目录](https://user-images.githubusercontent.com/15868458/228869086-10a15187-e528-4986-9fd0-5a89474ce7d4.png)


### 侧边栏自动将当前文章滚动到侧边栏顶部

![image](https://user-images.githubusercontent.com/15868458/228868598-1269a5bd-1a8a-46ad-9775-d7a1ccaae0f8.png)


### 支持按照专题过滤文章列表
![](https://user-images.githubusercontent.com/15868458/228867096-1557730d-0dd6-45ae-bb11-b4b145dffec1.png)

### 支持宽窄屏自适应

![1679811878976jke7xdWQ](https://user-images.githubusercontent.com/15868458/227762273-0c0a143c-0f63-461f-a81c-b04fd44ec839.gif)


### 支持锤子便签风格的评论

![image](https://user-images.githubusercontent.com/15868458/228868043-5915449d-73dc-4db0-93f0-a262fb7dd054.png)


### 支持搜索

![1679812197742NJW5ZNBE](https://user-images.githubusercontent.com/15868458/227762298-12e9e3ac-c196-4800-85e1-dd802b4ac4c8.gif)

### 底部预留备案号位置，支持自定义，不填就不显示


![](https://user-images.githubusercontent.com/15868458/227778249-c22c50a4-4924-4548-bd93-662baeffab50.png)



### 支持显示后台菜单

![](https://user-images.githubusercontent.com/15868458/230023019-c66fb93a-cfbb-469b-a44f-7161ab32d999.png)

![](https://user-images.githubusercontent.com/15868458/230023799-baef2fa6-0afa-46fd-a86b-17a57e1dc994.png)

### 支持小部件

![支持自定义部件](https://user-images.githubusercontent.com/15868458/230281955-8320a7a3-5a55-4c12-a20b-c6ff79bfa682.png)


![](https://user-images.githubusercontent.com/15868458/230282549-7e70a950-cb31-4b2e-94f4-7a3d55943252.png)


- 来自一言的《经典台词》

```html
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<h2>经典台词</h2>
<div id="yiyan_hitokoto"></div>
<div id="yiyan_from" style="text-align: right">
</div>
<script>
        jQuery.ajax({url:'https://v1.hitokoto.cn/'}).done(function(content,err){
        console.log("content::", content, "err::", err);
        if(err === "success"){
            var yiyan_hitokoto = "";
            var yiyan_from= "";
            console.log("content22::", content, "err::", err);
            yiyan_hitokoto = content.hitokoto;
            yiyan_from ="--" + content.from;
            console.log("=yiyan_hitokoto=>>", yiyan_hitokoto);
            console.log("=yiyan_from=>>", yiyan_from);
            jQuery("#yiyan_hitokoto").html(yiyan_hitokoto);
            jQuery("#yiyan_from").html(yiyan_from);
        }
    })
</script>
```



- 显示当前页面二维码

```html
<h2>当前网址二维码</h2>
<div id="qrcode"></div>
<script src="https://v2fy.com/cdn/qrcodejs/qrcode.min.js"></script>
<script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: window.location.href,
        width: 256,
        height: 256,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });
</script>
```


## WordPress免费插件推荐列表

| 插件名称 | 功能简介 | 下载页面 |
| --- | --- | --- |
| POST VIEWS COUNTER | 查看文章阅读量 |  http://www.dfactory.eu/plugins/post-views-counter/ |
| WP Super Cache  | 对WordPress页面进行静态页缓存，但会让一些依赖PHP后端渲染的功能无法实时生效，比如更新主题后，需要手动删除WP Super Cache缓存才能看到效果 | https://wordpress.org/plugins/wp-super-cache/ |


## 开发小技巧:将开发的主题,软连接到WordPress Theme目录

```shell
ln -s ~/github/gitbook-for-wordpress /Applications/MAMP/htdocs/fangyuanxiaozhan/wp-content/themes/
```


## 《求和!李姐万岁! GitBook For WordPress》开发者随想录(zhaoolee)

[求和!李姐万岁!用ChatGPT写GitBook布局锤子便签配色的WordPress主题](https://fangyuanxiaozhan.com/p/2023-03-26-13-04-25-gitbook-for-wordpress/)

[GitBook锤子便签风格WordPress主题的专题设计思考](https://fangyuanxiaozhan.com/p/2023-03-30-19-20-51-gitbook-wordpress/)






