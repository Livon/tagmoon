<?php
/**
 * Created by PhpStorm.
 * User: Livon
 * Date: 2018/2/5
 * Time: 21:54
 */
?>


<!DOCTYPE html>

<!--<html class="theme" manifest="https://www.zybuluo.com/static/zybuluo.mdeditor.appcache">-->
<html class="theme" manifest="./static/zybuluo.mdeditor.appcache">

<head>
    <meta charset="utf-8">

    <meta name="description" content="Cmd Markdown 编辑阅读器，支持实时同步预览，区分写作和阅读模式，支持在线存储，分享文稿网址。">
    <meta name="author" content="Jiawei Zhang">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Cmd Markdown 编辑阅读器 - 作业部落出品</title>


<!--    <link href="https://www.zybuluo.com/static/img/favicon.png" type="image/x-icon" rel="icon">-->
    <link href="../../../../markdown/zybuluo/favicon.png" type="image/x-icon" rel="icon">

<!--    <link href="https://www.zybuluo.com/static/assets/1bc053c8.base.lib.min.css" rel="stylesheet" media="screen">-->
    <link href="../../../../markdown/zybuluo/static/assets/1bc053c8.base.lib.min.css" rel="stylesheet" media="screen">



    <!-- id="prettify-style" will be used to get the link element below and change href to change prettify code, so it can't be in beginmin/endmin block. -->
<!--    <link id="prettify-style" href="https://www.zybuluo.com/static/editor/libs/google-code-prettify/prettify-cmd.css" type="text/css" rel="stylesheet">-->
    <link id="prettify-style" href="../../../../markdown/zybuluo/static/editor/libs/google-code-prettify/prettify-cmd.css" type="text/css" rel="stylesheet">
    <!--
    <link id="mermaid-style" href="https://www.zybuluo.com/static/editor/libs/mermaid/mermaid.forest.css" type="text/css" rel="stylesheet">
    -->
<!--    <link href="https://www.zybuluo.com/static/assets/mdeditor/45c7d56d.layout.min.css" rel="stylesheet" media="screen">-->
    <link href="../../../../markdown/zybuluo/static/assets/mdeditor/45c7d56d.layout.min.css" rel="stylesheet" media="screen">



<!--    <link href="https://www.zybuluo.com/static/assets/2e85637e.mdeditor.lib.min.css" rel="stylesheet" media="screen">-->
    <link href="../../../../markdown/zybuluo/static/assets/2e85637e.mdeditor.lib.min.css" rel="stylesheet" media="screen">
    <style type="text/css" id="customized-font-css"></style>
    <style type="text/css" id="customized-style-css"></style>


    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-44461741-1', 'zybuluo.com');
        ga('send', 'pageview');
    </script>
</head>

<body class="theme">

<div id="global-prompt-alert" class="hide alert alert-warning">
    <span id="global-prompt-message"></span>
    <a id="close-global-prompt-alert" href="">[关闭]</a>
</div>

<!-- zybuluo's body -->








<!-- mdeditor's body -->








<div id="container">
    <div id="editor-column" class="pull-left">
        <div id="wmd-button-bar" class="wmd-button-bar"></div>
        <!--in page editor buttons. -->
        <div class="in-page-editor-buttons editor-reader-hidden">
            <ul>
                <li class="in-page-button" id="wmd-search-replace-button" title="查找 Ctrl+F 替换 Ctrl+Shift+F">
                    <span class="icon-search"></span>
                </li>
                <li class="in-page-button" id="wmd-hidden-menu-button" title="隐藏工具栏 Ctrl+Alt+U">
                    <span class="icon-chevron-sign-up"></span>
                </li>
                <li class="in-page-button" id="wmd-editor-full-button" title="编辑模式 Ctrl+M">
                    <span class="icon-desktop"></span>
                </li>
                <li class="in-page-button" id="wmd-editor-small-button" title="预览模式 Ctrl+M">
                    <span class="icon-columns"></span>
                </li>
                <li class="in-page-button" id="wmd-help-button" title="Markdown 语法帮助 Ctrl+Alt+H">
                    <span class="icon-question-sign"></span>
                </li>
            </ul>
        </div>
        <div id="wmd-panel-editor" class="wmd-panel-editor">
            <!--autocomplete="off" below to make sure the content is changed after refreshing page, otherwise, firefox will remember the old content.-->
            <!-- textarea or div based on simple or advanced editor
            <textarea class="wmd-input theme" id="wmd-input" spellcheck="false" autocomplete="off"></textarea>
            or
            <div style="display:none" class="wmd-input theme" id="wmd-input"></div>
            -->
            <textarea class="wmd-input theme" id="wmd-input" spellcheck="false" autocomplete="off"># 欢迎使用 Cmd Markdown 编辑阅读器

------

我们理解您需要更便捷更高效的工具记录思想，整理笔记、知识，并将其中承载的价值传播给他人，**Cmd Markdown** 是我们给出的答案 —— 我们为记录思想和分享知识提供更专业的工具。 您可以使用 Cmd Markdown：

&gt; * 整理知识，学习笔记
&gt; * 发布日记，杂文，所见所想
&gt; * 撰写发布技术文稿（代码支持）
&gt; * 撰写发布学术论文（LaTeX 公式支持）

![cmd-markdown-logo](https://www.zybuluo.com/static/img/logo.png)

除了您现在看到的这个 Cmd Markdown 在线版本，您还可以前往以下网址下载：

### [Windows/Mac/Linux 全平台客户端](https://www.zybuluo.com/cmd/)

&gt; 请保留此份 Cmd Markdown 的欢迎稿兼使用说明，如需撰写新稿件，点击顶部工具栏右侧的 &lt;i class=&#34;icon-file&#34;&gt;&lt;/i&gt; **新文稿** 或者使用快捷键 `Ctrl+Alt+N`。

------

## 什么是 Markdown

Markdown 是一种方便记忆、书写的纯文本标记语言，用户可以使用这些标记符号以最小的输入代价生成极富表现力的文档：譬如您正在阅读的这份文档。它使用简单的符号标记不同的标题，分割不同的段落，**粗体** 或者 *斜体* 某些文字，更棒的是，它还可以

### 1. 制作一份待办事宜 [Todo 列表](https://www.zybuluo.com/mdeditor?url=https://www.zybuluo.com/static/editor/md-help.markdown#13-待办事宜-todo-列表)

- [ ] 支持以 PDF 格式导出文稿
- [ ] 改进 Cmd 渲染算法，使用局部渲染技术提高渲染效率
- [x] 新增 Todo 列表功能
- [x] 修复 LaTex 公式渲染问题
- [x] 新增 LaTex 公式编号功能

### 2. 书写一个质能守恒公式[^LaTeX]

$$E=mc^2$$

### 3. 高亮一段代码[^code]

```python
@requires_authorization
class SomeClass:
    pass

if __name__ == &#39;__main__&#39;:
    # A comment
    print &#39;hello world&#39;
```

### 4. 高效绘制 [流程图](https://www.zybuluo.com/mdeditor?url=https://www.zybuluo.com/static/editor/md-help.markdown#7-流程图)

```flow
st=&gt;start: Start
op=&gt;operation: Your Operation
cond=&gt;condition: Yes or No?
e=&gt;end

st-&gt;op-&gt;cond
cond(yes)-&gt;e
cond(no)-&gt;op
```

### 5. 高效绘制 [序列图](https://www.zybuluo.com/mdeditor?url=https://www.zybuluo.com/static/editor/md-help.markdown#8-序列图)

```seq
Alice-&gt;Bob: Hello Bob, how are you?
Note right of Bob: Bob thinks
Bob--&gt;Alice: I am good thanks!
```

### 6. 高效绘制 [甘特图](https://www.zybuluo.com/mdeditor?url=https://www.zybuluo.com/static/editor/md-help.markdown#9-甘特图)

```gantt
    title 项目开发流程
    section 项目确定
        需求分析       :a1, 2016-06-22, 3d
        可行性报告     :after a1, 5d
        概念验证       : 5d
    section 项目实施
        概要设计      :2016-07-05  , 5d
        详细设计      :2016-07-08, 10d
        编码          :2016-07-15, 10d
        测试          :2016-07-22, 5d
    section 发布验收
        发布: 2d
        验收: 3d
```

### 7. 绘制表格

| 项目        | 价格   |  数量  |
| --------   | -----:  | :----:  |
| 计算机     | \$1600 |   5     |
| 手机        |   \$12   |   12   |
| 管线        |    \$1    |  234  |

### 8. 更详细语法说明

想要查看更详细的语法说明，可以参考我们准备的 [Cmd Markdown 简明语法手册][1]，进阶用户可以参考 [Cmd Markdown 高阶语法手册][2] 了解更多高级功能。

总而言之，不同于其它 *所见即所得* 的编辑器：你只需使用键盘专注于书写文本内容，就可以生成印刷级的排版格式，省却在键盘和工具栏之间来回切换，调整内容和格式的麻烦。**Markdown 在流畅的书写和印刷级的阅读体验之间找到了平衡。** 目前它已经成为世界上最大的技术分享网站 GitHub 和 技术问答网站 StackOverFlow 的御用书写格式。

---

## 什么是 Cmd Markdown

您可以使用很多工具书写 Markdown，但是 Cmd Markdown 是这个星球上我们已知的、最好的 Markdown 工具——没有之一 ：）因为深信文字的力量，所以我们和你一样，对流畅书写，分享思想和知识，以及阅读体验有极致的追求，我们把对于这些诉求的回应整合在 Cmd Markdown，并且一次，两次，三次，乃至无数次地提升这个工具的体验，最终将它演化成一个 **编辑/发布/阅读** Markdown 的在线平台——您可以在任何地方，任何系统/设备上管理这里的文字。

### 1. 实时同步预览

我们将 Cmd Markdown 的主界面一分为二，左边为**编辑区**，右边为**预览区**，在编辑区的操作会实时地渲染到预览区方便查看最终的版面效果，并且如果你在其中一个区拖动滚动条，我们有一个巧妙的算法把另一个区的滚动条同步到等价的位置，超酷！

### 2. 编辑工具栏

也许您还是一个 Markdown 语法的新手，在您完全熟悉它之前，我们在 **编辑区** 的顶部放置了一个如下图所示的工具栏，您可以使用鼠标在工具栏上调整格式，不过我们仍旧鼓励你使用键盘标记格式，提高书写的流畅度。

![tool-editor](https://www.zybuluo.com/static/img/toolbar-editor.png)

### 3. 编辑模式

完全心无旁骛的方式编辑文字：点击 **编辑工具栏** 最右侧的拉伸按钮或者按下 `Ctrl + M`，将 Cmd Markdown 切换到独立的编辑模式，这是一个极度简洁的写作环境，所有可能会引起分心的元素都已经被挪除，超清爽！

### 4. 实时的云端文稿

为了保障数据安全，Cmd Markdown 会将您每一次击键的内容保存至云端，同时在 **编辑工具栏** 的最右侧提示 `已保存` 的字样。无需担心浏览器崩溃，机器掉电或者地震，海啸——在编辑的过程中随时关闭浏览器或者机器，下一次回到 Cmd Markdown 的时候继续写作。

### 5. 离线模式

在网络环境不稳定的情况下记录文字一样很安全！在您写作的时候，如果电脑突然失去网络连接，Cmd Markdown 会智能切换至离线模式，将您后续键入的文字保存在本地，直到网络恢复再将他们传送至云端，即使在网络恢复前关闭浏览器或者电脑，一样没有问题，等到下次开启 Cmd Markdown 的时候，她会提醒您将离线保存的文字传送至云端。简而言之，我们尽最大的努力保障您文字的安全。

### 6. 管理工具栏

为了便于管理您的文稿，在 **预览区** 的顶部放置了如下所示的 **管理工具栏**：

![tool-manager](https://www.zybuluo.com/static/img/toolbar-manager.jpg)

通过管理工具栏可以：

&lt;i class=&#34;icon-share&#34;&gt;&lt;/i&gt; 发布：将当前的文稿生成固定链接，在网络上发布，分享
&lt;i class=&#34;icon-file&#34;&gt;&lt;/i&gt; 新建：开始撰写一篇新的文稿
&lt;i class=&#34;icon-trash&#34;&gt;&lt;/i&gt; 删除：删除当前的文稿
&lt;i class=&#34;icon-cloud&#34;&gt;&lt;/i&gt; 导出：将当前的文稿转化为 Markdown 文本或者 Html 格式，并导出到本地
&lt;i class=&#34;icon-reorder&#34;&gt;&lt;/i&gt; 列表：所有新增和过往的文稿都可以在这里查看、操作
&lt;i class=&#34;icon-pencil&#34;&gt;&lt;/i&gt; 模式：切换 普通/Vim/Emacs 编辑模式

### 7. 阅读工具栏

![tool-manager](https://www.zybuluo.com/static/img/toolbar-reader.jpg)

通过 **预览区** 右上角的 **阅读工具栏**，可以查看当前文稿的目录并增强阅读体验。

工具栏上的五个图标依次为：

&lt;i class=&#34;icon-list&#34;&gt;&lt;/i&gt; 目录：快速导航当前文稿的目录结构以跳转到感兴趣的段落
&lt;i class=&#34;icon-chevron-sign-left&#34;&gt;&lt;/i&gt; 视图：互换左边编辑区和右边预览区的位置
&lt;i class=&#34;icon-adjust&#34;&gt;&lt;/i&gt; 主题：内置了黑白两种模式的主题，试试 **黑色主题**，超炫！
&lt;i class=&#34;icon-desktop&#34;&gt;&lt;/i&gt; 阅读：心无旁骛的阅读模式提供超一流的阅读体验
&lt;i class=&#34;icon-fullscreen&#34;&gt;&lt;/i&gt; 全屏：简洁，简洁，再简洁，一个完全沉浸式的写作和阅读环境

### 8. 阅读模式

在 **阅读工具栏** 点击 &lt;i class=&#34;icon-desktop&#34;&gt;&lt;/i&gt; 或者按下 `Ctrl+Alt+M` 随即进入独立的阅读模式界面，我们在版面渲染上的每一个细节：字体，字号，行间距，前背景色都倾注了大量的时间，努力提升阅读的体验和品质。

### 9. 标签、分类和搜索

在编辑区任意行首位置输入以下格式的文字可以标签当前文档：

标签： 未分类

标签以后的文稿在【文件列表】（Ctrl+Alt+F）里会按照标签分类，用户可以同时使用键盘或者鼠标浏览查看，或者在【文件列表】的搜索文本框内搜索标题关键字过滤文稿，如下图所示：

![file-list](https://www.zybuluo.com/static/img/file-list.png)

### 10. 文稿发布和分享

在您使用 Cmd Markdown 记录，创作，整理，阅读文稿的同时，我们不仅希望它是一个有力的工具，更希望您的思想和知识通过这个平台，连同优质的阅读体验，将他们分享给有相同志趣的人，进而鼓励更多的人来到这里记录分享他们的思想和知识，尝试点击 &lt;i class=&#34;icon-share&#34;&gt;&lt;/i&gt; (Ctrl+Alt+P) 发布这份文档给好友吧！

------

再一次感谢您花费时间阅读这份欢迎稿，点击 &lt;i class=&#34;icon-file&#34;&gt;&lt;/i&gt; (Ctrl+Alt+N) 开始撰写新的文稿吧！祝您在这里记录、阅读、分享愉快！

作者 [@ghosert][3]
2016 年 07月 07日

[^LaTeX]: 支持 **LaTeX** 编辑显示支持，例如：$\sum_{i=1}^n a_i=0$， 访问 [MathJax][4] 参考更多使用方法。

[^code]: 代码高亮功能支持包括 Java, Python, JavaScript 在内的，**四十一**种主流编程语言。

[1]: https://www.zybuluo.com/mdeditor?url=https://www.zybuluo.com/static/editor/md-help.markdown
[2]: https://www.zybuluo.com/mdeditor?url=https://www.zybuluo.com/static/editor/md-help.markdown#cmd-markdown-高阶语法手册
[3]: http://weibo.com/ghosert
[4]: http://meta.math.stackexchange.com/questions/5020/mathjax-basic-tutorial-and-quick-reference

</textarea>
        </div>
    </div>
    <div id="preview-column" class="pull-right">
        <div id="preview-button-bar" class="preview-button-bar">
            <ul id="preview-button-row" class="preview-button-row pull-right">

                <li id="preview-button-row-notlogin" class="preview-link editor-only dropdown editor-reader-hidden">
                    <a id="signup" class="dropdown-toggle red-on-black" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="true" href="https://www.zybuluo.com/signup?return_to=https%3A%2F%2Fwww.zybuluo.com%2Fmdeditor">注册</a>
                    <a id="login" class="dropdown-toggle red-on-black" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="true" href="https://www.zybuluo.com/login?return_to=https%3A%2F%2Fwww.zybuluo.com%2Fmdeditor">登录</a>
                    <ul id="signup-login-intro" class="dropdown-menu theme-black pull-right" role="menu">
                        <li>
                            <span>注册/登录 获得更多功能</span>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <span><i class="icon-refresh"></i> 实时，自动保存编辑中的文字</span>
                        </li>
                        <li>
                            <span><i class="icon-cloud-upload"></i> 云端存储，随时随地编辑阅读</span>
                        </li>
                        <li>
                            <span><i class="icon-cloud-download"></i> 从云端导出 Markdown，Html</span>
                        </li>
                        <li>
                            <span><i class="icon-share"></i> 在这里发布共享您编辑的作品</span>
                        </li>
                        <li>
                            <span><i class="icon-reorder"></i> 管理，编辑，阅读多个文本</span>
                        </li>
                        <li>
                            <span><i class="icon-group"></i> 成为作业部落成员，更多后续功能</span>
                        </li>
                    </ul>
                </li>

                <li id="preview-button-row-login" class="preview-link editor-only dropdown editor-reader-hidden">
                    <a id="preview-button-row-loginuser" href="" class="white-on-black dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="true"></a>
                    <ul class="dropdown-menu theme-black pull-right" role="menu">
                        <li><a id="mdeditor-user-settings-submenu" tabindex="-1" href="https://www.zybuluo.com/settings"><i class="icon-cogs"></i>用户设置</a></li>
                        <li><a id="mdeditor-payment-submenu" tabindex="-1" href="https://www.zybuluo.com/payment" class="paid-user-color" target="_blank"><i class="icon-chevron-sign-up"></i><span>升级会员<span></a></li>
                        <li><a id="mdeditor-logout-submenu" tabindex="-1" href="#"><i class="icon-signout"></i>登出部落</a></li>
                    </ul>
                </li>


                <li class="wmd-spacer editor-only" id="preview-button-row-afterlogin"></li>

                <li class="preview-link editor-only editor-reader-hidden" id="preview-file-button">
                    <div class="btn-group">
                        <button class="dropdown-toggle" data-toggle="dropdown">
                            <span class="icon-file"></span>
                            文件
                        </button>
                        <ul id="file-menu" class="dropdown-menu theme-black pull-right" role="menu">
                            <li title="新建文稿 Ctrl+Alt+N"><a class="preview-new-submenu" tabindex="-1" href="#"><i class="icon-file"></i>新文稿</a></li>
                            <li title="新建离线文稿，企业级私密"><a id="new-offline-file-submenu" class="paid-user-color" tabindex="-1" href="#"><i class="icon-file"></i>新离线文稿</a></li>
                            <li title="读取本地文本文件"><a id="open-file-submenu" tabindex="-1" href="#"><i class="icon-folder-open"></i>打开文本</a></li>
                            <li title="删除文稿 Ctrl+Alt+D"><a id="preview-delete-submenu" tabindex="-1" href="#"><i class="icon-trash"></i>删除文稿</a></li>
                            <li title="手动保存历史"><a id="preview-revision-submenu" tabindex="-1" href="#"><i class="icon-time"></i>手动保存历史</a></li>
                            <li class="divider"></li>
                            <li title="最近使用的文稿"><span id="latest-notes-label">最近使用</span></li>
                        </ul>
                        <ul id="latest-notes-list" class="dropdown-menu theme-black pull-right editor-reader-hidden" role="menu">
                            <!--insert .latest-note by editorReader.js
                            <li class="latest-note"> <a note-id="" tabindex="-1" title=""> <span class="note-title"></span> </a> </li> -->
                        </ul>
                    </div>
                </li>
                <li class="preview-link editor-only editor-reader-hidden" id="preview-published-button">
                    <div class="btn-group">
                        <button class="dropdown-toggle" data-toggle="dropdown">
                            <span class="icon-share-sign"></span>
                            发布更新
                        </button>
                        <ul class="dropdown-menu theme-black pull-right" role="menu">
                            <li title="再次发布更新后的内容到固定链接 Ctrl+Alt+P"><a class="publish-updated-submenu" tabindex="-1" href="#"><i class="icon-share-sign"></i>发布更新</a></li>
                            <li title="可以被分享给他人的固定链接"><a class="fixed-link-submenu" tabindex="-1" href="#"><i class="icon-link"></i>固定链接</a></li>
                            <li title="清除已发布文稿的访问密码"><a id="remove-password-submenu" tabindex="-1" href="#"><i class="icon-eraser"></i>清除密码</a></li>
                            <li title="撤销文本的分享，只有自己可见"><a id="revert-publish-submenu" tabindex="-1" href="#"><i class="icon-share"></i>撤销发布</a></li>
                        </ul>
                    </div>
                </li>
                <li class="preview-link editor-only editor-reader-hidden" id="preview-publish-button" title="立即发布 Ctrl+Alt+P">
                    <div class="btn-group">
                        <button>
                            <span class="icon-share"></span>
                            发布
                        </button>
                    </div>
                </li>
                <li class="wmd-spacer editor-only editor-reader-hidden" id="preview-button-row-spacer"></li>
                <li class="preview-button dropdown editor-reader-hidden" id="preview-list-button" title="文本列表 Ctrl+Alt+F">
                    <span class="dropdown-toggle icon-reorder" data-toggle="dropdown"></span>
                    <ul id="file-list" class="dropdown-menu theme-black pull-right" role="menu">
                        <!-- insert ul.tag-list.editor-reader-hidden here by render.js -->
                    </ul>
                    <ul id="file-list-topbar" class="dropdown-menu theme-black pull-right" role="menu">
                        <li id="search-file-bar">
                            <i class="icon-search icon-large"></i>
                            <input type="text" id="search-file-textbox" placeholder="搜索我的文稿标题， * 显示全部">
                            <i class="icon-level-down icon-rotate-90 icon-large"></i>
                            <a href="https://www.zybuluo.com/mdeditor?url=https://www.zybuluo.com/static/editor/md-help.markdown#2-%E6%A0%87%E7%AD%BE%E5%88%86%E7%B1%BB" target="_blank" title="查看帮助">如何分类</a>
                        </li>
                        <li id="tag-file-bar">
                            以下【标签】将用于标记这篇文稿：
                        </li>
                    </ul>
                </li>
                <li class="preview-button dropdown editor-only editor-reader-hidden" id="preview-info-button" title="文稿信息 Ctrl+Alt+I">
                    <span class="dropdown-toggle icon-th-large" data-toggle="dropdown"></span>
                    <ul id="info-menu" class="dropdown-menu theme-black pull-right" role="menu">
                        <li>
                            <table>
                                <tbody>
                                <tr title="可以被分享给他人的固定链接">
                                    <td class="menu-label">固定链接</td>
                                    <!--hide either of below -->
                                    <td id="preview-published-td" class="menu-field">
                                        <a class="fixed-link-submenu" tabindex="-1" href="#">链接地址</a>
                                    </td>
                                    <td id="preview-publish-td" class="menu-field">无 (未发布)</td>
                                </tr>
                                <tr title="公开文稿被阅读的次数">
                                    <td class="menu-label">文稿阅读</td>
                                    <td class="menu-field article-read"></td><!--render by render.js-->
                                </tr>
                                <tr title="文稿的字数">
                                    <td class="menu-label">文稿字数</td>
                                    <td class="menu-field article-characters"></td>
                                </tr>
                                <tr title="最后修改文稿的日期">
                                    <td class="menu-label">修改日期</td>
                                    <td class="menu-field article-updated-date"></td><!--render by render.js-->
                                </tr>
                                <tr title="创建文稿的日期">
                                    <td class="menu-label">创建日期</td>
                                    <td class="menu-field article-created-date"></td><!--render by render.js-->
                                </tr>
                                </tbody>
                            </table>
                        </li>
                        <li title="当前文稿的历史版本"><span id="info-revision-label">历史版本：</span></li>
                    </ul>
                    <ul id="revision-list" class="dropdown-menu theme-black pull-right editor-reader-hidden" role="menu">
                        <!--insert 'ul.revision-item-template.editor-reader-hidden li.revision-item' below into here by editorReader.js-->
                    </ul>
                </li>
                <li class="preview-button dropdown editor-only editor-reader-hidden" id="preview-settings-button" title="功能设置 Ctrl+Alt+R">
                    <span class="dropdown-toggle icon-gear" data-toggle="dropdown"></span>
                    <ul id="settings-menu" class="dropdown-menu theme-black pull-right" role="menu">
                        <li title="立即同步本地和云端的所有文稿"><a id="sync-now-submenu" tabindex="-1" href="#"><i class="icon-refresh"></i>立即同步</a></li>
                        <li><a id="sync-thirty-submenu" tabindex="-1" href="#"><span><i class="icon-time"></i>每隔 30 分钟同步</span></a></li>
                        <li title="重新加载当前文档，编辑状态将无法撤销/重复"><a id="reload-current-usernote-submenu" tabindex="-1" href="#"><span><i class="icon-double-angle-right"></i>重载当前文稿</span></a></li>
                        <li class="divider"></li>
                        <li title="自定义样式"><a id="customized-style-submenu" tabindex="-1" href="#"><i class="icon-wrench"></i>自定义样式</a></li>
                        <li class="divider"></li>
                        <li title="导出 Markdown 文件"><a id="download-markdown-submenu" tabindex="-1" href="#"><i class="icon-cloud-download"></i>导出 Markdown</a></li>
                        <li title="导出 Html 文件"><a id="download-html-submenu" tabindex="-1" href="#"><i class="icon-cloud-download"></i>导出 Html</a></li>
                        <li title="导出带样式的 Html 文件"><a id="download-template-html-submenu" class="paid-user-color" tabindex="-1" href="#"><i class="icon-cloud-download"></i>导出带样式的 Html</a></li>
                        <li title="导出 PDF 文件"><a id="download-pdf-submenu" class="paid-user-color" tabindex="-1" href="#"><i class="icon-cloud-download"></i>导出 PDF 文件</a></li>
                        <li title="一键导出所有文稿"><a id="download-all-submenu" class="paid-user-color" tabindex="-1" href="#"><i class="icon-cloud-download"></i>一键导出所有文稿</a></li>
                        <li class="divider"></li>
                        <li title="导出到印象笔记"><a id="upload-yinxiang-submenu" class="paid-user-color" tabindex="-1" href="#"><i class="icon-cloud-upload"></i>导出到印象笔记</a></li>
                        <li title="导出到Evernote"><a id="upload-evernote-submenu" class="paid-user-color" tabindex="-1" href="#"><i class="icon-cloud-upload"></i>导出到Evernote</a></li>
                        <li class="divider"></li>

                        <li title="普通模式"><a id="mode-normal-submenu" tabindex="-1" href="#"><span><i class="icon-pencil"></i>普通模式</span></a></li>
                        <li title="确认清楚该选项含义后选择，同时禁用浏览器的Vim插件"><a id="mode-vim-submenu" tabindex="-1" href="#"><span><i class="icon-edit-sign"></i>Vim 模式</span></a></li>
                        <li title="确认清楚该选项含义后选择"><a id="mode-emacs-submenu" tabindex="-1" href="#"><span><i class="icon-edit"></i>Emacs 模式</span></a></li>
                        <li title="在编辑区显示或关闭行号"><a id="show-line-number-submenu" tabindex="-1" href="#"><span><i class="icon-sort-by-order"></i>显示行号</span></a></li>
                        <li class="divider"></li>
                        <li title="使用普通文本编辑器">
                            <a tabindex="-1" href="https://www.zybuluo.com/mdeditor_light">
                                <i class="icon-check-empty"></i>轻量编辑器
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- There is at least one item of 'wmd-spacer' must be in the ul list, otherwise, the hover on the button leads to page issue. -->
                <li class="wmd-spacer"></li>
                <li class="preview-button dropdown" id="preview-about-button" title="关于">
                    <span class="dropdown-toggle icon-info-sign" data-toggle="dropdown" data-hover="dropdown" data-delay="100" data-close-others="true"></span>
                    <ul id="about-menu" class="dropdown-menu theme-black pull-right" role="menu">
                        <li id="download-client-submenu" title="下载全平台客户端"><a tabindex="-1" href="https://www.zybuluo.com/cmd" target="_blank"><i class="icon-laptop"></i>下载客户端</a></li>
                        <li id="change-history-submenu" title=""><a tabindex="-1" href="https://www.zybuluo.com/ghosert/note/102771" target="_blank"><i class="icon-wrench"></i>变更历史</a></li>
                        <li title="@ghosert"><a tabindex="-1" href="http://www.weibo.com/ghosert" target="_blank"><i class="icon-weibo"></i>关注开发者</a></li>
                        <li title=""><a tabindex="-1" href="https://github.com/ghosert/cmd-editor/issues" target="_blank"><i class="icon-github-alt"></i>报告问题，建议</a></li>
                        <li title="support@zybuluo.com"><a tabindex="-1" href="mailto:support@zybuluo.com" target="_blank"><i class="icon-envelope"></i>联系我们</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--in page preview buttons. -->
        <div class="in-page-preview-buttons editor-reader-hidden">
            <ul>
                <li class="in-page-button dropdown" id="preview-toc-button" title="内容目录 Ctrl+Alt+O">
                    <span class="dropdown-toggle icon-list" data-toggle="dropdown"></span>
                    <div id="toc-list" class="dropdown-menu theme pull-right"> <!-- Add theme means this element will be changed when apply theme color. -->
                        <h3>内容目录</h3>
                        <hr>
                        <div class="table-of-contents"></div>
                    </div>
                </li>
                <li class="in-page-button editor-only" id="editor-reader-exchange-button" title="交换左右视图 Ctrl+Alt+X">
                    <span class="icon-chevron-sign-left"></span>
                </li>
                <li class="in-page-button" id="preview-theme-button" title="主题切换 Ctrl+Alt+Y">
                    <span class="icon-adjust"></span>
                </li>
                <li class="in-page-button" id="preview-reader-full-button" title="阅读模式 Ctrl+Alt+M">
                    <span class="icon-desktop"></span>
                </li>
                <li class="in-page-button" id="preview-reader-small-button" title="预览模式 Ctrl+Alt+M">
                    <span class="icon-columns"></span>
                </li>
                <li class="in-page-button" id="preview-fullscreen-button" title="全屏模式 F11">
                    <span class="icon-fullscreen"></span>
                </li>
            </ul>
        </div>
        <div id="wmd-panel-preview" class="wmd-panel-preview preview-container">
            <div id="wmd-preview" class="wmd-preview"></div>
            <!-- jiawzhang NOTICE: the position in '.remark-icons' is 'absolute' so that '.wmd-panel-preview' above should be 'relative', so that they works on scrollbar. -->
            <div class="remark-icons">
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</div>

<!-- Hidden md-section-helper is used to calculate the height of md sections. -->

<!-- full editor reader, hidden when loading. -->
<div id="editor-reader-full" class="editor-reader-full-hidden">
</div>

<!-- reader full toolbar, hidden when loading. -->
<div id="reader-full-toolbar" class="reader-full-toolbar-hidden">
</div>
<ul id="reader-full-toolbar-tail" class="reader-full-toolbar-tail-hidden">
    <li class="preview-button-full-reader" id="preview-hidden-button" title="隐藏工具栏 Ctrl+Alt+I">
        <span class="icon-chevron-sign-right"></span>
    </li>
</ul>

<!-- reader full topInfo, hidden when loading. -->
<div id="reader-full-topInfo" class="reader-full-topInfo-hidden">
    <span>
        <code class="article-author"></code><!--render by render.js-->
    </span>
    <code><span class="article-updated-date"></span></code><!--render by render.js-->
    <code><span>字数 </span><span class="article-characters"></span></code>
    <code><span>阅读 </span><span class="article-read"></span></code><!--render by render.js-->
</div>

<!-- Template for 'tag-list', this will be inserted into #file-list in render.js -->
<ul class="tag-list editor-reader-hidden">
    <li class="tag-item item" tag-name="">
        <span class="pull-left"><i class="icon-tag"></i><span class="tag-name"></span></span>
        <span class="tag-count pull-right"></span>
        <div class="clearfix"></div>
    </li>
    <!-- insert .file-item.item here -->
</ul>
<ul class="file-item-template editor-reader-hidden">
    <li class="file-item item" file-created-date="">
        <a tabindex="-1" title="">
            <i class=""></i>
            <span id=""></span>
        </a>
    </li>
</ul>
<ul class="revision-item-template editor-reader-hidden">
    <li class="revision-item" file-created-date="">
        <a id="" tabindex="-1" title="">
            <span class="revision-reason pull-left"></span>
            <span class="revision-time-diff pull-right" created_time_diff=""></span>
            <span class="clearfix"></span>
        </a>
    </li>
</ul>

<!-- Prompt on loading article, hidden when loading. -->
<div id="article-loading-alert" class="alert alert-info editor-reader-hidden">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>正在加载文章图片，请稍等片刻... </strong>
</div>

<!-- UML diagram, hidden always -->
<div id="uml-X-x-X-diagram" class="editor-reader-hidden-always"></div>

<!-- not really will be actually used, just for the mocked Markdown.Editor.(ace|light).js -->
<div id="wmd-preview-real" class="editor-reader-hidden-always"></div>






<!-- side remark, hidden when loading. -->
<div class="remark-list side-remark-hidden">
    <div class="remark-items">
    </div>
    <div class="leave-remark unselectable"><span class='icon-plus-sign-alt'></span><span>添加新批注</span></div>
    <div class="new-remark">
        <!-- clone the template $('.new-remark-reply').html() to here.-->
    </div>
</div>

<!-- template for new remark/reply -->
<div class="new-remark-reply side-remark-hidden">
    <div class="remark-head"><a><img src="https://www.zybuluo.com/static/img/default-head.jpg"></a></div>
    <div class="remark-author unselectable"></div>
    <div class="remark-editor" contentEditable="true" spellcheck="false"></div>
    <!-- this will be filled up by js.
    <div class="inline-error">402/400</div> for new remark
    <div class="inline-error">202/200</div> for new reply
    -->
    <div class="remark-footer unselectable">
        <button class="remark-save btn-link">保存</button>
        <button class="remark-cancel btn-link">取消</button>
    </div>
</div>

<!-- template for .remark-item/.remark-reply -->
<div class="remark-item-reply side-remark-hidden">
    <div class="remark-head"><a><img src="https://www.zybuluo.com/static/img/default-head.jpg"></a></div>
    <div class="remark-author unselectable"></div>
    <div class="remark-delete-link unselectable"><span class="icon-remove"></span></div> <!--This is mainly for deleting remark-reply, shown when author/remark hovering on remark-reply.-->
    <div class="remark-editor" contentEditable="true" spellcheck="false"></div>
    <!-- this will be filled up by js.
    <div class="inline-error">402/400</div> for new remark
    <div class="inline-error">202/200</div> for new reply
    -->
    <div class="remark-footer unselectable">
        <button class="remark-edit btn-link">修改</button>
        <button class="remark-save btn-link">保存</button>
        <button class="remark-cancel btn-link">取消</button>
        <button class="remark-delete btn-link">删除</button>
    </div>
</div>

<!-- template for remark-item-->
<div class="remark-item side-remark-hidden" data-rand-id="" data-version-id="">
    <div class="remark-published-link unselectable"><span class="icon-link icon-rotate-90"></span></div>
    <ul class="remark-options theme unselectable">
        <li class="remark-private"><span class="icon-eye-close"></span><span>私有</span></li>
        <li class="remark-public"><span class="icon-group"></span><span>公开</span></li>
        <li class="remark-delete"><span class="icon-remove"></span><span>删除</span></li>
    </ul>

    <!-- clone the template $('.remark-item-reply').html() to here.-->

    <button class="remark-reply-view-more btn-link">查看更早的 5 条回复</button>
    <div class="remark-replies">
        <!--
        <div class="remark-reply">
            clone the template $('.remark-item-reply').html() to here.
        </div>
        -->
    </div>

    <div class="leave-reply unselectable"><span>回复批注</span></div>
    <div class="new-reply">
        <!-- clone the template $('.new-remark-reply').html() to here.-->
    </div>
</div>

<!-- jiawzhang NOTICE: .remark-icons will be put to mdeditor.mako and user_note.mako, where next to .wmd-preview -->
<!-- <div class="remark-icons"></div> -->

<!-- template for remark-icon -->
<div class="remark-icon unselectable side-remark-hidden remark-icon-empty" style="display: none;">
    <span class="icon-stack">
        <i class="glyph-comment"></i>
        <span class="remark-count"></span>
    </span>
</div>


<!-- canvas, hidden always, this is used to convert svg to canvas and then convert canvas to png. -->
<canvas id="svg-canvas-image" class="editor-reader-hidden-always"></canvas>

<!-- This is the image panel to hold enlarged image/svg. -->
<div id="large-image-panel">
    <img id="large-image"/>
</div>





<!-- Hidden Popup Modal -->
<div id="notification-popup-window" class="modal hide fade theme" tabindex="-1" role="dialog" aria-labelledby="notification-title" aria-hidden="true">
    <div class="modal-header theme">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="notification-title">通知</h3>
    </div>
    <div class="modal-body theme">
        <p></p>
    </div>
    <div class="modal-footer theme">
        <button id="notification-cancel" class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
        <button id="notification-confirm" class="btn btn-primary">确认</button>
    </div>
</div>

<!-- zybuluo's foot -->

<!--<script src="https://www.zybuluo.com/static/assets/288313bb.base.lib.min.js"></script>-->
<script src="../../../../markdown/zybuluo/static/assets/288313bb.base.lib.min.js"></script>

<script>
    Namespace('com.zybuluo.base');
    com.zybuluo.base.initData = {
        globalPromptUrl: "https://www.zybuluo.com/global/prompt",
    };
</script>


<!--mathjax-->
<!--blacker: 1 below means font weight.-->
<script type="text/x-mathjax-config">
        MathJax.Hub.Config({ tex2jax: { inlineMath: [['$','$'], ["\\(","\\)"]], processEscapes: true }, TeX: { equationNumbers: { autoNumber: "AMS" } }, messageStyle: "none", SVG: { blacker: 1 }});
    </script>
<!--<script src="https://www.zybuluo.com/static/editor/libs/mathJax.js"></script>-->
<script src="../../../../markdown/zybuluo/static/editor/libs/mathJax.js"></script>
<!--mathjax source code is here: https://github.com/mathjax/MathJax.-->
<!--<script src="https://www.zybuluo.com/static/MathJax/MathJax.js?config=TeX-AMS-MML_SVG"></script>-->
<script src="../../../../markdown/zybuluo/static/MathJax/MathJax.js?config=TeX-AMS-MML_SVG"></script>

<script>
    Namespace('com.zybuluo.mdeditor.layout');
    com.zybuluo.mdeditor.layout.initData = {
        // '' means not logged in, otherwise the logged in username, for mdeditor.mako, this value will be reset in render.js otherwise, for user_note.mako, it's rendered by server side.
        loggedInUsername: '',
        isPageOwner: 'True' === 'True' ? true : false,
        loginComeFromUrl: 'https://www.zybuluo.com/login?return_to=https%3A%2F%2Fwww.zybuluo.com%2Fmdeditor',
        noteRemarksUrl: "https://www.zybuluo.com/note/current_id_placeholder/remarks",
        newNoteRemarkUrl: "https://www.zybuluo.com/note/current_id_placeholder/remark/new",
        updateNoteRemarkUrl: "https://www.zybuluo.com/note/current_id_placeholder/remark/update",
        deleteNoteRemarkUrl: "https://www.zybuluo.com/note/current_id_placeholder/remark/delete",
        publishNoteRemarkUrl: "https://www.zybuluo.com/note/current_id_placeholder/remark/publish",
        newNoteRemarkReplyUrl: "https://www.zybuluo.com/note/current_id_placeholder/remark_reply/new",
        updateNoteRemarkReplyUrl: "https://www.zybuluo.com/note/current_id_placeholder/remark_reply/update",
        deleteNoteRemarkReplyUrl: "https://www.zybuluo.com/note/current_id_placeholder/remark_reply/delete",
    };

    // BEGIN: pace.js configuration
    window.paceOptions = {
        // disable others, enable for ajax call only,
        ajax: true,
        document: false,
        elements: false,
        eventLag: false,
    };
    // jiawzhang NOTICE: to make sure pace.js is working for any ajax call especially the jquery ajax, add 'Pace.restart()' into jquery ajax call like '$.post'
    // Originally, pace 0.5.6 doesn't support jquery ajax, see details in: https://github.com/HubSpot/pace/issues/29
    // END: pace.js configuration

</script>

<!--<script src="https://www.zybuluo.com/static/assets/mdeditor/7a70106e.layout.lib.min.js"></script>-->
<script src="../../../../markdown/zybuluo/static/assets/mdeditor/7a70106e.layout.lib.min.js"></script>

<!--<script src="https://www.zybuluo.com/static/assets/mdeditor/dc648f35.layout.min.js"></script>-->
<script src="../../../../markdown/zybuluo/static/assets/mdeditor/dc648f35.layout.min.js"></script>





<script src="../../../../markdown/zybuluo/static/editor/libs/mermaid/mermaid.min.js"></script>
<script>
    var mermaidConfig = {
        flowchart:{
            htmlLabels: false
        }
    };
    mermaid.initialize( mermaidConfig ); // this config is added to avoid 'foreignObject' issue casued in fileManger.js
    mermaid.ganttConfig = {
        axisFormatter: [
            // Within a day
            ['%I:%M', function (d) {
                return d.getHours();
            }],
            // Monday a week
            ['%m/%d', function (d) { // redefine date here as '%m/%d'instead of 'w. %U', search mermaid.js
                return d.getDay() == 1;
            }],
            // Day within a week (not monday)
            ['%a %d', function (d) {
                return d.getDay() && d.getDate() != 1;
            }],
            // within a month
            ['%b %d', function (d) {
                return d.getDate() != 1;
            }],
            // Month
            ['%m-%y', function (d) {
                return d.getMonth();
            }]]
    };
    _.noConflict();
</script>

<script src="../../../../markdown/zybuluo/static/assets/mdeditor/0832e823.mdeditor.lib.min.js"></script>

<script>
    Namespace('com.zybuluo.mdeditor');
    com.zybuluo.mdeditor.initData = {
        loginComeFromUrl: 'https://www.zybuluo.com/login?return_to=https%3A%2F%2Fwww.zybuluo.com%2Fmdeditor',
        markdownHelpUrl: "https://www.zybuluo.com/mdeditor?url=https%3A%2F%2Fwww.zybuluo.com%2Fstatic%2Feditor%2Fmd-help.markdown",
        updateUserNoteUrl: "https://www.zybuluo.com/mdeditor/note/update",
        newUserNoteUrl: "https://www.zybuluo.com/mdeditor/note/new",
        deleteUserNoteUrl: "https://www.zybuluo.com/mdeditor/note/delete",
        publishUserNoteUrl: "https://www.zybuluo.com/mdeditor/note/publish",
        removePasswordUserNoteUrl: "https://www.zybuluo.com/mdeditor/note/removePassword",
        downloadPdfUrl: "https://www.zybuluo.com/mdeditor/note/downloadPdf",
        mdeditorNoteInfoUrl: "https://www.zybuluo.com/mdeditor/noteinfo/",
        mdeditorNoteSyncUrl: "https://www.zybuluo.com/mdeditor/note/sync",
        userNoteUrl: "https://www.zybuluo.com/loggedin_username_placeholder/note/",
        noteRevisionsUrl: "https://www.zybuluo.com/note/current_id_placeholder/revisions",
        noteRevisionUrl: "https://www.zybuluo.com/note/current_id_placeholder/revision/",
        noteRevisionSaveUrl: "https://www.zybuluo.com/note/current_id_placeholder/revision/save",
        loginUserUrl: "https://www.zybuluo.com/",
        userTierUrl: "https://www.zybuluo.com/user_tier",
        uptokenUrl: "https://www.zybuluo.com/uptoken",
        userfileAuthUrl: "https://www.zybuluo.com/userfile/auth",
        userfileTrackUrl: "https://www.zybuluo.com/userfile/track",
        thirdPartyAccountUrl: "https://www.zybuluo.com/third_party_account/",
        thirdPartyAccountExportUrl: "https://www.zybuluo.com/third_party_account/export/",
        paymentUrl: "https://www.zybuluo.com/payment",
        cmdDesktopVersionUrl: "https://www.zybuluo.com/cmd_desktop_version",
        staticAssetsUrl: "https://www.zybuluo.com/static/assets/",
        staticImgUrl: "https://www.zybuluo.com/static/img/",
    };
    // jiawzhang NOTICE: switch textarea and ace editor
    window.lightMode = 'False' === 'True' ? true : false;
    window.desktopGui = null; // whether it's desktop or not.
    window.isMacDesktopApp = false;
    if (process && process.mainModule) { // true if it's node-webkit version
        var fs = require('fs'); // jiawzhang NOTICE: ace 1.1.7 will make this line break, upgrade ace to 1.1.9 resolve this, this line is for testing purpose for potential conflicts when upgrading node-webkit/ace in the future.
        window.desktopGui = global.window.nwDispatcher.requireNwGui();
        if (process.platform === "darwin") { // if it's OSX system and desktop version.
            window.isMacDesktopApp = true;
        }
    }
</script>

<script src="../../../../markdown/zybuluo/static/assets/mdeditor/7daebaf5.mdeditor.min.js"></script>



</body>
</html>


