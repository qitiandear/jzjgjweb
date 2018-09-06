<?php
	namespace Admin\Controller;
	use Think\Upload;//导入上传类
	use Think\Page;//导入分页
	class AddNewsController extends BaseController{
		//通过审核
		public function Audit($articleId)
		{
			$sql = M()->execute("update articles set state=8 where id={$articleId}");
			
			
			 if($sql>0){
				
				$this->success("审核文章成功",__ROOT__."/admin.php/AddNews/listwews");	
			}else{
				$this->success("审核文章失败",__ROOT__."/admin.php/AddNews/listwews");
				
			} 
		}
		//未审核
		public function listwews(){
			//获得总记录数
			$totalRow = M("articles")->where("state=0")->count();
			//实例化分页类
			$page = new Page($totalRow,10);	
			$newsInfo = M("articles")->where("state=0")->join("types on types.typeId=articles.typeId")->order("articles.id desc")->limit($page->firstRow,$page->listRows)->select();
			$this->assign("pageList",$page->show());//分页栏
			$this->assign("newsInfo",$newsInfo);
			
			$this->display();
		
		}
		//已审核
		public function listyews(){
			//获得总记录数
			$totalRow = M("articles")->where("state=8")->count();
			//实例化分页类
			$page = new Page($totalRow,10);	
			$newsInfo = M("articles")->where("state=8")->join("types on types.typeId=articles.typeId")->order("articles.id desc")->limit($page->firstRow,$page->listRows)->select();
			$this->assign("pageList",$page->show());//分页栏
			$this->assign("newsInfo",$newsInfo);
			$this->display();
		
		}
		//彻底删除
		public function deleterd()
		{
				//接收id
		$id=$_GET['id'];
		
		$word = explode('.',$id);

		for($i = 0;$i<count($word);$i++){
			$str .= "or id=". $word[$i]." ";
			
		}
		$str = substr($str, 2);
		
		//修改表 state=9
		$arr = M("articles")->where("$str")->delete();
		
		if($arr>0){
			$this->success("彻底删除文章成功",__ROOT__."/admin.php/AddNews/listrecycle.html");
			exit;
		}else{
			$this->success("彻底删除文章失败",__ROOT__."/admin.php/AddNews/listrecycle.html");
			exit;
		}
		}
		//删除
		public  function deleted()
		{
			//接收id
		$id=$_GET['id'];
		
		$word = explode('.',$id);

		for($i = 0;$i<count($word);$i++){
			$str .= "or id=". $word[$i]." ";
			
		}
		$str = substr($str, 2);
		
		//修改表 state=9
		$arr = M()->execute("update articles set state=9  where $str");
		
		if($arr>0){
			$this->success("删除文章成功",__ROOT__."/admin.php/AddNews/listnews.html");
			exit;
		}
		
		
		
		}
		//huanyuan
		public function  huanyuan(){
			$id = $_GET['id'];
			
			$re = M()->execute("update articles set state=0 where id={$id}");
			if($re > 0){
				$this->success("还原文章成功",__ROOT__."/admin.php/AddNews/listrecycle.html");
				exit;
			}else{
				$this->success("还原文章失败",__ROOT__."/admin.php/AddNews/listrecycle.html");
				exit;
			}
		}
		//搜索
		public function search($search='',$keyword='',$date=''){
		
		$keyword=I('get.keyword');
		$str=trim($keyword);
		$str=strip_tags($keyword);
		$str=stripslashes($keyword);
		$str=addslashes($keyword);
		$str=rawurldecode($keyword);
		$str=quotemeta($keyword);
		$str=htmlspecialchars($keyword);
		$keyword=preg_replace("/\+|\*|\`|\/|\-|\$|\#|\^|\!|\@|\%|\&|\~|\^|\[|\]|\'|\"/", "", $str);//去除特殊符号+*`/-$#^~!@#$%&[]'"
		if($keyword)
		{
			
			//$res=M('classroom')->where( "title like '%{$search}%' or content like '%{$search}%'")->select();
			$Info = M('articles')->where("{$search} like '%{$keyword}%'")->join("types on types.typeId=articles.typeId")->order("articles.id desc")->select();
			$totalRow = count($Info);
			$page = new Page($totalRow,10);
			$newsInfo = M('articles')->where("{$search} like '%{$keyword}%'")->join("types on types.typeId=articles.typeId")->order("articles.id desc")->limit($page->firstRow,$page->listRows)->select();
				
			$this->assign("pageList",$page->show());//分页栏
			$this->assign("newsInfo",$newsInfo);
			$this ->display();
		}
		else
		{
			$newsInfo='';
			$this->assign("newsInfo",$newsInfo);
			$this ->display();
		}
		}
		/* public  function search($search='',$keyword='')
		{
			$keyword = str_replace("%","\%",$keyword);
			$keyword = str_replace("_","\_",$keyword);
			
			//获得总记录数
			$totalRow = count($Info);
			$map['keyword'] = $keyword;
			//实例化分页类
			$map['keyword'] = array('LIKE', I('s').'%');
			//$map['name'] = array('LIKE', I('s').'%');
			foreach($map as $key=>$val) {
				$Page->parameter .= "$key=".urlencode(keyword)."&";//赋值给Page
			}
			$page = new Page($totalRow,10);
			$Page->parameter = array_map('urlencode',$map);
			$newsInfo = M('articles')->where("{$search} like '%{$keyword}%'")->join("types on types.typeId=articles.typeId")->order("articles.id desc")->limit($page->firstRow,$page->listRows)->select();
			$this->assign("pageList",$page->show());//分页栏
			$this->assign("newsInfo",$newsInfo);
			$this ->display();
		} */
		//发表文章
		public function addnews(){
			
			$newsType = M("types")->select();
			$this->assign("newsType",$newsType);
			$this->display();
		}
		//添加文章
		public function  addnew($content='',$title='',$typeId='',$state='',$date="")
		{
			
			//获取表单提交的数据
			$content = $_POST['content'];//文章正文
			$title = $_POST['title'];//文章标题
			$typeId = $_POST['typeId'];
			
			$date = $_POST['date'];//文章时间
			$userId = $_SESSION['user']['id'];
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
			$upload->saveName=array('uniqid');
			
			 //上传文件
		    $myFile = $_FILES["myFile"];
		    $Path = $upload->uploadOne($myFile);

			if ($Path) {
				$result = M()->execute("insert into articles(content,title,typeId,imagepath,date,userId)	value  ('{$content}','{$title}','{$typeId}','newspicture/{$Path['savename']}','{$date}','{$userId}')");
		
			}else if ($imagepath==NULL)
			{
				$result = M()->execute("insert into articles(content,title,typeId,date,userId) value  ('{$content}','{$title}','{$typeId}','{$date}','{$userId}')");
			}
		
			if($result > 0)
			{
				M()->execute("update types set articleNum=articleNum+1 where typeId={$typeId}");
				$this->success("添加文章成功",__ROOT__."/admin.php/AddNews/addnews");
				exit;
			}else
			{
				$this->success("添加文章失败",__ROOT__."/admin.php/AddNews/addnews");
				exit;
			}
		}
		//文章列表
		public function listnews(){
			//获得总记录数
			$totalRow = M("articles")->where("state<9")->count();
			//实例化分页类
			$page = new Page($totalRow,10);	
			$newsInfo = M("articles")->where("state<9")->join("types on types.typeId=articles.typeId")->order("articles.id desc")->limit($page->firstRow,$page->listRows)->select();
			$this->assign("pageList",$page->show());//分页栏
			$this->assign("newsInfo",$newsInfo);
			$this->display();
		
		}
		//删除文章将state设置为9
		public function Recycling($articleId)
		{
			$sql = M()->execute("update articles set state=9 where id={$articleId}");
			
			
			 if($sql>0){
				
				$this->success("删除文章成功",__ROOT__."/admin.php/AddNews/listnews");	
			}else{
				$this->success("删除文章失败",__ROOT__."/admin.php/AddNews/listnews");
				
			} 
		}
		//文章回收站
		public function listrecycle(){
			//获得总记录数
			$totalRow = M("articles")->where("state=9")->count();
			//实例化分页类
			$page = new Page($totalRow,10);
			$newsInfo = M("articles")->where("state=9")->join("types on types.typeId=articles.typeId")->order("articles.id asc")->limit($page->firstRow,$page->listRows)->select();
			$this->assign("pageList",$page->show());//分页栏
			$this->assign("newsInfo",$newsInfo);
			$this->display();
		}
		//彻底删除文章
		public function delete($articleId)
		{
			$sql2 = M()->execute("delete from articles where id={$articleId}");
			if($sql2 > 0)
			{	
				$q = M("articles")->where("id={$articleId}")->find();
				M()->execute("update types set articleNum=articleNum-1 where typeId={$q['typeId']}");
				$this->success("彻底删除文章成功",__ROOT__."/admin.php/AddNews/listnews");
				
			}else
			{
				$this->success("彻底删除文章成功",__ROOT__."/admin.php/AddNews/listnews");
				
			}
		
		}
		//文章修改页
		public function index()
		{	
			$articleId = $_GET['articleId'];
			$new =	M()->query("select * from articles  a inner join types b where id={$articleId} and a.typeId=b.typeId");
			$this->assign("new",$new);
			$this->display();
		}
		//修改新闻
		public function update()
		{
			//获取表单提交的数据
			$articleId = $_GET['articleId'];
			$content = $_POST['content'];//新闻正文
			$title = $_POST['title'];//新闻标题
			
			$result = M()->execute("update articles set title='{$title}',content='{$content}' where id='{$articleId}'");
			if($result > 0)
			{
				$this->success("修改新闻成功",__ROOT__."/admin.php/AddNews/listnews");
				exit;
			}else
			{
				$this->success("修改新闻失败",__ROOT__."/admin.php/AddNews/index/articleId/{$articleId}");
				exit;
			}
		}
	}