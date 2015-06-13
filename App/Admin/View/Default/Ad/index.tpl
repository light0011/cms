<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/chapter.css">
</block>

<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Ad/index')}">轮播器管理</a></li>
    </ol>
    
        <table class="table table-bordered table-hover">
            <thead>
                <tr><th>轮播器id</th><th>轮播器名称</th><th>轮播器内容</th><th>操作</th></tr>
            </thead>
            <tbody>
            <foreach name="list" item="value" >
                <tr><td>{$value.id}</td><td>{$value.title}</td><td>{$value.content}</td><td><a href="{:U('Ad/update',array('id'=>$value['id']))}" class="btn btn-primary">修改</a></td></tr>
            </foreach>
            </tbody>   
        </table>  
 
    
    

</block>


<block name="js">
    
</block>
