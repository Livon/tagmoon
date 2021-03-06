/**
 * Created by Livon on 2018/1/25.
 */

namespace.reg('item.edit');


/**
 * 最近使用的标签，点击事件
 */
item.edit.recentlyUsedTag_btnClick = function(){

    console.log('2018.02.05 10:58');

    //var tagButton = $(this);
    var tagId = $(this).attr('tagId');
    var tagName = $(this).text();

    //itemTags.insert( itemId, tagButton.attr('tagId'), tagButton.text() );
    itemTags.insert( itemId, tagId, tagName );

    doc.tag.load();


};

/**
 * 标签检索结果，点击事件
 */
item.edit.tagQueryResult_btnClick = function(){

    itemTags.insert( itemId, $(this).attr('tagId'), $(this).text() );
    doc.tag.load();

};
// 添加 Tag
item.edit.addTag_btnClick = function(){

    var tagName = $('#input_tag_queryKeyword').val();
    itemTags.insert( itemId, 0, tagName );
    doc.tag.load();
};

/**
 * 保存按钮
 */
item.edit.itemUpdate_btnClick = function(){

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
        var now = new Date();
        $('#span_autoUpdate').text( 'Last updated : ' + now.getHours() + ":" + now.getMinutes() );
        toastr.info( 'Updated just now.' );

    });
};


/**
 * 自动保存
 * -----------------------------------
 * 每间隔一段时间（5秒）检查一次保存标志：ready_for_autoSave , 当其值为 True 时，开始倒计时，倒计时结束时，执行动作。
 */
item.edit.setInterval = function( ){

    console.log( '2018.02.01 13:06' );

    setInterval(function(){

        if( item.edit.ready_for_autoSave ){
            //toastr.info( item.edit.ready_for_autoSave_countDown );
            $('#span_autoUpdate').text( 'Ready for update : ' + item.edit.ready_for_autoSave_countDown );
            if ( --item.edit.ready_for_autoSave_countDown < 0) {
                item.edit.itemUpdate_btnClick();
                item.edit.ready_for_autoSave = false ;
                item.edit.ready_for_autoSave_countDown = 5
            }
        }
    }, 1000 );


};

var SMDE;
item.edit.ready_for_autoSave = false ;
item.edit.ready_for_autoSave_countDown = 5;



$(document).ready(function () {


    item.edit.setInterval();

    toastr.options.positionClass = 'toast-bottom-right';

    console.log(itemId);

    // item_name should change to content
    var item_name_decoded = htmlDecode( decodeURIComponent( itemName ) );

    //$('#textarea_itemContent').val( item_name_decoded );


    // init
    SMDE = new SimpleMDE({
        element: document.getElementById("textarea_itemContent"),
        spellChecker: false,
        autosave: {
            enabled: true,
            unique_id: "textarea_itemContent",
        },
        renderingConfig: {
            singleLineBreaks: false,
            codeSyntaxHighlighting: true,
        },
    });

    // 赋值
    SMDE.value( item_name_decoded );

    // change event
    SMDE.codemirror.on("change", function(){
        item.edit.ready_for_autoSave = true ;
        item.edit.ready_for_autoSave_countDown = 5
    });

    //showTags(itemId);
    doc.tag.load();


    //item.edit.recentlyUsed_tagButton_click();
    $('#div_tag_recentlyUsed').on('click','button', item.edit.recentlyUsedTag_btnClick );
    $("#div_tag_queryResult").on('click','button', item.edit.tagQueryResult_btnClick );

    //$("button").on("click",function(){
    //    $("p").slideToggle();
    //});

    //$("tbody").on('click',"[name='submitbutton']",function(){....});
    //$("body").on('click',"[tagId]",function(){
    //$("body").on('click', function(){
    //    console.log( '2018.02.05 10：51');
    //});

    /**
     * 保存内容
     */
    $("#btnItemUpdate").click( item.edit.itemUpdate_btnClick );


    /**
     * 新增
     */
    $('#button_add_tag').click( item.edit.addTag_btnClick );
    //$("#button_add_tag").click(function () {
    //
    //    console.log('2018.02.04 17:47')
    //
    //    toastr.info('添加标签中 ... ');
    //
    //    url = '../../itemTags/insert';
    //    var tagName = $('#input_tag_queryKeyword').val();
    //    var encoded_tagName = $('<div/>').text(tagName).html();
    //
    //    $.post( url ,{
    //        itemId : itemId,
    //        tagId : 0,
    //        tagName: encoded_tagName
    //    },function( responseResult ){
    //        console.log( responseResult );
    //        var html = responseResult.insertedId ;
    //        //$("#div_post_response").prepend( '<p><pre>' + html + '</pre></p>' );
    //        if( responseResult.insertedId > 0 ){
    //            toastr.info('添加成功！id = ' + responseResult.insertedId );
    //            //showTags(itemId);
    //            doc.tag.load();
    //        }else {
    //            toastr.info('添加失败！exceptionMessage = ' + responseResult.exceptionMessage );
    //        }
    //    });
    //});

    /**
     * 添加标签
     */
    $("#button_add_tag1").click(function () {

        toastr.info('添加标签中 ... ');

        url = '../../itemTags/addNewTag';
        var tagName = $('#input_new_tag1').val();
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
                //showTags(itemId);
                var itemTagsContainer = $('#div_ItemTags');
                doc.tag.load();
                itemTagsContainer.find('button').unbind('click').click(function (btn) {
                    console.log( '2019.03.24 14:09' );
                    console.log( btn )
                })
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

    var input_tag_old_value = '';
    $('#input_new_tag').keyup(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        var newValue = $.trim( $(this).val() );
        console.log( '现在的值：');
        console.log( newValue );

        if( newValue != input_tag_old_value ){
            toastr.info('值有变化了');
            if( newValue.length > 0){
                gen_add_tag_button( newValue );
            }
        }

        input_tag_old_value = newValue ;
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
        tag_remove( itemId, $(this).attr('tagId'));
        toastr.info( $(this).attr('tagId'));
    });


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
        doc.tag.load();
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
};


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

var doc = {
    doc_id : itemId,
    tag : {
        description: 'doc 相当于 item',
        getTagsUrl: '../../itemTags/getTagsByItemId/' + itemId ,
        removeTagUrl : '../../itemTags',
        container: $('#docTagContainer')
    }
};

/**
 * 显示标签
 */
doc.tag.doLoad = function(){
    console.log('2018.02.04 17:22');
    doc.tag.container.hide(500);

    $.get( doc.tag.getTagsUrl, function(data,status){
        doc.tag.container.empty();
        $.each( data.tags, function(index,element){
            doc.tag.container.prepend(
                '<button tagId="' + element.tagId + '" '
                + 'data-toggle="modal" data-target="#exampleModal"'
                + 'class="chip teal lighten-2 white-text">'
                + element.tagName
                + '<i class="close fa fa-times"></i>'
                + '</button>'
            );
        });
        //div_tags_edit.toggle(500);
        doc.tag.container.show(500);

        $("[data-toggle='popover']").popover();

        doc.tag.container.find( 'button').click( doc.tag.click );

        toastr.info('标签已加载');

    });
};
doc.tag.load = function () {

    setTimeout( doc.tag.doLoad, 1000 );
};

doc.tag.click = function () {
    console.log( $(this) );
    $.ajax({
        url    : doc.tag.removeTagUrl,
        method : 'POST',
        data   : {
            '_method' : 'DELETE',
            'doc_id' : doc.doc_id,
            tag_id : $(this).attr('tagid')
        },
        success: function(resp) {
            if ( resp.success ) {
                toastr.info('删除成功');
                doc.tag.load();
            } else {
                toastr.info("删除失败: " + resp.errMsg );
            }
        }
    });

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
};
