<?php
return array(
	//'配置项'=>'配置值'
        'TMPL_PARSE_STRING'  =>array(
             '__CSS__' => __ROOT__.'/Public/'.MODULE_NAME.'/css', // 更改默认的/Public 替换规则
             '__JS__'     =>__ROOT__.'/Public/'.MODULE_NAME.'/js', // 增加新的JS类库路径替换规则
             '__IMG__' =>__ROOT__.'/Public/'.MODULE_NAME.'/img', // 增加新的上传路径替换规则
             '__BOOTSTRAP__' =>__ROOT__.'/Public/bootstrap', // 增加新的上传路径替换规则
        ),

        //图片上传路径
        'UPLOAD_PATH'=>'./image/',

        //默认错误跳转对应的模板文件
        'TMPL_ACTION_ERROR' => 'Public/jump',
        //默认成功跳转对应的模板文件
        'TMPL_ACTION_SUCCESS' => 'Public/jump',


);