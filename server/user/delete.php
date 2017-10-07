<?php
require '../main.php';
$id = post("id");
if(empty($id)){
	json_return(array('ret' => -1 , 'msg' => 'id不能为空'));
}
$result = $db->delete('user',array('id'=>$id));
if($result['ret'] == 1){
	json_return(array('ret' => 1 , 'msg' => '恭喜你，删除成功'));
}
json_return(array('ret' => -1 , 'msg' => '删除失败'));
