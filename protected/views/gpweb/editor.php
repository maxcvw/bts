<?php
$this->breadcrumbs=array(
    '微网站'=>array('gpweb/index'),
	'微网站编辑器',
);
?>
<div id="js_nav">js_web_editor</div>
<div class="row">
	<div class="col-md-1">
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="#web_menu" data-toggle="tab">菜<br>单<br>编<br>辑</a>
			</li>
			<li><a href="#web_banner" data-toggle="tab">主<br>图<br>编<br>辑</a></li>
			<li><a href="#web_type" data-toggle="tab">分<br>类<br>编<br>辑</a></li>
			<li><a href="#web_list" data-toggle="tab">列<br>表<br>编<br>辑</a></li>
		</ul>
	</div>
	<div class="col-md-5">
		<div class="tab-content">
			<div class="tab-pane active" id="web_menu">
				<p>单击文字编辑内容</p>

				<table class="table table-bordered">
					<tr>
						<td width="35%"></td>
						<td width="40%"><b>菜单名称</b></td>
						<td width="25%"><b>标签</b></td>
					</tr>
					<tr id="tr">
						<td>
							<div class="btn-group">
								<button id="plus" type="button" class="btn btn-default btn-xs">
									<span class="glyphicon glyphicon-plus"></span>
								</button>
								<button id="minus" type="button" class="btn btn-default btn-xs">
									<span class="glyphicon glyphicon-minus"></span>
								</button>
								<button id="up" type="button" class="btn btn-default btn-xs">
									<span class="glyphicon glyphicon-arrow-up"></span>
								</button>
								<button id="down" type="button" class="btn btn-default btn-xs">
									<span class="glyphicon glyphicon-arrow-down"></span>
								</button>
							</div>
						</td>
						<td id="web_menu_content">首页</td>
						<td id="web_tag"></td>
					</tr>

				</table>

			</div>
			<div class="tab-pane" id="web_banner">222</div>
			<div class="tab-pane" id="web_tag">333</div>
			<div class="tab-pane" id="web_list">444</div>
		</div>
	</div>
</div>
<script>
$(function(){
	//button
	$('#plus').click(
			 function () {
				 oTr = $(this).parent().parent().parent();
				 oTr.clone(true).insertAfter(oTr);
				 });
	$('#minus').click(
			 function () {
				 oTr = $(this).parent().parent().parent();
				 oTr.remove();
				 });
	$('#up').click(
			 function () {				 
				 oTr = $(this).parent().parent().parent();
				 if(oTr.prevAll().length==1){
					 alert('已经排在第一位!');
				 }
				 else {
				 oPrevTr = oTr.prev();
				 oTr.insertBefore(oPrevTr);
				 }
				 });
	$('#down').click(
			 function () {				 
				 oTr = $(this).parent().parent().parent();
				 if(oTr.nextAll().length==0){
					 alert('已经排在最后一位!');
				 }
				 else {
				 oNextTr = oTr.next();
				 oTr.insertAfter(oNextTr);
				 }
				 });
	 //edit menu content
	 $('#web_menu_content, #web_tag').click(
             function () {
                 oTd = $(this);
            	 //插入textbox
                 strTdTxt = $.trim(oTd.text());
                 oTdInput = $('<input type="text" class="form-control" value="'+strTdTxt+'">');
                 oTd.html(oTdInput);
                 //取消click事件
                 oTdInput.click(function() { return false; });
                 //获取焦点
                 oTdInput.focus().val(strTdTxt);
                 oTdInput.blur(function() {
                   	 strTdTxtnew = $(this).val();
                   	 oTd.html(strTdTxtnew);
                        });
                 });
});
</script>
