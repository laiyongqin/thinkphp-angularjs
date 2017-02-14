<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index() {
    	$this->display();
    }

    public function add() {
    	$this->display();
    }

	/**
	 * 帖子添加
	 */
    public function doAdd() {
    	if (IS_POST) {
    		$author = I('author');
    		$content = I('content');
    		if (empty($author)) {
    			Response(90404, '作者不能为空', array());
    		}
    		if (empty($content)) {
    			Response(90404, '内容不能为空', array());
    		}
    		$tieZiMode = D('Common/TieZi');
    		if ($responseData = $tieZiMode->add($author, $content)) {
    			Response(90200, $responseData, '操作成功');
    		} else {
    			Response(90400, $responseData, '操作失败，请重试');
    		}
    	}
    }
    
    /**
     * 帖子评论
     */
    public function doComment() {
    	if (IS_POST) {
    		$author = I('author');
    		$tiezi_id = intval(I('tiezi_id'));
    		$content = I('content');
    		$cid = I('cid');
    		if (empty($author)) {
    			Response(90404, '作者不能为空', array());
    		}
    		if (empty($tiezi_id)) {
    			Response(90404, '帖子id不能为空', array());
    		}
    		if (empty($content)) {
    			Response(90404, '内容不能为空', array());
    		}
    		$tieZiMode = D('Common/TieZi');
    		if ($responseData = $tieZiMode->doComment($author, $tiezi_id, $content, $cid)) {
    			Response(90200, $responseData,'操作成功');
    		} else {
    			Response(90400, $responseData, '操作失败，请重试');
    		}
    	}
    }
    
    /**
     * 帖子列表
     */
    public function tieList() {
    	if (IS_POST) {
    		$page = I('currentpage');
    		$num = I('num');
    		$tieZiMode = D('Common/TieZi');
    		if ($responseData = $tieZiMode->tieList($page, $num)) {
    			if ($responseData) {
    				$count = $tieZiMode->tieTotal();
    				Response(90200, $responseData, '操作成功', array('pageList'=>array('totalItems'=>$count, 'currentPage'=>$page)));
    			}
    		} else {
    			Response(90400, $responseData, '操作失败，请重试');
    		}
    	}
    }
    
    /**
     * 评论
     */
    public function comment() {
    	$tiezi_id = intval(I('tiezi_id'));
    	$this->assign('tiezi_id', $tiezi_id);
    	$this->display();
    }
    
    /**
     * 单个帖子信息
     */
    public function tieZiInfo() {
    	if (IS_POST) {
    		$tiezi_id = I('tiezi_id');
    		if (empty($tiezi_id)) {
    			Response(90404, '帖子id不能为空', array());
    		}
    		$tieZiMode = D('Common/TieZi');
    		if ($responseData = $tieZiMode->tieZiInfo($tiezi_id)) {
    			Response(90200, $responseData, '操作成功');
    		} else {
    			Response(90400, $responseData, '操作失败，请重试');
    		}
    	}
    }
    
    /**
     * 帖子评论列表
     */
    public function commentList() {
    	if (IS_POST) {
    		$tiezi_id = I('tiezi_id');
    		if (empty($tiezi_id)) {
    			Response(90404, '帖子id不能为空', array());
    		}
    		$tieZiMode = D('Common/TieZi');
    		if ($responseData = $tieZiMode->commentList($tiezi_id)) {
    			Response(90200, $responseData, '操作成功');
    		} else {
    			Response(90400, $responseData, '操作失败，请重试');
    		}
    	}
    }

}