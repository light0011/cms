<?php if (!defined('THINK_PATH')) exit();?><table id="attr"></table>

<div id="attr_tool" style="padding: 5px;">
        <div style="margin-bottom: 5px;">
            <a href="javascript:void(0)" class="easyui-linkbutton" plain='true' iconCls="icon-add" onclick="user_tool.add()">新增</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" plain='true' iconCls="icon-reload" onclick="user_tool.reload()">刷新</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" plain='true' iconCls="icon-remove" onclick="user_tool.remove()">删除</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" plain='true' iconCls="icon-clear" onclick="user_tool.unselect()">取消选择</a>
        </div>
        <div style="">
            查询属性: <input type="text" name="search_attr" class="textbox"  placeholder='请输入属性名称' style="width:200px; padding :5px;">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain='true'  onclick="user_tool.search()">查询</a>
        </div>
</div>
<div id="attr_add">
    <form  style="padding : 10px;" id="add_form">
        <p>属性名称：<input type="text" name="attr" class="textbox" style="width:200px;padding: 5px;"> </p>
        <p>属性简介：<textarea name="info" class="textbox" style="width:200px; padding : 5px; height :100px;"></textarea> </p>
    </form>
</div>

<div id="a">
    <?php echo ($a); ?>
</div>

<script type="text/javascript" src="/CMS2.0/Public/Admin/js/attr.js"></script>