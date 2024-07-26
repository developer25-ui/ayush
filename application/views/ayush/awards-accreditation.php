<div class="content">
    <section class="innerbgbanners">
 <div class="container">
     <div >
     <h2 class="blueab overlaps">Awards & Accreditation</h2>
     <p class="justify blk">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem <br>Ipsum has been the industry's </p>
    </div>
      </div>
      <div class="main bedcrum1s"><div class="container"><p style="margin-bottom:0px;">LoremIpsum > LoremIpsum > LoremIpsum</p></div></div>
</section>
 
</div>

 

<section class="mt50 mb50">
    <div class="container">
        <div class="row">
            
             <?php $awards = $this->db->get('award')->result();
        foreach($awards as $key=>$award){
        ?>  
        <div class="col-md-3">
        <img id="myImg" src="<?=base_url()?><?=$award->banner_image?>" alt="Snow" style="width:100%;max-width:300px">
<p class="docvdo text-center"><?=$award->page_title?></p>
        <!-- The Modal -->
        <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
        </div>
        </div>
   <?php } ?>
       
        
      
        </div>
      </div>
  
 
</section>
