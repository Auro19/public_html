<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/includes/html/admin.migration.html.php $
// $Id: admin.migration.html.php 396 2009-03-15 16:06:21Z aha $
/******************************************************************************\
**   JoomGallery  1.0.1                                                       **
**   By: JoomGallery::ProjectTeam                                             **
**   Copyright (C) 2008  M. Andreas Boettcher                                 **
**   Based on: PonyGallery ML 2.5.1 by PonyGallery-ML-Team                    **
**   Released under GNU GPL Public License                                    **
**   License: http://www.gnu.org/copyleft/gpl.html or have a look             **
**   at administrator/components/com_joomgallery/LICENSE.TXT                  **
\******************************************************************************/

#### Original Copyright ########################################################
## PonyGallery ML 2.5.1                                                       ##
## By: M. Andreas Boettcher & Benjamin Malte Meier                            ##
## & Andreas Hartmann & The ML-Team                                           ##
## Copyright (C) 2007 M. Andreas Boettcher, All rights reserved.              ##
## Released under GNU GPL Public License                                      ##
################################################################################

defined('_VALID_MOS') or die('Direct Access to this location is not allowed.');


/**
 * Anzeige der Migrationsauswahl
 *
 */
class HTML_Joom_AdminMigration {

  function HTML_Joom_AdminMigration() {

    //cpanel
    echo "<script language = \"javascript\" type = \"text/javascript\">\n";
    echo "<!--\n";
    echo "function submitbutton(pressbutton) {\n";
    echo "  var form = document.adminForm;\n";
    echo "  if (pressbutton == 'cpanel') {\n";
    echo "    location.href = \"index2.php?option=com_joomgallery\";\n";
    echo "  }\n";
    echo "}\n";
    echo "//-->\n";
    echo "</script>\n";
    echo "</form>";

?>
    <form action="index2.php?option=com_joomgallery&amp;act=migrate" method="POST">
      <table cellpadding="4" cellspacing="0" border="0" width="100%">
        <tr>
          <td width="100%" class="sectionname"  align="left">
            <p>
            <a href='http://www.joomgallery.net/' target='_blank'>
            <img src="../administrator/components/com_joomgallery/assets/images/main2.png" hspace="6" border="0" align="top" width="16" height="16" alt="<?php echo _JGA_JOOMGALLERY; ?>" /></a>&nbsp;
            <span style="font-size:13px; font-weight:bold;">
              <?php echo _JGA_JOOMGALLERY.' :: '._JGA_MIGRATION_MANAGER; ?> 
            </span>
            </p>
          </td>
        </tr>
      </table>
      <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
        <tr>
          <td>
            <?php echo "<h4>" . _JGA_CHECKMIGRATION_PONY . "</h4>"; ?> 
          </td>
          <td align="center">
            <input type="submit" name="migratep2j" value="check" style="width:100px" />
          </td>
        </tr>
<!-- 
        <tr>
          <td>
            <?php echo "<h4>" . _JGA_CHECKMIGRATION_4IMAGES . "</h4>"; ?> 
          </td>
          <td align="center">
            <input type="submit" name="migrate4i2j" value="check" style="width:100px" />
          </td>
         </tr>
 -->        
      </table>
    </form>
<?php
  }
}
?>
