<?php
session_start();
date_default_timezone_set('PRC'); 
class Index{
	public $db;
	public function main(){
		header("Content-type:text/html;charset=utf-8");
		require 'function.php';
		require 'db.php';
		$this->db = new Db;
		$this->db->connect();
	}

	// 查询
	public function row($dao , $field = '*' , $where = ''){
		if(empty($dao)){
			return array('ret' => -1 , 'msg' => '参数错误');
		}
		$res = $this->db->row($dao , $field , $where);
		if($res['data']){
			return array('ret' => 1 , 'msg' => 'success' , 'data' => $res['data']);
		}
		return array('ret' => -2 , 'msg' => '当前没有数据' , 'data' => $res['data']);
	}

	// 分页
	public function page($dao , $field = '*' , $where = '', $page = 1, $perpage = 10 , $order = "id desc" , $like = ''){
		if(empty($dao)){
			return array('ret' => -1 , 'msg' => '参数错误');
		}
		$res = $this->db->page($dao , $field , $where , $page , $perpage , $order , $like);
		if($res['data']){
			return array('ret' => 1 , 'msg' => 'success' , 'data' => $res['data'] , 'nums' => $res['nums']);
		}
		return array('ret' => -2 , 'msg' => '当前没有数据' , 'data' => $res['data']);
	}

	// 全部
	public function all($dao , $field = '*' , $where = '', $order = "id desc"){
		if(empty($dao)){
			return array('ret' => -1 , 'msg' => '参数错误');
		}
		$res = $this->db->all($dao , $field , $where , $order);
		if($res['data']){
			return array('ret' => 1 , 'msg' => 'success' , 'data' => $res['data']);
		}
		return array('ret' => -2 , 'msg' => '当前没有数据' , 'data' => $res['data']);
	}

	// 添加
	public function add($dao , $params = array()){
		if(empty($dao) || empty($params)){
			return array('ret' => -1 , 'msg' => '参数错误');
		}
		$res = $this->db->add($dao , $params);
		if($res['data']){
			return array('ret' => 1 , 'msg' => 'success' , 'data' => $res['data']);
		}
		return array('ret' => -2 , 'msg' => '当前没有数据' , 'data' => $res['data']);
	}

	// 修改
	public function edit($dao , $where = array() , $params = array()){
		if(empty($dao) || empty($where) || empty($params)){
			return array('ret' => -1 , 'msg' => '参数错误');
		}
		$res = $this->db->edit($dao , $where , $params);
		if($res['data']){
			return array('ret' => 1 , 'msg' => 'success' , 'data' => $res['data']);
		}
		return array('ret' => -2 , 'msg' => '当前没有数据' , 'data' => $res['data']);
	}

	// 删除
	public function delete($dao , $where = array()){
		if(empty($dao)){
			return array('ret' => -1 , 'msg' => '参数错误');
		}
		$res = $this->db->delete($dao , $where);
		if($res['data']){
			return array('ret' => 1 , 'msg' => 'success' , 'data' => $res['data']);
		}
		return array('ret' => -2 , 'msg' => '当前没有数据' , 'data' => $res['data']);
	}

	// sql查询
	public function query($sql){
		if(empty($sql)){
			return array('ret' => -1 , 'msg' => '参数错误');
		}
		$res = $this->db->query($sql , $type = 1);
		if($res['data']){
			return array('ret' => 1 , 'msg' => 'success' , 'data' => $res['data']);
		}
		return array('ret' => -2 , 'msg' => '当前没有数据' , 'data' => $res['data']);
	}

}
$db = new Index;
$db->main();
