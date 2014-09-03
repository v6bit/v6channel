<?php
	class LoginAction extends Action{
		function index(){
			$this->display();
		}
		function do_login(){
		//获取用户名和密码，与数据库进行比对
			$username=$_POST['username'];
			$password=$_POST['password'];
			$code=$_POST['code'];
			if($_SESSION['verify']!=md5($code))
			$this->error('code error');
			$m=M('User');
			$where['username']=$username;
			$where['password']=$password;
			$i=$m->where($where)->count();
			if($i>0){
				session('name',$username);
				$this->redirect('Admin/index');
			}else{
				$this->error('username is null');
			}
		}
    }

?>