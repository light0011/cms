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
      <li><a href="<?php echo U('Nav/index');?>">导航管理</a></li>
      <li class="active">导航列表</li>
    </ol>
    <form method="post" action="<?php echo U('Nav/sort');?>">
        <a href="<?php echo U('Nav/addNav');?>" class="btn btn-success">增加导航</a>
        <button type="submit" class="btn btn-primary">批量排序</button>
        <table class="table table-bordered table-hover">
            <thead>
                <tr><th>导航id</th><th>导航名称</th><th>导航简介</th><th>子导航管理</th><th>排序</th><th>操作</th></tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$value): ?><tr><td><?php echo ($value["id"]); ?></td><td><?php echo ($value["name"]); ?></td><td><?php echo ($value["info"]); ?></td><td><a href="<?php echo U('Nav/addChildNav',array('id'=>$value['id']));?>" class="btn btn-primary">增加子导航</a><a href="<?php echo U('Nav/showChildNav',array('id'=>$value['id']));?>" class="btn btn-primary">查看子导航</a></td><td><input type="text" name="sort[<?php echo ($value["id"]); ?>]" value="<?php echo ($value["sort"]); ?>"></td><td><a href="<?php echo U('Nav/update',array('id'=>$value['id']));?>" class="btn btn-primary">修改</a><a href="<?php echo U('Nav/delete',array('id'=>$value['id']));?>" class="btn btn-primary">删除</a></td></tr><?php endforeach; endif; ?>
            </tbody>   
        </table>  
    </form>
    <div class="page">
            <?php echo ($page); ?>
    </div>
    
    


        
<script type="text/javascript" src="/CMS2.0/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/CMS2.0/Public/bootstrap/js/bootstrap.js"></script>

    

</body>
</html>