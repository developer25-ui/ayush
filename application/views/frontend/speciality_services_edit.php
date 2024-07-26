<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			
			<li class="active">
				<a href="#add_sub" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('edit') . " " . translate('services'); ?></a>
			</li>
			
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="add_sub">
				<?php echo form_open_multipart(base_url('frontend/services/speciality_services_edit_save'), array('class' => 'form-horizontal form-bordered')); ?>
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
							<input type="file" class="form-control" name="photo"  />
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('icon'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="file" class="form-control" name="image"  />
						</div>
					</div>	
					
					
					<div class="form-group <?php if (form_error('content')) echo 'has-error'; ?>">
						<label  class="col-md-3 control-label">Description</label>
						<div class="col-md-8">
							<textarea name="description" class="ckeditor"><?php echo $services['description']; ?></textarea>
							<span class="error"><?php echo form_error('content'); ?></span>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-md-3 control-label">Blogs</label>
						<div class="col-md-8">
							<select class="selectpicker" multiple data-live-search="true" name="blogs[]" >
                              <?php 
                                    $blogs = $this->db->get('front_cms_blogs')->result();
                                    $b =  json_decode($services['blogs']);
                              foreach($blogs as $blog){
                                    if(in_array($blog->id,$b)){
                                         $selected = "selected";
                                     }else{
                                         $selected ="";
                                     } 
                              ?>
                              <option value="<?=$blog->id?>" <?=$selected?>><?=$blog->patient_name?></option>
                              <?php 
                                
                              } ?>
                            </select>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-md-3 control-label">Testimonials</label>
						<div class="col-md-8">
							<select class="selectpicker" multiple data-live-search="true" name="testimonials[]" >
                              <?php 
                                    $testimonials = $this->db->get('front_cms_testimonial')->result();
                                    $t =  json_decode($services['testimonials']);
                              foreach($testimonials as $testimonial){
                                     if(in_array($testimonial->id,$t)){
                                         $selected = "selected";
                                     }else{
                                         $selected ="";
                                     } 
                              ?>
                              <option value="<?=$testimonial->id?>" <?=$selected?>><?=$testimonial->patient_name?></option>
                              <?php 
                                
                              } ?>
                            </select>
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