<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.mySlides {display: none;}


/* Slideshow container */
.slideshow-container {

  position: relative;
  margin: auto;
}




/* The dots/bullets/indicators */
.dot {
  height: 15px;
  
  width: 15px;
  margin: 0 2px;
  background-color: #f68b21;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.slideshow-container22 .active {
  background-color: #717171;
  
}
.slideshow-container22 {
bottom: 20px;
    position: relative;
    display:none;
    }

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 3s;
}

@keyframes fade {
  from {opacity: 1} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */

</style>
</head>
<body>

<div class="slideshow-container">

<div class="mySlides fade">
  
  <img src="https://ik.imagekit.io/3veo40ctc/phugepackcorp/hero/hero_bg_1_2.jpg" style="width:100%">
  
</div>

<div class="mySlides fade">
  
  <img src="https://ik.imagekit.io/3veo40ctc/phugepackcorp/hero/hero_bg_1_1.jpg" style="width:100%">
 
</div>

<div class="mySlides fade">
 
  <img src="https://ik.imagekit.io/3veo40ctc/phugepackcorp/hero/hero_bg_1_3.jpg" style="width:100%">

</div>

</div>


<div class="slideshow-container22" style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>

</body>
</html> 
