<?php
namespace Home\Controller;
class XxpmController extends BaseController{
	public function index(){
		$listtype= M("types")->where("fid=0")->select();
		foreach ($listtype as $k=>$v){
			$v['types'] = M("types")->where("fid={$v["typeId"]}")->select();
		
			$listtype[$k]=$v;
		}
		$this->assign("listtype",$listtype);
		$xxpm = M()->query("select a.id,a.username,count(b.userId) as count from admin a,articles b where a.id = b.userId and b.state=8 and a.state<9 and dateandtime > '2018-01-01 00:00:00' GROUP by b.userId  order by count desc");
        $this->assign("xxpm",$xxpm);
        $date = date("Y/m/d",time());
        $this->assign("date",$date);
        $this->display();
	}
}