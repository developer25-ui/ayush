<div class="content">
     <section class="innerbgbanners">
 <div class="container">
     <div >
     <h2 class="blueab overlaps">TPA & Insurance</h2>
     <p class="justify blk">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem <br>Ipsum has been the industry's </p>
    </div>
      </div>
      <div class="main bedcrum1s"><div class="container"><p style="margin-bottom:0px;">LoremIpsum > LoremIpsum > LoremIpsum</p></div></div>
</section>
</div>



<section class="mt50 mb50 pt40">
  
<div class="main ptb100">
  <div class="container">
      <div class="tabtp">
  <button class="tablinks" onclick="openCity(event, 'London')">GIPSA Associates</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Third Party Administration</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Private Insurance Companies</button>
</div>

<div id="London" class="tabcontent" style="display:block;">
    <div class="row">
            <?php foreach($mic as $value){?>
        <div class="col-md-3"> 
       <div class="spboxs zoom-in">
               <img src="<?=base_url($value['banner_image'])?>" class="imgwdth" style="width:100%;">
              </div>
               <div class="boxhd"><a href="<?=$value['content']?>" target="_blank"><?=$value['page_title']?> </a></div></div>
         <?php } ?>
       
      
    </div>
 </div>

 <div id="Paris" class="tabcontent">
<div class="row">
        <div class="col-md-3"> 
        <div class="spboxs zoom-in">
        <img src="<?=base_url('uploads/')?>images/logocl.jpeg" class="imgwdth" style="width:100%;">
        </div></div>
         <div class="col-md-3"> 
        <div class="spboxs zoom-in">
        <img src="<?=base_url('uploads/')?>images/logocl.jpeg" class="imgwdth" style="width:100%;">
        </div></div>
         <div class="col-md-3"> 
       <div class="spboxs zoom-in">
               <img src="<?=base_url('uploads/')?>images/year.jpeg" class="imgwdth" style="width:100%;">
              </div></div>
         <div class="col-md-3"> 
        <div class="spboxs zoom-in">
        <img src="<?=base_url('uploads/')?>images/logocl.jpeg" class="imgwdth" style="width:100%;">
        </div></div>
    </div>
</div>
<div id="Tokyo" class="tabcontent">
 <div class="row">
        <div class="col-md-3"> 
        <div class="spboxs zoom-in">
        <img src="<?=base_url('uploads/')?>images/logocl.jpeg" class="imgwdth" style="width:100%;">
        </div></div>
         <div class="col-md-3"> 
        <div class="spboxs zoom-in">
        <img src="<?=base_url('uploads/')?>images/logocl.jpeg" class="imgwdth" style="width:100%;">
        </div></div>
         <div class="col-md-3"> 
        <div class="spboxs zoom-in">
        <img src="<?=base_url('uploads/')?>images/logocl.jpeg" class="imgwdth" style="width:100%;">
        </div></div>
         <div class="col-md-3"> 
       <div class="spboxs zoom-in">
               <img src="<?=base_url('uploads/')?>images/year.jpeg" class="imgwdth" style="width:100%;">
              </div></div>
    </div>
</div>
  </div>
</div>

 
</section>