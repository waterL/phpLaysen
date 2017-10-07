<?php
require '../main.php';
$id = post("id");
if(empty($id)){
	json_return(array('ret' => -1 , 'msg' => 'id不能为空'));
}
$result = $db->row('user','account',array('id'=>$id));
if($result['ret'] == 1){
	json_return(array('ret' => 1 , 'msg' => '查询成功','data'=>$result['data']));
}
json_return(array('ret' => -1 , 'msg' => '查询错误'));
