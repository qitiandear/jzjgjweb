<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>晋中公安监管信息网</title>
<link href="/public/css/second1_con.css" rel="stylesheet">
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
		<div class="lrc_neirongquright">
				<div class="lrc_tzlm">
					<b>站内搜索</b>
					<span>&nbsp;&nbsp;&nbsp;</span>
					
					<div class="dinwei" >
					<img src="/public/images/lrc_dw.png" alt="">
					
					<a href="/index.php">首页</a> >
					<a href="/index.php/Serach/index">站内搜索</a>
				
					</div>
					<div class="clearfix"></div>
				</div>
				
				<div class="jinchaneir">
					<form name="frm" method="get" action="/index.php/Serach/search.html">
       
        <table border="0" align="center" width="500" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left">
              &nbsp;文章搜索：<input type="text" name="keyword" size="30" style="width: 300px;" value="">
         
              <select name="search">
                <option value="title">标题</option>
                <option value="content" selected>内容</option>
                 <option value="date">时间</option>
              </select>
              <input type="submit" value="搜索">
            </td>
          </tr>
        </table>
        </form>
				
					
			</div>
			

		<br> 
			<div style="margin-left: 10%;">
				<div class="pagelist row"><?php echo ($pageList); ?></div>
			</div>
			</div>
			<div class="clearfix"></div>
</div>
<div class="button_xian">
	
</div>
<div class="copyright">
	Copyright@2010 晋中城区公安信息网 All Rights Reserved.
</div>	
</body>
</html>