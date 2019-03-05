<?php 
 function Youtube($id,$width,$height) { 
 //eIPjJElVx0U
	echo '
	<object width="'.$width.'" height="'.$height.'">
	<param name="movie" value="http://www.youtube.com/v/'.$id.'&hl=es_ES&fs=1&"></param>
	<param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
	<embed src="http://www.youtube.com/v/'.$id.'&hl=es_ES&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="'.$width.'" height="'.$height.'">
	</embed>
	</object>';
	} 

?>
<html>
<body>
<head></head>
<table style="align=center">
<tr>
<?php Youtube('E2tMV96xULk',500,340);?>

</tr>
</table>
</body>
</html>