<?php $this->load->view('template/frontend/header');?>
<div class="row">
	<div class="col-md-12">
		<div class="logo">
			<img style="float: right;"  src="<?=$logo?>" />
		</div>
		<div class="heading pull-left">
			<h4 class="table-head">Ihre persönliche Fotobegehung</h4>
		</div>
	</div>
</div>
<!-- The file upload form used as target for the file upload widget -->
<div class="col-lg-8 question-box effect7 col-lg-offset-2">
	<p ><?=$message?></p>
</div>
<?php $this->load->view('template/frontend/footer');?>
</body>
</html>