/**
 * Created by Livon on 2018/1/25.
 */

namespace.reg('itemTags');


/**
 * 监听器
 * @param search_content
 */


// 添加标签
itemTags.insert = function( itemId, tagId, tagName ){

    toastr.info('添加标签中 ... ');


    url = '../../itemTags/insert';
    //var tagName = $('#input_tag_queryKeyword').val();
    var encoded_tagName = $('<div/>').text(tagName).html();

    //url = baseUrl + 'public/itemTags/addNewTag';
    url = baseUrl + 'public/itemTags/insert';
    //url = baseUrl + 'public/tag/query';
    //url = '../../itemTags/addNewTag';
    //var tagName = $('#input_new_tag').val();
    //var encoded_tagName = $('<div/>').text(tagName).html();

    $.post( url ,{
        itemId : itemId,
        tagId  : tagId,
        //tagName: tagName
        tagName: encoded_tagName
    },function( responseResult ){
        console.log( responseResult );
        var html = responseResult.insertedId ;
        //$("#div_post_response").prepend( '<p><pre>' + html + '</pre></p>' );
        if( responseResult.insertedId > 0 ){
            toastr.info('添加成功！id = ' + responseResult.insertedId );
            tag.recentlyUsed.logging( encoded_tagName );
            itemTags.showTags( itemId, $('#div_ItemTags') );
        }else {
            toastr.info('添加失败！exceptionMessage = ' + responseResult.exceptionMessage );
        }
    });


}

itemTags.delete = function( itemId ){

    url = '../item/delete/' + itemId;

    $.get(url, function( data,status ){

        toastr.info('已删除');

    });

}

/**
 * 显示标签
 */
itemTags.showTags = function ( itemId, container ){

    console.log('2018.02.04 17:22');

    //var container = $('#div_ItemTags');

    container.hide(500);

    url = '../../itemTags/getTagsByItemId/' + itemId;

    $.get(url, function(data,status){
        //alert("Data: " + data + "\nStatus: " + status)

        container.empty();

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

            container.prepend( tag_button_string );
            //$(selector).toggle(speed,callback,switch)
        });
        //div_tags_edit.toggle(500);
        container.show(500);

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

        container.find( 'button').click( function(){

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

function itemDelete1( itemId ){

    url = '../item/delete/' + itemId;

    $.get(url, function( data,status ){

        toastr.info('已删除');

    });
}



$(document).ready(function () {

    console.log( '2018.02.01 15:17' );




});
// end of ready


