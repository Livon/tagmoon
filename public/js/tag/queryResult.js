/**
 * Created by Livon on 2018/1/25.
 */

namespace.reg('tag.query');

/**
 * 添加标签按钮
 * 标签.搜索条件.标签容器.
 * @param tagContainerId
 * @param tagId
 */
tag.query.queryResult.rewrite1 = function( ){

    console.log( '2018.02.01 12:43' );
    console.log( containerId );

    var container = $('#div_tag_queryResult' );

    container.empty();

    url = '../tag/recentlyUsed/getList';

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
                    + '<i class="close fa fa-times"></i>'
                    + '</button>';

                container.prepend( tag_button_string );
            });

            // 近期使用标签点击事件
            container.find('button').click( function(){

                console.log('2018.02.01 13:08');

                var tagButton = $(this);

                var btn_str = '<button tagId="' + tagButton.attr('tagId') + '" '
                        //+ ' data-toggle="modal" data-target="#exampleModal" '
                    + 'class="chip teal lighten-2 white-text">'
                    + tagButton.text()
                    + '<i class="close fa fa-times"></i>'
                    + '</button>';

                searchCondition_container = $( "#div_tag_queryCondition" );
                searchCondition_container.prepend( btn_str );

                //$(this).remove();

                itemSearch();

                //$(this).appendTo($("#div_searchCondition_tags"));
                //$(this).append($("#div_searchCondition_tags").clone());

                //$(this).attr('data-toggle','modal');
                //$(this).attr('data-target','#exampleModal');
                //+ 'data-toggle="modal" data-target="#exampleModal"'

                // 做为搜索条件的标签点击事件
                searchCondition_container.find('button').click( function(){
                    $(this).fadeOut(500);
                    var btn = $(this);
                    setTimeout( function(){
                        btn.remove()
                        console.log( btn );
                        itemSearch();
                    }, 501);
                });

                tag.recentlyUsed.logging( tagButton.text() );

            });

        }
    });

}


$(document).ready(function () {


});
// end of ready


