<div class="row">
	<div class="col-md-2 mb-md">
		<?php $this->load->view('frontend/sidebar'); ?>
	</div>
	<div class="col-md-10">
		<section class="panel">
			<div class="tabs-custom">
				<ul class="nav nav-tabs">
					<li class="<?php echo ($validation == 1 ? 'active' : ''); ?>">
						<a href="#contact" data-toggle="tab"><?php echo translate('list'); ?></a>
					</li>
					<li class="<?php echo ($validation == 2 ? 'active' : ''); ?>">
						<a href="#options" data-toggle="tab"><?php echo translate('add'); ?></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane <?php echo ($validation == 1 ? 'active' : ''); ?>" id="contact">
					    <table class="table table-bordered table-hover table-condensed table_default" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th><?php echo translate('sl'); ?></th>
							<th><?php echo translate('image'); ?></th>
							<th><?php echo translate('title'); ?></th>
							<th><?php echo translate('description'); ?></th>
							<th><?php echo translate('action'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$count = 1;
							if (!empty($serviceslist)){
								foreach ($serviceslist as $row):
								?>
						<tr>
							<td><?php echo $count++; ?></td>
							<td class="widget-row-in"><img src="<?php echo base_url($row['image']); ?>" width="50"></td>
							<td><?php echo strip_tags($row['title']); ?></td>
							<td><?php echo strip_tags($row['description']); ?></td>
							<td class="min-w-xs">
								
									<a href="<?php echo base_url('frontend/section/doctors_talk_edit/' . $row['id']); ?>" class="btn btn-default btn-circle icon" data-toggle="tooltip" data-original-title="<?php echo translate('edit'); ?>"> 
										<i class="fas fa-pen-nib"></i>
									</a>
							
									<?php echo btn_delete('frontend/section/doctors_talk_delete/' . $row['id']); ?>
							
							</td>
						</tr>
						<?php endforeach; }?>
					</tbody>
				</table>
					</div>
					<div class="tab-pane <?php echo ($validation == 2 ? 'active' : ''); ?>" id="options">
					    <?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered')); ?>
							<div class="form-group <?php if (form_error('page_title')) echo 'has-error'; ?>">
								<label class="col-md-2 control-label"><?php echo translate('title'); ?> <span class="required">*</span></label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="title" value="<?php echo set_value('page_title'); ?>" />
									<span class="error"><?php echo form_error('page_title'); ?></span>
								</div>
							</div>
							
							<div class="form-group">
        						<label class="col-md-2 control-label"><?php echo translate('Page'); ?> <span class="required">*</span></label>
        						<div class="col-md-8">
        						    <select class="form-control" name="show_id" required>
        						        <?php   $this->db->select('staff.*,staff_designation.name as designation_name,staff_department.name as department_name,login_credential.role as role_id, roles.name as role');
                                                $this->db->from('staff');
                                                $this->db->join('login_credential', 'login_credential.user_id = staff.id and login_credential.role != "7"', 'inner');
                                                $this->db->join('roles', 'roles.id = login_credential.role', 'left');
                                                $this->db->join('staff_designation', 'staff_designation.id = staff.designation', 'left');
                                                $this->db->join('staff_department', 'staff_department.id = staff.department', 'left');
                                                $this->db->where('login_credential.role', 3);
                                                $this->db->order_by('staff.id', 'ASC');
                                                $doctors = $this->db->get()->result();?>
                                                <option>Select Page</option>
                                                <option value="0">Home</option>
                                                <?php foreach($doctors as $doctor){?>
                                                <option value="<?=$doctor->id?>"><?=$doctor->name?></option>
                                                <?php } ?>
        						    </select>
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
									<input type="text" class="form-control" name="description" />
								</div>
							</div>
							<footer class="panel-footer mt-lg">
								<div class="row">
									<div class="col-md-2 col-md-offset-2">
										<button type="submit" class="btn btn-default btn-block" name="add" value="1">
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