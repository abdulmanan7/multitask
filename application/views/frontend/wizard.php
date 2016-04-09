  		<div id="wizard" class="swMain col-xs-12">
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
            <p class="step-desc">
              (Heizkessel, Schornsteinanbindung, Rohrleitungen mit Pumpen/Mischer)
            </p>
            <?php $this->load->view('frontend/uploader');?>
        </div>
        <div id="step-2">
            <h2 class="StepTitle">Schornstein</h2>
<p class="step-desc">
  (Außenansicht Wand mit Putztürchen, Foto damit man ggf. das Innenrohrmaterial erkennen kann - messen Sie bei dieser Gelegenheit den Innendurchmesser und teilen Sie diesen mit)
</p>
            <?php $this->load->view('frontend/uploader');?>

        </div>
        <div id="step-3">
            <h2 class="StepTitle">Brennstoff-Lagerraum </h2>
            <p class="step-desc">(z.B. Heizöltankraum, gibt es Rohrleitungen an der Decke, wo sind ggf. Fenster)</p>
            <?php $this->load->view('frontend/uploader');?>
        </div>
        <div id="step-4">
            <h2 class="StepTitle">Einbringhindernisse </h2>
            <p class="step-desc">
              (Wo muss der Kessel, Pufferspeicher ggf. durch bzw. welche Treppen müssen überwunden werden. Teilen Sie uns jeweils das engste Durchgangsmaß mit sowie die Anzahl der Treppenstufen)
            </p>
            <?php $this->load->view('frontend/uploader');?>
        </div>
        <div id="step-5">
            <h2 class="StepTitle">Montageort der Solaranlage</h2>
            <p class="step-desc">
              (Flachdach, Schrägdach, gibt es Abschattungen?)
            </p>
            <?php $this->load->view('frontend/uploader');?>
        </div>
        <div id="step-6">
            <h2 class="StepTitle">Gebäude, welches beheizt werden soll von außen</h2>
            <p class="step-desc">
              (Außenansichten möglichst von allen Seiten)
            </p>
            <?php $this->load->view('frontend/uploader');?>
        </div>
        <div id="step-7">
            <h2 class="StepTitle">Grundrisse von Ihrem Gebäude</h2>
            <p class="step-desc">
              (z.B. Kellergeschoß mit Markierung Heizraum und Brennstofflager; Für die Solaranlage den Neigungswinkel, Himmelsrichtung, sowie die Dachfläche; Gebäudeschnitt wg. Ermittlung der Schornsteinhöhe sowie der Solarleitung. Alternativ können Sie diese Pläne auch einfach als PDF-Datei hochladen, sofern Ihnen diese bereits vorliegen.)
            </p>
            <?php $this->load->view('frontend/uploader');?>
        </div>
      </div>
<!-- End SmartWizard Content -->