<?php
$this->breadcrumbs=array(
    '图文消息'=>array('gpmat/graph'),
	'编辑图文消息',
);
?>
<div id="js_nav">js_mat_graph</div>
<div class="row">
	<div class="col-md-5">
		<div class="gp_doc_default">111</div>
	</div>
	<div class="col-md-7">
		<div class="gp_bubble">
			<form id="graph-form" method="post"
				action="/bts/index.php?r=gpmat/ajaxaddgraph" role="form"
				enctype="multipart/form-data">
				<div class="form-group">
					<label for="maintitle">标题</label> <input type="text"
						class="form-control input-sm" name="Graph[maintitle]">
				</div>
				<div class="form-group">
					<label for="author">作者 (选填)</label> <input type="text"
						class="form-control input-sm" name="Graph[author]">
				</div>
				<div class="form-group">
					<label for="graph">封面</label> 
					<input type="file" id="graph" name="Graph[graph]">
					<p class="help-block">
						大图片建议尺寸：720像素 * 400像素 <br> 小图片建议尺寸：400像素 * 400像素
					</p>
				</div>
				<div class="form-group">
					<label for="article">正文</label>
					<textarea id="article" name="Graph[article]"
						class="form-control input-sm" rows="5"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">保存</button>
			</form>
			<br>
		</div>
	</div>
</div>

<script>
$(function () {
	$("form").submit(function() {
        alert("submit");
        $.ajax({ 
            url:'./index.php?r=gpmat/ajaxaddgraph',
            type:'POST',
            data: $('#graph-form').serialize(),
            dataType: 'json',
            success: function(json)
            { 
            	alert('111');
            },
            
            error: function(){ alert('222');}
            }); 
        return false;
    });
});
</script>
