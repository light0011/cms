<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/chapter.css">
</block>

<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Chapter/index')}">文档管理</a></li>
      <li class="active">文档列表</li>
    </ol>
    <form method="post" action="{:U('Chapter/sort')}">
        <a href="{:U('Chapter/addChapter')}" class="btn btn-success">增加文档</a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr><th>文档id</th><th>名称</th><th>类别</th><th>关键字</th><th>日期</th><th>操作</th></tr>
            </thead>
            <tbody>
            <foreach name="list" item="value" >
                <tr><td>{$value.id}</td><td>{$value.name}</td><td>{$value.navname}</td><td>{$value.keyword}</td><td>{$value.date}</td><td><a href="{:U('Chapter/update',array('id'=>$value['id']))}" class="btn btn-primary">修改</a><a href="{:U('Chapter/delete',array('id'=>$value['id']))}" class="btn btn-primary">删除</a></td></tr>
            </foreach>
            </tbody>   
        </table>  
    </form>
    <div class="page">
            {$page}
    </div>
    
    

</block>


<block name="js">
    
</block>
