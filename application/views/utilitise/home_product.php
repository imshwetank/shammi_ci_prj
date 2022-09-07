<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getBy1['data']='1';
$data=$this->Utilitise_m->home_prd_btn($getBy1);
print_r($data);
// die();
?>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<section class=product>
<link rel="stylesheet" href="<?=base_url()?>public/assets/css/product.css">
        <h1>order your namkeen</h1>
        <div class="product-btn">
          <?php foreach ($data as $key) {?>
            <a href="#" id="<?= $key['prd_cat']?>" class="product-button prd_btn"><button class=prd_btn id="<?= $key['prd_cat']?>"></button><?= $key['cat_name']?></a>
         <?php } ?>
            <!-- <a href="#" class="product-button">classic</a>
            <a href="#" class="product-button">Roasted</a>
            <a href="#" class="product-button">Soya</a>
            <a href="#" class="product-button">Besan</a>
            <a href="#" class="product-button">new</a>
            <a href="#" class="product-button">all</a> -->
        </div>
        <section id=prd class="product-item">
       
       
        

        </section>
        
  </section>






  <script>

    $(document).on('click','.prd_btn',function(e) {
      var id_for = $(this).attr("id"); 
      e.preventDefault();
      // ajax start
      base_url="<?php echo base_url()?>";
      $.ajax({
      url: "<?= base_url('get_product')?>",
            type: "POST",
            data: {'prd_cat':id_for},
			      dataType:'json',
            success: function (result_msg) {
              // console.log(result_msg);
              
              product_all="";
              $.each(result_msg,function(k,v){

                product_all+='<div class="items">';
                product_all+='<img src="';
                product_all +=base_url+'public/images/product/'+v.prd_image;
                product_all +=' ">';
              product_all+=' <div class="product-content">';
              product_all+='<h3>'+v.prd_name+'</h3>';
              product_all+='<p>'+v.prd_dec+'</p>';
              product_all+=' <a href="#">read more </a>';
              product_all+=' </div> </div>';
              // product_all="";

           $('.product-item').html(product_all);

    
        // console.log(product_all);

                // console.log(v);
                    });
                    // $('.product-item').html(product_all);
              // console.log(id_for);
              // console.log(v.prd_image);
             
              
                    
                      }
                    ,error: function(msg){
                      // swal("Error Login!", 'Somthin Error 500', "error")
                    }            
                      });



      // ajax end
      // product_all=`<div class="items">
      //       <img src="	https://m.media-amazon.com/images/I/81xEKjrUlOL._SL1500_.jpg">
      //       <div class="product-content">
      //           <h3>title</h3>
      //           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum rem voluptatem sapiente tempora excepturi incidunt, ex minus! Nesciunt deleniti illo iusto facere a?'</p>
      //           <a href="#">read more </a>
      //       </div>
      //   </div>`;
    

    });
  </script>


<!-- 
  // alert(result_msg.get_services[0].servicename);
                                console.log(result_msg);             
                    let columnCount = result_msg.get_services.length;
                    let tbl_h='';
                    tbl_h+='<table id="dttbl" class="table dttbl"><thead><tr>';
                    tbl_h+='<th>Users</th>';
                    item = [];
                    $.each(result_msg.get_services,function(k,v){
                        tbl_h+='<th>'+v.servicename+'</th>';
                    });
                    tbl_h+='</tr></thead><tbody>';
                    i = 0;
                    $.each(result_msg.tr_data,function(k,v2){
                      tbl_h+='<tr>';
                        tbl_h+='<td>'+v2.user_id+'</td>';
                        $.each(result_msg.get_services,function(k,v){
                        tbl_h+='<th>'+v2[v.servicename]+'</th>';
                    });
                      tbl_h+='</tr>';
                    });
                    tbl_h+='</tbody></table>';   
                    $('#table_data').html(tbl_h);
 -->