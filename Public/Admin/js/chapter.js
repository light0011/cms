$(function(){
        //   $('#form').bootstrapValidator({
        //     message: '所填写内容无效',
        //     feedbackIcons: {
        //         valid: 'glyphicon glyphicon-ok',
        //         invalid: 'glyphicon glyphicon-remove',
        //         validating: 'glyphicon glyphicon-refresh'
        //     },
        //     fields: {
        //         name: {
        //             message: 'The username is not valid',
        //             validators: {
        //                 notEmpty: {
        //                     message: 'The username is required and can\'t be empty'
        //                 },
        //                 stringLength: {
        //                     min: 6,
        //                     max: 30,
        //                     message: 'The username must be more than 6 and less than 30 characters long'
        //                 },
        //                 remote: {
        //                     url: "{:U('Chapter/addChapterAfter')}",
        //                     message: 'The username is not available'
        //                 },
        //                 regexp: {
        //                     regexp: /^[a-zA-Z0-9_\.]+$/,
        //                     message: 'The username can only consist of alphabetical, number, dot and underscore'
        //                 }
        //             }
        //         },
        //         email: {
        //             validators: {
        //                 notEmpty: {
        //                     message: 'The email address is required and can\'t be empty'
        //                 },
        //                 emailAddress: {
        //                     message: 'The input is not a valid email address'
        //                 }
        //             }
        //         },
        //         password: {
        //             validators: {
        //                 notEmpty: {
        //                     message: 'The password is required and can\'t be empty'
        //                 }
        //             }
        //         }
        //     }
        // })
    
    //上传缩略图
    $('#file').uploadify({
        swf : ThinkPHP['UPLOADIFY'] + '/uploadify/uploadify.swf',
        uploader : ThinkPHP['UPLOADURL'],
        width : 120,
        height : 35,
        fileTypeDesc : '图片类型',
        fileTypeExts : '*.jpeg; *.jpg; *.png; *.gif',
        buttonText : '上传图片',
        onUploadSuccess : function (file, data, response) {
            $('input[name="thumb"]').val(data);
            $('#img').attr('src',ThinkPHP['ROOT']+data).css('display','block');
        },
    });


    //设置默认属性
    var attr=$('#attr').text().split('|');
    $.each(attr,function(i){
        $('input[type="checkbox"]').each(function(){
            if ($(this).val()==attr[i]) {
                $(this).attr('checked',true);
            };
        })
    })

    //设置默认是否评论
    var commend=$('#commend').text();
   
    $('input[name="commend"]').each(function(){
        if ($(this).val()==commend) {
            $(this).attr('checked',true);
        };
    });


    //设置阅读权限，select的用法明显不同
    var select=Number($('#limited').text());
    $('#limit').val(select);

    //设置颜色默认
    var color=Number($('#colored').text());
    $('#color').val(color);



})