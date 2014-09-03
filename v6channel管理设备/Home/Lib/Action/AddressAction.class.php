<?php

class AddressAction extends Action {
    public function index(){
		if(!session('name')){
		
			//$this->error('�ȵ�¼');
			$this->redirect('Login/index');
		}else{
			$m=M("Address");
			$arr=$m->select();
			$this->assign('data',$arr);
			//var_dump($arr);
			$this->display();
		}
    }
    public function del(){
        $m=M("Address");
		$id=$_GET['id'];
		$count=$m->delete($id);
		if($count==0)
			{$this->error('error');}
        else
	        {$this->success('success');}
	}
     public function modify(){
        $id=$_GET['id'];
		$m=M("Address");
		$arr=$m->find($id);
		var_dump($arr);
		$this->assign('data',$arr);
        $this->display();
	}
    public function update(){
        $m=M("Address");
		$data['id']=$_POST['id'];
		$data['ip']=$_POST['ip'];
		$data['description']=$_POST['description'];
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
        $m=M("Address");
     	$data['ip']=$_POST['ip'];
	    $data['description']=$_POST['description'];
	    $count=$m->add($data);
	    if($count==0)
		{$this->error('error');}
        else
	        {$this->success('success','index');}
	
        }
 	public function search(){
	//��ȡPOST�����ݣ�����������װ��ѯ���������������������ݿ���ܻ�ȡ���ݣ����ظ�ҳ�����
	    $m=M("Address");
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

	
}








