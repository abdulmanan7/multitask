<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<style type="text/css">
		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }
		#question td.item-head { width: 70%; }
		.input-md { width: 40%;}
		.input-xs { width: 20%; }
		.input-sm { width: 30%; }
		.input-xsm { width: 17.4%; }
		.input-lg { width: 100%; }
		.bold{
			font-weight: bold;
		}
		.form-control{
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
			<td  colspan="2" class="table-head" style="padding-bottom:0;"><h4>Unterlagen Ihrer digitalen Fotobegehung</h4></td>
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
			<td class="item-name form-control" colspan="3"><?=$strabe_nr?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head">PLZ:</td>
			<td class="item-name form-control"><?=$PLZ?></td>
			<td class="item-head">Ort:</td>
			<td class="item-name form-control"><?=$ort?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head">Land:</td>
			<td class="item-name form-control" colspan="3"><?=$land?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head">Bauobjektadresse: (falls abweichend)</td>
			<td class="item-name form-control" colspan="3"> <?=$bauobjektadress?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head">Telefon:</td>
			<td class="item-name form-control"><?=$telefon?></td>
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
			<td class="item-name form-control" colspan="2"><?=$baujahr_hous?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head"> Wie alt ist Ihre Heizung? </td>
			<td class="item-name form-control" colspan="2"><?=$baujahr_alte_heizung?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head">Womit heizen Sie derzeit? </td>
			<td class="item-name form-control" colspan="2"><?=$brennstoff?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head">Wie hoch ist Ihr durchschnittlicher Verbrauch / Jahr?</td>
			<td class="item-name form-control"><?=$verbrauch?></td>
			<td class="item-name form-control"><?=$einheit?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head">Wie viel kW-Leistung hat Ihre aktuelle Heizung? </td>
			<td class="item-name form-control" colspan="2"><?=$leistung_heizung_alt?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head"><u>Beheizte Wohnfläche</u> in qm? </td>
			<td class="item-name form-control" colspan="2"><?=$wohnflache?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head">Wie viel Personen leben in Ihrem Haus? </td>
			<td class="item-name form-control" colspan="2"><?=$personen?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head">Wird Ihr Haus wärmegedämmt oder wann ist das ggf. geplant? </td>
			<td class="item-name form-control" colspan="2"><?=$warmedammung?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head">Wärmebedarf nach der Dämmmaßnahme (kWh/Jahr)::</td>
			<td class="item-name form-control" colspan="2"><?=$warmebedarf_neu?></td>
		</tr>
		<tr class="item-row">
			<td class="item-head" colspan="3">Haben Sie schon eine Vorstellung, was Sie benötigen, dann ist hier der richtige Platz für Ihre Beschreibung. Wir freuen uns über Ihre zusätzlichen Informationen. Vielen Dank</td>
		</tr>
		<tr class="item-row">
			<td class="item-name form-control" height="200" valign="top" colspan="3"><?=$beschreibung?></td>
		</tr>
	</table>
	<?php if ($images != NULL): ?>
	<pagebreak />
	<br>
	<table cellpadding ="5" cellpadding="10">
		<?php foreach ($images as $image): ?>
			<tr>
				<?php foreach ($image as $key => $val): ?>
					<?php if ($val != ""): ?>
						<?php $split = explode("/", $val);
$fileName = $split[count($split) - 1];?>
						<?php $path = str_replace("/pdf/", "/full_size/", $val)?>
						<?php $ext = pathinfo($path, PATHINFO_EXTENSION);?>
						<?php if ($ext == "pdf"): ?>
							<?php $val = load_img('pdf_thumb.png')?>
						<?php elseif ($ext == "mp4" || $ext == "mov" || $ext == "avi" || $ext == "wmv"): ?>
							<?php $val = load_img('media_thumb.png')?>
						<?php else: ?>
							<?php $val = $val;?>
						<?php endif?>
						<td style="border:2px solid black; text-align:center;width:340px;">
							<a href="<?=$path?>" target='_blank'><img src="<?=$val?>" style="height:200px; border-right:5px solid #fff;max-width:340px" /></a>
							<p><?=$orig_names[$key]?></p>
						</td>
					<?php endif?>
				<?php endforeach?>
			</tr>
		<?php endforeach?>
	</table>
	<?php endif?>
	</html>