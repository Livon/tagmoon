/**
 * Created by Livon on 2018/1/25.
 */
$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#button_提交").click(function () {
        url = 'insert';

        console.log( url );
        //console.log( $('#textarea_itemContent').text() );
        console.log( $('#textarea_itemContent').val() );

        var string = $('#textarea_itemContent').val();
        var htmlEncoded = $('<div/>').text(string).html();
        var uriEncoded = encodeURIComponent(htmlEncoded);
        console.log( htmlEncoded );
        console.log( 'htmlDecode(encoded):' );
        console.log( htmlDecode( htmlEncoded ) );
        console.log( encodeURIComponent(htmlEncoded) );
        console.log( 'encodeURIComponent(string):' );
        console.log( encodeURIComponent(string) );
        console.log( decodeURIComponent(uriEncoded) );
        //encoded = encodeURIComponent( string );
        //encoded = htmlDecode( string );
        console.log( htmlEncoded );

        $.post( url ,{
            itemContent: uriEncoded
        },function( responseResult ){
            console.log( responseResult );

            var html = '[' + responseResult.insertedId + '] <br>'
                + decodeURIComponent( responseResult.itemContent )
                + ' - <a href="{0}{1}" target="_blank">edit</a> '.format('edit/',responseResult.insertedId)
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

            toastr.info('添加成功！' );
        });

        //var htmlobj = $.ajax({url: url, async: false});
        //$("#div_itemNew_response").html( htmlobj.responseText );
        //$("#div_itemNew_response").html(url);
    });
});

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

