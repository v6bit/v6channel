<?php

class UserAction extends Action {
    public function index(){
	$m=M("User","tp_","mysql://root:@localhost:3306/thinkphp");
$where=$m->select();
dump($where);
        $m=M('User');
	$arr=$m->select();
	$this->assign('data',$arr);
	$this->display();
        }
    public function del(){
        $m=M('User');
	$id=$_GET['id'];
	$count=$m->delete($id);
	if($count==0)
		{$this->error('error');}
        else
	        {$this->success('success');}
	}
     public function modify(){
        $id=$_GET['id'];
	$m=M('User');
	$arr=$m->find($id);
	$this->assign('data',$arr);
        $this->display();
	}
     public function update(){
        $m=M('User');
	$data['id']=$_POST['id'];
	$data['username']=$_POST['username'];
	$data['sex']=$_POST['sex'];
	$count=$m->save($data);
	if($count==0)
		{$this->error('error');}
        else
	        {$this->success('success','index');}
        }
     public function add(){
	$this->display();
     }
     public function create(){
        $m=M('User');
     	$data['username']=$_POST['username'];
	    $data['sex']=$_POST['sex'];
	    $count=$m->add($data);
	    if($count==0)
		{$this->error('error');}
        else
	        {$this->success('success','index');}
	
        }
 	public function search(){
	//获取POST的数据，根据数据组装查询的条件，根据条件从数据库黄总获取数据，返回给页面便利
	    $m=M('User');
		if(isset($_POST['username'])&&$_POST['username']!=null){
			$where['username']=array('like',"%{$_POST['username']}%");
		}
		if(isset($_POST['sex'])&&$_POST['sex']!=null){
			$where['sex']=array('eq',$_POST['sex']);
		}
		$arr=$m->where($where)->select();
		$this->assign('data',$arr);
		//var_dump($arr);
		$this->display('index');
	}
	public function show(){
		$m=M('User');
		//$arr=$m->order('id desc')->limit(3,3)->field('username as name,id')->select();
		//$arr=$m->order('id desc')->limit(3,3)->field(array('username'=>'name','id'))->select();
		$arr=$m->order('id desc')->limit(3,3)->field('id',true)->select();
		var_dump($arr);
		$this->display();
	
	}
	
}








