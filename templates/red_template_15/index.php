<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<?php
require_once ( "templates/" . $this->template . "/menu.php");
if ( $this->countModules('left') == 0) $a = '-noleft';	

if (( $this->countModules('user1') == 0) && ( $this->countModules('user5') == 0)) 
{$a = '-nobox1'; } 
else if (( $this->countModules('user2') == 0) && ( $this->countModules('right') == 0)) 
{$a = '-nobox2'; } 

if ( $this->countModules('user1 + user5 + user2 + right') == 0) $b = '-nobot';	
if ( $this->countModules('user1 + user5 + user2 + right + left') == 0) $r = '-noright';

?>
<jdoc:include type="head" />
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/template_css.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/horizontal.css" type="text/css" />
<!--[if IE 6]>
<link href="templates/<?php echo $this->template ?>/css/template_ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" language="javascript" src="templates/<?php echo $this->template ?>/js/animation.js"></script>
<script type="text/javascript" language="javascript" src="templates/<?php echo $this->template ?>/js/cssmenus.js"></script>
<link rel="shortcut icon" href="templates/<?php echo $this->template ?>/images/favicon.ico"/>


</head>
<body>
<div id="bg"><div id="bg2"><div align="center">
	<div id="menu_box">
		<div id="menu" align="left">
			<?php mosShowListMenu('topmenu'); ?>
		</div>
	</div>
	<div id="container_in"><div id="container_t"><div id="container_b">
		<div id="container_head_l"><div id="container_head_r">
			<div id="header">
				<div id="header_l">
					<div id="logo_box">
						<div id="logo">
						</div>
					</div>
				</div>
				<div id="header_r">
					<div id="search_box">
						<div id="search">
							<jdoc:include type="modules" name="user4" style="xhtml"/>
						</div>
					</div>
					<div id="topmod_box">
						<div id="topmod">
							<jdoc:include type="modules" name="top" style="xhtml"/>
						</div>
					</div>
				</div>
			</div><!--header-->
			<div id="two_cols" class="clearfix">
				<div id="left_col<?php echo $r; ?>" >
					<div id="mainbody">
						<jdoc:include type="component" style="html"/>	
					</div>
				</div>
				<div id="right_col<?php echo $r; ?>" class="clearfix">
					<div id="right_col_in">
						<div id="right_mod">
						<jdoc:include type="modules" name="left" style="xhtml"/>						
						</div>
						<?php if ($b!='-nobot') { ?>
						<div id="mod_box" class="clearfix">
							<div id="mod_1<?php echo $a; ?>">
								<jdoc:include type="modules" name="user1" style="xhtml"/>
								<jdoc:include type="modules" name="user5" style="xhtml"/>
							</div>
							<div id="mod_2<?php echo $a; ?>">
								<jdoc:include type="modules" name="user2" style="xhtml"/>
								<jdoc:include type="modules" name="right" style="xhtml"/>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div></div>
		<div id="foot">
			<div id="foot_l" class="clearfix"><div id="foot_l_in" class="clearfix">
				<div id="license_box"><div id="license" align="left"><?php include_once('includes/footer.php'); ?></div></div>
				<div id="copyright_box"><div id="copyright">Design by: <a href="http://www.design-joomla.pl" target="_blank" title="Professional Joomla templates">Joomla and Mambo Templates</a></div></div>
			</div></div>
			<div id="foot_r">
				<div id="menu_table">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
  					<tr>
					 <td><a href="#"><img src="templates/<?php echo $this->template ?>/images/sitemap.gif" alt="sitemap" border="0"/></a></td>
					<td><a href="<?php echo $mainframe->getCfg('live_site')?>"><img src="templates/<?php echo $this->template ?>/images/home.gif" alt="home" border="0"/></a></td>
					<td><a href="index.php?option=com_contact"><img src="templates/<?php echo $this->template ?>/images/contact.gif" alt="contact" border="0" /></a></td>
				  	</tr>
					</table>
				</div>
			</div>
		</div>
	</div></div></div><!--container_in-->
</div></div></div><!--bg-->
</body>
</html>







