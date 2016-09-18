<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class main_controller extends CI_Controller
{
    
    public $id;
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }
    
    public function index() {
        // $this->load->view('index');
        $this->about();
    }
    
    public function about() {
        $this->load->view('about');
    }
    
    public function reservation() {
        $this->load->view('reservation');
    }
    
    public function gallery() {
        $this->load->view('gallery');
    }
    
    public function contact() {
        $this->load->view('contact');
    }
    
    public function accommodation($id = null){

        $room['roomList'] = $this->room_model->roomList();
        if ($id == null) {
            $id = '1';

            $room['roomDetail'] = $this->room_model->showRoom($id);
            $room['rate'] = $this->rate_model->rateList($id);
            $room['roomImg'] = $this->room_model->showRoomImage($id);
            $this->load->view('accommodation', $room);
        } 
        else {
            $room['roomDetail'] = $this->room_model->showRoom($id);
            $room['rate'] = $this->rate_model->rateList($id);
            $room['roomImg'] = $this->room_model->showRoomImage($id);
            $this->load->view('accommodation', $room);
        }
    }
    
    // public function management() {
    //     $this->load->view('admin/management');
    // }
    
    // public function room() {
    //     $this->load->view('admin/room');
    // }

    // public function resv() {
    //     $resvList['rs'] = $this->reservation_model->getResvList();
    //     $this->load->view('admin/reservation', $resvList);
    // }
}
?>
