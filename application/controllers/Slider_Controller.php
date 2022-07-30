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
		$data['fetch_data'] = $this->Slider_Model->fetch('nqash_cms.tblsliders');
		$this->load->view('slider_view', $data);
	}

	public function insert_slider_data()
	{
		$config=[
			'upload_path'=>"./upload_images/",
			'allowed_types'=>"jpg|jpeg|png",
		];
		$this->load->library('upload', $config);
		$data=$this->input->post();

		if ($this->upload->do_upload('file')) {
		   $data["Image"]=$this->upload->data('file_name');
			$invoice_detail_id = $this->Slider_Model->Insert_record('nqash_cms.tblsliders', $data);
			$data['error'] = array('error' => '<div class="  col-md-12 alert alert-success" role="alert"> <button class="close "  data-dismiss="Successfully!"></button><strong>Successfully!: </strong>Record Has Been Saved.</div>');
			$data['fetch_data'] = $this->Slider_Model->fetch('nqash_cms.tblsliders');
			$this->load->view('slider_view',$data);
		} else {
			$data['error'] = array('error' => '<div class="  col-md-12 alert alert-danger" role="alert"> <button class="close "  data-dismiss="Alert!"></button><strong>Alert!: </strong>File Type Must Be Png ,Jpg And jpeg.</div>');
			$data['fetch_data'] = $this->Slider_Model->fetch('nqash_cms.tblsliders');
			$this->load->view('slider_view',$data);
		}


	}
	
	


	
}
