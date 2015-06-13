<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
  <html lang="en">
  <head>
      <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Home/css/base.css">
  <title>寒风天涯新闻系统</title>
      <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Home/css/comment.css">
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
                    <form class="form-inline">
                          <div class="form-group">
                                <select class="form-control">
                                      <option value="1">按标题</option>
                                      <option value="2">按关键字</option>
                                </select>
                          </div>
                          <div class="form-group">
                            <input type="email" class="form-control"  placeholder="输入搜索内容">
                          </div>
                          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
                </div>
                <div class="col-md-8   tab">
                    <span class="label label-default label-lg">TAB标签</span>
                    <a href="#">美女 <span class="badge">3</span></a><a href="#">美女 <span class="badge">3</span></a><a href="#">美女 <span class="badge">3</span></a><a href="#">美女 <span class="badge">3</span></a><a href="#">美女 <span class="badge">3</span></a><a href="#">美女 <span class="badge">3</span></a><a href="#">美女 <span class="badge">3</span></a>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="col-md-8">
                <div class="page-header">
                  <h3><a href="<?php echo U('Chapter/oneChapter',array('id'=>$commentChapter['id']));?>"><?php echo ($commentChapter["name"]); ?> </a><small>评论文章</small></h3>
                </div>
                  <div class="page-header comment_page">
                      <h4>已有<?php echo ($chapterCommentCount); ?>条评论</h4>
                    </div>
                  <?php if(empty($hotThreeComment)): else: ?> 
                    <div class="alert alert-danger" role="alert">最火评论</div>
                      <?php if(is_array($hotThreeComment)): foreach($hotThreeComment as $key=>$value): ?><div class="media">
                          <div class="media-left">
                            <a href="javascript:void(0)">
                              <img class="media-object" src="/CMS2.0/<?php echo ($value["face"]); ?>" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><?php echo ($value["name"]); ?></h4>
                            <p><?php echo ($value["content"]); ?></p>
                            <span><?php echo ($value["create"]); ?></span>
                            <button type="button" class="btn btn-success btn-xs manner support" comment="<?php echo ($value["id"]); ?>">支持(<em><?php echo ($value["support"]); ?></em>)</button>
                            <button type="button" class="btn btn-danger btn-xs manner oppose" comment="<?php echo ($value["id"]); ?>">反对(<em><?php echo ($value["oppose"]); ?></em>)</button>
                            <!-- <input type="hidden" class="comment_id" value=""> -->
                          </div>
                        </div><?php endforeach; endif; endif; ?>
                    



                      <div class="alert alert-info" role="alert" >最新评论</div>
                      <?php if(is_array($chapterComment)): foreach($chapterComment as $key=>$value): ?><div class="media">
                            <div class="media-left">
                              <a href="javascript:void(0)">
                                <img class="media-object" src="/CMS2.0/<?php echo ($value["face"]); ?>" alt="...">
                              </a>
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading"><?php echo ($value["name"]); ?></h4>
                              <p><?php echo ($value["content"]); ?></p>
                              <span><?php echo ($value["create"]); ?></span>
                              <button type="button" class="btn btn-success btn-xs manner support" comment="<?php echo ($value["id"]); ?>">支持(<em><?php echo ($value["support"]); ?></em>)</button>
                              <button type="button" class="btn btn-danger btn-xs manner oppose" comment="<?php echo ($value["id"]); ?>">反对(<em><?php echo ($value["oppose"]); ?></em>)</button>
                              <!-- <input type="hidden" class="comment_id" value=""> -->
                            </div>
                          </div><?php endforeach; endif; ?>


                <div class="page">
                        <?php echo ($page); ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="page-header">
                  <h3>总评论文档排行榜 <small>20条</small></h3>
                      <div class="list-group">
                        <?php if(is_array($hotTwentyChapter)): foreach($hotTwentyChapter as $key=>$value): ?><a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>" class="list-group-item" title="<?php echo ($value["name"]); ?>"><?php echo ($value["sub_name"]); ?><span><?php echo ($value["date"]); ?></span></a><?php endforeach; endif; ?>
                      </div>
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




        <script type="text/javascript" src="/CMS2.0/Public/Home/js/chapter.js"></script>



        
  </body>
  </html>