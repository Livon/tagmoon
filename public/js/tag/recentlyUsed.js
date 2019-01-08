/**
 * Created by Livon on 2018/1/25.
 */

namespace.reg('tag.recentlyUsed');
namespace.reg('tag.recentlyUsed.tagContainer');


/**
 * 检索列表
 * @param search_content
 */
tag.recentlyUsed.logging = function( tagName ){

    console.log( '2018.02.01 13:06' );

    console.log( 'tag.recentlyUsed.logging' );

    //url = '../tag/recentlyUsed/logging/' + tagId;

    url = baseUrl + 'public/tag/recentlyUsed/logging/' + tagName;

    $.get(url, function( data,status ){
        toastr.info('记录最近使用标签：' + tagName );
        tag.recentlyUsed.tagContainer.rewrite('div_tag_recentlyUsed');
    });
}

//// 列表
//tag.recentlyUsed.getList = function(){
//
//    url = '../tag/recentlyUsed/getList';
//
//    $.get(url, function( data,status ){
//        console.log( data );
//    });
//
//}



// 标签.近期使用.重写
/**
 * 重写近期标签
 * 接收参数：containerId
 */
tag.recentlyUsed.tagContainer.rewrite = function( containerId ){

    console.log( '2018.02.06 17:31' );

    var container = $('#' + containerId );

    container.empty();

    //url = '../tag/recentlyUsed/getList';
    url = baseUrl + 'public/tag/recentlyUsed/getList';

    $.get(url, function( response,status ){

        console.log( response );

        var data = response.tags.data;

        if( data ){

            console.log('2018.02.01 13:13');
            console.log( data );

            // 近期使用标签
            $( data ).each(function( index,element ){

                var tag_button_string = '<button tagId="' + element.tagId + '" '
                    + 'class="chip teal lighten-2 white-text">'
                    + element.tagName
                    + '<i class="fa fa-plus ml-2"></i>'
                    + '</button>';

                container.append( tag_button_string );
            });

            //// 近期使用标签点击事件
            //container.find('button1').click( function(){
            //
            //
            //    //tag.recentlyUsed.logging( tagButton.attr('tagId') );
            //
            //});

        }
    });



}



//
//// 标签.近期使用.重写
//tag.recentlyUsed.tagContainer.rewrite = function( containerId, searchCondition_containerId ){
//
//    console.log( '2018.02.01 12:43' );
//    console.log( containerId );
//
//    container = $('#'+ containerId );
//
//    container.empty();
//
//    url = '../tag/recentlyUsed/getList';
//
//    $.get(url, function( response,status ){
//
//        console.log( response );
//
//        var data = response.tags.data;
//
//        if( data ){
//
//            console.log('2018.02.01 13:13');
//            console.log( data );
//
//            // 近期使用标签
//            $( data ).each(function( index,element ){
//
//                var tag_button_string = '<button tagId="' + element.tagId + '" '
//                    + 'class="chip teal lighten-2 white-text">'
//                    + element.tagName
//                    + '<i class="close fa fa-times"></i>'
//                    + '</button>';
//
//                container.prepend( tag_button_string );
//            });
//
//            // 近期使用标签点击事件
//            container.find('button').click( function(){
//
//                console.log('2018.02.01 13:07');
//
//                var tagButton = $(this);
//
//                var btn_str = '<button tagId="' + tagButton.attr('tagId') + '" '
//                        //+ ' data-toggle="modal" data-target="#exampleModal" '
//                    + 'class="chip teal lighten-2 white-text">'
//                    + tagButton.text()
//                    + '<i class="close fa fa-times"></i>'
//                    + '</button>';
//
//                searchCondition_container = $("#"+searchCondition_containerId);
//                searchCondition_container.prepend( btn_str );
//
//                //$(this).remove();
//
//                item.query();
//
//                //$(this).appendTo($("#div_searchCondition_tags"));
//                //$(this).append($("#div_searchCondition_tags").clone());
//
//                //$(this).attr('data-toggle','modal');
//                //$(this).attr('data-target','#exampleModal');
//                //+ 'data-toggle="modal" data-target="#exampleModal"'
//
//                // 做为搜索条件的标签点击事件
//                searchCondition_container.find('button').click( function(){
//                    $(this).fadeOut(500);
//                    var btn = $(this);
//                    setTimeout( function(){
//                        btn.remove()
//                        console.log( btn );
//                        item.query();
//                    }, 501);
//                });
//
//                tag.recentlyUsed.logging( tagButton.attr('tagId') );
//
//            });
//
//        }
//    });
//
//
//
//
//
//
//}

$(document).ready(function () {


    tag.recentlyUsed.tagContainer.rewrite('div_tag_recentlyUsed');

});
// end of ready


