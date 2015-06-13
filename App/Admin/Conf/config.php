<?php
return array(
    //'配置项'=>'配置值'
        'TMPL_PARSE_STRING'  =>array(
             '__CSS__' => __ROOT__.'/Public/'.MODULE_NAME.'/css', 
             '__JS__'     =>__ROOT__.'/Public/'.MODULE_NAME.'/js', 
             '__IMG__' =>__ROOT__.'/Public/'.MODULE_NAME.'/img', 
             '__BOOTSTRAP__' =>__ROOT__.'/Public/bootstrap', // 增加新的上传路径替换规则 
             '__UEDITOR__' =>__ROOT__.'/Public/ueditor', // 增加新的上传路径替换规则 
        ),

        //默认错误跳转对应的模板文件
    'TMPL_ACTION_ERROR' => 'Public/jump',
    //默认成功跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'Public/jump',

    //图片上传路径
    'UPLOAD_PATH'=>'./image/',

    'SHOW_PAGE_TRACE' =>false, 


);