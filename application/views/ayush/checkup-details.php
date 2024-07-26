<div class="content">
 <section class="innerbgbannerss">
 <div class="container">
     <div >
     <h2 class="blueab overlaps"><?=$list->title?></h2>
    
    </div>
      </div>
      <div class="main bedcrum1s"><div class="container"><p style="margin-bottom:0px;">LoremIpsum > LoremIpsum > <?=$list->title?></p></div></div>
</section>
</div>


<section class="mt40 mb50">
    <div class="container">
    <div class="row ht">
                <div class="col-md-8">  
          
<div class="blogback mt40" id="profile">
      <?=$list->description?>
<p>₹  <?=$list->price?></p>
<div class="knhealth"><a href="" class="kncon">Book Health Checkup </a></div>  
</div>


</div>
         <div class="col-md-4">
            <div class="doctalkbox">
            <h4 class="blueab">Related Health checkups</h4>

            <hr class="dochr">
       <?php $health_checkup = $this->db->get('health_checkup')->result();
        foreach($health_checkup as $key=>$value){
        ?> 
         <div class="healthchbox">
      <img src="<?=base_url('uploads/')?>images/health.png" class="imgwdth1" style="width:100%;">
      <div class="boxcon1">
               <h5 class="blk"><?=$value->title?></h5>
               <p>₹ <?=$value->price?></p>
              <div class="knmore"><a href="<?=base_url('checkup-details/'.$value->slug)?>" class="kncon">Know More</a></div>
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