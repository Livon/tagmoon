/**
 * Created by Livon on 2018/2/1.
 */

//http://www.qttc.net/201307346.html

//可以这样注册命名空间
//
//// 先注册命名空间
//namespace.reg('config.admin.module.color');
//
//// 添加功能
//config.admin.module.color.changeBgColor = function(color){
//    document.body.style.background = color;
//};
//
//// 调用功能
//config.admin.module.color.changeBgColor('#F30');
//
//
//// 删除命名空间
//namespace.del('config.admin.module.color');

// 命名空间注册函数
var namespace = {
    reg : function(s){
        var arr = s.split('.');
        var namespace = window;

        for(var i=0,k=arr.length;i<k;i++){
            if(typeof namespace[arr[i]] == 'undefined'){
                namespace[arr[i]] = {};
            }

            namespace = namespace[arr[i]];
        }
    },
    del : function(s){
        var arr = s.split('.');
        var namespace = window;

        for(var i=0,k=arr.length;i<k;i++){
            if(typeof namespace[arr[i]] == 'undefined'){
                return;
            }else if( k == i+1 ){
                delete  namespace[arr[i]];
                return;
            }else{
                namespace = namespace[arr[i]];
            }
        }
    }
};


namespace.reg('myApp');

/**
 *
 * @param targetId 目标 DIV id
 * @param link 链接数据
 */
myApp.pageLink_show = function( targetId, link ){

    console.log('2018.02.01 12:36');
    console.log( targetId );
    console.log( link );

    target = $("#"+targetId);

    // p = Pagination string
    // t = temp string
    var p = '';
    var t = '';

    p = '<nav class="my-4">';
    p += '<ul class="pagination pagination-circle pg-blue mb-0">';
    //
    //<nav class="my-4">
    //    <ul class="pagination pagination-circle pg-blue mb-0">

    t = '<li name="first" class="page-item {0}">' +
        '<a page-num="{1}" class="page-link" mdbRippleRadius>First</a></li>';

    p += t.format(( link.current_page == 1 )?'disabled':'', ( link.current_page != 1 )?1:0 );

    //p += ('<li name="first" class="page-item {0}">' +
    //    '<a page-num="{1}" class="page-link" mdbRippleRadius>First</a></li>' +
    //    '').format( link.current_page == 1 )?'disabled':'', ( link.current_page != 1 )?1:0 );

    t = '<li class="page-item {0}">' +
        '<a page-num="{1}" class="page-link" mdbRippleRadius aria-label="Previous">' +
        '<span aria-hidden="true">«</span>' +
        '<span class="sr-only">Previous</span>' +
        '</a>' +
        '</li>';

    p += t.format( ( link.current_page < 2 )?'disabled':'', link.current_page - 1 );

        //<!--First-->
        //<li class="page-item disabled"><a class="page-link" mdbRippleRadius>First</a></li>

    //<!--Arrow left-->
    //<li class="page-item disabled">
    //p += '<a class="page-link" mdbRippleRadius aria-label="Previous">';
    //p += '<span aria-hidden="true">«</span>';
    //p += '<span class="sr-only">Previous</span>';
    //p += '</a>';
    //p += '</li>';
        //<a class="page-link" mdbRippleRadius aria-label="Previous">
        //<span aria-hidden="true">«</span>
    //<span class="sr-only">Previous</span>
    //    </a>
    //    </li>

        //<!--Numbers-->

    console.log('link.total:');
    console.log(link.total);
    console.log('link.last_page:');
    console.log( link.last_page );
    for( var i = 1; i <= link.last_page; i++ ){

        var active = ( link.current_page == i )? 'active':'' ;

        t = '<li class="page-item {0}"><a page-num="{1}" class="page-link" mdbRippleRadius>{2}</a></li>';

        p += t.format( active, ( link.current_page == i )? 0 : i, i );
    }



    //<li class="page-item active"><a class="page-link" mdbRippleRadius>1</a></li>
    //<li class="page-item"><a class="page-link" mdbRippleRadius >2</a></li>
    //<li class="page-item"><a class="page-link" mdbRippleRadius >3</a></li>
    //<li class="page-item"><a class="page-link" mdbRippleRadius >4</a></li>
    //<li class="page-item"><a class="page-link" mdbRippleRadius >5</a></li>
    //
    //<!--Arrow right-->
    //<li class="page-item">


    //p += ('<li name="first" class="page-item {0}">' +
    //    '<a page-num="{1}" class="page-link" mdbRippleRadius>First</a></li>' +
    //    '').format( link.current_page == 1 )?'disabled':'', ( link.current_page != 1 )?1:0 );

    t = '<li class="page-item {0}">' +
        '<a page-num="{1}" class="page-link" mdbRippleRadius aria-label="Next">' +
        '<span aria-hidden="true">»</span>' +
        '<span class="sr-only">Next</span>' +
        '</a>' +
        '</li>';

    p += t.format( ( link.current_page >= link.last_page )?'disabled':'', link.current_page + 1 );



    t = '<li class="page-item {0}">' +
        '<a page-num="{1}" class="page-link" mdbRippleRadius>Last</a></li>';

    p += t.format(( link.current_page >= link.last_page )?'disabled':'', ( link.current_page < link.last_page )?link.last_page:0 );




    //p += '<li name="next" class="page-item">';
    ////    <a class="page-link" mdbRippleRadius aria-label="Next">
    ////    <span aria-hidden="true">»</span>
    //if( link.next_page_url != null ){
    //    p += '<a class="page-link" mdbRippleRadius aria-label="Next">';
    //}
    //p += '<span aria-hidden="true">»</span>';
    ////<span class="sr-only">Next</span>
    //p += '<span class="sr-only">Next</span>';
    ////    </a>
    ////    </li>
    //p += '</a>';
    //p += '</li>';
    //
    //    <!--Last-->
    //    <li class="page-item"><a class="page-link">Last</a></li>
    //p += '<li name="last" class="page-item"><a class="page-link">Last</a></li>';
    //
    //    </ul>
    t = '<li><a page-num="0" class="page-link">total : {0}</a></li></ul>';
    p += t.format( link.total );
    //    </nav>
    p += '</nav>';
    //<!--/Pagination -->




    target.empty();

    //target.prepend( 'current_page:{0} from:{1} to:{2} total:{3}'.format(
    //    link.current_page, link.from, link.to, link.total
    //) );

    target.prepend( p );

    target.find('a').click( function(){
        console.log( this );
        console.log( $(this) );
        console.log( $(this).attr('page-num') );
        var pageNum = $(this).attr('page-num');
        if( pageNum > 0 ){
            item.query( $(this).attr('page-num') );
        }

    });

    //target.find('a[name="prev"]').click( function(){
    //
    //    console.log( '2018.02.02 16:08' );
    //
    //    if( $(this).attr('class') == 'page-item disabled' ){
    //        return ;
    //    }
    //
    //    item.query( --link.current_page );
    //});




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


$(document).ready(function () {

    toastr.options.positionClass = 'toast-bottom-right';

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


});
