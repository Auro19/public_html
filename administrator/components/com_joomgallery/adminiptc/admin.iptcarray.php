<?php
// $HeadURL: http://joomlacode.org/svn/joomgallery/JG-1.0/JG/trunk/administrator/components/com_joomgallery/adminiptc/admin.iptcarray.php $
// $Id: admin.iptcarray.php 396 2009-03-15 16:06:21Z aha $
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


    $iptc_config_array = array
    (
      "IPTC" => array
      (
//            204 => array('Attribute'   => "Object Attribute Reference",
//                         'Name'        => _JGSI_IPTC_INTELLECTUALGENRE,
//                         'Description' => _JGSI_IPTC_INTELLECTUALGENRE_DEFINITION,
//                         'Group'       => "Object",
//                         'IMM'         => "2:004",
//                         'Format'      => "Characters",
//                         'Length'      => "256"
//                        ),
           205 => array('Attribute'   => "Object Name",
                        'Name'        => _JGSI_IPTC_TITLE,
                        'Description' => _JGSI_IPTC_TITLE_DEFINITION,
                        'Group'       => "Object",
                        'IMM'         => "2:005",
                        'Format'      => "Characters",
                        'Length'      => "64"
                       ),
           225 => array('Attribute'   => "Keywords",
                        'Name'        => _JGSI_IPTC_KEYWORDS,
                        'Description' => _JGSI_IPTC_KEYWORDS_DEFINITION,
                        'Group'       => "Keywords",
                        'IMM'         => "2:025",
                        'Format'      => "Characters",
                        'Length'      => "each max. 64"
                       ),
           240 => array('Attribute'   => "Special Instructions",
                        'Name'        => _JGSI_IPTC_INSTRUCTIONS,
                        'Description' => _JGSI_IPTC_INSTRUCTIONS_DEFINITION,
                        'Group'       => "Caption",
                        'IMM'         => "2:040",
                        'Format'      => "Characters",
                        'Length'      => "256"
                       ),
           255 => array('Attribute'   => "Date Created",
                        'Name'        => _JGSI_IPTC_DATECREATED,
                        'Description' => _JGSI_IPTC_DATECREATED_DEFINITION,
                        'Group'       => "Object",
                        'IMM'         => "2:055",
                        'Format'      => "Numeric",
                        'Length'      => "8"
                       ),
//            260 => array('Attribute'   => "Time Created",
//                         'Name'        => _JGSI_IPTC_TIMECREATED,
//                         'Description' => _JGSI_IPTC_TIMECREATED_DEFINITION,
//                         'Group'       => "Object",
//                         'IMM'         => "2:060",
//                         'Format'      => "Characters",
//                         'Length'      => "11"
//                        ),
           280 => array('Attribute'   => "By-line",
                        'Name'        => _JGSI_IPTC_CREATOR,
                        'Description' => _JGSI_IPTC_CREATOR_DEFINITION,
                        'Group'       => "Contact",
                        'IMM'         => "2:080",
                        'Format'      => "Characters",
                        'Length'      => "32"
                       ),
           285 => array('Attribute'   => "By-line Title",
                        'Name'        => _JGSI_IPTC_CREATORSJOBTITLE,
                        'Description' => _JGSI_IPTC_CREATORSJOBTITLE_DEFINITION,
                        'Group'       => "Contact",
                        'IMM'         => "2:085",
                        'Format'      => "Characters",
                        'Length'      => "32"
                       ),
           290 => array('Attribute'   => "City",
                        'Name'        => _JGSI_IPTC_CITYLEGACY,
                        'Description' => _JGSI_IPTC_CITYLEGACY_DEFINITION,
                        'Group'       => "Object",
                        'IMM'         => "2:090",
                        'Format'      => "Characters",
                        'Length'      => "32"
                       ),
           292 => array('Attribute'   => "Sublocation",
                        'Name'        => _JGSI_IPTC_SUBLOCATIONLEGACY,
                        'Description' => _JGSI_IPTC_SUBLOCATIONLEGACY_DEFINITION,
                        'Group'       => "Object",
                        'IMM'         => "2:092",
                        'Format'      => "Characters",
                        'Length'      => "32"
                       ),
           295 => array('Attribute'   => "Province/State",
                        'Name'        => _JGSI_IPTC_PROVINCEORSTATELEGACY,
                        'Description' => _JGSI_IPTC_PROVINCEORSTATELEGACY_DEFINITION,
                        'Group'       => "Object",
                        'IMM'         => "2:095",
                        'Format'      => "Characters",
                        'Length'      => "32"
                       ),
//           2100 => array('Attribute'   => "Country/Primary Location Code",
//                         'Name'        => _JGSI_IPTC_COUNTRYCODELEGACY,
//                         'Description' => _JGSI_IPTC_COUNTRYCODELEGACY_DEFINITION,
//                         'Group'       => "Object",
//                         'IMM'         => "2:100",
//                         'Format'      => "Characters",
//                         'Length'      => "2 or 3"
//                        ),
          2101 => array('Attribute'   => "Country/Primary Location Name",
                        'Name'        => _JGSI_IPTC_COUNTRYLEGACY,
                        'Description' => _JGSI_IPTC_COUNTRYLEGACY_DEFINITION,
                        'Group'       => "Object",
                        'IMM'         => "2:101",
                        'Format'      => "Characters",
                        'Length'      => "64"
                       ),
          2105 => array('Attribute'   => "Headline",
                        'Name'        => _JGSI_IPTC_HEADLINE,
                        'Description' => _JGSI_IPTC_HEADLINE_DEFINITION,
                        'Group'       => "Caption",
                        'IMM'         => "2:105",
                        'Format'      => "Characters",
                        'Length'      => "256"
                       ),
          2110 => array('Attribute'   => "Credit",
                        'Name'        => _JGSI_IPTC_CREDITLINE,
                        'Description' => _JGSI_IPTC_CREDITLINE_DEFINITION,
                        'Group'       => "Credit",
                        'IMM'         => "2:110",
                        'Format'      => "Characters",
                        'Length'      => "32"
                       ),
          2115 => array('Attribute'   => "Source",
                        'Name'        => _JGSI_IPTC_SOURCE,
                        'Description' => _JGSI_IPTC_SOURCE_DEFINITION,
                        'Group'       => "Credit",
                        'IMM'         => "2:115",
                        'Format'      => "Characters",
                        'Length'      => "32"
                       ),
          2116 => array('Attribute'   => "Copyright Notice",
                        'Name'        => _JGSI_IPTC_COPYRIGHTNOTICE,
                        'Description' => _JGSI_IPTC_COPYRIGHTNOTICE_DEFINITION,
                        'Group'       => "Credit",
                        'IMM'         => "2:116",
                        'Format'      => "Characters",
                        'Length'      => "128"
                       ),
          2118 => array('Attribute'   => "Contact",
                        'Name'        => _JGSI_IPTC_CONTACT,
                        'Description' => _JGSI_IPTC_CONTACT_DEFINITION,
                        'Group'       => "Credit",
                        'IMM'         => "2:118",
                        'Format'      => "Characters",
                        'Length'      => "128"
                       ),
          2120 => array('Attribute'   => "Caption/Abstract",
                        'Name'        => _JGSI_IPTC_DESCRIPTION,
                        'Description' => _JGSI_IPTC_DESCRIPTION_DEFINITION,
                        'Group'       => "Caption",
                        'IMM'         => "2:120",
                        'Format'      => "Characters",
                        'Length'      => "2000"
                       ),
          2122 => array('Attribute'   => "Writer/Editor",
                        'Name'        => _JGSI_IPTC_DESCRIPTIONWRITER,
                        'Description' => _JGSI_IPTC_DESCRIPTIONWRITER_DEFINITION,
                        'Group'       => "Caption",
                        'IMM'         => "2:122",
                        'Format'      => "Characters",
                        'Length'      => "128"
                       ),
      ),
    );


?>
