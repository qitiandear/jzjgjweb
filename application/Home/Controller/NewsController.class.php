<?php
namespace Home\Controller;

class NewsController extends BaseController {
	//显示签收明细
	public function signed(){
		$id = $_GET['id'];
		$ifo = M("articles")->field("title,typeId")->where("id=$id")->find();
		if($ifo['typeId']==4 || $ifo['typeId']==5 || $ifo['typeId']==6 ){
		
		
		
			$arr = M("chengqu")->select();
			foreach ($arr as $k=>$v){
				$v['sg']=M()->query("select * from sidgin  where cid={$v['id']} and aid={$id} order by ");
				$arr[$k]=$v;
			}
			$this->assign("ifo",$ifo);
			$this->assign("arr",$arr);
			$this->display();
		
		}
	}
	//签收验证
	public function sig()
	{
		$id = $_GET['id'];
		if($_POST){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$info = M("admin")->where("username='{$username}' and password='{$password}'")->find();
			if($info){
				$_SESSION['user'] = $info;
				/* $ip =  $_SERVER['REMOTE_ADDR']; */
				
			$userid = $_POST['qianshouren'];
		
		$ifo = M("articles")->where("id=$id")->find();
		if($ifo['typeId']==4 || $ifo['typeId']==5 || $ifo['typeId']==6 ){
		
		$ip =  $_SERVER['REMOTE_ADDR'];
		$cid = $info['cid'];

		$userid = $_POST['qianshouren'];
		$ars = M("sidgin")->where("aid={$id} and cid={$cid}")->find();
		if($ars){
		  $this->success("已签收",__APP__."/News/index/id/$id");
			}else{
				$ino = M()->query("insert into sidgin(aid,cid,userid,ip) value ('{$id}','{$cid}','{$userid}','{$ip}')");
				if($ino > 0){
					$this->success("签收成功",__APP__."/News/index/id/$id");
					exit;
				}else{
					$this->success("签收失败",__APP__."/News/index/id/$id");
					exit;
				}
			}
		}else{
			$this->success("你没有此权限",__APP__."/News/index/id/$id");
		}
	}else{
		$this->success(" 用户名或密码错误",__APP__."/News/index/id/$id");
		exit;
	}
			}
		
		
	}
	//登录验证
	public function login(){
		if($_POST){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$info = M("admin")->where("username='{$username}' and password='{$password}'")->find();
			if($info){
				$_SESSION['user'] = $info;
				/* $ip =  $_SERVER['REMOTE_ADDR']; */
				$this->success("登录成功",__APP__);
				
			}
		}
	}
/* 	//签约页面
	public function signed(){
	
		if ($_SESSION['state']==0) {
			$arr = M("chengqu")->select();
			foreach ($arr as $k=>$v){
				$v['sg']=M()->query("select * from sidgin s join admin a on s.userid=a.id where s.cid={$v['id']}");
				$arr[$k]=$v;
			}
			$this->assign("arr",$arr);
			$this->display();
		}else{
			$this->success("你没有此权限",__APP__."/News/index/id/45");
				
		}
		
	} */
/* 	//登录签阅
	public function login(){
		
		
		$id = $_GET['id'];
		$_SESSION['aid']= $id; 
		$ifo = M("articles")->where("id=$id")->find();
		if($ifo['typeId']==4 || $ifo['typeId']==5 || $ifo['typeId']==6 ){
		if($_POST){
		//验证登录
		$username = $_POST['username'];
		$password = $_POST['password'];
		$info = M("admin")->where("username='{$username}' and password='{$password}'")->find();
		
		if($info==null){
			$this->success("用户名或密码错误",__APP__."/News/index/id/$id");
			
		}else if($info['state']==0){
			$_SESSION['user'] = $info;
			$ip =  $_SERVER['REMOTE_ADDR'];
			$cid = $_SESSION['user']['cid'];
			$userid = $_SESSION['user']['id'];
			$yz = M("sidgin")->select();
			$aid =$_SESSION['aid'];
			
			
			
			
			$ars = M("sidgin")->where("aid={$id} and cid={$cid}")->find();
			if($ars){
			  $this->success("已签收",__APP__."/News/signed");
			}else{
				$ino = M()->query("insert into sidgin(aid,cid,userid,ip) value ('{$id}','{$cid}','{$userid}','{$ip}')");
			if($ino > 0){
				$this->success("签收成功",__APP__."/News/signed");
				exit;
			}else{
				$this->success("签收失败",__APP__."/News/index/id/$id");
				exit;
			}	
		  }
			 
			if($yz==NULL){
				
				$ino = M()->query("insert into sidgin(aid,cid,userid,ip) value ('{$id}','{$cid}','{$userid}','{$ip}')");
				if($ino > 0){
					$this->success("签收成功",__APP__."/News/signed");
					exit;
				}else{
					$this->success("签收失败",__APP__."/News/index/id/$id");
					exit;
				}
			}
				
		}else{
			$this->success("您暂时没有此权限",__APP__."/News/index/id/$id");
			exit;
		}
	
		}
		
		}else{
			$this->success("此文章不用签收",__APP__."/News/index/id/$id");
			exit;
		}
	} */
	public function index(){
		//类型
		$listtype= M("types")->where("fid=0")->select();
		foreach ($listtype as $k=>$v){
			$v['types'] = M("types")->where("fid={$v["typeId"]}")->select();
		
			$listtype[$k]=$v;
		}
		$this->assign("listtype",$listtype);
		$id = $_GET['id']?$_GET['id']:1;
		//阅读量
		if($id){
		//获取文章
		M()->execute("update articles set hint=hint+1 where id={$id} ");
		$news = M("articles")->where("id=$id")->order("id desc")->find();
		$snew = M("articles")->where("id<$id")->order("id desc")->limit(0,1)->find();
		$xnew = M("articles")->where("id>$id")->limit(0,1)->find();
		}
		//匹配用户表  去找所属分局
		$ty = M()->query("select a.username,c.fname from admin as a join chengqu as c on a.cid=c.id where a.id='{$news['userId']}'");
		
	
		$news['username'] = $ty['0']['username'];
		$news['fenju'] = $ty['0']['fname'];
		$typeId = $news['typeId'];
		$this->assign("news",$news);
		$this->assign("snew",$snew);
		$this->assign("xnew",$xnew);
		//当前显示类型
		$type = M("types")->where("typeId=$typeId")->find();
		$this->assign("type",$type);
		$fid = $type['fid'];
		if($fid==0){
			$tpz = M("types")->where("typeId=$typeId")->find();
		}else{
		//显示位置
		$tpz = M("types")->where("typeId=$fid")->find();
		}
		$this->assign("tpz",$tpz);
		$this->display();
	}
}