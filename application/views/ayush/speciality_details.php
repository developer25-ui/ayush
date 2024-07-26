<style>.carousel-control-prev {
    left: -115px;
}</style>

<section class="spbgbanner">

     <div class="container">
         <div >
     <h2 class="blueab overlap"><?=$speciality->title?></h2>
     <?=$speciality->bannerhead?>
    <div>
      <span class="knmorebanner"> <a href="" class="kncon">Book an Appointment</a></span> <span class="knmorebanner"> <a href="#pro" class="kncon">Procedures</a></span> <span class="knmorebanner"> <a href="#doc" class="kncon">Doctors</a></span></div>
      </div>
      </div>
      <div class="main bedcrum"><div class="container"><p style="margin-bottom:0px;">Home / Specialty / <?=$speciality->title?></p></div></div>
   </section>
 
   
   <section class="ptsec">
       
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                    <h2 class="blueab">Overview</h2>
                
                  <p class="justify">
<?=$speciality->description?>
              
               </div>
        
           </div>
       </div>
   </section>
<section class="tabsp">                <div class="container">
                         <h2 class="blueab blueabs"><?=$speciality->heading?></h2>

<div class="tabset">
  <!-- Tab 1 -->
  <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
  <label for="tab1"><?=$speciality->tab1?></label>
  <!-- Tab 2 -->
  <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
  <label for="tab2"><?=$speciality->tab2?></label>
  <!-- Tab 3 -->
  <input type="radio" name="tabset" id="tab3" aria-controls="dunkles">
  <label for="tab3"><?=$speciality->tab3?></label>
    <input type="radio" name="tabset" id="tab4" aria-controls="tab4">
  <label for="tab4"><?=$speciality->tab4?></label>
  <div class="tab-panels">
    <section id="marzen" class="tab-panel">
        
 <?=$speciality->tab1content?>
     
  </section>
    <section id="rauchbier" class="tab-panel">
 <?=$speciality->tab2content?>
     
    </section>
    <section id="dunkles" class="tab-panel">
  
     <?=$speciality->tab3content?>
     
    </section>
        <section id="dunkless" class="tab-panel">
 <?=$speciality->tab4content?>
     
    </section>
  
  </div>
  
</div></div></section>
   <?php if($sub_speciality){?>   
<section class="main healthchsp ptd20" id="pro" style="    margin: 0px 0px;">
    <div class="container">
        <div class="row">
    <div class="title proceduresp">
    <h2 class="healthtsp wht">Sub Specialties</h2>
  </div>
  <div id="demo" class="carousel slide" data-bs-ride="carousel">
<!-- The slideshow/carousel -->
  <div class="carousel-inner pdhth">
     
        <?php foreach(array_chunk($sub_speciality, 4) as $key=>$value){
                     ?>
    <div class="carousel-item <?php if($key==0) echo "active";?>">
        <div class="row">
            
 <?php foreach($value as $prodedure){?>
            <div class="col-md-3">
                <div class="sphealthchbox">
     <img src="<?=base_url('uploads/')?>images/th.jpg" class="imgwdth" style="width:100%;">
      <div class="sppro">
               <h5 class="blk"><?=$prodedure->title?></h5>
         
              <div class="spknmore"><a href="<?=base_url('sub-speciality/'.$prodedure->slug)?>" class="kncon">Know More</a></div>
           </div>
       </div>
  </div>
      <?php } ?>  
   
   
 
  </div>
    </div>
      <?php } ?>
    
  
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next" style="margin-right: -23px;">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

        </div>
    </div>
</section>
<?php } ?> 

    <section class="mb60" id="doc">
    <div class="container">
         <div class="title">
    <h2 class="healthdocs">Our Doctor's</h2>
  </div>
        <div class="row">
                    <?php   $doctors = json_decode($speciality->doctors);
                            foreach($doctors as $d){
                                $this->db->select('staff.*,staff_designation.name as designation_name,staff_department.name as department_name,login_credential.role as role_id, roles.name as role');
                                $this->db->from('staff');
                                $this->db->join('login_credential', 'login_credential.user_id = staff.id and login_credential.role != "7"', 'inner');
                                $this->db->join('roles', 'roles.id = login_credential.role', 'left');
                                $this->db->join('staff_designation', 'staff_designation.id = staff.designation', 'left');
                                $this->db->join('staff_department', 'staff_department.id = staff.department', 'left');
                                $this->db->where('login_credential.role', 3);
                                $this->db->where('staff.id', $d);
                                $this->db->order_by('staff.id', 'ASC');
                                $doctor = $this->db->get()->row_array();?>
 <div class="col-md-3 mt40 img-hover-zoom--brightness"><div class="testiboxdoc">
       <div class="imgtestidoc1 ">
  <img src="<?=base_url('uploads/')?>images/doctor.webp" class="docimg ">
           <div class="doctorbox">
             <h5><?=$doctor['name']?></h5>
 <p><?=$doctor['designation_name']?></p>
 <div class="row">
     <div class="col-md-4 knmoredoc"><a href="<?=base_url('doctor-profile/'.$doctor['slug'])?>" class="kncon">Profile</a></div>
       <div class="col-md-8 knmoredocab"><a href="" class="kncon">Appointment</a></div>
 </div>
  </div>
  </div></div>
</div>
  <?php } ?>
 


      
        </div>
    </div>
</section>

