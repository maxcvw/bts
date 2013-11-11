<?php
$this->breadcrumbs=array(
	'群发图文消息'=>array('gpcart/modechoose'),
    '从相册中选择相片'
);
?>
<div id="js_nav">js_cart_photo</div>
<div class="gp_doc_step">
	<div class="row">
		<div class="col-xs-9">
			<div class="gp_doc_step_cur">3 相片排序与预览</div>
		</div>
	</div>
</div>

<div class="gp_doc_step_content">
<div class="row">
<div class="col-xs-6">
<button type="button" class="btn btn-primary btn-sm">刷新并预览</button>
<br>
<?php $this->renderPartial('_photomodesort',
		array('phototemplist'=>$phototemplist,
		)); ?>
</div>
<div class="col-xs-6">
<p>通过拖拽筛选与排序</p>


<div class="gp_line"></div>
<div class="row">

<div class="col-xs-6">
<div class="text-info text-center">已选择的相片</div>

<ul id="sortable1" class="list-group gp_doc_gray_min">
<?php if(isset($_COOKIE["photocart"]))
{
	$photocart=json_decode($_COOKIE["photocart"]);
	//echo $photocart[0]->photo_id;
	foreach ($photocart as $photoitem) {
    echo '<li class="list-group-item"><span class="gp_hide">'
    .$photoitem->photo_id.'</span><span>'
    .$photoitem->maintitle.'</span></li>';
	}
	unset($photoitem);
}?>

</ul>
</div>

<div class="col-xs-6">
<div class="text-danger text-center">不需要的相片</div>
<ul id="sortable2" class="list-group gp_doc_gray_min">

</ul>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-1"></div>
<div class="col-xs-2"><a href="./index.php?r=gpcart/photomode" class="btn btn-default btn-sm">上一步</a></div>
<div class="col-xs-7"></div>
<div class="col-xs-2"><a href="./index.php?r=gpcart/photomodefinish" class="btn btn-success btn-sm">下一步</a></div>
</div>
</div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.ui.core.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.ui.widget.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.ui.mouse.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.ui.sortable.js"></script>
<script>
$(function() {
	$( "#sortable1, #sortable2" ).sortable({
		connectWith: ".list-group"
	}).disableSelection();
});
</script>
