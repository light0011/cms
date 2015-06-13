<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/nav.css">
</block>

<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Vote/index')}">投票项目管理</a></li>
      <li class="active">投票项目列表</li>
    </ol>
    <form method="post" action="{:U('Vote/sort')}">
        <a href="{:U('Vote/addVote')}" class="btn btn-success">增加投票项目</a>
        
        <table class="table table-bordered table-hover">
            <thead>
                <tr><th>投票项目id</th><th>投票项目名称</th><th>投票项目简介</th><th>投票选择管理</th><th>排序</th><th>操作</th></tr>
            </thead>
            <tbody>
            <foreach name="list" item="value" >
                <tr><td>{$value.id}</td><td>{$value.title}</td><td>{$value.info}</td><td><a href="{:U('Vote/addChildVote',array('id'=>$value['id']))}" class="btn btn-primary">增加投票选择项目</a><a href="{:U('Vote/showChildVote',array('id'=>$value['id']))}" class="btn btn-primary">查看投票选择项目</a></td><td>
                    <if condition="$value['state'] eq 1">
                            <span style="color: green;">首页已显示</span>
                    <else/>
                            <a href="{:U('Vote/first',array('id'=>$value['id']))}" style="color: red;">首页显示</a>
                    </if>
                </td><td><a href="{:U('Vote/update',array('id'=>$value['id']))}" class="btn btn-primary">修改</a><a href="{:U('Vote/delete',array('id'=>$value['id']))}" class="btn btn-primary">删除</a></td></tr>
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
