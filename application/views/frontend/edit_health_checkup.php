<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
		
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('edit') . " " . translate('health_checkup'); ?></a>
			</li>

		</ul>
		<div class="tab-content">
		
	
			<div class="tab-pane active" id="create">
			    <?php echo form_open_multipart(base_url('frontend/content/health_checkup/update/'.$list['id']), array('class' => 'form-horizontal form-bordered')); ?>
			        
					<div class="form-group">
						<label class="col-md-3 control-label">Title</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="title"  value="<?=$list['title']?>"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Image</label>
						<div class="col-md-4">
							<input type="file" name="image" class="dropify" data-height="150" data-default-file="<?=base_url($list['image'])?>"/>
							<span class="error"><?php echo form_error('photo'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Price</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="price"  value="<?=$list['price']?>"/>
						</div>
					</div>
				    <div class="form-group">
						<label  class="col-md-3 control-label">Description</label>
						<div class="col-md-8">
							<textarea name="description" class="form-control ckeditor"><?=$list['description']?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label">Inclusion</label>
						<div class="col-md-8">
							<textarea name="inclusion" class="form-control ckeditor"><?=$list['inclusion']?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label">Guidelines</label>
						<div class="col-md-8">
							<textarea name="guidelines" class="form-control ckeditor"><?=$list['guidelines']?></textarea>
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