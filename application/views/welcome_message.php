<?php $this->load->view('template/header');?>
<h1>Welcome !</h1>
<div id="body">
	<!-- The file upload form used as target for the file upload widget -->
	<form id="fileupload" action="<?=base_url('upload/do_upload')?>" method="POST" enctype="multipart/form-data">
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		<div class="row fileupload-buttonbar">
			<div class="col-lg-7">
				<table id="main" cellspacing="10" border="0" cellpadding="3">
					<tr>
						<td valign="right">
							<img width="220" height="75" style="float: right;"  src="<?=$logo?>" />
						</td>
					</tr>
				</table>
				<h4 class="table-head" style="padding-bottom:0;">Unterlagen Ihrer „Digitalen Ortsbegehung“</h4>
				<span align="left" class="subheading">Erfassung Ihrer Kundendaten</span>
				<div class="form-group">
					<label class="control-label item-name">Vorname:</label>
					<input name="vorname" type="text" class="form-control"></input>
				</div>
				<div class="form-group">
					<label class="control-label item-name">Nachname:</label>
					<input name="nachname" type="text" class="form-control"></input>
				</div>
				<div class="form-group">
					<label class="control-label item-name">Straße + Nr.:</label>
					<input name="strabe" type="text" class="form-control"></input>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-6">
							<label class="control-label item-name">PLZ:</label>
							<input name="plz" type="text" class="form-control"></input>
						</div>
						<div class="col-xs-6">
							<label class="control-label item-name">Ort:</label>
							<input name="ort" type="text" class="form-control"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label item-name">Bauobjektadresse:(falls abweichend)</label>
					<textarea name="adresse" class="form-control" rows="2"></textarea>
				</div>
				<div class="form-group">
					<label class="control-label item-name">Telefon:</label>
					<input name="phone" type="text" class="form-control"></input>
				</div>
				<div class="form-group">
					<label class="control-label item-name">eMail:</label>
					<input name="email" type="text" class="form-control"></input>
				</div>
				<p align="left" class="subheading">Erfassung Ihrer Objektdaten:</p>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Baujahr von Ihrem Haus?</label>
						<div class="col-sm-6">
							<input name="question1" type="text" class="form-control"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-6">Baujahr Ihrer aktuellen Heizung?</label>
						<div class="col-sm-6">
							<input name="question2" type="text" class="form-control"></input>
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
						<label class="control-label col-sm-8">Wie hoch ist durchschnittlich Ihr Heizenergieverbrauch ca. pro Jahr?</label>
						<div class="col-sm-4">
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
			<input type="checkbox" class="toggle">
			<!-- The global file processing state -->
			<span class="fileupload-process"></span>
		</div>
		<!-- The global progress state -->
		<div class="col-lg-5 fileupload-progress fade">
			<!-- The global progress bar -->
			<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
				<div class="progress-bar progress-bar-success" style="width:0%;"></div>
			</div>
			<!-- The extended global progress state -->
			<div class="progress-extended">&nbsp;</div>
		</div>
	</div>
	<!-- The table listing the files available for upload/download -->
	<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
	<button type="submit" id="submit" class="btn btn-default">Process</button>
</form>
<!-- The blueimp Gallery widget -->
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
</div>
<?php $this->load->view('template/footer');?>
<script>
/*
* jQuery File Upload Plugin JS Example 8.9.1
* https://github.com/blueimp/jQuery-File-Upload
*
* Copyright 2010, Sebastian Tschan
* https://blueimp.net
*
* Licensed under the MIT license:
* http://www.opensource.org/licenses/MIT
*/
/* global $, window */
$(function () {
	'use strict';
// Initialize the jQuery File Upload widget:
$('#fileupload').fileupload({
// Uncomment the following to send cross-domain cookies:
//xhrFields: {withCredentials: true},
// url: 'upload/do_upload'
});
// Enable iframe cross-domain access via redirect option:
$('#fileupload').fileupload(
	'option',
	'redirect',
	window.location.href.replace(
		/\/[^\/]*$/,
		'/cors/result.html?%s'
		)
	);
if (window.location.hostname === 'blueimp.github.io') {
// Demo settings:
$('#fileupload').fileupload('option', {
	url: '//jquery-file-upload.appspot.com/',
// Enable image resizing, except for Android and Opera,
// which actually support image resizing, but fail to
// send Blob objects via XHR requests:
disableImageResize: /Android(?!.*Chrome)|Opera/
.test(window.navigator.userAgent),
maxFileSize: 5000000,
acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
});
// Upload server status check for browsers with CORS support:
if ($.support.cors) {
	$.ajax({
		url: 'upload/do_upload',
		type: 'HEAD'
	}).fail(function () {
		$('<div class="alert alert-danger"/>')
		.text('Upload server currently unavailable - ' +
			new Date())
		.appendTo('#fileupload');
	});
}
} else {
// Load existing files:
$('#fileupload').addClass('fileupload-processing');
$.ajax({
// Uncomment the following to send cross-domain cookies:
//xhrFields: {withCredentials: true},
url: $('#fileupload').fileupload('option', 'url'),
dataType: 'json',
context: $('#fileupload')[0]
}).always(function () {
	$(this).removeClass('fileupload-processing');
}).done(function (result) {
	var files = result.files;
	for (var i = files.length - 1; i >= 0; i--) {
		var url = files[i].url;
		$('<input>',{
			name:"image[]",
			type:"hidden",
			value:url
		}).appendTo('#fileupload');
	}
	$(this).fileupload('option', 'done')
	.call(this, $.Event('done'), {result: result});
});
}
});
$(document).on('click', '#submit', function(event) {
	// event.preventDefault();
	/* Act on the event */
	$('#fileupload').attr('action', "<?=base_url('reports/get/I')?>");
	$('#fileupload').submit();

});
</script>
</body>
</html>