<?php
$id=$_GET['id'];
$source_id=$_GET['source_id'];
$ip_t=$_GET['ip_t'];
//$port_t=$_GET['port_t'];
$hash_t=$_GET['hash_t'];
$ip_i=$_GET['ip_i'];
$port_i=$_GET['port_i'];
$hash_i=$_GET['hash_i'];
 
$port_t=$port_i+1000;
//$http_url='http://127.0.0.1:8085/e5a12c7ad2d8fab33c699d1e198d66f79fa61321';

$http_url="http://127.0.0.1:".$port_t."/".$hash_t;
$dat=$source_id."_".$id.".dat";
$play_url=$ip_i.":".$port_i;


$output1=shell_exec("nohup ./v6Forwarder -t $ip_t -h $hash_t -p -k -g 127.0.0.1:$port_t > /dev/null 2>&1 & echo $!");
sleep(1);
$output2=shell_exec("nohup ./v6Forwarder -i $http_url -h $hash_i -f $dat -l $play_url > /dev/null 2>&1 & echo $!");


//$output1=shell_exec('nohup ./v6Channel -t 211.68.70.178:7065 -h e5a12c7ad2d8fab33c699d1e198d66f79fa61630 -p -k -g 127.0.0.1:8990 > /tmp/out 2>&1 & echo $!');
//sleep(1);
//$output2=shell_exec('nohup ./v6Channel -i http://127.0.0.1:8990/e5a12c7ad2d8fab33c699d1e198d66f79fa61630 -h e5a12c7ad2d8fab33c699d1e198d66f79fa61225 -f storage5.dat -l 0.0.0.0:7015 > /tmp/out2 2>&1 & echo $!');

//$output=shell_exec('nohup ./v6Channel -i http://2001:da8:215:4070:18cf:548d:12ca:ede7:8082/CCTV5 -h e5a12c7ad2d8fab33c699d1e198d66f79fa61225 -f storage5.dat -l 0.0.0.0:7015 > /tmp/out 2>&1 & echo $!');
//$output=shell_exec('kill -9 21911');

echo $output1.'+'.$output2;

?>