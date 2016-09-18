<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class user_controller extends CI_Controller
{
    
    public $id;
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }
    
    public function adminauthen() {
        $authData = array('pnf_username' => $this->input->post('pnf_user'), 'pnf_password' => $this->input->post('pnf_pass'));
        
        $rows = $this->user_model->getCheckAuth($authData);
        if ($rows == 1) {
            redirect("admin/management");
            exit();
        } 
        else {
            redirect("admin");
            exit();
        }
    }
    
}
?>
