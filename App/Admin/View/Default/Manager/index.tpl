<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/manager.css">
</block>
<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Manager/index')}">管理员管理</a></li>
      <li class="active">管理员列表</li>
    </ol>
    <a href="{:U('Manager/add')}" class="btn btn-success">增加管理员</a>
    <table class="table table-bordered table-hover">
        <thead>
            <tr><th>管理员id</th><th>管理员账号</th><th>上次登录时间</th><th>上次登录ip</th><th>身份</th><th>操作</th></tr>
        </thead>
        <tbody>
        <foreach name="list" item="value" >
            <tr><td>{$value.id}</td><td>{$value.manager}</td><td>{$value.last_login}</td><td>{$value.last_ip}</td><td>{$value.title}</td><td>
            <a href="{:U('Manager/delete',array('id'=>$value['id']))}">删除</a>   </td></tr>
        </foreach>
            
        </tbody>
        
    </table>
    <div class="page">
            {$page}
    </div>
</block>

<block name="js">
    
</block>
