<?php

   function active_ses(){
    $CI = &get_instance();
   

   }
//    active_ses();
   

function profile(){
    $CI = &get_instance();

    $u_id = $CI->session->userdata('user_id');
    $CI->load->model('profile');
    $profile=$CI->profile->active_profile($u_id);
    return $profile[0];

}


   
   
