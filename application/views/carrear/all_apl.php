<?php
defined('BASEPATH') OR exit('No direct script access allowed');
        // $this->load->model('Carrear_m');
		$getBy['data']='1';
		$data=$this->Carrear_m->allapl();
        // print_r($data);
?>
<style>
     .data_tbl {
    padding: 1.5rem !important;
}
</style>
<div class="main-content">
            <section class="section">
                <div class="section-header">
               
                    <p class="section-lead">Change information about Jobs Applications on this page.</p>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Carrear </a></div>
                        <div class="breadcrumb-item">All Job Applications</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row mt-sm-0">
                        
                        <div class="col-12 col-md-12 col-lg-12 data_tbl" >
                            <div class="card">
                               
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>List Of Job Applications</h4>
                                        <a class="btn btn-primary btn-lg ml-10" href="<?= base_url('carrear/post_job') ?>">New Job Post</a> 

                                    </div>
                                   
                                         
                                    <table id="mydata" class="display nowrap" style="width:98%">
                                            <thead>  
                                                <tr>
                                                    <th>Apl ID</th>
                                                    <th>Job ID </th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Attachment</th>
                                                    <th>Status</th>
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
                                                        <td><?= $data1['job_app_id']?></td>
                                                        <td><?= $data1['job_id']?></td>
                                                        <td><?= $data1['job_aap_name']?></td>
                                                        <td><?= $data1['job_aap_email']?></td>
                                                        <td><?= $data1['job_aap_phone']?></td>
                                                        
                                                        <td><a target="_blank"  href="<?= base_url('public/images/apldoc/').$data1['job_aap_cv'] ?>">View File</a></td>
                                                        <td><?=$data1['job_aap_status']?></td>
                                                        <td><button type="button" name="update" id="<?=$data1['job_app_id'] ?>" class="btn btn-warning btn-xs update">Update</button></td>
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
                url:"<?php echo base_url('carrear/get_status'); ?>",  
                method:"POST",  
                data:{prd_id:id_for},  
                dataType:"json",  
                success:function(result_msg)
                
                {   console.log(result_msg[0]) 
                     $('#update').modal('show');  
                     $('#job_aap_name').val(result_msg[0].job_aap_name);  
                     $('#job_app_id').val(result_msg[0].job_app_id);  
                    //  $('#cat_status').val(result_msg.cat_status);  
                     $('.modal-title').text("Update Application Status");  
                     $('#job_id').val(result_msg[0].job_id);  
                     $('#job_aap_phone').val(result_msg[0].job_aap_phone);  
                     $('#job_aap_email').html(result_msg[0].job_aap_email);                      
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
                     
                        <label> Name</label>                                               
                        <input type="text" name="job_aap_name" id="job_aap_name" class="form-control " disabled>  
                        <input type="hidden" name="job_app_id" id="job_app_id" class="form-control" >  
                        <input type="hidden" name="job_id" id="job_id" class="form-control" >  
                        <br>
                        <!-- <label> Email</label>                                               
                        <input type="text" name="job_aap_email" id="job_aap_email" class="form-control " disabled>  -->
                        <br>
                        <label> Mobile</label>                                               
                        <input type="text" name="job_aap_phone" id="job_aap_phone" class="form-control " disabled> 
                          
                            <br> 
                          <label> Status </label>
                            <select required class="form-control" name="job_aap_status" id="job_aap_status">
                                <option value="" disabled selected>Select Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Shortlist">Shortlist</option>
                                <option value="Interview">Interview</option>
                                <option value="Hire">Hire</option>
                                <option value="Reject">Reject</option>                              
                            </select>
                            <br>
                            
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
            
           var job_aap_status = $('#job_aap_status').val();  
        
        //    if(extension != '')  
        //    {  
        //         if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
        //         {  
        //              alert("Invalid Image File");  
        //              $('#user_image').val('');  
        //              return false;  
        //         }  
        //    }       
           if(job_aap_status != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url('carrear/update_status')?>",  
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
        
        
       
        
        
        
        
        

        
        
       
        
        
        
        
        
