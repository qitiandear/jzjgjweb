<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta charset="utf-8">
<title>晋中公安监管信息网</title>
<link href="/public/css/index_css.css" rel="stylesheet">
<script src="/library/js/jquery.js"></script>
<script src="/library/js/jquery.min.js"></script>
<script>
// setTimeout("focus();window.showModelessDialog('/index.php/Index/contion.html','','scroll:1;dialogleft:10;dialogtop:50;status:1;help:1;toolbar=1;resizable:1;dialogWidth:700px;dialogHeight:500px')",0)
</script>
</head>
	<style type="text/css">
	.img_new{
		float: left;
		height: 12px;
		margin-top: 8px;
		width: 20px;
		margin-right:20px;
	}
				.mei_list{
					min-width:100px;
					padding:0 5px;
					font-size:13px;
					color:#fff;
					list-style-type:none;
					position:absolute;
					top:195px;
					left:-192px;
					background-color:#0068b7;
					float: left;
				}
				.mei_list li{
					height:40px;
					line-height:40px;
					text-align:left;
					
						
					
				}
				.mei_list li a{color:#fff;}
				.tit{display:none
					;}
				.tit1{display:block
					;}
				.lbimg{
					position: absolute;
					top:58px;
					left:25px;
					height: 131px;
					width: 150px;
					overflow: hidden;
				}
				.lbimg li{
					width: 150px;
					overflow:hidden;
					text-align: center;
					float: left;
				}
				.lbimg img{
					height: 110px;
					margin: 0 auto;
				}
				#contshow{
					width: 780px;
					padding: 10px;
					background: #eee;
					position: absolute;
					display: none;
				}
				#contshow h3{
					text-align: center;
				}
				#contshow p{
					text-indent: 32px;
					font-size: 16px;
				}
				#jianguan{
					background: #eee;
					width: 800px;
					display: none;
					position: absolute;
					left: -800px;
				}
				.mrxc li{
					line-height: 24px;
					font-size: 12px;
					border-bottom: 1px solid #eee;
				}
				.mrxc li:last-child{
					border-bottom: 0;
				}
			</style>
<body>
<div class="banner">
	<img src="/public/vivo/1703.gif">
</div>
<div class="nav">

<ul>
	<li><a href="/index.php">首页</a></li>
	<li><a href="/index.php/Listtype/index/typeId/1">监管要闻</a></li>
	<li><a href="/index.php/Listtype/index/typeId/2">通知通报</a></li>
	<li><a href="/index.php/Listtype/index/typeId/3">监所动态</a></li>
	<li><a href="/index.php/Listtype/index/typeId/4">领导聚集</a></li>
	<li><a href="/index.php/Listtype/index/typeId/5">重点工作</a></li>
	<li style="border: none;"><a href="/index.php/Listtype/index/typeId/6">协助破案</a></li>
	<div class="clearfix"></div>
</ul>
	
	
</div>
<div class="banner">
	<img src="/public/vivo/banner9.jpg">
</div>
<div class="index_oneleft">
	<div class="onelefttop">
			</a>
			<div class="clearfix"></div>
	</div>
					<!-- 左右切换轮播图 -->
					<div class="oneleftbottom">
						<div class="bannerbox">
							<div class="innerbanner" style="margin-top: 15px">
								<?php if(is_array($jgyws)): $i = 0; $__LIST__ = $jgyws;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>" class="banneritem" style="z-index:2">
								<?php if($v["imagepath"] != NULL ): ?><img src="/public/<?php echo ($v["imagepath"]); ?>" alt="" style="border: 0">
									<div class="banner_news"><?php echo ($v["title"]); ?></div><?php endif; ?>
								</a><?php endforeach; endif; else: echo "" ;endif; ?>

							</div>
							<div class="btnbox">
								<div class="btn active"></div>
								<div class="btn"></div>
								<div class="btn"></div>
								<div class="btn"></div>
								<div class="btn"></div>
							</div>
							<div class="prev arrow">
								&lt;
							</div>
							<div class="next arrow">
								&gt;
							</div>
						</div>
			</div>
			
			
			<script>
	var allbtn=$(".btn")
    var allimg=$(".banneritem")
    var nowbtn=$(".btn:first")
    var nowimg=$(".banneritem:first")
    var t=setInterval(banner,2000)
    var num=0;
    var z=2;
    function banner(){
        num++;
        if(num==allbtn.length){
            num=0;
        }
        allbtn.filter(nowbtn).removeClass("active").end().eq(num).addClass("active")
        nowimg.animate({left:-398},500,"linear").parent().children().eq(num).css({left:398,zIndex:z++}).animate({left:0},500,"linear",function(){
            flag=true;
        })
        nowbtn=allbtn.eq(num)
        nowimg=allimg.eq(num)
    }
    $(".bannerbox").hover(function(){
        clearInterval(t)
        // $(".arrow").show(300)
        $(".arrow").fadeIn(300)
    },function(){
        t=setInterval(banner,2000)
        // $(".arrow").hide(300)
        $(".arrow").fadeOut(300)
    })
    var flag=true;
    $(".next").click(function(){
        if(flag){
            flag=false;
            banner()
        }
    }).mousedown(function(e){
        e.preventDefault()
        e.returnValue=false;   //阻止浏览器默认行为
    })
    var flag2=true;
    $(".prev").click(function(){
        if(flag2){
            flag2=false;
            num--;
            if(num==-1){
                num=allbtn.length-1;
            }
            allbtn.filter(nowbtn).removeClass("active").end().eq(num).addClass("active")
            nowimg.animate({left:398},500,"linear")
                .parent().children().eq(num).css({left:-398,zIndex:z--})
                .animate({left:0},500,"linear",function(){
                    flag2=true;
                })
            nowbtn=allbtn.eq(num)
            nowimg=allimg.eq(num)
        }
    }).mousedown(function(e){
        e.preventDefault()
        e.returnValue=false;   //阻止浏览器默认行为
    })
    allbtn.click(function(){
        nowbtn.removeClass("active");
        $(this).addClass("active")
        nowbtn=$(this);
        var now=nowimg.index();  //当前显示的图片
        var next=$(this).index();  //将要点击 要显示的图片
        if(next>now){
            nowimg.animate({left:-398},500,"linear");
            allimg.eq(next).css({left:398,zIndex:z++}).animate({left:0})
        }else if(next<now){
            nowimg.animate({left:398},500,"linear");
            allimg.eq(next).css({left:-398,zIndex:z++}).animate({left:0})
        }
        num=next;  //点击后继续从当前播
        nowimg=allimg.eq(next)
    });
    var i = 0;
    function contshow(){
    	if (i) {
			$('#contshow').hide();
			i = 0;
    	}else{
			$('#contshow').show();
			i = 1;
    	}
	}
	
</script>
<br>
				<div class="oneright2rightda">
							<div class="oneright2right" style="display:block">
							<div style="border-bottom: 1px solid #ccc;height: 36px;background: #eee;">
								<div style="width:100px;float: left;height: 36px;font-size: 18px;line-height: 36px;font-weight: bold;color: #fff;background: #0068b7;text-align: center;">监管要闻</div>
									<div class="foutrighttops">
							    <a href="/index.php/Listtype/index/typeId/1">更多>></a>
							</div>
						</div>
							<?php if(is_array($jgyw)): $i = 0; $__LIST__ = $jgyw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="indexycxx" style="float:right;">
									<a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>" class="iewei">
										<span class="ycxx01"></span>
										<span class="ycxx02">
										<?php echo (msubstr($v["title"],0,15)); ?>
										</span>
										<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt="" class="img_new"><?php endif; ?>
								<span class="ycxx03">
										<?php echo (msubstrda($v["dateandtime"],0,10)); ?>
										
											
											
										</span>

										<div class="clearfix"></div>
									</a>	

								</div><?php endforeach; endif; else: echo "" ;endif; ?>
								
							</div>
					
						</div>
					
			<div class="xuncha" >
				<div style="border: 1px solid #0068b7;border-top: 3px solid #0068b7;border-radius: 15px;">
					<h3 onclick="location.href='/index.php/Listtype/index/typeId/14'">每日巡查通报</h3>
					<ul class="mrxc" style=" text-align: center;width: 170px;height: 260px;overflow: hidden;padding: 5px 10px;">
						<?php if(is_array($mrxctb)): $i = 0; $__LIST__ = $mrxctb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><?php echo ($v["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<script>
					$(function () {
						var $uList = $(".mrxc");
						var timer = null;
						$uList.hover(function () {
							clearInterval(timer);
						},function () {
							timer = setInterval(function () {
							scrollList($uList);
						},1000);
					}).trigger("mouseleave");
						function scrollList(obj) {
							var scrollHeight = $(".mrxc li:first").height();
							$uList.stop().animate({marginTOP:-scrollHeight},600,function () {
							$uList.css({marginTOP:0}).find("li:first").appendTo($uList);
							});
						}
					});
				</script>
			</div>
			<div class="clearfix"></div>
			<div class="baoguangtai">
				<div class="baoguangtai_tu"><img src="/public/pic/baoguangtai.jpg"></div>
				<div class="shangxialunbo">
					<?php if(is_array($bgt)): $i = 0; $__LIST__ = $bgt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div class="clearfix"></div>
			</div>		
				<div class="clearfix"></div>	
</div>
<style type="text/css">
	 img{border:0;}
</style>
<div class="five_tu">
	 <a href="http://10.1.1.88:8080/jcxxv"><img src="/public/images/jiansuojichu.jpg"></a>
	<a href="http://10.94.60.175:8009/web"><img src="/public/images/xx.jpg" style="margin-left: 10px;"></a>
	<!-- <a href="http://ztry.xz.ga"><img src="/public/images/zaitaorenyuan.jpg" style="margin-left: 10px;"></a> -->
	 <a href="/index.php//Listtype/index/typeId/20"><img src="/public/images/xunchatongbao.jpg" style="margin-left: 10px;"></a>
	 <a href="http://zyfw.ga/portal/"><img src="/public/images/yunsousuo.jpg" style="margin-left: 10px;"></a>
	<div class="clearfix"></div>
</div>
<div class="index_zhong">			
	<div style="width:797px;height:500px;clear:both;float:left;">
		<div class="index_four">
					<div class="index_fourleft">
						<div class="foutlefttop">
							<div style="width:100px;float: left;height: 36px;text-align: center;font-size: 18px;line-height: 36px;font-weight: bold;color: white;background: #0068b7;">通知通报</div>
							<div class="foutrighttops">
						  <a href="/index.php/Listtype/index/typeId/2">更多>></a>
							
							</div>
							<div style="clear:both"></div>
						</div>
						<!-- 定位内容 -->
						<div class="fbottoom">
							<div class="lfoutleftbottom lrc_tz01" style="display:block">
							<!-- 通知通报 -->
							<?php if(is_array($tztb)): $i = 0; $__LIST__ = $tztb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="tztbcontent">
								<div class="sanjiao"><img src="/public/images/anniu.png"></div>
								<div class="sanjiaorighr">
									<a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>">
									<?php echo (msubstr($v["title"],0,20)); ?>
									</a>
								</div>
								<div class="index_date" ><?php echo (msubstrda($v["dateandtime"],0,10)); ?>
										<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt="" class="img_new" ><?php endif; ?>
								</div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>

							
						</div>	
						<!-- 定位内容 -->
					</div>
					<div class="index_fourright">
						<div class="foutlefttop">
							<div style="width:100px;float: left;height: 36px;text-align: center;font-size: 18px;line-height: 36px;font-weight: bold;color: white;background: #0068b7;">领导聚集</div>
							<div class="foutrighttops">
						  <a href="/index.php//Listtype/index/typeId/4">更多>></a>
							
							</div>
							<div style="clear:both"></div>
						</div>
						<!-- 定位内容 -->
						<div class="fbottoom">
							<div class="lfoutleftbottom lrc_tz01" style="display:block">
							<!-- 领导聚集 -->
							<?php if(is_array($gzjb)): $i = 0; $__LIST__ = $gzjb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="tztbcontent">
								<div class="sanjiao"><img src="/public/images/anniu.png"></div>
								<div class="sanjiaorighr">
									<a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,20)); ?>
									</a>
								</div>
								<div class="index_date" ><?php echo (msubstrda($v["dateandtime"],0,10)); ?>
									<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt="" class="img_new" ><?php endif; ?>

									</div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
							
							
							</div>

							
						</div>	
						<!-- 定位内容 -->
					</div>
		</div><br>

		<div class="index_four">
					<div class="index_fourleft">
						<div class="foutlefttop">
							<div style="width:100px;float: left;height: 36px;text-align: center;font-size: 18px;line-height: 36px;font-weight: bold;color: white;background: #0068b7;">监所动态</div>
							<div class="foutrighttops">
								<a href="/index.php/Listtype/index/typeId/3">更多>></a>
							
							</div>
							<div style="clear:both"></div>		
						</div>
						<!-- 定位内容 -->
						<div class="fbottoom">
							<div class="foutleftbottom lrc_tz02" style="display:block">
							<!-- 监所动态 -->
							<?php if(is_array($jsdt)): $i = 0; $__LIST__ = $jsdt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="tztbcontent">
								<div class="sanjiao"><img src="/public/images/anniu.png"></div>
								<div class="sanjiaorighr">
									<a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,20)); ?>
									</a>
								</div>
								<div class="index_date" ><?php echo (msubstrda($v["dateandtime"],0,10)); ?>
									<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt="" class="img_new" ><?php endif; ?>
											</div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
						
							</div>

							
						</div>
						<!-- 定位内容 -->
					</div>
					
					<div class="index_fourright">
						<div class="foutlefttop">
							<div style="width:100px;float: left;height: 36px;text-align: center;font-size: 18px;line-height: 36px;font-weight: bold;color: white;background: #0068b7;">重点工作</div>
							<div class="foutrighttops">
								<a href="/index.php/Listtype/index/typeId/5">更多>></a>
							
							</div>
							<div style="clear:both"></div>		
						</div>
						<!-- 定位内容 -->
						<div class="fbottoom">
							<div class="foutleftbottom lrc_tz02" style="display:block">
							<?php if(is_array($jlsmdhj)): $i = 0; $__LIST__ = $jlsmdhj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="tztbcontent">
								<div class="sanjiao"><img src="/public/images/anniu.png"></div>
								<div class="sanjiaorighr">
									<a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,20)); ?>
									</a>
								</div>
								<div class="index_date" ><?php echo (msubstrda($v["dateandtime"],0,10)); ?>
									<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt="" class="img_new" ><?php endif; ?>

										</div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
							
							</div>

							
						</div>
						<!-- 定位内容 -->
					</div>
		</div>
		
		
		</div>
		<div style="width:200px;float:right;padding-top:10px;position: relative;">
			<div class="info" style="position: absolute;top:-109px;left: 5px;">
				<img src="/public/pic/box2.jpg" style="position:relative">
				<div style="position: absolute;top: 18px;left: 65px;font-size: 22px;color: #0068b7;">信息排名</div>
				<!-- <textarea></textarea> -->
				
				<span style="position:absolute;top:50px;left:15px;width:175px;height: 230px;overflow: hidden;">
				<div style="font-size: 20px;"><span style="font-size:15px;">排名 &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;单位</span>

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:15px;">采用</span>
				
				</div>
				<?php if(is_array($xxpm)): $k = 0; $__LIST__ = $xxpm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><div style="font-size: 20px;">
				<a href="/index.php/Listtype/thin/userId/<?php echo ($v["id"]); ?>">
				<span style="font-size:15px;"><span style="color: red;">&nbsp;&nbsp;<?php echo ($k); ?></span> &nbsp;&nbsp; <?php echo (msubstr($v["username"],0,6)); ?></span>

				&nbsp;<span style="font-size:15px;"><?php echo ($v["count"]); ?></span>
				</a>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			
				</span>
			</div>
			<div class="zhuanxiang_work" style="position: absolute;top: 160px;left: 5px;">
				<img src="/public/pic/box4.jpg" style="position:relative">
				<div style="position: absolute;top: 18px;left: 65px;font-size: 22px;color: #0068b7;cursor: pointer;" onclick="location.href='/index.php/Listtype/index/typeId/16'">监管之星</div>
				
				<div style="width: 150px;overflow: hidden;height:131px; ">
					<ul class="lbimg">
						<?php if(is_array($zxgz)): $i = 0; $__LIST__ = $zxgz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k): $mod = ($i % 2 );++$i;?><li onclick="location.href='/index.php/News/index/id/<?php echo ($k["id"]); ?>'"><img src="/public/<?php echo ($k["imagepath"]); ?>" alt=""><?php echo ($k["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			</div>
			<div onclick="contshow()" style="width: 185px;float: right;height: 50px;background: #0068b7;text-align: center;color: #fff;margin-top: 400px;padding: 5px;cursor: pointer;margin-left: 5px;">晋中市公安监管工作“11458”总体思路</div>
			<div id="contshow">
				<h3>晋中市公安监管工作“11458”总体思路</h3>
				<p>为认真贯彻落实省厅“4.4”、“5.15”会议精神，特别是刘新云副省长的重要讲话精神，晋中监管支队紧紧围绕全省监管工作要点和全市“1315”公安工作总体思路，经认真调研论证并报请市局党委和省厅监管总队审定，确定符合晋中实际的“11458”监管工作思路，即：一个指导思想引领、一大工作目标打造、四化建设标准检验、五项工作机制保障、八大措施推进落实。</p>
				<p>“1”：全市监管坚决以习近平新时代中国特色社会主义思想为引领，深入学习贯彻习近平总书记系列重要讲话精神和治国理政新理念新思想新战略，牢牢把握对党忠诚、服务人民、执法公正、纪律严明的总要求，坚持围绕中心、服务大局，充分发挥职能作用，不断提升公安监管工作水平。</p>
				<p>“1”：全市监管上下转变理念，坚定信心，坚持高标准、严要求，打造以安全、规范、文明、保障为核心的一流监管场所，始终以安全第一、稳中求进总基调，落实“十个严禁”、“十个必须”，实现“四个零”目标。</p>
				<p>“4”：全市监管要坚持问题导向，常抓不懈，始终以规范化、标准化、科学化、精细化建设标准衡量检验各项监管工作，抓好整改，推动管理，以点带面，比学赶超，实现全市监管提档升级。</p>
				<p>“5”：健全完善队伍层级化管理、目标责任制考核、民警绩效化考核、岗位职责专业化、隐患清零问题整改常态化等五大机制。</p>
				<p>“8”：全速推进设施设备安全化、医疗卫生专业化、保障供给标准化、信息建设智能化、勤务模式科学化、一日生活军事化、学习教育校园化、版面台账统一化等八项措施落地，高点站位，统筹推进，扎实开展创亮点、树品牌攻坚行动，建设样板所，争创标兵所。</p>
			</div>
		</div>
		<script>
			$(function () {
				var $uList = $(".lbimg");
				var timer = null;
				$uList.hover(function () {
					clearInterval(timer);
				},function () {
					timer = setInterval(function () {
					scrollList($uList);
				},2000);
			}).trigger("mouseleave");
				function scrollList(obj) {
					var scrollHeight = $(".lbimg li:first").width();
					$uList.stop().animate({marginRight:-scrollHeight},1600,function () {
					$uList.css({marginRight:0}).find("li:first").appendTo($uList);
					});
				}
			});

		</script>	
		

<div class="jianxing">
		
	<!--    <param name="movie" value="/public/vivo/123.swf">文件路径 
	   <param name="wmode" value="opaque">透明（transparent）与不透明(opaque)
	   <param name="quality" value="high" />可用可以不用，品质高低。不用，则默认自动高品质  -->
		<!-- <embed height="129px"  width="1000px" src="/public/vivo/1700.swf" type="application/x-shockwave-flash" ></embed> -->
		<!-- <embed width="1010;" height="189" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" src="/public/vivo/xin.swf" style="margin-left: -5px;height: 189px;"> -->
		<img src="/public/vivo/5.gif" alt="" style="width: 1000px;margin-bottom: 10px;">
	</div>
	</div>
<div class="index_zhong">
	<div class="ge">			
	<div class="index_four">
				<div class="index_fourleft">
					<div class="foutlefttop">
						<div style="width:100px;float: left;height: 36px;text-align: center;font-size: 18px;line-height: 36px;font-weight: bold;color: white;background: #0068b7;">党建工作</div>
						<div class="foutrighttops">
					  <a href="/index.php/Listtype/index/typeId/8">更多>></a>
						
						</div>
						<div style="clear:both"></div>
					</div>
					<!-- 定位内容 -->
					<div class="fbottoom">
						<div class="lfoutleftbottom lrc_tz01" style="display:block">
						<!-- 医疗卫生 -->
						<?php if(is_array($ylws)): $i = 0; $__LIST__ = $ylws;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="tztbcontent">
							<div class="sanjiao"><img src="/public/images/anniu.png"></div>
							<div class="sanjiaorighr">
								<a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,20)); ?>
								</a>
							</div>
							<div class="index_date">
								<?php echo (msubstrda($v["dateandtime"],0,10)); ?>
									<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt="" class="img_new" ><?php endif; ?>
							</div>

						</div><?php endforeach; endif; else: echo "" ;endif; ?>						
						
						</div>

						
					</div>	
					<!-- 定位内容 -->
				</div>
				<div class="index_fourright">
					<div class="foutlefttop">
						<div style="width:100px;float: left;height: 36px;text-align: center;font-size: 18px;line-height: 36px;font-weight: bold;color: white;background: #0068b7;">监管风采</div>
						<div class="foutrighttops">
							<a href="/index.php/Listtype/index/typeId/9">更多>></a>
						
						</div>
						<div style="clear:both"></div>		
					</div>
					<!-- 定位内容 -->
					<div class="fbottoom">
						<div class="foutleftbottom lrc_tz02" style="display:block">
						<!-- 监管风采 -->
						<?php if(is_array($aqdpc)): $i = 0; $__LIST__ = $aqdpc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="tztbcontent">
							<div class="sanjiao"><img src="/public/images/anniu.png"></div>
							<div class="sanjiaorighr">
								<a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,20)); ?>
								</a>
							</div>
							<div class="index_date" ><?php echo (msubstrda($v["dateandtime"],0,10)); ?>
								<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt="" class="img_new" ><?php endif; ?>

										</div>
							
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
						<div class="foutrighttops">
					  
						
						</div>
						
						
						</div>

					</div>
					<!-- 定位内容 -->
				</div>
			</div>
	
	<div class="index_four">
				<div class="index_fourleft">
					<div class="foutlefttop">
						<div style="width:100px;float: left;height: 36px;text-align: center;font-size: 18px;line-height: 36px;font-weight: bold;color: white;background: #0068b7;">政策法规</div>
						<div class="foutrighttops">
					  <a href="/index.php/Listtype/index/typeId/12">更多>></a>
						
						</div>
						<div style="clear:both"></div>
					</div>
					<!-- 定位内容 -->
					<div class="fbottoom">
						<div class="lfoutleftbottom lrc_tz01" style="display:block">
						<!-- 监管先典型 -->
						<?php if(is_array($jgdx)): $i = 0; $__LIST__ = $jgdx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="tztbcontent">
							<div class="sanjiao"><img src="/public/images/anniu.png"></div>
							<div class="sanjiaorighr">
								<a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,20)); ?>
								</a>
							</div>
							<div class="index_date" ><?php echo (msubstrda($v["dateandtime"],0,10)); ?>
									<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt="" class="img_new" ><?php endif; ?>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>

					

					</div>	
					<!-- 定位内容 -->
				</div>
				<div class="index_fourright">
					<div class="foutlefttop">
						<div style="width:100px;float: left;height: 36px;text-align: center;font-size: 18px;line-height: 36px;font-weight: bold;color: white;background: #0068b7;">它山之石</div>
						<div class="foutrighttops">
							<a href="/index.php/Listtype/index/typeId/13">更多>></a>
						
						</div>
						<div style="clear:both"></div>		
					</div>
					<!-- 定位内容 -->
					<div class="fbottoom">
						<div class="foutleftbottom lrc_tz02" style="display:block">
						<!-- 他山之石 -->
						<?php if(is_array($tszs)): $i = 0; $__LIST__ = $tszs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="tztbcontent">
							<div class="sanjiao"><img src="/public/images/anniu.png"></div>
							<div class="sanjiaorighr">
								<a href="/index.php/News/index/id/<?php echo ($v["id"]); ?>"><?php echo (msubstr($v["title"],0,20)); ?>
								</a>
							</div>
							<div class="index_date" ><?php echo (msubstrda($v["dateandtime"],0,10)); ?>
									<?php if($date <= $v['time']): ?><img src="/public/vivo/new3.gif" alt="" class="img_new" ><?php endif; ?>										
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>

			
					</div>
					<!-- 定位内容 -->
				</div>
			</div>
			</div>
		
		<div class="mei" style="position:relative;">
			<ul class="funbox">
				<li onclick="location.href='/admin.php'">网上投稿</li>
				<li onmousemove="chenges();">信息查询</li>
				<li onclick="location.href='/index.php/Listtype/index/typeId/15'">监管通讯录</li>
				<li onclick="location.href='/index.php/Listtype/index/typeId/10'">视频播放</li>
			</ul>
			<div  id="img1" class="tit" onmousemove="chenges();"  >
			<ul class="mei_list"  onmouseout="chengesd();" style="top: 40px;">
				<li><a href="http://10.1.1.88:8080/jcxxv/">全国公安监所基础信息管理系统</a></li>
				<li><a href="http://10.94.60.175:8009/web">违法犯罪人员信息系统</a></li>
				<li><a href="http://ztry.xz.ga">全国在逃人员信息系统</a></li>
				<li><a href="http://www.jgzd.sx/">全市巡查通报</a></li>
				<li><a href="http://zyfw.ga/portal/">公安云搜索</a></li>
				
				
			</ul>
			</div>

			<!-- <img src="/public/images/xinxipaiming.png"> -->
			<div class="zhuanxiang_work">
				<!-- <div id="jx">绩效考核</div> -->
				<img src="/public/pic/box6.jpg" style="position:relative">
				<div style="position: absolute;top: 18px;left: 65px;font-size: 14px;color: #0068b7;text-align: center;cursor: pointer;" onclick="location.href='/index.php/Listtype/index/typeId/17'">重点工作成绩<br>公布</div>
				<span style="position:absolute;top:65px;left:25px;width:150px;text-align: center">
				<?php if(is_array($dundianbangdu)): $i = 0; $__LIST__ = $dundianbangdu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><div><a href="/index.php/News/index/id/<?php echo ($u["id"]); ?>"><?php echo (msubstr($u["title"],0,20)); ?></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
				</span>
			</div>
			<div id="jianguan"></div>
			<style>
				#txl{
					height: 30px;
					text-align: center;
					line-height: 30px;
					width: 200px;
					background: #0068b7;
					color: #fff;
					display: none;
					margin-bottom: 10px;
					cursor: pointer;
				}
				#jx{
					height: 30px;
					text-align: center;
					line-height: 30px;
					width: 200px;
					background: #0068b7;
					color: #fff;
					margin-top: 10px;
					cursor: pointer;
				}
				.jx{
					display: none;
				}
			</style>
			<script>
				$('#txl').click(function(){
					$('.txl,#jx').show();
					$('#txl,.jx').hide();
				})
				$('#jx').click(function(){
					$('.txl,#jx').hide();
					$('#txl,.jx').show();
				})
			</script>
			<div class="clearfix"></div> 
			<!-- <div class="zhuanxiang_work">
				<img src="/public/images/fwzc.jpg" style="position:relative">
				<span style="position:absolute;top:50px;left:25px;width:150px;text-align: center">
				<?php if(is_array($fwzc)): $i = 0; $__LIST__ = $fwzc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><div><a href="/index.php/News/index/id/<?php echo ($u["id"]); ?>"><?php echo (msubstr($u["title"],0,7)); ?></a></div><?php endforeach; endif; else: echo "" ;endif; ?>

				</span>
			</div> -->
			<div class="clearfix"></div> 	
		</div>

		<script>
		var obj = document.getElementById('img1')
			function chenges(){
				obj.className="tit1"
			}
			function chengesd(){
				obj.className="tit"
			}
		</script>
			<div class="clearfix"></div> 
			</div>
			<style>
				.xiala select{
					width: 180px;
				}
			</style>
<div class="xiala">
	<select onchange="s_click3(this)">
	
		<option>全国监管导航</option>
	  	<?php if(is_array($arrdd)): $i = 0; $__LIST__ = $arrdd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["imagepath"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	<select style="margin-left: 20px;" onchange="s_click1(this)">
		<option>省内监管导航</option>
	   <?php if(is_array($arraa)): $i = 0; $__LIST__ = $arraa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["imagepath"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	<select style="margin-left: 20px;" onchange="s_click2(this)">
		<option>市内监管导航</option>
	   <?php if(is_array($arrbb)): $i = 0; $__LIST__ = $arrbb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["imagepath"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	<select style="margin-left: 20px;" onchange="s_click4(this)">
		<option>省内市局导航</option>
	   <?php if(is_array($arrcc)): $i = 0; $__LIST__ = $arrcc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["imagepath"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	<select style="margin-left: 20px;" onchange="s_click5(this)">
		<option>推荐监管链接</option>
	   <?php if(is_array($arree)): $i = 0; $__LIST__ = $arree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["imagepath"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
	
</div>
<div class="button_xian">
	
</div>
<div class="copyright">
	版权所有：晋中市公安监管支队   <span style="color: yellow;"><a href="http://10.97.83.200:8080/web/">进入旧版</a></span>
</div>									
</body>
</html>
<!-- JS代码 -->
   <script type="text/javascript">
        //select跳页
        function s_click1(obj) {
            var num = 0;
            for (var i = 0; i < obj.options.length; i++) {
                if (obj.options[i].selected == true) {
                    num++;
                }
            }
            if (num == 1) {
                var url = obj.options[obj.selectedIndex].value;
                window.open(url); //这里修改打开连接方式
            }
        }
          function s_click2(obj) {
            var num = 0;
            for (var i = 0; i < obj.options.length; i++) {
                if (obj.options[i].selected == true) {
                    num++;
                }
            }
            if (num == 1) {
                var url = obj.options[obj.selectedIndex].value;
                window.open(url); //这里修改打开连接方式
            }
        }
          function s_click3(obj) {
            var num = 0;
            for (var i = 0; i < obj.options.length; i++) {
                if (obj.options[i].selected == true) {
                    num++;
                }
            }
            if (num == 1) {
                var url = obj.options[obj.selectedIndex].value;
                window.open(url); //这里修改打开连接方式
            }
        }
          function s_click4(obj) {
            var num = 0;
            for (var i = 0; i < obj.options.length; i++) {
                if (obj.options[i].selected == true) {
                    num++;
                }
            }
            if (num == 1) {
                var url = obj.options[obj.selectedIndex].value;
                window.open(url); //这里修改打开连接方式
            }
        }
          function s_click5(obj) {
            var num = 0;
            for (var i = 0; i < obj.options.length; i++) {
                if (obj.options[i].selected == true) {
                    num++;
                }
            }
            if (num == 1) {
                var url = obj.options[obj.selectedIndex].value;
                window.open(url); //这里修改打开连接方式
            }
        }
    </script>