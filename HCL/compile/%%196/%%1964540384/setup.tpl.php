<?php /* Smarty version 2.6.1, created on 2010-05-14 09:59:35
         compiled from setup.tpl */ ?>
<?php echo '<?'?>
xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Help Center Live - Install / Upgrade</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['lang']['charset']; ?>
" />
<link href="../templates/<?php echo $this->_tpl_vars['conf']['template']; ?>
/css/setup.css" rel="stylesheet" type="text/css" />
</head>
<body>
<br /><br />
<div align="center">
<?php if ($this->_tpl_vars['step'] == '1'): ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post">
  <table cellspaing="0" cellpadding="5" class="border">
    <tr class="dark">
      <td colspan="2"><b><?php echo $this->_tpl_vars['lang']['step1']; ?>
</b></td>
    </tr>
    <tr class="medium">
      <td colspan="2" width="400"><?php echo $this->_tpl_vars['lang']['readme']; ?>
</td>
    </tr>
    <tr class="medium">
      <td><?php echo $this->_tpl_vars['lang']['select_lang']; ?>
:</td>
      <td>
        <select name="language">
        <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['language']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
          <option value="<?php echo $this->_tpl_vars['language'][$this->_sections['i']['index']]['file']; ?>
"<?php if ($this->_tpl_vars['language'][$this->_sections['i']['index']]['file'] == $this->_tpl_vars['lang_file']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['language'][$this->_sections['i']['index']]['name']; ?>
</option>
        <?php endfor; endif; ?>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="hidden" name="one" value="one" /><input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" /> <input type="submit" name="skip" value="<?php echo $this->_tpl_vars['lang']['skip']; ?>
" /></td>
    </tr>
  </table>
</form>
<br /><br />
  <table cellspaing="0" cellpadding="5" width="300" class="border">
    <tr class="dark">
      <td colspan="2"><b><?php echo $this->_tpl_vars['lang']['setup_arrive']; ?>
</b></td>
    </tr>
  </table>
<?php elseif ($this->_tpl_vars['step'] == '2'): ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post" name="two">
  <table cellspaing="0" cellpadding="5" class="border">
    <tr class="dark">
      <td colspan="2"><b><?php echo $this->_tpl_vars['lang']['step2']; ?>
</b></td>
    </tr>
    <tr class="medium">
      <td colspan="2" align="center"><?php echo $this->_tpl_vars['lang']['config_more']; ?>
<br /><?php echo $this->_tpl_vars['lang']['config_manual']; ?>
</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="skip" value="<?php echo $this->_tpl_vars['lang']['skip']; ?>
" /></td>
    </tr>
    <tr class="medium">
      <td colspan="2"><?php echo $this->_tpl_vars['lang']['config_chmod']; ?>
</td>
    </tr>
    <tr class="medium">
      <td colspan="2"><?php echo $this->_tpl_vars['lang']['database']; ?>
:</td>
    </tr>
    <tr class="light">
      <td><?php echo $this->_tpl_vars['lang']['hostname']; ?>
:</td>
      <td><input type="text" name="host" value="localhost" size="20" /></td>
    </tr>
    <tr class="light">
      <td><?php echo $this->_tpl_vars['lang']['database']; ?>
:</td>
      <td><input type="text" name="database" value="" size="20" /></td>
    </tr>
    <tr class="light">
      <td><?php echo $this->_tpl_vars['lang']['username']; ?>
:</td>
      <td><input type="text" name="username" value="" size="20" /></td>
    </tr>
    <tr class="light">
      <td><?php echo $this->_tpl_vars['lang']['password']; ?>
:</td>
      <td><input type="password" name="password" value="" size="20" /></td>
    </tr>
    <tr class="light">
      <td><?php echo $this->_tpl_vars['lang']['prefix']; ?>
:</td>
      <td><input type="text" name="prefix" value="hcl_" size="20" /></td>
    </tr>
    <tr class="medium">
      <td colspan="2"><?php echo $this->_tpl_vars['lang']['installation']; ?>
:</td>
    </tr>
    <tr class="light">
      <td><?php echo $this->_tpl_vars['lang']['url']; ?>
:</td>
      <td><input type="text" name="url" value="<?php echo $this->_tpl_vars['url']; ?>
" size="30" /></td>
    </tr>
    <tr class="light">
      <td><?php echo $this->_tpl_vars['lang']['monitor_traffic']; ?>
:</td>
      <td>
      <select name="monitor_traffic">
        <option value="true"><?php echo $this->_tpl_vars['lang']['monitor_yes']; ?>
</option>
        <option value="false"><?php echo $this->_tpl_vars['lang']['monitor_no']; ?>
</option>
      </td>
    </tr>
    <tr class="light">
      <td><?php echo $this->_tpl_vars['lang']['company_name']; ?>
:</td>
      <td><input type="text" name="company" value="" size="20" /></td>
    </tr>
    <tr class="light">
      <td><?php echo $this->_tpl_vars['lang']['template']; ?>
:</td>
      <td>
        <select name="template">
        <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['template']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
          <option value="<?php echo $this->_tpl_vars['template'][$this->_sections['i']['index']]['dir']; ?>
"<?php if ($this->_tpl_vars['template'][$this->_sections['i']['index']]['dir'] == $this->_tpl_vars['template_dir']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['template'][$this->_sections['i']['index']]['name']; ?>
</option>
        <?php endfor; endif; ?>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="hidden" name="two" value="two" /><input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" /></td>
    </tr>
  </table>
</form>
<?php elseif ($this->_tpl_vars['step'] == '3'): ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post" name="three">
  <table cellspaing="0" cellpadding="5" width="300" class="border">
    <tr class="dark">
      <td colspan="2"><b><?php echo $this->_tpl_vars['lang']['step3']; ?>
</b></td>
    </tr>
    <tr class="medium">
      <td colspan="2"><i><b><?php echo $this->_tpl_vars['lang']['upgrade_warning']; ?>
</b></i></td>
    </tr>
    <tr class="medium">
      <td><?php echo $this->_tpl_vars['lang']['install_upgrade']; ?>
:</td>
      <td>
        <select name="install_upgrade">
          <option value="install"<?php if ($this->_tpl_vars['install_upgrade'] == 'install'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['install']; ?>
</option>
          <option value="upgrade"<?php if ($this->_tpl_vars['install_upgrade'] == 'upgrade'): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['upgrade']; ?>
</option>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="hidden" name="three" value="three" /><input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" /></td>
    </tr>
  </table>
</form>
<?php elseif ($this->_tpl_vars['step'] == '4'): ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post" name="four">
  <table cellspaing="0" cellpadding="5" class="border">
    <tr class="dark">
      <td colspan="2"><b><?php echo $this->_tpl_vars['lang']['step4']; ?>
</b></td>
    </tr>
<?php if ($this->_tpl_vars['install_upgrade'] == 'install'): ?>
    <tr class="medium">
      <td colspan="2"><?php echo $this->_tpl_vars['lang']['install_db']; ?>
</td>
    </tr>
    <tr class="medium">
      <td><?php echo $this->_tpl_vars['lang']['database']; ?>
: </td>
      <td><?php echo $this->_tpl_vars['conf']['database']; ?>
</td>
    </tr>
    <tr class="medium">
      <td><?php echo $this->_tpl_vars['lang']['prefix']; ?>
: </td>
      <td><?php echo $this->_tpl_vars['conf']['prefix']; ?>
</td>
    </tr>
<?php elseif ($this->_tpl_vars['install_upgrade'] == 'upgrade'): ?>
    <tr class="medium">
      <td colspan="2"><?php echo $this->_tpl_vars['lang']['upgrade_db']; ?>
</td>
    </tr>
    <tr class="medium">
      <td><?php echo $this->_tpl_vars['lang']['database']; ?>
: </td>
      <td><?php echo $this->_tpl_vars['conf']['database']; ?>
</td>
    </tr>
<?php endif; ?>
    <tr>
      <td colspan="2" align="center"><input type="hidden" name="four" value="four" /><input type="hidden" name="install_upgrade" value="<?php echo $this->_tpl_vars['install_upgrade']; ?>
" /><input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['submit']; ?>
" /> <input type="submit" name="skip" value="<?php echo $this->_tpl_vars['lang']['skip']; ?>
" /></td>
    </tr>
  </table>
</form>
<?php elseif ($this->_tpl_vars['step'] == '5'): ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post" name="five">
  <table cellspaing="0" cellpadding="5" class="border">
    <tr class="dark">
      <td colspan="2"><b><?php echo $this->_tpl_vars['lang']['step5']; ?>
</b></td>
    </tr>
    <tr class="medium">
      <td colspan="2"><?php echo $this->_tpl_vars['lang']['config_warning']; ?>
</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="hidden" name="five" value="five" /><input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang']['continue']; ?>
" /></td>
    </tr>
    <tr class="medium">
      <td colspan="2"><?php echo $this->_tpl_vars['lang']['config_problems']; ?>
</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="skip" value="<?php echo $this->_tpl_vars['lang']['skip']; ?>
" /></td>
    </tr>
  </table>
</form>
<?php elseif ($this->_tpl_vars['step'] == '6'): ?>
<form action="<?php echo $this->_tpl_vars['_SERVER']['PHP_SELF']; ?>
" method="post" name="six">
  <table cellspaing="0" cellpadding="5" class="border">
    <tr class="dark">
      <td colspan="2"><b><?php echo $this->_tpl_vars['lang']['step6']; ?>
</b></td>
    </tr>
    <tr class="medium">
      <td colspan="2"><b><?php echo $this->_tpl_vars['lang']['setup_warning_login']; ?>
</b></td>
    </tr>
    <tr class="medium">
      <td colspan="2"><?php echo $this->_tpl_vars['lang']['setup_complete']; ?>
</td>
    </tr>
    <tr class="medium">
      <td colspan="2"><?php echo $this->_tpl_vars['lang']['now_login']; ?>
</td>
    </tr>
    <tr class="light">
      <td><?php echo $this->_tpl_vars['lang']['username']; ?>
: </td>
      <td>admin</td>
    </tr>
    <tr class="light">
      <td><?php echo $this->_tpl_vars['lang']['password']; ?>
: </td>
      <td>admin</td>
    </tr>
    <tr class="medium">
      <td colspan="2" align="center"><a href="<?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/"><?php echo $this->_tpl_vars['conf']['url']; ?>
/admin/</a></td>
    </tr>
  </table>
</form>
<?php endif; ?>
</div>
</body>
</html>