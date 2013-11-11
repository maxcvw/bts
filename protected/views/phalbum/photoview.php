<head>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/ph/css/photoswipe.css" type="text/css" rel="stylesheet" />
<style>
img {
width: 99%;
}

ul {
list-style: none;
padding: 0;   
margin: 0; 
}

li 
{padding: 0;   
margin: 0; 
}

.Gallery{
width: 100%;
}

.Gallery .pic{
width: 33%;

float: left;
}
</style>
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/ph/js/klass.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/ph/js/code.photoswipe-3.0.5.min.js"></script>
		<script type="text/javascript">

		(function(window, PhotoSwipe){
		
			document.addEventListener('DOMContentLoaded', function(){
			
				var
					options = {},
					instance = PhotoSwipe.attach( window.document.querySelectorAll('.Gallery a'), options );
			
			}, false);
			
			
		}(window, window.Code.PhotoSwipe));
		
	</script>
	
</head>
<body>
	
<ul class="Gallery">
		
		<li class="pic">
			<ul>
				<?php $len=sizeof($column_photo);
                 $n=0;
           for($i=0;$i<$len/3;$i++)
           {
           	  
           	 echo '<li><a href="'.Yii::app()->request->baseUrl.$column_photo[$i].'"><img src="'.Yii::app()->request->baseUrl.$column_photo[$i].'" alt="Image 004" /></a></li>';
              $n=$i+1;
               
           }

	?>
				

			</ul>
		</li>
		<li class="pic">
			<ul>
				<?php $len=sizeof($column_photo);
                
           for($i=$n;$i<$len*2/3;$i++)
           {
           	  
           	 echo '<li><a href="'.Yii::app()->request->baseUrl.$column_photo[$i].'"><img src="'.Yii::app()->request->baseUrl.$column_photo[$i].'" alt="Image 004" /></a></li>';
              $n=$i+1;
              
           }

	?>
			</ul></li>
		<li class="pic">
			<ul>
				<?php $len=sizeof($column_photo);
                
           for($i=$n;$i<$len;$i++)
           {
           	  
           	 echo '<li><a href="'.Yii::app()->request->baseUrl.$column_photo[$i].'"><img src="'.Yii::app()->request->baseUrl.$column_photo[$i].'" alt="Image 004" /></a></li>';
           	 
             
           }

	?>
			</ul>
		</li>
		
	</ul>
</body>