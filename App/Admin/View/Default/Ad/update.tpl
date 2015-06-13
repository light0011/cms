<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/nav.css">
    <link rel="stylesheet" type="text/css" href="__JS__/uploadify/uploadify.css">
</block>
<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Ad/index')}">轮播器管理</a></li>
      <li class="active">修改轮播器</li>
    </ol>
    <form method="post" action="{:U('Ad/updateAfter')}">
        <input type="hidden" name="id" value="{$oneAd.id}">
        <div class="form-group">
          <label for="title">轮播器名称</label>
          <input type="text" name="title" class="form-control" id="title" placeholder="请输入轮播器名称" value="{$oneAd.title}" >
        </div>
        <div class="form-group">
          <label for="content">轮播器内容</label>
          <input type="text" name="content" class="form-control" id="content" placeholder="请输入轮播器内容" value="{$oneAd.content}" >
        </div>
        <div class="form-group">
            <label for="file">上传缩略图<span>(缩略图格式为jpg,png,jpeg)</span><span style="color: red">(上传图片大小为800px*280px)</span></label>
            <input type="file" id="file" name="file">
            <if condition="$oneAd.url != '' ">
                <img src="{$oneAd.url}" alt=""  id="img">
                <input type="hidden" value="{$oneAd.url}" name="url">
              <else /> 
                <img src="" alt="" style="display:none;" id="img">
                <input type="hidden" value="" name="url">
            </if>
      </div>
        
      <button type="submit" class="btn btn-default">修改轮播器</button>
    </form>
</block>

<block name="js">
  
    <script type="text/javascript" src="__JS__/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript" src="__JS__/ad.js"></script>
  
    

    <script type="text/javascript">
        var ThinkPHP={
          'UPLOADIFY' : "__JS__",
          'ROOT' : "__ROOT__",
          'UPLOADURL' : '{:U("Ad/upload")}',
        }
    </script>
</block>
