<?php

class AdminAction extends Action {
    public function index(){
		if(!session('name')){
		
			//$this->error('先登录');
			$this->redirect('Login/index');
		}else{
			$m=M("Source");
			$arr=$m->order('id DESC')->select();
			$m2=M("Address");
			$arr2=$m2->select();
			$this->assign('data',$arr);
			$this->assign('ip',$arr2);
			//	var_dump($arr);
			//var_dump($arr2);
			$this->display();
		}
    }
	public function rss(){
		if(!session('name')){
		
			//$this->error('先登录');
			$this->redirect('Login/index');
		}else{
			//$m=M("Rss");
			//$arr=$m->where('state=1')->select();
			//$this->assign('data',$arr);
			$xml = simplexml_load_file("http://localhost/iptv123vtpi/index.php/Index/Rss");
			//$xml=$xml->children();
			foreach($xml->children() as $v6channel)
			{
				echo $v6channel->getName() . "<br />";
			  
			  
			  
				//echo $xml->getName() . "<br />";

				foreach($v6channel->children() as $child)
				  {
				  echo $child->getName() . ": " . $child . "<br />";
				  }
			}
		  //  $blog = $Blogs->where('status=1')->getField('id,title,description,createTime,userId');

				//print_r($xml);
				//$this->display('', 'utf-8', 'text/xml'); 
		}
    }
    public function del(){
        $m=M("Source");
		$id=$_GET['id'];
		$count=$m->delete($id);
		if($count==0)
			{$this->error('error');}
        else
	        {$this->success('success');}
	}
     public function modify(){
        $id=$_GET['id'];
		$m=M("Source");
		$arr=$m->find($id);
		$m2=M("Address");
		$arr2=$m2->select();
		$this->assign('ip',$arr2);
		var_dump($arr);
		$this->assign('data',$arr);
        $this->display();
	}
    public function update(){
        $m=M("Source");
		$data['id']=$_POST['id'];
		$data['url-t']=$_POST['url-t'];
		$data['source_id']=$_POST['source_id'];
		
		$data['ip-i']=$_POST['ip-i'];
		$data['port-i']=$_POST['port-i'];

		$data['iptv-image']=$_POST['iptv-image'];
		$count=$m->save($data);
		if($count==0)
			{$this->error('error');}
        else
	        {$this->success('success','index');}
    }

     public function create(){
        $m=M("Source");
     	$data['source_id']=$_POST['source_id'];
		
		$data['url-t']=$_POST['url-t'];
		
		$data['ip-i']=$_POST['ip-i'];
		$data['port-i']=$_POST['port-i'];
		
		$data['iptv-image']=$_POST['iptv-image'];
		//$_POST['image'];

		
	    $count=$m->add($data);
	    if($count==0)
		{$this->error('error');}
        else
	        {$this->success('success','index');}
	
        }

	public function start(){
        $id=$_GET['id'];
		$m=M("Source");
		$arr=$m->find($id);
		//var_dump($arr);
		//var_dump($arr['url-t']);
		$source_id=$arr['source_id'];

		$url_t=$arr['url-t'];
		$ip_i=$arr['ip-i'];
		$port_i=$arr['port-i'];
		$time=date('y-m-d h:i:s',time());
		$hash_i=sha1($url_t.$time);
		
		//echo 
		$str=substr($url_t,0,4);
		if($str=="v6pl"){
			//echo 
			echo $hash_t=substr($url_t,24,40);
			echo $ip_t=substr($url_t,69);
		
			//$url="http://".$ip_i."?source_id=".$source_id."&hash_i=".$hash_i;
			$url="http://".$ip_i.":7000/url_v6player.php?source_id=".$source_id."&ip_t=".$ip_t."&hash_t=".$hash_t."&port_i=".$port_i."&hash_i=".$hash_i."&ip_i=".$ip_i."&id=".$id;
			$contents = file_get_contents($url); 
			$contents = str_replace("\n","",$contents);
			echo $contents;
			$arr=explode("+",$contents);
			echo $arr[0];
			echo "+";
			echo $arr[1];
			
					
			$data['id']=$id;
			$data['pid-t']=$arr[0];
			$data['pid-i']=$arr[1];
			$data['state']=1;
			$data['hash-i']=$hash_i;
			$count=$m->save($data);
			if($count==0)
				{$this->error('error');}
			else
				{$this->success('success');}
		}
		
		if($str=="http"){
			//echo 
			//echo $hash_t=substr($url_t,24,40);
			//echo $ip_t=substr($url_t,69);
		
			//$url="http://".$ip_i."?source_id=".$source_id."&hash_i=".$hash_i;
			$url="http://".$ip_i.":7000/url_http.php?url_t=".$url_t."&source_id=".$source_id."&port_i=".$port_i."&hash_i=".$hash_i."&ip_i=".$ip_i."&id=".$id;
			$contents = file_get_contents($url); 
			$contents = str_replace("\n","",$contents);
			echo $contents;
			//$arr=explode("+",$contents);
			//echo $arr[0];
		//	echo "+";
		//	echo $arr[1];
					
			$data['id']=$id;

			$data['pid-i']=$contents;
			$data['state']=1;
			$data['hash-i']=$hash_i;
			$count=$m->save($data);
			if($count==0)
				{$this->error('error');}
			else
				{$this->success('success');}
		}

			
	}
	
	public function close(){
        $id=$_GET['id'];
		$m=M("Source");
		$arr=$m->find($id);

		//var_dump($arr);


		$ip_i=$arr['ip-i'];
		$pid_t=$arr['pid-t'];
		$pid_i=$arr['pid-i'];
		$port_i=$arr['port-i'];
		
		$url="http://".$ip_i.":7000/kill.php?pid_t=".$pid_t."&pid_i=".$pid_i."&port_i=".$port_i;
		$contents = file_get_contents($url); 
		//$contents = str_replace("\n","",$contents);
		echo $contents;

		
		$data['id']=$id;
		$data['pid-t']=0;
		$data['pid-i']=0;
		$data['state']=0;
		$data['hash-i']="";
		$count=$m->save($data);
		if($count==0)
			{$this->error('error');}
        else
	        {$this->success('success');}
	}
	public function check(){
        //$id=59;//$_GET['id'];
		$m=M("Source");
		$arr=$m->where('state=1')->select();

		//var_dump($arr);
		//echo "aa";
		
		foreach($arr as $x=>$x_value) {
			//echo "Key=" . $x . ", Value=" . $x_value;
			foreach($x_value as $y=>$y_value) {
				//echo "Key=" . $y . ", Value=" . $y_value;
				//echo "<br>";
			}
			$port_i=$x_value['port-i'];
			$ip_i=$x_value['ip-i'];
			
			$url="http://".$ip_i.":7000/check.php?port_i=".$port_i;
			$contents = file_get_contents($url); 
			//$contents = str_replace("\n","",$contents);
		/*	echo $contents;
			echo "<br>";
			$aa=strpos($contents,"z");
			echo $aa;
			if($aa==false){
				echo "false";
				
				//$r = think_send_mail('767059157@qq.com','ThinkPHP','文件标题','邮件内容');
			echo $r;
			}
			echo "<<";
			echo "<br>";
        */
		}

	}
}








