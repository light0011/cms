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
      <li><a href="<?php echo U('Comment/index');?>">评论管理</a></li>
      <li class="active">修改评论</li>
    </ol>
    <form method="post" action="<?php echo U('Comment/updateAfter');?>">
        <input type="hidden" name="id" value="<?php echo ($oneComment["id"]); ?>">
        <div class="form-group">
          <label for="exampleInputEmail1">文章名称</label>
          <div class="alert alert-warning" role="alert"><?php echo ($oneComment["name"]); ?></div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">评论者</label>
          <div class="alert alert-warning" role="alert"><?php echo ($oneComment["user"]); ?></div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">评论内容</label>
          <div class="alert alert-warning" role="alert"><?php echo ($oneComment["content"]); ?></div>
        </div>
        <div class="radio">


          <?php if($oneComment['state'] == 0 ): ?><label>
                      <input type="checkbox" name="state" id="optionsRadios2" value="1" >
                      审核通过
                    </label>
              <?php else: ?> 
                    <label>
                      <input type="checkbox" name="state" id="optionsRadios2" value="0">
                      审核不通过
                    </label><?php endif; ?>
          

          


        </div>
      <button type="submit" class="btn btn-default">修改评论</button>
    </form>

        
<script type="text/javascript" src="/CMS2.0/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/CMS2.0/Public/bootstrap/js/bootstrap.js"></script>

    

</body>
</html>