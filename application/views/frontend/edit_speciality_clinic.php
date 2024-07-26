<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
		
			<li class="<?php echo (isset($validation_error) ? 'active' : ''); ?>">
				<a href="#create" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('edit') . " " . translate('speciality_clinic'); ?></a>
			</li>

		</ul>
		<div class="tab-content">
		
	
			<div class="tab-pane active" id="create">
			    <?php echo form_open_multipart(base_url('frontend/content/speciality_clinic/update/'.$list->id), array('class' => 'form-horizontal form-bordered')); ?>
			        
					<div class="form-group">
						<label class="col-md-3 control-label">Title</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="title" value="<?=$list->title?>" />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Image</label>
						<div class="col-md-4">
							<input type="file" name="image" class="dropify" data-height="150" data-default-file="<?=base_url($list->image); ?>"/>
							<span class="error"><?php echo form_error('photo'); ?></span>
						</div>
					</div>
					
				    <div class="form-group">
						<label  class="col-md-3 control-label">Description</label>
						<div class="col-md-8">
							<textarea name="description" class="form-control ckeditor"><?=$list->description?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label">About The Department</label>
						<div class="col-md-8">
							<textarea name="about" class="form-control ckeditor"><?=$list->about?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label">Facilities And Services</label>
						<div class="col-md-8">
							<textarea name="facilities" class="form-control ckeditor"><?=$list->facilities?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-3 control-label">Doctors</label>
						<div class="col-md-8">
							<select class="selectpicker" multiple data-live-search="true" name="doctors[]" >
                              <?php 
                              $this->db->select('staff.*,staff_designation.name as designation_name,staff_department.name as department_name,login_credential.role as role_id, roles.name as role');
                                        $this->db->from('staff');
                                        $this->db->join('login_credential', 'login_credential.user_id = staff.id and login_credential.role != "7"', 'inner');
                                        $this->db->join('roles', 'roles.id = login_credential.role', 'left');
                                        $this->db->join('staff_designation', 'staff_designation.id = staff.designation', 'left');
                                        $this->db->join('staff_department', 'staff_department.id = staff.department', 'left');
                                        $this->db->where('login_credential.role', 3);
                                        $this->db->order_by('staff.id', 'ASC');
                                        $doctors = $this->db->get()->result();
                                        $doc =  json_decode($list->doctors);        
                              foreach($doctors as $doctor){
                                     if(in_array($doctor->id,$doc)){
                                         $selected = "selected";
                                     }else{
                                         $selected ="";
                                     }
                              ?>
                              <option value="<?=$doctor->id?>" <?=$selected?>><?=$doctor->name?></option>
                              <?php 
                                
                              } ?>
                            </select>
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