	<div class="upContainer col-md-12">
		<div class="dragDrop container">
			Datei einfach per Drag & Drop in dieses Fenster
			ziehen, oder den Button „Datei hinzufügen“ drücken.
		<span class="btn btn-success fileinput-button" style="padding-left: 20px">
			<i class="glyphicon glyphicon-plus"></i>
			<span>Datei hinzufügen</span>
			<input type="file" name="userfile" multiple>
		</span>
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
			<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
		</div>
	</div>