<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Profile</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item">Profile</div>
                    </div>
                </div>
                <div class="section-body">
                    <h2 class="section-title">Hi, <?=profile()['first_name']?></h2>
                    <p class="section-lead">Change information about yourself on this page.</p>

                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-5">
                            <div class="card profile-widget">
                                <div class="profile-widget-header">                     
                                    <img alt="image" src="<?= base_url()?>public/admin/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                                    <div class="profile-widget-items">
                                        <!-- <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Posts</div>
                                            <div class="profile-widget-item-value">187</div>
                                        </div>
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Followers</div>
                                            <div class="profile-widget-item-value">6,8K</div>
                                        </div>
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Following</div>
                                            <div class="profile-widget-item-value">2,1K</div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="profile-widget-description">
                                    <div class="profile-widget-name"><?=profile()['full_name']?><div class="text-muted d-inline font-weight-normal"><div class="slash"></div><?=profile()['role']?></div></div>
                                    <?=profile()['about']?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-7">
                            <div class="card">
                                <form method="post" class="needs-validation" id="profile_form" novalidate="">
                                    <div class="card-header">
                                        <h4>Edit Profile</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                                <label> Nick Name </label>
                                                <input type="text" class="form-control" value="<?=profile()['first_name']?>" required="" disabled>
                                                <input type="hidden" name="user_id" class="form-control" value="<?=profile()['id']?>" >
                                                <div class="invalid-feedback">Please fill in the first name</div>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label> Name </label>
                                                <input type="text" class="form-control" value="<?=profile()['full_name']?>" required="" disabled>
                                                <div class="invalid-feedback">Please fill in the first name</div>
                                            </div>
                                            
                                            <div class="form-group col-md-6 col-12">
                                                <label>Change Password</label>
                                                <input type="password" class="form-control" name="user_password" value="" required placeholder="Please fill this field">
                                                <div class="invalid-feedback">Please fill in this field</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Email</label>
                                                <input type="email" disabled class="form-control" value="<?=profile()['email_id']?>" required="">
                                                <div class="invalid-feedback">Please fill in the email</div>
                                            </div>
                                            <div class="form-group col-md-5 col-12">
                                                <label>Phone</label>
                                                <input type="tel" disabled class="form-control" value="<?=profile()['mobile_number']?>">
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="form-group col-12">
                                                <label>Bio</label>
                                                <textarea class="form-control summernote-simple"><?=profile()['about']?></textarea>
                                            </div>
                                        </div> -->
                                        <!-- <div class="row">
                                            <div class="form-group mb-0 col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                                                    <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                                                    <div class="text-muted form-text">You will get new information about products, offers and promotions</div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    
                                    <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block ladda-button" data-style="zoom-in" tabindex="4">
                                    <span class="ladda-label">Save Changes</span>
                                    </button>
                                        <!-- <button class="btn btn-primary">Save Changes</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            
        </div>


<!-- login Script -->

<script>
     var l = Ladda.create( document.querySelector( 'button' ) );
	jQuery('#profile_form').on('submit' ,function (e) {
   e.preventDefault();
   l.start();
    jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url('login/pwd_change');?>",
            // beforeSend:,
            // complete:,
            data: jQuery("#profile_form").serialize(),
			      dataType:'json',
            success: function (result_msg) {
            console.log(result_msg);
					  if(result_msg.status=='error'){
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
                              setTimeout(function(){
                                jQuery('#profile_form')[0].reset();
                            					l.stop();}, 2000)
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