<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="<?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?php echo translate('sub_speciality') . " " . translate('list'); ?></a>
			</li>

		</ul>
		<div class="tab-content">
			<div id="list" class="tab-pane <?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<table class="table table-bordered table-hover table-condensed table_default" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th><?php echo translate('sl'); ?></th>
							<!--<th><?php echo translate('icon'); ?></th>-->
							<th><?php echo translate('title'); ?></th>
							<th><?php echo translate('description'); ?></th>
							<!--<th><?php echo translate('action'); ?></th>-->
						</tr>
					</thead>
					<tbody>
						<?php
							$count = 1;
							if (!empty($serviceslist)){
								foreach ($serviceslist as $row):
								?>
						<tr>
							<td><?php echo $count++; ?></td>
							<!--<td class="widget-row-in"><i class="<?php echo $row['icon']; ?>"></i></td>-->
							<td><?php echo strip_tags($row['title']); ?></td>
							<td><?php echo strip_tags($row['description']); ?></td>
							<td class="min-w-xs">
								
									<a href="<?php echo base_url('frontend/services/sub_edit/' . $row['id']); ?>" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?php echo translate('edit'); ?>"> 
										<i class="fas fa-pen-nib"></i>
									</a>
							
									<?php echo btn_delete('frontend/services/sub_delete/' . $row['id']); ?>
								
							</td>
						</tr>
						<?php endforeach; }?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</section>