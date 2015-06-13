$(function(){
    
    var rand=Math.floor(Math.random()*5+1);
    $('body').css('background','url('+ThinkPHP.IMG+'/login_bg'+rand+'.jpg)').css('background-size','100%');

   $('#login_modal').modal({
        
   });

  


   $('#submit').click(function(){
        $.ajax({
            url : ThinkPHP['MODULE']+'/Login/login',
            type : 'post',
            data : {
                manager : $('input[name="manager"]').val(),
                password : $('input[name="password"]').val()
            },
            beforeSend : function () {
                $('#login_modal').modal('hide');
                $('#wait_modal').modal('show');

            },
            success : function (response, status) {
                $('#wait_modal').modal('hide');
                console.log(response);
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
   })



   


})