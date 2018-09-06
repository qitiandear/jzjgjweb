<?php
namespace Home\Controller;
use Think\Page;//导入分页
class SerachController extends BaseController {
	public function index(){

		//类型
		 $listtype= M("types")->where("fid=0")->select();
		 foreach ($listtype as $k=>$v){
		 	$v['types'] = M("types")->where("fid={$v["typeId"]}")->select();
		 	
		 	$listtype[$k]=$v;
		 }
		$this->assign("listtype",$listtype);
		
	
	
		
		$this->display();
	}
	public function search($search='',$keyword=''){
		 $listtype= M("types")->where("fid=0")->select();
		 foreach ($listtype as $k=>$v){
		 	$v['types'] = M("types")->where("fid={$v["typeId"]}")->select();
		 	
		 	$listtype[$k]=$v;
		 }
		$this->assign("listtype",$listtype);
		$keyword=I('get.keyword');
		$str=trim($keyword);
		$str=strip_tags($keyword);
		$str=stripslashes($keyword);
		$str=addslashes($keyword);
		$str=rawurldecode($keyword);
		$str=quotemeta($keyword);
		$str=htmlspecialchars($keyword);
		$keyword=preg_replace("/\+|\*|\`|\/||\$|\#|\^|\!|\@|\%|\&|\~|\^|\[|\]|\'|\"/", "", $str);//去除特殊符号+*`/-$#^~!@#$%&[]'"
		if($keyword)
		{
			
			//$res=M('classroom')->where( "title like '%{$search}%' or content like '%{$search}%'")->select();
			$Info = M('articles')->where("{$search} like '%{$keyword}%'")->join("types on types.typeId=articles.typeId")->order("articles.id desc")->select();
			$totalRow = count($Info);
			$page = new Page($totalRow,15);
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
}