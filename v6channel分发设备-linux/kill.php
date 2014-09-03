<?php
if($_GET['pid_t']==0&&$_GET['pid_i']!=0){
	//$pid_t=$_GET['pid_t'];
	$pid_i=$_GET['pid_i'];
	//$output1=shell_exec("kill $pid_t");
	$output2=shell_exec("kill -9 $pid_i");
}
if($_GET['pid_t']!=0&&$_GET['pid_i']!=0){
	$pid_t=$_GET['pid_t'];
	$pid_i=$_GET['pid_i'];
	$output1=shell_exec("kill -9 $pid_t");
	$output2=shell_exec("kill -9 $pid_i");
}
?>