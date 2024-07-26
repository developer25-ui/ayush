<div class="content">
  <div class="blubk">

</div>
</div>

<section>
    
    <form class="docsapxes">
        <div class="wrapperr shadow-alls">
            <div class="search-container">
                <div class="row docbox">
                  
              <div class="col-md-2">
                         <img src="<?=base_url('uploads/')?>images/doc.jpeg" style="width:100%;">
                     </div>
                      <div class="col-md-10 plr2">
                         <div class="row">
                             <div class="col-md-9 mt22">
                               <h4 class="blueab"><?=$doctor['name']?></h4>
                               
                                 <p class="mb8"><?=$doctor['designation_name']?></p>

                                 <p><?=$doctor['location_name']?></p>
                             </div>
                             <div class="col-md-3">
                                 <img src="<?=base_url('uploads/')?>images/year.jpeg" style="width:100%;">
                             </div>
                         </div>
                         <div class="row mt20"><div class="mt22 drbtn"> <span class="knmoredocs"> <a href="#profile" class="kncon">Profile</a></span><span class="knmoredocs ml10"> <a href="#education" class="kncon">Education & Training</a></span><span class="knmoredocs ml10"> <a href="#speciality" class="kncon">Speciality Interest</a></span><span class="knmoredocs ml10"> <a href="#awards" class="kncon">Awards</a></span><span class="knmoredocs ml10"> <a href="bookanappointment.html" class="kncon">Appointment</a></span></div></div>
                     </div>
              
              
            </div>
        </div>
    </form>

</section>

 

<section class="mt112 mb50">
    <div class="container">
    <div class="row ht">
        <div class="col-md-8">   <h4 class="blueab">About <?=$doctor['name']?></h4>
            <hr class="dochr">
<div class="docback" id="profile">

   <div class="mt10 mb20"> <img src="<?=base_url('uploads/')?>images/dedoc.jpeg" style="width:28px;"><span class="prdoc">Profile</span></div>
<?=$doctor['description']?>
<hr>
  <div class="mt10 mb20" id="education"> <img src="<?=base_url('uploads/')?>images/dedoc.jpeg" style="width:28px;"><span class="prdoc"><?=$doctor['education_heading']?></span></div>
<?=$doctor['education']?>
<hr>
<div class="mt10 mb20" id="awards"> <img src="<?=base_url('uploads/')?>images/dedoc.jpeg" style="width:28px;"><span class="prdoc"><?=$doctor['Interest_heading']?></span></div>
<?=$doctor['Interest']?>
<hr>
<div class="mt10 mb20" id="awards"> <img src="<?=base_url('uploads/')?>images/dedoc.jpeg" style="width:28px;"><span class="prdoc"><?=$doctor['awards_publications_heading']?></span></div>
<?=$doctor['awards_publications']?>

<hr>
<div class="mt10 mb20" id="awards"> <img src="<?=base_url('uploads/')?>images/dedoc.jpeg" style="width:28px;"><span class="prdoc"><?=$doctor['experiences_heading']?></span></div>
<?=$doctor['experiences']?>
</div>


</div>
       
           <div class="col-md-4">
            <div class="doctalkbox">
            <h4 class="blueab">Doctor Talks</h4>

            <hr class="dochr">
             
            <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel" style="box-shadow: 0px 3px 12px 5px rgb(0 0 0 / 17%);
    border-radius: 12px;">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner">
   
      <?php foreach(array_chunk($doctortalk, 1) as $key=>$value){
                     ?>
    <div class="carousel-item <?php if($key==0) echo "active"; ?>">
         <?php foreach($value as $doctortal){?>
   <div class="testiboxdocs">
       <div class="imgtestidoc">

          <img src="<?=base_url('uploads/')?>images/video -frame.png" style="width:100%;">
          
             <p class="docvdo"><?=$doctortal->title?></p>
            <p class="mb3">Lorem Ipsum is simply dummy text is simply... </p>
        
         </div></div>
            <?php } ?>  
    </div>
         <?php } ?>
    
  
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="margin-left: 79px;">
    <span class="carousel-control-prev-icon" aria-hidden="true" style="margin-left: -204px;"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" style="    margin-left: -204px;">
    <span class="carousel-control-next-icon" aria-hidden="true" style="     margin-left: 32px;"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<h4 class="blueab mt40">Related Blogs</h4>

            <hr class="dochr">
             
            <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel" style="    box-shadow: 0px 3px 12px 5px rgb(0 0 0 / 17%);
    border-radius: 12px;">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner">
   <?php $blogs = $this->db->get('front_cms_blogs')->result();
        foreach($blogs as $key=>$blog){
        ?>
    <div class="carousel-item <?php if($key==0) echo "active";?>">
        
  <div class="row pd30">

                    <div class="col-md-5">
                        <img src="<?=base_url('uploads/')?>images/blogright.jpg" class="imgwidth">
                    </div>
                     <div class="col-md-7">
                        <div class="docrhtcon">
                        <p class="bldate">03 March 2024</p>
                       <p class="blogvdo"><?=$blogss->patient_name?> </p>
                    <div class="knmore"><a href="blog-detail.html" class="kncon">Know More</a></div>
                         </div>
                     </div>
                </div>
                   
    </div>
    <?php } ?> 
                     
  
  </div>
 
</div>

     </div>

     
</div>
 </div>
           </div>
       
  
</section>