
<style>
    .btn-primary {
    color: #fff;
    background-color: #1f5c9e;
    border-color: #fff;
}
.page-title {
  
    padding: 100px 14px 100px;}
.page-breadcrumb {
    padding: 5px;
    font-size: 15px;
    line-height: initial;
}
.page-breadcrumb li {
    position: relative;
    display: inline-block;
    color: #1f5c9e;
    font-size: 12px;
}
.breadcrum {
    background: #f1f1f1;
    margin-top: -5px;
    text-align: center;
}
.team-block-two.col-lg-3.col-md-6.col-sm-12.wow.fadeInUp.animated {
    padding: 0px 45px;
}
@media only screen and (min-device-width : 320px) and (max-device-width : 480px){
    .evawhel {
    padding-left: 25px;
    padding-right: 25px;
}}
</style>
<!DOCTYPE html>


        <!--Page Title-->
        <section class="page-title" style="background-image: url(<?=base_url('assets/aig/')?>image/doctor/doctorbanner.png);">
            <div class="auto-container">
                <div class="title-outer">
                    <h1 style="color:#fff;">Our Doctors</h1>
                   
                </div>
            </div>
        </section>
         <section class="breadcrum"> <div class="page-breadcrumb" >
                    <li ><a href="https://greencarehealth.com/aighospital/">Home</a> / <span >Our Doctors</span></li>
                </div></section>
        <!--End Page Title-->

        <!-- Team Section Two -->
        <section class="team-section-two alternate alternate2">
            <div class="auto-container evawhel">
                <div class="row">
                      
                    <div class="col-md-8 col-xs-12"></div>
                    <div class="col-md-4 col-xs-12">
                        <div class="sec-title">
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Filter By Speciality</label>
                                <select class="form-control" id="exampleFormControlSelect1" onchange="document.location.href=this.value">
                                    <option  disabled selected hidden>Select location</option>
                                <?php $locations = $this->db->get('location')->result();
                                    foreach($locations as $value){
                                ?>    
                                  <option value="<?=base_url('doctors?speciality='.$value->id)?>" <?php if($value->id == $location_id) echo "selected";?>><?=$value->name?></option>
                                  <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Filter By Speciality</label>
                                <select class="form-control" id="exampleFormControlSelect1" onchange="document.location.href=this.value">
                                    <option  disabled selected hidden>Select Speciality</option>
                                <?php $speciality = $this->db->get('front_cms_services_list')->result();
                                    foreach($speciality as $value){
                                ?>    
                                  <option value="<?=base_url('doctors?speciality='.$value->id)?>" <?php if($value->id == $speciality_id) echo "selected";?>><?=$value->title?></option>
                                  <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="row list1">

                    <!-- Team Block -->
                    <?php foreach($doctors as $doctor){?>
                        <div class="team-block-two col-lg-2 col-md-6 col-sm-12 wow fadeInUp list-element1">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="<?=base_url('doctor-profile/'.$doctor['id'])?>"><img src="<?=base_url('uploads/images/staff/'.$doctor['photo'])?>" alt=""></a>
                                    </figure>
                                </div>
                                <div class="info-box">
                                    <h5 class="name"><a href="<?=base_url('doctor-profile/'.$doctor['id'])?>"><?=$doctor['name']?></a></h5>
                                    <span class="designation"><?=$doctor['designation_name']?> - <?=$doctor['department_name']?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    

                </div>
                        <div class="btn-box" style="margin-top: 30px;">
            <center><button class="theme-btn btn-style-one bg-kellygreen" id="loadmore" <?php if(count($doctors) < 10){ echo 'style="display:none"';  }?>><span class="btn-title">Load More</span></button></center>
            </div></div>
        </section>
        <!--End Team Section -->


        

