<div class="content">
<section class="innerbgbanners">
 <div class="container">
     <div >
     <h2 class="blueab overlaps">Our Doctor's</h2>
     <p class="justify blk">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem <br>Ipsum has been the industry's </p>
    </div>
      </div>
      <div class="main bedcrum1s"><div class="container"><p style="margin-bottom:0px;">LoremIpsum > LoremIpsum > LoremIpsum</p></div></div>
</section>
  

    <section class="mb60" id="doc">
    <div class="container">
       
        <div class="row">
                 <div class="col-md-3 mt40">
             <div class="brd">
             <h5>Hospitals</h5>

<div class="filter">

     <?php $location = $this->db->get('location')->result();
    foreach($location as $value){
    ?> 
    <input type="checkbox" id="hospital<?=$value->id?>" name="hospital" value="<?=$value->name?>">
    <label for="hospital<?=$value->id?>"><?=$value->name?></label><br>

 
       <?php } ?>
</div>
         
     
</div>
<div class="brd mt20">
 
<h5>Specialties</h5>
<div class="filter">
  <?php $speciality = $this->db->get('front_cms_services_list')->result();
                                    foreach($speciality as $value){
                                ?> 
    <input type="checkbox" id="specialty<?=$value->id?>" name="specialty" value="COE for <?=$value->title?>">
    <label for="specialty<?=$value->id?>">COE for <?=$value->title?></label><br>

       <?php } ?>
</div>
          
</div>

         </div>
            <div class="col-md-9">
                <ul class="doctor-list">
                    <div class="row">
                          <?php foreach($doctors as $doctor){?>
                          
<div class="col-md-4 mt40 img-hover-zoom--brightness doctor" data-hospital="<?=$doctor['hospital']?>" data-specialty="COE for <?=$doctor['specialty']?>"><div class="testiboxdoc">
                <div class="imgtestidoc1 ">
                <img src="<?=base_url('uploads/')?>images/doctor.webp" class="docimg ">
                <div class="doctorbox">
                <h5><?=$doctor['name']?></h5>
                <p><?=$doctor['designation_name']?></p>
                <p><?=$doctor['specialty']?></p>
                <p><?=$doctor['hospital']?></p>
                <div class="row">
                <div class="col-md-4 knmoredoc"><a href="<?=base_url('doctor-profile/'.$doctor['slug'])?>" class="kncon">Profile</a></div>
                <div class="col-md-8 knmoredocab"><a href="bookanappointment.html" class="kncon">Appointment</a></div>
                </div>
                </div>
                </div></div>
                </div>
      <?php } ?>
  </div>
</ul> 
        
             
            </div>

 
  

        </div>
    </div>
</section>
</div>
<script>
    document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', filterDoctors);
    });

    function filterDoctors() {
        const selectedHospitals = Array.from(document.querySelectorAll('input[name="hospital"]:checked')).map(cb => cb.value);
        const selectedSpecialties = Array.from(document.querySelectorAll('input[name="specialty"]:checked')).map(cb => cb.value);

        document.querySelectorAll('.doctor').forEach(function(doctor) {
            const doctorHospital = doctor.getAttribute('data-hospital');
            const doctorSpecialty = doctor.getAttribute('data-specialty');

            if (
                (selectedHospitals.length === 0 || selectedHospitals.includes(doctorHospital)) &&
                (selectedSpecialties.length === 0 || selectedSpecialties.includes(doctorSpecialty))
            ) {
                doctor.style.display = '';
            } else {
                doctor.style.display = 'none';
            }
        });
    }
</script>