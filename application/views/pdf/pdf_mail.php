<?php error_reporting(1);?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<style type="text/css">
		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }
		/*.table-head{
			font-size: 26px;
		}*/

		/** { margin: 0; padding: 0; }*/
		/*table { border-collapse: collapse; font-weight: bold;}*/
		/*table td, table th { border: 1px solid black;}*/

	/*#items { clear: both; width: 100%; margin: 30px 0 0 0; /*border: 1px solid black; }*/
/*#items th { background: #DDD; /*border: 1px solid black;}*/
/*#items td {border: 1px solid black;}*/
/*#items tr.item-row td { border: 0; vertical-align: top; }*/
#question td.item-head { width: 75%; }
/*#question td.item-name { text-align: right;width: 30%}*/
.input-md { width: 40%;}
.input-xs { width: 20%; }
.input-sm { width: 30%; }
.input-xsm { width: 17.4%; }
.input-lg { width: 100%; }
.bold{
	font-weight: bold;
}
/*#main{
	width:100%;border-bottom:none;
	margin-bottom: 80px;
}*/
.form-control{
	background-color: #FFFFAB;
	padding: 4px 6px;
	border: 1px solid #656565;
}
.bg-yellow
{
	background-color: #FFFFAB;
	padding: 5px 2px;
	border:thin solid gray;
}
.subheading{
	text-decoration: underline;
	font-weight: bold;
	font-size: 14px;
	padding: 10px 0 0 0;
}
.logo{
	font-size: 40px;
	padding: 50px 10px;
	background-color: #DDD;
}
.mar50{
	padding-top: 70px;
}
.text-right{
	text-align: right;
}
td{
	overflow: hidden;
}
table{border-collapse:separate;
border-spacing:0.5em;}
</style>
</head>
<table class="mar50" cellspacing="3">
	<tr>
		<td  colspan="2" class="table-head" style="padding-bottom:0;"><h4>Unterlagen Ihrer „Digitalen Ortsbegehung“</h4></td>
	</tr>
	<tr>
		<td align="left" class="subheading">Erfassung Ihrer Kundendaten </td>
		<td align="right"><span class="text-right"><code><Datum></code></span> </td>
	</tr>
</table>
<table id="items" width="100%">
	<tr class="item-row">
		<td class="item-head">Vorname:</td>
		<!-- <td class="item-name"><input name="vorname" value="<?=$vorname?>" type="text" class="form-control input-md"></input></td> -->
		 <td class="item-name form-control input-md"><?=$vorname?></td>
				<td class="item-head">Nachname:</td>
		<td class="item-name input-md form-control"><?=$nachname?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Straße + Nr.:</td>
		<td class="item-name form-control" colspan="3"><?=$strabe?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">PLZ:</td>
		<td class="item-name form-control"><?=$plz?></td>
		<td class="item-head">Ort:</td>
		<td class="item-name form-control"><?=$ort?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Land:</td>
		<td class="item-name form-control" colspan="3"><?=$country?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Bauobjektadresse:(falls abweichend)</td>
		<td class="item-name form-control" colspan="3"><?=$adresse?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Telefon:</td>
		<td class="item-name form-control"><?=$phone?></td>
		<td class="item-head">eMail:</td>
		<td class="item-name form-control"><?=$email?></td>
	</tr>
</table>
<table class="table-col-12">
	<tr>
		<td align="left" class="subheading">Erfassung Ihrer Objektdaten:</td>
	</tr>
</table>
<table id="question" border="0" width="100%" class="question">
	<tr class="item-row">
		<td class="item-head">Baujahr von Ihrem Haus? </td>
		<td class="item-name form-control" colspan="2"><?=$question1?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Baujahr Ihrer aktuellen Heizung? </td>
		<td class="item-name form-control" colspan="2"><?=$question2?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Womit heizen Sie derzeit? </td>
		<td class="item-name form-control" colspan="2"><?=$question3?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Wie hoch ist durchschnittlich Ihr Heizenergieverbrauch ca. pro Jahr?</td>
		<td class="item-name form-control"><?=$question4?></td>
		<td class="item-name form-control"><?=$question_part2?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Wie viel kW-Leistung hat Ihre aktuelle Heizung? </td>
		<td class="item-name form-control" colspan="2"><?=$question5?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head"><u>Beheizte Wohnfläche</u> in qm? </td>
		<td class="item-name form-control" colspan="2"><?=$question6?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Wie viel Personen leben in Ihrem Haus? </td>
		<td class="item-name form-control" colspan="2"><?=$question7?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Wird Ihr Haus wärmegedämmt oder wann ist das ggf. geplant? </td>
		<td class="item-name form-control" colspan="2"><?=$question8?></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Wie wird der neue gesamte Wärmebedarf nach der Dämmmaßnahme sein:</td>
		<td class="item-name form-control" valign="top"><?=$question9?></td>
		<td class="item-name ">kWh / Jahr</td>
	</tr>
	<tr class="item-row">
		<td class="item-head" colspan="3">Haben Sie schon eine Vorstellung, was Sie benötigen, dann ist hier der richtige Platz für Ihre Beschreibung. Wir freuen uns über Ihre zusätzlichen Informationen. Vielen Dank</td>
	</tr>
	<tr class="item-row">
		<td class="item-name form-control" height="100" valign="top" colspan="3"><?=$description?></td>
	</tr>
</table>
<pagebreak />
<table cellpadding ="5" cellpadding="10">

<?php foreach ($images as $image): ?>

	<tr>
 <?php foreach ($image as $val): ?>
<?php if ($val != ""): ?>
		<td style="border:2px solid black; text-align:center;" width="100%" >
			<img src="<?=$val?>" width="350" height="250" style="border-right:5px solid #fff;" />
		</td>
<?php endif?>
 <?php endforeach?>
	</tr>
<?php endforeach?>
</table>
</html>