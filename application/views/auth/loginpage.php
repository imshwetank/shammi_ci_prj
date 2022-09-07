<!DOCTYPE html>
<html lang="en">

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->
<head>
<meta charset="UTF-8">
<script src="<?= base_url()?>public/admin/jquery-3.6.0.min.js"></script>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Login &mdash; Shammi Namkeen</title>

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
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="#" class="needs-validation login-form" id="login-form" novalidate="">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="emai_id" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                      
                                    </div>
                                    <input id="password" type="password" class="form-control" name="user_password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div> -->
                                </div>
                                <div class="float-right">
                                            <a href="<?= base_url()?>auth-forgot-password" class="text-small">
                                            Forgot Password?
                                            </a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block ladda-button" data-style="zoom-in" tabindex="4">
                                    <span class="ladda-label">Login</span>
                                    </button>
                                    <!-- <button class="btn btn-info ladda-button" data-style="zoom-in"><span class="ladda-label">zoom-in</span></button> -->
                                </div>
                            </form>
                            <!-- <div class="text-center mt-4 mb-3">
                                <div class="text-job text-muted">Login With Social</div>
                            </div> -->
                            <!-- <div class="row sm-gutters">
                                <div class="col-6">
                                    <a class="btn btn-block btn-social btn-facebook"><span class="fab fa-facebook"></span> Facebook</a>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-block btn-social btn-twitter"><span class="fab fa-twitter"></span> Twitter</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- <div class="mt-5 text-muted text-center">
                        Don't have an account? <a href="auth-register.html">Create One</a>
                    </div> -->
                    <!-- <div class="simple-footer">
                        Copyright &copy; CodiePie 2020
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    var l = Ladda.create( document.querySelector( 'button' ) );
	jQuery('.login-form').on('submit' ,function (e) {
   e.preventDefault();
   l.start();
    jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url('login/login_chek');?>",
            // beforeSend: ,
            // complete:,
            data: jQuery(".login-form").serialize(),
			      dataType:'json',
            success: function (result_msg) {
            // console.log(result_msg);
            
					  if(result_msg.status=='error'){
            $.iaoAlert({msg: result_msg.message,
            type: "error",
            mode: "dark",
           position: 'bottom-right'});
           l.stop();
						}
            if(result_msg.status=='success'){
              $.iaoAlert({msg: result_msg.message,
              type: "success",
              mode: "dark",
             position: 'bottom-right'});
            //   jQuery('.login-form')[0].reset();
              setTimeout(function(){
                                
            					window.location.href = result_msg.location;}, 1000)
                // jQuery('.login-form')[0].reset();
                              setTimeout(function(){
                                            					l.stop();}, 5000)
                  }},error: function(msg){
		        // console.log(msg);
                l.stop()
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

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->
</html>