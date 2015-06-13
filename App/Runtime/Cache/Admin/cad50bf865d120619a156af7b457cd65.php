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
      <li><a href="<?php echo U('Ad/index');?>">轮播器管理</a></li>
    </ol>
    
        <table class="table table-bordered table-hover">
            <thead>
                <tr><th>轮播器id</th><th>轮播器名称</th><th>轮播器内容</th><th>操作</th></tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$value): ?><tr><td><?php echo ($value["id"]); ?></td><td><?php echo ($value["title"]); ?></td><td><?php echo ($value["content"]); ?></td><td><a href="<?php echo U('Ad/update',array('id'=>$value['id']));?>" class="btn btn-primary">修改</a></td></tr><?php endforeach; endif; ?>
            </tbody>   
        </table>  
 
    
    


        
<script type="text/javascript" src="/CMS2.0/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/CMS2.0/Public/bootstrap/js/bootstrap.js"></script>

    

</body>
</html>