<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			
			<li class="active">
				<a href="#add_sub" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('edit') . " " . translate('procedure'); ?></a>
			</li>
			
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="add_sub">
				<?php echo form_open_multipart(base_url('frontend/services/procedure_edit_save'), array('class' => 'form-horizontal form-bordered')); ?>
					<input type="hidden" name="services_id" value="<?php echo $services['id']; ?>">
					<input type="hidden" name="speciality_id" value="<?php echo $services['speciality_id']; ?>">
					<div class="form-group <?php if (form_error('title')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label"><?php echo translate('title'); ?></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="title"/ value="<?php echo $services['title']; ?>">
							<span class="error"><?php echo form_error('title'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('Image'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="file" class="form-control" name="image"  />
						</div>
					</div>
					<!--<div class="form-group">-->
					<!--	<label  class="col-md-3 control-label"><?php echo translate('icon'); ?> <span class="required">*</span></label>-->
					<!--	<div class="col-md-6">-->
					<!--		<input type="file" class="form-control" name="image"  />-->
					<!--	</div>-->
					<!--</div>	-->
					
					
					<div class="form-group <?php if (form_error('content')) echo 'has-error'; ?>">
						<label  class="col-md-3 control-label">Description</label>
						<div class="col-md-8">
							<textarea name="description" class="ckeditor"><?php echo $services['description']; ?></textarea>
							<span class="error"><?php echo form_error('content'); ?></span>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-md-3 control-label">Procedure</label>
						<div class="col-md-8">
							<select class="selectpicker" multiple data-live-search="true" name="blogs[]" >
                              <?php 
                                    $blogs = $this->db->get('front_cms_procedures_list')->result();
                                    $b =  json_decode($services['blogs']);
                              foreach($blogs as $blog){
                                    if(in_array($blog->id,$b)){
                                         $selected = "selected";
                                     }else{
                                         $selected ="";
                                     } 
                              ?>
                              <option value="<?=$blog->id?>" <?=$selected?>><?=$blog->title?></option>
                              <?php 
                                
                              } ?>
                            </select>
						</div>
					</div>
					
				
					<?php
							$seo_content = json_decode($services['seo_content']);?>
							<div class="form-group <?php if (form_error('page_title')) echo 'has-error'; ?>">
								<label class="col-md-3 control-label">Page Title</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="page_title" value="<?php echo $seo_content->page_title;?>" />
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