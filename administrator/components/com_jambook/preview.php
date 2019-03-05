<?php
/**
 * Jambook guestbook component for Joomla.
 *
 * Distributed under the terms of the GNU General Public License v2
 * http://www.gnu.org/copyleft/gpl.html
 * This software may be used without warrany provided and
 * copyright statements are left intact.
 *
 * @package JX Development
 * @subpackage Jambook
 * @copyright Copyright (C) 2007-2008 Olle Johansson
 * @author Olle Johansson - http://www.jxdevelopment.com
 * @version $Id$
 **/

define('_VALID_MOS', 1);
define('_JEXEC', 1);
$css = preg_replace('/\W/', '', strip_tags($_GET['t']));

//Get right Language file
if ( file_exists( "../../../components/com_jambook/language/$mosConfig_lang.php" ) ) {
	include_once( "../../../components/com_jambook/language/$mosConfig_lang.php" );
} else {
	include_once( "../../../components/com_jambook/language/english.php" );
}
include_once( "../../../components/com_jambook/configuration.php" );

?>
<?php echo "<"."?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo _JX_A_PREVIEW; ?></title>
<link rel="stylesheet" href="../../../templates/<?php echo $css;?>/css/template_css.css" type="text/css">
    <script language="javascript" type="text/javascript">
		var form = window.opener.document.adminForm

		var title = form.title.value;
        var content = form.content.value;
        //content = content.replace(/\n/g,"<br />\n");
        var email = form.email.value;
        var url = form.url.value;
        var author = form.author.value;

        var created = form.created.value;
        if ( created == "" ) {
			mydate = new Date();
			//created = mydate.getYear() + "-" + mydate.getMonth() + "-" + mydate.getDate();
			created = mydate.toLocaleString();
        }

	</script>
</head>

<body style="background-color:#FFFFFF">
      <table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">
	  <tr>
	    <td class="contentheading" width="100%" colspan="2"><?php echo _JX_A_PREVIEW; ?><br /></td>
	  </tr>
      <tr>
        <td colspan="2" height="5"></td>
      </tr>
        <tr>
          <td align="left" valign="top" width="20%">
            <p><strong><script>document.write(author)</script></strong><br />
            <script>document.write(created)</script>
          </td>
          <td rowspan="2" align="left" valign="top" style="margin-left: 5px;">
            <p><strong><script>document.write(title)</script></strong><br />
            <script>document.write(content)</script></p>
          </td>
        </tr>
        <tr>
          <td align="left" valign="bottom" style="margin-top: 1px;">
            <script>if (email) { document.write('<a href="mailto:'+email+'"><img src="../../../images/M_images/emailButton.png" border="0" alt="<?php echo _JX_EMAIL; ?>" title="<?php echo _JX_EMAIL; ?>" /></a>'); }</script>
            <script>if (url) { document.write('<a href="'+url+'"><img src="../../../includes/js/ThemeOffice/home.png" border="0" alt="<?php echo _JX_URL; ?>" title="<?php echo _JX_URL; ?>" /></a>'); }</script>
          </td>
        </tr>
      <tr>
        <td colspan="2" height="5"></td>
      </tr>
	  <tr>
		<td align="center" colspan="2">
          <a href="#" onClick="window.close()"><?php echo _JX_A_CLOSE; ?></a>
          <a href="#" onClick="window.print(); return false"><?php echo _JX_A_PRINT; ?></a>
        </td>
	  </tr>
	</table>

<br />


</body>
</html>
