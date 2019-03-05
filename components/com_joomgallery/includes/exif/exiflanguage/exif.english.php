<?php
// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-1.0/JG/trunk/components/com_joomgallery/includes/exif/exiflanguage/exif.english.php $
// $Id: exif.english.php 791 2008-12-15 14:56:32Z mab $
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


/*     English exif-language file for the Frontend
**     By: M. Andreas Böttcher (mab)
**     mailto: mab@joomgallery.net
**     last modified on 11/28/2008
**
*/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

DEFINE('_JGSE_IFD0TAGS','IFD0-Tags');
DEFINE('_JGSE_SUBIFDTAGS','Sub-IFD-Tags');
DEFINE('_JGSE_GPSTAGS','GPS-Tags');
DEFINE('_JGSE_TAG','Tag');
DEFINE('_JGSE_TAGDESCRIPTION','Description');
DEFINE('_JGSE_TAGNR','Tag-Nr.');
DEFINE('_JGSE_TAGNAME','Tag-Name');
DEFINE('_JGSE_DATA','Exif-Data');

// IFD0-Tags
DEFINE('_JGSE_IFD0_IMAGEDESCRIPTION','Image Description');
DEFINE('_JGSE_IFD0_IMAGEDESCRIPTION_DESCRIPTION','Describes image.');
DEFINE('_JGSE_IFD0_MAKE','Camera Make (Manufacturer)');
DEFINE('_JGSE_IFD0_MAKE_DESCRIPTION','Shows manufacturer of digicam.');
DEFINE('_JGSE_IFD0_MODEL','Camera Model');
DEFINE('_JGSE_IFD0_MODEL_DESCRIPTION','Shows model number of digicam.');
DEFINE('_JGSE_IFD0_ORIENTATION','Picture Orientation');
DEFINE('_JGSE_IFD0_ORIENTATION_DESCRIPTION','The orientation of the camera relative to the scene, when the image was captured.');
DEFINE('_JGSE_IFD0_ORIENTATION_1','The 0th row is at the visual top of the image, and the 0th column is the visual left-hand side.');
DEFINE('_JGSE_IFD0_ORIENTATION_2','The 0th row is at the visual top of the image, and the 0th column is the visual right-hand side.');
DEFINE('_JGSE_IFD0_ORIENTATION_3','The 0th row is at the visual bottom of the image, and the 0th column is the visual right-hand side.');
DEFINE('_JGSE_IFD0_ORIENTATION_4','The 0th row is at the visual bottom of the image, and the 0th column is the visual left-hand side.');
DEFINE('_JGSE_IFD0_ORIENTATION_5','The 0th row is the visual left-hand side of the image, and the 0th column is the visual top.');
DEFINE('_JGSE_IFD0_ORIENTATION_6','The 0th row is the visual right-hand side of the image, and the 0th column is the visual top.');
DEFINE('_JGSE_IFD0_ORIENTATION_7','The 0th row is the visual right-hand side of the image, and the 0th column is the visual bottom.');
DEFINE('_JGSE_IFD0_ORIENTATION_8','The 0th row is the visual left-hand side of the image, and the 0th column is the visual bottom.');
DEFINE('_JGSE_IFD0_XRESOLUTION','X-Resolution');
DEFINE('_JGSE_IFD0_XRESOLUTION_DESCRIPTION','Display/Print x-resolution of image.');
DEFINE('_JGSE_IFD0_YRESOLUTION','Y-Resolution');
DEFINE('_JGSE_IFD0_YRESOLUTION_DESCRIPTION','Display/Print y-resolution of image.');
DEFINE('_JGSE_IFD0_DOTSPERRESOLUTIONUNIT','Dots per Resolution Unit');
DEFINE('_JGSE_IFD0_RESOLUTIONUNIT','X/Y-Resolution Unit');
DEFINE('_JGSE_IFD0_RESOLUTIONUNIT_DESCRIPTION','Resolution Unit');
DEFINE('_JGSE_IFD0_RESOLUTIONUNIT_1','no-unit');
DEFINE('_JGSE_IFD0_RESOLUTIONUNIT_2','inch');
DEFINE('_JGSE_IFD0_RESOLUTIONUNIT_3','cm');
DEFINE('_JGSE_IFD0_RESOLUTIONUNIT_4','mm');
DEFINE('_JGSE_IFD0_RESOLUTIONUNIT_5','&micro;m');
DEFINE('_JGSE_IFD0_SOFTWARE','Software/Firmware');
DEFINE('_JGSE_IFD0_SOFTWARE_DESCRIPTION','Shows firmware(internal software of digicam) version number.');
DEFINE('_JGSE_IFD0_DATETIME','Last Modified Date/Time');
DEFINE('_JGSE_IFD0_DATETIME_DESCRIPTION','Date and Time of image was last modified.');
DEFINE('_JGSE_IFD0_WHITEPOINT','White Point Chromaticity');
DEFINE('_JGSE_IFD0_WHITEPOINT_DESCRIPTION','Defines chromaticity of white point of the image (x,y coordinates on a 1931 CIE xy chromaticity diagram).');
DEFINE('_JGSE_IFD0_PRIMARYCHROMATICITIES','Primary Chromaticities');
DEFINE('_JGSE_IFD0_PRIMARYCHROMATICITIES_DESCRIPTION','Defines chromaticity of the primaries of the image (Red x,y, Green x,y, Blue x,y coordinates on a 1931 CIE xy chromaticity diagram).');
DEFINE('_JGSE_IFD0_YCBCRCOEFFICIENTS','Y/Cb/Cr Coefficients');
DEFINE('_JGSE_IFD0_YCBCRCOEFFICIENTS_DESCRIPTION','When image format is YCbCr, this value shows a constant to translate it to RGB format.');
DEFINE('_JGSE_IFD0_YCBCRPOSITIONING','Y/Cb/Cr Positioning (Subsampling)');
DEFINE('_JGSE_IFD0_YCBCRPOSITIONING_DESCRIPTION','Specifies location of chrominance and luminance components.');
DEFINE('_JGSE_IFD0_YCBCRPOSITIONING_1','Chrominance components centred in relation to luminance components');
DEFINE('_JGSE_IFD0_YCBCRPOSITIONING_2','Chrominance and luminance components Co-Sited');
DEFINE('_JGSE_IFD0_REFERENCEBLACKWHITE','Reference Black point and White point');
DEFINE('_JGSE_IFD0_REFERENCEBLACKWHITE_DESCRIPTION','Shows reference value of black point/white point. In case of YCbCr format, first 2 show black/white of Y, next 2 are Cb, last 2 are Cr. In case of RGB format, first 2 show black/white of R, next 2 are G, last 2 are B.');
DEFINE('_JGSE_IFD0_ARTIST','Artist Name');
DEFINE('_JGSE_IFD0_ARTIST_DESCRIPTION','Name of Artist.');
DEFINE('_JGSE_IFD0_COPYRIGHT','Copyright');
DEFINE('_JGSE_IFD0_COPYRIGHT_DESCRIPTION','Shows copyright information.');

// SUB IFD-Tags
DEFINE('_JGSE_SUBIFD_EXPOSURETIME','Exposure Time');
DEFINE('_JGSE_SUBIFD_EXPOSURETIME_DESCRIPTION','Exposure time (reciprocal of shutter speed).');
DEFINE('_JGSE_SECONDS','seconds');
DEFINE('_JGSE_SUBIFD_FNUMBER','Aperture F Number');
DEFINE('_JGSE_SUBIFD_FNUMBER_DESCRIPTION','The actual F-number(F-stop) of lens when the image was taken.');
DEFINE('_JGSE_SUBIFD_FNUMBER_F','F');
DEFINE('_JGSE_SUBIFD_EXPOSUREPROGRAM','Exposure Program');
DEFINE('_JGSE_SUBIFD_EXPOSUREPROGRAM_DESCRIPTION','Exposure program that the camera used when image was taken.');
DEFINE('_JGSE_SUBIFD_EXPOSUREPROGRAM_0','Not defined');
DEFINE('_JGSE_SUBIFD_EXPOSUREPROGRAM_1','Manual');
DEFINE('_JGSE_SUBIFD_EXPOSUREPROGRAM_2','Normal program');
DEFINE('_JGSE_SUBIFD_EXPOSUREPROGRAM_3','Aperture priority');
DEFINE('_JGSE_SUBIFD_EXPOSUREPROGRAM_4','Shutter priority');
DEFINE('_JGSE_SUBIFD_EXPOSUREPROGRAM_5','Creative program (biased toward depth of field)');
DEFINE('_JGSE_SUBIFD_EXPOSUREPROGRAM_6','Action program (biased toward fast shutter speed)');
DEFINE('_JGSE_SUBIFD_EXPOSUREPROGRAM_7','Portrait mode (for closeup photos with the background out of focus)');
DEFINE('_JGSE_SUBIFD_EXPOSUREPROGRAM_8','Landscape mode (for landscape photos with the background in focus)');
DEFINE('_JGSE_SUBIFD_ISOSPEEDRATINGS','ISO Speed Ratings');
DEFINE('_JGSE_SUBIFD_ISOSPEEDRATINGS_DESCRIPTION','CCD sensitivity equivalent to Ag-Hr film speedrate.');
DEFINE('_JGSE_SUBIFD_EXIFVERSION','Exif Version');
DEFINE('_JGSE_SUBIFD_EXIFVERSION_DESCRIPTION','Exif version number.');
DEFINE('_JGSE_SUBIFD_EXIFVERSION_VERSION','Version');
DEFINE('_JGSE_SUBIFD_DATETIMEORIGINAL','Date and Time of Original');
DEFINE('_JGSE_SUBIFD_DATETIMEORIGINAL_DESCRIPTION','Date/Time of original image taken.');
DEFINE('_JGSE_SUBIFD_DATETIMEDIGITIZED','Date and Time when Digitized');
DEFINE('_JGSE_SUBIFD_DATETIMEDIGITIZED_DESCRIPTION','Date/Time of image digitized.');
DEFINE('_JGSE_SUBIFD_COMPONENTSCONFIGURATION','Components Configuration');
DEFINE('_JGSE_SUBIFD_COMPONENTSCONFIGURATION_DESCRIPTION','Information specific to compressed data.');
DEFINE('_JGSE_SUBIFD_COMPONENTSCONFIGURATION_COMPONENT','Component ');
DEFINE('_JGSE_SUBIFD_COMPONENTSCONFIGURATION_0','Does not exist');
DEFINE('_JGSE_SUBIFD_COMPONENTSCONFIGURATION_1','Y (Luminance)');
DEFINE('_JGSE_SUBIFD_COMPONENTSCONFIGURATION_2','Cb (Chroma minus Blue)');
DEFINE('_JGSE_SUBIFD_COMPONENTSCONFIGURATION_3','Cr(Chroma minus Red)');
DEFINE('_JGSE_SUBIFD_COMPONENTSCONFIGURATION_4','R (Red)');
DEFINE('_JGSE_SUBIFD_COMPONENTSCONFIGURATION_5','G (Green)');
DEFINE('_JGSE_SUBIFD_COMPONENTSCONFIGURATION_6','B (Blue)');
DEFINE('_JGSE_SUBIFD_COMPONENTSCONFIGURATION_UNKNOWN','Unknown value:');
DEFINE('_JGSE_SUBIFD_COMPRESSEDBITSPERPIXEL','Compressed Bits Per Pixel');
DEFINE('_JGSE_SUBIFD_COMPRESSEDBITSPERPIXEL_DESCRIPTION','The compression mode used for a compressed image is indicated in unit bits per pixel.');
DEFINE('_JGSE_SUBIFD_COMPRESSEDBITSPERPIXEL_UNIT','bpp');
DEFINE('_JGSE_SUBIFD_SHUTTERSPEEDVALUE','APEX Shutter Speed Value (Tv)');
DEFINE('_JGSE_SUBIFD_SHUTTERSPEEDVALUE_DESCRIPTION','Shutter speed. The unit is the APEX (Additive System of Photographic Exposure) setting.');
DEFINE('_JGSE_SUBIFD_SHUTTERSPEEDVALUE_UNIT','Tv');
DEFINE('_JGSE_SUBIFD_APERTUREVALUE','APEX Aperture Value (Av)');
DEFINE('_JGSE_SUBIFD_APERTUREVALUE_DESCRIPTION','The actual aperture value of lens when the image was taken. Unit is APEX.');
DEFINE('_JGSE_SUBIFD_APERTUREVALUE_UNIT','Av');
DEFINE('_JGSE_SUBIFD_BRIGHTNESSVALUE','APEX Brightness Value (Bv)');
DEFINE('_JGSE_SUBIFD_BRIGHTNESSVALUE_DESCRIPTION','Brightness of taken subject, unit is APEX.');
DEFINE('_JGSE_SUBIFD_BRIGHTNESSVALUE_UNIT','Bv');
DEFINE('_JGSE_SUBIFD_EXPOSUREBIASVALUE','APEX Exposure Bias Value (Ev)');
DEFINE('_JGSE_SUBIFD_EXPOSUREBIASVALUE_DESCRIPTION','The exposure bias. The unit is the APEX value.');
DEFINE('_JGSE_SUBIFD_EXPOSUREBIASVALUE_UNIT','Ev');
DEFINE('_JGSE_SUBIFD_MAXAPERTUREVALUE','APEX Maximum Aperture Value');
DEFINE('_JGSE_SUBIFD_MAXAPERTUREVALUE_DESCRIPTION','The smallest F number of the lens. The unit is the APEX value.');
DEFINE('_JGSE_SUBIFD_SUBJECTDISTANCE','Subject Distance');
DEFINE('_JGSE_SUBIFD_SUBJECTDISTANCE_DESCRIPTION','The distance to the subject, given in meters.');
DEFINE('_JGSE_SUBIFD_SUBJECTDISTANCE_UNIT','metres');
DEFINE('_JGSE_SUBIFD_METERINGMODE','Metering Mode');
DEFINE('_JGSE_SUBIFD_METERINGMODE_DESCRIPTION','Exposure metering method.');
DEFINE('_JGSE_SUBIFD_METERINGMODE_0','Unknown');
DEFINE('_JGSE_SUBIFD_METERINGMODE_1','Average');
DEFINE('_JGSE_SUBIFD_METERINGMODE_2','Center Weighted Average');
DEFINE('_JGSE_SUBIFD_METERINGMODE_3','Spot');
DEFINE('_JGSE_SUBIFD_METERINGMODE_4','Multi-Spot');
DEFINE('_JGSE_SUBIFD_METERINGMODE_5','Pattern');
DEFINE('_JGSE_SUBIFD_METERINGMODE_6','Partial');
DEFINE('_JGSE_SUBIFD_METERINGMODE_255','Other');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE','Light Source');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_DESCRIPTION','Light source, actually this means white balance setting.');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_0','Unknown');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_1','Daylight');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_2','Fluorescent');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_3','Tungsten (incandescent light)');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_4','Flash');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_9','Fine weather');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_10','Cloudy weather');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_11','Shade');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_12','Daylight fluorescent (D 5700 – 7100K)');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_13','Day white fluorescent (N 4600 – 5400K)');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_14','Cool white fluorescent (W 3900 – 4500K)');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_15','White fluorescent (WW 3200 – 3700K)');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_17','Standard light A');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_18','Standard light B');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_19','Standard light C');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_20','D55');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_21','D65');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_22','D75');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_23','D50');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_24','ISO studio tungsten');
DEFINE('_JGSE_SUBIFD_LIGHTSOURCE_255','Other light source');
DEFINE('_JGSE_SUBIFD_FLASH','Flash');
DEFINE('_JGSE_SUBIFD_FLASH_DESCRIPTION','Shows information about flash if used.');
DEFINE('_JGSE_SUBIFD_FLASH_0','Flash did not fire');
DEFINE('_JGSE_SUBIFD_FLASH_1','Flash fired');
DEFINE('_JGSE_SUBIFD_FLASH_5','Strobe return light not detected');
DEFINE('_JGSE_SUBIFD_FLASH_7','Strobe return light detected');
DEFINE('_JGSE_SUBIFD_FLASH_8','On, Flash did not fire');//NEW
DEFINE('_JGSE_SUBIFD_FLASH_9','Flash fired, compulsory flash mode');
DEFINE('_JGSE_SUBIFD_FLASH_13','Flash fired, compulsory flash mode, return light not detected');
DEFINE('_JGSE_SUBIFD_FLASH_15','Flash fired, compulsory flash mode, return light detected');
DEFINE('_JGSE_SUBIFD_FLASH_16','Flash did not fire, compulsory flash mode');
DEFINE('_JGSE_SUBIFD_FLASH_20','Off, Flash did not fire, return light not detected');//NEW
DEFINE('_JGSE_SUBIFD_FLASH_24','Flash did not fire, auto mode');
DEFINE('_JGSE_SUBIFD_FLASH_25','Flash fired, auto mode');
DEFINE('_JGSE_SUBIFD_FLASH_29','Flash fired, auto mode, return light not detected');
DEFINE('_JGSE_SUBIFD_FLASH_31','Flash fired, auto mode, return light detected');
DEFINE('_JGSE_SUBIFD_FLASH_32','No flash function');
DEFINE('_JGSE_SUBIFD_FLASH_48','Off, no flash function');//NEW
DEFINE('_JGSE_SUBIFD_FLASH_65','Flash fired, red-eye reduction mode');
DEFINE('_JGSE_SUBIFD_FLASH_69','Flash fired, red-eye reduction mode, return light not detected');
DEFINE('_JGSE_SUBIFD_FLASH_71','Flash fired, red-eye reduction mode, return light detected');
DEFINE('_JGSE_SUBIFD_FLASH_73','Flash fired, compulsory flash mode, red-eye reduction mode');
DEFINE('_JGSE_SUBIFD_FLASH_77','Flash fired, compulsory flash mode, red-eye reduction mode, return light not detected');
DEFINE('_JGSE_SUBIFD_FLASH_79','Flash fired, compulsory flash mode, red-eye reduction mode, return light detected');
DEFINE('_JGSE_SUBIFD_FLASH_80','Off, red-eye reduction mode');//NEW
DEFINE('_JGSE_SUBIFD_FLASH_88','Flash did not fire, red-eye reduction mode');
DEFINE('_JGSE_SUBIFD_FLASH_89','Flash fired, auto mode, red-eye reduction mode');
DEFINE('_JGSE_SUBIFD_FLASH_93','Flash fired, auto mode, return light not detected, red-eye reduction mode');
DEFINE('_JGSE_SUBIFD_FLASH_95','Flash fired, auto mode, return light detected, red-eye reduction mode');
DEFINE('_JGSE_SUBIFD_FOCALLENGTH','Focal Length');
DEFINE('_JGSE_SUBIFD_FOCALLENGTH_DESCRIPTION','Focal length of lens used to take image. Unit is millimeter.');
DEFINE('_JGSE_SUBIFD_FOCALLENGTH_UNIT','mm');
// DEFINE('_JGSE_SUBIFD_USERCOMMENT','User Comment');
// DEFINE('_JGSE_SUBIFD_USERCOMMENT_DESCRIPTION','Stores user comment.');
// DEFINE('_JGSE_SUBIFD_SUBSECTIME','Sub Second Time');
// DEFINE('_JGSE_SUBIFD_SUBSECTIME_DESCRIPTION','');
// DEFINE('_JGSE_SUBIFD_SUBSECTIMEORIGINAL','Sub Second Time of Original');
// DEFINE('_JGSE_SUBIFD_SUBSECTIMEORIGINAL_DESCRIPTION','');
// DEFINE('_JGSE_SUBIFD_SUBSECTIMEDIGITIZED','Sub Second Time when Digitized');
// DEFINE('_JGSE_SUBIFD_SUBSECTIMEDIGITIZED_DESCRIPTION','');
// DEFINE('_JGSE_SUBIFD_FLASHPIXVERSION','FlashPix Version');
// DEFINE('_JGSE_SUBIFD_FLASHPIXVERSION_DESCRIPTION','');
DEFINE('_JGSE_SUBIFD_COLORSPACE','Color Space');
DEFINE('_JGSE_SUBIFD_COLORSPACE_DESCRIPTION','Defines Color Space.');
DEFINE('_JGSE_SUBIFD_COLORSPACE_SRGB','sRGB');
DEFINE('_JGSE_SUBIFD_COLORSPACE_65535','Uncalibrated');
DEFINE('_JGSE_SUBIFD_EXIFIMAGEWIDTH','Image Width');
DEFINE('_JGSE_SUBIFD_EXIFIMAGEWIDTH_DESCRIPTION','Size of main image (width).');
DEFINE('_JGSE_SUBIFD_EXIFIMAGELENGTH','Image Height');
DEFINE('_JGSE_SUBIFD_EXIFIMAGELENGTH_DESCRIPTION','Size of main image (height).');
DEFINE('_JGSE_SUBIFD_EXIFIMAGEWIDTHLENGTH_UNIT','px');
// DEFINE('_JGSE_SUBIFD_RELATEDSOUNDFILE','Related Sound File');
// DEFINE('_JGSE_SUBIFD_RELATEDSOUNDFILE_DESCRIPTION','');
// DEFINE('_JGSE_SUBIFD_EXIFINTEROPERABILITYOFFSET','Interoperability Image File Directory (IFD)');
// DEFINE('_JGSE_SUBIFD_EXIFINTEROPERABILITYOFFSET_DESCRIPTION','');
DEFINE('_JGSE_SUBIFD_FOCALPLANEXRESOLUTION','Focal Plane X Resolution');
DEFINE('_JGSE_SUBIFD_FOCALPLANEXRESOLUTION_DESCRIPTION','Indicates the number of pixels in the image width (X) direction per FocalPlaneResolutionUnit on the camera focal plane.');
DEFINE('_JGSE_SUBIFD_FOCALPLANEYRESOLUTION','Focal Plane Y Resolution');
DEFINE('_JGSE_SUBIFD_FOCALPLANEYRESOLUTION_DESCRIPTION','Indicates the number of pixels in the image height (Y) direction per FocalPlaneResolutionUnit on t he camera focal plane.');
DEFINE('_JGSE_SUBIFD_FOCALPLANEXYRESOLUTION_UNIT','Pixel per Focal Plane Resolution Unit');
DEFINE('_JGSE_SUBIFD_FOCALPLANERESOLUTIONUNIT','Focal Plane Resolution Unit');
DEFINE('_JGSE_SUBIFD_FOCALPLANERESOLUTIONUNIT_DESCRIPTION','Indicates the unit for measuring FocalPlaneXResolution and FocalPlaneYResolution.');
DEFINE('_JGSE_SUBIFD_FOCALPLANERESOLUTIONUNIT_1','No unit');
DEFINE('_JGSE_SUBIFD_FOCALPLANERESOLUTIONUNIT_2','Inches');
DEFINE('_JGSE_SUBIFD_FOCALPLANERESOLUTIONUNIT_3','Centimetres');
DEFINE('_JGSE_SUBIFD_EXPOSUREINDEX','Exposure Index');
DEFINE('_JGSE_SUBIFD_EXPOSUREINDEX_DESCRIPTION','Indicates the exposure index selected on the camera or input device at the time the image is captured.');
DEFINE('_JGSE_SUBIFD_SENSINGMETHOD','Sensing Method');
DEFINE('_JGSE_SUBIFD_SENSINGMETHOD_DESCRIPTION','Shows type of image sensor unit.');
DEFINE('_JGSE_SUBIFD_SENSINGMETHOD_1','Not defined');
DEFINE('_JGSE_SUBIFD_SENSINGMETHOD_2','One-chip color area sensor');
DEFINE('_JGSE_SUBIFD_SENSINGMETHOD_3','Two-chip color area sensor');
DEFINE('_JGSE_SUBIFD_SENSINGMETHOD_4','Three-chip color area sensor');
DEFINE('_JGSE_SUBIFD_SENSINGMETHOD_5','Color sequential area sensor');
DEFINE('_JGSE_SUBIFD_SENSINGMETHOD_7','Trilinear sensor');
DEFINE('_JGSE_SUBIFD_SENSINGMETHOD_8','Color sequential linear sensor');
DEFINE('_JGSE_SUBIFD_FILESOURCE','File Source');
DEFINE('_JGSE_SUBIFD_FILESOURCE_DESCRIPTION','');
DEFINE('_JGSE_SUBIFD_FILESOURCE_3','Digital Still Camera');
DEFINE('_JGSE_SUBIFD_FILESOURCE_UNKNOWN','Source unknown');
DEFINE('_JGSE_SUBIFD_SCENETYPE','Scene Type');
DEFINE('_JGSE_SUBIFD_SCENETYPE_DESCRIPTION','');
DEFINE('_JGSE_SUBIFD_SCENETYPE_1','A directly photographed image');
DEFINE('_JGSE_SUBIFD_SCENETYPE_UNKNOWN','Type unknown');
DEFINE('_JGSE_SUBIFD_EXPOSUREMODE','Exposure Mode');
DEFINE('_JGSE_SUBIFD_EXPOSUREMODE_DESCRIPTION','Indicates the exposure mode selected on the camera or input device at the time the image is captured.');
DEFINE('_JGSE_SUBIFD_EXPOSUREMODE_0','Auto Exposure');
DEFINE('_JGSE_SUBIFD_EXPOSUREMODE_1','Manual Exposure');
DEFINE('_JGSE_SUBIFD_EXPOSUREMODE_2','Auto Bracket');
DEFINE('_JGSE_SUBIFD_WHITEBALANCE','White Balance');
DEFINE('_JGSE_SUBIFD_WHITEBALANCE_DESCRIPTION','This tag indicates the white balance mode set when the image was shot.');
DEFINE('_JGSE_SUBIFD_WHITEBALANCE_0','Auto');
DEFINE('_JGSE_SUBIFD_WHITEBALANCE_1','Manual');
DEFINE('_JGSE_SUBIFD_DIGITALZOOMRATIO','Digital Zoom Ratio');
DEFINE('_JGSE_SUBIFD_DIGITALZOOMRATIO_DESCRIPTION','This tag indicates the digital zoom ratio when the image was shot.');
DEFINE('_JGSE_SUBIFD_FOCALLENGTHIN35MMFILM','Equivalent Focal Length In 35mm Film');
DEFINE('_JGSE_SUBIFD_FOCALLENGTHIN35MMFILM_DESCRIPTION','This tag indicates the equivalent focal length assuming a 35mm film camera, in mm.');
DEFINE('_JGSE_SUBIFD_FOCALLENGTHIN35MMFILM_UNIT','mm');
DEFINE('_JGSE_SUBIFD_SCENECAPTURETYPE','Scene Capture Type');
DEFINE('_JGSE_SUBIFD_SCENECAPTURETYPE_DESCRIPTION','This tag indicates the type of scene that was shot. It can also be used to record the mode in which the image was shot. Note that this differs from the scene type (SceneType) tag.');
DEFINE('_JGSE_SUBIFD_SCENECAPTURETYPE_0','Standard');
DEFINE('_JGSE_SUBIFD_SCENECAPTURETYPE_1','Landscape');
DEFINE('_JGSE_SUBIFD_SCENECAPTURETYPE_2','Portrait');
DEFINE('_JGSE_SUBIFD_SCENECAPTURETYPE_3','Night scene');
DEFINE('_JGSE_SUBIFD_GAINCONTROL','Gain Control');
DEFINE('_JGSE_SUBIFD_GAINCONTROL_DESCRIPTION','This tag indicates the degree of overall image gain adjustment.');
DEFINE('_JGSE_SUBIFD_GAINCONTROL_0','None');
DEFINE('_JGSE_SUBIFD_GAINCONTROL_1','Low gain up');
DEFINE('_JGSE_SUBIFD_GAINCONTROL_2','High gain up');
DEFINE('_JGSE_SUBIFD_GAINCONTROL_3','Low gain down');
DEFINE('_JGSE_SUBIFD_GAINCONTROL_4','High gain down');
DEFINE('_JGSE_SUBIFD_CONTRAST','Contrast');
DEFINE('_JGSE_SUBIFD_CONTRAST_DESCRIPTION','This tag indicates the direction of contrast processing applied by the camera when the image was shot.');
DEFINE('_JGSE_SUBIFD_CONTRAST_0','Normal');
DEFINE('_JGSE_SUBIFD_CONTRAST_1','Soft');
DEFINE('_JGSE_SUBIFD_CONTRAST_2','Hard');
DEFINE('_JGSE_SUBIFD_SATURATION','Saturation');
DEFINE('_JGSE_SUBIFD_SATURATION_DESCRIPTION','This tag indicates the direction of saturation processing applied by the camera when the image was shot.');
DEFINE('_JGSE_SUBIFD_SATURATION_0','Normal');
DEFINE('_JGSE_SUBIFD_SATURATION_1','low Saturation');
DEFINE('_JGSE_SUBIFD_SATURATION_2','high Saturation');
DEFINE('_JGSE_SUBIFD_SHARPNESS','Sharpness');
DEFINE('_JGSE_SUBIFD_SHARPNESS_DESCRIPTION','This tag indicates the direction of sharpness processing applied by the camera when the image was shot.');
DEFINE('_JGSE_SUBIFD_SHARPNESS_0','Normal');
DEFINE('_JGSE_SUBIFD_SHARPNESS_1','Soft');
DEFINE('_JGSE_SUBIFD_SHARPNESS_2','Hard');
// DEFINE('_JGSE_SUBIFD_DEVICESETTINGDESCRIPTION','');
// DEFINE('_JGSE_SUBIFD_DEVICESETTINGDESCRIPTION_DESCRIPTION','');
DEFINE('_JGSE_SUBIFD_SUBJECTDISTANCERANGE','Subject Distance Range');
DEFINE('_JGSE_SUBIFD_SUBJECTDISTANCERANGE_DESCRIPTION','This tag indicates the distance to the subject.');
DEFINE('_JGSE_SUBIFD_SUBJECTDISTANCERANGE_0','Unknown');
DEFINE('_JGSE_SUBIFD_SUBJECTDISTANCERANGE_1','Macro');
DEFINE('_JGSE_SUBIFD_SUBJECTDISTANCERANGE_2','Close view');
DEFINE('_JGSE_SUBIFD_SUBJECTDISTANCERANGE_3','Distant view');
// DEFINE('_JGSE_SUBIFD_IMAGEUNIQUEID','');
// DEFINE('_JGSE_SUBIFD_IMAGEUNIQUEID_DESCRIPTION','');

// GPS-Tags
// DEFINE('_JGSE_GPS_GPSVERSIONID','GPS Tag Version');
// DEFINE('_JGSE_GPS_GPSVERSIONID_DESCRIPTION','Indicates the version of GPSInfoIFD.');
DEFINE('_JGSE_GPS_GPSVERSIONID_2_2_0_0','Version 2.2');
DEFINE('_JGSE_GPS_GPSLATITUDEREF','North or South Latitude');
DEFINE('_JGSE_GPS_GPSLATITUDEREF_DESCRIPTION','Indicates whether the latitude is north or south latitude.');
DEFINE('_JGSE_GPS_GPSLATITUDEREF_N','North latitude');
DEFINE('_JGSE_GPS_GPSLATITUDEREF_S','South latitude');
DEFINE('_JGSE_GPS_GPSLATITUDE','Latitude');
DEFINE('_JGSE_GPS_GPSLATITUDE_DESCRIPTION','Indicates the latitude.');
DEFINE('_JGSE_GPS_GPSLONGITUDEREF','East or West Longitude');
DEFINE('_JGSE_GPS_GPSLONGITUDEREF_E','East longitude');
DEFINE('_JGSE_GPS_GPSLONGITUDEREF_W','West longitude');
DEFINE('_JGSE_GPS_GPSLONGITUDEREF_DESCRIPTION','Indicates whether the longitude is east or west longitude.');
DEFINE('_JGSE_GPS_GPSLONGITUDE','Longitude');
DEFINE('_JGSE_GPS_GPSLONGITUDE_DESCRIPTION','Indicates the longitude.');
DEFINE('_JGSE_GPS_GPSALTITUDEREF','Altitude Reference');
DEFINE('_JGSE_GPS_GPSALTITUDEREF_DESCRIPTION','Indicates the altitude used as the reference altitude.');
DEFINE('_JGSE_GPS_GPSALTITUDEREF_0','Sea level');
DEFINE('_JGSE_GPS_GPSALTITUDEREF_1','Sea level reference (negative value)');
DEFINE('_JGSE_GPS_GPSALTITUDE','Altitude');
DEFINE('_JGSE_GPS_GPSALTITUDE_DESCRIPTION','Indicates the altitude based on the reference in GPSAltitudeRef.');
DEFINE('_JGSE_GPS_GPSALTITUDE_UNIT','metres');

?>
