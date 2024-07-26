<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
		
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('chairman'); ?></a>
			</li>

		</ul>
		<div class="tab-content">
		
	
			<div class="tab-pane active" id="create">
			    <?php echo form_open_multipart(base_url('employee/chairman'), array('class' => 'form-horizontal form-bordered')); ?>
			        
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo  translate('name'); ?> </label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name" value="<?=$content['name']?>"/>
						</div>
					</div>
					
				    <div class="form-group">
						<label class="col-md-3 control-label"><?php echo  translate('designation'); ?> </label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="designation" value="<?=$content['designation']?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<label for="input-file-now" class="col-md-3 control-label"><?php echo translate('image'); ?></label>
						<div class="col-md-6">
						    <input type="file" name="image" class="dropify" data-allowed-file-extensions="jpg png" data-height="120" />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('message'); ?> </label>
						<div class="col-md-6">
							<textarea class="form-control ckeditor" name="message" placeholder="" rows="3" ><?=$content['message']?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('biography'); ?> </label>
						<div class="col-md-6">
							<textarea class="form-control ckeditor" name="biography" placeholder="" rows="3" ><?=$content['biography']?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('workshop'); ?> </label>
						<div class="col-md-6">
							<textarea class="form-control ckeditor" name="workshop" placeholder="" rows="3" ><?=$content['workshop']?></textarea>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('research'); ?> </label>
						<div class="col-md-6">
							<textarea class="form-control ckeditor" name="research" placeholder="" rows="3" ><?=$content['research']?></textarea>
							
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