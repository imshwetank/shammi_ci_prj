<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
     .data_tbl {
    padding: 1.5rem !important;
}
</style>
<div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Product Upload </h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Product </a></div>
                        <div class="breadcrumb-item">Upload</div>
                    </div>
                </div>
                <div class="section-body">
                    <h2 class="section-title">Hi, <?=profile()['first_name']?></h2>
                    <p class="section-lead">Upload information about Categories  and Product</p>

                    <div class="row mt-sm-4">
                        <!-- <div class="col-12 col-md-12 col-lg-6">
                            <div class="card profile-widget">
                                <div class="profile-widget-header">    
                                <div class="profile-widget-description">
                                    <div class="profile-widget-name">Category Upload<div class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div>Edit or New
                                    </div>
                                </div>
                                    
                                </div>                  -->
                                   
                                    <!-- <div class="profile-widget-items">
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">All Categories</div>
                                            <div class="profile-widget-item-value">7</div>
                                        </div>
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Active</div>
                                            <div class="profile-widget-item-value">5</div>
                                        </div>
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Inactive</div>
                                            <div class="profile-widget-item-value">2</div>
                                        </div>
                                    </div> -->
                                            <!-- <div class="form-group col-md-12 col-12 mt-0">
                                                <label> Categories </label>
                                                <input type="text" class="form-control" value="">
                                                <div class="invalid-feedback">Please fill in the first name</div>
                                            </div>
                                            <div class="form-group col-md-12 col-12 mt-0">
                                                <label> Image Link </label>
                                                <input type="text" class="form-control" value="">
                                                <div class="invalid-feedback">Please fill in the first name</div>
                                            </div>
                                            <div class="form-group col-md-12 col-12">
                                                <label> Status </label>
                                                <input type="text" class="form-control" value="">
                                                <div class="invalid-feedback">Please fill in the first name</div>
                                            </div>
                                            <div class="form-group col-md-12 col-12">
                                                <label> Name </label>
                                                <input type="text" class="form-control" value="">
                                                <div class="invalid-feedback">Please fill in the first name</div>
                                            </div>
                                            <div class="form-group col-md-12 col-12">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                                            </div> -->
                                <!-- </div>
                                
                            </div>
                        </div> -->
                        <div class="col-12 col-md-12 col-lg-6 data_tbl" >
                            <div class="card">
                               
                                    <div class="card-header">
                                        <h4>Upload Product</h4>
                                        <div class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div>Upload Excel information
                                    </div>
                                    </div>
                                    <!--  -->
                                    <div class="card profile-widget">
                                <div class="profile-widget-header">    
                                <div class="profile-widget-description">
                                   
                                    <!--  -->
                                    

                                    <form class="form-group" id="product" action="<?php echo base_url();?>import/importFile" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-md-12 col-12">
                                            <input accept=".csv,.xlsx,.xls" class="form-control" type="file" name="uploadFile" value="" />
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                        <input  class="form-control btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Upload" />
                                        </div> 
                                        
                                        
                                        </form>
                                        </div> </div> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            
        </div>

      
       <script>
        $(document).ready(function() {
            $('#mydata').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
       </script>
       <script>
        // var l = Ladda.create( document.querySelector( 'button' ) );
                    jQuery('#product').on('submit' ,function (e) {
                e.preventDefault();
                // var other_data = $('#product').serializeArray();
                // var formData=new FormData();
                //     formData.append('fileInput',JSON.stringify(other_data));
                //     formData.append('fileData' , $('input[name=file]')[0].files[0])
                // l.start();
                    jQuery.ajax({
                            type: "POST",
                            url: "<?php echo base_url('api_upload/test');?>",
                            // beforeSend: ,
                            // complete:,
                            cache: false,  
                            contentType: false,
                            processData: false,
                            async: false,
                            contentType: 'application/json; charset=utf-8',
                            data: $('#product').serializeArray(),
                            dataType:'json',
                            success: function (result_msg) {
                            console.log(result_msg);
                            
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
                              jQuery('#product')[0].reset();
                //             setTimeout(function(){
                                                
                //             					window.location.href = result_msg.location;}, 2000)
                                // jQuery('#categories')[0].reset();
                                            setTimeout(function(){
                                                            					l.stop();}, 1000)
                                }},error: function(msg){
                                console.log(msg);
                                l.stop()
                            $.iaoAlert({msg:'Somthin Error 500',
                            type: "error",
                            mode: "dark",
                            position: 'bottom-right'});
                    } 
                    }); 
                });

       </script>
        
        
       
        
        
        
        
        
