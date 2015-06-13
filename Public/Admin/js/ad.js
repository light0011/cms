$(function(){

    $('#file').uploadify({
        swf : ThinkPHP['UPLOADIFY'] + '/uploadify/uploadify.swf',
        uploader : ThinkPHP['UPLOADURL'],
        width : 120,
        height : 35,
        fileTypeDesc : '图片类型',
        fileTypeExts : '*.jpeg; *.jpg; *.png; *.gif',
        buttonText : '上传图片',
        onUploadSuccess : function (file, data, response) {
            $('input[name="url"]').val(data);
            $('#img').attr('src',ThinkPHP['ROOT']+data).css('display','block');
        },
    });




})