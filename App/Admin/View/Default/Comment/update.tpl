<extend name="Public/base" />

<block name="css">
    <link rel="stylesheet" type="text/css" href="__CSS__/nav.css">
</block>
<block name="main">
    <ol class="breadcrumb">
      <li><a href="{:U('Comment/index')}">评论管理</a></li>
      <li class="active">修改评论</li>
    </ol>
    <form method="post" action="{:U('Comment/updateAfter')}">
        <input type="hidden" name="id" value="{$oneComment.id}">
        <div class="form-group">
          <label for="exampleInputEmail1">文章名称</label>
          <div class="alert alert-warning" role="alert">{$oneComment.name}</div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">评论者</label>
          <div class="alert alert-warning" role="alert">{$oneComment.user}</div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">评论内容</label>
          <div class="alert alert-warning" role="alert">{$oneComment.content}</div>
        </div>
        <div class="radio">


          <if condition="$oneComment['state'] eq 0 ">
                    <label>
                      <input type="checkbox" name="state" id="optionsRadios2" value="1" >
                      审核通过
                    </label>
              <else /> 
                    <label>
                      <input type="checkbox" name="state" id="optionsRadios2" value="0">
                      审核不通过
                    </label>
          </if>
          

          


        </div>
      <button type="submit" class="btn btn-default">修改评论</button>
    </form>
</block>

<block name="js">
    
</block>
