<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->model('Product_m');
$getBy['data']='1';
$data=$this->Product_m->category($getBy);
// echo '<pre>';
// print_r($data);
// die;
?>
<style>
    #prd_cat {
    height: 102px !important;
}
</style>
<div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>New Product Catelog</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Product</a></div>
                        <div class="breadcrumb-item">Catelog</div>
                    </div>
                </div>
                <div class="section-body">
                    <h2 class="section-title">Hi, <?=profile()['first_name']?></h2>
                    <p class="section-lead">New Product information .</p>

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
                                    <?php //profile()['about']?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-7">
                            <div class="card">
                                <form method="post" class="needs-validation" id="profile_form" novalidate="">
                                    <div class="card-header">
                                        <h4>New Product</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                        <!-- <div class="form-group col-md-6 col-12">
                                                <label> Title Name</label> -->
                                                <input type="hidden" class="form-control" name="prd_title" required="">
                                                <!-- <div class="invalid-feedback">Please fill in the Title name</div>
                                            </div> -->
                                            <div class="form-group col-md-6 col-12">
                                                <label> Product Name </label>
                                                <input type="text" class="form-control" name="prd_name" required="">
                                                <div class="invalid-feedback">Please fill in the Product name</div>
                                            </div>
                                        
                                            <div class="form-group col-md-6 col-12">
                                                <label>Product Status</label>
                                                <span class="form-control"><input type="radio" calss="mt-4" name="prd_status" id="product_status" value="1" checked> Active</span>
                                                <span class="form-control"><input type="radio" name="prd_status" id="product_status" value="0"> In-Active</span>
                                              
                                                <div class="invalid-feedback">Please fill in this field</div>
                                            </div>
                                            </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Category</label>
                                               <select class="form-control" name="prd_cat" id="prd_cat" multiple>
                                                    <option value="" disabled selected>Select</option>
                                                    
                                                    <?php foreach($data as $prd_cat){?>
                                                        <option value="<?=$prd_cat['cat_id']?>" ><?=$prd_cat['cat_name']?></option>

                                                        <?php } ?>
                                               </select>                                  
                                                <div class="invalid-feedback">Please Select Product Category</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>Product Description</label>
                                                <textarea class="form-control" name="prd_dec" id="prd_dec" cols="30" rows="4"></textarea>
                                                <div class="invalid-feedback">Product Pescription </div>
                                            </div>
                                            
                                            <div class="form-group col-md-5 col-12">
                                                <label>Image</label>
                                                <input class="form-control" accept="image/png, image/jpeg, image/jpg, image/gif" type="file" id="file" name="file" >
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
   var other_data = $('#profile_form').serializeArray();
        var formData=new FormData();
        formData.append('fileInput',JSON.stringify(other_data));
        formData.append('fileData' , $('input[name=file]')[0].files[0])
       
   l.start();
    jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url('product/api_newProduce');?>",
            // beforeSend:,
            // complete:,
            cache: false,  
            contentType: false,
            processData: false,
            async: false,
            data: formData,
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
