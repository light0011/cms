<!doctype html>
  <html lang="en">
  <head>
      <include file="Public/head" />
      <link rel="stylesheet" type="text/css" href="__JS__/uploadify/uploadify.css">
      <link rel="stylesheet" type="text/css" href="__CSS__/bootstrapValidator.css">
      <link rel="stylesheet" type="text/css" href="__CSS__/index.css">
  </head>
  <body>
        
        
        <include file="Public/header" />
        
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
                        
                        <foreach name="ad" item="value">
                            <div class="item ad">
                              <img src="{$value.url}" alt="...">
                              <div class="carousel-caption">
                                <h2>{$value.title}</h2>
                                <p>{$value.content}</p>
                              </div>
                            </div>
                        </foreach>


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
                              <foreach name="newestSeven" item="value" >
                                  <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}" class="list-group-item" title="{$value.name}" target="_blank">{$value.sub_name}<span>{$value.date}</span></a>
                              </foreach>
                              
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="page-header"><span class="glyphicon glyphicon-flag"></span>  特别推荐</h4>
                            <div class="list-group">
                                <foreach name="recommendChapter" item="value" >
                                    <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}" class="list-group-item" title="{$value.name}" target="_blank">{$value.sub_name}<span>{$value.date}</span></a>
                                </foreach>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 member_login">
                        <h4 class="page-header"><span class="glyphicon glyphicon-user"></span>  会员信息</h4>

                        <if condition="$userValue eq 1 ">
                            <div class="a"><p>您好<strong>{$frontUser.username}</strong> ，欢迎光临</p></div>
                            <div class="b">
                              
                                  <img src="{$frontUser.face}" alt="{$frontUser.username}" />
                            
                              <div class="user_link">
                                  <a href="{:U('User/logout')}" class="btn btn-primary">退出登录</a>
                              </div>
                              
                            </div>
                            <else /> 
                                <div class="login_button">
                                    <div class="alert alert-success" role="alert">提示：会员登录之后方可对文章进行评论！！！</div>
                                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#login_modal">会员登录</button>
                                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#register_modal">注册会员</button>
                                </div>
                        </if>
                        


                        <h4 class="page-header"><span class="glyphicon glyphicon-object-align-left"></span>  最近登录会员</h4>
                        <foreach name="frontSixUser" item="value" >
                                  <dl class="col-md-4 user_image">
                                      <dt>
                                          <img src="{$value.face}" alt="">
                                          <p>{$value.username}</p>
                                      </dt>
                                      <dd></dd>
                                  </dl>
                        </foreach>
                        

                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="col-md-4">
                <h4 class="page-header"><span class="glyphicon glyphicon-bullhorn"></span>   {$fourNavChapter[0]['name']}</h4>
                <div class="list-group news_title">
                  <foreach name="fourNavChapter[0]['child']" item="value">
                      <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}" target="_blank" class="list-group-item">{$value.sub_name}<span>{$value.date}</span></a>
                  </foreach>
                </div>
                <h4 class="page-header"><span class="glyphicon glyphicon-globe"></span>  {$fourNavChapter[2]['name']}</h4>
                <div class="list-group news_title">
                  <foreach name="fourNavChapter[2]['child']" item="value">
                      <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}"  target="_blank" class="list-group-item">{$value.sub_name}<span>{$value.date}</span></a>
                  </foreach>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="page-header"><span class="glyphicon glyphicon-leaf"></span>  {$fourNavChapter[1]['name']}</h4>
                <div class="list-group news_title">
                  <foreach name="fourNavChapter[1]['child']" item="value">
                      <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}" target="_blank" class="list-group-item">{$value.sub_name}<span>{$value.date}</span></a>
                  </foreach>
                </div>
                <h4 class="page-header"><span class="glyphicon glyphicon-magnet"></span>  {$fourNavChapter[3]['name']}</h4>
                <div class="list-group news_title">
                  <foreach name="fourNavChapter[3]['child']" item="value">
                      <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}" target="_blank" class="list-group-item">{$value.sub_name}<span>{$value.date}</span></a>
                  </foreach>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="page-header"><span class="glyphicon glyphicon-hand-up"></span>  本月热点</h4>
                <div class="list-group">
                  <foreach name="hotChapter" item="value" >
                      <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}" class="list-group-item" title="{$value.name}" target="_blank">{$value.sub_name}<span>{$value.date}</span></a>
                  </foreach>
                </div>
                <h4 class="page-header"><span class="glyphicon glyphicon-comment"></span>  本月评论</h4>
                <div class="list-group">
                  <foreach name="commentChapter" item="value" >
                      <a href="{:U('Chapter/oneChapter',array('id'=>$value['id']))}" class="list-group-item" title="{$value.name}" target="_blank">{$value.sub_name}<span>{$value.date}</span></a>
                  </foreach>
                </div>

                <h4 class="page-header"><span class="glyphicon glyphicon-heart-empty"></span>  调查投票</h4>
                <div class="list-group vote">
                    <div style="border:1px solid #ccc;border-radius: 3px;">
                        <div class="alert alert-info" role="alert"><h3>{$vote['title']['title']}</h3></div>
                            <foreach name="vote['item']" item="value">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="vote" id="vote1" value="{$value.id}" >
                                    {$value.title}
                                  </label>
                                </div>
                            </foreach>
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
                    
                  <foreach name="vote['item']" item="value">
                    <h4>{$value.title}</h4>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {$value.percent}">
                        <span class="">{$value.percent}</span>
                      </div>
                    </div>
                  </foreach>
                 
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
                          <label for="verify" >验证码:</label><span style="color: red">(上传图片大小为72px*72px)</span>
                          <input type="text" class="form-control" id="verify" name="verify" placeholder="请输入验证码">
                    </div>
                    <img src="{:U('Verify/verify2')}" alt=""  class="register_img">
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
                            <img src="{:U('Verify/verify1')}" alt="" class="login_img" >
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
  


        <include file="Public/modal" />
        <include file="Public/footer" />

        <include file="Public/footer_js" />
        <script type="text/javascript" src="__JS__/index.js"></script>


        
  </body>
  </html>  



