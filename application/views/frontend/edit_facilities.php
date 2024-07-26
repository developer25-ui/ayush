<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
		
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('edit') . " " . translate('facility'); ?></a>
			</li>

		</ul>
		<div class="tab-content">
		
	
			<div class="tab-pane active" id="create">
			    <?php echo form_open_multipart(base_url('frontend/content/facilities/update/'.$list['id']), array('class' => 'form-horizontal form-bordered')); ?>
			        
				<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('title'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="title" value="<?=$list['title']?>" />
						</div>
					</div>
					
					
					<div class="form-group">
						<label class="col-md-3 control-label">Facility Type</label>
						<div class="col-md-6">
						    <select class="form-control" name="type" required>
						                <option selected disabled hidden>Select Facility</option>
                                        
                                        <option value="Medical Facilities" <?php if($list['type'] == "Medical Facilities") echo "selected";?>>Medical Facilities</option>
                                        <option value="Patient Facilities" <?php if($list['type'] == "Patient Facilities") echo "selected";?>>Patient Facilities</option>
                                        <option value="Speciality Clinics" <?php if($list['type'] == "Speciality Clinics") echo "selected";?>>Speciality Clinics</option>
                                        </select>
						</div>
					</div>
				
					
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('icon'); ?></label>
						<div class="col-md-4">
							<input type="file" name="icon" class="dropify" data-height="150" data-default-file="<?=base_url($list['icon']); ?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('icon_white'); ?></label>
						<div class="col-md-4">
							<input type="file" name="icon_white" class="dropify" data-height="150" data-default-file="<?=base_url($list['icon_white']) ?>"/>
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