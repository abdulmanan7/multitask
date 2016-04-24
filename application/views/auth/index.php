
<div class="left-sidebar">
	<!-- Row Start -->
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="panel panel-primary no-margin">
				<div class="panel-heading">
					<span class="panel-title"><i class="icon ion-clock text-info"></i><?php echo lang('index_heading');?>
						<small><?php echo lang('index_subheading');?></small></span>
						<span class="tools pull-right">
						<span class="tools pull-right" style="margin-top: -7px;">
							<?php echo anchor('auth/create_user', "<i class='fa fa-plus'></i> Benutzer", "class='btn btn-sm btn-success'")?> | <?php echo anchor('auth/create_group', "<i class='fa fa-plus'></i> Gruppe", "class='btn btn-sm btn-info'")?>
						</span>
					</div>
					<div class="panel-body">
						<div id="beautify_dt" class="example_alt_pagination">
							<table class="table table-hover dtable">
								<thead>
									<tr>
										<th><?php echo lang('index_fname_th');?></th>
										<th><?php echo lang('index_lname_th');?></th>
										<th><?php echo lang('index_email_th');?></th>
										<th><?php echo lang('index_groups_th');?></th>
										<!-- // <th><?php echo lang('index_status_th');?></th> -->
										<th><?php echo lang('index_action_th');?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $user): ?>
										<tr>
											<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8');?></td>
											<td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8');?></td>
											<td width="200px"><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8');?></td>
											<td>
												<?php foreach ($user->groups as $group): ?>
													<?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'));?><br />
												<?php endforeach?>
											</td>
											<td><?php echo anchor("auth/edit_user/" . $user->id, "<i class='fa fa-pencil-square-o' aria-hidden='true'></i>", "class='btn btn-warning btn-sm'");?>
											  <?php echo anchor("auth/delete/" . $user->id, "<i class='fa fa-trash-o' aria-hidden='true'></i>", "class='btn btn-danger del btn-sm'");?></td>
										</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div><!--widget body end -->
				</div><!--widget end -->
			</div>
		</div>  <!-- Row End -->
	</div>
            <!-- Left Sidebar End-->