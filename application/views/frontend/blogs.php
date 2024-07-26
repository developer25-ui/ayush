<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="<?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?php echo translate('blogs') . " " . translate('list'); ?></a>
			</li>
	<?php if (get_permission('frontend_blogs', 'is_add')) { ?>
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('add') . " " . translate('blogs'); ?></a>
			</li>
	<?php } ?>
	<li class="<?php echo ($validation == 6 ? 'active' : ''); ?>">
				<a href="#options" data-toggle="tab"><?php echo translate('seo'); ?></a>
			</li>
		</ul>
		<div class="tab-content">
			<div id="list" class="tab-pane <?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<table class="table table-bordered table-hover table-condensed table_default" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th><?php echo translate('sl'); ?></th>
							<th><?php echo translate('photo'); ?></th>
							<th><?php echo translate('title'); ?></th>
							<th><?php echo translate('slug'); ?></th>
							<th><?php echo translate('description'); ?></th>
							<th><?php echo translate('rank'); ?></th>
							<th><?php echo translate('action'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 1;
						if (!empty($testimoniallist)) {
							foreach ($testimoniallist as $row):
								?>
						<tr>
							<td><?php echo $count++; ?></td>
							<td><img class="img-border" src="<?php echo $this->app_lib->get_image_url('blogs/' . $row['image']); ?>" width="50"/></td>
							<td><?php echo $row['patient_name']; ?></td>
							<td><?php echo $row['surname']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td><?php echo $row['rank']; ?></td>
							<td class="min-w-xs">
								<?php if (get_permission('frontend_blogs', 'is_edit')): ?>
									<a href="<?php echo base_url('frontend/blogs/edit/' . $row['id']); ?>" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?php echo translate('edit'); ?>"> 
										<i class="fas fa-pen-nib"></i>
									</a>
								<?php endif; if (get_permission('frontend_blogs', 'is_delete')): ?>
									<?php echo btn_delete('frontend/blogs/delete/' . $row['id']); ?>
								<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; }?>
					</tbody>
				</table>
			</div>
	<?php if (get_permission('frontend_blogs', 'is_add')) { ?>
			<div class="tab-pane <?php echo (isset($validation_error) ? 'active' : ''); ?>" id="create">
			    <?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered')); ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('blog') . " " . translate('title'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="patient_name" value="<?php echo set_value('blog_title'); ?>" />
							<span class="error"><?php echo form_error('patient_name'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('Doctor'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
						    <select class="form-control" name="author" required>
						        <?php   $this->db->select('staff.*,staff_designation.name as designation_name,staff_department.name as department_name,login_credential.role as role_id, roles.name as role');
                                        $this->db->from('staff');
                                        $this->db->join('login_credential', 'login_credential.user_id = staff.id and login_credential.role != "7"', 'inner');
                                        $this->db->join('roles', 'roles.id = login_credential.role', 'left');
                                        $this->db->join('staff_designation', 'staff_designation.id = staff.designation', 'left');
                                        $this->db->join('staff_department', 'staff_department.id = staff.department', 'left');
                                        $this->db->where('login_credential.role', 3);
                                        $this->db->order_by('staff.id', 'ASC');
                                        $doctors = $this->db->get()->result();?>
                                        <option>Select Doctor</option>
                                        <?php foreach($doctors as $doctor){?>
                                        <option value="<?=$doctor->name?>"><?=$doctor->name?></option>
                                        <?php } ?>
						    </select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('Speciality'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
						    <select class="form-control" name="speciality" required>
						        <?php   $specialities = $this->db->get('front_cms_services_list')->result();?>
                                        <option>Select Speciality</option>
                                        <?php foreach($specialities as $speciality){?>
                                        <option value="<?=$speciality->title?>"><?=$speciality->title?></option>
                                        <?php } ?>
						    </select>
						</div>
					</div>
					<!--<div class="form-group">-->
					<!--	<label class="col-md-3 control-label"><?php echo translate('surname'); ?> <span class="required">*</span></label>-->
					<!--	<div class="col-md-6">-->
					<!--		<input type="text" class="form-control" name="surname" value="<?php echo set_value('surname'); ?>" />-->
					<!--		<span class="error"><?php echo form_error('surname'); ?></span>-->
					<!--	</div>-->
					<!--</div>-->
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('rank'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<?php
								$arrayRank = array(
									'1' => '1',
									'2' => '2',
									'3' => '3',
									'4' => '4',
									'5' => '5',
								);
								echo form_dropdown("rank", $arrayRank, set_value('rank'), "class='form-control' data-minimum-results-for-search='Infinity'
								data-plugin-selectTwo data-width='100%'");
							?>
							<span class="error"><?php echo form_error('rank'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('bannerhead'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<textarea class="ckeditor" name="bannerhead" ><?php echo set_value('bannerhead'); ?></textarea>
							<span class="error"><?php echo form_error('bannerhead'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('description'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<textarea class="ckeditor" name="description" ><?php echo set_value('description'); ?></textarea>
							<span class="error"><?php echo form_error('description'); ?></span>
						</div>
					</div>
					
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('photo'); ?> <span class="required">*</span></label>
						<div class="col-md-4">
							<input type="file" name="photo" class="dropify" data-height="150" />
							<span class="error"><?php echo form_error('photo'); ?></span>
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
	<?php } ?>
	<div class="tab-pane <?php echo ($validation == 6 ? 'active' : ''); ?>" id="options">
						<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
							<?php $home_seo = $this->db->get_where('front_cms_blogs_seo',array('id'=>1))->row_array();
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