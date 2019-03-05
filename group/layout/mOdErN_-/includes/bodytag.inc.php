<?php
$body .= " <script language=\"JavaScript1.2\" TYPE=\"text/javascript\"> \n";
	    $body .= " var timerID = ''; ";
		$body .= " function openMe() { \n";
		$body .= " 	if(document.getElementById('Coudriet_iframe')) document.getElementById('Coudriet_iframe').style.display='block'; \n";
		$body .= "  if(document.getElementById('Coudriet_open')) document.getElementById('Coudriet_open').style.display='none'; \n";
		$body .= "  if(document.getElementById('Coudriet_close')) document.getElementById('Coudriet_close').style.display='block'; \n";
		$body .= " clearTimeout(timerID); } ";
		$body .= " function closeMe() { \n";
		$body .= " 	if(document.getElementById('Coudriet_iframe')) document.getElementById('Coudriet_iframe').style.display='none'; \n";
		$body .= "  if(document.getElementById('Coudriet_open')) document.getElementById('Coudriet_open').style.display='block'; \n";
		$body .= "  if(document.getElementById('Coudriet_close')) document.getElementById('Coudriet_close').style.display='none'; \n";
		$body .= " } ";
		$body .= " </script> \n";
	    $body.="<span class=\"Coudriet\" onMouseOver=\"openMe()\" onMouseOut=\"timerID=setTimeout('closeMe()',1000)\"> \n";
	    $body.="<span class=\"Coudriet_o\" id=\"Coudriet_open\">$choose_one</span> \n";
	    $body.="<span class=\"Coudriet_c\" id=\"Coudriet_close\">$directory</span> \n";		
  		$body.="<span class=\"Coudriet_iframe\" id=\"Coudriet_iframe\">\n";
  		$body.= $startstring;
		$body.= $endstring;
		$body.="</span>\n";
  		$body.="</span>";
  		$cm_html_header .= $body;
?>