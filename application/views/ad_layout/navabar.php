<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Start app top navbar -->
<nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                </ul>
               
            </form>
            <ul class="navbar-nav navbar-right">
                
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="<?= base_url()?>public/admin/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hi, <?=profile()['first_name']?></div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">Logged in 5 min ago</div>
                        <a href="<?= base_url()?>user/features-profile" class="dropdown-item has-icon"><i class="far fa-user"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('login/logout/userCheck')?>" class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </nav>