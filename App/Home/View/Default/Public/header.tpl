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
                      <li class="active"><a href="{:U('Index/index')}">首页</a></li>
                      <foreach name="frontTenNav" item="value" >
                           <li><a href="{:U('List/index',array('id'=>$value['id']))}">{$value.name}</a></li>
                      </foreach>
                  </ul>     
              </div>
          </div>
        </nav>
        
        <div class="container nav_tab">
            <div class="row">
                <div class="col-md-4">
                    <form class="form-inline" action="{:U('Chapter/searchChapter')}" method="post">
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
                    <foreach name="tags" item="value">
                        <a href="{:U('Chapter/searchTag',array('tag'=>$value['name']))}" target="_blank">{$value.name} <span class="badge">{$value.count}</span></a>
                    </foreach>
                </div>
            </div>
        </div>