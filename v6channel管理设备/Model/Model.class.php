<?php
/*	class Model{
		private $tabName=null;
		private $sql=null;
		private $where=null;
	    function __construct($tabName){
			$this->tabName=$tabName;
			mysql_connect('localhost','root','');
			mysql_select_db('thinkphp');
		}
		function where($_where){
			$this->where=$_where;
			return $this;
		}
		function select(){
			$arr=array();
			$this->sql="select * from tp_".strtolower($this->tabName)." where {$this->where}";
			$result=mysql_query($this->sql);
			if($result && mysql_num_rows($result)>0){
				while($res=mysql_fetch_assoc($result)){
					$arr[]=$res;
				}
			}
			return $arr;
		}
		function getSql(){
			return $this->sql;
		}
	}
	function M($tabName){
			return new Model($tabName);
		}
			
	$m=M('User');
	//$m->where('id>10');
	$arr=$m->where('id>6')->select();
	var_dump($arr);
	echo '<hr/>';
	echo $m->getSql();
*/	
?>