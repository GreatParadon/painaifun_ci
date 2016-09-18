<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class room_controller extends CI_Controller
{
    
    private $id;
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('session');
    }       

    public function index() {
        $session = $this->session->userdata('token');
        if($session){
            $room_select['room_select'] = $this->room_model->roomList();
            if($room_select){
                $this->load->view('admin/room/room', $room_select);
            }else{
                $this->output->set_content_type('application/json')->set_output(json_encode(array('success' => false, 'message' => 'Failed to store')));
            }
        }else{
            redirect("admin");
        }
    }

    public function create(){
        $session = $this->session->userdata('token');

        if($session){
            $this->load->view('admin/room/add_room');
        }else{
            redirect("admin");
        }
    }

    public function store() {
        $session = $this->session->userdata('token');

        if($session){
            $room_insert_data = array('room_name' => $this->input->post('room_name'),
                                      'room_detail' => $this->input->post('room_detail'));
            $room_insert_id = $this->room_model->insertRoom($room_insert_data);
                redirect('admin/room/'.$room_insert_id.'/edit');
        }else{
            redirect("admin");
        }
    }

    public function edit($id) {
        $session = $this->session->userdata('token');

        if($session){
            $room_edit['room_edit'] = $this->room_model->editRoom($id);
            $room_edit['room_rate'] = $this->rate_model->rateList($id);

            $this->load->view('admin/room/edit_room', $room_edit);
        }else{
            redirect("admin");
        }
    }

    public function update($id) {
        $session = $this->session->userdata('token');

        if($session){
            $room_update_data = array('room_name' => $this->input->post('room_name'),
                                    'room_detail' => $this->input->post('room_detail'));
            $room_update = $this->room_model->updateRoom($room_update_data, $id);
            redirect('admin/room');
        }else{
            redirect("admin");
        }
    }

    public function delete($id) {
        $session = $this->session->userdata('token');
        
        if($session){
            $room_delete = $this->room_model->deleteRoom($id);

            $this->output->set_content_type('application/json')->set_output(json_encode(array('success' => true, 'message' => 'Delete Success')));
        }else{
            redirect("admin");
        }
    }
}
?>
