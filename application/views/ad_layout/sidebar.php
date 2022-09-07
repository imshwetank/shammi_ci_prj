<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Start main left sidebar menu -->
<div class="main-sidebar sidebar-style-3">
            <aside id="sidebar-wrapper sidebar" id="sidebar">
                <div class="sidebar-brand">
                    <a href="#">Shammi</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="#">SM</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <!-- active -->
                    <li class="dropdown">
                        <!-- has-dropdown  -->
                        <a href="<?= base_url('user/dashboard')?>" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <!-- has-dropdown  -->
                        <a href="<?= base_url('user/features-profile')?>" class="nav-link "><i class="fas fa-id-badge"></i><span>Profile</span></a>
                    </li>
                    <li class="menu-header">All products</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Product</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="<?= base_url('product/all_categories')?>">View All Categories</a></li>
                            <!-- <li><a class="nav-link beep beep-sidebar" href="<?php // base_url('product/add_categories')?>">Add Categories</a></li> -->
                            <li><a class="nav-link" href="<?= base_url('product/view_catelog')?>">Catalog</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="<?= base_url('product/add_product')?>">Add Product</a></li>
                            <li><a class="nav-link beep beep-sidebar" href="<?= base_url('product/upload')?>">Bulk Upload</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-header">Others</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Carrear</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url('carrear/post_job')?>">Post New Job</a></li> 
                            <li><a href="<?= base_url('carrear/all_jobs')?>">View All Jobs</a></li> 
                            <li><a href="<?= base_url('carrear/all_application')?>">View All Applications</a></li> 
                            <!-- <li><a href="<?php // base_url('carrear/job_applay')?>">Applay</a></li>  -->
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i><span>Business Queries</span></a>
                        <ul  class="dropdown-menu">
                            <li><a href="<?= base_url('query/view_query_us')?>">View Queries</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-phone"></i> <span>Contact Us</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url('query/view_contact')?>" > View Contact Us</a></li>
                        </ul>
                    </li>   
                    <li class="dropdown">
                        <a href="<?= base_url('login/logout/userCheck')?>" class="nav-link"><i class="fas fa-power-off"></i> <span>Logout</span></a>
                    </li>
                   
                </ul>
                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fas fa-rocket"></i> Devlopper</a>
                </div>
            </aside>
        </div>



        <!-- <script>
            let current_1 = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
            let current_2 = location.pathname.split("/").slice(-2)[0].replace(/^\/|\/$/g, '');
            current=current_2+"/"+current_1;
            console.log(current);
                $('aside li a', sidebar).each(function() {
                var $this = $(this);
                if (current === "") {
                    //for root url
                    if ($this.attr('href').indexOf(current) !== -1) {
                    $(this).parents('.nav-item').last().addClass('active');
                    if ($(this).parents('.sub-menu').length) {
                        $(this).closest('.collapse').addClass('show');
                        $(this).addClass('active');
                    }
                    }
                } else {
                    //for other url
                    if ($this.attr('href').indexOf(current) !== -1) {
                    $(this).parents('.nav-item').last().addClass('active');
                    if ($(this).parents('.sub-menu').length) {
                        $(this).closest('.collapse').addClass('show');
                        $(this).addClass('active');
                    }
                    }
                }
                })
        </script> -->