<?php
	namespace  Admin\Controller;
	class IndexController extends BaseController{
		public function index(){
			$this->display();
		}
		public function top(){
			$this->display();
		}
		public function meun(){
			$this->display();
		}
		public function welcome(){
			$this->display();
		}
		public function logout(){
			unset($_SESSION['user']);
			session_destroy();
			$this->success("退出成功",__ROOT__."/index.php/Index/index");
		}
	}