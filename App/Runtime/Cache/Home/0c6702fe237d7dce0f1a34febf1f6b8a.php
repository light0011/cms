<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
  <html lang="en">
  <head>
      <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Home/css/base.css">
  <title>寒风天涯新闻系统</title>
      <link rel="stylesheet" type="text/css" href="/CMS2.0/Public/Home/css/list.css">
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
        <div class="container">
            <ol class="breadcrumb">
              <li><a href="<?php echo U('Index/index');?>">首页</a></li>
              <li class="active">搜索</li>
            </ol>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <?php if(is_array($searchChapter)): foreach($searchChapter as $key=>$value): ?><div class="media list_news">
                          <div class="media-left">
                            <a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>">
                              <img class="media-object" src="/CMS2.0/<?php echo ($value["thumb"]); ?>" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><span class="label label-info"><?php echo ($value["navname"]); ?></span><a href="<?php echo U('Chapter/oneChapter',array('id'=>$value['id']));?>"><?php echo ($value["name"]); ?></a></h4>
                            <p><?php echo ($value["info"]); ?></p>
                          </div>
                        </div><?php endforeach; endif; ?>

    

                </div>
                
            </div>
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








        
  </body>
  </html>