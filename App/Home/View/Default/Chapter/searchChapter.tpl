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
              <li class="active">搜索</li>
            </ol>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <foreach name="searchChapter"  item="value">
                        <div class="media list_news">
                          <div class="media-left">
                            <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}">
                              <img class="media-object" src="{$value.thumb}" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><span class="label label-info">{$value.navname}</span><a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}">{$value.name}</a></h4>
                            <p>{$value.info}</p>
                          </div>
                        </div>
                    </foreach>

    

                </div>
                
            </div>
        </div>
        



        
        
        <include file="Public/footer" />

        <include file="Public/footer_js" />




        
  </body>
  </html>  



