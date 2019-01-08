/**
 * Created by Livon on 2018/1/25.
 */

namespace.reg('tag.queryCondition');

/**
 * 检索列表
 * @param search_content
 */
tag.queryCondition.add = function( targetId, tagId ){

    console.log( '2018.02.01 12:50' );

}

/**
 * 添加标签按钮
 * 标签.搜索条件.标签容器.
 * @param tagContainerId
 * @param tagId
 */
tag.queryCondition.appendTagButton = function( tagId, tagName ){

    console.log( '2018.02.01 13:33' );

    //http://www.jb51.net/article/45810.htm

    var tagContainer = $('#div_tag_queryCondition' );

    var btn_str = '<button tagId="' + tagId + '" '
        + 'class="chip teal lighten-2 white-text">'
        + tagName
        + '<i class="close fa fa-times"></i>'
        + '</button>';

    tagContainer.append( btn_str );

    //tag.queryCondition.tagBtn_setClickEvent();

    // TODO

    //$(this).remove();


    //$(this).appendTo($("#div_searchCondition_tags"));
    //$(this).append($("#div_searchCondition_tags").clone());

    //$(this).attr('data-toggle','modal');
    //$(this).attr('data-target','#exampleModal');
    //+ 'data-toggle="modal" data-target="#exampleModal"'


    // 重新搜索内容
    item.query();

    // 重写最近使用标签
    //tag.recentlyUsed.tagContainer.rewrite();

    // 记录最近使用标签
    tag.recentlyUsed.logging( tagName );
}

/**
 * 设置点击事件
 */


$(document).ready(function () {


});
// end of ready


