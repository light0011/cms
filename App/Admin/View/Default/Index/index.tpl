<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="__BOOTSTRAP__/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="__CSS__/index.css">
    <script type="text/javascript">
    var ThinkPHP={
        'IMG' : '__IMG__',
        'MODULE':'__MODULE__',
    }
    </script>
    <title>寒风天涯smile后台操作系统</title>
</head>
<body>
    <nav class="navbar navbar-default top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            <!-- <img alt="Brand" src="__IMG__/logo.jpg"> -->
            <p>寒风天涯smile</p>
            <p>CMS后台管理系统</p>
          </a>
        </div>
        <div class="col-md-2 navbar-right login_info">
          <div class="alert alert-success" role="alert"><strong>{$admin}</strong>,欢迎您来到后台<a href="{:U('Login/logout')}">退出</a></div>
        </div>
      </div>
    </nav>
    
        <div class="col-md-2 menu">
            <div class="list-group">
              <a href="{:U('Index/main')}"  target="in" class="list-group-item"><span class="glyphicon glyphicon-home"></span>   后台首页</a>
              <a href="javascript:void(0)" class="list-group-item child_menu"><span class="glyphicon glyphicon-cog"></span>   系统管理<span class="caret"></span></a>
                  <ul>
                    <li><a href="{:U('Manager/index')}"  target="in" class="list-group-item"><span class="glyphicon glyphicon-king"></span>   管理员管理</a></li>
                  </ul>
                <a href="#" class="list-group-item child_menu" ><span class="glyphicon glyphicon-file"></span>   内容管理<span class="caret"></span></a>
                  <ul>
                    <li><a href="{:U('Nav/index')}" target="in" class="list-group-item"><span class="glyphicon glyphicon-th-list"></span>   导航管理</a></li>
                    <li><a href="{:U('Chapter/index')}" target="in" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span>   文档管理</a></li>
                    <li><a href="{:U('Vote/index')}" target="in" class="list-group-item"><span class="glyphicon glyphicon-comment"></span>   投票管理</a></li>
                    <li><a href="{:U('Ad/index')}" target="in"  class="list-group-item"><span class="glyphicon glyphicon-refresh"></span>   轮播器管理</a></li>
                  </ul>
              <a href="#" class="list-group-item child_menu" ><span class="glyphicon glyphicon-user"></span>   会员管理<span class="caret"></span></a>
                  <ul>
                    <li><a href="{:U('User/index')}" target="in" class="list-group-item"><span class="glyphicon glyphicon-user"></span>   会员管理</a></li>
                    <li><a href="{:U('Comment/index')}" target="in" class="list-group-item"><span class="glyphicon glyphicon-copyright-mark"></span>   评论管理</a></li>
                  </ul>
            </div>
        </div>
        <div class="main">
            <iframe src="{:U('Index/main')}" frameborder="0" name="in"></iframe>
        </div>

  
    

  


    <include file="Public/js" />
    <script type="text/javascript" src="__JS__/jquery.validate.js"></script>
    <script type="text/javascript" src="__JS__/index.js"></script>
    <script>
   
   </script>
</body>
</html>