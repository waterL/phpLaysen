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
$params = array(
	'account'=>$account,'password'=>md5($password),'ctime'=>time()
);
$result = $db->add('user',$params);
if($result['ret'] == 1){
	json_return(array('ret' => 1 , 'msg' => '恭喜你，添加成功'));
}
json_return(array('ret' => -1 , 'msg' => '添加失败'));
