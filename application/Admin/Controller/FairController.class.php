<?php
	namespace Admin\Controller;
	class FairController extends BaseController{
		public function index(){
			$arr = M()->query("select * from placard order by id desc limit 0,1");
			$this->assign("new",$arr);

			$this->display();
		}
		public function update()
		{
			$id = $_GET['Id'];

			$content = $_POST['content'];//新闻正文
			$title = $_POST['title'];//新闻标题
			$writer = $_POST['writer'];//新闻作者
			
			$result = M()->execute("update placard set title='{$title}',content='{$content}',writer='{$writer}' where id='{$id}'");
			if($result > 0)
			{
				$this->success("修改公告成功",__ROOT__."/admin.php/Fair/index");
				exit;
			}else
			{
				$this->success("修改公告失败",__ROOT__."/admin.php/Fair/index");
				exit;
			}
		}
	}