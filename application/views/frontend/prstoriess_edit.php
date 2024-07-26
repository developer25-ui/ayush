<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li>
				<a href="<?php echo base_url('frontend/prstoriess'); ?>"><i class="fas fa-list-ul"></i> <?php echo translate('prstories') . " " . translate('list'); ?></a>
			</li>
			<li class="active">
				<a href="#edit" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('edit') . " " . translate('prstories'); ?></a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="edit">
			    <?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered')); ?>
					<input type="hidden" name="testimonial_id" value="<?php echo $testimonial['id']; ?>">
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('prstories') . " " . translate('title'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="patient_name" value="<?php echo set_value('prstories_title', $testimonial['patient_name']); ?>" />
							<span class="error"><?php echo form_error('patient_name'); ?></span>
						</div>
					</div>
					<div class="form-group ">
						<label class="col-md-3 control-label">Read More</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="readmore" value="<?php echo $testimonial['readmore']; ?>" />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('description'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<textarea class="ckeditor" name="description" ><?php echo set_value('description', $testimonial['description']); ?></textarea>
							<span class="error"><?php echo form_error('description'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('photo'); ?> <span class="required">*</span></label>
						<div class="col-md-4">
							<input type="hidden" name="old_photo" value="<?php echo $testimonial['image']; ?>">
							<input type="file" name="photo" class="dropify" data-height="150" data-default-file="<?php echo $this->app_lib->get_image_url('prstoriess/' . $testimonial['image']); ?>" />
							<span class="error"><?php echo form_error('photo'); ?></span>
						</div>
					</div>
					<footer class="panel-footer mt-lg">
						<div class="row">
							<div class="col-md-2 col-md-offset-3">
								<button type="submit" class="btn btn-default btn-block" name="save" value="1">
									<i class="fas fa-edit"></i> <?php echo translate('update'); ?>
								</button>
							</div>
						</div>	
					</footer>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>