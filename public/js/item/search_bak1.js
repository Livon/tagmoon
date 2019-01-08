/**
 * Created by Livon on 2018/1/25.
 */

namespace.reg('item');
namespace.reg('item.search');




item.search.showItemTags = function( itemTags ){

    $.each( itemTags, function( index, element ){

        console.log( element );
        //$('div[name="itemList"] p[name="itemTags"]')
        var tagButton = '<button tagId="'+ element.tagId +'" class="trigger info-color text-white">'+ element.tagName +'<i class="fa fa-plus ml-2"></i></button>'
        $('#div_itemList_'+ element.itemId + ' p[name="itemTags"]').append( tagButton );


        // 备选标签点击事件
        $('#div_itemList_'+ element.itemId ).find( 'button[tagid="'+element.tagId+'"]').click( function(){

            console.log('2018.02.01 05:28');

            tag.searchCondition.tagContainer.appendTagButton( $(this).attr('tagId'), $(this).text() )

        });

    })


    // 备选标签点击事件
    //$('#div_items button[name="delete"]').click( function(){
    //
    //    console.log('2018.01.31 17:30');
    //
    //    var btn_str = '<button tagId="' + $(this).attr('tagId') + '" '
    //            //+ ' data-toggle="modal" data-target="#exampleModal" '
    //        + 'class="chip teal lighten-2 white-text">'
    //        + $(this).text()
    //        + '<i class="close fa fa-times"></i>'
    //        + '</button>';
    //
    //    $("#div_searchCondition_tags").prepend( btn_str );
    //
    //    //$(this).remove();
    //
    //    //itemSearch();
    //
    //    //$(this).appendTo($("#div_searchCondition_tags"));
    //    //$(this).append($("#div_searchCondition_tags").clone());
    //
    //    //$(this).attr('data-toggle','modal');
    //    //$(this).attr('data-target','#exampleModal');
    //    //+ 'data-toggle="modal" data-target="#exampleModal"'
    //
    //    // 做为搜索条件的标签点击事件
    //    $('#div_searchCondition_tags button').click( function(){
    //        $(this).fadeOut(500);
    //        var btn = $(this);
    //        setTimeout( function(){
    //            btn.remove()
    //            console.log( btn );
    //            itemSearch();
    //        }, 501);
    //    });
    //});

    //var itemListFormat = '<div name="itemList" id="div_itemList_{0}"><p>{0} <a target="_blank" href="edit/{0}" itemId="{0}">edit</a>'
    //    + '<button type="button" class="btn btn-outline-danger btn-rounded waves-effect">delete</button></p>'
    //    + '<p name="itemTags"></p>'
    //    + '<pre>{1}</pre>'
    //    + '<hr></div>';
}


item.ready_for_search = false;
item.ready_for_search_lasted_second = 3;

item.search.addListener = function( ){

    console.log( '2018.02.01 16:02' );

    var input_tag_search_old_value = '';

    $('#input_item_search_keys').keyup(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        var newValue = $.trim( $(this).val() );
        console.log( '现在的值：');
        console.log( newValue );

        if( newValue != input_tag_search_old_value ){
            toastr.info('值有变化了');
            item.ready_for_search = true;
            //tag.ready_for_tag_search_lasted_second = 3;
            //if( newValue.length > 0){
            //gen_add_tag_button( newValue );
            //}
        }

        input_tag_search_old_value = newValue ;
    });


}

item.search.setInterval = function( ){

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

    toastr.options.positionClass = 'toast-bottom-right';

    item.search.addListener();
    item.search.setInterval();



    //
    //// 关键字
    //var input_search_old_value = '';
    //$('#input_search').keyup(function(event){
    //    var keycode = (event.keyCode ? event.keyCode : event.which);
    //    var newValue = $.trim( $(this).val() );
    //    console.log( '现在的值：');
    //    console.log( newValue );
    //
    //    if( newValue != input_search_old_value ){
    //        toastr.info('值有变化了');
    //        ready_for_item_search = true;
    //        ready_for_item_search_lasted_second = 3;
    //        //if( newValue.length > 0){
    //            //gen_add_tag_button( newValue );
    //        //}
    //    }
    //
    //    input_search_old_value = newValue ;
    //});


    //$("#button_保存").click(function () {
    //
    //    url = '../update';
    //    var string = $('#textarea_itemContent').val();
    //    var encoded = $('<div/>').text(string).html();
    //
    //    $.post( url ,{
    //        itemId : item_id,
    //        itemName: encoded
    //    },function( responseResult ){
    //        console.log( responseResult );
    //        var html = responseResult.updateResult ;
    //        $("#div_post_response").prepend( '<p><pre>' + html + '</pre></p>' );
    //    });
    //});

    //$("#button_add_tag").click(function () {
    //
    //    toastr.info('添加中 ... ');
    //
    //    url = '../../itemTags/addNewTag';
    //    var tagName = $('#input_new_tag').val();
    //    var encoded_tagName = $('<div/>').text(tagName).html();
    //
    //    $.post( url ,{
    //        itemId : item_id,
    //        tagName: encoded_tagName
    //    },function( responseResult ){
    //        console.log( responseResult );
    //        var html = responseResult.insertedId ;
    //        //$("#div_post_response").prepend( '<p><pre>' + html + '</pre></p>' );
    //        if( responseResult.insertedId > 0 ){
    //            toastr.info('添加成功！id = ' + responseResult.insertedId );
    //            showTags( item_id );
    //        }else {
    //            toastr.info('添加失败！exceptionMessage = ' + responseResult.exceptionMessage );
    //        }
    //    });
    //});

    //$('#input_new_tag1').change( function(){
    //    console.log( '#input_new_tag change event fired.');
    //});

    //$('#input_new_tag1').keypress(function(event){
    //    var keycode = (event.keyCode ? event.keyCode : event.which);
    //    console.log( 'event：');
    //    console.log( event );
    //    console.log( 'keycode：');
    //    console.log( keycode);
    //    console.log( $(this).val() );
    //    gen_add_tag_button( event.key );
    //    if(keycode == '13'){
    //        alert('You pressed a "enter" key in textbox, here submit your form');
    //    }
    //});

    //var input_new_tag_old_value = '';
    //$('#input_new_tag').keyup(function(event){
    //    var keycode = (event.keyCode ? event.keyCode : event.which);
    //    var newValue = $.trim( $(this).val() );
    //    console.log( '现在的值：');
    //    console.log( newValue );
    //
    //    if( newValue != input_new_tag_old_value ){
    //        toastr.info('值有变化了');
    //        if( newValue.length > 0){
    //            gen_add_tag_button( newValue );
    //        }
    //    }
    //
    //    input_new_tag_old_value = newValue ;
    //});

    //$('#div_tags1 div').click( function(index, element){
    //    toastr.info('div clicked');
    //    console.log( this );
    //    console.log( element );
    //    console.log( $(element).attr('tagId') );
    //    //$("img").attr("width","180");
    //});


    //$(function () {
    //    $("[data-toggle='popover']").popover();
    //    console.log('2018.01.27 12:50');
    //});

    // 确定删除
    $('#exampleModal button[tagId]').click( function(){
        //tag_remove( item_id, $(this).attr('tagId'));
        var selector = '#div_searchCondition_tags button[tagId="'+$(this).attr('tagId')+'"]';
        console.log( selector );
        console.log('tag: ');
        console.log( $(selector) );
        $(selector).remove();
        toastr.info( $(this).attr('tagId'));

        itemSearch();
    });


});
// end of ready

/**
 * 检索列表
 * @param search_content
 */
function itemSearch1( ){

    console.log('itemSearch function is starting ...');

    var arr_keyValues = $('#input_item_search').val().split(' ');
    $.each( arr_keyValues, function( index, element){
        arr_keyValues[index] = encodeURIComponent( element );
    } )
    var arr_tagIds = [];

    var tagButtons = $('#div_searchCondition_tags button');

    $.each(tagButtons,function(key,val){
        arr_tagIds.push($(this).attr('tagId'));
    });

    //$('#div_tags').hide(500);

    url = 'search';

    $("#div_items").empty();

    $.post( url ,{
        arr_keyValues : arr_keyValues,
        arr_tagIds : arr_tagIds
    },function( response ){

        var data = response.items.data;

        //console.log( data );

        if( data ){

            myApp.pageLink_rewrite( 'div_pagination_link', response.items );

            //$("#div_ltems_pagination_link").prepend( 'current_page:{0} from:{1} to:{2} total:{3}'.format(
            //    response.items.current_page, response.items.from, response.items.to, response.items.total
            //) );

            $("#div_items").empty();

            $.each( data, function(index,element){

                //var itemList = '<p>' + element.id
                //    + ' <a target="_blank" href="edit/' + element.id + '" itemId="' + element.id + '">edit</a>'
                //    + ' < ' + element.id + '" itemId="' + element.id + '" '
                //    //+ ' data-toggle="modal" data-target="#exampleModal" '
                //    + '>delete</a>'
                //+ '</p>'
                //    + '<pre>' + decodeURIComponent( element.name ) + '</pre>';
                //
                //
                //<button type="button" class="btn btn-outline-danger btn-rounded waves-effect">Danger</button>
                //
                //
                //url = '../../itemTags/tag/remove/{0}/{1}'.format( itemId, tagId );

                var itemListFormat = '<div name="itemList" id="div_itemList_{0}"><p>{0} <a target="_blank" href="edit/{0}" itemId="{0}">edit</a>'
                    + '<button type="button" class="btn btn-outline-danger btn-rounded waves-effect">delete</button></p>'
                    + '<p name="itemTags"></p>'
                    + '<pre>{1}</pre>'
                    + '<hr></div>';

                var itemList = itemListFormat.format( element.id, decodeURIComponent( element.name ) );




                //var item_name_decoded = htmlDecode( decodeURIComponent( item_name ) );
                $("#div_items").prepend( itemList );
            });

            // 删除按钮
            $('#div_items button').click( function () {

                var btn = $(this);

                console.log( $(this).siblings("a") );
                console.log( $(this).siblings("a")[0] );
                console.log( $( $(this).siblings("a")[0]).attr('itemId') );

                var edit_link = $( $(this).siblings("a")[0]);
                var itemId = edit_link.attr('itemId');

                // 确定按钮
                var confirmButtons = '<button class="trigger info-color text-white">确定<i class="fa fa-plus ml-2"></i></button>'
                    + ' <a class="chip teal lighten-2 white-text">取消<i class="fa fa-plus ml-2"></i></a>';

                btn.parent().append( confirmButtons );

                // 确定按钮的点击事件
                $(this).siblings('button').click( function(){
                    console.log( $(this) );
                    itemDelete( itemId );
                    btn.parent().append( '<span class="badge pink">Deleted</span>' );

                    $(this).siblings("a").remove();
                    $(this).remove();
                    btn.remove();
                    //edit_link.remove();
                });

                // 取消按钮
                $(this).siblings('a[class="chip teal lighten-2 white-text"]').click( function(){
                    console.log( $(this) );
                    $(this).prev().remove();
                    $(this).remove();
                });

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

            toastr.info( '列表已更新（items: ' + data.length + ')' );
        }


        showItemTags( response.itemTags );


    });
}

/**
 * 搜索标签
 * @param searchContent
 */
function tagSearch1( arr_keyValues ){

    console.log('tagSearch function is starting ...');

    url = '../tag/search';

    $("#div_tags").empty();

    $.post( url ,{
        arr_keyValues : arr_keyValues.split(' ')
    },function( response ){

        var data = response.items.data;

        if( data ){

            // 备选标签
            $( data ).each(function(index,element){

                var tag_button_string = '<button tagId="' + element.id + '" '
                    + 'class="chip teal lighten-2 white-text">'
                    + element.tagName
                    + '<i class="close fa fa-times"></i>'
                    + '</button>';

                $("#div_tags").prepend( tag_button_string );
            });

            // 备选标签点击事件
            $('#div_tags button').click( function(){

                console.log('2018.02.01 05:28');

                tag.searchCondition.tagContainer.appendTagButton('div_searchCondition_tags', $(this).attr('tagId'), $(this).text() )

            });

            toastr.info( '标签搜索列表已更新(0525)（ tags: ' + data.length + ')' );


        }
    });
}

function itemDelete( itemId ){

    url = '../item/delete/' + itemId;

    $.get(url, function( data,status ){

        toastr.info('已删除');


    });
}

/**
 * 显示标签
 */

function showTags( itemId ){

    $('#div_tags').hide(500);

    url = '../../itemTags/getTagsByItemId/' + itemId;

    $.get(url, function(data,status){
        //alert("Data: " + data + "\nStatus: " + status)

        $("#div_tags").empty();

        $( data.tags ).each(function(index,element){

            var tag_button_string = '<div tagId="' + element.tagId + '" '
                    + 'title="Popover title" data-container="body" data-toggle="popover" data-placement="bottom" data-content="底部的 Popover 中的一些内容"'
                + 'class="chip teal lighten-2 white-text">'
                + element.tagName
                + '<i class="close fa fa-times"></i>'
                + '</div>';

            tag_button_string = '<button tagId="' + element.tagId + '" '
                + 'data-toggle="modal" data-target="#exampleModal"'
                + 'class="chip teal lighten-2 white-text">'
                + element.tagName
                + '<i class="close fa fa-times"></i>'
                + '</button>';

            $("#div_tags").prepend( tag_button_string );
            //$(selector).toggle(speed,callback,switch)
        });
        $('#div_tags').toggle(500);

        $("[data-toggle='popover']").popover();


        //$('#exampleModal').on('show.bs.modal', function(event) {
        //    var button = $(event.relatedTarget) // Button that triggered the modal
        //    var recipient = button.data('whatever') // Extract info from data-* attributes
        //    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        //    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        //    var modal = $(this)
        //    modal.find('.modal-title').text('New message to ' + recipient)
        //    modal.find('.modal-body input').val(recipient)
        //})

        $('#div_tags button').click( function(){


            $('#exampleModal').find('.modal-title').text( $(this).attr('tagId') );
            $('#exampleModal').find('.modal-body').html( $(this).text() );
            //$('#exampleModal').find('button[tagId]').attr('tagId', $(this).attr('tagId') );
            $('#exampleModal button[tagId]').attr('tagId', $(this).attr('tagId') );

            //toastr.info('div clicked');
            //console.log( this );
            //console.log( $(this) );
            //console.log( element );
            //console.log( $(this).attr('tagId') );
            //$("img").attr("width","180");
            //$('#exampleModal button[tagId]').attr('tagId', $(this).attr('tagId') );
            //$('#exampleModal div.modal-body').html( $(this).text() );
            //$('#exampleModal').modal('hide');
            toastr.info( 'tag: ' + $(this).text());
        });

        toastr.info('标签已加载');


    });

}


/**
 * 生成“添加Tag按钮”
 * @param tagName
 */
function gen_add_tag_button( tagName ){
    var add_tag_button_string = '<div class="chip teal lighten-2 white-text">' +
        tagName +
        '<i class="close fa fa-times"></i>' +
        '</div>';

    $("#div_candidate_tags").prepend( add_tag_button_string );

    var add_tag_button_string1 = add_tag_button_string;

    $("#div_recent_tags").prepend( add_tag_button_string1 );
}



/**
 * 删除标签
 */
function tag_remove( itemId, tagId ){

    url = '../../itemTags/tag/remove/{0}/{1}'.format( itemId, tagId );

    $.get(url, function(data,status){
        showTags( itemId );
        toastr.info( 'delResult: ' + data.delResult );
    });
}




function backup(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#button_提交").click(function () {
        url = 'http://localhost/Laravel-Todo/public/tagMoon/itemNew';

        console.log( url );
        //console.log( $('#textarea_itemContent').text() );
        console.log( $('#textarea_itemContent').val() );

        var string = $('#textarea_itemContent').val();
        var encoded = $('<div/>').text(string).html();
        console.log( encoded );
        console.log( 'htmlDecode(encoded):' );
        console.log( htmlDecode(encoded) );
        //encoded = encodeURIComponent( string );
        //encoded = htmlDecode( string );
        console.log( encoded );

        $.post( url ,{
            itemContent: encoded
        },function( responseResult ){
            console.log( responseResult );
            var html = '[' + responseResult.insertedId + '] <br>'
                    + responseResult.itemContent
            //+ '( '
            //+ htmlEncode( decodeURIComponent( responseResult.itemContent ))
            //+ htmlEncode( responseResult.itemContent )
            //+ ' )';
                ;
            //$("#div_itemNew_response").html( html );
            //$("#div_itemNew_response").prepend( '<p>' + html + '</p>' );
            $("#div_itemNew_response").prepend( '<p><pre>' + html + '</pre></p>' );
            //$("#div_itemNew_response").prepend( '<textarea>' + html + '</textarea>' );

            //$("ol").prepend("<li>Prepended item</li>");
        });

        //var htmlobj = $.ajax({url: url, async: false});
        //$("#div_itemNew_response").html( htmlobj.responseText );
        //$("#div_itemNew_response").html(url);
    });

}

function htmlEncode(value){
    if (value) {
        return jQuery('<div />').text(value).html();
    } else {
        return '';
    }
}

function htmlDecode(value) {
    if (value) {
        return $('<div />').html(value).text();
    } else {
        return '';
    }
}

