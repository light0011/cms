<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Admin/css/nav.css">
    <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Admin/js/uploadify/uploadify.css">

    <title>Document</title>
</head>
<body>
    
    <ol class="breadcrumb">
      <li><a href="<?php echo U('Ad/index');?>">轮播器管理</a></li>
      <li class="active">修改轮播器</li>
    </ol>
    <form method="post" action="<?php echo U('Ad/updateAfter');?>">
        <input type="hidden" name="id" value="<?php echo ($oneAd["id"]); ?>">
        <div class="form-group">
          <label for="title">轮播器名称</label>
          <input type="text" name="title" class="form-control" id="title" placeholder="请输入轮播器名称" value="<?php echo ($oneAd["title"]); ?>" >
        </div>
        <div class="form-group">
          <label for="content">轮播器内容</label>
          <input type="text" name="content" class="form-control" id="content" placeholder="请输入轮播器内容" value="<?php echo ($oneAd["content"]); ?>" >
        </div>
        <div class="form-group">
            <label for="file">上传缩略图<span>(缩略图格式为jpg,png,jpeg)</span></label>
            <input type="file" id="file" name="file">
            <?php if($oneAd["url"] != '' ): ?><img src="/CMS2.0/<?php echo ($oneAd["url"]); ?>" alt=""  id="img">
                <input type="hidden" value="$oneAd.url" name="url">
              <?php else: ?> 
                <img src="" alt="" style="display:none;" id="img">
                <input type="hidden" value="" name="url"><?php endif; ?>
      </div>
        
      <button type="submit" class="btn btn-default">修改轮播器</button>
    </form>

        
<script type="text/javascript" src="/CMS2.0/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/CMS2.0/Public/bootstrap/js/bootstrap.js"></script>

  
    <script type="text/javascript" src="/CMS2.0/Public/Admin/js/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript" src="/CMS2.0/Public/Admin/js/ad.js"></script>
  
    

    <script type="text/javascript">
        var ThinkPHP={
          'UPLOADIFY' : "/CMS2.0/Public/Admin/js",
          'ROOT' : "/CMS2.0",
          'UPLOADURL' : '<?php echo U("Ad/upload");?>',
        }
    </script>

</body>
</html>