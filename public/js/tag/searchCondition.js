/**
 * Created by Livon on 2018/1/25.
 */

namespace.reg('tag.searchCondition');
namespace.reg('tag.searchCondition.tagContainer');

/**
 * 检索列表
 * @param search_content
 */
tag.searchCondition.add = function( targetId, tagId ){

    console.log( '2018.02.01 12:50' );

}

/**
 * 添加标签按钮
 * 标签.搜索条件.标签容器.
 * @param tagContainerId
 * @param tagId
 */
tag.searchCondition.tagContainer.appendTagButton1 = function( tagId, tagName ){

    console.log( '2018.02.01 13:33' );

    //http://www.jb51.net/article/45810.htm

    tagContainer = $('#div_tag_queryCondition' );

    var btn_str = '<button tagId="' + tagId + '" '
        + 'class="chip teal lighten-2 white-text">'
        + tagName
        + '<i class="close fa fa-times"></i>'
        + '</button>';

    tagContainer.append( btn_str );

    //$(this).remove();


    //$(this).appendTo($("#div_searchCondition_tags"));
    //$(this).append($("#div_searchCondition_tags").clone());

    //$(this).attr('data-toggle','modal');
    //$(this).attr('data-target','#exampleModal');
    //+ 'data-toggle="modal" data-target="#exampleModal"'

    // 做为搜索条件的标签点击事件
    tagContainer.find('button').click( function(){

        var btn = $(this);
        btn.fadeOut(500);

        setTimeout( function(){
            btn.remove()
            console.log( btn );
            //itemSearch();
            item.query();
        }, 501);
    });

    // 重新搜索内容
    item.query();

    // 重写最近使用标签
    tag.recentlyUsed.tagContainer.rewrite('div_tag_recentlyUsed');

    // 记录最近使用标签
    tag.recentlyUsed.logging( tagName );
}


$(document).ready(function () {


});
// end of ready


