
<?php include('profesoresInfo.php')?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <script language="JavaScript" type="text/javascript" src="FlashTelecomHeader.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../Styles/NuTelecom.css" type="text/css" />
  </head>
  <body>
      
        <table align="center" width="0" border="0">
          <tr>
            <td class="NuTitle" colspan="3"><?php echo $Nombre?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td rowspan="2"><script  language="JavaScript" type="text/javascript" src="FlashTelecomBody.js"></script></td>
            <td>&nbsp;</td>
            <td class="NuParagraph" valign="top" rowspan="2"><?php echo $Detalles?></td>
            <td rowspan="2" valign="top"><?php echo $foto?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4">&nbsp;</td>
          </tr>
          <tr>
            <td class="NuParagraph" colspan="4"><?php echo $Body?></td>
          </tr>
        </table>
  </body>

</html>