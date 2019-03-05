<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Send a message to Twitter using PHP</title>
<style type="text/css">
body{
font-family:'Lucida Grande', Verdana, sans-serif;
font-size  : 14px; 
color      :#666666;
} 
h2{
color:#000000;
} 
h3{
color:#000000; 
font-size:14px;
} 
p{font-size:12px; color:#333333;
} 
input{
font-size:18px; 
color    :#444444;
}
a:link, a:visited, a:hover{
color    :#0033CC;
}
a:hover{
text-decoration :none;
}
div.footer{
padding    : 6px; 
border-top :solid 1px #DEDEDE; 
font-size  :10px;
}
div.msg{
background    :#FFFFCC; 
margin-bottom :10px; 
padding       :4px;
} 
div.code{
padding       :10px; 
background    :#FFFFCC; 
font-size     :11px; 
color:#000000; 
margin-bottom:20px; 
width:300px; 
border:solid 1px #CCCCCC;
}
</style>

</head>
<?php
/***********************************************
**Change these parameters with your Twitter*****
**username and Twitter password.           *****
***********************************************/

$twitter_username = 'miguel_aam@hotmail.com';
$twitter_psw	  = 'kol222maam';
//Don't change the code belove
require('twitterAPI.php');
	if(isset($_POST['twitter_msg'])){
		$twitter_message=$_POST['twitter_msg'];
		if(strlen($twitter_message)<1){
			$error=1;
		}else{
			$twitter_status=postToTwitter($twitter_username, $twitter_psw, $twitter_message);
		}
	}
?>



<body>
<h2>Post a message on Twitter</h2>
<p>This page use  Twitter API to send an message with postToTwitter() function.</p>
<!-- This is the form that you can reuse in your site -->
<?php 
if(isset($_POST['twitter_msg']) && !isset($error)){
?>
<div class="msg">
<?php 
echo $twitter_status 
?>
</div>
<?php 
}else if(isset($error)){
?>
<div class="msg">Error: please insert a message!</div>
<?php 
}?>
<p><strong>What are you doing?</strong></p>

<form action="insertTwitterMsg.php" method="post">
<input name="twitter_msg" type="text" id="twitter_msg" size="40" maxlength="140" />
<input type="submit" name="button" id="button" value="post" />
</form>
<!-- END -->
<script language="javascript">
		function showDetails(){
			details=document.getElementById('details')
			if(details.style.display=='none'){
				document.getElementById('details').style.display="block";
			}else{
				document.getElementById('details').style.display="none";
			}
		}
</script>
<p><a href="#" onclick="javascript:showDetails();">Show details</a></p>
<div id="details" style="display:none">
<p><strong>Step 1.</strong> Edit this p
age and change the parameter <strong>
$twitter_username</strong> and <strong>$twitter_psw</strong>.</p>
<div class="code"> &lt;?php
<br />
<br />Change these parameters with your Twitter <br />
// user name and Twitter password.
<br />
<br /> <strong>$twitter_username	='yourTwitterUserName';
<br />$twitter_psw		='yourTwitterPassword';
<br /></strong>
<br />/* Don't change the code belove<br />
<br />require('twitterAPI.php');
<br /> if(isset($_POST['twitter_msg'])){
<br /> $twitter_message=$_POST['twitter_msg'];
<br /> if(strlen($twitter_message)&lt;1){
<br /> $error=1;
<br /> }else{
<br /> $twitter_status=postToTwitter($twitter_username, $twitter_psw, $twitter_message);
<br /> }
<br /> }
<br />
</div>
</div>
<div class="footer">For info please visit <a href="http://woork.blogspot.com">woork.blogspot.com</a> 
or send me an e-mail to <a href="mailto:antonio.lupetti@gmail.com">antonio.lupetti@gmail.com</a>
<br />
</div>
</body>
</html>