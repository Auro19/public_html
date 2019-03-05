<?php /* Smarty version 2.6.1, created on 2010-04-20 18:50:13
         compiled from module.tpl */ ?>
<?php 
    if ($GLOBALS['conf']['safe_mode']) {
        if (!strpos($_GET['file'], '..')) {
            include_once(dirname(__FILE__).'/..'.addslashes($_GET['file']));
        }
    } else {
        if (!strpos($_GET['file'], '..')) {
            include_once(dirname(__FILE__).'/../../..'.addslashes($_GET['file']));
        }
    }
 ?>