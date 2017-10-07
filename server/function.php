<?php
function json_return($arr = array()){
	echo json_encode($arr);exit;
}

function p($arr = array()){
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

function post($val = ''){
	return isset($_POST[$val])?$_POST[$val]:'';
}

function get($val = ''){
	return isset($_GET[$val])?$_GET[$val]:'';
}