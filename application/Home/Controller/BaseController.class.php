<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends  Controller
{
	public function _initialize()
	{
		if(isset($_SESSION['user']['id'])&&!empty($_SESSION['user']['id'])){
			$headerIsLogin = "1";
		}else{
			$headerIsLogin = "0";
		}
		$this->assign("headerIsLogin",$headerIsLogin);
	}
	//退出
	function tuichu(){
		unset($_SESSION);
		session_destroy();
		$this->success("退出成功",__APP__);
	}
}