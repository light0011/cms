<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
  <html lang="en">
  <head>
      <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Home/css/base.css">
  <title>寒风天涯新闻系统</title>
      <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Home/css/chapter.css">
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
                    <a href="#">美女 <span class="badge">3</span></a><a href="#">美女 <span class="badge">3</span></a><a href="#">美女 <span class="badge">3</span></a><a href="#">美女 <span class="badge">3</span></a><a href="#">美女 <span class="badge">3</span></a><a href="#">美女 <span class="badge">3</span></a><a href="#">美女 <span class="badge">3</span></a>
                </div>
            </div>
        </div>
        <div class="container">
            <ol class="breadcrumb">
              <li><a href="<?php echo U('Index/index');?>">首页</a></li>
              <li><a href="<?php echo U('List/index',array('id'=>$oneChapter['oneNav']['id']));?>"><?php echo ($oneChapter['oneNav']['name']); ?></a></li>
              <li><a href="<?php echo U('List/index',array('id'=>$oneChapter['twoNav']['id']));?>"><?php echo ($oneChapter['twoNav']['name']); ?></a></li>

              <li class="active"><?php echo ($oneChapter["name"]); ?></li>
            </ol>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 acticle">
                      <h3><?php echo ($oneChapter["name"]); ?></h3>
                      <div class="d1"><span>时间：<?php echo ($oneChapter["date"]); ?></span><span>来源：<?php echo ($oneChapter["source"]); ?></span><span>作者：<?php echo ($oneChapter["author"]); ?></span>   <span>点击量：<?php echo ($oneChapter["read_count"]); ?> 次</span></div>
                      <div class="d2">
                      <p><?php echo ($oneChapter["info"]); ?></p>
                      </div>
                      <div class="d3">
                        <?php echo ($oneChapter["content"]); ?>
                      </div>
                      <div class="d4">
                        TAG标签：
                        <?php if(is_array($oneChapter['tag'])): foreach($oneChapter['tag'] as $key=>$value): ?><span class="label label-success"><?php echo ($value); ?></span><?php endforeach; endif; ?>
                      </div>
                      <div class="d5">

                          <?php if($oneChapter['commend'] == 1 ): ?><form id="comment" >
                                <input type="hidden" name="chapter_id" value="<?php echo ($oneChapter["id"]); ?>">
                                <p>您对本文的态度是：

                                    <label class="radio-inline">
                                      <input type="radio" name="manner" id="inlineRadio1" value="1" checked="checked"> 支持
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="manner" id="inlineRadio2" value="2"> 反对
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="manner" id="inlineRadio3" value="3"> 中立
                                    </label>
                                </p>
                                <p class="red">请遵循互联网规则，不发表政治敏感的评论！！！！！</p>
                                <div class="form-group">
                                    <label for="exampleInputFile">评论</label>
                                    <textarea class="form-control" rows="3" name="content" placeholder="内容6--200位"></textarea>
                                </div>
                                
                            
                                  <?php if($userValue == 1 ): ?><button type="submit" class="btn btn-success">发表评论</button>
                                  <?php else: ?>
                                      <a href="<?php echo U('Index/index');?>" type="button" class="btn btn-info" target="_blank">请先登录，方可发表言论</a><?php endif; ?>
                               </form>

                          <?php else: ?> 
                              
                                  <div class="alert alert-warning" role="alert">该文章禁止评论！</div><?php endif; ?>
    
                      </div>

                      <div class="d6">
                        <?php if($oneChapter['commend'] == 1 ): ?><div class="page-header comment_page">
                              <h4>已有<?php echo ($chapterCommentCount); ?>条评论<small>
                              <?php if($chapterCommentCount > 0): ?><a href="<?php echo U('Comment/index',array('cid'=>$oneChapter['id']));?>">查看全部评论</a></small></h4><?php endif; ?>
                            </div>
                              <?php if(is_array($newThreeComment)): foreach($newThreeComment as $key=>$value): ?><div class="media">
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
                          <?php else: endif; ?>
                          

                      </div>

                </div>
                <div class="col-md-4">
                    
                    
                    <h4 class="page-header"><span class="glyphicon glyphicon-heart"></span>  本类推荐</h4>
                    <div class="list-group">
                      <?php if(is_array($chapterRecommend)): foreach($chapterRecommend as $key=>$value): ?><a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>" class="list-group-item" title="<?php echo ($value["name"]); ?>" target="_blank"><?php echo ($value["sub_name"]); ?><span><?php echo ($value["date"]); ?></span></a><?php endforeach; endif; ?>
                    </div>
                    <h4 class="page-header"><span class="glyphicon glyphicon-star"></span>  本类热点</h4>
                    <div class="list-group">
                      <?php if(is_array($chapterHot)): foreach($chapterHot as $key=>$value): ?><a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>" class="list-group-item" title="<?php echo ($value["name"]); ?>" target="_blank"><?php echo ($value["sub_name"]); ?><span><?php echo ($value["date"]); ?></span></a><?php endforeach; endif; ?>
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
          'MODULE' : "/CMS2.0/home",
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