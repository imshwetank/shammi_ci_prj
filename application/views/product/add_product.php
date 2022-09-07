<?php
defined('BASEPATH') OR exit('No direct script access allowed');
        $this->load->model('Product_m');
		$getBy['data']='1';
		$data=$this->Product_m->activeProduct($getBy);
      
$data2=$this->Product_m->category($getBy);
?>
<style>
     .data_tbl {
    padding: 1.5rem !important;
}
</style>
<div class="main-content">
            <section class="section">
                <div class="section-header">
               
                    <p class="section-lead">Change information about Product on this page.</p>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Categories </a></div>
                        <div class="breadcrumb-item">All Product</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row mt-sm-0">
                        
                        <div class="col-12 col-md-12 col-lg-12 data_tbl" >
                            <div class="card">
                               
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>List Of Product</h4>
                                        <a class="btn btn-primary btn-lg ml-10" href="<?= base_url('product/add_product') ?>">New Product</a> 

                                    </div>
                                   
                                         
                                    <table id="mydata" class="display nowrap" style="width:98%">
                                            <thead>  
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Product</th>
                                                    <th>Categories</th>
                                                    <th>Status</th>
                                                    <th>View Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                foreach ($data as $data1){
                                                    // echo'<pre>';
                                                    // print_r($data1);
                                                    ?>
                                                    <tr>
                                                        <td><?= $data1['prd_id']?></td>
                                                        <td><?= $data1['prd_name']?></td>
                                                        <td><?= $data1['prd_cat']?></td>
                                                        <td><?= ($data1['prd_status']=='1')?'Active':'Inactive';?></td>
                                                        <td><a target="_blank"  href="<?= base_url('public/images/product/').$data1['prd_image']?>">View Image</a></td>
                                                        <td><button type="button" name="update" id="<?=$data1['prd_id']?>" class="btn btn-warning btn-xs update">Update</button> </td>
                                                    </tr>
                                                   
                                                <?php }
                                                ?>
                                                
                                            </tfoot>
                                        </table>
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





<!-- update modal  -->

<script>
    $(document).on('click', '.update', function(){  
           var id_for = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url('product/getforupdate_product'); ?>",  
                method:"POST",  
                data:{prd_id:id_for},  
                dataType:"json",  
                success:function(result_msg)
                
                {   console.log(result_msg[0]) 
                     $('#update').modal('show');  
                     $('#prd_title').val(result_msg[0].prd_title);  
                     $('#prd_name').val(result_msg[0].prd_name);  
                    //  $('#cat_status').val(result_msg.cat_status);  
                     $('.modal-title').text("Update Product");  
                     $('#prd_id').val(result_msg[0].prd_id);  
                     $('#prd_dec').val(result_msg[0].prd_dec);  
                     $('#prd_image').html(result_msg[0].prd_image);  
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
                     <label> Product Title</label>                                               
                        <input type="text" name="prd_title" id="prd_title" class="form-control " >  
                        <label> Product Name</label>                                               
                        <input type="text" name="prd_name" id="prd_name" class="form-control " >  
                        <input type="hidden" name="prd_id" id="prd_id" class="form-control" >  
                          <br /> 
                          <label>Category</label>
                              <select class="form-control" name="prd_cat" id="prd_cat">
                                  <option value="" disabled selected>Select</option>
                                  <?php foreach($data2 as $prd_cat){?>
                                       <option value="<?=$prd_cat['cat_id']?>" ><?=$prd_cat['cat_name']?></option>
                                      <?php } ?>
                             </select>
                            <br> 
                          <label> Status </label>
                            <select required class="form-control" name="prd_status" id="cat_status">
                                <option value="" disabled selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                            <br>
                            <label>Product Description</label>
                            <textarea class="form-control" name="prd_dec" id="prd_dec" cols="30" rows="4"></textarea>
                          <br />  
                          <label for="cat_image">Image</label>
                        <input accept="image/png, image/jpeg, image/jpg, image/gif" class="form-control" type="file" id="prd_image" name="file" >
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
<!-- modal content-->

<script>
     $(document).on('submit', '#formData', function(event){  
           event.preventDefault();  
           var prd_title = $('#prd_title').val();  
           var prd_name = $('#prd_name').val();  
           var prd_id = $('#prd_id').val();  
           var prd_status = $('#prd_status').val();  
           var prd_cat = $('#prd_cat').val();  
           var prd_dec = $('#prd_dec').val();  
           var extension = $('#prd_image').val().split('.').pop().toLowerCase();  
           if(extension != '')  
           {  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert("Invalid Image File");  
                     $('#user_image').val('');  
                     return false;  
                }  
           }       
           if(prd_name != '' && prd_id != '' && prd_dec != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url('product/update_product')?>",  
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
                                    location.reload();
                                    $('#formData').modal('hide'); }, 1000)});  
                                     
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
        
        
       
        
        
        
        
        
