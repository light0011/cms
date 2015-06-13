<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/nav.css">
</block>
<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Nav/index')}">导航管理</a></li>
      <li class="active">修改导航</li>
    </ol>
    <form method="post" action="{:U('Nav/updateAfter')}">
        <input type="hidden" name="id" value="{$oneNav.id}">
      <div class="form-group">
        <label for="exampleInputEmail1">导航名称</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="请输入名称" value="{$oneNav.name}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">排序(序号越大越靠前)</label>
        <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="请输入名称" value="{$oneNav.sort}">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">导航简介</label>
        <textarea name="info" class="form-control" rows="3" placeholder="请输入简介">{$oneNav.info}</textarea>
      </div>
      <button type="submit" class="btn btn-default">修改导航</button>
    </form>
</block>

<block name="js">
    
</block>
