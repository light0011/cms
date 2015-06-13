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
      <li><a href="<?php echo U('Comment/index');?>">评论管理</a></li>
    </ol>
    <form method="post" action="<?php echo U('Comment/sort');?>">
        <table class="table table-bordered table-hover">
            <thead>
                <tr><th>评论id</th><th>文章名称</th><th>评论者</th><th>日期</th><th>状态</th><th>操作</th></tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$value): ?><tr><td><?php echo ($value["id"]); ?></td><td><?php echo ($value["sub_name"]); ?></td><td><?php echo ($value["user"]); ?></td><td><?php echo ($value["create"]); ?></td>

                    <td>
                        <?php if($value['state'] == 0 ): ?><span style="color: red;"></span>尚未审核
                          <?php else: ?> 
                                 <span style="color:green;">审核通过</span><?php endif; ?>
                    </td>
                    

                <td><?php echo ($value["create"]); ?></td>


                <td><a href="<?php echo U('Comment/update',array('id'=>$value['id']));?>" class="btn btn-primary">修改</a><a href="<?php echo U('Comment/delete',array('id'=>$value['id']));?>" class="btn btn-primary">删除</a></td></tr><?php endforeach; endif; ?>
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