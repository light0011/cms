<!doctype html>
  <html lang="en">
  <head>
      <include file="Public/head" />
      <link rel="stylesheet" type="text/css" href="__CSS__/chapter.css">
  </head>
  <body>
        
        
        <include file="Public/header" />
        <div class="container">
            <ol class="breadcrumb">
              <li><a href="{:U('Index/index')}">首页</a></li>
              <li><a href="{:U('List/index',array('id'=>$oneChapter['oneNav']['id']))}">{$oneChapter['oneNav']['name']}</a></li>
              <li><a href="{:U('List/index',array('id'=>$oneChapter['twoNav']['id']))}">{$oneChapter['twoNav']['name']}</a></li>

              <li class="active">{$oneChapter.name}</li>
            </ol>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 acticle">
                      <h3>{$oneChapter.name}</h3>
                      <div class="d1"><span>时间：{$oneChapter.date}</span><span>来源：{$oneChapter.source}</span><span>作者：{$oneChapter.author}</span>   <span>点击量：{$oneChapter.read_count} 次</span></div>
                      <div class="d2">
                      <p>{$oneChapter.info}</p>
                      </div>
                      <div class="d3">
                        {$oneChapter.content}
                      </div>
                      <div class="d4">
                        TAG标签：
                        <foreach name="oneChapter['tag']" item="value">
                            
                            <a class="btn btn-success tag"  href="{:U('Chapter/searchTag',array('tag'=>$value))}" target="_blank" >{$value}</a>
                        </foreach>
                      </div>
                      <div class="d5">

                          <if condition="$oneChapter['commend'] eq 1 ">

                              <form id="comment" >
                                <input type="hidden" name="chapter_id" value="{$oneChapter.id}">
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
                                
                            
                                  <if condition="$userValue eq 1 ">
                                    <button type="submit" class="btn btn-success">发表评论</button>
                                  <else />
                                      <a href="{:U('Index/index')}" type="button" class="btn btn-info" target="_blank">请先登录，方可发表言论</a>
                                  </if>
                               </form>

                          <else /> 
                              
                                  <div class="alert alert-warning" role="alert">该文章禁止评论！</div>

                          </if>
    
                      </div>

                      <div class="d6">
                        <if condition="$oneChapter['commend'] eq 1 ">
                            <div class="page-header comment_page">
                              <h4>已有{$chapterCommentCount}条评论<small>
                              <if condition="$chapterCommentCount gt 0">
                                  <a href="{:U('Comment/index',array('cid'=>$oneChapter['id']))}">查看全部评论</a></small></h4>
                              </if>
                            </div>
                              <foreach name="newThreeComment" item="value">
                                  
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
                          <else />
                        </if>
                          

                      </div>

                </div>
                <div class="col-md-4">
                    
                    
                    <h4 class="page-header"><span class="glyphicon glyphicon-heart"></span>  本类推荐</h4>
                    <div class="list-group">
                      <foreach name="chapterRecommend" item="value" >
                          <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}" class="list-group-item" title="{$value.name}" target="_blank">{$value.sub_name}<span>{$value.date}</span></a>
                      </foreach>
                    </div>
                    <h4 class="page-header"><span class="glyphicon glyphicon-star"></span>  本类热点</h4>
                    <div class="list-group">
                      <foreach name="chapterHot" item="value" >
                          <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}" class="list-group-item" title="{$value.name}" target="_blank">{$value.sub_name}<span>{$value.date}</span></a>
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



