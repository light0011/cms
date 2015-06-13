<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/nav.css">
</block>
<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Vote/index')}">投票管理</a></li>
      <li class="active">修改投票</li>
    </ol>
    <form method="post" action="{:U('Vote/updateAfter')}">
        <input type="hidden" name="id" value="{$oneVote.id}">
      <div class="form-group">
        <label for="exampleInputEmail1">投票名称</label>
        <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="请输入名称" value="{$oneVote.title}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">投票简介</label>
        <textarea name="info" class="form-control" rows="3" placeholder="请输入简介">{$oneVote.info}</textarea>
      </div>
      <button type="submit" class="btn btn-default">修改投票</button>
    </form>
</block>

<block name="js">
    
</block>
