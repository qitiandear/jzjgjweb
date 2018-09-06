<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	public function login(){
		$this->display();
	}
	public function check(){
		 
		//判断用户名密码是否正确
		$re = M("admin")->where("username='".$_POST['username']."' and password='".$_POST['password']."'")->find();
		//创建会话变量
		if($re){
			$_SESSION['user'] = $re;
		
				
		if($_SESSION['user']['stint']==1){
				$this->redirect("__ROOT__/admin.php/Index/index");
			}else if($_SESSION['user']['stint']==2){
				$this->redirect("__ROOT__/admin.php/Admin/index");
			}else{ 
			$this->redirect("__ROOT__/admin.php/Login/login");
			}
			
		}else{
			$this->redirect("__ROOT__/admin.php/Login/login");
		}
	}	
	
}