<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="<?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?php echo translate('insurance') . " " . translate('TPA'); ?></a>
			</li>
	
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('add') . " " . translate('insurance_TPA'); ?></a>
			</li>
			
		</ul>
		<div class="tab-content">
			<div id="list" class="tab-pane <?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<table class="table table-bordered table-hover table-condensed table_default" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th><?php echo translate('sl'); ?></th>
							<th><?php echo translate('title'); ?></th>
							<th><?php echo translate('description'); ?></th>
							<th><?php echo translate('action'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 1;
						if (!empty($list)) {
							foreach ($list as $row):
								?>
						<tr>
							<td><?php echo $count++; ?></td>
							<td><?php echo $row['page_title']; ?></td>
							<td><?php echo $row['content']; ?></td>
							<td class="min-w-xs">
								
									<a href="<?php echo base_url('frontend/content/insurance_tpa/edit/' . $row['id']); ?>" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?php echo translate('edit'); ?>"> 
										<i class="fas fa-pen-nib"></i>
									</a>
							
									<?php echo btn_delete('frontend/content/insurance_tpa/delete/' . $row['id']); ?>
								
							</td>
						</tr>
						<?php endforeach; }?>
					</tbody>
				</table>
			</div>
	
			<div class="tab-pane <?php echo (isset($validation_error) ? 'active' : ''); ?>" id="create">
			    <?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered')); ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo  translate('title'); ?> </label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="page_title"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('type'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
						    <select class="form-control" name="type" required>
						        <option>Select Type</option>
                                        
                                <option value="1" >Major Insurance Companies</option>
                                <option value="2" >Third Party Administrator (TPA) and Insurance Companies List</option>        
						    </select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('photo'); ?></label>
						<div class="col-md-4">
							<input type="file" name="photo" class="dropify" data-height="150" />
							<span class="error"><?php echo form_error('photo'); ?></span>
						</div>
					</div>
					<div class="form-group <?php if (form_error('content')) echo 'has-error'; ?>">
						<label  class="col-md-3 control-label"><?php echo translate('link'); ?> </label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="content"/>
						</div>
					</div>
					
						</div>
					</div>
					
					
					
					
					
					<footer class="panel-footer mt-lg">
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
								<button type="submit" class="btn btn-default btn-block" name="save" value="1">
									<i class="fas fa-plus-circle"></i> <?php echo translate('save'); ?>
								</button>
							</div>
						</div>	
					</footer>
				<?php echo form_close(); ?>
			</div>
			
		</div>
	</div>
</section>