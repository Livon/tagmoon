/**
 * Created by Livon on 2018/1/25.
 */

namespace.reg('tag');
namespace.reg('tag.query');


/**
 * 搜索标签
 * @param searchContent
 */
tag.query = function( ){

    console.log('tagSearch function is starting ...');

    //url = baseUrl + '../tag/query';

    url = baseUrl + 'public/tag/query';

    var queryResultContainer = $("#div_tag_queryResult");

    queryResultContainer.empty();

    $.post( url ,{
        arr_keyValues : $('#input_tag_queryKeyword').val().split(' ')
    },function( response ){

        var data = response.items.data;

        if( data ){

            // 备选标签
            $( data ).each( function( index, element ){

                var tag_button_string = '<button tagId="' + element.id + '" '
                    + 'class="chip teal lighten-2 white-text">'
                    + element.tagName
                    + '<i class="fa fa-plus ml-2"></i>'
                    + '</button>';

                queryResultContainer.prepend( tag_button_string );
            });

            // 备选标签点击事件
            queryResultContainer.find( 'button1').click( function(){

            });

            toastr.info( '标签搜索列表已更新(0525)（ tags: ' + data.length + ')' );


        }
    });
}

/**
 * 监听器
 * @param search_content
 */
tag.ready_for_tag_search = false;
tag.ready_for_tag_search_lasted_second = 3 ;

tag.query.addListener = function( tagId ){

    console.log( '2018.02.01 15:42' );

    var input_tag_search_old_value = '';
    $('#input_tag_queryKeyword').keyup(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        var newValue = $.trim( $(this).val() );
        console.log( '现在的值：');
        console.log( newValue );

        if( newValue != input_tag_search_old_value ){
            toastr.info('值有变化了');
            tag.ready_for_tag_search = true;
            tag.ready_for_tag_search_lasted_second = 3;
            //if( newValue.length > 0){
            //gen_add_tag_button( newValue );
            //}
        }

        input_tag_search_old_value = newValue ;
    });

    // 关键字输入框，双击清空
    $('#input_tag_queryKeyword').dblclick( function(){
        //item.query();
        //$(this).empty();
        $(this).val('');
    })


}

tag.query.setInterval = function( ){

    console.log( '2018.02.01 13:06' );

    setInterval(function(){

        if( tag.ready_for_tag_search ){
            toastr.info( tag.ready_for_tag_search_lasted_second );
            if ( --tag.ready_for_tag_search_lasted_second < 0) {
                //item.query();
                tag.query();
                toastr.info('Tag search is starting ...');
                tag.ready_for_tag_search = false;
                tag.ready_for_tag_search_lasted_second = 3;
            }
        }
    }, 200);


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

$(document).ready(function () {

    tag.query.addListener();
    tag.query.setInterval();

});
// end of ready


