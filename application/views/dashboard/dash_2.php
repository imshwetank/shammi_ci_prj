<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getBy1['data']='Pending';
$data=$this->Dashboard_m->application($getBy1);
$getBy2['data']='Shortlist';
$data2=$this->Dashboard_m->application($getBy2);
$getBy3['data']='Interview';
$data3=$this->Dashboard_m->application($getBy3);
$getBy4['data']='Hire';
$data4=$this->Dashboard_m->application($getBy4);


?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                        <div class="card-stats-title"> Carrear
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
                                <div class="card-stats-item-count"><?=$data2?></div>
                                <div class="card-stats-item-label">Shortlist</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"><?=$data3?></div>
                                <div class="card-stats-item-label">Interview</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count"><?=$data4?></div>
                                <div class="card-stats-item-label">Hire</div>
                            </div>
                        </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                        <i class="fas fa-archive"></i>
                        </div>
                        <div class="card-wrap">
                            <!-- <div class="card-header">
                                <h4>Hire</h4>
                            </div>
                            <div class="card-body">
                            
                            </div> -->
                        </div>
                    </div>
                </div>