<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getBy['data']='1';
$data=$this->Dashboard_m->business_count();
$data2=$this->Dashboard_m->business_pend($getBy);
?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                        <div class="card-stats-title">Business Query
                            <!-- <div class="dropdown d-inline">
                            <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                            <ul class="dropdown-menu dropdown-menu-sm">
                                <li class="dropdown-title">Select Month</li>
                                <li><a href="#" class="dropdown-item">January</a></li>
                                <li><a href="#" class="dropdown-item">February</a></li>
                                <li><a href="#" class="dropdown-item">March</a></li>
                                <li><a href="#" class="dropdown-item">April</a></li>
                                <li><a href="#" class="dropdown-item">May</a></li>
                                <li><a href="#" class="dropdown-item">June</a></li>
                                <li><a href="#" class="dropdown-item">July</a></li>
                                <li><a href="#" class="dropdown-item active">August</a></li>
                                <li><a href="#" class="dropdown-item">September</a></li>
                                <li><a href="#" class="dropdown-item">October</a></li>
                                <li><a href="#" class="dropdown-item">November</a></li>
                                <li><a href="#" class="dropdown-item">December</a></li>
                            </ul>
                            </div> -->
                        </div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"> <?=$data2?></div>
                                <div class="card-stats-item-label">New </div>
                            </div>
                            <!-- <div class="card-stats-item">
                                <div class="card-stats-item-count">12</div>
                                <div class="card-stats-item-label">Shipping</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count">3</div>
                                <div class="card-stats-item-label">Completed</div>
                            </div> -->
                        </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                        </div>
                        <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Query</h4>
                        </div>
                        <div class="card-body">
                           <?=$data?>
                        </div>
                        </div>
                    </div>
                </div>