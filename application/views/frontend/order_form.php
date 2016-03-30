<?php $this->load->view('template/frontend/header');?>
<div id="body">
	<!-- The file upload form used as target for the file upload widget -->
	<form id="fileupload" action="<?=base_url('reports/save')?>" method="POST" enctype="multipart/form-data">
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		<div class="row fileupload-buttonbar ">
			<div class="col-lg-8 question-box effect7 col-lg-offset-2">
				<div class="row">
					<div class="col-md-12">
						<div class="logo">
							<img style="float: right;"  src="<?=$logo?>" />
						</div>
						<div class="heading pull-left">
							<h4 class="table-head" style="padding-bottom:0;">Ihre persönliche Fotobegehung</h4>
						</div>
					</div>
				</div>
				<span align="left" class="subheading">Erfassung Ihrer Kundendaten</span>
				<div class="form-group">
					<label class="control-label item-name">Vorname: <span class="text-blood">*</span></label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
						<input name="vorname" type="text" class="form-control" required="required"></input>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				<div class="form-group">
					<label class="control-label item-name">Nachname: <span class="text-blood">*</span></label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-tag"></i>
						</div>
					<input name="nachname" type="text" class="form-control" required="required"></input>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				<div class="form-group">
				</div>
				<div class="form-group">
					<label class="control-label item-name">Straße + Nr.: <span class="text-blood">*</span></label>
					<input name="strabe" type="text" class="form-control" required="required"></input>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-6">
							<label class="control-label item-name">PLZ: <span class="text-blood">*</span></label>
							<input name="plz" type="text" class="form-control" required="required"></input>
						</div>
						<div class="col-xs-6">
							<label class="control-label item-name">Ort: <span class="text-blood">*</span></label>
							<input name="ort" type="text" class="form-control"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label item-name">Land: <span class="text-blood">*</span></label>
					<select class="form-control" name="country" required="required" id="landSelect">
						<option value="">Land auswählen</option>
						<option value="Deutschland">Deutschland</option>
						<option value="Dänemark">Dänemark</option>
						<option value="Italien">Italien</option>
						<option value="Luxemburg">Luxemburg</option>
						<option value="Niederlande">Niederlande</option>
						<option value="Norwegen">Norwegen</option>
						<option value="Polen">Polen</option>
						<option value="Österreich">Österreich</option>
						<option value="Schweiz">Schweiz</option>
						<option value="Spanien">Spanien</option>
						<option value="Schweden">Schweden</option>
						<option value="other">Other (define your's)</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label item-name">Bauobjektadresse: (falls abweichend)</label>
					<textarea name="adresse" class="form-control" rows="2"></textarea>
				</div>
				<div class="form-group">
					<label class="control-label item-name">Telefon: <span class="text-blood">*</span></label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-tablet"></i>
						</div>
						<input name="phone" type="text" class="form-control" required="required"></input>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				<div class="form-group">
					<label class="control-label item-name">eMail: <span class="text-blood">*</span></label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-envelope"></i>
						</div>
						<input name="email" type="text" class="form-control" required="required"></input>
					</div><!-- /.input group -->
				</div><!-- /.form group -->
				<div class="form-group">
				</div>
				<p align="left" class="subheading">Erfassung Ihrer Objektdaten:</p>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Baujahr von Ihrem Haus?</label>
						<div class="col-sm-6">
						<select name="baujahr_hous" class="form-control">
							<option value="Neubau">Neubau</option>
							<option value="2016 - 2002">2016 - 2002</option>
							<option value="2001 - 1995">2001 - 1995</option>
							<option value="1994 - 1978">1994 - 1978</option>
							<option value="vor 1978">vor 1978</option>
							<option value="unbekannt">unbekannt</option>
						</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Baujahr Ihrer aktuellen Heizung?</label>
						<div class="col-sm-6">
						<select name="baujahr_alte" class="form-control">
							<option value="Keine Heizung vorhanden">Keine Heizung vorhanden</option>
							<option value="1 - 10 Jahre">1 - 10 Jahre</option>
							<option value="11 - 15 Jahre">11 - 15 Jahre</option>
							<option value="16 - 20 Jahre">16 - 20 Jahre</option>
							<option value="20 - 25 Jahre">20 - 25 Jahre</option>
							<option value="Älter als 25 Jahre">Älter als 25 Jahre</option>
							<option value="Ist mir unbekannt">Ist mir unbekannt</option>
						</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Womit heizen Sie derzeit?</label>
						<div class="col-sm-6">
						<select name="question3" class="form-control">
							<option value="überhaupt nicht">überhaupt nicht</option>
							<option value="Erdgas">Erdgas</option>
							<option value="Flüssiggas">Flüssiggas</option>
							<option value="Heizöl">Heizöl</option>
							<option value="Strom">Strom</option>
							<option value="Holz">Holz</option>
							<option value="Kohle / Briketts">Kohle / Briketts</option>
							<option value="Pellets">Pellets</option>
						</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Durchschnittlicher Heizenergieverbrauch pro Jahr?</label>
						<div class="col-sm-6">
							<div class="row">
							<div class="col-xs-6">
									<input name="question4" type="text" class="form-control"></input>
								</div>
								<div class="col-xs-6">
									<select name="unit" class="form-control">
										<option value="">Einheit</option>
										<option value="Liter">Liter</option>
										<option value="m³">m³</option>
										<option value="kWh">kWh</option>
										<option value="kg">kg</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Wie viel kW-Leistung hat Ihre aktuelle Heizung?</label>
						<div class="col-sm-6">
							<input name="question5" type="text" class="form-control"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6"><u>Beheizte Wohnfläche</u> in qm?</label>
						<div class="col-sm-6">
							<input name="question6" type="text" class="form-control"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Wie viel Personen leben in Ihrem Haus? </label>
						<div class="col-sm-6">
							<input name="question7" type="text" class="form-control"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Wird Ihr Haus wärmegedämmt? Wann?</label>
						<div class="col-sm-6">
							<input name="question8" type="text" class="form-control"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Wärmebedarf nach der Dämmmaßnahme?</label>
						<div class="col-sm-6">
							<div class="row">
								<div class="col-xs-6">
									<input name="question9" type="text" class="form-control"></input>
								</div>
								<div class="col-xs-6 text-right">
									kWh / Jahr
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<p class="item-name">Haben Sie schon eine Vorstellung, was Sie benötigen, dann ist hier der richtige Platz für Ihre Beschreibung. Wir freuen uns über Ihre zusätzlichen Informationen. Vielen Dank</p>
					<textarea name="description" class="form-control" rows="8"></textarea>
				</div>
				<p>
					Damit wir Ihre Anlage perfekt gemeinsam mit Ihnen planen können, benötigen wir Ihre Fotobegehung von Ihrem Bauvorhaben. Erstellen Sie mit Ihrem Smartphone, Tablet oder alternativ mit einer Digitalkamera folgende Bilder:
					</p>
				<ul>
					<li>
1) Heizungsraum der bestehenden Anlage: (Heizkessel, Schornsteinanbindung, Rohrleitungen mit Pumpen/Mischer)
					</li>
					<li>
2) Schornstein (Außenansicht Wand mit Putztürchen, Foto damit man ggf. das Innenrohrmaterial erkennen kann - messen Sie bei dieser Gelegenheit den Innendurchmesser und teilen Sie diesen mit)
					</li>
					<li>
						
3) Brennstofflager (z.B. Heizöltankraum, gibt es Rohrleitungen an der Decke, wo sind ggf. Fenster)
					</li>
<li>4) Einbringhindernisse (Wo muss der Kessel, Pufferspeicher ggf. durch bzw. welche Treppen müssen überwunden werden. Teilen Sie uns jeweils das engste Durchgangsmaß mit sowie die Anzahl der Treppenstufen)</li>
<li>5) Wo soll ggf. eine Solaranlage montiert werden (Flachdach, Schrägdach, gibt es Abschattungen?)</li>
<li>6) Zeigen Sie uns das Gebäude welches beheizt werden soll von außen (Außenansichten)</li>
<li>7) Bitte fotografieren Sie Ihre Grundrisse ab (Heizraum, Brennstofflager, für die Solaranlage den Neigungswinkel, Himmelsrichtung, sowie die Dachfläche und den Gebäudeschnitt wg. Schornsteinhöhenermittlung sowie Länge Solarleitung) - alternativ können Sie diese Pläne auch einfach als PDF-Datei hochladen, sofern Ihnen diese bereits vorliegen.</li>
				</ul>
			</div>
			<div class="col-lg-8 question-box effect7 col-lg-offset-2">
				<!-- The fileinput-button span is used to style the file input field as button -->
				<span class="btn btn-success fileinput-button">
					<i class="glyphicon glyphicon-plus"></i>
					<span>Add files...</span>
					<input type="file" name="userfile" multiple>
				</span>
				<button type="submit" class="btn btn-primary start">
					<i class="glyphicon glyphicon-upload"></i>
					<span>Start upload</span>
				</button>
				<button type="reset" class="btn btn-warning cancel">
					<i class="glyphicon glyphicon-ban-circle"></i>
					<span>Cancel upload</span>
				</button>
				<button type="button" class="btn btn-danger delete">
					<i class="glyphicon glyphicon-trash"></i>
					<span>Delete</span>
				</button>
				<!-- <input type="checkbox" class="toggle"> -->
				<!-- The global file processing state -->
				<span class="fileupload-process"></span>
				<!-- The global progress state -->
				<div class="col-lg-5 fileupload-progress fade">
					<!-- The global progress bar -->
					<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
						<div class="progress-bar progress-bar-success" style="width:0%;"></div>
					</div>
					<!-- The extended global progress state -->
					<div class="progress-extended">&nbsp;</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-lg-12">

					<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
				</div>
				<div class="clearfix"></div>
				<button type="submit" id="submit" class="btn btn-default">Process</button>
			</div>
			<!-- The table listing the files available for upload/download -->
			<!-- The container for the uploaded files -->
		</form>
		<!-- The blueimp Gallery widget -->
		<div class="clearfix"></div>
		<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
			<div class="slides"></div>
			<h3 class="title"></h3>
			<a class="prev">‹</a>
			<a class="next">›</a>
			<a class="close">×</a>
			<a class="play-pause"></a>
			<ol class="indicator"></ol>
		</div>
	</div>
	<?php $this->load->view('template/frontend/footer');?>
	<script type="text/javascript">
	$('#landSelect').on('change', function() {
	 var self = $(this);
	 if (self.val() == "other") {
	 	$("<input>",{
	 		type:"text",
	 		name:"country",
	 		value:"",
	 		class:"form-control",
	 		required:"required"
	 	}).appendTo(self.parent('div'));
	 	self.remove();
	 } 
	});
	</script>
</body>
</html>