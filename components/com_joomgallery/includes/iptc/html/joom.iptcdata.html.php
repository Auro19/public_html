<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/iptc/html/joom.iptcdata.html.php $
// $Id: joom.iptcdata.html.php 396 2009-03-15 16:06:21Z aha $
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

class HTML_Joom_Iptc {

  function Joom_ShowIptcData_HTML($iptc_array) {
    global $jg_showdetailaccordion, $jg_iptctags, $iptc_config_array;

    require_once(_JOOM_ABSOLUTE_PATH . '/administrator/components/com_joomgallery/adminiptc/admin.iptcarray.php');
    $ii=0;

?>
<div class="jg_exif">
  <div class="sectiontableheader">
    <h4 <?php echo $jg_showdetailaccordion?"class=\"joomgallery-toggler\"":"class=\"joomgallery-notoggler\""; ?>>
	  <?php echo _JGSI_DATA; ?> 
	</h4>
  </div>
  <div <?php echo $jg_showdetailaccordion?"class=\"joomgallery-slider\"":""; ?>>
    <p>
<?php
//var_dump ($iptc_array);
    $jg_iptctags     = explode (',', $jg_iptctags);

    $charsets = array(
      'macintosh',
      'ASCII',
      'ISO-8859-1',
      'UCS-4',
      'UCS-4BE',
      'UCS-4LE',
      'UCS-2',
      'UCS-2BE',
      'UCS-2LE',
      'UTF-32',
      'UTF-32BE',
      'UTF-32LE',
      'UTF-16',
      'UTF-16BE',
      'UTF-16LE',
      'UTF-7',
      'UTF7-IMAP',
      'UTF-8',
      'EUC-JP',
      'SJIS',
      'eucJP-win',
      'SJIS-win',
      'ISO-2022-JP',
      'JIS',
      'ISO-8859-2',
      'ISO-8859-3',
      'ISO-8859-4',
      'ISO-8859-5',
      'ISO-8859-6',
      'ISO-8859-7',
      'ISO-8859-8',
      'ISO-8859-9',
      'ISO-8859-10',
      'ISO-8859-13',
      'ISO-8859-14',
      'ISO-8859-15',
      'byte2be',
      'byte2le',
      'byte4be',
      'byte4le',
      'BASE64',
      '7bit',
      '8bit',
      'EUC-CN',
      'CP936',
      'HZ',
      'EUC-TW',
      'CP950',
      'BIG-5',
      'EUC-KR',
      'UHC',
      'ISO-2022-KR',
      'Windows-1251',
      'Windows-1252',
      'CP866',
      'KOI8-R'
    );

    if ((isset($iptc_array["1#090"][0])) && in_array($charsets, $iptc_array["1#090"])) {
      $from_charset = $iptc_array["1#090"][0];
    } else {
      $from_charset = '';
    }

    if (defined ('_JEXEC')) {
      $to_charset = "UTF-8";
    } else {
      $to_charset = "ISO-8859-1";
    }

    $k=0;
    $output = "";
    foreach($jg_iptctags as $iptctag) {
      $realiptctag = str_replace(":", "#",$iptc_config_array['IPTC'][$iptctag]['IMM']);
      if (isset($iptc_array[$realiptctag])) {
        $kk = $k%2+1;
        $output .= "    <div class=\"sectiontableentry".$kk."\">\n";
        $output .= "      <div class=\"jg_exif_left\">\n";
        $output .= "        ".$iptc_config_array['IPTC'][$iptctag]['Name']."\n";
        $output .= "      </div>\n";
        $output .= "      <div class=\"jg_exif_right\">\n";
        if (function_exists('iconv')) {
          $fixedenteties = htmlentities($iptc_array[$realiptctag][0]);
          $fixedcharset = iconv($from_charset, $to_charset, $fixedenteties);
        } else {
          $fixedcharset = $iptc_array[$realiptctag][0];
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
        if($tagdata == "") {
          $tagdata = "&nbsp;";
        }
        $output .= "        ".$tagdata."";
        $output .= "      </div>\n";
        $output .= "    </div>\n";
        $k++;
        if ($realiptctag == "2#025") {
          $num = count($iptc_array["2#025"]);
          if ($num > 1) {
            $i=1;
            for ( $keywords = 1; $keywords < $num; $keywords++ ) {
              $kk = $k%2+1;
              $output .= "    <div class=\"sectiontableentry".$kk."\">\n";
              $output .= "      <div class=\"jg_exif_left\">\n";
              $output .= "        ".$iptc_config_array['IPTC'][$iptctag]['Name']." \n";
              $output .= "      </div>\n";
              $output .= "      <div class=\"jg_exif_right\">\n";
              if (function_exists('iconv')) {
                $fixedenteties = htmlentities($iptc_array[$realiptctag][$i]);
                $fixedcharset = iconv($from_charset, $to_charset, $fixedenteties);
              } else {
                $fixedcharset = $iptc_array[$realiptctag][$i];
              }
              if (defined ('_JEXEC')) {
                if (!is_utf8($fixedcharset)) {
                  $tagdata= htmlspecialchars_decode(utf8_encode_mix($fixedcharset, false));
                } else {
                  $tagdata =  htmlspecialchars_decode($fixedcharset);
                }
              } else {
                $tagdata = htmlspecialchars_decode($fixedcharset);
              }
              if($tagdata == "") {
                $tagdata = "&nbsp;";
              } 
              $output .= "        ".$tagdata."";
              $output .= "      </div>\n";
              $output .= "    </div>\n";
              $k++;
              $i++;
            }
          } 
        }
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
