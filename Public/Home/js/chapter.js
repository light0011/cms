$(function(){


    //点击更换验证码
    var comment_src=$('.comment_img').attr('src');
    $('.comment_img').click(function(){
        $('.comment_img').attr('src',comment_src+'?random='+Math.random());
    })

    $('#comment').bootstrapValidator({
            message: '所填写内容无效',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                content: {
                    message: '账号无效',
                    validators: {
                        notEmpty: {
                            message: '内容不得为空'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: '内容6--200位'
                        }
                    }
                }
           },
        }).on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();

            $.ajax({
                url : ThinkPHP['MODULE']+'/Comment/addComment',
                type : 'post',
                data : {
                    cid : $('input[name="chapter_id"]').val(),
                    content : $('textarea').val(),
                    manner : $(' input[name="manner"]:checked').val(),
                },
                beforeSend : function () {
                    $('#login_modal').modal('hide');
                    $('#wait_modal').modal('show');

                },
                success : function (response, status) {
                    $('#wait_modal').modal('hide');
                    if (response>0) {
                        $('#success_modal .alert-success').text('评论发表成功，正在审核中。。。');
                        $('#success_modal ').modal('show');
                        setTimeout(function(){
                            $('#success_modal .alert-success').text('操作成功！');
                            $('#success_modal ').modal('hide');
                            $('#comment')[0].reset();
                            location.reload();
                        },1000);
                    }else{
                        $('#fail_modal').modal('show');
                        setTimeout(function(){
                            $('#fail_modal').modal('hide');
                            $('#login_modal').modal('show');
                        },1000);
                    }
                }
            })

        });

    $('.support').click(function(){
        var _this=this;
        $.ajax({
                url : ThinkPHP['MODULE']+'/Comment/setManner',
                type : 'post',
                data : {
                    id : $(_this).attr('comment'),
                    type : 'support',
                },
                beforeSend : function () {
                    

                    $('#login_modal').modal('hide');
                    $('#wait_modal').modal('show');
                },
                success : function (response, status) {
                    $('#wait_modal').modal('hide');
                    if (response>0) {
                        $('#success_modal .alert-success').text('支持成功！');
                        $('#success_modal ').modal('show');
                        setTimeout(function(){
                            $('#success_modal .alert-success').text('操作成功！');
                            $('#success_modal ').modal('hide');
                            $(_this).find('em').text(Number($(_this).find('em').text())+1);
                            $(_this).attr('disabled','disabled');
                        },1000);
                    }
                }
        })

    })


    $('.oppose').click(function(){
        var _this=this;
        $.ajax({
                url : ThinkPHP['MODULE']+'/Comment/setManner',
                type : 'post',
                data : {
                    id : $(_this).attr('comment'),
                    type : 'oppose',
                },
                beforeSend : function () {
                    $('#login_modal').modal('hide');
                    $('#wait_modal').modal('show');
                },
                success : function (response, status) {
                    $('#wait_modal').modal('hide');
                    if (response>0) {
                        $('#success_modal .alert-success').text('反对成功！');
                        $('#success_modal ').modal('show');
                        setTimeout(function(){
                            $('#success_modal .alert-success').text('操作成功！');
                            $('#success_modal ').modal('hide');
                            $(_this).find('em').text(Number($(_this).find('em').text())+1);
                            $(_this).attr('disabled','disabled');
                        },1000);
                    }
                }
        })

    })

    //用于对评论的支持与反对
    $('.support').removeAttr('disabled');
    $('.oppose').removeAttr('disabled');



    








   
})