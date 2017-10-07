<?php
require '../main.php';
$id = post("id");
$account = post("account");
$password = post("password");
if(empty($id)){
	json_return(array('ret' => -1 , 'msg' => 'id不能为空'));
}
if(empty($account)){
	json_return(array('ret' => -1 , 'msg' => '账号不能为空'));
}
if(empty($password)){
	json_return(array('ret' => -1 , 'msg' => '密码不能为空'));
}
$params = array(
	'account'=>$account,'password'=>md5($password)
);
$where = array('id'=>$id);
$result = $db->edit('user',$where,$params);
if($result['ret'] == 1){
	json_return(array('ret' => 1 , 'msg' => '恭喜你，修改成功'));
}
json_return(array('ret' => -1 , 'msg' => '修改失败'));
