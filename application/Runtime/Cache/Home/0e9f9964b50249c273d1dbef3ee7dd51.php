<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>晋中公安监管信息网</title>
	<script src="/library/js/jquery-1.4.js"></script>
	<link rel="stylesheet" href="/public/css/tqindex.css">
	<script type="text/javascript">
	    function contshow(){
	    	var r = $("#vlist").css('display');
	    	if (r=='block') {
				$('#vlist').css('display','none');
	    	}else{
				$('#vlist').css('display','block');
	    	}
		}
		function videosrc(str,str2){
			$("#addv").attr('src',str);
			$("#addt").text(str2);
			$("#vlist").hide();
		}
	</script>
</head>
<body>
	<div id="logo">
		<img src="/public/vivo/8.gif" alt="">
	</div>
	<ul id="nav">
		<li><a href="/index.php">首页</a></li>
		<li><a href="/index.php/Listtype/index/typeId/1">监管要闻</a></li>
		<li><a href="/index.php/Listtype/index/typeId/2">通知通报</a></li>
		<li><a href="/index.php/Listtype/index/typeId/3">监所动态</a></li>
		<li><a href="/index.php/Listtype/index/typeId/4">领导聚集</a></li>
		<li><a href="/index.php/Listtype/index/typeId/5">重点工作</a></li>
		<li style="border: none;"><a href="/index.php/Listtype/index/typeId/6">协助破案</a></li>
	</ul>
	<div id="dx">
		<img src="/public/vivo/banner9.jpg">
	</div>
	<div id="box">
		<div id="boxleft">
			<div class="pack">
				<div class="cont">
					<div id="map">
						<ul class="img">
							<?php if(is_array($jgyws)): $i = 0; $__LIST__ = $jgyws;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><img src="/public/<?php echo ($v["imagepath"]); ?>" alt=""></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						<div class="mapTitle">
							<ul class="title">
								<?php if(is_array($jgyws)): $i = 0; $__LIST__ = $jgyws;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
							<ul class="rbox">
								<li class="box"></li>
								<li class="box"></li>
								<li class="box"></li>
								<li class="box"></li>
								<li class="box"></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="cont">
					<div class="hd">
						<h3>监管要闻</h3>
						<span><a href="/index.php/Listtype/index/typeId/1">更多>></a></span>
					</div>
					<ul class="artlist">
						<?php if(is_array($jgyw)): $i = 0; $__LIST__ = $jgyw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
								<div class="arttl"><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,15)); ?></a></div>
								<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt=""><?php endif; ?>
								<span><?php echo (msubstrda($v["dateandtime"],0,10)); ?></span>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			<div id="onduty">
				<h3>今日值班</h3>
				<div id="drty">
					<?php if(is_array($bgt)): $i = 0; $__LIST__ = $bgt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; echo ($v["content"]); endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<ul id="funbox">
				<li onclick="location.href='http://10.1.1.88:8080/jcxxv'"><div class="i bg1"></div>公安监所基础信息管理系统</li>
				<li onclick="location.href='http://10.94.60.175:8009/web'"><div class="i bg2"></div>违法犯罪人员信息系统</li>
				<li onclick="location.href='/index.php//Listtype/index/typeId/20'" style="line-height: 60px;"><div class="i bg3"></div>全市巡查通报</li>
				<li onclick="location.href='http://zyfw.ga/portal/'" style="line-height: 60px;"><div class="i bg4"></div>公安云搜索</li>
			</ul>
			<div class="pack">
				<div class="cont">
					<div class="ht">
						<h4 class="bb bshow" id="h1">通知通报</h4>
						<h4 class="bb bhide" id="h2">领导聚集</h4>
						<div class="supply" id="m1"><a href="/index.php/Listtype/index/typeId/2">更多>></a></div>
						<div class="supply" id="m2"><a href="/index.php/Listtype/index/typeId/4">更多>></a></div>
					</div>
					<ul class="artlist" id="al1">
						<?php if(is_array($tztb)): $i = 0; $__LIST__ = $tztb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
								<div class="arttl"><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,15)); ?></a></div>
								<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt=""><?php endif; ?>
								<span><?php echo (msubstrda($v["dateandtime"],0,10)); ?></span>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<ul class="artlist" id="al2">
						<?php if(is_array($gzjb)): $i = 0; $__LIST__ = $gzjb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
								<div class="arttl"><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,15)); ?></a></div>
								<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt=""><?php endif; ?>
								<span><?php echo (msubstrda($v["dateandtime"],0,10)); ?></span>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="cont">
					<div class="ht">
						<h4 class="bb bshow" id="h3">监所动态</h4>
						<h4 class="bb bhide" id="h4">重点工作</h4>
						<div class="supply" id="m3"><a href="/index.php/Listtype/index/typeId/3">更多>></a></div>
						<div class="supply" id="m4"><a href="/index.php/Listtype/index/typeId/5">更多>></a></div>
					</div>
					<ul class="artlist" id="al3">
						<?php if(is_array($jsdt)): $i = 0; $__LIST__ = $jsdt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
								<div class="arttl"><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,15)); ?></a></div>
								<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt=""><?php endif; ?>
								<span><?php echo (msubstrda($v["dateandtime"],0,10)); ?></span>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<ul class="artlist" id="al4">
						<?php if(is_array($jlsmdhj)): $i = 0; $__LIST__ = $jlsmdhj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
								<div class="arttl"><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,15)); ?></a></div>
								<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt=""><?php endif; ?>
								<span><?php echo (msubstrda($v["dateandtime"],0,10)); ?></span>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<div id="boxright">
			<div id="video">
				<?php if(is_array($video)): $i = 0; $__LIST__ = $video;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><h3 id='addt'><?php echo ($v["title"]); ?></h3><img src="/public/pic/menu.png" id="mbtn" onclick="contshow()">
					<video id="addv" src="/public/video/<?php echo ($v["content"]); ?>" controls="controls"></video><?php endforeach; endif; else: echo "" ;endif; ?>
				<ul id="vlist">
					<?php if(is_array($vlist)): $k = 0; $__LIST__ = $vlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li onclick="videosrc('/public/video/<?php echo ($v["content"]); ?>','<?php echo ($v["title"]); ?>')"><?php echo ($v["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>

			<div class="twocolumn">
				<div class="ht">
					<h4 class="bb bshow" id="h5">信息排名</h4>
					<h4 class="bb bhide" id="h6" style="width: 130px;">每日巡查通报</h4>
					<div class="supply" id="m5" style="width: 130px;"><a href="/index.php/Xxpm">更多>></a></div>
					<div class="supply" id="m6" style="width: 130px;"><a href="/index.php/Listtype/index/typeId/14" >更多>></a></div>
				</div>
				<ul class="artlist" id="al5">
					<div class="pm fz">排名</div>
					<div class="dw fz">单位</div>
					<div class="cy fz">采用</div>
					<?php if(is_array($xxpm)): $k = 0; $__LIST__ = $xxpm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li>
							<div class="pm red"><?php echo ($k); ?></div>
							<div class="dw"><?php echo ($v["username"]); ?></div>
							<div class="cy red"><?php echo ($v["count"]); ?></div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<ul class="artlist mrxc" id="al6">
					<?php if(is_array($mrxctb)): $i = 0; $__LIST__ = $mrxctb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="imgsow">
				<div class="word">监管之星</div>
				<ul class="imgbox">
					<?php if(is_array($zxgz)): $i = 0; $__LIST__ = $zxgz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k): $mod = ($i % 2 );++$i;?><li onclick="location.href='/index.php/News/index/id/<?php echo ($k["id"]); ?>'"><img src="/public/<?php echo ($k["imagepath"]); ?>" alt=""><?php echo ($k["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<div id="xdzd">
		<img src="/public/vivo/5.gif" alt="">
	</div>
	<div id="box2">
		<div class="box2left">
			<div class="cont">
				<div class="hd">
					<h3>党建工作</h3>
					<span><a href="/index.php/Listtype/index/typeId/8">更多>></a></span>
				</div>
				<ul class="artlist">
					<?php if(is_array($ylws)): $i = 0; $__LIST__ = $ylws;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
							<div class="arttl"><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,15)); ?></a></div>
							<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt=""><?php endif; ?>
							<span><?php echo (msubstrda($v["dateandtime"],0,10)); ?></span>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="cont">
				<div class="hd">
					<h3>监管风采</h3>
					<span><a href="/index.php/Listtype/index/typeId/9">更多>></a></span>
				</div>
				<ul class="artlist">
					<?php if(is_array($aqdpc)): $i = 0; $__LIST__ = $aqdpc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
							<div class="arttl"><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,15)); ?></a></div>
							<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt=""><?php endif; ?>
							<span><?php echo (msubstrda($v["dateandtime"],0,10)); ?></span>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="cont">
				<div class="hd">
					<h3>政策法规</h3>
					<span><a href="/index.php/Listtype/index/typeId/12">更多>></a></span>
				</div>
				<ul class="artlist">
					<?php if(is_array($jgdx)): $i = 0; $__LIST__ = $jgdx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
							<div class="arttl"><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,15)); ?></a></div>
							<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt=""><?php endif; ?>
							<span><?php echo (msubstrda($v["dateandtime"],0,10)); ?></span>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="cont">
				<div class="hd">
					<h3>它山之石</h3>
					<span><a href="/index.php/Listtype/index/typeId/13">更多>></a></span>
				</div>
				<ul class="artlist">
					<?php if(is_array($tszs)): $i = 0; $__LIST__ = $tszs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
							<div class="arttl"><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,15)); ?></a></div>
							<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt=""><?php endif; ?>
							<span><?php echo (msubstrda($v["dateandtime"],0,10)); ?></span>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		<div class="box2right">
			<div class="cont2 htbox">
				<div class="ht" style="border-bottom: 1px dotted #333;height: 37px;">
					<h3 style="line-height: 37px;text-align: center;">晋中市公安监管工作“11458”总体思路</h3>
					<?php if(is_array($art1)): $i = 0; $__LIST__ = $art1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="text"><?php echo ($v["content"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<ul class="media">
					<li onclick="location.href='/admin.php'" style="background: url(/public/pic/icons1.png) no-repeat 15% -2362px #f19e23;">网上投稿</li>
					<li onmousemove="chenges();" style="background: url(/public/pic/icons1.png) 15% -2492px no-repeat #459ddf;">信息查询</li>
					<li onclick="location.href='/index.php/Listtype/index/typeId/15'" style="background: url(/public/pic/icons1.png) 15% -1337px no-repeat #4bc83e;">监管通讯录</li>
					<li onclick="location.href='/index.php/Serach/index'" style="background: url(/public/pic/icons1.png) 15% -2202px no-repeat #d34805;">站内搜索</li>
				</ul>
				<div  id="img1" class="tit" onmousemove="chenges();"  >
					<ul class="mei_list"  onmouseout="chengesd();">
						<li><a href="http://10.1.1.88:8080/jcxxv/">全国公安监所基础信息管理系统</a></li>
						<li><a href="http://10.94.60.175:8009/web">违法犯罪人员信息系统</a></li>
						<li><a href="http://ztry.xz.ga">全国在逃人员信息系统</a></li>
						<li><a href="http://www.jgzd.sx/">全市巡查通报</a></li>
						<li><a href="http://zyfw.ga/portal/">公安云搜索</a></li>
					</ul>
				</div>
			</div>
			<div class="cont2" style="margin-top: 100px;">
				<div class="hd">
					<h3 style="width: 175px;">重点工作成绩公布</h3>
					<span><a href="/index.php/Listtype/index/typeId/17">更多>></a></span>
				</div>
				<ul class="artlist">
					<?php if(is_array($dundianbangdu)): $i = 0; $__LIST__ = $dundianbangdu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
							<div><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,20)); ?></a></div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<div id="footer">
		<ul id="link">
			<li id="link1">友情链接</li>
			<li class="lli">
				<select name="select" id="select" onchange="s_click(this)">
					<option selected>全国监管导航</option>
					<?php if(is_array($arrdd)): $i = 0; $__LIST__ = $arrdd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["imagepath"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</li>
			<li class="lli">
				<select name="" id="" onchange="s_click(this)">
					<option selected>省内监管导航</option>
					<?php if(is_array($arraa)): $i = 0; $__LIST__ = $arraa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["imagepath"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</li>
			<li class="lli">
				<select name="" id="" onchange="s_click(this)">
					<option selected>市内监管导航</option>
					<?php if(is_array($arrbb)): $i = 0; $__LIST__ = $arrbb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["imagepath"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</li>
			<li class="lli">
				<select name="" id="" onchange="s_click(this)">
					<option selected>省内市局导航</option>
					<?php if(is_array($arrcc)): $i = 0; $__LIST__ = $arrcc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["imagepath"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</li>
			<li class="lli">
				<select name="" id="" onchange="s_click(this)">
					<option selected>推荐监管链接</option>
					<?php if(is_array($arree)): $i = 0; $__LIST__ = $arree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["imagepath"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</li>
		</ul>
		<div id="copy">版权所有：晋中市公安监管支队 <a href="http://10.97.83.200:8080/web">进入旧版</a></div>
	</div>
	<script>
		var theUA = window.navigator.userAgent.toLowerCase();
		if ((theUA.match(/msie\s\d+/) && theUA.match(/msie\s\d+/)[0]) || (theUA.match(/trident\s?\d+/) && theUA.match(/trident\s?\d+/)[0])) {
		    var ieVersion = theUA.match(/msie\s\d+/)[0].match(/\d+/)[0] || theUA.match(/trident\s?\d+/)[0];
		    if (ieVersion < 9) {
		        window.location.href('/index.php/Old/index');
		    }
		}
	</script>
	<script src="/library/js/new.js"></script>
</body>
</html>