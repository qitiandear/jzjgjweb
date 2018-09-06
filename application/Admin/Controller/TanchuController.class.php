<?php
	namespace  Admin\Controller;
	use Think\Upload;//导入上传类
	use Think\Page;//导入分页
	class TanchuController extends BaseController{
		//shixina
		public function updatederd(){
			//获取表单提交的数据
			$id = $_GET['articleId'];
			$content = $_POST['content'];//新闻正文
			$title = $_POST['title'];//新闻标题
		
			$result = M()->execute("update bless set title='{$title}',content='{$content}' where id='{$id}'");
			if($result > 0)
			{
				$this->success("修改成功",__ROOT__."/admin.php/Tanchu/operer");
				exit;
			}else
			{
				$this->success("修改失败",__ROOT__."/admin.php/Tanchu/index/articleId/{$articleId}");
				exit;
			}
		}
		//修改
		public  function saves()
		{

			$id = $_GET['id'];
				
			$title = $_POST['title'];
			$imagepath = "";//文章图片
			 
			//上传图片
			$upload=new \Think\Upload();
			//设置
			$upload->mimes=array('image/png','image/gif','image/jpeg');
			$upload->autoSub=false;
			$upload->rootPath="./public/";
			$upload->savePath="newspicture/";
			$upload->saveName=array('uniqid',array(mt_rand(1000,9999),true));
			//保存图片
			$imageRe=$upload->upload();
			
			$image=$imageRe['myFile']['savename'];
			if ($image){
				$result = M()->execute("update tanchu set typeName='{$title}',imagepath='newspicture/".$image."' where id='{$id}'");
		
			}else if($imagepath==NULL)
			{
				$result = M()->execute("update tanchu set typeName='{$title}' where id='{$id}'");
			}
			

			if($result > 0){
				$this->success("修改成功",__ROOT__."/admin.php/Tanchu/oper.html");
				exit;
			}else{
				$this->success("修改失败",__ROOT__."/admin.php/Tanchu/oper.html");
				exit;
			}
		}
		//批量删除飘窗
		public function deleted(){
			$id = $_GET['id'];
				$word = explode('.',$id);
				for ($i=0; $i <count($word) ; $i++) { 
					$str .= "or id=".$word[$i]." ";
				}
				$str = substr($str,2);
				//删除表
				$arr = M("tanchu")->where("$str")->delete();
				if($arr > 0){
					$this->success("删除成功",__ROOT__."/admin.php/Tanchu/oper.html");
				exit;
				}else{
					$this->success("删除失败",__ROOT__."/admin.php/Tanchu/oper.html");
				exit;
				}
		}
		public function add(){
			$this->display();
		}
		public function adds()
		{

			
				
			$title = $_POST['title'];
			
			$imagepath = "";//文章图片
			 
			//上传图片
			$upload=new \Think\Upload();
			//设置
			$upload->mimes=array('image/png','image/gif','image/jpeg');
			$upload->autoSub=false;
			//设置保存路径的根目录
		    $upload->rootPath = "./";
		    //保存路径
		    $upload->savePath = "public/newspicture/";
			$upload->saveName=array('uniqid',array(mt_rand(1000,9999),true));
			
			 //上传文件
		    $myFile = $_FILES["myFile"];
		    $Path = $upload->uploadOne($myFile);
			if ($Path) {
				$result = M()->execute("insert into tanchu(typeName,imagepath)	value  ('{$title}','newspicture/{$Path['savename']}')");
		
			}else if ($imagepath==NULL)
			{
				$result = M()->execute("insert into tanchu(typeName) value  ('{$title}')");
			}
		if($result > 0)
			{
				
				$this->success("添加飘窗成功",__ROOT__."/admin.php/Tanchu/add");
				exit;
			}else
			{
				$this->success("添加飘窗失败",__ROOT__."/admin.php/Tanchu/add");
				exit;
			}

				
		}
		public function update()
		{
			$id = $_GET['id'];
			$arr = M("tanchu")->where("id={$id}")->find();
			$this->assign("arr",$arr);
			$this->display();
		}
public function delete(){
	$id = $_GET['id'];
			if($id){
			$sql2 = M()->execute("delete from tanchu where id={$id}");
			if($sql2 > 0){
				$this->success("删除成功",__ROOT__."/admin.php/Tanchu/oper");
				}else{
				$this->success("删除失败",__ROOT__."/admin.php/Tanchu/oper");


				}
			}
}

		public function oper(){
			$info = M("tanchu")->select();
			$this->assign("info",$info);
			$this->display();
		}
		public function adder(){
			$newsType = M("tanchu")->select();
			$this->assign("newsType",$newsType);
			$this->display();
			
		}
		public function addnew()
		{
			//获取表单提交的数据
			$content = $_POST['content'];//文章正文
			$title = $_POST['title'];//文章标题
			$tcId = $_POST['typeId'];
			
			
			
			
			$imagepath = "";//文章图片
			 
			//上传图片
			$upload=new \Think\Upload();
			//设置
			$upload->mimes=array('image/png','image/gif','image/jpeg');
			$upload->autoSub=false;
			//设置保存路径的根目录
		    $upload->rootPath = "./";
		    //保存路径
		    $upload->savePath = "public/newspicture/";
			$upload->saveName=array('uniqid',array(mt_rand(1000,9999),true));
			
			 //上传文件
		    $myFile = $_FILES["myFile"];
		    $Path = $upload->uploadOne($myFile);
			if ($Path) {
				$result = M()->execute("insert into bless(content,title,tcId,imagepath)	value  ('{$content}','{$title}','{$tcId}','newspicture/{$Path['savename']}')");
		
			}else if ($imagepath==NULL)
			{
				$result = M()->execute("insert into bless(content,title,tcId)	value  ('{$content}','{$title}','{$tcId}')");
			}
		
			if($result > 0)
			{
				
				$this->success("添加成功",__ROOT__."/admin.php/Tanchu/adder");
				exit;
			}else
			{
				$this->success("添加失败",__ROOT__."/admin.php/Tanchu/adder");
				exit;
			}
		}
		public function operer(){
			//获得总记录数
			$totalRow = M("bless")->count();
			//实例化分页类
			$page = new Page($totalRow,10);	
$newsInfo =	M()->query("select b.title,b.id,b.dateandtime,b.tcId,t.typeName from bless b join tanchu t on t.id=b.tcId order by b.id desc");
			$this->assign("pageList",$page->show());//分页栏
			$this->assign("newsInfo",$newsInfo);
			$this->display();
		}
		public function index()
		{
			$id = $_GET['articleId'];
			$new =	M("bless")->field("bless.id,bless.title,bless.content,bless.dateandtime,tanchu.typeName")->join("tanchu on bless.tcId=tanchu.id")->where("bless.id={$id}")->find();
		
			$this->assign("new",$new);
			$this->display();
		}
		public function Recycling($articleId)
		{
			$sql = M("bless")->where("id={$articleId}")->delete();
			
			
			 if($sql>0){
				
				$this->success("删除文章成功",__ROOT__."/admin.php/Tanchu/operer");	
			}else{
				$this->success("删除文章失败",__ROOT__."/admin.php/Tanchu/operer");
				
			} 
		}
	//批量删除
		public function deletedded()
		{
			$id = $_GET['id'];
				$word = explode('.',$id);
				for ($i=0; $i <count($word) ; $i++) { 
					$str .= "or id=".$word[$i]." ";
				}
				$str = substr($str,2);
				//删除表
				$arr = M("bless")->where("$str")->delete();
				if($arr > 0){
					$this->success("删除成功",__ROOT__."/admin.php/Tanchu/operer.html");
				exit;
				}else{
					$this->success("删除失败",__ROOT__."/admin.php/Tanchu/operer.html");
				exit;
				}
		}
	}