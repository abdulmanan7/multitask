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
		.table-head{
			font-size: 26px;
		}

		* { margin: 0; padding: 0; }
		/*table { border-collapse: collapse; }*/
		/*table td, table th { border: 1px solid black; padding: 5px; }*/

	#items { clear: both; width: 100%; margin: 30px 0 0 0; /*border: 1px solid black;*/ }
#items th { background: #DDD; /*border: 1px solid black;*/}
/*#items td {border: 1px solid black;}*/
#items tr.item-row td { border: 0; vertical-align: top; }
#question td.item-head { width: 70%; }
#items td.item-name { text-align: right;}
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
}
.bg-yellow
{
	background-color: #FFFFAB;
	padding: 5px 2px;
	border:thin solid gray;
}
input{
	background: #FFFFAB;

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
<table id="items" border="0" cellspacing="5">
	<tr class="item-row">
		<td class="item-head">Vorname:</td>
		<td class="item-name"><input name="vorname" type="text" class="form-control input-md"></input></td>
		<td class="item-head">Nachname:</td>
		<td class="item-name"><input name="nachname" type="text" class="input-md form-control"></input></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Straße + Nr.:</td>
		<td class="item-name" colspan="3"><input name="strabe" type="text" style="width: 94%;" class="bg-yellow"></input></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">PLZ:</td>
		<td class="item-name"><input name="plz" type="text" class="form-control input-md"></input></td>
		<td class="item-head">Ort:</td>
		<td class="item-name"><input name="ort" type="text" class="form-control input-md"></input></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Bauobjektadresse:(falls abweichend)</td>
		<td class="item-name" colspan="3"><textarea name="adresse" style="width: 95%;" rows="2"></textarea></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Telefon:</td>
		<td class="item-name"><input name="phone" type="text" class="form-control input-md"></input></td>
		<td class="item-head">eMail:</td>
		<td class="item-name"><input name="email" type="text" class="form-control input-md"></input></td>
	</tr>
</table>
<table class="table-col-12">
	<tr>
		<td align="left" class="subheading">Erfassung Ihrer Objektdaten:</td>
	</tr>
</table>
<table id="question" border="0" width="100%" class="question" cellpadding ="1">
	<tr class="item-row">
		<td class="item-head">Baujahr von Ihrem Haus? </td>
		<td class="item-name"><input name="question1" type="text" class="input-sm"></input></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Baujahr Ihrer aktuellen Heizung? </td>
		<td class="item-name"><input name="question2" type="text" class="input-sm"></input></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Womit heizen Sie derzeit? </td>
		<td class="item-name"><input name="question3" type="text" class="input-sm"></input></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Wie hoch ist durchschnittlich Ihr Heizenergieverbrauch ca. pro Jahr?</td>
		<td class="item-name"><input name="question4" style="width: 17.4%" type="text"><input name="question_part2" type="text"></input></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Wie viel kW-Leistung hat Ihre aktuelle Heizung? </td>
		<td class="item-name"><input name="question5" type="text" class="input-xsm"></input></td>
	</tr>
	<tr class="item-row">
		<td class="item-head"><u>Beheizte Wohnfläche</u> in qm? </td>
		<td class="item-name"><input name="question6" type="text" class="input-xsm"></input></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Wie viel Personen leben in Ihrem Haus? </td>
		<td class="item-name"><input name="question7" type="text" class="input-xsm"></input></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Wird Ihr Haus wärmegedämmt oder wann ist das ggf. geplant? </td>
		<td class="item-name"><input name="question8" type="text" class="input-sm"></input></td>
	</tr>
	<tr class="item-row">
		<td class="item-head">Wie wird der neue gesamte Wärmebedarf nach der Dämmmaßnahme sein:</td>
		<td class="item-name"><input name="question9" type="text" style="width: 15%"><span style="padding-left: 10px;">          kWh / Jahr</span></td>
	</tr>
	<tr class="item-row">
		<td class="item-head" colspan="2">Haben Sie schon eine Vorstellung, was Sie benötigen, dann ist hier der richtige Platz für Ihre Beschreibung. Wir freuen uns über Ihre zusätzlichen Informationen. Vielen Dank</td>
	</tr>
	<tr class="item-row">
		<td class="item-name" colspan="2"><textarea name="description" class="input-lg" rows="8"></textarea></td>
	</tr>
</table>
<pagebreak />
<table cellpadding ="5" cellpadding="10">
	<tr>
		<td style="border:2px solid black; text-align:center;" width="100%" >
			<img src="assets/img/pic1.jpg" width="350" height="250" style="border-right:5px solid #fff;" />
		</td>
		<td style="border:2px solid black; text-align:center;" width="100%" >
			<img src="assets/img/pic1.jpg" width="350" height="250" style="border-right:5px solid #fff;" />
		</td>
	</tr>
	<tr>
		<td style="border:2px solid black; text-align:center;" width="100%" >
			<img src="assets/img/pic1.jpg" width="350" height="250" style="border-right:5px solid #fff;" />
		</td>
		<td style="border:2px solid black; text-align:center;" width="100%" >
			<img src="assets/img/pic1.jpg" width="350" height="250" style="border-right:5px solid #fff;" />
		</td>
	</tr>
</table>
</html>