<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Smart Wizard 2 - Step Validation Example - a javascript jQuery wizard control plugin</title>

<link href="styles/smart_wizard.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.smartWizard-2.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
    	// Smart Wizard
  		$('#wizard').smartWizard({
        transitionEffect:'slideleft',
        onFinish:onFinishCallback,
        enableFinishButton:true,
        labelNext:"Nächster",
        labelPrevious:"früher",
        labelFinish:"Fertig",
        // btFinish:false
      });

      function onFinishCallback(){
       if(validateAllSteps()){
        $('form').submit();
       }
      }
		});

</script>
</head><body>

<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td>
<form action="#" method="POST">
  <input type='hidden' name="issubmit" value="1">
<!-- Tabs -->
  		<div id="wizard" class="swMain">
  			<ul>
  				<li><a href="#step-1">
                <span class="stepDesc">
                   Schritt 1<br />
                   <small>Heizung</small>
                </span>
            </a></li>
  				<li><a href="#step-2">
                <span class="stepDesc">
                   Schritt 2<br />
                   <small>Schornstein</small>
                </span>
            </a></li>
  				<li><a href="#step-3">
                <span class="stepDesc">
                   Schritt 3<br />
                   <small>Lagerraum</small>
                </span>
             </a></li>
  				<li><a href="#step-4">
                <span class="stepDesc">
                   Schritt 4<br />
                   <small>Einbringung</small>
                </span>
            </a></li>
            <li><a href="#step-5">
                <span class="stepDesc">
                   Schritt 5<br />
                   <small>Solaranlage</small>
                </span>
            </a></li>
            <li><a href="#step-6">
                <span class="stepDesc">
                   Schritt 6<br />
                   <small>Gebäude</small>
                </span>
            </a></li>
            <li><a href="#step-7">
                <span class="stepDesc">
                   Schritt 7<br />
                   <small>Grundriss</small>
                </span>
            </a></li>

  			</ul>
  			<div id="step-1">
            <h2 class="StepTitle">Heizungsraum der bestehenden Anlage</h2>
            <p>
              (Heizkessel, Schornsteinanbindung, Rohrleitungen mit Pumpen/Mischer)
            </p>
        </div>
  			<div id="step-2">
            <h2 class="StepTitle">Schornstein</h2>
<p>
  (Außenansicht Wand mit Putztürchen, Foto damit man ggf. das Innenrohrmaterial erkennen kann - messen Sie bei dieser Gelegenheit den Innendurchmesser und teilen Sie diesen mit)
</p>

        </div>
  			<div id="step-3">
            <h2 class="StepTitle">Brennstoff-Lagerraum </h2>
            (z.B. Heizöltankraum, gibt es Rohrleitungen an der Decke, wo sind ggf. Fenster)
        </div>
  			<div id="step-4">
            <h2 class="StepTitle">Einbringhindernisse </h2>
            <p>
              (Wo muss der Kessel, Pufferspeicher ggf. durch bzw. welche Treppen müssen überwunden werden. Teilen Sie uns jeweils das engste Durchgangsmaß mit sowie die Anzahl der Treppenstufen)
            </p>
        </div>
        <div id="step-5">
            <h2 class="StepTitle">Montageort der Solaranlage</h2>
            <p>
              (Flachdach, Schrägdach, gibt es Abschattungen?)
            </p>
        </div>
        <div id="step-6">
            <h2 class="StepTitle">Gebäude, welches beheizt werden soll von außen</h2>
            <p>
              (Außenansichten möglichst von allen Seiten)
            </p>
        </div>
        <div id="step-7">
            <h2 class="StepTitle">Grundrisse von Ihrem Gebäude</h2>
            <p>
              (z.B. Kellergeschoß mit Markierung Heizraum und Brennstofflager; Für die Solaranlage den Neigungswinkel, Himmelsrichtung, sowie die Dachfläche; Gebäudeschnitt wg. Ermittlung der Schornsteinhöhe sowie der Solarleitung. Alternativ können Sie diese Pläne auch einfach als PDF-Datei hochladen, sofern Ihnen diese bereits vorliegen.)
            </p>
        </div>
  		</div>
<!-- End SmartWizard Content -->
</form>

</td></tr>
</table>

</body>
</html>
