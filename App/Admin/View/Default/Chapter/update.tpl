<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/chapter.css">
    <link rel="stylesheet" type="text/css" href="__JS__/uploadify/uploadify.css">
</block>
<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Chapter/index')}">文档管理</a></li>
      <li class="active">修改文档</li>

    </ol>
    <form method="post" action="{:U('Chapter/updateChapterAfter')}" id="form">
      <input type="hidden" name="id" value="{$oneChapter.id}">
      <div class="form-group">
        <label for="name">文档标题</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="请输入标题"  value="{$oneChapter.name}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">栏目</label>
        <select class="form-control"  name="nav">
          <option value="0">请选择一个栏目</option>
          <foreach name="nav" item="value">
          <optgroup label="{$value.name}">
              <foreach name="value.child" item="va">
                <eq name="va.id" value="$oneChapter.nav">  
                  <option value="{$va.id}" selected >{$va.name}</option>  
                <else />  
                  <option value="{$va.id}">{$va.name}</option>
                </eq>  
              </foreach>
          </optgroup>
          </foreach>
        </select>
      </div>
      <div class="form-group">
        <label  style="margin-right: 20px;">定义属性：</label>
        <div id="attr" style="display:none;">{$oneChapter.attr}</div>
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
        <input type="text" name="tag" class="form-control" id="tag" placeholder="请用|号分开" value="{$oneChapter.tag}" >
      </div>
      <div class="form-group">
        <label for="keyword">关键字：</label>
        <input type="text" name="keyword" class="form-control" id="keyword" placeholder="请用|号分开"  value="{$oneChapter.keyword}">
      </div>
      <div class="form-group">
        <label for="file">上传缩略图<span>(缩略图格式为jpg,png,jpeg)</span><span style="color: red">(上传图片大小为150px*100px)</span></label>
        <input type="file" id="file" name="file">

        <if condition="$oneChapter.thumb != '' ">
            <img src="{$oneChapter.thumb}" alt=""  id="img">
            <input type="hidden" value="{$oneChapter.thumb}" name="thumb">
          <else /> 
            <img src="" alt="" style="display:none;" id="img">
            <input type="hidden" value="" name="thumb">
        </if>
      </div>
      <div class="form-group">
        <label for="source">文章来源：</label>
        <input type="text" name="source" class="form-control" id="source" placeholder="请输入文章来源"  value="{$oneChapter.source}">
      </div>
      <div class="form-group">
        <label for="author">作者：</label>
        <input type="text" name="author" class="form-control" id="author" placeholder="多个作者用|隔开" value="{$oneChapter.author}" >
      </div>
      <div class="form-group">
        <label for="info">内容摘要：</label>
        <textarea class="form-control" rows="3" name="info" id="info">
          {$oneChapter.info}
        </textarea>
      </div>
      <div class="form-group">
        <label for="editor">文档内容：</label>
        <script id="editor" type="text/plain" style="width:100%;height:500px;" name="content">
        {$oneChapter.content}
        </script>
      </div>
      <div class="form-group">
        <div id="commend" style="display:none;">{$oneChapter.commend}</div>
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
        <input type="text" name="read_count" class="form-control" id="read_count" placeholder="可以设定浏览次数" value="{$oneChapter.read_count}">
      </div>
      <div class="form-group">
        <label for="sort">文章排序：</label>
        <input type="text" name="sort" class="form-control" id="sort" placeholder="请输入数字，数字越大越靠前" value="{$oneChapter.sort}">
      </div>
      <div class="form-group">
        <label for="gold">消费金币：</label>
        <input type="text" name="gold" class="form-control" id="gold"  placeholder="请输入数字" value="{$oneChapter.gold}">
      </div>


      <div class="form-group">
        <div id="limited">
            {$oneChapter.limit}
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
            {$oneChapter.color}
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
    
</block>

<block name="js">
    <script type="text/javascript" src="__BOOTSTRAP__/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="__JS__/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript" src="__JS__/chapter.js"></script>
    <script type="text/javascript" charset="utf-8" src="__UEDITOR__/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="__UEDITOR__/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="__UEDITOR__/lang/zh-cn/zh-cn.js"></script>
    <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
    <script>
      var ue = UE.getEditor('editor');
    </script>

    <script type="text/javascript">
        var ThinkPHP={
          'UPLOADIFY' : "__JS__",
          'ROOT' : "__ROOT__",
          'UPLOADURL' : '{:U("Chapter/upload")}',
        }
    </script>
</block>
