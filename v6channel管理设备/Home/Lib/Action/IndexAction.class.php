<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$m=M("Source");
		$data['state']=1;
		$arr=$m->where($data)->select();
		//$arr=$m->select();

		$this->assign('data',$arr);

		$this->display();
	}
	public function play(){
		$m=M("Source");
		$data['id']=$_GET['id'];
		
		$arr=$m->where($data)->select();
		//var_dump($arr[0]['hash-i']);
		
		$url="v6player://test&ty=8&id=".$arr[0]['hash-i']."&url=".$arr[0]['ip-i'].":".$arr[0]['port-i'];
		//var_dump($arr);
		$this->assign('data',$url);

		$this->display();
	}
	public function playclient(){
		$m=M("Source");
		$data['id']=$_GET['id'];
		
		$arr=$m->where($data)->select();
		//$arr=$m->select();
		//var_dump($arr[0]['hash-i']);
		
		$url="v6player://test&ty=8&id=".$arr[0]['hash-i']."&url=".$arr[0]['ip-i'].":".$arr[0]['port-i'];
		var_dump($url);
		
		header("Location: $url"); 
		//$this->assign('data',$url);

		//$this->display();
	}
	public function rss(){

		$m=M("Source");
		$arr=$m->where('state=1')->select();
		$this->assign('data',$arr);

	  //  $blog = $Blogs->where('status=1')->getField('id,title,description,createTime,userId');

			//print_r($xml);
		$this->display('', 'utf-8', 'text/xml'); 
	
    }

}