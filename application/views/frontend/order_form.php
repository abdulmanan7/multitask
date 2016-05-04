<?php $this->load->view('template/frontend/header');?>
<!-- The file upload form used as target for the file upload widget -->
<div class="container">
	<?php $this->load->view('frontend/modals/help');?>
	<?php $this->load->view('frontend/modals/datenschutzbestimmungen');?>
	<?php $this->load->view('frontend/modals/drag_drop_help');?>
	<form id="fileupload" action="<?=base_url('fotobegehung/save')?>" method="POST" enctype="multipart/form-data">
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		<div class="col-xs-12 question-box effect7 col-md-10 col-md-offset-1">
			<div class="row">
				<div class="col-xs-12 top-head">
					<div class="row">
						<div class="col-md-6 logo col-xs-12">
							<img style="float: left;"  src="<?=$logo?>" />
						</div>
						<div class="col-md-6 col-xs-12 top-link">
							<a data-toggle="modal" href='#mdlhelp'>Brauchen Sie Unterstützung?</a>
						</div>
					</div>
				</div>
			</div>
			<div class="heading">
			<h4 class="table-head kill-p-b">Ihre persönliche Fotobegehung</h4>
			</div>
			<span class="top-desc">
				Wir planen sehr gerne Ihre neue Heizungsanlage. Bitte füllen Sie das Formular aus. Am Ende der Seite haben Sie die Möglichkeit, Schritt für Schritt die für die Planung notwendigen Bilder, Zeichnungen oder auch Videos zur Verfügung zu stellen.<br><br>
Sie können damit Ihre Unterlagen sehr schnell und bequem direkt von Ihrem Smartphone, Tablet oder PC zu uns übertragen. Hierdurch ist es uns möglich, Ihr Objekt virtuell zu „besichtigen“, ohne dass jemand vor Ort kommen muss.<br><br>
Für Ihre Zuarbeit bedanken wir uns mit einem <strong>150 € Extra Rabatt auf Ihre neue SOLARvent Pelletheizung.</strong><br>

				<a data-toggle="modal" href='#mdlhelp'>Bei Fragen stehen wir gerne jederzeit zur Verfügung.</a>
			</span>
			<p align="left" class="subheading">Erfassung Ihrer Kundendaten</p>
			<div class="form-group">
				<label class="control-label item-name">Vorname: <span class="text-blood">*</span></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-user"></i>
					</div>
					<input name="vorname" type="text" class="form-control" required="required" />
				</div><!-- /.input group -->
			</div><!-- /.form group -->
			<div class="form-group">
				<label class="control-label item-name">Nachname: <span class="text-blood">*</span></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-user"></i>
					</div>
					<input name="nachname" type="text" class="form-control" required="required" />
				</div><!-- /.input group -->
			</div><!-- /.form group -->
			<div class="form-group">
			</div>
			<div class="form-group">
				<label class="control-label item-name">Straße + Nr.: <span class="text-blood">*</span></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-code-fork" style="font-size: 18px;"></i>
					</div>
					<input name="strabe" type="text" class="form-control" required="required" />
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<label class="control-label item-name">PLZ: <span class="text-blood">*</span></label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-tagas" style="font-size: 18px;">P</i>
							</div>
							<input name="plz" type="text" class="form-control" required="required" />
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<label class="control-label item-name">Ort: <span class="text-blood">*</span></label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-building-o"></i>
							</div>
							<input name="ort" type="text" class="form-control" />
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label item-name">Land: <span class="text-blood">*</span></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-globe"></i>
					</div>
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
						<option value="other">Neues Land hinzufügen</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label item-name">Bauobjektadresse: (falls abweichend)</label>
				<div class="input-group">
					<div class="input-group-addon">
					<i class="fa fa-wrench" aria-hidden="true"></i>
					</div>
				<input name="adresse" type="text" class="form-control" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label item-name">Telefon: <span class="text-blood">*</span></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-phone" style="font-size: 18px;"></i>
					</div>
					<input name="phone" type="text" class="form-control" required="required" />
				</div><!-- /.input group -->
			</div><!-- /.form group -->
			<div class="form-group">
				<label class="control-label item-name">eMail: <span class="text-blood">*</span></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-envelope"></i>
					</div>
					<input name="email" type="text" class="form-control" required="required" />
				</div><!-- /.input group -->
			</div><!-- /.form group -->
			<div class="form-group">
			</div>
			<p align="left" class="subheading">Erfassung Ihrer Objektdaten:</p>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-6">Baujahr von Ihrem Haus? <span class="text-blood">*</span></label>
					<div class="col-sm-6">
						<select required="required" name="baujahr_hous" class="form-control">
							<option value="">Baujahr von Ihrem Haus?</option>
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
					<label class="control-label col-sm-6">Wie alt ist Ihre Heizung? <span class="text-blood">*</span></label>
					<div class="col-sm-6">
						<select required="required" name="baujahr_alte" class="form-control">
							<option value="">Wie alt ist Ihre Heizung?</option>
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
					<label class="control-label col-sm-6">Womit heizen Sie derzeit? <span class="text-blood">*</span></label>
					<div class="col-sm-6">
						<select required="required" id="womit" name="question3" class="form-control">
							<option value="">Womit heizen Sie derzeit?</option>
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
					<label class="control-label col-sm-6">Durchschnittlicher Heizenergieverbrauch pro Jahr? <span class="text-blood">*</span></label>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<input required="required" name="question4" type="text" class="form-control numberOnly" />
								<p class="error"></p>
							</div>
							<div class="col-xs-12 col-md-6">
								<select required="required" name="unit" id="unit" class="form-control">
									<option value="">Welche Einheit?</option>
									<option value="Liter">Liter</option>
									<option value="m³">m³</option>
									<option value="rm">rm</option>
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
					<label class="control-label col-sm-6">Wie viel kW-Leistung hat Ihre aktuelle Heizung? </label>
					<div class="col-sm-6">
						<input name="question5" type="text" class="form-control numberOnly" />
						<p class="error"></p>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-6"><u>Beheizte Wohnfläche</u> in qm? <span class="text-blood">*</span></label>
					<div class="col-sm-6">
						<input required="required" name="question6" type="text" class="form-control numberOnly" />
						<p class="error"></p>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-6">Wie viel Personen leben in Ihrem Haus? <span class="text-blood">*</span></label>
					<div class="col-sm-6">
						<input required="required" name="question7" type="text" class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-6">Wird Ihr Haus wärmegedämmt? Wann? <span class="text-blood">*</span></label>
					<div class="col-sm-6">
						<input required="required" name="question8" type="text" class="form-control" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-6">Wärmebedarf nach der Dämmmaßnahme (kWh / Jahr)?</label>
					<div class="col-sm-6">
								<input name="question9" type="text" class="form-control numberOnly" />
								<p class="error"></p>
					</div>
				</div>
			</div>
			<div class="form-group">
				<p class="item-name">Haben Sie schon eine Vorstellung, was Sie benötigen, dann ist hier der richtige Platz für Ihre Beschreibung. Wir freuen uns über Ihre zusätzlichen Informationen. Vielen Dank</p>
				<textarea name="description" class="form-control" rows="8"></textarea>
			</div>
		</div>
		<div class="col-xs-12 question-box effect7 col-md-10 col-md-offset-1">
			<?php $this->load->view('frontend/wizard');?>
			<!-- The fileinput-button span is used to style the file input field as button -->
			<div class="clearfix"></div>
			<br>
			<p>
			<a data-toggle="modal" href='#datenschutzbestimmungen'>Datenschutzbestimmungen - Fotobegehung
				</a>
			</p>
		</div>
	</form>
</div>
<?php $this->load->view('template/frontend/footer');?>