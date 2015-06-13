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
      <li><a href="<?php echo U('Vote/index');?>">投票项目管理</a></li>
      <li class="active">投票项目列表</li>
    </ol>
    <form method="post" action="<?php echo U('Vote/sort');?>">
        <a href="<?php echo U('Vote/addVote');?>" class="btn btn-success">增加投票项目</a>
        
        <table class="table table-bordered table-hover">
            <thead>
                <tr><th>投票项目id</th><th>投票项目名称</th><th>投票项目简介</th><th>投票选择管理</th><th>排序</th><th>操作</th></tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$value): ?><tr><td><?php echo ($value["id"]); ?></td><td><?php echo ($value["title"]); ?></td><td><?php echo ($value["info"]); ?></td><td><a href="<?php echo U('Vote/addChildVote',array('id'=>$value['id']));?>" class="btn btn-primary">增加投票选择项目</a><a href="<?php echo U('Vote/showChildVote',array('id'=>$value['id']));?>" class="btn btn-primary">查看投票选择项目</a></td><td>
                    <?php if($value['state'] == 1): ?><span style="color: green;">首页已显示</span>
                    <?php else: ?>
                            <a href="<?php echo U('Vote/first',array('id'=>$value['id']));?>" style="color: red;">首页显示</a><?php endif; ?>
                </td><td><a href="<?php echo U('Vote/update',array('id'=>$value['id']));?>" class="btn btn-primary">修改</a><a href="<?php echo U('Vote/delete',array('id'=>$value['id']));?>" class="btn btn-primary">删除</a></td></tr><?php endforeach; endif; ?>
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