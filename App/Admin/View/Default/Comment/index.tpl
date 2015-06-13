<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/chapter.css">
</block>

<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Comment/index')}">评论管理</a></li>
    </ol>
    <form method="post" action="{:U('Comment/sort')}">
        <table class="table table-bordered table-hover">
            <thead>
                <tr><th>评论id</th><th>文章名称</th><th>评论者</th><th>日期</th><th>状态</th><th>操作</th></tr>
            </thead>
            <tbody>
            <foreach name="list" item="value" >
                <tr><td>{$value.id}</td><td>{$value.sub_name}</td><td>{$value.user}</td><td>{$value.create}</td>

                    <td>
                        <if condition="$value['state'] eq 0 ">
                                  <span style="color: red;"></span>尚未审核
                          <else /> 
                                 <span style="color:green;">审核通过</span>        
                        </if>
                    </td>
                    

                <td>{$value.create}</td>


                <td><a href="{:U('Comment/update',array('id'=>$value['id']))}" class="btn btn-primary">修改</a><a href="{:U('Comment/delete',array('id'=>$value['id']))}" class="btn btn-primary">删除</a></td></tr>
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
