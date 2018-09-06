<?php
	namespace Admin\Controller;
	use Think\Upload;//导入上传类
	use Think\Page;
	class RotationController extends BaseController{

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
		$arr = M("bless")->where("$str")->delete();
		
		if($arr>0){
			$this->success("彻底删除导航成功",__ROOT__."/admin.php/Rotation/listRota.html");
			exit;
		}
		}
		//专项活动
		public function zhuanxiang(){
			$zx = M("articles")->field("imagepath,id")->where("id=159")->find();
			$this->assign("zx",$zx);
			$this->display();
		}
		//修改专项活动
		public function update(){
			$id = $_GET['id'];
			$this->assign("id",$id);
			$this->display();
		}
		//进行修改
		public function saves(){
			//上传导航
			$upload=new \Think\Upload();
			//设置
			$upload->mimes=array('image/png','image/gif','image/jpeg');
			$upload->autoSub=false;
			$upload->rootPath="./public/";
			$upload->savePath="show/";
			$upload->saveName=array('uniqid',array(mt_rand(1000,9999),true));
			//保存导航
			$imageRe=$upload->upload();
			
			$image=$imageRe['myFile']['savename'];
			// $result = $model->where()->save(一维关联数组);
			$result = M()->execute("update articles set imagepath='show/".$image."' where id=159");
			if($result>0){
				$this->success("修改专项活动成功",__ROOT__."/admin.php/Rotation/zhuanxiang");
				exit;
			}else{
				$this->success("添加专项活动失败",__ROOT__."/admin.php/Rotation/zhuanxiang");
				exit;
			}
			
		}
		//添加前台轮播图
		public function addRotation()
		{
			$newsType = M("navtypes")->select();
			$this->assign("newsType",$newsType);
			$this->display();
		}
		public function add(){

			$imagepath = $_POST['imagepath'];//导航
			$title     = $_POST['title'];
			$typeId = $_POST['typeId'];
			
				$result = M()->execute("insert into bless(imagepath,title,typeId)	value  ('{$imagepath}','{$title}','{$typeId}')");
			
			if($result > 0)
			{
				
				$this->success("添加导航成功",__ROOT__."/admin.php/Rotation/addRotation");
				exit;
			}else
			{
				$this->success("添加导航失败",__ROOT__."/admin.php/Rotation/addRotation");
				exit;
			}
		} 
		//导航
		public function listRota(){
			//获取总记录数
			$totalRow=M("bless")->count();
			//实例化分页类
			$page = new Page($totalRow,10);
			$Img = M("bless")->limit("$page->firstRow,$page->listRows")->select();
			$this->assign("Img",$Img);
			$this->assign("pageList",$page->show());//分页栏
			$this->display();
		}
		//删除导航
		public function delete()
		{
			$id=$_GET['id'];
			
			$re = M(bless)->where("id=$id")->delete();
			if($re>0){
				
				
				$this->success("删除成功",U("Admin/Rotation/listRota"));
			}else{
				
				$this->success("删除失败",U("Admin/Rotation/listRota"));
			}
		}
	}	