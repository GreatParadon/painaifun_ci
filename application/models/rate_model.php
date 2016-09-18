<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rate_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function insertRate($room_id){
		$this->db->insert('rate', array('room_id' => $room_id));
		$rate_select = $this->db->get_where('rate', array('room_id' => $room_id));
		return $rate_select->result_array();
	}

	public function rateList($id){
		$this->db->select('*');
		$this->db->from('room');
		$this->db->join('rate', 'rate.room_id = room.room_id');
		$this->db->where('rate.room_id', $id);
		$rate_select = $this->db->get();
		return $rate_select->result_array();
	}

	public function updateRate($rate_update_data,$id){
		$this->db->where('rate_id', $id);
		$this->db->update('rate', $rate_update_data);
	}

	public function deleteRate($id){
		$this->db->where('rate_id', $id);
		$this->db->delete('rate');
	}

}
?>
