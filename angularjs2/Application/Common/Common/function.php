<?php

function p($a) {
        echo "<pre>";
        print_r($a);
        echo "</pre>";
}

function Response ($code = '200', $result = array(), $message = null, $options = array()) {
        $result = array('code' => $code, 'msg' => $message, 'data' => $result);
        if (is_array($options)) {
                $result = array_merge($options, $result);
        }
        header('Content-Type: application/javascript; charset=utf-8');
        exit(json_encode($result));
}

/**
 * 获取分页limit
 * @return string  1,10  mysql limit组装
 */
function getPageLimit() {
	$page = isset($_REQUEST['currentPage']) ? $_REQUEST['currentPage'] : 1;
	$num = isset($_REQUEST['num']) ? $_REQUEST['num'] : 10;
	$start = ($page - 1) * $num;
	$limit = $start . ',' . $num;
	return $limit;
}

/**
 * 无限极分类
 * @param array $list
 * @param string $html
 * @param number $pid
 * @param number $level
 * @return Ambigous <multitype:, multitype:string >
 */
function unlimitedForLevel($list, $html='__', $pid=0, $level=0) {
	$arr = array();
	foreach ($list as $v) {
		if ($v['cid'] == $pid) {
			$v['level'] = $level+1;
			$v['html'] = str_repeat($html, $level);
			$arr[] = $v;
			$arr = array_merge($arr,unlimitedForlevel($list, $html, $v['id'], $level+1));
		}
	}
	return $arr;
}

