<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->model('Product_m');
		$this->load->library('form_validation');
        // parent::__construct();
    }
	public function index()	{
		echo 'hi';
	}
	// categories
	public function allcategories()	{
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		$this->load->view('product/all_categories');
		$this->load->view('ad_layout/footer');
	}
	
	public function addcategories()	{
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		// $this->load->view('');
		$this->load->view('ad_layout/footer');
	}
	public function newcategories()	{
		
		$this->load->model('Product_m');
		$validation=true;
		
		//form_input
		$data = json_decode($_REQUEST['fileInput']);
		// echo json_encode($data);
		// die;
			$cat_name=$data[0]->value;

			$cat_status=$data[1]->value;
			$InfoCat=[
				'cat_name'=>$cat_name,
				'cat_status'=>$cat_status
			];
			
			$result_info['info']=$InfoCat;
		if(isset($cat_name) && empty($cat_name && $cat_name!=="")) {
			$result_info['message']='Please Fill Proper Product Category...!';
			$result_info['status']='error';	
			$validation=false;			
		}
		
		if(isset($cat_status) && empty($cat_status) && $cat_status=="") {
			$result_info['message']='Please Fill Proper Status...!';
			$result_info['status']='error';

			$validation=false;			
		}
		
	
		// $result_info['message']='Please Fill Proper Product Category...!';
		// 	$result_info['status']='error';
		// echo json_encode($result_info);
		// die;
		
		if($validation==true){
			
			$result_info=$this->Product_m->categoriesNew($InfoCat);
			
			
			
			if($result_info['status']=='success'){
				// $result_info=$result;
				// $result_info['message']='Information Saved Successfully...!';
				// $result_info['status']='error';
				$last_id=$result_info['last_id'];
			// file upload
					$config['upload_path']          = 'public/images/category';
					$config['allowed_types']        = 'gif|jpg|jpeg|png';
					$config['max_size']             = 100;
					$config['max_width']            = 1024;
					$config['max_height']           = 768;
					$config['file_name'] 			= $last_id;
					if(isset($_FILES['fileData']['tmp_name'])){
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('fileData'))
					{
							$data = array('error' => $this->upload->display_errors());
					}else{
						// $result['ext']=$config['file_ext'];
						// $data = array('upload_data' => $this->upload->data());
						$data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
						// print_r($data);
						
						$imgData['filename']=$data['file_name'];
						$imgData['last_id']=$last_id;
						// echo $imgData;
						$this->Product_m->updateImageCat($imgData);
							
						}}
			}
			else{
			$result_info['message']='Information Not Changed Try again...!';
			$result_info['status']='error';
			
		}	
		
	}
		echo json_encode($result_info);
		


	}
	// update categories
	public function updatecategories()    {
		echo json_encode('hiupdated');
	}
	// code 
	// end categories
	public function catelog(){
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		$this->load->view('product/new_product');
		$this->load->view('ad_layout/footer');
	}
	public function addproduct()	{
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		$this->load->view('product/add_product');
		$this->load->view('ad_layout/footer');
	}
	public function producrupload()	{
		$this->load->view('ad_layout/header');
		$this->load->view('ad_layout/navabar');
		$this->load->view('ad_layout/sidebar');
		// $this->load->view('');
		$this->load->view('product/all_upload');
		$this->load->view('ad_layout/footer');
	}
	// product cat update call
	public function updateCall(){
		$this->load->model('Product_m');
		// print_r();
		$data= $this->Product_m->getupdateCall($_REQUEST);
		echo json_encode($data);

	}
	public function catelogUpdate(){

		// echo json_encode($_FILES);

		$last_id=$_REQUEST['cat_id'];	

		// die;
		$this->load->model('Product_m');		
		$responce= $this->Product_m->catDataUpdate($_REQUEST);
		// file upload
		$config['upload_path']          = 'public/images/category';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['file_name'] 			= $last_id;
		if(isset($_FILES['file']['tmp_name'])){
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
		{
				$data = array('error' => $this->upload->display_errors());
		}else{
			// $result['ext']=$config['file_ext'];
			// $data = array('upload_data' => $this->upload->data());
			$data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			// print_r($data);
			
			$imgData['filename']=$data['file_name'];
			$imgData['last_id']=$last_id;
			// echo $imgData;
			$this->Product_m->updateImageCat($imgData);
				
			}}
		echo json_encode($responce);

	}
	// end
	// product update start




	public function prdUpdateCall(){
		$this->load->model('Product_m');
		// print_r();
		$data= $this->Product_m->getupdateCallPrd($_REQUEST);
		echo json_encode($data);

	}
	public function prdUpdate(){

		// echo json_encode($_REQUEST);
		// die();

		$last_id=$_REQUEST['prd_id'];	

		// die;
		$this->load->model('Product_m');		
		$responce= $this->Product_m->prdDataUpdate($_REQUEST);
		// file upload
		$config['upload_path']          = 'public/images/product';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['file_name'] 			= $last_id;
		if(isset($_FILES['file']['tmp_name'])){
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
		{
				$data = array('error' => $this->upload->display_errors());
		}else{
			// $result['ext']=$config['file_ext'];
			// $data = array('upload_data' => $this->upload->data());
			$data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			// print_r($data);
			
			$imgData['filename']=$data['file_name'];
			$imgData['last_id']=$last_id;
			// echo $imgData;
			$this->Product_m->updateImage($imgData);
				
			}}
		echo json_encode($responce);

	}






















	// product update endif
	function upload_image()  
      {  
           if(isset($_FILES["user_image"]))  
           {  
                $extension = explode('.', $_FILES['user_image']['name']);  
                $new_name = rand() . '.' . $extension[1];  
                $destination = './upload/' . $new_name;  
                move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
                return $new_name;  
           }  
      }  
	// end product update call
	// new produce
	public function newProduce(){

		$validation=true;
					
		$json = json_decode($_REQUEST['fileInput']);
		// $data =get_object_vars($json[0]);
		$data =json_encode($json);// = get_object_vars($json[0]);
		// echo json_encode($json);
		$number_of=count($json);
		$a=0;
		$k=0;
		$predData=[];
		$prd_cat['last_id']='0';
		// $prd_cat=[];
		while ($a < $number_of) {
			$predData[$json[$a]->name]=$json[$a]->value;
			if ($json[$a]->name=='prd_cat') {
				$prd_cat[$k]['prd_cat']=$json[$a]->value;
				$k++;
			}
			$a++;
		}
				
				unset($predData['prd_cat']);

			// echo '<pre>';
			// print_r($predData);
			// die;

				if(isset($predData['prd_status']) && empty($predData['prd_status'] && $predData['prd_status']!=="")) {
					$result_info['message']='Please Select Proper Status...!';
					$result_info['status']='error';	
					$validation=false;			
				}
				// if(isset($prd_title) && empty($prd_title && $prd_title!=="")) {
				// 	$result_info['message']='Please Fill Proper title...!';
				// 	$result_info['status']='error';	
				// 	$validation=false;			
				// }
				if(isset($predData['prd_name']) && empty($predData['prd_name'] && $predData['prd_name']!=="")) {
					$result_info['message']='Please Fill Proper Product Name...!';
					$result_info['status']='error';	
					$validation=false;			
				}
				if(isset($predData['prd_cat']) && empty($predData['prd_cat'] && $predData['prd_cat']!=="")) {
					$result_info['message']='Please Fill Proper Product Category...!';
					$result_info['status']='error';	
					$validation=false;			
				}
				// if(isset($prd_dec) && empty($prd_dec && $prd_dec!=="")) {
				// 	$result_info['message']='Please Fill Proper Product Description...!';
				// 	$result_info['status']='error';	
				// 	$validation=false;			
				// }
				// echo json_encode($result_info);
				// die;
				// save information
				if($validation==true){
					$this->load->model('Product_m');
					$result=$this->Product_m->productNew($predData);
					if($result['status']=='success'){
					$result_info=$result;
					$last_id=$result['last_id'];
					$prd_cat['last_id']=$last_id;
					// print_r($prd_cat);
					// die;
					$result=$this->Product_m->product_category($prd_cat);

					
					// file upload
						
							$config['upload_path']          = 'public/images/product';
							$config['allowed_types']        = 'gif|jpg|jpeg|png';
							$config['max_size']             = 100;
							$config['max_width']            = 1024;
							$config['max_height']           = 768;
							$config['file_name'] 			= $last_id;
							if(isset($_FILES['fileData']['tmp_name'])){
							$this->load->library('upload', $config);
							if ( ! $this->upload->do_upload('fileData'))
							{
									$data = array('error' => $this->upload->display_errors());
							}else{
								// $result['ext']=$config['file_ext'];
								$data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
						// print_r($data);
								
								$imgData['filename']=$data['file_name'];
								$imgData['last_id']=$last_id;
										$this->Product_m->updateImage($imgData);
									// $data = array('upload_data' => $this->upload->data());
								}}
					}
					else{
					$result_info['message']='Information Not Changed Try again...!';
					$result_info['status']='error';
					}		
			}
				echo json_encode($result_info);
		
	}
	// end new produce
	public function desc($id){
		$result=$this->Product_m->descData($id);
		echo '<pre>';
		print_r($result);
	}
	
}
