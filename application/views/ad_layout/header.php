<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->session->userdata('status')!=='success'){
    header('Location:'.base_url('admin'));
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- index.html  Tue, 07 Jan 2020 03:35:33 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Sammi Namkeen</title>
<link rel="shortcut icon" href="<?= base_url('public')?>/assets/img/logo.png" type="image/x-icon">
<script src="<?= base_url()?>public/admin/jquery-3.6.0.min.js"></script>

<!-- General CSS Files -->
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/modules/fontawesome/css/all.min.css">

<!-- CSS Libraries -->
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/modules/jqvmap/dist/jqvmap.min.css">
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/modules/summernote/summernote-bs4.css">
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

<!-- Template CSS -->
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/css/style.min.css">
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/css/components.min.css">
<!-- data table -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<!-- alert -->

<link href="<?= base_url('public')?>/assets/Notification/iao-alert.css" rel="stylesheet" type="text/css">
<!-- css ladda loder -->
<link rel="stylesheet" href="<?= base_url()?>public/loder/ladda-themeless.min.css">
<script src="<?= base_url()?>public/loder/spin.min.js"></script>
<script src="<?= base_url()?>public/loder/ladda.min.js"></script>

</head>
<body class="layout-4">
<!-- Page Loader -->
<!-- <div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div> -->
<!-- aap start -->

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        