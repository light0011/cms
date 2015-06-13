<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Admin/css/chapter.css">
    <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Admin/js/uploadify/uploadify.css">

    <title>Document</title>
</head>
<body>
    
    <ol class="breadcrumb">
      <li><a href="<?php echo U('Chapter/index');?>">文档管理</a></li>
      <li class="active">修改文档</li>

    </ol>
    <form method="post" action="<?php echo U('Chapter/updateChapterAfter');?>" id="form">
      <input type="hidden" name="id" value="<?php echo ($oneChapter["id"]); ?>">
      <div class="form-group">
        <label for="name">文档标题</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="请输入标题"  value="<?php echo ($oneChapter["name"]); ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">栏目</label>
        <select class="form-control"  name="nav">
          <option value="0">请选择一个栏目</option>
          <?php if(is_array($nav)): foreach($nav as $key=>$value): ?><optgroup label="<?php echo ($value["name"]); ?>">
              <?php if(is_array($value["child"])): foreach($value["child"] as $key=>$va): if(($va["id"]) == $oneChapter["nav"]): ?><option value="<?php echo ($va["id"]); ?>" selected ><?php echo ($va["name"]); ?></option>  
                <?php else: ?>  
                  <option value="<?php echo ($va["id"]); ?>"><?php echo ($va["name"]); ?></option><?php endif; endforeach; endif; ?>
          </optgroup><?php endforeach; endif; ?>
        </select>
      </div>
      <div class="form-group">
        <label  style="margin-right: 20px;">定义属性：</label>
        <div id="attr" style="display:none;"><?php echo ($oneChapter["attr"]); ?></div>
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox1" name="attr[]" value="头条"> 头条
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox2" name="attr[]" value="推荐"> 推荐
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="inlineCheckbox3" name="attr[]" value="加粗"> 加粗
        </label>
      </div>
      <div class="form-group">
        <label for="tag">TAG标签：</label>
        <input type="text" name="tag" class="form-control" id="tag" placeholder="请用|号分开" value="<?php echo ($oneChapter["tag"]); ?>" >
      </div>
      <div class="form-group">
        <label for="keyword">关键字：</label>
        <input type="text" name="keyword" class="form-control" id="keyword" placeholder="请用|号分开"  value="<?php echo ($oneChapter["keyword"]); ?>">
      </div>
      <div class="form-group">
        <label for="file">上传缩略图<span>(缩略图格式为jpg,png,jpeg)</span></label>
        <input type="file" id="file" name="file">

        <?php if($oneChapter["thumb"] != '' ): ?><img src="/CMS2.0/<?php echo ($oneChapter["thumb"]); ?>" alt=""  id="img">
            <input type="hidden" value="$oneChapter.thumb" name="thumb">
          <?php else: ?> 
            <img src="" alt="" style="display:none;" id="img">
            <input type="hidden" value="" name="thumb"><?php endif; ?>
      </div>
      <div class="form-group">
        <label for="source">文章来源：</label>
        <input type="text" name="source" class="form-control" id="source" placeholder="请输入文章来源"  value="<?php echo ($oneChapter["source"]); ?>">
      </div>
      <div class="form-group">
        <label for="author">作者：</label>
        <input type="text" name="author" class="form-control" id="author" placeholder="多个作者用|隔开" value="<?php echo ($oneChapter["author"]); ?>" >
      </div>
      <div class="form-group">
        <label for="info">内容摘要：</label>
        <textarea class="form-control" rows="3" name="info" id="info">
          <?php echo ($oneChapter["info"]); ?>
        </textarea>
      </div>
      <div class="form-group">
        <label for="editor">文档内容：</label>
        <script id="editor" type="text/plain" style="width:100%;height:500px;" name="content">
        <?php echo ($oneChapter["content"]); ?>
        </script>
      </div>
      <div class="form-group">
        <div id="commend" style="display:none;"><?php echo ($oneChapter["commend"]); ?></div>
        <label for="info">评论选项：</label>
        <label class="radio-inline">
          <input type="radio" name="commend" id="inlineRadio1" value="1" > 允许评论
        </label>
        <label class="radio-inline">
          <input type="radio" name="commend" id="inlineRadio2" value="0"> 禁止评论
        </label>
      </div>
      <div class="form-group">
        <label for="read_count">浏览次数：</label>
        <input type="text" name="read_count" class="form-control" id="read_count" placeholder="可以设定浏览次数" value="<?php echo ($oneChapter["read_count"]); ?>">
      </div>
      <div class="form-group">
        <label for="sort">文章排序：</label>
        <input type="text" name="sort" class="form-control" id="sort" placeholder="请输入数字，数字越大越靠前" value="<?php echo ($oneChapter["sort"]); ?>">
      </div>
      <div class="form-group">
        <label for="gold">消费金币：</label>
        <input type="text" name="gold" class="form-control" id="gold"  placeholder="请输入数字" value="<?php echo ($oneChapter["gold"]); ?>">
      </div>


      <div class="form-group">
        <div id="limited">
            <?php echo ($oneChapter["limit"]); ?>
        </div>
        <label for="limited">阅读权限：</label>
        <select class="form-control" name="limit" id="limit">
            <option value="0">开放浏览</option>
            <option value="1">初级会员</option>
            <option value="2">中级会员</option>
            <option value="3">高级会员</option>
            <option value="4">VIP会员</option>
        </select>
      </div>

      <div class="form-group">
        <div id="colored">
            <?php echo ($oneChapter["color"]); ?>
        </div>
        <label for="color">标题颜色：</label>
        <select class="form-control" name="color" id="color">
            <option value="">默认颜色</option>
            <option value="red" style="color:red;">红色</option>
            <option value="blue" style="color:blue;">蓝色</option>
            <option value="orange" style="color:orange;">橙色</option>
        </select>
      </div>

      <button type="submit" class="btn btn-default">修改文档</button>
    </form>
    

        
<script type="text/javascript" src="/CMS2.0/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/CMS2.0/Public/bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript" src="/CMS2.0/Public/bootstrap/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="/CMS2.0/Public/Admin/js/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript" src="/CMS2.0/Public/Admin/js/chapter.js"></script>
    <script type="text/javascript" charset="utf-8" src="/CMS2.0/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/CMS2.0/Public/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/CMS2.0/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
    <script>
      var ue = UE.getEditor('editor');
    </script>

    <script type="text/javascript">
        var ThinkPHP={
          'UPLOADIFY' : "/CMS2.0/Public/Admin/js",
          'ROOT' : "/CMS2.0",
          'UPLOADURL' : '<?php echo U("Chapter/upload");?>',
        }
    </script>

</body>
</html>