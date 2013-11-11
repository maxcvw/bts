<?php
$this->breadcrumbs=array(
	'微信公众账号',
);
?>
<div id = "js_nav">js_wx_list</div>
<div class="gp_doc_default">
	<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	)); ?>
</div>