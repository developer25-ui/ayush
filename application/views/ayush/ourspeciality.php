<section class="innerbgbanners">
 <div class="container">
     <div >
     <h2 class="blueab overlaps">Our Specialties</h2>
     <p class="justify blk">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem <br>Ipsum has been the industry's </p>
    </div>
      </div>
      <div class="main bedcrum1s"><div class="container"><p style="margin-bottom:0px;">LoremIpsum > LoremIpsum > LoremIpsum</p></div></div>
</section>
<section >
     <div class="specailtysec wrapper">

  
 </div>
 <div class="container mb60">
     <div class="row">
         <div class="col-md-3 mt40">
             <div class="brd">
             <h5>Hospitals</h5>
             <form action="/action_page.php">
  <div class="filter"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" class="check">
  <label for="vehicle1" class="pl10"> Ayush Hospital Rajkot</label><br></div>
  <div class="filter">
  <input type="checkbox" id="vehicle2" name="vehicle2" value="Car" class="check">
  <label for="vehicle2" class="pl10"> Ayush Hospital Kutch</label><br></div>
  <div class="filter">
  <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat" class="check">
  <label for="vehicle3" class="pl10"> Ayush Hospital Mehsana</label><br></div>
  <div class="filter">
   <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat" class="check">
  <label for="vehicle3" class="pl10"> Ayush Hospital Morbi</label><br><br></div>

</form>
</div>
<div class="brd mt20">
<h5>Specialties</h5>
             <form action="/action_page.php">
  <div class="filter"><input type="checkbox" id="vehicle1" name="vehicle1" class="check" value="Bike">

  <label for="vehicle1" class="pl10" > All Specialties</label><br></div>
  <div class="filter">
  <input type="checkbox" id="vehicle2" name="vehicle2" value="Car" class="check">
  <label for="vehicle2" class="pl10"> COE for Cardiology</label><br></div>
  <div class="filter">
  <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat" class="check">
  <label for="vehicle3" class="pl10"> COE for Orthopedics</label><br></div>
  <div class="filter">
   <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat" class="check">
  <label for="vehicle3" class="pl10"> COE for General Surgery</label><br></div>
  <div class="filter">
  <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat" class="check">
  <label for="vehicle3" class="pl10"> COE for General Medicine</label><br></div>
  <div class="filter">
  <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat" class="check">
  <label for="vehicle3" class="pl10"> COE for Gynaecology & Obstetrics</label><br></div><br>

</form>
</div>

         </div>
         <div class="col-md-9">
            <div class="row">
                      <?php
                        
                        $speciality = $this->db->get('front_cms_services_list')->result();
                        foreach($speciality as $key=>$value){
                           
                         ?>
                 <div class="col-md-4 item_wrap female mtop10">
           <div class="spbox zoom-in">
               <img src="<?=base_url('uploads/')?>images/th.jpg" class="imgwdth" style="width:100%;">
               <div class="boxcon">
               <h5><?=$value->title?></h5>
               <p><?=strip_tags(substr($value->description,0,170))?></p>
               <div class="knmore"><a href="<?=base_url("speciality-details/".$value->slug)?>" class="kncon">Know More</a></div>
           </div>
           </div>
        
       </div>
     
           <?php } ?>
       
      
      
       
       
            </div>
             
         </div>
     </div>
 </div>
  
</div>
</section>