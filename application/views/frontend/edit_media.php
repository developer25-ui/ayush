<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
		
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('edit') . " " . translate('media'); ?></a>
			</li>

		</ul>
		<div class="tab-content">
		
	
			<div class="tab-pane active" id="create">
			    <?php echo form_open_multipart(base_url('frontend/content/media/update/'.$list['id']), array('class' => 'form-horizontal form-bordered')); ?>
			        
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo  translate('title'); ?> </label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="page_title" value="<?=$list['page_title']?>"/>
						</div>
					</div>
					
				
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('description'); ?> </label>
						<div class="col-md-6">
							<textarea class="form-control" id="description" name="description" placeholder="" rows="3" ><?=$list['content']?></textarea>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('photo'); ?> <span class="required">*</span></label>
						<div class="col-md-4">
							<input type="file" name="photo" class="dropify" data-height="150" data-default-file="<?=base_url($list['banner_image'])?>"/>
							<span class="error"><?php echo form_error('photo'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Read More Link</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="read_more_link" value="<?=$list['read_more_link']?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo  translate('meta_keywords'); ?> </label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="meta_keyword" value="<?=$list['meta_keyword']?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo  translate('meta_description'); ?> </label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="meta_description" value="<?=$list['meta_description']?>"/>
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