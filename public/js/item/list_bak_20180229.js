/**
 * Created by Livon on 2018/1/25.
 */

var ready_for_search = false;
var ready_for_search_lasted_second = 3;

$(document).ready(function () {

    toastr.options.positionClass = 'toast-bottom-right';

    setInterval(function(){
        if( ready_for_search ){
            toastr.info( ready_for_search_lasted_second-- );
            if( ready_for_search_lasted_second < 0 ){
                console.log( $('#input_search') );
                itemSearch( $('#input_search').val() );
                tagSearch( $('#input_search').val() );
                toastr.info( 'Search is starting ...' );
                ready_for_search = false;
                ready_for_search_lasted_second = 3;
            }
        }
    }, 500);



    var input_search_old_value = '';
    $('#input_search').keyup(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        var newValue = $.trim( $(this).val() );
        console.log( '现在的值：');
        console.log( newValue );

        if( newValue != input_search_old_value ){
            toastr.info('值有变化了');
            if( newValue.length > 0){
                //gen_add_tag_button( newValue );
                ready_for_search = true;
                ready_for_search_lasted_second = 3;
            }
        }

        input_search_old_value = newValue ;
    });


    $("#button_保存").click(function () {

        url = '../update';
        var string = $('#textarea_itemContent').val();
        var encoded = $('<div/>').text(string).html();

        $.post( url ,{
            itemId : item_id,
            itemName: encoded
        },function( responseResult ){
            console.log( responseResult );
            var html = responseResult.updateResult ;
            $("#div_post_response").prepend( '<p><pre>' + html + '</pre></p>' );
        });
    });

    $("#button_add_tag").click(function () {

        toastr.info('添加中 ... ');

        url = '../../itemTags/addNewTag';
        var tagName = $('#input_new_tag').val();
        var encoded_tagName = $('<div/>').text(tagName).html();

        $.post( url ,{
            itemId : item_id,
            tagName: encoded_tagName
        },function( responseResult ){
            console.log( responseResult );
            var html = responseResult.insertedId ;
            //$("#div_post_response").prepend( '<p><pre>' + html + '</pre></p>' );
            if( responseResult.insertedId > 0 ){
                toastr.info('添加成功！id = ' + responseResult.insertedId );
                showTags( item_id );
            }else {
                toastr.info('添加失败！exceptionMessage = ' + responseResult.exceptionMessage );
            }
        });
    });

    $('#input_new_tag1').change( function(){
        console.log( '#input_new_tag change event fired.');
    });

    $('#input_new_tag1').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        console.log( 'event：');
        console.log( event );
        console.log( 'keycode：');
        console.log( keycode);
        console.log( $(this).val() );
        gen_add_tag_button( event.key );
        if(keycode == '13'){
            alert('You pressed a "enter" key in textbox, here submit your form');
        }
    });

    var input_new_tag_old_value = '';
    $('#input_new_tag').keyup(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        var newValue = $.trim( $(this).val() );
        console.log( '现在的值：');
        console.log( newValue );

        if( newValue != input_new_tag_old_value ){
            toastr.info('值有变化了');
            if( newValue.length > 0){
                gen_add_tag_button( newValue );
            }
        }

        input_new_tag_old_value = newValue ;
    });

    $('#div_tags1 div').click( function(index, element){
        toastr.info('div clicked');
        console.log( this );
        console.log( element );
        console.log( $(element).attr('tagId') );
        //$("img").attr("width","180");
    });


    $(function () {
        $("[data-toggle='popover']").popover();
        console.log('2018.01.27 12:50');
    });

    // 确定删除
    $('#exampleModal button[tagId]').click( function(){
        tag_remove( item_id, $(this).attr('tagId'));
        toastr.info( $(this).attr('tagId'));
    });


});
// end of ready

/**
 * 检索列表
 * @param search_content
 */
function itemSearch(searchContent ){

    console.log('itemSearch function is starting ...');

    //$('#div_tags').hide(500);

    url = 'search';

    $("#div_items").empty();

    $.post( url ,{
        searchContent : searchContent
    },function( response ){

        var data = response.items.data;

        if( data.length > 0 ){

            $( data ).each(function(index,element){

                var itemList = '<p>' + element.id + '</p>'
                    + '<pre>' + element.name + '</pre>';

                $("#div_items").prepend( itemList );
            });
            toastr.info( '列表已更新（items: ' + data.length + ')' );
        }
    });
}

/**
 * 搜索标签
 * @param searchContent
 */
function tagSearch1( searchContent ){

    console.log('tagSearch function is starting ...');

    url = '../tag/search';

    $("#div_tags").empty();

    $.post( url ,{
        searchContent : searchContent
    },function( response ){

        var data = response.items.data;

        if( data.length > 0 ){

            $( data ).each(function(index,element){


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
                //
                //var tag = '<p>' + element.id + '</p>'
                //    + '<pre>' + element.tagName + '</pre>';
                //
                //$("#div_tags").prepend( tag );
            });

            $('#div_tags button').click( function(){

                $(this).appendTo($("#div_searchCondition_tags"));
            });

            toastr.info( '标签搜索列表已更新（ tags: ' + data.length + ')' );
        }
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

//https://stackoverflow.com/questions/20729823/jquery-string-format-issue-with-0
String.prototype.format = function() {
    var str = this;
    for (var i = 0; i < arguments.length; i++) {
        var reg = new RegExp("\\{" + i + "\\}", "gm");
        str = str.replace(reg, arguments[i]);
    }
    return str;
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

