<?php   $this->db->select('staff.*,staff_designation.name as designation_name,staff_department.name as department_name,login_credential.role as role_id, roles.name as role');
                                        $this->db->from('staff');
                                        $this->db->join('login_credential', 'login_credential.user_id = staff.id and login_credential.role != "7"', 'inner');
                                        $this->db->join('roles', 'roles.id = login_credential.role', 'left');
                                        $this->db->join('staff_designation', 'staff_designation.id = staff.designation', 'left');
                                        $this->db->join('staff_department', 'staff_department.id = staff.department', 'left');
                                        $this->db->where_in('login_credential.role', array(3,8));
                                        $this->db->order_by('staff.id', 'ASC');
                                        $doctors = $this->db->get()->result();
        $team = $this->db->get_where('research_team',array('research_id'=>1))->row();
        $team1 = json_decode($team->clinical_research_scientist);
        $team2 = json_decode($team->research_personnel);
        $team3 = json_decode($team->technical_personnel);
        $team4 = json_decode($team->office_staff);
        $team5 = json_decode($team->volunteers);
                                        ?>
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<style>
    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
        width: -webkit-fill-available;
    }
</style>
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li class="<?php echo (!isset($validation_error) ? 'active' : ''); ?>">
				<a href="#list" data-toggle="tab"><i class="fas fa-list-ul"></i> <?php echo translate('research'); ?></a>
			</li>
	
		</ul>
		<div class="tab-content">
			
			<div class="tab-pane active" id="create">
				<?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered')); ?>
					<div class="form-group <?php if (form_error('title')) echo 'has-error'; ?>">
						<label class="col-md-3 control-label"><?php echo translate('title'); ?> <span class="required">*</span></label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="title" value="<?=$pagelist->page_title?>" />
							<span class="error"><?php echo form_error('title'); ?></span>
						</div>
					</div>
					
					<div class="form-group <?php if (form_error('content')) echo 'has-error'; ?>">
						<label  class="col-md-3 control-label"><?php echo translate('content'); ?> <span class="required">*</span></label>
						<div class="col-md-8">
							<textarea name="content" id="editor"><?=$pagelist->content?></textarea>
							<span class="error"><?php echo form_error('content'); ?></span>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-md-3 control-label">Research Publication</label>
						<div class="col-md-8">
							<textarea name="publication" class="ckeditor"><?=$pagelist->publication?></textarea>
							<span class="error"><?php echo form_error('content'); ?></span>
						</div>
					</div>
					<!--<div class="form-group <?php if (form_error('photo')) echo 'has-error'; ?>">-->
					<!--	<label class="col-md-3 control-label"><?php echo translate('banner_photo'); ?> <span class="required">*</span></label>-->
					<!--	<div class="col-md-4">-->
					<!--		<input type="file" name="photo" class="form-control" >-->
					<!--	</div>-->
					<!--	<div class="col-md-4">-->
					<!--		<img src="<?=base_url($pagelist->banner_image)?>" width="350">-->
					<!--	</div>-->
					<!--</div>-->
					
				
                <?php $icons = $this->db->get_where('research_icons',array('research_id'=>1))->result();
                        foreach($icons as $icon){
                ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Icon</label>
                        <div class="col-md-4">
							<input type="text"  class="form-control" value="<?=$icon->icon_name?>" readonly>
						</div>
						<div class="col-md-4">
							<img src="<?=base_url($icon->icon_photo)?>" width="100">
						</div>
						<div class="input-group-append">
                            <a href="<?=base_url('frontend/content/remove_icon/'.$icon->id)?>" class="btn btn-danger">Remove</a>
                        </div>
                    </div>
                <?php } ?>    

                    <div id="newRow"></div>
                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"><button id="addRow" type="button" class="btn btn-info">Add Icon</button>
                        </div>    
                    </div>
            
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('message') . " " . translate('image'); ?></label>
						<div class="col-md-3">
							<input type="file" class="form-control" name="chairman_image" />
						</div>
						<div class="col-md-4">
							<img src="<?=base_url($pagelist->chairman_image)?>" width="350">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('message') . " " . translate('title'); ?></label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="message_title" value="<?=$pagelist->message_title?>" />
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-md-3 control-label"><?php echo translate('message'); ?> </label>
						<div class="col-md-8">
							<textarea name="chairman_message" class="form-control"><?=$pagelist->chairman_message?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-md-3 control-label">Clinical Reserch Scientists Team</label>
						<div class="col-md-8">
							<select class="selectpicker" multiple data-live-search="true" name="clinical_research_scientist[]" >
                              <?php foreach($doctors as $doctor){
                                        if(in_array($doctor->id,$team1)){
                              ?>
                              <option value="<?=$doctor->id?>" selected><?=$doctor->name?></option>
                              <?php }else{?>
                                <option value="<?=$doctor->id?>" ><?=$doctor->name?></option>
                              <?php 
                                    } 
                              } ?>
                            </select>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-md-3 control-label">Research Personnel Team</label>
						<div class="col-md-8">
							<select class="selectpicker" multiple data-live-search="true" name="research_personnel[]">
                              <?php foreach($doctors as $doctor){
                                        if(in_array($doctor->id,$team2)){
                              ?>
                              <option value="<?=$doctor->id?>" selected><?=$doctor->name?></option>
                              <?php }else{?>
                                <option value="<?=$doctor->id?>" ><?=$doctor->name?></option>
                              <?php 
                                    } 
                              } ?>
                            </select>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-md-3 control-label">Technical Personnel Team</label>
						<div class="col-md-8">
							<select class="selectpicker" multiple data-live-search="true" name="technical_personnel[]">
                              <?php foreach($doctors as $doctor){
                                        if(in_array($doctor->id,$team3)){
                              ?>
                              <option value="<?=$doctor->id?>" selected><?=$doctor->name?></option>
                              <?php }else{?>
                                <option value="<?=$doctor->id?>" ><?=$doctor->name?></option>
                              <?php 
                                    } 
                              } ?>
                            </select>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-md-3 control-label">Office Staff Team</label>
						<div class="col-md-8">
							<select class="selectpicker" multiple data-live-search="true" name="office_staff[]">
                              <?php foreach($doctors as $doctor){
                                        if(in_array($doctor->id,$team4)){
                              ?>
                              <option value="<?=$doctor->id?>" selected><?=$doctor->name?></option>
                              <?php }else{?>
                                <option value="<?=$doctor->id?>" ><?=$doctor->name?></option>
                              <?php 
                                    } 
                              } ?>
                            </select>
						</div>
					</div>
					
					<div class="form-group">
						<label  class="col-md-3 control-label">Volunteers Team</label>
						<div class="col-md-8">
							<select class="selectpicker" multiple data-live-search="true" name="volunteers[]">
                              <?php foreach($doctors as $doctor){
                                        if(in_array($doctor->id,$team5)){
                              ?>
                              <option value="<?=$doctor->id?>" selected><?=$doctor->name?></option>
                              <?php }else{?>
                                <option value="<?=$doctor->id?>" ><?=$doctor->name?></option>
                              <?php 
                                    } 
                              } ?>
                            </select>
						</div>
					</div>
					
					<?php $seo_content = json_decode($pagelist->seo_content);?>
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

<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div class="form-group" id="inputFormRow">';
        html += '<label class="col-md-3 control-label">Icon</label>';
        html += '<div class="col-md-4">';
        html += '<input type="text" name="icon_name[]" class="form-control" >';
        html += '</div>';
        html += '<div class="col-md-4">';
        html += '<input type="file" name="icon_photo[]" class="form-control" >';
        html += '</div>';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>