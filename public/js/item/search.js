/**
 * Created by Livon on 2018/1/25.
 */
//
namespace.reg('item.search');

// 最近使用的 Tag 按键
item.search.recentlyUsedTag_btnClick = function() {

    console.log('2018.02.05 12:36');

    var tagButton = $(this);

    var btn_str = '<button tagId="' + tagButton.attr('tagId') + '" '
            //+ ' data-toggle="modal" data-target="#exampleModal" '
        + 'class="chip teal lighten-2 white-text">'
        + tagButton.text()
        + '<i class="close fa fa-times"></i>'
        + '</button>';

    console.log('现在不在编辑页，应该是在搜索页');
    //tag.queryCondition.appendTagButton( $(this).attr('tagId'), $(this).text() );

    var searchCondition_container = $( "#div_tag_queryCondition" );
    searchCondition_container.append( btn_str );

    //$(this).remove();

    tag.recentlyUsed.logging( tagButton.text() );

    item.query();

    //$(this).appendTo($("#div_searchCondition_tags"));
    //$(this).append($("#div_searchCondition_tags").clone());

    //$(this).attr('data-toggle','modal');
    //$(this).attr('data-target','#exampleModal');
    //+ 'data-toggle="modal" data-target="#exampleModal"'

    // 做为搜索条件的标签点击事件


}

// 做为查询条件的 tag , 点击事件
item.search.queryConditionTags_btnClick = function(){

    $(this).fadeOut(500);
    var btn = $(this);
    setTimeout( function(){
        btn.remove()
        console.log( btn );
        item.query();
    }, 501);
}

/**
 * 检索结果 Tag 点击事件
 */
item.search.tagQueryResult_btnClick = function(){

    console.log('2018.02.05 12:48');

    tag.queryCondition.appendTagButton( $(this).attr('tagId'), $(this).text() );

};

// 删除确认
item.search.itemDeleteConfirm_btnClick = function(){

    console.log( $(this) );

    var itemId = $(this).siblings('span[name="itemId"]').text();
    item.delete( itemId );

    $(this).parent().append( '<span class="badge pink">Deleted</span>' );
    $(this).siblings("a").remove();
    $(this).siblings('button[name="delete"]').remove();
    $(this).remove();
    //btn.remove();
    //edit_link.remove();
}


// 删除取消
item.search.itemDeleteCancel_btnClick = function() {
    $(this).prev().remove();
    $(this).remove();
};

var SMDE;

$(document).ready(function () {

    //var SMDE = new SimpleMDE();
    SMDE = new SimpleMDE({
        //element: document.getElementById("textarea_itemContent"),
        element: null,
        renderingConfig: {
            singleLineBreaks: false,
            codeSyntaxHighlighting: true,
        },
    });

    $('#div_tag_recentlyUsed').on('click','button', item.search.recentlyUsedTag_btnClick );

    $("#div_tag_queryResult").on('click','button', item.search.tagQueryResult_btnClick );

    $("#div_tag_queryCondition").on('click','button', item.search.queryConditionTags_btnClick );

    $("#div_items").on('click','button[name="delConfirm"]', item.search.itemDeleteConfirm_btnClick );
    $("#div_items").on('click','a[name="delCancel"]', item.search.itemDeleteCancel_btnClick );

    $('#div_items').on( 'hover','div[name="item"]', function(){
        $(this).toggleClass('div-hover-showBorder');
    });

    // 新增
    $('#i_new_button').click( function(){
        item.insert('(empty!)');
    });

});
// end of ready
