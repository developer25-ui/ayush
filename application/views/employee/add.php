<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<?php echo form_open_multipart($this->uri->uri_string()); ?>
				<div class="panel-heading">
					<h4 class="panel-title">
						<i class="far fa-user-circle"></i> <?php echo translate('add_doctor'); ?>
					</h4>
				</div>
				<div class="panel-body">
					<!-- Basic Details -->
					<div class="headers-line mt-md">
						<i class="fas fa-user-check"></i> <?php echo translate('basic_details'); ?>
					</div>
					<div class="row">
						<div class="col-md-6 mb-sm">
							<div class="form-group <?php if (form_error('name')) echo 'has-error'; ?>">
								<label class="control-label"><?php echo translate('name'); ?> <span class="required">*</span></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="far fa-user"></i></span>
									<input class="form-control" name="name" type="text" value="<?php echo set_value('name'); ?>">
								</div>
								<span class="error"><?php echo form_error('name'); ?></span>
							</div>
						</div>
						<div class="col-md-6 mb-sm">
							<div class="form-group">
								<label class="control-label"><?php echo translate('gender'); ?></label>
								<?php
									$gender_array = array(
										"" => translate('select'),
										"male" => translate('male'),
										"female" => translate('female')
									);
									echo form_dropdown("gender", $gender_array, set_value('gender') , "class='form-control' data-plugin-selectTwo data-width='100%'
									data-minimum-results-for-search='Infinity'");
								?>
							</div>
						</div>
					</div>
					
					<div class="row">
							<div class="col-md-4">
							
						<div class="col-md-12">
							<label class="control-label"><?php echo translate('hospital'); ?></label>
						    <select class="form-control" name="location" required>
						        <?php   $locations = $this->db->get('location')->result();?>
                                        <option>Select Hospital</option>
                                        <?php foreach($locations as $location){?>
                                        <option value="<?=$location->id?>"><?=$location->name?></option>
                                        <?php } ?>
						    </select>
						</div>

				</div>
				<div class="col-md-4">
							
						<div class="col-md-12">
							<label class="control-label"><?php echo translate('speciality'); ?></label>
						    <select class="form-control" name="speciality" required>
						        <?php   $specialities = $this->db->get('front_cms_services_list')->result();?>
                                        <option>Select Speciality</option>
                                        <?php foreach($specialities as $speciality){?>
                                        <option value="<?=$speciality->id?>"><?=$speciality->title?></option>
                                        <?php } ?>
						    </select>
						</div>
				</div>

				<div class="col-md-4">
							
						<div class="col-md-12">
							<label class="control-label"><?php echo translate('blogs'); ?></label>
						    <select class="form-control" name="blogs" required>
						        <?php   $blogss = $this->db->get('front_cms_blogs')->result();?>
                                        <option>Select Blogs</option>
                                        <?php foreach($blogss as $blogs){?>
                                        <option value="<?=$blogs->id?>"><?=$blogs->patient_name?></option>
                                        <?php } ?>
						    </select>
						</div>
				</div>
				
				
						<div class="col-md-4 mb-sm">
							<div class="form-group <?php if (form_error('mobile_no')) echo 'has-error'; ?>">
								<label class="control-label"><?php echo translate('mobile_no'); ?> <span class="required">*</span></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-phone-volume"></i></span>
									<input class="form-control" name="mobile_no" type="text" value="<?php echo set_value('mobile_no'); ?>">
								</div>
								<span class="error"><?php echo form_error('mobile_no'); ?></span>
							</div>
						</div>
						<div class="col-md-4 mb-sm">
							<div class="form-group <?php if (form_error('email')) echo 'has-error'; ?>">
								<label class="control-label"><?php echo translate('email'); ?> <span class="required">*</span></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="far fa-envelope-open"></i></span>
									<input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>" />
								</div>
								<span class="error"><?php echo form_error('email'); ?></span>
							</div>
						</div>
						
					</div>
						<div class="row">
                                    <div class="col-md-12 mb-sm">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo translate('profile'); ?></label>
                                            <textarea class="ckeditor"  name="description"  ><?php echo set_value('description'); ?></textarea>
                                        </div>
                                    </div>
                                </div>
				    <div class="form-group <?php if (form_error('Education & Training_heading')) echo 'has-error'; ?>">
                                            <label class="control-label"><?php echo translate('Education & Training_heading'); ?> <span class="required">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input class="form-control" name="education_heading" type="text" value="<?php echo set_value('education_heading', $staff['education_heading']); ?>">
                                            </div>
                                            <span class="error"><?php echo form_error('education_heading'); ?></span>
                                        </div>
                                <div class="row">

                                    <div class="col-md-12 mb-sm">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo translate('Education & Training'); ?></label>
                                            <textarea class="ckeditor" rows="2" name="education" placeholder="<?php echo translate('education'); ?>" ><?php echo set_value('education', $staff['education']); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group <?php if (form_error('Awards_heading')) echo 'has-error'; ?>">
                                            <label class="control-label"><?php echo translate('awards_heading'); ?> <span class="required">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input class="form-control" name="awards_publications_heading" type="text" value="<?php echo set_value('Awards_publications_heading', $staff['awards_publications_heading']); ?>">
                                            </div>
                                            <span class="error"><?php echo form_error('awards_publications_heading'); ?></span>
                                        </div>
                                <div class="row">

                                    <div class="col-md-12 mb-sm">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo translate('awards'); ?></label>
                                            <textarea class="ckeditor" rows="2" name="awards_publications" placeholder="<?php echo translate('awards_publications'); ?>" ><?php echo set_value('awards_publications', $staff['awards_publications']); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group <?php if (form_error('Speciality_Interest_heading')) echo 'has-error'; ?>">
                                            <label class="control-label"><?php echo translate('Speciality_Interest_heading'); ?> <span class="required">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input class="form-control" name="Interest_heading" type="text" value="<?php echo set_value('Interest_heading', $staff['Interest_heading']); ?>">
                                            </div>
                                            <span class="error"><?php echo form_error('Interest_heading'); ?></span>
                                        </div>
                                <div class="row">

                                    <div class="col-md-12 mb-sm">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo translate('Speciality_Interest'); ?></label>
                                            <textarea class="ckeditor" rows="2" name="Interest" placeholder="<?php echo translate('Interest'); ?>" ><?php echo set_value('Interest', $staff['Interest']); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                      <div class="form-group <?php if (form_error('experiences_heading')) echo 'has-error'; ?>">
                                            <label class="control-label"><?php echo translate('experiences_heading'); ?> <span class="required">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input class="form-control" name="experiences_heading" type="text" value="<?php echo set_value('experiences_heading', $staff['experiences_heading']); ?>">
                                            </div>
                                            <span class="error"><?php echo form_error('experiences_heading'); ?></span>
                                        </div>
                                <div class="row">

                                    <div class="col-md-12 mb-sm">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo translate('experiences'); ?></label>
                                            <textarea class="ckeditor" rows="2" name="experiences" placeholder="<?php echo translate('experiences'); ?>" ><?php echo set_value('experiences', $staff['experiences']); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-sm">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo translate('address'); ?></label>
                                            <textarea class="form-control" rows="2" name="address" placeholder="<?php echo translate('address'); ?>" ><?php echo set_value('address', $staff['address']); ?></textarea>
                                        </div>
                                    </div>
                                </div>
					<div class="row mb-md">
						<div class="col-md-12">
							<div class="form-group">
								<label for="input-file-now"><?php echo translate('profile_picture'); ?></label>
								<input type="file" name="user_photo" class="dropify" data-allowed-file-extensions="jpg png webp" data-height="120" />
							</div>
						</div>
					</div>

					<!-- Login Details -->
					<div class="headers-line" style="display:none">
						<i class="fas fa-user-lock"></i> <?php echo translate('login_details'); ?>
					</div>
					<div class="row mb-lg" style="display:none">
						<div class="col-md-6 mb-sm">
							<div class="form-group <?php if (form_error('username')) echo 'has-error'; ?>">
								<label class="control-label"><?php echo translate('username'); ?> <span class="required">*</span></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-user-lock"></i></span>
									<input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>" />
								</div>
								<span class="error"><?php echo form_error('username'); ?></span>
							</div>
						</div>
						<div class="col-md-3 mb-sm">
							<div class="form-group <?php if (form_error('password')) echo 'has-error'; ?>">
								<label class="control-label"><?php echo translate('password'); ?> <span class="required">*</span></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-unlock-alt"></i></span>
									<input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" />
								</div>
								<span class="error"><?php echo form_error('password'); ?></span>
							</div>
						</div>
						<div class="col-md-3 mb-sm">
							<div class="form-group <?php if (form_error('retype_password')) echo 'has-error'; ?>">
								<label class="control-label"><?php echo translate('retype_password'); ?> <span class="required">*</span></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fas fa-unlock-alt"></i></span>
									<input type="password" class="form-control" name="retype_password"  value="<?php echo set_value('retype_password'); ?>" />
								</div>
								<span class="error"><?php echo form_error('retype_password'); ?></span>
							</div>
						</div>
					</div>

					<!-- Office Details -->
					<div class="headers-line">
						<i class="fas fa-school"></i> <?php echo translate('office_details'); ?>
					</div>
					<div class="row">
						<div class="col-md-4 mb-sm">
							<div class="form-group <?php if (form_error('user_role')) echo 'has-error'; ?>">
								<label class="control-label"><?php echo translate('role'); ?> <span class="required">*</span></label>
								<?php
									$role_list = $this->app_lib->getRoles();
									echo form_dropdown("user_role", $role_list, set_value('user_role'), "class='form-control'
									data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity' ");
								?>
								<span class="error"><?php echo form_error('user_role'); ?></span>
							</div>
						</div>
						<div class="col-md-4 mb-sm">
							<div class="form-group <?php if (form_error('designation_id')) echo 'has-error'; ?>">
								<label class="control-label"><?php echo translate('designation'); ?> <span class="required">*</span></label>
								<?php
									echo form_dropdown("designation_id", $designationlist, set_value('designation_id') , "class='form-control' 
									data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
								?>
								<span class="error"><?php echo form_error('designation_id'); ?></span>
							</div>
						</div>
						<div class="col-md-4 mb-sm">
							<div class="form-group <?php if (form_error('department_id')) echo 'has-error'; ?>">
								<label class="control-label"><?php echo translate('department'); ?> <span class="required">*</span></label>
								<?php
									echo form_dropdown("department_id", $departmentlist, set_value('department_id') , "class='form-control'
									data-plugin-selectTwo data-width='100%' data-minimum-results-for-search='Infinity'");
								?>
								<span class="error"><?php echo form_error('department_id'); ?></span>
							</div>
						</div>
					</div>
					<div class="row mb-lg">
						<div class="col-md-6 mb-sm">
							<div class="form-group <?php if (form_error('joining_date')) echo 'has-error'; ?>">
								<label class="control-label"><?php echo translate('joining_date'); ?> <span class="required">*</span></label>
								<div class="input-group">
									<span class="input-group-addon"><i class="far fa-calendar-plus"></i></span>
									<input type="text" class="form-control" name="joining_date" data-plugin-datepicker data-plugin-options='{ "todayHighlight" : true }' 
									value="<?php echo set_value('joining_date'); ?>">
								</div>
								<span class="error"><?php echo form_error('joining_date'); ?></span>
							</div>
						</div>
						  <div class="col-md-12">
                            <label class="control-label"><?php echo translate('hospital'); ?></label>
                        <select class="form-control" name="location" required>
                                <?php   $locations = $this->db->get('location')->result();?>
                                        <option>Select Hospital</option>
                                        <?php foreach($locations as $location){?>
                                        <option value="<?=$location->name?>" <?php if($location->id == $staff['location']) echo "selected"; ?>><?=$location->name?></option>
                                        <?php } ?>
                            </select>
                        </div>
						<div class="col-md-6 mb-sm">
							<div class="form-group">
								<label class="control-label"><?php echo translate('qualification'); ?></label>
								<input type="text" class="form-control" name="qualification"  value="<?php echo set_value('qualification'); ?>" id="tags-input">
							</div>
						</div>
					</div>
                    <div class="row mb-lg">
                        <div class="col-md-6 mb-sm">
                            <div class="form-group">
                                <label class="control-label"><?php echo translate('skills'); ?></label>
                                <input type="text" class="form-control" name="skills" value="<?php echo set_value('skills'); ?>" id="tags-input1"/>
                            </div>
                        </div>    
                       <div class="col-md-6 mb-sm">
                                        <div class="form-group">
                                     
                                    </div> 
                                     <div class="col-md-6 mb-sm">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo translate('publication'); ?></label>
                                            <input type="text" class="form-control" name="publication" value="<?php echo set_value('publication', $staff['publication']); ?>" id="tags-input2"/>
                                        </div>
                                    </div>
                    </div>
                        
					<!-- Social Links -->
					

					<div class="row mb-lg">
					
					
					</div>
                    <div class="headers-line">
						<i class="fas fa-globe"></i> SEO Content
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
					<!-- Bank Details -->
					<div class="headers-line" style="display:none">
						<i class="fas fa-university"></i> <?php echo translate('bank_details'); ?>
					</div>
					<div class="mb-sm checkbox-replace" style="display:none">
						<label class="i-checks"><input type="checkbox" name="cbbank_skip" id="cbbank_skip" value="true" <?php if(isset($cbbank_skip)) echo 'checked'; ?> checked>
							<i></i> <?php echo translate('skipped_bank_details'); ?>
						</label>
					</div>
					<div id="bank_details_form" <?php if(isset($cbbank_skip)) echo 'class="hidden-item"'; ?> style="display:none">
						<div class="row">
							<div class="col-md-4 mb-sm">
								<div class="form-group <?php if (form_error('bank_name')) echo 'has-error'; ?>">
									<label class="control-label"><?php echo translate('bank_name') . " " . translate('name'); ?> <span class="required">*</span></label>
									<input type="text" class="form-control" name="bank_name" value="<?php echo set_value('bank_name'); ?>" />
									<span class="error"><?php echo form_error('bank_name'); ?></span>
								</div>
							</div>
							<div class="col-md-4 mb-sm">
								<div class="form-group <?php if (form_error('holder_name')) echo 'has-error'; ?>">
									<label class="control-label"><?php echo translate('holder_name'); ?> <span class="required">*</span></label>
									<input type="text" class="form-control" name="holder_name" value="<?php echo set_value('holder_name'); ?>" />
									<span class="error"><?php echo form_error('holder_name'); ?></span>
								</div>
							</div>
							<div class="col-md-4 mb-sm">
								<div class="form-group <?php if (form_error('bank_branch')) echo 'has-error'; ?>">
									<label class="control-label"><?php echo translate('bank') . ' ' . translate('branch'); ?> <span class="required">*</span></label>
									<input type="text" class="form-control" name="bank_branch" value="<?php echo set_value('bank_branch'); ?>" />
									<span class="error"><?php echo form_error('bank_branch'); ?></span>
								</div>
							</div>
						</div>
						<div class="row mb-lg">
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?php echo translate('bank') . " " . translate('address'); ?></label>
									<input type="text" class="form-control" name="bank_address" value="<?php echo set_value('bank_address'); ?>" />
								</div>
							</div>
							<div class="col-md-4 mb-sm">
								<div class="form-group">
									<label class="control-label"><?php echo translate('ifsc_code'); ?></label>
									<input type="text" class="form-control" name="ifsc_code" value="<?php echo set_value('ifsc_code'); ?>" />
								</div>
							</div>
							<div class="col-md-4 mb-sm">
								<div class="form-group <?php if (form_error('account_no')) echo 'has-error'; ?>">
									<label class="control-label"><?php echo translate('account_no'); ?> <span class="required">*</span></label>
									<input type="text" class="form-control" name="account_no" value="<?php echo set_value('account_no'); ?>" />
									<span class="error"><?php echo form_error('account_no'); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-offset-10 col-md-2">
							<button type="submit" name="submit" value="save" class="btn btn btn-default btn-block"> <i class="fas fa-plus-circle"></i> <?php echo translate('save'); ?></button>
						</div>
					</div>
				</footer>
			<?php echo form_close(); ?>
		</section>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){        
  var tagInputEle = $('#tags-input');
  tagInputEle.tagsinput();
  
  var tagInputEle1 = $('#tags-input1');
  tagInputEle1.tagsinput();
  
  var tagInputEle2 = $('#tags-input2');
  tagInputEle2.tagsinput();
});
   
</script>