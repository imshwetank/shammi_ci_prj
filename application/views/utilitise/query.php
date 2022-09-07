<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<link rel="stylesheet" href="<?=base_url('public')?>/assets/css/business.css">
<contactus>
        <div class="contactus">
            <h1>business query</h1>
            <div class="contactus-container">
            <div class="contactus-container-left">
            <form class="contact-form" id="form_input">
                <div class="contact-input">
                    <label for="name">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                          </svg>
                    </label>
                    <input type="text" id=name name="bq_name" class="form-input" placeholder="your name" autocomplete="off" required/>
                </div>
                <div class="contact-input">
                    <label for="email">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                          </svg>
                    </label>
                    <input type="text" name="bq_mail" class="form-input" placeholder="business email" autocomplete="off" required/>
                </div>
                <div class="contact-input">
                    <label for="phone">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                          </svg>
                    </label>
                    <input type="number" name="bq_phone" class="form-input" placeholder="business phone" autocomplete="off" required/>
                </div>
                <div class="contact-input">
                    <label for="busname">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                            <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/>
                          </svg>
                    </label>
                    <input type="text" class="form-input" name="bq_business" placeholder=" business name" autocomplete="off" />
                </div>
                <div class="contact-input">
                    <label for="subject">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                          </svg>
                    </label>
                    <input type="text" class="form-input" name="bq_type" placeholder="business type" autocomplete="off" required/>
                </div>
                <div class="contact-input">
                    <label for="textarea">
                        
                    </label>
                    <textarea id="textarea"  name="bq_message" rows="10" cols="50" placeholder="write your querry"></textarea>
                </div>
                <div class="contact-input-btn">
                    <input type="submit" class="btn" value="submit"/>
                </div>
            </form>
        </div>
        <div class="contactus-container-right">
            <h1>Why become our distributor or channel partner? </h1>
            <p>Shammi’s Namkeen is one of the perfect snacks, which will make your soul at ease. Our
namkeen brings a unique taste and it is a special pack for extra freshness, which will be the
favorite of many people around the world. As we are looking for a growth opportunity, this will
be the right place for you to invest. We have just expanded our business and are looking for the
best distributors to fit in.
                </p>
            <div class="contactus-container-right-div">
            <div class="content-right">
            <a href="tel:+91959996669"><button type="button" class="btn">call</button></a>
            </div>
            <div class="content-right">
            <a href="mailto:mukularora1708@gmail.com"><button type="button" class="btn">email</button></a>
            </div>
            <div class="content-right">
            <a href="https://api.whatsapp.com/send/?phone=%2B919599966695&text&type=phone_number&app_absent=0"><button type="button" class="btn">what apps</button></a>
            </div>
    </div>
           
        </div>
    </div>
        </div>

    </contactus>


    <script>
     $(document).on('submit', '#form_input', function(event){  
           event.preventDefault();  
           var name = $('#name').val();  
           var email = $('#email').val();  
        //    var cat_status = $('#cat_status').val();  
        //    var extension = $('#cat_image').val().split('.').pop().toLowerCase();  
        //    if(extension != '')  
        //    {  
        //         if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
        //         {  
        //              alert("Invalid Image File");  
        //              $('#user_image').val('');  
        //              return false;  
        //         }  
        //    }       
           if(name != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url('query/new_query')?>",  
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
                            $('#form_input')[0].reset(); 
                            setTimeout(function(){
                                // $('#formData').modal('hide');
                                // location.reload();
                            }, 2000);                         
                        //   dataTable.ajax.reload();  
                     }  
                });  
           }  
           else  
           {  
                alert("All Fields are ");  
           }  
      });
</script>