<?php
defined('BASEPATH') OR exit('No direct script access allowed');
        // $this->load->model('Carrear_m');
		$getBy['data']='1';
		$data=$this->Utilitise_m->allcont();
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
               
                    <p class="section-lead">View information about Contact us on this page.</p>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Contact US </a></div>
                        <div class="breadcrumb-item">All Contact US</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row mt-sm-0">
                        
                        <div class="col-12 col-md-12 col-lg-12 data_tbl" >
                            <div class="card">
                               
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>List Of Contact Us</h4>
                                        <!-- <a class="btn btn-primary btn-lg ml-10" href="<?php // base_url('carrear/post_job') ?>">New Job Post</a>  -->

                                    </div>
                                   
                                         
                                    <table id="mydata" class="display nowrap" style="width:98%">
                                            <thead>  
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Subject</th>
                                                    <th>Name</th>
                                                    <th>Job/Business</th>
                                                    <th>Phone</th>
                                                    <th>Message</th>
                                                    <th>Email</th>
                                                    <th>Date Time</th>
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
                                                        <td><?= $data1['cu_id']?></td>
                                                        <td><?= $data1['cu_subject']?></td>
                                                        <td><?= $data1['cu_name']?></td>
                                                        <td><?= $data1['cu_business']?></td>
                                                        <td><?= $data1['cu_phone']?></td>
                                                        <td><?= $data1['cu_message']?></td>
                                                        <td><?= $data1['cu_email']?></td>
                                                        <td><?= $data1['datetime']?></td>
                                                    
                                                      
                                                        <td><?= ($data1['status']=='1')?'Active':'Closed';?></td>
                                                        <td><button type="button" name="update" id="<?=$data1['cu_id'] ?>" class="btn btn-warning btn-xs update">Update</button></td>
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
                url:"<?php echo base_url('query/conquery_status'); ?>",  
                method:"POST",  
                data:{prd_id:id_for},  
                dataType:"json",  
                success:function(result_msg)
                
                {   console.log(result_msg) 
                     $('#update').modal('show');  
                     $('.modal-title').text("Update Contact query");  
                     $('#cu_name').val(result_msg[0].cu_name);  
                     $('#cu_phone').val(result_msg[0].cu_phone);  
                     $('#cu_mail').val(result_msg[0].cu_email);                     
                     $('#cu_message').val(result_msg[0].cu_message);  
                     $('#cu_id').val(result_msg[0].cu_id);  
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
                        <input disabled type="text" name="cu_name" id="cu_name" class="form-control " >
                        <input type="hidden" name="cu_id" id="cu_id" class="form-control" >  
                        
                        <br>
                        <label> Phone</label>                                               
                        <input disabled type="text" name="cu_phone" id="cu_phone" class="form-control " >
                   
                        
                        <br>
                        <label> Email</label>                                               
                        <input disabled type="email" name="cu_mail" id="cu_mail" class="form-control " >
                   
                        
                        <br>
                        
                        <label> Job Message</label>                                               
                        <textarea disabled name="cu_message" class="form-control" id="cu_message" cols="30" rows="10"></textarea>  
                          
                            <br> 
                          <label> Status </label>
                            <select required class="form-control" name="status" id="status">
                                <option value="" disabled selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>                                                           
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
            
           var status = $('#status').val();  
        
        //    if(extension != '')  
        //    {  
        //         if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
        //         {  
        //              alert("Invalid Image File");  
        //              $('#user_image').val('');  
        //              return false;  
        //         }  
        //    }       
           if(status != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url('query/conquery_statusupdate')?>",  
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