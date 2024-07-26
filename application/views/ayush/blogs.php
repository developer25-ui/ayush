<div class="content">
     <section class="innerbgbanners">
 <div class="container">
     <div >
     <h2 class="blueab overlaps">Our Blogs</h2>
     <p class="justify blk">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem <br>Ipsum has been the industry's </p>
    </div>
      </div>
      <div class="main bedcrum1s"><div class="container"><p style="margin-bottom:0px;">LoremIpsum > LoremIpsum > LoremIpsum</p></div></div>
</section>
</div>
<section class="mt40 mb50">
    <div class="container">
    <div class="row ht">

         <?php $blogs = $this->db->get('front_cms_blogs')->result();
        foreach($blogs as $key=>$blog){
        ?>  

        <div class="col-md-6 boxblogs"><div class="row blogright mt30">
                    <div class="col-md-4">
                        <img src="<?=base_url('uploads/images/blogs/'.$blog->image)?>" class="imgwidth" alt="">
                        
                    </div>
                     <div class="col-md-8">
                        <div class="blogrhtcon">
                        <p class="bldate"><?=date('d F Y', strtotime($blog->created_at));?></p>
                       <p class="blogvdo"><?=$blog->patient_name?></p>
                        <p class="ptb10"><?=substr_replace($blog->description, "...", 50)?></p>
                        <div class="knmore"><a href="<?=base_url('blogs/'.$blog->surname)?>" class="kncon">Know More</a></div>
                         </div>
                     </div>
                </div></div>

                <?php } ?>

             

           </div>
       </div>
 
</section>