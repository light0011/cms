<!doctype html>
  <html lang="en">
  <head>
      <include file="Public/head" />
      <link rel="stylesheet" type="text/css" href="__CSS__/list.css">
  </head>
  <body>
        
        
        <include file="Public/header" />
        <div class="container">
            <ol class="breadcrumb">
              <li><a href="{:U('Index/index')}">首页</a></li>
              <foreach name="frontNav.sait" item="value">
              <li><a href="{:U('List/index',array('id'=>$value['id']))}">{$value.name}</a></li>
              </foreach>
            </ol>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <foreach name="listNewsTitle"  item="value">
                        <div class="media list_news">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="{$value.thumb}" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><span class="label label-info">{$value.navname}</span><a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}">{$value.name}</a></h4>
                            <p>{$value.info}</p>
                          </div>
                        </div>
                    </foreach>

              <div class="page">
                    {$page}
            </div>

                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-heading">子栏目列表</div>
                      <div class="panel-body">
                          <foreach name="frontNav.child" item="value" >
                              <a href="{:U('List/index',array('id'=>$value['id']))}" class="btn btn-primary">{$value.name}</a>
                          </foreach>
                      </div>
                    </div>
                    
                    <h4 class="page-header"><span class="glyphicon glyphicon-heart"></span>  本类推荐</h4>
                    <div class="list-group">
                      <foreach name="recommendChapter" item="value" >
                          <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}" class="list-group-item" title="{$value.name}" target="_blank">{$value.sub_name}<span>{$value.date}</span></a>
                      </foreach>
                    </div>
                    <h4 class="page-header"><span class="glyphicon glyphicon-star"></span>  本类热点</h4>
                    <div class="list-group">
                      <foreach name="hotChapter" item="value" >
                          <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}" class="list-group-item" title="{$value.name}" target="_blank">{$value.sub_name}<span>{$value.date}</span></a>
                      </foreach>
                    </div>
                    
                </div>
            </div>
        </div>
        



        
        
        <include file="Public/footer" />

        <include file="Public/footer_js" />




        
  </body>
  </html>  



