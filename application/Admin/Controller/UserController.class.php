<?php
	namespace  Admin\Controller;
	use Think\Page;//导入分页
	class UserController extends BaseController{
		//批量删除
			public function deletedded()
			{
				//接收id
		$id=$_GET['id'];
		
		$word = explode('.',$id);

		for($i = 0;$i<count($word);$i++){
			$str .= "or id=". $word[$i]." ";
			
		}
		$str = substr($str, 2);
		
		//修改表 state=9
		$arr = M("quanxian")->where("$str")->delete();
		
		if($arr>0){
			$this->success("删除成功",__ROOT__."/admin.php/User/guanli.html");
			exit;
		}else{
			$this->success("删除失败",__ROOT__."/admin.php/User/guanli.html");
			exit;
		}
			}
		//删除权限
		public function deleteded()
		{
			$id = $_GET['id'];
			$re = M("quanxian")->where("id='{$id}'")->delete();
			if ($re > 0) {
				$this->success("删除成功",__ROOT__."/admin.php/User/guanli.html");
				exit;
			}else{
				$this->success("删除失败",__ROOT__."/admin.php/User/guanli.html");
				exit;
			}
		}
		//管理权限
		public function guanli(){
			$arr = M("quanxian")->select();
			$this->assign("arr",$arr);
			$this->display();

		}
		//批量删除
		public function deleted()
		{
		//接收id
		$id=$_GET['id'];
		
		$word = explode('.',$id);

		for($i = 0;$i<count($word);$i++){
			$str .= "or id=". $word[$i]." ";
			
		}
		$str = substr($str, 2);
		
		//修改表 state=9
		$arr = M("admin")->where("$str")->delete();
		
		if($arr>0){
			$this->success("删除成功",__ROOT__."/admin.php/User/lister.html");
			exit;
		}else{
			$this->success("删除失败",__ROOT__."/admin.php/User/lister.html");
			exit;
		}
		}
		//修改
		public function upade()
		{
			
			$id =$_GET['id'];
			$username = $_GET['userName'];
			$password = $_GET['password'];
			
			$tel = $_GET['tel'];
			$result = M()->execute("update admin set username='{$username}',password='{$password}',tel='{$tel}' where id='{$id}'");
			if($result>0){
				$this->success("修改成功",U("Admin/User/lister"));
			}else{
				$this->error("修改失败",U("Admin/User/lister"));
			}
		}
		//修改用户
		public function update(){
			$id =$_GET['id'];
			if($id){
				$arr = M("admin")->where("id=$id")->find();
				
				$this->assign("arr",$arr);
				$info = M("chengqu")->select();
			$this->assign("info",$info);
			}
			$this->display();
		}
		//添加权限
		public function saves(){
			
			$jiaose = $_POST['jiaose'];
			$lovely=join('|',$_POST['lovely']);
			
			$re=M()->execute("insert into quanxian(jiaose,aihao)	value  ('{$jiaose}','{$lovely}')");
			if($re){
				$this->success("添加成功",U("Admin/User/quanxian"));
			}else{
				$this->error("添加失败",U("Admin/User/quanxian"));
			}
			
		}
		//权限添加页面
		public function quanxian(){
			$this->display();
		}
		public function add(){
			//所有单位
			$arr = M("chengqu")->select();
			$this->assign("arr",$arr);
			//所有管理员
			$role = M("quanxian")->select();
			$this->assign("role",$role);
			$this->display();
		}
		public function adur(){
			if($_POST){
				$username = $_POST['userName'];
				$password = $_POST['password'];
				$stint   = $_POST['stint'];
				
 				
				$tel = $_POST['tel'];
				$result = M()->execute("insert into admin(username,password,tel,stint)	value  ('{$username}','{$password}','{$tel}','{$stint}')");
				if($result > 0){
					$this->success("添加用户成功",__ROOT__."/admin.php/User/add");
					exit;
				}else{
					$this->success("添加用户失败",__ROOT__."/admin.php/User/add");
					exit;
				}
			}
		}
		public function lister(){
			//获得总记录数
			$totalRow = M("admin")->where("state<9")->count();
			//实例化分页类
			$page = new Page($totalRow,10);	
			
			$arr = M("admin")->where("state<9")->select();
			$this->assign("arr",$arr);
			$this->assign("pageList",$page->show());//分页栏
			$this->display();
		}
		//删除用户
		public function delete(){
			$id= $_GET['Id'];
			if($id){
				$ret = M()->execute("update admin set state=9 where id=$id");
				if($ret>0){
					$this->success("删除用户成功",__ROOT__."/admin.php/User/lister");
					exit;
				}else{
					$this->success("删除用户失败",__ROOT__."/admin.php/User/lister");
					exit;
				}
			}
				
		}
		public function reseter(){
			
			$this->display();
		}
		//密码验证
		function checkNM(){
			$pwd = $_GET[pwd];
			$username = $_SESSION['user']['username'];
			$info = M("admin")->where("username='{$username}' and password='{$pwd}'")->find();
	
			if($info == NULL){
				echo "<span style='color:red;'>旧密码不对<span>";
			}else{
				echo "<span style='color:green;'>旧密码正确</span>";
			}
		
		}
		//重置密码
		public function save(){
		   $pwd = $_POST['pwd'];
		   $password = $_POST['password'];
		   $username = $_SESSION['user']['username'];
		   $info = M("admin")->where("username='{$username}' and password='{$pwd}'")->find();
		   
			if($info == NULL){
				$this->success("重置密码失败",__ROOT__."/admin.php/User/reseter");
					exit;
			}else{
				M()->execute("update admin set password='{$password}' where username='{$info['username']}'");
				$this->success("重置密码成功",__ROOT__."/admin.php/User/reseter");
				exit;
			}
		} 
	}