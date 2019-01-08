/**
 * Created by Livon on 2018/1/25.
 */

namespace.reg('article.view');

var SMDE = null ;

article.view.recentlyUsedTag_btnClick = function(){

    console.log('2018.02.05 10:58');

    var tagButton = $(this);

    itemTags.insert( itemId, tagButton.attr('tagId'), tagButton.text() );




    return ;


    //
    //
    //
    //
    //var btn_str = '<button tagId="' + tagButton.attr('tagId') + '" '
    //        //+ ' data-toggle="modal" data-target="#exampleModal" '
    //    + 'class="chip teal lighten-2 white-text">'
    //    + tagButton.text()
    //    + '<i class="close fa fa-times"></i>'
    //    + '</button>';
    //
    //
    //if( $('#div_tags_edit').length > 0 ){
    //    console.log('现在是在编辑页');
    //    //console.log( $(this).text() );
    //    //tag.add( $(this).val() )
    //    //itemTags.insert();
    //    itemTags.insert( tagButton.attr('tagId'), tagButton.text() );
    //} else {
    //    console.log('现在不在编辑页，应该是在搜索页');
    //    //tag.queryCondition.appendTagButton( $(this).attr('tagId'), $(this).text() );
    //
    //    var searchCondition_container = $( "#div_tag_queryCondition" );
    //    searchCondition_container.append( btn_str );
    //
    //    //$(this).remove();
    //
    //    item.query();
    //
    //    //$(this).appendTo($("#div_searchCondition_tags"));
    //    //$(this).append($("#div_searchCondition_tags").clone());
    //
    //    //$(this).attr('data-toggle','modal');
    //    //$(this).attr('data-target','#exampleModal');
    //    //+ 'data-toggle="modal" data-target="#exampleModal"'
    //
    //    // 做为搜索条件的标签点击事件
    //    searchCondition_container.find('button').click( function(){
    //        $(this).fadeOut(500);
    //        var btn = $(this);
    //        setTimeout( function(){
    //            btn.remove()
    //            console.log( btn );
    //            item.query();
    //        }, 501);
    //    });
    //}
}

/**
 * 标签检索结果，点击事件
 */
article.view.tagQueryResult_btnClick = function(){

    itemTags.insert( itemId, $(this).attr('tagId'), $(this).text() );

}

article.view.addTag_btnClick = function(){

    var tagName = $('#input_tag_queryKeyword').val();
    itemTags.insert( itemId, 0, tagName );
}

article.view.itemUpdate_btnClick = function(){



    var content = SMDE.value();

    console.log( content );

    url = '../update';
    var string = $('#textarea_itemContent').val();
    //var encoded = $('<div/>').text(string).html();
    //var htmlEncoded = $('<div/>').text(string).html();
    var htmlEncoded = $('<div/>').text( content ).html();
    var uriEncoded = encodeURIComponent(htmlEncoded);

    $.post( url ,{
        itemId : itemId,
        itemName: uriEncoded
    },function( responseResult ){
        console.log( responseResult );
        var html = responseResult.updateResult ;
        $("#div_post_response").prepend( '<p><pre>' + html + '</pre></p>' );

        toastr.info('已保存！');
    });
}



$(document).ready(function () {

    toastr.options.positionClass = 'toast-bottom-right';


    SMDE = new SimpleMDE({ element: null });


    //var itemList = itemListFormat.format( element.id, SMDE.markdown( htmlDecode( decodeURIComponent( element.name )) ) );

    // 显示
    //var item_name_decoded = htmlDecode( decodeURIComponent( item_name ) );
    $("#div_article").prepend( SMDE.markdown( htmlDecode( decodeURIComponent( articleContent )) ) );

    //showTags(itemId);
    itemTags.showTags( articleId, $('#div_articleTags') );


});
// end of ready

/**
 * 显示标签
 */



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
        //showTags(itemId);
        itemTags.showTags( itemId, $('#div_ItemTags') );
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

