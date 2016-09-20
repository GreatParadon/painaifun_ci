<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class reservation_controller extends CI_Controller
{
    public $id;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('session');

    }


    public function index()
    {
        $session = $this->session->userdata('token');

        if ($session) {
            $reservation_select['reservation_select'] = $this->reservation_model->reservationList();
            if ($reservation_select) {
                $this->load->view('admin/reservation/reservation', $reservation_select);
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('success' => false, 'message' => 'Failed to store')));
            }
        } else {
            redirect("admin");
        }
    }

    public function create()
    {
        $session = $this->session->userdata('token');

        // $session = $session->userdata('token');
        if ($session) {
            $this->load->view('admin/reservation/add_reservation');
        } else {
            redirect("admin");
        }
    }

    public function store()
    {
        $session = $this->session->userdata('token');

        // $session = $session->userdata('token');
        if ($session) {
            $reservation_insert_date = array('reservation_date' => $this->input->post('reservation_date'));
            $reservation_insert_id = $this->reservation_model->insertReservation($reservation_insert_date);
            $this->output->set_content_type('application/json')->set_output(json_encode(array('success' => true, 'message' => 'Store success')));
        } else {
            redirect("admin");
        }
    }

    public function show($id)
    {
        $session = $this->session->userdata('token');

        // $session = $session->userdata('token');
        if ($session) {
            $reservation_show['reservation_show'] = $this->reservation_model->showReservation($id);
            $this->load->view('admin/reservation/edit_reservation', $reservation_show);
        } else {
            redirect("admin");
        }
    }

    public function edit($id)
    {
        $session = $this->session->userdata('token');

        // $session = $session->userdata('token');
        if ($session) {
            $reservation_edit['reservation_edit'] = $this->reservation_model->editReservation($id);
            $this->output->set_content_type('application/json')->set_output(json_encode(array('success' => true, 'message' => $reservation_edit)));
        } else {
            redirect("admin");
        }
    }

    public function update($id)
    {
        $session = $this->session->userdata('token');

        // $session = $session->userdata('token');
        if ($session) {
            $reservation_update_data = array('reservation_customer_name' => $this->input->post('reservation_name'),
                'reservation_tel' => $this->input->post('reservation_tel'),
                'reservation_guest' => $this->input->post('reservation_guest'),
                'reservation_cost' => $this->input->post('reservation_cost'),
                'reservation_agency' => $this->input->post('reservation_agency'),
                'reservation_status' => $this->input->post('reservation_status')
            );
            $reservation_update = $this->reservation_model->updateReservation($reservation_update_data, $id);
            $this->output->set_content_type('application/json')->set_output(json_encode(array('success' => true, 'message' => 'Update Success')));
        } else {
            redirect("admin");
        }
    }

    public function delete($id)
    {

        $session = $this->session->userdata('token');

        if ($session) {
            $reservation_delete = $this->reservation_model->deleteReservation($id);

            $this->output->set_content_type('application/json')->set_output(json_encode(array('success' => true, 'message' => 'Delete Success')));
        } else {
            redirect("admin");
        }
    }
}

?>
