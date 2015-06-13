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
      <li class="active">修改导航</li>
    </ol>
    <form method="post" action="<?php echo U('Nav/updateAfter');?>">
        <input type="hidden" name="id" value="<?php echo ($oneNav["id"]); ?>">
      <div class="form-group">
        <label for="exampleInputEmail1">导航名称</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="请输入名称" value="<?php echo ($oneNav["name"]); ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">排序(序号越大越靠前)</label>
        <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="请输入名称" value="<?php echo ($oneNav["sort"]); ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">导航简介</label>
        <textarea name="info" class="form-control" rows="3" placeholder="请输入简介"><?php echo ($oneNav["info"]); ?></textarea>
      </div>
      <button type="submit" class="btn btn-default">修改导航</button>
    </form>

        
<script type="text/javascript" src="/CMS2.0/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/CMS2.0/Public/bootstrap/js/bootstrap.js"></script>

    

</body>
</html>