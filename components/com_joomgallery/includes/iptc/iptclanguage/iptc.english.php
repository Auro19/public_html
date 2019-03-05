<?php
// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/iptc/iptclanguage/iptc.english.php $
// $Id: iptc.english.php 803 2008-12-16 10:12:34Z mab $
/******************************************************************************\
**   JoomGallery  1.0                                                        **
**   By: JoomGallery::ProjectTeam                                            **
**   Copyright (C) 2008  M. Andreas Boettcher                                **
**   Based on: PonyGallery ML 2.5.1 by PonyGallery-ML-Team                   **
**   Released under GNU GPL Public License                                   **
**   License: http://www.gnu.org/copyleft/gpl.html or have a look            **
**   at administrator/components/com_joomgallery/LICENSE.TXT                 **
\******************************************************************************/

#### Original Copyright ########################################################
## PonyGallery ML 2.5.1                                                       ##
## By: M. Andreas Boettcher & Benjamin Malte Meier                            ##
## & Andreas Hartmann & The ML-Team                                           ##
## Copyright (C) 2007 M. Andreas Boettcher, All rights reserved.              ##
## Released under GNU GPL Public License                                      ##
################################################################################


/*     English IPTC-language file 
**     By: M. Andreas Böttcher (mab)
**     mailto: mab@joomgallery.net
**     last modified on 11/28/2008
**
*/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

DEFINE('_JGSI_IPTCTAGS','IPTC-Tags&nbsp;&sup1;');
DEFINE('_JGSI_TAG','Tag');
DEFINE('_JGSI_TAGDESCRIPTION','Definition');
DEFINE('_JGSI_TAGNR','Tag-Nr.');
DEFINE('_JGSI_TAGNAME','Tag-Name');
DEFINE('_JGSI_DATA','IPTC-Data');


/* 
COPYRIGHT-NOTICE
The following definitions are protected by international copyright laws. 
IPTC standard specifications (tag, tag-nr. description, defintion) are copyright 
of the International Press Telecommunications Council (www.iptc.org). 
The use of these specifications is only permitted if they remain unaltered from 
those defined in official IPTC publications and, in addition, are explicitly labelled 
with an IPTC copyright notice.
The specifications used here come from the document "Photo Metadata 2008, IPTC 
Core Specification Version 1.1" 
(see http://iptc.cms.apa.at/std/photometadata/2008/specification/IPTC-PhotoMetadata-2008_2.pdf), 
which also contains all respective licensing details. 
*/




DEFINE('_JGSI_IPTC_INTELLECTUALGENRE','Intellectual Genre');
DEFINE('_JGSI_IPTC_INTELLECTUALGENRE_DEFINITION','Describes the nature, intellectual, artistic or journalistic characteristic of a item, not specifically its content.');
DEFINE('_JGSI_IPTC_TITLE','Title');
DEFINE('_JGSI_IPTC_TITLE_DEFINITION','A shorthand reference for the digital image. Title provides a short human readable name which can be a text and/or numeric reference. It is not the same as Headline.');
DEFINE('_JGSI_IPTC_KEYWORDS','Keywords');
DEFINE('_JGSI_IPTC_KEYWORDS_DEFINITION','Keywords to express the subject of the content. Keywords may be free text and don\'t have to be taken from a controlled vocabulary. Codes from the controlled vocabulary IPTC Subject NewsCodes must go to the &quot;Subject Code&quot; field.');
DEFINE('_JGSI_IPTC_INSTRUCTIONS','Instructions');
DEFINE('_JGSI_IPTC_INSTRUCTIONS_DEFINITION','Any of a number of instructions from the provider or creator to the receiver of the item.');
DEFINE('_JGSI_IPTC_DATECREATED','Date Created');
DEFINE('_JGSI_IPTC_DATECREATED_DEFINITION','Designates the date the intellectual content was created rather than the date of the creation of the physical representation.');
DEFINE('_JGSI_IPTC_TIMECREATED','Time Created');
DEFINE('_JGSI_IPTC_TIMECREATED_DEFINITION','Designates the time the intellectual content was created rather than the time of the creation of the physical representation. If no time is given the value should default to 00:00:00.');
DEFINE('_JGSI_IPTC_CREATOR','Creator');
DEFINE('_JGSI_IPTC_CREATOR_DEFINITION','Contains the name of the person who created the content of this item, a photographer for photos, a graphic artist for graphics, or a writer for textual news, but in cases where the photographer should not be identified the name of a company or organisation may be appropriate.');
DEFINE('_JGSI_IPTC_CREATORSJOBTITLE','Creator\'s Jobtitle');
DEFINE('_JGSI_IPTC_CREATORSJOBTITLE_DEFINITION','Contains the job title of the person who created the content of this item. As this is sort of a qualifier the Creator element has to be filled in as mandatory prerequisite for using Creator\'s Jobtitle.');
DEFINE('_JGSI_IPTC_CITYLEGACY','City');
DEFINE('_JGSI_IPTC_CITYLEGACY_DEFINITION','Name of the city the content is focussing on -- either the place shown in visual media or referenced by text or audio media. This element is at the third level of a top-down geographical hierarchy.');
DEFINE('_JGSI_IPTC_SUBLOCATIONLEGACY','Location');
DEFINE('_JGSI_IPTC_SUBLOCATIONLEGACY_DEFINITION','Name of a sublocation the content is focussing on -- either the location shown in visual media or referenced by text or audio media. This location name could either be the name of a sublocation to a city or the name of a well known location or (natural) monument outside a city. In the sense of a sublocation to a city this element is at the fourth level of a top-down geographical hierarchy.');
DEFINE('_JGSI_IPTC_PROVINCEORSTATELEGACY','Province/State');
DEFINE('_JGSI_IPTC_PROVINCEORSTATELEGACY_DEFINITION','Name of the subregion of a country -- either called province or state or anything else -- the content is focussing on -- either the subregion shown in visual media or referenced by text or audio media. This element is at the second level of a top-down geographical hierarchy.');
DEFINE('_JGSI_IPTC_COUNTRYCODELEGACY','Country Code');
DEFINE('_JGSI_IPTC_COUNTRYCODELEGACY_DEFINITION','Code of the country the content is focussing on -- either the country shown in visual media or referenced in text or audio media. This element is at the top/first level of a top-down geographical hierarchy. The code should be taken from ISO 3166 two or three letter code. The full name of a country should go to the &quot;Country&quot; element.');
DEFINE('_JGSI_IPTC_COUNTRYLEGACY','Country');
DEFINE('_JGSI_IPTC_COUNTRYLEGACY_DEFINITION','Full name of the country the content is focussing on -- either the country shown in visual media or referenced in text or audio media. This element is at the top/first level of a top-down geographical hierarchy. The full name should be expressed as a verbal name and not as a code, a code should go to the element &quot;CountryCode&quot;.');
DEFINE('_JGSI_IPTC_HEADLINE','Headline');
DEFINE('_JGSI_IPTC_HEADLINE_DEFINITION','A brief synopsis of the caption. Headline is not the same as Title.');
DEFINE('_JGSI_IPTC_CREDITLINE','Credit');
DEFINE('_JGSI_IPTC_CREDITLINE_DEFINITION','The credit to person(s) and/or organisation(s) required by the supplier of the item to be used when published. This is a free-text field.');
DEFINE('_JGSI_IPTC_SOURCE','Source');
DEFINE('_JGSI_IPTC_SOURCE_DEFINITION','Identifies the original owner of the copyright for the intellectual content of the item. This could be an agency, a member of an agency or an individual. Source could be different from Creator and from the entities in the CopyrightNotice.');
DEFINE('_JGSI_IPTC_COPYRIGHTNOTICE','Copyright Notice');
DEFINE('_JGSI_IPTC_COPYRIGHTNOTICE_DEFINITION','Contains any necessary copyright notice for claiming the intellectual property for this item and should identify the current owner of the copyright for the item. Other entities like the creator of the item may be added in the corresponding field. Notes on usage rights should be provided in &quot;Rights usage terms&quot;.');
DEFINE('_JGSI_IPTC_CONTACT','Contact');
DEFINE('_JGSI_IPTC_CONTACT_DEFINITION','A generic structure providing a basic set of information to get in contact with a person or organisation.');
DEFINE('_JGSI_IPTC_DESCRIPTION','Caption/Abstract');
DEFINE('_JGSI_IPTC_DESCRIPTION_DEFINITION','A textual description, including captions, of the item\'s content, particularly used where the object is not text.');
DEFINE('_JGSI_IPTC_DESCRIPTIONWRITER','Writer/Editor');
DEFINE('_JGSI_IPTC_DESCRIPTIONWRITER_DEFINITION','Identifier or the name of the person involved in writing, editing or correcting the description of the content.');




 
?>
