<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#chemicallist" data-toggle="tab"><i class="fas fa-list-ul"></i> <?php echo translate('supplier') . ' ' . translate('list'); ?></a>
			</li>
<?php if (get_permission('chemical_supplier', 'is_add')){ ?>
			<li>
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('create') . ' ' . translate('supplier'); ?></a>
			</li>
<?php } ?>
		</ul>
		<div class="tab-content">
			<div id="chemicallist" class="tab-pane active mb-md">
				<div class="export_title"><?php echo translate('supplier') . " " . translate('list'); ?></div>
				<table class="table table-bordered table-hover table-condensed tbr-top" cellspacing="0" width="100%" id="table-export">
					<thead>
						<tr>
							<th width="60"><?php echo translate('sl'); ?></th>
							<th class="min-w-md"><?php echo translate('supplier') . " " . translate('name'); ?></th>
							<th><?php echo translate('address'); ?></th>
							<th class="min-w-md"><?php echo translate('contact_number'); ?></th>
							<th><?php echo translate('email'); ?></th>
							<th class="min-w-md"><?php echo translate('company_name'); ?></th>
							<th><?php echo translate('product') . " " . translate('list'); ?></th>
							<th class="min-w-md"><?php echo translate('action'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 1;
						if (!empty($supplierlist)) {
							foreach ($supplierlist as $row):
						?>	
						<tr>
							<td><?php echo $count++; ?></td>
							<td><?php echo html_escape($row['name']); ?></td>
							<td><?php echo html_escape($row['address']); ?></td>
							<td><?php echo html_escape($row['mobileno']); ?></td>
							<td><?php echo html_escape($row['email']); ?></td>
							<td><?php echo html_escape($row['company_name']); ?></td>
							<td><?php echo html_escape($row['product_list']); ?></td>
							<td class="min-w-xs">
								<?php if (get_permission('chemical_supplier', 'is_edit')){ ?>
									<a href="<?php echo base_url('inventory/supplier_edit/' . $row['id']); ?>" class="btn btn-circle icon btn-default" data-placement="top" 
									data-toggle="tooltip" data-original-title="<?php echo translate('edit'); ?>"> <i class="fas fa-pen-nib"></i>
									</a>
								<?php 
								};
								if (get_permission('chemical_supplier', 'is_delete')){
								?>
									<?php echo btn_delete('inventory/supplier_delete/' . $row['id']); ?>
								<?php } ?>
							</td>
						</tr>
						<?php endforeach; } ?>
					</tbody>
				</table>
			</div>
<?php if (get_permission('chemical_supplier', 'is_add')){ ?>
			<div id="create" class="tab-pane">
				<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered validate')); ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('supplier') . " " . translate('name'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="supplier_name" value="" required />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('contact_number'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="contact_number" value="" required />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('email'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="email_address" value="" required />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('company_name'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="company_name" value="" required />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('product') . " " . translate('list'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="product_list" value="" required />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('address'); ?></label>
						<div class="col-md-6 mb-md">
							<textarea class="form-control" rows="3" name="address" placeholder="<?php echo translate('address'); ?>"><?php echo set_value('address'); ?></textarea>
						</div>
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-md-offset-3 col-md-2">
								<button type="submit" name="chemical" value="1" class="btn btn-default btn-block">
									<i class="fas fa-plus-circle"></i> <?php echo translate('save'); ?>
								</button>
							</div>
						</div>
					</footer>
				<?php echo form_close(); ?>
			</div>
<?php } ?>
		</div>
	</div>
</section>