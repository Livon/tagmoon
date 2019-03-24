/**
 * Created by Livon on 2019-03-24
 */

namespace.reg('doc');


$(function() {

    /*
    // or
    testEditor = editormd({
        id      : "test-editormd",
        width   : "90%",
        height  : 640,
        path    : "../lib/"
    });
    */
});

$(function () {

    console.log( '2019.03.24 20:03' );

    doc.editormd =  editormd("test-editormd", {
        width   : "98%",
        height  : 640,
        syncScrolling : "single",
        path    : "/editor.md-master/lib/"
    });


});

// 添加测试
doc.testPost = function () {

    $.post(
        doc.url.doc,
        {
            content: doc.editormd.getMarkdown()
        },
        function( data, status ){
            if( status === 'success' ){
                console.log('成功');
                console.log( data );
            }else{
                console.log('失败');
            }
        }
    );
};

// 点击事件
$(function () {



    $('#getContent').on( 'click', function () {
        doc.testPost();

        debugger;

        console.log( doc.editormd );

        var testEditormdView, testEditormdView2;


        testEditormdView = editormd.markdownToHTML("test-editormd-view", {
            markdown        : doc.editormd.getMarkdown()  ,//+ "\r\n" + $("#append-test").text(),
            //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
            htmlDecode      : "style,script,iframe",  // you can filter tags decode
            //toc             : false,
            tocm            : true,    // Using [TOCM]
            //tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
            //gfm             : false,
            //tocDropdown     : true,
            // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
            emoji           : true,
            taskList        : true,
            tex             : true,  // 默认不解析
            flowChart       : true,  // 默认不解析
            sequenceDiagram : true,  // 默认不解析
        });

        //console.log("返回一个 jQuery 实例 =>", testEditormdView);

        // 获取Markdown源码
        //console.log(testEditormdView.getMarkdown());

        //alert(testEditormdView.getMarkdown());

        testEditormdView2 = editormd.markdownToHTML("test-editormd-view2", {
            htmlDecode      : "style,script,iframe",  // you can filter tags decode
            emoji           : true,
            taskList        : true,
            tex             : true,  // 默认不解析
            flowChart       : true,  // 默认不解析
            sequenceDiagram : true,  // 默认不解析
        });

    })

});


