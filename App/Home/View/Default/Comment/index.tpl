<!doctype html>
  <html lang="en">
  <head>
      <include file="Public/head" />
      <link rel="stylesheet" type="text/css" href="__CSS__/comment.css">
  </head>
  <body>
        

        <include file="Public/header" />
        
        <div class="container">
            <div class="col-md-8">
                <div class="page-header">
                  <h3><a href="{:U('Chapter/oneChapter',array('id'=>$commentChapter['id']))}">{$commentChapter.name} </a><small>评论文章</small></h3>
                </div>
                  <div class="page-header comment_page">
                      <h4>已有{$chapterCommentCount}条评论</h4>
                    </div>
                  <empty name="hotThreeComment">
              
                  <else /> 
                    <div class="alert alert-danger" role="alert">最火评论</div>
                      <foreach name="hotThreeComment" item="value">
                        
                        <div class="media">
                          <div class="media-left">
                            <a href="javascript:void(0)">
                              <img class="media-object" src="{$value.face}" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading">{$value.name}</h4>
                            <p>{$value.content}</p>
                            <span>{$value.create}</span>
                            <button type="button" class="btn btn-success btn-xs manner support" comment="{$value.id}">支持(<em>{$value.support}</em>)</button>
                            <button type="button" class="btn btn-danger btn-xs manner oppose" comment="{$value.id}">反对(<em>{$value.oppose}</em>)</button>
                            <!-- <input type="hidden" class="comment_id" value=""> -->
                          </div>
                        </div>
                    </foreach>
                  </empty>
                    



                      <div class="alert alert-info" role="alert" >最新评论</div>
                      <foreach name="chapterComment" item="value">
                          
                          <div class="media">
                            <div class="media-left">
                              <a href="javascript:void(0)">
                                <img class="media-object" src="{$value.face}" alt="...">
                              </a>
                            </div>
                            <div class="media-body">
                              <h4 class="media-heading">{$value.name}</h4>
                              <p>{$value.content}</p>
                              <span>{$value.create}</span>
                              <button type="button" class="btn btn-success btn-xs manner support" comment="{$value.id}">支持(<em>{$value.support}</em>)</button>
                              <button type="button" class="btn btn-danger btn-xs manner oppose" comment="{$value.id}">反对(<em>{$value.oppose}</em>)</button>
                              <!-- <input type="hidden" class="comment_id" value=""> -->
                            </div>
                          </div>
                      </foreach>


                <div class="page">
                        {$page}
                </div>
            </div>

            <div class="col-md-4">
                <div class="page-header">
                  <h3>总评论文档排行榜 <small>20条</small></h3>
                      <div class="list-group">
                        <foreach name="hotTwentyChapter" item="value">
                            <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}" class="list-group-item" title="{$value.sub_name}">{$value.sub_name}<span>{$value.date}</span></a>
                        </foreach>
                      </div>
                </div>
            </div>
          
         </div>
        

        
        <include file="Public/modal" />
        <include file="Public/footer" />

        <include file="Public/footer_js" />
        <script type="text/javascript" src="__JS__/chapter.js"></script>



        
  </body>
  </html>  



