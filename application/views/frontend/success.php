<?php $this->load->view('template/frontend/header');?>
<div class="col-sm-10 question-box effect7 col-sm-offset-1">
<div class="row">
					<div class="col-xs-12">
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<div class="heading pull-left">
								<h4 class="table-head">Ihre persönliche Fotobegehung</h4>
							</div>
						</div>
						<div class="col-md-6 logo col-xs-12">
							<img style="float: right;"  src="<?=$logo?>" />
						</div>
					</div>
					</div>
				</div>
<div class="content">

	<p ><?=$message?></p>
<div class="action">
	<a type="<?=base_url('reports');?>" class="btn btn-success pull-right">Go Back!</a>
</div>
</div>
</div>
	<?php $this->load->view('template/frontend/footer');?>
</body>
</html>