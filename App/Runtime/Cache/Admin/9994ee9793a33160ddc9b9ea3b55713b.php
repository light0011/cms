<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Admin/css/manager.css">

    <title>Document</title>
</head>
<body>
    
    <ol class="breadcrumb">
      <li><a href="<?php echo U('Manager/index');?>">管理员管理</a></li>
      <li class="active">管理员列表</li>
    </ol>
    <a href="<?php echo U('Manager/add');?>" class="btn btn-success">增加管理员</a>
    <table class="table table-bordered table-hover">
        <thead>
            <tr><th>管理员id</th><th>管理员账号</th><th>上次登录时间</th><th>上次登录ip</th><th>身份</th><th>操作</th></tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): foreach($list as $key=>$value): ?><tr><td><?php echo ($value["id"]); ?></td><td><?php echo ($value["manager"]); ?></td><td><?php echo ($value["last_login"]); ?></td><td><?php echo ($value["last_ip"]); ?></td><td><?php echo ($value["title"]); ?></td><td>
            <a href="<?php echo U('Manager/delete',array('id'=>$value['id']));?>">删除</a>   </td></tr><?php endforeach; endif; ?>
            
        </tbody>
        
    </table>
    <div class="page">
            <?php echo ($page); ?>
    </div>

        
<script type="text/javascript" src="/CMS2.0/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/CMS2.0/Public/bootstrap/js/bootstrap.js"></script>

    

</body>
</html>