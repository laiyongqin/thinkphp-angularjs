<?php
/**
 * bbs
 * @author jidi
 *
 */
namespace Common\Model;

use Think\Model;
use Think\Template\Driver\Mobile;

class TieZiModel extends Model {
	protected $tableName = 'tiezi';
	protected $pageNum = 10;

	/**
     * 添加帖子
     * @param string $author 
     * @param string $content
     */
    public function add($author, $content) {
    	$userMode = new Model('user');
    	$userInfo = $userMode->where(array('name'=>$author))->find();
    	if (!empty($userInfo)) {
    		$tieZiData = array(
    			'user_id' => $userInfo['id'],
    			'content' => $content,
    			'create_time' => time()
    		);
    	} else {
    		$userData = array(
    			'name' => $author
    		);
    		$userId = $userMode->add($userData);
    		$tieZiData = array(
    			'user_id' => $userId,
    			'content' => $content,
    			'create_time' => time()
    		);
    	}
    	$tieZiMode = new Model('tiezi');
    	return $tieZiMode->add($tieZiData);
    }
    
    /**
     * 评论
     * @param string $author
     * @param int $tiezi_id
     * @param string $content
     */
    public function doComment($author, $tiezi_id, $content, $cid) {
    	$userMode = new Model('user');
    	$userInfo = $userMode->where(array('name'=>$author))->find();
    	if (!empty($userInfo)) {
    		$data = array(
    			'user_id' => $userInfo['id'],
    			'tiezi_id' => $tiezi_id,
    			'content' => $content,
    			'create_time' => time(),
    			'cid' =>$cid
    		);
    	} else {
    		$userData = array(
    			'name' => $author
    		);
    		$userId = $userMode->add($userData);
    		$data = array(
    			'user_id' => $userId,
    			'tiezi_id' => $tiezi_id,
    			'content' => $content,
    			'create_time' => time(),
    			'cid' =>$cid
    		);
    	}
    	$commentMode = new Model('comment');
    	return $commentMode->add($data);
    }
    
    /**
     * 帖子列表
     * @param number $page
     */
    public function tieList($page = 1, $num = 2) {
    	$start = ($page - 1) * $num;
    	$limit = $start . ',' . $num;
    	$tieZiMode = new Model('tiezi as t');
    	$tieList = $tieZiMode
    			->join('bbs_user as u ON t.user_id = u.id', 'LEFT')
    			->order("create_time desc")
    			->limit($limit)
    			->field('t.*,u.name')
    			->select();
    	return $tieList;
    }
    
    /**
     * 帖子总数
     */
    public function tieTotal() {
    	$tieZiMode = new Model('tiezi');
    	return $tieZiMode->count();
    } 
    
    /**
     * 单个帖子信息
     * @param int $tiezi_id
     */
    public function tieZiInfo($tiezi_id) {
    	$tieZiMode = new Model('tiezi');
    	return $tieZiMode->where(array('id'=>$tiezi_id))->select();
    }
    
    /**
     * 单个帖子的评论
     * @param int $tiezi_id
     */
    public function commentList($tiezi_id) {
    	$commentMode = new Model('comment as c');
    	$commentList = $commentMode
    				->join('bbs_user as u ON c.user_id = u.id', 'LEFT')
    				->where(array('tiezi_id'=>$tiezi_id))
    				->field('c.*,u.name')
    				->select();
    	return unlimitedForLevel($commentList);
    }
    
    
}