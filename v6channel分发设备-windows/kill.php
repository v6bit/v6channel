<?php
//$pid_t=$_GET['pid_t'];
$port_i=$_GET['port_i'];
$port_t=$port_i+1000;
echo $port_i;
echo $port_t;
//$output1=shell_exec("kill -9 $pid_t");
//exec('echo.&taskkill /f /fi "pid eq 1944"');
exec('E:\test.bat '.$port_i);
exec('E:\test.bat '.$port_t);
?>