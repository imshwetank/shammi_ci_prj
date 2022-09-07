<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->session->userdata('status')=='success'){
    header('Location:'.base_url('user/dashboard'));
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- auth-reset-password.html  Tue, 07 Jan 2020 03:39:48 GMT -->
<head>
<meta charset="UTF-8">
<scrip src="<?= base_url()?>public/admin/jquery-3.6.0.min.js"></script>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Reset Password &mdash; Shammi Namkeen</title>
<script src="<?= base_url()?>public/admin/jquery-3.6.0.min.js"></script>
<!-- General CSS Files -->
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/modules/fontawesome/css/all.min.css">

<!-- CSS Libraries -->
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/modules/bootstrap-social/bootstrap-social.css">
<!-- Template CSS -->
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/css/style.min.css">
<link rel="stylesheet" href="<?= base_url()?>public/admin/assets/css/components.min.css">
<!-- alert -->
<link href="<?= base_url('public')?>/assets/Notification/iao-alert.css" rel="stylesheet" type="text/css">
<!-- css ladda loder -->
<link rel="stylesheet" href="<?= base_url()?>public/loder/ladda-themeless.min.css">
<script src="<?= base_url()?>public/loder/spin.min.js"></script>
<script src="<?= base_url()?>public/loder/ladda.min.js"></script>
</head>

<body class="layout-4">

<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <!-- <div class="login-brand">
                        <img src="http://puffintheme.com/craft/codiepie/dist/assets/img/CodiePie-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div> -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Reset Password</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">We will send a link to reset your password</p>
                            <form id="change_pwd" method="POST">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <span id='messages'></span>
                                    <input id="email" onkeyup="onCheck()" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required>
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="confirm-password" tabindex="3" required>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">OTP</label>
                                    <input id="otp" type="text" class="form-control" name="otp" tabindex="4" required>
                                </div>
                                <div class="float-right">
                                            <a href="<?= base_url()?>admin" class="text-small">
                                            Back ToLogin...!
                                            </a>
                                        </div>
                                <div class="form-group">
                                    <!-- <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="5">Reset Password</button> -->
                                    <button type="submit" class="btn btn-primary btn-lg btn-block ladda-button" data-style="zoom-in" tabindex="5">
                                    <span class="ladda-label">Reset Password</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        <!-- Copyright &copy; CodiePie 2020 -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- otp section -->


<script type="text/javascript">

$('form').find('email').keydown(function(){
    document.getElementById('messages').innerHTML = "";
})


    var l = Ladda.create( document.querySelector( 'button' ) );

let email_id = document.getElementById('email').value;
    function onCheck() {
        var pattern = /^\S+@\S+\.\S+$/;
       
        var a=document.getElementById('email').value;
            if (pattern.test(a)) {
                // document.getElementById('messages').style.color = 'green';
                // document.getElementById('messages').innerHTML = "valid email id";
                l.stop();
                onSub();
            } else {
                // document.getElementById('messages').style.color = 'red';
                // document.getElementById('messages').innerHTML = "invalid email id";
                l.stop();
            } 
        }
    function onSub(){
        // alert(document.getElementById('email').value);
        // document.otp.submit();
        // document.getElementById('email').setAttribute(readonly);
        l.start();
        $.ajax({
            url: "<?= base_url('login/otp_send')?>",
            dataType:'json',
            data : {email_id:document.getElementById('email').value},
            // cache:false,
            
            success: function (result_msg) {
            console.log(result_msg);
					  if(result_msg.status=='error'){
                        document.getElementById('messages').style.color = 'red';
                        document.getElementById('messages').innerHTML = result_msg.message;
                        l.stop();
            $.iaoAlert({msg: result_msg.message,
            type: "error",
            mode: "dark",
           position: 'bottom-right'});
						}
            if(result_msg.status=='success'){
              $.iaoAlert({msg: result_msg.message,
              type: "success",
              mode: "dark",
             position: 'bottom-right'});
                // jQuery('#change_pwd')[0].reset();
                document.getElementById('messages').style.color = 'green';
                document.getElementById('messages').innerHTML = result_msg.message;
                l.stop();
                //               setTimeout(function(){
                //             					location.reload();}, 1000)
                  }},
                  error: function(msg){
		        console.log(msg)
            $.iaoAlert({msg:'Somthin Error 500',
            type: "error",
            mode: "dark",
            position: 'bottom-right'});
	}
    // end 
        })
    }
    </script>
<!-- change pwd Script -->

<script>
	jQuery('#change_pwd').on('submit' ,function (e) {
   e.preventDefault();
   l.start();
    jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url('login/forgot_pwd');?>",
            // beforeSend:,
            // complete:,
            data: jQuery("#change_pwd").serialize(),
			      dataType:'json',
            success: function (result_msg) {
            console.log(result_msg);
					  if(result_msg.status=='error'){
                        document.getElementById('messages').style.color = 'red';
                        document.getElementById('messages').innerHTML = result_msg.message;
                        l.stop();
            $.iaoAlert({msg: result_msg.message,
            type: "error",
            mode: "dark",
           position: 'bottom-right'});
						}
            if(result_msg.status=='success'){
                document.getElementById('messages').style.color = 'green';
                        document.getElementById('messages').innerHTML = result_msg.message;
                l.stop();
              $.iaoAlert({msg: result_msg.message,
              type: "success",
              mode: "dark",
             position: 'bottom-right'});
                jQuery('#change_pwd')[0].reset();
                              setTimeout(function(){
                            	window.location.href = result_msg.location;}, 1000);
                  }},error: function(msg){
		        console.log(msg);
                l.stop();
            $.iaoAlert({msg:'Somthin Error 500',
            type: "error",
            mode: "dark",
            position: 'bottom-right'});
	} 
    }); 
});
</script>

<script src="<?= base_url()?>public/admin/assets/bundles/lib.vendor.bundle.js"></script>
<script src="<?= base_url()?>public/admin/js/CodiePie.js"></script>
<!-- JS Libraies -->
<!-- alert -->
<script src="<?= base_url('public')?>/assets/Notification/iao-alert.jquery.js"></script>
<!-- Page Specific JS File -->
<!-- chart -->
<script src="<?= base_url()?>public/admin/canvasjs/jquery.canvasjs.min.js"></script>
<!-- Template JS File -->
<script src="<?= base_url()?>public/admin/js/scripts.js"></script>
<script src="<?= base_url()?>public/admin/js/custom.js"></script>
<!-- login Script -->
<link href="<?= base_url('public')?>/assets/Notification/iao-alert.css" rel="stylesheet" type="text/css">
</body>

<!-- auth-reset-password.html  Tue, 07 Jan 2020 03:39:48 GMT -->
</html>