<?php
$this->breadcrumbs=array(
	'群发图文消息'=>array('gpcart/modechoose'),
    '从相册中选择相片'
);
?>
<div id="js_nav">js_cart_photo</div>
<div class="gp_doc_step">
	<div class="row">
		<div class="col-xs-6">
			<div class="gp_doc_step_cur">2 从相册中选择相片</div>
		</div>
	</div>
</div>

<div class="gp_doc_step_content">
	<div class="row">
		<div class="col-xs-3">
		<?php $this->renderPartial('_photomodenav',
		array('photogrouprows'=>$photogrouprows,
		'photo_group_id'=>$photo_group_id,)); ?>
		</div>
		<div id="search_list" class="col-xs-8">
		<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_photomode',
    'pagerCssClass'=>'',
    'template'=>"{summary}\n{items}\n{pager}",
		)); ?>

		</div>
	</div>
<div class="row">
<div class="col-xs-1"></div>
<div class="col-xs-2"><a href="./index.php?r=gpcart/modechoose" class="btn btn-default btn-sm">上一步</a></div>
<div class="col-xs-7"></div>
<div class="col-xs-2"><a href="./index.php?r=gpcart/photomodesort" class="btn btn-success btn-sm">下一步</a></div>
</div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.pin.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/gp/js/jquery.cookie.js"></script>
<script>
//$(function () {
//	$("#examples-nav").pin({
//	      containerSelector: ".gp_doc_step_content"
//	});
//});
</script>
<script>
$(function () {
	var oFormgroup = $('<div class="form-group"></div>'),
	oLabelMaintitle = '<label class="col-sm-3 control-label">相片名称</label>',
	oTxtMaintitle = '<div class="col-sm-9"><input class="form-control" name="maintitle" id="maintitle" type="text" maxlength="30" /></div>',
	oMaintitle = oFormgroup.clone().append(oLabelMaintitle).append(oTxtMaintitle),

	oLabelContent = '<label class="col-sm-3 control-label">相片描述</label>',
	oTxtContent = '<div class="col-sm-9"><textarea class="form-control" row="3" name="content" id="content"></textarea></div>',
	oContent = oFormgroup.clone().append(oLabelContent).append(oTxtContent),

	oTxtUpdate_date = '<input type="hidden" name="update_date" />'

	oBtnSave = '<div class="col-sm-offset-3 col-sm-3"><button type="button" class="btn btn-primary btn-xs photomode-save">保存相片信息</button></div>',
	oBtnCancel = '<div class="col-sm-3"><button type="button" class="btn btn-default btn-xs photomode-cancel">取消并隐藏</button></div>',
	oTmpForm = $('<form></form>').append(oMaintitle).append(oContent).append(oTxtUpdate_date).append(oBtnSave).append(oBtnCancel),
	oForm = $('<div id="new-form" class="form-horizontal"><br></div>').append(oTmpForm);
	
    $('#search_list').on('click', '.photomode-edit',
    function()
    	{
    	$('#new-form').remove();
    	var oDiv = $(this).parent().parent().next();
    	var photo_id = oDiv.attr('id');
    	var url = './index.php?r=gpcart/ajaxphotoupdate&photo_id='+photo_id;
    	oForm.clone().hide().appendTo(oDiv).slideDown();
    	
    	$.ajax({ 
        	url: url,
        	dataType: 'json',
        	success: function(json){
            	$('#new-form').find('input[name="maintitle"]').val(json.photo.maintitle);
            	$('#new-form').find('textarea[name="content"]').val(json.photo.content);
            	$('#new-form').find('input[name="update_date"]').val(json.photo.update_date);
            },
            error: function(){ 
                alert('error');
                $('#new-form').remove();}
        });

    	$('#new-form').on('click','.photomode-cancel',
                function(){$('#new-form').slideUp();});

        $('#new-form').on('click','.photomode-save',
            	function(){
                	$.ajax({ 
                    	url: url,
                    	type: 'POST',
                    	data:$('form').serialize(),
                    	dataType: 'html',
                    	success: function(data){
                    		$('#new-form').parent().parent().replaceWith($(data));
                        },
                        error: function(){ 
                            alert('error');
                            }
                    });
        			//return false;
                	});
        
        });
});
</script>
<script>
$(function () {
	if($.cookie('photocart'))
	{
	var photocart = JSON.parse($.cookie('photocart'));
	$.each(photocart, function (key, value)
		{
		oLi = $('<li><span class="hide">'+value.photo_id+'</span><a href="javascript:void(0)"><span>'+value.maintitle+'</a></span></li>');
		$('#examples-list-photo').append(oLi);
		});
	}
	else
	{
	var photocart = [];
    };

    $('.photomode-clearcart').click(function(){
    	if($.cookie('photocart'))
    	{
    	$.removeCookie('photocart');
    	photocart = [];
    	$('#examples-list-photo').children().fadeOut();
    	}
        });
    
    $('#search_list').on('click','.photomode-add',
	    function(){
        var photo_id = $(this).parent().parent().next().attr('id');
        var maintitle = $(this).parent().parent().parent().find('h4').html().substr(0,15);
    	var arrNew = JSON.parse('{"photo_id":"'+photo_id+'","maintitle":"'+maintitle+'"}');

        if(photocart.length>=10)
        {
		alert('图片过多,已到上限'+photocart.length+'张');
        }
        else
        {
    	photocart.push(arrNew);

    	$.cookie('photocart', JSON.stringify(photocart), { expires: 1 });
		
		oLi = $('<li><span class="hide">'+photo_id+'</span><a href="javascript:void(0)"><span>'+maintitle+'</span></a></li>');
		$('#examples-list-photo').append(oLi);
	    };
        });

        $('#examples-list-photo').on('click','li',
                function(){
        			var index = -1;
        			var photo_id = $(this).children().eq(0).html();
        			
            		for (var i = 0; i < photocart.length; i++) {
                	
                	if (photocart[i].photo_id == photo_id) {
                    index = i;
                    
                    photocart.splice(i,1);
                    $.cookie('photocart', JSON.stringify(photocart), { expires: 1 });
                    break;
                	}
            		}
            		$(this).remove();
        		});

});
</script>
