<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>后台管理</title>
	<link rel="stylesheet" type="text/css" href="/angularjs2/Public/css/common.css"/>
	<link rel="stylesheet" type="text/css" href="/angularjs2/Public/css/main.css"/>
	<script type="text/javascript" language="javascript" src="/angularjs2/Public/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="/angularjs2/Public/js/style.js"></script>
	<!-- 对话框的 css 和 js -->
	<link rel="stylesheet" href="/angularjs2/Public/css/boxy.css" type="text/css" />
	<script type="text/javascript" src="/angularjs2/Public/js/jquery.boxy.js"></script>
	<!-- 滑动条 -->
	<script src="/angularjs2/Public/js/jquery.mCustomScrollbar.min.js"></script>
	<link href="/angularjs2/Public/css/jquery.mCustomScrollbar.css" rel="stylesheet" />
</head>
<body>
<div class="header">
	<div class="header_logo fl"><a href="#"><img src="/angularjs2/Public/images/logo.png"></a></div>
	<div class="header_menu">
		<ul>
			<li><a href="#" class="astyle">网站首页</a></li>
		</ul>
	</div>
	<div class="header_user">
		<ul>
		</ul>
	</div>
</div>

<div class="container clearfix" id="container_height">
	<div class="container-left">
		<div class="container-left-title">帖子列表</div>
		<ul class="sidebar-list">
			<li><a href="/angularjs2/index.php/Home/Index/index">列表</a></li>
		</ul>
	</div>

	<div class="container-right">
		<div class="container-right-title">
			当前位置：首页&nbsp;&gt;&nbsp;系统管理
		</div>

		<div class="result-wrap">
			<div class="result-content">
				<table class="">
					<tr>
						<th>标题：<span id="showTitle">新开的帖子</span></th>
						<td></td>
					</tr>
					<tr id="showComment"></tr>
					
					<div style="display:none;"></div>
						<tr>
							<th>作者：</th>
							<td><input class="w300" name="" value="" type="text" id="author"></td>
						</tr>
						<tr>
							<th>内容：</th>
							<td><textarea cols="60" rows="8" name="" id="content"></textarea></td>
						</tr>
						<tr>
							<th></th>
							<td>
								<input class="butstyle mr10 bg1" value="提交" type="submit" onclick="addTie()">
							</td>
						</tr>
						<input  name="" value="<?php echo ($tiezi_id); ?>" type="hidden" id="tiezi_id">
						<input  name="" value="" type="hidden" id="comment_id">
				</table>
			</div>
		</div>

	</div>
</div>

<div class="footer">
	<div>版权所有&nbsp;&copy;&nbsp;2014-2015&nbsp;上海猎鹰网络有限公司&nbsp;并保留所有权利</div>
</div>
<script>
	//添加帖子
	function addTie() {
		var author = $("#author").val();
		var content = $("#content").val();
		var tiezi_id = $("#tiezi_id").val();
		var cid = $("#comment_id").val();
		if (author == '') {
			alert('作者不能为空');return;
		}
		if (content == '') {
			alert('内容不能为空');return;
		}
		$.post('/angularjs2/index.php/Home/Index/doComment', {author:author, content:content, tiezi_id:tiezi_id, cid:cid}, function(data){
			if (data.code=90200) {
				window.location.href = "/angularjs2/index.php/Home/Index/index";
			} else {
				alert(data.msg);
			}
		});
	}
	
	$(function(){
		var req = {}
	    req.tiezi_id = $("#tiezi_id").val();
		$.post("/angularjs2/index.php/Home/Index/tieZiInfo", req, function(res){
			if (res.code == 90200) {
				$.each(res.data, function (n, j) {
					$("#showTitle").html(j.content);
	            });
			}
		}, 'json');
		
		$.post("/angularjs2/index.php/Home/Index/commentList", req, function(res){
			if (res.code == 90200) {
				var str = '';
				$.each(res.data, function (n, j) {
					str += '<tr><th></th><td><span>'+j.html+j.name+':</span>'+j.content+'&nbsp;&nbsp;<span onclick="comment('+j.id+');">回复<span></td></tr>';
					$("#showComment").html(str);
	            });
			}
		}, 'json');
	})
	
	//格式化时间戳
	function getTime(time) {
		var date = new Date(time*1000);
		Y = date.getFullYear() + '-';
		M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
		D = date.getDate() + ' ';
		h = date.getHours() + ':';
		m = date.getMinutes() + ':';
		s = date.getSeconds(); 
		return (Y+M+D+h+m+s);
	}
	
	function comment(id) {
		$("#comment_id").val(id);
	}
</script>
</body>
</html>