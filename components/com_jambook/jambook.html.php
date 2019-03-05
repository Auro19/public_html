<?php
/**
 * Jambook guestbook component for Joomla.
 *
 * Distributed under the terms of the GNU General Public License v2
 * http://www.gnu.org/copyleft/gpl.html
 * This software may be used without warrany provided and
 * copyright statements are left intact.
 *
 * @package JX Development
 * @subpackage Jambook
 * @copyright Copyright (C) 2007-2008 Olle Johansson
 * @author Olle Johansson - http://www.jxdevelopment.com
 * @version $Id$
 **/

if ( !defined( '_VALID_MOS' ) && !defined('_JEXEC') ) die( 'Direct Access to this location is not allowed.' );

class HTML_jambook {

	function listItems( $items, $totalRows, $search="", $pageNav="", $link="", $type="", $sort="createdasc" ) {
		global $mainframe, $option, $my, $mosConfig_editor, $comcfg, $Itemid, $database;
		global $mosConfig_lang;
		
		$isadmin = ($my->usertype == "Super Administrator" || $my->usertype == "Administrator") ? 1 : 0;

		$heading_itemid = _JX_ITEMID;
		$heading_itemtitle = _JX_ITEM_TITLE;
		$gotosearch = _JX_GOTOSEARCH;
		$postitem = _JX_POSTITEM;

		if ( $search ) {
			$title = _JX_SEARCH_RESULTS;
			$description = _JX_SEARCH_DESCRIPTION . $totalRows;
			$linkargs = "task=results&search=$search";
		} else {
			$linkargs = "task=list";
			if ( $type == "own" ) {
				$linkargs .= "&type=own";
				$title = _JX_LIST_OWNITEMS;
				$description = _JX_LIST_DESCRIPTION;
			} else {
				$title = _JX_LIST_ITEMS;
				$description = _JX_LIST_DESCRIPTION;
			}
			
		}
		$searchlinkempty = "<a class='jx_functionlink' href='" . sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=search" ) . "'>" . $gotosearch . "</a>";
		$postitemlink = "";
		if ( ( $comcfg['commentformplacement'] != "none" ) && ( $comcfg['postitems'] <= $my->gid ) ) {
			$postitemlink = sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=add" );
		}

		$searchlink = "";
		$searchlink2 = "";
		if ( trim( $search ) ) {
			$searchlink = '<a class="jx_functionlink" href="' . sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=search&search=$search" ) . '">' . _JX_BACKTOSEARCH . '</a>';
			$searchlink2 = '  <tr>
    <td valign="top" class="contentdescription">
      <p><a class="jx_functionlink" href="' . sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=search&search=$search" ) . '">' . _JX_BACKTOSEARCH . '</a></p>
    </td>
  </tr>
';
		}

		$pagenavlimitbox = "";
		$pagenavpageslinks = "";
		$pagenavpagescounter = "";
		if ( $items ) {
			if ( $pageNav ) {
				ob_start();
				$pageNav->writeLimitBox( $link );
				$pagenavlimitbox = ob_get_contents();
				ob_end_clean();
				#$pagenavlimitbox = obeval( "$pageNav->writeLimitBox( $link );" );
				$pagenavpageslinks = $pageNav->writePagesLinks( $link );
				$pagenavpagescounter = $pageNav->writePagesCounter();
			}
			
			$itemlist = "";
			$tabclass = array("sectiontableentry1", "sectiontableentry2");
			$k = 0;
			$itemtmpl = new jxTemplate( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/templates/{$comcfg['template']}" );

			// Create the item posting list
			if ( $itemtmpl->setTemplate( "listitem" ) ) {
				foreach ( $items as $row ) {

					// Set all variables for this row.
					unset( $itemvars );

					// Add some extra values and do some parsing of existing values.
					addExtraValues( $row );

					$itemvars = array();
					$itemvars['tabclass'] = $tabclass[$k];

					// Check if user is admin
					$itemvars['isadmin'] = $isadmin;

					// Check if user is allowed to edit this entry.
					if ( $my->id > 0 && ( $isadmin || 
										  ( $row->created_by == $my->id ) && allowEditItem( $row->created ) ) ) {
						$itemvars['ownitemactionlink_edit'] = sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=edit&id=$row->id" );
						$itemvars['ownitemactionlink_delete'] = sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=delete&id=$row->id" );
					} else {
						$itemvars['ownitemactionlink_edit'] = "";
						$itemvars['ownitemactionlink_delete'] = "";
					}

					// Hide URL or Homepage
					if ( isset( $row->attrib_hideemail )  && $row->attrib_hideemail && !$isadmin ) {
						$row->email = '';
					}
					if ( isset( $row->attrib_hideurl ) && $row->attrib_hideurl && !$isadmin ) {
						$row->url = '';
					}

					// Add all values from row object and configuration.
					addTmplVarsJx( $itemvars, $row );

					// Create the html for the row.
					$itemtmpl->parseTemplate( $itemvars );
					$itemlist .= $itemtmpl->getOutput();
					$k = 1 - $k;
				}
				$templatename = "list";
			} else {
				$templatename = "listempty";
				showError( _JX_ERR_SETTEMPLATE . ": listitem" );
				return;
			}
		} else {
			$templatename = "listempty";
			$itemlist = "";
		}
		
		$link_ownitems_list = "";
		$ownitemaction = false;
		if ( $my->id > 0 ) {
			if ( $type == 'own' ) {
				$ownitemaction = "yes";
			} else {
				$link_ownitems_list = sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=list&type=own" );
			}
		} 

		$tmplvars = array(
			'title' => $title,
			'description' => $description,
			'heading_itemid' => $heading_itemid,
			'heading_itemtitle' => $heading_itemtitle,
			'gotosearch' => $gotosearch,
			'postitem' => $postitem,
			'searchlinkempty' => $searchlinkempty,
			'searchlink' => $searchlink,
			'searchlink2' => $searchlink2,
			'postitemlink' => $postitemlink,
			'pagenavlimitbox' => $pagenavlimitbox,
			'pagenavpageslinks' => $pagenavpageslinks,
			'pagenavpagescounter' => $pagenavpagescounter,
			'itemlist' => $itemlist,
			'totalentries' => $totalRows,
			'sort_itemtitle' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&$linkargs&sort=" . getSortArgJx( "title", $sort ) ),
			'sort_ordering' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&$linkargs&sort=" . getSortArgJx( "ordering", $sort ) ),
			'sort_itemid' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&$linkargs&sort=" . getSortArgJx( "itemid", $sort ) ),
			'sort_created' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&$linkargs&sort=" . getSortArgJx( "created", $sort ) ),
			'link_list' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=list"),
			'link_search' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=search"),
			'ownitemaction' => $ownitemaction,
			'link_ownitems_list' => $link_ownitems_list,
			'total_number_of_entries' => $totalRows,
			);
		mergeArraysJx( $tmplvars, $comcfg, "config_" );

		$tmpl = new jxTemplate( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/templates/{$comcfg['template']}" );
		if ( $tmpl->setTemplate( $templatename ) ) {
			$tmpl->setVars( $tmplvars );
			$tmpl->parseTemplate();
			print $tmpl->getOutput();
		} else {
			showError( _JX_ERR_SETTEMPLATE . ": $templatename" );
		}
	}

	function showThankYou( $msg="", $id="" ) {
		global $mainframe, $option, $my, $mosConfig_editor, $comcfg, $Itemid;
		global $mosConfig_lang;
		if ( !trim( $msg ) ) {
			$msg = _JX_THANKYOU_MESSAGE;
		}

		$tmplvars = array(
			'message' => $msg,
			'id' => $id,
			'link_item' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=view&id=$id" ),
			'link_list' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=list" ),
			'link_ownitems_list' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=list&type=own" ),

			);

		$tmpl = new jxTemplate( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/templates/{$comcfg['template']}" );
		if ( $tmpl->setTemplate( "thankyou" ) ) {
			$tmpl->setVars( $tmplvars );
			$tmpl->parseTemplate();
			print $tmpl->getOutput();
		} else {
			showError( _JX_ERR_SETTEMPLATE . ": thankyou" );
		}

    }

	function show( $row, $showtype="view" ) {
		global $mainframe, $option, $my, $mosConfig_editor, $comcfg, $Itemid;
		global $mosConfig_lang;

		$isadmin = ($my->usertype == "Super Administrator" || $my->usertype == "Administrator") ? 1 : 0;

		$deletebuttons = 0;
		$showtypeview = 0;
		switch ($showtype) {
			case "preview": $heading = _JX_PREVIEW_ITEM . ": " . $row->title; $showtypeview = 0; break;
			case "delete": $heading = _JX_DELETE_ITEM . ": " . $row->title; $deletebuttons = 1; break;
			default: $heading = $row->title; $showtypeview = 1;
		}

		// Check if user is allowed to edit this entry.
		if ( $my->id > 0 && ( $isadmin || 
							  ( $row->created_by == $my->id ) && allowEditItem( $row->created ) ) ) {
			$ownitemactionlink_edit = sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=edit&id=$row->id" );
			$ownitemactionlink_delete = sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=delete&id=$row->id" );
		} else {
			$ownitemactionlink_edit = "";
			$ownitemactionlink_delete = "";
		}
		
		// Hide URL or Homepage
		if ( isset( $row->attrib_hideemail )  && $row->attrib_hideemail && !$isadmin ) {
			$row->email = '';
		}
		if ( isset( $row->attrib_hideurl ) && $row->attrib_hideurl && !$isadmin ) {
			$row->url = '';
		}



		$tmplvars = array(
			'heading' => $heading,
			'_created_formatted' => FormatDateJx( $row->created, $comcfg['dateformat'] ),
			'showtype_view' => $showtypeview,
			'link_list' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=list" ),
			'link_search' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=search" ),
			'deletebuttons' => $deletebuttons,
			'deleteformlink' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=delete&id=" . $row->id ),
			'isadmin' => $isadmin,
			'ownitemactionlink_edit' => $ownitemactionlink_edit,
			'ownitemactionlink_delete' => $ownitemactionlink_delete,
			);
		
		// Add some extra values and do some parsing of existing values.
		addExtraValues( $row );

		// Add all values from row object and configuration.
		addTmplVarsJx( $tmplvars, $row );

		$tmpl = new jxTemplate( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/templates/{$comcfg['template']}" );
		if ( $tmpl->setTemplate( "show" ) ) {
			$tmpl->setVars( $tmplvars );
			$tmpl->parseTemplate();
			print $tmpl->getOutput();
		} else {
			showError( _JX_ERR_SETTEMPLATE . ": show" );
		}
		
	}

	function previewItem( $row ) {
		global $mainframe, $option, $my, $mosConfig_editor, $comcfg, $Itemid;
		global $mosConfig_lang;

		mosMakeHtmlSafe( $row );

		$hiddenvalues = "";
		$forbarr = explodeTrimJx( JXFORBIDDENFIELDS, " " );
		foreach ( get_object_vars( $row ) as $k => $v ) {
			if ( $k != "attribs" && substr( $k, 0, 1 ) != "_" && !in_array( $k, $forbarr ) ) {
				$hiddenvalues .= "  <input type='hidden' name='$k' value='$v' />\n";
			}
		}

		// Send the public and entered private key with the form
		$private_key = mosGetParam( $_REQUEST, 'private_key', '' );
		$public_key = mosGetParam( $_REQUEST, 'public_key', '' );

		$tmplvars = array(
			'Itemid' => $Itemid,
			'hiddenvalues' => $hiddenvalues,
			'link_list' => sefRelToAbs("index.php?option=$option&Itemid=$Itemid&task=list"),
			'link_search' => sefRelToAbs("index.php?option=$option&Itemid=$Itemid&task=search"),
			'private_key' => $private_key,
			'public_key' => $public_key,
			'token' => getSpoofValueJx(),
			);
		
		$tmpl = new jxTemplate( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/templates/{$comcfg['template']}" );
		if ( $tmpl->setTemplate( "preview" ) ) {
			$tmpl->setVars( $tmplvars );
			$tmpl->parseTemplate();
			print $tmpl->getOutput();
		} else {
			showError( _JX_ERR_SETTEMPLATE . ": preview" );
		}


	}

	function editItem ( $row, $lists, $captcha=null, $cansend=null ) {
		global $mainframe, $option, $my, $mosConfig_editor, $comcfg, $Itemid;
		global $mosConfig_lang;

		mosMakeHtmlSafe( $row );

		// Where editor1 = your areaname and content = the field name
		$geteditorcontents = getEditorContentsJx( 'editor1', 'content');

		$editorarea = editorAreaJx( 'editor1', $row->content, 'content', '50', '10' );

		$previewbtn = intval( $comcfg['previewpage'] ) ? "1" : "";
		$savebtn = intval( $comcfg['previewpage'] ) ? "" : "1";

		$guestbooklink = "";
		if ( $comcfg['commentformplacement'] == "firstpage" ) {
			$guestbooklink = sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=list" );
		}

		// CAPTCHA image recognition for spam protection.
		$captcha_display = "";
		$captcha_private = "";
		$incorrectcaptcha = "";
		if ( checkCaptchaJx() && $captcha ) {
			$captcha_display = $captcha->display_captcha(true);
			$captcha_private = $captcha->generate_private();
			if ( $cansend === 2 || $cansend === 0 ) {
				$incorrectcaptcha = _JX_INCORRECT_CAPTCHA;
			}
		} else {
			$comcfg['usecaptcha'] = 0;
		}

		$tmplvars = array(
			'Itemid' => $Itemid,
			'option' => $option,
			'link_list' => sefRelToAbs("index.php?option=$option&Itemid=$Itemid&task=list"),
			'link_search' => sefRelToAbs("index.php?option=$option&Itemid=$Itemid&task=search"),
			'geteditorcontents' => $geteditorcontents,
			'editorarea' => $editorarea,
			'username' => $my->username,
			'previewbtn' => $previewbtn,
			'savebtn' => $savebtn,
			'guestbooklink' => $guestbooklink,
			'captcha_display' => $captcha_display,
			'captcha_private' => $captcha_private,
			'cansend' => intval( $cansend ),
			'incorrectcaptcha' => $incorrectcaptcha,
			'token' => getSpoofValueJx(),
			);

		// Add form object lists.
		mergeArraysJx( $tmplvars, $lists, "list_" );

		// Add a couple of specific extra attributes.
		$row->attrib_hideemail = isset( $row->attrib_hideemail ) ? $row->attrib_hideemail : 0;
		$row->attrib_hideurl = isset( $row->attrib_hideurl ) ? $row->attrib_hideurl : 0;

		// Add default authoralias.		
		if ( !trim( $row->authoralias ) ) {
			$row->authoralias = _JX_GUEST;
		}
	
		// Add all values from row object and configuration.
		addTmplVarsJx( $tmplvars, $row );

		$tmpl = new jxTemplate( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/templates/{$comcfg['template']}" );
		if ( $tmpl->setTemplate( "edititem" ) ) {
			$tmpl->setVars( $tmplvars );
			$tmpl->parseTemplate();
			print $tmpl->getOutput();
		} else {
			showError( _JX_ERR_SETTEMPLATE . ": edititem" );
		}

	}

	function showSearch( $search = "" ) {
		global $mainframe, $option, $my, $mosConfig_editor, $comcfg, $Itemid;
		global $mosConfig_lang;

		$tmplvars = array(
			'Itemid' => $Itemid,
			'search' => $search,
			'link_list' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=list" ),
			'link_search' => sefRelToAbs( "index.php?option=$option&Itemid=$Itemid&task=search" ),
			);
		
		$tmpl = new jxTemplate( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/templates/{$comcfg['template']}" );
		if ( $tmpl->setTemplate( "search" ) ) {
			$tmpl->setVars( $tmplvars );
			$tmpl->parseTemplate();
			print $tmpl->getOutput();
		} else {
			showError( _JX_ERR_SETTEMPLATE . ": search" );
		}
	}

	function showError( $error, $error_header ) {
		global $mainframe, $option, $my, $mosConfig_editor, $comcfg, $Itemid;
		global $mosConfig_lang;

		$tmplvars = array(
			'Itemid' => $Itemid,
			'error' => $error,
			'error_header' => $error_header,
			);

		$tmpl = new jxTemplate( $mainframe->getCfg( 'absolute_path' ) . "/components/$option/templates/{$comcfg['template']}" );
		
		if ( $tmpl->setTemplate( "error" ) ) {
			$tmpl->setVars( $tmplvars );
			$tmpl->parseTemplate();
			print $tmpl->getOutput();
		} else {
			print  _JX_ERR_SETTEMPLATE . ": error";
			print "<br />Original error: $error";
		}
	}

}

