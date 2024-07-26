<div class="content">
   <section class="innerbgbanners">
 <div class="container">
     <div >
       <h2 class="blueab overlaps">Health Checkup</h2>
     <p class="justify blk">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem <br>Ipsum has been the industry's </p>
    </div>
      </div>
      <div class="main bedcrum1s"><div class="container"><p style="margin-bottom:0px;">LoremIpsum > LoremIpsum > LoremIpsum</p></div></div>
</section>
</div>

 

<section class="mt50 mb50">
    <div class="container">
     <div class="row">
<?php foreach($list as $value){?>
            <div class="col-md-3">
                <div class="healthchbox">
      <img src="<?=base_url('uploads/')?>images/health.png" class="imgwdth1" style="width:100%;">
      <div class="boxcon1">
               <h5 class="blk"><?=$value->title?></h5>
               <p>₹ <?=$value->price?></p>
              <div class="knmore"><a href="<?=base_url('checkup-details/'.$value->slug)?>" class="kncon">Know More</a></div>
           </div>
       </div>
  </div>
   
        <?php } ?>  
 

  
  
  </div>
       </div>
 
</section>