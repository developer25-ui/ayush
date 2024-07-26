<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <meta name="robots" content="">

  <title><?php echo ($seo_content->page_title) ? $seo_content->page_title : 'Ayush'; ?></title>
    <META NAME="description" CONTENT="<?php echo ($seo_content->meta_description) ? $seo_content->meta_description : 'Ayush'; ?>"/>
    <META NAME="keywords" CONTENT="<?php echo ($seo_content->meta_keyword) ? $seo_content->meta_keyword : 'Ayush'; ?>"/>
    <META NAME="news_keywords" CONTENT="<?php echo ($seo_content->news_keywords) ? $seo_content->news_keywords : 'Ayush'; ?>"/>
    <META NAME="abstract" CONTENT="<?php echo ($seo_content->meta_abstract) ? $seo_content->meta_abstract : 'Ayush'; ?>"/>
    <META NAME="dc.source" CONTENT="<?php echo ($seo_content->dc_source) ? $seo_content->dc_source : 'Ayush'; ?>"/>
    <META NAME="dc.title" CONTENT="<?php echo ($seo_content->dc_title) ? $seo_content->dc_title : 'Ayush'; ?>"/>
    <META NAME="dc.keywords" CONTENT="<?php echo ($seo_content->dc_keywords) ? $seo_content->dc_keywords : 'Ayush'; ?>"/>
    <META NAME="dc.description" CONTENT="<?php echo ($seo_content->dc_description) ? $seo_content->dc_description : 'Ayush'; ?>"/>
    <link rel="canonical" href="<?php echo ($seo_content->canonical) ? $seo_content->canonical : 'Ayush'; ?>"/>
    <link rel="alternate" hreflang="en-us" href="<?php echo ($seo_content->alternate) ? $seo_content->alternate : 'Ayush'; ?>" />
    
    <META NAME="robot" CONTENT="<?php echo ($seo_content->robot) ? $seo_content->robot : 'Ayush'; ?>"/>
    <META NAME="copyright" CONTENT="<?php echo ($seo_content->copyright) ? $seo_content->copyright : 'Ayush'; ?>"/>
    <META NAME="author" CONTENT="<?php echo ($seo_content->author) ? $seo_content->author : 'Ayush'; ?>"/>
    <meta property="og:locale" content="<?php echo ($seo_content->og_locale) ? $seo_content->og_locale : 'Ayush'; ?>"/>
    <meta property="og:type" content="<?php echo ($seo_content->og_type) ? $seo_content->og_type : 'Ayush'; ?>"/>
    
    <meta property="og:title" content="<?php echo ($seo_content->og_title) ? $seo_content->og_title : 'Ayush'; ?>"/>
    <meta property="og:description" content="<?php echo ($seo_content->og_description) ? $seo_content->og_description : 'Ayush'; ?>"/>
    <meta property="og:url" content="<?php echo ($seo_content->og_url) ? $seo_content->og_url : 'Ayush'; ?>"/>
    <meta property="og:site_name" content="<?php echo ($seo_content->og_site_name) ? $seo_content->og_site_name : 'Ayush'; ?>"/>
    <meta property="og:image" content="<?php echo ($seo_content->og_image) ? $seo_content->og_image : 'Ayush'; ?>"/>
    <meta property="fb:admins" content="<?php echo ($seo_content->fb_admins) ? $seo_content->fb_admins : 'Ayush'; ?>"/>
    
       <!-- for Twitter -->
    <meta name="twitter:card" content="<?php echo ($seo_content->twitter_card) ? $seo_content->twitter_card : 'Ayush'; ?>"/>
    <meta name="twitter:site" content="<?php echo ($seo_content->twitter_site) ? $seo_content->twitter_site : 'Ayush'; ?>"/>
    <meta name="twitter:creator" content="<?php echo ($seo_content->twitter_creator) ? $seo_content->twitter_creator : 'Ayush'; ?>"/>
    <meta name="twitter:title" content="<?php echo ($seo_content->twitter_title) ? $seo_content->twitter_title : 'Ayush'; ?>"/>
    <meta name="twitter:description" content="<?php echo ($seo_content->twitter_description) ? $seo_content->twitter_description : 'Ayush'; ?>"/>
    <meta name="twitter:image:src" content="<?php echo ($seo_content->twitter_image_src) ? $seo_content->twitter_image_src : 'Ayush'; ?>"/>
    <meta name="canonical" href="<?php echo ($seo_content->twitter_canonical) ? $seo_content->twitter_canonical : 'Ayush'; ?>"/>
    
    <!--<article itemscope itemtype="<?php echo ($seo_content->item_type) ? $seo_content->item_type : 'Ayush'; ?>">-->
    <meta itemprop="name" content="<?php echo ($seo_content->item_name) ? $seo_content->item_name : 'Ayush'; ?>"/>
    <meta itemprop="description" content="<?php echo ($seo_content->item_description) ? $seo_content->item_description : 'Ayush'; ?>"/>
    <meta itemprop="url" content="<?php echo ($seo_content->item_url) ? $seo_content->item_url : 'Ayush'; ?>"/>
    <meta itemprop="image" content="<?php echo ($seo_content->item_image) ? $seo_content->item_image : 'Ayush'; ?>"/>
    <meta itemprop="author" name="<?php echo ($seo_content->item_author) ? $seo_content->item_author : 'Ayush'; ?>"/>
    <meta itemprop="organization" name="<?php echo ($seo_content->item_organization) ? $seo_content->item_organization : 'Ayush'; ?>"/>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/ayush/')?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/ayush/')?>css/responsive.css">
   <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('uploads/')?>images/favicon.ico" />
<link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('uploads/')?>images/favicon.ico" />
<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('uploads/')?>images/favicon.ico" />
<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('uploads/')?>images/favicon.ico" />
<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('uploads/')?>images/favicon.ico" />
<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('uploads/')?>images/favicon.ico" />
<link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('uploads/')?>images/favicon.ico" />
<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('uploads/')?>images/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('uploads/')?>images/favicon.ico" />
<link rel="icon" type="image/png" sizes="192x192" href="<?=base_url('uploads/')?>images/favicon.ico" />
<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('uploads/')?>images/favicon.ico" />
<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('uploads/')?>images/favicon.ico" />
<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('uploads/')?>images/favicon.ico" />     
  <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('uploads/')?>images/favicon.ico"/>
  
</head>








<style>
   
  .zoom {
    /* Allow zooming up to 200% */
    zoom: 100%;
    /* Transition for smooth zooming */
    transition: zoom 0.2s ease-in-out;
  }
  
</style>






<body>



<div id="feedback" class="text-center">
      <a href="#" target="blank" class="btn btn-default btn-rounded mb-4" >Book An Appointment</a>
    </div>  
    <div id="feedback1" class="text-center">
      <a href="#" target="blank" class="btn btn-default btn-rounded mb-4" > Video Consultation</a>
    </div> 
    <div id="feedback2" class="text-center">
      <a href="#" target="blank" class="btn btn-default btn-rounded mb-4" >Emergency Care</a>
    </div> 
    <div class="main mt15">

  <header class="header" id="myHeader">
    <nav class="navbar navbar-expand-lg navbar-light bg-wht bg-blue">
  <div class="container">
  
    <div class="collapse navbar-collapse " >
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 zoom">
           
         <li class="nav-item">

          <a class="nav-link" href="#" style="color:#fff;"><i class="fa fa-envelope mr10" aria-hidden="true" style="color:#fff;"></i>medical.admin@email.com </a>
        </li>
        <span class="sepr"> | </span>
         <li class="nav-item pt2">
          <a href="tel:+02-856 789 4563" class="numbers"><i class="fa fa-phone" aria-hidden="true"></i> +02-856 789 4563</a>
        </li>
        </ul>
         <div class="text-center mright zoom">
        <ul class="navbar-nav wdth">
           <li class="nav-item lupdates"> Latest Updates </li>
         <li class="nav-item">
<marquee style="margin-top:8px;">Serenity Medical Groupmain A Communities Together</marquee>
        </li>
        </ul>
   
      </div>
      <div class="flright zoom">
       
         <ul class="navbar-nav me-auto mb-2 mb-lg-0 colwht">
       
        <li class="nav-item">
          <a class="nav-link colwht" href="<?=base_url()?>" style="color:#fff;">Home</a>
          
        </li>
          <span class="sepr"> | </span>
         <li class="nav-item">
          <a class="nav-link colwht" href="<?=base_url()?>feedback" style="color:#fff;">Feedback</a>
        </li>
          <span class="sepr"> | </span>
         <li class="nav-item">
          <a class="nav-link colwht" href="<?=base_url()?>careers" style="color:#fff;">Career</a>
        </li>
         <span class="sepr"> | </span>
         <li class="nav-item">
          <a class="nav-link colwht" href="#" style="color:#fff;">HomeCare</a>
        </li>
         <span class="sepr"> | </span>
         <li class="nav-item">
          <a class="nav-link colwht" href="tel:555555555" style="color:#fff;">Emergency Care</a>
        </li>
              <span class="sepr"> | </span>
         <li class="nav-item" style="color:#fff;">
            <select class="nav-link colwht sel classics" style="color:#fff;">
               <option style="color:#000;">Select Location</option>
               <option style="color:#000;">Rajkot</option>
                <option style="color:#000;">Kutch</option>
                <option style="color:#000;">Mehsana</option>
                <option style="color:#000;">Morbi</option>
                 <option style="color:#000;">Surendranagar</option>
            <option style="color:#000;">Jamnagar</option>
           <option style="color:#000;">Junagadh</option>
            </select>
         
        </li>
        
        </ul>
   
      </div>
    </div>
  </div>
</nav>



        <nav class="navbar navbar-expand-lg navbar-light bg-wht" id="primary_nav_wrap">
  <div class="container">
    <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url('uploads/')?>images/logo.png" class="logo" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="formsapxe">
        <div class="wrapperr shadow-all">
            <div class="search-container">
                <div class="input-box">
                <input type="text" placeholder="Search " class="topsearch" />
                </div>
                
                <button type="submit" class="button">    <img src="<?=base_url('uploads/')?>images/search.png" class="sricon"></button>
            </div>
        </div>
    </form>
      </div>
        
      <!--<div class="flright">-->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 collapse navbar-collapse"  id="navbarSupportedContent">
            

        
                <li><a href="#">About Us <img src="<?=base_url('uploads/')?>images/WhatsApp Image 2024-06-10 at 12.12.39 PM.jpeg" class="downarrow"></a> 
                    <ul>
                        <li class="dir"><a href="<?=base_url()?>about-us">Overview</a></li>
                        <li class="dir"><a href="<?=base_url()?>about-us/#vision">Vision & Mission</a></li>
                        <li class="dir"><a href="<?=base_url()?>about-us/#values">Our Values</a></li>
                        <li class="dir"><a href="#">Leadership Team<span class="Open-sub-menu">&#8250;</span></a>
                            <ul >
                                <li class="dir"><a href="<?=base_url()?>leadership">Dummy</a></li>
                                <li class="dir"><a href="<?=base_url()?>directors">Director</a></li>
                                      <li class="dir"><a href="<?=base_url()?>unit-directors">Unit Director</a></li>
                            </ul>
                        </li>
                        <li class="dir"><a href="<?=base_url()?>awards-accreditation">Awards & Accreditation</a></li>
                        <li class="dir"><a href="#">Our Journey</a></li>
                        <li class="dir"><a href="#">Virtual Tour</a></li>
                    </ul>
                </li>
                
                 <li><a href="<?=base_url()?>ourspeciality">Specialites <img src="<?=base_url('uploads/')?>images/WhatsApp Image 2024-06-10 at 12.12.39 PM.jpeg" class="downarrow"></a>
                    <ul>
                        <div class="row hdscroll">
                            
                            <div class="col-md-6">
                                <li class="spsp"><a class="dropdown-item" href="<?=base_url()?>speciality-details">Cardiology</a></li>
                                <li class="spsp"><a class="dropdown-item" href="#">Neuro Surgery</a></li>
                                <li class="spsp"><a class="dropdown-item" href="#">Uro Surgery</a></li>
                                <li class="spsp"><a class="dropdown-item" href="#">Plastic Surgery</a>
                                <li class="spsp"><a class="dropdown-item" href="#">Radiation Oncology</a>
                                <li class="spsp"><a class="dropdown-item" href="#">Orthopedic</a></li>
                                <li class="spsp"><a class="dropdown-item" href="#">Paediatric</a></li>
                            </div>
                            <div class="col-md-6">
                                <li class="spsp"><a class="dropdown-item" href="#">Neuro Surgery</a></li>
                                <li class="spsp"><a class="dropdown-item" href="#">CVTS</a></li>
                                <li class="spsp"><a class="dropdown-item" href="#">Onco Surgery</a></li>
                                <li class="spsp"><a class="dropdown-item" href="#">Oncology</a></li>
                                <li class="spsp"><a class="dropdown-item" href="#">Neurology</a></li>
                                <li class="spsp"><a class="dropdown-item" href="#">Medicine</a></li>
                                <li class="spsp"><a class="dropdown-item" href="#">G. Surgery</a></li>
                            </div>


</div>
                       
                        
                    </ul>
                </li>
                
                <li><a href="#">Schemes <img src="<?=base_url('uploads/')?>images/WhatsApp Image 2024-06-10 at 12.12.39 PM.jpeg" class="downarrow"></a>
                    <ul>
                        <li class="dir"><a class="dropdown-item" href="<?=base_url()?>schemes">Janani Shishu Suraksha Karyakram</a></li>
                        <li class="dir"><a class="dropdown-item" href="#">Rastriya Swasthya Bima Yojna</a></li>
                        <li class="dir"><a class="dropdown-item" href="#">Mukhyamantri Amrutam Yojna</a></li>
                        <li class="dir"><a class="dropdown-item" href="#">PM-JAY / Ayushman Bharat</a></li>
                        
                    </ul>
                </li>
                
                
                <li><a href="<?=base_url()?>doctors">Find a Doctor</a>
                    
                </li>
                <li><a href="#">Patient Portal <img src="<?=base_url('uploads/')?>images/WhatsApp Image 2024-06-10 at 12.12.39 PM.jpeg" class="downarrow"></a>
                    <ul>
                        <li class="dir"><a class="dropdown-item" href="<?=base_url()?>health-checkup">Health Checkup</a></li>
                        <li class="dir"><a class="dropdown-item" href="<?=base_url()?>tpa">TPA & Insurance</a></li>
                        <li class="dir"><a class="dropdown-item" href="<?=base_url()?>patientsrights-responsibilities">Patient Rights & Responsibilities</a></li>
                        <li class="dir"><a class="dropdown-item" href="<?=base_url()?>estimate-request">Estimate Request</a></li>
                        <li class="dir"><a class="dropdown-item" href="<?=base_url()?>feedback">Feedback</a></li>
                        <li class="dir"><a class="dropdown-item" href="<?=base_url()?>success-stories">Success Stories</a></li>
                        <li class="dir"><a class="dropdown-item" href="<?=base_url()?>client-review">Client Reviews</a></li>
                        
                    </ul>
                </li>
                
                <li><a href="#">Knowledge Center <img src="<?=base_url('uploads/')?>images/WhatsApp Image 2024-06-10 at 12.12.39 PM.jpeg" class="downarrow"></a>
                    <ul>
                        <li><a class="dropdown-item" href="<?=base_url()?>doctor-talks">Doctor's Talk</a></li>
                        <li><a class="dropdown-item" href="<?=base_url()?>pr">PR</a></li>
                        <li><a class="dropdown-item" href="<?=base_url()?>blogs">Blogs</a></li>
                        <li><a class="dropdown-item" href="<?=base_url()?>event-gallery">Events & Gallery </a></li>

                              
                    </ul>
                </li>
                <li><a href="<?=base_url()?>contact">Contact</a>
                </li>
                

      <!--</div>-->
    </div>
 
</nav>
    </header>