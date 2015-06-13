<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/nav.css">
</block>
<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Nav/index')}">导航管理</a></li>
      <li class="active">子导航列表</li>
    </ol>
    <form method="post" action="{:U('Nav/sort')}">
    <a href="{:U('Nav/addChildNav',array('id'=>$id))}" class="btn btn-success">增加该类子导航</a>
    <button type="submit" class="btn btn-primary">批量排序</button>
    <table class="table table-bordered table-hover">
        <thead>
            <tr><th>子导航id</th><th>子导航名称</th><th>子导航简介</th><th>排序</th><th>操作</th></tr>
        </thead>
        <tbody>
        <foreach name="list" item="value" >
            <tr><td>{$value.id}</td><td>{$value.name}</td><td>{$value.info}</td><td><input type="text" name="sort[{$value.id}]" value="{$value.sort}"></td><td><a href="{:U('Nav/update',array('id'=>$value['id']))}" class="btn btn-primary">修改</a><a href="{:U('Nav/delete',array('id'=>$value['id']))}" class="btn btn-primary">删除</a></td></tr>
        </foreach>
            
        </tbody>    
    </table>
    </form>  
</block>

<block name="js">
    
</block>
