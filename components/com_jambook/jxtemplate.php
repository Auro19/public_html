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

class jxTemplate {

	/** @var template Name of template */
	var $template=null;
	/** @var path Complete path to the template file */
	var $path=null;
	/** @var content Original content of template */
	var $content=null;
	/** @var output Parsed template content to be printed */
	var $output=null;
	/** @var vars Variables used for substitution */
	var $vars=null;
	/** @var _tmplpath Internal string with path of template directory */
	var $_tmplpath=null;
	/** @var _patterns Internal array containing pattern for preg_replace */
	var $_patterns=null;
	/** @var _replacements Internal array containing replacement values for preg_replace */
	var $_replacements=null;

	function jxTemplate( $path, $tmpl="" ) {
		if ( file_exists( $path ) ) {
			$this->_tmplpath = $path;
		}
		if ( trim( $tmpl ) ) {
			$this->setTemplate( $tmpl );
		}
	}

	function setTemplate( $tmpl ) {
		$this->template = $tmpl;
		$this->path = "$this->_tmplpath/$this->template.tmpl";
		if ( file_exists( $this->path ) ) {
			$this->content = file_get_contents( $this->path );
			return true;
		} else {
			unset( $this->template );
			unset( $this->path );
			return false;
		}
	}

	function getTemplate() {
		if ( isset( $this->content ) ) {
			return $this->content;
		} else {
			return false;
		}
	}

	function getOutput() {
		if ( isset( $this->output ) ) {
			return stripslashes( $this->output );
		} else {
			return false;
		}
	}

	function setVars( $variables ) {
		unset( $this->vars );
		if ( is_array( $variables ) ) {
			$this->vars = $variables;
			return true;
		} else {
			return false;
		}
	}
	
	function addVar( $key, $val ) {
		if ( trim( $key ) && trim( $val ) ) {
			$this->vars[$key] = $val;
			return true;
		} else {
			return false;
		}
	}

	function getVars() {
		if ( isset( $this->vars ) ) {
			return $this->vars;
		} else {
			return false;
		}
	}

	function parseTemplate( $variables="", $tmpl="" ) {
		if ( $tmpl ) {
			$this->setTemplate( $tmpl );
		}
		if ( $variables ) {
			$this->setVars( $variables );
		}
		if ( isset( $this->content ) ) {
			// Replace all variable values
			$this->_patterns['jxtvalue'] = "/{jxtvalue=([^}]*)}/ie";
			$this->_replacements['jxtvalue'] = "\$this->vars['\\1']";
			// In addition to variables we will also replace any language strings found.
			$this->_patterns['jxtlang'] = "/{jxtlang=([^}]*)}/ie";
			$this->_replacements['jxtlang'] = "constant('\\1')";
			// Show blocks only if a given variable has a value
			$this->_patterns['jxtshowif'] = "#{jxtshowif=([^}]*)}(.*){/jxtshowif}#Usie";
			$this->_replacements['jxtshowif'] = "(\$this->vars['\\1']) ? stripslashes('\\2') : ''";
			// Show blocks if a given variable is empty
			$this->_patterns['jxtshowifnot'] = "#{jxtshowifnot=([^}]*)}(.*){/jxtshowifnot}#Usie";
			$this->_replacements['jxtshowifnot'] = "(\$this->vars['\\1']) ? '' : stripslashes('\\2')";
			$this->output = preg_replace( $this->_patterns, $this->_replacements, $this->content );
			return true;
		} else {
			return false;
		}
	}

}

