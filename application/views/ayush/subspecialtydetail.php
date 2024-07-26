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
     <h2 class="blueab overlaps text-center" style="color:#fff;    padding-top: 2%;">Subspecialty</h2>

    </div>
      </div>
      <div class="main bedcrum1s text-center" style="    margin-top: 1%;"><div class="container"><p style="margin-bottom:0px;">LoremIpsum > LoremIpsum > LoremIpsum</p></div></div>
</section>
</div>
   
   <section class="ptsec">
       
       <div class="container">
           <div class="row">
         <div class="col-md-7"><div class="pd10"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div>
                   <div class="col-md-5"> <img src="https://venturezenith.com/aighospital1/assets/aig/image/departmentover.png" class="imgwdth" style="width:100%;"></div>
</div>
       </div>
   </section>
     <section style="    background: #e9ecefbd;
    padding: 25px 0px 52px;
    margin-bottom: 25px;
    border-radius: 10px;">
    <div class="container">
 <h2 class="blueab blueabs text-center">Procedure</h2>
        <div class="accordion mt25" id="accordionPanelsStayOpenExample">
 <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
 Comprehensive Range of Cardiac Services
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
Advanced Technology and Infrastructure
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
      Highly Experienced and Skilled Cardiologists
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s       Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>

    </div>
  </div>
</div></div></section>
  


    
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
