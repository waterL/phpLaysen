<?php
require '../main.php';
$account = post("account");
$password = post("password");
if(empty($account)){
	json_return(array('ret' => -1 , 'msg' => '账号不能为空'));
}
if(empty($password)){
	json_return(array('ret' => -1 , 'msg' => '密码不能为空'));
}
$result = $db->row('user','id,password',array('account'=>$account));
if($result['ret'] == 1){
	if($result['data']['password'] == md5($password)){
		$_SESSION['account'] = $account;
		$_SESSION['id'] = $result['id'];
		json_return(array('ret' => 1 , 'msg' => '恭喜你，登录成功'));
	}
}
json_return(array('ret' => -1 , 'msg' => '账号或密码错误'));
