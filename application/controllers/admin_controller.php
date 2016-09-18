<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin_controller extends CI_Controller
{
    
    public $id;
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('admin/authen');
    }

    public function main() {
        $session = $this->session->userdata('token');

        if($session){
            $this->load->view('admin/main');
        }else{
            redirect("admin");
        }
    }
    
    public function authen() {
        $authData = array('pnf_username' => $this->input->post('pnf_user'), 'pnf_password' => $this->input->post('pnf_pass'));
        
        $rows = $this->user_model->getCheckAuth($authData);
        if ($rows) {
            $token = $this->genCode(12);
            $newdata = array(
                   'token'  => $token,
               );
            $this->session->set_userdata($newdata);
            redirect("admin/main");
        } 
        else {
            redirect("admin");
        }
    }

    public function logout() {
        $this->session->unset_userdata('token');
        redirect("admin");
    }

    private function genCode($maxLen){
        /*Gen Eventcode*/
        $length = rand(1,100000);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz0123456789abcdefghijklmnopqrstuvwxyz0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $subsix = substr($randomString, 0 , $maxLen);
        return strtoupper($subsix);
    }
    
}
?>
