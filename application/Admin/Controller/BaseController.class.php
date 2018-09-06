<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
	public function _initialize(){
		//用户是否登录
		if(!isset($_SESSION['user'])){
			//跳转
			$this->redirect("__ROOT__/admin.php/Login/login");
		if($_SESSION['user']['stint']==1){
			$this->redirect("__ROOT__/admin.php/Index/index");
		}elseif($_SESSION['user']['stint']==2){
			$this->redirect("__ROOT__/admin.php/Admin/index");
		}else{
			$this->redirect("__ROOT__/admin.php/Login/login");
		}
		}
		
		
	}
	
}