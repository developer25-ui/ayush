<div class="form-group <?php if (form_error('page_title')) echo 'has-error'; ?>">
								<label class="col-md-3 control-label"><?php echo translate('page') . " " .  translate('_title'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="page_title" value="<?php echo set_value('page_title', $home_seo['page_title']); ?>" />
									<span class="error"><?php echo form_error('page_title'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?php echo translate('meta') . " " . translate('keyword'); ?></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="meta_keyword" value="<?php echo set_value('meta_keyword', $home_seo['meta_keyword']); ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?php echo translate('meta') . " " . translate('description'); ?></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="meta_description" value="<?php echo set_value('meta_description', $home_seo['meta_description']); ?>" />
								</div>
							</div>