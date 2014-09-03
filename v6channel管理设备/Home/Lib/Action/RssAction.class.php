<?php

class RssAction extends Action {
    public function index(){
		if(!session('name')){
		
			$this->redirect('Login/index');
		}else{
			$m=M("Rss");
			$arr=$m->select();
			$url=$arr[0]['url'];
			//var_dump($arr);
			$xml = simplexml_load_file($url);
			//$xml=$xml->children();
			$data= json_decode(json_encode($xml),TRUE);
			//var_dump($data['v6channel']);
			$xml=$data['v6channel'];
		


			//var_dump($xml);
			$this->assign('xml',$xml);
			$this->assign('data',$arr);
			//var_dump($arr);
			$this->display();
		}
    }
    public function del(){
        $m=M("Rss");
		$id=$_GET['id'];
		$count=$m->delete($id);
		if($count==0)
			{$this->error('error');}
        else
	        {$this->success('success');}
	}
    public function modify(){
        $id=$_GET['id'];
		$m=M("Rss");
		$arr=$m->find($id);
		var_dump($arr);
		$this->assign('data',$arr);
        $this->display();
	}
    public function update(){
        $m=M("Rss");
		$data['id']=$_POST['id'];
		$data['url']=$_POST['url'];

		$count=$m->save($data);
		if($count==0)
			{$this->error('error');}
        else
	        {$this->success('success','index');}
    }
    public function addrss(){
		$m=M("Source");
		//echo "a";
     	$data['source_id']=$_GET["_URL_"][2];
		
		$data['url-t']=$_GET["_URL_"][3]."//".$_GET["_URL_"][4];
			
		//	echo $_GET["_URL_"][2]."<br />";
		//	echo $_GET["_URL_"][3];
		//	echo $_GET["_URL_"][4];
		//echo $_GET['url'];
		//echo $this->_param('url'); 
		
	    $count=$m->add($data);
	    if($count==0)
		{$this->error('error');}
        else
	    {$this->success('订阅成功，可返回v6channel管理页面查看');}
	
     
    }
    public function create(){
        $m=M("Rss");
     	$data['url']=$_POST['url'];

	    $count=$m->add($data);
	    if($count==0)
		{$this->error('error');}
        else
	        {$this->success('success','index');}
	
    }
	
}








