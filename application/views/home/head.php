<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suresh Namkeen</title>
    <script src="<?= base_url()?>public/admin/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" href="<?= base_url('public')?>/assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <script src="<?= base_url('public')?>/assets/js/jquery-3.6.0.min.js"></script>  
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('public')?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('public')?>/assets/css/css_2.css">
    <!-- alert -->
    <script src="<?= base_url('public')?>/assets/Notification/iao-alert.jquery.js"></script>
    <!-- loder -->

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- alert -->

    <link href="<?= base_url('public')?>/assets/Notification/iao-alert.css" rel="stylesheet" type="text/css">
    <!-- css ladda loder -->
    <link rel="stylesheet" href="<?= base_url()?>public/loder/ladda-themeless.min.css">
    <script src="<?= base_url()?>public/loder/spin.min.js"></script>
    <script src="<?= base_url()?>public/loder/ladda.min.js"></script>
    <style>
      .head_logo{
        position:absolute;
        margin-top: -6.5rem;
        width:13rem;
      }
    </style>
    
</head>

<body>
  <!-- header section starts  -->
  <header class="header">
  <!-- <i class="fas fa-shopping-basket"> </i>-->
    <a href="<?= base_url()?>" class="logo"> <img class="head_logo" src="<?= base_url('public')?>/assets/img/logo.png" alt="logo"></a>
    <nav class="navbar" style="right:-110%;">
        <a href="<?= base_url()?>" class="home">home</a>
        <a href="<?= base_url('product')?>" class="home">Product</a>
        <a href="<?= base_url('about')?>" class="home">about</a>
        <a href="<?=base_url('carrear/carrear')?>" class="home">career</a>
        <a href="<?= base_url('query/query_us')?>" class="home">business query</a>
        <a href="<?= base_url('query/contact')?>" class="home">contact us</a>
    </nav>
    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <!-- <div class="fas fa-search" id="search-btn"></div> -->
        <!-- <div class="fas fa-user" id="login-btn"></div> -->
    </div>
    <form action="" method="post" class="search-form"  style="right:-110%;">
       <input type="search" name="search_box" class="search-box" id="search-box" placeholder="Search here..." autocomplete="off">
       <label for="search-box" class="fa fa-search"></label>
    </form>
    <form action=""  class="login-form" method="post" style="display:none;">
    <!-- login -->
    <?php if (!isset($_SESSION['status'])) { ?>
      <h3>login now</h3>
      <input type="email" name="emai_id" id="email" class="box" placeholder="Enter your email address" autocomplete="off">
      <input type="password" name="user_password" id="user_password" class="box" placeholder="Enter your Password" autocomplete="off">
      <p>otp Login <a href="">Click Here</a> for otp</p>
      <button type="submit" class="btn">Login..</button>

      <?php  # code...
      } ?>
      <!-- profile -->
      <?php if (isset($_SESSION['status']) && $_SESSION['status']=='success') { ?>
        <h4>Hi <?=profile()['first_name']?></h4>
        <p> For Dashboard <a href="<?= base_url('user/dashboard')?>">Click Here</a> </p>
        <p> For Logout <a href="<?= base_url('login/logout/userCheck')?>">Click Here</a> </p>
      <?php  # code...
      } ?>
    </form>
  </header>

<!-- end header section starts  -->  