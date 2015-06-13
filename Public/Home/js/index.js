$(function(){

    $('#file').uploadify({
        swf : ThinkPHP['UPLOADIFY'] + '/uploadify/uploadify.swf',
        uploader : ThinkPHP['UPLOADURL'],
        width : 120,
        height : 35,
        fileTypeDesc : '图片类型',
        fileTypeExts : '*.jpeg; *.jpg; *.png; *.gif',
        buttonText : '上传头像',
        onUploadSuccess : function (file, data, response) {
            console.log(data);
            $('input[name="face"]').val(data);

            $('#img').attr('src',ThinkPHP['ROOT']+data).css('display','block');
        },
    });

      $('#register').bootstrapValidator({
            message: '所填写内容无效',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    message: '账号无效',
                    validators: {
                        notEmpty: {
                            message: '账号不得为空'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: '账号长度6--30位'
                        },
                        remote: {
                            url: ThinkPHP['CHECKUSER'],
                            message: '用户名重复'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: '密码不得为空',
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: '密码长度6--30位'
                        },
                        different: {
                            field: 'username',
                            message: '不得与账号一致',
                        }
                    }
                },
                repassword: {
                    validators: {
                        notEmpty: {
                            message: '密码确认不得为空',
                        },
                        identical: {
                            field: 'password',
                            message: '与密码不一致',
                        }
                    },
                },
               verify: {
                    validators: {
                        notEmpty: {
                            message: '验证码不得为空',
                        },
                        remote: {
                            url: ThinkPHP['CHECKVERIFY2'],
                            message: '验证码错误'
                        }
                        
                    },
               },
           },
        }).on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();

            $.ajax({
                url : ThinkPHP['MODULE']+'/User/register',
                type : 'post',
                data : {
                    username : $('#register input[name="username"]').val(),
                    password : $('#register input[name="password"]').val(),
                    repassword : $('#register input[name="repassword"]').val(),
                    face : $('#register input[name="face"]').val(),
                },
                beforeSend : function () {
                    $('#login_modal').modal('hide');
                    $('#wait_modal').modal('show');

                },
                success : function (response, status) {
                    $('#wait_modal').modal('hide');
                    if (response>0) {
                        $('#success_modal').modal('show');
                        setTimeout(function(){
                            location.href=ThinkPHP['MODULE']+'/Index/index';
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
        
    //点击更换验证码
 
    var register_src=$('.register_img').attr('src');
    var login_src=$('.login_img').attr('src');
    $('.register_img').click(function(){
        $('.register_img').attr('src',register_src+'?random='+Math.random());
    })
    $('.login_img').click(function(){
        $('.login_img').attr('src',login_src+'?random='+Math.random());
    })
    
    
   
    $('#login').bootstrapValidator({
            message: '所填写内容无效',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    message: '账号无效',
                    validators: {
                        notEmpty: {
                            message: '账号不得为空'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: '账号长度6--30位'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: '密码不得为空',
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: '密码长度6--30位'
                        }
                    }
                },
               verify: {
                    validators: {
                        notEmpty: {
                            message: '验证码不得为空',
                        },
                        remote: {
                            url: ThinkPHP['CHECKVERIFY1'],
                            message: '验证码错误'
                        }
                        
                    },
               },
           },
        }).on('success.form.bv', function(e) {
            // Prevent form submission
            e.preventDefault();

            $.ajax({
                url : ThinkPHP['MODULE']+'/User/login',
                type : 'post',
                data : {
                    username : $('#login input[name="username"]').val(),
                    password : $('#login input[name="password"]').val(),
                    auto : $('#login input[name="auto"]').val(),
                },
                beforeSend : function () {
                    $('#login_modal').modal('hide');
                    $('#wait_modal').modal('show');

                },
                success : function (response, status) {
                    $('#wait_modal').modal('hide');
                    if (response>0) {
                        $('#success_modal').modal('show');
                        setTimeout(function(){
                            location.href=ThinkPHP['MODULE']+'/Index/index';
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


    $('#vote_submit').click(function(){
        if ($('input[name="vote"]:checked').val()==undefined) {
            alert('请选择一个选项进行投票');
        }else{
            $.ajax({
                url : ThinkPHP['MODULE']+'/Vote/vote',
                type : 'post',
                data : {
                    id : $('input[name="vote"]:checked').val(),
                },
                beforeSend : function () {
                    $('#login_modal').modal('hide');
                    $('#wait_modal').modal('show');
                },
                success : function (response, status) {
                    $('#wait_modal').modal('hide');
                    $('#vote_submit').attr('disabled','disabled');
                    if (response>0) {
                        $('#success_modal').modal('show');
                        setTimeout(function(){
                            $('#success_modal').modal('hide');
                        })
                    }else{
                        $('#fail_modal .alert-danger').text('您已经投过票！');
                        $('#fail_modal').modal('show');
                        setTimeout(function(){
                            $('#fail_modal').modal('hide');
                        },1000);
                        setTimeout(function(){
                            $('#fail_modal .alert-danger').text('操作失败');
                        },2000);
                    }
                }
            })

        }
        
    })

    //轮播器第一个加上active
    $('.ad').eq(0).addClass('active');
    


})