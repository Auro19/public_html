<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/exif/html/joom.exifdata.html.php $
// $Id: joom.exifdata.html.php 396 2009-03-15 16:06:21Z aha $
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

class HTML_Joom_Exif {

  function Joom_ShowExifData_HTML($exif_array) {
    global $jg_showdetailaccordion, $jg_ifdotags, $jg_subifdtags, $jg_gpstags,
           $exif_config_array;
    
    require_once(_JOOM_ABSOLUTE_PATH . '/administrator/components/com_joomgallery/adminexif/admin.exifarray.php');
    $ii=0;

?>
<div class="jg_exif">
  <div class="sectiontableheader">
    <h4 <?php echo $jg_showdetailaccordion?"class=\"joomgallery-toggler\"":"class=\"joomgallery-notoggler\""; ?>>
	  <?php echo _JGSE_DATA; ?> 
	</h4>
  </div>
  <div <?php echo $jg_showdetailaccordion?"class=\"joomgallery-slider\"":""; ?>>
    <p>

<?php
    $jg_ifdotags     = explode (',', $jg_ifdotags);
    $jg_subifdtags   = explode (',', $jg_subifdtags);
    $jg_gpstags      = explode (',', $jg_gpstags);
    $countifdotags   = count($jg_ifdotags);
    $countsubifdtags = count($jg_subifdtags);
    $countgpstags    = count($jg_gpstags);

    $definitions = array(
    1 => array ('TAG' => "IFD0", 'FORS' => $jg_ifdotags,   'FOR' => '$ifdotag'),
    2 => array ('TAG' => "EXIF", 'FORS' => $jg_subifdtags, 'FOR' => '$subifdtag'),
    3 => array ('TAG' => "GPS",  'FORS' => $jg_gpstags,    'FOR' => '$gpstags')
    );
    $count   = count($definitions);
    $output  = '';

    for($ii=1; $ii <= $count; $ii++) {
      $tagcat   = $definitions[$ii]['TAG'];
      $jgtags   = $definitions[$ii]['FORS'];
      $jgtag    = $definitions[$ii]['FOR'];

      $k=0;
      foreach($jgtags as $jgtag) {
        if (isset($exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']])) {
          $kk = $k%2+1;
          $tagdata = $exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']];
          $output .= "    <div class=\"sectiontableentry".$kk."\">\n";
          $output .= "      <div class=\"jg_exif_left\">\n";
//           $output .= "        ".$jgtag."\n";
//           $output .= "        &nbsp;\n";
          $output .= "        ".$exif_config_array[$tagcat][$jgtag]['Name']."\n";
          $output .= "      </div>\n";
          $output .= "      <div class=\"jg_exif_right\">\n";
          if($exif_config_array[$tagcat][$jgtag]['Calculation'] =="Denum") {
            list($numerator,$denumerator) = explode("/",$tagdata);
            $tagdata = ($numerator/$denumerator);
            $tagdata = round($tagdata,2);
            if ($exif_config_array[$tagcat][$jgtag]['Attribute'] == "FNumber") {
              $tagdata = _JGSE_SUBIFD_FNUMBER_F.$tagdata;
            }
          }
          if($exif_config_array[$tagcat][$jgtag]['Calculation'] =="Array") {
            $tagdata = $exif_config_array[$tagcat][$jgtag][$exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']]];
          }
          if ($exif_config_array[$tagcat][$jgtag]['Attribute'] == "ImageDescription" 
            || $exif_config_array[$tagcat][$jgtag]['Attribute'] == "Artist" 
            || $exif_config_array[$tagcat][$jgtag]['Attribute'] == "Copyright") {
            $tagdata = $exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']];
            $from_charset = 'ASCII';
            if (defined ('_JEXEC')) {
              $to_charset = "UTF-8";
            } else {
              $to_charset = "ISO-8859-1";
            }
            if (function_exists('iconv')) {
              $fixedenteties = htmlentities($tagdata);
              $fixedcharset = iconv($from_charset, $to_charset, $fixedenteties);
            } else {
              $fixedcharset = $tagdata;
            }
            if (defined ('_JEXEC')) {
              if (!is_utf8($fixedcharset)) {
                $tagdata = htmlspecialchars_decode(utf8_encode_mix($fixedcharset, false));
              } else {
                $tagdata =  htmlspecialchars_decode($fixedcharset);
              }
            } else {
              $tagdata = htmlspecialchars_decode($fixedcharset);
            }
          }
          if ($exif_config_array[$tagcat][$jgtag]['Attribute'] == "ReferenceBlackWhite"
            || $exif_config_array[$tagcat][$jgtag]['Attribute'] == "PrimaryChromaticities"
            || $exif_config_array[$tagcat][$jgtag]['Attribute'] == "WhitePoint"
            || $exif_config_array[$tagcat][$jgtag]['Attribute'] == "YCbCrCoefficients") {
            if ($exif_config_array[$tagcat][$jgtag]['Attribute'] == "WhitePoint") {
              $arraynum = 2;
              $counter  = 1;
            } else if ($exif_config_array[$tagcat][$jgtag]['Attribute'] == "YCbCrCoefficients") { 
              $arraynum = 3;
              $counter  = 2;
            } else {
              $arraynum = 6;
              $counter  = 5;
            }
            $tagdata  = "[";
            for ( $num = 0; $num < $arraynum; $num++ ) {
              $data = $exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']][$num];
              list($numerator,$denumerator) = explode("/",$data);
              $data = ($numerator/$denumerator);
              $tagdata .= $data;
              if ($num < $counter) {
                $tagdata .= ", ";
              }
            }
            $tagdata .= "]";
          }
          if ($exif_config_array[$tagcat][$jgtag]['Attribute'] == "ExifVersion") {
            if ($exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']] == "0220") {
              $tagdata  = _JGSE_SUBIFD_EXIFVERSION_VERSION . " 2.2";
            } else if ($exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']] == "0210") {
              $tagdata  = _JGSE_SUBIFD_EXIFVERSION_VERSION . " 2.1";
            }
          }
          if ($exif_config_array[$tagcat][$jgtag]['Attribute'] == "ComponentsConfiguration") {
            $tagdata = "";
            for ( $num = 0; $num < 4; $num++ ) {
              $value = ord($exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']]{$num});
              $tagdata .= _JGSE_SUBIFD_COMPONENTSCONFIGURATION_COMPONENT . ( $num + 1 ) . ": ";
              switch( $value ) {
                case 0:
                  $tagdata .= _JGSE_SUBIFD_COMPONENTSCONFIGURATION_0;
                  break;
                case 1:
                  $tagdata .= _JGSE_SUBIFD_COMPONENTSCONFIGURATION_1;
                  break;
                case 2:
                  $tagdata .= _JGSE_SUBIFD_COMPONENTSCONFIGURATION_2;
                  break;
                case 3:
                  $tagdata .= _JGSE_SUBIFD_COMPONENTSCONFIGURATION_3;
                  break;
                case 4:
                  $tagdata .= _JGSE_SUBIFD_COMPONENTSCONFIGURATION_4;
                  break;
                case 5:
                  $tagdata .= _JGSE_SUBIFD_COMPONENTSCONFIGURATION_5;
                  break;
                case 6:
                  $tagdata .= _JGSE_SUBIFD_COMPONENTSCONFIGURATION_6;
                  break;
                default:
                  $tagdata .= _JGSE_SUBIFD_COMPONENTSCONFIGURATION_UNKNOWN . $value;
              }
              $tagdata .= "<br />";
            }
          }
          if ($exif_config_array[$tagcat][$jgtag]['Attribute'] == "FileSource") {
            $tagdata = "";
            $value = ord($exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']]{0});
            switch( $value ) {
              case 3:
                $tagdata .= _JGSE_SUBIFD_FILESOURCE_3;
              break;
            default:
              $tagdata = _JGSE_SUBIFD_FILESOURCE_UNKNOWN . $value;
            }
          }
          if ($exif_config_array[$tagcat][$jgtag]['Attribute'] == "SceneType") {
            $tagdata = "";
            $value = ord($exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']]{0});
            switch( $value ) {
              case 1:
                $tagdata .= _JGSE_SUBIFD_SCENETYPE_1;
              break;
            default:
              $tagdata = _JGSE_SUBIFD_SCENETYPE_UNKNOWN . $value;
            }
          }
          if ($exif_config_array[$tagcat][$jgtag]['Attribute'] == "GPSLatitudeRef") {
            $tagdata = "";
            $value = $exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']];
            switch( $value ) {
              case 'N':
                $tagdata .= _JGSE_GPS_GPSLATITUDEREF_N;
              break;
              case 'S':
                $tagdata .= _JGSE_GPS_GPSLATITUDEREF_S;
              break;
            }
          }
          if($exif_config_array[$tagcat][$jgtag]['Calculation'] =="DegMinSec") {
            $tagdata  = "";
            $degree   = $exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']][0];
            list($numerator,$denumerator) = explode("/",$degree);
            $degree   = ($numerator/$denumerator);
            $tagdata .= $degree."&deg;";
            $tagdata .= "&nbsp;&nbsp;";
            $minutes  = $exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']][1];
            list($numerator,$denumerator) = explode("/",$minutes);
            $minutes  = ($numerator/$denumerator);
            $tagdata .= $minutes."'";
            $tagdata .= "&nbsp;&nbsp;";
            $seconds  = $exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']][2];
            list($numerator,$denumerator) = explode("/",$seconds);
            $seconds  = ($numerator/$denumerator);
            $tagdata .= $seconds."''";
          }
          if ($exif_config_array[$tagcat][$jgtag]['Attribute'] == "GPSLongitudeRef") {
            $tagdata  = "";
            $value = $exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']];
            switch( $value ) {
              case 'E':
                $tagdata .= _JGSE_GPS_GPSLONGITUDEREF_E;
              break;
              case 'W':
                $tagdata .= _JGSE_GPS_GPSLONGITUDEREF_W;
              break;
            }
          }
          if ($exif_config_array[$tagcat][$jgtag]['Attribute'] == "GPSAltitudeRef") {
            $tagdata = "";
            $value = $exif_array[$tagcat][$exif_config_array[$tagcat][$jgtag]['Attribute']]{0};
            $value = bindec($value);
            switch( $value ) {
              case '0':
                $tagdata .= _JGSE_GPS_GPSALTITUDEREF_0;
              break;
              case '1':
                $tagdata .= _JGSE_GPS_GPSALTITUDEREF_1;
              break;
            }
          }

          if($tagdata == "") {
            $tagdata = "&nbsp;";
          }

          $tagdata = str_replace("&Acirc;", "", $tagdata);

          $output .= "        ".$tagdata."";

          if ($exif_config_array[$tagcat][$jgtag]['Units'] !="") {
            $output .= "&nbsp;";
            $output .= "".$exif_config_array[$tagcat][$jgtag]['Units']."\n";
          } else {
            $output .= "\n";
          }
          $output .= "      </div>\n";
          $output .= "    </div>\n";
          $k++;
        } 
//           else {
//           $kk = $k%2+1;
//           $output .= "    <div class=\"sectiontableentry".$kk."\">\n";
//           $output .= "      <div class=\"jg_exif_left\">\n";
//           $output .= "        ".$jgtag."\n";
//           $output .= "        &nbsp;\n";
//           $output .= "        ".$exif_config_array[$tagcat][$jgtag]['Name']."\n";
//           $output .= "      </div>\n";
//           $output .= "      <div class=\"jg_exif_right\">\n";
//           $output .= "        nicht definiert";
//           $output .= "      </div>\n";
//           $output .= "    </div>\n";
//           $k++;
//         }
      }
    }
    echo $output;
?>
&nbsp;</p>
  </div>
</div>
<?php
  }
}

?>
