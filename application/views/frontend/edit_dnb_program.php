<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
		
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('edit') . " " . translate('DNB Program'); ?></a>
			</li>

		</ul>
		<div class="tab-content">
		
	
			<div class="tab-pane active" id="create">
			    <?php echo form_open_multipart(base_url('frontend/content/dnb_program/update/'.$list['id']), array('class' => 'form-horizontal form-bordered')); ?>
			        
				<div class="form-group">
						<label class="col-md-3 control-label">Department</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="department" value="<?=$list['department']?>" />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Name of Faculty</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="name_of_faculty" value="<?=$list['name_of_faculty']?>" />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Status of Faculty</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="status_of_faculty" value="<?=$list['status_of_faculty']?>" />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">OPD Timings</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="opd_timings" value="<?=$list['opd_timings']?>" />
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