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
							<img width="220" height="75" style="float: right;"  src="<?=$logo?>" />
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
					<select class="form-control" name="country" required="required">
						<option value="">Select Land</option>
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
					</select>
				</div>
				<div class="form-group">
					<label class="control-label item-name">Bauobjektadresse:(falls abweichend)</label>
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
							<input name="baujahr_hous" type="text" class="form-control"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Baujahr Ihrer aktuellen Heizung?</label>
						<div class="col-sm-6">
							<input name="baujahr_alte" type="text" class="form-control"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Womit heizen Sie derzeit?</label>
						<div class="col-sm-6">
							<input name="question3" type="text" class="form-control"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-md-8 col-sm-7">Wie hoch ist durchschnittlich Ihr Heizenergieverbrauch ca. pro Jahr?</label>
						<div class="col-sm-5 col-md-4">
							<input style="width: 50%;float: left;" name="question4" type="text" class="form-control"></input>
							<input style="width: 40%; float: left;margin-left: 21px;" name="question_part2" type="text" class="form-control"></input>
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
						<label class="control-label col-sm-6">Wird Ihr Haus wärmegedämmt oder wann ist das ggf. geplant? </label>
						<div class="col-sm-6">
							<input name="question8" type="text" class="form-control"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Wie wird der neue gesamte Wärmebedarf nach der Dämmmaßnahme sein:</label>
						<div class="col-sm-6">
							<input name="question9" type="text" class="form-control" style="width: 76%;float: left;"></input><span style="line-height: 2.7; margin-left: 10px;">kWh / Jahr</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<p class="item-name">Haben Sie schon eine Vorstellung, was Sie benötigen, dann ist hier der richtige Platz für Ihre Beschreibung. Wir freuen uns über Ihre zusätzlichen Informationen. Vielen Dank</p>
					<textarea name="description" class="form-control" rows="8"></textarea>
				</div>
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
</body>
</html>