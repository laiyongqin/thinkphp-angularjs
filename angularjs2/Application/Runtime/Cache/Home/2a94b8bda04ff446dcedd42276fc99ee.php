<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>后台管理</title>
	<link rel="stylesheet" type="text/css" href="/angularjs2/Public/css/common.css"/>
	<link rel="stylesheet" type="text/css" href="/angularjs2/Public/css/main.css"/>
	<script type="text/javascript" language="javascript" src="/angularjs2/Public/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="/angularjs2/Public/js/page.js"></script>
	<script type="text/javascript" language="javascript" src="/angularjs2/Public/js/style.js"></script>
	<!-- 对话框的 css 和 js -->
	<link rel="stylesheet" href="/angularjs2/Public/css/boxy.css" type="text/css" />
	<script type="text/javascript" src="/angularjs2/Public/js/jquery.boxy.js"></script>
	<script type="text/javascript" src="/angularjs2/Public/js/jquery.mCustomScrollbar.min.js"></script>
	
	<link rel="stylesheet" href="/angularjs2/Public/angularjs/page.css" type="text/css" />
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
		
	</div>
</div>

<div class="container clearfix" id="container_height">
	<div class="container-left">
		<div class="container-left-title">帖子列表</div>
		<ul class="sidebar-list">
			<li><a href="#">列表</a></li>
		</ul>
	</div>

	<div class="container-right">
		<div class="container-right-title">
			当前位置：首页&nbsp;&gt;&nbsp;系统管理
		</div>

		<div class="result-wrap">
			<div class="result-title">
				<div class="result-list">
					<div class="result-list-left">
						<a href="/angularjs2/index.php/Home/Index/add"><input type="button" class="butstyle mr10 bg1" value="新增留言" onclick=""></a>
					</div>
					<div class="result-list-right">
					</div>
				</div>
			</div>

			<div class="result-content" ng-app="tieZiListApp" ng-controller="tieList">
				<table class="result-tab" width="100%" >
					<tr>
						<th>ID</th>
						<th>作者</th>
						<th>内容</th>
						<th>时间</th>
						<th>操作</th>
					</tr>
						<tr ng-repeat="y in tieZiList track by y.id">
							<td>{{y.id}}</td>
							<td>{{y.name}}</td>
							<td>{{y.content}}</td>
							<td>{{ y.create_time * 1000 | date:'yyyy-MM-dd' }}</td>
							<td>
								<a href="/angularjs2/index.php/Home/Index/comment?tiezi_id={{y.id}}" class="c1">回复</a>
							</td>
						</tr>
				</table>
				<div class="result-content-page">
					<div class="result-list">
						<div class="result-list-right">
							<tm-pagination conf="paginationConf"></tm-pagination>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="footer">
	<div>版权所有&nbsp;&copy;&nbsp;2014-2015&nbsp;上海猎鹰网络有限公司&nbsp;并保留所有权利</div>
</div>
</body>
<input  name="" value="1" type="hidden" id="page">
<script src="/angularjs2/Public/angularjs/angular.min.js"></script>
<script src="/angularjs2/Public/angularjs/tm.pagination.js"></script>
<script>

	angular.module('tieZiListApp', ['tm.pagination'], angularSetting).controller('tieList', function($scope, $timeout, $http){
		$scope.req = {}
		$scope.req.currentpage = 1;
		$scope.req.num = 5;
		$scope.paginationConf = {
			currentPage: 1,
			totalItems: 20,
			itemsPerPage: 5,
			pagesLength: 5,
			perPageOptions: [10, 20, 30, 40, 50],
			onChange: function(){
				$scope.req.currentpage = $scope.paginationConf.currentPage;
				$scope.req.num = $scope.paginationConf.itemsPerPage;
				$http.post('/angularjs2/index.php/Home/Index/tieList', $scope.req).success(function(response) {
	                	if (response.code == 90200 && response.data !='') {
	                		$scope.tieZiList = response.data;
		                    $scope.paginationConf.totalItems = response.pageList.totalItems;
		                    $scope.paginationConf.currentPage = response.pageList.currentPage;
	                	}
	                })
			}
		};
    })
	
	//angular设置
	function angularSetting($httpProvider) {
		// Use x-www-form-urlencoded Content-Type
	  $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
	  var param = function(obj) {
	    var query = '', name, value, fullSubName, subName, subValue, innerObj, i;      
	    for(name in obj) {
	      value = obj[name];
	      if(value instanceof Array) {
	        for(i=0; i<value.length; ++i) {
	          subValue = value[i];
	          fullSubName = name + '[' + i + ']';
	          innerObj = {};
	          innerObj[fullSubName] = subValue;
	          query += param(innerObj) + '&';
	        }
	      }
	      else if(value instanceof Object) {
	        for(subName in value) {
	          subValue = value[subName];
	          fullSubName = name + '[' + subName + ']';
	          innerObj = {};
	          innerObj[fullSubName] = subValue;
	          query += param(innerObj) + '&';
	        }
	      }
	      else if(value !== undefined && value !== null)
	        query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
	    }
	      
	    return query.length ? query.substr(0, query.length - 1) : query;
	  };
	 
	  // Override $http service's default transformRequest
	  $httpProvider.defaults.transformRequest = [function(data) {
	    return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
	  }];
	}
</script>
</html>