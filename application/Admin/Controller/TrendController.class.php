<?php
	namespace  Admin\Controller;
	class TrendController extends BaseController{
		//应用系统 和 信息查询
		public function system()
		{
			$optionStr=getTypes();
			$this->assign('optionStr',$optionStr);
			$this->display();
		}
		//批量删除系统
		public function deletedd()
		{
			//接收id
			$id=$_GET['id'];
		
			$word = explode('.',$id);
		
			for($i = 0;$i<count($word);$i++){
				$str .= "or id=". $word[$i]." ";
					
			}
			$str = substr($str, 2);
		
			//修改表 state=9
			$arr = M("system")->where("$str")->delete();
		
			if($arr>0){
				$this->success("彻底删除成功",__ROOT__."/admin.php/Trend/systemoper.html");
				exit;
			}
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
		$arr = M("trend")->where("$str")->delete();
		
		if($arr>0){
			$this->success("彻底删除成功",__ROOT__."/admin.php/Trend/oper.html");
			exit;
		}
		}
		//进行修改
		public function usave(){
			$id = (int)$_POST['id'];
			$re = M("trend")->where("id=$id")->data($_POST)->save();
			$this->redirect("__ROOT__/admin.php/Trend/oper");
		}
	public function usaved(){
			$id = (int)$_POST['id'];
			$re = M("system")->where("id=$id")->data($_POST)->save();
			$this->redirect("__ROOT__/admin.php/Trend/systemoper");
		}
		//修改
		public function update(){
			$id = (int)$_GET['id'];
			$arr = M("trend")->where("id=$id")->find();
			$str = getTypen();
			$this->assign('str',$str);
			$this->assign("arr",$arr);
			
			$this->display();
		}
		public function updated(){
			$id = (int)$_GET['id'];
			$arr = M("system")->where("id=$id")->find();
			$str = getTypes();
			$this->assign('str',$str);
			$this->assign("arr",$arr);
				
			$this->display();
		}
		//添加页面
		public  function add(){
			$optionStr=getTypen();
			$this->assign('optionStr',$optionStr);
			$this->display();
			
		}
		public function save(){
			$ob=M('trend');
			$re=$ob->data($_POST)->add();
			if($re){
				$this->success("添加成功",U("Admin/Trend/add"));
			}else{
				$this->error("添加失败",U("Admin/Trend/add"));
			}
		}
		public function saves(){
			$ob=M('system');
			$re=$ob->data($_POST)->add();
			if($re){
				$this->success("添加成功",U("Admin/Trend/system"));
			}else{
				$this->error("添加失败",U("Admin/Trend/system"));
			}
		}
		public function oper(){
			$arr = getTypeByArr();
			$this->assign("arr",$arr);
			$this->display();
		}
		public function systemoper(){
			$arr = getTypeByArrd();
			$this->assign("arr",$arr);
			$this->display();
		}
		//删除
		//删除图片
		public function delete()
		{
			$id=$_GET['id'];
				
			$re = M("trend")->where("id=$id")->delete();
			if($re>0){
				
		
				$this->success("删除成功",U("Admin/Trend/oper"));
			}else{
		
				$this->success("删除失败",U("Admin/Trend/oper"));
			}
		}
		public function deleteded(){
		$id=$_GET['id'];
		
		$re = M("system")->where("id=$id")->delete();
		if($re>0){
		
		
			$this->success("删除成功",U("Admin/Trend/systemoper"));
		}else{
		
			$this->success("删除失败",U("Admin/Trend/systemoper"));
		}
	}
	}