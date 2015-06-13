<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Admin/css/nav.css">

    <title>Document</title>
</head>
<body>
    
    <ol class="breadcrumb">
      <li><a href="<?php echo U('Vote/index');?>">投票管理</a></li>
      <li class="active">投票选择列表</li>
    </ol>
 
    <a href="<?php echo U('Vote/addChildVote',array('id'=>$id));?>" class="btn btn-success">增加该项目投票选择</a>
 
    <table class="table table-bordered table-hover">
        <thead>
            <tr><th>投票选择id</th><th>投票选择名称</th><th>投票选择简介</th><th>操作</th></tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): foreach($list as $key=>$value): ?><tr><td><?php echo ($value["id"]); ?></td><td><?php echo ($value["title"]); ?></td><td><?php echo ($value["info"]); ?></td><td><a href="<?php echo U('Vote/update',array('id'=>$value['id']));?>" class="btn btn-primary">修改</a><a href="<?php echo U('Vote/delete',array('id'=>$value['id']));?>" class="btn btn-primary">删除</a></td></tr><?php endforeach; endif; ?>
        </tbody>    
    </table>


        
<script type="text/javascript" src="/CMS2.0/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/CMS2.0/Public/bootstrap/js/bootstrap.js"></script>

    

</body>
</html>