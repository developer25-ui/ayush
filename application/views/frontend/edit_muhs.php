<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
		
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('edit') . " " . translate('facility'); ?></a>
			</li>

		</ul>
		<div class="tab-content">
		
	
			<div class="tab-pane active" id="create">
			    <?php echo form_open_multipart(base_url('frontend/content/muhs/update/'.$list['id']), array('class' => 'form-horizontal form-bordered')); ?>
			        
			<div class="form-group">
						<label class="col-md-3 control-label">Title</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="title" value="<?=$list['title']?>" />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Facility Type</label>
						<div class="col-md-6">
						    <select class="form-control" name="type" required>
						      <option selected disabled hidden>Select Facility</option>
                                        
                                <option value="Diabetology" <?php if($list['type'] == "Diabetology") echo "selected";?>>Diabetology</option>
                                <option value="Hepatology" <?php if($list['type'] == "Hepatology") echo "selected";?>>Hepatology</option>
                                <option value="HPBS" <?php if($list['type'] == "HPBS") echo "selected";?>>HPBS</option>
                                <option value="Oncology" <?php if($list['type'] == "Oncology") echo "selected";?>>Oncology</option>
                            </select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">PDF File</label>
						<div class="col-md-6">
							<input type="file" class="form-control" name="muhs_file"  />
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