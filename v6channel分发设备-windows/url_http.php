<?php

$url_t=$_GET['url_t'];
$id=$_GET['id'];
$source_id=$_GET['source_id'];
$ip_i=$_GET['ip_i'];
$port_i=$_GET['port_i'];
$hash_i=$_GET['hash_i'];
$dat=$source_id."_".$id.".dat";
$bat=$source_id."_".$id.".bat";
$play_url=$ip_i.":".$port_i;

//$abc="echo C:\\wamp\\www\\v6Channel.exe -i ".$url_t." -h ".$hash_i." -f ".$dat." -l ".$play_url.">".$bat;
//echo $abc;

//$fp=popen($abc,"r");
//pclose($fp);
//$output=exec("start /b v6Channel.exe -i $url_t -h $hash_i -f $dat -l $play_url");
//echo $output;
$fp=popen("start /B v6Channel.exe -i $url_t -h $hash_i -f $dat -l $play_url","r");
pclose($fp);
?>