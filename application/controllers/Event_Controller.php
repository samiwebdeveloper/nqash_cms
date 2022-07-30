<?php

class Event_Controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Karachi');
		$this->load->model('Event_Model');
	}
	// get data  and populate in group edit form
	public function add_contact()
	{
		$this->load->view('add_contact');
	}
	public function insert_contact_data()
	{
		$this->form_validation->set_rules('Landline', 'Landline', 'required');
		$this->load->library('form_validation');
		if ($this->form_validation->run() == true) {
			$this->Event_Model->Insert_record('nqash_cms.tblcontact', $_POST);
			$this->session->set_flashdata('msg', '<div class="alert alert-success  fade show" role="alert">
			  <strong>Successfully!</strong> Data is  inserted.
			  <button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">&times;</span>
			  </button>
			  </div>');
					redirect("Event_Controller/add_contact");
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger  fade show" role="alert">
			  <strong>Successfully!</strong> Data is Not inserted.
			  <button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">&times;</span>
			  </button>
			  </div>');
					redirect("Event_Controller/add_contact");

		}
	
	

}
	public function edit_master_detail()
	{
		$id = $this->uri->segment(3);
		$data['data'] = $this->Event_Model->fetch_record_detail($id);
		$data['get_event_data'] = $this->Event_Model->get_event($id);
		$data['get_event_img_data'] = $this->Event_Model->event_img_data($id);
		$this->load->view('edit_event_view', $data);
	}
	public function update_sorting()
	{

		$id = $this->input->post('row_id');
		$sort_no = $this->input->post('sort_no');
		$data = array(
			'sort_no' 		=> $sort_no
		);
		$this->Event_Model->Update_record('nqash_cms.tblevent', 'EventId', $id, $data);
		echo '<div class="  col-md-12 alert alert-success" role="alert"> <button class="close "  data-dismiss="alert"></button>
	<strong>Successfully!: </strong>Records has been Update. </div>';
		}


	// get data from group edit  form and update in tbleventimage and tblevent
	public function edit_master_detail_row()
	{
		// update tblevent 
		$id = $this->Event_Model->edit_event_record(trim($_POST['title']), trim($_POST['eventdate']), trim($_POST['detail']), $_POST['event_id']);
		// delete old data according to id from tbleventimg table;
		$id_arr = $_POST['id'];
		if (!empty($_POST['id'])) {
			foreach ($id_arr as  $row_id) {
				$this->Event_Model->Delete_record('nqash_cms.tbleventimage', 'EventImageId', $row_id);
			}
		}

		for ($i = 0; $i < count($_FILES['img_name']['name']); $i++) {
			$alternattext = $_POST['text'][$i];
			if (strlen($_FILES['img_name']['name'][$i]) == 0) {
				$img = $_POST['file_text'][$i];
			} else {
				$_FILES['file']['name'] = $_FILES['img_name']['name'][$i];
				$_FILES['file']['type'] = $_FILES['img_name']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['img_name']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['img_name']['error'][$i];
				$_FILES['file']['size'] = $_FILES['img_name']['size'][$i];

				$config['upload_path'] = 'assets/upload_image/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file')) {
					$data['error'] =  '<div class="  col-md-12 alert alert-danger" role="alert"> <button class="close "  data-dismiss="alert"></button>
						<strong>Alert!: </strong>Upload Correct File Formate. </div>';
				} else {
					$data_ = array('upload_data' => $this->upload->data());
					$imgName[$i] = $this->upload->data();
					$img = $imgName[$i]['file_name'];
				}
			}
			$event_detail = [
				'EventId' => trim($_POST['event_id']),
				'Image' =>  trim($img),
				'Alternative' => trim($alternattext)
			];
			$this->Event_Model->Insert_record('nqash_cms.tbleventimage', $event_detail);
		}
		$this->session->set_flashdata('msg', '<div class="  col-md-12 alert alert-success" role="alert"> <button class="close "  data-dismiss="alert"></button>
		<strong>Successfully!: </strong>Records has been saved. </div>');
		redirect(base_url() . "Event_Controller");
	}

	public function edit_record()
	{
		$event_img_id = $this->uri->segment(3);
		$event_id = $this->uri->segment(4);
		$data['data'] = $this->Event_Model->fetch_record();
		$data['get_event_img_data'] = $this->Event_Model->get_event_img_data($event_img_id);
		$data['get_event_data'] = $this->Event_Model->get_event_data($event_id);

		$this->load->view('event_view', $data);
	}

	public function edit_data()
	{
		$file_lenght = strlen($_FILES['file']['name']);
		$this->Event_Model->edit_event_record($_POST['title'], $_POST['eventdate'], $_POST['detail'], $_POST['event_id']);

		if ($file_lenght == 0) {
			$_POST['file_text'];
			$_POST['id'];
			$_POST['text'];
			$this->Event_Model->edit_event_img_record($_POST['file_text'], $_POST['id'], $_POST['text']);
		} else {
			$config = [
				'upload_path' => 'assets/upload_image/',
				'allowed_types' => "jpg|jpeg|png",
			];
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$data['error'] = array('error' => '<div class=" col-md-12 alert alert-success" role="alert"> <button class="close "  data-dismiss="alert"></button>
				<strong>Successfully!: </strong>Record Has Been Updated.</div>');
				$this->Event_Model->edit_event_img_record($_FILES['file']['name'], $_POST['id'], $_POST['text']);
			} else {
				$data['error'] = array('error' => '<div class=" col-md-12 alert alert-danger" role="alert"> <button class="close "  data-dismiss="alert"></button>
				<strong>Alert!: </strong>File Type Must Be Png ,Jpg And jpeg.</div>');
			}
			$data['data'] = $this->Event_Model->fetch_record();
			$this->load->view('event_view', $data);
		}
	}
	public function index()
	{
		$data['data'] = $this->Event_Model->fetch_record();
		$this->load->view('event_view', $data);
	}
	public function delete_record()
	{
		$id = $this->uri->segment(3);
		$this->Event_Model->Delete_record('nqash_cms.tbleventimage', 'EventId', $id);
		$this->Event_Model->Delete_record('nqash_cms.tblevent', 'EventId', $id);
		$this->session->set_flashdata('msg', '<div class="  col-md-12 alert alert-success" role="alert"> <button class="close "  data-dismiss="alert"></button>
		<strong>Successfully!: </strong>Records has been Deleted. </div>');
		redirect(base_url() . "Event_Controller");
	}

	public function insert_data()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('detail', 'detail', 'required');
		if ($this->form_validation->run() == true) {
			$event_date = $this->input->post('sliderdate');
			$title = $this->input->post('title');
			$detail = $this->input->post('detail');
			$upload_files = $_FILES['file']['name'];
			$text = $_POST['text'];
	
			$event = [
				'Title' => trim($title),
				'EventDate' => trim($event_date),
				'Detail' => trim($detail)
			];
			$config['upload_path'] = 'assets/upload_image/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
	
			$id = $this->Event_Model->Insert_record('nqash_cms.tblevent', $event);
			$data = array(
				'sort_no' 		=> $id
			);
			$this->Event_Model->Update_record('nqash_cms.tblevent', 'EventId', $id, $data);
			$files = $_FILES;
			$cpt = count($_FILES['file']['name']);
			for ($i = 0; $i < $cpt; $i++) {
				$_FILES['file']['name'] = $files['file']['name'][$i];
				$_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
				$_FILES['file']['error'] = $files['file']['error'][$i];
				$_FILES['file']['size'] = $files['file']['size'][$i];
				if ($this->upload->do_upload('file')) {
					$data['error'] = array('error' => '<div class=" col-md-12 alert alert-success" role="alert"> <button class="close "  data-dismiss="alert"></button>
					<strong>Successfully!: </strong>Record Has Been Saved.</div>');
					$imgName[$i] = $this->upload->data();
					$img = $imgName[$i]['file_name'];
					$event_detail = [
						'EventId' => $id,
						'Image' =>  $img,
						'Alternative' => $text[$i]
					];
					$this->Event_Model->Insert_record('nqash_cms.tbleventimage', $event_detail);
				} else {
					$data['error'] = array('error' => '<div class=" col-md-12 alert alert-danger" role="alert"> <button class="close "  data-dismiss="alert"></button>
					<strong>Alert!: </strong>File Type Must Be Png ,Jpg And jpeg.</div>');
				}
			}
			$data['data'] = $this->Event_Model->fetch_record();
			$this->session->set_flashdata('msg', '<div class="alert alert-success  fade show" role="alert">
			<strong>Successfully!</strong> Data is  inserted.
			<button type="button" class="close" data-dismiss="alert">
			  <span aria-hidden="true">&times;</span>
			</button>
			</div>');
				  redirect("Event_Controller");
			
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger  fade show" role="alert">
			  <strong>Successfully!</strong> Data is Not inserted.
			  <button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">&times;</span>
			  </button>
			  </div>');
					redirect("Event_Controller");
		}
		
	}
}
