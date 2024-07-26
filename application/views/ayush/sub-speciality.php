<style>
  .tab {
    float: left;
     border: none; 
    background: none;
    width: 30%;
    height: 289px;
    margin-right: 49px;
}
.tabsp {
    background: #e9ecef75;
    padding: 30px 0px 12px 10px;
    border-radius: 8px;
    margin-bottom: 33px;
}
/* Style the buttons inside the tab */
.tab button {
        background: #e9ecefab;
  display: block;
    box-shadow: 0px 1px 5px 0px #8080808c;
  color: black;
    padding: 12px 24px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
      margin: 15px 0px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

.tab button.active {
    background-color: #0d7ca0;
    box-shadow: 0px 1px 5px 0px #8080808c;
    color: #fff;
}

/* Style the tab content */
.tabcontent {
    
    padding: 0px 11px;
    /* border: 1px solid #ccc; */
    width: 100%;
    border-left: none;
    height: 245px;
    /* padding-left: 16px; */
}
</style> 
 
 <div class="content">
 <section class="innerbgbanners" style=" background: #0d7ca0;
    height: 143px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    border-radius: 12px;">
 <div class="container">
     <div >
     <h2 class="blueab overlaps text-center" style="color:#fff;    padding-top: 2%;"><?=$sub_speciality->title?></h2>

    </div>
      </div>
      <div class="main bedcrum1s text-center" style="    margin-top: 1%;"><div class="container"><p style="margin-bottom:0px;">LoremIpsum > LoremIpsum > LoremIpsum</p></div></div>
</section>
</div>
   
   <section class="ptsec">
       
       <div class="container">
           <div class="row">
         <div class="col-md-7"><div class="pd10"><?=$sub_speciality->description?></div></div>
                   <div class="col-md-5"> <img src="<?=base_url()?><?=$sub_speciality->image?>" class="imgwdth" style="width:100%;"></div>
</div>
       </div>
   </section>
     <section style="    background: #e9ecefbd;
    padding: 25px 0px 52px;
    margin-bottom: 25px;
    border-radius: 10px;">
    <div class="container">
 <h2 class="blueab blueabs text-center">Procedure</h2>
   
       
  
   <?php $blogs = json_decode($sub_speciality->blogs);
                        foreach(array_chunk($blogs,3) as $key=>$blog){?>
        
          <?php 
                        foreach($blog as $b){
                        $blog = $this->db->get_where('front_cms_procedures_list',array('id'=>$b))->row();
                                
                                ?>
  <button class="accordion">    <?=$blog->title?></button>
<div class="panel">
 <?=$blog->description?>
</div>

   <?php } ?>
      <?php } ?>
</div></section>



<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
    

