<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php $basepath = "https://www.solarvent.de/application/uploader/"?>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<base href="https://www.solarvent.de/application/uploader/">
<meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <!-- <meta charset="UTF-8"> -->
    <title>Herzlich Willkommen !</title>
<style>
    html {overflow-x: hidden;}
    body {overflow-x: hidden;}
</style>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.1">
    <!-- <meta name="viewport" content="width=500px"> -->
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="<?=$basepath?>/assets/css/bootstrap.min.css">
    <!-- Generic page styles -->
    <link rel="stylesheet" href="<?=$basepath?>/assets/plugins/upload/css/style.css">

        <link href="<?=$basepath?>/assets/SmartWizard/styles/smart_wizard.css" rel="stylesheet" type="text/css">
        <!-- blueimp Gallery styles -->
        <!-- <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css"> -->
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link rel="stylesheet" href="<?=$basepath?>/assets/plugins/upload/css/jquery.fileupload.css">
        <link rel="stylesheet" href="<?=$basepath?>/assets/plugins/upload/css/jquery.fileupload-ui.css">
        <link href="<?=$basepath?>/assets/fonts/font-awesome.min.css" rel="stylesheet">
        <!-- CSS adjustments for browsers with JavaScript disabled -->
        <noscript>&lt;link rel="stylesheet" href="<?=$basepath?>/assets/plugins/upload/css/jquery.fileupload-noscript.css"&gt;</noscript>
        <noscript>&lt;link rel="stylesheet" href="<?=$basepath?>/assets/plugins/upload/css/jquery.fileupload-ui-noscript.css"&gt;</noscript>
        <script src="<?=$basepath?>/assets/plugins/upload/js/jquery.js"></script>
    <script type="text/javascript">
       var base = "<?=$basepath?>/";
       function baseUrl(url){
        return base+url;
    }
    $(document).ready(function(){
        // Smart Wizard
        $('#wizard').smartWizard({
            transitionEffect:'slideleft',
            onFinish:onFinishCallback,
            onShowStep:onShowStepCallback,
            enableFinishButton:true,
            labelNext:"weiter",
            enableAllSteps:true,
            labelPrevious:"früher",
            labelFinish:"Formular jetzt absenden",
            includeFinishButton: false,
            btFinish:false
        });
        function onFinishCallback(){
            $('#fileupload').submit();
        }
        function onShowStepCallback(obj){
            currentStep = $(obj.attr('href'));
            currentStep.addClass('FocusedStep');
            currentStep.siblings().removeClass('FocusedStep');
            $('#fileupload').fileupload("option","filesContainer",$(".FocusedStep").find("tbody.files"));
            if (obj.attr('href') == "#step-1") {
                $('.buttonNext').css('display', 'block');
                $('.buttonPrevious').css('display', 'none');
                $('#submit').css('display', 'none');
            }else if(obj.attr('href') == "#step-7"){
                $('.buttonNext').css('display',"none");
                $('.buttonPrevious').text("zurück").css('display', 'block');;
                if ($('#submit').length==0) {
                   var finish = $("<button>",{
                    id:"submit",
                    class:"btn btn-success",
                    type:"submit",
                    text:"Formular jetzt absenden !"
                }).insertAfter(".actionBar .loader");
               }else{
                $('#submit').css('display', 'block');
            }
        }
        else{
            $('.buttonNext').text('weiter').css('display', 'block');
            $('.buttonPrevious').text("zurück").css('display', 'block');;
            $('#submit').css('display', 'none');
        }
    }
});
</script>
<link rel="stylesheet" href="<?=$basepath?>/assets/css/fcustom.css">
</head>
<body><!-- The file upload form used as target for the file upload widget -->
<div class="container">
	<div class="modal fade" id="mdlhelp">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title text-center">Wir unterstützen Sie gerne !</h4>
			</div>
			<div class="modal-body help-modal">
				<h4>
					Sie haben verschiedene Möglichkeiten uns zu kontaktieren.
				</h4>
				<br>
				<table class="table table-hover">
					<tbody>
						<tr>
							<td><strong>Telefon</strong> </td>
							<td>0 53 82 / 70 42 55 0</td>
						</tr>
						<tr>
							<td><strong>Chat</strong> </td>
							<td><a data-toggle="modal" href="#mdlchat">Onlinechat jetzt starten</a></td>
						</tr>
						<tr>
							<td><strong>Support</strong> </td>
							<td><a href="https://my.iqtouch.de/ticket/" target="_blank">Kundendienst kontaktieren</a></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="mdlchat">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
			<iframe src="https://tawk.to/aac54cfbcb79cb6ffd8f1372652d063c86099da0/popout/default/?$_tawk_popout=true&amp;$_tawk_sk=5707d14e413caa82a56231fe&amp;$_tawk_tk=fcc7f01aa26a825b05ef65cf17b390eb&amp;v=463" width="100%" height="320" frameborder="0"></iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
			</div>
		</div>
	</div>
</div>	<div class="modal fade" id="datenschutzbestimmungen">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title text-center">Datenschutzbestimmungen</h4>
			</div>
			<div class="modal-body model-fixed">
<div class="row">
<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12">
							<div class="heading pull-left">
							<h4 class="table-head">Datenschutzbestimmungen - Fotobegehung</h4>
							</div>
						</div>
					</div>
					</div>
				</div>
<div class="content">
<p>Die SOLARvent Biomasse-Heizsysteme GmbH, nachstehend Anbieter genannt, geht mit Ihren persönlichen Daten sehr vertraulich und verantwortungsvoll um. Die nachfolgende Datenschutzerklärung gibt Ihnen einen Überblick, was auf unserem Webservice mit Ihren Daten passiert und welchen Schutz wir Ihnen bieten.
</p>
<div class="media">
	<div class="media-body">
		<h4 class="media-heading">Gegenstand der Datenschutzerklärung</h4>
		<p>Diese Datenschutzerklärung bezieht sich auf die Daten, die Sie uns durch die Nutzung unserer online Fotobegehung bekannt geben und soll Sie informieren, wie wir mit Ihren Daten umgehen.</p>
	</div>
</div>

<div class="media">
	<div class="media-body">
		<h4 class="media-heading">Weitergabe Ihrer Daten</h4>
		<p>Sämtliche Daten, die wir von Ihnen erhalten haben, werden nicht an Dritte weitergegeben.</p>
	</div>
</div>

<div class="media">
	<div class="media-body">
		<h4 class="media-heading">Ihre persönlichen Daten</h4>
		<p>
Zur Planung Ihrer neuen Pelletheizung / Solaranlage benötigen wir Ihre Unterlagen, welche Sie mit dieser online Fotobegehung sehr schnell und einfach erfassen und übertragen können. Sie verschaffen uns hierdurch einen guten Eindruck von Ihrem Bauvorhaben, damit wir Ihnen ein bestmögliches Angebot unterbreiten können.</p>
	</div>
</div>

<div class="media">
	<div class="media-body">
		<h4 class="media-heading">Cookies</h4>
		<p>
Cookies sind kleine Dateien die auf Ihrem Endgerät gespeichert werden. Diese sind im Internetverkehr üblich und werden von den meisten Webseiten ebenfalls verwendet. Diese Cookies sind keine Viren und Ihr Endgerät wird auch nicht angegriffen oder ausspioniert. Diese Cookies sind aus technischen Gründen erforderlich. Ohne diese Cookies wird z.B. die Fotobegehung nicht einwandfrei funktionieren können.</p>
	</div>
</div>

<div class="media">
	<div class="media-body">
		<h4 class="media-heading">Bearbeitung und Löschung Ihrer Daten</h4>
		<p>
Die Daten werden von uns zum Zweck der Planung und Angebotserstellung gespeichert. Wenn Sie irgendwann mal die vollständige Löschung Ihrer Daten wünschen, so bitten wir Sie um Ihre Mitteilung an kundendienst@solarvent.de - wir löschen dann umgehend sämtliche persönlichen Daten aus unserem System.</p>
	</div>
</div>

<div class="media">
	<div class="media-body">
		<h4 class="media-heading">Schutz Ihrer Daten</h4>
		<p>
Wir geben Ihre Daten nicht an Dritte weiter. Um Ihre Datensicherheit zu gewährleisten, werden sämtliche Daten zwischen Ihrem Endgerät und unserem Webservice über eine 2048 Bit verschlüsselten SSL Verbindung übertragen. </p>
	</div>
</div>
<div class="media">
	<div class="media-body">
		<h4 class="media-heading">Änderung dieser Datenschutzerklärung </h4>
		<p>
Wir behalten uns das Recht vor, diese Datenschutzerklärung zu ändern.</p>
	</div>
</div>

Stand: April 2016

</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
			</div>
		</div>
	</div>
</div>	<div class="modal fade" id="mdldrag_drop_help">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title text-center">Erklärung der Funktion Drag &amp; Drop</h4>
			</div>
			<div class="modal-body help-modal">
				<h4>
					<u>Erklärung der Funktion Drag &amp; Drop</u>
				</h4>
				<div class="desc">
					Mit der linken Maustaste <strong>die gewünschte Datei</strong> von Ihrem Rechner anklicken und die Maustaste gedrückt halten, dann die Datei (z.B. Bild, PDF, Video) mit der Maus auf unser Ablagefeld verschieben und die Maustaste loslassen. <br>Jetzt wird automatisch die Datei auf unseren Server hochgeladen.<br>
<h4><u>Beispiel:</u></h4>
Datei auswählen, auf das Feld ziehen und loslassen.
				</div>
					<img src="<?=$basepath?>/assets/img/dragdrop.jpg" alt="" style="width: 100%">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
			</div>
		</div>
	</div>
</div>
	<form id="fileupload" action="<?=$basepath?>/fotobegehung/save" method="POST" enctype="multipart/form-data">
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		<div class="col-xs-12 question-box effect7 col-md-10 col-md-offset-1">
			<div class="row">
				<div class="col-xs-12 top-head">
					<div class="row">
						<div class="col-md-6 logo col-xs-12">
							<img style="float: left;" src="<?=$basepath?>/assets/img/small_logo.jpg">
						</div>
						<div class="col-md-6 col-xs-12 top-link">
							<a data-toggle="modal" href="#mdlhelp">Brauchen Sie Unterstützung?</a>
						</div>
					</div>
				</div>
			</div>
			<div class="heading">
			<h4 class="table-head kill-p-b">Ihre persönliche Fotobegehung</h4>
			</div>
			<span class="top-desc">
				Wir planen sehr gerne Ihre neue Heizungsanlage. Bitte füllen Sie das Formular aus. Am Ende der Seite haben Sie die Möglichkeit, Schritt für Schritt die für die Planung notwendigen Bilder, Zeichnungen oder auch Videos zur Verfügung zu stellen.<br>
Sie können damit Ihre Unterlagen sehr schnell und bequem direkt von Ihrem Smartphone, Tablet oder PC zu uns übertragen. Hierdurch ist es uns möglich, Ihr Objekt virtuell zu „besichtigen“, ohne dass jemand vor Ort kommen muss.<br>
Für Ihre Zuarbeit bedanken wir uns mit einem <strong>150 € Extra Rabatt auf Ihre neue SOLARvent Pelletheizung.</strong><br>

				<a data-toggle="modal" href="#mdlhelp">Bei Fragen stehen wir gerne jederzeit zur Verfügung.</a>
			</span>
			<p align="left" class="subheading">Erfassung Ihrer Kundendaten</p>
			<div class="form-group">
				<label class="control-label item-name">Vorname: <span class="text-blood">*</span></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-user"></i>
					</div>
					<input name="vorname" type="text" class="form-control" required="required">
				</div><!-- /.input group -->
			</div><!-- /.form group -->
			<div class="form-group">
				<label class="control-label item-name">Nachname: <span class="text-blood">*</span></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-user"></i>
					</div>
					<input name="nachname" type="text" class="form-control" required="required">
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
					<input name="strabe" type="text" class="form-control" required="required">
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
							<input name="plz" type="text" class="form-control" required="required">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<label class="control-label item-name">Ort: <span class="text-blood">*</span></label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-building-o"></i>
							</div>
							<input name="ort" type="text" class="form-control">
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
				<input name="adresse" type="text" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label item-name">Telefon: <span class="text-blood">*</span></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-phone" style="font-size: 18px;"></i>
					</div>
					<input name="phone" type="text" class="form-control" required="required">
				</div><!-- /.input group -->
			</div><!-- /.form group -->
			<div class="form-group">
				<label class="control-label item-name">eMail: <span class="text-blood">*</span></label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-envelope"></i>
					</div>
					<input name="email" type="text" class="form-control" required="required">
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
								<input required="required" name="question4" type="text" class="form-control numberOnly">
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
						<input name="question5" type="text" class="form-control numberOnly">
						<p class="error"></p>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-6"><u>Beheizte Wohnfläche</u> in qm? <span class="text-blood">*</span></label>
					<div class="col-sm-6">
						<input required="required" name="question6" type="text" class="form-control numberOnly">
						<p class="error"></p>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-6">Wie viel Personen leben in Ihrem Haus? <span class="text-blood">*</span></label>
					<div class="col-sm-6">
						<input required="required" name="question7" type="text" class="form-control">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-6">Wird Ihr Haus wärmegedämmt? Wann? <span class="text-blood">*</span></label>
					<div class="col-sm-6">
						<input required="required" name="question8" type="text" class="form-control">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-6">Wärmebedarf nach der Dämmmaßnahme (kWh / Jahr)?</label>
					<div class="col-sm-6">
								<input name="question9" type="text" class="form-control numberOnly">
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
			  		<div id="wizard" class="swMain col-xs-12">
  			<ul class="anchor">
  				<li><a href="#step-1" class="selected" isdone="1" rel="1">
                <span class="stepDesc">
                   Schritt 1<br>
                   <small>Heizung</small>
                </span>
            </a></li>
  				<li><a href="#step-2" class="done" isdone="1" rel="2">
                <span class="stepDesc">
                   Schritt 2<br>
                   <small>Schornstein</small>
                </span>
            </a></li>
  				<li><a href="#step-3" class="done" isdone="1" rel="3">
                <span class="stepDesc">
                   Schritt 3<br>
                   <small>Lagerraum</small>
                </span>
             </a></li>
  				<li><a href="#step-4" class="done" isdone="1" rel="4">
                <span class="stepDesc">
                   Schritt 4<br>
                   <small>Einbringung</small>
                </span>
            </a></li>
            <li><a href="#step-5" class="done" isdone="1" rel="5">
                <span class="stepDesc">
                   Schritt 5<br>
                   <small>Solaranlage</small>
                </span>
            </a></li>
            <li><a href="#step-6" class="done" isdone="1" rel="6">
                <span class="stepDesc">
                   Schritt 6<br>
                   <small>Gebäude</small>
                </span>
            </a></li>
            <li><a href="#step-7" class="done" isdone="1" rel="7">
                <span class="stepDesc">
                   Schritt 7<br>
                   <small>Grundriss</small>
                </span>
            </a></li>

  			</ul>
      <div id="step-1">
            <h2 class="StepTitle">Heizungsraum der bestehenden Anlage</h2>
            <p class="step-desc">
              Heizkessel, Schornsteinanbindung, Rohrleitungen mit Pumpen/Mischer
            </p>
            	<div class="dropZon col-md-12">
		<p>
			Schieben Sie einfach per <a class="drapDropLink" href="#mdldrag_drop_help" data-toggle="modal"> <strong>Drag &amp; Drop</strong></a> die gewünschten Bilder bzw. Zeichnungen in dieses Feld. <br>Diese werden dann automatisch hochgeladen.Alternativ können Sie die Dateien auch manuell auswählen und hochladen.
		</p>
	</div>
		<div class="btn btn-success fileinput-button">
			<i class="glyphicon glyphicon-plus"></i>
			<span>Dateien manuell auswählen</span>
			<input type="file" name="userfile" multiple="">
		</div>
	<div class="upContainer col-md-12">
		<div class="dragDrop">
			<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
		</div>
	</div>        </div><div id="step-2">
            <h2 class="StepTitle">Schornstein</h2>
<p class="step-desc">
  Außenansicht Wand mit Putztürchen, Foto damit man ggf. das Innenrohrmaterial erkennen kann - messen Sie bei dieser Gelegenheit den Innendurchmesser und teilen Sie diesen mit
</p>
            	<div class="dropZon col-md-12">
		<p>
			Schieben Sie einfach per <a class="drapDropLink" href="#mdldrag_drop_help" data-toggle="modal"> <strong>Drag &amp; Drop</strong></a> die gewünschten Bilder bzw. Zeichnungen in dieses Feld. <br>Diese werden dann automatisch hochgeladen.Alternativ können Sie die Dateien auch manuell auswählen und hochladen.
		</p>
	</div>
		<div class="btn btn-success fileinput-button">
			<i class="glyphicon glyphicon-plus"></i>
			<span>Dateien manuell auswählen</span>
			<input type="file" name="userfile" multiple="">
		</div>
	<div class="upContainer col-md-12">
		<div class="dragDrop">
			<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
		</div>
	</div>
        </div><div id="step-3">
            <h2 class="StepTitle">Brennstoff-Lagerraum </h2>
            <p class="step-desc">z.B. Heizöltankraum, gibt es Rohrleitungen an der Decke, wo sind ggf. Fenster</p>
            	<div class="dropZon col-md-12">
		<p>
			Schieben Sie einfach per <a class="drapDropLink" href="#mdldrag_drop_help" data-toggle="modal"> <strong>Drag &amp; Drop</strong></a> die gewünschten Bilder bzw. Zeichnungen in dieses Feld. <br>Diese werden dann automatisch hochgeladen.Alternativ können Sie die Dateien auch manuell auswählen und hochladen.
		</p>
	</div>
		<div class="btn btn-success fileinput-button">
			<i class="glyphicon glyphicon-plus"></i>
			<span>Dateien manuell auswählen</span>
			<input type="file" name="userfile" multiple="">
		</div>
	<div class="upContainer col-md-12">
		<div class="dragDrop">
			<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
		</div>
	</div>        </div><div id="step-4">
            <h2 class="StepTitle">Einbringhindernisse </h2>
            <p class="step-desc">
              Wo muss der Kessel, Pufferspeicher ggf. durch bzw. welche Treppen müssen überwunden werden. Teilen Sie uns jeweils das engste Durchgangsmaß mit sowie die Anzahl der Treppenstufen
            </p>
            	<div class="dropZon col-md-12">
		<p>
			Schieben Sie einfach per <a class="drapDropLink" href="#mdldrag_drop_help" data-toggle="modal"> <strong>Drag &amp; Drop</strong></a> die gewünschten Bilder bzw. Zeichnungen in dieses Feld. <br>Diese werden dann automatisch hochgeladen.Alternativ können Sie die Dateien auch manuell auswählen und hochladen.
		</p>
	</div>
		<div class="btn btn-success fileinput-button">
			<i class="glyphicon glyphicon-plus"></i>
			<span>Dateien manuell auswählen</span>
			<input type="file" name="userfile" multiple="">
		</div>
	<div class="upContainer col-md-12">
		<div class="dragDrop">
			<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
		</div>
	</div>        </div><div id="step-5">
            <h2 class="StepTitle">Montageort der Solaranlage</h2>
            <p class="step-desc">
              Flachdach, Schrägdach, gibt es Abschattungen?
            </p>
            	<div class="dropZon col-md-12">
		<p>
			Schieben Sie einfach per <a class="drapDropLink" href="#mdldrag_drop_help" data-toggle="modal"> <strong>Drag &amp; Drop</strong></a> die gewünschten Bilder bzw. Zeichnungen in dieses Feld. <br>Diese werden dann automatisch hochgeladen.Alternativ können Sie die Dateien auch manuell auswählen und hochladen.
		</p>
	</div>
		<div class="btn btn-success fileinput-button">
			<i class="glyphicon glyphicon-plus"></i>
			<span>Dateien manuell auswählen</span>
			<input type="file" name="userfile" multiple="">
		</div>
	<div class="upContainer col-md-12">
		<div class="dragDrop">
			<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
		</div>
	</div>        </div><div id="step-6">
            <h2 class="StepTitle">Gebäude, welches beheizt werden soll von außen</h2>
            <p class="step-desc">
              Außenansichten möglichst von allen Seiten
            </p>
            	<div class="dropZon col-md-12">
		<p>
			Schieben Sie einfach per <a class="drapDropLink" href="#mdldrag_drop_help" data-toggle="modal"> <strong>Drag &amp; Drop</strong></a> die gewünschten Bilder bzw. Zeichnungen in dieses Feld. <br>Diese werden dann automatisch hochgeladen.Alternativ können Sie die Dateien auch manuell auswählen und hochladen.
		</p>
	</div>
		<div class="btn btn-success fileinput-button">
			<i class="glyphicon glyphicon-plus"></i>
			<span>Dateien manuell auswählen</span>
			<input type="file" name="userfile" multiple="">
		</div>
	<div class="upContainer col-md-12">
		<div class="dragDrop">
			<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
		</div>
	</div>        </div><div id="step-7">
            <h2 class="StepTitle">Grundrisse von Ihrem Gebäude</h2>
            <p class="step-desc">
              z.B. Kellergeschoß mit Markierung Heizraum und Brennstofflager; Für die Solaranlage den Neigungswinkel, Himmelsrichtung, sowie die Dachfläche; Gebäudeschnitt wg. Ermittlung der Schornsteinhöhe sowie der Solarleitung. Alternativ können Sie diese Pläne auch einfach als PDF-Datei hochladen, sofern Ihnen diese bereits vorliegen.
            </p>
            	<div class="dropZon col-md-12">
		<p>
			Schieben Sie einfach per <a class="drapDropLink" href="#mdldrag_drop_help" data-toggle="modal"> <strong>Drag &amp; Drop</strong></a> die gewünschten Bilder bzw. Zeichnungen in dieses Feld. <br>Diese werden dann automatisch hochgeladen.Alternativ können Sie die Dateien auch manuell auswählen und hochladen.
		</p>
	</div>
		<div class="btn btn-success fileinput-button">
			<i class="glyphicon glyphicon-plus"></i>
			<span>Dateien manuell auswählen</span>
			<input type="file" name="userfile" multiple="">
		</div>
	<div class="upContainer col-md-12">
		<div class="dragDrop">
			<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
		</div>
	</div>        </div></div>
<!-- End SmartWizard Content -->			<!-- The fileinput-button span is used to style the file input field as button -->
			<div class="clearfix"></div>
			<br>
			<p>
			<a data-toggle="modal" href="#datenschutzbestimmungen">Datenschutzbestimmungen - Fotobegehung
				</a>
			<a data-toggle="modal" href="#datenschutzbestimmungen" class="text-left">- impressum</a>
			</p>
		</div>
	</form>
</div>
    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name rawName">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                </button>
                {% } %}
                {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                </button>
                {% } %}
            </td>
        </tr>
        {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    <input type="hidden" name="image[]" value="{%=file.url%}">
                    {% } %}
                </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    {% } else { %}
                    <span>{%=file.name%}</span>
                    {% } %}
                </p>
                {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
                {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                </button>
                {% } %}
            </td>
        </tr>
        {% } %}
    </script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js')?>"></script> -->
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/blueimg/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/blueimg/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/blueimg/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    <script src="<?=$basepath?>/assets/js/bootstrap.min.js"></script>
    <!-- blueimp Gallery script -->
    <!-- <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script> -->
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/jquery.fileupload-audio.js"></script>
    <!-- The File Upload video preview plugin -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/jquery.fileupload-video.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/jquery.fileupload-ui.js"></script>
    <!-- The main application script -->
    <script src="<?=$basepath?>/assets/plugins/upload/js/main.js"></script>
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <script type="text/javascript" src="<?=$basepath?>/assets/SmartWizard/js/jquery.smartWizard-2.0.js"></script>
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
$('body').on('keypress', '.numberOnly', function(e) {
    var self = $(this).parent();
     if (e.which != 8 && e.which != 46 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        // $(this).next('p').html('Error');
        var msg = self.find(".error").html("Es sind nur Zahlen erlaubt").show('1000');
        setTimeout(function() {
            msg.fadeOut('slow');
        }, 2000);
        return false;
    }
});
jQuery(document).ready(function($) {
    var progressBar = '<span class="fileupload-process"></span>'+
                    '<div class="col-xs-5  fileupload-progress fade">'+
            '<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">'+
                '<div class="progress-bar progress-bar-success" style="width:0%;"></div></div>'+
            '<div class="progress-extended">&nbsp;</div></div>';
    $('.actionBar').append(progressBar);
});

$('body').on('change', '#womit', function(event) {
    event.preventDefault();
    /* Act on the event */
    var self = $(this);
    if (self.val()=="Erdgas" || self.val()=="Flüssiggas") {
        $('#unit').val('m³');
    }
    else if (self.val()=="Strom") {
        $('#unit').val('kWh');
    }
    else if (self.val()=="Heizöl") {
        $('#unit').val('Liter');
    }
    else if (self.val()=="Kohle / Briketts" || self.val()=="Pellets") {
        $('#unit').val('kg');
    }
    else if (self.val()=="Holz") {
        $('#unit').val('rm');
    }else{
        $('#unit').val('');
    }
});
</script>
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="assets/plugins/upload/js/cors/jquery.xdr-transport.js"></script>
<![endif]-->

</body></html>