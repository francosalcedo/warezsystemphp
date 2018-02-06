<?php
$f = @file_get_contents('http://pagina-del-dia.euroresidentes.es/chiste-del-dia/gadget-chiste-del-dia.php');
$f = explode('bgcolor="#FFFFFF">', $f);
$f = explode('</tr>', $f[1]);
$f = $f[0];
?>
<div style="width:100%;padding:30px;font-size:20px;text-align:center;background-color:rgb(56, 138, 179); color: white;">
  <?php echo $f; ?>
</div>
