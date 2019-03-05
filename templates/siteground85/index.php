<?php
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
// needed to seperate the ISO number from the language file constant _ISO
$iso = split( '=', _ISO );
// xml prolog
echo '<?xml version="1.0" encoding="'. $iso[1] .'"?' .'>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
if ( $my->id ) {
	initEditor();
}
?>
<?php mosShowHead(); ?>
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<?php echo "<link rel=\"stylesheet\" href=\"$GLOBALS[mosConfig_live_site]/templates/$GLOBALS[cur_template]/css/template_css.css\" type=\"text/css\"/>" ; ?>

<link rel="alternate" type="application/rss+xml" title="<?php echo $mosConfig_sitename?>" href="<?php echo $mosConfig_live_site;?>/index.php?option=com_rss&feed=RSS2.0&no_html=1" />
</head>

<body>
	<div id="top">	
		<?php include'menu.php'; ?>
	</div>
	
	<div class="clr"></div>
	
	<div id="middle"></div>
	
	<div id="header">
		<div id="sitename">
			<p><?php echo $GLOBALS['mosConfig_sitename']?></p>
		</div>		
	</div>
	
	<div class="center">
		<div id="wrapper">
		
				<div id="content">
			
					<div id="leftmenu">
						<?php mosLoadModules('left' , '-3'); ?>
						
					</div>
					
					<?php if (mosCountModules('right')){ ?>
						<div id="main">
					<? } else { ?>					
						<div id="main_full">
					<? } ?>
					<?php mosMainBody(); ?>
					</div>
					
					<div id="rightmenu">
						<?php mosLoadModules('right' , '-3'); ?>
					</div>
					
					<div style="clear:both;"></div>
				</div>
					
		</div>
		<div class="clr"></div>
	</div>
	<div id="content_bottom"></div>
	
	<div id="footer">
		<p class="copyright"><? $sg = ''; include "templates.php"; ?></p>
	</div>	
</body>
</html>