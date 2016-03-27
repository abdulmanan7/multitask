
<div id="infoMessage"><?php echo $message;?></div>
<!-- Left Sidebar Start -->
<div class="left-sidebar">
	<!-- Row Start -->
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="panel panel-primary no-margin">
				<div class="panel-heading">
					<span class="panel-title"><i class="icon ion-clock text-info"></i><?php echo lang('index_heading');?>
						<small><?php echo lang('index_subheading');?></small></span>
						<span class="tools pull-right">
							<?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?>
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
										<th><?php echo lang('index_status_th');?></th>
										<th><?php echo lang('index_action_th');?></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $user): ?>
										<tr>
											<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8');?></td>
											<td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8');?></td>
											<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8');?></td>
											<td>
												<?php foreach ($user->groups as $group): ?>
													<?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'));?><br />
												<?php endforeach?>
											</td>
											<td><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("auth/activate/" . $user->id, lang('index_inactive_link'));?></td>
											<td><?php echo anchor("auth/edit_user/" . $user->id, 'Edit');?></td>
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