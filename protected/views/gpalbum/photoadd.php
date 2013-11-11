<?php
$this->breadcrumbs=array(
    '相册管理'=>array('gpalbum/list'),
	'上传相片',
);
?>
<div id="js_nav">js_album_photo</div>
<div id="gp_hide">
<?php echo CHtml::encode($data->photo_group_id); ?>
</div>
<div class="gp_doc_default">
	<div class="row">
		<div class="col-xs-12">
			<h3>
			<?php echo CHtml::encode($data->maintitle); ?>
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4">
			<a
				href="./index.php?r=gpalbum/photoview&photo_group_id=<?php echo CHtml::encode($data->photo_group_id); ?>"
				class="thumbnail"> <img
				src="<?php echo Yii::app()->request->baseUrl; ?><?php echo CHtml::encode($data->photo_url); ?>">
			</a>
		</div>
		<div class="col-xs-8">
			<small><?php echo CHtml::encode($data->content); ?> </small>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-2">
			<a
				href="./index.php?r=gpalbum/albumcover&photo_group_id=<?php echo CHtml::encode($data->photo_group_id); ?>"><small>更换相册封面</small>
			</a>
		</div>
		<div class="col-xs-2">
			<a
				href="./index.php?r=gpalbum/photoadd&photo_group_id=<?php echo CHtml::encode($data->photo_group_id); ?>"><small>上传相片</small>
			</a>
		</div>
		<div class="col-xs-2">
			<a
				href="./index.php?r=gpalbum/albumadd&photo_group_id=<?php echo CHtml::encode($data->photo_group_id); ?>"><small>编辑相册内容</small>
			</a>
		</div>
		<div class="col-xs-2">
			<a
				href="./index.php?r=gpalbum/photoview&photo_group_id=<?php echo CHtml::encode($data->photo_group_id); ?>"><small>查看相片</small>
			</a>
		</div>
	</div>
	<div class="gp_line"></div>

	<div class="row">
		<div class="col-md-12">
			<span class="btn btn-success btn-sm fileinput-button"> 
			<i class="glyphicon glyphicon-plus"></i> 
				<span>上传相片</span> <!-- The file input field used as target for the file upload widget -->
				<input id="fileupload" type="file" name="files[]" multiple> </span>
			<br> <br>
			<div id="progress" class="progress">
				<div class="progress-bar"></div>
			</div>

		</div>

	</div>

	<!-- The container for the uploaded files -->
	<div id="files" class="row"></div>
</div>

<script
	src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script
	src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script
	src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.fileupload.js"></script>
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
	$('#fileupload').click(function(){
		$('#progress .progress-bar').css(
	            'width',
	            '0%'
	        );
		});
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = './index.php?r=gpalbum/photoupload&photo_group_id='+$('#gp_hide').html();
    var uploadSpan = $('<span/>')
            .addClass('text-primary')
            .text('正在上传...');
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        add: function (e, data) {
            data.context = $('<div/>').addClass('col-xs-3').appendTo('#files');
            $.each(data.files, function (index, file) {
                var node = $('<p/>')
                        .append($('<span/>').text(file.name));
                    node
                        .prepend('<br>')
                        .prepend(uploadSpan.clone(true));
                    node.appendTo(data.context);
                    data.submit()
                    .success(function (json) {
                    	if(json.photogroup.errormsg=='保存成功')
                    	{
                    	$(node).children().last().replaceWith($('<img/>').attr('src','.'+json.photogroup.thumb_url).addClass('thumbnail'));
                    	//$(node).children().last().replaceWith($('<div/>')).addClass('thumbnail').append($('<img/>').attr('src','.'+json.photogroup.photo_url));
                    	$(node).children().first().toggleClass('text-success').html(json.photogroup.errormsg);
                    	}
                	else{
                		$(node).children().first().toggleClass('text-danger').html(json.photogroup.errormsg);
                    	};
                    })
                    .error(function () {alert('error');});
                     
            });
        },

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
