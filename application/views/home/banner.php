<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- <section class="banner">
<div class="container-banner">
  <img class="logo_banner" src="<?= base_url('public')?>/assets/img/logo.png"" alt=""> -->

        <!-- <h1>Shammi'S Namkeen</h1>
        <p>
          The Perfect choice Snack like princess / Krispy Crunches / Snappy
          snacks / Munchers stop / Snacks n munchies / Krunch me snack / Crispy
          Chew / Dose of snacks / Spicy treats
        </p> -->
        
      <!-- </div>
</section> -->

<style>
  .container {
  transition: all 0.5s;
  user-select: none;
  width: 100%;
  height: 37vw;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-size: cover;
  background-color: none;
  background-position: center;
  background-repeat: no-repeat;
  margin-top:7rem;
  /* margin-bottom :2rem; */
}

.container button {
  background-color: whitesmoke;
  color: black;
  border: none;
  cursor: pointer;
  font-size: 5rem;
  text-align: center;
}

/* @media screen and (max-width:578px) {
  .container {
    
   height:71vmin !important;
    margin-bottom: -10rem;

  }
}
@media screen and (max-width:980px) {
  .container {
    height: 62vmin !important;
    margin-bottom:-10rem;
  }
}
@media screen and (max-width:360px) {
  .container {
    
   height:78vmin !important;*/
     /* margin-bottom: -10rem;  */
  }
  } */
</style>

<div id="background" class="container">
  <button id="leftArrow" onclick="decrement();">&larr;</button>
  <button id="rightArrow" onclick="increment();">&rarr;</button>

</div>

<script>
  let count = 0;
let leftArrow = document.getElementById("leftArrow");
let rightArrow = document.getElementById("rightArrow");

const backgroundArray = [
 'url('+"<?php echo base_url('public/assets/img/banner1.jpg')?>"+')',
  'url('+"<?php echo base_url('public/assets/img/banner2.jpg')?>"+')',
    'url('+"<?php echo base_url('public/assets/img/banner2.jpg')?>"+')',
];

updateCarousel();

function decrement() {
  count--;
  updateCarousel();
}

function increment() {
  count++;
  updateCarousel();
}

function updateCarousel() {
  if (count > 5) {
    rightArrow.style.visibility = "hidden";
  } else if (count <= 5) {
    rightArrow.style.visibility = "visible";
  }

  if (count <= 0) {
    leftArrow.style.visibility = "hidden";
  } else if (count > 0) {
    leftArrow.style.visibility = "visible";
  }

  document.getElementById("background").style.backgroundImage =
    backgroundArray[count];
}

</script>