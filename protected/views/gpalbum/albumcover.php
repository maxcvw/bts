<?php
$this->breadcrumbs=array(
    '相册管理'=>array('gpalbum/list'),
	'更换相册封面',
);
?>
<div id="js_nav">js_album_photo</div>
<div id="gp_hide">
<?php echo CHtml::encode($model->photo_group_id); ?>
</div>
<div class="gp_doc_default">
<div class="row">
<div class="col-xs-12"><h3><?php echo CHtml::encode($model->maintitle); ?></h3></div>
</div>
<div class="row">
<div class="col-xs-4">
<div class="thumbnail">
<img id="albumcover" src="<?php echo Yii::app()->request->baseUrl; ?><?php echo CHtml::encode($model->photo_url); ?>">
</div>
</div>
<div class="col-xs-8"><small><?php echo CHtml::encode($model->content); ?></small></div>
</div>
<br>
<div class="row">
<div class="col-md-4">
<span class="btn btn-success btn-sm fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>上传相册封面</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="albumcover">
</span>
<a href="./index.php?r=gpalbum/list" class="btn btn-warning btn-sm">
<i class="glyphicon glyphicon-ban-circle"></i>
返回相册列表</a>
<br><br>
<div id="progress" class="progress">
        <div class="progress-bar"></div>
    </div>

<div id="errormsg"></div>
</div>

</div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.fileupload.js"></script>

<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
	$('#fileupload').click(function(){
	$('#progress .progress-bar').css(
            'width',
            '0%'
        );
	});
    'use strict';
    var url = './index.php?r=gpalbum/coverupload&photo_group_id='+$('#gp_hide').html();
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        success: function(json)
        { 
        	if(json.photogroup.errormsg=='保存成功')
            	{
                $('#errormsg').attr('class','alert alert-success').html(json.photogroup.errormsg).fadeIn().delay(3000).fadeOut();
                $('#albumcover').attr('src','.'+json.photogroup.photo_url)
            	}
        	else{
            	$('#errormsg').attr('class','alert alert-danger').html(json.photogroup.errormsg).fadeIn();
            	};
        },
        
        error: function(){ alert('error');},
        progressall: function (e, data) {
        	
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    });
});
</script>