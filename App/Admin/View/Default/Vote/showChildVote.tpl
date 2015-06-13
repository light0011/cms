<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/nav.css">
</block>
<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Vote/index')}">投票管理</a></li>
      <li class="active">投票选择列表</li>
    </ol>
 
    <a href="{:U('Vote/addChildVote',array('id'=>$id))}" class="btn btn-success">增加该项目投票选择</a>
 
    <table class="table table-bordered table-hover">
        <thead>
            <tr><th>投票选择id</th><th>投票选择名称</th><th>投票数量</th><th>操作</th></tr>
        </thead>
        <tbody>
        <foreach name="list" item="value" >
            <tr><td>{$value.id}</td><td>{$value.title}</td><td>{$value.count}</td><td><a href="{:U('Vote/update',array('id'=>$value['id']))}" class="btn btn-primary">修改</a><a href="{:U('Vote/delete',array('id'=>$value['id']))}" class="btn btn-primary">删除</a></td></tr>
        </foreach>
        </tbody>    
    </table>

</block>

<block name="js">
    
</block>
