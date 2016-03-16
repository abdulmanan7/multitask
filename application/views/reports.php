<?php //error_reporting(0);?>
<html>
<head>
	<title>PDF </title>
	<style>
		body {font-size:13px;font-family: Tahoma ,sans-serif, Arial !important; background: #fff; color:#000;}
		.td_head{
			font-weight:bold;
      /*font-size:12px;
      max-width: 100px;
      width: 150px;*/
    }
   .table-head{
   /* margin-top: 31px;
    padding: 11px 0;*/
    font-size: 22px;
  }

  * { margin: 0; padding: 0; }
  table.table-bordered { border-collapse: collapse; }
  table.table-bordered td, table.table-bordered th { border: 1px solid black; padding: 4px; }

  .items { clear: both; width: 100%; margin: 15px 0 0 0; /*border: 1px solid black;*/ }
  .items th { background: #DDD; /*border: 1px solid black;*/}
  /*.items td {border: 1px solid black;}*/
  .items tr.item-row td {vertical-align: top; }
  .items td.item-name { width: 50%; }
 .bold{
   font-weight: bold;
 }
#main{
      width:100%;border-bottom:none;
      margin-bottom: 30px;
    }
</style>
</head>

<body>
	<!-- this is the start of header section-->

  <table class="table-col-12" style="padding-bottom: 0;padding-top:50px: 0;margin-bottom: 0;">
    <tr>
      <td class="table-head" style="padding-bottom:0;">Contrato: $CODE</td>
    </tr>
    <tr>
      <td align="left">Numero Interno:  20160701</td>
    </tr>
  </table>
  <?php foreach ($heading as $key => $subheading): ?>
    <table class="items table-bordered" style="width:100%;">
    <thead>
      <tr>
        <th colspan="2" align="left"><?=str_replace('_', ' ', $key);?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($subheading as $fieldName => $item): ?>
        <tr class="item-row">
          <td class="item-name"><?=str_replace('_', ' ', $fieldName)?></td>
          <td class="item-name"><?=$item?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    </table>
    <?php if ($key=="Multas"): ?>
      <hr style="background:#E3E3E3;margin:30px 0" />
    <?php endif ?>
  <?php endforeach ?>
      <hr style="background:#E3E3E3;margin:40px 0 10px 0" />
  <table style="font-weight: bold">
    <tbody>
      <tr><td>Pagina: <?=$Pagina?></td></tr>
      <tr><td>Sitio: <?=$Sitio?></td></tr>
      <tr><td>Facebook: <?=$Facebook?></td></tr>
      <tr><td>Twitter: <?=$Twitter?></td></tr>
    </tbody>
  </table>
</body>
</html>