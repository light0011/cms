<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="__BOOTSTRAP__/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="__CSS__/login.css">
    <link rel="stylesheet" type="text/css" href="__JS__/uploadify/uploadify.css">
    <script type="text/javascript">
    var ThinkPHP={
        'IMG' : '__IMG__',
        'MODULE':'__MODULE__',
    }
    </script>
    <title>寒风天涯smileCMS系统后台登陆</title>
</head>
<body>

   
<div class="modal fade" id="login_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">管理员登陆</h4>
      </div>
      <div class="modal-body">
            <form class="form-horizontal" id="login">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">账号</label>
                <div class="col-sm-10">
                  <input type="text" name="manager" class="form-control" id="inputEmail3" placeholder="请输入管理员账号">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="请输入密码">
                </div>
              </div>
              

            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="submit">提交</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
    
    
<div class="modal fade" id="wait_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">信息提示</h4>
      </div>
      <div class="modal-body">
            <div class="alert alert-info" role="alert">正在登录中...</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="success_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">信息提示</h4>
      </div>
      <div class="modal-body">
            <div class="alert alert-success" role="alert">登录成功！</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>  

<div class="modal fade" id="fail_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">信息提示</h4>
      </div>
      <div class="modal-body">
            <div class="alert alert-danger" role="alert">登录失败！</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>




    <script type="text/javascript" src="__JS__/jquery.js"></script>
    <script type="text/javascript" src="__BOOTSTRAP__/js/bootstrap.js"></script>
    <script type="text/javascript" src="__JS__/jquery.validate.js"></script>
    <script type="text/javascript" src="__JS__/login.js"></script>
</body>
</html>