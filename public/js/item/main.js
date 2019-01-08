/**
 * Created by Livon on 2018/1/25.
 */

namespace.reg('item');


/**
 * 监听器
 * @param search_content
 */

item.insert = function( itemContent ){

    url = baseUrl + 'public/item/insert';

    //console.log( url );
    //console.log( $('#textarea_itemContent').text() );
    //console.log( $('#textarea_itemContent').val() );

    var string = $('#textarea_itemContent').val();

    var htmlEncoded = $('<div/>').text( itemContent ).html();
    var uriEncoded = encodeURIComponent(htmlEncoded);

    //console.log( htmlEncoded );
    //console.log( 'htmlDecode(encoded):' );
    //console.log( htmlDecode( htmlEncoded ) );
    //console.log( encodeURIComponent(htmlEncoded) );
    //console.log( 'encodeURIComponent(string):' );
    //console.log( encodeURIComponent(string) );
    //console.log( decodeURIComponent(uriEncoded) );
    //encoded = encodeURIComponent( string );
    //encoded = htmlDecode( string );
    //console.log( htmlEncoded );

    $.post( url ,{
        itemContent: uriEncoded
    },function( responseResult ){
        console.log( responseResult );

        // 跳转到 edit 页。
        //var sFeatures = "height=600, width=810, scrollbars=yes, resizable=yes";
        var editUrl = baseUrl + 'public/item/edit/' + responseResult.insertedId ;
        var wFeatures = 'target="_blank"';
        window.open( editUrl, '', wFeatures );

        //var html = '[' + responseResult.insertedId + '] <br>'
        //        + decodeURIComponent( responseResult.itemContent )
        //        + ' - <a href="{0}{1}" target="_blank">edit</a> '.format('edit/',responseResult.insertedId)
        //+ '( '
        //+ htmlEncode( decodeURIComponent( responseResult.itemContent ))
        //+ htmlEncode( responseResult.itemContent )
        //+ ' )';
            ;




        //$("#div_itemNew_response").html( html );
        //$("#div_itemNew_response").prepend( '<p>' + html + '</p>' );
        //$("#div_itemNew_response").prepend( '<p><pre>' + html + '</pre></p>' );
        //$("#div_itemNew_response").prepend( '<textarea>' + html + '</textarea>' );

        //$("ol").prepend("<li>Prepended item</li>");

        toastr.info('添加成功！' );
    });

    //var htmlobj = $.ajax({url: url, async: false});
    //$("#div_itemNew_response").html( htmlobj.responseText );
    //$("#div_itemNew_response").html(url);

}



item.delete = function( itemId ){

    url = baseUrl +'public/item/delete/' + itemId;

    $.get(url, function( data,status ){

        toastr.info('已删除');

    });
}

//itemTags.insert = function( itemId, tagId, tagName ){
//
//    toastr.info('添加标签中 ... ');
//
//    //url = baseUrl + 'public/itemTags/addNewTag';
//    url = baseUrl + 'public/itemTags/insert';
//    //url = baseUrl + 'public/tag/query';
//    //url = '../../itemTags/addNewTag';
//    //var tagName = $('#input_new_tag').val();
//    //var encoded_tagName = $('<div/>').text(tagName).html();
//
//    $.post( url ,{
//        itemId : itemId,
//        tagId  : tagId,
//        tagName: tagName
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
//    /**
//     * 添加标签
//     */
//    $("#button_add_tag").click(function () {
//    });
//}


$(document).ready(function () {

    console.log( '2018.02.01 15:17' );


});
// end of ready


