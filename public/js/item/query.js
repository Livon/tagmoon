/**
 * Created by Livon on 2018/1/25.
 */

namespace.reg('item');


/**
 * 检索列表
 * @param search_content
 */
item.query = function( pageNumber ){

    console.log( '2018.02.01 17:00' );

    // 关键字
    var arr_keyValues = $('#input_item_queryKeywords').val().split(' ');

    // 转码
    $.each( arr_keyValues, function( index, element){
        //arr_keyValues[index] = encodeURIComponent( element );
        var htmlEncoded = $('<div/>').text( element ).html();
        arr_keyValues[index] = encodeURIComponent( htmlEncoded );
    } )

    // 标签
    var arr_tagIds = [];

    var tagButtons = $('#div_tag_queryCondition button');

    $.each(tagButtons,function(key,val){
        arr_tagIds.push($(this).attr('tagId'));
    });


    // 查询
    url = 'query';

    // init
    $("#div_items").empty();
    $('#div_items_pagination_link').empty();

    // 请求数据
    $.post( url ,{
        arr_keyValues : arr_keyValues,
        arr_tagIds : arr_tagIds,
        page : pageNumber
    },function( response ){

        var data = response.items.data;

        //console.log( data );

        if( data ){

            // 分页
            myApp.pageLink_show( 'div_items_pagination_link', response.items );

            //$("#div_ltems_pagination_link").prepend( 'current_page:{0} from:{1} to:{2} total:{3}'.format(
            //    response.items.current_page, response.items.from, response.items.to, response.items.total
            //) );

            $.each( data, function(index,element){

                var itemListFormat = '<div name="item" id="div_item_{0}"><hr>'
                    + '<p><span name="itemId">{0}</span>'
                        // 查看
                    + ' <a target="_blank" href="../article/view/{0}" itemId="{0}">view</a>'
                        // 修改
                    + ' <a target="_blank" href="edit/{0}" itemId="{0}">edit</a>'
                        // 删除按钮
                    + '<button name="delete" type="button" class="btn btn-outline-danger btn-rounded waves-effect">delete</button>'
                    // 时间
                    + '<span> {1} </span></p>'
                        // 标签
                    + '<p name="itemTags"></p>'
                        // 内容
                    + '<pre>{2}</pre>'
                    //+ '{1}'
                    + '</div>';

                //var itemList = itemListFormat.format( element.id, SMDE.markdown( decodeURIComponent( element.name ) ) );
                var itemList = itemListFormat.format( element.id, element.timestamp, SMDE.markdown( htmlDecode( decodeURIComponent( element.name )) ) );

                // 显示
                //var item_name_decoded = htmlDecode( decodeURIComponent( item_name ) );
                $("#div_items").append( itemList );

            }); // end each

            item.query.delBtn_setClickEvent();

            toastr.info( '列表已更新（items: ' + data.length + ')' );
        }

        item.query.showItemTags( response.itemTags );


    });

}

/**
 * 删除按钮的点击事件
 */
item.query.delBtn_setClickEvent = function(){


    var div_items = $('#div_items');


    // 删除按钮
    div_items.find('button[name="delete"]').click( function () {

        var btn = $(this);

        console.log( $(this).siblings("a") );
        console.log( $(this).siblings("a")[0] );
        console.log( $( $(this).siblings("a")[0]).attr('itemId') );

        var edit_link = $( $(this).siblings("a")[0]);
        var itemId = edit_link.attr('itemId');

        // 确定按钮
        var confirmButtons = '<button name="delConfirm" class="trigger info-color text-white">确定<i class="fa fa-plus ml-2"></i></button>'
            + ' <a name="delCancel" class="chip teal lighten-2 white-text">取消<i class="fa fa-plus ml-2"></i></a>';

        btn.parent().append( confirmButtons );

        //// 确定按钮的点击事件
        //$(this).siblings('button[name="delConfirm"]').click( function(){
        //    console.log( $(this) );
        //    //itemDelete( itemId );
        //    item.delete( itemId );
        //    btn.parent().append( '<span class="badge pink">Deleted</span>' );
        //
        //    $(this).siblings("a").remove();
        //    $(this).remove();
        //    btn.remove();
        //    //edit_link.remove();
        //});
        //
        //// 取消按钮
        //$(this).siblings('a[class="chip teal lighten-2 white-text"]').click( function(){
        //    console.log( $(this) );
        //    $(this).prev().remove();
        //    $(this).remove();
        //});

        //$.confirm({
        //    title: 'Confirm!',
        //    content: 'itemId: {0}'.format( itemId ),
        //    confirm: function(){
        //        //$.alert('Confirmed!');
        //        //$(this).val('Deleted');
        //        console.log( $(this));
        //        itemDelete( itemId );
        //        btn.parent().append( '<span>Deleted</span>' );
        //
        //
        //
        //        btn.remove();
        //        edit_link.remove();
        //    },
        //    cancel: function(){
        //        $.alert('Canceled!')
        //    }
        //});
    });
}


/**
 * 显示列表中每个 item 的标签
 * @param itemTags
 */
item.query.showItemTags = function( itemTags ){

    $.each( itemTags, function( index, element ){

        console.log( element );
        //$('div[name="itemList"] p[name="itemTags"]')

        var tagButton = '<button tagId="'+ element.tagId +'" class="trigger info-color text-white">'+ element.tagName +'<i class="fa fa-plus ml-2"></i></button>'

        // 显示标签
        $('#div_item_'+ element.itemId + ' p[name="itemTags"]').append( tagButton );


        // 标签点击事件
        $('#div_item_'+ element.itemId ).find( 'button[tagid="'+element.tagId+'"]').click( function(){

            console.log('2018.02.01 05:29');

            // 点击后，作为查询条件
            tag.queryCondition.appendTagButton( $(this).attr('tagId'), $(this).text() );

        });

    }) // end each

};




item.ready_for_search = false;
item.ready_for_search_lasted_second = 3;

item.query.addListener = function( ){

    console.log( '2018.02.01 16:02' );

    var oldValue = '';

    $('#input_item_queryKeywords').keyup(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        var newValue = $.trim( $(this).val() );
        console.log( '现在的值：');
        console.log( newValue );
        console.log( keycode );

        if( newValue != oldValue ){
            toastr.info('值有变化了');
            item.ready_for_search = true;
            //tag.ready_for_tag_search_lasted_second = 3;
            //if( newValue.length > 0){
            //gen_add_tag_button( newValue );
            //}
        }

        oldValue = newValue ;
    });

    // 放大镱图标，单击查询
    $('#div_item_queryKeywords i').click( function(){
        item.query();
    })

    // 关键字输入框，双击清空
    $('#div_item_queryKeywords input').dblclick( function(){
        //item.query();
        //$(this).empty();
        $(this).val('');
    })


}

item.query.setInterval = function( ){

    console.log( '2018.02.01 13:06' );

    setInterval(function(){

        if( item.ready_for_search ){
            toastr.info( item.ready_for_search_lasted_second );
            if ( --item.ready_for_search_lasted_second < 0) {
                item.query();
                toastr.info('Item search is starting ...');
                item.ready_for_search = false;
                item.ready_for_search_lasted_second = 3;
            }
        }
    }, 500);


}

$(document).ready(function () {


    item.query.addListener();
    item.query.setInterval();

    //setInterval(function(){
    //
    //    if( item.ready_for_search ){
    //        toastr.info( item.ready_for_search_lasted_second );
    //        if ( --item.ready_for_search_lasted_second < 0) {
    //            item.query();
    //            tagSearch( $('#input_tag_search').val() );
    //            toastr.info('Tag search is starting ...');
    //            item.ready_for_tag_search = false;
    //            item.ready_for_tag_search_lasted_second = 3;
    //        }
    //    }
    //}, 300);


});
// end of ready


