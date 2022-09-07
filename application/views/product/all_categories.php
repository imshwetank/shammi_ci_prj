<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getBy['data']='1';
$data=$this->Product_m->category($getBy);
?>
<style>
     .data_tbl {
    padding: 1.5rem !important;
}
</style>
<div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Product Categories</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Product </a></div>
                        <div class="breadcrumb-item">All Categories</div>
                    </div>
                </div>
                <div class="section-body">
                    <h2 class="section-title">Hi, <?=profile()['first_name']?></h2>
                    <p class="section-lead">Change information about Categories on this page.</p>

                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card profile-widget">
                                <div class="profile-widget-header">    
                                <div class="profile-widget-description">
                                    <div class="profile-widget-name"><?=profile()['full_name']?><div class="text-muted d-inline font-weight-normal"><div class="slash"></div> New Categories </div></div>
                                    <?=profile()['about']?>
                                </div>                 
                                   
                                            <form action="" id="categories" method="post">
                                            <div class="form-group col-md-12 col-12 mt-0">
                                                <label> Categories Name</label>                                               
                                                <input type="text" name="cat_name" class="form-control" value="">
                                                <div class="invalid-feedback">Please fill in the first name</div>
                                            </div>
                                          
                                           
                                            <div class="form-group col-md-12 col-12">
                                                <label> Status </label>
                                                <select required class="form-control" name="cat_status" id="cat_status">
                                                    <option value="" disabled selected>Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">In-Active</option>
                                                </select>
                                                <div class="invalid-feedback">Please fill in the first name</div>
                                            </div>
                                            <div class="form-group col-md-12 col-12 mt-0">
                                                <label for="file">Image</label>
                                                <input accept="image/png, image/jpeg, image/jpg, image/gif" class="form-control" type="file" id="file" name="file" >
                                                <div class="invalid-feedback">Please fill in</div>
                                            </div>
                                            <div class="form-group col-md-8 col-12">
                                                <button type="submit" name='submit' class="btn btn-primary btn-lg btn-block ladda-button" data-style="zoom-in"> <span class="ladda-label">Submit</span></button>
                                                <a  class="btn btn-primary btn-lg btn-block" href="<?= base_url('product/all_categories')?>">Cancel</a>  
                                            </div>
                                          
                                  </form>
                                            
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-8 data_tbl" >
                            <div class="card">
                               
                                    <div class="card-header">
                                        <h4>List Of Categories</h4>
                                    </div>
                                    <table id="mydata" class="display nowrap" style="width:98%">
                                            <thead>  
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Categories</th>
                                                    <th>Status</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($data as $key) { ?>
                                               <tr>
                                                <td><?= $key['cat_id'] ?></td>
                                                <td><?= $key['cat_name'] ?></td>
                                                <td><?= ($key['cat_status']==1)?'Active':'Inactive'; ?></td>
                                                <td><a target="_blank"  href="<?= base_url('public/images/category/').$key['cat_image'] ?>">View Image</a></td>
                                                <td><button type="button" name="update" id="<?=$key['cat_id'] ?>" class="btn btn-warning btn-xs update">Update</button> </td>
                            
                                               </tr>
                                              <?php } ?>
                                            
                                            </tfoot>
                                        </table>

                                        <div id="userModal" class="modal fade">  
     
   

                                    
                                    <!-- <div class="card-footer text-right">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div> -->
                             
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


<!-- new Categories -->
       <script>
            var l = Ladda.create( document.querySelector( 'button' ) );
                    jQuery('#categories').on('submit' ,function (e) {
                e.preventDefault();
                var other_data = $('#categories').serializeArray();
                var formData=new FormData();
                    formData.append('fileInput',JSON.stringify(other_data));
                    formData.append('fileData' , $('input[name=file]')[0].files[0])
                l.start();
                    jQuery.ajax({
                            type: "POST",
                            url: "<?php echo base_url('product/api_newcategories');?>",
                            // beforeSend: ,
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
                              jQuery('#categories')[0].reset();
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


<!-- update modal  -->

<script>
    $(document).on('click', '.update', function(){  
           var id_for = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url('product/update_call'); ?>",  
                method:"POST",  
                data:{cat_id:id_for},  
                dataType:"json",  
                success:function(result_msg)
                
                {   console.log(result_msg[0]) 
                     $('#update').modal('show');  
                     $('#cat_name').val(result_msg[0].cat_name);  
                    //  $('#cat_status').val(result_msg.cat_status);  
                     $('.modal-title').text("Update Category");  
                     $('#cat_id').val(result_msg[0].cat_id);  
                     $('#cat_image').html(result_msg[0].cat_image);  
                     $('#action').val("Update");  
                }  
           })  
      });  
  
</script>
<div id="update" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="formData" enctype="multipart/form-data">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                          <h4 class="modal-title">Update Information</h4>  
                     </div>  
                     <div class="modal-body">  
                        <label> Categories Name</label>                                               
                        <input type="text" name="cat_name" id="cat_name" class="form-control " >  
                        <input type="hidden" name="cat_id" id="cat_id" class="form-control" >  
                          <br />  
                          <label> Status </label>
                            <select required class="form-control" name="cat_status" id="cat_status">
                                <option value="" disabled selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                          <br />  
                          <label for="cat_image">Image</label>
                        <input accept="image/png, image/jpeg, image/jpg, image/gif" class="form-control" type="file" id="cat_image" name="file" >
                          <span id="user_uploaded_image"></span>  
                     </div>  
                     <div class="modal-footer">  
                          <!-- <input type="hidden" name="cat_id" id="cat_id" />   -->
                          <input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>  


<script>
     $(document).on('submit', '#formData', function(event){  
           event.preventDefault();  
           var cat_name = $('#cat_name').val();  
           var cat_id = $('#cat_id').val();  
           var cat_status = $('#cat_status').val();  
           var extension = $('#cat_image').val().split('.').pop().toLowerCase();  
           if(extension != '')  
           {  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert("Invalid Image File");  
                     $('#user_image').val('');  
                     return false;  
                }  
           }       
           if(cat_name != '' && cat_status != '' && cat_id != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url('product/update_catelog')?>",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,
                     dataType:'json', 
                     success:function(result_msg)  
                     {  
                          console.log(result_msg); 
                          $.iaoAlert({msg: result_msg.message,
                            type: result_msg.status,
                            mode: "dark",
                            position: 'bottom-right'});
                            $('#formData')[0].reset();  
                            setTimeout(function(){ 
                                setTimeout(function(){
                                    $('#formData').modal('hide'); location.reload();}, 1000)});   
                          
                          
                        //   dataTable.ajax.reload();  
                     }  
                });  
           }  
           else  
           {  
                alert("All Fields are Required");  
           }  
      });
</script>
        
        
       
        
        
        
        
        
