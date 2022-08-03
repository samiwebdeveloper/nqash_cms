<?php

class Slider_Controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Karachi');
		$this->load->model('Slider_Model');
	}
	public function index()
	{
		$data['title'] = "slider";
		$data['fetch_data'] = $this->Slider_Model->fetch('nqash_cms.tblsliders');
		$this->load->view('slider_view', $data);
	}
	public function edit_record()
	{
		$id= $this->uri->segment(3);
		$data['title'] = "slider";
		$data['fetch_data'] = $this->Slider_Model->fetch('nqash_cms.tblsliders');
		$data['fetch_record'] = $this->Slider_Model->fetch_with_condition('nqash_cms.tblsliders','sliderid',$id);
		$this->load->view('slider_view', $data);
	}
	public function delete_record()
	{
		$id = $this->uri->segment(3);
		$this->Slider_Model->Delete_record('nqash_cms.tblsliders', 'sliderid', $id);
		$this->session->set_flashdata('msg', '<div class="  col-md-12 alert alert-success" role="alert"> <button class="close "  data-dismiss="alert"></button>
		<strong>Successfully!: </strong>Records has been Deleted. </div>');
		redirect("Slider_Controller");
	}
	public function insert_slider_data()
	{
		$config['upload_path'] = 'assets/upload_sliders/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		$data=$this->input->post();

		if ($this->upload->do_upload('file')) {
		   $data["Image"]=$this->upload->data('file_name');
			 $this->Slider_Model->Insert_record('nqash_cms.tblsliders', $data);
			$this->session->set_flashdata('msg', '<div class="  col-md-12 alert alert-success" role="alert"> <button class="close "  data-dismiss="alert"></button>
		<strong>Successfully!: </strong>Records has been saved. </div>');
		redirect("Slider_Controller");
		} else {
			$this->session->set_flashdata('msg', '<div class="  col-md-12 alert alert-danger" role="alert"> <button class="close "  data-dismiss="alert"></button>
		<strong>Alert!: </strong>Record is not inserted.</div>');
		redirect("Slider_Controller");
		}
	}

	public function edit_data()
	{

		$config['upload_path'] = 'assets/upload_sliders/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

		if (strlen($_FILES['file']['name']) != 0) {
			$this->upload->do_upload('file');
			$img_name = $this->upload->data('file_name');
		} else {
			$img_name = $_POST['Image_text'];
		}
			
		$efect_rows=$this->Slider_Model->edit_slider_record($_POST['sliderdate'],$_POST['startdate'],$_POST['enddate'],$_POST['type'],$_POST['title'],$_POST['detail'],$img_name,$_POST['id']);
	if ($efect_rows) {
		$this->session->set_flashdata('msg', '<div class="  col-md-12 alert alert-success" role="alert"> <button class="close "  data-dismiss="alert"></button>
	<strong>Successfully!: </strong>Record has been saved. </div>');
		redirect("Slider_Controller");
	} else {
		$this->session->set_flashdata('msg', '<div class="  col-md-12 alert alert-danger" role="alert"> <button class="close "  data-dismiss="alert"></button>
		<strong>Alert!: </strong>Record is not inserted. </div>');
			redirect("Slider_Controller");
	}
		
	
	}
}