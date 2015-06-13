<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
  <html lang="en">
  <head>
      <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Home/css/base.css">
  <title>寒风天涯新闻系统</title>
      <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Home/js/uploadify/uploadify.css">
      <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Home/css/bootstrapValidator.css">
      <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Home/css/index.css">
  </head>
  <body>
        
        
        <nav class="navbar navbar-default navbar-fixed-top">

            <div class="container" >

                <div class="navbar-header">
                  <button class="navbar-toggle" data-toggle='collapse' data-target='#response-bar'>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                </div>
              <div class="collapse navbar-collapse" id="response-bar">
                  <ul class="nav navbar-nav" >
                      <li class="active"><a href="<?php echo U('Index/index');?>">首页</a></li>
                      <?php if(is_array($frontTenNav)): foreach($frontTenNav as $key=>$value): ?><li><a href="<?php echo U('List/index',array('id'=>$value['id']));?>"><?php echo ($value["name"]); ?></a></li><?php endforeach; endif; ?>
                  </ul>     
              </div>
          </div>
        </nav>
        
        <div class="container nav_tab">
            <div class="row">
                <div class="col-md-4">
                    <form class="form-inline" action="<?php echo U('Chapter/searchChapter');?>" method="post">
                          <div class="form-group">
                                <select class="form-control" name="type">
                                      <option value="1">按标题</option>
                                      <option value="2">按关键字</option>
                                </select>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control"  placeholder="输入搜索内容" name="content">
                          </div>
                          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
                </div>
                <div class="col-md-8   tab">
                    <span class="label label-default label-lg">TAB标签</span>
                    <?php if(is_array($tags)): foreach($tags as $key=>$value): ?><a href="<?php echo U('Chapter/searchTag',array('tag'=>$value['name']));?>" target="_blank"><?php echo ($value["name"]); ?> <span class="badge"><?php echo ($value["count"]); ?></span></a><?php endforeach; endif; ?>
                </div>
            </div>
        </div>
        
        <div class="container member">
            <div class="row">
                <div class="col-md-8">
                
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        
                        <?php if(is_array($ad)): foreach($ad as $key=>$value): ?><div class="item ad">
                              <img src="/CMS2.0/<?php echo ($value["url"]); ?>" alt="...">
                              <div class="carousel-caption">
                                <h2><?php echo ($value["title"]); ?></h2>
                                <p><?php echo ($value["content"]); ?></p>
                              </div>
                            </div><?php endforeach; endif; ?>


                      </div>

                      <!-- Controls -->
                      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-6">
                            <h4 class="page-header"><span class="glyphicon glyphicon-time"></span>  最新讯息</h4>
                            <div class="list-group">
                              <?php if(is_array($newestSeven)): foreach($newestSeven as $key=>$value): ?><a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>" class="list-group-item" title="<?php echo ($value["name"]); ?>" target="_blank"><?php echo ($value["sub_name"]); ?><span><?php echo ($value["date"]); ?></span></a><?php endforeach; endif; ?>
                              
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="page-header"><span class="glyphicon glyphicon-flag"></span>  特别推荐</h4>
                            <div class="list-group">
                                <?php if(is_array($recommendChapter)): foreach($recommendChapter as $key=>$value): ?><a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>" class="list-group-item" title="<?php echo ($value["name"]); ?>" target="_blank"><?php echo ($value["sub_name"]); ?><span><?php echo ($value["date"]); ?></span></a><?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 member_login">
                        <h4 class="page-header"><span class="glyphicon glyphicon-user"></span>  会员信息</h4>

                        <?php if($userValue == 1 ): ?><div class="a"><p>您好<strong><?php echo ($frontUser["username"]); ?></strong> ，欢迎光临</p></div>
                            <div class="b">
                              <?php if($frontUser["face"] == ''): ?><img src="/CMS2.0/Public/Home/img/00.gif" alt="<?php echo ($frontUser["username"]); ?>" />
                              <?php else: ?>
                                  <img src="/CMS2.0/<?php echo ($frontUser["face"]); ?>" alt="<?php echo ($frontUser["username"]); ?>" /><?php endif; ?>
                              <div class="user_link">
                                  <a href="<?php echo U('User/logout');?>" class="btn btn-primary">退出登录</a>
                              </div>
                              
                            </div>
                            <?php else: ?> 
                                <div class="login_button">
                                    <div class="alert alert-success" role="alert">提示：会员登录之后方可对文章进行评论！！！</div>
                                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#login_modal">会员登录</button>
                                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#register_modal">注册会员</button>
                                </div><?php endif; ?>
                        


                        <h4 class="page-header"><span class="glyphicon glyphicon-object-align-left"></span>  最近登录会员</h4>
                        <?php if(is_array($frontSixUser)): foreach($frontSixUser as $key=>$value): ?><dl class="col-md-4 user_image">
                                      <dt>
                                          <img src="/CMS2.0/<?php echo ($value["face"]); ?>" alt="">
                                          <p><?php echo ($value["username"]); ?></p>
                                      </dt>
                                      <dd></dd>
                                  </dl><?php endforeach; endif; ?>
                        

                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="col-md-4">
                <h4 class="page-header"><span class="glyphicon glyphicon-bullhorn"></span>   <?php echo ($fourNavChapter[0]['name']); ?></h4>
                <div class="list-group news_title">
                  <?php if(is_array($fourNavChapter[0]['child'])): foreach($fourNavChapter[0]['child'] as $key=>$value): ?><a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>" target="_blank" class="list-group-item"><?php echo ($value["sub_name"]); ?><span><?php echo ($value["date"]); ?></span></a><?php endforeach; endif; ?>
                </div>
                <h4 class="page-header"><span class="glyphicon glyphicon-globe"></span>  <?php echo ($fourNavChapter[2]['name']); ?></h4>
                <div class="list-group news_title">
                  <?php if(is_array($fourNavChapter[2]['child'])): foreach($fourNavChapter[2]['child'] as $key=>$value): ?><a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>"  target="_blank" class="list-group-item"><?php echo ($value["sub_name"]); ?><span><?php echo ($value["date"]); ?></span></a><?php endforeach; endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="page-header"><span class="glyphicon glyphicon-leaf"></span>  <?php echo ($fourNavChapter[1]['name']); ?></h4>
                <div class="list-group news_title">
                  <?php if(is_array($fourNavChapter[1]['child'])): foreach($fourNavChapter[1]['child'] as $key=>$value): ?><a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>" target="_blank" class="list-group-item"><?php echo ($value["sub_name"]); ?><span><?php echo ($value["date"]); ?></span></a><?php endforeach; endif; ?>
                </div>
                <h4 class="page-header"><span class="glyphicon glyphicon-magnet"></span>  <?php echo ($fourNavChapter[3]['name']); ?></h4>
                <div class="list-group news_title">
                  <?php if(is_array($fourNavChapter[3]['child'])): foreach($fourNavChapter[3]['child'] as $key=>$value): ?><a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>" target="_blank" class="list-group-item"><?php echo ($value["sub_name"]); ?><span><?php echo ($value["date"]); ?></span></a><?php endforeach; endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="page-header"><span class="glyphicon glyphicon-hand-up"></span>  本月热点</h4>
                <div class="list-group">
                  <?php if(is_array($hotChapter)): foreach($hotChapter as $key=>$value): ?><a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>" class="list-group-item" title="<?php echo ($value["name"]); ?>" target="_blank"><?php echo ($value["sub_name"]); ?><span><?php echo ($value["date"]); ?></span></a><?php endforeach; endif; ?>
                </div>
                <h4 class="page-header"><span class="glyphicon glyphicon-comment"></span>  本月评论</h4>
                <div class="list-group">
                  <?php if(is_array($commentChapter)): foreach($commentChapter as $key=>$value): ?><a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>" class="list-group-item" title="<?php echo ($value["name"]); ?>" target="_blank"><?php echo ($value["sub_name"]); ?><span><?php echo ($value["date"]); ?></span></a><?php endforeach; endif; ?>
                </div>

                <h4 class="page-header"><span class="glyphicon glyphicon-heart-empty"></span>  调查投票</h4>
                <div class="list-group vote">
                    <div style="border:1px solid #ccc;border-radius: 3px;">
                        <div class="alert alert-info" role="alert"><h3><?php echo ($vote['title']['title']); ?></h3></div>
                            <?php if(is_array($vote['item'])): foreach($vote['item'] as $key=>$value): ?><div class="radio">
                                  <label>
                                    <input type="radio" name="vote" id="vote1" value="<?php echo ($value["id"]); ?>" >
                                    <?php echo ($value["title"]); ?>
                                  </label>
                                </div><?php endforeach; endif; ?>
                            <div class="vote_button">
                                <button type="button" class="btn btn-primary" id="vote_submit">投票</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#vote_modal">查看</button>
                            </div>
                    </div>

                </div>

            </div>
        </div>
        
  
  <!-- Modal -->     
        

  <div class="modal fade" id="vote_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">查看投票</h4>
              </div>
              <div class="modal-body" style="height: 380px;">
                    
                  <?php if(is_array($vote['item'])): foreach($vote['item'] as $key=>$value): ?><h4><?php echo ($value["title"]); ?></h4>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($value["percent"]); ?>">
                        <span class=""><?php echo ($value["percent"]); ?></span>
                      </div>
                    </div><?php endforeach; endif; ?>
                 
              </div>
            </div>
        </div>
  </div>
  
     


        <div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">注册会员</h4>
              </div>
              <div class="modal-body" style="height: 600px;">
                  <form id="register">
                    <div class="form-group">
                      <label for="exampleInputEmail1">账号：</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="请输入用户名">
                    </div>
                    <div class="form-group">
                      <label for="password">密码：</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
                    </div>
                    <div class="form-group">
                      <label for="repassword">确认密码：</label>
                      <input type="password" class="form-control" id="repassword" name="repassword" placeholder="确认密码">
                    </div>
                    <div class="form-group">
                      
                      <input type="file" id="file" name="file" value="点击上传" >
                      <img src="" alt="" style="display:none;" id="img">
                      <input type="hidden" value="" name="face">
                    </div>
                    <div class="form-group">
                          <label for="verify" >验证码:</label>
                          <input type="text" class="form-control" id="verify" name="verify" placeholder="请输入验证码">
                    </div>
                    <img src="<?php echo U('Verify/verify2');?>" alt=""  class="register_img">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">注册</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
              </div>
              </form>
            </div>
          </div>
        </div>


        
        

          <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">会员登录</h4>
              </div>
              <div class="modal-body" style="height: 300px;">
                    <form class="form-horizontal" id="login">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-md-3 control-label">账号:</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="请输入账号">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-md-3 control-label">密码:</label>
                          <div class="col-md-8">
                            <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="请输入密码">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword3" class="col-md-3 control-label">验证码:</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="inputPassword3" name="verify" placeholder="请输入验证码">
                          </div>
                          <div class="col-md-3 verify">
                            <img src="<?php echo U('Verify/verify1');?>" alt="" class="login_img" >
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-offset-3 col-md-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="auto"> 记住我
                              </label>
                            </div>
                          </div>
                        </div>
                      
                    
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">登录</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
              </div>
            </form>
            </div>
          </div>
        </div>
  


        <div class="modal fade" id="wait_modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">信息提示</h4>
              </div>
              <div class="modal-body">
                    <div class="alert alert-info" role="alert">正在操作中...</div>
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
                    <div class="alert alert-success" role="alert">操作成功！</div>
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
                    <div class="alert alert-danger" role="alert">操作失败！</div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
        
        <div class="alert alert-success footer" role="alert">© 寒风天涯smile</div>

        <script type="text/javascript" src="/CMS2.0/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/CMS2.0/Public/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="/CMS2.0/Public/Home/js/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/CMS2.0/Public/bootstrap/js/bootstrapValidator.js"></script>
<script type="text/javascript">
        var ThinkPHP={
          'UPLOADIFY' : "/CMS2.0/Public/Home/js",
          'ROOT' : "/CMS2.0",
          'MODULE' : "/CMS2.0/Home",
          'UPLOADURL' : '<?php echo U("User/upload");?>',
          'CHECKUSER' : '<?php echo U("User/checkUser");?>',
          'CHECKVERIFY1' : '<?php echo U("Verify/checkVerify1");?>',
          'CHECKVERIFY2' : '<?php echo U("Verify/checkVerify2");?>',
          'CHECKVERIFY3' : '<?php echo U("Verify/checkVerify3");?>',
        }
 </script>




        <script type="text/javascript" src="/CMS2.0/Public/Home/js/index.js"></script>


        
  </body>
  </html>