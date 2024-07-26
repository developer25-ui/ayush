<div class="row">
	<div class="col-md-2 mb-md">
		<?php $this->load->view('frontend/sidebar'); ?>
	</div>
	<div class="col-md-10">
		<section class="panel">
			<div class="tabs-custom">
				<ul class="nav nav-tabs">
				<li class="<?php echo ($validation == 6 ? 'active' : ''); ?>">
						<a href="#options" data-toggle="tab"><?php echo translate('seo'); ?></a>
					</li>
					
				</ul>
				<div class="tab-content">
					
					<div class="tab-pane <?php echo ($validation == 7 ? 'active' : ''); ?>" id="hospital">
						<?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
							<div class="form-group <?php if (form_error('doc_title')) echo 'has-error'; ?>">
								<label class="col-md-3 control-label"><?php echo translate('title'); ?> <span class="required">*</span></label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="aig_title" value="<?php echo set_value('aig_title', $aig['title']); ?>" />
									<span class="error"><?php echo form_error('aig_title'); ?></span>
								</div>
							</div>
							<div class="form-group" style="display:none">
								<label class="col-md-3 control-label">Start No Of Doctor <span class="required">*</span></label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="doctor_start" value="<?php $aig_ele = json_decode($doctors['elements'], true); echo set_value('doctor_start', $doc_ele['doctor_start']); ?>" />
									<span class="error"><?php echo form_error('doctor_start'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?php echo translate('subtitle'); ?> <span class="required">*</span></label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="subtitle" value="<?php echo set_value('subtitle', $aig['subtitle']); ?>" />
									<span class="error"><?php echo form_error('subtitle'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-md-3 control-label"><?php echo translate('description'); ?> <span class="required">*</span></label>
								<div class="col-md-7">
									<textarea class="form-control" name="aig_description" rows="5"><?php echo set_value('aig_description', $aig['description']); ?></textarea>
									<span class="error"><?php echo form_error('doc_description'); ?></span>
								</div>
							</div>
							<?php $aig_ele = json_decode($aig['elements'], true);?>
							<div class="form-group">
								<label class="col-md-3 control-label"><?php echo translate('photo'); ?> <span class="required">*</span></label>
								<div class="col-md-4">
									<input type="hidden" name="old_photo" value="<?php echo $aig_ele['image']; ?>">
									<input type="file" name="photo" class="dropify" data-height="150" data-default-file="<?php echo base_url('uploads/frontend/home_page/' . $aig_ele['image']); ?>" />
									<span class="error"><?php echo form_error('photo'); ?></span>
								</div>
							</div>
							<footer class="panel-footer mt-lg">
								<div class="row">
									<div class="col-md-2 col-md-offset-3">
										<button type="submit" class="btn btn-default btn-block" name="aig_list" value="1">
											<i class="fas fa-plus-circle"></i> <?php echo translate('save'); ?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close(); ?>
					</div>
				
					<div class="tab-pane <?php echo ($validation == 3 ? 'active' : ''); ?>" id="testimonial">
						<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
							<div class="form-group <?php if (form_error('tes_title')) echo 'has-error'; ?>">
								<label class="col-md-3 control-label"><?php echo translate('title'); ?> <span class="required">*</span></label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="tes_title" value="<?php echo set_value('tes_title', $testimonial['title']); ?>" />
									<span class="error"><?php echo form_error('tes_title'); ?></span>
								</div>
							</div>
							<div class="form-group <?php if (form_error('tes_description')) echo 'has-error'; ?>">
								<label class="col-md-3 control-label"><?php echo translate('description'); ?> <span class="required">*</span></label>
								<div class="col-md-7">
									<textarea class="form-control" name="tes_description" rows="3"><?php echo set_value('tes_description', $testimonial['description']); ?></textarea>
									<span class="error"><?php echo form_error('tes_description'); ?></span>
								</div>
							</div>
							<footer class="panel-footer mt-lg">
								<div class="row">
									<div class="col-md-2 col-md-offset-3">
										<button type="submit" class="btn btn-default btn-block" name="testimonial" value="1">
											<i class="fas fa-plus-circle"></i> <?php echo translate('save'); ?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close(); ?>
					</div>
					<div class="tab-pane <?php echo ($validation == 4 ? 'active' : ''); ?>" id="services">
						<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
							<div class="form-group">
								<label class="col-md-3 control-label"><?php echo translate('title'); ?> <span class="required">*</span></label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="ser_title" value="<?php echo set_value('ser_title', $services['title']); ?>" />
									<span class="error"><?php echo form_error('ser_title'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?php echo translate('description'); ?> <span class="required">*</span></label>
								<div class="col-md-7">
									<textarea class="form-control" name="ser_description" rows="3"><?php echo set_value('ser_description', $services['description']); ?></textarea>
									<span class="error"><?php echo form_error('ser_description'); ?></span>
								</div>
							</div>
							<footer class="panel-footer mt-lg">
								<div class="row">
									<div class="col-md-2 col-md-offset-3">
										<button type="submit" class="btn btn-default btn-block" name="services" value="1">
											<i class="fas fa-plus-circle"></i> <?php echo translate('save'); ?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close(); ?>
					</div>
					<div class="tab-pane <?php echo ($validation == 5 ? 'active' : ''); ?>" id="cta">
						<?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
							<div class="form-group">
								<label class="col-md-3 control-label"><?php echo translate('title1'); ?> <span class="required">*</span></label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="cta_title" value="<?php echo set_value('cta_title', $cta['title']); ?>" />
									<span class="error"><?php echo form_error('cta_title'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?php echo translate('title2'); ?> <span class="required">*</span></label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="mobile_no" value="<?php $elements = json_decode($cta['elements'], true); echo set_value('mobile_no', $elements['mobile_no']); ?>" />
									<span class="error"><?php echo form_error('mobile_no'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?php echo translate('button_text'); ?> <span class="required">*</span></label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="button_text" value="<?php echo set_value('button_text', $elements['button_text']); ?>" />
									<span class="error"><?php echo form_error('button_text'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?php echo translate('button_url'); ?> <span class="required">*</span></label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="button_url" value="<?php echo set_value('button_url', $elements['button_url']); ?>" />
									<span class="error"><?php echo form_error('button_url'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"><?php echo translate('photo'); ?> <span class="required">*</span></label>
								<div class="col-md-4">
									<input type="hidden" name="old_photo" value="<?php echo $elements['image'] ?>">
									<input type="file" name="photo" class="dropify" data-height="150" data-default-file="<?php echo base_url('uploads/frontend/home_page/' . $elements['image']); ?>" />
									<span class="error"><?php echo form_error('photo'); ?></span>
								</div>
							</div>
							<footer class="panel-footer mt-lg">
								<div class="row">
									<div class="col-md-2 col-md-offset-3">
										<button type="submit" class="btn btn-default btn-block" name="cta" value="1">
											<i class="fas fa-plus-circle"></i> <?php echo translate('save'); ?>
										</button>
									</div>
								</div>
							</footer>
						<?php echo form_close(); ?>
					</div>
					<div class="tab-pane <?php echo ($validation == 8 ? 'active' : ''); ?>" id="right_menu">
					    <?php $right_menu = $this->db->get('right_menu')->result();
					    $i=1;
					    foreach($right_menu as $key=>$value){
					    ?>
					    <h4> Section <?=$i++?> </h4>
						<?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
						    <input type="hidden" name="right_menu_id" value="<?=$value->id?>" />
							<div class="form-group">
							    <label class="col-md-2 control-label"><?php echo translate('Title'); ?></label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="title" placeholder="title" value="<?=$value->title?>" required/>
								</div>
								<label class="col-md-2 control-label"><?php echo translate('Description'); ?></label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="description" placeholder="Description" value="<?=$value->description?>" required/>
								</div>
							</div>	
							<div class="form-group">
							    <label class="col-md-2 control-label"><?php echo translate('Icon'); ?></label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="button_url" placeholder="Icon" value="<?=$value->button_url?>" required/>
								</div>
								<!--<label class="col-md-2 control-label"><?php echo translate('Icon'); ?></label>-->
								<!--<div class="col-md-4">-->
								<!--	<input type="file" class="form-control" name="icon" value="" required/>-->
								<!--</div>-->
							</div>
							<div class="form-group">
							    <div class="col-md-6"></div>
							    <div class="col-md-2 col-md-offset-3">
										<button type="submit" class="btn btn-default btn-block" name="right_menu" value="1">
											<i class="fas fa-plus-circle"></i> <?php echo translate('save'); ?>
										</button>
									</div>
							</div>
						<?php echo form_close(); ?>
						<?php } ?>
					</div>
					<div class="tab-pane <?php echo ($validation == 6 ? 'active' : ''); ?>" id="options">
						<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
							<?php $home_seo = $this->db->get_where('front_cms_home_seo',array('id'=>1))->row_array();
							$seo_content = json_decode($home_seo['seo_content']);?>
							<div class="form-group <?php if (form_error('page_title')) echo 'has-error'; ?>">
								<label class="col-md-3 control-label">Page Title</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="page_title" value="<?php echo ($seo_content->page_title) ? $seo_content->page_title : 'AIG';?>" />
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
									<div class="col-md-2 col-md-offset-3">
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

       <!--                     <div class="form-group <?php if (form_error('page_title')) echo 'has-error'; ?>">-->
							<!--	<label class="col-md-3 control-label">Page Title</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="page_title" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Meta Keyword</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="meta_keyword" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Meta Description</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="meta_description" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">News Keywords</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="news_keywords" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Abstract</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="abstract" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Dc Source</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="dc_source" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Dc Title</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="dc_title" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Dc Keywords</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="dc_keywords" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Dc Description</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="dc_description" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Canonical</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="canonical" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Alternate</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="alternate" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Robot</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="robot" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Copyright</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="copyright" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Author</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="author" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Og Locale</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="og_locale" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Og Type</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="og_type" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Og Title</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="og_title" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Og Description</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="og_description" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Og URL</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="og_url" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Og Site Name</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="og_site_name" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Og Image</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="og_image" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Fb Admins</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="fb_admins" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Twitter Card</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="twitter_card" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Twitter Site</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="twitter_site" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Twitter Creator</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="twitter_creator" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Twitter Title</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="twitter_title" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Twitter Description</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="twitter_description" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Twitter Image Src</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="twitter_image_src" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Twitter Canonical</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="twitter_canonical" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Item type</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="item_type" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Item Name</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="item_name" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Item Description</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="item_description" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Item Url</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="item_url" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Item Image</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="item_image" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Item Author</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="item_author" value="" />-->
							<!--	</div>-->
							<!--</div>-->
							<!--<div class="form-group">-->
							<!--	<label class="col-md-3 control-label">Item Organization</label>-->
							<!--	<div class="col-md-8">-->
							<!--		<input type="text" class="form-control" name="item_organization" value="" />-->
							<!--	</div>-->
							<!--</div>-->