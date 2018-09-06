<?php
namespace Home\Controller;
use Think\Page;//导入分页
class ListtypeController extends BaseController {
	public function thin(){
		$id = $_GET['userId'];
		$thin = M("articles")->where("userId=$id and state=8")->order("id desc")->select();
		/*$thin = M()->query("select * from articles where userId=3 and state=8 order by id desc");*/
		$this->assign("thin",$thin);
		$count = M()->query("select count(id) as count from articles where  userId=$id or state=8");
		$this->assign("count",$count);
		$type = M("admin")->where("id=$id")->find();
		$this->assign("type",$type);
		//类型
		 $listtype= M("types")->where("fid=0")->select();
		 foreach ($listtype as $k=>$v){
		 	$v['types'] = M("types")->where("fid={$v["typeId"]}")->select();
		 	
		 	$listtype[$k]=$v;
		 }
		$this->assign("listtype",$listtype);
	$this->display();
	}
	public function index(){
		//每个单位的文章
		
		//类型
		 $listtype= M("types")->where("fid=0")->select();
		 foreach ($listtype as $k=>$v){
		 	$v['types'] = M("types")->where("fid={$v["typeId"]}")->select();
		 	
		 	$listtype[$k]=$v;
		 }
		$this->assign("listtype",$listtype);
		$typeId = $_GET['typeId']?$_GET['typeId']:5;
		
		//获得类型下的总记录数
		$totalRow = M("articles")->where("state=8 and typeId={$typeId}")->count();
		
		//实例化分页类
		$page = new Page($totalRow,20);
		
		$lists = M("articles")->where("typeId={$typeId} and state=8")->order("id desc")->limit($page->firstRow,$page->listRows)->select();
		$this->assign("pageList",$page->show());//分页栏
		$this->assign("lists",$lists);
		//当前显示类型
		$type = M("types")->where("typeId=$typeId")->find();
		$this->assign("type",$type);
		$fid = $type['fid'];
		//显示位置

		$tpz = M("types")->where("typeId=$fid")->find();
		
		$this->assign("tpz",$tpz);
		$this->display();
	}
	//查询
	public function search($keyword=""){
		//类型
		$listtype= M("types")->where("fid=0")->select();
		foreach ($listtype as $k=>$v){
			$v['types'] = M("types")->where("fid={$v["typeId"]}")->select();
		
			$listtype[$k]=$v;
		}
		$this->assign("listtype",$listtype);
		//获得搜索的总记录数
		$totalRow = M("articles")->where("state<9 and title like '%{$keyword}%'")->count();
		
		//实例化分页类
		$page = new Page($totalRow,20);
		$keyword = str_replace("%","\%",$keyword);
		$keyword = str_replace("_","\_",$keyword);
		
	    $info =	M()->query("SELECT id,title,date from articles where title like '%{$keyword}%' limit $page->firstRow,$page->listRows");
		$this->assign("info",$info);
		$this->assign("pageList",$page->show());//分页栏
		$this->display();
	} 
}