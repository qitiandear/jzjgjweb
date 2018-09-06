<?php
namespace Home\Controller;
class IndexController extends BaseController {
    //弹出公告
    public function contion(){
    $arr = M()->query("select * from placard order by id desc limit 0,1");
    $this->assign("arr",$arr);
    $this->display();
   }
    public function index(){
        //获取当前时间
        $date = date("Y-m
            -d H:i:s");
        $this->assign("date",$date);
 //图片 展示
        $jgyws = M()->query("select id,title,date,imagepath from articles where typeId=19 and state=8 order by id desc limit 0,5");
        $this->assign("jgyws",$jgyws);
        //列表1
        $arrdd = M("bless")->where("typeId=1")->select();
        $this->assign("arrdd",$arrdd);
        //列表2
        $arraa = M("bless")->where("typeId=2")->select();
        $this->assign("arraa",$arraa);
        //列表3
        $arrbb = M("bless")->where("typeId=3")->select();
        $this->assign("arrbb",$arrbb);
        //列表4
        $arrcc = M("bless")->where("typeId=4")->select();
        $this->assign("arrcc",$arrcc);
        //列表5
        $arree = M("bless")->where("typeId=5")->select();
        $this->assign("arree",$arree);
        //信息排名
            $last['first'] = date("Y-m-d", mktime(24, 0, 0, date("m"), 0, date("Y")));
        
        $last['end'] =  date("Y-m-d", mktime(0, 0, 0, date("y") + 1, 0, date("Y")));
        //获取所有单位  所对应的所有的文章
        $xxpm = M()->query("select a.id,a.username,count(b.userId) as count from admin a,articles b where a.id = b.userId and b.state=8 and a.state<9 and dateandtime > '2018-01-01 00:00:00' GROUP by b.userId  order by count desc limit 0,6");
        $this->assign("xxpm",$xxpm);
       
        //曝光台
        $bgt =  M()->query("select * from articles where typeId=18 and state=8 order by id desc limit 0,1");
        $this->assign("bgt",$bgt);
        //每日巡查通报
        $mrxctb = M()->query("select id,title,date from articles where typeId=14 and state=8 order by id desc limit 0,10");
        $this->assign("mrxctb",$mrxctb);
        //服务之窗
        $fwzc = M()->query("select id,title,date from articles where typeId=15 and state=8 order by id desc limit 0,5");
         $this->assign("fwzc",$fwzc);
         //专项工作DATE_ADD(dateandtime,INTERVAL 1 week) as time,
         $zxgz =  M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date,imagepath,content from articles where typeId=16 and state=8 order by id desc limit 0,5");
         $this->assign("zxgz",$zxgz);
         //dundianbangdu 
         $dundianbangdu =  M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=17 and state=8 order by id desc limit 0,5");
         $this->assign("dundianbangdu",$dundianbangdu);
        //监管要闻
        $jgyw = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date,imagepath from articles where typeId=1 and state=8 order by id desc limit 0,9");
        $this->assign("jgyw",$jgyw);
     /*   $jgyws = M()->query("select id,title,date,imagepath from articles where typeId=1 and state=8 order by id desc");
        $this->assign("jgyws",$jgyws);*/
        //通知通报
        $tztb = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=2 and state=8 order by id desc limit 0,8");
        $this->assign("tztb",$tztb);
        //监所动态
        $jsdt = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=3 and state=8 order by id desc limit 0,8");
        $this->assign("jsdt",$jsdt);
        //深挖犯罪
        $gzjb = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=4 and state=8 order by id desc limit 0,8");
        $this->assign("gzjb",$gzjb);
        //拘留所矛盾化解
        $jlsmdhj = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=5 and state=8 order by id desc limit 0,8");
        $this->assign("jlsmdhj",$jlsmdhj);
        //蹲点帮扶
        $ddbf = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=6 and state=8 order by id desc limit 0,8");
        $this->assign("ddbf",$ddbf);
        //法律法规
        $flfg = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=7 and state=8 order by id desc limit 0,8");
        $this->assign("flfg",$flfg);
        //医疗卫生
        $ylws = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=8 and state=8 order by id desc limit 0,8");
        $this->assign("ylws",$ylws);
        //安全大排查
        $aqdpc = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=9 and state=8 order by id desc limit 0,8");
        $this->assign("aqdpc",$aqdpc);
        //工作简报
        $swfz = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=10 and state=8 order by id desc limit 0,8");
        $this->assign("swfz",$swfz);
        //党校与支部工作
        $dxgz = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=11 and state=8 order by id desc limit 0,8");
        $this->assign("dxgz",$dxgz);
        //监管先进典型
        $jgdx = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=12 and state=8 order by id desc limit 0,8");
        $this->assign("jgdx",$jgdx);
        //他山之石
        $tszs = M()->query("select dateandtime,DATE_ADD(dateandtime,INTERVAL 1 week) as time,id,title,date from articles where typeId=13 and state=8 order by id desc limit 0,8");
        $this->assign("tszs",$tszs);
        $art1 = M()->query("select * from articles where typeId=21 order by id desc limit 1");
        $this->assign("art1",$art1);
        $video = M()->query("select * from articles where typeId=10 order by id desc limit 1");
        $this->assign("video",$video);
        $vlist = M()->query("select * from articles where typeId=10 order by id desc");
        $this->assign("vlist",$vlist);
        // ignore_user_abort();
        // set_time_limit(0);
        // $interval=3;
        // do{
        //     $msg=M()->query("select * from articles where typeId=21 order by id desc limit 1");
        //     $this->assign("msg",$msg);
        //     sleep($interval);
        // }while(true);
        $this->display();
    }
    
   }