<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/nav.css">
</block>

<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('User/index')}">会员管理</a></li>
      <li class="active">会员列表</li>
    </ol>
    <form method="post" action="{:U('User/sort')}">

        <table class="table table-bordered table-hover">
            <thead>
                <tr><th>会员id</th><th>会员名称</th></tr>
            </thead>
            <tbody>
            <foreach name="list" item="value" >
                <tr><td>{$value.id}</td><td>{$value.username}</td></tr>
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
