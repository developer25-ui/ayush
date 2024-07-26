<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<section class="panel">
	<div class="tabs-custom">
		<ul class="nav nav-tabs">
			<li>
				<a href="<?php echo base_url('frontend/events'); ?>"><i class="fas fa-list-ul"></i> <?php echo translate('events') . " " . translate('list'); ?></a>
			</li>
			<li class="active">
				<a href="#edit" data-toggle="tab"><i class="far fa-edit"></i> <?php echo translate('edit') . " " . translate('event'); ?></a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="edit">
			    <?php echo form_open_multipart($this->uri->uri_string(), array('class' => 'form-horizontal form-bordered')); ?>
					<input type="hidden" name="testimonial_id" value="<?php echo $testimonial['id']; ?>">
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('blog') . " " . translate('title'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="patient_name" value="<?php echo set_value('blog_title', $testimonial['patient_name']); ?>" />
							<span class="error"><?php echo form_error('patient_name'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('start') . " " . translate('date'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="date" class="form-control" name="start_date"  value="<?=$testimonial['start_date']?>"required/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('end') . " " . translate('date'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="date" class="form-control" name="end_date" value="<?=$testimonial['end_date']?>"required />
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('description'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<textarea class="form-control" id="description" name="description" placeholder="" rows="3" ><?php echo set_value('description', $testimonial['description']); ?></textarea>
							<span class="error"><?php echo form_error('description'); ?></span>
						</div>
					</div>
					<?php $images = $this->db->get_where('event_images',array('event_id'=>$testimonial['id']))->result();
					if($images){ ?>
					<div class="form-group">
    						<label class="col-md-3 control-label"><?php echo translate('Images'); ?> <span class="required">*</span></label>
					<?php    foreach($images as $image){
					?>
    					
    						<div class="col-md-3 " style="margin-bottom:10px">
    							<img src="<?=base_url($image->image)?>" width="200" height="200"><a href="<?=base_url('frontend/events/remove/'.$image->id.'/'.$testimonial['id'])?>" class="btn btn-sm btn-danger" style="margin-left:-35px;margin-top:-165px;"><i class="fa fa-remove"></i></a>
    						</div>
    				
					<?php } ?>
						</div>
					<?php    } ?>
					<div class="form-group">
						<label class="col-md-3 control-label"><?php echo translate('photo'); ?> <span class="required">*</span></label>
						<div class="col-md-6">
							<input type="file" name="photo[]" class="dropify" data-height="150" multiple/>
							<span class="error"><?php echo form_error('photo'); ?></span>
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