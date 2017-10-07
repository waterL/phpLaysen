<?php
require '../main.php';
$result = $db->page('user','id,account');
if($result['ret'] == 1){
	json_return(array('ret' => 1 , 'msg' => 'success' , 'list' => $result['data']));
}
json_return(array('ret' => -1 , 'msg' => '数据为空'));
