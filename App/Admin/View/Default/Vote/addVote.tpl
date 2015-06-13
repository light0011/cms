<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/nav.css">
</block>
<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Vote/index')}">投票管理</a></li>
      <li class="active">增加投票</li>
    </ol>
    <form method="post" action="{:U('Vote/addVoteAfter')}">
        
      <div class="form-group">
        <label for="exampleInputEmail1">投票项目名称</label>
        <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="请输入名称">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">投票项目简介</label>
        <textarea name="info" class="form-control" rows="3" placeholder="请输入简介"></textarea>
      </div>
      <button type="submit" class="btn btn-default">增加投票项目</button>
    </form>
</block>

<block name="js">
    
</block>
