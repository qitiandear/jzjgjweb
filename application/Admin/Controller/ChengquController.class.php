<?php
	namespace Admin\Controller;

	use Think\Page;//导入分页
	class ChengquController extends BaseController{
		//进行修改
		public function saves()
		{
			$id = $_GET['id'];

			$fname = $_POST['fname'];
			$re = M()->execute("update chengqu set fname='{$fname}' where id='{$id}'");

			if($re > 0){
				$this->success("修改单位成功",__ROOT__."/admin.php/Chengqu/oper.html");
				exit;
			}else{
				$this->success("修改单位失败",__ROOT__."/admin.php/Chengqu/oper.html");
				exit;
			}
		}
		//修改页面
		public function update()
		{
			$id = $_GET['id'];
			$arr = M("chengqu")->where("id={$id}")->find();
			$this->assign("arr",$arr);
			$this->display();
		}
		//批量删除
			public function deleted()
			{
				$id = $_GET['id'];
				$word = explode('.',$id);
				for ($i=0; $i <count($word) ; $i++) { 
					$str .= "or id=".$word[$i]." ";
				}
				$str = substr($str,2);
				//删除表
				$arr = M("chengqu")->where("$str")->delete();
				if($arr > 0){
					$this->success("删除单位成功",__ROOT__."/admin.php/Chengqu/oper.html");
				exit;
				}else{
					$this->success("删除单位失败",__ROOT__."/admin.php/Chengqu/oper.html");
				exit;
				}
			}
			public function add(){

				$this->display();
			}
			public function adds()
			{
				if($_POST){
					$fname = $_POST['fname'];
					$re = M()->execute("insert into chengqu(fname) value ('{$fname}')");
					if($re){
						$this->success("添加单位成功",__ROOT__."/admin.php/Chengqu/add.html");
					exit;					
				}else{
					$this->success("添加单位错误",__ROOT__."/admin.php/Chengqu/add.html");
					exit;
				}

				}
			}
		//管理单位列表
		public function oper()
		{
			//获得总记录数
			$totalRow = M("chengqu")->where("state<9")->count();
			//实例化分页类
			$page = new Page($totalRow,15);	
			$arr = M("chengqu")->limit($page->firstRow,$page->listRows)->select();
			$this->assign("pageList",$page->show());//分页栏
			$this->assign("arr",$arr);
			$this->display();
		}
		//删除
		public function delete()
		{
			$id = $_GET['id'];
			if($id){
			$sql2 = M()->execute("delete from chengqu where id={$id}");
			if($sql2 > 0){
				$this->success("删除单位成功",__ROOT__."/admin.php/Chengqu/oper");
				}else{
				$this->success("删除单位失败",__ROOT__."/admin.php/Chengqu/oper");


				}
			}
		}

	}