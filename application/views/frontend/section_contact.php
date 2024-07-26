<div class="row">
	<div class="col-md-2 mb-md">
		<?php $this->load->view('frontend/sidebar'); ?>
	</div>
	<div class="col-md-10">
		<section class="panel">
			<div class="tabs-custom">
				<ul class="nav nav-tabs">
					<li class="<?php echo ($validation == 1 ? 'active' : ''); ?>">
						<a href="#contact" data-toggle="tab"><?php echo translate('contact'); ?></a>
					</li>
					<!--<li class="<?php echo ($validation == 2 ? 'active' : ''); ?>">-->
					<!--	<a href="#options" data-toggle="tab"><?php echo translate('options'); ?></a>-->
					<!--</li>-->
				</ul>
				<div class="tab-content">
					<div class="tab-pane <?php echo ($validation == 1 ? 'active' : ''); ?>" id="contact">
					    <?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered')); ?>
							<div class="form-group <?php if (form_error('box_title')) echo 'has-error'; ?>">
								<label class="col-md-2 control-label"><?php echo translate('box_title'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="box_title" value="<?php echo set_value('box_title', $contact['box_title']); ?>" />
									<span class="error"><?php echo form_error('box_title'); ?></span>
								</div>
							</div>
							<div class="form-group mt-md <?php if (form_error('box_description')) echo 'has-error'; ?>">
								<label class="col-md-2 control-label"><?php echo translate('box_description'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<textarea name="box_description" class="form-control" rows="4"><?php echo set_value('box_description', $contact['box_description']); ?></textarea>
									<span class="error"><?php echo form_error('box_description'); ?></span>
								</div>
							</div>
							<div class="form-group <?php if (form_error('photo')) echo 'has-error'; ?>">
								<label class="col-md-2 control-label"><?php echo translate('box_photo'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<input type="file" name="photo" class="dropify" data-height="150" data-allowed-file-extensions="png jpg jpeg" data-default-file="<?php echo base_url('uploads/frontend/images/' . $contact['box_image']); ?>" />
									<span class="error"><?php echo form_error('photo'); ?></span>
								</div>
							</div>
							<div class="form-group mt-md <?php if (form_error('form_title')) echo 'has-error'; ?>">
								<label class="col-md-2 control-label"><?php echo translate('form_title'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="form_title" value="<?php echo set_value('form_title', $contact['form_title']); ?>" />
									<span class="error"><?php echo form_error('form_title'); ?></span>
								</div>
							</div>
							<div class="form-group mt-md <?php if (form_error('address')) echo 'has-error'; ?>">
								<label class="col-md-2 control-label"><?php echo translate('address'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<textarea name="address" class="form-control" rows="4"><?php echo set_value('address', $contact['address']); ?></textarea>
									<span class="error"><?php echo form_error('address'); ?></span>
								</div>
							</div>
							<div class="form-group mt-md <?php if (form_error('phone')) echo 'has-error'; ?>">
								<label class="col-md-2 control-label"><?php echo translate('phone'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<textarea name="phone" class="form-control" rows="4"><?php echo set_value('phone', $contact['phone']); ?></textarea>
									<span class="error"><?php echo form_error('phone'); ?></span>
								</div>
							</div>
							<div class="form-group mt-md <?php if (form_error('email')) echo 'has-error'; ?>">
								<label class="col-md-2 control-label"><?php echo translate('email'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<textarea name="email" class="form-control" rows="4"><?php echo set_value('email', $contact['email']); ?></textarea>
									<span class="error"><?php echo form_error('email'); ?></span>
								</div>
							</div>
							<div class="form-group mt-md <?php if (form_error('submit_text')) echo 'has-error'; ?>">
								<label class="col-md-2 control-label"><?php echo translate('submit_button_text'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="submit_text" value="<?php echo set_value('submit_text', $contact['submit_text']); ?>" />
									<span class="error"><?php echo form_error('submit_text'); ?></span>
								</div>
							</div>
							<div class="form-group mt-md <?php if (form_error('map_iframe')) echo 'has-error'; ?>">
								<label class="col-md-2 control-label"><?php echo translate('map_iframe'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<textarea name="map_iframe" class="ckeditor" ><?php echo set_value('map_iframe', $contact['map_iframe']); ?></textarea>
									<span class="error"><?php echo form_error('map_iframe'); ?></span>
								</div>
							</div>
							<?php $multiple_address = json_decode($contact['multiple_address']);
							      foreach($multiple_address as $key=>$value){  
							?>
							<div class="form-group mt-md ">
								<label class="col-md-2 control-label">Address <?=$key+1?></label>
								<div class="col-md-8">
									<textarea name="multiple_address[]" class="ckeditor"><?=$value?></textarea>
								</div>
							</div>
							<?php } ?>
							<!--<div class="form-group mt-md ">-->
							<!--	<label class="col-md-2 control-label">Address 2</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<textarea name="multiple_address[]" class="ckeditor"></textarea>-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group mt-md ">-->
							<!--	<label class="col-md-2 control-label">Address 3</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<textarea name="multiple_address[]" class="ckeditor"></textarea>-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group mt-md ">-->
							<!--	<label class="col-md-2 control-label">Address 4</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<textarea name="multiple_address[]" class="ckeditor"></textarea>-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group mt-md ">-->
							<!--	<label class="col-md-2 control-label">Address 5</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<textarea name="multiple_address[]" class="ckeditor"></textarea>-->
							<!--	</div>-->
							<!--</div>-->
							<?php $seo_content = json_decode($contact['seo_content']);?>
							<div class="form-group <?php if (form_error('page_title')) echo 'has-error'; ?>">
								<label class="col-md-3 control-label">Page Title</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="page_title" value="<?=$seo_content->page_title?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Meta Keyword</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="meta_keyword" value="<?=$seo_content->meta_keyword?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Meta Description</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="meta_description" value="<?=$seo_content->meta_description?>" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">News Keywords</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="news_keywords" value="<?=$seo_content->news_keywords?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Abstract</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="abstract" value="<?=$seo_content->meta_abstract?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Dc Source</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="dc_source" value="<?=$seo_content->dc_source?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Dc Title</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="dc_title" value="<?=$seo_content->dc_title?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Dc Keywords</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="dc_keywords" value="<?=$seo_content->dc_keywords?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Dc Description</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="dc_description" value="<?=$seo_content->dc_description?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Canonical</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="canonical" value="<?=$seo_content->canonical?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Alternate</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="alternate" value="<?=$seo_content->alternate?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Robot</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="robot" value="<?=$seo_content->robot?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Copyright</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="copyright" value="<?=$seo_content->copyright?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Author</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="author" value="<?=$seo_content->author?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Og Locale</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="og_locale" value="<?=$seo_content->og_locale?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Og Type</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="og_type" value="<?=$seo_content->og_type?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Og Title</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="og_title" value="<?=$seo_content->og_title?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Og Description</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="og_description" value="<?=$seo_content->og_description?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Og URL</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="og_url" value="<?=$seo_content->og_url?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Og Site Name</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="og_site_name" value="<?=$seo_content->og_site_name?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Og Image</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="og_image" value="<?=$seo_content->og_site_name?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Fb Admins</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="fb_admins" value="<?=$seo_content->og_site_name?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Twitter Card</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="twitter_card" value="<?=$seo_content->twitter_card?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Twitter Site</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="twitter_site" value="<?=$seo_content->twitter_site?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Twitter Creator</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="twitter_creator" value="<?=$seo_content->twitter_creator?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Twitter Title</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="twitter_title" value="<?=$seo_content->twitter_title?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Twitter Description</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="twitter_description" value="<?=$seo_content->twitter_description?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Twitter Image Src</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="twitter_image_src" value="<?=$seo_content->twitter_image_src?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Twitter Canonical</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="twitter_canonical" value="<?=$seo_content->twitter_canonical?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Item type</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="item_type" value="<?=$seo_content->item_type?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Item Name</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="item_name" value="<?=$seo_content->item_name?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Item Description</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="item_description" value="<?=$seo_content->item_description?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Item Url</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="item_url" value="<?=$seo_content->item_url?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Item Image</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="item_image" value="<?=$seo_content->item_image?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Item Author</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="item_author" value="<?=$seo_content->item_author?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Item Organization</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="item_organization" value="<?=$seo_content->item_organization?>" />
								</div>
							</div>
							
							<footer class="panel-footer mt-lg">
								<div class="row">
									<div class="col-md-2 col-md-offset-2">
										<button type="submit" class="btn btn-default btn-block" name="contact" value="1">
											<i class="fas fa-plus-circle"></i> <?php echo translate('save'); ?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close(); ?>
					</div>
					<div class="tab-pane <?php echo ($validation == 2 ? 'active' : ''); ?>" id="options">
					    <?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered')); ?>
							<div class="form-group <?php if (form_error('page_title')) echo 'has-error'; ?>">
								<label class="col-md-2 control-label"><?php echo translate('page') . " " . translate('title'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="page_title" value="<?php echo set_value('page_title', $contact['page_title']); ?>" />
									<span class="error"><?php echo form_error('page_title'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label"><?php echo translate('banner_photo'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<input type="hidden" name="old_photo" value="<?php echo $contact['banner_image']; ?>">
									<input type="file" name="photo" class="dropify" data-height="150" data-default-file="<?php echo base_url('uploads/frontend/banners/' . $contact['banner_image']); ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label"><?php echo translate('meta') . " " . translate('keyword'); ?></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="meta_keyword" value="<?php echo set_value('meta_keyword', $contact['meta_keyword']); ?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label"><?php echo translate('meta') . " " . translate('description'); ?></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="meta_description" value="<?php echo set_value('meta_description', $contact['meta_description']); ?>" />
								</div>
							</div>
							<footer class="panel-footer mt-lg">
								<div class="row">
									<div class="col-md-2 col-md-offset-2">
										<button type="submit" class="btn btn-default btn-block" name="options" value="1">
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
	</div>
</div>