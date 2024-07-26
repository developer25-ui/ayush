<?php $currency_symbol = $global_config['currency_symbol']; ?>
<section class="panel">
	<div class="tabs-custom">
		
		<div class="tab-content">
			<div id="list" class="tab-pane <?php echo isset($active_request) ? '' : 'active';  ?>">
				<div class="mb-md">
					<div class="export_title"><?php echo translate('schedule') . " " . translate('list'); ?></div>
					<table class="table table-bordered table-hover table-condensed" cellspacing="0" width="100%" id="table-export">
						<thead>
							<tr>
								<th><?php echo translate('sl'); ?></th>
								<th><?php echo  translate('name'); ?></th>
								<th><?php echo translate('email'); ?></th>
								<th><?php echo translate('mobile'); ?></th>
							
								<!--<th><?php echo translate('experience'); ?></th>-->
								<th><?php echo translate('Position Applied for'); ?></th>
								<th><?php echo translate('CV'); ?></th>
								<th><?php echo translate('date'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$count = 1;
							if(!empty($appointmentlist)) { 
								foreach($appointmentlist as $row):
							?>
							<tr>
								<td><?php echo $count++; ?></td>
								<td><?php echo html_escape($row['name']); ?></td>
								<td><?php echo html_escape($row['email']); ?></td>
								<td><?php echo html_escape($row['mobile']); ?></td>
							
								<td><?php echo html_escape($row['location']); ?></td>
								<td><a href="<?=base_url($row['cv'])?>" target="_blank">CV</td>
								<td><?php echo html_escape(_d($row['created_at'])); ?></td>
								
							</tr>
							<?php endforeach; }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

