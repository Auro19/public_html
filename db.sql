-- MySQL dump 10.13  Distrib 5.1.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: miguel
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12.7

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `jos_avr_player`
--

DROP TABLE IF EXISTS `jos_avr_player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_avr_player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '0',
  `minw` int(11) NOT NULL DEFAULT '0',
  `minh` int(11) NOT NULL DEFAULT '0',
  `isjw` int(1) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL,
  `code` mediumtext NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_avr_player`
--

LOCK TABLES `jos_avr_player` WRITE;
/*!40000 ALTER TABLE `jos_avr_player` DISABLE KEYS */;
INSERT INTO `jos_avr_player` VALUES (1,0,0,0,1,'flv','<script type=\"text/javascript\">\nswfobject.embedSWF(\'@RLOC@mediaplayer.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'@FLASHVER@\',@XPINST@,\n{file:\'@MURL@\',width:\'@WIDTH@\',height:\'@HEIGHT@\',@IF(ENABLEJS)@javascriptid:\'p_@DIVID@\',\n@/IF@@IFS(PLTHUMBS)@thumbsinplaylist:\'@PLTHUMBS@\',\n@/IFS@@IF(AUTOSCROLL)@autoscroll:\'@AUTOSCROLL@\',\n@/IF@@IFS(TYPE)@type:\'@TYPE@\',\n@/IFS@@IFS(VOLUME)@volume:\'@VOLUME@\',\n@/IFS@@IFS(CFG)@config:\'@CFG@\',\n@/IFS@@IFS(LINK)@link:\'@LINK@\',\n@/IFS@@IFS(IMG)@image:\'@IMG@\',\n@/IFS@@IFS(LINK)@linkfromdisplay:\'@LINKFROMDISPLAY@\',\n@/IFS@@IFS(LINK)@linktarget:\'@LINKTARGET@\',\n@/IFS@@IFS(REPEAT)@repeat:\'@REPEAT@\',\n@/IFS@@IFS(SHUFFLE)@shuffle:\'@SHUFFLE@\',\n@/IFS@@IFS(RECURL)@recommendations:\'@RECURL@\',\n@/IFS@@IFS(DISPLAYWIDTH)@displaywidth:\'@DISPLAYWIDTH@\',\n@/IFS@@IFS(DISPLAYHEIGHT)@displayheight:\'@DISPLAYHEIGHT@\',\n@/IFS@@IFS(LOGO)@logo:\'@LOGO@\',\n@/IFS@@IFS(CAPTIONS)@captions:\'@CAPTIONS@\',\n@/IFS@@IFS(USECAPTIONS)@usecaptions:\'@USECAPTIONS@\',\n@/IFS@@IFS(SEARCHLINK)@searchlink:\'@SEARCHLINK@\',\n@/IFS@showeq:\'@SHOWEQ@\',searchbar:\'@SEARCHBAR@\',enablejs:\'@ENABLEJS@\',autostart:\'@AUTOSTART@\',showicons:\'@SHOWICONS@\',@IF(!SHOWNAV)@shownavigation:\'@SHOWNAV@\',@/IF@@IF(SHOWNAV)@showstop:\'@SHOWSTOP@\',showdigits:\'@SHOWDIGITS@\',\nshowdownload:\'@SHOWDOWNLOAD@\',@/IF@usefullscreen:\'@USEFULLSCREEN@\',backcolor:\'@PBGCOLOR@\',frontcolor:\'@PFGCOLOR@\',\nlightcolor:\'@PHICOLOR@\',screencolor:\'@PSCCOLOR@\',overstretch:\'@STRETCH@\'}\n,{allowscriptaccess:\'always\',seamlesstabbing:\'true\',allowfullscreen:\'true\',wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},\n{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','JW Media Player'),(2,0,0,0,0,'wmv','<object classid=\"CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6\"\n type=\"application/x-oleobject\" style=\"width: @WIDTH@px; height: @HEIGHT@px;\">\n<param name=\"URL\" value=\"@MURL@\" />\n<param name=\"stretchToFit\" value=\"1\" />\n<param name=\"showControls\" value=\"1\" />\n<param name=\"showStatusBar\" value=\"0\" />\n<param name=\"animationAtStart\" value=\"1\" />\n<param name=\"autoStart\" value=\"@AUTOSTART!d@\" />\n<param name=\"enableFullScreenControls\" value=\"@USEFULLSCREEN!d@\" \n/><embed src=\"@MURL@\" style=\"width: @WIDTH@px; height: @HEIGHT@px;\" autoStart=\"@AUTOSTART!d@\" animationAtStart=\"1\" enableFullScreenControls=\"@USEFULLSCREEN!d@\" type=\"application/x-mplayer2\"/></embed></object>','Windows Media Player'),(3,0,0,0,0,'mov','<object codebase=\"http://www.apple.com/qtactivex/qtplugin.cab\" classid=\"clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B\" style=\"width: @WIDTH@px; height: @HEIGHT@px;\"><param name=\"src\" value=\"@MURL@\" /><param name=\"controller\" value=\"True\" /><param name=\"cache\" value=\"False\" /><param name=\"autoplay\" value=\"@AUTOSTART@\" /><param name=\"kioskmode\" value=\"False\" /><param name=\"scale\" value=\"tofit\" /><embed src=\"@MURL@\" pluginspage=\"http://www.apple.com/quicktime/download/\" scale=\"tofit\" kioskmode=\"False\" qtsrc=\"@MURL@\" cache=\"False\" style=\"width: @WIDTH@px; height: @HEIGHT@px;\" controller=\"True\" type=\"video/quicktime\" autoplay=\"@AUTOSTART@\" /></object>','QuickTime Player'),(4,0,0,0,0,'rm','<object classid=\"clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA\" style=\"width: @WIDTH@px; height: @HEIGHT@px;\"><param name=\"controls\" value=\"ControlPanel\" /><param name=\"autostart\" value=\"@AUTOSTART!d@\" /><param name=\"src\" value=\"@MURL@\" /><embed src=\"@MURL@\" type=\"audio/x-pn-realaudio-plugin\" style=\"width: @WIDTH@px; height: @HEIGHT@px;\" controls=\"ControlPanel\" autostart=\"@AUTOSTART!d@\" /></object>','Real Media Player'),(5,0,0,0,0,'divx','<object classid=\"CLSID:67DABFBF-D0AB-41fa-9C46-CC0F21721616\"\ncodebase=\"http://download.divx.com/webplayer/stage6/windows/AutoDLDivXWebPlayerInstaller.cab\" \n type=\"application/x-oleobject\" style=\"width: @WIDTH@px; height: @HEIGHT@px;\">\n<param name=\"src\" value=\"@MURL@\" />\n<param name=\"custommode\" value=\"Stage6\" />\n<param name=\"showControls\" value=\"1\" />\n<param name=\"showpostplaybackad\" value=\"false\" />\n<param name=\"allowContextMenu\" value=\"@MENU@\" />\n@IFS(IMG)@<param name=\"previewImage\" value=\"@IMG@\" />\n@/IFS@<param name=\"autoplay\" value=\"@AUTOSTART@\" \n/><embed type=\"video/divx\" src=\"@MURL@\" style=\"width: @WIDTH@px; height: @HEIGHT@px;\" pluginspage=\"http://go.divx.com/plugin/download/\" showpostplaybackad=\"false\" custommode=\"Stage6\" autoplay=\"@AUTOSTART@\" allowContextMenu=\"@MENU@\"@@IFS(IMG)@ previewImage=\"@IMG@\"@/IFS@/></object>','DivX Webplayer'),(6,0,0,0,0,'6cn','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://6.cn/player.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{vid:\'@CODE@\',flag:\'1\'},{allowfullscreen:\'true\',wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','6Cn.com original player'),(7,0,0,0,0,'biku','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.biku.com/opus/player.swf?VideoID=@CODE@&embed=true&autoStart=@AUTOSTART@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',menu:\'@MENU@\',bgcolor:\'@BGCOLOR@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Biku.com original player'),(8,0,0,0,0,'bofunk','<script type=\"text/javascript\">\nswfobject.embedSWF(\'@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{allowfullscreen:\'true\',wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Bofunk.com original player'),(9,0,0,0,0,'break','<script type=\"text/javascript\">\nswfobject.embedSWF(\'@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Break.com original player'),(10,0,0,0,0,'clipfish','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.clipfish.de/videoplayer.swf?videoid=@CODE@&r=1\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',allowfullscreen:\'true\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','ClipFish.de original player'),(11,0,0,0,0,'collegehumor','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.collegehumor.com/moogaloop/moogaloop.swf?clip_id=@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','CollegeHumor original player'),(12,0,420,340,0,'currenttv','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://current.com/e/@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','CurrentTV original player'),(13,0,0,0,0,'dmotion','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.dailymotion.com/swf/@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'8.0.0\',@XPINST@,\n{v3:\'1\',related:\'0\',autoPlay:\'@AUTOSTART!d@\',colors:\'background:DDDDDD;glow:FFFFFF;foreground:333333;special:FFC300;\'},{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',quality:\'high\',allowScriptAccess:\'allways\',allowfullscreen:\'true\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','DailyMotion.com original player'),(14,0,0,0,0,'vidiac','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.vidiac.com/vidiac.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{name:\'ePlayer\',video:\'@CODE@\'},{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Vidiac.com original player'),(15,0,0,0,0,'gametrailers','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.gametrailers.com/remote_wrap.php?mid=@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',allowfullscreen:\'true\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','GameTrailers.com original player'),(16,0,0,0,0,'google','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://video.google.com/googleplayer.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{@IF(AUTOSTART)@autoPlay:\'true\',@/IF@docId:\'@CODE@\',hl:\'@LANG@\'},{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Google Video original player'),(17,0,0,0,0,'spike','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.spike.com/efp\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{flvBaseClip:\'@CODE@\'},{name:\'efp\',wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Spike.com original player (previously iFilm.com)'),(18,0,0,0,0,'jumpcut','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.jumpcut.com/media/flash/jump.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{asset_type:\'movie\',asset_id:\'@CODE@\',eb:\'1\'},{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','JumpCut.com original player'),(19,0,0,0,0,'mega','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://wwwstatic.megavideo.com/tmp_mvplayer.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'8.0.0\',@XPINST@,\n{waitingtime:\'0\',flv:\'@CODE@\',k:\'@RRESA@\',poker:\'0\',v:\'@OCODE@\',rel_again:\'Play again\',rel_other:\'Related videos\',u:\'\',user:\'\',from:\'from:\',views:\'views\',vid_time:\'@RRESB@\',vid_name:\'\',videoname:\'\'},{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',quality:\'high\',allowScriptAccess:\'sameDomain\',allowFullScreen:\'@USEFULLSCREEN@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','MegaVideo.com original player'),(20,0,0,0,0,'metacafe','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.metacafe.com/fplayer/@CODE@.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{altServerURL:\'http://www.metacafe.com\',playerVars:\'showStats=no|autoPlay=no|videoTitle=\'},{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','MetaCafe.com original player'),(21,0,0,0,0,'mofile','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://tv.mofile.com/cn/xplayer.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{v:\'@CODE@\',autoplay:\'0\'},{wmode:\'@WMODE@\',allowScriptAccess:\'always\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Mofile.com original player'),(22,0,0,0,0,'myvideo','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.myvideo.de/movie/@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','MyVideo.com original player'),(23,0,0,0,0,'quxiu','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.quxiu.com/photo/swf/swfobj.swf?id=@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Quixu.com original player'),(24,0,0,0,0,'revver','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://flash.revver.com/player/1.0/player.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{mediaId:\'@CODE@\',javascriptContext:\'true\',skinURL:\'http://flash.revver.com/player/1.0/skins/Default_Raster.swf\',skinImgURL:\'http://flash.revver.com/player/1.0/skins/night_skin.png\',actionBarSkinURL:\'http://flash.revver.com/player/1.0/skins/DefaultNavBarSkin.swf\',resizeVideo:\'true\'},\n{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Revver.com original player'),(25,0,0,0,0,'seehaha','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.seehaha.com/flash/playvid2.swf?vidID=@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','SeeHaha.com original player'),(26,0,0,0,0,'sevenload','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://de.sevenload.com/pl/@CODE@/503x403/swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',allowfullscreen:\'true\',allowscriptaccess:\'always\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'\n},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','SevenLoad.com original player'),(27,0,0,0,0,'stickam','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.stickam.com/flashVarMediaPlayer/@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',allowfullscreen:\'true\',scale:\'noscale\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','StickAm.com original player'),(28,0,0,0,0,'streetfire','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://videos.streetfire.net/vidiac.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{name:\'ePlayer\',video:\'@CODE@\'},{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','StreetFire original player'),(29,0,432,285,0,'ted','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.ted.com/swf/videoplayer.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'8.0.0\',@XPINST@,\n{jsonStr:\'@CODE@\',flashID:\'swfVideoPlayer\'},{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',quality:\'high\',allowScriptAccess:\'always\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','TED.com original player'),(30,0,0,0,0,'ted2','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://static.videoegg.com/ted/flash/loader.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'8.0.0\',@XPINST@,\n{file:\'@CODE@\',autoPlay:\'@AUTOSTART@\',allowFullscreen:\'@USEFULLSCREEN@\',forcePlay:\'false\',logo:\'\',fullscreenURL:\'http://static.videoegg.com/ted/flash/fullscreen.html\'},{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',quality:\'high\',allowScriptAccess:\'always\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','TED.com alternative player'),(31,0,0,0,0,'tudou','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.tudou.com/v/@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Tudou.com original player'),(32,0,0,0,0,'uume','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.uume.com/v/@CODE@_UUME\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',allowfullscreen:\'true\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Uume.com original player'),(33,0,0,0,0,'vimeo','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.vimeo.com/moogaloop.swf?clip_id=@CODE@&server=www.vimeo.com&show_title=1&show_byline=1&show_portrait=0&autoplay=@AUTOSTART!d@&fullscreen=@USEFULLSCREEN!d@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',allowfullscreen:\'true\',scale:\'showall\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Vimeo.com original player'),(34,0,0,0,0,'virb','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.virb.com/external/video/@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',salign:\'tl\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Virb.com original player'),(35,0,0,0,0,'wangyou','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://v.wangyou.com/images/x_player.swf?id=@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\nfalse,{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','WangYou.com original player'),(36,0,0,0,0,'yahoo','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://d.yimg.com/static.video.yahoo.com/yep/YV_YEP.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{onsite:\'0\',embed:\'1\',id:\'@CODE@\'},{allowfullscreen:\'@USEFULLSCREEN@\',wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Yahoo video original player'),(37,0,0,0,0,'youtube','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.youtube.com/v/@CODE@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{autoplay:\'@AUTOSTART!d@\',color1:\'@PBGCOLOR@\',color2:\'@PHICOLOR@\',rel:\'@YTREL!d@\',egm:\'@YTEGM!d@\',border:\'@YTBORDER!d@\',loop:\'@YTLOOP!d@\'},{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','YouTube original player'),(38,0,0,0,0,'jwwmv','<script type=\"text/javascript\">\nnew jeroenwijering.Player($(\'@DIVID@\'),\'@RLOC@wmvplayer.xaml\',\n{file:\'@MURL@\',width:\'@WIDTH@\',height:\'@HEIGHT@\',@IF(ENABLEJS)@javascriptid:\'p_@DIVID@\',\n@/IF@@IFS(PLTHUMBS)@thumbsinplaylist:\'@PLTHUMBS@\',\n@/IFS@@IF(AUTOSCROLL)@autoscroll:\'@AUTOSCROLL@\',\n@/IF@@IFS(TYPE)@type:\'@TYPE@\',\n@/IFS@@IFS(CFG)@config:\'@CFG@\',\n@/IFS@@IFS(LINK)@link:\'@LINK@\',\n@/IFS@@IFS(IMG)@image:\'@IMG@\',\n@/IFS@@IFS(LINK)@linkfromdisplay:\'@LINKFROMDISPLAY@\',\n@/IFS@@IFS(LINK)@linktarget:\'@LINKTARGET@\',\n@/IFS@@IFS(REPEAT)@repeat:\'@REPEAT@\',\n@/IFS@@IFS(SHUFFLE)@shuffle:\'@SHUFFLE@\',\n@/IFS@@IFS(RECURL)@recommendations:\'@RECURL@\',\n@/IFS@@IFS(DISPLAYWIDTH)@displaywidth:\'@DISPLAYWIDTH@\',\n@/IFS@@IFS(DISPLAYHEIGHT)@displayheight:\'@DISPLAYHEIGHT@\',\n@/IFS@@IFS(LOGO)@logo:\'@LOGO@\',\n@/IFS@@IFS(SEARCHLINK)@searchlink:\'@SEARCHLINK@\',\n@/IFS@showeq:\'@SHOWEQ@\',searchbar:\'@SEARCHBAR@\',enablejs:\'@ENABLEJS@\',autostart:\'@AUTOSTART@\',showicons:\'@SHOWICONS@\',@IF(!SHOWNAV)@shownavigation:\'@SHOWNAV@\',@/IF@@IF(SHOWNAV)@showstop:\'@SHOWSTOP@\',showdigits:\'@SHOWDIGITS@\',\nshowdownload:\'@SHOWDOWNLOAD@\',@/IF@usefullscreen:\'@USEFULLSCREEN@\',backcolor:\'@PBGCOLOR@\',frontcolor:\'@PFGCOLOR@\',\nlightcolor:\'@PHICOLOR@\',screencolor:\'@PSCCOLOR@\',overstretch:\'@STRETCH@\'}\n);\n</script>','JW WMV Player (needs MS-SilverLight)'),(39,0,0,0,0,'swf','<script type=\"text/javascript\">\nswfobject.embedSWF(\'@MURL@\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'@FLASHVER@\',@XPINST@,\nfalse,{allowscriptaccess:\'always\',seamlesstabbing:\'true\',allowfullscreen:\'true\',wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',menu:\'@MENU@\'},\n{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Plain flash embedding (for flash animations)'),(40,0,0,0,0,'brightcove','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.brightcove.tv/playerswf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{initVideoId:\'@CODE@\',servicesURL:\'http://www.brightcove.tv\',\nviewerSecureGatewayURL:\'https://www.brightcove.tv\',\ncdnURL:\'http://admin.brightcove.com\',autoStart:\'@AUTOSTART@\'},\n{base:\'http://admin.brightcove.com\',\nwmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',allowFullScreen:\'true\',\nallowScriptAccess:\'always\',seamlesstabbing:\'false\',swLiveConnect:\'true\'\n,menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Brightcove.tv original player'),(41,0,0,0,0,'myshows','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://www.seehaha.com/flash/player.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'9.0.28\',@XPINST@,\n{vidFileName:\'@CODE@\'},\n{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',allowFullScreen:\'@USEFULLSCREEN@\',menu:\'@MENU@\'},{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Myshows.cn (previouslyly seehaha.com)'),(42,0,0,0,0,'blip','<script type=\"text/javascript\">\nswfobject.embedSWF(\'http://blip.tv/scripts/flash/showplayer.swf\',\'@DIVID@\',\'@WIDTH@\',\'@HEIGHT@\',\'@FLASHVER@\',@XPINST@,\n{file:\'http://blip.tv/rss/flash/@CODE@?referrer=blip.tv&source=1\',enablejs:\'true\',feedurl:\'http://WatchMojo.blip.tv/rss\',\nshowplayerpath:\'showplayerpath=http://blip.tv/scripts/flash/showplayer.swf\'},\n{wmode:\'@WMODE@\',bgcolor:\'@BGCOLOR@\',quality:\'high\',allowScriptAccess:\'sameDomain\',allowFullScreen:\'@USEFULLSCREEN@\',menu:\'@MENU@\'},\n{id:\'p_@DIVID@\',styleclass:\'@AVCSS@\'});\n</script>','Blip.tv original player');
/*!40000 ALTER TABLE `jos_avr_player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_avr_popup`
--

DROP TABLE IF EXISTS `jos_avr_popup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_avr_popup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `divid` varchar(255) NOT NULL,
  `code` mediumtext NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `wtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`,`divid`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_avr_popup`
--

LOCK TABLES `jos_avr_popup` WRITE;
/*!40000 ALTER TABLE `jos_avr_popup` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_avr_popup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_avr_ripper`
--

DROP TABLE IF EXISTS `jos_avr_ripper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_avr_ripper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '0',
  `flags` int(11) NOT NULL DEFAULT '0',
  `cindex` int(11) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL,
  `url` varchar(255) NOT NULL,
  `regex` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_avr_ripper`
--

LOCK TABLES `jos_avr_ripper` WRITE;
/*!40000 ALTER TABLE `jos_avr_ripper` DISABLE KEYS */;
INSERT INTO `jos_avr_ripper` VALUES (1,0,0,0,'6cn','http://6.cn/watch/@CODE@.html','pageMessage.evid\\s*=\\s*\'([^\']+)\'\\s*;','6CN.com'),(2,0,0,0,'bofunk','http://www.bofunk.com/video/@CODE@.html','<input\\stype=\'text\'\\svalue=\'<embed\\ssrc=\"([^\"]+)\"','Bofunk.com'),(3,0,0,0,'break','http://www.break.com/index/@CODE@.html','<param name=\"movie\" value=\"([^\"]+)\">','Break.com'),(4,0,0,0,'dropshots','http://www.dropshots.com/V1.0/Media.getList?appid=dropshots&username=@USER@&min_taken_date=@CODE@&passwordprotection=false&output=xml','<video>(.+)</video>','Dropshots.com'),(5,0,0,0,'mega','http://www.megavideo.com/?v=@CODE@','addVariable\\s*\\(\\s*\"flv\"\\s*,\\s*\"([^\"]+)\"[\\s\\S]*?addVariable\\s*\\(\\s*\"k\"\\s*,\\s*\"([^\"]+)\"[\\s\\S]*?addVariable\\s*\\(\\s*\"vid_time\"\\s*,\\s*\"([^\"]+)\"','MegaVideo.com'),(6,0,0,0,'ted','http://www.ted.com/index.php/talks/view/id/@CODE@','firstRun\\s*=\\s*\"([^\"]+)\"','TED.com'),(7,0,0,0,'ted2','http://www.ted.com/index.php/talks/view/id/@CODE@','paste-->.+&file=([^&]+).*</object>','TED.com (for alternate player)'),(8,0,0,0,'yahoo','http://video.yahoo.com/watch/@CODE@','addVariable\\s*\\(\\s*\"id\"\\s*,\\s*\"([^\"]+)\"','Yahoo Video'),(9,0,0,0,'streetfire','http://videos.streetfire.net/video/@CODE@.htm','_embedCodeID.*video=([\\dabcdef\\-]+)','StreetFire'),(10,0,0,0,'myshows','http://www.myshows.cn/myplayvideo.aspx?vid=@CODE@','vidFileName=([^\"]+)','Myshows.cn (previouslyly seehaha.com)'),(11,0,0,0,'virb','http://www.virb.com/@CODE@','external/video/([^&\"]+)','Virb.com'),(12,0,0,0,'blip','http://www.blip.tv/file/@CODE@','setPostsId\\s*\\(\\s*(\\d+)\\s*\\)','Blip.tv'),(13,0,0,0,'apple','http://www.apple.com/trailers/@CODE@','\'(http:\\/\\/movies\\.apple\\.com\\/.*?\\.mov)\'','Apple.com trailers');
/*!40000 ALTER TABLE `jos_avr_ripper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_avr_tags`
--

DROP TABLE IF EXISTS `jos_avr_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_avr_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '0',
  `player_id` int(11) NOT NULL,
  `ripper_id` int(11) NOT NULL DEFAULT '0',
  `local` int(1) NOT NULL DEFAULT '0',
  `plist` int(1) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL,
  `postreplace` varchar(255) NOT NULL DEFAULT '',
  `sampleregex` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `tag` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_avr_tags`
--

LOCK TABLES `jos_avr_tags` WRITE;
/*!40000 ALTER TABLE `jos_avr_tags` DISABLE KEYS */;
INSERT INTO `jos_avr_tags` VALUES (1,0,1,0,1,1,'flv','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.flv\";}','^(.+)\\.flv$','Local FLV'),(2,0,1,0,0,1,'flvremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.flv)$','Generic Remote FLV'),(3,0,1,0,1,1,'swf','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.swf\";}','^(.+)\\.swf$','Local SWF Video'),(4,0,1,0,0,1,'swfremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.swf)$','Generic Remote SWF Video'),(5,0,1,0,1,1,'mp3','a:3:{s:7:\"@WIDTH@\";s:8:\"@AWIDTH@\";s:8:\"@HEIGHT@\";s:9:\"@AHEIGHT@\";s:6:\"@MURL@\";s:16:\"@ALOC@@CODE@.mp3\";}','^(.+)\\.mp3$','Local MP3'),(6,0,1,0,0,1,'mp3remote','a:3:{s:7:\"@WIDTH@\";s:8:\"@AWIDTH@\";s:8:\"@HEIGHT@\";s:9:\"@AHEIGHT@\";s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.mp3)$','Generic Remote MP3'),(7,0,1,0,1,1,'mp4-flv','a:2:{s:6:\"@TYPE@\";s:3:\"flv\";s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.mp4\";}','^(.+)\\.mp4$','Local MP4 (JW Media Player)'),(8,0,1,0,0,1,'mp4-flvremote','a:4:{s:7:\"@WIDTH@\";s:7:\"@WIDTH@\";s:8:\"@HEIGHT@\";s:8:\"@HEIGHT@\";s:6:\"@TYPE@\";s:3:\"flv\";s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.mp4)$','Generic Remote MP4 (JW Media Player)'),(9,0,1,0,1,1,'m4v','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.m4v\";}','^(.+)\\.m4v$','Local M4V'),(10,0,1,0,0,1,'m4vremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.m4v)$','Generic Remote M4V'),(11,0,1,0,1,1,'3gp','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.3gp\";}','^(.+)\\.3gp$','Local 3GP'),(12,0,1,0,0,1,'3gpremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.3gp)$','Generic Remote 3GP'),(13,0,1,0,1,1,'rbs','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.rbs\";}','^(.+)\\.rbs$','Local RBS'),(14,0,1,0,0,1,'rbsremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.rbs)$','Generic Remote RBS'),(15,0,1,0,1,0,'auto','a:1:{s:6:\"@MURL@\";s:12:\"@VLOC@@CODE@\";}','^(.+\\.xml)$','Local Playlist'),(16,0,1,0,0,0,'autoremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.xml)$','Generic Remote Playlist'),(17,0,2,0,1,0,'wmv','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.wmv\";}','^(.+)\\.wmv$','Local WMV'),(18,0,2,0,0,0,'wmvremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.wmv)$','Generic Remote WMV'),(19,0,2,0,1,0,'wma','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.wma\";}','^(.+)\\.wma$','Local WMA'),(20,0,2,0,0,0,'wmaremote','a:3:{s:7:\"@WIDTH@\";s:8:\"@AWIDTH@\";s:8:\"@HEIGHT@\";s:9:\"@AHEIGHT@\";s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.wma)$','Generic Remote WMA'),(21,0,2,0,1,0,'avi','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.avi\";}','^(.+)\\.avi$','Local AVI'),(22,0,2,0,0,0,'aviremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.avi)$','Generic Remote AVI'),(23,0,2,0,1,0,'mpg','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.mpg\";}','^(.+)\\.mpg$','Local MPG'),(24,0,2,0,0,0,'mpgremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.mpg)$','Generic Remote MPG'),(25,0,2,0,1,0,'mpeg','a:1:{s:6:\"@MURL@\";s:17:\"@VLOC@@CODE@.mpeg\";}','^(.+)\\.mpeg$','Local MPEG'),(26,0,2,0,0,0,'mpegremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.mpeg)$','Generic Remote MPEG'),(27,0,3,0,1,0,'mov','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.mov\";}','^(.+)\\.mov$','Local MOV (QuickTime)'),(28,0,3,0,0,0,'movremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.mov)$','Generic Remote MOV (QuickTime)'),(29,0,3,0,1,0,'mp4','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.mp4\";}','^(.+)\\.mp4','Local MP4 (QuickTime)'),(30,0,3,0,0,0,'mp4remote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.mp4)$','Generic Remote MP4 (QuickTime)'),(31,0,4,0,1,0,'rm','a:1:{s:6:\"@MURL@\";s:15:\"@VLOC@@CODE@.rm\";}','^(.+)\\.rm$','Local RM (RealMedia)'),(32,0,4,0,2,0,'rmremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.rm)$','Generic Remote RM (RealMedia)'),(33,0,4,0,1,0,'ram','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.ram\";}','^(.+)\\.ram$','Local RAM (RealMedia)'),(34,0,4,0,0,0,'ramremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.ram)$','Generic Remote RAM (RealMedia)'),(35,0,5,0,1,0,'divx','a:1:{s:6:\"@MURL@\";s:17:\"@VLOC@@CODE@.divx\";}','^(.+)\\.divx','Local DivX'),(36,0,5,0,0,0,'divxremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.divx)$','Generic Remote DivX'),(37,0,6,1,0,0,'6cn','','http:\\/\\/6\\.cn\\/watch\\/(\\d+)\\.html','6CN.com'),(38,0,7,0,0,0,'biku','','http:\\/\\/www\\.biku\\.com\\/opus\\/(\\d+)\\.html','Biku.com'),(39,0,8,2,0,0,'bofunk','','http:\\/\\/www.bofunk.com\\/video\\/(\\d+\\/[^\\.]+)\\.html$','Bofunk.com'),(40,0,9,3,0,0,'break','','http:\\/\\/www\\.break\\.com\\/index\\/(.*)\\.html$','Break.com'),(41,0,10,0,0,0,'clipfish','','http:\\/\\/www\\.clipfish\\.de\\/player\\.php\\?videoid=(.+)','ClipFish.de'),(42,0,11,0,0,0,'collegehumor','','http:\\/\\/www\\.collegehumor\\.com\\/video:(\\d+)','College Humor'),(43,0,12,0,0,0,'currenttv','','http:\\/\\/current\\.com\\/items\\/(\\d+)_.*','Current-TV'),(44,0,13,0,0,0,'dmotion','','http:\\/\\/www\\.dailymotion\\.com\\/.*video\\/([^_]+)_[^\\/]+$','DailyMotion.com'),(45,0,1,4,0,0,'dropshots','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','','Dropshots.com'),(46,0,14,0,0,0,'freevideoblog','','http:\\/\\/www\\.vidiac\\.com\\/video\\/([\\dabcdef\\-]+)\\.htm$','Vidiac.com (previously FreeVideoBlog)'),(47,0,15,0,0,0,'gametrailers','','http:\\/\\/www\\.gametrailers\\.com\\/player\\/(\\d+)\\.html$','GameTrailers'),(48,0,16,0,0,0,'google','a:1:{s:6:\"@LANG@\";s:2:\"en\";}','http:\\/\\/video\\.google\\.com\\/videoplay\\?docid=(-{0,1}\\d+)','Google Video (international)'),(49,0,16,0,0,0,'google.co.uk','a:1:{s:6:\"@LANG@\";s:5:\"en-GB\";}','http:\\/\\/video\\.google\\.co\\.uk\\/videoplay\\?docid=(-{0,1}\\d+)$','Google Video (UK)'),(50,0,16,0,0,0,'google.com.au','a:1:{s:6:\"@LANG@\";s:5:\"en-AU\";}','http:\\/\\/video\\.google\\.com\\.au\\/videoplay\\?docid=(-{0,1}\\d+)$','Google Video (Australia)'),(51,0,16,0,0,0,'google.de','a:1:{s:6:\"@LANG@\";s:2:\"de\";}','http:\\/\\/video\\.google\\.de\\/videoplay\\?docid=(-{0,1}\\d+)$','Google Video (Germany)'),(52,0,16,0,0,0,'google.es','a:1:{s:6:\"@LANG@\";s:2:\"es\";}','http:\\/\\/video\\.google\\.es\\/videoplay\\?docid=(-{0,1}\\d+)$','Google Video (Spain)'),(53,0,16,0,0,0,'google.fr','a:1:{s:6:\"@LANG@\";s:2:\"fr\";}','http:\\/\\/video\\.google\\.fr\\/videoplay\\?docid=(-{0,1}\\d+)$','Google Video (France)'),(54,0,16,0,0,0,'google.it','a:1:{s:6:\"@LANG@\";s:2:\"it\";}','http:\\/\\/video\\.google\\.it\\/videoplay\\?docid=(-{0,1}\\d+)$','Google Video (Italy)'),(55,0,16,0,0,0,'google.nl','a:1:{s:6:\"@LANG@\";s:2:\"nl\";}','http:\\/\\/video\\.google\\.nl\\/videoplay\\?docid=(-{0,1}\\d+)$','Google Video (Netherlands)'),(56,0,16,0,0,0,'google.pl','a:1:{s:6:\"@LANG@\";s:2:\"pl\";}','http:\\/\\/video\\.google\\.pl\\/videoplay\\?docid=(-{0,1}\\d+)$','Google Video (Poland)'),(57,0,17,0,0,0,'ifilm','','','Spike.com (previously iFilm.com)'),(58,0,18,0,0,0,'jumpcut','','http:\\/\\/www\\.jumpcut\\.com\\/view\\/{0,1}\\?id=([A-F\\d]+)$','JumpCut.com'),(59,0,19,5,0,0,'mega','','http:\\/\\/www\\.megavideo\\.com\\/\\?v=(\\w+)$','MegaVideo.com'),(60,0,20,0,0,0,'metacafe','','http:\\/\\/www\\.metacafe\\.com\\/watch\\/(\\d+\\/[a-z_]+)\\/$','Metacafe.com'),(61,0,21,0,0,0,'mofile','','http:\\/\\/tv\\.mofile\\.com\\/([^\\/]+)\\/$','Mofile TV'),(62,0,22,0,0,0,'myvideo','','http:\\/\\/www\\.myvideo\\.de\\/watch\\/(\\d+)','MyVideo.de'),(63,0,23,0,0,0,'quxiu','','http:\\/\\/www\\.quxiu\\.com\\/video\\/play_(\\d+_\\d+)\\.htm$','Quixu.com'),(64,0,24,0,0,0,'revver','','http:\\/\\/www\\.revver\\.com\\/video\\/(\\d+)\\/[^\\/]+\\/$','Revver.com (using Flash)'),(65,0,25,0,0,0,'seehaha','','http:\\/\\/www\\.seehaha\\.com\\/play\\/(\\d+)$','SeeHaha.com'),(66,0,26,0,0,0,'sevenload','','http:\\/\\/de\\.sevenload\\.com\\/videos\\/([^\\/\\-]{1,7})[^\\/\\-]?[\\/\\-][^\\/]+$','SevenLoad.de'),(67,0,27,0,0,0,'stickam','','http:\\/\\/www\\.stickam\\.com\\/editMediaComment\\.do\\?method=load&mId=(\\d+)$','StickAm.com'),(68,0,28,0,0,0,'streetfire','','http:\\/\\/videos\\.streetfire\\.net\\/video\\/([\\dabcdef-]+)\\.htm$','StreetFire Videos (Old variant)'),(69,0,29,6,0,0,'ted','','http:\\/\\/www\\.ted\\.com\\/(?:index\\.php\\/)?talks\\/view\\/id\\/(\\d+)$','TED.com (Original Player)'),(70,0,30,7,0,0,'ted2','','http:\\/\\/www\\.ted\\.com\\/index\\.php\\/talks\\/view\\/id\\/(\\d+)$','TED.com (Foreign Player)'),(71,0,31,0,0,0,'tudou','','http:\\/\\/www\\.tudou\\.com\\/programs\\/view\\/([^\\/]+)\\/$','Tudou.com'),(72,0,32,0,0,0,'uume','','http:\\/\\/www\\.uume\\.com\\/play_([^\\/]+)$','Uume.com'),(73,0,33,0,0,0,'vimeo','','http:\\/\\/(?:www\\.)?vimeo\\.com\\/(\\d+)$','Vimeo'),(74,0,34,0,0,0,'virb','','','Virb.com'),(75,0,1,0,0,0,'wangyou','a:1:{s:6:\"@MURL@\";s:50:\"http://v.wangyou.com/playlistMedia.php%3Fid=@CODE@\";}','http:\\/\\/v\\.wangyou\\.com\\/p([^\\.]+)\\.html','WangYou.com'),(76,0,36,8,0,0,'yahoo','','http:\\/\\/video\\.yahoo\\.com\\/watch\\/(\\d+)\\/.*$','Yahoo Video'),(77,0,37,0,0,0,'youtube','','http:\\/\\/(?:\\w+\\.)?youtube\\.com\\/watch\\?.*v=([^&]+).*$','YouTube (Original Player)'),(78,0,1,0,0,1,'youtubejw','a:2:{s:10:\"@IFS(IMG)@\";s:59:\"image:\'http://i.ytimg.com/vi/@CODE@/default.jpg\',@IFS(IMG)@\";s:6:\"@MURL@\";s:41:\"http://www.youtube.com/watch%3Fv%3D@CODE@\";}','http:\\/\\/(?:\\w+\\.)?youtube\\.com\\/watch\\?.*v=([^&]+).*$','YouTube (JW Media Player)'),(81,0,3,0,0,0,'revver-mov','a:1:{s:6:\"@MURL@\";s:50:\"http://media.revver.com/broadcast/@CODE@/video.mov\";}','','Revver.com (using QuickTime)'),(82,0,28,9,0,0,'streetfire2','','http:\\/\\/videos\\.streetfire\\.net\\/video\\/([^\\/\\.]+)\\.htm$','StreetFire Videos'),(83,0,14,0,0,0,'vidiac','','http:\\/\\/www\\.vidiac\\.com\\/video\\/([\\dabcdef\\-]+)\\.htm$','Vidiac.com (previously FreeVideoBlog)'),(84,0,39,0,1,0,'flash','a:1:{s:6:\"@MURL@\";s:16:\"@VLOC@@CODE@.swf\";}','^(.+)\\.swf$','Plain local flash embedding (for flash animations)'),(85,0,39,0,0,0,'flashremote','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^(https{0,1}:\\/\\/.*\\.swf)$','Plain remote flash embedding (for flash animations)'),(86,0,17,0,0,0,'spike','','^http:\\/\\/www\\.spike\\.com\\/video\\/.*\\/(\\d+)$','Spike.com (previously iFilm.com)'),(87,0,40,0,0,0,'bcove','','^http:\\/\\/www\\.brightcove\\.tv\\/title\\.jsp\\?title=(\\d+).*$','Brightcove.tv'),(88,0,41,10,0,0,'myshows','','http:\\/\\/www\\.myshows\\.cn\\/myplayvideo\\.aspx\\?vid=(\\d+)','Myshows.cn (previouslyly seehaha.com)'),(89,0,34,11,0,0,'virb2','','http:\\/\\/www\\.virb\\.com\\/(.*)$','Virb.com'),(90,0,42,12,0,0,'blip','','^http:\\/\\/(?:www\\.)?blip\\.tv\\/file\\/(\\d+).*','Blip.tv'),(91,0,1,12,0,0,'blipjw','a:1:{s:6:\"@MURL@\";s:57:\"http://blip.tv/rss/flash/@CODE@?referrer=blip.tv&source=1\";}','^http:\\/\\/(?:www\\.)?blip\\.tv\\/file\\/(\\d+)\\?.*','Blip.tv using JW Media Player'),(92,0,3,13,0,0,'apple','a:1:{s:6:\"@MURL@\";s:6:\"@CODE@\";}','^http:\\/\\/www\\.apple\\.com\\/trailers\\/(.*)','Apple.com trailers'),(93,0,39,0,0,0,'movieweb','a:1:{s:6:\"@MURL@\";s:32:\"http://www.movieweb.com/v/@CODE@\";}','http:\\/\\/www\\.movieweb\\.com\\/video\\/(\\w+)$','MovieWeb');
/*!40000 ALTER TABLE `jos_avr_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_avrbak_avr_player`
--

DROP TABLE IF EXISTS `jos_avrbak_avr_player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_avrbak_avr_player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '0',
  `minw` int(11) NOT NULL DEFAULT '0',
  `minh` int(11) NOT NULL DEFAULT '0',
  `isjw` int(1) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL,
  `code` mediumtext NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_avrbak_avr_player`
--

LOCK TABLES `jos_avrbak_avr_player` WRITE;
/*!40000 ALTER TABLE `jos_avrbak_avr_player` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_avrbak_avr_player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_avrbak_avr_ripper`
--

DROP TABLE IF EXISTS `jos_avrbak_avr_ripper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_avrbak_avr_ripper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '0',
  `flags` int(11) NOT NULL DEFAULT '0',
  `cindex` int(11) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL,
  `url` varchar(255) NOT NULL,
  `regex` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_avrbak_avr_ripper`
--

LOCK TABLES `jos_avrbak_avr_ripper` WRITE;
/*!40000 ALTER TABLE `jos_avrbak_avr_ripper` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_avrbak_avr_ripper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_avrbak_avr_tags`
--

DROP TABLE IF EXISTS `jos_avrbak_avr_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_avrbak_avr_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL DEFAULT '0',
  `player_id` int(11) NOT NULL,
  `ripper_id` int(11) NOT NULL DEFAULT '0',
  `local` int(1) NOT NULL DEFAULT '0',
  `plist` int(1) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL,
  `postreplace` varchar(255) NOT NULL DEFAULT '',
  `sampleregex` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `tag` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_avrbak_avr_tags`
--

LOCK TABLES `jos_avrbak_avr_tags` WRITE;
/*!40000 ALTER TABLE `jos_avrbak_avr_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_avrbak_avr_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_banner`
--

DROP TABLE IF EXISTS `jos_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_banner` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `type` varchar(30) NOT NULL DEFAULT 'banner',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT '0',
  `impmade` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `imageurl` varchar(100) NOT NULL DEFAULT '',
  `clickurl` varchar(200) NOT NULL DEFAULT '',
  `date` datetime DEFAULT NULL,
  `showBanner` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) DEFAULT NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_banner`
--

LOCK TABLES `jos_banner` WRITE;
/*!40000 ALTER TABLE `jos_banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_bannerclient`
--

DROP TABLE IF EXISTS `jos_bannerclient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_bannerclient` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `contact` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `extrainfo` text NOT NULL,
  `checked_out` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out_time` time DEFAULT NULL,
  `editor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_bannerclient`
--

LOCK TABLES `jos_bannerclient` WRITE;
/*!40000 ALTER TABLE `jos_bannerclient` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_bannerclient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_bannertrack`
--

DROP TABLE IF EXISTS `jos_bannertrack`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_bannertrack`
--

LOCK TABLES `jos_bannertrack` WRITE;
/*!40000 ALTER TABLE `jos_bannertrack` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_bannertrack` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_categories`
--

DROP TABLE IF EXISTS `jos_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `section` varchar(50) NOT NULL DEFAULT '',
  `image_position` varchar(30) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_categories`
--

LOCK TABLES `jos_categories` WRITE;
/*!40000 ALTER TABLE `jos_categories` DISABLE KEYS */;
INSERT INTO `jos_categories` VALUES (49,0,'[Articulos] Departamento','','articulos-departamento','','26','left','',1,0,'0000-00-00 00:00:00',NULL,3,0,0,''),(15,0,'Profesores','','profesores','','11','left','',1,0,'0000-00-00 00:00:00',NULL,1,0,0,''),(48,0,'[Articulos] Alumnos','','articulos-alumnos','','25','left','',1,0,'0000-00-00 00:00:00',NULL,2,0,0,''),(8,0,'Miguel','','miguel','ext_lang.png','com_contact_details','left','jjj',1,0,'0000-00-00 00:00:00',NULL,1,0,0,''),(9,0,'Noticias','','noticias','pastarchives.jpg','com_newsfeeds','left','',1,0,'0000-00-00 00:00:00',NULL,1,0,0,''),(11,0,'Otros','','otros','','8','left','',1,0,'0000-00-00 00:00:00',NULL,1,0,0,''),(47,0,'[Articulos] CarreraTelecom','','articulos-carreratelecom','','24','left','',1,0,'0000-00-00 00:00:00',NULL,2,0,0,'');
/*!40000 ALTER TABLE `jos_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_components`
--

DROP TABLE IF EXISTS `jos_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_components` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `menuid` int(11) unsigned NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `admin_menu_link` varchar(255) NOT NULL DEFAULT '',
  `admin_menu_alt` varchar(255) NOT NULL DEFAULT '',
  `option` varchar(50) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `admin_menu_img` varchar(255) NOT NULL DEFAULT '',
  `iscore` tinyint(4) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM AUTO_INCREMENT=202 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_components`
--

LOCK TABLES `jos_components` WRITE;
/*!40000 ALTER TABLE `jos_components` DISABLE KEYS */;
INSERT INTO `jos_components` VALUES (1,'Banners','',0,0,'','Banner Management','com_banners',0,'js/ThemeOffice/component.png',0,'track_impressions=0\ntrack_clicks=0\ntag_prefix=\n\n',1),(2,'Banners','',0,1,'option=com_banners','Active Banners','com_banners',1,'js/ThemeOffice/edit.png',0,'',1),(3,'Clients','',0,1,'option=com_banners&c=client','Manage Clients','com_banners',2,'js/ThemeOffice/categories.png',0,'',1),(4,'Web Links','option=com_weblinks',0,0,'','Manage Weblinks','com_weblinks',0,'js/ThemeOffice/component.png',0,'show_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n',1),(5,'Links','',0,4,'option=com_weblinks','View existing weblinks','com_weblinks',1,'js/ThemeOffice/edit.png',0,'',1),(6,'Categories','',0,4,'option=com_categories&section=com_weblinks','Manage weblink categories','',2,'js/ThemeOffice/categories.png',0,'',1),(7,'Contacts','option=com_contact',0,0,'','Edit contact details','com_contact',0,'js/ThemeOffice/component.png',1,'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nallow_vcard=0\nbanned_email=miguel_aam@hotmail.com\nbanned_subject=\nbanned_text=\nvalidate_session=1\ncustom_reply=0\n\n',1),(8,'Contacts','',0,7,'option=com_contact','Edit contact details','com_contact',0,'js/ThemeOffice/edit.png',1,'',1),(9,'Categories','',0,7,'option=com_categories&section=com_contact_details','Manage contact categories','',2,'js/ThemeOffice/categories.png',1,'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n',1),(10,'Polls','option=com_poll',0,0,'option=com_poll','Manage Polls','com_poll',0,'js/ThemeOffice/component.png',0,'',1),(11,'News Feeds','option=com_newsfeeds',0,0,'','News Feeds Management','com_newsfeeds',0,'js/ThemeOffice/component.png',0,'',1),(12,'Feeds','',0,11,'option=com_newsfeeds','Manage News Feeds','com_newsfeeds',1,'js/ThemeOffice/edit.png',0,'show_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n',1),(13,'Categories','',0,11,'option=com_categories&section=com_newsfeeds','Manage Categories','',2,'js/ThemeOffice/categories.png',0,'',1),(14,'User','option=com_user',0,0,'','','com_user',0,'',1,'',1),(15,'Search','option=com_search',0,0,'option=com_search','Search Statistics','com_search',0,'js/ThemeOffice/component.png',1,'enabled=0\n\n',1),(16,'Categories','',0,1,'option=com_categories&section=com_banner','Categories','',3,'',1,'',1),(17,'Wrapper','option=com_wrapper',0,0,'','Wrapper','com_wrapper',0,'',1,'',1),(18,'Mail To','',0,0,'','','com_mailto',0,'',1,'',1),(19,'Media Manager','',0,0,'option=com_media','Media Manager','com_media',0,'',1,'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images\nimage_path=images/stories\nrestrict_uploads=1\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nenable_flash=0\n\n',1),(20,'Articles','option=com_content',0,0,'','','com_content',0,'',1,'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=0\n\n',1),(21,'Configuration Manager','',0,0,'','Configuration','com_config',0,'',1,'',1),(22,'Installation Manager','',0,0,'','Installer','com_installer',0,'',1,'',1),(23,'Language Manager','',0,0,'','Languages','com_languages',0,'',1,'site=es-ES\n\n',1),(24,'Mass mail','',0,0,'','Mass Mail','com_massmail',0,'',1,'mailSubjectPrefix=\nmailBodySuffix=\n\n',1),(25,'Menu Editor','',0,0,'','Menu Editor','com_menus',0,'',1,'',1),(27,'Messaging','',0,0,'','Messages','com_messages',0,'',1,'',1),(28,'Modules Manager','',0,0,'','Modules','com_modules',0,'',1,'',1),(29,'Plugin Manager','',0,0,'','Plugins','com_plugins',0,'',1,'',1),(30,'Template Manager','',0,0,'','Templates','com_templates',0,'',1,'',1),(31,'User Manager','',0,0,'','Users','com_users',0,'',1,'allowUserRegistration=1\nnew_usertype=Registered\nuseractivation=1\nfrontend_userparams=1\n\n',1),(32,'Cache Manager','',0,0,'','Cache','com_cache',0,'',1,'',1),(33,'Control Panel','',0,0,'','Control Panel','com_cpanel',0,'',1,'',1),(34,'Jambook','option=com_jambook',0,0,'option=com_jambook','Jambook','com_jambook',0,'../components/com_jambook/images/jambook_tiny.png',0,'',1),(35,'Control Panel','',0,34,'option=com_jambook&task=cpanel','Control Panel','com_jambook',0,'../components/com_jambook/images/controlpanel.png',0,'',1),(36,'Guestbook Entries','',0,34,'option=com_jambook&task=list','Guestbook Entries','com_jambook',1,'../components/com_jambook/images/editentries.png',0,'',1),(37,'Template Manager','',0,34,'option=com_jambook&task=listtemplates','Template Manager','com_jambook',2,'../components/com_jambook/images/templatemanager.png',0,'',1),(38,'Import Entries','',0,34,'option=com_jambook&task=import','Import Entries','com_jambook',3,'../components/com_jambook/images/import.png',0,'',1),(39,'Deinstall','',0,34,'option=com_jambook&task=deinstall','Deinstall','com_jambook',4,'../components/com_jambook/images/trash.png',0,'',1),(40,'Information','',0,34,'option=com_jambook&task=info','Information','com_jambook',5,'../components/com_jambook/images/information.png',0,'',1),(41,'Configuration','',0,34,'option=com_jambook&task=conf','Configuration','com_jambook',6,'../components/com_jambook/images/configuration.png',0,'',1),(43,'Attend Events','option=com_attend_events',0,0,'option=com_attend_events','Attend Events','com_attend_events',0,'js/ThemeOffice/component.png',0,'',1),(44,'Sessions','',0,43,'option=com_attend_events&act=sessions','Sessions','com_attend_events',0,'js/ThemeOffice/categories.png',0,'',1),(45,'Venues','',0,43,'option=com_attend_events&act=venues','Venues','com_attend_events',1,'js/ThemeOffice/component.png',0,'',1),(46,'Registrations','',0,43,'option=com_attend_events&act=registrations','Registrations','com_attend_events',2,'js/ThemeOffice/users.png',0,'',1),(47,'Configuration','',0,43,'option=com_attend_events&act=config','Configuration','com_attend_events',3,'js/ThemeOffice/controlpanel.png',0,'',1),(197,'AvReloaded','',0,0,'','AvReloaded','com_avreloaded',0,'',0,'',1),(198,'AVR_TITLE_MANAGE_PLAYERS','',0,197,'option=com_avreloaded&view=players','AVR_TITLE_MANAGE_PLAYERS','com_avreloaded',0,'components/com_avreloaded/assets/avreloaded-16x16.png',0,'',1),(199,'AVR_TITLE_MANAGE_RIPPERS','',0,197,'option=com_avreloaded&view=rippers','AVR_TITLE_MANAGE_RIPPERS','com_avreloaded',1,'components/com_avreloaded/assets/avreloaded-16x16.png',0,'',1),(200,'AVR_TITLE_MANAGE_TAGS','',0,197,'option=com_avreloaded&view=tags','AVR_TITLE_MANAGE_TAGS','com_avreloaded',2,'components/com_avreloaded/assets/avreloaded-16x16.png',0,'',1),(201,'AVR_TITLE_MANAGE_PLAYLISTS','',0,197,'option=com_avreloaded&view=playlists','AVR_TITLE_MANAGE_PLAYLISTS','com_avreloaded',3,'components/com_avreloaded/assets/avreloaded-16x16.png',0,'',1),(49,'Gavick PhotoSlide GK2','option=com_gk2_photoslide',0,0,'option=com_gk2_photoslide','Gavick PhotoSlide GK2','com_gk2_photoslide',0,'components/com_gk2_photoslide/interface/images/com_logo_gk2.png',0,'',1),(102,'JoomGallery','option=com_joomgallery',0,0,'option=com_joomgallery','JoomGallery','com_joomgallery',0,'../administrator/components/com_joomgallery/assets/images/main.png',0,'',1),(103,'Category Manager','',0,102,'option=com_joomgallery&act=categories','Category Manager','com_joomgallery',0,'../administrator/components/com_joomgallery/assets/images/categories.png',0,'',1),(104,'Picture Manager','',0,102,'option=com_joomgallery&act=pictures','Picture Manager','com_joomgallery',1,'../administrator/components/com_joomgallery/assets/images/pictures.png',0,'',1),(105,'Comments Manager','',0,102,'option=com_joomgallery&act=comments','Comments Manager','com_joomgallery',2,'../administrator/components/com_joomgallery/assets/images/comments.png',0,'',1),(106,'Votes Manager','',0,102,'option=com_joomgallery&act=votes','Votes Manager','com_joomgallery',3,'../administrator/components/com_joomgallery/assets/images/votes.png',0,'',1),(107,'Picture Upload','',0,102,'option=com_joomgallery&act=upload','Picture Upload','com_joomgallery',4,'../administrator/components/com_joomgallery/assets/images/pictureupload.png',0,'',1),(108,'Batch Upload','',0,102,'option=com_joomgallery&act=batchupload','Batch Upload','com_joomgallery',5,'../administrator/components/com_joomgallery/assets/images/batchupload.png',0,'',1),(109,'FTP Upload','',0,102,'option=com_joomgallery&act=ftpupload','FTP Upload','com_joomgallery',6,'../administrator/components/com_joomgallery/assets/images/ftpupload.png',0,'',1),(110,'Java Upload','',0,102,'option=com_joomgallery&act=jupload','Java Upload','com_joomgallery',7,'../administrator/components/com_joomgallery/assets/images/jupload.png',0,'',1),(111,'Configuration Manager','',0,102,'option=com_joomgallery&act=configuration','Configuration Manager','com_joomgallery',8,'../administrator/components/com_joomgallery/assets/images/config.png',0,'',1),(112,'Customize CSS','',0,102,'option=com_joomgallery&act=editcss','Customize CSS','com_joomgallery',9,'../administrator/components/com_joomgallery/assets/images/css.png',0,'',1),(113,'Migration-Manager','',0,102,'option=com_joomgallery&act=migrate','Migration-Manager','com_joomgallery',10,'../administrator/components/com_joomgallery/assets/images/migration.png',0,'',1),(114,'Help and Information','',0,102,'option=com_joomgallery&act=help','Help and Information','com_joomgallery',11,'../administrator/components/com_joomgallery/assets/images/information.png',0,'',1),(116,'EventList','option=com_eventlist',0,0,'option=com_eventlist','EventList','com_eventlist',0,'../administrator/components/com_eventlist/assets/images/eventlist.png',0,'display_num=15\ncat_num=4\nfilter=1\ndisplay=1\nicons=1\nshow_print_icon=1\nshow_email_icon=1\n',1),(117,'DFContact','option=com_dfcontact',0,0,'option=com_dfcontact','DFContact','com_dfcontact',0,'js/ThemeOffice/component.png',0,'',1),(119,'Community Builder','option=com_comprofiler',0,0,'option=com_comprofiler','Community Builder','com_comprofiler',0,'js/ThemeOffice/component.png',0,'',1),(120,'User Management','',0,119,'option=com_comprofiler&task=showusers','User Management','com_comprofiler',0,'js/ThemeOffice/user.png',0,'',1),(121,'Tab Management','',0,119,'option=com_comprofiler&task=showTab','Tab Management','com_comprofiler',1,'js/ThemeOffice/article.png',0,'',1),(122,'Field Management','',0,119,'option=com_comprofiler&task=showField','Field Management','com_comprofiler',2,'js/ThemeOffice/content.png',0,'',1),(123,'List Management','',0,119,'option=com_comprofiler&task=showLists','List Management','com_comprofiler',3,'js/ThemeOffice/static.png',0,'',1),(124,'Plugin Management','',0,119,'option=com_comprofiler&task=showPlugins','Plugin Management','com_comprofiler',4,'js/ThemeOffice/plugin.png',0,'',1),(125,'Tools','',0,119,'option=com_comprofiler&task=tools','Tools','com_comprofiler',5,'js/ThemeOffice/component.png',0,'',1),(126,'Configuration','',0,119,'option=com_comprofiler&task=showconfig','Configuration','com_comprofiler',6,'js/ThemeOffice/config.png',0,'',1),(191,'noixACL','option=com_noixacl',0,0,'option=com_noixacl','noixACL','com_noixacl',0,'js/ThemeOffice/component.png',0,'',1),(192,'Manage Groups','',0,191,'option=com_noixacl&controller=groups','Manage Groups','com_noixacl',0,'js/ThemeOffice/component.png',0,'',1),(193,'Manage Users','',0,191,'option=com_noixacl&controller=aclusers','Manage Users','com_noixacl',1,'js/ThemeOffice/component.png',0,'',1),(194,'Adapters','',0,191,'option=com_noixacl&controller=adapters','Adapters','com_noixacl',2,'js/ThemeOffice/component.png',0,'',1),(195,'About','',0,191,'option=com_noixacl&controller=noixacl','About','com_noixacl',3,'js/ThemeOffice/component.png',0,'',1);
/*!40000 ALTER TABLE `jos_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_comprofiler`
--

DROP TABLE IF EXISTS `jos_comprofiler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_comprofiler` (
  `id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  `message_last_sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `message_number_sent` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `avatarapproved` tinyint(4) NOT NULL DEFAULT '1',
  `approved` tinyint(4) NOT NULL DEFAULT '1',
  `confirmed` tinyint(4) NOT NULL DEFAULT '1',
  `lastupdatedate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `registeripaddr` varchar(50) NOT NULL DEFAULT '',
  `cbactivation` varchar(50) NOT NULL DEFAULT '',
  `banned` tinyint(4) NOT NULL DEFAULT '0',
  `banneddate` datetime DEFAULT NULL,
  `unbanneddate` datetime DEFAULT NULL,
  `bannedby` int(11) DEFAULT NULL,
  `unbannedby` int(11) DEFAULT NULL,
  `bannedreason` mediumtext,
  `acceptedterms` tinyint(1) NOT NULL DEFAULT '0',
  `cb_grupo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `apprconfbanid` (`approved`,`confirmed`,`banned`,`id`),
  KEY `avatappr_apr_conf_ban_avatar` (`avatarapproved`,`approved`,`confirmed`,`banned`,`avatar`),
  KEY `lastupdatedate` (`lastupdatedate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_comprofiler`
--

LOCK TABLES `jos_comprofiler` WRITE;
/*!40000 ALTER TABLE `jos_comprofiler` DISABLE KEYS */;
INSERT INTO `jos_comprofiler` VALUES (62,62,NULL,NULL,NULL,0,'0000-00-00 00:00:00',0,NULL,1,1,1,'0000-00-00 00:00:00','','',0,NULL,NULL,NULL,NULL,NULL,0,NULL),(64,64,NULL,NULL,NULL,0,'0000-00-00 00:00:00',0,NULL,1,1,1,'0000-00-00 00:00:00','','',0,NULL,NULL,NULL,NULL,NULL,0,NULL),(66,66,NULL,NULL,NULL,0,'0000-00-00 00:00:00',0,NULL,1,1,1,'0000-00-00 00:00:00','','',0,NULL,NULL,NULL,NULL,NULL,0,NULL),(67,67,NULL,NULL,NULL,0,'0000-00-00 00:00:00',0,NULL,1,1,1,'0000-00-00 00:00:00','','',0,NULL,NULL,NULL,NULL,NULL,0,NULL),(68,68,'la','','gomez',1,'0000-00-00 00:00:00',0,'68_4a1c01d111e3d.jpg',1,1,1,'0000-00-00 00:00:00','','',0,NULL,NULL,NULL,NULL,NULL,0,'205'),(70,70,'Rosa','','Perez',0,'0000-00-00 00:00:00',0,NULL,1,1,1,'0000-00-00 00:00:00','','',0,NULL,NULL,NULL,NULL,NULL,0,'Receptores');
/*!40000 ALTER TABLE `jos_comprofiler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_comprofiler_field_values`
--

DROP TABLE IF EXISTS `jos_comprofiler_field_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_comprofiler_field_values` (
  `fieldvalueid` int(11) NOT NULL AUTO_INCREMENT,
  `fieldid` int(11) NOT NULL DEFAULT '0',
  `fieldtitle` varchar(255) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `sys` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fieldvalueid`),
  KEY `fieldid_ordering` (`fieldid`,`ordering`),
  KEY `fieldtitle_id` (`fieldtitle`,`fieldid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_comprofiler_field_values`
--

LOCK TABLES `jos_comprofiler_field_values` WRITE;
/*!40000 ALTER TABLE `jos_comprofiler_field_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_comprofiler_field_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_comprofiler_fields`
--

DROP TABLE IF EXISTS `jos_comprofiler_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_comprofiler_fields` (
  `fieldid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `tablecolumns` text NOT NULL,
  `table` varchar(50) NOT NULL DEFAULT '#__comprofiler',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT '',
  `maxlength` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `required` tinyint(4) DEFAULT '0',
  `tabid` int(11) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `cols` int(11) DEFAULT NULL,
  `rows` int(11) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  `default` mediumtext,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `registration` tinyint(1) NOT NULL DEFAULT '0',
  `profile` tinyint(1) NOT NULL DEFAULT '1',
  `displaytitle` tinyint(1) NOT NULL DEFAULT '1',
  `readonly` tinyint(1) NOT NULL DEFAULT '0',
  `searchable` tinyint(1) NOT NULL DEFAULT '0',
  `calculated` tinyint(1) NOT NULL DEFAULT '0',
  `sys` tinyint(4) NOT NULL DEFAULT '0',
  `pluginid` int(11) NOT NULL DEFAULT '0',
  `params` mediumtext,
  PRIMARY KEY (`fieldid`),
  KEY `tabid_pub_prof_order` (`tabid`,`published`,`profile`,`ordering`),
  KEY `readonly_published_tabid` (`readonly`,`published`,`tabid`),
  KEY `registration_published_order` (`registration`,`published`,`ordering`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_comprofiler_fields`
--

LOCK TABLES `jos_comprofiler_fields` WRITE;
/*!40000 ALTER TABLE `jos_comprofiler_fields` DISABLE KEYS */;
INSERT INTO `jos_comprofiler_fields` VALUES (41,'name','name','#__users','_UE_NAME','_UE_REGWARN_NAME','predefined',NULL,NULL,1,11,-51,NULL,NULL,NULL,NULL,1,1,0,1,0,1,1,1,1,NULL),(26,'onlinestatus','','#__comprofiler','_UE_ONLINESTATUS','','status',NULL,NULL,0,21,-21,NULL,NULL,NULL,NULL,1,0,1,1,0,0,1,1,1,NULL),(27,'lastvisitDate','lastvisitDate','#__users','_UE_LASTONLINE','','datetime',NULL,NULL,0,21,-19,NULL,NULL,NULL,NULL,1,0,1,1,1,0,1,1,1,'field_display_by=2'),(28,'registerDate','registerDate','#__users','_UE_MEMBERSINCE','','datetime',NULL,NULL,0,21,-20,NULL,NULL,NULL,NULL,1,0,1,1,1,0,1,1,1,'field_display_by=2'),(29,'avatar','avatar,avatarapproved','#__comprofiler','_UE_IMAGE','','image',NULL,NULL,0,20,1,NULL,NULL,NULL,NULL,1,0,1,0,0,0,1,1,1,NULL),(42,'username','username','#__users','_UE_UNAME','_UE_VALID_UNAME','predefined',NULL,NULL,1,11,-46,NULL,NULL,NULL,NULL,1,1,0,1,0,1,1,1,1,NULL),(45,'formatname','','#__comprofiler','_UE_FORMATNAME','','formatname',NULL,NULL,0,11,-52,NULL,NULL,NULL,NULL,1,0,1,0,1,0,1,1,1,NULL),(46,'firstname','firstname','#__comprofiler','_UE_YOUR_FNAME','_UE_REGWARN_FNAME','predefined',NULL,NULL,1,11,-50,NULL,NULL,NULL,NULL,1,1,0,1,0,0,1,1,1,NULL),(47,'middlename','middlename','#__comprofiler','_UE_YOUR_MNAME','_UE_REGWARN_MNAME','predefined',NULL,NULL,0,11,-49,NULL,NULL,NULL,NULL,1,1,0,1,0,0,1,1,1,NULL),(48,'lastname','lastname','#__comprofiler','_UE_YOUR_LNAME','_UE_REGWARN_LNAME','predefined',NULL,NULL,1,11,-48,NULL,NULL,NULL,NULL,1,1,0,1,0,0,1,1,1,NULL),(49,'lastupdatedate','lastupdatedate','#__comprofiler','_UE_LASTUPDATEDON','','datetime',NULL,NULL,0,21,-18,NULL,NULL,NULL,NULL,1,0,1,1,1,0,1,1,1,'field_display_by=2'),(50,'email','email','#__users','_UE_EMAIL','_UE_REGWARN_MAIL','primaryemailaddress',NULL,NULL,1,11,-47,NULL,NULL,NULL,NULL,1,1,0,1,0,0,1,1,1,NULL),(25,'hits','hits','#__comprofiler','_UE_HITS','_UE_HITS_DESC','counter',NULL,NULL,0,21,-22,NULL,NULL,NULL,NULL,1,0,1,1,1,0,1,1,1,NULL),(51,'password','password','#__users','_UE_PASS','_UE_VALID_PASS','password',50,NULL,1,11,-45,NULL,NULL,NULL,NULL,1,1,0,1,0,0,1,1,1,NULL),(52,'params','params','#__users','_UE_USERPARAMS','','userparams',NULL,NULL,0,11,-30,NULL,NULL,NULL,NULL,1,0,0,1,0,0,1,1,1,NULL),(24,'connections','','#__comprofiler','_UE_CONNECTION','','connections',NULL,NULL,0,21,-17,NULL,NULL,NULL,NULL,1,0,1,1,1,0,1,1,1,NULL),(23,'forumrank','','#__comprofiler','_UE_FORUM_FORUMRANKING','','forumstats',NULL,NULL,0,21,-16,NULL,NULL,NULL,NULL,1,0,1,1,1,0,1,1,4,NULL),(22,'forumposts','','#__comprofiler','_UE_FORUM_TOTALPOSTS','','forumstats',NULL,NULL,0,21,-15,NULL,NULL,NULL,NULL,1,0,1,1,1,0,1,1,4,NULL),(21,'forumkarma','','#__comprofiler','_UE_FORUM_KARMA','','forumstats',NULL,NULL,0,21,-14,NULL,NULL,NULL,NULL,1,0,1,1,1,0,1,1,4,NULL),(20,'forumsignature','','#__comprofiler','_UE_FB_SIGNATURE','','forumsettings',NULL,NULL,0,13,3,60,5,NULL,NULL,1,0,0,1,0,0,0,1,4,NULL),(19,'forumview','','#__comprofiler','_UE_FB_VIEWTYPE_TITLE','','forumsettings',NULL,NULL,1,13,2,NULL,NULL,NULL,'flat',1,0,0,1,0,0,0,1,4,NULL),(18,'forumorder','','#__comprofiler','_UE_FB_ORDERING_TITLE','','forumsettings',NULL,NULL,1,13,1,NULL,NULL,NULL,'0',1,0,0,1,0,0,0,1,4,NULL),(54,'cb_grupo','cb_grupo','#__comprofiler','Grupo','','text',0,0,0,11,-29,0,0,NULL,'',1,1,1,1,0,0,0,0,1,'fieldMinLength=0\nfieldValidateExpression=\npregexp=/^.*$/\npregexperror=Not a valid input\nfieldValidateForbiddenList_register=http:,https:,mailto:,//.[url],<a,</a>,&#\nfieldValidateForbiddenList_profile=');
/*!40000 ALTER TABLE `jos_comprofiler_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_comprofiler_lists`
--

DROP TABLE IF EXISTS `jos_comprofiler_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_comprofiler_lists` (
  `listid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `usergroupids` varchar(255) DEFAULT NULL,
  `useraccessgroupid` int(9) NOT NULL DEFAULT '18',
  `sortfields` varchar(255) DEFAULT NULL,
  `filterfields` mediumtext,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `col1title` varchar(255) DEFAULT NULL,
  `col1enabled` tinyint(1) NOT NULL DEFAULT '0',
  `col1fields` mediumtext,
  `col2title` varchar(255) DEFAULT NULL,
  `col2enabled` tinyint(1) NOT NULL DEFAULT '0',
  `col1captions` tinyint(1) NOT NULL DEFAULT '0',
  `col2fields` mediumtext,
  `col2captions` tinyint(1) NOT NULL DEFAULT '0',
  `col3title` varchar(255) DEFAULT NULL,
  `col3enabled` tinyint(1) NOT NULL DEFAULT '0',
  `col3fields` mediumtext,
  `col3captions` tinyint(1) NOT NULL DEFAULT '0',
  `col4title` varchar(255) DEFAULT NULL,
  `col4enabled` tinyint(1) NOT NULL DEFAULT '0',
  `col4fields` mediumtext,
  `col4captions` tinyint(1) NOT NULL DEFAULT '0',
  `params` mediumtext,
  PRIMARY KEY (`listid`),
  KEY `pub_ordering` (`published`,`ordering`),
  KEY `default_published` (`default`,`published`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_comprofiler_lists`
--

LOCK TABLES `jos_comprofiler_lists` WRITE;
/*!40000 ALTER TABLE `jos_comprofiler_lists` DISABLE KEYS */;
INSERT INTO `jos_comprofiler_lists` VALUES (4,'Clase a','',1,0,'18',18,'`avatar` ASC','s(`name` >\'4\')',1,'alumnos',1,NULL,'',0,0,NULL,0,'',0,NULL,0,'',0,NULL,0,'list_search=1\nlist_compare_types=0\nlist_limit=\nlist_paging=1\nhotlink_protection=0');
/*!40000 ALTER TABLE `jos_comprofiler_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_comprofiler_members`
--

DROP TABLE IF EXISTS `jos_comprofiler_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_comprofiler_members` (
  `referenceid` int(11) NOT NULL DEFAULT '0',
  `memberid` int(11) NOT NULL DEFAULT '0',
  `accepted` tinyint(1) NOT NULL DEFAULT '1',
  `pending` tinyint(1) NOT NULL DEFAULT '0',
  `membersince` date NOT NULL DEFAULT '0000-00-00',
  `reason` mediumtext,
  `description` varchar(255) DEFAULT NULL,
  `type` mediumtext,
  PRIMARY KEY (`referenceid`,`memberid`),
  KEY `pamr` (`pending`,`accepted`,`memberid`,`referenceid`),
  KEY `aprm` (`accepted`,`pending`,`referenceid`,`memberid`),
  KEY `membrefid` (`memberid`,`referenceid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_comprofiler_members`
--

LOCK TABLES `jos_comprofiler_members` WRITE;
/*!40000 ALTER TABLE `jos_comprofiler_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_comprofiler_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_comprofiler_plugin`
--

DROP TABLE IF EXISTS `jos_comprofiler_plugin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_comprofiler_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `element` varchar(100) NOT NULL DEFAULT '',
  `type` varchar(100) DEFAULT '',
  `folder` varchar(100) DEFAULT '',
  `backend_menu` varchar(255) NOT NULL DEFAULT '',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `iscore` tinyint(3) NOT NULL DEFAULT '0',
  `client_id` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`),
  KEY `type_pub_order` (`type`,`published`,`ordering`)
) ENGINE=MyISAM AUTO_INCREMENT=500 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_comprofiler_plugin`
--

LOCK TABLES `jos_comprofiler_plugin` WRITE;
/*!40000 ALTER TABLE `jos_comprofiler_plugin` DISABLE KEYS */;
INSERT INTO `jos_comprofiler_plugin` VALUES (1,'CB Core','cb.core','user','plug_cbcore','',0,1,1,1,0,0,'0000-00-00 00:00:00',''),(2,'CB Connections','cb.connections','user','plug_cbconnections','',0,3,1,1,0,0,'0000-00-00 00:00:00',''),(3,'Content Author','cb.authortab','user','plug_cbmamboauthortab','',0,4,1,1,0,0,'0000-00-00 00:00:00',''),(4,'Forum integration','cb.simpleboardtab','user','plug_cbsimpleboardtab','',0,5,0,1,0,0,'0000-00-00 00:00:00',''),(5,'Mamblog Blog','cb.mamblogtab','user','plug_cbmamblogtab','',0,6,0,1,0,0,'0000-00-00 00:00:00',''),(6,'YaNC Newsletters','yanc','user','plug_yancintegration','',0,7,0,1,0,0,'0000-00-00 00:00:00',''),(7,'Default','default','templates','default','',0,1,1,1,0,0,'0000-00-00 00:00:00',''),(8,'WinClassic','winclassic','templates','winclassic','',0,2,1,1,0,0,'0000-00-00 00:00:00',''),(9,'WebFX','webfx','templates','webfx','',0,3,1,1,0,0,'0000-00-00 00:00:00',''),(10,'OSX','osx','templates','osx','',0,4,1,1,0,0,'0000-00-00 00:00:00',''),(11,'Luna','luna','templates','luna','',0,5,1,1,0,0,'0000-00-00 00:00:00',''),(12,'Dark','dark','templates','dark','',0,6,1,1,0,0,'0000-00-00 00:00:00',''),(13,'Default language (English)','default_language','language','default_language','',0,-1,1,1,0,0,'0000-00-00 00:00:00',''),(14,'CB Menu','cb.menu','user','plug_cbmenu','',0,2,1,1,0,0,'0000-00-00 00:00:00',''),(15,'Private Message System','pms.mypmspro','user','plug_pms_mypmspro','',0,8,0,1,0,0,'0000-00-00 00:00:00','');
/*!40000 ALTER TABLE `jos_comprofiler_plugin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_comprofiler_sessions`
--

DROP TABLE IF EXISTS `jos_comprofiler_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_comprofiler_sessions` (
  `username` varchar(50) NOT NULL DEFAULT '',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `ui` tinyint(4) NOT NULL DEFAULT '0',
  `incoming_ip` varchar(39) NOT NULL DEFAULT '',
  `client_ip` varchar(39) NOT NULL DEFAULT '',
  `session_id` varchar(33) NOT NULL DEFAULT '',
  `session_data` mediumtext NOT NULL,
  `expiry_time` int(14) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`session_id`),
  KEY `expiry_time` (`expiry_time`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_comprofiler_sessions`
--

LOCK TABLES `jos_comprofiler_sessions` WRITE;
/*!40000 ALTER TABLE `jos_comprofiler_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_comprofiler_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_comprofiler_tabs`
--

DROP TABLE IF EXISTS `jos_comprofiler_tabs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_comprofiler_tabs` (
  `tabid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `description` text,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `ordering_register` int(11) NOT NULL DEFAULT '10',
  `width` varchar(10) NOT NULL DEFAULT '.5',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `pluginclass` varchar(255) DEFAULT NULL,
  `pluginid` int(11) DEFAULT NULL,
  `fields` tinyint(1) NOT NULL DEFAULT '1',
  `params` mediumtext,
  `sys` tinyint(4) NOT NULL DEFAULT '0',
  `displaytype` varchar(255) NOT NULL DEFAULT '',
  `position` varchar(255) NOT NULL DEFAULT '',
  `useraccessgroupid` int(9) NOT NULL DEFAULT '-2',
  PRIMARY KEY (`tabid`),
  KEY `enabled_position_ordering` (`enabled`,`position`,`ordering`),
  KEY `orderreg_enabled_pos_order` (`enabled`,`ordering_register`,`position`,`ordering`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_comprofiler_tabs`
--

LOCK TABLES `jos_comprofiler_tabs` WRITE;
/*!40000 ALTER TABLE `jos_comprofiler_tabs` DISABLE KEYS */;
INSERT INTO `jos_comprofiler_tabs` VALUES (11,'_UE_CONTACT_INFO_HEADER','',-4,10,'1',1,'getContactTab',1,1,NULL,2,'tab','cb_tabmain',-2),(12,'_UE_AUTHORTAB','',-3,10,'1',1,'getAuthorTab',3,0,NULL,1,'tab','cb_tabmain',-2),(13,'_UE_FORUMTAB','',-2,10,'1',0,'getForumTab',4,1,NULL,1,'tab','cb_tabmain',-2),(14,'_UE_BLOGTAB','',-1,10,'1',0,'getBlogTab',5,0,NULL,1,'tab','cb_tabmain',-2),(15,'_UE_CONNECTION','',99,10,'1',0,'getConnectionTab',2,0,NULL,1,'tab','cb_tabmain',-2),(16,'_UE_NEWSLETTER_HEADER','_UE_NEWSLETTER_INTRODCUTION',99,10,'1',0,'getNewslettersTab',6,0,NULL,1,'tab','cb_tabmain',-2),(17,'_UE_MENU','',-10,10,'1',1,'getMenuTab',14,0,NULL,1,'html','cb_head',-2),(18,'_UE_CONNECTIONPATHS','',-9,10,'1',1,'getConnectionPathsTab',2,0,NULL,1,'html','cb_head',-2),(19,'_UE_PROFILE_PAGE_TITLE','',-8,10,'1',1,'getPageTitleTab',1,0,NULL,1,'html','cb_head',-2),(20,'_UE_PORTRAIT','',-7,10,'1',1,'getPortraitTab',1,1,NULL,1,'html','cb_middle',-2),(21,'_UE_USER_STATUS','',-6,10,'.5',1,'getStatusTab',14,1,NULL,1,'html','cb_right',-2),(22,'_UE_PMSTAB','',-5,10,'.5',0,'getmypmsproTab',15,0,NULL,1,'html','cb_right',-2);
/*!40000 ALTER TABLE `jos_comprofiler_tabs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_comprofiler_userreports`
--

DROP TABLE IF EXISTS `jos_comprofiler_userreports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_comprofiler_userreports` (
  `reportid` int(11) NOT NULL AUTO_INCREMENT,
  `reporteduser` int(11) NOT NULL DEFAULT '0',
  `reportedbyuser` int(11) NOT NULL DEFAULT '0',
  `reportedondate` date NOT NULL DEFAULT '0000-00-00',
  `reportexplaination` text NOT NULL,
  `reportedstatus` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reportid`),
  KEY `status_user_date` (`reportedstatus`,`reporteduser`,`reportedondate`),
  KEY `reportedbyuser_ondate` (`reportedbyuser`,`reportedondate`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_comprofiler_userreports`
--

LOCK TABLES `jos_comprofiler_userreports` WRITE;
/*!40000 ALTER TABLE `jos_comprofiler_userreports` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_comprofiler_userreports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_comprofiler_views`
--

DROP TABLE IF EXISTS `jos_comprofiler_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_comprofiler_views` (
  `viewer_id` int(11) NOT NULL DEFAULT '0',
  `profile_id` int(11) NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  `lastview` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `viewscount` int(11) NOT NULL DEFAULT '0',
  `vote` tinyint(3) DEFAULT NULL,
  `lastvote` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`viewer_id`,`profile_id`,`lastip`),
  KEY `lastview` (`lastview`),
  KEY `profile_id_lastview` (`profile_id`,`lastview`,`viewer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_comprofiler_views`
--

LOCK TABLES `jos_comprofiler_views` WRITE;
/*!40000 ALTER TABLE `jos_comprofiler_views` DISABLE KEYS */;
INSERT INTO `jos_comprofiler_views` VALUES (64,68,'132.248.59.180','2009-05-26 10:12:03',1,NULL,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `jos_comprofiler_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_contact_details`
--

DROP TABLE IF EXISTS `jos_contact_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `con_position` varchar(255) DEFAULT NULL,
  `address` text,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `misc` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `imagepos` varchar(20) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `default_con` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `webpage` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_contact_details`
--

LOCK TABLES `jos_contact_details` WRITE;
/*!40000 ALTER TABLE `jos_contact_details` DISABLE KEYS */;
INSERT INTO `jos_contact_details` VALUES (1,'mako','mako','','abasolo 64','','','','','55555','','nbbb','clock.jpg',NULL,'miguel_aam@hotmail.com',0,1,0,'0000-00-00 00:00:00',1,'show_name=1\nshow_position=1\nshow_email=1\nshow_street_address=0\nshow_suburb=0\nshow_state=0\nshow_postcode=0\nshow_country=0\nshow_telephone=0\nshow_mobile=0\nshow_fax=0\nshow_webpage=0\nshow_misc=0\nshow_image=0\nallow_vcard=0\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=',62,8,0,'','');
/*!40000 ALTER TABLE `jos_contact_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_content`
--

DROP TABLE IF EXISTS `jos_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `title_alias` varchar(255) NOT NULL DEFAULT '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `sectionid` int(11) unsigned NOT NULL DEFAULT '0',
  `mask` int(11) unsigned NOT NULL DEFAULT '0',
  `catid` int(11) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `parentid` int(11) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `metadata` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_content`
--

LOCK TABLES `jos_content` WRITE;
/*!40000 ALTER TABLE `jos_content` DISABLE KEYS */;
INSERT INTO `jos_content` VALUES (61,'Servicios al Alumno','servicios-al-alumno','','<p><span class=\"NuTitle\"> <strong>Servicios al alumno </strong> </span> <br /> <span class=\"NuParagraph\"> </span></p>\r\n<p><span class=\"NuParagraph\">Para complementar la formación de los estudiantes, la Facultad de         Ingeniería organiza diversas actividades académicas, culturales,         deportivas y recreativas. </span></p>\r\n<p><span class=\"NuParagraph\"> Asimismo, ofrece a sus alumnos la enseñanza de diversos idiomas y         distintos servicios como: becas, Bolsa Universitaria de Trabajo,         servicio bibliotecario, centro de información y documentación, así         como centros de cómputo que ofrecen capacitación a los alumnos.         La Facultad mantiene mecanismos que  propician la movilidad estudiantil         hacia otras universidades. </span></p>\r\n<p><span class=\"NuParagraph\">Cabe señalar que además la Facultad pone a disposición de sus         alumnos los siguientes laboratorios propios de la carrera: Comunicaciones         Digitales, Comunicaciones Ópticas, Sistemas de Comunicaciones,         Electromagnetismo Aplicado, Procesamiento Digital de Señales, y         Microondas y Satélites. </span></p>\r\n<p><span class=\"NuParagraph\"> </span> <br /> <span class=\"NuTitle\"> <strong>Atención a alumnos </strong> </span> <br /> <span class=\"NuParagraph\"> </span></p>\r\n<p><span class=\"NuParagraph\">Facultad de Ingeniería, Coordinación de Administración         Escolar, Circuito Interior, Ciudad Universitaria, Coyoacán, 04510, México,         D.F., teléfonos 56 22 09 15, 56 22 09 19 y 56 22 08 63. División de         Ingeniería Eléctrica, Departamento de Ingeniería en Telecomunicaciones,         teléfono 56 22 30 64. </span></p>','',1,24,0,47,'2010-11-05 02:12:38',62,'','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00','2010-11-05 02:12:38','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',1,0,4,'','',0,504,'robots=\nauthor='),(2,'Reckoner Remixes Now Available','reckoner-remixes-now-available','','<a name=\"wall_post_215692168\" title=\"wall_post_215692168\" rel=\"nofollow\"></a>                                                    <div class=\"wallheader\">                             <img src=\"http://c.ilike.com/aa/icons/bulletin_post.gif?a=1&c=show&i=10286%2C3%2C215692168&m=22032497\" border=\"0\" alt=\"Bulletin_post\" width=\"1\" height=\"1\" />                                                            <table border=\"0\" width=\"32\" height=\"18\" style=\"float: right; margin-right: -3px; padding-top: 1px\"><tbody><tr><td> </td></tr></tbody></table>                                                                                                                          After the overwhelming response to the Nude Remix Project, Radiohead are giving fans the opportunity to remix “Reckoner”, another track from the band’s latest album “In Rainbows” at <a href=\"http://c.ilike.com/fstat_click.php?a=1&c=show&h=6c315e9cee3abd664c967c30cf2ef45f&i=10286,3,215692168&m=22032497&u=http%3A%2F%2Fwww.radioheadremix.com\" target=\"_blank\">http://www.radioheadremix.com</a><br /></div>                         <div class=\"walltext\" style=\"padding-bottom: 2px\"><p><br />To make remixing easy, the separate ‘stems’* from the song will be available to purchase on iTunes. The ‘stems’ available are bass, lead vocal, backing vocals, guitars, piano/strings and drums.  All six stems will be available to buy for the price of a single track.  Fans can mix them in any way they like, either by adding their own beats and instrumentation, or just remixing the original parts.<br /><br />Fans who purchase the ‘stems’ from iTunes during the first two weeks they\'re available, will be sent an access code to a GarageBand file ready to open in GarageBand or Logic. However, you don’t need GarageBand to do a remix, the stems are available in the DRM-free iTunes Plus format and compatible with several music software platforms.<br /><br />Finished mixes can be uploaded to <a href=\"http://c.ilike.com/fstat_click.php?a=1&c=show&h=6b845e1f72798e66a8abcd49fb6192e7&i=10286,3,215692168&m=22032497&u=http%3A%2F%2Fradioheadremix.com\" target=\"_blank\">http://www.radioheadremix.com</a> where the public will listen and vote for their favourite. Fans can also create a widget allowing votes from their own website, Facebook or MySpace page to be counted as ‘mix votes’ back on radioheadremix.com.<br /><br /><br />*‘stems’ are the component parts of the song.</p>                                         </div>','',1,0,0,0,'2009-03-27 16:45:51',62,'','2009-03-31 15:17:56',63,0,'0000-00-00 00:00:00','2009-03-27 16:45:51','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',3,0,17,'Reckoner, Radiohead','Make a remix of Reckoner',0,11,'robots=\nauthor='),(3,'Departamento de Telecomunicaciones','algo','','<table border=\"0\" cellspacing=\"0\" cellpadding=\"4\" width=\"90%\" align=\"left\"><tbody><tr><td><p><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">Seminario:          La Radio Digital Terrestre en Europa. Eureka 147 y DRM. </font></p>       <p><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">Ponente:          Ing. Jose María Matías, Universidad del País Vasco (UPV-EHU), España </font>          <font color=\"#ffffff\"><br /></font>       </p></td>   </tr> <tr>     <td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> </font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">Departamento</font><font color=\"#ffffff\"><br /><br /></font>              <font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">Conozca        las funciones del departamento asi como su historia, su ubicación y la gente        que lo conforma. También, infórmese acerca del Colegio de Profesores y del        Consejo Técnico.</font>  	<font color=\"#ffffff\"><br /></font></td>   </tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 		</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">Carrera</font>     	<font color=\"#ffffff\"><br /><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">		         Esta sección permite saber más acerca de la carrera de ingeniero en telecomunicaciones,          de que se trata, con que aptitudes se debe de contar para poder ingresar          en ella, los requisitos para hacerlo, las especializaciones que tiene,          el campo de trabajo y los requisitos para titularse. </font>  	<font color=\"#ffffff\"><br /></font>       </td></tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> </font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">Alumnos</font> <font color=\"#ffffff\"><br /><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> Esta parte cuenta con información acerca de las generaciones que ha tenido la carrera de ingeniería en telecomunicaciones. También contiene información acerca de las medallas y becas que se han obtenido. En esta sección se puede consultar de igual manera el calendario escolar. Finalmente, esta parte cuenta con manuales y otros documentos que pueden ser de interés para los alumnos a lo largo de la carrera. </font> <font color=\"#ffffff\"><br /></font> </td></tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" />  	</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">Otros Intereses</font>        	<font color=\"#ffffff\"><br /><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	  En esta sección se pueden consultar los eventos en los que ha participado          el Departamento de Ingeniería en Telecomunicaciones y se pueden encontrar          ligas para páginas de interés para la carrera, como por ejemplo periódicos,          revistas, asociaciones de alumnos, entre otros. </font>  	<font color=\"#ffffff\"><br /></font>     </td>   </tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" />  	</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">Avisos</font>     	<font color=\"#ffffff\"><br /><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 		 En esta sección se encuentran noticias de interés para          alumnos y profesores respecto a las actividades que organiza el departamento.          Estas actividades son: servicios sociales, prácticas profesionales, conferencias,          eventos y la convocatoria de ingreso a la carrera.       </font>  	<font color=\"#ffffff\"><br /></font> 	  </td>   </tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> </font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">Profesores</font> <font color=\"#ffffff\"><br /><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">La carrera cuenta con personal académico especializado en la rama de las telecomunicaciones. Para saber más acerca de los profesores y las materias que ellos imparten, consulte esta sección. </font>  	<font color=\"#ffffff\"><br /></font> </td></tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> </font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">Proyectos</font> <font color=\"#ffffff\"><br /><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">Como tarea fundamental del Departamento de Telecomunicaciones está la creación de proyectos en las distintas áreas de desarrollo de las telecomunicaciones</font></td></tr></tbody></table>','',1,0,0,0,'2009-03-31 14:59:40',62,'','2009-08-11 19:18:00',62,0,'0000-00-00 00:00:00','2009-03-31 14:59:40','0000-00-00 00:00:00','','','show_title=1\nlink_titles=0\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',5,0,16,'','',0,16788,'robots=\nauthor='),(4,'Ubicación','ubicacion','','<table border=\"0\" cellspacing=\"0\" cellpadding=\"4\" width=\"90%\"><tbody><tr><td height=\"129\" valign=\"bottom\"><div align=\"center\"><font color=\"#f5f5f5\"><strong>Departamento de Telecomunicaciones</strong></font></div>      </td> <td rowspan=\"2\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/ubicacion.gif\" border=\"0\" alt=\"Mapa CU\" width=\"400\" /> </td> </tr> <tr> <td align=\"center\" valign=\"top\"> Edificio Valdéz Vallejo<br /> 3er Piso<br /> Circuito Interior<br /> Ciudad Universitaria<br /> Delegación Coyoacán<br /> C.P. 04510<br /> México D.F.<br /> Teléfono 56 22 30 64 </td></tr></tbody></table>','',1,0,0,0,'2009-04-16 13:24:12',62,'','2009-06-02 14:18:08',62,0,'0000-00-00 00:00:00','2009-04-16 13:24:12','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',5,0,5,'Ubicación Telecomunicaciones, UNAM, Valdéz Vallejo','Ubicación del departamento de Telecomunicaciones.',0,1955,'robots=\nauthor='),(5,'Plan de Estudios','plan-de-estudios','','<h1 align=\"center\">Plan de Estudios <br /></h1><p>&nbsp;</p> <table border=\"0\" align=\"center\" bgcolor=\"#ffffff\"><tbody><tr> <td> <img src=\"images/plan%20estudios.png\" border=\"0\" alt=\"Plan de estudios\" width=\"680\" height=\"878\" /> </td> </tr></tbody></table>','',1,0,0,0,'2009-04-17 15:39:58',62,'','2009-05-08 12:45:32',62,0,'0000-00-00 00:00:00','2009-04-17 15:39:58','0000-00-00 00:00:00','','','show_title=0\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=',9,0,15,'','',0,849,'robots=\nauthor='),(11,'Directorio','directorio','','<p><font face=\"Trebuchet MS\" size=\"6\" color=\"#ccffff\">Directorio</font></p><p> <!--[if gte mso 9]><xml>  <w:WordDocument>   <w:View>Normal</w:View>   <w:Zoom>0</w:Zoom>   <w:TrackMoves/>   <w:TrackFormatting/>   <w:PunctuationKerning/>   <w:ValidateAgainstSchemas/>   <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>   <w:IgnoreMixedContent>false</w:IgnoreMixedContent>   <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>   <w:DoNotPromoteQF/>   <w:LidThemeOther>EN-US</w:LidThemeOther>   <w:LidThemeAsian>X-NONE</w:LidThemeAsian>   <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>   <w:Compatibility>    <w:BreakWrappedTables/>    <w:SnapToGridInCell/>    <w:WrapTextWithPunct/>    <w:UseAsianBreakRules/>    <w:DontGrowAutofit/>    <w:SplitPgBreakAndParaMark/>    <w:DontVertAlignCellWithSp/>    <w:DontBreakConstrainedForcedTables/>    <w:DontVertAlignInTxbx/>    <w:Word11KerningPairs/>    <w:CachedColBalance/>   </w:Compatibility>   <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>   <m:mathPr>    <m:mathFont m:val=\"Cambria Math\"/>    <m:brkBin m:val=\"before\"/>    <m:brkBinSub m:val=\"--\"/>    <m:smallFrac m:val=\"off\"/>    <m:dispDef/>    <m:lMargin m:val=\"0\"/>    <m:rMargin m:val=\"0\"/>    <m:defJc m:val=\"centerGroup\"/>    <m:wrapIndent m:val=\"1440\"/>    <m:intLim m:val=\"subSup\"/>    <m:naryLim m:val=\"undOvr\"/>   </m:mathPr></w:WordDocument> </xml><![endif]--><!--[if gte mso 9]><xml>  <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"   DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"   LatentStyleCount=\"267\">   <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>   <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>   <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\"/>   <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>   <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\"/>   <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>   <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>   <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>   <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>   <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>   <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>   <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>   <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>   <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>   <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>   <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>   <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>   <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>   <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>   <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>   <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>   <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>   <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>   <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>   <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>   <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>   <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>   <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>   <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>   <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light List\"/>   <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>   <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>   <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>   <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>   <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>   <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>   <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>   <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>   <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Dark List\"/>   <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>   <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>   <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>   <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>   <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>   <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>   <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>   <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>   <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>   <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>   <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>   <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>   <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>   <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>   <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>   <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>   <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>   <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>   <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"    UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>   <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>   <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>  </w:LatentStyles> </xml><![endif]--> <!--  /* Font Definitions */  @font-face 	{font-family:\"Cambria Math\"; 	panose-1:2 4 5 3 5 4 6 3 2 4; 	mso-font-charset:0; 	mso-generic-font-family:roman; 	mso-font-pitch:variable; 	mso-font-signature:-1610611985 1107304683 0 0 415 0;} @font-face 	{font-family:Calibri; 	panose-1:2 15 5 2 2 2 4 3 2 4; 	mso-font-charset:0; 	mso-generic-font-family:swiss; 	mso-font-pitch:variable; 	mso-font-signature:-520092929 1073786111 9 0 415 0;}  /* Style Definitions */  p.MsoNormal, li.MsoNormal, div.MsoNormal 	{mso-style-unhide:no; 	mso-style-qformat:yes; 	mso-style-parent:\"\"; 	margin-top:0in; 	margin-right:0in; 	margin-bottom:10.0pt; 	margin-left:0in; 	line-height:115%; 	mso-pagination:widow-orphan; 	font-size:11.0pt; 	font-family:\"Calibri\",\"sans-serif\"; 	mso-fareast-font-family:Calibri; 	mso-bidi-font-family:\"Times New Roman\"; 	mso-ansi-language:ES-MX;} span.style1 	{mso-style-name:style1; 	mso-style-unhide:no;} .MsoChpDefault 	{mso-style-type:export-only; 	mso-default-props:yes; 	font-size:10.0pt; 	mso-ansi-font-size:10.0pt; 	mso-bidi-font-size:10.0pt; 	mso-ascii-font-family:Calibri; 	mso-fareast-font-family:Calibri; 	mso-hansi-font-family:Calibri;} @page Section1 	{size:8.5in 11.0in; 	margin:1.0in 1.0in 1.0in 1.0in; 	mso-header-margin:.5in; 	mso-footer-margin:.5in; 	mso-paper-source:0;} div.Section1 	{page:Section1;} --> <!--[if gte mso 10]> <style>  /* Style Definitions */  table.MsoNormalTable 	{mso-style-name:\"Tabla normal\"; 	mso-tstyle-rowband-size:0; 	mso-tstyle-colband-size:0; 	mso-style-noshow:yes; 	mso-style-priority:99; 	mso-style-qformat:yes; 	mso-style-parent:\"\"; 	mso-padding-alt:0in 5.4pt 0in 5.4pt; 	mso-para-margin:0in; 	mso-para-margin-bottom:.0001pt; 	mso-pagination:widow-orphan; 	font-size:11.0pt; 	font-family:\"Calibri\",\"sans-serif\"; 	mso-ascii-font-family:Calibri; 	mso-ascii-theme-font:minor-latin; 	mso-fareast-font-family:\"Times New Roman\"; 	mso-fareast-theme-font:minor-fareast; 	mso-hansi-font-family:Calibri; 	mso-hansi-theme-font:minor-latin; 	mso-bidi-font-family:\"Times New Roman\"; 	mso-bidi-theme-font:minor-bidi;} </style> <![endif]-->  </p><p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><strong><span style=\"font-size: 14pt; font-family: \'Times New Roman\',\'serif\'\">Departamento de </span></strong></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><strong><span style=\"font-size: 14pt; font-family: \'Times New Roman\',\'serif\'\">Ingeniería en </span></strong></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><strong><span style=\"font-size: 14pt; font-family: \'Times New Roman\',\'serif\'\">Telecomunicaciones</span></strong><span style=\"font-size: 14pt; font-family: \'Times New Roman\',\'serif\'\"></span></p>  <p style=\"margin-bottom: 0.0001pt\" class=\"MsoNormal\"><span class=\"style1\"><span style=\"font-size: 12pt; line-height: 115%; font-family: \'Times New Roman\',\'serif\'\"> </span></span></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><strong><span style=\"font-size: 12pt; font-family: \'Times New Roman\',\'serif\'\">Jefe del Departamento:</span></strong></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><span style=\"font-size: 12pt; font-family: \'Times New Roman\',\'serif\'\">Dr. Víctor García Garduño</span></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><strong><span style=\"font-size: 12pt; font-family: \'Times New Roman\',\'serif\'\">Coordinador de la carrera:</span></strong></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><span style=\"font-size: 12pt; font-family: \'Times New Roman\',\'serif\'\">Dr. Miguel Moctezuma Flores</span></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><strong><span style=\"font-size: 12pt; font-family: \'Times New Roman\',\'serif\'\">Coordinador de Laboratorios:</span></strong></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><span style=\"font-size: 12pt; font-family: \'Times New Roman\',\'serif\'\">M. en I. Federico Damián Vargas Sandoval</span></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><span style=\"font-size: 12pt; font-family: \'Times New Roman\',\'serif\'\"> </span></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',\'serif\'\">Responsables de áreas del conocimiento:</span></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',\'serif\'\"> </span></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',\'serif\'\">REDES DE TELECOMUNICACIONES</span></p>  <p style=\"line-height: normal\" class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',\'serif\'\">Dr. Javier Gómez Castellanos</span></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',\'serif\'\">SEÑALES Y SISTEMAS DE RADIOCOMUNICACIONES</span></p>  <p style=\"line-height: normal\" class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',\'serif\'\">Dr. Víctor García Garduño</span></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',\'serif\'\">TECNOLOGÍAS DE RADIOFRECUENCIA, ÓPTICAS Y MICROONDAS</span></p>  <p style=\"line-height: normal\" class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',\'serif\'\">Dr. Serguei Khotiaintsev Duskriatchenko</span></p>  <p style=\"margin-bottom: 0.0001pt; line-height: normal\" class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',\'serif\'\">ADMINISTRACIÓN Y NORMALIZACIÓN</span></p>  <p style=\"line-height: normal\" class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',\'serif\'\">Ing. Jesús Reyes García</span></p>  <p>&nbsp;</p>','',1,0,0,0,'2009-05-08 02:50:21',62,'','2010-06-22 19:25:18',62,0,'0000-00-00 00:00:00','2009-05-08 02:50:21','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=',3,0,13,'','',0,767,'robots=\nauthor='),(6,'Descripción de la carrera.','descripcion-de-la-carrera','','<font size=\"2\" color=\"#ffffff\"><strong>DESCRIPCION DE LA CARRERA<br /> <br /> <br /> </strong></font><font size=\"2\" color=\"#ccffcc\">El Ingeniero en Telecomunicaciones es el profesionista que aplica conocimientos de las ciencias básicas - Física y Matemáticas-, así cómo los correspondientes a señales, sistemas, electrónica y computación para analizar, diseñar, planear, organizar, producir, instalar, desarrollar, además de mantener en operación y administrar redes y sistemas de telecomunicaciones, contribuyendo así a satisfacer las necesidades del país y a propiciar el desarrollo en esta área, considerada como prioritaria para el presente y el futuro de México.</font> <font face=\"Tahoma\" size=\"3\" color=\"#ccffcc\"> <p align=\"justify\">&nbsp;</p> </font> <p align=\"justify\"><font size=\"2\" color=\"#ccffcc\">Entre las actividades que realiza están:</font></p><ul><li><font size=\"2\" color=\"#ccffcc\">Modelar, simular,     construir, operar y mantener las redes de comunicaciones.</font></li></ul><ul><li><font size=\"2\" color=\"#ccffcc\">Innovar y evaluar las técnicas     de comunicaciones alámbricas e inalámbricas.</font></li></ul><ul><li><font size=\"2\" color=\"#ccffcc\">Diseñar, planificar y     administrar sistemas de radiocomunicación.</font></li></ul><ul><li><font size=\"2\" color=\"#ccffcc\">Generar tecnología en     Telecomunicaciones.</font></li></ul><ul><li><font size=\"2\" color=\"#ccffcc\">Integrar y coordinar     personas y grupos interdisciplinarios.</font></li></ul><p align=\"justify\"><font face=\"Tahoma\" size=\"3\" color=\"#ccffcc\">Diseñar e instalar redes     de teleinformática.</font></p> <font face=\"Tahoma\" size=\"3\" color=\"#ccffcc\">  </font>      <p align=\"justify\"><font size=\"2\" color=\"#ccffcc\">Su trabajo lo lleva a cabo bajo condiciones que le demandan gran concentración, y para dar solución a los problemas que le plantea el ejercicio profesional, hace uso del análisis matemático y físico.</font></p> <font face=\"Tahoma\" size=\"3\" color=\"#ccffcc\">  </font> <p align=\"justify\"><font size=\"2\" color=\"#ccffcc\">Generalmente, se desempeña interactuando con profesionistas de disciplinas afines como ingenieros eléctricos, mecánicos, industriales, en computación, en comunicaciones, licenciados en informática, además de administradores y economistas, entre otros.</font></p> <font face=\"Tahoma\" size=\"3\" color=\"#ccffcc\">  </font> <p align=\"justify\"><font size=\"2\" color=\"#ccffcc\">Cabe señalar que uno de los principales beneficios que aporta la Ingeniería en Telecomunicaciones está dirigido a la población marginada y, en especial, a la de las áreas rurales, cuyas características geográficas dificultan su acceso y repercuten en los altos costos de la infraestructura carretera. Así, esta disciplina incide tanto en la integración social de estas comunidades, como en el mejoramiento de su nivel educativo, propiciando su desarrollo comercial y, en general, manteniéndolas informadas de lo que ocurre en el mundo.</font></p>','',-2,0,0,0,'2009-04-21 14:10:37',62,'','2009-05-07 01:51:32',62,0,'0000-00-00 00:00:00','2009-04-21 14:10:37','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',2,0,0,'','',0,536,'robots=\nauthor='),(7,'Perfil del egresado','perfil-del-egresado','','<p><span class=\"NuTitle\"><strong>Perfil del Egresado </strong></span></p>\r\n<p> </p>\r\n<p><span class=\"NuParagraph\"> El egresado de la carrera de Ingeniería en Telecomunicaciones deberá               contar con conocimientos sólidos de los principios básicos de la física,               las matemáticas y la química. También deberá tener un dominio profundo               de los conceptos fundamentales de las comunicaciones, la computación,               la electrónica y de las áreas específicas del campo de las               telecomunicaciones. Será abierto al autoaprendizaje y con capacidad de               desempeño en ambientes multidisciplinarios. En la formación de este               profesional se considera el aspecto socio-humanístico que lo ubica en               su entorno social, para formarle un sentido de responsabilidad y               competitividad.<br /> Parte importante de su formación la constituye su actitud emprendedora                 y de liderazgo que le permitirá ser promotor del cambio frente a la                 competitividad internacional, además tendrá plena conciencia de la                 problemática nacional en este campo y de las perspectivas que se                 presentarán en el futuro. Dada la necesidad de modernizar los                 servicios en forma integral, deberá contar con una buena formación en                 recursos humanos, aunada a un gran sentido de creatividad,                 a fin de: <br />\r\n<blockquote>-Establecer posibles soluciones a una problemática dada en el área                 de las telecomunicaciones.</blockquote>\r\n<blockquote>-Observar los fenómenos físicos, que lo motiven a desarrollar                 técnicas y líneas de investigación en las diversas disciplinas de                 las telecomunicaciones.</blockquote>\r\n<blockquote>-Participar en cambios tecnológicos.</blockquote>\r\nLos egresados tendrán una formación completa de: transmisión de ondas,                 sistemas y señales de comunicaciones, telefonía digital, microondas,                 redes de datos, que les permitirá aplicarlos para planear, organizar,                 implantar, operar y administrar redes y sistemas de esta área,                 brindar mantenimiento a los sistemas, y dirigir y administrar proyectos.                 También tendrán las herramientas necesarias para generar tecnología y                 participar en la investigación. Frente a la competitividad, la                 formación continua deberá ser una obligación evidente, de tal forma                 que los egresados tengan mejores oportunidades para desempeñarse                 durante su vida profesional. </span></p>','',1,24,0,47,'2009-04-21 14:32:32',62,'','2010-11-05 03:08:53',62,0,'0000-00-00 00:00:00','2009-04-21 14:32:32','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=\nshow_section=\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',4,0,8,'','',0,822,'robots=\nauthor='),(64,'Misión y Visión','mision-y-vision','','<p><span class=\"NuTitle\"> <strong>Misión </strong> </span></p>\r\n<p><span class=\"NuParagraph\"> Formar de manera integral recursos humanos en Ingeniería en               Telecomunicaciones, competitivos nacional e internacionalmente,               con habilidades, actitudes y valores que les permitan un desempeño               pleno en el ejercicio profesional, la investigación y la docencia;               con capacidad para actualizar continuamente sus conocimientos y               poseedores de una mercada formación humanista que les dé sentido a               sus actos y compromisos con la Universidad y con México. </span></p>\r\n<p> </p>\r\n<p><span class=\"NuTitle\"> <strong>Visión </strong> </span></p>\r\n<p><span class=\"NuParagraph\"> La carrera de Ingeniero en Telecomunicaciones de la Facultad de              Ingeniería, deberá ser líder en la formación de profesionales en              ingeniería de su disciplina en el país, donde se generen conocimientos              al realizar investigación que impacte en la generación de conocimientos              y en el óptimo desarrollo nacional, con aportaciones a la cultura y              al desarrollo de capacidades con sentido humanista y social. </span></p>\r\n<p> </p>','',1,24,0,47,'2010-11-05 03:19:00',62,'','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00','2010-11-05 03:19:00','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',1,0,1,'','',0,725,'robots=\nauthor='),(8,'Campo de Trabajo','campo-de-trabajo','','<p><span class=\"NuTitle\"> <strong>Campo y Mercado de Trabajo Actual y Potencial </strong> </span> <br /> <span class=\"NuParagraph\"> </span></p>\r\n<p><span class=\"NuParagraph\">Dado el continuo desarrollo de las compañías de telecomunicaciones,                 el campo de trabajo actual y potencial del ingeniero en                 telecomunicaciones es muy amplio e incluye, entre otras, las                 siguientes áreas: sistemas telefónicos, satelitales, de radio, de                 microondas, y los basados en fibra óptica, así como redes digitales                 para telecomunicaciones y para computadoras. Este profesionista                 trabaja en ámbitos relacionados con la electrónica, el control,                 las telecomunicaciones y la computación, tanto en el sector                 público —secretarías de Estado, organismos descentralizados,                 estatales y paraestatales—, como en el privado, en empresas                 especializadas de consultoría, de integración, de instalación y                 mantenimiento. Así, su preparación lo capacita para desarrollarse                 en áreas directivas y de desarrollo, entre otras.                 <br /> De igual manera, presta sus servicios en instituciones                 docentes y en las que se dedican a realizar proyectos de                 investigación pura y aplicada. El egresado de esta carrera                 juega un papel primordial, ya que está capacitado, no sólo para                 diseñar e instalar equipo de telecomunicaciones, sino además,                 para impulsar el desarrollo tecnológico y científico en este                 campo. Dada su preparación, el recién egresado mantiene una alta                 expectativa de contratación a corto plazo, aunque la competencia                 del mercado laboral le demanda su titulación y dominio pleno del                 inglés. Es importante mencionar que puede ejercer de manera                 independiente, después de algunos años de haber iniciado su                 actividad profesional. </span></p>','',1,24,0,47,'2009-04-21 14:44:45',62,'','2010-11-05 02:07:00',62,0,'0000-00-00 00:00:00','2009-04-21 14:44:45','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=\nshow_section=\nlink_section=\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',3,0,9,'','',0,933,'robots=\nauthor='),(9,'Requisitos de Ingreso','requisitos-de-ingreso','','<p><span class=\"NuTitle\"> <strong>Requisitos Académicos para Ingresar </strong> </span></p>\r\n<p><br /> <span class=\"NuParagraph\"> Alumnos que ingresaron al Bachillerato de la Escuela Nacional         Preparatoria y del Colegio de Ciencias y Humanidades de la UNAM, y         cuyos números de cuenta corresponden al ingreso a los ciclos escolares         1996-97 y anteriores:\r\n<blockquote>•	Haber concluido el Bachillerato.</blockquote>\r\n<blockquote>•	Solicitar inscripción de acuerdo con el reglamento                 aprobado en 1973 y los instructivos correspondientes.</blockquote>\r\nAlumnos que ingresaron al Bachillerato de la Escuela Nacional                 Preparatoria y del Colegio de Ciencias y Humanidades de la UNAM                 a partir de julio de 1997:\r\n<blockquote>•	Que hayan concluido sus estudios en un máximo de tres años y                 con un promedio mínimo de nueve, tendrán el ingreso a la carrera                 y plantel de su preferencia.</blockquote>\r\n<blockquote>•	Que hayan concluido sus estudios en un máximo de cuatro años,                 contados a partir de su ingreso, con un promedio mínimo de siete                 serán seleccionados, una vez establecido el cupo para cada carrera                 o plantel y la oferta de ingreso establecida para el concurso de                 selección.</blockquote>\r\n<blockquote>•	Que hayan concluido sus estudios en un plazo mayor a cuatro años                 y con un promedio mínimo de siete, podrán ingresar mediante                 concurso de selección.</blockquote>\r\nAspirantes que hayan concluido el Bachillerato, en otras                 instituciones, con promedio mínimo de siete podrán presentarse                 al concurso de selección y se les asignará carrera y plantel, de                 acuerdo con la calificación que hayan obtenido en el concurso y                 hasta el límite del cupo establecido.                 El Consejo Técnico de la Facultad ha estipulado como                 requisito adicional obligatorio para los alumnos de primer                 ingreso la presentación de un examen diagnóstico con fines                 estadísticos y además establecer su nivel de conocimientos de                 matemáticas, física y química. </span> <br /> <br /></p>','',1,24,0,47,'2009-04-21 14:48:42',62,'','2010-11-05 02:11:37',62,0,'0000-00-00 00:00:00','2009-04-21 14:48:42','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',5,0,10,'','',0,912,'robots=\nauthor='),(10,'Antena','antena','','<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"298\" height=\"75\"><param name=\"width\" value=\"298\" /><param name=\"height\" value=\"75\" /><param name=\"src\" value=\"images/antena.swf\" /><embed type=\"application/x-shockwave-flash\" width=\"298\" height=\"75\" src=\"images/antena.swf\"></embed></object>','',1,0,0,0,'2009-04-21 16:00:23',62,'','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00','2009-04-21 16:00:23','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=',1,0,14,'','',0,0,'robots=\nauthor='),(12,'Historia','historia','','<table border=\"0\" cellspacing=\"0\" cellpadding=\"4\" width=\"90%\" align=\"left\"><tbody><tr><td><font face=\"Trebuchet MS\" size=\"6\" color=\"#ffffff\">Historia</font> 	<font color=\"#ffffff\"><br /><br /></font>       </td>   </tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 		</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">1992</font>     	<font color=\"#ffffff\"><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">		         <li>Se crea la carrera de Ingeniero en Telecomunicaciones.</li> 	<li>En el mes de septiembre ingresa la primera generación (16 alumnos).</li> 	 </font> 	<font color=\"#ffffff\"><br /></font>       </td></tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 		</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">1994</font>     	<font color=\"#ffffff\"><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">		         <li>Se aprueba la construcción y equipamiento de laboratorios mediante el Programa UNAM-BID.</li> 	<li>Se realizan modificaciones al Plan de estudios, acorde a las carreras de Ing. en Eléctrico-Electrónico y de Computación.</li> 	 </font> 	<font color=\"#ffffff\"><br /></font>       </td></tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 		</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">1995</font>     	<font color=\"#ffffff\"><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">		         <li>El 7 de septiembre concluye sus estudios la primera generación de Ingenieros en Telecomunicaciones.</li> 	<li>Se inicia la construcción de las instalaciones del Departamento de Ing. en Telecomunicaciones.</li> 	<li>El Consejo técnico aprueba las modificaciones al Plan de estudios.</li> 	</font> 	<font color=\"#ffffff\"><br /></font>       </td></tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 		</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">1996</font>     	<font color=\"#ffffff\"><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">		         <li>El 25 de enero se inauguran las instalaciones del Departamento de Telecomunicaciones.</li> 	<li>Ingresa la quinta generación (23 alumnos).</li> 	 </font> 	<font color=\"#ffffff\"><br /></font>       </td></tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 		</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">2001</font>     	<font color=\"#ffffff\"><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">		         <li>El Consejo de Acreditación sobre la Enseñanza de la Ingeniería, A.C., CACEI, otorga acreditación al Programa de Ingeniero en Telecomunicaciones.</li> 	 </font> 	<font color=\"#ffffff\"><br /></font>       </td></tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 		</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">2002</font>     	<font color=\"#ffffff\"><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">		         <li>Se preparan las modificaciones a planes y programas de estudios, con nuevas áreas del conocimiento en Redes,<br /> 	    Comunicaciones inalámbricas y Normatividad.</li> 	<li>Egresa la 13ma generación.</li> 	<li>Inicia el Programa Doctoral Conjunto en Telecomunicaciones F.I. - Universidad Politécnica de Madrid.</li> 	</font> 	</td></tr></tbody></table>','',-2,0,0,0,'2009-05-08 02:52:00',62,'','2009-06-12 16:40:42',62,0,'0000-00-00 00:00:00','2009-05-08 02:52:00','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',3,0,0,'','',0,398,'robots=\nauthor='),(13,'Funciones','funciones','','<table border=\"0\" cellspacing=\"0\" cellpadding=\"6\" width=\"90%\" align=\"left\"><tbody><tr><td colspan=\"2\"><font face=\"Trebuchet MS\" size=\"6\" color=\"#ffffff\">Funciones</font> <font color=\"#ffffff\"><br /><br /></font>   </td></tr>  <tr><td width=\"14\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Impartir y coordinar académica y administrativamente la carrera de Ingeniería en Telecomunicaciones. 	</font></td>   </tr>   <tr>     <td width=\"14\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Actualizar los planes y programas de estudio a su cargo y, en su caso, proponer las modificaciones pertinentes, así  	como crear nuevas asignaturas y áreas afines, acordes con los avances de la ciencia y la técnica y con el desarrollo  	nacional.</font></td>   </tr>   <tr>     <td width=\"14\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Desarrollar actividades tendientes a la superación y actualización de su personal docente que propicien el mejoramiento  	del proceso enseñanza - aprendizaje en las asignaturas a su cargo, conforme a las políticas académicas de la facultad. 	</font></td>   </tr>   <tr>     <td width=\"14\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Mantener y fomentar las relaciones de intercambio con dependencias universitarias, instituciones de educacion superior,  	asociaciones y colegios profesionales y de instituciones afines, tanto nacionales como extranjeras. 	</font></td>   </tr>   <tr>     <td width=\"14\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Promover la realizacion de conferencias seminarios, exposiciones, cursos y demás actividades tendientes a la difusión  	científica y técnica en las disciplinas a su cargo. 	</font></td>   </tr>   <tr>     <td width=\"14\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Realizar asesorías y actividades de investigación tecnológica en las disciplinas a su cargo. 	</font></td>   </tr>   <tr> 	<td width=\"14\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Llevar a cabo la impartición de clases de teoría y laboratorio, coordinar a los profesores y de vigilar el buen  	funcionamiento de los laboratorios y sus equipos.  	</font></td></tr></tbody></table>','',1,0,0,0,'2009-05-08 02:53:27',62,'','2009-06-12 16:41:53',62,0,'0000-00-00 00:00:00','2009-05-08 02:53:27','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',3,0,12,'','',0,758,'robots=\nauthor='),(14,'Investigadores','investigadores','','<font face=\"Trebuchet MS\" size=\"6\" color=\"#ffffff\">Investigadores</font>       <font color=\"#ffffff\"><br /><br /><br /></font>                       	  	<table border=\"0\"><tbody><tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Salvador Landeros Ayala,Ph. D.</font> <font color=\"#ffffff\"><br /><br /></font> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	FI-UNAM,<br /> 	Redes y Sistemas de Telecomunicaciones.<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/landeros.htm\"> 	</a></font><br /></td></tr>  	<tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Víctor García Garduño, Ph. D.</font> <font color=\"#ffffff\"><br /><br /></font> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Université de Rennes, France. Procesamiento Digital de Señales,<br /> 	Comprensión y Transmisión de Vídeo Digital.<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/victor.htm\"><br /></a></font></td></tr>	  	<tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Miguel Moctezuma Flores, Ph. D.</font> <font color=\"#ffffff\"><br /><br /></font> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	École Nationale Supérieure des Télécommunications, France,<br /> 	Procesamiento Digital de Señales e Imágenes, Percepción Remota.<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/moctezuma.htm\"> 	</a></font><br /></td></tr>	  	<tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Rodolfo Neri Vela, Ph. D.</font> 	<font color=\"#ffffff\"><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Brimingham University, Inglaterra,<br /> 	Antenas y Sistemas de Comunicaciones Vía Satélite.<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/neri.htm\"> 	</a></font><br /></td></tr> 	 	<tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Bohumil Psenicka, Ph. D.</font> <font color=\"#ffffff\"><br /><br /></font> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Universidad de Praga,<br /> 	Procesamiento Digital de Señales y Filtrado.<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/bohumil.htm\"> 	</a></font><br /></td></tr> 	 	<tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Vladimir Andreevich Svirid, Ph. D.</font> <font color=\"#ffffff\"><br /><br /></font> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Instituto Politécnico de Kiev, Ucrania,<br /> 	Fibra Óptica.<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/svirid.htm\"> 	</a></font><br /></td></tr>  	<tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Oleksandr Martynyuk G., Ph. D</font> <font color=\"#ffffff\"><br /><br /></font> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Instituto Politécnico de Kiev, Ucrania,<br /> 	Microondas y Satélites.<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/martynyuk.htm\"> 	</a></font><br /></td></tr>  	<tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Serguei Khontiaintsev D., Ph D.</font> <font color=\"#ffffff\"><br /><br /></font> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Instituto Politécnico de Kiev, Ucrania,<br /> 	Fibra Óptica<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/serguei.htm\"> 	</a></font><br /></td></tr>  	<tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Gideon Levita Rahel, Ph. D.</font> 	<font color=\"#ffffff\"><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Berkeley, California, USA,<br /> 	Sistemas de Radar y de Comunicaciones.<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font color=\"#ffffff\"> </font></td></tr>  <tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Dra. Fatima Moumtadi</font> <font color=\"#ffffff\"><br /><br /></font> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Universidad Técnica de Comunicaciones e Informática de Moscú, Rusia.<br /> 	Radiofrecuencia, Radiodifusión: Sonora y Televisión, Televisión digital, Microondas y Satélites<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/fatima.htm\"> 	</a></font><br /></td></tr>  	<tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Federico Vargas Sandoval, M. en I.</font> <font color=\"#ffffff\"><br /><br /></font> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	FI - UNAM,<br /> 	Sistemas de Comunicación y Redes de Telefonía.<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/federico.htm\"> 	</a></font><br /></td></tr>  	<tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Jesús Reyes García, Ing.</font> <font color=\"#ffffff\"><br /><br /></font> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	FI - UNAM,<br /> 	Comunicaciones Digitales y Redes de Comunicación.<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/jesus.htm\"> 	</a></font><br /></td></tr>  	<tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Mario A. Ibarra Pereyra, Ing.</font> <font color=\"#ffffff\"><br /><br /></font> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	FI - UNAM,<br /> 	Redes de Telefonía y Sistemas de Comunicación.<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/ibarra.htm\"> 	</a></font><br /></td></tr>  	<tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">J. Fernando Solórzano Palomares, Ing.</font> <font color=\"#ffffff\"><br /><br /></font> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	FI - UNAM,<br /> 	Redes de Telefonía y Sistemas de Comunicación.<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/solorzano.htm\"> 	</a></font><br /></td></tr>  <tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Javier Gómez Castellanos, Ph. D.</font><font color=\"#ffffff\"><br /><br /></font>  	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Columbia University, New York, USA<br /> 	</font></td><td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/JavierGomez%20.html\"> 	</a></font><br /></td></tr>  <tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Víctor Ragel Licea, Ph. D.</font> <font color=\"#ffffff\"><br /><br /></font>  	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Universidad de Sheffield, Inglaterra,<br /> 	Ingeniería en Telecomunicaciones<br /><br /></font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/rangel.htm\"> 	</a></font><br /></td></tr> 	 <tr><td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 	<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Ignacio Flores Llamas, Ph. D.</font> <font color=\"#ffffff\"><br /></font>  	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><br /> 	</font></td> 	<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/llamas.htm\"> 	</a></font><br /></td></tr>  	<tr> 		<td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 		<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">José Luis García García, M. en I.</font> 		<font color=\"#ffffff\"><br /><br /></font> 		 		<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><br /> 		</font></td> 		<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/garciag.htm\"> 		</a></font><br /></td> 	</tr>  	<tr> 		<td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 		<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Dr. José María Matías Maruri</font> 		<font color=\"#ffffff\"><br /><br /></font> 		 		<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><br /> 		</font></td> 		<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/matiasm.htm\"> 		</a></font><br /></td> 	</tr> 	 	<tr> 		<td width=\"14\" valign=\"top\"><font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /></font></td> 		<td width=\"400\"><font face=\"Arial, Helvetica, sans-serif\" size=\"4\" color=\"#ffffff\">Dr. Julio César Tinoco Magaña</font> 		<font color=\"#ffffff\"><br /><br /></font> 		 		<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><br /> 		</font></td> 		<td width=\"200\" valign=\"top\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><a href=\"http://telecom.fi-b.unam.mx/tinocom.htm\"> 		</a></font><br /></td></tr></tbody></table>','',1,0,0,0,'2009-05-08 02:54:53',62,'','2009-06-12 16:47:27',62,0,'0000-00-00 00:00:00','2009-05-08 02:54:53','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',4,0,11,'','',0,920,'robots=\nauthor='),(15,'Consejo Tecnico','consejo-tecnico','','<p><font face=\"Trebuchet MS\" size=\"6\" color=\"#ffffff\">CONSEJO TÉCNICO</font></p><p><font color=\"#ffffff\"><br /></font>       <font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">       DIVISIÓN DE INGENIERÍA ELÉCTRICA</font></p><p><font color=\"#ffffff\"><br />FACULTAD DE INGENIERÍA<br />UNAM   <br /><br /><br /><br /><br /></font>      </p><p><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"4\" width=\"90%\" align=\"left\">    <tbody><tr><td>  <img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /><a href=\"http://telecom.fi-b.unam.mx/PropOpciTitu.htm\" target=\"Contenido\"> 	<font face=\"Trebuchet MS\" size=\"4\"> PROPUESTA DE OPCIONES DE TITULACION</font></a><br />                     	<br /><br />       </td>   </tr>  <tr><td> <img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 	<font face=\"Trebuchet MS\" size=\"4\"> MINUTA CONSEJO TECNICO 19 DE AGOSTO</font><br />                     	       </td><td> <font face=\"arial, helvetica, sans-serif\" size=\"2\"> <a href=\"http://telecom.fi-b.unam.mx/Asuntos%20a%20tratar%20en%20C.T..zip\">Descargar</a></font></td></tr></tbody></table></font></p>','',1,0,0,0,'2009-05-08 02:55:35',62,'','2009-06-12 16:48:40',62,0,'0000-00-00 00:00:00','2009-05-08 02:55:35','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',5,0,10,'','',0,373,'robots=\nauthor='),(16,'Colegio de Profesores','colegio-de-profesores','','<table border=\"0\" cellspacing=\"0\" cellpadding=\"4\" width=\"90%\" align=\"left\"><tbody><tr><td><font face=\"Trebuchet MS\" size=\"6\" color=\"#ffffff\">COLEGIO DE PROFESORES</font><font color=\"#ffffff\"><br /></font>       <font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">PROPUESTA DE OPCIONES DE TITULACIÓN<br />       DIVISIÓN DE INGENIERÍA ELÉCTRICA<br />FACULTAD DE INGENIERÍA<br />UNAM</font>        	<font color=\"#ffffff\"><br /><br /></font>       </td>   </tr>  <tr><td>     	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> Como respuesta al compromiso que tiene la Facultad de Ingeniería y la Universidad en general de incrementar los índices de<br /> titulación de sus egresados, la División de Ingeniería Eléctrica ha trabajado estos últimos meses en la elaboración de nuevas<br />          formas de titulación y ampliar con ello el abanico de opciones.<br /><br /> Para esta propuesta se han analizado los esquemas de titulación de diferentes facultades de la Universidad Nacional Autónoma<br />         de México<br /><br />        	</font>         <font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">Objetivos:</font><font color=\"#ffffff\"><br /><br /></font> 	       </td></tr>  <tr><td>      	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">		         <li>Proporcionar a los estudiantes otras alternativas de titulación, cumpliendo con el Reglamento General de Exámenes de la<br />     UNAM (capítulo IV, artículos 18, 19, 20 y 21) y atendiendo a las recomendaciones complementarias (C.4.23, C.4.24 y C.4.25)<br />             que establece el CACEI en su marco de referencia</li> 	<li>Fomentar el interés en los estudios de posgrado</li>         <li>Procurar una transición armónica entre los estudios profesionales y de posgrado</li>         <li>Establecer un mecanismo fluido y permanente que permita la titulación de los alumnos con excelente calidad como hasta hoy<br />             día, pero al ritmo que la realidad actual lo demanda.</li><br /><br /> Las opciones de titulación que se plantean son cinco y para todas ellas se deben haber cumplido todos los requisitos establecidos<br /> en la legislación y reglamentación correspondiente 	 </font> 	<font color=\"#ffffff\"><br /><br /></font>       </td></tr>  <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 	</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">OPCIÓN DE TITULACIÓN POR CRÉDITOS DE POSGRADO:</font><font color=\"#ffffff\"><br /><br /></font>     	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">Requisitos:<br /><br />                a) En la licenciatura<br /><br />		         <li>Haber completado todos los créditos y requisitos de la carrera en el número regular de semestres (15 semestres) que marca el<br />             plan de estudios correspondiente.</li> 	<li>Promedio mínimo de 8.5</li> 	<li>En esta opción, la primera prueba escrita del examen profesional se acreditará con la presentación de un trabajo escrito<br />     satisfactorio de la asignatura de Seminario,desarrollado bajo la guía del profesor designado como director del seminario,<br />             y siempre y cuando la calificación obtenida sea mínimo de 9.</li><br /><br />                b) En el posgrado<br /><br />         <li>Completar (en un semestre) el 100% de créditos correspondientes a un semestre escolar como estudiante de tiempo completo<br />             de posgrado, con inscripción en el semestre inmediato a la terminación del plan de estudios de licenciatura.</li> 	<li>En esta opción, la segunda prueba escrita del examen profesional se acreditará con la presentación de una constancia oficial<br />             de las asignaturas cursadas en posgrado, manteniendo un promedio mínimo de 8.5.</li>         </font> 	<font color=\"#ffffff\"><br /><br /></font>       </td></tr> <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 	</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">OPCIÓN DE TITULACIÓN POR ASIGNATURAS CURSADAS EN EL EXTRANJERO:</font><font color=\"#ffffff\"><br /><br /></font>     	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">Requisitos:<br /><br />         <li>En esta opción, la primera prueba escrita del examen profesional se acreditará con la presentación de un trabajo escrito<br />     satisfactorio de la asignatura de Seminario, desarrollado bajo la guía del profesor designado como director del seminario,<br />             y siempre y cuando la calificación obtenida sea mínimo de 8 o su equivalente</li> 	<li>Cursar un mínimo de 160 horas de clase (en asignaturas equivalentes al plan de estudios de la carrera y aprobadas por el<br />             coordinador respectivo) en una universidad extranjera con la que la UNAM tenga convenio académico o de movilidad.<br />             La segunda prueba escrita del examen profesional se acreditará con la presentación de una constancia oficial de las<br />             asignaturas cursadas durante un semestre escolar, manteniendo un promedio mínimo equivalente a 8.</li> 	</font> 	<font color=\"#ffffff\"><br /><br /></font>       </td></tr> <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 	</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">OPCIÓN DE TITULACIÓN POR EXAMEN GENERAL DE CONOCIMIENTOS</font><font color=\"#ffffff\"><br /><br /></font>     	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">Requisitos:<br /><br /> Las pruebas del examen profesional se acreditarán con la presentación de una constancia oficial de acreditación de un Examen<br /> General de Conocimientos, diseñado por miembros académicos de la Facultad el cual debe constituir una revisión ordenada de<br />         los conocimientos que el sustentante adquirió a lo largo de su carrera y de su aplicación a la práctica profesional.<br /><br />         <li>En esta opción, la primera prueba escrita del examen profesional se acreditará con la presentación y aprobación de un<br />             examen escrito sobre asignaturas de los bloques de Ciencias básicas y Ciencias de la Ingeniería, una vez cubierto el<br />             bloque completo de Ciencias Básicas.</li> 	<li>La segunda prueba escrita del examen profesional se acreditará con la presentación y aprobación de un examen escrito sobre<br />             asignaturas del bloque de Ingeniería aplicada</li> 	</font> 	<font color=\"#ffffff\"><br /><br /></font>       </td></tr> <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 	</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">OPCIÓN POR DIPLOMADO DE TITULACIÓN</font><font color=\"#ffffff\"><br /><br /></font>     	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">Requisitos:<br /><br />		         <li>Haber completado todos los créditos y requisitos de la carrera en el número regular de semestres (15 semestres) que marca el<br />             plan de estudios correspondiente.</li> 	<li>El diplomado deberá ser avalado por la facultad con duración mínima de 160 horas y en un área de conocimiento especificada<br />     en los planes de estudios vigentes correspondientes a las carreras de Ingeniería en Telecomunicaciones, Computación y<br />             Eléctrica – Electrónica.</li>         <li>En esta opción, la prueba escrita del examen profesional se acreditará con la presentación del diploma oficial expedido por la<br />             Facultad y el reporte escrito correspondiente.</li>         <li>La prueba oral del examen profesional se aplicará por un cuadro de sinodales especialistas en cada área de conocimiento de<br />     la carrera correspondiente (Ingeniería en Telecomunicaciones, Computación y Eléctrica Electrónica), únicamente durante los<br />     seis meses posteriores a la expedición del diploma correspondiente. El interrogatorio versará sobre el área correspondiente al<br />              diplomado.</li>         </font> 	<font color=\"#ffffff\"><br /><br /></font>       </td></tr> <tr><td> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 	</font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">OPCIÓN DE TITULACIÓN POR EXCELENCIA ACADÉMICA:</font><font color=\"#ffffff\"><br /><br /></font>     	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">Requisitos:<br /><br />         <li>Haber completado todos los créditos y requisitos de la carrera en los 10 semestres que marca el plan de estudios correspondiente.</li> 	<li>En esta opción, la primera prueba escrita del examen profesional se acreditará con la presentación de un trabajo escrito<br />     satisfactorio en contenido y calidad, de la asignatura de Seminario, desarrollado bajo la guía del profesor designado como<br />             director del seminario, y siempre y cuando la calificación mínima obtenida sea de 9.</li> 	<li> La segunda prueba escrita del examen profesional quedará conformada por lo siguiente:</li><br /><br />                 a) Promedio general de la carrera mayor o igual a 9.<br />                 b) Tener todas las asignaturas aprobadas de manera ordinaria.<br />                   c) Ninguna materia reprobada.<br /><br /> Nota: en esta opción si aplica la mención honorífica, siempre y cuando el trabajo escrito sea de una excelente calidad en contenido<br />         y aportación.         </font> 	</td></tr> <tr><td>         <font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">Generalidades:</font><font color=\"#ffffff\"><br /><br /></font>     	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">         <li>Se mantienen vigentes las opciones de titulación actualmente reglamentadas por el H. Consejo Técnico de la Facultad.</li> 	<li>Para obtener el título de Ingeniero en Telecomuniciones, en Computación o Electrico Electrónico, en las opciones “por créditos<br />     de posgrado”, “por examen general de conocimientos”, “por asignaturas cursadas en el extranjero” y “por excelencia académica”,<br />             se requiere aprobar el examen profesional correspondiente, que comprenderá dos pruebas escritas.</li> 	<li> Para obtener el título de Ingeniero en Telecomuniciones, en Computación o Electrico Electrónico, en la opción “por diplomado”,<br />             se requiere aprobar el examen profesional correspondiente, que comprenderá una prueba escrita y una prueba oral.</li>         <li>A excepción de la opción de titulación por excelencia académica, todas las demás opciones propuestas no incluyen la posibilidad<br />             de obtener Mención Honorífica</li>         <br /><br />*Referencia: Legislación universitaria, Reglamento general de exámenes, capítulo IV, Exámenes profesionales y de grado,<br />                            artículos 18, 19, 20 y 21.<br /><br />                  <font face=\"Trebuchet MS\" size=\"4\">Reglamento General de Exámenes de la UNAM:</font><br /><br /><br />         Art. 18 Los objetivos de los exámenes profesionales y de grado son: valorar en conjunto los conocimientos generales del<br />         sustentante en su carrera o especialidad; que éste demuestre su capacidad para aplicar los conocimientos adquiridos y<br />         que posee criterio profesional.<br /><br /> Art. 19 En el nivel de licenciatura, el título se expedirá, a petición del interesado, cuando haya cubierto el plan de estudios<br />         respectivo y haya sido aprobado en el examen profesional correspondiente. El examen profesional comprenderá una prueba<br /> escrita y una oral. Los consejos técnicos de las facultades o escuelas podrán resolver que la prueba oral se sustituya por<br />         otra prueba escrita. Cuando la índole de la carrera lo amerite habrá, además, una prueba práctica.<br /><br />         Art. 20 La prueba escrita podrá ser una tesis, en los casos establecidos por el consejo técnico correspondiente:<br /><br />                a) Un trabajo elaborado en un seminario, laboratorio o taller, que forme parte del plan de estudios respectivo;<br />                b) Un informe satisfactorio sobre el servicio social, si éste se realiza después de que el alumno haya acreditado<br />                    todas las asignaturas de la carrera correspondiente, y si implica la práctica profesional.<br /><br /> Art. 21 El examen profesional oral podrá versar principalmente sobre la tesis, o sobre conocimientos generales de la carrera<br /> o especialidad, según lo determine el consejo técnico correspondiente; pero en todo caso deberá ser una exploración general<br /> de los conocimientos del estudiante, de su capacidad para aplicarlos o de su criterio profesional.. Podrá realizarse en una o<br /> varias sesiones, según lo establezca el consejo técnico. El examen sobre conocimientos generales se ajustará a los lineamientos<br />         aprobados por el mismo consejo.<br /><br />         C.4.23 El programa tendrá reglamentadas las opciones de titulación, tanto en requisitos como en procedimiento.<br /><br />         C.4.24 En los casos en que el proceso de titulación considere necesaria la presentación de algún tipo de trabajo final,<br />         deberán existir criterios mínimos para garantiza su calidad y originalidad.<br /><br />         C.4.25 Es recomendable que el programa estimule la presentación de trabajos de investigación o proyectos tecnológicos<br />         para la titulación.           </font> 	</td></tr></tbody></table>','',1,0,0,0,'2009-05-08 02:56:01',62,'','2009-05-08 15:10:35',62,0,'0000-00-00 00:00:00','2009-05-08 02:56:01','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',2,0,9,'','',0,0,'robots=\nauthor='),(17,'Convocatoria de Ingreso','convocatoria-de-ingreso','','<table border=\"0\" cellspacing=\"0\" cellpadding=\"4\" width=\"90%\" align=\"left\"><tbody><tr><td colspan=\"2\"><font face=\"Trebuchet MS\" size=\"6\" color=\"#ffffff\">Convocatoria de ingreso</font>       <font color=\"#ffffff\"><br /><br /></font>              </td>   </tr>    <tr> 	<td colspan=\"2\"> <font color=\"#ffffff\"><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> </font><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\">Semestre        2006-2</font> <font color=\"#ffffff\"><br /><br /></font>              </td> </tr> <tr> 	<td width=\"50%\"> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Publicación de Convocatoria de ingreso:</font></td>     <td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 8        de mayo</font></td>  	</tr> <tr> 	<td width=\"50%\"> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Plática informativa (Auditorio Sotero Prieto):</font> 	</td>     <td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 16        de mayo a las 16:00 hrs.</font></td>  	</tr> <tr> 	<td width=\"50%\"> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Diagnóstico de aptitudes y actitudes ( salon 113, edificio principal ):</font> 	</td><td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	19 de mayo a las 15:00 hrs.</font></td>  	</tr> <tr> 	<td width=\"50%\"> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Registro de entrevistas (Secretaría del Depto. de Telecomunicaciones):</font> 	</td><td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Del 12 al 19 de mayo</font></td>  	</tr> 	<tr><td width=\"50%\"> <font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">        Registro por internet:</font></td>     <td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> <a href=\"http://www.dgae-siae.unam.mx/\" target=\"_blank\">www.dgae-siae.unam.mx </a>     </font></td>  	</tr> <tr> 	<td width=\"50%\"> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Entrevistas:</font>  	</td><td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Del 25 al 31 de mayo</font></td>  	</tr> <tr> 	<td width=\"50%\"> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Publicación de resultados:</font>  	</td><td><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Fines  del semestre 2006-2</font></td>  	</tr></tbody></table>','',1,0,0,0,'2009-05-08 03:29:51',62,'','2010-06-22 20:26:55',62,0,'0000-00-00 00:00:00','2009-05-08 03:29:51','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',3,0,8,'','',0,516,'robots=\nauthor='),(18,'Servicio Social','servicio-social','','<table border=\"0\" cellspacing=\"0\" cellpadding=\"4\" width=\"90%\" align=\"left\"><tbody><tr><td><font face=\"Trebuchet MS\" size=\"6\" color=\"#ffffff\">Ofertas de Servicio Social</font>       <font color=\"#ffffff\"><br /><br /></font>        </td></tr>  <tr><td> 	<font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\"> 	Departamento de Telecomunicaciones<br /></font>     	<font color=\"#ffffff\"><br /><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	<strong>Actividades a realizar:</strong><br /><br /> 	Administración de redes Linux<br /> 	Administración de redes Windows<br /> 	Programación<br /><br /> 	<strong>Reunión informativa:</strong><br /><br /> 	<strong>Fecha:</strong> Miercoles 12 de noviembre a las 15:30 hrs.<br /> 	<strong>Lugar:</strong> 3er. piso del Edificio Valdés Vallejo.<br /> 	Lab. de Procesamiento Digital de Señales<br /> 	<strong>Con:</strong> Ing. Jonathan Mora Cuevas<br /> 	<strong>Nota:</strong> 7o y 8o semestre preferentemente.<br /> 	</font> 	<font color=\"#ffffff\"><br /></font>       </td></tr>  <tr><td> 	<font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\"> 	Coordinación de Informática Educativa de ILCE<br /></font>     	<font color=\"#ffffff\"><br /><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	Las actividades a realizar por los prestadores de servicio social son las siguientes:<br /> 	<ol><li>Apoyo en la administración de los recursos de red LAN de la CIE en el edificio Torre Zafiro 1. 		<ul><li>Garantizar conectividad física y a nivel protocolos (TCP/IP) entre los usuarios internos y los servidores  		de correo de la Coordinación.</li><li>Gestión del tráfico generado tanto por los servidores principales como por los usuarios Internos.</li><li>Atención y soporte técnico a usuarios en problemas relacionados con el acceso a los recursos de la Red  		LAN e Internet.</li><li>Administración y monitoreo de los servicios de direccionamiento (fijo y mediante servidores DHCP).</li><li>Verificar los sitios virtuales de emsad, pronap, acervos, biblioteca digital, red escolar, lectura,  		normalista, didáctica, sepainglés, stats, sepiensa.</li><li>Apoyo en el uso de Analizadores de Protocolos y software dedicado al monitoreo y análisis de tráfico  		presente en los dispositivos de red.</li></ul></li><li>Administración de enlaces para acceso a Internet  		<ul><li>Comprobación y propuesta de configuraciones para los equipos de ruteo (Cisco) que proporcionan la  		interconexión con los proveedores de acceso (Avantel y Telmex).</li><li>Elaboración de configuraciones para el equipo que da servicio a la red privada interna de la Coordinación  		(Routers y Switches).</li><li>Realizar estadísticas de actividad de los enlaces de telecomunicaciones.</li></ul></li><li>Actividades en los Sites de Centro de Datos y Telecomunicaciones.  		<ul><li>Apoyo en la elaboración de una memoria técnica donde se tenga la distribución de los equipos de red como  		switches, HUBs, equipo de ruteo, UPS, servidores.</li><li>Mantenimiento y mejora de la infraestructura de cableado estructurado que da servicio tanto a los usuarios  		internos como a los servidores de la Coordinación.</li></ul></li></ol>  	<strong>Informes:</strong><br /> 	Ing. Liza A. Velázquez Orozco.<br /> 	Directora de Telecomunicaciones. ILCE – CIE<br /> 	<a href=\"mailto:lizav@ilce.edu.mx\">lizav@ilce.edu.mx</a><br /><br /> 	Ing. Isaac Mendoza Gómez.<br /> 	Subdirector de Telecomunicaciones. ILCE – CIE<br /> 	Tel. 5135-3799,<a href=\"mailto:imendoza@ilce.edu.mx\">  	imendoza@ilce.edu.mx</a> 	</font> 	</td></tr></tbody></table>','',1,0,0,0,'2009-05-08 03:32:01',62,'','2009-06-02 14:26:03',62,0,'0000-00-00 00:00:00','2009-05-08 03:32:01','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',2,0,7,'telemática, unam, fi, facultad de ingeniería, departamento, servicio social','',0,959,'robots=\nauthor='),(19,'Prácticas Profesionales','practicas-profesionales','','<table border=\"0\" cellspacing=\"0\" cellpadding=\"4\" width=\"90%\" align=\"left\"><tbody><tr><td><font face=\"Trebuchet MS\" size=\"6\" color=\"#ffffff\">Prácticas profesionales</font>       <font color=\"#ffffff\"><br /><br /></font>        </td></tr>  <tr>     <td> <div align=\"center\">         <p><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\"><u>Convocatoria            del Programa de Prácticas Profesionales en TELEVISA</u><br />           </font> <font color=\"#ffffff\"><br /><br /></font>                      <font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">            <strong>Requisitos:</strong></font> </p>         <p><font color=\"#ffffff\">Alumnos de Ing. en Telecomunicaciones, Computación            o Eléctrico-Electrónico. 4 hrs diarias por la mañana o por la tarde,            de lunes a viernes Promedio Mínimo de 8.0 Estudiantes de 9º y 10º            semestre.</font></p>         <p><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><strong>Áreas:</strong></font></p>         <p><font color=\"#ffffff\">Operación SKY - Telesistema Mexicano,            Estudio \"C\", Jefatura Estudio \"A\" e Informática            de Noticieros.<br />           Del 12 de Enero a Junio del 2006.</font></p>         <p><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><br />           <strong>Fecha límite de entrega de solicitudes:</strong><br />           <br />           31 de Octubre del 2005, 10 hrs.</font></p>         <p><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><strong>Informes:</strong><br />           <br />           Ing. Juventino Cuellar<br />           Departamento de Ing. en Telecomunicaciones</font></p>         <p><font color=\"#ffffff\"> </font></p>       </div></td>   </tr>  <tr>     <td> <div align=\"center\">         <p><font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\"><u>Convocatoria            del Programa de Prácticas Profesionales en TELEVISA</u><br />           </font> <font color=\"#ffffff\"><br /><br /></font>                      <font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\">            <strong>Requisitos:</strong></font> </p>         <p><font color=\"#ffffff\">Alumnos de Ing. en Telecomunicaciones, Computación            o Eléctrico-Electrónico. 4 hrs diarias por la mañana o por la tarde,            de lunes a viernes Promedio Mínimo de 8.0 Estudiantes de 9º y 10º            semestre.</font></p>         <p><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><strong>Áreas:</strong></font></p>         <p><font color=\"#ffffff\">Gerencia de Servicios de Cómputo, Gerencia            de Audio y Servicios de Cómputo<br />           De julio a 30 de diciembre del 2005</font></p>         <p><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><br />           <strong>Fecha límite de entrega de solicitudes:</strong><br />           <br />           22 de Junio del 2005.</font></p>         <p><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"><strong>Informes:</strong><br />           <br />           Dr. MIguel Moctezuma<br />           Coordinador de Ing. en Telecomunicaciones</font></p>         <p><font color=\"#ffffff\"> </font></p>       </div></td>   </tr> <tr><td> 	<font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\"><u> 	3a Convocatoria del Programa de Prácticas Profesionales en TELEVISA</u><br /></font>     	<font color=\"#ffffff\"><br /><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	<strong>Requisitos:</strong><br /><br /> 	Alumnos de Ing. en Telecomunicaciones, Computación o Eléctrico-Electrónico.<br /> 	4 hrs diarias por la mañana o por la tarde, de lunes a viernes<br /> 	Promedio Mínimo de 8.0<br /> 	Estudiantes de 9o y 10o semestre<br /><br /> 	<strong>Áreas:</strong><br /><br /> 	Gerencia de Servicios de Cómputo, Gerencia de Audio y Servicios de Cómputo<br /> 	Del 6 de enero al 30 de junio del 2004<br /><br /> 	<strong>Fecha límite de entrega de solicitudes:</strong><br /><br /> 	14 de Noviembre del 2003.<br /><br /> 	<strong>Informes:</strong><br /><br /> 	Dr. MIguel Moctezuma<br /> 	Coordinador de Ing. en Telecomunicaciones<br /> 	</font> 	<font color=\"#ffffff\"><br /></font>       </td></tr>  <tr><td> 	<font face=\"Trebuchet MS\" size=\"4\" color=\"#ffffff\"><u> 	RED UNO</u><br /></font>     	<font color=\"#ffffff\"><br /><br /></font><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#ffffff\"> 	<strong>Requisitos:</strong><br /><br /> 	Promedio mínimo de 8.0.<br /> 	Muchas ganas de cooperar y aprender(Buena actitud).<br /> 	Contar con 4 horas diarias disponibles.<br /><br /> 	<strong>Actividades:</strong><br /><br /> 	Actualización de topología de la red.<br /> 	Realización de proyectos para la implementación de la infraestructura.<br /> 	Actualización de base de datos de la infraestructura de la red.<br /> 	Asignación de canales para clientes de la RPV de IP.<br /><br /> 	<strong>Informes:</strong><br /><br /> 	Ing. Ricardo Zavaleta  	<a href=\"mailto:rzavalet@reduno.com.mx\">rzavalet@reduno.com.mx</a><br /> 	Ing. Javier Solis  	<a href=\"mailto:jsolis@reduno.com.mx\">jsolis@reduno.com.mx</a><br /><br /> 	<strong>Vigencia:</strong><br /><br /> 	Octubre de 2003</font></td></tr></tbody></table>','',1,0,0,0,'2009-05-08 03:36:43',62,'','2009-06-02 14:24:40',62,0,'0000-00-00 00:00:00','2009-05-08 03:36:43','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',2,0,6,'telemática, unam, fi, facultad de ingeniería, departamento, practicas profesionales','Practicas profesionales del departamento de telemática.',0,2739,'robots=\nauthor='),(50,'Distinciones','distinciones','','<table border=\"0\" cellspacing=\"0\" cellpadding=\"4\" width=\"90%\" align=\"left\"><tbody><tr><td><font face=\"Trebuchet MS\" size=\"6\" color=\"#003366\">Distinciones</font> 	<br /> 	<br /> 	</td> </tr>   <tr> 	<td> 	<img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 	<font face=\"Trebuchet MS\" size=\"4\" color=\"#003366\">MEDALLA GABINO BARRERA</font>     	<br /> 	<br /> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000099\">		         <br />...De plata en forma circular, de cuatro centimetros de diametro. Estará suspendida de un liston con los colores azul marino y amarillo con un broche transversal tricolor. En una cara tendrá grabado el escudo de la Universidad y, en la otra, la efigie y el nombre de Gabino Barreda, asi como la inscripción \"al mérito universitario\". Se otorgarán acompañadas de un diploma. Art. 11 - Reglamento del reconocimiento al mérito universitario, 14 de mayo de 1996, publicado en Gaceta UNAM el 27 de mayo de 1996.</font> 	<br /> 	<br /> 	<img src=\"http://telecom.fi-b.unam.mx/imagenes/betzabegb.jpg\" border=\"0\" />	 	<br />  	<br /> 	</td> </tr>   <tr> 	<td> 	<img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 	<font face=\"Trebuchet MS\" size=\"4\" color=\"#003366\">PREMIO MEJOR ESTUDIANTE ANFEI</font>     	<br /> 	<br /> 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000099\">		         <br />Riacrdo Méndez Acevo</font> 	<br /> 	<br /> 	<img src=\"http://telecom.fi-b.unam.mx/imagenes/RicardoMA%28ANFEI%29.gif\" border=\"0\" width=\"175\" height=\"323\" />  	<br /> 	<br />         </td> </tr>   <tr> 	<td> 	<img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 	<font face=\"Trebuchet MS\" size=\"4\" color=\"#003366\">BECAS LUNCENT GLOBAL SCIENCE SCHOLARS PROGRAM</font> 	<br /> 	<br />    	 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000099\">		         <br />Xonia Ivonne Olavarrieta         <br />Lucent Global Science Scholar Program 2001         <br />Fundación Lucent Technologies</font> 	<br /> 	<br /> 	<img src=\"http://telecom.fi-b.unam.mx/imagenes/xonia_Lucent.jpg\" border=\"0\" width=\"558\" height=\"409\" />  	<br /> 	<br /> 	</td> </tr>   <tr> 	<td> 	<img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> 	<font face=\"Trebuchet MS\" size=\"4\" color=\"#003366\">BECAS LUNCENT GLOBAL SCIENCE SCHOLARS PROGRAM</font> 	<br /> 	<br />    	 	<font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000099\">		         <br />Hector Yuen 	<br />Lucent Global Science Scholar Program 2000 	<br />Fundación Lucent Technologies</font> 	<br /> 	<br /> 	<img src=\"http://telecom.fi-b.unam.mx/imagenes/yuen_Lucent.jpg\" border=\"0\" width=\"560\" height=\"350\" />  	<br /> 	<br /> 	</td> </tr>    <tr> 	<td> 	<p><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> <font face=\"Trebuchet MS\" size=\"4\" color=\"#003366\">BECAS          TELMEX-MIT, MEDIA LAB</font> <br />         <br />         <img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> <font face=\"Trebuchet MS\" size=\"4\" color=\"#003366\">PREMIO          A LA EXCELENCIA ESTUDIANTIL \"WILLIAM L. EVERIT\" Consorcio Internacional          de Telecomunicaciones(IEC) Julio2000</font> <br />         <br />         <font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000099\"> <br />         Edita Celia Hernández Álvarez <br />         Ricardo Prado Huerta</font> <br />         <br />         <img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> <font face=\"Trebuchet MS\" size=\"4\" color=\"#003366\">EXAMEN          GENERAL PARA EL EGRESO DE LA LICENCIATURA EN INGENIERIA ELECTRICA</font>          <br />         <br />         <font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000099\"> <br />         Ricardo Prado Huerta (Primer Lugar a Nivel Nacional) <br />         Jorge Ulises Martínez Araiza(Tercer Lugar a Nivel Nacional) <br />         Edita Celia Hernández Álvarez <br />         Gabriel Aldama Ramírez</font> </p>       <p><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> <font face=\"Trebuchet MS\" size=\"4\" color=\"#003366\">BECA          GE FOUNDATION SCHOLAR LEADERS PROGRAM 2005</font></p> 		<br />       <font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000099\">Juan        Carlos Bermudes Carrasco</font> 	  	<br /> 	<br /> 	<img src=\"http://telecom.fi-b.unam.mx/imagenes/Juan%20Carlos%20Bermudes.jpg\" border=\"0\" width=\"420\" height=\"350\" /> 	      <p><img src=\"http://telecom.fi-b.unam.mx/imagenes/flecha1.jpg\" border=\"0\" width=\"10\" height=\"10\" /> <font face=\"Trebuchet MS\" size=\"4\" color=\"#003366\">BECA          GE FOUNDATION SCHOLAR LEADERS PROGRAM 2004</font></p> 		<br />       <font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000099\">Karen Ávila Álvarez</font> 	  	</td></tr></tbody></table>','',-2,0,0,0,'2009-06-02 14:28:19',62,'','2009-06-12 16:11:35',62,0,'0000-00-00 00:00:00','2009-06-02 14:28:19','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',2,0,0,'unam, fi, facultad de ingenieria, departamento, telecomunicaciones, telecom, distinciones','Distinciones de los alumnos de telecomunicaciones',0,0,'robots=\nauthor='),(49,'Materias','materias','','<h1>Selecciona una Materia de la derecha </h1><p>&nbsp;</p><div style=\"text-align: center\"><img src=\"images/Materias.jpg\" border=\"0\" alt=\"fi\" width=\"500\" height=\"374\" /></div><p>&nbsp;</p>','',1,0,0,0,'2009-06-02 13:54:57',62,'','2009-06-02 14:13:46',62,0,'0000-00-00 00:00:00','2009-06-02 13:54:57','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',2,0,4,'','',1,47,'robots=\nauthor='),(59,'Habilidades y Aptitudes','habilidades-y-aptitudes','','<p><span class=\"NuTitle\"> <strong>Habilidades y actitudes </strong> </span></p>\r\n<p><br /> <span class=\"NuParagraph\"> Es importante que el egresado posea:\r\n<blockquote>-	Actitud emprendedora y de liderazgo, con iniciativa                         propia.</blockquote>\r\n<blockquote>-	Facilidad para el análisis y la síntesis de problemas,                         así como para el planteamiento de soluciones prácticas.</blockquote>\r\n<blockquote>-	Capacidad para el trabajo en equipo.</blockquote>\r\n<blockquote>-	Creatividad e inventiva.</blockquote>\r\n<blockquote>-	Aptitud para la toma de decisiones.</blockquote>\r\n<blockquote>-	Constancia y tenacidad en las actividades                         emprendidas.</blockquote>\r\nDada la necesidad de modernizar los servicios en forma integral,                         deberá contar con una buena formación social y humana,                         aunada a un gran sentido de creatividad, a fin de:\r\n<blockquote>-	Establecer soluciones prácticas de ingeniería.</blockquote>\r\n<blockquote>-	Participar en cambios tecnológicos.</blockquote>\r\n<blockquote>-	Colaborar ampliamente para lograr la participación                         interdisciplinaria y multidisciplinaria de los grupos                         de trabajo.</blockquote>\r\n<blockquote>-	Identificar su responsabilidad y compromiso social, a                         partir de la búsqueda de la excelencia en el desarrollo                         de todas sus capacidades, sin descuidar el marco moral y                         ético de sus acciones.</blockquote>\r\n</span></p>','',1,24,0,47,'2010-11-05 02:07:45',62,'','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00','2010-11-05 02:07:45','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',1,0,6,'','Habilidades y aptitudes de la carrera de Telecomunicaciones en la UNAM.',0,467,'robots=\nauthor='),(28,'Salvador Landeros Ayala','salvador-landeros-ayala','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Salvador Landeros Ayala</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <br /><h1><object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><embed type=\"application/x-shockwave-flash\" width=\"425\" height=\"350\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\"></embed></object></h1>     </div><br /></td>     <td width=\"211\"><div>       <h5>Salvador Landeros Ayala</h5>       <h5>Edad: 30 años</h5>       <h5>Prof. Titular \"B\", Tiempo completo</h5>       <ul><li><h5>Doctorado en Ingeniería, Facultad de Ingeniería, UNAM</h5></li></ul><ul><li><h5>Maestría en Ciencias de la Ingeniería, Universidad de Pennsylvania.</h5></li></ul><ul><li><h5>Licenciatura en Ingeniero Mecánico-Electricista, Facultad de Ingeniería, UNAM</h5></li></ul>     </div></td>     <td width=\"155\"><div align=\"center\"><img src=\"http://3.bp.blogspot.com/_lQfY9jMiJL4/Rqi2jgE2pII/AAAAAAAAAxI/Tgb0hDyYa3I/s320/DSC00123.JPG\" border=\"0\" alt=\"Un Profe\" title=\"Profesor A\" width=\"150\" height=\"113\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional.</h2> <h6>Distinciones:</h6><h6><br />Reconocimiento del Gobierno Mexicano por contribuir a las Telecomunicaciones del país, 1998.</h6><h6><br />Logros:</h6><h6><br />Inicié nuevas asignaturas en el campo de las Telecomunicaciones. He sido una de las primeras personas en el campo de las comunicaciones vía satélite. Coordiné los trabajos para prolongar la vida del satélite Morelos II. He impartido 14 asignaturas diferentes de licenciatura, maestría y especialidades. He realizado más de 40 publicaciones nacionales e internacionales. He impartido más de 40 conferencias en distintas universidades y empresas de México. He coordinado 5 proyectos de alcance Nacional. He sido directivo de Asociaciones y Colegios de Ingenieros. Fui Presidente del Congreso Mundial ICT-2000.</h6><h6><br />Fichas Bibliográficas:</h6><h6><br />\"Trends on Satellite Communications in Latin Américaand the potential for Ka band multimedia services\". Proceedings of the ICT-98. Grecia.</h6><h6>\"Apuntes de Satélites de Comunicaciones\". División de Educación Continua. Facultad de Ingeniería, UNAM.</h6><h6>\"Panorama cronológico de los satélites de comunicaciones en el mundo\". Revista Ciencia y Desarrollo de CONACYT, agosto 1997.</h6><h6>\"Propagación coherente en lluvia con longitudes de onda milimétricas\". Academia Nacional de Ingeniería, 1983.</h6><h6>\"Information Transmission modulation and Noise \". Mc. Graw-Hill, 1983. Revisión Técnica. </h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td> </td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-20 19:27:54',62,'','2009-08-14 17:58:30',62,62,'2010-11-20 03:26:25','2009-05-20 19:27:54','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=1\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',6,0,20,'','',0,1402,'robots=\nauthor='),(29,'Víctor García Garduño','victor-garcia-garduno','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Víctor García Garduño</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>       <h5>Víctor García Garduño</h5><h5>Profesor Titular \"A\", de tiempo Completo Interino.</h5><ul><li><h5>Doctorado en Procesamiento de señales y Telecomunicaciones, Univ. de Rennes, Francia.</h5></li></ul><ul><li><h5>Maestría en Señales de imágenes y voz, INPG-GRENOBLIE, Francia.</h5></li></ul><ul><li><h5>Maestría en Ingeniería Eléctrica, DEPFI, UNAM.</h5></li></ul><ul><li><h5>Licenciatura en Ing. Mecánico-Eléctrico, Facultad de Ingeniería, UNAM.</h5></li></ul>     </div></td>     <td width=\"155\"><div align=\"center\"><img src=\"images/Profesores/victorfin.jpg\" border=\"0\" alt=\"Victor García Garduño\" title=\"Profesor A\" width=\"150\" height=\"143\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional.</h2>        <h6 align=\"justify\">Distinciones:  Pertenecí al SNI como Candidato a Investigador, 1996-1999 Miembro Académico del Comité Academico del Ceneval, para el examen de Calidad Profesional(EGCP-IE, IECCP-IFO).  Logros:  Haber estudiado el posgrado en la Facultad de Ingeniería y completar los conocimientos del mismo en el extranjero. Impartir clases en la Facultad de Ingeniería, UNAM. Ser el Jefe del Departamento de Ingeniería en Telecomunicaciones, Facultad de Ingeniería, UNAM. </h6><br /></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td> </td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-20 19:35:55',62,'','2009-08-14 18:00:56',62,62,'2010-11-20 03:35:08','2009-05-20 19:35:55','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',6,0,19,'','',0,917,'robots=\nauthor='),(55,'Margarita Bautista','margarita-bautista','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Margarita Bautista</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">    	<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><embed type=\"application/x-shockwave-flash\" width=\"425\" height=\"350\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\"></embed></object>     </div><br /></td>     <td width=\"211\"><div align=\"right\"><h5>Margarita Bautista</h5></div><div align=\"right\"><h5>Información no disponible </h5></div></td>     <td width=\"155\"><div align=\"center\"><br /><h2><img src=\"http://api.ning.com/files/MxfklOqzVvwqDpTWEp8dpVr56photsjBGG45-iYRq9Yul9MyLi38vWBziTqrnxAqyVxPWBNaCI*QGwnlgcJ1rp3HvxT**E4z/NoPhotoAvailable.jpg\" border=\"0\" alt=\"Margarita Bautista\" title=\"Margarita Bautista\" width=\"148\" height=\"186\" /></h2></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información Adicional</h2>        <h6 align=\"justify\">Información no disponible</h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><a href=\"http://www.cudi.edu.mx/otono_2005/curricula/iliana_gomez.pdf\" target=\"_blank\"> </a><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-09-07 20:35:31',62,'','0000-00-00 00:00:00',0,62,'2010-11-20 03:18:03','2009-09-07 20:35:31','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',1,0,1,'','',0,0,'robots=\nauthor='),(30,'  Miguel Moctezuma Flores','-miguel-moctezuma-flores','','<table border=\"0\" width=\"700\">\r\n<tbody>\r\n<tr>\r\n<td colspan=\"3\">\r\n<h1>Miguel Moctezuma Flores</h1>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"320\">\r\n<div>\r\n<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" width=\"425\" height=\"350\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\">\r\n<param name=\"src\" value=\"http://www.youtube.com/watch?v=2aDlBLG3IsU\" />\r\n<param name=\"width\" value=\"425\" />\r\n<param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" width=\"425\" height=\"350\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\"></embed>\r\n</object>\r\n</div>\r\n<br /></td>\r\n<td width=\"211\">\r\n<div>\r\n<h5>Miguel Moctezuma Flores</h5>\r\n<h5>Profesor de Carrera Titular \"A\", Tiempo Completo.</h5>\r\n<ul>\r\n<li>\r\n<h5>Doctorado en Procesamiento de Señales e Imágenes, ENST, Paris, Francia</h5>\r\n</li>\r\n<li>\r\n<h5>Maestría en Procesamiento de Señales e Imágenes, ENST, Paris, Francia</h5>\r\n</li>\r\n<li>\r\n<h5>Maestría en Ingeniería Eléctrica, Fac. de Ingeniería, UNAM</h5>\r\n</li>\r\n<li>\r\n<h5>Licenciatura en Ingeniería Mécanica-Eléctrica, Fac. de Ingeniería, UNAM</h5>\r\n</li>\r\n</ul>\r\n</div>\r\n</td>\r\n<td width=\"155\">\r\n<div><img src=\"images/Profesores/MiguelMoctezuma.jpg\" border=\"0\" alt=\"Miguel Moctezuma Flores\" title=\"Miguel Moctezuma Flores\" width=\"150\" height=\"168\" /></div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"3\"></td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"3\">\r\n<h2>Información adicional.</h2>\r\n<h6>Distinciones:</h6>\r\n<h6><br />SNI nivel candidato de 1996 a 2000. Evaluador en el proceso de selección de candidatos a Beca para estudios en el extranjero, CONACyT 1999-2001. Arbitro en el proceso de evaluación de Proyectos de Investigación Sometidos a CONACyT 1999-2001. Miembro del Comité Aspirantes a Beca de Lucent Global Scholars Program, Lucent Technologies 1999.</h6>\r\n<h6><br />Logros:</h6>\r\n<h6><br />Miembro del Comité Académico del Posgrado en Ciencias de la Computación de la UNAM, noviembre de 2000. Beca del Instituto Tecnológico de Teléfonos de México para profesores/investigadores del área de Telecomunicaciones. Período Septiembre 1996-Agosto 1999. Representante de la Facultad de Ingeniería ante el Comité Consultivo Nacional de Normalización de Telecomunicaciones, CCNNT- a partir de diciembre de 1998. Miembro del Comité de preparación del Examen General de Calidad Profesional del Ceneval, de la carrera de Ing. Eléctrica-Electrónica, a partir de agosto de 1997. Miebro del Comité Científico del \"V Ibero-American Symposium on Pattern Recognition, SIARP\", Lisbon 2000, september 11-13, 2000. Vice-Chair y miembro del Comité Técnico del \"International Conference on Telecommunications, ICT-2000\", Acapulco, 22-25 de mayo, 2000. Miembro del Comité Científico del \"3er Simposio Iberoamericano de Reconocimiento de Patrones, SIARP\'99\", La Habana, Cuba, 22-26 de marzo de 1999.</h6>\r\n<h6><br />Fichas Bibliográficas:</h6>\r\n<h6><br />M. Moctezuma, H. Maitre, F. Parmiggiani, \"Sea-ice velocity fields estimation On Ross Sea with NOAA-AVHRR\", IEEE Transactions on Geoscience and Sensing, Vol. 33, No. 5, pp 1286-1289, sept. 1995;</h6>\r\n<h6>Special issue on the 1994 International Geoscience and Remote Sensing Symposium, IGARSS\'94. X. Descombes, M. Moctezuma, H. Maitre, J-P Rudant, \"Coastline detection by a Markovian segmentation on SAR images\", Signal Processing, (EURASIP- European Association for Singal Processing) 55, 1995, pp123-132.</h6>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\"></td>\r\n<td><br /></td>\r\n</tr>\r\n</tbody>\r\n</table>','',1,11,0,15,'2009-05-20 20:09:11',62,'','2010-11-10 02:15:15',62,0,'0000-00-00 00:00:00','2009-05-20 20:09:11','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',9,0,18,'','',0,3003,'robots=\nauthor='),(31,'Rodolfo Neri Vela','rodolfo-neri-vela','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Rodolfo Neri Vela</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><embed type=\"application/x-shockwave-flash\" width=\"425\" height=\"350\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>       <h5>Rodolfo Neri Vela</h5><h5>Profesor Titular \"B\", Colaboración hasta el 2007<br /></h5><ul><li><h5>Doctorado en Electromagnetismo Aplicado, Univ. Birmingham, Inglaterra.</h5></li></ul><ul><li><h5>Maestría en Sistemas de Telecomunicaciones, Univ. Essex, Inglaterra.</h5></li></ul><ul><li><h5>Licenciatura en Ing. Mecánico-Electricista, Facultad de Ingeniería, UNAM.</h5></li></ul><p>&nbsp;</p>     </div></td>     <td width=\"155\"><div align=\"center\"><img src=\"images/Profesores/nerivela.jpg\" border=\"0\" alt=\"Rodolfo Neri Vela\" title=\"Rodolfo Neri Vela\" width=\"150\" height=\"177\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional.</h2> <h6>Distinciones:</h6><h6>Investigador Nacional Nivel I (Vigente) Primer astronauta mexicano, Medalla de vuelo de la NASA, Misión 61-B, 1985.</h6><h6><br />Logros:</h6><h6><br />Producción de dos libros de texto para licenciatura. Publicación de artículos de investigación y divulgación. Dirección de una tesis de doctorado y 16 de licenciatura. Impartición de más de 200 conferencias en universidades.</h6><h6><br />Fichas Bibliográficas:</h6><h6><br />\"Líneas de transmisión\", McGraw-Hill, 1999, 480 pp. \"Satélites de Comunicaciones\", McGraw-Hill, 1989, 190 pp.</h6><h6>\"Manned Space Stations\", Agencia Espacial Europea, París, 1990, 120 pp</h6><h6>\"Wave impedance of power transmission line at PLC frequencies\", Transactions on Antennas and Propagation, Vol. 31, IEEE, 1983.</h6></td></tr><tr><td colspan=\"2\"> </td><td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',-2,11,0,15,'2009-05-20 20:19:48',62,'','2009-10-05 23:15:49',62,0,'0000-00-00 00:00:00','2009-05-20 20:19:48','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',7,0,0,'','',0,1909,'robots=\nauthor='),(32,'Bohumil Psenicka Skuhersky','bohumil-psenicka-skuhersky','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Bohumil Psenicka Skuhersky</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>              <h5>Bohumil Psenicka Skuhersky                     15 de abril de 1933</h5><ul><li><h5>Doctorado en: Ingeniería en Telecomunicaciones, Universidad Tecnológica Checa, 1967 Tesis: Filtros RC con los parámetros distribuidos</h5></li><li><h5>Maestría en: Ingeniería en Telecomunicaciones, Universidad Tecnológica Checa, 1972 Tesis: Filtros activos en las Telecomunicaciones</h5></li></ul><ul><li><h5>Especialidad en: Procesamiento digital de Señales, Universidad Tecnológica Checa, 1990 Tesis: Filtros Digitales.</h5></li></ul><ul><li><h5>Licenciatura en: Ingeniería en Telecomunicaciones, Universidad Tecnológica Checa, 1962 Tesis: Filtros para líneas de alta tensión</h5></li></ul></div></td>     <td width=\"155\"><div align=\"center\"><img src=\"images/Profesores/bohumil.jpg\" border=\"0\" alt=\"Bohumil Psenicka Skuhersky\" title=\"Bohumil Psenicka Skuhersky\" width=\"150\" height=\"161\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional. <br /></h2> <h6>Distinciones:<br /></h6><h6>SNI Nivel I de 1995 -2001 PRIDE Nivel C 1995<br />Actividades escolares:<br />    * Profesor en la Universidad Técnica Checa en el departamento de Telecomunicaciones 1962-1969</h6><h6>    * Profesor en la Universidad Técnica Checa en el departamento Teoría de Circuitos 1969-1993</h6><h6>    * 3 meses en la Universidad en Darmstadt - Alemania 1968</h6><h6>    * 3 meses en la Universidad en Bochum - Alemania 1986</h6><h6>    * 3 meses en la Universidad de Oriente - Siantago de Cuba 1983</h6><h6>    * 6 meses en la Universidad Nacional Autónoma de México 1989</h6><h6>    * 1 semana en el curso en Munich - Texas Instruments</h6><h6>    * Desde el 16 mayo 1993 profesor Titular A con T.C. en la UNAM</h6><h6>    * Desde el 8 mayo 1997 profesor Titular B con T.C. en la UNAM</h6><h6>    * Desde el 14 mayo de 1998 prof. Tit B. de tiempo completo a contrato</h6><h6>    * Desde el 16 octubre de 2000 prof. Tit. C de tiempo completo definitivo.</h6><h6><font face=\"Arial, Helvetica, sans-serif\" size=\"2\" color=\"#999999\"><strong>Proyectos:</strong></font></h6><h4> 	</h4><table border=\"1\" width=\"690\" height=\"421\"> 	<tbody><tr><td colspan=\"2\"> 	<h6><strong>Cargo</strong></h6> 	</td></tr> 	<tr><td rowspan=\"3\"> 	<h6><strong>Responsable</strong></h6> 	</td> 	<td> 	<h6 class=\"caption\"><strong>Tema:</strong> 	Desarrollo de interfaces multimodales combinando técnicas de inteligencia artificial.</h6> 	</td></tr> 	<tr><td> 	<h6 class=\"caption\"><strong>Aprobado por:</strong>  	La Dirección General de Asuntos del Personal Académico. PAPIIT. 1996. No. IN107496</h6> 	</td></tr> 	<tr><td> 	<h6 class=\"caption\"><strong>Duración:</strong> 	3años</h6> 	</td></tr> 	<tr><td rowspan=\"3\"> 	<h6><strong>Responsable</strong></h6> 	</td> 	<td> 	<h6 class=\"caption\"><strong>Tema:</strong> 	Desarrollo de un Sistema para Aplicaciones de Micro-procesadores DSP en Telecomunicaciones.</h6> 	</td></tr> 	<tr><td> 	<h6 class=\"caption\"><strong>Aprobado por:</strong>  	El comité de evaluación en programa de apoyo a proyectos institucionales de mejoramiento de la  	enseñanza PAPIME 1997. TIPO N6-96</h6> 	</td></tr> 	<tr><td> 	<h6 class=\"caption\"><strong>Duración:</strong> 	2 años</h6> 	</td></tr> 	<tr><td rowspan=\"3\"> 	<h6><strong>Responsable</strong></h6> 	</td> 	<td> 	<h6 class=\"caption\"><strong>Tema:</strong> 	 Análisis y diseño de un sistema para la medición de microcirculación de la sangre.</h6> 	</td></tr> 	<tr><td> 	<h6 class=\"caption\"><strong>Aprobado por:</strong>  	La Dirección General de Asuntos del Personal Académico. PAPIIT. 1998. No. IN117998.</h6> 	</td></tr> 	<tr><td> 	<h6 class=\"caption\"><strong>Duración:</strong> 	2 años</h6> 	</td></tr> 	</tbody></table><br /><h6>Logros:</h6><h6>En la empresa TESLA Stransnice trabajé como investigador. Durante la investigación fabriqué los filtros electromecánicos para los canales 60 Hz- 108 Hz. En telefonía, el grupo donde trabajé obtuvo por la investigación de los filtros, el premio de Clement Gottwald. En la Facultad de Ingeniería, UNAM, preparé en el laboratorio los dispositivos con DSP TM532OC25. En la Facultad de Ingeniería, UNAM, escribí tres libros de texto.</h6><h6>Fichas Bibliográficas:</h6><h6>\"Design of State Digital Filters\", IEEE Transaction on Signal Proc. 1998</h6><h6>\"Finite Word Length Efects in Digital State Filters\", Radioengineering. 1999</h6><h6>\"Zur Synthese Von Activen Filtren\", Inform. Tech. 1997</h6><h6>\"Design of State Digital Filters without Multiplers\", ICSDAT, 1999.</h6><h6>\"Implementation of Impulse Noise Algoritme from Images\", IASTED, 2000</h6><h6>\"Análisis de señales analógicas y digitales\", Facultad de Ingeniería</h6><h6>\"Prácticas de laboratorio con microprocesadores TMS320C6711\", Facultad de Ingeniería</h6><h6>\"Prácticas de laboratorio con microprocesadores TMS320C30\", Facultad de Ingeniería </h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-21 14:02:56',62,'','2009-08-14 17:51:02',62,62,'2010-11-20 02:14:54','2009-05-21 14:02:56','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',8,0,16,'','',0,1158,'robots=\nauthor='),(33,'Vladimir Svirid','vladimir-svirid','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Vladimir Svirid</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>       <h5>Vladimir Svirid</h5></div><div><h5>Profesor Asociado \"C\", T.C. </h5></div><div><h5> </h5></div><div><ul><li><h5>Doctorado en Comunicaciones Opticas, DEPFI-UNAM</h5></li></ul><ul><li><h5>Maestría en Ingeniería de Radio, Instituto Politécnico de Kiev, Ucrania</h5></li></ul><ul><li><h5>Licenciatura en Ingeniería de Radio, Instituto Politécnico de Kiev, Ucrania.</h5></li></ul><br /></div></td>     <td width=\"155\"><div align=\"center\"><img src=\"http://3.bp.blogspot.com/_lQfY9jMiJL4/Rqi2jgE2pII/AAAAAAAAAxI/Tgb0hDyYa3I/s320/DSC00123.JPG\" border=\"0\" alt=\"Un Profe\" title=\"Profesor A\" width=\"150\" height=\"113\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional. <br /></h2> <h6>Distinciones:</h6><h6><br />Cátedra Especial Angel Borja Osorno de la Facultad de Ingeniería de la UNAM, México, 2000. Cátedra Patrimonial Nivel II del CONACYT, México, 1997-98. Diploma de Primer grado, Premio y medalla en la Exposición de los Proyectos de Investigación, Ucrania, 1991. Dos premios por el cumplimiento de los Proyectos de Investigación para la Industria, Ucrania, 1988-1989. Siete premios por la obtención de las patentes, Ucrania, 1983-1991.</h6><h6><br />Logros:</h6><h6><br />Preparación e impartición de los cursos de teoría y prácticas de laboratorio de las materias de Comunicaciones Opticas y Fibras Opticas. Investigaciones realizadas sobre la Instrumentación láser y de fibra óptica aplicadas en la industria y la medicina. Desarrollo de los métodos del cálculo y simulación de cómputo de los sensores refractométricos de fibra óptica y la tecnología de su fabricación.</h6><h6><br />Fichas Bibliográficas:</h6><h6><br />\"A Prototype Fiber-Optic Discrete Level-Sensor\", IEICE Trans. On Electron., 2000. Vol E 83-C. No, 3, pp 303-308.</h6><h6>\"Optoelectronic Multipiont Liquid-Level Sensor\", SPIE Proc, 1999. Vol4148, pp. 262-268.</h6><h6>\"Primary Transdusers of Discrete Fiber -Optic\", Measur. Technig., 1990. Vol 33, no. 7, pp. 30-32.</h6><h6>\"Problems and Prospects of Creating Discrete...\", Measur. Technig., 1990. Vol 33, no. 6, pp. 576-579.</h6><h6>\"Evaluating the Performance of Multielement\", Radioalectron & Commun. Systems, 1986. Vol 29, no.1, pp. 75-77.</h6><p>&nbsp;</p></td></tr><tr><td colspan=\"2\"> </td><td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-21 14:33:22',62,'','2009-08-14 17:50:42',62,62,'2010-11-20 03:41:50','2009-05-21 14:33:22','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',6,0,15,'','',0,810,'robots=\nauthor='),(34,'Oleksandr Martynyuk','oleksandr-martynyuk','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Oleksandr Martynyuk</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>       <h5>Oleksandr Martynyuk</h5>       <h5>Profesor Titular \"A\", T.C.</h5><ul><li><h5>Doctorado en Antenas y Dispositivos de Microondas, Instituto Politécnico de Kiev</h5></li></ul><ul><li><h5>Maestría en Radiocomunicaciones, Instituto Politécnico de Kiev</h5></li></ul><ul><li><h5>Licenciatura en Ingeniero en Telecomunicaciones, Instituto Politécnico de Kiev.</h5></li></ul><br /></div></td>     <td width=\"155\"><div align=\"center\"><img src=\"images/Profesores/martiniukfin.jpg\" border=\"0\" alt=\"Oleksandr Martynyuk\" title=\"Oleksandr Martynyuk\" width=\"150\" height=\"214\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional. <br /></h2> <h6>Distinciones:</h6><h6><br />IEEE International Publication Acknowledgement Award. SNI 1996-2000.</h6><h6><br />Logros:</h6><h6><br />Investigación y diseño de nuevos tipos de desplazadores de fase para la banda Ka. Investigación y diseño de las antenas integradas para la banda Ka.</h6><h6><br />Fichas Bibliográficas:</h6><h6><br />A.E. Martynyuk, Yu Sidoruk, \"Estimate of the Maximum Attanable Loss Level in a Reflex Polarization Phase Shifter\", Radioelectronics and Communications Systems, Alestron Press N.Y. Vol .38, pp 54-56.</h6><h6>A.E. Martynyuk,Yu Sidoruk, \"Reflex Polarization Phase Shifter For The Millimeter Wave Band\", Radioelectronics and Communications Systems, Alestron N.Y. Vol 38, pp.67-73.</h6><h6>A. Martynyuk et al., \"Millimeter -Wave Amplitude- Phase Modulator\", IEEE Transactions on Microwave Theory & Techniques, Vol 45, No 6, pp. 911-917, 1997.</h6><h6>A. Martynyuk, Yu Sidoruk, \" Low Loss Phase Shifter for Ka-band Passive Phased Array\", IEEE International Conference on Phased Array Systems and Tech., May 2000, California, USA.</h6><h4><br /></h4></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-21 14:37:57',62,'','2009-08-14 17:49:51',62,0,'0000-00-00 00:00:00','2009-05-21 14:37:57','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',6,0,14,'','',0,1173,'robots=\nauthor='),(35,'Serguei Khotiaintsev Duskriatchenko','2009-05-21-15-01-51','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Serguei Khotiaintsev Duskriatchenko</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>       <h5>Serguei Khotiaintsev Duskriatchenko</h5>       <h5>Profesor Titular \"C\", Tiempo completo</h5><ul><li><h5>Doctorado en Electrónica, Instituto Politécnico de Kiev.</h5></li></ul><ul><li><h5>Maestría en Telecomunicaciones, Instituto Politécnico de Kiev.</h5></li></ul><ul><li><h5>Especialidad en Fibras Opticas, Imperial College, Londres.</h5></li></ul><ul><li><h5>Licenciatura en Ing. en Telecomunicaciones, Instituto Politécnico de Kiev</h5></li></ul><br /></div></td>     <td width=\"155\"><div align=\"center\"><img src=\"http://3.bp.blogspot.com/_lQfY9jMiJL4/Rqi2jgE2pII/AAAAAAAAAxI/Tgb0hDyYa3I/s320/DSC00123.JPG\" border=\"0\" alt=\"Un Profe\" title=\"Profesor A\" width=\"150\" height=\"113\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional. <br /></h2> <h6>Distinciones:</h6><h6><br />Tres premios y distinciones en Ucrania, 1974-1993.</h6><h6><br />Logros:</h6><h6><br />Tener más de 20 años de experiencia en docencia e investigación científica. Ser asesor y tutor de cinco tesis de licenciatura concluidas y cuatro en proceso. Trabajo de doctorado concluido y otro en proceso en México. Fui asesor de un gran número de tesis en Ucrania. Soy director de un proyecto de investigación de CONACYT y otro de la UNAM. En Ucrania desarrollé 12 proyectos como director y 3 como participante. Estoy participando en el intercambio académico con cuatro universidades del extranjero.</h6><h6><br />Fichas Bibliográficas:</h6><h6><br />S. Khotiaintsev, M.L. Sánchez huerta, G. Flores et al., \"Laser helps to study structures funtional correlations in cerebral cortex\", Ukrainian journal of Pathology. Vol 3.</h6><h6>V.Svirid, V.León, S.Khotiaintsev. \"A prototype fiber-optic discrete level-sensor\", IEICE Transactions on electronics, Vol E 83, no.3,pp.1,2. 2000.</h6><h6>V. Setkin, T. Belyaeva, S. Khotiaintsev, \"Wave to second solutions of Maxwell non-circular equations\". DOKER. Vol 359, pp. 760-764, 1998</h6><h6>A. Martyniuk, N. Martyniuk, S. Khotiaintsev, \"Millimiter wave amplitud de-phase modulations\", IEEE Trans. MTTT- US. No. 6, pp. 911-917, 1997.</h6><h6>S.V. León, S. Khotiaintsev. \"Microoptical parabolicalshafed sensing Elements for Refractometric Applications\". Instrumentation and development, Vol. 4, no. 1, 1999.</h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-21 14:55:17',62,'','2009-08-14 18:00:04',62,62,'2010-11-20 03:30:15','2009-05-21 14:55:17','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',5,0,13,'','',0,843,'robots=\nauthor='),(36,'Dra. Fatima Moumtadi','dra-fatima-moumtadi','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Dra. Fatima Moumtadi</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B\" codebase=\"http://www.apple.com/qtactivex/qtplugin.cab#version=6,0,2,0\" width=\"300\" height=\"150\"><param name=\"width\" value=\"300\" /><param name=\"height\" value=\"150\" /><param name=\"src\" value=\"http://movies.apple.com/movies/independent/lastchanceharvey/lastchanceharvey_h.320.mov?height=136&width=320\" /><embed type=\"video/quicktime\" width=\"300\" height=\"150\" src=\"http://movies.apple.com/movies/independent/lastchanceharvey/lastchanceharvey_h.320.mov?height=136&width=320\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>       <h5>Dra. Fatima Moumtadi</h5><ul><li><h5>Doctorado en Televisión, Universidad Técnica de Comunicaciones e Informática de Moscú, Rusia.</h5></li></ul><ul><li><h5>Maestría en Sistemas móviles de radiocomunicación, Universidad Técnica de Comunicaciones e Informática de Moscú, Rusia.</h5></li></ul><ul><li><h5>Maestría en Sistemas de Radiodifusión satelital, Universidad Técnica de Comunicaciones e Informática de Moscú Rusia.</h5></li></ul><br /></div></td>     <td width=\"155\"><div align=\"center\"><img src=\"images/Profesores/TeleFatima.jpg\" border=\"0\" alt=\"Un Profe\" title=\"Profesor A\" width=\"150\" height=\"167\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional. <br /></h2> <h6>Areas de interés:</h6><h6>Radiofrecuencia, Radiodifusión: Sonora y Televisión, Televisión digital, Microondas y Satélites<br />Proyectos de investigación:<br />UNAMSAT-3, CONACYT.<br />Categoría: El proyecto fue aprobado en 2003 y tiene una duración de 4 años.<br />Responsable en la parte de la estación terrena.<br /><br />Publicaciones recientes:</h6><h6>• F. Moumtadi, A. Coronado Rodríguez, J. C. Delgado Hernandez. “Algorithm for the conversion of the ICI´s XYZ diagram of main colors (1931) into a non-linear diagram of colors ?, ?“. Ukainian Journal, Electronics and Communicatios, (2006).<br /></h6><h6>• Moumtadi F., Novakovsky S. V. “Clasificación de los métodos de formación de imágenes a color en sistemas interactivos de televisión”. Cuadernos del centro de investigaciones científico-técnicas “Informsviaz” No. 2190, SB 2001, 8 – 18, UTCIM (Rusia).<br /></h6><h6>• Moumtadi F., Novakovsky S. V. ”Elaboración de un método de definición de los parámetros del conjunto de colores discontinuos de un sintetizador de imágenes”. Cuadernos del centro de investigaciones científico-técnicas “Informsviaz” No. 2190, SB 2001, 2 – 7, UTCIM (Rusia).<br /></h6><h6>• Moumtadi F., Novakovsky S. V. ”Aproximación del triángulo de colores principales de un receptor en un sistema no lineal de coordenadas ?, ?”. Cuadernos del centro de investigaciones científico-técnicas “Informsviaz” No. 2195, SB 2001, 19 – 24, UTCIM (Rusia).<br /></h6><h6>• Moumtadi F., Novakovsky S. V.”Cálculo de las señales de video en el conjunto de colores discontinuos de un sintetizador de imágenes”. Cuadernos del centro de investigaciones científico-técnicas “Informsviaz” No. 2190, SB 2001, 33 – 39, UTCIM (Rusia).<br /></h6><h6>• Moumtadi F., Kotelnikov A. V. Optimización por computadora de colores sintéticos en representaciones de elementos gráficos. Conferencia científico-técnica de profesores, científicos, ingenieros y técnicos de la UTCIM., 25 al 27 de enero del 2000, Moscú, Rusia.</h6><p>&nbsp;</p><h6>Artículos de investigación en proceso de publicación:</h6><h6>• F. Moumtadi, A. Coronado Rodríguez, “Metodología del Patrón de Radiación y Prueba de Aislamiento en Sistemas de Comunicaciones Vía Satélite”, Ingeniería Investigación y Tecnología, UNAM.<br /></h6><h6>• Coronado Rodríguez, F. Moumtadi, “A methodology to trace the antenna pattern radiation and its analysis”, Ukainian Journal, Electronics and Communicatios.</h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',-2,11,0,15,'2009-05-21 15:19:47',62,'','2009-06-30 17:36:39',62,0,'0000-00-00 00:00:00','2009-05-21 15:19:47','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',6,0,0,'','',0,15,'robots=\nauthor='),(37,'Damián Federico Vargas Sandoval','damian-federico-vargas-sandoval','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Damián Federico Vargas Sandoval</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div><h5>Damián Federico Vargas Sandoval</h5><h5>Técnico Académico Asociado \"B\", T.C.</h5><ul><li><h5>Maestría en Ing. Eléctrica(Comunicaciones), Facultad de Ingeniería, UNAM</h5></li></ul><ul><li><h5>Licenciatura en Ingeniero Mecánico-Electricista, Facultad de Ingeniería, UNAM</h5></li></ul><br /></div></td>     <td width=\"155\"><div align=\"center\"><img src=\"http://3.bp.blogspot.com/_lQfY9jMiJL4/Rqi2jgE2pII/AAAAAAAAAxI/Tgb0hDyYa3I/s320/DSC00123.JPG\" border=\"0\" alt=\"Un Profe\" title=\"Profesor A\" width=\"150\" height=\"113\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional. <br /></h2> <h6>Logros:<br /><br />Mención honorífica en estudios de Licenciatura. Mención honorífica en estudios de Maestría. Maestría en Ciencias, comenzada para Doctorado. </h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-21 15:26:52',62,'','2009-08-14 17:55:02',62,62,'2010-11-20 02:44:34','2009-05-21 15:26:52','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',7,0,11,'','',0,1039,'robots=\nauthor='),(38,'Jesús Reyes García','jesus-reyes-garcia','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Jesús Reyes García</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"300\" height=\"280\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"300\" /><param name=\"height\" value=\"280\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"300\" height=\"280\"></embed></object>     </div><br /></td>     <td width=\"211\"><div align=\"left\">       <h5>Jesús Reyes García</h5></div><div><h5>Profesor Asociado \"B\" Tiempo Completo.</h5></div><div><ul><li><h5>Maestría en Ingeniería Eléctrica, DEPFI-UNAM.</h5></li></ul><ul><li><h5>Licenciatura en Ingeniero Mecánico- Electricista, Facultad de Ingeniería, UNAM</h5></li></ul><br /></div></td>     <td width=\"155\"><div align=\"center\"><img src=\"images/Profesores/JReyes.jpg\" border=\"0\" alt=\"Jesús Reyes García\" title=\"Jesús Reyes García\" width=\"150\" height=\"166\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional. <br /></h2> <h6>Logros:</h6><h6><br />Haber participado en la creación de la carrera de Ingeniero en Telecomunicaciones; plan de estudios y planeación de toda la infraestructura relacionada con la carrera. Como primer Jefe del departamento de Ingeniería en Telecomunicaciones, ser el responsable del avance de la carrera de Ingeniero en Telecomunicaciones para que egresara la primera generación y supervisar la construcción de los laboratorios y equipamiento de éstos. Haber participado en el primer grupo que puso en marcha el proyecto para la construcción del satélite UNAMSAT.</h6><h6><br />Fichas Bibliográficas:</h6><h6><br />\"Engineering Undergraduate Program at México\", Engineering Education for 21 st Century IEEE. Frontiers in Education, atlanta GA. EEUU 1995.</h6><h6>\"Análisis y síntesis de Filtros digitales usando la Matriz de Flujo de Estado\", ELECTRO 95 IEEE. Chihuahua, Chihuahua, México 1995.</h6><h6>\"Implementation of Personal Communications Services in Rural Areas\", Multicom21. Northern Telecomm. Dallas TX, EEUU 1993.</h6><h6>\"Manual de Practicas del Laboratorio de Electromagnética\", Co-autor 1978-1982. Notas de cursos de Educación Continua.</h6><p>&nbsp;</p></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-21 15:29:55',62,'','2009-08-14 17:56:09',62,62,'2010-11-20 02:44:18','2009-05-21 15:29:55','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',6,0,10,'','',0,812,'robots=\nauthor='),(39,' Mario Alfredo Ibarra Pereyra','-mario-alfredo-ibarra-pereyra','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1> Mario Alfredo Ibarra Pereyra</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>       <h5> Mario Alfredo Ibarra Pereyra<img src=\"images/Black_ribbon.png\" border=\"0\" alt=\"blackribbon\" width=\"20\" height=\"30\" /></h5>       <h5>Profesor Asociado \"C\", T.C. Definitivo</h5><ul><li><h5>Maestría en Ingeniería Eléctrica, DEPFI-UNAM</h5></li></ul><ul><li><h5>Licenciatura en Ing. Mecánico Electricista, Facultad de Ingeniería, UNAM.</h5></li></ul><br /></div></td>     <td width=\"155\"><div align=\"center\"><img src=\"images/Profesores/ibarrafin.jpg\" border=\"0\" alt=\"Mario Alfredo Ibarra Pereyra\" title=\"Mario Alfredo Ibarra Pereyra\" width=\"150\" height=\"154\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional.</h2> <h6>Logros:</h6><h6>30 Años de docencia. Aproximadamente 100 tesis profesionales de titulación de alumnos. 25 años coordinando el Laboratorio de Comunicaciones Capacitación de más de 50 profesores y ayudantes.</h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-21 15:35:01',62,'','2009-08-14 17:48:08',62,62,'2010-11-18 16:30:29','2009-05-21 15:35:01','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',6,0,9,'','',0,694,'robots=\nauthor='),(40,'Juan Fernando Solórzano Palomares','juan-fernando-solorzano-palomares','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Juan Fernando Solórzano Palomares</h1> </td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>       <h5>Juan Fernando Solórzano Palomares</h5>       <h5>Prof. Asociado \"B\", Tiempo Completo.</h5><ul><li><h5>Maestría en Ingeniería Eléctrica, DEPFI-UNAM</h5></li></ul><ul><li><h5>Especialización en Diseño y Planeación de Redes Telefónicas, JICA-Japón</h5></li></ul><ul><li><h5>Licenciatura en Ing. Mecánico-Electricista, Facultad de Ingeniería, UNAM</h5></li></ul><br /></div></td>     <td width=\"155\"><div align=\"center\"><h2><img src=\"images/Profesores/solorzanofin.jpg\" border=\"0\" alt=\"Juan Fernando Solórzano Palomares\" title=\"Juan Fernando Solórzano Palomares\" width=\"150\" height=\"157\" /></h2></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional.<br /></h2><h6>Distinciones:<br />Miembro del Colegio de Profesores de la DIE. Consejero Técnico de la Facultad de Ingeniería por parte de la DIE.</h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-21 15:41:23',62,'','2009-08-14 17:47:43',62,62,'2010-11-20 03:12:06','2009-05-21 15:41:23','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',7,0,8,'','',0,698,'robots=\nauthor='),(41,'Javier Gómez Castellanos','javier-gomez-castellanos','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Javier Gómez Castellanos</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>       <h5>Javier Gómez Castellanos</h5><h5><br /></h5><ul><li><h5>Doctorado (Ph.D.), Columbia University, New York, USA, 2002.</h5></li></ul><ul><li><h5>Maestro en Ciencias, Columbia University, New York, NY, USA, 1996.</h5></li></ul><ul><li><h5>Licenciatura, Ingeniero Mecánico-Electricista, Facultad de Ingeniería, UNAM, México,1992</h5></li></ul><br /></div></td>     <td width=\"155\"><div align=\"center\"><img src=\"images/Profesores/javiergc.bmp\" border=\"0\" alt=\"Javier Gómez Castellanos\" title=\"Javier Gómez Castellanos\" width=\"150\" height=\"111\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h6>Información adicional.</h6> <h6>Reconocimientos</h6><h6><br />SNI nivel I (2004-2007), Beca de INTTELMEX (2003-2004), PAIPA C (2003-2004), beca para estudios de doctorado por parte de la Universidad de Columbia, beca de la DGAPA para estudios de maestría.</h6><h6><br />Invitaciones Académicas</h6><h6><br />Miembro del comité técnico del programa de: ACM WMASH 2003, ACM WMASH 2004, IEEE TEDC 2003, IEEE TEDC 2004, BROADWIN 2004, ACM MOBIHOC 2005, IEEE GLOBECOM 2005”</h6><h6>Revisor en varias revistas y conferencias internacionales de la IEEE y de la ACM</h6><h6><br />Experiencia Profesional</h6><h6><br />Profesor Titular A TC, (2003-2004) DEPFI/DIE, Facultad de Ingeniería</h6><h6>Asistente de investigador en la Universidad de Columbia, Nueva York, 1999-2002</h6><h6>Investigador interino en el IBM T.J. Watson Research Center, 1999-2002</h6><h6><br /></h6><h6>Labor Académica</h6><h6><br />Participación en el diseño y revisión de planes y programas de estudio de la carrera de Ing. en Telecomunicaciones</h6><h6>Coordinación de proyecto de investigación</h6><h6>Investigador responsable del proyecto PAPIIT IN103803, sobre redes inalámbricas híbridas, 2004-2005</h6><h6><br />LABOR DOCENTE Y DE FORMACION DE RECURSOS HUMANOS</h6><h6><br />Imparto cátedra tanto en la licenciatura como en el posgrado</h6><h6>Asesorías a mis tesistas, alumnos de mis materias y de proyectos</h6><h6>Tengo 5 tesis en proceso, 3 de maestría y dos de licenciatura</h6><h6>Participo en los comités tutoriales de la Maestría en Ingeniería y de la maestría en Ciencias de la Computación.</h6><h6>Participo como jurado en exámenes profesionales</h6><h6><br /></h6><h6>PRODUCTIVIDAD ACADEMICA</h6><h6><br />Producción científica: 7 artículos publicados en revistas internacionales</h6><h6>17 artículos en memorias de conferencias y congresos internacionales</h6><h6>6 Internet drafts</h6><h6>4 Productos Tecnológicos</h6><h6>Se crearon dos laboratorios, uno para desarrollar investigación y docencia en redes inalámbricas de datos, y el segundo para desarrollar aplicaciones para teléfonos celulares de 3ra generación</h6><h6>16 trabajos de investigación presentados en congresos</h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-21 15:48:55',62,'','2009-08-14 17:47:23',62,62,'2010-11-20 02:44:32','2009-05-21 15:48:55','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',5,0,7,'','',0,503,'robots=\nauthor='),(42,'Víctor Ragel Licea','victor-ragel-licea','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Víctor Ragel Licea</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>       <h5>Víctor Ragel Licea</h5><ul><li><h5>Doctorado (PhD) y Maestría en Ingeniería en Telecomunicaciones en la Universidad de Sheffield, Inglaterra</h5></li></ul><ul><li><h5>Licenciatura en Ing. en Computación, UNAM, Facultad de Ingeniería, Jun 96.</h5></li></ul><br /><br /></div></td>     <td width=\"155\"><div align=\"center\"><img src=\"images/Profesores/victorrl.bmp\" border=\"0\" alt=\"Víctor Ragel Licea\" title=\"Víctor Ragel Licea\" width=\"150\" height=\"109\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h6>Información adicional.<br /></h6><h6>Premios y distinciones<br /> <br /> Ingreso a Fomdoc, -SNI Nivel Candidato, -PAIPA Nivel C, - Obtención de Beca INTTELMEX,<br /> Beca DGAPA para estudios de Maestría y Doctorado,<br /> Beca SEP/SRE para estudios de doctorado</h6><h6>Cátedras magistrales<br /><br />3 Cátedras magistrales<br /><br />Experiencia profesional<br /><br />Profesor de Carrera Titular A, TC, FI/DIE, UNAM, Mayo 2003 – Presente<br />Profesor de Tiempo Completo, DEP/UNAM, Octubre 2002 – Abril 2003<br />Consultor, ARRIS INTERACTIVE, Andover, Estados Unidos Jun 2000 – Ago 2000<br />Consultor, NETTONICS Ltd., Inglaterra, Marzo 2000 – Mayo 2000<br /><br /><br />Participación en organizaciones profesionales<br /><br />Miembro de la asociación “IEEE Communications Society”, Febrero 02-Enero 03<br />Miembro de la asociación “IEEE Transactions on Broadcasting”, Febrero 02-Enero 03<br />Miembro de la asociación, “Society of Cable Telecommunications Engineers”.<br /><br /><br />Diseño y revisión de planes y programas de estudio<br /><br />Participación en la actualización del plan de estudios de la carrera en Ing. en Telecomunicaciones<br />Participación en la actualización del plan de estudios de la Academia de Telecomunicaciones<br /><br /><br />Coordinación de áreas académicas<br /><br />Participación en la creación del área de REDES DE TELECOMUNICACIONES, en el Depto. Ing. Telecomunicaciones, y en la DEP, del cual soy uno de los responsables de área.<br /><br />Coordinación y participación en proyectos de investigación y/o docencia<br /><br />Co-responsable del Proyecto PAPIIT No: IN103803: Redes IEEE 802.11<br />Responsable del Proyecto PAPIIT No: IN110805: Redes IEEE 802.16, Wimax, BWA<br />Participé en la Coordinación del Proyecto UNAM-Qualcomm (Noviembre 2002- Febrero 2004).<br /><br /><br />LABOR DOCENTE Y DE FORMACIÓN DE RECURSOS HUMANOS<br /><br />6 Tesis de licenciatura y 5 de maestría en proceso de revisión<br /><br />PRODUCTIVIDAD ACADÉMICA<br /><br />4 Publicaciones en revistas internaciones con arbitraje.<br />7 Publicaciones de artículos en memorias con arbitraje.<br />2 Artículos en proceso de revisión.<br /><br /><br />Productos de infraestructura académica<br /><br />Participé en la creación del Lab. de Aplicaciones Móviles UNAM-QUALCOMM.<br />Para el área de Redes de Telecom. participé en la creación del Lab. de Redes Inalámbricas<br /><br /><br />Trabajos presentados en congresos<br /><br />4 trabajos presentados en congresos internacionales (Londres, Ámsterdam, Texas, Acapulco)<br /> </h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-21 15:55:42',62,'','2009-08-14 17:46:57',62,0,'0000-00-00 00:00:00','2009-05-21 15:55:42','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',5,0,6,'','',0,442,'robots=\nauthor='),(43,' Ignacio Flores Llamas','-ignacio-flores-llamas','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Ignacio Flores Llamas</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><embed type=\"application/x-shockwave-flash\" width=\"425\" height=\"350\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>       <h5>Ignacio Flores Llamas</h5>       <ul><li><h5>Doctorado en Ingeniería – Universidad Nacional Autónoma de México, México D. F., 2007.</h5></li></ul><ul><li><h5>M. en C. Comunicaciones de Datos – Universidad de Sheffield, Sheffield, Gran Bretaña., 2001.</h5></li></ul><ul><li><h5>Ing. en Electrónica - Universidad Autónoma Metropolitana, México D. F., 1994.</h5></li></ul></div></td>     <td width=\"155\"><div align=\"center\"><img src=\"images/Profesores/llamas.jpg\" border=\"0\" alt=\"Ignacio Flores Llamas\" title=\"Ignacio Flores Llamas\" width=\"150\" height=\"143\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información adicional. <br /></h2><h6>TESIS: Síntesis de las rejillas de período largo en fibra óptica por medio de un algoritmo genético.<br /> <br /> Descripción: Obtención de nuevos conocimientos científicos y de aplicación en el diseño de dispositivos basados en las rejillas de período largo en fibra óptica, para los sistemas de comunicación y medición.</h6><h6>TESIS: Reed-Solomon codecs de baja potencia.<br /> <br />  Descripción: Análisis de potencia de diferentes codecs utilizados para la corrección de errores en sistemas digitales de grabación, comunicaciones y almacenamiento de datos. </h6><h6>PROYECTO  TERMINAL: Mezcladora digital automática de Compact Disc.</h6><h6> </h6><h6><br /> Descripción: Sistema digital basado en el microcontrolador 68HC11; es decir, el diseño de hardware y software (en ensamblador), para controlar volúmenes y velocidades de dos reproductores de compact disc.</h6><p>&nbsp;</p></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><a href=\"http://www.cudi.edu.mx/otono_2005/curricula/iliana_gomez.pdf\" target=\"_blank\"><br /> </a></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-21 16:02:08',62,'','2009-08-14 17:46:26',62,62,'2010-11-18 16:21:57','2009-05-21 16:02:08','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',6,0,5,'','',0,646,'robots=\nauthor='),(44,'José Luis García García','jose-luis-garcia-garcia','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>José Luis García García</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div>       <h5>José Luis García García</h5><ul><li><h5>Licenciatura en la Facultad de Ingeniería de la UNAM, Ing. Mecánico-Electricista en el área eléctrica-electrónica.</h5></li><li><h5>Maestría en la Facultad de Ingeniería de la UNAM.</h5></li></ul></div></td>     <td width=\"155\"><div align=\"center\"><img src=\"images/Profesores/garcia.jpg\" border=\"0\" alt=\"José Luis García García\" title=\"José Luis García García\" width=\"150\" height=\"143\" /></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información Adicional<br /></h2><h6>Llevó a cabo una estancia de investigación en el Laboratorio de Desarrollo de Sistemas Espaciales de la Universidad de Stanford. </h6><h6>Adicionalmente ha acreditado el Diplomado en Gestión de Proyectos Tecnológicos y Propiedad Industrial, así como el Diplomado en Docencia de la Ingeniería.</h6><h6>Participó en la iniciativa privada en empresas de Telecomunicaciones donde fungió como de Director de Tecnología. Sus líneas de investigación incluyen  Electrónica, Radio Frecuencia, Redes de Fibra óptica, Comunicaciones inalámbricas y Tecnología Espacial, donde ha destacado por su participación en proyectos de satélites pequeños tanto en México como en Estados Unidos y Rusia. Actualmente imparte la asignatura de Sistemas de Radiocomunicaciones II. </h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-22 13:23:39',62,'','2009-08-14 17:45:23',62,62,'2010-11-20 02:57:40','2009-05-22 13:23:39','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',6,0,4,'','',0,507,'robots=\nauthor='),(45,'José María Matías Marur','jose-maria-matias-marur','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>José María Matías Maruri</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">       <object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div align=\"right\"><h5>José María Matías Maruri</h5></div><div align=\"right\"><h5>Información no disponible </h5></div></td>     <td width=\"155\"><div align=\"center\"><br /><h2><img src=\"images/Profesores/matiasm.jpg\" border=\"0\" alt=\"José María Matías Maruri\" title=\"José María Matías Maruri\" width=\"150\" height=\"174\" /></h2></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información Adicional</h2>        <h6 align=\"justify\">Información no disponible</h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><h2><br /></h2><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-22 13:37:24',62,'','2009-08-14 17:44:39',62,62,'2010-11-20 03:05:47','2009-05-22 13:37:24','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',7,0,3,'','',0,590,'robots=\nauthor='),(46,'Julio César Tinoco Magaña ','julio-cesar-tinoco-magana-','','<table border=\"0\" width=\"700\">   <tbody><tr>     <td colspan=\"3\"><h1>Julio César Tinoco Magaña</h1></td>   </tr>   <tr>     <td width=\"320\"><div align=\"center\">    	<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"425\" height=\"350\"><param name=\"src\" value=\"http://www.youtube.com/v/RnTbnlsCiVU\" /><param name=\"width\" value=\"425\" /><param name=\"height\" value=\"350\" /><embed type=\"application/x-shockwave-flash\" src=\"http://www.youtube.com/v/RnTbnlsCiVU\" width=\"425\" height=\"350\"></embed></object>     </div><br /></td>     <td width=\"211\"><div align=\"right\"><h5>Julio César Tinoco Magaña</h5></div><div align=\"right\"><h5>Información no disponible </h5></div></td>     <td width=\"155\"><div align=\"center\"><br /><h2><img src=\"images/Profesores/tinocom.jpg\" border=\"0\" alt=\"José María Matías Maruri\" title=\"José María Matías Maruri\" width=\"150\" height=\"166\" /></h2></div></td>   </tr>   <tr>     <td colspan=\"3\"> </td>   </tr>   <tr>     <td colspan=\"3\"><h2>Información Adicional</h2>        <h6 align=\"justify\">Información no disponible</h6></td>   </tr>   <tr>     <td colspan=\"2\"> </td>     <td><a href=\"http://www.cudi.edu.mx/otono_2005/curricula/iliana_gomez.pdf\" target=\"_blank\"> </a><br /></td>   </tr> </tbody></table>','',1,11,0,15,'2009-05-22 13:55:13',62,'','2009-08-14 17:42:14',62,62,'2010-11-20 03:15:07','2009-05-22 13:55:13','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',16,0,2,'','',0,1014,'robots=\nauthor='),(60,'Condiciones Particulares','condiciones-particulares','','<p><span class=\"NuTitle\"> <strong>Condiciones Particulares de la Carrera </strong> </span> <br /> <span class=\"NuParagraph\"> </span></p>\r\n<p><span class=\"NuParagraph\">El límite de tiempo para estar inscrito en esta carrera es de catorce     semestres, los que empiezan a contar a partir de la inscripción a las     asignaturas curriculares. Para poder concluir la carrera en el tiempo     estipulado en el plan de estudios, el alumno requiere dedicación total,     ya que además de las prácticas de laboratorio y de campo, deberá asistir a     otros cursos que complementen su formación. El estudio de la licenciatura     demanda inversiones destinadas, principalmente, a la adquisición de libros,     textos de consulta, y material para cómputo. </span> <br /> <br /></p>','',1,24,0,47,'2010-11-05 02:10:10',62,'','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00','2010-11-05 02:10:10','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',1,0,5,'','',0,449,'robots=\nauthor='),(56,'Mosaico 2009','mosaico-2009','','<h1><a href=\"images/Mosaico2010.jpg.zip\">Click para Descargar</a></h1><p> <img src=\"images/M2010.jpg\" border=\"0\" alt=\"Haz click en el link para descargar\" title=\"Mosaico 2009\" width=\"360\" height=\"456\" /></p>','',1,0,0,0,'2009-11-27 17:08:31',62,'','2009-11-27 17:27:10',62,0,'0000-00-00 00:00:00','2009-11-27 17:08:31','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',2,0,3,'','',0,1769,'robots=\nauthor='),(57,'Misa Luctuosa','misaluctuosa','','<p><span style=\"color: #110000; font-family: \'Trebuchet MS\', Verdana, Arial; line-height: normal;\"> </span></p>\r\n<p style=\"text-align: center;\"><img src=\"http://telecom.fi-b.unam.mx/svird.jpg\" border=\"0\" /></p>','',1,0,0,0,'2010-10-26 00:00:00',62,'','2010-10-27 05:55:25',62,62,'2010-10-27 05:55:26','2010-10-26 00:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=0\nshow_intro=\nshow_section=\nlink_section=\nshow_category=0\nlink_category=0\nshow_vote=\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=',5,0,2,'','',0,239,'robots=\nauthor='),(58,'NuCarrera','nucarrera','','<p><span class=\"NuTitle\"><strong>Descripción  de la Carrera</strong></span></p>\r\n<p><span class=\"NuParagraph\"> Comunicaciones es el profesional que utiliza los         conocimientos de las ciencias físicas y matemáticas y las técnicas de         ingeniería para desarrollar su actividad profesional en aspectos tales         como: las comunicaciones ópticas, satelitales, por microondas, redes de         comunicaciones alámbricas e inalámbricas, sistemas de radiodifusión,         sistemas de radionavegación, así como: la administración, diseño,         construcción, operación y mantenimiento de productos y equipos para         telecomunicaciones. <br /> Para dar solución a los problemas que le plantea el ejercicio profesional,         hace uso del análisis matemático y físico. Generalmente, se desempeña         interactuando con profesionistas de disciplinas afines como: ingenieros         eléctricos, mecánicos, industriales, en computación, en comunicaciones,         licenciados en informática, además de administradores y economistas,         entre otros. </span> <br /> <span class=\"NuParagraph\"><br /></span></p>','',1,24,0,47,'2010-11-05 01:49:48',62,'','2010-11-05 03:09:35',62,0,'0000-00-00 00:00:00','2010-11-05 01:49:48','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',4,0,7,'Carrera, Telecom, Descripción, UNAM, Facultad de Ingeniería','Descripción de los datos de la Carrera de Telecomunicaciones',0,495,'robots=\nauthor='),(62,'Perfil del Aspirante','perfil-del-aspirante','','<p><span class=\"NuTitle\"><strong> Perfil del Aspirante</strong></span></p>\r\n<p> </p>\r\n<p><span class=\"NuParagraph\"> El alumno deberá haber cursado el área de las Ciencias                 Físico-Matemáticas y de las Ingenierías en el Bachillerato,                 poseer sólidos conocimientos en las materias de Física y Matemáticas,                 así como manejar el idioma inglés a nivel de traducción, pues la mayor                 parte de la literatura sobre el tema está en ese idioma.                 Asimismo, requiere contar con:<br />\r\n<blockquote>•	Actitud emprendedora y de liderazgo, con iniciativa propia.</blockquote>\r\n<blockquote>•	Actitud emprendedora y de liderazgo, con iniciativa propia.</blockquote>\r\n<blockquote>•	Facilidad para el análisis y la síntesis de problemas,                 así como para el planteamiento de soluciones prácticas.</blockquote>\r\n<blockquote>•	Capacidad para el trabajo en equipo.</blockquote>\r\n<blockquote>•	Creatividad e inventiva.</blockquote>\r\n<blockquote>•	Aptitud para la toma de decisiones.</blockquote>\r\n<blockquote>•	Constancia y tenacidad en las actividades emprendidas.</blockquote>\r\n</span></p>','',1,24,0,47,'2010-11-05 02:16:42',62,'','0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00','2010-11-05 02:16:42','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',1,0,3,'','',0,458,'robots=\nauthor='),(63,'Mapa Curricular Telecom','mapa-curricular-telecom','','<p><img src=\"images/MapaCurricular.jpg\" border=\"0\" width=\"800\" height=\"1019\" style=\"vertical-align: middle; border: 0;\" /></p>','',1,24,0,47,'2010-11-05 03:00:35',62,'','2010-11-06 00:51:42',62,0,'0000-00-00 00:00:00','2010-11-05 03:00:35','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',2,0,2,'','',0,683,'robots=\nauthor='),(65,'Historia','historia','','<h1>Historia</h1>\r\n<p><span class=\"NuTitle\"><strong>1992</strong></span></p>\r\n<p><span class=\"NuParagraph\">\r\n<blockquote>• Se crea la carrera de Ingeniero en Telecomunicaciones.</blockquote>\r\n<blockquote>• En el mes de septiembre ingresa la primera generación (16 alumnos).</blockquote>\r\n</span></p>\r\n<p><br /> <span class=\"NuTitle\"><strong>1994</strong></span></p>\r\n<p><span class=\"NuParagraph\">\r\n<blockquote>• Se aprueba la construcción y equipamiento de laboratorios mediante el Programa UNAM-BID.</blockquote>\r\n<blockquote>• Se realizan modificaciones al Plan de estudios, acorde a las carreras de Ing. en Eléctrico-Electrónico y de Computación.</blockquote>\r\n</span></p>\r\n<p><br /> <span class=\"NuTitle\"><strong>1995</strong></span></p>\r\n<p><span class=\"NuParagraph\">\r\n<blockquote>• El 7 de septiembre concluye sus estudios la primera generación de Ingenieros en Telecomunicaciones.</blockquote>\r\n<blockquote>• Se inicia la construcción de las instalaciones del Departamento de Ing. en Telecomunicaciones.</blockquote>\r\n<blockquote>• El Consejo técnico aprueba las modificaciones al Plan de estudios.</blockquote>\r\n</span></p>\r\n<p><br /> <span class=\"NuTitle\"><strong>1996</strong></span></p>\r\n<p><span class=\"NuParagraph\">\r\n<blockquote>• El 25 de enero se inauguran las instalaciones del Departamento de Telecomunicaciones.</blockquote>\r\n<blockquote>• Ingresa la quinta generación (23 alumnos).</blockquote>\r\n</span></p>\r\n<p><br /> <span class=\"NuTitle\"><strong>2001</strong></span></p>\r\n<p><span class=\"NuParagraph\">\r\n<blockquote>• El Consejo de Acreditación sobre la Enseñanza de la Ingeniería, A.C., CACEI, otorga acreditación al Programa de Ingeniero en Telecomunicaciones.</blockquote>\r\n</span></p>\r\n<p><br /> <span class=\"NuTitle\"><strong>2002</strong></span></p>\r\n<p><span class=\"NuParagraph\">\r\n<blockquote>• Se preparan las modificaciones a planes y programas de estudios, con nuevas áreas del conocimiento en Redes,                         Comunicaciones inalámbricas y Normatividad.</blockquote>\r\n<blockquote>• Egresa la 13ma generación.</blockquote>\r\n<blockquote>• Inicia el Programa Doctoral Conjunto en Telecomunicaciones F.I. - Universidad Politécnica de Madrid.</blockquote>\r\n</span></p>\r\n<p><br /> <span class=\"NuTitle\"><strong>2007</strong></span></p>\r\n<p><span class=\"NuParagraph\">\r\n<blockquote>• La Carrera deja de ser deriva e ingresa la primera generación(2008) de ingreso directo.</blockquote>\r\n</span></p>\r\n<p><br /> <span class=\"NuTitle\"><strong>2010</strong></span></p>\r\n<p><span class=\"NuParagraph\">\r\n<blockquote>• El Dr. Víctor Rangel recibe la Distinción Universidad Nacional para jovenes Académicos(Docencia en Ciencias Exactas).</blockquote>\r\n</span></p>\r\n<p> </p>','',1,26,0,49,'2010-11-18 02:42:25',62,'','2010-11-18 02:44:39',62,0,'0000-00-00 00:00:00','2010-11-18 02:42:25','0000-00-00 00:00:00','','','show_title=0\nlink_titles=0\nshow_intro=0\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_vote=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=es-ES\nkeyref=\nreadmore=',2,0,1,'','',0,333,'robots=\nauthor=');
/*!40000 ALTER TABLE `jos_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_content_frontpage`
--

DROP TABLE IF EXISTS `jos_content_frontpage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_content_frontpage`
--

LOCK TABLES `jos_content_frontpage` WRITE;
/*!40000 ALTER TABLE `jos_content_frontpage` DISABLE KEYS */;
INSERT INTO `jos_content_frontpage` VALUES (62,8),(58,4),(59,5),(60,6),(61,7),(63,9),(57,10),(7,3),(8,2),(9,1);
/*!40000 ALTER TABLE `jos_content_frontpage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_content_rating`
--

DROP TABLE IF EXISTS `jos_content_rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(11) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_content_rating`
--

LOCK TABLES `jos_content_rating` WRITE;
/*!40000 ALTER TABLE `jos_content_rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_content_rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_acl_aro`
--

DROP TABLE IF EXISTS `jos_core_acl_aro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_core_acl_aro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_value` varchar(240) NOT NULL DEFAULT '0',
  `value` varchar(240) NOT NULL DEFAULT '',
  `order_value` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jos_section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `jos_gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_core_acl_aro`
--

LOCK TABLES `jos_core_acl_aro` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_aro` DISABLE KEYS */;
INSERT INTO `jos_core_acl_aro` VALUES (10,'users','62',0,'Administrator',0),(25,'users','77',0,'Estudiante2',0),(16,'users','68',0,'Alumno A',0),(17,'users','69',0,'Juan Lopez',0),(18,'users','70',0,'Rosa Perez',0),(24,'users','76',0,'Estudiante1',0),(20,'users','72',0,'pedro',0),(26,'users','78',0,'Estudiante3',0),(27,'users','79',0,'Estudiante4',0),(28,'users','80',0,'Estudiante5',0),(29,'users','81',0,'Estudiante6',0),(30,'users','82',0,'Estudiante7',0),(31,'users','83',0,'Estudiante8',0),(32,'users','84',0,'Estudiante9',0),(33,'users','85',0,'Estudiante10',0),(34,'users','86',0,'alo',0);
/*!40000 ALTER TABLE `jos_core_acl_aro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_acl_aro_groups`
--

DROP TABLE IF EXISTS `jos_core_acl_aro_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_core_acl_aro_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `value` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `jos_gacl_parent_id_aro_groups` (`parent_id`),
  KEY `jos_gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_core_acl_aro_groups`
--

LOCK TABLES `jos_core_acl_aro_groups` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_aro_groups` DISABLE KEYS */;
INSERT INTO `jos_core_acl_aro_groups` VALUES (17,0,'ROOT',1,42,'ROOT'),(28,17,'USERS',2,41,'USERS'),(29,28,'Public Frontend',3,32,'Public Frontend'),(18,29,'Registered',4,31,'Registered'),(19,18,'Author',5,10,'Author'),(20,19,'Editor',6,9,'Editor'),(21,20,'Publisher',7,8,'Publisher'),(30,28,'Public Backend',33,40,'Public Backend'),(23,30,'Manager',34,39,'Manager'),(24,23,'Administrator',35,38,'Administrator'),(25,24,'Super Administrator',36,37,'Super Administrator'),(36,18,'Antenas Gp2',13,14,'Antenas Gp2'),(35,18,'Antenas Gp1',11,12,'Antenas Gp1'),(37,18,'Receptores Gp1',15,16,'Receptores Gp1'),(38,18,'Receptores Gp2',17,18,'Receptores Gp2'),(39,18,'Redes de datos Gp1',19,20,'Redes de datos Gp1'),(40,18,'Redes de datos Gp2',21,22,'Redes de datos Gp2'),(41,18,'Tecnologías para procesamiento digital de señales Gp1',23,24,'Tecnologías para procesamiento digital de señales Gp1'),(42,18,'Tecnologías para procesamiento digital de señales Gp2',25,26,'Tecnologías para procesamiento digital de señales Gp2'),(43,18,'Transmisores Gp1',27,28,'Transmisores Gp1'),(44,18,'Transmisores Gp2',29,30,'Transmisores Gp2');
/*!40000 ALTER TABLE `jos_core_acl_aro_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_acl_aro_map`
--

DROP TABLE IF EXISTS `jos_core_acl_aro_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_core_acl_aro_map` (
  `acl_id` int(11) NOT NULL DEFAULT '0',
  `section_value` varchar(230) NOT NULL DEFAULT '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_core_acl_aro_map`
--

LOCK TABLES `jos_core_acl_aro_map` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_aro_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_core_acl_aro_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_acl_aro_sections`
--

DROP TABLE IF EXISTS `jos_core_acl_aro_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_core_acl_aro_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(230) NOT NULL DEFAULT '',
  `order_value` int(11) NOT NULL DEFAULT '0',
  `name` varchar(230) NOT NULL DEFAULT '',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jos_gacl_value_aro_sections` (`value`),
  KEY `jos_gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_core_acl_aro_sections`
--

LOCK TABLES `jos_core_acl_aro_sections` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_aro_sections` DISABLE KEYS */;
INSERT INTO `jos_core_acl_aro_sections` VALUES (10,'users',1,'Users',0);
/*!40000 ALTER TABLE `jos_core_acl_aro_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_acl_groups_aro_map`
--

DROP TABLE IF EXISTS `jos_core_acl_groups_aro_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `section_value` varchar(240) NOT NULL DEFAULT '',
  `aro_id` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_core_acl_groups_aro_map`
--

LOCK TABLES `jos_core_acl_groups_aro_map` WRITE;
/*!40000 ALTER TABLE `jos_core_acl_groups_aro_map` DISABLE KEYS */;
INSERT INTO `jos_core_acl_groups_aro_map` VALUES (18,'',34),(25,'',10),(35,'',24),(36,'',25),(37,'',26),(38,'',27),(39,'',28),(40,'',29),(41,'',30),(42,'',31),(43,'',32),(44,'',33);
/*!40000 ALTER TABLE `jos_core_acl_groups_aro_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_log_items`
--

DROP TABLE IF EXISTS `jos_core_log_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_core_log_items` (
  `time_stamp` date NOT NULL DEFAULT '0000-00-00',
  `item_table` varchar(50) NOT NULL DEFAULT '',
  `item_id` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_core_log_items`
--

LOCK TABLES `jos_core_log_items` WRITE;
/*!40000 ALTER TABLE `jos_core_log_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_core_log_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_core_log_searches`
--

DROP TABLE IF EXISTS `jos_core_log_searches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_core_log_searches` (
  `search_term` varchar(128) NOT NULL DEFAULT '',
  `hits` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_core_log_searches`
--

LOCK TABLES `jos_core_log_searches` WRITE;
/*!40000 ALTER TABLE `jos_core_log_searches` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_core_log_searches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_eventlist_categories`
--

DROP TABLE IF EXISTS `jos_eventlist_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_eventlist_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `catname` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(100) NOT NULL DEFAULT '',
  `catdescription` mediumtext NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(11) unsigned NOT NULL DEFAULT '0',
  `groupid` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_eventlist_categories`
--

LOCK TABLES `jos_eventlist_categories` WRITE;
/*!40000 ALTER TABLE `jos_eventlist_categories` DISABLE KEYS */;
INSERT INTO `jos_eventlist_categories` VALUES (1,0,'Conferencia','conferencia','','','','',1,0,'0000-00-00 00:00:00',0,0,1);
/*!40000 ALTER TABLE `jos_eventlist_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_eventlist_events`
--

DROP TABLE IF EXISTS `jos_eventlist_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_eventlist_events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `locid` int(11) unsigned NOT NULL DEFAULT '0',
  `catsid` int(11) unsigned NOT NULL DEFAULT '0',
  `dates` date NOT NULL DEFAULT '0000-00-00',
  `enddates` date DEFAULT NULL,
  `times` time DEFAULT NULL,
  `endtimes` time DEFAULT NULL,
  `title` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(100) NOT NULL DEFAULT '',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL,
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `author_ip` varchar(15) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `datdescription` mediumtext NOT NULL,
  `meta_keywords` varchar(200) NOT NULL DEFAULT '',
  `meta_description` varchar(255) NOT NULL DEFAULT '',
  `recurrence_number` int(2) NOT NULL DEFAULT '0',
  `recurrence_type` int(2) NOT NULL DEFAULT '0',
  `recurrence_counter` date NOT NULL DEFAULT '0000-00-00',
  `datimage` varchar(100) NOT NULL DEFAULT '',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `registra` tinyint(1) NOT NULL DEFAULT '0',
  `unregistra` tinyint(1) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_eventlist_events`
--

LOCK TABLES `jos_eventlist_events` WRITE;
/*!40000 ALTER TABLE `jos_eventlist_events` DISABLE KEYS */;
INSERT INTO `jos_eventlist_events` VALUES (1,0,1,'2009-05-28','2009-05-18','11:30:00','13:30:00','CConferencia web 2.0','cconferencia-web-20',62,'2009-05-19 19:16:27',62,'132.248.59.180','2009-05-19 19:16:22','','[title], [a_name], [catsid], [times]','The event titled [title] starts on [dates]!',0,0,'0000-00-00','',0,'0000-00-00 00:00:00',0,0,1);
/*!40000 ALTER TABLE `jos_eventlist_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_eventlist_groupmembers`
--

DROP TABLE IF EXISTS `jos_eventlist_groupmembers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_eventlist_groupmembers` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `member` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_eventlist_groupmembers`
--

LOCK TABLES `jos_eventlist_groupmembers` WRITE;
/*!40000 ALTER TABLE `jos_eventlist_groupmembers` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_eventlist_groupmembers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_eventlist_groups`
--

DROP TABLE IF EXISTS `jos_eventlist_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_eventlist_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_eventlist_groups`
--

LOCK TABLES `jos_eventlist_groups` WRITE;
/*!40000 ALTER TABLE `jos_eventlist_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_eventlist_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_eventlist_register`
--

DROP TABLE IF EXISTS `jos_eventlist_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_eventlist_register` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `uregdate` varchar(50) NOT NULL DEFAULT '',
  `uip` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_eventlist_register`
--

LOCK TABLES `jos_eventlist_register` WRITE;
/*!40000 ALTER TABLE `jos_eventlist_register` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_eventlist_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_eventlist_settings`
--

DROP TABLE IF EXISTS `jos_eventlist_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_eventlist_settings` (
  `id` int(11) NOT NULL,
  `oldevent` tinyint(4) NOT NULL,
  `minus` tinyint(4) NOT NULL,
  `showtime` tinyint(4) NOT NULL,
  `showtitle` tinyint(4) NOT NULL,
  `showlocate` tinyint(4) NOT NULL,
  `showcity` tinyint(4) NOT NULL,
  `showmapserv` tinyint(4) NOT NULL,
  `map24id` varchar(20) NOT NULL,
  `gmapkey` varchar(255) NOT NULL,
  `tablewidth` varchar(20) NOT NULL,
  `datewidth` varchar(20) NOT NULL,
  `titlewidth` varchar(20) NOT NULL,
  `locationwidth` varchar(20) NOT NULL,
  `citywidth` varchar(20) NOT NULL,
  `datename` varchar(100) NOT NULL,
  `titlename` varchar(100) NOT NULL,
  `locationname` varchar(100) NOT NULL,
  `cityname` varchar(100) NOT NULL,
  `formatdate` varchar(100) NOT NULL,
  `formattime` varchar(100) NOT NULL,
  `timename` varchar(50) NOT NULL,
  `showdetails` tinyint(4) NOT NULL,
  `showtimedetails` tinyint(4) NOT NULL,
  `showevdescription` tinyint(4) NOT NULL,
  `showdetailstitle` tinyint(4) NOT NULL,
  `showdetailsadress` tinyint(4) NOT NULL,
  `showlocdescription` tinyint(4) NOT NULL,
  `showlinkvenue` tinyint(4) NOT NULL,
  `showdetlinkvenue` tinyint(4) NOT NULL,
  `delivereventsyes` tinyint(4) NOT NULL,
  `mailinform` tinyint(4) NOT NULL,
  `mailinformrec` varchar(150) NOT NULL,
  `mailinformuser` tinyint(4) NOT NULL,
  `datdesclimit` varchar(15) NOT NULL,
  `autopubl` tinyint(4) NOT NULL,
  `deliverlocsyes` tinyint(4) NOT NULL,
  `autopublocate` tinyint(4) NOT NULL,
  `showcat` tinyint(4) NOT NULL,
  `catfrowidth` varchar(20) NOT NULL,
  `catfroname` varchar(100) NOT NULL,
  `evdelrec` tinyint(4) NOT NULL,
  `evpubrec` tinyint(4) NOT NULL,
  `locdelrec` tinyint(4) NOT NULL,
  `locpubrec` tinyint(4) NOT NULL,
  `sizelimit` varchar(20) NOT NULL,
  `imagehight` varchar(20) NOT NULL,
  `imagewidth` varchar(20) NOT NULL,
  `gddisabled` tinyint(4) NOT NULL,
  `imageenabled` tinyint(4) NOT NULL,
  `comunsolution` tinyint(4) NOT NULL,
  `comunoption` tinyint(4) NOT NULL,
  `catlinklist` tinyint(4) NOT NULL,
  `showfroregistra` tinyint(4) NOT NULL,
  `showfrounregistra` tinyint(4) NOT NULL,
  `eventedit` tinyint(4) NOT NULL,
  `eventeditrec` tinyint(4) NOT NULL,
  `eventowner` tinyint(4) NOT NULL,
  `venueedit` tinyint(4) NOT NULL,
  `venueeditrec` tinyint(4) NOT NULL,
  `venueowner` tinyint(4) NOT NULL,
  `lightbox` tinyint(4) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `showstate` tinyint(4) NOT NULL,
  `statename` varchar(100) NOT NULL,
  `statewidth` varchar(20) NOT NULL,
  `regname` tinyint(4) NOT NULL,
  `storeip` tinyint(4) NOT NULL,
  `commentsystem` tinyint(4) NOT NULL,
  `lastupdate` varchar(20) NOT NULL DEFAULT '',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_eventlist_settings`
--

LOCK TABLES `jos_eventlist_settings` WRITE;
/*!40000 ALTER TABLE `jos_eventlist_settings` DISABLE KEYS */;
INSERT INTO `jos_eventlist_settings` VALUES (1,0,1,0,1,1,1,0,'','','100%','15%','25%','20%','20%','Date','Title','Venue','City','%d.%m.%Y','%H.%M','h',1,0,1,1,1,1,1,2,-2,0,'example@example.com',0,'1000',-2,-2,-2,1,'20%','Type',1,1,1,1,'100','100','100',0,1,0,0,1,2,2,-2,1,0,-2,1,0,0,'[title], [a_name], [catsid], [times]','The event titled [title] starts on [dates]!',0,'State','0',0,1,0,'1244825466',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `jos_eventlist_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_eventlist_venues`
--

DROP TABLE IF EXISTS `jos_eventlist_venues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_eventlist_venues` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `venue` varchar(50) NOT NULL DEFAULT '',
  `alias` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(200) NOT NULL DEFAULT '',
  `street` varchar(50) DEFAULT NULL,
  `plz` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(2) DEFAULT NULL,
  `locdescription` mediumtext NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `locimage` varchar(100) NOT NULL DEFAULT '',
  `map` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `author_ip` varchar(15) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_eventlist_venues`
--

LOCK TABLES `jos_eventlist_venues` WRITE;
/*!40000 ALTER TABLE `jos_eventlist_venues` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_eventlist_venues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_events_registration_fields`
--

DROP TABLE IF EXISTS `jos_events_registration_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_events_registration_fields` (
  `field_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `ordering` int(10) unsigned DEFAULT '0',
  `size` int(10) unsigned DEFAULT '50',
  `maxlength` int(10) unsigned DEFAULT '100',
  `default` varchar(50) DEFAULT NULL,
  `cb_integration` varchar(100) DEFAULT NULL,
  `tooltip` text,
  `rows` int(10) unsigned DEFAULT '0',
  `cols` int(10) unsigned DEFAULT '0',
  `required` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`field_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_events_registration_fields`
--

LOCK TABLES `jos_events_registration_fields` WRITE;
/*!40000 ALTER TABLE `jos_events_registration_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_events_registration_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_events_registration_fields_options`
--

DROP TABLE IF EXISTS `jos_events_registration_fields_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_events_registration_fields_options` (
  `option_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `field_id` int(10) unsigned NOT NULL DEFAULT '0',
  `session_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `ordering` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`option_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_events_registration_fields_options`
--

LOCK TABLES `jos_events_registration_fields_options` WRITE;
/*!40000 ALTER TABLE `jos_events_registration_fields_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_events_registration_fields_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_events_registration_fields_values`
--

DROP TABLE IF EXISTS `jos_events_registration_fields_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_events_registration_fields_values` (
  `value_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registration_id` int(10) unsigned NOT NULL DEFAULT '0',
  `field_id` int(10) unsigned NOT NULL DEFAULT '0',
  `value` text,
  PRIMARY KEY (`value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_events_registration_fields_values`
--

LOCK TABLES `jos_events_registration_fields_values` WRITE;
/*!40000 ALTER TABLE `jos_events_registration_fields_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_events_registration_fields_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_events_registrations`
--

DROP TABLE IF EXISTS `jos_events_registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_events_registrations` (
  `registration_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` int(10) unsigned NOT NULL DEFAULT '0',
  `userid` int(10) unsigned DEFAULT '0',
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cancel_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `numregistrations` int(10) unsigned NOT NULL DEFAULT '1',
  `viewed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `verified` char(1) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `comments` text,
  PRIMARY KEY (`registration_id`),
  KEY `idx_jos_events_registrations_sessionid` (`session_id`),
  KEY `idx_jos_events_registrations_userid` (`userid`),
  KEY `idx_jos_events_registrations_name` (`fullname`),
  KEY `idx_jos_events_registrations_email` (`email`),
  KEY `idx_jos_events_registrations_rdate` (`registration_date`),
  KEY `idx_jos_events_registrations_cdate` (`cancel_date`),
  KEY `idx_jos_events_registrations_num` (`numregistrations`),
  KEY `idx_jos_events_registrations_viewed` (`viewed`),
  KEY `idx_jos_events_registrations_verify` (`verified`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_events_registrations`
--

LOCK TABLES `jos_events_registrations` WRITE;
/*!40000 ALTER TABLE `jos_events_registrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_events_registrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_events_sessions`
--

DROP TABLE IF EXISTS `jos_events_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_events_sessions` (
  `session_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(12) unsigned DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `introtext` text,
  `session_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `session_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `registration_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `registration_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `maxregistrations` int(10) unsigned NOT NULL DEFAULT '0',
  `maxallowed` int(10) unsigned NOT NULL DEFAULT '1',
  `availability` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `venue_id` int(10) unsigned DEFAULT NULL,
  `venue_name` varchar(50) DEFAULT NULL,
  `venue_address` text,
  `venue_city` varchar(50) DEFAULT NULL,
  `venue_state` varchar(50) DEFAULT NULL,
  `venue_postalcode` varchar(50) DEFAULT NULL,
  `venue_country` varchar(50) DEFAULT NULL,
  `venue_webaddress` varchar(255) DEFAULT NULL,
  `host_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `idx_jos_events_sessions_event_id` (`event_id`),
  KEY `idx_jos_events_sessions_checkout` (`checked_out`),
  KEY `idx_jos_events_sessions_avail` (`availability`),
  KEY `idx_jos_events_sessions_published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_events_sessions`
--

LOCK TABLES `jos_events_sessions` WRITE;
/*!40000 ALTER TABLE `jos_events_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_events_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_events_venues`
--

DROP TABLE IF EXISTS `jos_events_venues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_events_venues` (
  `venue_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postalcode` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `webaddress` varchar(100) DEFAULT NULL,
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`venue_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_events_venues`
--

LOCK TABLES `jos_events_venues` WRITE;
/*!40000 ALTER TABLE `jos_events_venues` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_events_venues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_gk2_photoslide_extensions`
--

DROP TABLE IF EXISTS `jos_gk2_photoslide_extensions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_gk2_photoslide_extensions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `phpclassfile` varchar(255) NOT NULL,
  `version` varchar(128) NOT NULL,
  `author` varchar(128) NOT NULL,
  `desc` mediumtext NOT NULL,
  `storage` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_gk2_photoslide_extensions`
--

LOCK TABLES `jos_gk2_photoslide_extensions` WRITE;
/*!40000 ALTER TABLE `jos_gk2_photoslide_extensions` DISABLE KEYS */;
INSERT INTO `jos_gk2_photoslide_extensions` VALUES (1,'GK EasyLinks',0,'extension','ext_easylinks.xml','ext_easylinks.php','1.0','GavickPro','Interface extension to add easy way of preview and settings','');
/*!40000 ALTER TABLE `jos_gk2_photoslide_extensions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_gk2_photoslide_groups`
--

DROP TABLE IF EXISTS `jos_gk2_photoslide_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_gk2_photoslide_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `plugin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_gk2_photoslide_groups`
--

LOCK TABLES `jos_gk2_photoslide_groups` WRITE;
/*!40000 ALTER TABLE `jos_gk2_photoslide_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_gk2_photoslide_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_gk2_photoslide_plugins`
--

DROP TABLE IF EXISTS `jos_gk2_photoslide_plugins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_gk2_photoslide_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `phpclassfile` varchar(255) NOT NULL,
  `version` varchar(128) NOT NULL,
  `author` varchar(128) NOT NULL,
  `desc` mediumtext NOT NULL,
  `gfields` mediumtext NOT NULL,
  `sfields` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_gk2_photoslide_plugins`
--

LOCK TABLES `jos_gk2_photoslide_plugins` WRITE;
/*!40000 ALTER TABLE `jos_gk2_photoslide_plugins` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_gk2_photoslide_plugins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_gk2_photoslide_slides`
--

DROP TABLE IF EXISTS `jos_gk2_photoslide_slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_gk2_photoslide_slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `published` int(1) NOT NULL,
  `access` int(1) NOT NULL,
  `file` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_gk2_photoslide_slides`
--

LOCK TABLES `jos_gk2_photoslide_slides` WRITE;
/*!40000 ALTER TABLE `jos_gk2_photoslide_slides` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_gk2_photoslide_slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_groups`
--

DROP TABLE IF EXISTS `jos_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_groups` (
  `id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_groups`
--

LOCK TABLES `jos_groups` WRITE;
/*!40000 ALTER TABLE `jos_groups` DISABLE KEYS */;
INSERT INTO `jos_groups` VALUES (0,'Public'),(1,'Registered'),(2,'Special');
/*!40000 ALTER TABLE `jos_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_joomgallery`
--

DROP TABLE IF EXISTS `jos_joomgallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_joomgallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL DEFAULT '0',
  `imgtitle` text NOT NULL,
  `imgauthor` varchar(50) DEFAULT NULL,
  `imgtext` text NOT NULL,
  `imgdate` varchar(20) DEFAULT NULL,
  `imgcounter` int(11) NOT NULL DEFAULT '0',
  `imgvotes` int(11) NOT NULL DEFAULT '0',
  `imgvotesum` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `imgfilename` varchar(100) NOT NULL DEFAULT '',
  `imgthumbname` varchar(100) NOT NULL DEFAULT '',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `owner` int(11) unsigned NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `useruploaded` tinyint(1) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_catid` (`catid`),
  KEY `idx_owner` (`owner`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_joomgallery`
--

LOCK TABLES `jos_joomgallery` WRITE;
/*!40000 ALTER TABLE `jos_joomgallery` DISABLE KEYS */;
INSERT INTO `jos_joomgallery` VALUES (1,1,'Generación 94','','','1242613532',141,0,0,1,'generacin_94_20090517_1316854162.jpg','generacin_94_20090517_1316854162.jpg',0,62,1,0,20),(2,1,'Generación 94','','','1242613532',141,0,0,1,'generacin_94_20090517_1157236163.jpg','generacin_94_20090517_1157236163.jpg',0,62,1,0,31),(3,2,'Generación 91','','','1242613639',188,0,0,1,'generacin_91_20090517_1297605294.jpg','generacin_91_20090517_1297605294.jpg',0,62,1,0,21),(4,3,'Generación 95','','','1242614153',127,0,0,1,'generacin_95_20090517_1071786323.jpg','generacin_95_20090517_1071786323.jpg',0,62,1,0,23),(5,3,'Generación 95','','','1242614153',137,0,0,1,'generacin_95_20090517_1124062497.jpg','generacin_95_20090517_1124062497.jpg',0,62,1,0,38),(6,3,'Generación 95','','','1242614154',169,0,0,1,'generacin_95_20090517_1393093389.jpg','generacin_95_20090517_1393093389.jpg',0,62,1,0,45),(7,3,'Generación 95','','','1242614154',119,0,0,1,'generacin_95_20090517_1046868346.jpg','generacin_95_20090517_1046868346.jpg',0,62,1,0,59),(8,4,'Generación 96','','','1242614329',124,0,0,1,'generacin_96_20090517_1630704075.jpg','generacin_96_20090517_1630704075.jpg',0,62,1,0,24),(9,4,'Generación 96','','','1242614329',166,0,0,1,'generacin_96_20090517_1299839806.jpg','generacin_96_20090517_1299839806.jpg',0,62,1,0,25),(10,4,'Generación 96','','','1242614330',115,0,0,1,'generacin_96_20090517_2022604357.jpg','generacin_96_20090517_2022604357.jpg',0,62,1,0,50),(11,5,'Generación 97','','','1242614502',128,0,0,1,'generacin_97_20090517_2009013891.jpg','generacin_97_20090517_2009013891.jpg',0,62,1,0,19),(12,5,'Generación 97','','','1242614502',93,0,0,1,'generacin_97_20090517_1213762554.jpg','generacin_97_20090517_1213762554.jpg',0,62,1,0,27),(13,5,'Generación 97','','','1242614503',125,0,0,1,'generacin_97_20090517_1542637703.jpg','generacin_97_20090517_1542637703.jpg',0,62,1,0,47),(14,6,'Generación 98','','','1242615010',202,0,0,1,'generacin_98_20090517_1879143983.jpg','generacin_98_20090517_1879143983.jpg',0,62,1,0,18),(15,6,'Generación 98','','','1242615010',143,0,0,1,'generacin_98_20090517_1086858581.jpg','generacin_98_20090517_1086858581.jpg',0,62,1,0,36),(16,6,'Generación 98','','','1242615011',125,0,0,1,'generacin_98_20090517_1129421049.jpg','generacin_98_20090517_1129421049.jpg',0,62,1,0,49),(17,6,'Generación 98','','','1242615011',107,0,0,1,'generacin_98_20090517_1215015805.jpg','generacin_98_20090517_1215015805.jpg',0,62,1,0,57),(18,6,'Generación 98','','','1242615011',115,0,0,1,'generacin_98_20090517_1524197555.jpg','generacin_98_20090517_1524197555.jpg',0,62,1,0,64),(19,7,'Generación 99','','','1242615579',270,0,0,1,'generacin_99_20090517_1642816843.jpg','generacin_99_20090517_1642816843.jpg',0,62,1,0,22),(20,7,'Generación 99','','','1242615580',219,0,0,1,'generacin_99_20090517_1660893870.jpg','generacin_99_20090517_1660893870.jpg',0,62,1,0,33),(21,7,'Generación 99','','','1242615580',209,0,0,1,'generacin_99_20090517_1627958062.jpg','generacin_99_20090517_1627958062.jpg',0,62,1,0,46),(22,7,'Generación 99','','','1242615580',182,0,0,1,'generacin_99_20090517_1549034324.jpg','generacin_99_20090517_1549034324.jpg',0,62,1,0,53),(23,7,'Generación 99','','','1242615581',195,0,0,1,'generacin_99_20090517_1407589450.jpg','generacin_99_20090517_1407589450.jpg',0,62,1,0,62),(24,7,'Generación 99','','','1242615581',203,0,0,1,'generacin_99_20090517_1313850775.jpg','generacin_99_20090517_1313850775.jpg',0,62,1,0,71),(25,7,'Generación 99','','','1242615582',200,0,0,1,'generacin_99_20090517_1898754550.jpg','generacin_99_20090517_1898754550.jpg',0,62,1,0,74),(26,7,'Generación 99','','','1242615583',432,0,0,1,'generacin_99_20090517_1042628385.jpg','generacin_99_20090517_1042628385.jpg',0,62,1,0,78),(27,7,'Generación 99','','','1242615583',194,0,0,1,'generacin_99_20090517_1092734162.jpg','generacin_99_20090517_1092734162.jpg',0,62,1,0,80),(28,7,'Generación 99','','','1242615583',178,0,0,1,'generacin_99_20090517_1556391275.gif','generacin_99_20090517_1556391275.gif',0,62,1,0,81),(29,7,'Generación 99','','','1242615654',173,0,0,1,'generacin_99_20090517_1731873419.gif','generacin_99_20090517_1731873419.gif',0,62,1,0,82),(30,7,'Generación 99','','','1242615654',154,0,0,1,'generacin_99_20090517_1039843275.gif','generacin_99_20090517_1039843275.gif',0,62,1,0,83),(31,7,'Generación 99','','','1242615654',176,0,0,1,'generacin_99_20090517_1606023530.jpg','generacin_99_20090517_1606023530.jpg',0,62,1,0,84),(32,7,'Generación 99','','','1242615655',149,0,0,1,'generacin_99_20090517_1939021106.jpg','generacin_99_20090517_1939021106.jpg',0,62,1,0,85),(33,8,'Generación 2000','','','1242615734',394,0,0,1,'generacin_2000_20090517_1319052180.jpg','generacin_2000_20090517_1319052180.jpg',0,62,1,0,8),(34,8,'Generación 2000','','','1242616054',219,0,0,1,'generacin_2000_20090517_1675071008.jpg','generacin_2000_20090517_1675071008.jpg',0,62,1,0,34),(35,9,'Generación 2001','','','1242616749',171,0,0,1,'generacin_2001_20090517_1393250905.jpg','generacin_2001_20090517_1393250905.jpg',0,62,1,0,10),(36,9,'Generación 2001','','','1242616750',129,0,0,1,'generacin_2001_20090517_1821496329.jpg','generacin_2001_20090517_1821496329.jpg',0,62,1,0,37),(37,9,'Generación 2001','','','1242616750',84,0,0,1,'generacin_2001_20090517_1129380136.jpg','generacin_2001_20090517_1129380136.jpg',0,62,1,0,48),(38,9,'Generación 2001','','','1242616751',104,0,0,1,'generacin_2001_20090517_1225339117.jpg','generacin_2001_20090517_1225339117.jpg',0,62,1,0,51),(39,9,'Generación 2001','','','1242616752',103,0,0,1,'generacin_2001_20090517_1144677997.jpg','generacin_2001_20090517_1144677997.jpg',0,62,1,0,66),(40,9,'Generación 2001','','','1242616753',141,0,0,1,'generacin_2001_20090517_1872017858.gif','generacin_2001_20090517_1872017858.gif',0,62,1,0,70),(41,9,'Generación 2001','','','1242616754',132,0,0,1,'generacin_2001_20090517_1154799303.gif','generacin_2001_20090517_1154799303.gif',0,62,1,0,73),(42,9,'Generación 2001','','','1242616755',108,0,0,1,'generacin_2001_20090517_1313190168.gif','generacin_2001_20090517_1313190168.gif',0,62,1,0,79),(43,10,'Generación 2002','','','1242617318',124,0,0,1,'generacin_2002_20090517_1733352522.gif','generacin_2002_20090517_1733352522.gif',0,62,1,0,13),(44,10,'Generación 2002','','','1242617319',122,0,0,1,'generacin_2002_20090517_1617589145.gif','generacin_2002_20090517_1617589145.gif',0,62,1,0,28),(45,10,'Generación 2002','','','1242617320',91,0,0,1,'generacin_2002_20090517_1065264974.jpg','generacin_2002_20090517_1065264974.jpg',0,62,1,0,39),(46,10,'Generación 2002','','','1242617320',88,0,0,1,'generacin_2002_20090517_1229078100.jpg','generacin_2002_20090517_1229078100.jpg',0,62,1,0,56),(47,10,'Generación 2002','','','1242617321',91,0,0,1,'generacin_2002_20090517_1837349004.jpg','generacin_2002_20090517_1837349004.jpg',0,62,1,0,65),(48,10,'Generación 2002','','','1242617322',120,0,0,1,'generacin_2002_20090517_1872054529.jpg','generacin_2002_20090517_1872054529.jpg',0,62,1,0,67),(49,10,'Generación 2002','','','1242617323',93,0,0,1,'generacin_2002_20090517_1104843214.jpg','generacin_2002_20090517_1104843214.jpg',0,62,1,0,75),(50,11,'Generación 2003','','','1242617496',178,0,0,1,'generacin_2003_20090517_2092104294.jpg','generacin_2003_20090517_2092104294.jpg',0,62,1,0,14),(51,11,'Generación 2003','','','1242617497',167,0,0,1,'generacin_2003_20090517_1676223690.jpg','generacin_2003_20090517_1676223690.jpg',0,62,1,0,29),(52,11,'Generación 2003','','','1242617803',121,0,0,1,'generacin_2003_20090517_1797360929.jpg','generacin_2003_20090517_1797360929.jpg',0,62,1,0,40),(53,11,'Generación 2003','','Generaci&oacute;n 2003','1242618008',217,0,0,1,'generacin_2003_20090517_1855566862.jpg','generacin_2003_20090517_1855566862.jpg',0,62,1,0,52),(54,12,'Generación 2004','','','1242618237',164,0,0,1,'generacin_2004_20090517_1182292048.jpg','generacin_2004_20090517_1182292048.jpg',0,62,1,0,15),(55,12,'Generación 2004','','','1242618238',111,0,0,1,'generacin_2004_20090517_2024247784.jpg','generacin_2004_20090517_2024247784.jpg',0,62,1,0,26),(56,12,'Generación 2004','','','1242618239',102,0,0,1,'generacin_2004_20090517_1428421906.jpg','generacin_2004_20090517_1428421906.jpg',0,62,1,0,41),(57,12,'Generación 2004','','','1242618240',128,0,0,1,'generacin_2004_20090517_1377773354.jpg','generacin_2004_20090517_1377773354.jpg',0,62,1,0,55),(58,12,'Generación 2004','','','1242618240',92,0,0,1,'generacin_2004_20090517_1859900057.jpg','generacin_2004_20090517_1859900057.jpg',0,62,1,0,63),(59,12,'Generación 2004','','','1242618241',80,0,0,1,'generacin_2004_20090517_1176666125.jpg','generacin_2004_20090517_1176666125.jpg',0,62,1,0,68),(60,12,'Generación 2004','','','1242618242',115,0,0,1,'generacin_2004_20090517_1770075535.jpg','generacin_2004_20090517_1770075535.jpg',0,62,1,0,76),(61,12,'Generación 2004','','','1242618243',102,0,0,1,'generacin_2004_20090517_1248510871.jpg','generacin_2004_20090517_1248510871.jpg',0,62,1,0,77),(62,13,'Generación 2005','','','1242618413',519,0,0,1,'generacin_2005_20090517_1874444847.jpg','generacin_2005_20090517_1874444847.jpg',0,62,1,0,17),(63,13,'Generación 2005','','','1242618414',282,0,0,1,'generacin_2005_20090517_1190142395.jpg','generacin_2005_20090517_1190142395.jpg',0,62,1,0,32),(64,13,'Generación 2005','','','1242618415',248,0,0,1,'generacin_2005_20090517_1894805107.jpg','generacin_2005_20090517_1894805107.jpg',0,62,1,0,42),(65,13,'Generación 2005','','','1242618416',233,0,0,1,'generacin_2005_20090517_1072782548.jpg','generacin_2005_20090517_1072782548.jpg',0,62,1,0,54),(66,13,'Generación 2005','','','1242618417',245,0,0,1,'generacin_2005_20090517_2043045264.jpg','generacin_2005_20090517_2043045264.jpg',0,62,1,0,60),(67,13,'Generación 2005','','','1242618417',239,0,0,1,'generacin_2005_20090517_1672952503.jpg','generacin_2005_20090517_1672952503.jpg',0,62,1,0,69),(68,14,'Generación 2006','','','1242618542',565,1,5,1,'generacin_2006_20090517_1323086995.jpg','generacin_2006_20090517_1323086995.jpg',0,62,1,0,12),(69,14,'Generación 2006','','','1242618543',297,0,0,1,'generacin_2006_20090517_2086509092.jpg','generacin_2006_20090517_2086509092.jpg',0,62,1,0,30),(70,14,'Generación 2006','','','1242618544',273,0,0,1,'generacin_2006_20090517_1740920615.jpg','generacin_2006_20090517_1740920615.jpg',0,62,1,0,43),(71,15,'Generación 2007','','','1242618849',939,0,0,1,'generacin_2007_20090517_2003780116.jpg','generacin_2007_20090517_2003780116.jpg',0,62,1,0,6),(72,15,'Generación 2007','','','1242618850',815,0,0,1,'generacin_2007_20090517_1361606150.jpg','generacin_2007_20090517_1361606150.jpg',0,62,1,0,35),(73,15,'Generación 2007','','','1242618850',773,0,0,1,'generacin_2007_20090517_1851769654.jpg','generacin_2007_20090517_1851769654.jpg',0,62,1,0,44),(74,15,'Generación 2007','','','1242618851',390,0,0,1,'generacin_2007_20090517_1902416888.jpg','generacin_2007_20090517_1902416888.jpg',0,62,1,0,58),(75,15,'Generación 2007-B','','','1250193262',288,0,0,1,'generacin_2007-b_20090813_1591305595.jpg','generacin_2007-b_20090813_1591305595.jpg',0,62,1,0,61),(76,15,'Generación 2007-B','','','1250193263',235,0,0,1,'generacin_2007-b_20090813_1918856798.jpg','generacin_2007-b_20090813_1918856798.jpg',0,62,1,0,72),(77,16,'Generación 2008','','','1250193287',926,0,0,1,'generacin_2008_20090813_1787279252.jpg','generacin_2008_20090813_1787279252.jpg',0,62,1,0,16),(78,17,'Xonia Ivonne Olavarrieta Gen99','','','1251069286',183,0,0,1,'xonia_ivonne_olavarrieta_gen99_20090823_1112433833.jpg','xonia_ivonne_olavarrieta_gen99_20090823_1112433833.jpg',0,62,1,0,5),(79,18,'MaEnry Gen95','','','1251069331',141,0,0,1,'maenry_gen95_20090823_1883887855.jpg','maenry_gen95_20090823_1883887855.jpg',0,62,1,0,2),(80,20,'Angel Tamariz Gen2002','','','1251069528',344,0,0,1,'angel_tamariz_gen2002_20090823_1557379429.jpg','angel_tamariz_gen2002_20090823_1557379429.jpg',0,62,1,0,4),(81,21,'Estancia Stanford - Verano 2008','','','1251069675',354,0,0,1,'estancia_stanford_-_verano_2008_20090823_1693465430.jpg','estancia_stanford_-_verano_2008_20090823_1693465430.jpg',0,62,1,0,3),(82,21,'Estancia Stanford - Verano 2008','','','1251069676',273,0,0,1,'estancia_stanford_-_verano_2008_20090823_1881668006.jpg','estancia_stanford_-_verano_2008_20090823_1881668006.jpg',0,62,1,0,7),(83,21,'Estancia Stanford - Verano 2008','','','1251069676',292,0,0,1,'estancia_stanford_-_verano_2008_20090823_1635601319.jpg','estancia_stanford_-_verano_2008_20090823_1635601319.jpg',0,62,1,0,9),(84,21,'Estancia Stanford - Verano 2008','','','1251069677',324,0,0,1,'estancia_stanford_-_verano_2008_20090823_1446392242.jpg','estancia_stanford_-_verano_2008_20090823_1446392242.jpg',0,62,1,0,11),(86,22,'Ludwin Ventura Gen99','','','1251070882',470,0,0,1,'ludwin_ventura_gen99_20090823_1186816485.jpg','ludwin_ventura_gen99_20090823_1186816485.jpg',0,62,1,0,0),(87,23,'Intercambio con España ','','','1251118705',536,0,0,1,'eventos_internacionales_20090824_1207513951.jpg','eventos_internacionales_20090824_1207513951.jpg',0,62,1,0,0),(88,23,'ICT-2000 ','','','1251118705',432,0,0,1,'eventos_internacionales_20090824_1945700985.jpg','eventos_internacionales_20090824_1945700985.jpg',0,62,1,0,1),(89,23,'ICT-2000 ','','','1251118706',717,0,0,1,'eventos_internacionales_20090824_1461931143.jpg','eventos_internacionales_20090824_1461931143.jpg',0,62,1,0,2),(90,23,'ICT-2000 ','','','1251118706',495,0,0,1,'eventos_internacionales_20090824_2029432161.jpg','eventos_internacionales_20090824_2029432161.jpg',0,62,1,0,3),(91,24,'Mario Alberto Castro Gen2005','','','1251433108',282,0,0,1,'mario_alberto_castro_gen2005_20090827_1447656470.jpg','mario_alberto_castro_gen2005_20090827_1447656470.jpg',0,62,1,0,0),(92,25,'Stanford 2008','','','1252175986',402,0,0,1,'stanford_2008_20090905_1246728459.jpg','stanford_2008_20090905_1246728459.jpg',0,62,1,0,0),(93,21,'Rectoria','','','1255527820',372,0,0,1,'rectoria_20091014_1641676507.jpg','rectoria_20091014_1641676507.jpg',0,62,1,0,12),(94,26,'Capsula del Tiempo','','','1273090197',520,0,0,1,'capsula_del_tiempo_20100505_1370180504.jpg','capsula_del_tiempo_20100505_1370180504.jpg',0,62,1,0,0),(95,26,'Capsula del Tiempo','','','1273090200',468,0,0,1,'capsula_del_tiempo_20100505_2092654971.jpg','capsula_del_tiempo_20100505_2092654971.jpg',0,62,1,0,1),(96,26,'Capsula del Tiempo','','','1273090203',517,0,0,1,'capsula_del_tiempo_20100505_1517111589.jpg','capsula_del_tiempo_20100505_1517111589.jpg',0,62,1,0,2),(97,26,'Capsula del Tiempo','','','1273617598',434,0,0,1,'capsula_del_tiempo_20100511_1379402569.jpg','capsula_del_tiempo_20100511_1379402569.jpg',0,62,1,0,3),(98,26,'Capsula del Tiempo','','','1273617599',767,0,0,1,'capsula_del_tiempo_20100511_1547578563.jpg','capsula_del_tiempo_20100511_1547578563.jpg',0,62,1,0,4),(99,26,'Mosaico 2010','','','1273710746',370,0,0,1,'mosaico_2010_20100512_1275199294.jpg','mosaico_2010_20100512_1275199294.jpg',0,62,1,0,5),(100,27,'Generación 2009','','','1277238055',609,0,0,1,'generacin_2009_20100622_1223294255.jpg','generacin_2009_20100622_1223294255.jpg',0,62,1,0,0),(101,27,'Generacion 2009 Telecomunicaciones A','','','1300555176',257,0,0,1,'generacion_2009_telecomunicaciones_2_20110319_1905668150.jpg','generacion_2009_telecomunicaciones_2_20110319_1905668150.jpg',0,62,1,0,1),(102,27,'Generacion 2009 Telecomunicaciones B','','','1300555179',176,0,0,1,'generacion_2009_telecomunicaciones_3_20110319_1945582850.jpg','generacion_2009_telecomunicaciones_3_20110319_1945582850.jpg',0,62,1,0,2),(103,15,'Generación 2007 Padrinos','','','1300555285',133,0,0,1,'generacion_2007_padrino_1_20110319_1635873055.jpg','generacion_2007_padrino_1_20110319_1635873055.jpg',0,62,1,0,73);
/*!40000 ALTER TABLE `jos_joomgallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_joomgallery_catg`
--

DROP TABLE IF EXISTS `jos_joomgallery_catg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_joomgallery_catg` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `parent` int(11) NOT NULL DEFAULT '0',
  `description` text,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `published` char(1) NOT NULL DEFAULT '0',
  `owner` int(11) DEFAULT NULL,
  `catimage` varchar(100) DEFAULT NULL,
  `img_position` int(10) DEFAULT '0',
  `catpath` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`cid`),
  KEY `idx_parent` (`parent`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_joomgallery_catg`
--

LOCK TABLES `jos_joomgallery_catg` WRITE;
/*!40000 ALTER TABLE `jos_joomgallery_catg` DISABLE KEYS */;
INSERT INTO `jos_joomgallery_catg` VALUES (1,'Generación 94',0,'',17,0,'1',NULL,'',0,'generacin_94_1'),(2,'Generación 91',0,'',26,0,'1',NULL,'',0,'generacin_91_2'),(3,'Generación 95',0,'',16,0,'1',NULL,'',0,'generacin_95_3'),(4,'Generación 96',0,'',15,0,'1',NULL,'',0,'generacin_96_4'),(5,'Generación 97',0,'',14,0,'1',NULL,'',0,'generacin_97_5'),(6,'Generación 98',0,'',13,0,'1',NULL,'',0,'generacin_98_6'),(7,'Generación 99',0,'',12,0,'1',NULL,'',0,'generacin_99_7'),(8,'Generación 2000',0,'',11,0,'1',NULL,'',0,'generacin_2000_8'),(9,'Generación 2001',0,'',10,0,'1',NULL,'',0,'generacin_2001_9'),(10,'Generación 2002',0,'',9,0,'1',NULL,'',0,'generacin_2002_10'),(11,'Generación 2003',0,'',8,0,'1',NULL,'',0,'generacin_2003_11'),(12,'Generación 2004',0,'',7,0,'1',NULL,'',0,'generacin_2004_12'),(13,'Generación 2005',0,'',6,0,'1',NULL,'',0,'generacin_2005_13'),(14,'Generación 2006',0,'',5,0,'1',NULL,'',0,'generacin_2006_14'),(15,'Generación 2007',0,'',4,0,'1',NULL,'',0,'generacin_2007_15'),(16,'Generación 2008',0,'',3,0,'1',NULL,'',0,'generacin_2008_16'),(17,'N.Y.',19,'',25,0,'1',NULL,'',0,'alumni_19/N.Y._17'),(18,'University of Birmingham',19,'',23,0,'1',NULL,'',0,'alumni_19/University of Birmingham_18'),(19,'Alumni',0,'',18,0,'1',NULL,'',0,'alumni_19'),(20,'Marruecos',19,'',19,0,'1',NULL,'',0,'alumni_19/marruecos_20'),(21,'Estancia Stanford - Verano 2008',19,'',21,0,'1',NULL,'',0,'alumni_19/estancia_stanford_-_verano_2008_21'),(22,'Alumni',19,'',24,0,'1',NULL,'',0,'alumni_19/alumni_22'),(23,'Eventos Internacionales',0,'',27,0,'1',NULL,'',0,'eventos_internacionales_23'),(24,'Belice',19,'',20,0,'1',NULL,'',0,'alumni_19/belice_24'),(25,'Standford 2008',19,'',22,0,'1',NULL,'',0,'alumni_19/standford_2008_25'),(26,'Capsula del tiempo',0,'<h2>En la cápsula del tiempo de la Facultad de Ingeniería, el Departamento de Telecomunicaiones contribuyó con los siguientes elementos.</h2><ul><li><h2>Álbum con fotos de todas las generaciones de alumnos, de 1992 a 2008</h2></li></ul><ul><li><h2>Un mosaico con el escudo de la Facultad de fondo y realizado con 450 fotos de miembros de la comunidad de telecomunicaciones, tomadas a lo largo de 18 años. Todo alumno de la carrera tiene un lugar en este mosaico.    </h2></li><li><h2>Firmas y pensamientos a las futuras generaciones fueron inscritos por alumnos aun presentes en la Facultad, en el álbum y en el poster.</h2></li></ul>',2,0,'1',NULL,'',0,'capsula_del_tiempo_26'),(27,'Generación 2009',0,'',1,0,'1',NULL,'',0,'generacin_2009_27');
/*!40000 ALTER TABLE `jos_joomgallery_catg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_joomgallery_comments`
--

DROP TABLE IF EXISTS `jos_joomgallery_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_joomgallery_comments` (
  `cmtid` int(11) NOT NULL AUTO_INCREMENT,
  `cmtpic` int(11) NOT NULL DEFAULT '0',
  `cmtip` varchar(15) NOT NULL DEFAULT '',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `cmtname` varchar(50) NOT NULL DEFAULT '',
  `cmttext` text NOT NULL,
  `cmtdate` varchar(20) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cmtid`),
  KEY `idx_cmtpic` (`cmtpic`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_joomgallery_comments`
--

LOCK TABLES `jos_joomgallery_comments` WRITE;
/*!40000 ALTER TABLE `jos_joomgallery_comments` DISABLE KEYS */;
INSERT INTO `jos_joomgallery_comments` VALUES (1,59,'132.248.59.180',64,'','hola:grin:','1242619903',1,0),(2,26,'132.248.59.180',64,'','hola:grin:','1242672292',1,1);
/*!40000 ALTER TABLE `jos_joomgallery_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_joomgallery_countstop`
--

DROP TABLE IF EXISTS `jos_joomgallery_countstop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_joomgallery_countstop` (
  `cspicid` int(11) NOT NULL DEFAULT '0',
  `csip` varchar(20) NOT NULL,
  `cssessionid` varchar(200) DEFAULT NULL,
  `cstime` datetime DEFAULT NULL,
  PRIMARY KEY (`cspicid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_joomgallery_countstop`
--

LOCK TABLES `jos_joomgallery_countstop` WRITE;
/*!40000 ALTER TABLE `jos_joomgallery_countstop` DISABLE KEYS */;
INSERT INTO `jos_joomgallery_countstop` VALUES (69,'132.248.59.180','0f42142dd151b930ecd40869bcffdc64','2009-05-17 22:50:31');
/*!40000 ALTER TABLE `jos_joomgallery_countstop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_joomgallery_nameshields`
--

DROP TABLE IF EXISTS `jos_joomgallery_nameshields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_joomgallery_nameshields` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `npicid` int(11) NOT NULL DEFAULT '0',
  `nuserid` int(11) unsigned NOT NULL DEFAULT '0',
  `nxvalue` int(11) NOT NULL DEFAULT '0',
  `nyvalue` int(11) NOT NULL DEFAULT '0',
  `nuserip` varchar(15) NOT NULL DEFAULT '0',
  `ndate` varchar(20) NOT NULL,
  `nzindex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nid`),
  KEY `idx_picid` (`npicid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_joomgallery_nameshields`
--

LOCK TABLES `jos_joomgallery_nameshields` WRITE;
/*!40000 ALTER TABLE `jos_joomgallery_nameshields` DISABLE KEYS */;
INSERT INTO `jos_joomgallery_nameshields` VALUES (1,3,64,19,137,'132.248.59.180','1242619440',499);
/*!40000 ALTER TABLE `jos_joomgallery_nameshields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_joomgallery_users`
--

DROP TABLE IF EXISTS `jos_joomgallery_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_joomgallery_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uuserid` int(11) NOT NULL DEFAULT '0',
  `piclist` text,
  `layout` int(1) NOT NULL,
  `time` datetime NOT NULL,
  `zipname` varchar(70) NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `idx_uid` (`uuserid`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_joomgallery_users`
--

LOCK TABLES `jos_joomgallery_users` WRITE;
/*!40000 ALTER TABLE `jos_joomgallery_users` DISABLE KEYS */;
INSERT INTO `jos_joomgallery_users` VALUES (1,62,'3',0,'0000-00-00 00:00:00',''),(2,64,'69',0,'0000-00-00 00:00:00','');
/*!40000 ALTER TABLE `jos_joomgallery_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_joomgallery_votes`
--

DROP TABLE IF EXISTS `jos_joomgallery_votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_joomgallery_votes` (
  `voteid` int(11) NOT NULL AUTO_INCREMENT,
  `picid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) unsigned NOT NULL DEFAULT '0',
  `userip` varchar(15) NOT NULL DEFAULT '0',
  `datevoted` varchar(20) NOT NULL,
  `timevoted` varchar(20) NOT NULL,
  `vote` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`voteid`),
  KEY `idx_picid` (`picid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_joomgallery_votes`
--

LOCK TABLES `jos_joomgallery_votes` WRITE;
/*!40000 ALTER TABLE `jos_joomgallery_votes` DISABLE KEYS */;
INSERT INTO `jos_joomgallery_votes` VALUES (1,68,64,'132.248.59.180','2009-05-18','1242673797',5);
/*!40000 ALTER TABLE `jos_joomgallery_votes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_jx_jambook`
--

DROP TABLE IF EXISTS `jos_jx_jambook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_jx_jambook` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `authoralias` varchar(255) NOT NULL DEFAULT '',
  `replyto` int(11) unsigned NOT NULL DEFAULT '0',
  `spamscore` tinyint(4) NOT NULL DEFAULT '0',
  `fromip` varchar(255) NOT NULL DEFAULT '',
  `guestbook_id` int(11) unsigned NOT NULL DEFAULT '0',
  `section` varchar(255) NOT NULL DEFAULT '',
  `attribs` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out` tinyint(4) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `access` int(11) unsigned NOT NULL DEFAULT '0',
  `ordering` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_jx_jambook`
--

LOCK TABLES `jos_jx_jambook` WRITE;
/*!40000 ALTER TABLE `jos_jx_jambook` DISABLE KEYS */;
INSERT INTO `jos_jx_jambook` VALUES (1,'Hola','Bienvenido','','','',0,0,'132.248.59.180',0,'','hideemail=0\nhideurl=0\n',1,'2009-04-03 11:01:32',62,'2009-04-03 11:02:02',62,0,'0000-00-00 00:00:00','2009-04-03 00:00:00','0000-00-00 00:00:00',0,2,0,1),(2,'mo','nnnnnn','','','',0,0,'132.248.59.180',0,'','hideemail=0\nhideurl=0\n',1,'2009-04-17 11:09:08',64,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,2),(3,'ee','mm                                         ','','','Invitado',0,0,'132.248.59.180',0,'','hideemail=0\nhideurl=0\n',1,'2009-05-06 13:45:23',0,'0000-00-00 00:00:00',0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,0,3);
/*!40000 ALTER TABLE `jos_jx_jambook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_menu`
--

DROP TABLE IF EXISTS `jos_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `link` text,
  `type` varchar(50) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `componentid` int(11) unsigned NOT NULL DEFAULT '0',
  `sublevel` int(11) DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL DEFAULT '0',
  `browserNav` tinyint(4) DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `utaccess` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL DEFAULT '0',
  `rgt` int(11) unsigned NOT NULL DEFAULT '0',
  `home` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_menu`
--

LOCK TABLES `jos_menu` WRITE;
/*!40000 ALTER TABLE `jos_menu` DISABLE KEYS */;
INSERT INTO `jos_menu` VALUES (1,'menuprincipal','Inicio','home','index.php?option=com_content&view=article&id=3','component',1,0,20,0,1,0,'0000-00-00 00:00:00',0,0,0,3,'show_noauth=\nshow_title=1\nlink_titles=1\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,1),(88,'carrera','Servicios al alumno','servicios-al-alumno','index.php?option=com_content&view=article&id=61','component',1,0,20,0,10,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(90,'alumnos','Padrinos de Generación','padrinos-de-generacion','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/pdf%5Barticles%5D/PadTel.pdf\nscrolling=auto\nwidth=100%\nheight=930\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(91,'carrera','Modulos de Salida','modulos-de-salida','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/pdf%5Barticles%5D/TriModSal.pdf\nscrolling=auto\nwidth=100%\nheight=930\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(6,'departamento','Organigrama','directorio','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/other/Organigrama/orgTelecom.html\nscrolling=auto\nwidth=100%\nheight=600\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(7,'departamento','Ubicación','ubicacion','index.php?option=com_content&view=article&id=4','component',1,0,20,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(8,'departamento','Historia','historia','index.php?option=com_content&view=article&id=65','component',1,0,20,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(9,'departamento','Funciones','funciones','index.php?option=com_content&view=article&id=13','component',1,0,20,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(10,'departamento','Investigadores','investigadores','index.php?option=com_content&view=article&id=14','component',0,0,20,0,5,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(11,'departamento','Consejo Tecncnico','consejo-tecncnico','index.php?option=com_content&view=article&id=15','component',0,0,20,0,6,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(93,'lprofesores','Margarita Bautista','margarita-bautista','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,14,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=11\nscrolling=auto\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(13,'carrera','Descripción','descripcion','index.php?option=com_content&view=article&id=58','component',1,0,20,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(14,'carrera','Perfil del egresado','perfil-del-egresado','index.php?option=com_content&view=article&id=7','component',1,0,20,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(15,'carrera','Campo de trabajo','campo-de-trabajo','index.php?option=com_content&view=article&id=8','component',1,0,20,0,5,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(16,'carrera','Requisitos de Ingreso','requisitos-de-ingreso','index.php?option=com_content&view=article&id=9','component',1,0,20,0,6,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(17,'carrera','Plan de estudios','plan-de-estudios','index.php?option=com_content&view=article&id=63','component',1,0,20,0,8,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(18,'alumnos','Distinciones','distinciones','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,6,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/pdf%5Barticles%5D/Dist.pdf\nscrolling=no\nwidth=100%\nheight=930\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(92,'lprofesores','Ignacio Flores Llamas','ignacio-flores-llamas','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=2\nscrolling=no\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(19,'alumnos','Bienvenido','bienvenido','index.php?option=com_jambook','component',-2,0,34,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(21,'alumnos','Calendario Escolar','calendario-escolar','index.php?option=com_content&view=article&id=54','component',1,0,20,0,7,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(22,'avisos','Convoactoria de Ingreso','convoactoria-de-ingreso','index.php?option=com_content&view=article&id=17','component',0,0,20,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(23,'avisos','Servicio Social','servicio-social','index.php?option=com_content&view=article&id=18','component',-2,0,20,0,0,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(24,'avisos','Practicas Profesionales','practicas-profesionales','index.php?option=com_content&view=article&id=19','component',-2,0,20,0,0,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(25,'avisos','Otros','otros','index.php?option=com_content&view=article&id=3','component',0,0,20,0,9,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(26,'menuprincipal','Profesores','contact','http://telecom.fi-b.unam.mx/index.php?option=com_wrapper&view=wrapper&Itemid=55','url',1,0,0,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'menu_image=-1\n\n',0,0,0),(27,'alumnos','Generaciones','generaciones','index.php?option=com_joomgallery','component',1,0,63,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(78,'alumnos','Alumni','alumni','index.php?option=com_joomgallery&func=viewcategory&catid=19&Itemid=78','url',1,0,0,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'menu_image=-1\n\n',0,0,0),(80,'avisos','Mosaico 2010','mosaico-2010','index.php?option=com_content&view=article&id=56','component',1,0,20,0,6,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(81,'alumnos','TeleTube','teletube','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/TeleTube/\nscrolling=auto\nwidth=100%\nheight=500\nheight_auto=0\nadd_scheme=1\npage_title=TeleTube\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(33,'avisos','Eventos','eventos','index.php?option=com_eventlist&view=categories','component',0,0,116,0,8,0,'0000-00-00 00:00:00',0,0,0,0,'display_num=\ncat_num=4\nfilter=\ndisplay=\nicons=\nshow_print_icon=\nshow_email_icon=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(82,'alumnos','Capsula del tiempo','capsula-del-tiempo','index.php?option=com_joomgallery&func=viewcategory&catid=26&Itemid=78','url',1,0,0,0,5,0,'0000-00-00 00:00:00',0,0,0,0,'menu_image=-1\n\n',0,0,0),(35,'alumnos','Alumnos','alumnos','index.php?option=com_comprofiler&task=userslist','component',-2,0,119,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(86,'carrera','Habilidades y actitudes','habilidades-y-actitudes','index.php?option=com_content&view=article&id=59','component',1,0,20,0,7,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(87,'carrera','Condiciones Particulares','condiciones-particulares','index.php?option=com_content&view=article&id=60','component',1,0,20,0,9,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(85,'carrera','Perfil del Aspirante','perfil-del-aspirante','index.php?option=com_content&view=article&id=62','component',1,0,20,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(43,'mis-materias','Antenas Gp1','antenas-gp1','index.php?option=com_content&view=section&id=18','component',1,0,20,0,1,0,'0000-00-00 00:00:00',0,0,1,0,'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=1\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(44,'mis-materias','Antenas Gp2','antenas-gp2','index.php?option=com_content&view=section&id=13','component',1,0,20,0,2,0,'0000-00-00 00:00:00',0,0,1,0,'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=1\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(45,'mis-materias','Receptores Gp1','receptores-gp1','index.php?option=com_content&view=section&id=19','component',1,0,20,0,3,0,'0000-00-00 00:00:00',0,0,1,0,'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=1\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(46,'mis-materias','Receptores Gp2','receptores-gp2','index.php?option=com_content&view=section&id=14','component',1,0,20,0,4,0,'0000-00-00 00:00:00',0,0,1,0,'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=1\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(47,'mis-materias','Redes de datos GP1','redes-de-datos-gp1','index.php?option=com_content&view=section&id=20','component',1,0,20,0,5,0,'0000-00-00 00:00:00',0,0,1,0,'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=1\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(48,'mis-materias','Redes de datos GP2','redes-de-datos-gp2','index.php?option=com_content&view=section&id=21','component',1,0,20,0,6,0,'0000-00-00 00:00:00',0,0,1,0,'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=1\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(49,'mis-materias','Tecnologías para procesamiento digital de señales GP1','tecnologias-para-procesamiento-digital-de-senales-gp1','index.php?option=com_content&view=section&id=16','component',1,0,20,0,7,0,'0000-00-00 00:00:00',0,0,1,0,'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=1\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(50,'mis-materias','Tecnologías para procesamiento digital de señales GP2','tecnologias-para-procesamiento-digital-de-senales-gp2','index.php?option=com_content&view=section&id=17','component',1,0,20,0,8,0,'0000-00-00 00:00:00',0,0,1,0,'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=1\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(51,'mis-materias','Transmisores Gp1','transmisores-gp1','index.php?option=com_content&view=section&id=22','component',1,0,20,0,9,0,'0000-00-00 00:00:00',0,0,1,0,'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=1\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(52,'mis-materias','Transmisores Gp2','transmisores-gp2','index.php?option=com_content&view=section&id=23','component',1,0,20,0,10,0,'0000-00-00 00:00:00',0,0,1,0,'show_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=1\nshow_cat_num_articles=1\nshow_category_description=1\norderby=\norderby_sec=\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(53,'alumnos','Mi Grupo','mi-grupo','index.php?option=com_content&view=article&id=49','component',-2,0,20,0,2,0,'0000-00-00 00:00:00',0,0,1,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(54,'lprofesores','Home','home','http://telecom.fi-b.unam.mx/','url',-2,0,0,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'menu_image=-1\n\n',0,0,0),(55,'lprofesores','Miguel Moctezuma Flores','miguel-moctezuma-flores','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=1000\nscrolling=no\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(56,'lprofesores','Ignacio Flores Llamas','ignacio-flores-llamas','index.php?option=com_content&view=article&id=43','component',1,1,20,1,3,0,'0000-00-00 00:00:00',1,1,1,1,'show_noauth=\r\nshow_title=\r\nlink_titles=\r\nshow_intro=\r\nshow_section=\r\nlink_section=\r\nshow_category=\r\nlink_category=\r\nshow_author=\r\nshow_create_date=\r\nshow_modify_date=\r\nshow_item_navigation=\r\nshow_readmore=\r\nshow_vote=\r\nshow_icons=\r\nshow_pdf_icon=\r\nshow_print_icon=\r\nshow_email_icon=\r\nshow_hits=\r\nfeed_summary=\r\npage_title=\r\nshow_page_title=1\r\npageclass_sfx=\r\nmenu_image=-1\r\nsecure=0\r\n\r\n',0,0,0),(57,'lprofesores','Alfredo Ibarra Pereyra','mario-alfredo-ibarra-pereyra','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=3\nscrolling=no\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(58,'lprofesores','Bohumil Psenicka','bohumil-psenicka-skuhersky','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,5,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=4\nscrolling=yes\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(59,'lprofesores','Damián Federico Vargas','damian-federico-vargas-sandoval','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,7,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=5\nscrolling=no\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(60,'lprofesores','Dra. Fatima Moumtadi','dra-fatima-moumtadi','index.php?option=com_content&view=article&id=36','component',-2,0,20,0,8,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(61,'lprofesores','Javier Gómez Castellanos','javier-gomez-castellanos','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,9,62,'2010-11-20 04:33:48',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=6\nscrolling=auto\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(62,'lprofesores','Jesús Reyes García','jesus-reyes-garcia','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,10,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=7\nscrolling=auto\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(63,'lprofesores','José Luis García García','jose-luis-garcia-garcia','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,11,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=8\nscrolling=auto\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(64,'lprofesores','José  Matías','jose-maria-matias-marur','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,13,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=9\nscrolling=auto\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(65,'lprofesores','Juan Fernando Solórzano','juan-fernando-solorzano-palomares','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,21,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=18\nscrolling=auto\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(66,'lprofesores','Julio César Tinoco Magaña','julio-cesar-tinoco-magana','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,12,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=10\nscrolling=no\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(67,'lprofesores','Oleksandr Martynyuk','oleksandr-martynyuk','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,15,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=12\nscrolling=auto\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(68,'lprofesores','Rodolfo Neri Vela','rodolfo-neri-vela','index.php?option=com_content&view=article&id=31','component',-2,0,20,0,6,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(69,'lprofesores','Salvador Landeros Ayala','salvador-landeros-ayala','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,16,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=13\nscrolling=auto\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(70,'lprofesores','Serguei Khotiaintsev','serguei-khotiaintsev','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,17,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=14\nscrolling=auto\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(71,'lprofesores','Víctor García Garduño','victor-garcia-garduno','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,18,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=15\nscrolling=auto\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(72,'lprofesores','Víctor Rangel Licea','victor-ragel-licea','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,19,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=16\nscrolling=auto\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(73,'lprofesores','Vladimir Svirid','vladimir-svirid','index.php?option=com_wrapper&view=wrapper','component',1,0,17,0,20,0,'0000-00-00 00:00:00',0,0,0,0,'url=http://telecom.fi-b.unam.mx/JoomFix/profesorLayOut.php?prof=17\nscrolling=auto\nwidth=100%\nheight=1500\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(74,'menuprincipal','Grupo de Trabajo','grupo-de-trabajo','group/','url',1,0,0,0,5,0,'0000-00-00 00:00:00',0,0,0,0,'menu_image=-1\n\n',0,0,0),(76,'alumnos','Cursos','cursos','group/','url',-2,0,0,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'menu_image=-1\n\n',0,0,0),(77,'avisos','Eventos internacionales','otros-intereses-eventos-internacionales','http://telecom.fi-b.unam.mx/index.php?option=com_joomgallery&func=viewcategory&catid=23&Itemid=27','url',1,0,0,0,7,0,'0000-00-00 00:00:00',0,0,0,0,'menu_image=-1\n\n',0,0,0),(79,'menuprincipal','Mosaico 2010','descarga-el-mosaico-2010-de-telecom','index.php?option=com_content&view=article&id=56','component',1,0,20,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),(89,'menuprincipal','Misión y Visión','mision-y-vision','index.php?option=com_content&view=article&id=64','component',1,0,20,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0);
/*!40000 ALTER TABLE `jos_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_menu_types`
--

DROP TABLE IF EXISTS `jos_menu_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_menu_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_menu_types`
--

LOCK TABLES `jos_menu_types` WRITE;
/*!40000 ALTER TABLE `jos_menu_types` DISABLE KEYS */;
INSERT INTO `jos_menu_types` VALUES (1,'menuprincipal','Menú Principal','The main menu for the site'),(3,'departamento','Departamento',''),(4,'carrera','Carrera',''),(5,'alumnos','Alumnos',''),(6,'avisos','Avisos y otros Intereses',''),(10,'mis-materias','Materia',''),(12,'lprofesores','Profesores','');
/*!40000 ALTER TABLE `jos_menu_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_messages`
--

DROP TABLE IF EXISTS `jos_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id_from` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id_to` int(10) unsigned NOT NULL DEFAULT '0',
  `folder_id` int(10) unsigned NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` int(11) NOT NULL DEFAULT '0',
  `priority` int(1) unsigned NOT NULL DEFAULT '0',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_messages`
--

LOCK TABLES `jos_messages` WRITE;
/*!40000 ALTER TABLE `jos_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_messages_cfg`
--

DROP TABLE IF EXISTS `jos_messages_cfg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg_name` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_messages_cfg`
--

LOCK TABLES `jos_messages_cfg` WRITE;
/*!40000 ALTER TABLE `jos_messages_cfg` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_messages_cfg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_migration_backlinks`
--

DROP TABLE IF EXISTS `jos_migration_backlinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_migration_backlinks`
--

LOCK TABLES `jos_migration_backlinks` WRITE;
/*!40000 ALTER TABLE `jos_migration_backlinks` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_migration_backlinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_modules`
--

DROP TABLE IF EXISTS `jos_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) DEFAULT NULL,
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `numnews` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL DEFAULT '0',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `control` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_modules`
--

LOCK TABLES `jos_modules` WRITE;
/*!40000 ALTER TABLE `jos_modules` DISABLE KEYS */;
INSERT INTO `jos_modules` VALUES (1,'Menú Principal','',0,'left',0,'0000-00-00 00:00:00',1,'mod_mainmenu',0,0,1,'menutype=menuprincipal\nmenu_style=list\nstartLevel=0\nendLevel=5\nshowAllChildren=1\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n',1,0,''),(2,'Login','',1,'login',0,'0000-00-00 00:00:00',1,'mod_login',0,0,1,'',1,1,''),(3,'Popular','',3,'cpanel',0,'0000-00-00 00:00:00',1,'mod_popular',0,2,1,'',0,1,''),(4,'Recent added Articles','',4,'cpanel',0,'0000-00-00 00:00:00',1,'mod_latest',0,2,1,'ordering=c_dsc\nuser_id=0\ncache=0\n\n',0,1,''),(5,'Menu Stats','',5,'cpanel',0,'0000-00-00 00:00:00',1,'mod_stats',0,2,1,'',0,1,''),(6,'Unread Messages','',1,'header',0,'0000-00-00 00:00:00',1,'mod_unread',0,2,1,'',1,1,''),(7,'Online Users','',2,'header',0,'0000-00-00 00:00:00',1,'mod_online',0,2,1,'',1,1,''),(8,'Toolbar','',1,'toolbar',0,'0000-00-00 00:00:00',1,'mod_toolbar',0,2,1,'',1,1,''),(9,'Quick Icons','',1,'icon',0,'0000-00-00 00:00:00',1,'mod_quickicon',0,2,1,'',1,1,''),(10,'Logged in Users','',2,'cpanel',0,'0000-00-00 00:00:00',1,'mod_logged',0,2,1,'',0,1,''),(11,'Footer','',0,'footer',0,'0000-00-00 00:00:00',1,'mod_footer',0,0,1,'',1,1,''),(12,'Admin Menu','',1,'menu',0,'0000-00-00 00:00:00',1,'mod_menu',0,2,1,'',0,1,''),(13,'Admin SubMenu','',1,'submenu',0,'0000-00-00 00:00:00',1,'mod_submenu',0,2,1,'',0,1,''),(14,'User Status','',1,'status',0,'0000-00-00 00:00:00',1,'mod_status',0,2,1,'',0,1,''),(15,'Title','',1,'title',0,'0000-00-00 00:00:00',1,'mod_title',0,2,1,'',0,1,''),(17,'Encuesta','',5,'right',0,'0000-00-00 00:00:00',1,'mod_poll',0,0,1,'id=1\nmoduleclass_sfx=\ncache=1\ncache_time=900\n\n',0,0,''),(18,'Home','',0,'top',0,'0000-00-00 00:00:00',0,'mod_sections',0,0,1,'count=5\nmoduleclass_sfx=\ncache=0\ncache_time=900\n\n',0,0,''),(19,'Inicio','',3,'right',0,'0000-00-00 00:00:00',0,'mod_login',0,0,1,'cache=0\nmoduleclass_sfx=\npretext=\nposttext=\nlogin=1\nlogout=1\ngreeting=1\nname=0\nusesecure=0\n\n',0,0,''),(28,'Contactar a Miguel','',6,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=miguelm@verona.fi-p.unam.mx\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(29,'Contactar a Ignacio','',7,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=ifloresllamas@yahoo.com\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(21,'Departamento','',4,'left',0,'0000-00-00 00:00:00',1,'mod_mainmenu',0,0,1,'menutype=departamento\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n',0,0,''),(23,'antena','<div align=\"right\"><object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"298\" height=\"75\"><param name=\"width\" value=\"298\" /><param name=\"height\" value=\"75\" /><param name=\"src\" value=\"images/antena.swf\" /><embed type=\"application/x-shockwave-flash\" width=\"298\" height=\"75\" src=\"images/antena.swf\"></embed></object></div><p>&nbsp;</p>',2,'newsflash',0,'0000-00-00 00:00:00',0,'mod_custom',0,0,1,'moduleclass_sfx=\n\n',0,0,''),(24,'Carrera','',4,'right',0,'0000-00-00 00:00:00',1,'mod_mainmenu',0,0,1,'menutype=carrera\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n',0,0,''),(25,'Alumnos','',3,'left',0,'0000-00-00 00:00:00',1,'mod_mainmenu',0,0,1,'menutype=alumnos\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n',0,0,''),(26,'Avisos y otros Intereses','',5,'left',0,'0000-00-00 00:00:00',1,'mod_mainmenu',0,0,1,'menutype=avisos\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n',0,0,''),(27,'Noticias','',6,'left',0,'0000-00-00 00:00:00',1,'mod_feed',0,0,1,'moduleclass_sfx=notice\nrssurl=http://d.yimg.com/mx.rss.news.yahoo.com/rss/nacional\nrssrtl=0\nrsstitle=1\nrssdesc=0\nrssimage=0\nrssitems=4\nrssitemdesc=0\nword_count=0\ncache=0\ncache_time=15\n\n',0,0,''),(30,'Ban1','<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\" width=\"515\" height=\"215\"><param name=\"width\" value=\"515\" /><param name=\"height\" value=\"215\" /><param name=\"src\" value=\"images/banners/banner1.swf\" /><embed type=\"application/x-shockwave-flash\" width=\"515\" height=\"215\" src=\"images/banners/banner1.swf\"></embed></object>',0,'top',0,'0000-00-00 00:00:00',1,'mod_custom',0,0,0,'moduleclass_sfx=\n\n',0,0,''),(65,'Contactar a José Luis','',13,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=miguel_aam@hotmail.com\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(66,'Contactar José María','',14,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=JMatiasM@hertz.fi-b.unam.mx\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(64,'Contactar Jesús','',12,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=jrg307@marconi.fi-b.unam.mx\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(67,'Contactar a Fernando','',15,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=solo@marconi.fi-b.unam.mx\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(68,'Contactar Julio César','',16,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=jcesartinoco@yahoo.com.mx\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(52,'Materias','',2,'right',0,'0000-00-00 00:00:00',0,'mod_sections',0,1,1,'count=100\nmoduleclass_sfx=\ncache=0\ncache_time=900\n\n',0,0,''),(62,'Contactar a Fatima','',1,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=fatimoum@hotmail.com\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(63,'Contactar a Xavier','',11,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=javierg@fi-b.unam.mx\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(44,'Sitios de Interes','',24,'right',0,'0000-00-00 00:00:00',1,'mod_slideshow',0,0,1,'layout=default\nheight=82\nwidth=180\nbgcolor=\nspeed=2\nspace=2\nfolder=modules/mod_slideshow/images\nimages=image01.jpg\\nimage02.jpg\\nimage03.jpg\\nimage04.jpg\\nimage05.jpg\ntitles=Facultad de Ingeniería\\nDivisión de Ciencias Básicas\\nSIAE\\nUSECAD\\nUNAM\nurls=www.ingenieria.unam.mx/\\ndcb.fi-c.unam.mx/\\nwww.dgae-siae.unam.mx/\\nservacad.fi-a.unam.mx/usecad/_info/\\nwww.unam.mx/\nlinked=1\naddhttp=1\nstopslide=1\nslidesspace=5\naddbreak=1\nwait=1000\nsides=4\nsteps=23\ndirection=left\ndelay=3000\nrandom=R\ncache=0\nmoduleclass_sfx=\n\n',0,0,''),(69,'Contactar a Oleksandr','',17,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=alxmart@yahoo.com\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(70,'Contactar a Rodolfo','',18,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=francia@marconi.fi-b.unam.mx\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(58,'Lista de Profesores','',2,'left',0,'0000-00-00 00:00:00',1,'mod_mainmenu',0,0,1,'menutype=lprofesores\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n',0,0,''),(59,'Contacta a Mario','',8,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=marioa@fi-b.unam.mx\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(60,'Contacta a Bohumil','',9,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=pseboh@servidor.unam.mx\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(61,'Contacta a Damián','',10,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=fevasa@fi-b.unam.mx\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(71,'Contactar a Salvador','',19,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=sland@fi-b.unam.mx\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(72,'Contactar a Serguei','',20,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=skhotiai@lycos.com\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(73,'Contactar a Víctor','',21,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=francia@marconi.fi-b.unam.mx\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(74,'Contactar a Víctor','',22,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=victor@fi-b.unam\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(75,'Contacta a Vladimir','',23,'right',0,'0000-00-00 00:00:00',1,'mod_makecontact',0,0,1,'moduleclass_sfx=\nintroduction=Introduce los datos para poder contactarlo.\nfrom_email=vladimirsk@hotmail.com\nfrom_subject=Ha sido contactado\nthanks=\nerror=\n\n',0,0,''),(76,'AllVideos Reloaded','',7,'left',0,'0000-00-00 00:00:00',0,'mod_avreloaded',0,0,1,'pwidth=320\npheight=180\n',0,0,'');
/*!40000 ALTER TABLE `jos_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_modules_menu`
--

DROP TABLE IF EXISTS `jos_modules_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_modules_menu`
--

LOCK TABLES `jos_modules_menu` WRITE;
/*!40000 ALTER TABLE `jos_modules_menu` DISABLE KEYS */;
INSERT INTO `jos_modules_menu` VALUES (1,0),(16,0),(17,1),(17,6),(17,7),(17,8),(17,9),(17,10),(17,11),(17,13),(17,14),(17,15),(17,16),(17,17),(17,18),(17,19),(17,20),(17,21),(17,22),(17,23),(17,24),(17,25),(17,26),(17,27),(17,28),(17,33),(17,34),(17,35),(18,0),(19,1),(19,6),(19,7),(19,8),(19,9),(19,10),(19,11),(19,13),(19,14),(19,15),(19,16),(19,17),(19,18),(19,19),(19,20),(19,21),(19,22),(19,23),(19,24),(19,25),(19,26),(19,27),(19,28),(19,33),(19,34),(19,35),(21,0),(23,0),(24,1),(24,6),(24,7),(24,8),(24,9),(24,13),(24,14),(24,15),(24,16),(24,17),(24,18),(24,21),(24,23),(24,24),(24,26),(24,27),(24,85),(24,86),(24,87),(24,88),(25,0),(26,0),(27,0),(28,55),(29,56),(30,0),(44,0),(52,53),(53,0),(58,26),(58,55),(58,56),(58,57),(58,58),(58,59),(58,61),(58,62),(58,63),(58,64),(58,65),(58,66),(58,67),(58,69),(58,70),(58,71),(58,72),(58,73),(58,92),(58,93),(59,57),(60,58),(61,59),(62,60),(63,61),(64,62),(65,63),(66,64),(67,65),(68,66),(69,67),(70,68),(71,69),(72,70),(73,71),(74,72),(75,73),(76,0);
/*!40000 ALTER TABLE `jos_modules_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_newsfeeds`
--

DROP TABLE IF EXISTS `jos_newsfeeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `link` text NOT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `numarticles` int(11) unsigned NOT NULL DEFAULT '1',
  `cache_time` int(11) unsigned NOT NULL DEFAULT '3600',
  `checked_out` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `published` (`published`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_newsfeeds`
--

LOCK TABLES `jos_newsfeeds` WRITE;
/*!40000 ALTER TABLE `jos_newsfeeds` DISABLE KEYS */;
INSERT INTO `jos_newsfeeds` VALUES (9,1,'News','news','http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/technology/rss.xml',NULL,1,5,3600,0,'0000-00-00 00:00:00',1,0);
/*!40000 ALTER TABLE `jos_newsfeeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_noixacl_adapters`
--

DROP TABLE IF EXISTS `jos_noixacl_adapters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_noixacl_adapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `adapter` varchar(50) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_noixacl_adapters`
--

LOCK TABLES `jos_noixacl_adapters` WRITE;
/*!40000 ALTER TABLE `jos_noixacl_adapters` DISABLE KEYS */;
INSERT INTO `jos_noixacl_adapters` VALUES (1,'Articles','content',1,1),(2,'Menu','menu',2,1),(3,'Modules','modules',3,1);
/*!40000 ALTER TABLE `jos_noixacl_adapters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_noixacl_multigroups`
--

DROP TABLE IF EXISTS `jos_noixacl_multigroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_noixacl_multigroups` (
  `id_user` int(11) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_noixacl_multigroups`
--

LOCK TABLES `jos_noixacl_multigroups` WRITE;
/*!40000 ALTER TABLE `jos_noixacl_multigroups` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_noixacl_multigroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_noixacl_rules`
--

DROP TABLE IF EXISTS `jos_noixacl_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_noixacl_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aco_section` varchar(50) DEFAULT NULL,
  `aco_value` varchar(50) DEFAULT NULL,
  `aro_section` varchar(50) DEFAULT NULL,
  `aro_value` varchar(50) DEFAULT NULL,
  `axo_section` varchar(255) DEFAULT NULL,
  `axo_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_noixacl_rules`
--

LOCK TABLES `jos_noixacl_rules` WRITE;
/*!40000 ALTER TABLE `jos_noixacl_rules` DISABLE KEYS */;
INSERT INTO `jos_noixacl_rules` VALUES (11,'com_menus','access','users','Receptores Gp1','mis-materias','45'),(12,'com_menus','access','users','Antenas Gp1','mis-materias','43'),(10,'com_menus','access','users','Antenas Gp2','mis-materias','44'),(17,'com_menus','access','users','Redes de datos Gp1','mis-materias','47'),(18,'com_menus','access','users','Redes de datos Gp2','mis-materias','48'),(15,'com_menus','access','users','Tecnologías para procesamiento digital de señales ','mis-materias','49'),(16,'com_menus','access','users','Tecnologías para procesamiento digital de señales ','mis-materias','50'),(19,'com_menus','access','users','Transmisores Gp1','mis-materias','51'),(20,'com_menus','access','users','Transmisores Gp2','mis-materias','52');
/*!40000 ALTER TABLE `jos_noixacl_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_plugins`
--

DROP TABLE IF EXISTS `jos_plugins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `element` varchar(100) NOT NULL DEFAULT '',
  `folder` varchar(100) NOT NULL DEFAULT '',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `iscore` tinyint(3) NOT NULL DEFAULT '0',
  `client_id` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_plugins`
--

LOCK TABLES `jos_plugins` WRITE;
/*!40000 ALTER TABLE `jos_plugins` DISABLE KEYS */;
INSERT INTO `jos_plugins` VALUES (1,'Authentication - Joomla','joomla','authentication',0,1,1,1,0,0,'0000-00-00 00:00:00',''),(2,'Authentication - LDAP','ldap','authentication',0,2,0,1,0,0,'0000-00-00 00:00:00','host=\nport=389\nuse_ldapV3=0\nnegotiate_tls=0\nno_referrals=0\nauth_method=bind\nbase_dn=\nsearch_string=\nusers_dn=\nusername=\npassword=\nldap_fullname=fullName\nldap_email=mail\nldap_uid=uid\n\n'),(3,'Authentication - GMail','gmail','authentication',0,4,0,0,0,0,'0000-00-00 00:00:00',''),(4,'Authentication - OpenID','openid','authentication',0,3,0,0,0,0,'0000-00-00 00:00:00',''),(5,'User - Joomla!','joomla','user',0,0,1,0,0,0,'0000-00-00 00:00:00','autoregister=1\n\n'),(6,'Search - Content','content','search',0,1,1,1,0,0,'0000-00-00 00:00:00','search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n'),(7,'Search - Contacts','contacts','search',0,3,1,1,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),(8,'Search - Categories','categories','search',0,4,1,0,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),(9,'Search - Sections','sections','search',0,5,1,0,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),(10,'Search - Newsfeeds','newsfeeds','search',0,6,1,0,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),(11,'Search - Weblinks','weblinks','search',0,2,1,1,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),(12,'Content - Pagebreak','pagebreak','content',0,10000,1,1,0,0,'0000-00-00 00:00:00','enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n'),(13,'Content - Rating','vote','content',0,4,1,1,0,0,'0000-00-00 00:00:00',''),(14,'Content - Email Cloaking','emailcloak','content',0,5,1,0,0,0,'0000-00-00 00:00:00','mode=1\n\n'),(15,'Content - Code Hightlighter (GeSHi)','geshi','content',0,5,0,0,0,0,'0000-00-00 00:00:00',''),(16,'Content - Load Module','loadmodule','content',0,6,1,0,0,0,'0000-00-00 00:00:00','enabled=1\nstyle=0\n\n'),(17,'Content - Page Navigation','pagenavigation','content',0,2,1,1,0,0,'0000-00-00 00:00:00','position=1\n\n'),(18,'Editor - No Editor','none','editors',0,0,1,1,0,0,'0000-00-00 00:00:00',''),(19,'Editor - TinyMCE 2.0','tinymce','editors',0,0,1,1,0,0,'0000-00-00 00:00:00','theme=advanced\ncleanup=1\ncleanup_startup=0\nautosave=0\ncompressed=0\nrelative_urls=1\ntext_direction=ltr\nlang_mode=0\nlang_code=en\ninvalid_elements=applet\ncontent_css=1\ncontent_css_custom=\nnewlines=0\ntoolbar=top\nhr=1\nsmilies=1\ntable=1\nstyle=1\nlayer=1\nxhtmlxtras=0\ntemplate=0\ndirectionality=1\nfullscreen=1\nhtml_height=550\nhtml_width=750\npreview=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\n\n'),(20,'Editor - XStandard Lite 2.0','xstandard','editors',0,0,1,1,0,0,'0000-00-00 00:00:00',''),(21,'Editor Button - Image','image','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00',''),(22,'Editor Button - Pagebreak','pagebreak','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00',''),(23,'Editor Button - Readmore','readmore','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00',''),(24,'XML-RPC - Joomla','joomla','xmlrpc',0,7,0,1,0,0,'0000-00-00 00:00:00',''),(25,'XML-RPC - Blogger API','blogger','xmlrpc',0,7,0,1,0,0,'0000-00-00 00:00:00','catid=1\nsectionid=0\n\n'),(27,'System - SEF','sef','system',0,1,1,0,0,0,'0000-00-00 00:00:00',''),(28,'System - Debug','debug','system',0,2,1,0,0,0,'0000-00-00 00:00:00','queries=1\nmemory=1\nlangauge=1\n\n'),(29,'System - Legacy','legacy','system',0,3,1,1,0,0,'0000-00-00 00:00:00','route=0\n\n'),(30,'System - Cache','cache','system',0,4,0,1,0,0,'0000-00-00 00:00:00','browsercache=0\ncachetime=15\n\n'),(31,'System - Log','log','system',0,5,0,1,0,0,'0000-00-00 00:00:00',''),(32,'System - Remember Me','remember','system',0,6,1,1,0,0,'0000-00-00 00:00:00',''),(33,'System - Backlink','backlink','system',0,7,0,1,0,0,'0000-00-00 00:00:00',''),(40,'User - noixACL','noixacl','user',0,0,0,0,0,0,'0000-00-00 00:00:00',''),(39,'System - noixACL','noixacl','system',0,0,0,0,0,0,'0000-00-00 00:00:00',''),(41,'Content - AllVideos Reloaded','avreloaded','content',0,0,1,0,0,0,'0000-00-00 00:00:00','avcss=allvideos\nwidth=400\nheight=320\nvdir=videos\nwmode=window\nbgcolor=#FFFFFF\nadir=audio\nawidth=300\naheight=20\nripcache=1\ncache_time=3600\n'),(42,'Button - AllVideos Reloaded','avreloaded','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00',''),(43,'System - AllVideos Reloaded','avreloaded','system',0,0,1,0,0,0,'0000-00-00 00:00:00',''),(44,'Content - Media Player','mediaplayer','content',0,0,0,0,0,0,'0000-00-00 00:00:00','width=300\nheight=290\nbackcolor=000000\nlightcolor=0066CC\nfrontcolor=EEEEEE\ncbar=bottom\n'),(45,'System - Mootools Upgrade','mtupgrade','system',0,0,0,0,0,0,'0000-00-00 00:00:00','');
/*!40000 ALTER TABLE `jos_plugins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_poll_data`
--

DROP TABLE IF EXISTS `jos_poll_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_poll_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pollid` int(11) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_poll_data`
--

LOCK TABLES `jos_poll_data` WRITE;
/*!40000 ALTER TABLE `jos_poll_data` DISABLE KEYS */;
INSERT INTO `jos_poll_data` VALUES (1,1,'Firefox',185),(2,1,'IE',23),(3,1,'Safari',28),(4,1,'Opera',24),(5,1,'Netscape',2),(6,1,'',0),(7,1,'',0),(8,1,'',0),(9,1,'',0),(10,1,'',0),(11,1,'',0),(12,1,'',0);
/*!40000 ALTER TABLE `jos_poll_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_poll_date`
--

DROP TABLE IF EXISTS `jos_poll_date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_poll_date` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL DEFAULT '0',
  `poll_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM AUTO_INCREMENT=263 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_poll_date`
--

LOCK TABLES `jos_poll_date` WRITE;
/*!40000 ALTER TABLE `jos_poll_date` DISABLE KEYS */;
INSERT INTO `jos_poll_date` VALUES (1,'2009-03-26 16:19:34',3,1),(2,'2009-03-26 17:01:44',1,1),(3,'2009-03-27 15:26:37',2,1),(4,'2009-03-27 16:56:44',3,1),(5,'2009-03-28 00:14:24',2,1),(6,'2009-03-31 01:58:16',2,1),(7,'2009-04-02 16:37:49',2,1),(8,'2009-04-20 01:11:30',1,1),(9,'2009-05-18 16:37:50',4,1),(10,'2009-06-15 18:03:14',4,1),(11,'2009-06-29 21:59:17',4,1),(12,'2009-08-12 01:46:34',2,1),(13,'2009-08-14 02:37:03',1,1),(14,'2009-08-14 03:22:49',1,1),(15,'2009-08-16 19:22:45',1,1),(16,'2009-08-17 02:50:25',1,1),(17,'2009-08-18 03:04:33',1,1),(18,'2009-08-19 02:45:55',1,1),(19,'2009-08-19 03:49:44',5,1),(20,'2009-08-20 02:43:28',1,1),(21,'2009-08-20 16:47:46',1,1),(22,'2009-08-20 20:41:21',4,1),(23,'2009-08-21 02:56:58',4,1),(24,'2009-08-21 03:39:45',1,1),(25,'2009-08-21 03:45:46',1,1),(26,'2009-08-21 04:56:05',1,1),(27,'2009-08-21 14:39:28',1,1),(28,'2009-08-21 15:48:51',3,1),(29,'2009-08-25 00:10:53',1,1),(30,'2009-08-25 17:58:31',1,1),(31,'2009-08-25 21:02:50',2,1),(32,'2009-08-26 00:55:51',1,1),(33,'2009-08-26 02:38:51',1,1),(34,'2009-08-28 17:15:22',1,1),(35,'2009-08-29 23:54:03',3,1),(36,'2009-08-29 23:59:27',1,1),(37,'2009-08-30 14:58:14',1,1),(38,'2009-08-31 03:59:35',1,1),(39,'2009-08-31 16:00:55',1,1),(40,'2009-08-31 17:12:15',1,1),(41,'2009-09-01 14:23:42',5,1),(42,'2009-09-01 15:56:04',1,1),(43,'2009-09-03 22:01:16',1,1),(44,'2009-09-03 22:38:23',2,1),(45,'2009-09-05 05:17:17',1,1),(46,'2009-09-08 02:32:25',1,1),(47,'2009-09-08 03:32:03',1,1),(48,'2009-09-08 23:11:00',4,1),(49,'2009-09-08 23:43:46',2,1),(50,'2009-09-09 23:01:26',1,1),(51,'2009-09-10 04:07:00',1,1),(52,'2009-09-10 08:08:33',2,1),(53,'2009-09-11 03:03:05',1,1),(54,'2009-09-11 04:58:01',3,1),(55,'2009-09-13 13:38:32',1,1),(56,'2009-09-16 19:20:12',1,1),(57,'2009-09-16 20:30:44',4,1),(58,'2009-09-17 16:24:27',1,1),(59,'2009-09-17 18:02:32',4,1),(60,'2009-09-17 23:38:42',1,1),(61,'2009-09-18 22:00:17',2,1),(62,'2009-09-19 23:33:53',4,1),(63,'2009-09-21 22:24:13',2,1),(64,'2009-09-22 14:56:56',2,1),(65,'2009-09-24 14:01:37',1,1),(66,'2009-09-29 17:13:59',2,1),(67,'2009-10-01 06:57:11',1,1),(68,'2009-10-04 21:29:03',1,1),(69,'2009-10-04 22:55:51',1,1),(70,'2009-10-10 19:56:13',3,1),(71,'2009-10-11 06:38:07',1,1),(72,'2009-10-11 18:36:43',1,1),(73,'2009-10-15 21:30:38',1,1),(74,'2009-10-16 16:08:04',1,1),(75,'2009-10-16 18:14:25',1,1),(76,'2009-10-18 23:40:43',1,1),(77,'2009-10-19 03:51:18',1,1),(78,'2009-11-10 18:50:43',1,1),(79,'2009-11-24 03:40:46',1,1),(80,'2009-11-25 04:43:42',1,1),(81,'2009-11-26 22:21:55',1,1),(82,'2009-11-30 19:02:54',3,1),(83,'2009-11-30 19:03:53',4,1),(84,'2009-11-30 19:06:21',1,1),(85,'2009-11-30 19:08:52',1,1),(86,'2009-11-30 21:57:00',1,1),(87,'2009-12-01 01:05:25',1,1),(88,'2009-12-01 01:22:13',1,1),(89,'2009-12-01 01:40:09',1,1),(90,'2009-12-01 01:43:11',3,1),(91,'2009-12-01 02:34:23',1,1),(92,'2009-12-02 05:04:35',1,1),(93,'2009-12-03 02:46:42',1,1),(94,'2009-12-04 12:02:47',2,1),(95,'2009-12-07 17:22:04',1,1),(96,'2009-12-08 01:42:50',1,1),(97,'2009-12-09 16:48:00',1,1),(98,'2009-12-09 17:03:08',4,1),(99,'2009-12-09 21:40:03',1,1),(100,'2009-12-10 19:49:55',1,1),(101,'2009-12-10 19:57:02',4,1),(102,'2009-12-11 00:29:22',3,1),(103,'2009-12-19 03:02:24',1,1),(104,'2009-12-21 19:25:42',1,1),(105,'2009-12-26 05:07:46',1,1),(106,'2009-12-26 19:02:30',1,1),(107,'2009-12-29 05:46:05',1,1),(108,'2010-01-08 19:59:49',4,1),(109,'2010-01-08 23:53:58',1,1),(110,'2010-01-11 22:09:37',3,1),(111,'2010-01-12 07:17:47',1,1),(112,'2010-01-12 17:59:15',1,1),(113,'2010-01-14 02:53:38',1,1),(114,'2010-01-14 14:03:50',1,1),(115,'2010-01-28 04:58:20',3,1),(116,'2010-02-11 02:23:22',3,1),(117,'2010-02-13 21:24:16',1,1),(118,'2010-02-15 06:00:50',1,1),(119,'2010-02-18 16:57:33',1,1),(120,'2010-02-19 19:30:57',2,1),(121,'2010-02-20 07:01:01',1,1),(122,'2010-02-23 00:25:45',1,1),(123,'2010-02-24 05:00:22',1,1),(124,'2010-02-27 02:16:51',1,1),(125,'2010-02-27 05:35:30',1,1),(126,'2010-03-04 06:47:46',1,1),(127,'2010-03-13 18:03:28',1,1),(128,'2010-03-15 22:44:45',1,1),(129,'2010-03-17 23:00:06',1,1),(130,'2010-03-28 13:42:25',1,1),(131,'2010-04-02 17:26:24',2,1),(132,'2010-04-05 05:45:59',1,1),(133,'2010-04-09 15:02:25',1,1),(134,'2010-04-09 15:18:29',1,1),(135,'2010-04-13 15:21:48',1,1),(136,'2010-04-14 05:11:37',1,1),(137,'2010-04-16 17:34:23',1,1),(138,'2010-04-22 14:44:34',1,1),(139,'2010-04-23 16:25:17',2,1),(140,'2010-04-27 14:13:22',3,1),(141,'2010-04-29 22:10:17',4,1),(142,'2010-04-30 12:51:52',1,1),(143,'2010-04-30 18:14:27',1,1),(144,'2010-05-01 00:38:38',1,1),(145,'2010-05-02 16:43:40',1,1),(146,'2010-05-03 02:45:48',1,1),(147,'2010-05-04 23:26:15',1,1),(148,'2010-05-12 16:19:52',3,1),(149,'2010-05-19 22:46:53',1,1),(150,'2010-05-26 21:59:53',1,1),(151,'2010-06-01 00:04:35',1,1),(152,'2010-06-07 05:50:56',4,1),(153,'2010-06-07 19:06:42',2,1),(154,'2010-06-17 01:11:57',1,1),(155,'2010-06-17 01:49:41',1,1),(156,'2010-06-19 01:12:27',1,1),(157,'2010-06-20 19:23:35',3,1),(158,'2010-06-24 17:33:42',1,1),(159,'2010-06-26 23:09:19',1,1),(160,'2010-06-27 04:57:52',1,1),(161,'2010-06-29 23:40:23',1,1),(162,'2010-07-01 16:26:32',1,1),(163,'2010-07-04 12:31:43',1,1),(164,'2010-07-28 02:33:33',3,1),(165,'2010-07-29 18:14:30',1,1),(166,'2010-07-30 02:17:44',4,1),(167,'2010-08-06 03:26:27',1,1),(168,'2010-08-14 00:59:56',1,1),(169,'2010-08-14 05:48:20',1,1),(170,'2010-08-17 01:52:42',1,1),(171,'2010-08-17 23:49:33',2,1),(172,'2010-08-22 20:26:21',1,1),(173,'2010-08-25 03:44:41',1,1),(174,'2010-08-26 18:17:52',3,1),(175,'2010-08-28 13:36:39',1,1),(176,'2010-08-28 16:05:13',1,1),(177,'2010-08-30 22:09:27',1,1),(178,'2010-08-31 17:51:10',1,1),(179,'2010-09-08 21:34:49',2,1),(180,'2010-09-09 00:09:15',1,1),(181,'2010-09-10 03:30:41',1,1),(182,'2010-09-10 15:39:17',1,1),(183,'2010-09-11 03:36:52',1,1),(184,'2010-09-12 19:55:03',1,1),(185,'2010-09-21 04:06:26',3,1),(186,'2010-09-24 20:53:53',1,1),(187,'2010-09-27 19:06:40',1,1),(188,'2010-09-28 04:52:50',1,1),(189,'2010-09-30 03:18:24',1,1),(190,'2010-10-01 00:20:43',1,1),(191,'2010-10-01 03:55:08',1,1),(192,'2010-10-01 17:30:07',4,1),(193,'2010-10-02 02:24:09',4,1),(194,'2010-10-05 15:33:20',3,1),(195,'2010-10-08 12:18:37',1,1),(196,'2010-10-11 00:52:51',1,1),(197,'2010-10-13 08:55:07',3,1),(198,'2010-10-13 23:36:51',1,1),(199,'2010-10-14 01:35:39',1,1),(200,'2010-10-15 01:53:14',1,1),(201,'2010-10-19 23:18:37',1,1),(202,'2010-10-20 00:44:46',1,1),(203,'2010-10-20 18:46:48',1,1),(204,'2010-10-22 12:37:43',1,1),(205,'2010-11-02 20:58:02',1,1),(206,'2010-11-03 22:59:22',1,1),(207,'2010-11-04 06:29:39',2,1),(208,'2010-11-07 05:34:03',1,1),(209,'2010-11-17 17:44:55',1,1),(210,'2010-11-17 21:15:24',3,1),(211,'2010-11-28 01:26:43',3,1),(212,'2010-11-29 20:04:04',3,1),(213,'2010-11-30 00:15:06',4,1),(214,'2010-12-01 23:04:59',1,1),(215,'2010-12-08 21:30:46',1,1),(216,'2010-12-11 03:32:16',1,1),(217,'2010-12-14 03:45:48',1,1),(218,'2010-12-15 15:58:21',3,1),(219,'2010-12-15 19:41:17',1,1),(220,'2010-12-18 19:43:37',1,1),(221,'2010-12-22 03:24:11',1,1),(222,'2010-12-27 05:30:45',1,1),(223,'2011-01-04 20:15:20',3,1),(224,'2011-01-05 22:54:16',1,1),(225,'2011-01-06 07:32:25',1,1),(226,'2011-01-20 18:25:25',1,1),(227,'2011-01-24 04:43:27',4,1),(228,'2011-01-24 15:49:19',3,1),(229,'2011-01-24 17:31:01',1,1),(230,'2011-01-29 08:28:39',1,1),(231,'2011-02-03 02:54:47',1,1),(232,'2011-02-07 22:41:27',1,1),(233,'2011-02-15 05:05:04',1,1),(234,'2011-02-19 01:37:47',1,1),(235,'2011-02-19 02:55:44',1,1),(236,'2011-02-24 05:39:56',3,1),(237,'2011-03-07 17:16:04',4,1),(238,'2011-03-11 13:05:05',1,1),(239,'2011-03-14 02:35:13',1,1),(240,'2011-03-20 14:09:05',1,1),(241,'2011-03-23 21:24:56',4,1),(242,'2011-04-09 22:43:58',1,1),(243,'2011-04-10 00:00:50',1,1),(244,'2011-04-13 00:42:06',4,1),(245,'2011-04-30 19:18:10',1,1),(246,'2011-05-08 07:05:29',1,1),(247,'2011-05-08 16:17:24',3,1),(248,'2011-05-24 02:47:43',1,1),(249,'2011-06-04 04:31:35',2,1),(250,'2011-06-07 18:29:35',1,1),(251,'2011-06-11 17:15:45',1,1),(252,'2011-06-20 21:02:21',1,1),(253,'2011-06-24 04:43:26',1,1),(254,'2011-06-29 18:44:51',4,1),(255,'2011-07-07 18:06:22',2,1),(256,'2011-08-09 20:08:02',1,1),(257,'2011-08-11 19:22:50',1,1),(258,'2011-08-23 03:02:52',1,1),(259,'2011-08-25 06:57:42',1,1),(260,'2011-08-28 13:27:38',1,1),(261,'2011-09-02 17:32:55',1,1),(262,'2011-09-02 20:00:16',1,1);
/*!40000 ALTER TABLE `jos_poll_date` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_poll_menu`
--

DROP TABLE IF EXISTS `jos_poll_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_poll_menu` (
  `pollid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pollid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_poll_menu`
--

LOCK TABLES `jos_poll_menu` WRITE;
/*!40000 ALTER TABLE `jos_poll_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_poll_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_polls`
--

DROP TABLE IF EXISTS `jos_polls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_polls` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `voters` int(9) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `lag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_polls`
--

LOCK TABLES `jos_polls` WRITE;
/*!40000 ALTER TABLE `jos_polls` DISABLE KEYS */;
INSERT INTO `jos_polls` VALUES (1,'¿Qué explorador prefieres?','explorador',262,0,'0000-00-00 00:00:00',1,0,86400);
/*!40000 ALTER TABLE `jos_polls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_sections`
--

DROP TABLE IF EXISTS `jos_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL DEFAULT '',
  `image_position` varchar(30) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_sections`
--

LOCK TABLES `jos_sections` WRITE;
/*!40000 ALTER TABLE `jos_sections` DISABLE KEYS */;
INSERT INTO `jos_sections` VALUES (11,'Docentes','','docentes','','content','left','',1,0,'0000-00-00 00:00:00',20,0,1,''),(8,'Avisos','','avisos','','content','left','',1,0,'0000-00-00 00:00:00',7,1,8,''),(26,'Departamento','','departamento','','content','left','<p>Contenido Relacionado al departamento de telecomunicaciones.</p>',1,0,'0000-00-00 00:00:00',23,0,1,''),(25,'Alumnos','','alumnos','','content','left','<p>Dedicada a articulos, y objetos de los alumnos</p>',1,0,'0000-00-00 00:00:00',22,0,1,''),(24,'Carrera','','carrera','','content','left','<p>Relacionado a la carrera de Telecomunicacio<img src=\"http://54-9.com.ar/wp-content/uploads/2008/08/telecom.jpg\" border=\"0\" />nes</p>',1,0,'0000-00-00 00:00:00',21,0,1,'');
/*!40000 ALTER TABLE `jos_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_session`
--

DROP TABLE IF EXISTS `jos_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_session` (
  `username` varchar(150) DEFAULT '',
  `time` varchar(14) DEFAULT '',
  `session_id` varchar(200) NOT NULL DEFAULT '0',
  `guest` tinyint(4) DEFAULT '1',
  `userid` int(11) DEFAULT '0',
  `usertype` varchar(50) DEFAULT '',
  `gid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `client_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `data` longtext,
  PRIMARY KEY (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_session`
--

LOCK TABLES `jos_session` WRITE;
/*!40000 ALTER TABLE `jos_session` DISABLE KEYS */;
INSERT INTO `jos_session` VALUES ('','1316650809','lslpkmin4p9dl6sr384aq70gs6',1,0,'',0,0,'__default|a:7:{s:15:\"session.counter\";i:1;s:19:\"session.timer.start\";i:1316650809;s:18:\"session.timer.last\";i:1316650809;s:17:\"session.timer.now\";i:1316650809;s:22:\"session.client.browser\";s:72:\"Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)\";s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:1:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";i:0;s:4:\"name\";N;s:8:\"username\";N;s:5:\"email\";N;s:8:\"password\";N;s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";N;s:5:\"block\";N;s:9:\"sendEmail\";i:0;s:3:\"gid\";i:0;s:12:\"registerDate\";N;s:13:\"lastvisitDate\";N;s:10:\"activation\";N;s:6:\"params\";N;s:3:\"aid\";i:0;s:5:\"guest\";i:1;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:65:\"/home/telecom/public_html/libraries/joomla/html/parameter/element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}}'),('','1316650807','4s04l3hf6p0ff3btqqtufm3jn4',1,0,'',0,0,'__default|a:8:{s:15:\"session.counter\";i:1;s:19:\"session.timer.start\";i:1316650807;s:18:\"session.timer.last\";i:1316650807;s:17:\"session.timer.now\";i:1316650807;s:22:\"session.client.browser\";s:72:\"Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)\";s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:2:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}s:4:\"joom\";a:1:{s:4:\"data\";O:8:\"stdClass\":1:{s:10:\"favourites\";O:8:\"stdClass\":1:{s:8:\"pictures\";i:93;}}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";i:0;s:4:\"name\";N;s:8:\"username\";N;s:5:\"email\";N;s:8:\"password\";N;s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";N;s:5:\"block\";N;s:9:\"sendEmail\";i:0;s:3:\"gid\";i:0;s:12:\"registerDate\";N;s:13:\"lastvisitDate\";N;s:10:\"activation\";N;s:6:\"params\";N;s:3:\"aid\";i:0;s:5:\"guest\";i:1;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:65:\"/home/telecom/public_html/libraries/joomla/html/parameter/element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}s:17:\"application.queue\";a:2:{i:0;a:2:{s:7:\"message\";N;s:4:\"type\";s:7:\"message\";}i:1;a:2:{s:7:\"message\";s:68:\"La imagen se ha a&ntilde;adido correctamente a su lista de descarga.\";s:4:\"type\";s:7:\"message\";}}}'),('','1316649985','3oio3fdul0dehoqhihooiarqi5',1,0,'',0,0,'__default|a:7:{s:15:\"session.counter\";i:1;s:19:\"session.timer.start\";i:1316649985;s:18:\"session.timer.last\";i:1316649985;s:17:\"session.timer.now\";i:1316649985;s:22:\"session.client.browser\";s:72:\"Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)\";s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:1:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";i:0;s:4:\"name\";N;s:8:\"username\";N;s:5:\"email\";N;s:8:\"password\";N;s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";N;s:5:\"block\";N;s:9:\"sendEmail\";i:0;s:3:\"gid\";i:0;s:12:\"registerDate\";N;s:13:\"lastvisitDate\";N;s:10:\"activation\";N;s:6:\"params\";N;s:3:\"aid\";i:0;s:5:\"guest\";i:1;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:65:\"/home/telecom/public_html/libraries/joomla/html/parameter/element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}}');
/*!40000 ALTER TABLE `jos_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_stats_agents`
--

DROP TABLE IF EXISTS `jos_stats_agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_stats_agents` (
  `agent` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_stats_agents`
--

LOCK TABLES `jos_stats_agents` WRITE;
/*!40000 ALTER TABLE `jos_stats_agents` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_stats_agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_templates_menu`
--

DROP TABLE IF EXISTS `jos_templates_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_templates_menu` (
  `template` varchar(255) NOT NULL DEFAULT '',
  `menuid` int(11) NOT NULL DEFAULT '0',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_templates_menu`
--

LOCK TABLES `jos_templates_menu` WRITE;
/*!40000 ALTER TABLE `jos_templates_menu` DISABLE KEYS */;
INSERT INTO `jos_templates_menu` VALUES ('siteground-j15-68',0,0),('khepri',0,1);
/*!40000 ALTER TABLE `jos_templates_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_users`
--

DROP TABLE IF EXISTS `jos_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `usertype` varchar(25) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `gid` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_users`
--

LOCK TABLES `jos_users` WRITE;
/*!40000 ALTER TABLE `jos_users` DISABLE KEYS */;
INSERT INTO `jos_users` VALUES (62,'Administrator','admin','miguel_aam@hotmail.com','84e521919d83ed95b7010e7268ccc5f9:MTpQiEZKwhOWqDMyDgi7R6W4ZjgnzHW8','Super Administrator',0,1,25,'2009-03-24 13:05:09','2011-03-19 17:11:31','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),(77,'Estudiante2','Estudiante2','Estudiante2@hotmail.com','506190367dee290e9798e244646dac86:5JHmCEXHdIsdephCcOjwQQ6I9ZL5hWot','Antenas Gp2',0,0,36,'2009-06-05 13:39:20','2009-06-05 13:47:11','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),(78,'Estudiante3','Estudiante3','Estudiante3@hotmail.com','e3e17ee7719cde74ce45948e7944a92e:Hbm58BWl6qTqYzRfUtXm69C2Sr3VTHGc','Receptores Gp1',0,0,37,'2009-06-05 13:40:49','0000-00-00 00:00:00','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),(79,'Estudiante4','Estudiante4','Estudiante4@hotmail.com','eafc27afe07f131aeb42ee2072e76f70:GVX6Ki1ACCRTrHXMwxW3kGHGHbrrngZe','Receptores Gp2',0,0,38,'2009-06-05 13:41:20','0000-00-00 00:00:00','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),(68,'Alumno A','alumno','alumno34@hotmail.com','13ddce716bb35da2cbe5750cad82f29e:6X1yBEnQIp1SgtmMrZSpVhQlYAKMFr3Z','clase 200',0,0,31,'2009-05-26 09:49:38','0000-00-00 00:00:00','','language=\ntimezone=0\nadmin_language=\neditor=\nhelpsite=\n\n'),(69,'Juan Lopez','Juan','juan@yahoo.com','2a501b120e38aea3629531d3d5b95103:u181NUPnRlZKdpQ2gTvQkKKWDi8tLaLw','Receptores Gp3',0,0,32,'2009-05-29 14:41:27','2009-06-03 20:18:37','','admin_language=\nlanguage=es-ES\neditor=tinymce\nhelpsite=\ntimezone=0\n\n'),(70,'Rosa Perez','rosa','larosa@hotmail.com','c4eb7c628ae4c8ae41f4a9297e7d9d82:EUyV4LiNJz6DvWRctcR9gi5c88t5tS6E','Antenas Gp4',0,0,33,'2009-05-29 14:44:33','2009-06-03 18:57:29','','language=es-ES\ntimezone=0\nadmin_language=\neditor=tinymce\nhelpsite=\n\n'),(76,'Estudiante1','Estudiante1','Estudiante1@hotmail.com','e0eda33652cd20613e1e5d63a5cd0fdf:zaBTr5kOj2OQZcWgvznnsrhxaEdtREKh','Antenas Gp1',0,1,35,'2009-06-05 13:31:14','2009-06-05 13:39:29','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),(72,'pedro','pedro','pedro@hotmail.com','7a83ba2bc0dd06c43757af4ef2ec83b9:XukkFQu1LOuXTCGKM4PrhdJNf1uDqNYy','Antenas Gp4',0,0,34,'2009-06-04 13:17:35','2009-06-04 13:23:04','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),(80,'Estudiante5','Estudiante5','Estudiante5@hotmail.com','7b1405ab22da19a1d63ed1b16b7d6507:5jQklshEjcZ9zhWkRpwVOVVoBLxCvW3n','Redes de datos Gp1',0,0,39,'2009-06-05 13:41:50','0000-00-00 00:00:00','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),(81,'Estudiante6','Estudiante6','Estudiante6@hotmail.com','8e46c5d71f0000ca790bc91675df431c:ZpiI5UNwLumWaI6yDYTsdsZuJk7Dpgmz','Redes de datos Gp2',0,0,40,'2009-06-05 13:42:41','0000-00-00 00:00:00','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),(82,'Estudiante7','Estudiante7','Estudiante7@htomail.com','88068bfce16371cef1bbd3a892ede0d1:Zy7OyGMWGv5ZqF1lxCfiiD0wgifLPLSg','Tecnologías para procesam',0,0,41,'2009-06-05 13:43:22','0000-00-00 00:00:00','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),(83,'Estudiante8','Estudiante8','Estudiante8@hotmail.com','80ec29ddfc516efa10e58cdf8c12980a:BLfrVzHhcsApy3nxWV7xDKWfgChUllrq','Tecnologías para procesam',0,0,42,'2009-06-05 13:43:51','0000-00-00 00:00:00','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),(84,'Estudiante9','Estudiante9','Estudiante9@hotmail.com','f0757a4566186bc828e0a971ac0a0986:MHronBRzAzUZhMq04X7Q26yWa2amIqUe','Transmisores Gp1',0,0,43,'2009-06-05 13:44:25','0000-00-00 00:00:00','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),(85,'Estudiante10','Estudiante10','Estudiante10@hotmail.com','b25a9708991cf0aae77a8800d6aa9077:LOCZrKZ5kgIuZlWtxJFm9MU9ldUvsHwx','Transmisores Gp2',0,0,44,'2009-06-05 13:44:59','0000-00-00 00:00:00','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n'),(86,'alo','alo','alo@hot.com','21a87c6cc737667fb713bd7d12fe80b8:UnaE5BAVG8V1Qrp1a07AhOkNd5nBQFA0','Registered',0,0,18,'2009-06-05 13:46:54','2009-06-08 19:49:44','','admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n');
/*!40000 ALTER TABLE `jos_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jos_weblinks`
--

DROP TABLE IF EXISTS `jos_weblinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jos_weblinks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL DEFAULT '0',
  `sid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(250) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`,`published`,`archived`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jos_weblinks`
--

LOCK TABLES `jos_weblinks` WRITE;
/*!40000 ALTER TABLE `jos_weblinks` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_weblinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_chat`
--

DROP TABLE IF EXISTS `phpr_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_chat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `gruppe` int(4) DEFAULT NULL,
  `von` int(8) DEFAULT NULL,
  `an` int(8) DEFAULT NULL,
  `zeile` text,
  `eingabe` text,
  `zeit` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `chat_gruppe` (`gruppe`),
  KEY `chat_von` (`von`),
  KEY `chat_an` (`an`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_chat`
--

LOCK TABLES `phpr_chat` WRITE;
/*!40000 ALTER TABLE `phpr_chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_chat_alive`
--

DROP TABLE IF EXISTS `phpr_chat_alive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_chat_alive` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `gruppe` int(4) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_loginname` varchar(255) DEFAULT NULL,
  `chat_userfirstname` varchar(255) DEFAULT NULL,
  `zeit` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `chat_alive_gruppe` (`gruppe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_chat_alive`
--

LOCK TABLES `phpr_chat_alive` WRITE;
/*!40000 ALTER TABLE `phpr_chat_alive` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_chat_alive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_contacts`
--

DROP TABLE IF EXISTS `phpr_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_contacts` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `vorname` varchar(60) DEFAULT NULL,
  `nachname` varchar(60) DEFAULT NULL,
  `gruppe` int(4) DEFAULT NULL,
  `firma` varchar(60) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `tel1` varchar(60) DEFAULT NULL,
  `tel2` varchar(60) DEFAULT NULL,
  `fax` varchar(60) DEFAULT NULL,
  `strasse` varchar(60) DEFAULT NULL,
  `stadt` varchar(60) DEFAULT NULL,
  `plz` varchar(10) DEFAULT NULL,
  `land` varchar(40) DEFAULT NULL,
  `kategorie` varchar(40) DEFAULT NULL,
  `bemerkung` text,
  `von` int(8) DEFAULT NULL,
  `acc` varchar(4) DEFAULT NULL,
  `email2` varchar(80) DEFAULT NULL,
  `mobil` varchar(60) DEFAULT NULL,
  `url` varchar(80) DEFAULT NULL,
  `div1` varchar(60) DEFAULT NULL,
  `div2` varchar(60) DEFAULT NULL,
  `anrede` varchar(20) DEFAULT NULL,
  `state` varchar(40) DEFAULT NULL,
  `import` char(1) DEFAULT NULL,
  `parent` int(8) DEFAULT NULL,
  `sync1` varchar(20) DEFAULT NULL,
  `sync2` varchar(20) DEFAULT NULL,
  `acc_read` text,
  `acc_write` text,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_contacts`
--

LOCK TABLES `phpr_contacts` WRITE;
/*!40000 ALTER TABLE `phpr_contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_contacts_import_patterns`
--

DROP TABLE IF EXISTS `phpr_contacts_import_patterns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_contacts_import_patterns` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `von` int(6) DEFAULT NULL,
  `pattern` text,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_contacts_import_patterns`
--

LOCK TABLES `phpr_contacts_import_patterns` WRITE;
/*!40000 ALTER TABLE `phpr_contacts_import_patterns` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_contacts_import_patterns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_contacts_prof_rel`
--

DROP TABLE IF EXISTS `phpr_contacts_prof_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_contacts_prof_rel` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `contact_ID` int(8) DEFAULT NULL,
  `contacts_profiles_ID` int(8) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `i_contact_ID` (`contact_ID`),
  KEY `i_contacts_profiles_ID` (`contacts_profiles_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_contacts_prof_rel`
--

LOCK TABLES `phpr_contacts_prof_rel` WRITE;
/*!40000 ALTER TABLE `phpr_contacts_prof_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_contacts_prof_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_contacts_profiles`
--

DROP TABLE IF EXISTS `phpr_contacts_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_contacts_profiles` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `remark` text,
  `kategorie` varchar(20) DEFAULT NULL,
  `acc` varchar(4) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_contacts_profiles`
--

LOCK TABLES `phpr_contacts_profiles` WRITE;
/*!40000 ALTER TABLE `phpr_contacts_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_contacts_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_controlling_costcentres`
--

DROP TABLE IF EXISTS `phpr_controlling_costcentres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_controlling_costcentres` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_controlling_costcentres`
--

LOCK TABLES `phpr_controlling_costcentres` WRITE;
/*!40000 ALTER TABLE `phpr_controlling_costcentres` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_controlling_costcentres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_controlling_costunits`
--

DROP TABLE IF EXISTS `phpr_controlling_costunits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_controlling_costunits` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_controlling_costunits`
--

LOCK TABLES `phpr_controlling_costunits` WRITE;
/*!40000 ALTER TABLE `phpr_controlling_costunits` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_controlling_costunits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_costs`
--

DROP TABLE IF EXISTS `phpr_costs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_costs` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `remark` text,
  `amount` varchar(255) DEFAULT NULL,
  `contact` int(8) DEFAULT NULL,
  `projekt` int(8) DEFAULT NULL,
  `datum` varchar(20) DEFAULT NULL,
  `sync1` varchar(20) DEFAULT NULL,
  `sync2` varchar(20) DEFAULT NULL,
  `acc` text,
  `acc_write` text,
  `gruppe` int(8) DEFAULT NULL,
  `parent` int(8) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_costs`
--

LOCK TABLES `phpr_costs` WRITE;
/*!40000 ALTER TABLE `phpr_costs` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_costs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_datei_history`
--

DROP TABLE IF EXISTS `phpr_datei_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_datei_history` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) DEFAULT NULL,
  `remark` text,
  `author` int(6) DEFAULT NULL,
  `parent` int(8) DEFAULT NULL,
  `version` varchar(4) DEFAULT NULL,
  `tempname` varchar(255) DEFAULT NULL,
  `userfile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_datei_history`
--

LOCK TABLES `phpr_datei_history` WRITE;
/*!40000 ALTER TABLE `phpr_datei_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_datei_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_dateien`
--

DROP TABLE IF EXISTS `phpr_dateien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_dateien` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `userfile` varchar(255) DEFAULT NULL,
  `remark` text,
  `kat` varchar(40) DEFAULT NULL,
  `acc` text,
  `datum` varchar(20) DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  `gruppe` int(8) DEFAULT NULL,
  `tempname` varchar(255) DEFAULT NULL,
  `typ` varchar(40) DEFAULT NULL,
  `div1` varchar(40) DEFAULT NULL,
  `div2` varchar(40) DEFAULT NULL,
  `pw` varchar(255) DEFAULT NULL,
  `acc_write` text,
  `version` varchar(4) DEFAULT NULL,
  `lock_user` int(6) DEFAULT NULL,
  `contact` int(6) DEFAULT NULL,
  `parent` int(8) DEFAULT NULL,
  `versioning` int(1) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_dateien`
--

LOCK TABLES `phpr_dateien` WRITE;
/*!40000 ALTER TABLE `phpr_dateien` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_dateien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_db_accounts`
--

DROP TABLE IF EXISTS `phpr_db_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_db_accounts` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `users` varchar(10) DEFAULT NULL,
  `gruppe` varchar(10) DEFAULT NULL,
  `escalation` int(8) DEFAULT NULL,
  `account_ID` int(8) DEFAULT NULL,
  `account_type` varchar(80) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_db_accounts`
--

LOCK TABLES `phpr_db_accounts` WRITE;
/*!40000 ALTER TABLE `phpr_db_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_db_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_db_manager`
--

DROP TABLE IF EXISTS `phpr_db_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_db_manager` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `db_table` varchar(40) DEFAULT NULL,
  `db_name` varchar(40) DEFAULT NULL,
  `form_tab` int(2) DEFAULT NULL,
  `form_name` varchar(255) DEFAULT NULL,
  `form_type` varchar(20) DEFAULT NULL,
  `form_tooltip` varchar(255) DEFAULT NULL,
  `form_pos` int(4) DEFAULT NULL,
  `form_colspan` int(2) DEFAULT NULL,
  `form_rowspan` int(2) DEFAULT NULL,
  `form_regexp` varchar(255) DEFAULT NULL,
  `form_default` varchar(255) DEFAULT NULL,
  `form_select` text,
  `list_pos` int(4) DEFAULT NULL,
  `list_alt` varchar(2) DEFAULT NULL,
  `filter_show` varchar(2) DEFAULT NULL,
  `db_inactive` int(1) DEFAULT NULL,
  `rights` varchar(4) DEFAULT NULL,
  `ownercolumn` varchar(255) DEFAULT NULL,
  `form_length` int(11) DEFAULT NULL,
  `field_type` varchar(20) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_db_manager`
--

LOCK TABLES `phpr_db_manager` WRITE;
/*!40000 ALTER TABLE `phpr_db_manager` DISABLE KEYS */;
INSERT INTO `phpr_db_manager` VALUES (1,'contacts','vorname',0,'__(\"First Name\")','text','Type in the first name of the person',4,1,1,NULL,NULL,NULL,2,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(2,'contacts','firma',0,'__(\"Company\")','text','Name of associated team or company',6,1,1,NULL,NULL,NULL,4,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(3,'contacts','nachname',0,'__(\"Family Name\")','text','give the description: last name, company name or organisation etc.',5,1,1,NULL,NULL,NULL,1,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(4,'contacts','anrede',0,'__(\"Salutation\")','text','Title of the person: Mr, Mrs, Dr., Majesty etc. ...',1,1,1,NULL,NULL,NULL,0,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(5,'contacts','email2',0,'__(\"Email\") 2','email','enter an alternative mail address of this contact',18,1,1,NULL,NULL,NULL,0,'0','0',0,NULL,NULL,NULL,NULL,NULL),(6,'contacts','tel1',0,'__(\"Phone\") 1','text','enter the primary phone number of this contact',8,1,1,NULL,NULL,NULL,5,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(7,'contacts','strasse',0,'__(\"Street\")','text','the street where the person lives or the company is located',11,1,1,NULL,NULL,NULL,0,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(8,'contacts','tel2',0,'__(\"Phone\") 2','text','enter the secondary phone number of this contact',9,1,1,NULL,NULL,NULL,0,'3','0',0,NULL,NULL,NULL,NULL,NULL),(9,'contacts','fax',0,'__(\"Fax\")','text','enter the fax number of this contact',10,1,1,NULL,NULL,NULL,0,'0','0',0,NULL,NULL,NULL,NULL,NULL),(10,'contacts','stadt',0,'__(\"City\")','text','the city where the person lives or the company is located',12,1,1,NULL,NULL,NULL,0,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(11,'contacts','plz',0,'__(\"Zip code\")','text','the coresponding zip code',13,1,1,NULL,NULL,NULL,0,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(12,'contacts','land',0,'__(\"Country\")','text','the country',15,1,1,NULL,NULL,NULL,0,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(13,'contacts','bemerkung',0,'__(\"Comment\")','textarea','a comment about this record',17,1,3,NULL,NULL,NULL,0,'2','0',0,NULL,NULL,NULL,NULL,NULL),(14,'contacts','mobil',0,'__(\"Mobile\")','phone','enter the cellular phone number',19,1,1,NULL,NULL,NULL,0,'4','0',0,NULL,NULL,NULL,NULL,NULL),(15,'contacts','url',0,'__(\"URL\")','url','the homepage - private or business',20,1,1,NULL,NULL,NULL,0,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(16,'contacts','div1',0,'Userdefined','text','a default userdefined field',21,1,1,NULL,NULL,NULL,0,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(17,'contacts','div2',0,'Userdefined','text','another default userdefined field',22,1,1,NULL,NULL,NULL,0,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(18,'contacts','state',0,'__(\"State\")','text','region or state (USA)',17,1,1,NULL,NULL,NULL,0,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(19,'contacts','email',0,'__(\"Email\")','email','enter the main email address of this contact',5,1,1,NULL,NULL,NULL,3,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(20,'contacts','kategorie',0,'__(\"Category\")','select_category','Select an existing category or insert a new one',23,1,1,NULL,NULL,'(acc like system or ((von =  or acc like group or acc like %\"\"%) and (1 = 1)))',0,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(21,'contacts','von',0,'__(\"Author\")','user_show',NULL,0,1,1,NULL,NULL,NULL,0,'1','1',0,NULL,NULL,NULL,'integer',NULL),(22,'notes','remark',0,'__(\"Comment\")','textarea','bodytext of the note',4,1,5,NULL,NULL,NULL,2,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(23,'notes','name',0,'__(\"Title\")','text','Title of this note',1,1,1,'',NULL,NULL,1,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(24,'notes','contact',0,'__(\"Contact\")','contact','Contact related to this note',5,1,1,NULL,NULL,NULL,3,NULL,NULL,0,NULL,NULL,NULL,'integer',NULL),(25,'notes','projekt',0,'__(\"Projects\")','project','Project related to this note',6,1,1,NULL,NULL,NULL,4,NULL,NULL,0,NULL,NULL,NULL,'integer',NULL),(26,'notes','kategorie',0,'__(\"Category\")','select_category','Select an existing category or insert a new one',7,1,1,NULL,NULL,'(acc like system or ((von =  or acc like group or acc like %\"\"%) and (1 = 1)))',0,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(27,'notes','div1',0,'__(\"added\")','timestamp_create','',100,1,1,NULL,NULL,'',0,'2','0',0,NULL,NULL,NULL,NULL,NULL),(28,'notes','div2',0,'__(\"changed\")','timestamp_modify','',101,1,1,NULL,NULL,'',0,'3','0',0,NULL,NULL,NULL,NULL,NULL),(29,'notes','von',0,'__(\"Author\")','user_show',NULL,0,1,1,NULL,NULL,NULL,0,'1','1',0,NULL,NULL,NULL,'integer',NULL),(30,'projekte','ende',0,'__(\"End\")','date','planned end',6,1,1,NULL,NULL,NULL,3,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(31,'projekte','name',0,'__(\"Project Name\")','text','the name of the project',1,1,1,NULL,NULL,NULL,1,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(32,'projekte','wichtung',0,'__(\"Priority\")','select_values','set the priority of this project',4,1,1,NULL,NULL,'0|1|2|3|4|5|6|7|8|9',0,'2','1',0,NULL,NULL,NULL,NULL,NULL),(33,'projekte','anfang',0,'__(\"Begin\")','date','start day',5,1,1,NULL,NULL,NULL,2,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(34,'projekte','status',0,'__(\"Status\") [%]','text','current completion status',NULL,NULL,NULL,NULL,NULL,'0',NULL,'3','1',0,NULL,NULL,NULL,'integer',NULL),(35,'projekte','statuseintrag',0,'__(\"Last status change\")','display','date of last change of status',12,1,1,NULL,NULL,NULL,0,'0','1',1,NULL,NULL,NULL,'integer',NULL),(36,'projekte','ziel',0,'__(\"Aim\")','textarea','descirbe the aim of this project',8,1,4,NULL,NULL,NULL,0,'0','0',1,NULL,NULL,NULL,NULL,NULL),(37,'projekte','note',0,'__(\"Remark\")','textarea','remarks',7,1,4,NULL,NULL,NULL,0,'3','1',0,NULL,NULL,NULL,NULL,NULL),(38,'projekte','contact',0,'__(\"Contact\")','contact','select the customer/contact',NULL,NULL,NULL,NULL,NULL,NULL,0,'0','0',1,NULL,NULL,NULL,'integer',NULL),(39,'projekte','stundensatz',0,'__(\"Hourly rate\")','text','hourly rate of this project',9,1,1,NULL,NULL,NULL,0,'0','0',0,NULL,NULL,NULL,'integer',NULL),(40,'projekte','budget',0,'__(\"Calculated budget\")','text','',10,1,1,NULL,NULL,NULL,0,'0','0',0,NULL,NULL,NULL,'integer',NULL),(41,'projekte','von',0,'__(\"Author\")','user_show',NULL,0,1,1,NULL,NULL,NULL,0,'1','1',0,NULL,NULL,NULL,'integer',NULL),(42,'projekte','kategorie',0,'__(\"Category\")','select_values','current category (or status) of this project',14,1,1,NULL,NULL,'1#__(\"offered\")|2#__(\"ordered\")|3#__(\"Working\")|4#__(\"ended\")|5#__(\"stopped\")|6#__(\"Re-Opened\")|7#__(\"waiting\")',1,'3','1',0,NULL,NULL,NULL,NULL,NULL),(43,'projekte','chef',0,'__(\"Leader\")','userID','Select a user of this group as the project leader',15,1,1,NULL,NULL,NULL,0,'0','0',0,NULL,NULL,NULL,NULL,NULL),(44,'rts','name',0,'__(\"Title\")','text','the title of the request',1,1,1,NULL,NULL,NULL,1,'0','1',0,NULL,NULL,NULL,NULL,NULL),(45,'rts','note',0,'__(\"Problem Description\")','textarea','the body of the request set by the customer',15,1,5,'','','',0,'on','1',0,NULL,NULL,NULL,NULL,NULL),(46,'rts','submit',0,'__(\"Date\")','timestamp_create','date/time the request ha been submitted',5,1,1,'','','',2,'on','1',0,NULL,NULL,NULL,NULL,NULL),(47,'rts','von',0,'__(\"Author\")','authorID','the user who wrote this request',3,1,1,'','','',3,'on','1',0,NULL,NULL,NULL,'integer',NULL),(48,'rts','contact',0,'__(\"Contact\")','contact_create','contact related to this request',7,1,1,NULL,NULL,NULL,0,'0','0',0,NULL,NULL,NULL,'integer',NULL),(49,'rts','due_date',0,'__(\"Due date\")','date','due date of this request',6,1,1,'','','',0,'3','1',0,NULL,NULL,NULL,NULL,NULL),(50,'rts','assigned',0,'__(\"Assigned\")','userID','assign the request to this user',4,1,1,'','','',4,'on','1',0,NULL,NULL,NULL,NULL,NULL),(51,'rts','priority',0,'__(\"Priority\")','select_values','set the priority of this project',10,1,1,NULL,NULL,'0|1|2|3|4|5|6|7|8|9',5,NULL,'1',0,NULL,NULL,NULL,'integer',NULL),(52,'rts','lock_user',0,'__(\"Locked by\")','userID','This ticket was locked by the follwing user',0,1,1,NULL,NULL,NULL,0,'5',NULL,0,NULL,NULL,NULL,'integer',NULL),(53,'rts','solution',0,'__(\"Solve\")','textarea','A text will cause: a mail to the customer and closing the request',0,1,1,NULL,NULL,NULL,0,'0','1',0,NULL,NULL,NULL,NULL,NULL),(54,'rts','solved',0,'__(\"Solved\") __(\"From\")','user_show','the user who has solved this request',13,1,1,'','','',0,'on','1',0,NULL,NULL,NULL,'integer',NULL),(55,'rts','solve_time',0,'__(\"Solved\")','timestamp_show','date and time when the request has been solved',14,1,1,NULL,NULL,NULL,0,'0','0',0,NULL,NULL,NULL,NULL,NULL),(56,'rts','category',0,'__(\"Account\")','select_sql','',8,1,1,'','','SELECT ID,name                                                FROM @DB_PREFIX@db_accounts',0,'','1',0,NULL,NULL,NULL,NULL,NULL),(57,'rts','proj',0,'__(\"Projects\")','project','project related to this request',9,1,1,NULL,NULL,'',0,'0','0',0,NULL,NULL,NULL,'integer',NULL),(58,'rts','status',0,'__(\"Status\")','select_values','state of this request',0,1,1,'','','1#__(\"open\")|2# __(\"assigned\")|3#__(\"solved\")|4# __(\"verified\")|5# __(\"closed\")',6,'on','1',0,NULL,NULL,NULL,NULL,NULL),(59,'rts','filename',0,'__(\"Attachment\")','upload','',11,1,1,'','','',0,'','',0,NULL,NULL,NULL,NULL,NULL),(60,'rts','ID',0,'__(\"Ticket ID\")','display','',2,1,1,'','','',0,'4','1',0,NULL,NULL,NULL,'integer',NULL),(61,'dateien','filename',0,'__(\"Change Filename\")','text','Title of the file or directory',1,1,1,'',NULL,NULL,1,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(62,'dateien','remark',0,'__(\"Comment\")','textarea','remark related to this file',4,1,5,NULL,NULL,NULL,0,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(63,'dateien','contact',0,'__(\"Contact\")','contact','Contact related to this file',5,1,1,NULL,NULL,NULL,4,NULL,NULL,0,NULL,NULL,NULL,'integer',NULL),(64,'dateien','div2',0,'__(\"Projects\")','project','Project related to this file',6,1,1,NULL,NULL,NULL,3,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(65,'dateien','kat',0,'__(\"Category\")','select_category','Select an existing category or insert a new one',7,1,1,NULL,NULL,'(acc like system or ((von =  or acc like group or acc like %\"\"%) and (1 = 1)))',0,'2','1',0,NULL,NULL,NULL,NULL,NULL),(66,'dateien','datum',0,'__(\"changed\")','timestamp_modify','',101,1,1,NULL,NULL,'',0,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(67,'dateien','filesize',0,'__(\"filesize (Byte)\")','display_byte','',0,1,1,NULL,NULL,'',2,NULL,'0',0,NULL,NULL,NULL,'integer',NULL),(68,'dateien','lock_user',0,'__(\"locked by\")','user_show','Name of the user who has locked this file temporarly',11,1,1,'','','',0,'3','0',0,NULL,NULL,NULL,'integer',NULL),(69,'dateien','von',0,'__(\"Author\")','user_show',NULL,0,1,1,NULL,NULL,NULL,0,'1','1',0,NULL,NULL,NULL,'integer',NULL),(70,'todo','remark',0,'__(\"Title\")','text','Kurze Beschreibung',1,1,1,NULL,NULL,NULL,1,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(71,'todo','deadline',0,'__(\"Deadline\")','date','',7,1,1,'','','',4,'','1',0,NULL,NULL,NULL,NULL,NULL),(72,'todo','datum',0,'__(\"Date\")','timestamp_create','',5,1,1,'','','',0,'','1',0,NULL,NULL,NULL,NULL,NULL),(73,'todo','priority',0,'__(\"Priority\")','select_values',NULL,4,1,1,NULL,NULL,'0|1|2|3|4|5|6|7|8|9',0,'2','1',0,NULL,NULL,NULL,'integer',NULL),(74,'todo','project',0,'__(\"Project\")','project',NULL,9,1,1,NULL,NULL,NULL,6,NULL,'1',0,NULL,NULL,NULL,'integer',NULL),(75,'todo','contact',0,'__(\"Contact\")','contact',NULL,8,1,1,NULL,NULL,NULL,0,NULL,'1',0,NULL,NULL,NULL,'integer',NULL),(76,'todo','note',0,'__(\"Describe your request\")','textarea',NULL,11,2,3,NULL,NULL,NULL,0,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(77,'todo','comment1',0,'__(\"Remark\") __(\"Author\")','textarea',NULL,12,2,3,NULL,NULL,NULL,NULL,NULL,'1',1,'o','von',NULL,NULL,NULL),(78,'todo','comment2',0,'__(\"Remark\") __(\"Receiver\")','textarea',NULL,13,2,3,NULL,NULL,NULL,NULL,NULL,'1',1,'o','ext',NULL,NULL,NULL),(79,'todo','von',0,'__(\"Of\")','user_show',NULL,2,1,1,NULL,NULL,NULL,2,'1','1',0,NULL,NULL,NULL,'integer',NULL),(80,'todo','anfang',0,'__(\"Begin\")','date',NULL,6,1,1,NULL,NULL,NULL,0,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(81,'todo','ext',0,'__(\"To\")','userID',NULL,3,1,1,NULL,NULL,NULL,3,NULL,'1',0,NULL,NULL,NULL,'integer',NULL),(82,'todo','progress',0,'__(\"Progress\") [%]','text',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,0,NULL,NULL,NULL,'integer',NULL),(83,'todo','status',0,'__(\"Status\")','select_values',NULL,NULL,NULL,NULL,NULL,NULL,'1#__(\"waiting\")|2#__(\"Open\")|3#__(\"accepted\")|4#__(\"rejected\")|5#__(\"ended\")',7,NULL,NULL,0,NULL,NULL,NULL,'integer',NULL),(84,'termine','event',0,'__(\"Title\")','text','Title of this event',1,1,1,'',NULL,NULL,1,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(85,'termine','datum',0,'__(\"Date\")','text','Date of this event',2,1,1,'',NULL,NULL,4,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(86,'termine','anfang',0,'__(\"Start\")','text','Title of this event',3,1,1,'',NULL,NULL,5,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(87,'termine','ende',0,'__(\"End\")','text','end of this event',4,1,1,'',NULL,NULL,6,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(88,'termine','von',0,'__(\"Author\")','select_sql','Author of this event',5,1,1,'',NULL,'SELECT DISTINCT u.ID, u.nachname, u.vorname\n                                                FROM @DB_PREFIX@termine AS t, @DB_PREFIX@users AS u\n                                               WHERE t.von = u.ID\n                                                 AND t.an  = $user_ID\n                                            ORDER BY u.nachname, u.vorname',2,'1','0',0,NULL,NULL,NULL,'integer',NULL),(89,'termine','an',0,'__(\"Recipient\")','select_sql','Recipient',6,1,1,'',NULL,'SELECT DISTINCT u.ID, u.nachname, u.vorname\n                                                FROM @DB_PREFIX@termine AS t, @DB_PREFIX@users AS u\n                                               WHERE t.an  = u.ID\n                                                 AND t.von = $user_ID\n                                            ORDER BY u.nachname, u.vorname',3,NULL,'0',0,NULL,NULL,NULL,'integer',NULL),(90,'termine','partstat',0,'__(\"Participation\")','select_values','Title of this event',7,1,1,'',NULL,'1#__(\"untreated\")|2#__(\"accepted\")|3#__(\"rejected\")',7,NULL,'1',0,NULL,NULL,NULL,'integer',NULL),(91,'termine','remark',0,'__(\"Remark\")','text','',0,0,0,'',NULL,NULL,0,'2','0',0,NULL,NULL,NULL,NULL,NULL),(92,'termine','ort',0,'__(\"Location\")','text','',0,0,0,'',NULL,NULL,0,'3','0',0,NULL,NULL,NULL,NULL,NULL),(93,'mail_client','remark',0,'__(\"Comment\")','textarea',NULL,1,2,2,NULL,NULL,NULL,0,'2','on',0,NULL,NULL,NULL,NULL,NULL),(94,'mail_client','subject',0,'__(\"subject\")','text',NULL,0,0,0,NULL,NULL,NULL,1,NULL,'on',0,NULL,NULL,NULL,NULL,NULL),(95,'mail_client','sender',0,'__(\"Sender\")','email',NULL,0,0,0,NULL,NULL,NULL,2,NULL,'on',0,NULL,NULL,NULL,NULL,NULL),(96,'mail_client','kat',0,'__(\"Category\")','select_category',NULL,2,2,1,NULL,NULL,NULL,0,'3','on',0,NULL,NULL,NULL,NULL,NULL),(97,'mail_client','projekt',0,'__(\"Project\")','project',NULL,3,2,1,NULL,NULL,NULL,0,'4','on',0,NULL,NULL,NULL,'integer',NULL),(98,'mail_client','date_inserted',0,'__(\"Date\")','timestamp',NULL,0,0,0,NULL,NULL,NULL,4,NULL,'on',0,NULL,NULL,NULL,NULL,NULL),(99,'mail_client','contact',0,'__(\"Contact\")','contact',NULL,4,2,1,NULL,NULL,NULL,0,NULL,'on',0,NULL,NULL,NULL,'integer',NULL),(100,'mail_client','von',0,'__(\"Author\")','user_show',NULL,0,1,1,NULL,NULL,NULL,0,'1','on',0,NULL,NULL,NULL,'integer',NULL),(101,'mail_client','recipient',0,'__(\"To\")','email',NULL,0,0,0,NULL,NULL,NULL,3,'0','on',0,NULL,NULL,NULL,NULL,NULL),(102,'mail_client','body',0,'__(\"Body\")','text',NULL,0,0,0,NULL,NULL,NULL,0,'5','on',0,NULL,NULL,NULL,NULL,NULL),(103,'db_records','t_module',0,'__(\"Module\")','display','Module name',1,1,1,NULL,NULL,NULL,1,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(104,'db_records','t_remark',0,'__(\"Remark\")','text','Remark',3,1,1,NULL,NULL,NULL,2,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(105,'db_records','t_archiv',0,'__(\"Archive\")','text','Archive',0,1,1,NULL,NULL,NULL,0,NULL,'1',0,NULL,NULL,NULL,'integer',NULL),(106,'db_records','t_touched',0,'__(\"Touched\")','text','Touched',0,1,1,NULL,NULL,NULL,0,NULL,'1',0,NULL,NULL,NULL,'integer',NULL),(107,'db_records','t_name',0,'__(\"Title\")','text','Title',2,1,1,NULL,NULL,NULL,1,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(108,'db_records','t_wichtung',0,'__(\"Priority\")','select_values','Priority',4,1,1,NULL,NULL,'0|1|2|3|4|5|6|7|8|9',4,NULL,'1',0,NULL,NULL,NULL,'integer',NULL),(109,'db_records','t_reminder_datum',0,'__(\"Resubmission at:\")','date','Date',5,1,1,NULL,NULL,'',5,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(110,'db_records','t_record',0,'__(\"Record set\")','display','ID of the target record',0,1,1,'',NULL,NULL,0,NULL,'0',0,NULL,NULL,NULL,'integer',NULL),(111,'db_records','t_datum',0,'__(\"Date\")','date','',0,1,1,NULL,NULL,'',0,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(112,'organisations','name',0,'__(\"Name\")','text','Name of the company',1,1,1,NULL,NULL,NULL,1,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(113,'organisations','link',0,'__(\"Url\")','text','Url of the company',2,1,1,'','','',2,'','1',0,NULL,NULL,0,NULL,NULL),(114,'organisations','adress',0,'__(\"Adress\")','text','Adress of the company',3,1,1,'','','',3,'on','1',0,NULL,NULL,0,NULL,NULL),(115,'organisations','category',0,'__(\"Category\")','select_category','Select an existing category or insert a new one',4,1,1,'',NULL,'(acc like system or ((von =  or acc like group or acc like %\"\"%) and (1 = 1)))',4,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(116,'organisations','ID',0,'__(\"Contacts\")','display_contacts','Contacts',0,1,1,'',NULL,'',5,NULL,'0',0,NULL,NULL,NULL,NULL,NULL),(117,'costs','name',0,'__(\"Title\")','text','Title of this note',1,1,1,NULL,NULL,NULL,1,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(118,'costs','remark',0,'__(\"Comment\")','textarea','bodytext of the note',2,1,5,NULL,NULL,NULL,2,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(119,'costs','amount',0,'__(\"Amount\")','text','Amount of the cost',3,1,1,NULL,NULL,NULL,0,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(120,'costs','contact',0,'__(\"Contact\")','contact','Contact related to this note',4,1,1,NULL,NULL,NULL,4,NULL,'1',0,NULL,NULL,NULL,'integer',NULL),(121,'costs','projekt',0,'__(\"Projects\")','project','Project related to this note',5,1,1,NULL,NULL,NULL,5,NULL,'1',0,NULL,NULL,NULL,'integer',NULL),(122,'project_elements','description',0,'__(\"Description\")','textarea','bodytext of the note',6,2,4,'','','',5,'on','1',0,NULL,NULL,15,NULL,NULL),(123,'project_elements','name',0,'__(\"Name\")','text','Title of this note',1,0,0,'',NULL,NULL,1,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(124,'project_elements','category',0,'__(\"Category\")','select_values','Select an existing category ',4,1,1,NULL,NULL,'1#__(\"Milestone\")|2#__(\"Planning Phase\")|3#__(\"Test phase\")|4#__(\"Online Phase\")|5#__(\"Conflict\")|6#__(\"Suggestion on solution of conflicts\")|7#__(\"Task of technical\")|8#__(\"Reference\")|9#__(\"Meeting\")|10#__(\"Task externally assign\")',2,NULL,'1',0,NULL,NULL,NULL,NULL,NULL),(125,'project_elements','begin',0,'__(\"Begin\")','date','',2,1,1,'','','2',4,'on','1',0,NULL,NULL,15,NULL,NULL),(126,'project_elements','end',0,'__(\"End\")','date','',3,1,1,'','','3',3,'on','1',0,NULL,NULL,15,NULL,NULL),(127,'project_elements','assigned',0,'__(\"Assigned\")','multiple_users','',2,1,1,'','','',6,'','',0,NULL,NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `phpr_db_manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_db_records`
--

DROP TABLE IF EXISTS `phpr_db_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_db_records` (
  `t_ID` int(8) NOT NULL AUTO_INCREMENT,
  `t_author` int(6) DEFAULT NULL,
  `t_module` varchar(40) DEFAULT NULL,
  `t_record` int(8) DEFAULT NULL,
  `t_name` varchar(255) DEFAULT NULL,
  `t_datum` varchar(20) DEFAULT NULL,
  `t_touched` int(2) DEFAULT NULL,
  `t_archiv` int(2) DEFAULT NULL,
  `t_reminder` int(2) DEFAULT NULL,
  `t_reminder_datum` varchar(20) DEFAULT NULL,
  `t_wichtung` int(2) DEFAULT NULL,
  `t_remark` text,
  `t_acc` text,
  `t_gruppe` int(6) DEFAULT NULL,
  `t_parent` int(6) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`t_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_db_records`
--

LOCK TABLES `phpr_db_records` WRITE;
/*!40000 ALTER TABLE `phpr_db_records` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_db_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_db_remarks`
--

DROP TABLE IF EXISTS `phpr_db_remarks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_db_remarks` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `module` varchar(40) DEFAULT NULL,
  `module_ID` int(8) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `remark` text,
  `author` varchar(80) DEFAULT NULL,
  `parent` int(8) DEFAULT NULL,
  `upload` text,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_db_remarks`
--

LOCK TABLES `phpr_db_remarks` WRITE;
/*!40000 ALTER TABLE `phpr_db_remarks` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_db_remarks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_filter`
--

DROP TABLE IF EXISTS `phpr_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_filter` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `remark` text,
  `filter` text,
  `filter_sort` varchar(100) DEFAULT NULL,
  `filter_direction` varchar(4) DEFAULT NULL,
  `filter_operator` varchar(10) DEFAULT NULL,
  `acc` text,
  `acc_write` text,
  `gruppe` int(8) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_filter`
--

LOCK TABLES `phpr_filter` WRITE;
/*!40000 ALTER TABLE `phpr_filter` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_filter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_forum`
--

DROP TABLE IF EXISTS `phpr_forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_forum` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `antwort` int(8) DEFAULT NULL,
  `von` int(8) DEFAULT NULL,
  `titel` varchar(80) DEFAULT NULL,
  `remark` text,
  `kat` varchar(20) DEFAULT NULL,
  `datum` varchar(20) DEFAULT NULL,
  `gruppe` int(4) DEFAULT NULL,
  `lastchange` varchar(20) DEFAULT NULL,
  `notify` varchar(2) DEFAULT NULL,
  `acc` text,
  `acc_write` text,
  `parent` int(8) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `forum_antwort` (`antwort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_forum`
--

LOCK TABLES `phpr_forum` WRITE;
/*!40000 ALTER TABLE `phpr_forum` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_global_mail_account`
--

DROP TABLE IF EXISTS `phpr_global_mail_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_global_mail_account` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `module` varchar(40) DEFAULT NULL,
  `accountname` varchar(40) DEFAULT NULL,
  `hostname` varchar(80) DEFAULT NULL,
  `type` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_global_mail_account`
--

LOCK TABLES `phpr_global_mail_account` WRITE;
/*!40000 ALTER TABLE `phpr_global_mail_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_global_mail_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_grup_user`
--

DROP TABLE IF EXISTS `phpr_grup_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_grup_user` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `grup_ID` int(4) DEFAULT NULL,
  `user_ID` int(8) DEFAULT NULL,
  `role_ID` int(8) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `grup_user_user_ID` (`user_ID`),
  KEY `grup_user_grup_ID` (`grup_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_grup_user`
--

LOCK TABLES `phpr_grup_user` WRITE;
/*!40000 ALTER TABLE `phpr_grup_user` DISABLE KEYS */;
INSERT INTO `phpr_grup_user` VALUES (1,1,2,NULL);
/*!40000 ALTER TABLE `phpr_grup_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_gruppen`
--

DROP TABLE IF EXISTS `phpr_gruppen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_gruppen` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `kurz` varchar(10) DEFAULT NULL,
  `kategorie` varchar(255) DEFAULT NULL,
  `bemerkung` varchar(255) DEFAULT NULL,
  `chef` int(8) DEFAULT NULL,
  `div1` varchar(255) DEFAULT NULL,
  `div2` varchar(255) DEFAULT NULL,
  `ldap_name` text,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_gruppen`
--

LOCK TABLES `phpr_gruppen` WRITE;
/*!40000 ALTER TABLE `phpr_gruppen` DISABLE KEYS */;
INSERT INTO `phpr_gruppen` VALUES (1,'default','def','default',NULL,1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `phpr_gruppen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_history`
--

DROP TABLE IF EXISTS `phpr_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_history` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `h_date` varchar(20) DEFAULT NULL,
  `h_table` varchar(60) DEFAULT NULL,
  `h_field` varchar(60) DEFAULT NULL,
  `h_record` int(8) DEFAULT NULL,
  `last_value` text,
  `new_value` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_history`
--

LOCK TABLES `phpr_history` WRITE;
/*!40000 ALTER TABLE `phpr_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_lesezeichen`
--

DROP TABLE IF EXISTS `phpr_lesezeichen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_lesezeichen` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `datum` varchar(20) DEFAULT NULL,
  `von` int(8) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `bezeichnung` varchar(255) DEFAULT NULL,
  `bemerkung` varchar(255) DEFAULT NULL,
  `gruppe` int(6) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_lesezeichen`
--

LOCK TABLES `phpr_lesezeichen` WRITE;
/*!40000 ALTER TABLE `phpr_lesezeichen` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_lesezeichen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_logintoken`
--

DROP TABLE IF EXISTS `phpr_logintoken`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_logintoken` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `user_ID` int(8) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `valid` varchar(20) DEFAULT NULL,
  `used` varchar(20) DEFAULT NULL,
  `datum` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `i_user_ID` (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_logintoken`
--

LOCK TABLES `phpr_logintoken` WRITE;
/*!40000 ALTER TABLE `phpr_logintoken` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_logintoken` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_logs`
--

DROP TABLE IF EXISTS `phpr_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_logs` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `logout` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_logs`
--

LOCK TABLES `phpr_logs` WRITE;
/*!40000 ALTER TABLE `phpr_logs` DISABLE KEYS */;
INSERT INTO `phpr_logs` VALUES (1,1,'20090618110411','20090618111648'),(2,1,'20090618111656','20090618111743'),(3,1,'20090618111747',NULL),(4,1,'20090618112433',NULL);
/*!40000 ALTER TABLE `phpr_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_mail_account`
--

DROP TABLE IF EXISTS `phpr_mail_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_mail_account` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `accountname` varchar(40) DEFAULT NULL,
  `hostname` varchar(80) DEFAULT NULL,
  `type` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `mail_auth` int(2) DEFAULT NULL,
  `pop_hostname` varchar(40) DEFAULT NULL,
  `pop_account` varchar(40) DEFAULT NULL,
  `pop_password` varchar(40) DEFAULT NULL,
  `smtp_hostname` varchar(40) DEFAULT NULL,
  `smtp_account` varchar(40) DEFAULT NULL,
  `smtp_password` varchar(40) DEFAULT NULL,
  `collect` int(2) DEFAULT NULL,
  `deletion` int(2) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_mail_account`
--

LOCK TABLES `phpr_mail_account` WRITE;
/*!40000 ALTER TABLE `phpr_mail_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_mail_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_mail_attach`
--

DROP TABLE IF EXISTS `phpr_mail_attach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_mail_attach` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `parent` int(8) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `tempname` varchar(255) DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `mail_attach_parent` (`parent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_mail_attach`
--

LOCK TABLES `phpr_mail_attach` WRITE;
/*!40000 ALTER TABLE `phpr_mail_attach` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_mail_attach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_mail_client`
--

DROP TABLE IF EXISTS `phpr_mail_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_mail_client` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text,
  `sender` varchar(128) DEFAULT NULL,
  `recipient` text,
  `cc` text,
  `kat` varchar(40) DEFAULT NULL,
  `remark` text,
  `date_received` varchar(20) DEFAULT NULL,
  `touched` int(1) DEFAULT NULL,
  `typ` char(1) DEFAULT NULL,
  `parent` int(8) DEFAULT NULL,
  `date_sent` varchar(20) DEFAULT NULL,
  `header` text,
  `replyto` varchar(128) DEFAULT NULL,
  `acc` text,
  `acc_write` text,
  `gruppe` int(8) DEFAULT NULL,
  `body_html` text,
  `message_ID` varchar(255) DEFAULT NULL,
  `projekt` int(6) DEFAULT NULL,
  `contact` int(6) DEFAULT NULL,
  `date_inserted` varchar(20) DEFAULT NULL,
  `trash_can` char(1) DEFAULT NULL,
  `replied` int(8) DEFAULT NULL,
  `forwarded` int(8) DEFAULT NULL,
  `account_ID` int(8) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `mail_client_von` (`von`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_mail_client`
--

LOCK TABLES `phpr_mail_client` WRITE;
/*!40000 ALTER TABLE `phpr_mail_client` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_mail_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_mail_rules`
--

DROP TABLE IF EXISTS `phpr_mail_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_mail_rules` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `title` varchar(80) DEFAULT NULL,
  `phrase` varchar(60) DEFAULT NULL,
  `type` varchar(60) DEFAULT NULL,
  `is_not` varchar(3) DEFAULT NULL,
  `parent` int(8) DEFAULT NULL,
  `action` varchar(10) DEFAULT NULL,
  `projekt` int(6) DEFAULT NULL,
  `contact` int(6) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_mail_rules`
--

LOCK TABLES `phpr_mail_rules` WRITE;
/*!40000 ALTER TABLE `phpr_mail_rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_mail_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_mail_sender`
--

DROP TABLE IF EXISTS `phpr_mail_sender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_mail_sender` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `title` varchar(80) DEFAULT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `signature` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_mail_sender`
--

LOCK TABLES `phpr_mail_sender` WRITE;
/*!40000 ALTER TABLE `phpr_mail_sender` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_mail_sender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_module_role_rel`
--

DROP TABLE IF EXISTS `phpr_module_role_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_module_role_rel` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `role_ID` int(8) DEFAULT NULL,
  `module_ID` int(8) DEFAULT NULL,
  `access` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_module_role_rel`
--

LOCK TABLES `phpr_module_role_rel` WRITE;
/*!40000 ALTER TABLE `phpr_module_role_rel` DISABLE KEYS */;
INSERT INTO `phpr_module_role_rel` VALUES (1,0,1,1,1),(2,0,1,2,1),(3,0,1,3,1),(4,0,1,19,0),(5,0,1,15,1),(6,0,1,26,0),(7,0,1,4,2),(8,0,1,5,2),(9,0,1,6,2),(10,0,1,7,0),(11,0,1,17,0),(12,0,1,18,0),(13,0,1,20,0),(14,0,1,25,0),(15,0,1,27,0),(16,0,1,8,0),(17,0,1,9,2),(18,0,1,22,0),(19,0,1,10,0),(20,0,1,11,0),(21,0,1,12,0),(22,0,1,13,0),(23,0,1,14,0),(24,0,1,24,0);
/*!40000 ALTER TABLE `phpr_module_role_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_modules`
--

DROP TABLE IF EXISTS `phpr_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_modules` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `index_name` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `position` int(4) DEFAULT NULL,
  `parent` int(8) DEFAULT NULL,
  `module_type` varchar(255) DEFAULT NULL,
  `additional_check` varchar(255) DEFAULT NULL,
  `form_cols` int(4) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_modules`
--

LOCK TABLES `phpr_modules` WRITE;
/*!40000 ALTER TABLE `phpr_modules` DISABLE KEYS */;
INSERT INTO `phpr_modules` VALUES (1,'__(\"Summary\")','summary','summary/summary.php?mode=view',1,0,'navigation','2',2,NULL),(2,'__(\"Calendar\")','calendar','calendar/calendar.php',2,0,'navigation','PHPR_CALENDAR',2,NULL),(3,'__(\"Contacts\")','contacts','contacts/contacts.php?mode=view',3,0,'navigation','PHPR_CONTACTS',2,NULL),(4,'__(\"Forum\")','forum','forum/forum.php?mode=view',4,0,'navigation','PHPR_FORUM',2,NULL),(5,'__(\"Chat\")','chat','chat/chat.php?mode=view',5,0,'navigation','PHPR_CHAT',2,NULL),(6,'__(\"Filemanager\")','filemanager','filemanager/filemanager.php?mode=view',6,0,'navigation','PHPR_FILEMANAGER',2,NULL),(7,'__(\"Projects\")','projects','projects/projects.php?mode=view',7,0,'navigation','PHPR_PROJECTS',2,NULL),(8,'__(\"Timecard\")','timecard','timecard/timecard.php?mode=view',8,0,'navigation','PHPR_TIMECARD',2,NULL),(9,'__(\"Notes\")','notes','notes/notes.php?mode=view',9,0,'navigation','PHPR_NOTES',2,NULL),(10,'__(\"Helpdesk\")','helpdesk','helpdesk/helpdesk.php?mode=view',10,0,'navigation','PHPR_RTS',2,NULL),(11,'__(\"Mail\")','mail','mail/mail.php?mode=view',11,0,'navigation','PHPR_QUICKMAIL',2,NULL),(12,'__(\"Todo\")','todo','todo/todo.php?mode=view',12,0,'navigation','PHPR_TODO',2,NULL),(13,'__(\"Bookmarks\")','bookmarks','bookmarks/bookmarks.php?mode=view',13,0,'navigation','PHPR_BOOKMARKS',2,NULL),(14,'__(\"Votum\")','votum','votum/votum.php?mode=view',14,0,'navigation','PHPR_VOTUM',2,NULL),(15,' __(\"Group members\")','members','contacts/members.php?mode=view',0,3,'navigation','PHPR_CONTACTS',2,NULL),(17,'__(\"Statistic\")','statistic','projects/projects.php?mode=stat',3,7,'view','2',2,NULL),(18,'__(\"My Statistic\")','mystatistic','projects/projects.php?mode=stat&amp;mode2=mystat',4,7,'view','2',2,NULL),(19,'__(\"Profiles\")','profiles','contacts/contacts.php?mode=profiles_forms&amp;action=contacts',2,3,'view','PHPR_CONTACTS_PROFILES',2,NULL),(20,'__(\"Gantt\")','gantt','projects/projects.php?mode=gantt',4,7,'view','PHPR_SUPPORT_CHART',2,NULL),(22,'__(\"Links\")','links','links/links.php?mode=view',9,0,'navigation','PHPR_LINKS',2,NULL),(24,'__(\"Costs\")','costs','costs/costs.php?mode=view',16,0,'navigation','PHPR_COSTS',2,NULL),(25,'__(\"Timescale\")','timescale','timescale/timescale.php',5,7,'view','2',NULL,NULL),(26,'__(\"Companies\")','organisations','organisations/organisations.php?mode=view',0,3,'navigation','PHPR_CONTACTS',2,NULL),(27,'__(\"Options\")','project_options','projects/projects.php?mode=options',6,7,'view','2',NULL,NULL);
/*!40000 ALTER TABLE `phpr_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_notes`
--

DROP TABLE IF EXISTS `phpr_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_notes` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `remark` text,
  `contact` int(8) DEFAULT NULL,
  `ext` int(8) DEFAULT NULL,
  `div1` varchar(40) DEFAULT NULL,
  `div2` varchar(40) DEFAULT NULL,
  `projekt` int(6) DEFAULT NULL,
  `sync1` varchar(20) DEFAULT NULL,
  `sync2` varchar(20) DEFAULT NULL,
  `acc` text,
  `acc_write` text,
  `gruppe` int(4) DEFAULT NULL,
  `parent` int(6) DEFAULT NULL,
  `kategorie` varchar(100) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_notes`
--

LOCK TABLES `phpr_notes` WRITE;
/*!40000 ALTER TABLE `phpr_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_organisation_contacts_rel`
--

DROP TABLE IF EXISTS `phpr_organisation_contacts_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_organisation_contacts_rel` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `organisation_ID` int(8) DEFAULT NULL,
  `contact_ID` int(8) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_organisation_contacts_rel`
--

LOCK TABLES `phpr_organisation_contacts_rel` WRITE;
/*!40000 ALTER TABLE `phpr_organisation_contacts_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_organisation_contacts_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_organisations`
--

DROP TABLE IF EXISTS `phpr_organisations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_organisations` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `gruppe` int(8) DEFAULT NULL,
  `von` int(8) DEFAULT NULL,
  `parent` int(8) DEFAULT NULL,
  `sync1` varchar(20) DEFAULT NULL,
  `sync2` varchar(20) DEFAULT NULL,
  `acc` text,
  `acc_write` text,
  `link` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_organisations`
--

LOCK TABLES `phpr_organisations` WRITE;
/*!40000 ALTER TABLE `phpr_organisations` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_organisations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_profile`
--

DROP TABLE IF EXISTS `phpr_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_profile` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `bezeichnung` varchar(20) DEFAULT NULL,
  `personen` text,
  `gruppe` int(8) DEFAULT NULL,
  `acc` text,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_profile`
--

LOCK TABLES `phpr_profile` WRITE;
/*!40000 ALTER TABLE `phpr_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_project_contacts_rel`
--

DROP TABLE IF EXISTS `phpr_project_contacts_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_project_contacts_rel` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `project_ID` int(8) DEFAULT NULL,
  `contact_ID` int(8) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `i_project_ID` (`project_ID`),
  KEY `i_contact_ID` (`contact_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_project_contacts_rel`
--

LOCK TABLES `phpr_project_contacts_rel` WRITE;
/*!40000 ALTER TABLE `phpr_project_contacts_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_project_contacts_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_project_elements`
--

DROP TABLE IF EXISTS `phpr_project_elements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_project_elements` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `description` text,
  `project_ID` int(8) DEFAULT NULL,
  `begin` varchar(10) DEFAULT NULL,
  `end` varchar(10) DEFAULT NULL,
  `category` varchar(80) DEFAULT NULL,
  `colour` varchar(10) DEFAULT NULL,
  `von` int(8) DEFAULT NULL,
  `assigned` text,
  `is_deleted` int(1) DEFAULT NULL,
  `parent` int(8) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `i_project_ID` (`project_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_project_elements`
--

LOCK TABLES `phpr_project_elements` WRITE;
/*!40000 ALTER TABLE `phpr_project_elements` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_project_elements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_project_users_rel`
--

DROP TABLE IF EXISTS `phpr_project_users_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_project_users_rel` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `project_ID` int(8) DEFAULT NULL,
  `user_ID` int(8) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `user_unit` int(8) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `favorite` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `i_project_ID` (`project_ID`),
  KEY `i_user_ID` (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_project_users_rel`
--

LOCK TABLES `phpr_project_users_rel` WRITE;
/*!40000 ALTER TABLE `phpr_project_users_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_project_users_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_projekt_statistik_contractors`
--

DROP TABLE IF EXISTS `phpr_projekt_statistik_contractors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_projekt_statistik_contractors` (
  `stat_einstellung_ID` int(8) DEFAULT NULL,
  `contractor_id` int(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_projekt_statistik_contractors`
--

LOCK TABLES `phpr_projekt_statistik_contractors` WRITE;
/*!40000 ALTER TABLE `phpr_projekt_statistik_contractors` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_projekt_statistik_contractors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_projekt_statistik_costcentres`
--

DROP TABLE IF EXISTS `phpr_projekt_statistik_costcentres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_projekt_statistik_costcentres` (
  `stat_einstellung_ID` int(8) DEFAULT NULL,
  `costcentre_id` int(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_projekt_statistik_costcentres`
--

LOCK TABLES `phpr_projekt_statistik_costcentres` WRITE;
/*!40000 ALTER TABLE `phpr_projekt_statistik_costcentres` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_projekt_statistik_costcentres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_projekt_statistik_costunits`
--

DROP TABLE IF EXISTS `phpr_projekt_statistik_costunits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_projekt_statistik_costunits` (
  `stat_einstellung_ID` int(8) DEFAULT NULL,
  `costunit_id` int(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_projekt_statistik_costunits`
--

LOCK TABLES `phpr_projekt_statistik_costunits` WRITE;
/*!40000 ALTER TABLE `phpr_projekt_statistik_costunits` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_projekt_statistik_costunits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_projekt_statistik_einstellungen`
--

DROP TABLE IF EXISTS `phpr_projekt_statistik_einstellungen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_projekt_statistik_einstellungen` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `user_ID` int(8) DEFAULT NULL,
  `startDate` varchar(10) DEFAULT NULL,
  `endDate` varchar(10) DEFAULT NULL,
  `withBooking` int(1) DEFAULT NULL,
  `withComment` int(1) DEFAULT NULL,
  `sortBy` varchar(40) DEFAULT NULL,
  `isAllProjects` int(1) DEFAULT NULL,
  `isAllUsers` int(1) DEFAULT NULL,
  `isAllCostcentres` int(1) DEFAULT NULL,
  `isAllCostunits` int(1) DEFAULT NULL,
  `isAllContractors` int(1) DEFAULT NULL,
  `filter_mode` varchar(40) DEFAULT NULL,
  `show_group` int(1) DEFAULT NULL,
  `period` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `i_user_ID` (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_projekt_statistik_einstellungen`
--

LOCK TABLES `phpr_projekt_statistik_einstellungen` WRITE;
/*!40000 ALTER TABLE `phpr_projekt_statistik_einstellungen` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_projekt_statistik_einstellungen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_projekt_statistik_projekte`
--

DROP TABLE IF EXISTS `phpr_projekt_statistik_projekte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_projekt_statistik_projekte` (
  `stat_einstellung_ID` int(8) DEFAULT NULL,
  `projekt_ID` int(8) DEFAULT NULL,
  KEY `i_stat_einstellung_ID` (`stat_einstellung_ID`),
  KEY `i_projekt_ID` (`projekt_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_projekt_statistik_projekte`
--

LOCK TABLES `phpr_projekt_statistik_projekte` WRITE;
/*!40000 ALTER TABLE `phpr_projekt_statistik_projekte` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_projekt_statistik_projekte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_projekt_statistik_user`
--

DROP TABLE IF EXISTS `phpr_projekt_statistik_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_projekt_statistik_user` (
  `stat_einstellung_ID` int(8) DEFAULT NULL,
  `user_ID` int(8) DEFAULT NULL,
  KEY `i_stat_einstellung_ID` (`stat_einstellung_ID`),
  KEY `i_user_ID` (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_projekt_statistik_user`
--

LOCK TABLES `phpr_projekt_statistik_user` WRITE;
/*!40000 ALTER TABLE `phpr_projekt_statistik_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_projekt_statistik_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_projekte`
--

DROP TABLE IF EXISTS `phpr_projekte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_projekte` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `ende` varchar(10) DEFAULT NULL,
  `personen` text,
  `wichtung` varchar(20) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  `statuseintrag` varchar(10) DEFAULT NULL,
  `anfang` varchar(10) DEFAULT NULL,
  `gruppe` int(4) DEFAULT NULL,
  `chef` varchar(20) DEFAULT NULL,
  `typ` varchar(40) DEFAULT NULL,
  `parent` int(6) DEFAULT NULL,
  `ziel` text,
  `note` text,
  `kategorie` varchar(40) DEFAULT NULL,
  `contact` int(8) DEFAULT NULL,
  `stundensatz` int(8) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `div1` varchar(40) DEFAULT NULL,
  `div2` varchar(40) DEFAULT NULL,
  `depend_mode` int(2) DEFAULT NULL,
  `depend_proj` int(6) DEFAULT NULL,
  `next_mode` int(2) DEFAULT NULL,
  `next_proj` int(6) DEFAULT NULL,
  `probability` int(3) DEFAULT NULL,
  `ende_real` varchar(10) DEFAULT NULL,
  `acc` text,
  `acc_write` text,
  `von` int(8) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `costcentre_id` int(11) DEFAULT NULL,
  `contractor_id` int(11) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `parent` (`parent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_projekte`
--

LOCK TABLES `phpr_projekte` WRITE;
/*!40000 ALTER TABLE `phpr_projekte` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_projekte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_projekte_costunit`
--

DROP TABLE IF EXISTS `phpr_projekte_costunit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_projekte_costunit` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `projekte_ID` int(8) DEFAULT NULL,
  `costunit_id` int(8) DEFAULT NULL,
  `fraction` varchar(40) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_projekte_costunit`
--

LOCK TABLES `phpr_projekte_costunit` WRITE;
/*!40000 ALTER TABLE `phpr_projekte_costunit` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_projekte_costunit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_roles`
--

DROP TABLE IF EXISTS `phpr_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_roles` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(6) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `remark` text,
  `summary` int(1) DEFAULT NULL,
  `calendar` int(1) DEFAULT NULL,
  `contacts` int(1) DEFAULT NULL,
  `forum` int(1) DEFAULT NULL,
  `chat` int(1) DEFAULT NULL,
  `filemanager` int(1) DEFAULT NULL,
  `bookmarks` int(1) DEFAULT NULL,
  `votum` int(1) DEFAULT NULL,
  `mail` int(1) DEFAULT NULL,
  `notes` int(1) DEFAULT NULL,
  `helpdesk` int(1) DEFAULT NULL,
  `projects` int(1) DEFAULT NULL,
  `timecard` int(1) DEFAULT NULL,
  `todo` int(1) DEFAULT NULL,
  `news` int(1) DEFAULT NULL,
  `organisations` int(1) DEFAULT NULL,
  `costs` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_roles`
--

LOCK TABLES `phpr_roles` WRITE;
/*!40000 ALTER TABLE `phpr_roles` DISABLE KEYS */;
INSERT INTO `phpr_roles` VALUES (1,1,'Estudiante','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `phpr_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_rts`
--

DROP TABLE IF EXISTS `phpr_rts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_rts` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `contact` int(4) DEFAULT NULL,
  `submit` varchar(20) DEFAULT NULL,
  `recorded` int(6) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text,
  `due_date` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `assigned` varchar(20) DEFAULT NULL,
  `priority` int(1) DEFAULT NULL,
  `solution` text,
  `solved` int(4) DEFAULT NULL,
  `solve_time` varchar(20) DEFAULT NULL,
  `proj` int(6) DEFAULT NULL,
  `acc_read` text,
  `acc_write` text,
  `von` int(8) DEFAULT NULL,
  `gruppe` int(6) DEFAULT NULL,
  `parent` int(8) DEFAULT NULL,
  `visibility` varchar(20) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `lock_user` int(6) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `ical_ID` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_rts`
--

LOCK TABLES `phpr_rts` WRITE;
/*!40000 ALTER TABLE `phpr_rts` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_rts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_rts_cat`
--

DROP TABLE IF EXISTS `phpr_rts_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_rts_cat` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `users` varchar(10) DEFAULT NULL,
  `gruppe` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_rts_cat`
--

LOCK TABLES `phpr_rts_cat` WRITE;
/*!40000 ALTER TABLE `phpr_rts_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_rts_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_savedata`
--

DROP TABLE IF EXISTS `phpr_savedata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_savedata` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `settings` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_savedata`
--

LOCK TABLES `phpr_savedata` WRITE;
/*!40000 ALTER TABLE `phpr_savedata` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_savedata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_sync_rel`
--

DROP TABLE IF EXISTS `phpr_sync_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_sync_rel` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(8) DEFAULT NULL,
  `sync_type` varchar(255) DEFAULT NULL,
  `sync_version` varchar(255) DEFAULT NULL,
  `sync_ID` varchar(255) DEFAULT NULL,
  `sync_module` varchar(255) DEFAULT NULL,
  `sync_checksum` varchar(40) DEFAULT NULL,
  `phprojekt_ID` int(8) DEFAULT NULL,
  `phprojekt_module` varchar(40) DEFAULT NULL,
  `created` varchar(20) DEFAULT NULL,
  `modified` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_sync_rel`
--

LOCK TABLES `phpr_sync_rel` WRITE;
/*!40000 ALTER TABLE `phpr_sync_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_sync_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_termine`
--

DROP TABLE IF EXISTS `phpr_termine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_termine` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `serie_id` int(11) DEFAULT NULL,
  `serie_typ` text,
  `serie_bis` varchar(10) DEFAULT NULL,
  `von` int(8) DEFAULT NULL,
  `an` int(8) DEFAULT NULL,
  `event` varchar(128) DEFAULT NULL,
  `remark` text,
  `projekt` int(8) DEFAULT NULL,
  `datum` varchar(10) DEFAULT NULL,
  `anfang` varchar(4) DEFAULT NULL,
  `ende` varchar(4) DEFAULT NULL,
  `ort` varchar(40) DEFAULT NULL,
  `contact` int(8) DEFAULT NULL,
  `remind` int(4) DEFAULT NULL,
  `visi` int(1) DEFAULT NULL,
  `partstat` int(1) DEFAULT NULL,
  `priority` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `sync1` varchar(20) DEFAULT NULL,
  `sync2` varchar(20) DEFAULT NULL,
  `upload` text,
  `module_name` varchar(20) DEFAULT NULL,
  `module_ID` int(8) DEFAULT NULL,
  `module_type` varchar(20) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `mailnotify` text,
  `ical_ID` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `termine_parent` (`parent`),
  KEY `termine_serie_id` (`serie_id`),
  KEY `termine_anfang` (`anfang`),
  KEY `termine_ende` (`ende`),
  KEY `termine_von` (`von`),
  KEY `termine_an` (`an`),
  KEY `termine_visi` (`visi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_termine`
--

LOCK TABLES `phpr_termine` WRITE;
/*!40000 ALTER TABLE `phpr_termine` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_termine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_timecard`
--

DROP TABLE IF EXISTS `phpr_timecard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_timecard` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `users` int(8) DEFAULT NULL,
  `datum` varchar(10) DEFAULT NULL,
  `projekt` int(8) DEFAULT NULL,
  `anfang` int(4) DEFAULT NULL,
  `ende` int(4) DEFAULT NULL,
  `nettoh` int(2) DEFAULT NULL,
  `nettom` int(2) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_timecard`
--

LOCK TABLES `phpr_timecard` WRITE;
/*!40000 ALTER TABLE `phpr_timecard` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_timecard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_timeproj`
--

DROP TABLE IF EXISTS `phpr_timeproj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_timeproj` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `users` int(4) DEFAULT NULL,
  `projekt` int(4) DEFAULT NULL,
  `datum` varchar(10) DEFAULT NULL,
  `h` int(2) DEFAULT NULL,
  `m` int(2) DEFAULT NULL,
  `kat` varchar(255) DEFAULT NULL,
  `note` text,
  `ext` int(2) DEFAULT NULL,
  `div1` varchar(40) DEFAULT NULL,
  `div2` varchar(40) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `module_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_timeproj`
--

LOCK TABLES `phpr_timeproj` WRITE;
/*!40000 ALTER TABLE `phpr_timeproj` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_timeproj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_todo`
--

DROP TABLE IF EXISTS `phpr_todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_todo` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `von` int(8) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `ext` int(8) DEFAULT NULL,
  `div1` text,
  `div2` varchar(40) DEFAULT NULL,
  `note` text,
  `deadline` varchar(20) DEFAULT NULL,
  `datum` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `priority` int(1) DEFAULT NULL,
  `progress` int(4) DEFAULT NULL,
  `project` int(6) DEFAULT NULL,
  `contact` int(8) DEFAULT NULL,
  `sync1` varchar(20) DEFAULT NULL,
  `sync2` varchar(20) DEFAULT NULL,
  `comment1` text,
  `comment2` text,
  `anfang` varchar(20) DEFAULT NULL,
  `gruppe` int(4) DEFAULT NULL,
  `acc` text,
  `acc_write` text,
  `parent` int(11) DEFAULT NULL,
  `phase` int(2) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `ical_ID` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_todo`
--

LOCK TABLES `phpr_todo` WRITE;
/*!40000 ALTER TABLE `phpr_todo` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_todo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_users`
--

DROP TABLE IF EXISTS `phpr_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_users` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `vorname` varchar(40) DEFAULT NULL,
  `nachname` varchar(40) DEFAULT NULL,
  `kurz` varchar(40) DEFAULT NULL,
  `pw` varchar(40) DEFAULT NULL,
  `firma` varchar(40) DEFAULT NULL,
  `gruppe` int(4) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `acc` varchar(4) DEFAULT NULL,
  `tel1` varchar(40) DEFAULT NULL,
  `tel2` varchar(40) DEFAULT NULL,
  `fax` varchar(40) DEFAULT NULL,
  `strasse` varchar(40) DEFAULT NULL,
  `stadt` varchar(40) DEFAULT NULL,
  `plz` varchar(10) DEFAULT NULL,
  `land` varchar(40) DEFAULT NULL,
  `sprache` varchar(2) DEFAULT NULL,
  `mobil` varchar(40) DEFAULT NULL,
  `loginname` varchar(40) DEFAULT NULL,
  `ldap_name` varchar(40) DEFAULT NULL,
  `anrede` varchar(10) DEFAULT NULL,
  `sms` varchar(60) DEFAULT NULL,
  `role` int(4) DEFAULT NULL,
  `settings` text,
  `hrate` varchar(20) DEFAULT NULL,
  `remark` text,
  `usertype` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `users_kurz` (`kurz`),
  KEY `users_gruppe` (`gruppe`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_users`
--

LOCK TABLES `phpr_users` WRITE;
/*!40000 ALTER TABLE `phpr_users` DISABLE KEYS */;
INSERT INTO `phpr_users` VALUES (1,'root','root','root1','bfbafcec904561d9fcae39e4fc52d2db',NULL,NULL,NULL,'an',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'es',NULL,'root',NULL,NULL,NULL,NULL,'a:6:{s:12:\"f_sort_store\";a:1:{s:8:\"contacts\";a:2:{s:4:\"sort\";s:8:\"nachname\";s:9:\"direction\";s:3:\"ASC\";}}s:11:\"flist_store\";a:1:{s:9:\"operators\";a:7:{s:8:\"helpdesk\";s:5:\" AND \";s:8:\"contacts\";s:5:\" AND \";s:7:\"dateien\";s:5:\" AND \";s:8:\"projects\";s:5:\" AND \";s:5:\"notes\";s:5:\" AND \";s:4:\"mail\";s:5:\" AND \";s:4:\"todo\";s:5:\" AND \";}}s:27:\"show_read_elements_settings\";a:2:{s:5:\"forum\";i:0;s:8:\"contacts\";i:0;}s:30:\"show_archive_elements_settings\";a:2:{s:5:\"forum\";i:0;s:8:\"contacts\";i:0;}s:25:\"show_html_editor_settings\";a:1:{s:8:\"contacts\";i:0;}s:10:\"last_group\";i:0;}',NULL,'Administrator',3,0,NULL),(2,'test','test','test1','bfbafcec904561d9fcae39e4fc52d2db',NULL,1,NULL,'cy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'es',NULL,'test',NULL,NULL,NULL,NULL,NULL,NULL,'Test User',0,0,NULL);
/*!40000 ALTER TABLE `phpr_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_users_proxy`
--

DROP TABLE IF EXISTS `phpr_users_proxy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_users_proxy` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `user_ID` int(8) DEFAULT NULL,
  `proxy_ID` int(8) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `users_proxy_pr_ID` (`proxy_ID`),
  KEY `users_proxy_usr_ID` (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_users_proxy`
--

LOCK TABLES `phpr_users_proxy` WRITE;
/*!40000 ALTER TABLE `phpr_users_proxy` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_users_proxy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_users_reader`
--

DROP TABLE IF EXISTS `phpr_users_reader`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_users_reader` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `user_ID` int(8) DEFAULT NULL,
  `reader_ID` int(8) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `users_reader_rd_ID` (`reader_ID`),
  KEY `users_reader_us_ID` (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_users_reader`
--

LOCK TABLES `phpr_users_reader` WRITE;
/*!40000 ALTER TABLE `phpr_users_reader` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_users_reader` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_users_viewer`
--

DROP TABLE IF EXISTS `phpr_users_viewer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_users_viewer` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `user_ID` int(8) DEFAULT NULL,
  `viewer_ID` int(8) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `users_viewer_vw_ID` (`viewer_ID`),
  KEY `users_viewer_us_ID` (`user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_users_viewer`
--

LOCK TABLES `phpr_users_viewer` WRITE;
/*!40000 ALTER TABLE `phpr_users_viewer` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_users_viewer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phpr_votum`
--

DROP TABLE IF EXISTS `phpr_votum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phpr_votum` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `datum` varchar(20) DEFAULT NULL,
  `von` int(8) DEFAULT NULL,
  `thema` varchar(255) DEFAULT NULL,
  `modus` char(1) DEFAULT NULL,
  `an` text,
  `fertig` text,
  `text1` varchar(60) DEFAULT NULL,
  `text2` varchar(60) DEFAULT NULL,
  `text3` varchar(60) DEFAULT NULL,
  `zahl1` int(4) DEFAULT NULL,
  `zahl2` int(4) DEFAULT NULL,
  `zahl3` int(4) DEFAULT NULL,
  `kein` int(4) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phpr_votum`
--

LOCK TABLES `phpr_votum` WRITE;
/*!40000 ALTER TABLE `phpr_votum` DISABLE KEYS */;
/*!40000 ALTER TABLE `phpr_votum` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-09-21 19:21:53
