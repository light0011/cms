<?php
return array(
	//'配置项'=>'配置值'
            //设置可访问目录
            'MODULE_ALLOW_LIST'=>array('Home','Admin'),
            //设置默认目录
            'DEFAULT_MODULE'=>'Home',
            //设置模版后缀
            'TMPL_TEMPLATE_SUFFIX'=>'.tpl',
            //设置默认主题目录
            'DEFAULT_THEME'=>'Default',
            //数据库配置
            'DB_TYPE'               =>  'mysql',     // 数据库类型
            'DB_HOST'               =>  SAE_MYSQL_HOST_M, // 服务器地址
            'DB_NAME'               =>  SAE_MYSQL_DB,          // 数据库名 
            'DB_USER'               =>  SAE_MYSQL_USER,      // 用户名 
            'DB_PWD'                =>  SAE_MYSQL_PASS,          // 密码 
            'DB_PORT'               =>  SAE_MYSQL_PORT,        // 端口 
            'DB_PREFIX'             =>  'cms_',    // 数据库表前缀 
            'DB_CHARSET'            =>  'utf8',      // 数据库编码 
            'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志

            'FILE_UPLOAD_TYPE' => 'Sae',


            //URL模式
            'URL_MODEL'=>2,

  

           
    
);