<html>
<body>
<?php
//echo getenv('REQUEST_URI');
//echo $GLOBALS['PHP_SELF'];
$path_pre="../../";
$path_pre_invite="../";
$include_path = $path_pre."lib/lib.inc.php";
include_once $include_path;
chat_invite_hidden();
// By Mark Coudriet
// Who's online?
function chat_invite_hidden() {
global $path_pre, $PHPSESSID, $user_loginname, $user_group, $sid, $HTTP_SERVER_VARS, $HTTP_POST_VARS, $chat, $chatinv, $o_chat;
$thm_page = $HTTP_SERVER_VARS['PHP_SELF'];

// initialized invited username
$invited = $HTTP_POST_VARS['selinvite'];
  $alive = 9999; // Must be less than freq to stop from reposting data
  $freq = 10000;
  // online users
  $invitefile = $path_pre."chat/list.txt";
  $i = 0;
  $a = 0;
  $stopdup = 0;

// check role
if ($chatinv !=0 and $chat and  check_role("chat") > 0) {
echo " <table id=\"online\" align=\"right\"> ";
echo " <tr><td>";
echo "<form action='".$path_pre."chat/chat.php' method='post' name='frm' style=\"background-color:transparent; margin:0; padding:0; border:0px\">\n";
echo "<input type=hidden name='content' value=\"$user_loginname has entered the room!\">\n";
echo "<input type=hidden name=mode value=write>\n";
echo "<input type=hidden name=PHPSESSID value=$PHPSESSID></form> \n";


echo " <form name=\"invite\" method=\"POST\" action=\"$thm_page\"> \n";
echo " <select name=\"selinvite\" onchange='document.invite.submit()' size=1>";

  // read file alive and put into array $lines
  if (file_exists($invitefile)) {
    $lines = file($invitefile);
    // scan all current users online
    while ($lines[$i]) {
      // extract  names and record time
      $li = explode(":", $lines[$i]);
      $time = time();  // take current time
      
      // exclude old records (probably crap from older sessions)
      if (($li[1] + $alive/1000 + 5) > $time) {
        // entry for this user found?
        if ($li[0] == ($user_loginname)) {
	      if($invited=="reset") {
		    $lines2[] = $li[0].":".$time.":".$user_group.":";
	      }
	      else if ($stopdup!=1)  {
          	// take the record into the new array with the current time
          	$lines2[] = $li[0].":".$time.":".$user_group.":".$li[3];
          	$drin = 1;
      	  }
      	  $stopdup = 1;
        }
        
        	// invite?
        	else if ($li[0] == $invited) {
          		// take the record into the new array with the current time
          		$lines2[] = $li[0].":".$time.":".$user_group.":<script>var accept=confirm('$o_chat Invitation from ".$user_loginname." \\n Click OK to Accept?'); if (accept) { top.invite.submit(); setTimeout(\"parent.location.href='".$path_pre."index.php?module=chat$sid'\", 10); } else { parent.invite.submit(); } </script>";
          		$redirect = 1;
        	}
    	
        // take current records of other users into the new array
        else { $lines2[] = $li[0].":".$li[1].":".$li[2].":".$li[3]; }
      }    
      $i++;
    }
  }
  //
  if (!$drin ) { $lines2[] = $user_loginname.":".$time.":".$user_group.":"; }
  $fp = fopen($invitefile, "w+");
  flock($fp, 2);
  
  $peeps .= "<option selected value=\"reset\">Invite</option>";
  
  for ($i=0; $i < count($lines2); $i++) {
    $line = "$lines2[$i]\n";
    $fw = fwrite($fp,$line);
    $li = explode(":",$line);

    if( ($user_group==$li[2]) && ($li[0] != $user_loginname) ) {
    	// online users
		if($alternate<>0) { $peeps .= "<option style=\"background-color:#CCCCCC; color:blue\" value=\"".$li[0]."\">". $li[0]; $alternate=0; }
		else { $peeps .= "<option style=\"background-color:#0066CC; color:#FFFFFF\" value=\"".$li[0]."\">". $li[0]; $alternate=1; }		
	}
	if($li[0] == $user_loginname) { $strInvite = $li[3]; }
  }
  fclose($fp);

if($redirect==1) {
	echo "<script> parent.frm.submit(); parent.location.href='".$path_pre."index.php?module=chat$sid' </script> \n";
}

echo $peeps ."</select></form>";
echo " $strInvite <script language=\"JavaScript\"> var myTimeout = null; function thm_timer() { myTimeout = setTimeout(\"document.location.href=document.location.href\",$freq); } thm_timer(); </script>\n";
echo "</td></tr></table>\n";
}
}// End of Who's online?

?>
</body>
</html>