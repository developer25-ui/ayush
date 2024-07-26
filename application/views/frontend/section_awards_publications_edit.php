<div class="row">
	<div class="col-md-2 mb-md">
		<?php $this->load->view('frontend/sidebar'); ?>
	</div>
	<div class="col-md-10">
		<section class="panel">
			<div class="tabs-custom">
				<ul class="nav nav-tabs">
					<li class="<?php echo ($validation == 1 ? 'active' : ''); ?>">
						<a href="<?=base_url('frontend/section/awards_publications')?>"><?php echo translate('list'); ?></a>
					</li>
					<li class="<?php echo ($validation == 2 ? 'active' : ''); ?>">
						<a href="#options" data-toggle="tab"><?php echo translate('edit'); ?></a>
					</li>
				</ul>
				<div class="tab-content">
					
					<div class="tab-pane <?php echo ($validation == 2 ? 'active' : ''); ?>" id="options">
					    <?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered')); ?>
							<div class="form-group <?php if (form_error('page_title')) echo 'has-error'; ?>">
							    <input type="hidden" name="id" value="<?=$serviceslist['id']?>"/>
								<label class="col-md-2 control-label"><?php echo translate('title'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="title" value="<?=$serviceslist['title']?>"/>
									<span class="error"><?php echo form_error('page_title'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label"><?php echo translate('image'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<input type="file" name="image" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label"><?php echo translate('description'); ?></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="description" value="<?=$serviceslist['description']?>"/>
								</div>
							</div>
							<footer class="panel-footer mt-lg">
								<div class="row">
									<div class="col-md-2 col-md-offset-2">
										<button type="submit" class="btn btn-default btn-block" name="edit" value="1">
											<i class="fas fa-plus-circle"></i> <?php echo translate('update'); ?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>