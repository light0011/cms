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
      <li><a href="<?php echo U('User/index');?>">会员管理</a></li>
      <li class="active">会员列表</li>
    </ol>
    <form method="post" action="<?php echo U('User/sort');?>">

        <table class="table table-bordered table-hover">
            <thead>
                <tr><th>会员id</th><th>会员名称</th></tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$value): ?><tr><td><?php echo ($value["id"]); ?></td><td><?php echo ($value["username"]); ?></td></tr><?php endforeach; endif; ?>
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