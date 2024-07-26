<footer class="mb15">
<div class="container">
    <div class="row">
        <div class="col-md-5">
        <div class="logoft">
            <img src="<?=base_url('uploads/')?>images/logo.png" class="logoft">
            <p class="wht">Lorem Ipsum is simply dummy text of the printing <br>and typesetting industry. Lorem Ipsum is simply dummy text of the printing <br>and typesetting industry. 
            Lorem Ipsum is simply dummy text of the printing <br>and typesetting industry. 
        </p>
         <p class="wht"><B class="wht">Address : </B> Lorem Ipsum is simply dummy text of the printing</p>
        <p class="wht"><B class="wht">Email : </B> ayush@gmailcom</p>
             <div class="socftcol">
           
            <a href="#" class="wht un socialiocn1" ><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#" class="wht un socialiocn"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href="#" class="wht un socialiocn"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                <a href="#" class="wht un socialiocn"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        </div>
        </div>
    </div>
    <div class="col-md-2 mt53">
        <div class="ftcol">
            <p class="mb2"><span class="wht ftsize">Patient Portal</span></p>
            <p class="mb2">
            <a href="#" class="wht un">Health Checkup</a></p>
              <p class="mb2"><a href="#" class="wht un">TPA & Insurance</a></p>
              <p class="mb2">
              <a href="#" class="wht un">Patient Rights & Responsibilities</a></p>
              <p class="mb2">
                <a href="#" class="wht un">Estimate Request</a></p>
                 <p class="mb2">
            <a href="#" class="wht un">Feedback</a></p>
              <p class="mb2"><a href="#" class="wht un">Success Stories</a></p>
            
        </div>
    </div>
   <div class="col-md-2 mt53">
        <div class="ftcol">
            <p class="mb2"><span class="wht ftsize">About Us</span></p>
            <p class="mb2">
            <a href="#" class="wht un">Overview</a></p>
              <p class="mb2"><a href="#" class="wht un">Vision & Mission</a></p>
              <p class="mb2">
              <a href="#" class="wht un">Our Values</a></p>
              <p class="mb2">
                <a href="#" class="wht un">Leadership Team</a></p>
                 <p class="mb2">
            <a href="#" class="wht un">Awards & Accreditation</a></p>
              <p class="mb2"><a href="#" class="wht un">Our Journey</a></p>
              <p class="mb2">
              <a href="#" class="wht un">Virtual Tour</a></p>
         

        </div>
    </div>
    <div class="col-md-3 mt53">
        <div class="ftcol">
            <p class="mb2"><span class="wht un ftsize">Schemes</span></p>
            <p class="mb2">
            <a href="#" class="wht un">Janani Shishu Suraksha Karyakram</a></p>
              <p class="mb2"><a href="#" class="wht un">Rastriya Swasthya Bima Yojna</a></p>
              <p class="mb2">
              <a href="#" class="wht un">Mukhyamantri Amrutam Yojna</a></p>
              <p class="mb2">
                <a href="#" class="wht un">PM-JAY / Ayushman Bharat</a></p>
        
        </div>
           <div class="ftcol mt30">
            <p class="mb2"><span class="wht un ftsize">Helpful Links</span></p>
            <p class="mb2">
            <a href="#" class="wht un">Blogs</a></p>
              <p class="mb2"><a href="#" class="wht un">Sitemap</a></p>
              <p class="mb2">
              <a href="#" class="wht un">Privacy Policy</a></p>
              <p class="mb2">
                <a href="#" class="wht un">Terms and Conditions</a></p>
                  <p class="mb2">
                <a href="#" class="wht un">Information on Consumables</a></p>
                   <p class="mb2">
                <a href="#" class="wht un">Information on Implants</a></p>
        
        </div>
    </div>
    </div>
    </div>
    <hr class="copy">
    <bottom><p class="wht text-center"> All Copyrights Reserved. © 2024 Ayush.com | Design & Developed by HashTAGit</p></bottom>
</footer>
</div>
</div>

</div>























<script type="text/javascript">var tabs = document.querySelectorAll(".tabs_wrap ul li");
var males = document.querySelectorAll(".male");
var females = document.querySelectorAll(".female");
var all = document.querySelectorAll(".item_wrap");

tabs.forEach((tab)=>{
    tab.addEventListener("click", ()=>{
        tabs.forEach((tab)=>{
            tab.classList.remove("active");
        })
        tab.classList.add("active");
        var tabval = tab.getAttribute("data-tabs");

        all.forEach((item)=>{
            item.style.display = "none";
        })

        if(tabval == "male"){
            males.forEach((male)=>{
                male.style.display = "block";
            })
        }
        else if(tabval == "female"){
            females.forEach((female)=>{
                female.style.display = "block";
            })
        }
        else{
            all.forEach((item)=>{
                item.style.display = "block";
            })
        }

    })
})</script>
<script type="text/javascript">
    let parent = document.querySelector('.sticky').parentElement;

while (parent) {
  const hasOverflow = getComputedStyle(parent).overflow;
  if (hasOverflow !== 'visible') {
    console.log(hasOverflow, parent);
  }
  parent = parent.parentElement;
}
</script>
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

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
</script>



<script>
    // Just added bootstrap v4.5 css
// You don't need any other library to run this counter
const animationDuration = 3000;

const frameDuration = 1000 / 60;

const totalFrames = Math.round( animationDuration / frameDuration );

const easeOutQuad = t => t * ( 2 - t );

const animateCountUp = el => {
	let frame = 0;
	const countTo = parseInt( el.innerHTML, 10 );
	
	const counter = setInterval( () => {
		frame++;

		const progress = easeOutQuad( frame / totalFrames );

		const currentCount = Math.round( countTo * progress );


		if ( parseInt( el.innerHTML, 10 ) !== currentCount ) {
			el.innerHTML = currentCount;
		}

		if ( frame === totalFrames ) {
			clearInterval( counter );
		}
	}, frameDuration );
};

	const countupEls = document.querySelectorAll( '.timer' );
	countupEls.forEach( animateCountUp );

</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>