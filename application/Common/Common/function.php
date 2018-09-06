<?php 
//应用系统和 信息查询系统
function getTypes($fid=0,$indentNum=0){
	$Type=M('system');	
	$arr=$Type->where("fid=$fid and state<9")->select();
	$optionStr="";
	//产生缩进字符串
	$indentStr=str_repeat("—", $indentNum);
	$indentNum++;
	foreach($arr as $v){
		$optionStr.="<option value='{$v['id']}'>{$indentStr}{$v['tname']}</option>";
		//获取子集  
		$sStr=getTypes($v['id'],$indentNum);
		$optionStr.=$sStr;
	}
	return $optionStr;
}
function getTypeByArrd($fid=0,$indentNum=0){
	$arr = M("system")->where("fid=$fid and state< 9")->select();

	static $reArr = array();
	//产生缩进字符串
	$indentStr = str_repeat("——", $indentNum);
	$indentNum++;
	foreach ($arr as $v){
		$reArr[] = array('id'=>$v['id'],'tname'=>$indentStr.$v['tname']);
		getTypeByArrd($v['id'],$indentNum);
	}
	return $reArr;
}
//获取分类
function getTypen($fid=0,$num=0){
	$ob=M('trend');
	$arr=$ob->where("fid=$fid and state=0")->select();
	$gangStr=str_repeat("&nbsp;—",$num);
	$num++;
	$optionStr="";
	foreach($arr as $v){
		$optionStr.="<option value='{$v['id']}'>{$gangStr}{$v['tname']}</option>";
		$sStr=getTypen($v['id'],$num);
		$optionStr.=$sStr;
	}
	return $optionStr;
}
//获取分类er
/* //获取分类
function getTypes($fid=0){
	$ob=M('trend');
	$arr=$ob->where("fid=$fid and state=0")->select();
	//$gangStr=str_repeat("&nbsp;—",$num);
	//$num++;
	$optionStr="";
	foreach($arr as $v){
		$optionStr.="<ul id=\"nav\">
  <li class=\"mainli\">{$v['tname']}
        <ul class=\"firstChild\">
            <li>菜单
                    <ul class=\"secondChild\">
                        <li>子菜单</li>
                        <li>子菜单</li>
                        <li>子菜单</li>
                    </ul>
            </li>
            <li>菜单
                    <ul class=\"secondChild\">
                        <li>子菜单</li>
                        <li>子菜单</li>
                        <li>子菜单</li>
              </ul>
    </li>
            <li>菜单
                    <ul class=\"secondChild\">
                        <li>子菜单</li>
                        <li>子菜单</li>
                        <li>子菜单</li>
                    </ul>
          </li>
        </ul>
  </li>\"
  </ul>;";
		$sStr=getTypes($v['id']);
		$optionStr.=$sStr;
	}
	return $optionStr;
} */
function getTypeByArr($fid=0,$indentNum=0){
	$arr = M("trend")->where("fid=$fid and state< 9")->select();

	static $reArr = array();
	//产生缩进字符串
	$indentStr = str_repeat("——", $indentNum);
	$indentNum++;
	foreach ($arr as $v){
		$reArr[] = array('id'=>$v['id'],'tname'=>$indentStr.$v['tname']);
		getTypeByArr($v['id'],$indentNum);
	}
	return $reArr;
}