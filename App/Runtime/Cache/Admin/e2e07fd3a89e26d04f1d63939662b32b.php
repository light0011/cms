<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Admin/css/chapter.css">

    <title>Document</title>
</head>
<body>
    
    <ol class="breadcrumb">
      <li><a href="<?php echo U('Chapter/index');?>">文档管理</a></li>
      <li class="active">文档列表</li>
    </ol>
    <form method="post" action="<?php echo U('Chapter/sort');?>">
        <a href="<?php echo U('Chapter/addChapter');?>" class="btn btn-success">增加文档</a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr><th>文档id</th><th>名称</th><th>类别</th><th>关键字</th><th>日期</th><th>操作</th></tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$value): ?><tr><td><?php echo ($value["id"]); ?></td><td><?php echo ($value["name"]); ?></td><td><?php echo ($value["navname"]); ?></td><td><?php echo ($value["keyword"]); ?></td><td><?php echo ($value["date"]); ?></td><td><a href="<?php echo U('Chapter/update',array('id'=>$value['id']));?>" class="btn btn-primary">修改</a><a href="<?php echo U('Chapter/delete',array('id'=>$value['id']));?>" class="btn btn-primary">删除</a></td></tr><?php endforeach; endif; ?>
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