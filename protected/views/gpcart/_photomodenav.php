<div id="examples-nav">
<div id="js_examples_nav"><?php echo $photo_group_id ?></div>
<div id="examples-pager"><b>相册列表</b></div>
<ul id="examples-list">

<li id="0"><a href="./index.php?r=gpcart/photomode">全部</a></li>
<?php foreach($photogrouprows as $k=>$photogrouprows){
if (mb_strlen($photogrouprows['maintitle'],'utf-8')>8)
{$maintitle = mb_substr($photogrouprows['maintitle'],0,8,'utf-8').'..';}
else
{$maintitle = $photogrouprows['maintitle'];}

echo '<li id="'.$photogrouprows['photo_group_id'].'">
<a href="./index.php?r=gpcart/photomode&photo_group_id='.$photogrouprows['photo_group_id'].'">'
.$maintitle.
'</a></li>';
}
?>
</ul>

<div id="examples-pager-photo"><b>已选择相片</b>
(<a class="photomode-clearcart" href="javascript:void(0)">清空</a>)
<br>不能超过10张</div>
<ul id="examples-list-photo">

</ul>
</div>

<script>
$(function(){
	js_examples_nav_id=$('#js_examples_nav').html();
	$('#'+js_examples_nav_id).addClass('active');
});
</script>