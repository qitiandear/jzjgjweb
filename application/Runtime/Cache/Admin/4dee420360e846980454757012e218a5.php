<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>晋中公安监管信息系统</title>
<link href="/public/css/reset.css" type="text/css" rel="stylesheet" />
<script src="/library/js/guanli.js"></script>
<style>
  body{
    background-image:url('/public/images/320.jpg');
    background-attachment: fixed;
    background-repeat: no-repeat;
    
}
</style>
</head>
<body>
<script>
//确定所选
  function determine(){
    var valArr = new Array; 
    for(var i=0;i<iobj.length;i++){
      //判断每一个iobj[i]的checked属性
      if(iobj[i].checked==true){
        var id = iobj[i].value; 
        valArr.push(id);
      }
    }
    var vals = valArr.join('.');//转换为逗号隔开的字符串
    console.log(vals);
    
      if(confirm("是否删除")){
        // document.getElementById("taken_").innerHTML = "<span style='color:green;'>已还书</span>";
         window.location = '/admin.php/AddNews/deleted/id/'+vals;
        }
  
  }
</script>
<br>
<h3 align="center">文章列表</h3>
<br>
	<form name="frm" method="get" action="/admin.php/AddNews/search.html">
       
        <table border="0" align="center" width="700" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left">
              &nbsp;文章搜索：<input type="text" name="keyword" size="30" value="">
              <select name="search">
                <option value="title">标题</option>
                <option value="content" selected>内容</option>
              </select>
              <input type="submit" value="搜索">
            </td>
          </tr>
        </table>
        </form>
        <br>
        <table border="1" align="center" width="90%" cellpadding="0" class="box" cellspacing="0" style="text-align:center;">
          <tr height="30" style="font-weight:bold;">
            <td>文章编号</td>
            <td>文章类型</td>
            <td>发表时间</td>
            <td>文章标题</td>
            <td>是否审核</td>
            <td>操作</td>
            <td>批量操作</td>
          </tr>
          <?php if(is_array($newsInfo)): $i = 0; $__LIST__ = $newsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr height="25">
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["typeName"]); ?></td>
            <td><?php echo ($v["dateandtime"]); ?></td>
            <td align="left"><?php echo ($v["title"]); ?></td>
            <td>
          <?php if($v["state"] == 8 ): ?>已审核
            <?php else: ?>
             未审核<?php endif; ?>
           
            </td>
            <td>
            <a href="/admin.php/AddNews/index/articleId/<?php echo ($v['id']); ?>">修改</a>&nbsp;&nbsp;
            <a href="#" onclick="delNews(<?php echo ($v["id"]); ?>)">删除</a></td>
            <td><input type="checkbox" name="ids[]" id="<?php echo ($v["id"]); ?>" value="<?php echo ($v["id"]); ?>"/></td> 
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          
          <tr>
    <td colspan="6" align="center" class="pagelist"><?php echo ($pageList); ?></td>
    <td colspan="1" align="center" style="cursor:pointer">
    <a href="javascript:selectAll()">全选</a>&nbsp;|&nbsp;<a href="javascript:fselectAll()">反选</a>&nbsp;|&nbsp;<a href="javascript:determine();">确定所选</a>
     </td>

     	 </tr>
        </table>
            <script type="text/javascript">
	//删除新闻
	function delNews(articleId){
		if (confirm("是否删除该文章")) {
			window.location = "/admin.php/AddNews/Recycling/articleId/"+articleId;
		}
	}
    </script>
</body>
</html>