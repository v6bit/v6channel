<?php

$url_t=$_GET['url_t'];
$id=$_GET['id'];
$source_id=$_GET['source_id'];
$ip_i=$_GET['ip_i'];
$port_i=$_GET['port_i'];
$hash_i=$_GET['hash_i'];
$dat=$source_id."_".$id.".dat";
$play_url=$ip_i.":".$port_i;

$output=shell_exec("nohup ./v6Forwarder -i $url_t -h $hash_i -f $dat -l $play_url > /dev/null 2>&1 & echo $!");
echo $output;

?>