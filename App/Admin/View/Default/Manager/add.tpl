<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/nav.css">
</block>
<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Manager/index')}">管理员管理</a></li>
      <li class="active">增加管理员</li>
    </ol>
    <form method="post" action="{:U('Manager/addAfter')}">
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
          <foreach name="rules" item="value">
              <label class="checkbox-inline" style="margin:30px;">
                <input type="checkbox" id="inlineCheckbox1" value="{$value.id}" name="rules[]"> {$value.title}
              </label>
          </foreach>
      </div>
      <button type="submit" class="btn btn-default">增加管理员</button>
    </form>
</block>

<block name="js">
    
</block>
