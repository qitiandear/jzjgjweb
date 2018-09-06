<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>晋中公安监管信息网</title>
<link href="/public/css/second1_con.css" rel="stylesheet">
<style>
	.lrc_neirongquright{
		border: 1px solid #ccc;
	}
	.newsContent{
		text-align: left;
	}
</style>
</head>

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
<div id="tianqi">
		<div id="tianqinei">
			<iframe width="1000" scrolling="no" height="25" frameborder="1px solid #fff" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=1&color=%23FF0000&bgc=%23FFFFFF&bdc=%23&icon=3&wind=1&num=2"></iframe>
		</div>
</div>
<div class="tongzhi_tongbao">
<div class="lanmu_nav">
	<img src="/public/images/lanmu_nav.png">
	<div class="list">
		<ul>
		 <?php if(is_array($listtype)): $i = 0; $__LIST__ = $listtype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Listtype/index/typeId/<?php echo ($v["typeId"]); ?>"><?php echo ($v["typeName"]); ?></a> <span>&gt;&gt;</span>	</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>
		<div class="lrc_neirongquright" >
				<div class="lrc_tzlm" >
					<b><?php echo ($type["typeName"]); ?></b>
					<span>&nbsp;&nbsp;&nbsp;</span>
					
					<div class="dinwei" >
					<img src="/public/images/lrc_dw.png" alt="">
					
					<a href="/index.php">首页</a> >
					<a href="javascript:"><?php echo ($type["typeName"]); ?></a>
				
					</div>
					<div class="clearfix"></div>
				</div>
				
			
					<div class="jinchaneirnei" >
					
						<div class="lrc_onelist">
						<div  style="margin:0 auto;text-align: center;"><?php echo ($news["title"]); ?></div>
	  	<div class="newsTime" style="margin-left: 35%;">发布时间：<?php echo (msubstrda($news["dateandtime"],0,10)); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
	  	<div class="newsImg">
	  	<?php if($news["imagepath"] != NULL ): ?><img src="/public/<?php echo ($news["imagepath"]); ?>" width="400" height="300" style="margin-left: 24%;"><?php endif; ?>
		  </div>
	 	 <div style="margin-left: 4%;
	 	 "><?php echo ($news["content"]); ?></div>
	 
				

		
			<div style="margin-left: 10%;">
				<div class="pagelist row"><?php echo ($pageList); ?></div>
			</div>
			</div>
			</div>

			<div class="clearfix"></div>
			</div>
</div>

</body>
</html>