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
                    <?php foreach(array_chunk($locations, 3) as $key=>$value){
                     ?>
 <?php foreach($value as $location){?>
                <div class="col-md-4 mt40 img-hover-zoom--brightness"><div class="testiboxdoc">
                <div class="imgtestidoc1 ">
                <img src="<?=base_url('uploads/')?>images/doctor.webp" class="docimg ">
                <div class="doctorbox">
                <h5><?=$location['name']?></h5>
                <p><?=$location['designation_name']?></p>
                <div class="row">
                <div class="col-md-4 knmoredoc"><a href="<?=base_url('doctor-profile/'.$doctor['slug'])?>" class="kncon">Profile</a></div>
                <div class="col-md-8 knmoredocab"><a href="bookanappointment.html" class="kncon">Appointment</a></div>
                </div>
                </div>
                </div></div>
                </div>
                   <?php } ?>
                
           
            </div>
            </div>

 
  

        </div>
    </div>
</section>



<footer class="mb15">
<div class="container">
    <div class="row">
        <div class="col-md-5">
        <div class="logoft">
            <img src="<?=base_url('uploads/')?>images/logo.png" class="logoft">
            <p class="wht">Lorem Ipsum is simply dummy text of the printing <br>and typesetting industry. Lorem Ipsum is simply dummy text of the printing <br>and typesetting industry. 
            Lorem Ipsum is simply dummy text of the printing <br>and typesetting industry. 
        </p>
         <p class="wht"><B class="wht">Address : </B> Lorem Ipsum is simply dummy text of the printing</p>
        <p class="wht"><B class="wht">Email : </B> ayush@gmailcom</p>
             <div class="socftcol">
           
            <a href="#" class="wht un socialiocn1" ><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#" class="wht un socialiocn"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href="#" class="wht un socialiocn"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                <a href="#" class="wht un socialiocn"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        </div>
        </div>
    </div>
    <div class="col-md-2 mt53">
        <div class="ftcol">
            <p class="mb2"><span class="wht ftsize">Patient Portal</span></p>
            <p class="mb2">
            <a href="#" class="wht un">Health Checkup</a></p>
              <p class="mb2"><a href="#" class="wht un">TPA & Insurance</a></p>
              <p class="mb2">
              <a href="#" class="wht un">Patient Rights & Responsibilities</a></p>
              <p class="mb2">
                <a href="#" class="wht un">Estimate Request</a></p>
                 <p class="mb2">
            <a href="#" class="wht un">Feedback</a></p>
              <p class="mb2"><a href="#" class="wht un">Success Stories</a></p>
            
        </div>
    </div>
   <div class="col-md-2 mt53">
        <div class="ftcol">
            <p class="mb2"><span class="wht ftsize">About Us</span></p>
            <p class="mb2">
            <a href="#" class="wht un">Overview</a></p>
              <p class="mb2"><a href="#" class="wht un">Vision & Mission</a></p>
              <p class="mb2">
              <a href="#" class="wht un">Our Values</a></p>
              <p class="mb2">
                <a href="#" class="wht un">Leadership Team</a></p>
                 <p class="mb2">
            <a href="#" class="wht un">Awards & Accreditation</a></p>
              <p class="mb2"><a href="#" class="wht un">Our Journey</a></p>
              <p class="mb2">
              <a href="#" class="wht un">Virtual Tour</a></p>
         

        </div>
    </div>
    <div class="col-md-3 mt53">
        <div class="ftcol">
            <p class="mb2"><span class="wht un ftsize">Schemes</span></p>
            <p class="mb2">
            <a href="#" class="wht un">Janani Shishu Suraksha Karyakram</a></p>
              <p class="mb2"><a href="#" class="wht un">Rastriya Swasthya Bima Yojna</a></p>
              <p class="mb2">
              <a href="#" class="wht un">Mukhyamantri Amrutam Yojna</a></p>
              <p class="mb2">
                <a href="#" class="wht un">PM-JAY / Ayushman Bharat</a></p>
        
        </div>
           <div class="ftcol mt30">
            <p class="mb2"><span class="wht un ftsize">Helpful Links</span></p>
            <p class="mb2">
            <a href="#" class="wht un">Blogs</a></p>
              <p class="mb2"><a href="#" class="wht un">Sitemap</a></p>
              <p class="mb2">
              <a href="#" class="wht un">Privacy Policy</a></p>
              <p class="mb2">
                <a href="#" class="wht un">Terms and Conditions</a></p>
                  <p class="mb2">
                <a href="#" class="wht un">Information on Consumables</a></p>
                   <p class="mb2">
                <a href="#" class="wht un">Information on Implants</a></p>
        
        </div>
    </div>
    </div>
    </div>
    <hr class="copy">
    <bottom><p class="wht text-center"> All Copyrights Reserved. © 2024 Ayush.com | Design & Developed by HashTAGit</p></bottom>
</footer>
</div>