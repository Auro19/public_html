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

if ( !defined( '_VALID_MOS' ) && !defined('_JEXEC') ) die( 'Direct Access to this location is not allowed.' );

class HTML_jambook_admin {
	function previewItemHeader() {
		echo "<"."?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo _JX_A_PREVIEW; ?></title>
<link rel="stylesheet" href="../../../templates/<?php echo $css;?>/css/template_css.css" type="text/css">
<?php
	}
	
	function previewItemFooter() {
?>
	<table>
	  <tr>
		<td align="center" colspan="2">
          <a href="#" onClick="window.close()"><?php echo _JX_A_CLOSE; ?></a>
          <a href="#" onClick="window.print(); return false"><?php echo _JX_A_PRINT; ?></a>
        </td>
	  </tr>
	</table>
<?php
	}
	
	function previewItem() {
?>
    <script language="javascript" type="text/javascript">
		<?php if (defined('_JEXEC')): ?>
		var form = window.top.document.adminForm;
		<?php else: ?>
		var form = window.opener.document.adminForm
		<?php endif; ?>

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
	</table>
<?php
	}
	
	function showHeader( $title, $image = "", $display = "", $pageNav = "" ) {
		global $option, $mainframe;
		?>
<script src="components/com_jambook/ajax.js" language="Javascript" type="text/javascript"></script>
   <table cellpadding="4" cellspacing="0" border="0" width="100%">
      <tr>
         <td><a href="index2.php?option=<?php echo $option; ?>"><img src="<?php echo $mainframe->getCfg( 'live_site' ); ?>/components/<?php echo $option; ?>/images/jambook_mini.png" align="middle" border="0" alt="Jambook Control Panel" title="Jambook Control Panel" /></a></td>
         <td width="100%" class="">&nbsp;&nbsp;&nbsp;<h1><?php echo $title; ?></h1></td>
<?php if ( $display ) { ?>
      <td nowrap><?php echo $display; ?></td>
<?php } ?>
<?php if ( $pageNav ) { ?>
      <td>
         <?php echo $pageNav->writeLimitBox(); ?>
      </td>
<?php } ?>
      </tr>
   </table>


<style type="text/css">
	 .jxpagetab {
         display: block;
		 position: relative;
		 margin: 0px;
		 padding: 0px;
		 height: 72px;
		 width: 72px;
	 }
	 .jxpagetab_sel {
         display: block;
		 position: relative;
		 margin: 0px;
		 padding: 0px;
		 height: 72px;
		 width: 72px;
	     border-top: thin solid lightgray;
	     border-left: thin solid lightgray;
	     border-bottom: thin solid lightgray;
	 }
	 .jxpageicon {
	     position: relative;
 	     float: left;
		 margin: 0px;
		 padding: 0px;
	     left: 12px;
	     top: 12px;
	     border: none;
	 }
	 .jxpagetabdesc {
	     display: block;
	     position: relative;
	     clear: both;
		 margin: 0px;
		 padding: 0px;
	 }
	 .warning {
	 	color: red;
	 	font-weight: bold;
	 }
</style>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td width="60" valign="top">

	    <div class="jxpagetab<?php echo ($image == "editentries_big.png") ? "_sel" : ""; ?>"><a href="index2.php?option=<?php echo $option; ?>&task=list"><img src="<?php echo $mainframe->getCfg( 'live_site' ); ?>/components/<?php echo $option; ?>/images/editentries_big.png" class="jxpageicon hasTip" alt="<?php echo _JX_A_LISTITEMS; ?>" title="<?php echo _JX_A_LISTITEMS . '::' . _JX_A_LISTITEMS_DESC; ?>" /></a></div>
	    <div class="jxpagetab<?php echo ($image == "templatemanager_big.png") ? "_sel" : ""; ?>"><a href="index2.php?option=<?php echo $option; ?>&task=listtemplates"><img src="<?php echo $mainframe->getCfg( 'live_site' ); ?>/components/<?php echo $option; ?>/images/templatemanager_big.png" class="jxpageicon hasTip" alt="<?php echo _JX_A_TEMPLATEMANAGER; ?>" title="<?php echo _JX_A_TEMPLATEMANAGER . '::' . _JX_A_TEMPLATEMANAGER_DESC; ?>" /></a></div>
        <div class="jxpagetab<?php echo ($image == "import_big.png") ? "_sel" : ""; ?>"><a href="index2.php?option=<?php echo $option; ?>&task=import"><img src="<?php echo $mainframe->getCfg( 'live_site' ); ?>/components/<?php echo $option; ?>/images/import_big.png" class="jxpageicon hasTip" alt="<?php echo _JX_A_IMPORT_ENTRIES; ?>" title="<?php echo _JX_A_IMPORT_ENTRIES . '::' . _JX_A_IMPORT_ENTRIES_DESC; ?>" /></a></div>
        <div class="jxpagetab<?php echo ($image == "information_big.png") ? "_sel" : ""; ?>"><a href="index2.php?option=<?php echo $option; ?>&task=info"><img src="<?php echo $mainframe->getCfg( 'live_site' ); ?>/components/<?php echo $option; ?>/images/information_big.png" class="jxpageicon hasTip" alt="<?php echo _JX_A_INFORMATION; ?>" title="<?php echo _JX_A_INFORMATION . '::' . _JX_A_INFORMATION_DESC; ?>" /></a></div>
	    <div class="jxpagetab<?php echo ($image == "configuration_big.png") ? "_sel" : ""; ?>"><a href="index2.php?option=<?php echo $option; ?>&task=conf"><img src="<?php echo $mainframe->getCfg( 'live_site' ); ?>/components/<?php echo $option; ?>/images/configuration_big.png" class="jxpageicon hasTip" alt="<?php echo _JX_A_CONFIGURATION; ?>" title="<?php echo _JX_A_CONFIGURATION . '::' . _JX_A_CONFIGURATION_DESC; ?>" /></a></div>

        </td>
        <td valign="top">

<?php
	}

	function importSelection( $lists ) {
		global $option;

		HTML_jambook_admin::showHeader( _JX_A_IMPORT_SOURCE, "dbrestore.png" );
		?>
<form action="index2.php" method="POST" name="adminForm">
  <input type="hidden" name="returnpage" value="<?php echo $returnpage; ?>" />
  <input type="hidden" name="task" value="importentries" />
  <input type="hidden" name="option" value="<?php echo $option; ?>" />

   <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminform">
      <tr>
         <td>
		    <?php echo _JX_A_IMPORT_SOURCE_DESCR; ?>
        </td>
      </tr>
      <tr>
         <td>
			<?php echo $lists['sources']; ?>
        </td>
      </tr>
      <tr>
         <td>
			<br /><input type="submit" name="submit" value="<?php echo _JX_A_IMPORT_SELECTED; ?>" class="button" /><br /><br />
        </td>
      </tr>
   </table>
</form>
<?php
	    HTML_jambook_admin::showFooter();
	}

	function introPage( $latestversion="") {
		global $option, $comcfg, $mainframe;

		HTML_jambook_admin::showHeader( "Jambook Control Panel", "cpanel.png" );
		?>

    <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminform">
      <tr>
        <td width="*" valign="top">
 	     <div class="jxpagetabdesc">
         <h2><?php echo _JX_A_LISTITEMS; ?></h2>
         <p><?php echo _JX_A_LISTITEMS_DESC; ?></p>
         </div>
 	     <div class="jxpagetabdesc">
         <h2><?php echo _JX_A_TEMPLATEMANAGER; ?></h2>
         <p><?php echo _JX_A_TEMPLATEMANAGER_DESC; ?></p>
         </div>
 	     <div class="jxpagetabdesc">
         <h2><?php echo _JX_A_IMPORT_ENTRIES; ?></h2>
         <p><?php echo _JX_A_IMPORT_ENTRIES_DESC; ?></p>
         </div>
 	     <div class="jxpagetabdesc">
         <h2><?php echo _JX_A_INFORMATION; ?></h2>
         <p><?php echo _JX_A_INFORMATION_DESC; ?></p>
         </div>
 	     <div class="jxpagetabdesc">
         <h2><?php echo _JX_A_CONFIGURATION; ?></h2>
         <p><?php echo _JX_A_CONFIGURATION_DESC; ?></p>
         </div>
         <p><strong><?php echo _JX_A_BACKTOCP_DESC; ?></strong></p>
        </td>

		<td width="250" valign="top">
<h2 class="sectionname" style="border-bottom: 1px dashed #CCCCCC;"><?php echo _JX_A_DONATION_HEADING; ?></h2>
<p><?php echo _JX_A_DONATION_DESC; ?></p>

<div align="center">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="Olle@Johansson.com">
<input type="hidden" name="item_name" value="Donation for Jambook">
<input type="hidden" name="item_number" value="jambook-001-admin">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="cn" value="Comments">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="tax" value="0">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</div>
</form>

		</td>

		<td width="10" valign="top">
		</td>

		<td width="250" valign="top">
<h2 class="sectionname" style="border-bottom: 1px dashed #CCCCCC;"><?php echo _JX_A_JAMBOOKINFO; ?></h2>
<p>
<strong><?php echo _JX_A_VERSION; ?>:</strong> <?php echo $comcfg['version']; ?><br />
<strong><?php echo _JX_A_LATESTVERSION; ?>:</strong> <?php echo trim( $latestversion ) ? $latestversion : _JX_ERR_NOT_FOUND; ?><br />
<strong><?php echo _JX_A_LICENSE; ?>:</strong> <a href="http://www.gnu.org/copyleft/gpl.html" target="_blank">GNU GPL v2</a><br />
<strong><?php echo _JX_A_COPYRIGHT; ?>:</strong> &copy; 2007-2008 Olle Johansson<br />
</p>

<h2 class="sectionname" style="border-bottom: 1px dashed #CCCCCC;"><?php echo _JX_A_CREDITS; ?></h2>
<p>
<strong><?php echo _JX_A_AUTHOR; ?>:</strong> Olle Johansson<br />
<strong><?php echo _JX_A_CAPTCHACLASS; ?>:</strong> Julien Pachet<br />
<strong><?php echo _JX_A_CAPTCHAFONT; ?>:</strong> Dustin Norlander<br />
<strong><?php echo _JX_A_TRANSLATORS; ?>:</strong> Martin Ackerfors, Vipyammer, Andreas Binczyk, Jean-François Questiauxm, Carlos Eduardo Rührwiem, Zoran Jekic, Torbein Kvil Gamst, Tomek CeDeROM Cedro, baijianpeng, Hugo Gandarillas Stuardo, Ulrikhe Lukoie, Oguz Kaan Kilinc, nustiu, Tomasko Dudik<br />
</p>

<h2 class="sectionname" style="border-bottom: 1px dashed #CCCCCC;"><?php echo _JX_A_SUPPORT; ?></h2>
<p>
<strong><?php echo _JX_A_HOMEPAGE; ?>:</strong> <a href="<?php echo JXSITE; ?>/jambook" target="_blank"><img src="<?php echo $mainframe->getCfg('live_site'); ?>/components/com_jambook/images/link.png" width="16" height="16" border="0" align="absmiddle" alt="<?php echo _JX_A_LINK; ?>" title="<?php echo _JX_A_HOMEPAGE; ?>" /></a><br />
<strong><?php echo _JX_A_SUPPORTFORUM; ?>:</strong> <a href="<?php echo JXSITE; ?>/component/option,com_joomlaboard/Itemid,58/" target="_blank"><img src="<?php echo $mainframe->getCfg('live_site'); ?>/components/com_jambook/images/link.png" width="16" height="16" border="0" align="absmiddle" alt="<?php echo _JX_A_LINK; ?>" title="<?php echo _JX_A_SUPPORTFORUM; ?>" /></a><br />
<strong><?php echo _JX_A_BUGTRACKER; ?>:</strong> <a href="http://joomlacode.org/gf/project/jambook/tracker/" target="_blank"><img src="<?php echo $mainframe->getCfg('live_site'); ?>/components/com_jambook/images/link.png" width="16" height="16" border="0" align="absmiddle" alt="<?php echo _JX_A_LINK; ?>" title="<?php echo _JX_A_BUGTRACKER; ?>" /></a><br />
</p>

<br clear="all" />

        </td>
      </tr>
    </table>

<?php
	    HTML_jambook_admin::showFooter();
	}

	function showFooter() {
?>
        </td>
      </tr>
    </table>
<?php
	}

	function showPage( $content, $title = _JX_A_INFO ) {
	   global $option, $my, $comcfg;

	   HTML_jambook_admin::showHeader( $title, "generic.png" );
?>
<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td>
		<table class="adminform">
		<tr>
			<th>
	          <?php echo $title; ?>
			</th>
		</tr>
		<tr>
			<td align="left">
	          <?php echo $content; ?>
			</td>
		</tr>
		</table>
    </td>
  </tr>
</table>
<?php
	    HTML_jambook_admin::showFooter();
	}

   function listItems( $rows, $pageNav, $prefix="" ) {
	   global $option, $my;
?>
   <form action="index2.php" method="post" name="adminForm">
<?php
	   HTML_jambook_admin::showHeader( _JX_A_LISTITEMS, "addedit.png", _JX_A_DISPLAY, $pageNav );
?>

   <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
      <tr>
         <th width="20">#</th>
         <th width="20">
            <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
         </th>
         <th class="title"><?php echo _JX_A_ITEMID; ?></th>
         <th align="left"><?php echo _JX_A_TITLE; ?></th>
         <th align="left"><?php echo _JX_A_CONTENT; ?></th>
         <th><?php echo _JX_A_AUTHOR; ?></th>
         <th><?php echo _JX_A_DATE_POSTED; ?></th>
         <th><?php echo _JX_A_FROMIP; ?></th>
         <th><?php echo _JX_A_SPAMSCORE; ?></th>
         <th><?php echo _JX_A_PUBLISHED; ?></th>
         <th><?php echo _JX_A_CHECKEDOUT; ?></th>
<!--         <th colspan="2"><?php echo _JX_A_REORDER; ?></th> -->
      </tr>
      <?php
      $k = 0;
      $i = 0;
      for ($i=0, $n=count( $rows ); $i < $n; $i++) {
         $row = $rows[$i];
		 addExtraValues( $row );
		 ?>
            <tr class="row<?php echo $k; ?>">
            <td width="20" align="right"><?php echo $i+$pageNav->limitstart+1;?></td>
            <td width="20">
        <?php		if ($row->checked_out && $row->checked_out != $my->id) { ?>
        &nbsp;
        <?php		} else { ?>
        <input type="checkbox" id="cb<?php echo $i;?>" name="pid[]" value="<?php echo $row->id; ?>" onClick="isChecked(this.checked);" />
        <?php		} ?>
            </td>
            <td align="right"><?php echo $row->id; ?>&nbsp;</td>
            <td width="15%"><a href="#edit" onclick="return listItemTask('cb<?php echo $i; ?>','edit')"><?php echo $row->title; ?></a></td>
            <td width="40%" align="left"><?php echo safeStrip( $row->_content_short ); ?></td>
            <td width="10%" align="center"><?php echo $row->author; ?></td>
            <td width="10%" align="center"><?php echo formatDateJx( $row->created, '' ); ?></td>
            <td width="5%" align="center"><?php echo $row->fromip; ?></td>
            <td width="5%" align="center"><?php echo $row->spamscore; ?></td>
<?php
         $task = $row->state ? 'unpublish' : 'publish';
         $img = $row->state ? 'publish_g.png' : 'publish_x.png';
?>
            <td width="5%" align="center"><a href="javascript: void(0);" onclick="return listItemAjax('cb<?php echo $i;?>','pubunpub')"><img id="itemimg<?php echo $row->id; ?>" src="images/<?php echo $img;?>" width="12" height="12" border="0" alt="" /></a><input type="hidden" name="pub<?php echo $row->id; ?>" value="<?php echo $task; ?>" /></td>
               <td width="15%" align="center"><?php echo $row->editor;?>&nbsp;</td>
<!--
      <td>
<?php    if ($i > 0 || ($i+$pageNav->limitstart > 0)) { ?>
         <a href="#reorder" onClick="return listItemTask('cb<?php echo $i;?>','orderup')">
            <img src="images/uparrow.png" width="12" height="12" border="0" alt="<?php echo _JX_A_MOVEUP; ?>">
         </a>
<?php    } ?>
      </td>
      <td>
<?php    if ($i < $n-1 || $i+$pageNav->limitstart < $pageNav->total-1) { ?>
         <a href="#reorder" onClick="return listItemTask('cb<?php echo $i;?>','orderdown')">
            <img src="images/downarrow.png" width="12" height="12" border="0" alt="<?php echo _JX_A_MOVEDOWN; ?>">
         </a>
<?php    } ?>
      </td>
-->
            </tr>
            <?php
               $k = 1 - $k;
         }?>
      </tr>
      <tr>
         <th align="center" colspan="12">
            <?php echo $pageNav->writePagesLinks(); ?></th>
      </tr>
      <tr>
         <td align="center" colspan="12">
            <?php echo $pageNav->writePagesCounter(); ?></td>
      </tr>
      </table>
         <input type="hidden" name="option" value="<?php echo $option; ?>" />
         <input type="hidden" name="task" value="list" />
         <input type="hidden" name="boxchecked" value="0" />
         <input type="hidden" name="limitstart" value="" />
   </form>
<?php
	    HTML_jambook_admin::showFooter();
   }

   function editItem( $row, $lists, $cur_template ) {
	   global $option, $my, $mosConfig_editor, $comcfg;
	   global $mosConfig_live_site, $mosConfig_lang;

	   $title = ($row->id ? _JX_A_EDITING: _JX_A_ADDING) . " " . _JX_A_ITEM;
	   HTML_jambook_admin::showHeader( $title, "addedit.png" );
?>
<link rel="stylesheet" type="text/css" media="all" href="../includes/js/calendar/calendar-mos.css" title="green" />
<!-- import the calendar script -->
<script type="text/javascript" src="../includes/js/calendar/calendar.js"></script>
<!-- import the language module -->
<script type="text/javascript" src="../includes/js/calendar/lang/calendar-en.js"></script>
<script language="javascript" src="js/dhtml.js"></script>
<script language="javascript" type="text/javascript">
	function submitbutton(pressbutton) {
		var form = document.adminForm;

<?php
// Where editor1 = your areaname and content = the field name
print getEditorContentsJx( 'editor1', 'content') ;
?>

			if (pressbutton == 'previewitem') {
				window.open('components/<?php echo $option; ?>/previewitem.php?t=<?php echo $cur_template; ?>', 'win1', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
			}
  	        if (pressbutton == 'cancel') {
			    submitform( pressbutton );
			    return;
		    }
		    // do field validation
		    if (form.title.value == ""){
			    alert( "<?php echo _JX_A_NOTITLE; ?>" );
		    } else if (form.content.value == ""){
			    alert( "<?php echo _JX_A_NOCONTENT; ?>" );
		    } else if ((form.email.value != "") && form.email.value.indexOf("@") < 0 ){
			    alert( "<?php echo _JX_A_INVALIDEMAIL; ?>" );
		    } else {
			     submitform( pressbutton );
		    }

	}
</script>
<form action="index2.php" method="POST" name="adminForm" enctype="multipart/form-data">
  <input type="hidden" name="returnpage" value="<?php echo $returnpage; ?>" />

<table cellspacing="0" cellpadding="4" border="0" width="100%">
  <tr>
    <td width="50%" valign="top">

      <table width="100%" class="adminform">
        <tr>
          <th colspan="2">
 	        <?php echo _JX_A_ITEM_DETAILS; ?>
          </th>
        </tr>
        <tr>
          <td width="10%" align="right"><?php echo _JX_A_ENTER_TITLE; ?></td>
          <td width="90%"><input class="inputbox" type="text" name="title" size="40" maxlength="255" value="<?php echo $row->title; ?>" />
          </td>
        </tr>

        <tr>
          <td colspan="2" valign="top">
            <?php echo _JX_A_ENTER_CONTENT; ?><br />
<?php
   // parameters : areaname, content, hidden field, width, height, rows, cols
   print editorAreaJx( 'editor1',  "$row->content", 'content', '60', '30' );
?>
          </td>
        </tr>
      </table>

    </td>
    <td valign="top">


<table cellpadding="4" cellspacing="0" border="0" width="100%">
  <tr>
    <td>
<?php
    $tabs = new mosTabs(1);
    $tabs->startPane( 'jambook-edit' );
    $tabs->startTab( _JX_A_EXTRA_INFO, 'jambook-edit' . 1 );
?>
    <table cellpadding="2" cellspacing="4" border="0" width="100%" class="adminform">
      <tr>
        <td width="15%" align="right"><?php echo _JX_A_AUTHOR; ?></td>
        <td width="85%"><?php echo $row->author ?></td>
      </tr>
      <tr>
        <td width="15%" align="right"><?php echo _JX_A_FROMIP; ?></td>
        <td width="85%"><?php echo $row->fromip; ?></td>
      </tr>
      <tr>
        <td width="15%" align="right"><?php echo _JX_A_ENTER_EMAIL; ?></td>
        <td width="85%"><input class="inputbox" type="text" name="email" size="40" maxlength="255" value="<?php echo $row->email; ?>" />
        </td>
      </tr>
      <tr>
        <td width="15%" align="right"><?php echo _JX_A_HIDE_EMAIL; ?></td>
        <td width="85%"><?php echo $lists['hideemail']; ?></td>
      </tr>
      <tr>
        <td width="15%" align="right"><?php echo _JX_A_ENTER_URL; ?></td>
        <td width="85%"><input class="inputbox" type="text" name="url" size="40" maxlength="255" value="<?php echo $row->url; ?>" />
        </td>
      </tr>
      <tr>
        <td width="15%" align="right"><?php echo _JX_A_HIDE_URL; ?></td>
        <td width="85%"><?php echo $lists['hideurl']; ?></td>
      </tr>
      <tr>
        <td width="15%" align="right"><?php echo _JX_A_AUTHOR_ALIAS; ?></td>
        <td width="85%"><input class="inputbox" type="text" name="authoralias" size="40" maxlength="255" value="<?php echo $row->authoralias; ?>" />
        </td>
      </tr>
 
    </table>
<?php
    $tabs->endTab();
    $tabs->startTab( _JX_A_PUBLISHING, 'jambook-edit' . 2 );
?>
    <table cellpadding="2" cellspacing="4" border="0" width="100%" class="adminform">
      <tr>
        <td width="15%" valign="top" align="right"><?php echo _JX_A_ACCESS; ?></td>
        <td width="85%"><?php echo $lists['access']; ?></td>
      </tr>
      <tr>
        <td valign="top" align="right"><?php echo _JX_A_PUBLISHITEM; ?></td>
        <td><?php echo $lists['published']; ?></td>
      </tr>
      <tr>
        <td valign="top" align="right"><?php echo _JX_A_START_PUBLISHING; ?></td>
        <td>
          <input class="inputbox" type="text" name="publish_up" id="publish_up" size="25" maxlength="19" value="<?php echo $row->publish_up; ?>" />
          <input type="reset" class="button" value="..." onClick="return showCalendar('publish_up', 'y-mm-dd');">
        </td>
      </tr>
      <tr>
        <td valign="top" align="right"><?php echo _JX_A_FINISH_PUBLISHING; ?></td>
        <td>
          <input class="inputbox" type="text" name="publish_down" id="publish_down" size="25" maxlength="19" value="<?php echo $row->publish_down; ?>" />
          <input type="reset" class="button" value="..." onClick="return showCalendar('publish_down', 'y-mm-dd');">
        </td>
      </tr>
      <tr>
        <td valign="top" align="right"><?php echo _JX_A_DATE_POSTED; ?></td>
        <td>
          <input class="inputbox" type="text" name="created" id="created" size="25" maxlength="19" value="<?php echo $row->created; ?>" />
          <input type="reset" class="button" value="..." onClick="return showCalendar('created', 'y-mm-dd');">
        </td>
      </tr>
    </table>
<?php
    $tabs->endTab();
    $tabs->endPane();
?>

    </td>
  </tr>
</table>

  <input type="hidden" name="option" value="<?php echo $option;?>" />
  <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
  <input type="hidden" name="version" value="<?php echo $row->version; ?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="author" value="<?php echo $row->author; ?>" />
</form>

    </td>
  </tr>
</table>

<?php
	    HTML_jambook_admin::showFooter();
	}

	function showAdminPages( $pages, $title ) {
		global $option;

		HTML_jambook_admin::showHeader( $title, "generic.png" );
		?>
   <table cellpadding="4" cellspacing="0" border="0" width="100%">
      <tr>
         <td>
<?php
    $tabs = new mosTabs(1);
    $tabs->startPane( 'jx-infopages' );
	$pc = count( $pages );
	for ( $i = 1; $i <= $pc; $i++ ) {
		$tabs->startTab( $pages[$i]['title'] , 'jx-page' . $i );
		echo $pages[$i]['content'];
		$tabs->endTab();
	}
    $tabs->endPane();
?>
        </td>
      </tr>
   </table>
<?php
	    HTML_jambook_admin::showFooter();
	}

	function listTemplates( $rows ) {
	   global $option, $my, $comcfg;

	   HTML_jambook_admin::showHeader( _JX_A_LISTTEMPLATES . " : " . $comcfg['template'], "templatemanager.png" );
?>

   <form action="index2.php" method="post" name="adminForm">
   <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
      <tr>
         <th width="20">
            
         </th>
         <th class="title" align="left"><?php echo _JX_A_TEMPLATE_FILE; ?></th>
      </tr>
      <?php
      $k = 0;
      $i = 0;
      for ($i=0, $n=count( $rows ); $i < $n; $i++) {
		 ?>
            <tr class="row<?php echo $k; ?>">
              <td width="20">
                <input type="radio" id="cb<?php echo $i;?>" name="pid[]" value="<?php echo $rows[$i]; ?>" onClick="isChecked(this.checked);" />
              </td>
              <td><a href="#edit" onclick="return listItemTask('cb<?php echo $i; ?>','edittemplate')"><?php echo $rows[$i]; ?></a></td>
            </tr>
            <?php
               $k = 1 - $k;
         }?>
      </tr>
      </table>
         <input type="hidden" name="option" value="<?php echo $option; ?>">
         <input type="hidden" name="task" value="">
         <input type="hidden" name="boxchecked" value="0">
   </form>


<?php
	    HTML_jambook_admin::showFooter();
   }

   function editTemplate( $template, $template_content, $template_path ) {
	   global $option, $my, $mosConfig_editor, $comcfg;
	   global $mosConfig_lang;

	   HTML_jambook_admin::showHeader( _JX_A_EDITING_TEMPLATE . " : {$comcfg['template']} / $template", "templatemanager.png" );
?>
<script language="javascript" src="js/dhtml.js"></script>
<script language="javascript" type="text/javascript">
	function submitbutton(pressbutton) {
		var form = document.adminForm;

  	        if (pressbutton == 'canceltemplate') {
			    submitform( pressbutton );
			    return;
		    }
		    submitform( pressbutton );

	}
</script>
<form action="index2.php" method="POST" name="adminForm" enctype="multipart/form-data">

<table cellspacing="0" cellpadding="4" border="0" width="100%" class="adminform">
		<tr>
          <th colspan="4"><?php echo _JX_A_PATH . " components/com_jambook/templates/{$comcfg['template']}/$template.tmpl"; ?>
      		<b><?php echo is_writable( $template_path ) ? '<b><font color="green">
			 - ' . _JX_A_WRITEABLE . '</font></b>' : '<b><font color="red"> - ' . _JX_A_UNWRITEABLE . '</font></b>' ?></th>
		</tr>
  <tr>
    <td valign="top">
      <textarea class="inputbox" name="content" id="content" cols="110" rows="25"><?php echo $template_content; ?></textarea>
    </td>
  </tr>
</table>

<input type="hidden" name="template" value="<?php echo $template; ?>" />
<input type="hidden" name="option" value="<?php echo $option; ?>">
<input type="hidden" name="task" value="">
</form>
<?php
	    HTML_jambook_admin::showFooter();
   }

	function showConfig( $comcfg, $lists, $tip ) {
		global $option, $mainframe;

		HTML_jambook_admin::showHeader( _JX_A_CONFIGURATION, "config.png" );
?>
<script language="javascript" type="text/javascript">
	function submitbutton(pressbutton) {
		var form = document.adminForm;
			if (pressbutton == 'saveconf') {
				if (confirm ("<?php echo _JX_A_AREYOUSURE; ?>")) {
					submitform( pressbutton );
				}
			} else {
				document.location.href = 'index2.php';
			}
	}
</script>
<table cellpadding="4" cellspacing="1" border="0" width="100%" class="admintable">
  <tr>
    <td>
<form action="index2.php" method="POST" name="adminForm">

<?php
    $tabs = new mosTabs(1);
    $tabs->startPane( 'jambook-config' );
    $tabs->startTab( _JX_A_SETTINGS, 'jambook-config' . 1 );
?>
  <fieldset class="adminform">
    <table cellpadding="2" cellspacing="4" border="0" width="100%" class="adminform">
      <tr align="center" valign="middle">
         <td valign="top" width="150" class="key"><?php echo $tip['DELETEAFTERDAYS']; ?></td>
         <td valign="top"><input type="text" name="cfg_deleteafterdays" value="<?php echo $comcfg['deleteafterdays']; ?>" class="inputbox" size="5" maxlength="5" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['ITEMSNEWFOR']; ?></td>
         <td valign="top"><input type="text" name="cfg_newdays" value="<?php echo $comcfg['newdays']; ?>" class="inputbox" size="5" maxlength="5" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['PUBLISHINGLIMIT']; ?></td>
         <td valign="top"><input type="text" name="cfg_publishinglimit" value="<?php echo $comcfg['publishinglimit']; ?>" class="inputbox" size="5" maxlength="5" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['SORTORDER']; ?></td>
         <td valign="top"><?php echo $lists['sortorder']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['ITEMLIMIT']; ?></td>
         <td valign="top"><input type="text" name="cfg_item_limit" value="<?php echo $comcfg['item_limit']; ?>" class="inputbox" size="5" maxlength="5" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['DATEFORMAT']; ?></strong></td>
         <td valign="top"><input type="text" name="cfg_dateformat" value="<?php echo $comcfg['dateformat']; ?>" class="inputbox" size="20" maxlength="40" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['SHOW_USERNAME']; ?></td>
         <td valign="top"><?php echo $lists['showusername']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['SELECTTEMPLATE']; ?></td>
         <td valign="top"><?php echo $lists['templates']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['CLOAKEMAILADDRESS']; ?></td>
         <td valign="top"><?php echo $lists['cloakemail']; ?></td>
      </tr>
    </table>
    </fieldset>
<?php
    $tabs->endTab();
    $tabs->startTab( _JX_A_POSTINGSETTINGS, 'jambook-config' . 2 );
?>
    <table cellpadding="2" cellspacing="4" border="0" width="100%" class="adminform">
      <tr align="center" valign="middle">
         <td valign="top" width="150" class="key"><?php echo $tip['COMMENTFORMPLACEMENT']; ?></td>
         <td valign="top"><?php echo $lists['commentformplacement']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['PREVIEWPAGE']; ?></td>
         <td valign="top"><?php echo $lists['previewpage']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['ALLOWGUESTNAME']; ?></td>
         <td valign="top"><?php echo $lists['allowguestname']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['POSTITEMS']; ?></td>
         <td valign="top"><?php echo $lists['postitems']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['AUTOAPPROVEITEMS']; ?></td>
         <td valign="top"><?php echo $lists['autoapprove']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['USEREDITHOURS']; ?></td>
         <td valign="top"><input type="text" name="cfg_useredithours" value="<?php echo $comcfg['useredithours']; ?>" class="inputbox" size="5" maxlength="5" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['FLOODPROTECTION']; ?></td>
         <td valign="top"><input type="text" name="cfg_floodprotection" value="<?php echo $comcfg['floodprotection']; ?>" class="inputbox" size="5" maxlength="5" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['DISALLOWDOUBLEPOSTINGS']; ?></td>
         <td valign="top"><?php echo $lists['doublepostings']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['STRIPHTML']; ?></td>
         <td valign="top"><?php echo $lists['striphtml']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['ALLOWEDHTML']; ?></td>
         <td valign="top"><textarea name="cfg_allowedhtml" cols="50" rows="3" class="inputbox"><?php echo $comcfg['allowedhtml']; ?></textarea></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['SELECTEDITOR']; ?></td>
         <td valign="top"><?php echo $lists['editor']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['INITIALIZE_HTML_EDITOR']; ?></td>
         <td valign="top"><?php echo $lists['initeditor']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['EDITORWIDTH']; ?></td>
         <td valign="top"><input type="text" name="cfg_editorwidth" value="<?php echo $comcfg['editorwidth']; ?>" class="inputbox" size="5" maxlength="5" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['EDITORHEIGHT']; ?></td>
         <td valign="top"><input type="text" name="cfg_editorheight" value="<?php echo $comcfg['editorheight']; ?>" class="inputbox" size="5" maxlength="5" /></td>
      </tr>
    </table>
<?php
    $tabs->endTab();
    $tabs->startTab( _JX_A_EMAILSETTINGS, 'jambook-config' . 3 );
?>
    <table cellpadding="2" cellspacing="4" border="0" width="100%" class="adminform">
      <tr align="center" valign="middle">
         <td valign="top" width="150" class="key"><?php echo $tip['MAILFROMADDRESS']; ?></td>
         <td valign="top"><input type="text" name="cfg_mailfromaddress" value="<?php echo $comcfg['mailfromaddress']; ?>" class="inputbox" size="50" maxlength="255" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['MAILFROMNAME']; ?></td>
         <td valign="top"><input type="text" name="cfg_mailfromname" value="<?php echo $comcfg['mailfromname']; ?>" class="inputbox" size="50" maxlength="255" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['ADMINEMAIL']; ?></td>
         <td valign="top"><input type="text" name="cfg_adminemail" value="<?php echo $comcfg['adminemail']; ?>" class="inputbox" size="50" maxlength="255" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['ADMINNAME']; ?></td>
         <td valign="top"><input type="text" name="cfg_adminname" value="<?php echo $comcfg['adminname']; ?>" class="inputbox" size="50" maxlength="255" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['SENDTHANKYOUEMAIL']; ?></td>
         <td valign="top"><?php echo $lists['sendthankyouemail']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['EMAILCOMMENTTOADMIN']; ?></td>
         <td valign="top"><?php echo $lists['emailcommenttoadmin']; ?></td>
      </tr>
    </table>
<?php
    $tabs->endTab();
    $tabs->startTab( _JX_A_SPAMSETTINGS, 'jambook-config' . 4 );
?>
    <table cellpadding="2" cellspacing="4" border="0" width="100%" class="adminform">
      <tr align="center" valign="middle">
         <td valign="top" width="150" class="key"><?php echo $tip['USE_CAPTCHA']; ?></td>
         <td valign="top">
	         <?php if (!checkCaptchaJx()) { ?>
	         	 <input type="hidden" name="cfg_usecaptcha" value="0" />
		         <span class='warning'><?php echo _JX_A_CAPTCHA_NOT_AVAILABLE ?></span>
			 <?php } else { ?>
			 	 <?php echo $lists['usecaptcha']; ?>
	         <?php } ?>
         </td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['HOWTOTREATSPAM']; ?></td>
         <td valign="top"><?php echo $lists['spamtreatment']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['SPAM_URL']; ?></td>
         <td valign="top"><?php echo $lists['spam_url']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['SPAM_IMAGE']; ?></td>
         <td valign="top"><?php echo $lists['spam_image']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['SPAM_ONLYSMILEYS']; ?></td>
         <td valign="top"><?php echo $lists['spam_onlysmileys']; ?></td>
      </tr>
<!--
      <tr align="center" valign="middle">
         <td valign="top"><strong><?php echo _JX_A_SPAM_DATAINUNUSEDFIELDS_NAME; ?></strong></td>
         <td valign="top"><?php #echo $lists['spam_datainunusedfields']; ?><?php #echo $tip['SPAM_DATAINUNUSEDFIELDS']; ?></td>
      </tr>
-->
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['SPAM_FORBIDDEN_WORDS']; ?></td>
         <td valign="top"><textarea name="cfg_spam_forbiddenwords" cols="50" rows="3" class="inputbox"><?php echo $comcfg['spam_forbiddenwords']; ?></textarea></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['SPAM_BANNEDIP']; ?></td>
         <td valign="top"><textarea name="cfg_spam_bannedip" cols="50" rows="3" class="inputbox"><?php echo $comcfg['spam_bannedip']; ?></textarea></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['SPAM_SMILEYLIST']; ?></td>
         <td valign="top"><textarea name="cfg_spam_smileylist" cols="50" rows="3" class="inputbox"><?php echo $comcfg['spam_smileylist']; ?></textarea></td>
      </tr>
    </table>
<?php
    $tabs->endTab();
    $tabs->startTab( _JX_A_IMPORTSETTINGS, 'jambook-config' . 5 );
?>
    <table cellpadding="2" cellspacing="4" border="0" width="100%" class="adminform">
      <tr align="center" valign="middle">
         <td valign="top" width="150" class="key"><?php echo $tip['IMPORT_PUBLISHITEMS']; ?></td>
         <td valign="top"><?php echo $lists['import_published']; ?></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['IMPORT_MAXURLLEN']; ?></td>
         <td valign="top"><input type="text" name="cfg_import_longurl" value="<?php echo $comcfg['import_longurl']; ?>" class="inputbox" size="4" maxlength="4" /></td>
      </tr>
      <tr align="center" valign="middle">
         <td valign="top" class="key"><?php echo $tip['IMPORT_REMOVEBBCODE']; ?></td>
         <td valign="top"><?php echo $lists['import_removebbcode']; ?></td>
      </tr>
    </table>
<?php
    $tabs->endTab();
?>

  <input type="hidden" name="task" value="" />
  <input type="hidden" name="option" value="<?php echo $option; ?>" />
  <input type="hidden" name="cfg_version" value="<?php echo $comcfg['version']; ?>" />
</form>

<script type="text/javascript" src="<?php echo $mainframe->getCfg( 'live_site' ); ?>/includes/js/overlib_mini.js"></script>

    </td>
  </tr>
</table>

<?php
	    HTML_jambook_admin::showFooter();
   }

}
