<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class pnf_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
	}

	public function index()
	{
		// $this->load->view('index');
		$this->about();
	}

	public function about()
	{
		$this->load->view('about');
	}

	public function reservation()
	{
		$this->load->view('reservation');
	}

	public function gallery()
	{
		$this->load->view('gallery');
	}
	
	public function contact()
	{
		$this->load->view('contact');
	}

	public function accommodation()
	{
		$this->load->view('accommodation');
	}

	public function pnfAdmin()
	{
		$this->load->view('pnfAuth');
	}

	public function pnfAuth()
	{
		$authData = array('pnf_username' => $this->input->post('pnf_user'), 
						  'pnf_password' => $this->input->post('pnf_pass'));

			$rows = $this->pnf_model->getCheckAuth ($authData);
			if($rows== 1){
				redirect("pnfManagement");
				exit();
			}else{
				redirect("pnfAdmin");
				exit();
			}
	}

	public function pnfManagement()
	{
		$this->load->view('pnfManage');
	}

	public function pnfRoom(){
		$this->load->view('pnfRoom');
	}

	public function roomList(){
		$roomList = $this->pnf_model->getRoomList();
		$this->output->set_content_type('application/json')
		->set_output(json_encode($roomList));
	}

	public function roomInfo(){
		if ( ! isset($_GET['roomId']))
		{
			$this->output->set_content_type('application/json')
			->set_output(json_encode(array('status' => false, 'msg' => 'Failed')));
		}
		else
		{
			$roomId = $this->input->get('roomId');
			$roomInfo = $this->pnf_model->getRoomInfo($roomId);
			$this->output->set_content_type('application/json')
			->set_output(json_encode($roomInfo));
		}

	}

	public function subRoomInfo(){
		if ( ! isset($_GET['subRoomId']))
		{
			$this->output->set_content_type('application/json')
			->set_output(json_encode(array('status' => false, 'msg' => 'Failed')));
		}
		else
		{
			$subRoomId = $this->input->get('subRoomId');
			$subRoom = $this->pnf_model->getSubRoom($subRoomId);
			$this->output->set_content_type('application/json')
			->set_output(json_encode($subRoom));
		}
	}

	public function addSubRoom(){
		if ( ! isset($_POST['InsRoomId']))
		{
			$this->output->set_content_type('application/json')
			->set_output(json_encode(array('status' => false, 'msg' => 'Failed')));
		}
		else
		{
			$InsRoomId = $this->input->post('InsRoomId');
			$addSroomRes = $this->pnf_model->getInsertSubRoom($InsRoomId);
			$arrResult = array("status"=>"pass");
			$this->output->set_content_type('application/json')
			->set_output(json_encode($InsRoomId));
		}
	}

	public function deleteSubRoom(){
		if ( ! isset($_POST['delRoomId']))
		{
			$this->output->set_content_type('application/json')
			->set_output(json_encode(array('status' => false, 'msg' => 'Failed')));
		}
		else
		{
			$delRoomId = $this->input->post('delRoomId');
			$addSroomRes = $this->pnf_model->getDeleteSubRoom($delRoomId);
			$arrResult = array("status"=>"pass");
			$this->output->set_content_type('application/json')
			->set_output(json_encode($delRoomId));
		}
	}

	public function insertRoom(){
		$insertData = array('roomName'=> $this->input->post('roomName'),
							'roomInfo'=> $this->input->post('roomInfo'),
							'roomType'=> $this->input->post('roomType'),
							'roomCost'=> $this->input->post('roomCost'),
							'roomCapa'=> $this->input->post('roomCapa'),
							'roomStat'=> $this->input->post('roomStat'));
		$insertResult = $this->pnf_model->getInsertRoom($insertData);
		$this->output->set_content_type('application/json')
		->set_output(json_encode($insertResult));
	}

	public function updateRoom(){
		$updateData = array('roomId'=> $this->input->post('roomId'),
							'roomName'=> $this->input->post('roomName'),
							'roomInfo'=> $this->input->post('roomInfo'),
							'roomType'=> $this->input->post('roomType'),
							'roomCost'=> $this->input->post('roomCost'),
							'roomCapa'=> $this->input->post('roomCapa'),
							'roomStat'=> $this->input->post('roomStat'));
		$updateResult = $this->pnf_model->getUpdateRoom($updateData);
		if($updateResult == null){
			$arrReturn = array("status" => false,"msg" => "error");
			$this->output->set_content_type('application/json')
			->set_output(json_encode($arrReturn));
		}else{
			$this->output->set_content_type('application/json')
			->set_output(json_encode($updateResult));
		}

	}

	public function deleteRoom(){
		$roomId = $this->input->post('roomId');
		$roomResult = $this->pnf_model->getDeleteRoom($roomId);
			$arrReturn = array('status' => $roomResult,
							   'msg' => 'Delete Success');
			$this->output->set_content_type('application/json')
			->set_output(json_encode($arrReturn));

	}

	function upload()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config = array('upload_path' => './uploads/',
						'allowed_types' => 'gif|jpg|png',
						'max_size'	=> 2000,
						'max_width'  => 2000,
						'max_height'  => 2000);
		// $this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( $this->upload->do_upload("Filedata")){
			$data = $this->upload->data();
			echo "<pre>";
			print_r($data);
			$name=date("YmdHis");
			// $roomId = 3;
			// // $this->pnf_model->getAddImgpath($name,$roomId);
			rename($data["full_path"],$data["file_path"].$name.$data["file_ext"]);
		} else {
			$this->output->set_content_type('application/json')
			->set_output(json_encode(array('status' => false, 'msg' => 'failed')));
		}
	}

	public function imageList(){
		$roomId = $this->input->get('roomId');
		$imgPath = $this->pnf_model->getImageList($roomId);
		$this->output->set_content_type('application/json')
		->set_output(json_encode($imgPath));
	}

	public function pnfResv(){
		$resvList['rs'] = $this->pnf_model->getResvList();
		$this->load->view('pnfResv', $resvList);
	}

	public function resvInfo(){
		$resvId = $this->input->get('resvId');
		$resvInfo = $this->pnf_model->getResvInfo($resvId);
		$this->output->set_content_type('application/json')
		->set_output(json_encode($resvInfo));
	}

	public function searchRoom(){
		$searchData = array('fromDate' => $this->input->get('fromDate'),
							'toDate' => $this->input->get('toDate'));
		
		$searchResult = $this->pnf_model->getSearchResult($searchData);
		$this->output->set_content_type('application/json')
		->set_output(json_encode($searchResult));
	}

	public function selectRoom(){
		$selectData = array('checked' => $this->input->get('checked'),
							'roomCapaId' => $this->input->get('roomCapaId'));

		if($selectData['checked']=='true'){
			$selectStat = 'Selected';
		}else if($selectData['checked']=='false'){
			$selectStat = '';
		}

		$this->pnf_model->getUpdateSelectData($selectStat,$selectData);
		$arrReturn = array("status" => true);
		$this->output->set_content_type('application/json')
		->set_output(json_encode($arrReturn));
	}

}
?>
