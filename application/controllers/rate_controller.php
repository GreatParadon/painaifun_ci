<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class rate_controller extends CI_Controller
{
    
    private $id;
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('session');
    }


    public function index() {

    }

    public function create(){
        
    }

    public function store() {
        $session = $this->session->userdata('token');

        if($session){
            $room_id = $this->input->post('room_id');
            $rate_insert = $this->rate_model->insertRate($room_id);

            $this->output->set_content_type('application/json')->set_output(json_encode(array('success' => true, 'rate' => $rate_insert)));
        }else{
            redirect("admin");
        }
    }

    public function update($id) {
        $session = $this->session->userdata('token');

        if($session){       
            $rate_update_data = array('rate_fromdate' => $this->input->post('rate_fromdate'),
                                    'rate_todate' => $this->input->post('rate_todate'),
                                    'rate_first' => $this->input->post('rate_first'),
                                    'rate_second' => $this->input->post('rate_second'),
                                    'rate_holiday' => $this->input->post('rate_holiday'),
                                    'rate_breakfast' => $this->input->post('rate_breakfast'),
                                    'rate_extrabed' => $this->input->post('rate_extrabed'));
            $rate_update = $this->rate_model->updateRate($rate_update_data, $id);

            $this->output->set_content_type('application/json')->set_output(json_encode(array('success' => true, 'message' => 'Update Success')));
        }else{
            redirect("admin");
        }

    }

    public function delete($id) {
        $session = $this->session->userdata('token');

        if($session){
            $rate_delete = $this->rate_model->deleteRate($id);

            $this->output->set_content_type('application/json')->set_output(json_encode(array('success' => true, 'message' => 'Delete Success')));
        }else{
            redirect("admin");
        }
    }
}
?>
