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
      <li><a href="<?php echo U('Manager/index');?>">管理员管理</a></li>
      <li class="active">增加管理员</li>
    </ol>
    <form method="post" action="<?php echo U('Manager/addAfter');?>">
      <div class="form-group">
        <label for="exampleInputEmail1">管理员名称</label>
        <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="请输入名称，比如超级管理员">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">管理员账号</label>
        <input type="text" name="manager" class="form-control" id="exampleInputEmail1" placeholder="请输入账号">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">管理员密码</label>
        <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="请输入名称">
      </div>
      <div class="form-group">
          <?php if(is_array($rules)): foreach($rules as $key=>$value): ?><label class="checkbox-inline" style="margin:30px;">
                <input type="checkbox" id="inlineCheckbox1" value="<?php echo ($value["id"]); ?>" name="rules[]"> <?php echo ($value["title"]); ?>
              </label><?php endforeach; endif; ?>
      </div>
      <button type="submit" class="btn btn-default">增加管理员</button>
    </form>

        
<script type="text/javascript" src="/CMS2.0/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/CMS2.0/Public/bootstrap/js/bootstrap.js"></script>

    

</body>
</html>