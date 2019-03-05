<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Twitter Searc</title>
<style type="text/css">
.woork{
	color:#444;
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	width:600px;
	margin: 0 auto;
}
.twitter_container{
	color:#444;
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	width:450px;
	margin: 0 auto;
}
.twitter_container a{
	color:#0066CC;
}
.twitter_status{
	height:60px;
	padding:6PX;
	border-bottom:solid 1px #DEDEDE;
}
.twitter_image{
	float:left; 
	margin-right:14px;
	border:solid 2px #DEDEDE;
	width:50px;
	height:50px;
}
.twitter_small{
 font-size:11px;
 padding-top:4px;
 color:#999;
}
</style>
</head>

<body>
<div class="twitter_container">
<strong>Try to search something on twitter:</strong><br />
Created by <a href="http://woork.blogspot.com">woork</a> <br/>
<br/>
<form action="index.php" method="submit">
<input name="twitterq" type="text" id="twitterq" />
<input type="submit" name="Submit" />
</form>
<p>
<?php 
include('search.php');
if($_GET['twitterq']){
	$twitter_query= $_GET['twitterq'];
	$search = new TwitterSearch($twitter_query);
	$results = $search->results();
	
	
	foreach($results as $result){
			echo '<div class="twitter_status">';
			echo '<img src="'.$result->profile_image_url.'" class="twitter_image">';
			$text_n=toLink($result->text);
			echo $text_n;
			echo '<div class="twitter_small">';
			echo '<strong>From:</strong> <a href="http://www.twitter.com/'.$result->from_user.'">'.$result->from_user.'</a>: ';
			echo '<strong>at:</strong> '.$result->created_at;
			echo '</div>';
			echo '</div>';
	}
}
?>
</div>
</body>
</html>
