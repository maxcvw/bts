<?php
$this->breadcrumbs=array(
	'相册管理',
);
?>
<div id="js_nav">js_album_photo</div>
<div class="gp_doc_default">
<a href="./index.php?r=gpalbum/albumadd" class="btn btn-success btn-xs">创建相册</a>

<div class="gp_line"></div>

		<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_list',
		)); ?>


</div>
