<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/exif/joom.exifdata.php $
// $Id: joom.exifdata.php 396 2009-03-15 16:06:21Z aha $
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

# Don't allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

# Don't allow passed settings
if (isset($_REQUEST['is_editor']) && $_REQUEST['is_editor']) {
  echo "<SCRIPT>document.location.href='".$mosConfig_live_site."'</SCRIPT>\n";
  exit();
}

if (file_exists(_JOOM_ABSOLUTE_PATH.$jg_pathoriginalimages.'/'.$catpath.$imgfilename)) {
  include_once dirname(__FILE__) . '/html/joom.exifdata.html.php';
  if (file_exists(_JOOM_FRONTEND_PATH . '/includes/exif/exiflanguage/exif.' . $mosConfig_lang . '.php')) {
    include(_JOOM_FRONTEND_PATH . '/includes/exif/exiflanguage/exif.' . $mosConfig_lang . '.php');
  } else {
    include(_JOOM_FRONTEND_PATH . '/includes/exif/exiflanguage/exif.english.php');
  }
  
  // PHP's exif only accepts JPEGs or TIFFs
  $valid_extensions = array("jpg","jpeg","jpe");
  $fileextension = strtolower(ereg_replace('.*\.([^\.]*)$', '\\1', $imgfilename));
  $exif_array = array();
  if (in_array($fileextension, $valid_extensions)){
    $exif_array = @exif_read_data(_JOOM_ABSOLUTE_PATH.$jg_pathoriginalimages.'/'.$catpath.$imgfilename,'EXIF, IFD0, GPS',true);
    if (!$exif_array) return;
  }

  HTML_Joom_Exif::Joom_ShowExifData_HTML($exif_array);
}

?>
