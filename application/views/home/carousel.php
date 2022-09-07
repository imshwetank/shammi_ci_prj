<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
     .carousel {
    padding-bottom: 30px;
    overflow: hidden;
    position: relative;
  }
  .carousel a,
  .carousel a:link,
  .carousel a:visited {
    color: #212121;
    text-decoration: none;
  }
  .carousel{
    margin: 0 auto;
    margin-top:4rem ;
    padding: 0 !important;
    max-width: 1500px;
  }
  
  .micro-slider {
    height: 40vh !important;
    max-height: 400px;
    /* margin: 10px 0; */
    position: relative;
    width: 100%;
  }
  @media screen and (max-width:900px){
    .micro-slider {
    
    max-height: 300px;
    /* margin: 10px 0; */
  }
  .carousel{
    margin-top:2rem !important;
  }
  }
  @media screen and (max-width:500px)  {
    .micro-slider {
    
    max-height: 200px 
    /* margin: 10px 0; */
   
  }
  .carousel{
    margin-top:0 !important
  }
  }
  .micro-slider.fullwidth {
    height: 480px;
    /* margin: 64px 0; */
  }
  .micro-slider.fullwidth .slider-item {
    height: 100% !important;
    line-height: 480px;
    width: 100%
  }
  .slider-wrapper {
    height: 100% !important;;
    perspective: 400px!important;
  }
  .slider-item {
    background: #eee;
    
    color: #FFF;
    display: none;
    font-size: 72px;
    height:auto !important;
   
    left: 0;
    position: absolute;
    text-align: center;
    top: 0;
    width: 30% !important;
    cursor: pointer;
  }
  .slider-item img {
    width: 100%;
    height: 100%;
  }

  .indicators {
    width:100%;
    left: 0 !important;
    margin: 0 !important;
    list-style-type: none;
   
    padding: 0;
    position: absolute;
    display:flex;justify-content: center;align-items: center;
  }
  .indicators li {
    color: #fff;
    float: left;
    height: 16px;
    margin-right: 8px;
    text-align: center;
    width: 16px;
  }
  .indicators{
    display:none !important;
  }
  .indicators li:last-child {margin: 0;}
  .indicators a {
    background: #FFF;
    border-radius: 8px;
    border: 1px solid #E6E9EC;
    color: #FFF;
    display: inline-block;
    height: 16px;
    width: 16px;
  }
  .indicators .active imh {background: #E6E9EC;

    background-repeat: no-repeat;
    background-position: center;
    width: 20rem;
}



  </style>
<section class="carousel">
      <div class="micro-slider">
        <a href="#" class="slider-item s1"  target="_blank" rel="noopener noreferrer"> <img src="<?= base_url('public/assets/')?>img/basen.jpg" alt=""> </a>
        <a href="#" class="slider-item s1"  target="_blank" rel="noopener noreferrer"><img src="<?= base_url('public/assets/')?>img/Classic - Category.jpg" alt=""></a>
        <a href="#" class="slider-item s1"  target="_blank" rel="noopener noreferrer"><img src="<?= base_url('public/assets/')?>img/Roasted - Category.jpg" alt=""></a>
    
      </div>
</section>


<!-- coustom js file link -->
<script src="https://cdn.jsdelivr.net/npm/micro-slider@1.0.9/dist/micro-slider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
<script src="<?= base_url('public')?>/assets/js/script_crousel.js"></script> 
