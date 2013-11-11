<?php
$this->breadcrumbs=array(
	'图文消息',
);
?>
<div id = "js_nav">js_mat_graph</div>
<div class="gp_doc_default">
<a href="./index.php?r=gpmat/addgraph" class="btn btn-success btn-xs" role="button">新增图文消息</a>
<div class="gp_line"></div>

<table class="table table-bordered">
	<tr>
		<td width="10%"><b>ID</b></td>
		<td width="40%"><b>标题</b></td>
		<td width="30%"><b>更新时间</b></td>
		<td width="10%"><b>编辑</b></td>
		<td width="10%"><b>删除</b></td>
	</tr>
	<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_graph',
	)); ?>
	</table>
</div>
